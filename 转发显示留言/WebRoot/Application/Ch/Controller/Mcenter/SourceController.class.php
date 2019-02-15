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
class SourceController extends ComController{

	public function source(){
       $obj = M('num');
       echo $obj;
       //10
       if($_POST['source'] == 'txxw'){
              $data['source'] = '腾讯新闻app';
             }else if($_POST['source'] == 'atxxw'){
           $data['source'] = 'A腾讯新闻app';
           }else if($_POST['source'] == 'btxxw'){
           $data['source'] = 'B腾讯新闻app';
           }else if($_POST['source'] == 'ctxxw'){
           $data['source'] = 'C腾讯新闻app';
           }else if($_POST['source'] == 'dtxxw'){
           $data['source'] = 'D腾讯新闻app';
           }else if($_POST['source'] == 'etxxw'){
           $data['source'] = 'E腾讯新闻app';
           }else if($_POST['source'] == 'ftxxw'){
           $data['source'] = 'F腾讯新闻app';
           }else if($_POST['source'] == 'gtxxw'){
           $data['source'] = 'G腾讯新闻app';
           }else if($_POST['source'] == 'htxxw'){
           $data['source'] = 'H腾讯新闻app';
           }else if($_POST['source'] == 'itxxw'){
           $data['source'] = 'I腾讯新闻app';
           }else if($_POST['source'] == 'jtxxw'){
           $data['source'] = 'J腾讯新闻app';
           }
       //8
       	else if($_POST['source'] == 'ttkb'){
              $data['source'] = '天天快报app';
             }else if($_POST['source'] == 'attkb'){
              $data['source'] = 'A天天快报app';
             }else if($_POST['source'] == 'bttkb'){
              $data['source'] = 'B天天快报app';
             }else if($_POST['source'] == 'cttkb'){
              $data['source'] = 'C天天快报app';
             }else if($_POST['source'] == 'dttkb'){
              $data['source'] = 'D天天快报app';
             }else if($_POST['source'] == 'ettkb'){
              $data['source'] = 'E天天快报app';
             }else if($_POST['source'] == 'fttkb'){
              $data['source'] = 'F天天快报app';
             }else if($_POST['source'] == 'gttkb'){
              $data['source'] = 'G天天快报app';
             }else if($_POST['source'] == 'httkb'){
              $data['source'] = 'H天天快报app';
             }
       //8
       	else if($_POST['source'] == 'sjtx'){
              $data['source'] = '手机腾讯网app';//8
             }else if($_POST['source'] == 'asjtx'){
              $data['source'] = 'A手机腾讯网app';
             }else if($_POST['source'] == 'bsjtx'){
              $data['source'] = 'B手机腾讯网app';
             }else if($_POST['source'] == 'csjtx'){
              $data['source'] = 'C手机腾讯网app';
             }else if($_POST['source'] == 'dsjtx'){
              $data['source'] = 'D手机腾讯网app';
             }else if($_POST['source'] == 'esjtx'){
              $data['source'] = 'E手机腾讯网app';
             }else if($_POST['source'] == 'fsjtx'){
              $data['source'] = 'F手机腾讯网app';
             }else if($_POST['source'] == 'gsjtx'){
              $data['source'] = 'G手机腾讯网app';
             }else if($_POST['source'] == 'hsjtx'){
              $data['source'] = 'H手机腾讯网app';
             }
       //10
       	else if($_POST['source'] == 'txsp'){
              $data['source'] = '腾讯视频app';//10
             }else if($_POST['source'] == 'atxsp'){
              $data['source'] = 'A腾讯视频app';
             }else if($_POST['source'] == 'btxsp'){
              $data['source'] = 'B腾讯视频app';
             }else if($_POST['source'] == 'ctxsp'){
              $data['source'] = 'C腾讯视频app';
             }else if($_POST['source'] == 'dtxsp'){
              $data['source'] = 'D腾讯视频app';
             }else if($_POST['source'] == 'etxsp'){
              $data['source'] = 'E腾讯视频app';
             }else if($_POST['source'] == 'ftxsp'){
              $data['source'] = 'F腾讯视频app';
             }else if($_POST['source'] == 'gtxsp'){
              $data['source'] = 'G腾讯视频app';
             }else if($_POST['source'] == 'htxsp'){
              $data['source'] = 'H腾讯视频app';
             }else if($_POST['source'] == 'itxsp'){
              $data['source'] = 'I腾讯视频app';
             }else if($_POST['source'] == 'jtxsp'){
              $data['source'] = 'J腾讯视频app';
             }

       //10
       	else if($_POST['source'] == 'qqll'){
              $data['source'] = 'qq浏览器';//10
             }else if($_POST['source'] == 'aqqll'){
              $data['source'] = 'Aqq浏览器';
             }else if($_POST['source'] == 'bqqll'){
              $data['source'] = 'Bqq浏览器';
             }else if($_POST['source'] == 'cqqll'){
              $data['source'] = 'Cqq浏览器';
             }else if($_POST['source'] == 'dqqll'){
              $data['source'] = 'Dqq浏览器';
             }else if($_POST['source'] == 'eqqll'){
              $data['source'] = 'Eqq浏览器';
             }else if($_POST['source'] == 'fqqll'){
              $data['source'] = 'Fqq浏览器';
             }else if($_POST['source'] == 'gqqll'){
              $data['source'] = 'Gqq浏览器';
             }else if($_POST['source'] == 'hqqll'){
              $data['source'] = 'Hqq浏览器';
             }else if($_POST['source'] == 'iqqll'){
              $data['source'] = 'Iqq浏览器';
             }else if($_POST['source'] == 'jqqll'){
              $data['source'] = 'Jqq浏览器';
             }

       $data['time'] = time();
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