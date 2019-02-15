// JavaScript Document 
$(function(){
	var a=$("#imglength").val();
	$("#lb1 .bigpicwrap img:eq(0)").css({display:'block'});
	$("#lb1 .pic li:eq(0)").addClass("firstLi");
	var lilen=$("#lb1 .bigpicwrap img").length; 
	var showlilen=8;
	var liwid=93;
	$("#lb1 .pic").css({width:lilen*liwid+"px"});
	
	$("#lb1 .pic li").each(function(index){
		$(this).click(function(){
			$("#lb1 .pic li").removeClass("firstLi");
			$("#lb1 .pic li:eq("+index+")").addClass("firstLi");
			$("#lb1 .bigpicwrap img").css({display:'none'})
			$("#lb1 .bigpicwrap img:eq("+index+")").css({display:'block'})
		});
	});
	
	$("#lb1 .righticon").click(function(){
		var firIndex=$("#lb1 .firstLi").index();
			firIndex++;
		if(firIndex>=lilen){
			firIndex=lilen-1;
			alert("已经是最后一张了")
		};
		huantu(firIndex);
		if(firIndex>showlilen-1){
			moviehuantu(-firIndex);
		};
	});
	
	$("#lb1 .lefticon").click(function(){
		var firIndex=$("#lb1 .firstLi").index();
			firIndex--;
		if(firIndex<0){
			firIndex=0;
			alert("已经是第一张了")
		}
			huantu(firIndex);
	});
	
	function huantu(index){
		$("#lb1 .pic li").removeClass("firstLi");
		$("#lb1 .pic li:eq("+index+")").addClass("firstLi");
		$("#lb1 .bigpicwrap img").css({display:'none'})
		$("#lb1 .bigpicwrap img:eq("+index+")").css({display:'block'})
	};
	function moviehuantu(index){
		$("#lb1 .pic").css({left:index*liwid+"px"});
	};
	$("#lb1 .picpage a").css({display:"none"});
	$("#lb1 .picpage").hover(function(){
		$(this).find(".lefticon").css({display:"block"});
		$(this).find(".righticon").css({display:"block"});
	},function(){
		$(this).find(".lefticon").css({display:"none"});
		$(this).find(".righticon").css({display:"none"});
	});
	
}); 




$(function(){
	$("#lb2 .bigpicwrap img:eq(0)").css({display:'block'});
	$("#lb2 .pic li:eq(0)").addClass("firstLi");
var lilen=$("#lb2 .pic li").length; 
var showlilen=8;
var liwid=93;
	$("#lb2 .pic").css({width:lilen*liwid+"px"});
	
	$("#lb2 .pic li").each(function(index){
		$(this).click(function(){
			$("#lb2 .pic li").removeClass("firstLi");
			$("#lb2 .pic li:eq("+index+")").addClass("firstLi");
			$("#lb2 .bigpicwrap img").css({display:'none'})
			$("#lb2 .bigpicwrap img:eq("+index+")").css({display:'block'})
		});
	});
	
	$("#lb2 .righticon").click(function(){
		var firIndex=$("#lb2 .firstLi").index();
			firIndex++;
		if(firIndex>=lilen){
			firIndex=lilen-1;
			alert("已经是最后一张了")
		};
		huantu(firIndex);
		if(firIndex>showlilen-1){
			moviehuantu(-firIndex);
		};
	});
	
	$("#lb2 .lefticon").click(function(){
		var firIndex=$("#lb2 .firstLi").index();
			firIndex--;
		if(firIndex<0){
			firIndex=0;
			alert("已经是第一张了")
		}
			huantu(firIndex);
			/*alert(firIndex);*/
		//if(){
		
		//};
			moviehuantu(-firIndex);
	});
	
	function huantu(index){
		$("#lb2 .pic li").removeClass("firstLi");
		$("#lb2 .pic li:eq("+index+")").addClass("firstLi");
		$("#lb2 .bigpicwrap img").css({display:'none'})
		$("#lb2 .bigpicwrap img:eq("+index+")").css({display:'block'})
	};
	function moviehuantu(index){
		$("#lb2 .pic").css({left:index*liwid+"px"});
	};
	$("#lb2 .picpage a").css({display:"none"});
	$("#lb2 .picpage").hover(function(){
		$(this).find(".lefticon").css({display:"block"});
		$(this).find(".righticon").css({display:"block"});
	},function(){
		$(this).find(".lefticon").css({display:"none"});
		$(this).find(".righticon").css({display:"none"});
	});
}); 


$(function(){
	$("#lb3 .bigpicwrap img:eq(0)").css({display:'block'});
	$("#lb3 .pic li:eq(0)").addClass("firstLi");
var lilen=$("#lb3 .pic li").length; 
var showlilen=8;
var liwid=93;
	$("#lb3 .pic").css({width:lilen*liwid+"px"});
	
	$("#lb3 .pic li").each(function(index){
		$(this).click(function(){
			$("#lb3 .pic li").removeClass("firstLi");
			$("#lb3 .pic li:eq("+index+")").addClass("firstLi");
			$("#lb3 .bigpicwrap img").css({display:'none'})
			$("#lb3 .bigpicwrap img:eq("+index+")").css({display:'block'})
		});
	});
	
	$("#lb3 .righticon").click(function(){
		var firIndex=$("#lb3 .firstLi").index();
			firIndex++;
		if(firIndex>=lilen){
			firIndex=lilen-1;
			alert("已经是最后一张了")
		};
		huantu(firIndex);
		if(firIndex>showlilen-1){
			moviehuantu(-firIndex);
		};
	});
	
	$("#lb3 .lefticon").click(function(){
		var firIndex=$("#lb3 .firstLi").index();
			firIndex--;
		if(firIndex<0){
			firIndex=0;
			alert("已经是第一张了")
		}
			huantu(firIndex);
			/*alert(firIndex);*/
		//if(){
		
		//};
			moviehuantu(-firIndex);
	});
	
	function huantu(index){
		$("#lb3 .pic li").removeClass("firstLi");
		$("#lb3 .pic li:eq("+index+")").addClass("firstLi");
		$("#lb3 .bigpicwrap img").css({display:'none'})
		$("#lb3 .bigpicwrap img:eq("+index+")").css({display:'block'})
	};
	function moviehuantu(index){
		$("#lb3 .pic").css({left:index*liwid+"px"});
	};
	$("#lb3 .picpage a").css({display:"none"});
	$("#lb3 .picpage").hover(function(){
		$(this).find(".lefticon").css({display:"block"});
		$(this).find(".righticon").css({display:"block"});
	},function(){
		$(this).find(".lefticon").css({display:"none"});
		$(this).find(".righticon").css({display:"none"});
	});
	
}); 

