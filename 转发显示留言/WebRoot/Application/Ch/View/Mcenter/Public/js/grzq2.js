// JavaScript Document

  
$(".close").click(function(){
	$(".grzqtc").css('display', 'none');
	$("#greybackground").detach();  //背景隐藏
	$("#wbpllb li").removeClass("cli");
	})

$("#wbpllb li").click(function(){	
	var width=$(document).width();
	var heigth=$(document).height();
	$(".GrzqDiv").css({
	   'top':(heigth/5)+'px',
	   'left':370+'px'
	});
	$(this).next().show();
	//弹出登录框时隐藏背景
		$("body").append("<div id='greybackground'></div>");
		var documentheight = $(window.document).height();
		$("#greybackground").css({'opacity':'0.3', 'height':documentheight});	
})
//设置弹出框 和滚动条一起滚动
$(window).scroll( function() {
var height=$(this).scrollTop(); //获得滚动条距窗口顶部的高度
$(".GrzqDiv").css('margin-top',(height-300));
})