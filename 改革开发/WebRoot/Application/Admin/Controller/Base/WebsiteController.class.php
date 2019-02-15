<?php
/**
 *简要说明	
 * @package 		Admin/Base             //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/18	                //最后修改日期
 */
namespace Admin\Controller\Base;
use Think\Controller;
//站点列表
class WebsiteController extends CommonController{
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
		$model=M('Website');
		  if (!empty($model)) {
			$this->_list($model, $map);
		}  
	 
		$this->display();
	}
	
	
	//添加页面
	public function add() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('time', time() );
		$this->display('add');
	} 
	
	
	//添加方法
	public function insert(){
		// dump($_POST);exit();
		$model = D('Website');
		unset ( $_POST [$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		} 

		$data['name'] = I('post.name', '', 'trim');
		$data['title'] = I('post.title', '', 'trim');
		$data['keys'] = I('post.keys', '', 'trim');
		$data['description'] = I('post.description', '', 'trim');
		$data['copyright'] = I('post.copyright', '', 'trim');
		$data['ICP'] = I('post.ICP', '', 'trim');
		$data['spath'] = I('post.spath', '', 'trim');
		$data['www'] = I('post.www', '', 'trim');
		$data['writetime'] = I('post.writetime', '', 'intval');

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
	//编辑页面
	public function edit() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		
		$model = M('Website');
		$id = $_REQUEST[$model->getPk()];
		$vo = $model->find($id);
		$this->assign('vo', $vo);
		$this->display('edit');
	}
	
	
	//更新方法
	public function update() {
		//dump($_POST);die;
		$model = D('Website'); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}

		$data['id'] = I('post.id', '', 'intval');
		$data['name'] = I('post.name', '', 'trim');
		$data['title'] = I('post.title', '', 'trim');
		$data['keys'] = I('post.keys', '', 'trim');
		$data['description'] = I('post.description', '', 'trim');
		$data['copyright'] = I('post.copyright', '', 'trim');
		$data['ICP'] = I('post.ICP', '', 'trim');
		$data['spath'] = I('post.spath', '', 'trim');
		$data['www'] = I('post.www', '', 'trim');
		$data['writetime'] = I('post.writetime', '', 'intval');

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
	
	
	//删除方法
	public function delete() {
		//删除指定记录
		$model = M("Website");
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
	
	 
}