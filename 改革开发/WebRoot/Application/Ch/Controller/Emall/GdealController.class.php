<?php
/**
 *简要说明	
 * @package 		Ch/Emall	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @modify			xianhui						//xianhui
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/10	                //最先写的日期
 * @lastmodifide	待定		                //最后修改日期
 */
namespace Ch\Controller\Emall;
use Think\Controller;

//订单类
class GdealController extends ComController{
	//判断用户是否登录
	public function _initialize() {  
   		if (!isset($_SESSION['memberid'])) {
			$this->assign('jumpUrl', __MODULE__.'/Mcenter/Login/login');
			$this->error('请先登录');
		}
	}

  	// 缺货登记页面
	public function index(){
		$this->display('index');
	}


	// 缺货登记处理
	public function book(){
		// dump($_POST);exit;

		// 用户信息暂时没填
		if($_SESSION['membername']){

			$obj = M('Gbook');
			if($obj->create()){
			$obj->status = 2;
			$obj->uid = (int)$_SESSION['memberid'];
			$obj->writetime = time();
			$count = $obj->add();
			if($count){
			    $this->success(L('成功'));
			}else{
				$this->error(L('失败'));
			}
		}
		
		// dump($count);exit;
		}
	}


	 //项目新闻详情	 
	public function  infor(){   
		$id=(int)$_GET['id'];
		$News  = M('News'); 
		$arr=$News->find($id);
		if($arr){
			if($arr['status']==1){
				$this->assign('arr',$arr);
				$this->display();
			}else{
				//状态不对
				echo '404';
			} 
		}else{
			//ID不存在
			echo '404';
		} 
	}

}