$(function(){
	$(".ver_user").blur(function(e){
		if(!$(this).val()){
			$(".s_user").html("�������û���");
		}else if(!(isNaN(parseInt($(this).val().slice(0,1))))){
			$(".s_user").html("��һ����ĸ����Ϊ����");
		}else{ 
			$(".s_user").html("ͨ��"); 
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
		var arry=["��","һ��","ǿ"];
		$(".s_pass1").html(arry[n-1]);
	});
	$(".ver_pass1").blur(function(e){
		if($(this).val().length<=6){
			$(".s_pass1").html("���볤�ȹ���");
			$(".s_pass2").html("");
			return false;
		}else if($(this).val()&&$(this).val()==$(".ver_pass2").val()){
			$(".s_pass1").html("ͨ��");
			$(".s_pass2").html("ͨ��");
		}
		
		if(!$(".ver_pass1").val().length){
			$(".s_pass2").html("����������");
		}else if($(this).val()!=$(".ver_pass2").val()){
			$(".s_pass2").html("�����������벻һ��");
		}else{
			$(".s_pass2").html("ͨ��");
		}
	});
	$(".ver_pass2").blur(function(e){
		if(!$(".ver_pass1").val().length){
			$(".s_pass2").html("����������");
		}else if($(this).val()!=$(".ver_pass1").val()){
			$(".s_pass2").html("�����������벻һ��");
		}else{
			$(".s_pass2").html("ͨ��");
		}
	});
	
	$(".ver_phon1").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{11})?$/;
		falg=val.search(RegCellPhone);
		if (falg==-1){
			$(".s_phon1").html("�ֻ��Ų��Ϸ���");
		}else if(!val.length){
			$(".s_phon1").html("����д�ֻ���");
		}else{
			$(".s_phon1").html("ͨ��");
		}
	});
	$(".ver_phon2").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{11})?$/;
		falg=val.search(RegCellPhone);
		if (falg==-1){
			$(".s_phon2").html("�ֻ��Ų��Ϸ���");
		}else if(!val.length){
			$(".s_phon2").html("����д�ֻ���");
		}else{
			$(".s_phon2").html("ͨ��");
		}
	});
	$(".ver_huoyun").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{2,4})?$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_huoyun").html("��������˴���");			
		}else if (falg==-1){
			$(".s_huoyun").html("���˺Ų��Ϸ���");
		}else{
			$(".s_huoyun").html("ͨ��");
		}
	});
	$(".ver_youbian").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{6})?$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_youbian").html("�������ʱ�");
		}else if (falg==-1){
			$(".s_youbian").html("�ʱ�Ų��Ϸ���");
		}else{
			$(".s_youbian").html("ͨ��");
		}
	});
	$(".ver_qq").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([0-9]{1,10})?$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_qq").html("������QQ����");
		}else if (falg==-1){
			$(".s_qq").html("QQ���벻�Ϸ�");
		}else{
			$(".s_qq").html("ͨ��");
		}
	});
	$(".ver_email").blur(function(e){
		var val=$(this).val();
		var RegCellPhone = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		falg=val.search(RegCellPhone);
		if(!$(this).val()){
			$(".s_email").html("����������");
		}else if (falg==-1){
			$(".s_email").html("���䲻�Ϸ�");
		}else{
			$(".s_email").html("ͨ��");
		}
	});
})
