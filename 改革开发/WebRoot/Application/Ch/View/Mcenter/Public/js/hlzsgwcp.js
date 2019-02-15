// JavaScript Document

$(".picpc li a img").hover(function(){
	$("this").find(".cp").css({display:"block"})
	})
$(function(){
	$(".leftimg2").css({"visibility":"hidden"});
	$(".rightimg2").css({"visibility":"hidden"});
	

	$(".left").click(function(){
		$(".bg").css({display:"none;"});
		$(".bg1").css({display:"none;"});
		})
	$(".right").hover(function(){
		$(".rightimg2").css({"visibility":"visible"});
		})
	$(".left").hover(function(){
		$(".leftimg2").css({"visibility":"visible"});
		})
	$(".right").mouseleave(function(){
		$(".rightimg2").css({"visibility":"hidden"});
		})
	$(".left").mouseleave(function(){
		$(".leftimg2").css({"visibility":"hidden"});
		})
	})
/*$(".picpc li p a").click(function(){
	$("this").addClass("onit");
	})	*/
	/*使其加载过程中在其顶部显示*/
	function pageScroll(){ 
	window.scroll(0,0); 
	scrolldelay = setTimeout('pageScroll()',100); 
	if(document.documentElement.scrollTop==0) clearTimeout(scrolldelay); 
    } 