<?php
/**
 *简要说明	
 * @package 		Ch/Emall	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/08	                //最先写的日期
 * @lastmodifide	2014/09/10	                //最后修改日期
 */
namespace Ch\Controller\Emall;
use Think\Controller;

//商品管理列表类
class IndexController extends ComController{
	//商品管理列表
	public function  index(){  

		$lclass  =  M('Gclass'); // 实例化对象
		//递归查询
	 	//$arr=Cate(0); 
		//$this->assign('arr',$arr); 
		//商品类别全部列表
		$lang=$lclass->field("id,pid,path,name,url,concat(path,'-',id) as bspath,writetime,language")->order("bspath,id asc")->select();  
		$this->assign('arr',$lang);
		
		//查询所有品牌列表
		$brand=M('Gbrand');
		$brandlist=$brand->select();
		$this->assign('brandlist',$brandlist);		

		$About  =  M('Goods'); // 实例化对象
		//根据传进来的classID来查询
		$map['status']  =   array('eq',1); 
		$classID  =  $_GET['classID']; 
		if($classID){
			$map['bspath']  =   array('like',"%-".$classID."%");
		}
		//根据传进来的brandID来查询
		$brandID  =  $_GET['brandID'];
		if($brandID){
			$map['bID']  =   array('eq',$brandID); 
		} 
		$count      = $About->where($map)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();
		// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $About->where($map)->order('writetime')->limit($Page->firstRow.','.$Page->listRows)->select();
		 echo $About->getlastsql();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板 
	}


	// 详情	 
	public function detail(){   
		$id=(int)$_GET['id'];
		$About  = M('Goods'); 
		$arr=$About->find($id);
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