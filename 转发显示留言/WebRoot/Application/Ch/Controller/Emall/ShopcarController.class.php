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

//购物车管理类
class ShopcarController extends ComController{ 
	//判断用户是否登录
	public function _initialize() {  
   		if (!isset($_SESSION['memberid'])) {
			$this->assign('jumpUrl', __MODULE__.'/Mcenter/Login/login');
			$this->error('请先登录');
		}
	}

	//我的购物车
	public function shopcar(){
		 $uid=$_SESSION['memberid'];
		if($uid){
			$obj=M("Gshoplist");
			$list=$obj->where("mid=$uid")->select();
			// dump($list);
			$tatal_price=0;
			$tatal_num=0;
			foreach($list as $val){		//计算总数量和总价格
				$tatal_price+=$val["price"]*$val["buynum"];
			}
			// dump($list);die;
			$this->assign("tatal_price",$tatal_price);
			$this->assign("plogin","alogin");
			$this->assign("list",$list);
		}else{
			$this->assign("plogin","plogin");
		}  
		$this->display();
	}


	//添加购物车
	public function addshopcar(){
		$id=(int)$_POST["goodsid"];
		// 先判断购物车中是否已经存在此商品，存在则将信息整合，否则生成新的购物车信息
		$gsobj = M('Gshoplist');
		$exist = $gsobj->where('goodsid = '.$id)->find();
		if(!$exist){	// 取反为不存在此商品
			$uid=(int)$_SESSION['memberid'];//获取登陆用户uid
			$id=(int)$_POST["goodsid"]; //获取产品id
			$price=(int)$_POST["price"];//获取产品价格 
			$color=(int)$_POST["color"];//获取产品颜色 
			$size=(int)$_POST["size"];//获取产品颜色 
			$buynum=(int)$_POST["buynum"];//获取产品的数量
			$huohao=(int)$_POST["huohao"];//获取产品的货号
			$intro=$_POST['intro']; //获取post过来的备注信息
			$title=$_POST['title']; //获取post过来的标题
			//dump($_POST);die;
			$mod=M("Goods");
			$res=$mod->where("id=$id")->find();//查出获取id的产品的详情
			if($uid){
				$obj=M("Gshoplist");
				if($obj->create()){
					$total=intval($buynum*$price);//总价获取所有的总价格
					$obj->mid=$uid;
					$obj->title=$title; //标题
					$obj->huohao=$huohao; //货号 
					$obj->color=$color; //颜色 
					$obj->size=$size; //号码
					$obj->total=$total; //总价
					$obj->intro=$intro; //备注
					$obj->writetime=time(); //加入购物车时间
					$res=$obj->add();
					if($res){
						echo "success";
					}else{
						echo "error";
					}
				}else{
					$this->error($obj->getError());
				}
			}else{
				echo "plogin";
			}
		}else{
			// 如果已经存在，则给出已存在提示
			echo 'error1';
		}		
	}


	//ajax加法与减法
	public function ajaxPlus(){
		$obj=M("Gshoplist");
		$id=intval($_POST['id']);
		$uid=$_SESSION['memberid'];
		$res=$obj->where("id=$id and mid=$uid")->getField('price');
		$data['buynum']=intval($_POST['buynum']);
		$data['total']=intval($res)*intval($_POST['buynum']);
		$xiaoji=$data['total'];
		$list=$obj->where("id=$id and mid=$uid")->save($data);
		$tatal_price=0;
		$tatal_num=0;
		$shopping_car=$obj->where("mid=$uid")->select();
		foreach($shopping_car as $val){//计算总数量和总价格
			$tatal_price+=$val["price"]*$val["buynum"];
			$tatal_num+=$val["buynum"];
		}
		//echo json_encode(array('tprice'=>$tatal_price,'xiaoji'=>$xiaoji));
		//'{"price:"'.$tatal_price.',"num":'.$tatal_num.'}';
		echo $tatal_price;
	}
/* 	//ajax减法
	public function ajaxSubtract(){
		$obj=M("Gshoplist");
		$id=intval($_GET['id']);
		$uid=$_SESSION['memberid'];
		$uid=1;
		$list=$obj->where("id=$id and uid=$uid")->setDec("num");
		$tatal_price=0;
		$tatal_num=0;
		$shopping_car=$obj->where("uid=$uid")->select();
		foreach($shopping_car as $val){//计算总数量和总价格
			$tatal_price+=$val["memprice"]*$val["num"]+$val["postage"]*$val["num"];
			$tatal_num+=$val["num"];
		}
		echo json_encode(array('price'=>$tatal_price));
	} */
	//删除商品
	public function del_car(){
		$obj=M("Gshoplist");
		$id=(int)$_GET['id'];
		$res=$obj->where("id = $id ")->delete();
		if($res !==false ){
			$url=__MODULE__.'/Emall/Shopcar/shopcar';
			redirect($url);
		}else{
			$this->error("删除失败");
		}
	}
}

 ?>