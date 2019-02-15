<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx21f1755e09035faa", "22cae9748c04a4a1627aa67fbc2a3e60");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>孔雀城英国宫</title>
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/swiper.animate.min.js"></script>
    <script src="js/resetpage.js"></script>
    <script src="js/swiper.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/mei.css">
</head>
<body>
<audio src="music/music.mp3" id="audio" loop></audio>
<div class="main" id="main">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="top swiper-slide">
                <img class="p1" src="images/1-bg.png">
                <img class="p1-2" src="images/1-logo.jpg">
                <img class="p1-3" src="images/1-txt1.png">
                <img class="p1-4" src="images/1-txt2.png">
                <img class="p1-5" src="images/dalogo.png">
                <img class="p1-6" src="images/happy.png">
            </div>
            <div class="center1 swiper-slide">
                <img class="p2" src="images/2-bg.png">
                <img class="p2-2" src="images/logo.jpg">
                <img class="p2-3" src="images/2-txt1.png">
                <img class="p2-4" src="images/2-txt2.png">
                <img class="p2-5" src="images/2-xian.png">
                <img class="p2-6" src="images/2-ye.png">
                <img class="p2-7" src="images/happy.png">
            </div>
            <div class="center2 swiper-slide">
                <img class="p3" src="images/3-bg.png">
                <img class="p3-2" src="images/logo.jpg">
                <img class="p3-3" src="images/3-txt1.png">
                <img class="p3-4" src="images/3-txt2.png">
                <img class="p3-5" src="images/happy.png">
                <img class="p3-6" src="images/3-hudie.png">
            </div>
            <div class="center3 swiper-slide">
                <img class="p4" src="images/4-bg.png">
                <img class="p4-2" src="images/logo.jpg">
                <img class="p4-3" src="images/4-txt1.png">
                <img class="p4-4" src="images/4-txt2.png">
                <img class="p4-5" src="images/happy.png">
            </div>
            <div class="center5 swiper-slide">
                <img class="p5" src="images/5-bg.png">
                <img class="p5-2" src="images/logo.jpg">
                <img class="p5-3" src="images/5-txt1.png">
                <img class="p5-4" src="images/5-txt2.png">
                <img class="p5-5" src="images/happy.png">
            </div>
            <div class="center6 swiper-slide">
                <img src="images/logo.jpg" alt="" class="p7-logo">
                <img src="images/6-txt1.png" alt="" class="p6-txt1">
                <img src="images/6-txt2.png" alt="" class="p6-txt2">
                <img src="images/6-bg.png" alt="" class="p6-bg">
                <img src="images/happy.png" alt="" class="p6-happy">
            </div>
            <div class="center7 swiper-slide">
                <img src="images/logo.jpg" alt="" class="p7-logo">
                <img src="images/7-txt1.png" alt="" class="p7-txt1">
                <i class="p7-bg"></i>
                <!--<img src="images/7-bg.png" alt="" class="p7-bg">-->
                <img src="images/happy.png" alt="" class="p7-happy">
                <img src="images/7-hua.png" alt="" class="p7-hua">
            </div>
            <div class="center8 swiper-slide">
                <img src="images/8-txt1.png" alt="" class="p8-txt1">
                <img src="images/8-happy.png" alt="" class="p8-txt2">
            </div>
            <div class="center9 swiper-slide" id="center9">
                <p class="title">致最爱的妈妈</p>
                <div class="info clearfix">
                    <textarea name="" id="area" placeholder="有些话说不出来...."></textarea>
                    <input type="text" class="name" id="name" placeholder="爱你的..." maxlength="6">
                    <input type="button" class="btn" id="btn_save" value="保存">
                    <input type="button" class="btn" id="btn_xie" value="我也要写">
                </div>
            </div>
            <div class="center10 swiper-slide">
                <img src="images/dalogo.png" alt="" class="p1-5">
                <img src="images/11-logo.jpg" alt="" class="p11-logo">
                <img src="images/happy.png" alt="" class="p10-happy">
                <img src="images/11-txt1.png" alt="" class="p11-txt1">
                <img src="images/dalogo.png" alt="" class="p1-5">
                <i class="p11-txt2"></i>
                <img src="images/11-xian.png" alt="" class="p11-xian">
                <img src="images/11-txt3.png" alt="" class="p11-txt3">
                <img src="images/11-bg.png" alt="" class="p11-bg">
                <img src="images/11-ewm.jpg" alt="" class="p11-ewm">
            </div>
        </div>
    </div>
    <img src="images/arrow.png" id="array" class="resize">
