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

//角色列表类
class RoleController extends CommonController{
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

	
  	// 首页
	public function index() {
		//列表过滤器，生成查询Map对象
		$map = $this->_search();
		
		if(method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		//判断采用自定义的Model类
		if(!empty($_POST["actionName"])){
			$model = D( dowith_include( $_POST["actionName"]) );
		}else{
			$model = M("Role");
		}  
		if (!empty($model)) {
			$this->_list($model, $map);
		}  
		
		$this->display();
	}
	
	
	// 添加页面
	public function add() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('time', time() );
		$this->display('add');
	} 
	
	
	//添加角色的方法
	public function insert(){
		$model = D("Role");
		unset ( $_POST [$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		}

		$data['rname'] = I('post.rname', '', 'trim');
		$data['rdesc'] = I('post.rdesc', '', 'trim');

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
	
	
	//编辑角色的页面
	public function edit() {
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌

		$model = M("Role");
		$id = dowith_include( $_REQUEST[$model->getPk()] );
		$vo = $model->find($id);
		$this->assign('vo', $vo);
		$this->display('edit');
	}
	
	
	//更新方法
	public function update() {
		// dump($_POST);die;
		$model = D("Role"); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}

		$data['id'] = I('post.id', '', 'intval');
		$data['rname'] = I('post.rname', '', 'trim');
		$data['rdesc'] = I('post.rdesc', '', 'trim');

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
			$this->error(L('更新失败').$model->getLastSql());
		}
	}
	
	
	//删除方法
	public function delete() {
		//删除指定记录
		$model = M("Role");
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
	
	
  //查询在此角色下的用户列表
	public function inner(){
		$obj = D('Users');
		$id = dowith_include( $_REQUEST['id'] );
		$list = $obj->where('rID='.$id)->select();
		// var_dump($list);die;
		$this->assign('list', $list);
		$this->display('inner');
	} 
	
	
  //查询非在此角色下的用户列表
	public function ninner(){
		$obj = D('Users');
		$id = dowith_include( $_REQUEST['id'] );
		$list = $obj->where('rID!='.$id)->select();
		// var_dump($list);die;
		$this->assign('list', $list);
		$this->display('inner');
	}  
	
	
	//分配站点页面
	public function website(){
		$rID = dowith_include( $_GET['rID'] );
		//获取站点列表
		$model = M('Website');
		$list = $model->select();
		//查询自己有哪些站点
		$role_site = M('Role_site');
		$rolesitelist = $role_site->where('rID='.$rID)->select();
		$array = explode(',', $rolesitelist[0]['wID']);
		// dump($array);die;
		$this->assign('rID', $_GET['rID']);
		$this->assign('list', $list); 
		$this->assign('rolelist', $array); 
		$this->display();
	}
	
	
	//分配站点方法
	public function ch(){ 
		//接到角色id，
		$rID = dowith_include( $_REQUEST['rID'] );
		//查出POST过来的站点的id，一个array
		$w = dowith_include( $_REQUEST['wID'] );
		//dump($w);
		//切割成字符串
		$wID = implode(',', $w);
		//查出角色ID在之前表里存在的站点id		
		$role_site = M('Role_site'); 
		$list = $role_site->where('rID='.$rID)->find(); 
		$listarray = explode(',', $list['wID']);
		// dump($listarray); 
		$Class = M('Class');
		$authModel = M('Auth'); 
		// 如果角色ID的list不存在则post过来的wID下边的全部栏目都存到Auth表里面
		if($list==null){
			$data['rID'] = $rID;
			$data['wID'] = $wID; 
		   //保存当前数据对象
			if ($role_site->add($data)) { //保存成功  
				$arr=$Class->field('id,language')->where('language in ('.$wID.')')->select();
				if(!empty($arr)){	
					foreach($arr as $k => $v){
						$data['rID'] = $rID;
						$data['cID'] = $v['id'];
						$data['wID'] = $v['language'];
						$data['writetime'] = time();
						$authModel->add($data);
					}
				}
			//成功提示
				$this->success(L('新增成功'));
			} else {
			//失败提示
				$this->error(L('新增失败').$role_site->getLastSql());
			} 
		}else{ 
			$data['wID'] = $wID; 		
		   //保存当前数据对象
			if ($role_site->where('rID='.$rID)->save($data)) { //保存成功  
			   //如果角色ID的list存在则修改  
			   //第二次                  1,2   1,2,31  1,2,31,32
			   //先把之前存在，现在不要的删除
				$arr=$Class->field('id,language')->where('language not in ('.$wID.')')->select();
				if(!empty($arr)){
					foreach($arr as $k => $v){
						$where['rID'] = array('eq', $rID);
						$where['cID'] = array('eq', $v['id']);
						$where['wID'] = array('eq', $v['language']); 
						$authModel->where($where)->delete();
					}
				}
				//应该先查出哪个站点的权限已经有了，就不要再加了 交集+新增的 
				//先查出来交集
				$inter = array_intersect($w,$listarray);
				//dump($inter);
				//返回新的数组中不同的地方
				$adiff = array_diff($w,$inter);
				//dump($adiff);
				$diff = implode(',',$adiff);
				//dump($diff);
				//查出需要新增加的站点下边的栏目
				$arr = $Class->field('id,language')->where('language in ('.$diff.')')->select();  
				if(!empty($arr)){	
					foreach($arr as $k => $v){
						$data['rID'] = $rID;
						$data['cID'] = $v['id'];
						$data['wID'] = $v['language']; 
						//if(!$authModel->where($data)->select()){
						$data['writetime'] = time();
						$authModel->add($data);
						//}
					}
				}
				
				$this->success(L('修改成功'));
			} else {
			//失败提示
				$this->error(L('修改失败').$role_site->getLastSql());
			} 
		}

	}
	
	
	//显示角色的站点加站点下面的栏目
	public function channel(){ 
		//接收角色ID
		$rID=$_REQUEST['rID'];
		//接受传过来的数据。站点数据//查出来该角色下的所有站点，
		$role_site=M('Role_site'); 
		$rolesitelist=$role_site->where('rID='.$rID)->find(); 
		//dump($rolesitelist); 
		//通过wID查出每个wID下面的栏目
		$rolelistarray=explode(',',$rolesitelist['wID']); 
		 //dump($rolelistarray);
		$this->assign('web',$rolelistarray);   
		//2014年10月30号，新增加的功能，即，增加和删除站点下栏目的时候，auth表没有自动更新
		//channel方法先更新默认的第一个站点下面的栏目，增加的时候增加，删除的时候删除，	
		//1.先查出当前站点的所有栏目id
		$class=M('class'); 
		$lanmu=$class->where('language='.$rolelistarray[0])->getField('id',true); 
		$lanmuarray=implode(',',$lanmu); 
		// dump($lanmuarray);
		
		//2.查出auth表里面的 当前角色下的，第一个站点下的，cID
		$auth=M('Auth'); 
		$authlanmu=$auth->where('rID ='.$rID.' and wID='.$rolelistarray[0])->getField('cID',true);
		//echo $auth->getlastsql(); 
		//$authlanmuarray=implode(',',$authlanmu); 
		//dump($authlanmuarray);
		
		 //3.同分配站点的ch方法，2跟1交集保留，1跟2的交集删除，新增加的就添加
		$diff1=array_diff($lanmu,$authlanmu);
		$diff1array=implode(',',$diff1);
		  // dump($diff1);
		$diff2=array_diff($authlanmu,$lanmu);
		$diff2array=implode(',',$diff2); 
		//  dump($diff2);
		
		    //11月5日如果两个diff都是空的，并且auth表里面没有他们的ID的记录，则直接添加上步骤1新查出来的栏目。
		$old=$auth->where('rID ='.$rID.' and wID='.$rolelistarray[0].' and cID in ('.$lanmuarray.')')->select(); 
		  if(empty($diff1) && empty($diff2) && empty($old)){//必须全部符合，才能往表里添加数据，防止重复添加
		  	foreach($lanmu as $k => $v){
		  		$data['rID'] = $rID;
		  		$data['cID'] = $v;
		  		$data['wID'] = $rolelistarray[0]; 
						//if(!$auth->where($data)->select()){
		  		$data['writetime'] = time();
		  		$auth->add($data);
						//}
		  	}
		  	
		  	
		  }else{
		  	 //4.根据最新的查出的列表来更新auth表  先删除，再添加
		  	$auth->where('rID ='.$rID.' and wID='.$rolelistarray[0].'  and cID in ('.$diff2array.')')->delete();
		  	if(!empty($diff1)){	
		  		foreach($diff1 as $k => $v){
		  			$data['rID'] = $rID;
		  			$data['cID'] = $v;
		  			$data['wID'] = $rolelistarray[0]; 
						//if(!$auth->where($data)->select()){
		  			$data['writetime'] = time();
		  			$auth->add($data);
						//}
		  		}
		  	} 
		  	
		  }
		  
		//默认显示第一个站点下面的权限列表 
		//按照bspath排序
		  $authsql="select a.*,b.id as bid,b.pid,b.path,concat(b.path,'-',b.id) as bspath from cms_auth a, cms_class b where a.rID=".$rID." and a.wID in (".$rolelistarray[0].")  and a.cID=b.id order by bspath"; 
		  $authlist=$auth->query($authsql); 
		  foreach($authlist as $k=>$v){
		  	$authlist[$k]['count']=count(explode('-',$v['bspath']))-2;
		  }
		  $this->assign('authlist',$authlist);
		  $this->display();
		}
		
	//2014年10月30号，新增加的功能，即，增加和删除站点下栏目的时候，auth表没有自动更新
	//load方法更新切换过来的站点下面的栏目，增加的时候增加，删除的时候删除
	//ajax接收load过来的站点下面的栏目auth
		public function load(){ 
			$wID=$_POST['id']; 
			$rID=$_POST['rID'];  
			
		//1.先查出当前默认站点的所有栏目id
			$class=M('class'); 
			$lanmu=$class->where('language='.$wID)->getField('id',true); 
			$lanmuarray=implode(',',$lanmu); 
		//dump($lanmuarray);

			
		//2.查出auth表里面的 当前角色下的，第一个站点下的，cID
			$auth=M('Auth'); 
			$authlanmu=$auth->where('rID ='.$rID.' and wID='.$wID)->getField('cID',true); 
			
		 //3.同分配站点的ch方法，2跟1交集保留，1跟2的交集删除，新增加的就添加
			$diff1=array_diff($lanmu,$authlanmu);
			$diff1array=implode(',',$diff1);
		 // dump($diff1array);
			$diff2=array_diff($authlanmu,$lanmu);
			$diff2array=implode(',',$diff2); 
		 // dump($diff2array);
			
		   //11月5日如果两个diff都是空的，并且auth表里面没有他们的ID的记录，则直接添加上步骤1新查出来的栏目。
			$old=$auth->where('rID ='.$rID.' and wID='.$wID.' and cID in ('.$lanmuarray.')')->select(); 
		  if(empty($diff1) && empty($diff2) && empty($old)){//必须全部符合，才能往表里添加数据，防止重复添加
		  	foreach($lanmu as $k => $v){
		  		$data['rID'] = $rID;
		  		$data['cID'] = $v;
		  		$data['wID'] = $wID; 
						//if(!$auth->where($data)->select()){
		  		$data['writetime'] = time();
		  		$auth->add($data);
						//}
		  	}
		  	
		  	
		  }else{
		  	
		  	
		 //4.根据最新的查出的列表来更新auth表  先删除，再添加
		  	$auth->where('rID ='.$rID.' and wID='.$wID.'  and cID in ('.$diff2array.')')->delete();
		  	if(!empty($diff1)){	
		  		foreach($diff1 as $k => $v){
		  			$data['rID'] = $rID;
		  			$data['cID'] = $v;
		  			$data['wID'] = $wID; 
						//if(!$auth->where($data)->select()){
		  			$data['writetime'] = time();
		  			$auth->add($data);
						//}
		  		}
		  	}  
		  }
		  
		  
		  $authsql="select a.*,b.id as bid,b.pid,b.path,concat(b.path,'-',b.id) as bspath from cms_auth a, cms_class b where a.rID=".$rID." and a.wID =".$wID."  and a.cID=b.id order by bspath"; 
		  $authlist=$auth->query($authsql); 
		  foreach($authlist as $k=>$v){
		  	$authlist[$k]['count']=count(explode('-',$v['bspath']))-2;
		  }
		  $this->assign('authlist',$authlist);
		  $this->display();
		}
		
		
	//ajax分配权限事务处理
		public function chzend(){  
			if(IS_AJAX){
				if( !empty($_POST['id']) ){
					$model = M('Auth');
					$flag = true;
				//开始事物处理
					$model->query('SET autocommit = 0');
					foreach($_POST['id'] as $key => $val){
						$where = 'id = '.(int)$key;
						$res = $model->where($where)->save($val);
						if($res === false){
							$flag = false;
						}
					}
					if($flag){
					//提交
						$model->query('commit');
						$model->query('SET autocommit = 1');
						$data['status'] = 1;
						$data['msg'] = '分配权限成功';
					}else{
					//回滚
						$data['status'] = 0;
						$data['msg'] = '分配权限失败1';
						$model->query('rollback');
						$model->query('SET autocommit = 1');
					}
					
					$this->ajaxReturn($data, 'json');
				}
				$data['status'] = 0;
				$data['msg'] = '分配权限失败';
				$this->ajaxReturn($data, 'json');
				
			}	
		}
		
	}