<?php
/**
 *简要说明	
 * @package 		Admin/Mcenter	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @modify		    xianhui<1024362476@qq.com>	//作者xianhui
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/05	                //最先写的日期
 * @lastmodifide	待定		                //最后修改日期
 */
namespace Admin\Controller\Mcenter;
use Think\Controller;

// demo
class SourceController extends ComController{

	public function  index(){
		$this->assign('language', dowith_include($_REQUEST['language']) );	// 所属站点
		$this->assign('web', dowith_include($_REQUEST['w']) );	// 栏目
		$this->assign('formstatus', dowith_include($_SESSION['formstatus']) );	// 表单令牌
		$this->assign('classID', dowith_include($_REQUEST['classID']) ); // 分类  

		// 保存查询条件
		if($_POST['keyword']){		// 关键字
			$keyword = dowith_include( $_POST['keyword'] );
			$map['phone'] = array('like', "%{$keyword}%");
			$this->assign('keyword', $keyword); 
		}
		if(intval($_POST['status'])){	// 状态
			$status = dowith_include( $_POST['status'] );
			$map['status'] = array('eq', $status);
			$this->assign('status', $status);
		}

		$model = M("num");
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
		
		//分页数据
		$list = $model->where($map)->select();  
		$count = count($list); 

		//  echo $model->getLastSql(); 
		// 创建分页对象 
		$p = new \Think\Page($count, $listRows); 

		//分页数据
		$list = $model->where($map)->order("time desc")->limit($p->firstRow.','.$p->listRows)->select(); 
			 // echo $model->getLastSql();  
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
		
		$this->assign("search",	$search);			//搜索类型
		$this->assign("values",	$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",	dowith_include($count) );			//总条数
		$this->assign("numPerPage",	dowith_include($p->listRows) );		//每页显多少条
		$this->assign("currentPage", dowith_include($nowPage) );			//当前页码
		$this->display();
	}

	//删除方法，批量删除
	public function delete() { 
		//删除指定记录
		$model = M("num");
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST[$pk];
			if (isset($id)) { 
				$condition = array($pk => array('in', explode(',', $id)));
				if (false !== $model->where($condition)->delete()) {
					$this->success(L('删除成功'));
				} else {
					$this->error(L('删除失败'));
				}
			} else {
				$this->error('非法操作');
			}
		}
	} 
	

//导出excel
	public function excel(){
		
		ob_end_clean();
		header("Content-Type:application/vnd.ms-excel;charset=UTF-8");    
		header("Pragma: public");    
		header("Expires: 0");    
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");    
		header("Content-Type: application/force-download");    
		header("Content-Type: application/octet-stream");    
		header("Content-Type: application/download");    
		header("Content-Disposition: attachment;filename=".'天洲视界城'.".xls");
		header("Content-Transfer-Encoding: binary ");
		$model = M("num");

		
		$result = $model->order('time desc')->select();
		foreach ($result as $key => &$value) {
			//$results = $member->where("id=".$value['uid'])->find();
			$result[$key]['uname'] = $results['username'];
		}
		//var_dump($result);die;
		foreach ($result as $k => &$v) {
			$data[$k]['id'] = $k+1;
			$data[$k]['source'] = $v['source'];
			$data[$k]['time'] = date("Y-m-d H:i:s",$v['time']);
		}
		$str.='<table border="1" width="1000">';
		$str.='<tr>
				<th>编号</th><th>来源</th><th>报名日期</th>
			  </tr>';
		$str=iconv('UTF-8','GB2312',$str);	   
		foreach ($data as $key=>&$value) {
			$str.='<tr>'; 
			foreach ($value as $k=>$v) {
				$str.='<td Class="format" style="align:center">'.iconv('UTF-8','GBK','&nbsp;'.$v).'</td>';
			} 
			$str.='</tr>';   
		} 
		$str.='</table>'; 
		echo ($str);die(); 

	}
}