</div>
<div class="dialog"></div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    direction: 'vertical',
    onInit: function (swiper) {
        $(".p1-2").css({"animation": "p1-2 1s .2s forwards",});
        $(".p1-2").css({"-webkit-animation": "p1-2 1s .2s forwards",});
        $(".p1").css({"animation": "p1 2s 1s forwards",});
        $(".p1").css({"-webkit-animation": "p1 2s 1s forwards",});
        $(".p1-3").css({"animation": "p1-3 1.5s .5s forwards",});
        $(".p1-3").css({"-webkit-animation": "p1-3 1.5s .5s forwards",});
        $(".p1-4").css({"animation": "p1-4 2.2s 1s forwards",});
        $(".p1-4").css({"-webkit-animation": "p1-4 2.2s 1s forwards",});
        $(".p1-6").css({"animation": "p1-6 3s 2s forwards",});
        $(".p1-6").css({"-webkit-animation": "p1-6 3s 2s forwards",});
    },
    onSlideChangeStart: function (swiper) {
        if (swiper.activeIndex == 0) {
            $(".p1-2").css({"animation": "p1-2 1s .2s forwards",});
            $(".p1-2").css({"-webkit-animation": "p1-2 1s .2s forwards",});
            $(".p1").css({"animation": "p1 2s 1s forwards",});
            $(".p1").css({"-webkit-animation": "p1 2s 1s forwards",});
            $(".p1-3").css({"animation": "p1-3 1.5s .5s forwards",});
            $(".p1-3").css({"-webkit-animation": "p1-3 1.5s .5s forwards",});
            $(".p1-4").css({"animation": "p1-4 2.2s 1s forwards",});
            $(".p1-4").css({"-webkit-animation": "p1-4 2.2s 1s forwards",});
            $(".p1-6").css({"animation": "p1-6 3s 2s forwards",});
            $(".p1-6").css({"-webkit-animation": "p1-6 3s 2s forwards",});
        } else {
            $(".p1-2").css({"animation": "",});
            $(".p1-2").css({"-webkit-animation": "",});
            $(".p1").css({"animation": "",});
            $(".p1").css({"-webkit-animation": "",});
            $(".p1-3").css({"animation": "",});
            $(".p1-3").css({"-webkit-animation": "",});
            $(".p1-4").css({"animation": "",});
            $(".p1-4").css({"-webkit-animation": "",});
            $(".p1-6").css({"animation": "",});
            $(".p1-6").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 1) {
            $(".p2-2").css({"animation": "p2-2 3s 1.5s forwards",});
            $(".p2-2").css({"-webkit-animation": "p2-2 3s 1.5s forwards",});
            $(".p2").css({"animation": "p2 2s 1s forwards",});
            $(".p2").css({"-webkit-animation": "p2 2s 1s forwards",});
            $(".p2-3").css({"animation": "p2-3 1.5s .5s forwards",});
            $(".p2-3").css({"-webkit-animation": "p2-3 1.5s .5s forwards",});
            $(".p2-4").css({"animation": "p2-4 1.5s 1.5s forwards",});
            $(".p2-4").css({"-webkit-animation": "p2-4 1.5s 1.5s forwards",});
            $(".p2-5").css({"animation": "p2-5 1s 2s forwards",});
            $(".p2-5").css({"-webkit-animation": "p2-5 1s 2s forwards",});
            $(".p2-6").css({"animation": "p2-6 3s 2s forwards",});
            $(".p2-6").css({"-webkit-animation": "p2-6 3s 2s forwards",});
            $(".p2-7").css({"animation": "p2-7 3s 2s forwards",});
            $(".p2-7").css({"-webkit-animation": "p2-7 3s 2s forwards",});
        } else {
            $(".p2-2").css({"animation": "",});
            $(".p2-2").css({"-webkit-animation": "",});
            $(".p2").css({"animation": "",});
            $(".p2").css({"-webkit-animation": "",});
            $(".p2-3").css({"animation": "",});
            $(".p2-3").css({"-webkit-animation": "",});
            $(".p2-4").css({"animation": "",});
            $(".p2-4").css({"-webkit-animation": "",});
            $(".p2-5").css({"animation": "",});
            $(".p2-5").css({"-webkit-animation": "",});
            $(".p2-6").css({"animation": "",});
            $(".p2-6").css({"-webkit-animation": "",});
            $(".p2-7").css({"animation": "",});
            $(".p2-7").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 2) {
            $(".p3").css({"animation": "p3 2s 1s forwards",});
            $(".p3").css({"-webkit-animation": "p3 2s 1s forwards",});
            $(".p3-3").css({"animation": "p3-3 1.5s .5s forwards",});
            $(".p3-3").css({"-webkit-animation": "p3-3 1.5s .5s forwards",});
            $(".p3-4").css({"animation": "p3-4 2.5s 1.5s forwards",});
            $(".p3-4").css({"-webkit-animation": "p3-4 2.5s 1.5s forwards",});
            $(".p3-5").css({"animation": "p3-5 3s 2s forwards",});
            $(".p3-5").css({"-webkit-animation": "p3-5 3s 2s forwards",});
            $(".p3-6").css({"animation": "p3-6 3s 2s forwards",});
            $(".p3-6").css({"-webkit-animation": "p3-6 3s 2s forwards",});
        } else {
            $(".p3").css({"animation": "",});
            $(".p3").css({"-webkit-animation": "",});
            $(".p3-3").css({"animation": "",});
            $(".p3-3").css({"-webkit-animation": "",});
            $(".p3-4").css({"animation": "",});
            $(".p3-4").css({"-webkit-animation": "",});
            $(".p3-5").css({"animation": "",});
            $(".p3-5").css({"-webkit-animation": "",});
            $(".p3-6").css({"animation": "",});
            $(".p3-6").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 3) {
            $(".p4").css({"animation": "p4 2s 1s forwards",});
            $(".p4").css({"-webkit-animation": "p4 2s 1s forwards",});
            $(".p4-3").css({"animation": "p4-3 1.5s .5s forwards",});
            $(".p4-3").css({"-webkit-animation": "p4-3 1.5s .5s forwards",});
            $(".p4-4").css({"animation": "p4-4 2s 1s forwards",});
            $(".p4-4").css({"-webkit-animation": "p4-4 2s 1s forwards",});
            $(".p4-5").css({"animation": "p4-5 3s 2s forwards",});
            $(".p4-5").css({"-webkit-animation": "p4-5 3s 2s forwards",});
        } else {
            $(".p4").css({"animation": "",});
            $(".p4").css({"-webkit-animation": "",});
            $(".p4-3").css({"animation": "",});
            $(".p4-3").css({"-webkit-animation": "",});
            $(".p4-4").css({"animation": "",});
            $(".p4-4").css({"-webkit-animation": "",});
            $(".p4-5").css({"animation": "",});
            $(".p4-5").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 4) {
            $(".p5").css({"animation": "p5 2s 1s forwards",});
            $(".p5").css({"-webkit-animation": "p5 2s 1s forwards",});
            $(".p5-3").css({"animation": "p5-3 1.5s .5s forwards",});
            $(".p5-3").css({"-webkit-animation": "p5-3 1.5s .5s forwards",});
            $(".p5-4").css({"animation": "p5-4 2s 1.5s forwards",});
            $(".p5-4").css({"-webkit-animation": "p5-4 2s 1.5s forwards",});
            $(".p5-5").css({"animation": "p5-5 3s 2s forwards",});
            $(".p5-5").css({"-webkit-animation": "p5-5 3s 2s forwards",});
        } else {
            $(".p5").css({"animation": "",});
            $(".p5").css({"-webkit-animation": "",});
            $(".p5-3").css({"animation": "",});
            $(".p5-3").css({"-webkit-animation": "",});
            $(".p5-4").css({"animation": "",});
            $(".p5-4").css({"-webkit-animation": "",});
            $(".p5-5").css({"animation": "",});
            $(".p5-5").css({"-webkit-animation": "",});
        }
        if (swiper.activeIndex == 5) {
            $(".p6-txt1").css({"animation": "p6-txt1 2s forwards",});
            $(".p6-txt1").css({"-webkit-animation": "p6-txt1 2s forwards",});
            $(".p6-bg").css({"-webkit-animation": "p6-bg 2s 1s forwards",});
            $(".p6-bg").css({"animation": "p6-bg 2s 1s forwards",});
            $(".p6-txt2").css({"animation": "p6-txt2 2s 0.5s forwards",});
            $(".p6-txt2").css({"-webkit-animation": "p6-txt2 2s 0.5s forwards",});
            $(".p6-happy").css({"animation": "p6-happy 0.5s 1.5s forwards",});
            $(".p6-happy").css({"-webkit-animation": "p6-happy 0.5s 1.5s forwards",});
        } else {
            $(".p6-txt1").css({"animation": ""});
            $(".p6-txt1").css({"-webkit-animation": ""});
            $(".p6-bg").css({"animation": ""});
            $(".p6-bg").css({"-webkit-animation": ""});
            $(".p6-txt2").css({"animation": ""});
            $(".p6-txt2").css({"-webkit-animation": ""});
            $(".p6-happy").css({"animation": ""});
            $(".p6-happy").css({"-webkit-animation": ""});
        }
        if (swiper.activeIndex == 6) {
            $(".p7-txt1").css({"animation": "p7-txt1 2s forwards",});
            $(".p7-txt1").css({"-webkit-animation": "p7-txt1 2s forwards",});
            $(".p7-bg").css({"-webkit-animation": "p7-bg 2s 1s forwards",});
            $(".p7-bg").css({"animation": "p7-bg 2s 1s forwards",});
            $(".p7-happy").css({"animation": "p7-happy 0.5s 1.5s forwards",});
            $(".p7-happy").css({"-webkit-animation": "p7-happy 0.5s 1.5s forwards",});
            $(".p7-hua").css({"animation": "p7-hua 2s 1.5s forwards",});
            $(".p7-hua").css({"-webkit-animation": "p7-hua 2s 1.5s forwards",});
        } else {
            $(".p7-txt1").css({"animation": ""});
            $(".p7-txt1").css({"-webkit-animation": ""});
            $(".p7-bg").css({"animation": ""});
            $(".p7-bg").css({"-webkit-animation": ""});
            $(".p7-happy").css({"animation": ""});
            $(".p7-happy").css({"-webkit-animation": ""});
            $(".p7-hua").css({"animation": ""});
            $(".p7-hua").css({"-webkit-animation": ""});
        }
        if (swiper.activeIndex == 7) {
            $(".p8-txt1").css({"animation": "p8-txt1 1s forwards",});
            $(".p8-txt1").css({"-webkit-animation": "p8-txt1 1s forwards",});
            $(".p8-txt2").css({"animation": "p8-txt2 0.5s 1s forwards",});
            $(".p8-txt2").css({"-webkit-animation": "p8-txt2 0.5s 1s forwards",});
        } else {
            $(".p8-txt1").css({"animation": ""});
            $(".p8-txt1").css({"-webkit-animation": ""});
        }
        if (swiper.activeIndex == 8) {

        } else {

        }
        if (swiper.activeIndex == 9) {
            $(".p11-logo").css({"animation": "p11-logo 2s forwards",});
            $(".p11-logo").css({"-webkit-animation": "p11-logo 2s forwards",});
            $(".p10-happy").css({"animation": "p11-logo 0.5s 0.5s forwards",});
            $(".p10-happy").css({"-webkit-animation": "p11-logo 0.5s 0.5s forwards",});
            $(".p11-txt1").css({"animation": "p11-txt1 2s 1s forwards",});
            $(".p11-txt1").css({"-webkit-animation": "p11-txt1 2s 1s forwards",});
            $(".p11-txt2").css({"animation": "p11-txt2 2s 1s forwards"});
            $(".p11-txt2").css({"-webkit-animation": "p11-txt2 2s 1s forwards"});
            $(".p11-xian").css({"animation": "p11-xian 0.5s 1.5s forwards"});
            $(".p11-xian").css({"-webkit-animation": "p11-xian 0.5s 1.5s forwards"});
            $(".p11-txt3").css({"animation": "p11-txt3 1s 2.5s forwards"});
            $(".p11-txt3").css({"-webkit-animation": "p11-txt3 1s 2.5s forwards"});
        } else {
            $(".p11-logo").css({"animation": ""});
            $(".p11-logo").css({"-webkit-animation": ""});
            $(".p11-txt1").css({"animation": ""});
            $(".p11-txt1").css({"-webkit-animation": ""});
            $(".p11-happy").css({"animation": ""});
            $(".p11-happy").css({"-webkit-animation": ""});
            $(".p11-txt1").css({"animation": ""});
            $(".p11-txt1").css({"animation": ""});
            $(".p11-txt2").css({"animation": ""});
            $(".p11-txt2").css({"-webkit-animation": ""});
            $(".p11-xian").css({"animation": ""});
            $(".p11-xian").css({"-webkit-animation": ""});
            $(".p11-txt3").css({"animation": ""});
            $(".p11-txt3").css({"-webkit-animation": ""});
        }
    }
});
</script>
<script>
    function getURLParams(name) {
           var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
           var r = window.location.search.substr(1).match(reg);
           if (r != null) {
               return unescape(r[2]);
           }
           return null;
    }
    var id = getURLParams("id");
	var url=window.location.href;
	//alert("最初的url："+url);
	var ids=null;
	
	function inset(lj){
		$.post('/index.php/Ch/Mcenter/XiaoYuanbm/baomingadd', {
                text: "k",
                name: "k"
            }, function (msg) {
				//alert("现在的ｕｒｌ"+url);
                if (msg !== null && msg!=="error") {
					if(lj!=null){
						 url=lj+"?id="+msg;
					     alert("即将为您生成英国宫专属亲情邮箱！");
						 //alert("我也要写添加跳转的："+url);
						 window.location.href=url;
					}else if(lj==null){
						 url=url+"?id="+msg;
						 ids=msg;
						 //alert("默认没有ｉｄ"+url);
						 //alert("创建ｉｄ后的的url："+url);
					}
                }
                if (msg == "error") {
                    alert("未知错误");
                }
        });
	}
	//判断是否存在ｉｄ
    if (id != null) {
		//存在
        $.ajax({
            url: "/index.php/Ch/Mcenter/XiaoYuanbm/num",
			type:"get",
            data: {
                id: id
            },
            dataType:"json",
            success: function (rs) {
                var arr=[];
                for(var i in rs){
                    arr.push(rs[i]);
                }
				if(arr[1]=="k"&&arr[2]=="k"){
					//alert("新创建跳转")
					$("#name").val('').attr("readonly", false);
                    $("#area").val('').attr("readonly", false);
                    $("#btn_save").show();
                    $("#btn_xie").hide();
					types=false;
					swiper.slideTo(8);
				}else{
					$("#name").val(arr[1]).attr("readonly", true);
					$( "#area").val(arr[2]).attr("readonly", true);
					$("#btn_save").hide();
					//点击我也要写
					$("#btn_xie").show().click(function () {
						//清空之前的ｉｄ
						url=url.split("?")[0];
						inset(url);
						//console.log(url);
						//$("#name").val('').attr("readonly", false);
						//$("#area").val('').attr("readonly", false);
						//$("#btn_save").show();
						//$("#btn_xie").hide();
						//alert("即将为您生成英国宫专属亲情邮箱！");
						//window.location.href ="http://kqcmother.huiying.daxiangqun.net";
						//window.location.href =url;
					});
				}
            },
            error:function (res) {
                console.log("错误！");
            }
        });
    }else if(id==null){
		//不存在
		inset(null); 
	}
