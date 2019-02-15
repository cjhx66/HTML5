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
class GuangGubmController extends ComController{
	//报名添加
	public function baomingadd() {
   		 $obj = M('guanggu');
           echo $obj;
          $result = $obj->where('phone ='.$_POST['phone'])->select();
          $data['name'] = $_POST['name'];

          $data['writetime'] = time();
          $data['language'] = '1';
          $data['classID'] = '66';

          $res = $obj->add($data);
          if($res){
            echo 'ok';
          }else{
            echo 'error';
          }
	}
}