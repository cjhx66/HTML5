/*****
**江笑灵：系统通用脚本函数
**QQ:309900655
**2009.10.01
**/
var JFun; if (!JFun) JFun = {};

 /**
 **去除头尾空格
 **/
JFun.Trim=function(str){
	  str=str.replace(/(^\s*)|(\s*$)/g, "");
	  return str;
};
  
 /**
 **判断是否Email格式
 **/
JFun.IsEmail=function(email){
   var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
   return reg.test(email);
};

JFun.IsImg=function(img){
	var ext=".jpg,.gif,.bmp,.png";
	var ind=img.lastIndexOf(".");
	var fileExt=img.substr(img.lastIndexOf(".")).toLowerCase();
	if(ext.indexOf(fileExt)==-1){
		return false;
		}
	return true;
}

	  /**
  **以下函数判断是否是正确的正整数
  **如果是返回true,否则返回false
 **/
JFun.IsIntNum=function(str){
     var r = /^[1-9][0-9]*$/;　　//正整数 
	 if(r.test(str.replace(/(^\s*)|(\s*$)/g, ""))){
	    return true;
	 }
	 return false;
}

 /**
  **以下函数判断是否是正确的整数
 **/
JFun.IsInteger=function(str){
     var r = /^[-\+]?\d+$/; 
	 if(r.test(str.replace(/(^\s*)|(\s*$)/g, ""))){
	    return true;
	 }
	 return false;
}

JFun.Replace=function(urlstr){
	 if(urlstr.indexOf("?")>0) urlstr+="&jxlrandom="+Math.random();
	  else urlstr+="?jxlrandom="+Math.random();
	  location.replace(urlstr);
};

/**
* 系统层需要修改图片路径，用于其它层加载使用
*/
JFun.pubHideDiv=function(){
	var str="<div id=\"pub_hide_div\" style=\"display:none;position:absolute;z-index:3\">";
        str+="<div id=\"pub_hide_div_load\"></div>";
        str+="</div>";
		return str;
};
JFun.pubHideDiv2=function(){
	var str="<div id=\"pub_hide_div2\" style=\"display:none;position:absolute;z-index:3\">";
        str+="<div id=\"pub_hide_div_load2\"></div>";
        str+="</div>";
		return str;
};

//=======jquery
/**
*页面脚本提交函数，prams必须参数：'formaction':'','formid':'' , 需要定义一个"表单名_msg"的消息显示元素，定义一个"表单名_btn"的提交按钮
*可选参数:prams.validate:验证方式 . callback为回调函数
**/
JFun.AjaxFormSub=function(prams,callback){	
     var form=document.getElementById(prams.formid);
     var message=prams.formid+"_message";
     var subbtn=prams.formid+"_submit";
	 var validate=2; //默认值为2
	 if(prams.validate) validate=prams.validate;
	 if(JValidator.Validate(form,validate)){
			$('#'+message).text("正在提交...");
			$('#'+subbtn).attr("disabled",true);  
			$.ajax({
				 type: "POST",
				 url: prams.formaction,
				 cache:false,
				 data: $(form).serialize(),
				 success: function(msg){
			       var json = eval( "("+msg+")" );
				   if(json.success){ 
					   if($('#'+message)) $('#'+message).text("提示:"+json.message);
					   if($('#'+subbtn)) $('#'+subbtn).attr("disabled",true);  
					   if(callback)callback(json);
					}else{
					   if($('#'+message)) $('#'+message).text("警告:"+json.message);
					   if($('#'+subbtn)) $('#'+subbtn).attr("disabled",false);  
					   if(callback)callback(json);
					}
				 }
			});                
   }   
};

//get方式提交
JFun.AjaxLoad=function(prams,callback){	
	var message=prams.msg;
	var url=prams.url;	 

	if(url.indexOf("?")>0)
		url+="&t="+Math.random();
	else
	 	url+="?t="+Math.random();
	if(message) $('#'+message).text("正在更新数据，请稍候...");
	$.get(url,function(msg){
			var json = eval( "("+msg+")" );
			//if(message) $('#'+message).text(json.message);
			if(callback)callback(json);
		});
};

JFun.clearLoad=function(){
	 setTimeout(function(){		   
        $('#loading').remove();
        $('#loading-mask').fadeOut({remove:true});
    }, 500);
 };
 //==以上需要第三方jquery1.3支持
 
 

//=======ext
/**调用示例：
   JFun.showDlgWin(btnStr,urlStr,titleStr,widthStr,heightStr);
   或
   var pram={btn:"btn-channind",url:"cont!htmlChann.do?sid=${sid}&cid=${cid}",title,width:200,height:100};
   Ext.onReady(showExtDlgWin,pram);
   //需要引用第三方Ext文件
*/
JFun.showDlgWin=function(btnStr,urlStr,titleStr,widthStr,heightStr){
	 var pram={btn:btnStr,url:urlStr,title:titleStr,width:widthStr,height:heightStr};
	 Ext.onReady(JFun.showExtDlgWin,pram);
};

JFun.showExtDlgWin=function(){
	  var width=this.width;
	  var height=this.height;
	  var urlstr=this.url;
	  var btnstr=this.btn;
	  var title=this.title;
	  var button = Ext.get(btnstr);
	  if(urlstr.indexOf("?")>0) urlstr+="&jxlrandom="+Math.random();
	  else urlstr+="?jxlrandom="+Math.random();
	  button.on('click', function(){			  
			var win = new Ext.Window({
				   id:'exechtml',
				   title: title, 
				   xtype:'window',
				   width:width,
				   height:height,
				   closeAction:'close',
				   plain: true,
				   modal : true,
				   autoLoad:{url:urlstr,noCache:true}
			   });
		 win.show();
	 });
};

JFun.disableInputs=function() {
	$(function() {
		$("input").attr("disabled","disabled");
	})
};
JFun.round=function formatFloat(src, pos) {
	return Math.round(src*Math.pow(10, pos))/Math.pow(10, pos);
}
			
//以上需要ext支持


  


   
   

  
