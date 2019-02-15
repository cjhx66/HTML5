<?php
/**
 *简要说明	
 * @package 		Admin/Emall	            	//所属包
 * @author 		    xianhui<1024362476@qq.com>	//作者xianhui
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/05	                //最先写的日期
 * @lastmodifide	待定		                //最后修改日期
 */
namespace Admin\Controller\Emall;
use Think\Controller;

// 商品管理类
class GoodsController extends ComController{ 

	public function index(){		
		$this->assign('language', dowith_include($_REQUEST['language']) );	// 所属站点
		$this->assign('web', dowith_include($_REQUEST['w']) );	// 栏目
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类

		// 查询分类
		$bspath = dowith_include( $_POST['bspath'] );
		$cobj = M('Gclass');
		$clist = $cobj->field("id,name,concat(path,'-',id) as bspath")->where("status = 1")->order("orderpath asc")->select();
		$gclassOption = '';
		foreach($clist as $v){
			$selected = ($v['bspath'] == $bspath) ? 'selected' : '';
			$gclassOption .='<option '.$selected.' value="'.$v['bspath'].'"'.($arr["pid"]==$v['id']?"selected":"").'>' .str_repeat ( '|—', count ( explode ( '-', $v['bspath'] ) )-2 ) .$v['name'] . '</option>';
		}
		$this->assign('gclassOption', $gclassOption);

		// 查询品牌
		$bID = dowith_include( $_POST['bID'] );
		$bobj = M('Gbrand');
		$blist = $bobj->where('status = 1')->order('orders')->select();
		$gbrandOption = '';
		foreach($blist as $v){
			$selected = ($v['id'] == $bID) ? 'selected' : '';
			$gbrandOption .= '<option '.$selected.' value="'.$v['id'].'">'.$v['title'].'</option>';
		}
		$this->assign('gbrandOption', $gbrandOption);

		// 保存查询条件 
		if($_POST['keyword']){	// 标题
			$keyword = dowith_include( $_POST['keyword'] );
			$map['title'] = array('like', "%{$keyword}%");
			$this->assign('keyword', $keyword);
		}
		if($bspath){		// 分类
			$map['bspath'] = array('like', "%{$bspath}%"); 
		}
		if($bID){		// 品牌
			$map['bID'] = array('eq', $bID); 
		}
		if(intval($_REQUEST['type'])){		// 商品类型
			$type = dowith_include( $_REQUEST['type'] );
			if($type == 1){
				$map['status'] = array('eq',1);
			}
			if($type == 2){
				$map['status'] = array('eq',2);
			}
			if($type == 3){
				$map['is_jing'] = array('eq',1);
			}
			if($type == 4){
				$map['is_new'] = array('eq',1);
			}
			if($type == 5){
				$map['is_hot'] = array('eq',1);
			}
			if($type == 6){	// 判断库存不足
				$map['_string'] = 'num <= warnum';
			}
			$this->assign('type', $type);
		}

		if( !empty($_POST["actionName"]) ){
			$model = D( dowith_include($_POST["actionName"]) );
		}else{
			$model = M("Goods");
		}    
		// 每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = dowith_include( $_REQUEST['numPerPage'] );
		} else {
			$listRows = '15';
		} 
		// 设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage = dowith_include( $_REQUEST['pageNum'] );
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
		$list = $model->where($map)->order("Indexfirst desc, is_jing desc, is_hot desc, is_new desc,  writetime desc")->limit($p->firstRow.','.$p->listRows)->select();
		// echo $model->getLastSql();
		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}

		// 分页显示
		$page = $p->show(); 		

	 	// 模板赋值显示
		$this->assign('list', $list); 
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);

		$this->assign("search",	$search);			//搜索类型
		$this->assign("values",	$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",	dowith_include($count) );			//总条数
		$this->assign("numPerPage",	dowith_include($p->listRows) );		//每页显多少条
		$this->assign("currentPage", dowith_include($nowPage) );			//当前页码
		$this->display();
	}   
	
	
	// 增加商品页面
	public function add(){
		$this->assign('language', dowith_include($_REQUEST['language']) );	// 所属站点
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类
		$this->assign('time', time() );

		// 查询商品品牌
		$bobj = M('Gbrand');
		$blist = $bobj->field('id, title')->where('status = 1')->select();
		$gbrandOption = '';
		foreach($blist as $v){
			$gbrandOption .= '<option value="'.$v['id'].'">'.$v['title'].'</option>';
		}
		$this->assign('gbrandOption', $gbrandOption);

		// 查询商品分类
		$cobj = M('gclass');
		$clist = $cobj->field("id,pid,name,path,concat(path,'-',id) as bspath")->where("status = 1")->order("bspath,id asc")->select(); 
		$gclassOption = '';
		foreach($clist as $k=>$v){
			$gclassOption .='<option  bspath="'.$v['bspath'].'" value="'.$v['id'].'"'.($arr["pid"]==$v['id']?"selected":"").'>' .str_repeat ( '|—', count ( explode ( '-', $v['bspath'] ) )-2 ) .$v['name'] . '</option>';
		}
		$this->assign('gclassOption',$gclassOption);

		$this->display();
	}


	// 添加商品方法
	public function insert(){
	  	// dump($_POST);exit;
		$model = D("Goods");
		unset ( $_POST[$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		}

		$save['title'] = I('post.title', '', 'trim');
		if(!$_POST['huohao']){
			$save['huohao'] = date('Ymd', time()).rand(1000, 9999);	
		}else{
			$save['huohao'] = I('post.huohao', '', 'trim');
		}
		$save['cID'] = I('post.cID', '', 'intval');
		$save['bID'] = I('post.bID', '', 'intval');
		$save['bspath'] = I('post.bspath', '', 'trim');
		$save['price'] = I('post.price', '', 'trim');
		$save['mprice'] = I('post.mprice', '', 'trim');
		$save['cuprice'] = I('post.cuprice', '', 'trim');
		$save['custart'] = I('post.custart', '', 'strtotime');
		$save['cuend'] = I('post.cuend', '', 'strtotime');
		$save['Intro'] = I('post.Intro', '', 'trim');
		$save['num'] = I('post.num', '', 'intval');
		$save['warnum'] = I('post.warnum', '', 'intval');
		$save['is_jing'] = I('post.is_jing', 0, 'intval');
		$save['is_new'] = I('post.is_new', 0, 'trim');
		$save['is_hot'] = I('post.is_hot', 0, 'trim');
		$save['Indexfirst'] = I('post.Indexfirst', 0, 'trim');
		$save['content'] = I('post.content', '', 'htmlspecialchars');
		$save['writetime'] = I('post.writetime', '', 'strtotime');
		$save['status'] = I('post.status', 2, 'intval');
		$save['classID'] = I('post.classID', 0, 'intval');
		$save['language'] = I('post.language', 1, 'intval');

		// 缩略图
		$strFile = $_FILES['upload']['name'];
		if($strFile){
			$arrUploadFile = explode('&&', $this->_upload($_FILES['upload']));
			$save['attachpath'] = $arrUploadFile[0];
			$save['attachment'] = $arrUploadFile[1];
		}
		// 多图
		$save['imageurls'] = implode('&&', $_POST['picList']);		

		// 保存当前数据对象
		if ($result = $model->add($save)){

			$imgobj = M('Image');
			// 将多图中的图片保存到图片表中			
			$count = count($_POST['picList']);
			for($i = 0 ; $i < $count ; $i ++){
				$data['classID'] = $save['classID'];
				$data['pid'] = $result;
				$data['imgurl'] = $_POST['imgurl'][$i];
				$data['imgorder'] = $_POST['imgorder'][$i];
				$data['type'] = 2;
				$data['writetime'] = time();
				$re = $imgobj->add($data);
			}

			// 缩略图保存到图片表中
			$data2['classID'] = $save['classID'];
			$data2['pid'] = $result;
			$data2['imgurl'] = $arrUploadFile;
			$data2['type'] = 1;
			$data2['writetime'] = time();
			$re2 = $imgobj->add($data2);


			// 回调接口
			if (method_exists($this, '_tigger_insert')) {
				$model->id = $result;
				$this->_tigger_insert($model);
			}  // echo $model->getLastsql();die;
			//成功提示
			$this->success(L('新增成功'));
		} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
		} 
	}


	// 编辑页面 
	public function edit(){
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类

		$model = M("Goods");
		$id = dowith_include( $_GET['id'] );
		$vo = $model->find($id);
		$arr = explode('&&', $vo['imageurls']);
		foreach($arr as $k=>&$v){
			$arr2 = explode('+', $v);
			// dump($arr2);
			$images[$k]['imgurl'] = $arr2[0];
			$images[$k]['imgorder'] = $arr2[1];
		}
		// dump($images);
		// dump($vo);exit;

		$this->assign('vo', $vo);
		$this->assign('images', $images);

		// 查询商品品牌
		$bobj = M('Gbrand');
		$blist = $bobj->field('id, title')->where('status = 1')->select();
		$gbrandOption = '';
		foreach($blist as $v){
			$selected = ($v['id'] == $vo['bID']) ? 'selected' : '';
			$gbrandOption .= '<option value="'.$v['id'].'" '.$selected.'>'.$v['title'].'</option>';
		}
		$this->assign('gbrandOption', $gbrandOption);

		// 查询商品分类
		$cobj = M('gclass');
		$clist = $cobj->field("id,pid,name,path,concat(path,'-',id) as bspath")->where("status = 1")->order("orderpath asc")->select(); 
		$gclassOption = '';
		foreach($clist as $k=>$v){
			$selected = ($v['bspath'] == $vo['bspath']) ? 'selected' : '';
			$gclassOption .='<option '.$selected.' bspath="'.$v['bspath'].'"  value="'.$v['id'].'"'.($arr["pid"]==$v['id']?"selected":"").'>' .str_repeat ( '|—', count ( explode ( '-', $v['bspath'] ) )-2 ) .$v['name'] . '</option>';
		}
		$this->assign('gclassOption',$gclassOption);

		$this->display();
	}
	
	// 更新
	public function update() {
		// dump($_POST);exit;
		$model = D("Goods"); 
		if(false === $model->create()) {
			$this->error($model->getError());
		}
		if(!$_POST['huohao']){
			$save['huohao'] = date('Ymd', time()).rand(1000, 9999);	
		}
		

		$save['id'] = I('post.id', '', 'intval');
		$save['title'] = I('post.title', '', 'trim');
		if(!$_POST['huohao']){
			$save['huohao'] = date('Ymd', time()).rand(1000, 9999);	
		}else{
			$save['huohao'] = I('post.huohao', '', 'trim');
		}
		$save['cID'] = I('post.cID', '', 'intval');
		$save['bID'] = I('post.bID', '', 'intval');
		$save['bspath'] = I('post.bspath', '', 'trim');
		$save['price'] = I('post.price', '', 'trim');
		$save['mprice'] = I('post.mprice', '', 'trim');
		$save['cuprice'] = I('post.cuprice', '', 'trim');
		$save['custart'] = I('post.custart', '', 'strtotime');
		$save['cuend'] = I('post.cuend', '', 'strtotime');
		$save['Intro'] = I('post.Intro', '', 'trim');
		$save['num'] = I('post.num', '', 'intval');
		$save['warnum'] = I('post.warnum', '', 'intval');
		$save['is_jing'] = I('post.is_jing', 0, 'intval');
		$save['is_new'] = I('post.is_new', 0, 'trim');
		$save['is_hot'] = I('post.is_hot', 0, 'trim');
		$save['Indexfirst'] = I('post.Indexfirst', 0, 'trim');
		$save['content'] = I('post.content', '', 'htmlspecialchars');
		$save['writetime'] = I('post.writetime', '', 'strtotime');
		$save['status'] = I('post.status', 2, 'intval');
		$save['classID'] = I('post.classID', 0, 'intval');

		// 缩略图
		$strFile = $_FILES['upload']['name'];
		if($strFile){
			$arrUploadFile = explode('&&', $this->_upload($_FILES['upload']));
			$save['attachpath'] = $arrUploadFile[0];
			$save['attachment'] = $arrUploadFile[1];
		}
		// 多图
		$save['imageurls'] = implode('&&', $_POST['picList']);
		if($save['imageurls'] == $_POST['imageurls']){
			$imageurls = true;			// 判断多图是否有修改，没有修改则为true
		}else{
			$imageurls = false;
		}

		if(false !== $model->save($save)){

			$imgobj = M('Image');
			// 将多图中的图片更新到图片表中
			// 先查询多图是否有修改，有修改则删除原有多图，将新的多图列表插入
			if(!$imageurls){		// 取反表示多图列表有修改
				$del = $imgobj->where("type = 2 and pid = ".$_POST['id'])->delete();

				$count = count($_POST['picList']);
				for($i = 0 ; $i < $count ; $i ++){
					$data['classID'] = $save['classID'];
					$data['pid'] = $_POST['id'];
					$data['imgurl'] = $_POST['imgurl'][$i];
					$data['imgorder'] = $_POST['imgorder'][$i];
					$data['type'] = 2;
					$data['writetime'] = time();
					$re = $imgobj->add($data);
				}
			}
			// 缩略图更新到图片表中
			if($arrUploadFile){			// 缩略图有修改
				$info = $imgobj->where("type = 1 and pid = ".$_POST['id'])->find();				
				if($info){
					// 如果原图片表中有此缩略图记录，则修改
					$data2['imgurl'] = $arrUploadFile;
					$re2 = $imgobj->where("type = 1 and pid = ".$_POST['id'])->save($data2);
				}else{
					// 没有记录则添加
					$data2['classID'] = $save['classID'];
					$data2['pid'] = $_POST['id'];
					$data2['imgurl'] = $arrUploadFile;
					$data2['type'] = 1;
					$data2['writetime'] = time();
					$re2 = $imgobj->add($data2);
				}				
			}			

			// 回调接口
			if (method_exists($this, '_tigger_update')) {
				$this->_tigger_update($model);
			} 
			//成功提示
			$this->success(L('更新成功'));
		}else { 
			//错误提示
			$this->error(L('更新失败').$model->getLastsql());
		}
	}


	// 复制页面 
	public function copy(){
		$this->assign('language', dowith_include($_REQUEST['language']) );	// 所属站点
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类
		$this->assign('time', time() );

		$model = M("Goods");
		$id = dowith_include( $_GET['id'] );
		$vo = $model->find($id);
		$this->assign('vo', $vo);
		$this->assign('time', time());

		// 查询商品品牌
		$bobj = M('Gbrand');
		$blist = $bobj->field('id, title')->where('status = 1')->select();
		$gbrandOption = '';
		foreach($blist as $v){
			$selected = ($v['id'] == $vo['bID']) ? 'selected' : '';
			$gbrandOption .= '<option value="'.$v['id'].'" '.$selected.'>'.$v['title'].'</option>';
		}
		$this->assign('gbrandOption', $gbrandOption);

		// 查询商品分类
		$cobj = M('gclass');
		$clist = $cobj->field("id,pid,name,concat(path,'-',id) as bspath,url")->order("bspath,id asc")->select(); 
		$gclassOption = '';
		foreach($clist as $k=>$v){
			$selected = ($v['bspath'] == $vo['bspath']) ? 'selected' : '';
			$gclassOption .='<option '.$selected.' bspath="'.$v['bspath'].'"  value="'.$v['id'].'"'.($arr["pid"]==$v['id']?"selected":"").'>' .str_repeat ( '|—', count ( explode ( '-', $v['bspath'] ) )-2 ) .$v['name'] . '</option>';
		}
		$this->assign('gclassOption',$gclassOption);
		
		$this->display();
	}

	// 复制- 添加商品方法
	public function copyinsert(){
	  	// dump($_POST);exit();
		$model = D("Goods");
		unset ( $_POST[$model->getPk()] ); 
		if (false === $model->create()) {
			$this->error($model->getError());
		} 

		$save['title'] = I('post.title', '', 'trim');
		if(!$_POST['huohao']){
			$save['huohao'] = date('Ymd', time()).rand(1000, 9999);	
		}else{
			$save['huohao'] = I('post.huohao', '', 'trim');
		}
		$save['cID'] = I('post.cID', '', 'intval');
		$save['bID'] = I('post.bID', '', 'intval');
		$save['bspath'] = I('post.bspath', '', 'trim');
		$save['price'] = I('post.price', '', 'trim');
		$save['mprice'] = I('post.mprice', '', 'trim');
		$save['cuprice'] = I('post.cuprice', '', 'trim');
		$save['custart'] = I('post.custart', '', 'strtotime');
		$save['cuend'] = I('post.cuend', '', 'strtotime');
		$save['Intro'] = I('post.Intro', '', 'trim');
		$save['num'] = I('post.num', '', 'intval');
		$save['warnum'] = I('post.warnum', '', 'intval');
		$save['is_jing'] = I('post.is_jing', 0, 'intval');
		$save['is_new'] = I('post.is_new', 0, 'trim');
		$save['is_hot'] = I('post.is_hot', 0, 'trim');
		$save['Indexfirst'] = I('post.Indexfirst', 0, 'trim');
		$save['content'] = I('post.content', '', 'htmlspecialchars');
		$save['writetime'] = I('post.writetime', '', 'strtotime');
		$save['status'] = I('post.status', 2, 'intval');
		$save['classID'] = I('post.classID', 0, 'intval');
		$save['language'] = I('post.language', 1, 'intval');

		// 缩略图
		$strFile = $_FILES['upload']['name'];
		if($strFile){
			$arrUploadFile = explode('&&', $this->_upload($_FILES['upload']));
			$save['attachpath'] = $arrUploadFile[0];
			$save['attachment'] = $arrUploadFile[1];
		}
		// 多图
		$save['imageurls'] = implode('&&', $_POST['picList']);

		//保存当前数据对象
		if ($result = $model->add($save)) { //保存成功

			$imgobj = M('Image');
			// 将多图中的图片保存到图片表中			
			$count = count($_POST['picList']);
			for($i = 0 ; $i < $count ; $i ++){
				$data['classID'] = $save['classID'];
				$data['pid'] = $result;
				$data['imgurl'] = $_POST['imgurl'][$i];
				$data['imgorder'] = $_POST['imgorder'][$i];
				$data['type'] = 2;
				$data['writetime'] = time();
				$re = $imgobj->add($data);
			}

			// 缩略图保存到图片表中
			$data2['classID'] = $save['classID'];
			$data2['pid'] = $result;
			$data2['imgurl'] = $arrUploadFile;
			$data2['type'] = 1;
			$data2['writetime'] = time();
			$re2 = $imgobj->add($data2);

			// 回调接口
			if (method_exists($this, '_tigger_insert')) {
				$model->id = $result;
				$this->_tigger_insert($model);
			}  // echo $model->getLastsql();die;
			//成功提示
			$this->success(L('新增成功'));
		} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
		} 
	}
	
	
	// 删除方法，批量删除
	public function delete() { 
		//删除指定记录
		$model = M("Goods");
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST[$pk];
			// dump($id);exit;
			if (isset($id)) { 
				$condition = array($pk => array('in', explode(',', $id)));
				if (false !== $model->where($condition)->delete()) {
					// 在图片表中将此商品相关的图片记录删除
					$imgobj = M('Image');
					$count = $imgobj->where("pid in (".$id.")")->delete();
					
					$this->success(L('删除成功'));
				} else {
					$this->error(L('删除失败'));
				}
			} else {
				$this->error('非法操作');
			}
		}
	} 


	// 删除缩略图
	public function delimage(){
		$id = $_POST['id'];
		// echo $id;
		// 更新商品表中的缩略图信息
		$obj = M('Goods');
		$data['attachpath'] = '';
		$data['attachment'] = '';
		$count = $obj->where("id = ".$id)->save($data);
		// 更新图片表中的缩略图信息
		$imgobj = M('Image');
		$data2['imgurl'] = '';
		$count2 = $imgobj->where("type = 1 and pid = ".$id)->save($data2);
		if($count && $count2){
			echo '删除';
		}else{
			echo '未删除';
		}
	}


	// 删除多图中的图片
	public function delMulImage(){
		$id = $_POST['id'];
		$imgorder = $_POST['imgorder'];
		// echo $imgorder;
		$imgobj = M('Image');
		$count = $imgobj->where("type = 2 and pid = ".$id." and imgorder = ".$imgorder)->delete();
		if($count){
			echo $imgorder;
		}
	}

}