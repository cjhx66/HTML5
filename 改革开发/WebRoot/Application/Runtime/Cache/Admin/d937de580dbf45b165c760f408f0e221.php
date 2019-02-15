<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>大象群网站群管理系统</title>
	<meta name="Keywords" content="" />
	<meta name="Description" content="大象群旅游网站后台管理系统" />
	<link href="/Application/Admin/View/Base/Public/Css/reset.css" rel="stylesheet" type="text/css" />
	<script src="/Public/dwz/js/jquery-1.7.1.js" type="text/javascript"></script>
	<script src="/Application/Admin/View/Base/Public/Js/jquery.md5.js"></script>
	<script language="JavaScript">
		function fleshVerify(type){ 
			//重载验证码
			var timenow = new Date().getTime();
			if (type){
				$('#verifyImg').attr("src", '/index.php/Admin/Base/Public/verify/adv/1/'+timenow);
			}else{
				$('#verifyImg').attr("src", '/index.php/Admin/Base/Public/verify/'+timenow);
			}
		}
	</script>

</head>
<body>
	<div id="wrap">
		<form id="login_form"  name="form1" method="post" action="/index.php/Admin/Base/Public/checkLogin" >
			<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
			<table border="0" cellpadding="0" cellspacing="0" class="table1" >
				<tr class="usename">
					<td class="use1">
						<label>用户名：</label>
					</td>
					<td class="use2">
						<input id="name" name="name" type="text" class="input" /> 
					</td>
					<td>
						<span id="namecheck" style="font-size:15px;color:white" ></span> 				
					</td>
				</tr>

				<tr class="pasword">
					<td class="psd1">
						<label>密　码：</label>
					</td>
					<td class="psd2">
						<input name="password" id="password" type="password" class="input" autocomplete="off" /> 
					</td> 
					<td>
						<span id="mimacheck" style="font-size:15px;color:white" ></span> 				
					</td>
				</tr>

				<tr class="yanzhen">
					<td class="yz1">
						<label>验证码：</label>
					</td>
					<td class="yz2">
						<input name="code" id="code" type="text"  class="yan" style="float:left; margin-right:7px;" />
						<img id="verifyImg" src="/index.php/Admin/Base/Public/verify/" onClick="fleshVerify()" border="0" alt="点击刷新验证码" style="vertical-align:middle; cursor:pointer;" width="58" height="28" />
					</td>
					<td>
						<span id="codecheck" style="font-size:15px;color:white" ></span> 				
					</td>
				</tr>

				<tr class="tijiao">
					<td class="tj1"></td>
					<td class="tj2"><input id="submit_l" name="btn_login" type="button" />
					</td>
				</tr>
			</table>
		</form>
	</div> 
</body>
</html>
<script language="javascript" type="text/javascript">
	$(function(){ 
		var flag1 = false;
		var flag2 = false;
		var flag3 = false;

		$("#name").blur(function(){
			var name = $(this).val();
			$.ajax({
				type:"POST",
				url:'/index.php/Admin/Base/Public/namecheck',
				data:"name="+name, 
				dataType:'json',
				success:function(data){
					if(data.status == 1){
						flag1 = true;
					}
					$("#namecheck").html(data.msg); 
				}

			})	 
		})

		$("#password").blur(function(){
			var name = $("#name").val();  
			var password = $.md5( $(this).val() );
			$("#password").val(password);
			$.ajax({
				type:"POST",
				url:'/index.php/Admin/Base/Public/mimacheck',
				data:{"name":name,"password":password}, 
				dataType:'json',
				success:function(data){
					if(data.status == 1){
						flag2 = true;
					}
					$("#mimacheck").html(data.msg);
				}
			})	 
		})

		$("#code").blur(function(){
			var code=$(this).val();   
			$.ajax({
				type:"POST",
				url:'/index.php/Admin/Base/Public/codecheck',
				data:"code="+code, 
				dataType:'json',
				success:function(data){
					if(data.status == 1){
						flag3 = true;
					}
					$("#codecheck").html(data.msg); 
				}
			})	 
		})

		$('#submit_l').click(function(){
			if(flag1 && flag2 && flag3){
				document.form1.submit();
			}
		})	

	})

</script>