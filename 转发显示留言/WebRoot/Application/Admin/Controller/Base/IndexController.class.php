<?php
/**
 *简要说明	
 * @package 		Admin/Base	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/18	                //最后修改日期
 */
namespace Admin\Controller\Base;
use Think\Controller; 

class IndexController extends CommonController {
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
    public function index(){
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
		
    	// 表单令牌，解决logout方法时“跨站点请求伪造”漏洞
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );
		
		$time=time();
		//echo C('IMAGE_SERVER');
		$this->assign('time',$time);
		$this->display("index");
    } 
}