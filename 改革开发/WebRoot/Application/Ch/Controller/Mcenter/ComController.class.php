<?php
/**
 *简要说明	
 * @package 		Ch\Mcenter	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/18	                //最后修改日期
 */
namespace Ch\Controller\Mcenter;
use Ch\Controller\Base\CommonController;
/** 
 * 公共方法 
 */
class ComController extends CommonController{

	 //上传文件
	public function _upload($file){   
		$upload = new \Think\Upload(); // 实例化上传类 
		$upload->savePath = '/Ch/Mcenter/File/';
  		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		// 设置附件上传目录// 上传文件
		//dump($upload);exit;
		$info   =   $upload->uploadOne($file); 
		if(!$info) {// 上传错误提示错误信息    
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息    
			  //dump($info);die;     
			return $info['savepath'].$info['savename'];   
		}
	}
	
}
?>