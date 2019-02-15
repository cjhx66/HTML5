<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>CMS管理</title>

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
</head>
<form id="pagerForm" action="/index.php/Admin/Base/W" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="numPerPage" value="10" />
	<input type="hidden" name="language" value="<?php echo ($_REQUEST["language"]); ?>" />
	<input type="hidden" name="account" value="<?php echo ($_REQUEST["account"]); ?>"/>
	
</form>
<body scroll="no" onload = "startTime();"> 
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="#">标志</a>
				<ul class="nav">
					<li><a href="#" target="_blank">欢迎您：<?php echo ($_SESSION['adminuser']['username']); ?></a></li>
					<li><a href="/index.php/Admin/Base/Public/password/id/<?php echo ($_SESSION['adminuser']['id']); ?>" target="dialog"   mask=true>修改密码</a></li>
					<li><a href="/index.php/Admin/Base/Public/logout/formstatus/<?php echo ($formstatus); ?>">退出</a></li>
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
						<h2><span>Folder</span><?php echo (getnamebywebid($webid,$webid)); ?></h2>
					</div>
					<div class="accordionContent">
						<ul id="edv" class="tree treeFolder">
						<?php if(is_array($modulelist)): $k = 0; $__LIST__ = $modulelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo["canview"] == 1): ?><li value="<?php echo ($vo["pid"]); ?>"  id="<?php echo ($vo["bid"]); ?>" class="<?php echo ($vo["id"]); ?>" >   
									<?php if($vo["url"] == ''): ?><a><?php echo ($vo["name"]); ?></a>
									<?php else: ?>
									<a href="/index.php/Admin/<?php echo ($vo["url"]); ?>classID/<?php echo ($vo["bid"]); ?>/w/<?php echo ($vo["wID"]); ?>/authid/<?php echo ($k-1); ?>" target="navTab" rel="classID<?php echo ($vo["bid"]); ?>"><?php echo ($vo["name"]); ?></a><?php endif; ?>	
								</li><?php endif; endforeach; endif; else: echo "" ;endif; ?> 
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
								<a href="#" target="_blank"></a>
							</p>
							<p  id="txt">今天是 <?php echo (date("Y-m-d H:i:s",$time)); ?></p>
						</div>
						
						<div class="pageFormContent" layoutH="80" style="margin-right:230px">
							 <h3>去其他站点：</h3> 
							<?php if(is_array($otherweb)): $i = 0; $__LIST__ = $otherweb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oth): $mod = ($i % 2 );++$i;?><h3><a href="/index.php/Admin/Base/W/index/veri/<?php echo ($oth); ?>"  rel="<?php echo (getnamebywebid($oth,$oth)); ?>"><?php echo (getnamebywebid($oth,$oth)); ?></a></h3><?php endforeach; endif; else: echo "" ;endif; ?>
					 </div> 
				</div>
			</div>
		</div> 
	</div>

	<div id="footer">Copyright &copy; 2012 <a href="demo_page2.html" target="dialog">开发团队</a><!-- Tel：--></div>
</body>
<script type="text/javascript">
	$(function(){ 
		var a=document.getElementById("edv").children;  
		var  pid=0;
		var  cid=0;
		
		for(var i=0;i<a.length;i++)
		{
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
		
	}) 
	
 
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