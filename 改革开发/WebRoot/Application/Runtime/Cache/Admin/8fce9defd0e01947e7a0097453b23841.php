<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<title>内容管理</title>

	<link href="/Public/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/Public/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/Public/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
	<link href="/Public/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="/Public/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<script src="/Public/dwz/js/speedup.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery-1.7.1.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>

<script src="/Public/dwz/xheditor/xheditor-1.1.12-zh-cn.min.js" type="text/javascript"></script>
<script src="/Public/dwz/uploadify/scripts/swfobject.js" type="text/javascript"></script>
<script src="/Public/dwz/uploadify/scripts/jquery.uploadify.v2.1.0.js" type="text/javascript"></script>


<script src="/Public/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="/Public/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
		DWZ.init("/Public/dwz/dwz.frag.xml", {
		//loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
		//loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{ pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({ themeBase:"/Public/dwz/themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
	});
</script>
<style>
	.pageFormContent{padding: 0;}
	.mainIntro ul{width: 100%;margin: 0;padding: 0;display: block;}
	.mainIntro ul li{height: 30px;line-height: 30px;padding: 0 10px;}
	.mainIntro ul li.liTitle{background: #ECF7FF;}
	.mainIntro ul li.liOne, .mainIntro ul li.liTwo{float: left;border: #ECF7FF 1px solid;border-top: none;}
	.mainIntro ul li.liOne{width: 20%}
	.mainIntro ul li.liTwo{width: 25%}
	.mainIntro ul li.liNav{clear: both;}
	.mainIntro ul li a:hover{text-decoration: none;color: red;}
</style>
</head>

<body scroll="no" onload = "startTime();"> 
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="#">标志</a>
				<ul class="nav">
					<li><a href="#" target="_blank">欢迎您：<?php echo ($_SESSION['adminuser']['username']); ?></a></li>
					<li><a href="/index.php/Admin/Base/Public/password/id/<?php echo ($_SESSION['adminuser']['id']); ?>" target="dialog"   mask=true>修改密码</a></li>
					<li><a href="/index.php/Admin/Base/Public/logout">退出</a></li>
				</ul>
				
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>
				<div class="accordion" fillSpace="sidebar">

					<div class="accordionHeader">
						<h2><span>Folder</span>大象群CMS网站管理系统</h2>
					</div>
					<div class="accordionContent">
						<ul id="edv" class="tree treeFolder">
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li  value="<?php echo ($vo["pid"]); ?>"  id="<?php echo ($vo["id"]); ?>" class="<?php echo ($vo["id"]); ?>" > 
									<?php if($vo["url"] == ''): ?><a><?php echo ($vo["name"]); ?></a>
										<?php else: ?>
										<a href="/index.php/Admin/<?php echo ($vo["url"]); ?>classID/<?php echo ($vo["id"]); ?>/language/<?php echo ($vo["language"]); ?>" target="navTab" rel="classID<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a><?php endif; ?>									
								</li><?php endforeach; endif; else: echo "" ;endif; ?> 
						</ul>
					</div> 
				</div>
			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<p>CMS内容管理系统
								<a href="javascript:;" target="_blank"></a>
							</p>
							<p id="txt">今天是 <?php echo (date("Y-m-d H:i:s",$time)); ?></p>
						</div>
						
						<?php if($language == 1): ?><div class="pageFormContent mainIntro" layoutH="80">
								<ul>
									<li class="liTitle">订单统计信息</li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Gdeal/index/classID/32/navTabId/classID32/language/1/status/4" target="navTab" rel="classID32">未发货订单</a></li>
									<li class="liTwo"><font color="red"><?php echo ($num["nosend"]); ?></font></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Gdeal/index/classID/32/navTabId/classID32/language/1/status/6" target="navTab" rel="classID32">未签收订单</a></li>
									<li class="liTwo"><?php echo ($num["nocheck"]); ?></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Gdeal/index/classID/32/navTabId/classID32/language/1/status/2" target="navTab" rel="classID32">未支付订单</a></li>
									<li class="liTwo"><?php echo ($num["nopay"]); ?></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Gdeal/index/classID/32/navTabId/classID32/language/1/status/7" target="navTab" rel="classID32">已成交订单数</a></li>
									<li class="liTwo"><?php echo ($num["finish"]); ?></li>
									<li class="liNav"></li>
								</ul>

								<ul>
									<li class="liTitle">商品统计信息</li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Goods/index/classID/28/navTabId/classID28/language/1" target="navTab" title="商品列表" rel="classID28">商品总数</a></li>
									<li class="liTwo"><?php echo ($num["total"]); ?></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Goods/index/classID/28/navTabId/classID28/language/1/type/6" target="navTab" title="库存警告商品列表" rel="classID28">库存警告商品数</a></li>
									<li class="liTwo"><font color="red"><?php echo ($num["warn"]); ?></font></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Goods/index/classID/28/navTabId/classID28/language/1/type/1" target="navTab" title="上架商品列表" rel="classID28">上架商品数</a></li>
									<li class="liTwo"><?php echo ($num["sjtotal"]); ?></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Goods/index/classID/28/navTabId/classID28/language/1/type/3" target="navTab" title="精品推荐列表" rel="classID28">精品推荐数</a></li>
									<li class="liTwo"><?php echo ($num["isjing"]); ?></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Goods/index/classID/28/navTabId/classID28/language/1/type/4" target="navTab" title="新品推荐列表" rel="classID28">新品推荐数</a></li>
									<li class="liTwo"><?php echo ($num["isnew"]); ?></li>
									<li class="liOne"><a href="/index.php/Admin/Emall/Goods/index/classID/28/navTabId/classID28/language/1/type/5" target="navTab" title="热销推荐列表" rel="classID28">热销推荐数</a></li>
									<li class="liTwo"><?php echo ($num["ishot"]); ?></li>
									<li class="liNav"></li>
								</ul>
							</div> 

							<?php else: ?>

							<div class="pageFormContent" layoutH="80" style="padding:10px 5px;">
								<h3>服务器软件：<?php echo ($software); ?></h3><br />  
								<h3>MySQL版本：<?php echo ($mysqlversion); ?></h3><br />
								<h3>系统时间：<?php echo ($servertime); ?></h3>
							</div><?php endif; ?>
					</div>
				</div>
			</div> 
		</div>

		<div id="footer">Copyright &copy; 2012 <a href="demo_page2.html" target="dialog">开发团队</a>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(function(){ 
		var a=document.getElementById("edv").children;
		var  pid=0;
		var  cid=0; 
		for(var i=0;i<a.length;i++){
			pid=a[i].value;
			cid=a[i].id;   
			obj = document.getElementById(pid); 
			if (obj){   
				var oLi=document.getElementById(pid).getElementsByTagName("ul");  
				if(oLi.length==0){ 
					var nei='<ul><li value="'+pid+'"  id="'+cid+'">'+document.getElementById(cid).innerHTML+'</li></ul>';  
					$("#edv").find("#"+cid+"").remove();
					i=i-1;
					obj.innerHTML+=nei; 
				}else{ 
					var nei='<li value="'+pid+'"   id="'+cid+'">'+document.getElementById(cid).innerHTML+'</li>'; 
					$("#edv").find("#"+cid+"").remove();
					i=i-1;
					oLi[0].innerHTML+=nei;
				}
			} 
		}
	});

	function startTime(){
		var today=new Date()
		var Y = today.getFullYear();
		var M = today.getMonth()+1;
		var D = today.getDate();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		// add a zero in front of numbers<10
		M=checkTime(M);
		m=checkTime(m)
		s=checkTime(s)
		document.getElementById('txt').innerHTML=Y+'-'+M+'-'+D+'　'+h+":"+m+":"+s;
		t=setTimeout('startTime()',500)
	}

	function checkTime(i){
		if (i<10) 
			{i="0" + i}
		return i
	}
</script>
</html>