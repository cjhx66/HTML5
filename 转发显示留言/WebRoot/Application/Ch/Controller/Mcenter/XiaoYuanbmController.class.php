<?php
/**
 *简要说明
 * @package 		Ch/Mcenter	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号
 * @firstday 	    2014/09/08	                //最先写的日期
 * @lastmodifide	2014/09/10	                //最后修改日期
 */
namespace Ch\Controller\Mcenter;
use Think\Controller;

//demo
class XiaoYuanbmController extends ComController{

	//添加
	public function baomingadd() {
			// 111111;
			$obj = M('mother');
            $data['name'] = $_POST['name'];
            $data['textarea'] = $_POST['text'];
            $data['time'] = time();
            $data['language'] = '1';
            $data['classID'] = '66';
            $res = $obj->add($data);
            if($res){
                echo $res;
            }else{
               echo 'error';
            }
	}
	//查询
	public function num(){
	      $obj = M('mother');
	      $id= $_GET['id'];
	      $sql="Select * From cms_mother Where id=$id";
	      $s= mysql_query($sql);
	      $ar=mysql_fetch_assoc($s);
	      echo json_encode($ar);
	}
	
	public function change(){
       $obj = M('mother');
       $id= $_POST['id'];
       $name = $_POST['name'];
       $text = $_POST['text'];
       $sql="UPDATE cms_mother SET name ='$name',textarea='$text' WHERE id = $id";
       $s= mysql_query($sql);
	   if($s){
		   echo "success";
	   }else{
		   echo "error";
	   }
       //$ar=mysql_fetch_assoc($s);
       //echo json_encode($ar);
	}
}