</script>
<script type="text/javascript">
    //保证弹出输入框时input全部显示
    var vh = null;
    window.onload = function () {
        vh = document.documentElement.clientHeight || document.body.clientHeight;
        $('html').css('height', vh);
        $('body').css('height', vh);
        //        $('.bottom_box').css('height', vh / 10);
        $('.swiper-container').css('height', vh);
    };
    window.onresize = function () {
        document.body.scrollTop = 10000;
        $('.swiper-container').css('height', vh);
    }
</script>
<script type="text/javascript">
	$(function () {
        var types = false;
		//点击提交
        $("#btn_save").click(function (){
			//alert(ids);
            if (types) {
                return false;
            }
            types = true;
			if(ids==null){
				ids=getURLParams("id");
			}
            var name = $("#name").val();
            if (!name) {
                alert("请输入昵称");
                return false
            }
            var text = $("#area").val();
            if (!text) {
                alert("请输入想说的话");
                return false
            }
			$.ajax({
				url: "/index.php/Ch/Mcenter/XiaoYuanbm/change",
				type:"post",
				data: {
					id: ids,
					name:name,
					text:text
				},
				//ataType:"json",
				success: function (rs) {
					if (rs =="success") {
						alert("已为您生成专属编号为"+ids+"的英国宫亲情邮箱！");
						$(".dialog").fadeIn();
						setTimeout(function () {
							$(".dialog").fadeOut();
							$('#area').attr("readonly",true);
							$('#name').attr("readonly",true);
							$("#btn_save").css("opacity","0.6","background","#000");
						},2000);  
					}
					if (rs == "error") {
						alert("未知错误");
					}
				},
				error:function (res) {
					 alert("提交失败，请重新提交");
				}
			});
        });
    });
    $(window).one('touchstart', function () {
        $("#audio")[0].play();
    });
    document.addEventListener("WeixinJSBridgeReady", function () {
        $("#audio")[0].play();
    }, false);
    document.addEventListener("WeixinJSBridgeReady", function () {
        audioAutoPlay('audio');//给个全局函数
    }, false);
    function audioAutoPlay(id) {//全局控制播放函数
        var audio = document.getElementById(id),
            play = function () {
                audio.play();
                document.removeEventListener("touchstart", play, false);
            };
        audio.play();
        document.addEventListener("touchstart", play, false);
    }
