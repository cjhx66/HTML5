<?php
/**
 *简要说明	
 * @package 		Ch/Emall	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/09/05	                //最后修改日期
 */
namespace Ch\Controller\Emall;
use Think\Controller;

//生成订单管理类
class OrderController extends ComController{ 
	//判断用户是否登录
	public function _initialize() {  
		if (!isset($_SESSION['memberid'])) {
			$this->assign('jumpUrl', __MODULE__.'/Mcenter/Login/login');
			$this->error('请先登录');
		}
	}
	//我的订单
	public function myorder(){
		$Gdeal=M("Gdeal");
		$uid=intval($_SESSION['memberid']);  
		$map['uid'] = array('eq',$uid);
		$map['status'] = array('eq', 1);
		$count = $Gdeal->where($map)->count(); 
		$Page = new \Think\Page($count,10); 
		$show = $Page->show(); 
		$list = $Gdeal->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//echo $Gdeal->getlastsql(); 
		$this->assign('page',$show); 
		if($uid){
			if ($list){
				$this->assign("list",$list);
				$this->display();
			}else{
				$this->error("亲，暂时还没下单哦！");
			}
		}else{
			$this->error("亲， 还没有登陆哦！");
		}
	}
	
	
	//删除订单
	public function del_order(){
		$id=$_GET['id'];
		$obj=M("Gdeal");
		$data['status'] = 2;		// 修改状态为对用户隐藏
		$res=$obj->where("id=$id")->save($data);
		if($res>0){
			$this->assign("jumpUrl",__MODULE__.'/Emall/Order/myorder');
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	
	
	//核对订单信息页面
	public function sorder(){
		$MemberID=intval($_SESSION['memberid']);
		$shopcarid=rtrim($_GET['class'],',');
		$mod=M("Gaddress");
		$res=$mod->where("mid=$MemberID")->order("status desc")->select();

		$listid=$_GET["class"];		// 获取商品id
		$listid=rtrim($listid,',');
		// echo $listid;die;
		if($MemberID){
			$obj=M("Gshoplist");
			$sql="select * from cms_gshoplist where id in ($listid) and mid = $MemberID";
			$shopping_car=$obj->query($sql);
			// dump($shopping_car);die;
			$total_price=0;
			$total_num=0;
			foreach($shopping_car as $val){		//计算总数量和总价格
				$total_price+=$val["price"]*$val["buynum"];
				$total_num+=$val["buynum"];
			}
			//echo $mod->getlastsql();

			$obj=M("Member");
			$arr=$obj->where("id=$MemberID")->find();
			$this->assign("arr",$arr);
			$this->assign("list",$shopping_car);
			$this->assign("total_price",$total_price);
			$this->assign("total_num",$total_num);
			$this->assign("res",$res);
			$this->assign("shopcarid",$shopcarid);
			$this->assign('MemberID',$MemberID);
			$this->display();
		}else{
			$url=__MODULE__.'/Mcenter/Login/login';
			redirect($url); 	
		}
	}
	
	// 提交订单入库方法  --  每次结算一次，生成一个订单
	public function addorder(){
		$MemberID=intval($_SESSION['memberid']);
		if($MemberID){
			$obj = M("Gdeal");
			// $arr = $_POST;dump($arr);exit;
			$shopcar_id = $_POST['shopcarid'];	//去结算的购物车的id
			$address = (string)$_POST['address'];
			$num = do_order();		// 生成订单号
			// 新生成订单时，默认pid为0
			$data['pid'] = 0;

			$data['goodsid'] = implode(',', $_POST['id']);			// 商品id
			$data['buynum'] = implode(',', $_POST['buynum']);		// 商品数量
			$data['color'] = implode(',', $_POST['color']);			// 商品颜色
			$data['size'] = implode(',', $_POST['size']);			// 商品尺寸
			$data['content'] = implode('&&', $_POST['intro']);		// 商品描述
			
			$data['uid'] = $MemberID;								// 用户id
			$data['address'] = $_POST['address'];					// 收货地址
			$data['post'] = $_POST['youbian'];						// 邮编
			$data['shr'] = $_POST['shr'];							// 收货人
			$data['phone'] = $_POST['phone'];

			$data['num'] = $num;									// 订单号
			$data['totalprice'] = $_POST['total_price'];			// 订单总价格
			$data['dealtime'] = time();								// 下单时间
			// dump($data);exit;
			$res = $obj->add($data);

			if($res){
				// 从购物车中删除对应的商品
				$mod=M("Gshoplist");
				$mod->where("id in (".$shopcar_id.")")->delete();

				// 将每件商品信息插入到订单详情表中
				$gdobj = M('Gdealdetail');
				$count = count($_POST['id']);
				for($i = 0 ; $i < $count ; $i++){
					$detail['did'] = $res;
					$detail['goodsid'] = $_POST['id'][$i];
					$detail['price'] = $_POST['price'][$i];
					$detail['buynum'] = $_POST['buynum'][$i];
					$detail['totalprice'] = $_POST['total'][$i];
					$detail['color'] = $_POST['color'][$i];
					$detail['size'] = $_POST['size'][$i];
					$detail['content'] = $_POST['intro'][$i];
					$detail['writetime'] = time();

					$gdobj->add($detail);
				}


				$url=__MODULE__.'/Emall/Order/chenggong';
				redirect($url);
			}

		/*	for($i=0;$i<count($arr['id']);$i++){
				//产品信息
				$list[$i]['goodsid']=$arr['id'][$i];//产品id 
				$list[$i]['dealnum']=$arr['buynum'][$i];//产品数量 
				$list[$i]['color']=$arr['color'][$i];//颜色
				$list[$i]['size']=$arr['size'][$i];//尺寸
				//用户收货地址
				$list[$i]['uid']=$MemberID; //用户id
				$list[$i]['address']=$address;//省市区+详细地址
				$list[$i]['post']=$_POST['youbian'];//邮编
				//$list[$i]['shr']=$_POST['shr'];//用户名 
				
				//$list[$i]['price']=str_replace("元", "", $arr['price'][$i]);
				//$lit[$i]['rmprice']=str_replace("元", "", $arr['rmprice'][$i]);
				//$list[$i]['buynum']=$arr['buynum'][$i];
				
				//订单信息
				$list[$i]['content']=$arr['intro'][$i];//备注
				$list[$i]['totalprice']=$arr['price'][$i]*$arr['buynum'][$i];//总价
				$list[$i]['dealtime']=time(); //添加时间
				$list[$i]['num']=do_order();//生成订单号
			}
			dump($list);die;
		
			if($list[0]["goodsid"]){
				$num=0;
				for ($i=0; $i <count($list) ; $i++) { 
					$res=$obj->add($list[$i]);
					if($res>0){
						$num++;
					}
				}
			}else{
				$this->error("请选择商品后再来提交哦");exit;
			}	

			if($num>0){
				$mod=M("Gshoplist");
				$mod->where("id in (".$shopcar_id.")")->delete();
				// echo $mod->getlastsql();die;
				$url=__MODULE__.'/Ch/Emall/Order/chenggong';
				redirect($url); 
			}else{
				$this->error("提交订单失败");
			}	*/
		}else{
			$url=__MODULE__.'/Mcenter/Login/login';
			redirect($url); 
		}
		
	}

	
	

	public function mmxg(){
		$this->display();
	}

	public function chenggong(){
		$this->display();
	}
	public function submit(){
		$this->_subAction('Member');
	}
}