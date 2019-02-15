<?php
/**
 *简要说明	
 * @package 		Ch/Cms	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/20	                //最后修改日期
 */
namespace Ch\Controller\Cms;
use Think\Controller;

//新闻列表类
class NewsController extends ComController{ 
  	  //项目新闻
	  public function  index(){  
		$News       = M('News'); // 实例化User对象
		//$map['classID'] =array('eq',array(2,3));
		//$map['id'] = array(array('gt',1),array('lt',10)) ;
		//$map['title']  = array(array('like','%a%'), array('like','%b%'), array('like','%c%'), 'ThinkPHP','or'); 
		/* $map['title'] =array('like',array('%thinkphp%','%tp'),'OR');
		$map['classID'] =array('eq',array(2,3));
		$list = $News->where($map)->order('writetime') ->select();
		echo $News->getLastsql();
		dump($list);die; */
		$count      = $News->where('status=1 and classID=2')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $News->where('status=1 and classID=2')->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板 
	 } 
	 
	 
	 //项目新闻详情	 
	 public function  infor(){   
	 	$id=(int)$_GET['id'];
		$News  = M('News'); 
		$arr=$News->find($id);
		if($arr){
			if($arr['status']==1){
				$this->assign('arr',$arr);
				
				//上一篇
				$parr=$News->where("id>".$arr["id"]." and classID=2 and status=1")->order("id asc")->find();
				if($parr){
					$this->assign("parr",$parr);
				}else{
					$this->assign("parr",0);
				}
				//下一篇
				$narr=$News->where("id<".$arr["id"]." and classID=2 and status=1")->order("id desc")->find();
				if($narr){
					$this->assign("narr",$narr);
				}else{
					$this->assign("narr",0);
				}
				
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
	 
	 
	  //集团新闻	 
	 public function  group(){   
	 	$News       = M('News'); // 实例化User对象
		$count      = $News->where('status=1 and classID=3')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $News->where('status=1 and classID=3')->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); 
	 } 
	 //集团新闻详情
	 public function  groupinfor(){  
		$id=(int)$_GET['id'];
		$News  = M('News'); 
		$arr=$News->find($id);
		if($arr){
			if($arr['status']==1){
				$this->assign('arr',$arr);
				
				//上一篇
				$parr=$News->where("id>".$arr["id"]." and classID=3 and status=1")->order("id asc")->find();
				if($parr){
					$this->assign("parr",$parr);
				}else{
					$this->assign("parr",0);
				}
				//下一篇
				$narr=$News->where("id<".$arr["id"]." and classID=3 and status=1")->order("id desc")->find();
				if($narr){
					$this->assign("narr",$narr);
				}else{
					$this->assign("narr",0);
				}
				
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