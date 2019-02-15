<?php
/**
 *简要说明	
 * @package 		Ch/Cms	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/25	                //最后修改日期
 */
namespace Ch\Controller\Cms;
use Think\Controller;

//投票类
class VoteController extends ComController{ 
  	    //投票列表
	  public function  index(){  
		$Vote       = M('Vote');  
		$count      = $Vote->where('status=1 and classID=20')->count(); 
		$Page       = new \Think\Page($count,10);  
		$show       = $Page->show(); 
		$list = $Vote->where('status=1 and classID=20')->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板 
	 } 
	 
	 
	 // 详情	 
	 public function  infor(){   
	 	$id=(int)$_GET['id'];
		$Vote  = M('Vote'); 
		$arr=$Vote->find($id);
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

	//投票方法
	public function test(){
		$id=$_POST['setid']; 
		$ip=$_SERVER['REMOTE_ADDR'];
		$obj=D("voteip");
		$list=$obj->where("ip='{$ip}' and sid={$id}")->find();
		//如果此ip没有投过，
		if(!$list){				
				$clicknum=1;
				$sid=intval($id);
				$hittime=time();
				$sql="insert into cms_voteip values('','{$sid}','{$hittime}','{$clicknum}','{$ip}')";		
				$row=$obj->query($sql);
				M("Vote")->where("id=$id")->setinc("orders");
				if(count($row)==0){
					echo '1';
				}
		}else{//如果此ip已经投过， 则24小时之内只能投一次，
			$time2=time();
			$date=$time2-$list['hittime']; 
			if($date>24*3600){
				M("Vote")->where("id=$id")->setinc("orders");
				$sql="update cms_voteip set clicknum=1,hittime={$time2} where id={$list['id']}";
				$obj->query($sql); 
			}else{ 
				if($list['clicknum']<1){
					$obj->setinc("clicknum","id={$list['id']}");
				  M("Vote")->where("id=$id")->setinc("orders");
					echo "11";
				}else{ 
					echo "no";
					
				}
			
			}
		
		}
 
	}
}