$(function(){
	$("#lb4 .bigpicwrap img:eq(0)").css({display:'block'});
	$("#lb4 .pic li:eq(0)").addClass("firstLi");
var lilen=$("#lb4 .pic li").length; 
var showlilen=8;
var liwid=93;
	$("#lb4 .pic").css({width:lilen*liwid+"px"});
	
	$("#lb4 .pic li").each(function(index){
		$(this).click(function(){
			$("#lb4 .pic li").removeClass("firstLi");
			$("#lb4 .pic li:eq("+index+")").addClass("firstLi");
			$("#lb4 .bigpicwrap img").css({display:'none'})
			$("#lb4 .bigpicwrap img:eq("+index+")").css({display:'block'})
		});
	});
	
	$("#lb4 .righticon").click(function(){
		var firIndex=$("lb4 .firstLi").index();
			firIndex++;
		if(firIndex>=lilen){
			firIndex=lilen-1;
			alert("已经是最后一张了")
		};
		huantu(firIndex);
		if(firIndex>showlilen-1){
			moviehuantu(-firIndex);
		};
	});
	
	$("#lb4 .lefticon").click(function(){
		var firIndex=$("lb4 .firstLi").index();
			firIndex--;
		if(firIndex<0){
			firIndex=0;
			alert("已经是第一张了")
		}
			huantu(firIndex);
			/*alert(firIndex);*/
		//if(){
		
		//};
			moviehuantu(-firIndex);
	});
	
	function huantu(index){
		$("#lb4 .pic li").removeClass("firstLi");
		$("#lb4 .pic li:eq("+index+")").addClass("firstLi");
		$("#lb4 .bigpicwrap img").css({display:'none'})
		$("#lb4 .bigpicwrap img:eq("+index+")").css({display:'block'})
	};
	function moviehuantu(index){
		$("#lb4 .pic").css({left:index*liwid+"px"});
	};
	$("#lb4 .picpage a").css({display:"none"});
	$("#lb4 .picpage").hover(function(){
		$(this).find(".lefticon").css({display:"block"});
		$(this).find(".righticon").css({display:"block"});
	},function(){
		$(this).find(".lefticon").css({display:"none"});
		$(this).find(".righticon").css({display:"none"});
	});
	
}); 

// JavaScript Document 
$(function(){
	var a=$("#imglength").val();
	$("#lb5 .bigpicwrap img:eq(0)").css({display:'block'});
	$("#lb5 .pic li:eq(0)").addClass("firstLi");
	var lilen=$("#lb1 .bigpicwrap img").length; 
	var showlilen=8;
	var liwid=93;
	$("#lb5 .pic").css({width:lilen*liwid+"px"});
	
	$("#lb5 .pic li").each(function(index){
		$(this).click(function(){
			$("#lb5 .pic li").removeClass("firstLi");
			$("#lb5 .pic li:eq("+index+")").addClass("firstLi");
			$("#lb5 .bigpicwrap img").css({display:'none'})
			$("#lb5 .bigpicwrap img:eq("+index+")").css({display:'block'})
		});
	});
	
	$("#lb5 .righticon").click(function(){
		var firIndex=$("#lb5 .firstLi").index();
			firIndex++;
		if(firIndex>=lilen){
			firIndex=lilen-1;
			alert("已经是最后一张了")
		};
		huantu(firIndex);
		if(firIndex>showlilen-1){
			moviehuantu(-firIndex);
		};
	});
	
	$("#lb5 .lefticon").click(function(){
		var firIndex=$("#lb5 .firstLi").index();
			firIndex--;
		if(firIndex<0){
			firIndex=0;
			alert("已经是第一张了")
		}
			huantu(firIndex);
			/*alert(firIndex);*/
		//if(){
		
		//};
			//moviehuantu(-firIndex);
	});
	
	function huantu(index){
		$("#lb5 .pic li").removeClass("firstLi");
		$("#lb5 .pic li:eq("+index+")").addClass("firstLi");
		$("#lb5 .bigpicwrap img").css({display:'none'})
		$("#lb5 .bigpicwrap img:eq("+index+")").css({display:'block'})
	};
	function moviehuantu(index){
		$("#lb1 .pic").css({left:index*liwid+"px"});
	};
	$("#lb1 .picpage a").css({display:"none"});
	$("#lb1 .picpage").hover(function(){
		$(this).find(".lefticon").css({display:"block"});
		$(this).find(".righticon").css({display:"block"});
	},function(){
		$(this).find(".lefticon").css({display:"none"});
		$(this).find(".righticon").css({display:"none"});
	});
	
});
