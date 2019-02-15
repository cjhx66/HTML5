<?php
/**
 *简要说明	
 * @package 		Admin/Base 	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/20	                //最后修改日期
 */
namespace Admin\Controller\Base;
use Think\Controller;
//用户操作类
class UsersController extends CommonController{
	public function _initialize(){
		// 验证表单令牌
		if( isset($_REQUEST['formstatus']) ){
			if( $_REQUEST['formstatus'] != $_SESSION['formstatus']){
				$this->redirect(C('BASE').'Public/login');
				return;
			}
		}

		// 过滤操作
		$_GET = abacaAddslashes($_GET);
		$_POST = abacaAddslashes($_POST);
		
 		//判断用户是否登录
		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->redirect(C('BASE').'Public/login');
			return;
		} 
		//权限过滤 
		$nodename = $_SESSION[C('USER_AUTH_KEY')]['username']; 
		if($nodename!='developer' && $nodename!='admin'  ){
			// $this->error("抱歉！没有操作权限！");
			$this->redirect(C('BASE').'Public/login');
			return;
		} 
	}
	
	//首页 
	public function index() {
		//列表过滤器，生成查询Map对象
		$map = $this->_search();
		
		if(method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		//判断采用自定义的Model类
		
		$model = M('Users');
		
		if (!empty($model)) {
			$this->_list($model, $map);
		}   
		$this->display();
	} 
	
	
	//不让显示的用户，admin，developer
	public function _filter(&$map){ 
		$map['id']=array('not in',array(1,2));   
	}  
	
	
	//添加用户页面
	public function add() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌

		//查出所有角色，
		$rolemodel=M('Role');
		$rolelist=$rolemodel->select();
		$option="";
		foreach($rolelist as $k=>$v){
			$option .='<option value="'.$v['id'].'">' .$v['rname'] . '</option>';
		} 
		 //dump($option);die;
		$time=time();
		$this->assign('time',$time);
		$this->assign('option',$option); 
		$this->display('add');
	}
	
	
	//新增方法
	public function insert(){
		$model = D("Users");
		unset ( $_POST [$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		}

		$data['username'] = I('post.username', '', 'trim');
		$data['password'] = I('post.password', '', 'md5');
		$data['realname'] = I('post.realname', '', 'trim');
		$data['company'] = I('post.company', '', 'trim');
		$data['depart'] = I('post.depart', '', 'trim');
		$data['rID'] = I('post.rID', '', 'intval');
		$data['defaultw'] = I('post.defaultw', '', 'intval');

		//保存当前数据对象
		if ($result = $model->add($data)) { //保存成功
			// 回调接口
			if (method_exists($this, '_tigger_insert')) {
				$model->id = $result; 
				$this->_tigger_insert($model);
			}  
			//成功提示
			$this->success(L('新增成功'));
		} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
		} 
	}
	
	
	//编辑用户页面
	public function edit() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		
		//接收到要编辑的数据的id
		$id=$_GET['id'];  
		//查出该id对应的defaultw,rID
		$model=M('Users');
		$vo=$model->find($id);
		//dump($list);die; 
		//查出所有角色，
		$rolemodel=M('Role');
		$rolelist=$rolemodel->select(); 
		//查出对应站点
		$option="";
		foreach($rolelist as $k=>$v){
			$option .='<option '.($vo['rID']==$v['id']?"selected":"").'  value="'.$v['id'].'">' .$v['rname'] . '</option>';
		} 
		//dump($option);die; 
		$this->assign('option',$option); 
		$this->assign('vo',$vo); 
		$this->display('edit');
	}
	
	
	//ajax查出对应站点的信息
	public function path(){ 
		$id=$_POST['id']; 
		//查出该id对应的defaultw,rID
		$model=M('Users');
		$users=$model->where('rID='.$id)->find(); 
		//查出所有角色下面的站点wID 
		$role_site=M('role_site');
		$list=$role_site->where("rID=$id")->find();
		// dump($list);die;
		$array=explode(',',$list['wID']);
		//echo $array;
		//echo $list['wID'];
		if($list==null){
			echo "";
		}
		else{
			$option="";
			foreach($array as $k=>$v){ 
				$option .='<input  type="radio" '.($users['rID']==$v['id']?"checked":"").' name="defaultw" value="'.$v.'" />"'.getNameByWebId($v).'"<br/>';
			} 
			echo $option;
		}
		
	}	
	
	
	//更新方法
	public function update() {
		//dump($_POST);die;
		$model = D('Users'); 
		if(false === $model->create()) {
			$this->error($model->getError());
		} 
		$data['id'] = I('post.id', '', 'intval');
		$data['username'] = I('post.username', '', 'trim');
		$data['realname'] = I('post.realname', '', 'trim');
		$data['company'] = I('post.company', '', 'trim');
		$data['depart'] = I('post.depart', '', 'trim');
		$data['rID'] = I('post.rID', '', 'intval');
		$data['defaultw'] = I('post.defaultw', '', 'intval');

		// 更新数据
		if(false !== $model->save($data)) {
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
	
	
	//显示修改密码方法 
	public function password(){
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		
		$this->display();
	}
	
	
	//重置密码 
	public function resetPwd() {
		$id = $_POST['id'];
		$password = $_POST['password']; 
		$User = M('Users');
		$User->password = md5($password);
		$User->id = $id;
		$result = $User->save();
		if (false !== $result) { 
			$this->success("密码修改成功");
		} else { 
			$this->error('修改密码失败！');
		}
	}
	
	
	//删除指定记录
	public function delete() { 
		$model = M("Users");
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST[$pk];
			if (isset($id)) { 
				$condition = array($pk => array('in', explode(',', $id)));
				if (false !== $model->where($condition)->delete()) {
					$this->success(L('删除成功'));
				} else {
					$this->error(L('删除失败'));
				}
			} else {
				$this->error('非法操作');
			}
		}
	}
	
	
	// //启用会员状态
	public function do_stop(){
		$mod=M("Users");
		$id=$_POST["id"];
		$data['state']=2;//将会员状态改为禁用用
		$m=$mod->where("id='{$id}'")->save($data);
		// echo $mod->getlastSql();
		// exit();
		if($m>0){
			echo "禁用成功";
		}else{
			echo "禁用失败";
		}
	}
	
	
	// //禁用会员状态
	public function do_start(){
		$mod=M("Users");
		$id=$_POST["id"];
		$data['state']=1;//将会员状态改为启用
		$m=$mod->where("id='{$id}'")->save($data);
		if($m>0){
			echo "启用成功";
		}else{
			echo "启用失败";
		}
	}

}