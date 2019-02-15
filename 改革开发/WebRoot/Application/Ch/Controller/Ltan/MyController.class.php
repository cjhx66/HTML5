<?php
/**
 *简要说明	
 * @package 		Home/Ch/Ltan	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/13	                //最先写的日期
 * @lastmodifide	 			               //最后修改日期
 */
namespace Ch\Controller\Ltan;
use Think\Controller;

//我的帖子管理类
class MyController extends ComController{ 
	  public function  _initialize(){
	 	 if (!isset($_SESSION['memberid'])) {
			$this->assign('jumpUrl', __MODULE__.'/Mcenter/Login/login');
			$this->error('请先登录');
			}
	  }
	  
	  //我的帖子管理类 
	  public function index(){ 
		$About  =  M('Lthread'); // 实例化对象 
		//自己的帖子
		$sessionid=(int)$_SESSION['memberid'];
		$map['status']  =   array('eq',1);   
		$map['mid']  =   array('eq',$sessionid);   
		$count      = $About->where($map)->count();// 查询满足要求的总记录数 
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $About->where($map)->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		echo $About->getlastsql();
		//dump($list);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出  
		$this->display();
	}
	
	
	  //我的回复管理类 
	  public function huifu(){  
		$About  =  M('Lreply'); // 实例化对象 
		//自己的帖子
		$sessionid=(int)$_SESSION['memberid'];
		$map['status']  =   array('eq',1);   
		$map['mid']  =   array('eq',$sessionid);   
		$count      = $About->where($map)->count();// 查询满足要求的总记录数 
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $About->where($map)->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		//dump($list);
		echo $About->getlastsql();
		//dump($list);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出  
		$this->display();
	}
}