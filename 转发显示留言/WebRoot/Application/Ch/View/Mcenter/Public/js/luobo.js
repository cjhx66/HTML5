// JavaScript Document 
$(function(){
	$(".bigpicwrap img:eq(0)").css({display:'block'});
	$(".pic li:eq(0)").addClass("firstLi");
var lilen=$(".pic li").length; 
var showlilen=12;
var liwid=82;
	$(".pic").css({width:lilen*82+"px"});
	
	$(".pic li").each(function(index){
		$(this).click(function(){
			$(".pic li").removeClass("firstLi");
			$(".pic li:eq("+index+")").addClass("firstLi");
			$(".bigpicwrap img").css({display:'none'})
			$(".bigpicwrap img:eq("+index+")").css({display:'block'})
		});
	});
	
	$(".righticon").click(function(){
		var firIndex=$(".firstLi").index();
			firIndex++;
		if(firIndex>=lilen){
			firIndex=0;
			//alert("已经是最后一张了")
		};
		huantu(firIndex);
		if(firIndex>showlilen-1){
			moviehuantu(-firIndex);
		};
	});
	
	$(".lefticon").click(function(){
		var firIndex=$(".firstLi").index();
			firIndex--;
		if(firIndex<0){
			firIndex=lilen-1;
			//alert("已经是第一张了")
		}
			huantu(firIndex);
			if(firIndex>13){
				//	alert(firIndex);	
				moviehuantu(-firIndex);
			};
			
	});
	
	function huantu(index){
		$(".pic li").removeClass("firstLi");
		$(".pic li:eq("+index+")").addClass("firstLi");
		$(".bigpicwrap img").css({display:'none'})
		$(".bigpicwrap img:eq("+index+")").css({display:'block'})
		$(".imgIntro").hide();
		$(".imgIntro:eq("+index+")").show();
	}
	function moviehuantu(index){
	$(".pic").css({left:index*liwid+"px"});
	};
	$(".picpage a").css({display:"none"});
	$(".picpage").hover(function(){
		$(this).find(".lefticon").css({display:"block"});
		$(this).find(".righticon").css({display:"block"});
		$(this).find(".smallpicbg").css({display:"block"});
	},function(){
		$(this).find(".lefticon").css({display:"none"});
		$(this).find(".righticon").css({display:"none"});
		$(this).find(".smallpicbg").css({display:"none"});
	});
	
}); 


/*
$(function()
{  
    $(".pic li:eq(0)").addClass("onit");
    $(".pic li").click(function(){
		$(this).addClass("onit").siblings().removeClass("onit");
	});
	$(".bigpicwrap").find("img").eq(0).show();	  
	$(".pic").find("li").eq(0).find("b").hide();
	$(".pic").find("li").each(function(index)
	{	
		$(this).click(function()
		{	
			$(this).find("b").hide().parent().siblings().find("b").show();
			$(".bigpicwrap").find("img").eq(index).show().siblings().hide();	  
		});
		
	});
		
		var i =0;
		var timer=null;
	
		var Oli  =$(".pic li").width();
		var LiL= $(".pic li").length;
		var Oul=$(".pic");
		var Owidth =Oli*LiL+50+'px';
		$(".pic").css("width",Owidth);
		$(".pic").innerHTML=$(".pic").innerHTML+$(".pic").innerHTML;

		
		$(".lefticon").click(function()
		{
			if(i>0)
			{
				Oul.animate({left:-Oli*(i-1)},function()
							{
								$(".pic").find("li").eq(i+4).find("b").hide().parent().siblings().find("b").show();
								$(".bigpicwrap").find("img").eq(i+4).show().siblings().hide();	
							});
				
        		i--;
			}else
			{
				Oul.animate({left:'0px'});
				i=0;
				 alert("第一张")
			}
	
		});
		$(".righticon").click(function()
		{
			if($(".pic li").length > (i+5))
			{
				Oul.animate({left:-Oli*(i+1)},function()
							{
								$(".pic").find("li").eq(i).find("b").hide().parent().siblings().find("b").show();
								$(".bigpicwrap").find("img").eq(i).show().siblings().hide();	
							});
				i++; 
			}else
			{
				Oul.animate({left:-Oli*($(".pic li").length-5)});
				i=$(".pic li").length-5;
				 alert("最后一张")
			} 
		}); 
});
*/