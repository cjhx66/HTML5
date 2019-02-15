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
class ContentController extends CommonController{
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
		// 判断站点性质，是微信网站还是PC网站
		$language = I('get.language', 0, 'intval');
		$this->assign('language', $language);

		$dobj = M('Gdeal');
		$gobj = M('Goods');

		// 未发货订单数量
		$num['nosend'] = $dobj->where("pid = 0 and sendstatus = 0")->count();
		// 未签收订单数量
		$num['nocheck'] = $dobj->where("pid = 0 and checkstatus = 0")->count();
		// 未支付订单数量
		$num['nopay'] = $dobj->where("pid = 0 and paystatus = 0")->count();
		// 已成交订单数量
		$num['finish'] = $dobj->where("pid = 0 and sendstatus = 1 and paystatus = 1 and checkstatus = 1")->count();

		// 商品总数
		$num['total'] = $gobj->count();
		// 库存警告商品数
		$num['warn'] = $gobj->where("status = 1 and num <= warnum")->count();
		// 上架商品总数
		$num['sjtotal'] = $gobj->where("status = 1")->count();
		// 精品推荐数
		$num['isjing'] = $gobj->where("status = 1 and is_jing = 1")->count();
		// 新品推荐数
		$num['isnew'] = $gobj->where("status = 1 and is_new = 1")->count();
		// 热销推荐数
		$num['ishot'] = $gobj->where("status = 1 and is_hot = 1")->count();
		// dump($num);exit();
		$this->assign('num', $num);

		// 服务器软件信息
		$software = $_SERVER['SERVER_SOFTWARE'];
		$this->assign('software', $software);

		// 查询数据库版本
		$config = M();
		$dbversion = $config->query("SELECT VERSION()");
		$mysqlversion = $dbversion[0]['VERSION()'];
		$this->assign('mysqlversion', $mysqlversion);

		// 系统时间
		$servertime = date("Y年n月j日 H:i:s");
		$this->assign('servertime', $servertime);

	 	$model = M('Class'); 
		$language = dowith_include( $_REQUEST['language'] );
		//全部列表
		$lang = $model->field("id,pid,path,name,url,concat(path,'-',id) as bspath,writetime,language")->where("language=".$language)->order("orders desc, bspath,id asc")->select();  
		$this->assign('list', $lang);
		$this->display();
	}

	/*  //递归函数 通过递归函数，将数组排列好，在调用tree
	 public function index1(){
	 	$model=M('Module'); 
		$language=$_REQUEST['language'];   
        $cate = getCate(0,$language); 
		dump($cate);		die;
	 	$this->assign('list',$cate);
		$this->display();
	 } */
	  
	 
	 
}