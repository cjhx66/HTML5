//=================================全局变量============================
 //判定浏览器类型
var isQuirks = document.compatMode == "BackCompat";
var isStrict = document.compatMode == "CSS1Compat";
var isGecko = navigator.userAgent.toLowerCase().indexOf("gecko") != -1;
var isChrome = navigator.userAgent.toLowerCase().indexOf("chrome") != -1;
var isOpera = navigator.userAgent.toLowerCase().indexOf("opera") != -1;
var isIE = navigator.userAgent.toLowerCase().indexOf("msie") != -1 && !isOpera;
var isIE8 = navigator.userAgent.toLowerCase().indexOf("msie 8") != -1 && !!window.XDomainRequest && !!document.documentMode;
var isIE7 = navigator.userAgent.toLowerCase().indexOf("msie 7") != -1 && !isIE8;
var isIE6 = isIE && parseInt(navigator.userAgent.split(";")[1].replace(/(^\s*)|(\s*$)/g,"").split(" ")[1])<7;
var isBorderBox = isIE && isQuirks;
//=================================自动加载脚本，样式等===================
var Server = {};
Server.ContextPath = "/Website/Tpl/Default/Public/";
Server.importScript = function(url){
	if(!document.body){
		document.write('<script type="text/javascript" src="' + Server.ContextPath+url + '"><\/script>') ;
	}else{
		Server.loadScript(Server.ContextPath+url);
	}
}
Server.importCSS = function(url){
	if(!document.body){
		document.write('<link rel="stylesheet" type="text/css" href="' + Server.ContextPath+url + '" />') ;
	}else{
		Server.loadCSS(Server.ContextPath+url);
	}
}
Server.loadScript = function(url){//在页面载入后添加script
	var e = document.createElement('SCRIPT') ;
	e.type	= 'text/javascript' ;
	e.src	= url ;
	e.defer	= true ;
	document.getElementsByTagName("HEAD")[0].appendChild(e);
}
Server.loadCSS = function(url){//在页面载入后添加script
	if(isGecko){
		var e = document.createElement('LINK') ;
		e.rel	= 'stylesheet' ;
		e.type	= 'text/css' ;
		e.href	= url ;
		document.getElementsByTagName("HEAD")[0].appendChild(e) ;
	}else{
		document.createStyleSheet(url);
	}
}

//==================================自动加载样式脚本等=================


/*START_LOADSCRIPT*/
if(!window.DisableScriptAutoLoad){
	Server.importScript("js/jquery-1.7.2.min.js");
	Server.importScript("js/reset.js");
	Server.importCSS("css/reset.css");
}
/*END_LOADSCRIPT*/

//===================取值函数======

//屏幕宽高
function screen_wh() {
	return {
		w: document.documentElement.clientWidth || document.body.clientWidth,
		h: document.documentElement.clientHeight || document.body.clientHeight
	};
};
//文档宽高
function doc_wh() {
	return {
		w: document.body.scrollWidth,
		h: document.body.scrollHeight
	};
};
//滚动条的位置
function scroll_y() { 
	return document.body.scrollTop || document.documentElement.scrollTop;
};

function headNav(){
	//二级导航
	$(".nav li").each(function(){
		$(this).hover(function(){
			$(this).find(".header").stop(false,false).slideDown();
		},function(){
			$(this).find(".header").stop(false,false).slideUp();
		});
	});
}
//判断浏览器版本


if(isIE6){
	  alert("建议您切换到IE7以上浏览器进行观看,效果更佳");
}
/*
var browser=navigator.appName
var b_version=navigator.appVersion
var version=b_version.split(";");
var trim_Version=version[1].replace(/[ ]/g,"");		//判断的可能有问题  

if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0")

{

    alert("建议您切换到IE7以上浏览器进行观看,效果更佳");

}
*/