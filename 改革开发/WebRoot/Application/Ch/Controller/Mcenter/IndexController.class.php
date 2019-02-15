<?php
/**
 *简要说明	
 * @package 		Ch/Mcenter	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/08	                //最先写的日期
 * @lastmodifide	2014/09/10	                //最后修改日期
 */
namespace Ch\Controller\Mcenter;
use Think\Controller;

//会员中心首页类
class IndexController extends ComController{ 
  	
	//判断用户是否登录
	public function _initialize() {  
   		if (!isset($_SESSION['memberid'])) {
			$this->assign('jumpUrl', __MODULE__.'/Mcenter/Login/login');
			$this->error('请先登录');
		}
	}
	
	
	  //首页 
	  public function  index(){   
		$this->display(); // 输出模板 
	 } 
	 
	 
	 //member 个人信息 页面
	  public function  member(){  
	  	$id=$_SESSION['memberid'];
		$member=M('member');
		$list=$member->find($id);	
		$this->assign('list',$list); 
		$this->display();  
	 } 
	  //seller 卖家信息 页面
	  public function  seller(){  
	  	$id=$_SESSION['memberid'];
		$member=M('member');
		$list=$member->find($id);	
		$this->assign('list',$list);
		$zhizhao=M('Mzhizhao');
		$zhizhaolist=$zhizhao->where('uid ='.$id)->find();	
		//dump($zhizhaolist);die;
		$this->assign('zhizhaolist',$zhizhaolist);
		$this->display();  
	 } 
	 
	 
	 public function addzhizhao(){
	 	 // dump($_POST); 
		$model = D("Mzhizhao"); 
		$mid=$_SESSION['memberid']; 
		if(!$mid){
			$this->error("还没登陆哦");die;
		} 
		unset ( $_POST [$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		} 
		// 缩略图
		$strFile=$_FILES['upload']['name'];
		//dump($_FILES['upload']['name']); 
		if($strFile){
			$arrUploadFile=$this->_upload($_FILES['upload']); 
			$model->zhizhaopic=$arrUploadFile;
		}
		$model->uid=$mid;
		//dump($model->zhizhaopic); die;
		//保存当前数据对象
		if ($result = $model->add()) { //保存成功
			// 回调接口
			if (method_exists($this, '_tigger_insert')) {
				$model->id = $result;
				$this->_tigger_insert($model);
			}  
			//成功提示
			$this->success(L('新增成功').$model->getLastSql());
		} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
		} 
	 }
	 
	 public function editzhizhao(){
	 	dump($_POST); 
	 	$model = D("Mzhizhao"); 
	 	if(false === $model->create()) {
			$this->error($model->getError());
		} 
		// 缩略图
		$strFile=$_FILES['upload']['name']; 
		 dump($_FILES['upload']['name']);  
		if($strFile){
			$arrUploadFile=$this->_upload($_FILES['upload']); 
			$model->zhizhaopic=$arrUploadFile;
		}
	 	dump($model->zhizhaopic); //die;
		// 更新数据
		if(false !== $model->save()) {
			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
			} 
			//成功提示
			$this->success(L('更新成功'));
		} else { 
			//错误提示
			$this->error(L('更新失败'));
		}
	 
	 }
	 
	 //个人信息添加 以及默认收货地址的添加
	 public function memberinto(){
	 		// dump($_POST);die;
		$model = D("Member"); 
		if(false === $model->create()) {
			$this->error($model->getError());
		} 
		// 更新数据
		if(false !== $model->save()) {
			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
			} 
			//成功提示
			$this->success(L('更新成功'));
		} else { 
			//错误提示
			$this->error(L('更新失败'));
		}
	 	
	 }
	 
	 
	   //管理收货地址 ，收货地址列表
	  public function  address(){   
	  	//输出属于自己的地址
		$obj=M("Member");
		$uid=$_SESSION['memberid']; 
		$res=$obj->where("id=$uid")->field("id,name")->find();
		// dump($res);die();
		$this->assign("res",$res);
		if($uid){
			$mod=M("gaddress");
			$list=$mod->where("mid=$uid")->order("id asc")->limit("3")->select();
			// dump($list);die;
			$this->assign("list",$list);
		}
		$this->display();  
	 } 
	 
	 
	  //检验用户收货地址
	public function check_address(){
		$obj=M("Gaddress");
		$uid=$_POST['id'];
		$res=$obj->where("mid=$uid")->count("id");
		if($res<3){
			echo "yes";
		}else{
			echo "no";
		}
	}
	  
	  
	  //添加收货地址
	public function add_ress(){
		$obj=M("gaddress");
		$uid=$_SESSION['memberid'];
		$res=$obj->where("mid=$uid")->count("id");
		if($res<3){
			if($obj->create()){
				$obj->mid=$uid;
				$obj->writetime=time();
				$obj->status=0;
				if($obj->add()){
					$this->success("添加成功");
				}else{
					$this->error("添加失败");
				}
			}else{
				$this->error($obj->getError());
			}
		}else{
			$this->error("收货地址最多只能有三个噢");
		}
		
	}
	 
	 
	 //编辑收货地址
	public function editAdd(){
		$obj=M("gaddress");
		$uid=$_SESSION['memberid'];
		if(!$uid){
			$this->error("还没登陆哦");die;
		}
		$id=$_POST['id'];
		if($obj->create()){
			$obj->mid=$uid;
			if($obj->where("id=$id")->save()){
				$this->success("修改成功");
			}else{
				$this->error("修改失败");
			}
		}
	}
	
	
	 //删除收货地址
	public function del_add(){
		$id=intval($_GET['id']);
		$mod=M("gaddress");
		$res=$mod->where("id=$id")->delete();
		if($res>0){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}

	
	//修改默认收货地址
	public function def_add(){
		$obj=M("gaddress");
		$uid=$_SESSION['memberid'];
		$id=$_POST["id"];
		$res=$obj->where("id=$id")->setField("status","1");
		if($res>0){
			echo "success";
			$obj->where("mid=$uid and id!=$id")->setField("status","0");
		}else{
			echo "error";
		}
	}
	
	
	 
	 // 购物车
	  public function  shopcar(){   
		$this->display(); // 输出模板 
	 } 
	  // 订单
	  public function  deal(){   
		$this->display(); // 输出模板 
	 } 
	
	  
}