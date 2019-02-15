<?php

namespace Ch\Controller\Cms;
use Think\Controller;


class GuangGuController extends ComController{
	  public function  index(){
	  //清除body头，用于格式乱码使用
	    ob_end_clean();
	  	$this->assign('source',$_GET['source']);
		$this->display();
	 }
	 public function  index_h5(){
     	  //清除body头，用于格式乱码使用
     	    ob_end_clean();
     	  	$this->assign('source',$_GET['source']);
     		$this->display();
     	 }


}