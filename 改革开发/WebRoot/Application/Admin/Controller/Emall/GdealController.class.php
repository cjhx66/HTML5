<?php
/**
 *简要说明	
 * @package 		Admin/Emall	            	//所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @modify 		    xianhui<1024362476@qq.com>	//作者xianhui
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/11	                //最先写的日期
 * @lastmodifide	待定		                //最后修改日期
 */
namespace Admin\Controller\Emall;
use Think\Controller;

// 商品订单管理类
class GdealController extends ComController{ 

	// 订单列表
	public function index(){
		// 已经合并过的订单，不显示，显示在回收站中
		$map['pid'] = array('eq', 0);

		// 保存查询条件
		// 订单号
		if($_REQUEST['keyword']){
			$map['num']=array('like', "%{$_REQUEST['keyword']}%"); 
		}	

		// 订单状态
		if(intval($_REQUEST['status'])){
			if(intval($_REQUEST['status']) == 1){
				$map['paystatus'] = array('eq',1);
			}
			if(intval($_REQUEST['status']) == 2){
				$map['paystatus'] = array('eq',0);
			}
			if(intval($_REQUEST['status']) == 3){
				$map['sendstatus'] = array('eq',1);
			}
			if(intval($_REQUEST['status']) == 4){
				$map['sendstatus'] = array('eq',0);
			}
			if(intval($_REQUEST['status']) == 5){
				$map['checkstatus'] = array('eq',1);
			}
			if(intval($_REQUEST['status']) == 6){
				$map['checkstatus'] = array('eq',0);
			}
			if(intval($_REQUEST['status']) == 7){
				$map['paystatus'] = array('eq',1);
				$map['sendstatus'] = array('eq',1);
				$map['checkstatus'] = array('eq',1);
			}
			$this->assign('status', $_REQUEST['status']);
		}

		// 订单开始时间和当前时间，为查询订单使用
		if($_REQUEST['start_time']){
			$start_time = strtotime($_REQUEST['start_time']);
			$end_time = strtotime($_REQUEST['end_time']);
			$map['dealtime'] = array('between', array($start_time, $end_time+(24*3600)));
		}else{
			$start_time = mktime(0, 0, 0, 9, 1, 2014);
			$end_time = time();
		}
		$this->assign('start_time', $start_time);
		$this->assign('end_time', $end_time);

		$model = M("Gdeal");

		// 每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = $_REQUEST['numPerPage'];
		} else {
			$listRows = '15';
		} 
		// 设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage = $_REQUEST['pageNum'];
		}else{
			$nowPage = 1;
		}
		$_GET['p'] = $nowPage;
		
		// 分页数据
		$list = $model->where($map)->select();  
		$count = count($list);

		// 创建分页对象 
		$p = new \Think\Page($count, $listRows); 

		// 分页数据
		$list=$model->where($map)->order("dealtime desc, id desc")->limit($p->firstRow.','.$p->listRows)->select();
		// echo $model->getLastSql();

		foreach($list as &$v){
			// 查看此订单内商品数量，如果不止一件，则可以拆分订单
			if(strpos($v['goodsid'], ',')){
				$v['chai'] = 1;
			}else{
				$v['chai'] = 2;
			}
		}
		// dump($list);exit;

		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}

		//分页显示
		$page = $p->show();
		
	 	//模板赋值显示
		$this->assign('list', $list);
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);
		
		$this->assign("search",			$search);			//搜索类型
		$this->assign("values",			$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",		$count);			//总条数
		$this->assign("numPerPage",		$p->listRows);		//每页显多少条
		$this->assign("currentPage",	$nowPage);			//当前页码
		$this->display();
	}   


	// 查看订单
	public function edit(){
		$model = M("Gdeal");
		$this->assign('classID',$_REQUEST['classID']); 
		$id = $_REQUEST[$model->getPk()];
		$data = $model->find($id);
		// dump($data);exit;
		$this->assign('data', $data);

		// 从订单详情表中查询每件商品的价格和商品数量等信息
		$gdobj = M('Gdealdetail');
		$detail = $gdobj->where('did='.$data['id'])->select();
		// dump($detail);exit;
		foreach($detail as &$v){
			// 查询商品名称、货号和库存等信息
			$gobj = M('Goods');
			$glist = $gobj->field('title, huohao, num')->where("id = ".$v['goodsid'])->find();
			$v['title'] = $glist['title'];
			$v['huohao'] = $glist['huohao'];
			$v['num'] = $glist['num'];
		}
		// dump($detail);exit;

		$this->assign('detail', $detail);

		$this->display();
	}
	
	
	// 订单更新
	public function update() { 
		// echo $_POST['id'];
		// dump($_POST['goodsid']);exit;
		$model = D("Gdeal"); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}

		// 更新订单详情数据
		$gdobj = M('gdealdetail');
		$count = count($_POST['dealid']);
		$totalprice = 0;
		for($i = 0 ; $i < $count ; $i ++){
			$data['buynum'] = $_POST['buynum'][$i];
			$data['totalprice'] = $_POST['totalprice'][$i];
			$totalprice += $_POST['totalprice'][$i];
			// dump($data);
			$res = $gdobj->where('id='.$_POST['dealid'][$i])->save($data);
		}
		// exit;

		// 更新订单数据
		$model->dealtime = strtotime($_POST['dealtime']);
		$model->paytime = strtotime($_POST['paytime']);
		$model->sendtime = strtotime($_POST['sendtime']);
		$model->buynum = implode(',', $_POST['buynum']);
		$model->totalprice = $totalprice;

		if(false !== $model->save()){
			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
			} //echo $model->getLastsql();die;
			//成功提示
			$this->success(L('修改成功'));
		} else { 
			//错误提示
			$this->error(L('更新失败'));
		}
	}


	// 合并订单
	public function merge(){
		// 查出所有的订单，获取订单号和收货人等基本信息
		$obj = M('Gdeal');
		// 只查找未发货的商品
		$list = $obj->where('sendstatus = 0 and pid = 0')->order('dealtime desc, id desc')->select();
		// dump($list);exit;

		$this->assign('list', $list);
		$this->display();
	}


	// 合并订单处理
	public function mergeupdate(){
		// dump($_POST);exit;
		$zhuid = $_POST['zhudeal'];
		$congid = $_POST['congdeal'];
		if(!$zhuid || !$congid){
			echo '请确认订单信息选择完整';
		}else{
			// 判断两个订单为不同的两个订单
			if($zhuid == $congid){
				echo '订单选择重复，无法进行合并，请重新选择！';exit;
			}

			$obj = M('Gdeal');
			$dobj = M('Gdealdetail');
			$zhudata = $obj->find($zhuid);
			$congdata = $obj->find($congid);
			// dump($congdata);exit;

			// 判断两个订单是否是同一买家
			if( ! ($zhudata['uid'] == $congdata['uid']) ){
				echo '要合并的两个订单必须是同一买家，否则不能合并！';exit;
			}

			// 判断两个订单付款状态是否相同，不同不允许合并
			if($zhudata['paystatus'] != $congdata['paystatus']){
				echo '订单付款状态不同，无法进行合并！';exit;
			}

			// 合并主订单和从订单信息，包括商品id、订单号、总价格
			// 先判断从订单中的商品在原订单中是否存在，存在则直接增加对应的购买数量
			// 判断从订单中是否有多个商品
			if(strpos($congdata['goodsid'], ',')){
				// 存在“逗号，”说明从订单中有多件商品，依次查询是否存在于主订单中
				$cong_goodsids = explode(',', $congdata['goodsid']);
				$cong_buynums = explode(',', $congdata['buynum']);
				// dump($zhudata);exit();

				foreach($cong_goodsids as $k=>$v){
					$info = $dobj->where("did = ".$zhudata['id']." and goodsid = ".$v)->find();
					// dump($info);exit();
					if($info){		// 存在，直接加上购买数量
						$save1['buynum'] = $info['buynum'] + $cong_buynums[$k];
						$save1['totalprice'] = $info['price'] * $save1['buynum'];
						// dump($save1);exit();
						// 更新主订单详情表中的信息
						$dobj->where("did = ".$zhudata['id']." and goodsid = ".$v)->save($save1);

						// 删除从订单详情表中的信息
						$dobj->where("did = ".$congdata['id']." and goodsid = ".$v)->delete();

						// 更新订单表中的商品信息
						$dgoods = $dobj->where("did = ".$zhudata['id'])->select();
						foreach($dgoods as $val){
							$new_goodsid .= $val['goodsid'].',';
							$new_buynum .= $val['buynum'].',';
							$new_totalprice += $val['totalprice'];
						}
						$save_deal['buynum'] = trim($new_buynum, ',');
						$save_deal['goodsid'] = trim($new_goodsid, ',');
						$save_deal['totalprice'] = $new_totalprice;
						$obj->where("id = ".$zhudata['id'])->save($save_deal);

					}else{	// 不存在则拼接上
						// 查询最新的主订单信息
						$new_zhudata = $obj->find($zhuid);
						// 从订单详情表中查询此商品的信息
						$dinfo = $dobj->where("did = ".$congdata['id']." and goodsid = ".$v)->find();

						$save3['goodsid'] = $new_zhudata['goodsid'].','.$dinfo['goodsid'];
						$save3['buynum'] = $new_zhudata['buynum'].','.$dinfo['buynum'];
						$save3['totalprice'] = $new_zhudata['totalprice']+$dinfo['totalprice'];

						// 更新订单信息
						$obj->where("id = ".$zhuid)->save($save3);

						// 更新订单详情信息
						$save4['did'] = $zhuid;
						$dobj->where("did = ".$congdata['id']." and goodsid = ".$v)->save($save4);
					}
				}

			}else{
				// 否则只有一件商品，先查询该商品是否已经存在于主订单中，存在则直接增加购买数量
				$info = $dobj->where("did = ".$zhudata['id']." and goodsid = ".$congdata['goodsid'])->find();
				// dump($info);exit();
				if($info){	// 存在，直接增加购买数量等

					$save1['buynum'] = $info['buynum'] + $congdata['buynum'];
					$save1['totalprice'] = $info['price'] * $save1['buynum'];
					dump($save1);exit();
					// 更新主订单详情表中的信息
					$dobj->where("did = ".$zhudata['id']." and goodsid = ".$congdata['goodsid'])->save($save1);

					// 删除从订单详情表中的信息
					$dobj->where("did = ".$congdata['id']." and goodsid = ".$congdata['goodsid'])->delete();

					// 更新订单表中的商品信息
					$dgoods = $dobj->where("did = ".$zhudata['id'])->select();
					foreach($dgoods as $val){
						$new_goodsid .= $val['goodsid'].',';
						$new_buynum .= $val['buynum'].',';
						$new_totalprice += $val['totalprice'];
					}
					$save_deal['buynum'] = trim($new_buynum, ',');
					$save_deal['goodsid'] = trim($new_goodsid, ',');
					$save_deal['totalprice'] = $new_totalprice;
					$obj->where("id = ".$zhudata['id'])->save($save_deal);

				}else{	// 不存在，拼接
					// 从订单详情表中查询此商品的信息
					$dinfo = $dobj->where("did = ".$congdata['id']." and goodsid = ".$congdata['goodsid'])->find();

					$save3['goodsid'] = $zhudata['goodsid'].','.$dinfo['goodsid'];
					$save3['buynum'] = $zhudata['buynum'].','.$dinfo['buynum'];
					$save3['totalprice'] = $zhudata['totalprice']+$dinfo['totalprice'];

					// 更新订单信息
					$obj->where("id = ".$zhuid)->save($save3);

					// 更新订单详情信息
					$save4['did'] = $zhuid;
					$dobj->where("did = ".$congdata['id']." and goodsid = ".$congdata['goodsid'])->save($save4);
				}
			}

			// 修改从订单的pid
			$save_pid['pid'] = $zhuid;
			$re = $obj->where("id = ".$congid)->save($save_pid);

			if($re){
				$this->success(L('订单合并成功'));
			}else{
				$this->error(L('订单合并失败'));
			}

		}
	}


	// 合并订单处理_20150518bak
	public function mergeupdate_bak(){
		// dump($_POST);exit;
		$zhuid = $_POST['zhudeal'];
		$congid = $_POST['congdeal'];
		if(!$zhuid || !$congid){
			echo '请确认订单信息填写完整';
		}else{
			// 判断两个订单为不同的两个订单
			if($zhuid == $congid){
				echo '订单选择重复，无法进行合并，请重新选择！';exit;
			}

			$obj = M('Gdeal');
			$dobj = M('Gdealdetail');
			$zhudata = $obj->find($zhuid);
			$congdata = $obj->find($congid);
			// dump($congdata);exit;

			// 判断两个订单付款状态是否相同，不同不允许合并
			if($zhudata['paystatus'] != $congdata['paystatus']){
				echo '订单付款状态不同，无法进行合并！';exit;
			}

			// 合并主订单和从订单信息，包括商品id、订单号、颜色、尺码、总价格和描述
			$where['id'] = $zhuid;
			$where['goodsid'] = $zhudata['goodsid'].','.$congdata['goodsid'];
			$where['num'] = do_order();		// 生成随机订单号
			$where['dealnum'] = $zhudata['dealnum'].','.$congdata['dealnum'];
			$where['color'] = $zhudata['color'].','.$congdata['color'];
			$where['size'] = $zhudata['size'].','.$congdata['size'];
			$where['totalprice'] = $zhudata['totalprice']+$congdata['totalprice'];
			$where['content'] = $zhudata['content'].'&&'.$congdata['content'];

			$count = $obj->save($where);
			if($count){
				$where2['id'] = $congid;
				$where2['pid'] = $zhuid;
				$count2 = $obj->save($where2); 

				// 在订单详情中，新增加一个did为主订单的记录，因为如果是修改的话，会导致原从订单中的商品信息无法查看
				$gdobj = M('Gdealdetail');
				// 先查出从订单详情的数据
				$map['did'] = $congid;
				$map['goodsid'] = $congdata['goodsid'];
				$cong = $gdobj->where($map)->find();
				// 新插入订单详情的数据
				$data['did'] = $zhuid;
				$data['goodsid'] = $cong['goodsid'];
				$data['dealnum'] = $cong['dealnum'];
				$data['color'] = $cong['color'];
				$data['size'] = $cong['size'];
				$data['totalprice'] = $cong['totalprice'];
				$data['content'] = $cong['content'];
				$data['writetime'] = time();

				$res = $gdobj->add($data);
				if($res){
					$this->success(L('订单合并成功'));
				}
			}else{
				$this->error(L('订单合并失败'));
			}
		}
	}


	// 拆分订单
	public function split(){
		$id = $_GET['id'];
		// echo $id;exit;
		$this->assign('id', $id);

		$dobj = M('Gdeal');
		// 获取订单中的商品编号
		$goodsid = $dobj->field('goodsid')->find($id);
		$ids = $goodsid['goodsid'];
		// dump($ids);exit;

		// 获取每件商品的详细信息
		$gdobj = M('Gdealdetail');
		$data = $gdobj->where("did = ".$id." and goodsid in(".$ids.")")->select();
		foreach($data as &$v){
			// 查询商品名称、货号和库存等信息
			$gobj = M('Goods');
			$glist = $gobj->field('title, huohao, num')->where("id = ".$v['goodsid'])->find();
			$v['title'] = $glist['title'];
			$v['huohao'] = $glist['huohao'];
			$v['num'] = $glist['num'];
		}
		// dump($data);exit;
		
		$this->assign('data', $data);
		$this->display();
	}


	// 拆分订单处理
	public function splitupdate(){
		$ids = $_POST['check'];
		if(count($ids)){
			$did = $_POST['id'];		// 原订单id
			// dump($did);exit;
			$gobj = M("Gdeal");
			$dinfo = $gobj->find($did);
			// dump($dinfo);exit;
			
			// dump($ids);exit;
			$gdobj = M('Gdealdetail');
			for($i = 0 ; $i < count($ids) ; $i ++){
				$info = $gdobj->where('goodsid = '.$ids[$i])->find();
				// dump($info);exit;

				// 将每个拆分出来的订单，都生成为一个新的订单
				$data['pid'] = 0;
				$data['goodsid'] = $info['goodsid'];						// 商品id
				$data['buynum'] = $info['buynum'];						// 商品数量
				$data['color'] = $info['color'];							// 商品颜色
				$data['size'] = $info['size'];								// 商品尺寸
				$data['content'] = $info['content'];						// 商品描述
				
				$data['uid'] = $dinfo['uid'];								// 用户id
				$data['address'] = $dinfo['address'];						// 收货地址
				$data['post'] = $dinfo['post'];								// 邮编
				$data['shr'] = $dinfo['shr'];								// 收货人
				$data['phone'] = $dinfo['phone'];

				$data['num'] = do_order();									// 订单号
				$data['totalprice'] = $info['totalprice'];					// 订单总价格
				$data['paystatus'] = $dinfo['paystatus'];					// 付款状态
				$data['dealtime'] = time();									// 下单时间
				// dump($data);exit;
				$res = $gobj->add($data);
				if($res){
					// 生成新的订单之后，将订单详情中对应的did修改为新生成订单的id
					$where['did'] = $did;				// 订单详情中原did
					$where['goodsid'] = $ids[$i];		// 订单详情中商品id
					$newdata['did'] = $res;				// 订单详情中要修改的did
					$res2 = $gdobj->where($where)->save($newdata);

					// 获取原订单中对应的数据，将原订单中对应信息删除掉
					$dgoodsid = explode(',', $dinfo['goodsid']);
					$ddealnum = explode(',', $dinfo['buynum']);
					$dcolor = explode(',', $dinfo['color']);
					$dsize = explode(',', $dinfo['size']);
					$dcontent = explode('&&', $dinfo['content']);

					foreach($dgoodsid as $k=>$v){
						if($v == $info['goodsid']){
							$key[] = $k;
						}
					}
				}
			}
			foreach($key as $v){	// 删除对应的信息
				unset($dgoodsid[$v]);
				unset($ddealnum[$v]);
				unset($dcolor[$v]);
				unset($dsize[$v]);
				unset($dcontent[$v]);
			}

			// 将删除后的信息重新拼接起来，修改至原订单
			$data2['goodsid'] = implode(',', $dgoodsid);
			$data2['buynum'] = implode(',', $ddealnum);
			$data2['color'] = implode(',', $dcolor);
			$data2['size'] = implode(',', $dsize);
			$data2['content'] = implode('&&', $dcontent);
			// dump($data2);
			$gobj->where("id = ".$did)->save($data2);

			$this->success(L('订单拆分成功'));

		}else{
			echo '没有选择任何商品！';
		}
	}
	
	
	//删除方法，批量删除
	public function delete() { 
		//删除指定记录
		$model = M("Gdeal");
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST[$pk];
			if (isset($id)) { 
				$condition = array($pk => array('in', explode(',', $id)));
				if (false !== $model->where($condition)->delete()) {

					// 同时删除订单详情表中相关联的数据
					$gdobj = M('Gdealdetail');
					$count = $gdobj->where("did = ".$id)->delete();
					if($count){
						$this->success(L('删除成功'));
					}
					
				} else {
					$this->error(L('删除失败'));
				}
			} else {
				$this->error('非法操作');
			}
		}
	} 


	// 缺货登记
	public function book(){
		$obj = M('Gbook');
		//保存查询条件 
		if($_REQUEST['keyword']){
			$map['title']=array('like', "%{$_REQUEST['keyword']}%"); 
		}	 
		if(intval($_REQUEST['status'])){
		 	$map['status']=array('eq',$_REQUEST['status']); 
		 }			 
		  			  
		$this->assign('classID',$_REQUEST['classID']);
		$this->assign('type', $_REQUEST['type']);  
		//每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = $_REQUEST['numPerPage'];
		} else {
			$listRows = '15';
		} 
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage=$_REQUEST['pageNum'];
		}else{
			$nowPage=1;
		}
		$_GET['p']=$nowPage;
		
		//分页数据
		$list=$obj->where($map)->field('id, uid, title, num, status, writetime')->select();
		$count=count($list); 

		  // echo $model->getLastSql(); 
		//创建分页对象 
		$p = new \Think\Page($count, $listRows); 

		//分页数据
		$list=$obj->where($map)->field('id, uid, title, num, status, writetime')->order('writetime desc')->limit($p->firstRow.','.$p->listRows)->select();
		 // echo $model->getLastSql();

		
		// $list = $obj->field('id, uid, title, num, status, writetime')->order('writetime desc')->select();
		// dump($list);exit;
		$this->assign('list', $list);
		$this->assign("totalCount",		$count);			//总条数
		$this->assign("numPerPage",		$p->listRows);		//每页显多少条
		$this->assign("currentPage",	$nowPage);			//当前页码
		$this->display();
	}


	// 缺货登记编辑
	public function bookedit() {
		$model = M("Gbook");
		$this->assign('classID',$_REQUEST['classID']); 
		$id = $_REQUEST[$model->getPk()];
		$vo = $model->find($id);
		
		$this->assign('vo', $vo);
		$this->display('bookedit');
	}
	
	
	//缺货登记更新
	public function bookupdate() { 
		//echo $_POST['id'];
		$model = D("Gbook"); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}  
		// 更新数据
		$model->writetime = time();
		if(false !== $model->save()) {
			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
			} //echo $model->getLastsql();die;
			//成功提示
			$this->success(L('修改成功'));
		} else { 
			//错误提示
			$this->error(L('更新失败'));
		}
	}


	// 订单回收站，用于存放经过合并之后的从订单
	public function recycle(){
		$map['pid'] = array('neq', '');
		//保存查询条件
		if($_REQUEST['keyword']){
			$map['num']=array('like', "%{$_REQUEST['keyword']}%"); 
		}	

		if(intval($_REQUEST['status'])){
			if(intval($_REQUEST['status']) == 1){
				$map['paystatus']=array('eq',1);
			}
			if(intval($_REQUEST['status']) == 2){
				$map['paystatus']=array('eq',0);
			}
			if(intval($_REQUEST['status']) == 3){
				$map['sendstatus']=array('eq',1);
			}
			if(intval($_REQUEST['status']) == 4){
				$map['sendstatus']=array('eq',0);
			}
			if(intval($_REQUEST['status']) == 5){
				$map['checkstatus']=array('eq',1);
			}
			if(intval($_REQUEST['status']) == 6){
				$map['checkstatus']=array('eq',0);
			}
		} 
		$model = M("Gdeal");

		//每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = $_REQUEST['numPerPage'];
		} else {
			$listRows = '15';
		} 
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage=$_REQUEST['pageNum'];
		}else{
			$nowPage=1;
		}
		$_GET['p']=$nowPage;
		
		//分页数据
		$list=$model->where($map)->select();  
		$count=count($list); 

		//  echo $model->getLastSql(); 
		//创建分页对象 
		$p = new \Think\Page($count, $listRows); 

		//分页数据
		$list=$model->where($map)->order("dealtime desc, id desc")->limit($p->firstRow.','.$p->listRows)->select();
		// echo $model->getLastSql();

		foreach($list as &$v){
			// 查用户名
			// $mobj = M('Member');
			// $mdata = $mobj->field('name')->where("id = ".$v['uid'])->find();
			// $v['uname'] = $mdata['name'];

			// 查看此订单内商品数量，如果不止一件，则可以拆分订单
			if(strpos($v['goodsid'], ',')){
				$v['chai'] = 1;
			}else{
				$v['chai'] = 2;
			}
		}
		// dump($list);exit;

		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}

		//分页显示
		$page = $p->show();
		
	 	//模板赋值显示
		$this->assign('list', $list);
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);
		
		$this->assign("search",			$search);			//搜索类型
		$this->assign("values",			$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",		$count);			//总条数
		$this->assign("numPerPage",		$p->listRows);		//每页显多少条
		$this->assign("currentPage",	$nowPage);			//当前页码
		$this->display();
	}


}