</script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"]?>',
        jsApiList: [
//            基础接口
            'checkJsApi',
            // 分享到朋友圈
            'onMenuShareTimeline',
//            分享给朋友
            'onMenuShareAppMessage',
            'translateVoice',
//          分享到qq
            'onMenuShareQQ',
            // 分享到微博
            'onMenuShareWeibo',
            // 分享到空间
            'onMenuShareQZone',
        ]
    });
    wx.ready(function () {
//        判断是否支持js接口
        wx.checkJsApi({
            jsApiList: [
                'getNetworkType',
                'previewImage'
            ],
            success: function (res) {
                //alert(JSON.stringify(res));
            }
        });
//        分享给朋友
        wx.onMenuShareAppMessage({
            title: '时光不待，大声说爱@最重要的人',
            desc: '想说的在这里，没说的用一辈子慢慢说',
            link: url,
            imgUrl: 'http://kqcmother.huiying.daxiangqun.net/share.jpg',
            trigger: function (res) {
                //alert("用户点击发送给朋友");
                //alert("分享的url:"+url);
            },
            success: function (res) {
                 //alert("已分享");
                 //alert(url);
            },
            cancel: function (res) {
                 //alert('已取消');
            },
            fail: function (res) {
                //alert(JSON.stringify(res));
            }
        });

// / 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
        wx.onMenuShareTimeline({
            title: '时光不待，大声说爱@最重要的人',
            desc: '想说的在这里，没说的用一辈子慢慢说',
            link:url,
            imgUrl: 'http://kqcmother.huiying.daxiangqun.net/share.jpg',
            trigger: function (res) {
            // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                // alert('用户点击分享到朋友圈');
            },
            success: function (res) {
                // alert('已分享');
            },
            cancel: function (res) {
                // alert('已取消');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

//  // 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
        wx.onMenuShareQQ({
            ttitle: '时光不待，大声说爱@最重要的人',
            desc: '想说的在这里，没说的用一辈子慢慢说',
            link: url,
            imgUrl: 'http://kqcmother.huiying.daxiangqun.net/share.jpg',
            trigger: function (res) {
                // alert('用户点击分享到QQ');
            },
            complete: function (res) {
                alert(JSON.stringify(res));
            },
            success: function (res) {
                // alert('已分享');
            },
            cancel: function (res) {
                // alert('已取消');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

//   // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
        wx.onMenuShareWeibo({
          title: '时光不待，大声说爱@最重要的人',
          desc: '想说的在这里，没说的用一辈子慢慢说',
          link: url,
          imgUrl: 'http://kqcmother.huiying.daxiangqun.net/share.jpg',
          trigger: function (res) {
            // alert('用户点击分享到微博');
          },
          complete: function (res) {
            alert(JSON.stringify(res));
          },
          success: function (res) {
            // alert('已分享');
          },
          cancel: function (res) {
            // alert('已取消');
          },
          fail: function (res) {
            alert(JSON.stringify(res));
          }
        });

// 2.5 监听“分享到QZone”按钮点击、自定义分享内容及分享接口
        wx.onMenuShareQZone({
          title: '时光不待，大声说爱@最重要的人',
          desc: '想说的在这里，没说的用一辈子慢慢说',
          link: url,
          imgUrl: 'http://kqcmother.huiying.daxiangqun.net/share.jpg',
          trigger: function (res) {
            // alert('用户点击分享到QZone');
          },
          complete: function (res) {
            alert(JSON.stringify(res));
          },
          success: function (res) {
            // alert('已分享');
          },
          cancel: function (res) {
            // alert('已取消');
          },
          fail: function (res) {
            alert(JSON.stringify(res));
          }
        });
    })
</script>
</html>