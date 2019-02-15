<?php
/**
 *简要说明	
 * @package 		Ch/Ltan	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/13	                //最先写的日期
 * @lastmodifide	 			               //最后修改日期
 */
namespace Ch\Controller\Ltan;
use Think\Controller;

//论坛首页管理类
class IndexController extends ComController{ 
	  
	  //论坛首页管理类
	  public function  index(){  
		$lclass  =  M('Lclass'); // 实例化对象
		//递归查询
	 	//$arr=getCate(0); 
		//另一种查询方法
		$lang=$lclass->field("id,pid,path,name,url,concat(path,'-',id) as bspath,writetime,language")->order("bspath,id asc")->select();  
		$this->assign('arr',$lang);  
		$this->display(); // 输出模板 
	 } 
	 
	 
	 //版块分类
	  public function classID(){
	 	//接收传递过来的classID，来区分不同的版块的，帖子
		$About  =  M('Lthread'); // 实例化对象
		//根据传进来的classID来查询
		$map['status']  =   array('eq',1); 
		$classID  =  $_GET['id']; 
		//dump($_GET['id']);
		if($classID){
			$map['bspath']  =   array('like',"%-".$classID."%");
		} 
		$count      = $About->where($map)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $About->where($map)->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		echo $About->getlastsql();
		//dump($list);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出 
		$this->assign('classID',$classID); 
		$this->display();
	}
	
	
	//发帖页面
	 public function fatie(){ 
	 	if (!isset($_SESSION['memberid'])) {
			$this->assign('jumpUrl', __MODULE__.'/Mcenter/Login/login');
			$this->error('请先登录');
		}
	 	$classID=(int)$_GET['classID'];
		if(!$classID){ 
			header("Content-Type: text/html; charset=utf-8"); 
			echo '<script>alert("指定版块不存在！");history.go(-1);</script>'; 
		}else{
	 		$this->assign('classID',$_GET['classID']);  
	 		$this->display();
		}
	 }
	 
	 
	 //发帖的方法
	 public function addtie(){
	 	//获取帖子版块,必须有！
		$classID=(int)$_POST['classID']; 
		if(!$classID){ 
			header("Content-Type: text/html; charset=utf-8"); 
			echo '<script>alert("指定版块不存在！");history.go(-1);</script>'; 
		}else{
			$model=M('Lthread');
			//将接收的数据放进表里
			//接收传进来的版快id
			unset ( $_POST [$model->getPk()] ); 
			if (false === $model->create()) {
			$this->error($model->getError());
			} 
			$title=$_POST['title'];
			$content=stripslashes($_POST['content']);
			$model->pid=$classID;//pid等于传进来的版块id
			$model->title=$title;//title等于传进来的title
			$model->content=$content;//content等于传进来的content
			$class=M('lclass');
			$classobj=$class->where("id =".$classID)->find();  
			$model->bspath=$classobj['path'].'-'.$classID;//bspath拼上pid
			$model->mid=$_SESSION['memberid'];//mid等于sessionid
			$model->mname=$_SESSION['membername'];//mid等于sessionname
			$model->writetime=time();//时间
			$model->lastip=$_SERVER["REMOTE_ADDR"];//用户发帖用的IP 
		
		    //保存当前数据对象
			if ($result = $model->add()) { //保存成功 
			
			 //成功提示
			 $this->success(L('新增成功'),'detail/id/'.$result.'/classID/'.$classID); 
			
			} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
			}  
	 		 
		} 
	 }
 
	 // 详情	 
	 public function  detail(){   
	 	$id=(int)$_GET['id'];
		$About  = M('Lthread'); 
		$arr=$About->find($id);
		if($arr){
			if($arr['status']==1){
				$this->assign('arr',$arr);
				$this->assign('tiecontent',mb_substr(strip_tags($arr['content']),0,100).'...'); //输出帖子的内容
				$this->assign('classID',$_GET['classID']);  
				//查询出回复,//查出对应回复的回复人信息
				$lreply=M('Lreply');
				$sql="select a.*,b.id as bid,b.name  from cms_lreply a,cms_member b  where  a.mid=b.id and a.tid=".$id." order by writetime ";
				$list=$lreply->query($sql); 
				//echo $lreply->getlastsql();
				foreach($list as $k=>&$v){ 
					$v['cn']=strip_tags($v['content']);
				}	
				//var_dump($list);die;				
				$this->assign('list',$list);				
				$this->display();
			}else{
				//状态不对
				echo '该帖子已不存在'; 
			} 
		}else{
			//ID不存在
			echo '该帖子已不存在'; 
		} 
	 } 

	//回复帖子 
	 public function huifutie(){ 
			$model=M('Lreply');
			//将接收的数据放进表里
			//接收传进来的版快id
			unset ( $_POST [$model->getPk()] ); 
			if (false === $model->create()) {
			$this->error($model->getError());
			}  
			$classID=intval($_POST['classID']);
			$content=stripslashes($_POST['content']);
			$tid=intval($_POST['tid']);
			$model->tid=$tid;//tid等于帖子id
			$model->content=$content;//content等于传进来的content 
			$model->mid=$_SESSION['memberid'];//mid等于sessionid 
			$model->mname=$_SESSION['membername'];//mid等于sessionname
			$model->writetime=time();//时间
			$model->classID=$classID;//classID
			$model->lastip=$_SERVER["REMOTE_ADDR"];//用户发帖用的IP 
		
		    //保存当前数据对象
			if ($result = $model->add()) { //保存成功  
			 //成功提示
			 $this->success(L('新增成功'),'detail/id/'.$tid.'/classID/'.$classID);  
			} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
			}   
		}  
		
		
		//回复的回复
	 public function bierenhuifu(){ 
			$model=M('Lreply');
			//将接收的数据放进表里
			//接收传进来的版快id
			unset ( $_POST [$model->getPk()] ); 
			if (false === $model->create()) {
			$this->error($model->getError());
			}  
			$classID=intval($_POST['classID']);
			$content=stripslashes($_POST['content']);
			$tid=intval($_POST['tid']);
			$huifucon=$_POST['huifucon'];
			//$huifucon=mb_substr($huifucon,0,600).'...';
			$huifuid=intval($_POST['huifuid']);
			//var_dump($_POST);die;
			$model->tid=$tid;//tid等于帖子id
			$model->content=$content;//content等于传进来的content 
			$model->huifucon=$huifucon;//huifucon等于传进来的huifucon
			$model->huifuid=$huifuid;//huifuid等于传进来的huifuid
			$model->mid=$_SESSION['memberid'];//mid等于sessionid 
			$model->mname=$_SESSION['membername'];//mid等于sessionname
			$model->writetime=time();//时间
			$model->classID=$classID;//classID
			$model->lastip=$_SERVER["REMOTE_ADDR"];//用户发帖用的IP 
			//var_dump($model);die;
		    //保存当前数据对象
			if ($result = $model->add()) { //保存成功  
			 //成功提示
			 $this->success(L('新增成功'),'detail/id/'.$tid.'/classID/'.$classID);  
			 //$this->success(L('新增成功').$model->getLastSql());  
			} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
			}   
		}  
}