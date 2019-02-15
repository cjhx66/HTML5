$(function(){
	$(".ver_user").blur(function(e){
		if(!$(this).val()){
			$(".s_user").html("请输入用户名");
		}else if(!(isNaN(parseInt($(this).val().slice(0,1))))){
			$(".s_user").html("第一个字母不能为数字");
		}else{ 
			$(".s_user").html("通过"); 
		}
	});
	$(".ver_pass1").keyup(function(e){
		var val=$(this).val();
		var reg1=/[!@#$%^&*()_+=-]/g
		var reg2=/[a-z]/g
		var reg3=/\d/
		var str="aa"
		var n1=val.search(reg1)+1?1:0;
		var n2=val.search(reg2)+1?1:0;
		var n3=val.search(reg3)+1?1:0;
		var n=n1+n2+n3
		var arry=["弱","一般","强"];
		$(".s_pass1").html(arry[n-1]);
	});
	$(".ver_pass1").blur(function(e){
		if($(this).val().length<=6){
			$(".s_pass1").html("密码长度过短");
			$(".s_pass2").html("");
			return false;
		}else if($(this).val()&&$(this).val()==$(".ver_pass2").val()){
			$(".s_pass1").html("通过");
			$(".s_pass2").html("通过");
		}
		
		if(!$(".ver_pass1").val().length){
			$(".s_pass2").html("请输入密码");
		}else if($(this).val()!=$(".ver_pass2").val()){
			$(".s_pass2").html("两次密码输入不一致");
		}else{
			$(".s_pass2").html("通过");
		}
	});
	$(".ver_pass2").blur(function(e){
		if(!$(".ver_pass1").val().length){
			$(".s_pass2").html("请输入密码");
		}else if($(this).val()!=$(".ver_pass1").val()){
			$(".s_pass2").html("两次密码输入不一致");
		}else{
			$(".s_pass2").html("通过");
		}
	});
	
	$(".ver_phon1").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{11})?$/;
		falg=val.search(RegCellPhone);
		if (falg==-1){
			$(".s_phon1").html("手机号不合法！");
		}else if(!val.length){
			$(".s_phon1").html("请填写手机号");
		}else{
			$(".s_phon1").html("通过");
		}
	});
	$(".ver_phon2").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{11})?$/;
		falg=val.search(RegCellPhone);
		if (falg==-1){
			$(".s_phon2").html("手机号不合法！");
		}else if(!val.length){
			$(".s_phon2").html("请填写手机号");
		}else{
			$(".s_phon2").html("通过");
		}
	});
	$(".ver_huoyun").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{2,4})?$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_huoyun").html("请输入货运代码");			
		}else if (falg==-1){
			$(".s_huoyun").html("货运号不合法！");
		}else{
			$(".s_huoyun").html("通过");
		}
	});
	$(".ver_youbian").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{6})?$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_youbian").html("请输入邮编");
		}else if (falg==-1){
			$(".s_youbian").html("邮编号不合法！");
		}else{
			$(".s_youbian").html("通过");
		}
	});
	$(".ver_qq").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{1,10})?$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_qq").html("请输入QQ号码");
		}else if (falg==-1){
			$(".s_qq").html("QQ号码不合法");
		}else{
			$(".s_qq").html("通过");
		}
	});
	$(".ver_email").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_email").html("请输入邮箱");
		}else if (falg==-1){
			$(".s_email").html("邮箱不合法");
		}else{
			$(".s_email").html("通过");
		}
	});
})
