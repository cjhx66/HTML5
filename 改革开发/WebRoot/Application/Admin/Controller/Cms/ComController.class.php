<?php
/**
 *简要说明	
 * @package 		Admin\Cms	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/07/07	                //最先写的日期
 * @lastmodifide	2014/08/18	                //最后修改日期
 */
namespace Admin\Controller\Cms;
use Admin\Controller\Base\CommonController; 
/** 
 * 公共方法 
 */
class ComController extends CommonController{ 
	//上传文件
	public function _upload($file){   
		$upload = new \Think\Upload(); // 实例化上传类 
		$upload->savePath = '/Ch/Cms/File/';
  		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		// 设置附件上传目录// 上传文件
		//dump($upload);exit;
		$info   =   $upload->uploadOne($file); 
		if(!$info) {// 上传错误提示错误信息    
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息    
			//dump($info);die;

			// 生成缩略图
			$image = new \Think\Image(); 
			$image->open('Upload/'.$info['savepath'].$info['savename']);
			// 按照原图的比例生成一个最大为300*200的缩略图并保存为thumb.jpg
			$image->thumb(300, 200)->save('Upload/'.$info['savepath'].'thumb_'.$info['savename']);

			
			return $info['savepath'].'&&'.$info['savename'];
		}
	}
	
}	
?>