<?php
/**
 *简要说明	
 * @package 		Ch/Cms	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/24	                //最后修改日期
 */
namespace Ch\Controller\Cms;
use Think\Controller;

//历史管理列表类
class HistoryController extends ComController{ 
  	  
	 
	  //历史列表
	  public function  index(){  
		$History       = M('History'); // 实例化User对象
		$count      = $History->where('status=1 and classID=10')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $History->where('status=1 and classID=10')->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板 
	 } 
	 
	 
	 // 详情	 
	 public function  infor(){   
	 	$id=(int)$_GET['id'];
		$History  = M('History'); 
		$arr=$History->find($id);
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