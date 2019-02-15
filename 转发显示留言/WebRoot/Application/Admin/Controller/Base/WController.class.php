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
//用户的站点列表
class WController extends CommonController{
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
	}
	
	public function index(){
		// 表单令牌，解决logout方法时“跨站点请求伪造”漏洞
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );

	  	$veri = dowith_include( intval($_GET['veri']) );
		//存到session里面，
	  	$_SESSION['veri'] = $veri;
		 //接到站点参数
		 if($veri){
		 	$othersite = dowith_include( $_SESSION['rolesitearray'] );
			$a = array_search($veri,$othersite);
			unset($othersite[$a]);  
		 	//去其他站点的信息 
		 	$this->assign('otherweb',$othersite);
			//显示的站点
		 	$this->assign('webid',$veri);
			//显示站点栏目 
			//dump($_SESSION['auth']);die; 
			$this->assign('modulelist', dowith_include($_SESSION['website'][$veri]) );
			
		 }else{
		    //没有接到参数
			//dump($_SESSION['rolesitearray']);die;
		 	//默认站点名字 
			$this->assign('webid', dowith_include($_SESSION[C('USER_AUTH_KEY')]['defaultw']) );
		 	//其他站点的信息 
			//如果没有默认站点，则显示全部站点信息
			if($_SESSION[C('USER_AUTH_KEY')]['defaultw']==0){
				$this->assign('otherweb', dowith_include($_SESSION['rolesitearray']) );
			}else{
				$this->assign('otherweb', dowith_include($_SESSION['other']) );
			} 
			//显示默认栏目 
			$this->assign('modulelist', dowith_include($_SESSION['auth']) );
			
		 }
		  
		$this->display();
		
	 }
	
	
	
	
}