<?php
return array( 
	//'配置项'=>'配置值' 
	'USER_AUTH_KEY' => 'adminuser', //后台用户信息存放到session中的下标值。 
	
	//url不区分大小写
	'URL_CASE_INSENSITIVE' =>false,
 	
	//图片服务器
	"IMAGE_SERVER"=>'图片服务器', 
	
	//自定义跳转页面
	'TMPL_ACTION_SUCCESS'	=>'Base:Public:jump',
	'TMPL_ACTION_ERROR'		=>'Base:Public:jump', 
	
	//controller层级关系
	'CONTROLLER_LEVEL'      =>  2, 
	
	//后台的绑定到的方法  在页面和方法里面用C('BASE')的方法来获取
	"BASE"               =>  "/Admin/Base/"  ,
	"CMS"                =>  "/Admin/Cms/"  ,
	"EMALL"              =>  "/Admin/Emall/"  ,
	"LTAN"               =>  "/Admin/Ltan/"  ,
	"MCENTER"            =>  "/Admin/Mcenter/"  ,

	'DEFAULT_FILTER' => 'htmlspecialchars, htmlentities',
	'VAR_FILTERS'=>'htmlspecialchars, htmlentities, strip_tags',
);