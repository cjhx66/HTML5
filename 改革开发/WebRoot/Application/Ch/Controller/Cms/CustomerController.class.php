<?php
/**
 *简要说明	
 * @package 		Ch/Cms	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/24	                //最后修改日期
 */
namespace Ch\Controller\Cms;
use Think\Controller;

//客户留言列表类
class CustomerController extends ComController{ 
  	  
	  //留言页面
	  public function  index(){   
		$this->display(); // 输出模板 
	 }  
	 
	 
	 // 留言方法
	 public function  feedback_adds(){   
	 
		$value = "1210321011@qq.com";   
		if($_POST){
			$yname = $_POST['author'];   
			$phone = $_POST['tel']; 
			$email = $_POST['email'];
			$cz = $_POST['content'];   
			$html = '姓名：'.$yname.'<br>手机：'.$phone.'<br>电子邮箱：'.$email.'<br>内容：'.$cz.'<br>提交时间：'.$time;  
	 		$message=$html;
			$title="投标用户信息";
			$time = date("Y-m-d H:i:s",time());
				//dump($m_list); 
				//发邮件
					if(SendMail($value,$title,$message)){ 
						//发过邮件之后，存入数据库
						$obj=D('Customer');
						if($obj->create()){
							$obj->classID = 22;
							$obj->title = mb_substr($_POST['content'], 0, 20, 'utf-8');  
							$obj->writetime=time();
							$obj->content=$html;
							$list=$obj->add();
							if($list){
									$this->assign('jumpUrl',__URL__);
									$this->success(L('_INSERT_SUCCESS_'));
								}else{
									$this->error(L('_INSERT_FAIL_')); 
								}
							}else{
								$this->error($obj->getError());
							} 
						 $this->success('发送成功');  
					} else { 
						 $this->error('发送失败'); 
					} 
		
		  	 
		}
    }
}