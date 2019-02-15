<?php
/**
 *简要说明	
 * @package 		Admin/Ltan	            //所属包
 * @author 		    xianhui<1024362476@qq.com>	//作者xianhui
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/20	                //最先写的日期
 * @lastmodifide	待定		                //最后修改日期
 */
namespace Admin\Controller\Ltan;
use Think\Controller;

//帖子回复管理类
class LreplyController extends ComController{ 
  	//回复列表
	public function  index(){
		$this->assign('language', dowith_include($_REQUEST['language']) );	// 所属站点
		$this->assign('web', dowith_include($_REQUEST['w']) );	// 栏目
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类

		// 保存查询条件 
		if($_POST['keyword']){		// 关键字
			$keyword = dowith_include( $_POST['keyword'] );
			$map['content'] = array('like', "%{$keyword}%");
			$this->assign('keyword', $keyword); 
		}	 
		if(intval($_REQUEST['type'])){
			$type = dowith_include( $_POST['type'] );
			$map['status'] = array('eq', $type);
			$this->assign('type', $type);
		}

		if(!empty($_POST["actionName"])){
			$model = D( dowith_include($_POST["actionName"]) );
		}else{
			$model = M("Lreply");
		}    
		//每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = dowith_include( $_REQUEST['numPerPage'] );
		} else {
			$listRows = '15';
		} 
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage = dowith_include( $_REQUEST['pageNum'] );
		}else{
			$nowPage = 1;
		}
		$_GET['p'] = $nowPage;

		//分页数据
		$list = $model->where($map)->select();  
		$count = count($list); 

		// echo $model->getLastSql(); 
	  	//创建分页对象 
		$p = new \Think\Page($count, $listRows); 

	   	//分页数据
		$list = $model->where($map)->order("writetime desc")->limit($p->firstRow.','.$p->listRows)->select(); 
		 // echo $model->getLastSql();  
		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}
		foreach($list as $k=>$v){
			$list[$k]['content']=mb_substr(strip_tags($v['content']),0,50).'...';
		}
		//分页显示
		$page = $p->show(); 		

	 	//模板赋值显示
		$this->assign('list', $list); 
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);

		$this->assign("search",	$search);			//搜索类型
		$this->assign("values",	$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",	dowith_include($count) );			//总条数
		$this->assign("numPerPage",	dowith_include($p->listRows) );		//每页显多少条
		$this->assign("currentPage", dowith_include($nowPage) );			//当前页码
		$this->display();
	}   
	
	// 查看回复
	public function edit() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类

		$model = M("Lreply");
		$id = dowith_include( $_GET['id'] );
		$vo = $model->find($id);
		$this->assign('vo', $vo);
		$this->display();
	}

	// 更新方法
	public function update() {
		// dump($_POST);exit();
		$model = D("Lreply"); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}
		
		$data['id'] = I('post.id', '', 'intval');
		$data['status'] = I('post.status', 2, 'intval');

		// 更新数据
		if(false !== $model->save($data)) {
			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
			} //echo $model->getLastsql();die;
			//成功提示
			$this->success(L('修改成功'));
		} else { 
			//错误提示
			$this->error(L('修改失败'));
		}
	}
	

	// 删除方法，批量删除
	public function delete() { 
		// 删除指定记录
		$model = M("Lreply");
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