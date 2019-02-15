<?php
/**
 *简要说明	
 * @package 		Admin/Base             //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/20	                //最后修改日期
 */
namespace Admin\Controller\Base;
use Think\Controller;

//栏目列表类
class ClassController extends CommonController{
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

	public function index(){
		// 通过语言来分类
		$language = dowith_include( $_REQUEST['language'] );
		$map['language'] = array('eq', $language); 
		$this->assign('language', $language);

		if(!empty($_POST["actionName"])){
			$model = D( dowith_include($_POST["actionName"]) );
		}else{
			$model = M("Class");
		}

		// 每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = dowith_include($_REQUEST['numPerPage']);
		} else {
			$listRows = '1000';
		} 
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage = dowith_include($_REQUEST['pageNum']);
		}else{
			$nowPage = 1;
		}
		$_GET['p'] = $nowPage;
		
		// 分页数据
		$lang = $model->field("id,pid,name,url,concat(path,'-',id) as bspath,writetime,language")->where("language=".$language)->order("orders desc, bspath,id asc")->select();  
		$count = count($lang); 

		//创建分页对象 
		$p = new \Think\Page($count, $listRows); 

		   //分页数据
		$lang = $model->field("id,pid,name,url,concat(path,'-',id) as bspath,writetime,language")->where("language=".$language)->order("orders desc, bspath,id asc")->limit($p->firstRow.','.$p->listRows)->select(); 
		foreach($lang as $k=>$v){
			$lang[$k]['count']=count(explode('-',$v['bspath']))-2;
		} 
		$list['module']=$lang;
		$list['count']=$count;  
	 	// dump($lang['count']);die; 
		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}

		// 分页显示
		$page = $p->show(); 		
		
	 	// 模板赋值显示
		$this->assign('list', $list);
		$this->assign('lang', $lang); 
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);
		
		$this->assign("search", $search);			//搜索类型
		$this->assign("values",	$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",	dowith_include($count) );			//总条数
		$this->assign("numPerPage",	dowith_include($p->listRows) );		//每页显多少条
		$this->assign("currentPage", dowith_include($nowPage) );			//当前页码
		$this->display();
		return;
	} 
	
	
	// 增加栏目页面
	public function add(){
		$this->assign('language', dowith_include($_REQUEST['language']) );	// 所属站点
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类
		$this->assign('time', time() );

		$pid = $_GET['pid']; 
		$name = $_GET['name']; 
		$obj = M('Class');
		$arr = $obj->where("id='%d'", array($pid))->select();
		// dump($arr[0]['path']);die;
		$this->assign('pid',$pid);		
		$this->assign('path',$arr[0]['path']);		
		$this->assign('name',$name);		
		$this->assign('id',$_REQUEST['id']);

		$this->display();
	}


	 //添加栏目方法
	public function insert(){
		// dump($_POST);exit();
		$model = D("Class");
		unset ( $_POST [$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		}

		$data['name'] = I('post.name', '', 'htmlspecialchars');
		$data['pid'] = I('post.pid', 0, 'intval');
		$data['path'] = I('post.path', '', 'trim');
		$data['Intro'] = I('post.Intro', '', 'strip_tags');
		$data['url'] = I('post.url', '', 'strip_tags');
		$data['view'] = I('post.view', '', 'strip_tags');
		$data['orders'] = I('post.orders', 'z', 'htmlspecialchars');
		$data['status'] = I('post.status', 2, 'intval');
		$data['writetime'] = I('post.writetime', '', 'intval');
		$data['language'] = I('post.language', '', 'intval');
		// dump($data);exit();

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


	// ajax获取当前栏目的path
	public function path(){
		$obj = M('Class');
		$id = $_POST['id'];
		$list = $obj->where("id=$id")->find();
		echo $list['path'];
	}


	//编辑栏目页面	 
	public function edit(){
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类
		
		$id = $_GET['id'];
		$language = $_GET['language'];  
		$obj = M('Class');	
        //获取当前栏目的的pid,	
		$arr = $obj->find($id);
		//获取当前栏目的子分类，有，yes,走set   没有 no，走update
		//拼接自己的path-自己的id
		$arrpath=$arr['path'].'-'.$arr['id']; 
		//dump($arrpath);die;		
		//查询子分类
		$zilan=$obj->where("path like '%".$arrpath."%'")->select(); 
		//dump($zilan);die;
		$this->assign('vo', $arr);	
		$this->assign('zilan', $zilan);	
		//dump($arr);die;
		//获取所有栏目
		$list=$obj->field("id,pid,name,concat(path,'-',id) as bspath,url,language")->where("language=".$language)->order("bspath,id asc")->select(); 
		$option="";
		foreach($list as $k=>$v){
			$option .='<option value="'.$v['id'].'"'.($arr["pid"]==$v['id']?"selected":"").'>' .str_repeat ( '|—', count ( explode ( '-', $v['bspath'] ) )-2 ) .$v['name'] . '</option>';
		}
		//dump($option);die; 
		$this->assign('option',$option);

		$this->display();
	}


	 //更新方法，没有子栏目，就更新自己
	public function update() { 
		//echo 'update';die;
		$model = D('Class'); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}

		$data['id'] = I('post.id', '', 'intval');
		$data['name'] = I('post.name', '', 'htmlspecialchars');
		$data['pid'] = I('post.pid', 0, 'intval');
		$data['path'] = I('post.path', '', 'trim');
		$data['Intro'] = I('post.Intro', '', 'strip_tags');
		$data['url'] = I('post.url', '', 'strip_tags');
		$data['view'] = I('post.view', '', 'strip_tags');
		if($_POST['orders']){
			$data['orders'] = I('post.orders', '', 'htmlspecialchars');	
		}
		$data['status'] = I('post.status', 2, 'intval');

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


     //有子栏目，yes,走set 修改栏目,带着子栏目一起走
	public function set() {
		//echo 'set';die;	
		$post = $_POST;
		//dump($post);die;
		$model = D("Class");  
		$id = $post['id']; 
		//查询当前栏目的详情
		$arr = $model->find($id);
		//拼接自己的path-自己的id
		$arrpath = $arr['path'].'-'.$arr['id'];  
		//查询子分类
		// $zilan = $model->where("path like '%".$arrpath."%'")->select();  
		$zilan = $model->where("path regexp '^".$arrpath."$'")->select();
		 //dump($post['path']); 
		$model->create();

		$data['id'] = I('post.id', '', 'intval');
		$data['name'] = I('post.name', '', 'htmlspecialchars');
		$data['pid'] = I('post.pid', 0, 'intval');
		$data['path'] = I('post.path', '', 'trim');
		$data['Intro'] = I('post.Intro', '', 'strip_tags');
		$data['url'] = I('post.url', '', 'strip_tags');
		$data['view'] = I('post.view', '', 'strip_tags');
		if($_POST['orders']){
			$data['orders'] = I('post.orders', '', 'htmlspecialchars');	
		}
		$data['status'] = I('post.status', 2, 'intval');

		if(false !== $model->save($data)) {
			//循环更新自己的子栏目的path
			foreach($zilan as $k=>$v){
				$zilan[$k]['path']=str_replace($arr['path'],$post['path'],$zilan[$k]['path']); 
					//str_replace(当前一级栏目之前的path,传过来的path，$zilan[$k]['path']) 
				$sql="update cms_class set path='".$zilan[$k]['path']."' where id=".$v['id'];
				$model->query($sql);

				// 更新所有子栏目的orders字段
				$save['orders'] = $data['orders'];
				$model->where("id = ".$v['id'])->save($save);
			}

			//成功提示
			$this->success(L('更新成功'));
		} else { 
			//错误提示
			$this->error(L('更新失败'));
		}

	}


	// 删除栏目，连带着子栏目一起删
	public function delete() {
		//删除指定记录
		$model = M("Class");
		if (!empty($model)) {
			$pk = $model->getPk(); 
			$id = $_REQUEST[$pk]; 
			if (isset($id)) { 
				//查找该栏目的path
				$arr=$model->find($id);
				$arrpath=$arr['path']."-".$arr['id'];
				//dump($arr['path']);die;
			 	//查找该栏目下有没有子栏目，
				//没有子栏目的直接删自己
				
				//有子栏目的呆着子栏目一起删，
				//$zilist=$model->where("path like '%".$arrpath."%'")->select(); 
				if (false !== $model->where("id =".$id." or path regexp '^".$arrpath."$'")->delete()) {
					$this->success(L('删除成功'));
				} else {
					// echo $model->getLastSql();
					$this->error(L('删除失败'));

				} 
			} else {
				$this->error('非法操作');
			}
		}
	}



}