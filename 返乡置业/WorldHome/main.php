<?php
require_once "../jssdk.php";
$jssdk = new JSSDK("xxx", "xxx");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>世界再大 也要回家</title>
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <style>
        .landscape .close {
            position: absolute;
            left: 80px;
            top: 40px;
            display: block;
            width: 80px;
            height: 40px;
            font-size: 24px;
            line-height: 40px;
            text-align: center;
            color: white;
            border-radius: 10px;
            border: 3px solid #fff;
            z-index: 100;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <i class="music on"></i>
    <audio id="music" src="images/video/music.mp3" hidden="true" loop="loop"></audio>
    <div class="main">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="top swiper-slide">
                    <img src="images/H5.1.png" class="bg">
                    <img src="images/H5.1.1.png" class="p1-1">
                    <img src="images/02.png" alt="" class="xian1">
                    <i class="xian1-z"></i>
                    <img src="images/01.png" alt="" class="xian2">
                    <i class="xian2-z"></i>
                    <p class="click_v">点击视频，感受他们的思乡情愫</p>
                    <div class="start">
                        <img src="images/video.png" alt="" class="video-img">
                        <img src="images/H5.1.4.png" alt="" class="play">
                    </div>
                </div>
                <div class="center2 swiper-slide">
                    <img src="images/H5.2.jpg" class="bg">
                    <i class="p2-1"></i>
                </div>
                <div class="center3 swiper-slide">
                    <img src="images/H5.3.jpg" class="bg">
                    <img src="images/H5.3.1.png" class="p3-1">
                </div>
                <div class="center4 swiper-slide">
                    <img src="images/H5.4.jpg" class="bg">
                    <img src="images/H5.4.1.png" class="p4-1">
                </div>
                <div class="center5 swiper-slide">
                    <img src="images/H5.5.jpg" class="bg">
                    <img src="images/H5.5.1.png" class="p5-1">
                </div>
                <div class="center6 swiper-slide">
                    <img src="images/H5.6.jpg" class="bg">
                    <img src="images/H5.6.1.png" class="p6-1">
                    <img src="images/false.png" alt="" class="false">
                    <img src="images/upload.png" alt="" class="photo">
                    <input class="input-upload" id="upload" type="file" accept="image/*">
                    <img src="images/haibao.png" class="btn" id="btn">
                    <textarea name="" id="" maxlength="50" class="talk-zi" placeholder="输入留言 限50字内"></textarea>
                </div>
            </div>
        </div>
        <img src="images/arrow1.png" class="resize">
    </div>
    <div class="landscape">
        <video src="images/video/video-2.mp4" id="video" x5-video-player-type="h5" webkit-playsinline="true"
            playsinline="" x-webkit-airplay="true" airplay="allow" width="" height="" x5-video-orientation="landscape"
            x5-video-player-fullscreen="true" poster="" preload="auto" controls="controls"></video>
        <span class="close">返回</span>
    </div>
    <footer>
        <canvas id="canvas" width="750" height="1206"></canvas>
        <img src="images/arrow.png" alt="" class="save">
        <div class="dialog">
            <img src="images/arrow.jpg" alt="" class="save saveX">
            <img src="images/tisi.png" alt="" class="tisi">
        </div>
        <div class="anniu">
            <img src="images/pic.png" alt="" class="pic">
            <img src="images/liuyan.png" alt="" class="liuyan">
        </div>
    </footer>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="../js/resetpage.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="../js/exif.js"></script>
<script src="js/index.js"></script>
<script>
    if(!localStorage.getItem("info")){
        location.href="index.php";
    }else{
        var json = localStorage.getItem("info");
        init(json);
    }
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"]?>',
        jsApiList: [
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'translateVoice',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareQZone'
            ]
    });
    wx.ready(function () {
        wx.onMenuShareAppMessage({
            title: '世界再大，也要回家',
            desc: '走得出世界的圈，逃不过思乡的愁',
            link: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/index.php',
            imgUrl: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/images/share.png'
        });
        wx.onMenuShareTimeline({
            title: '世界再大，也要回家',
            link: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/index.php',
            imgUrl: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/images/share.png'
        });
        wx.onMenuShareQQ({
            ttitle: '世界再大，也要回家',
            desc: '走得出世界的圈，逃不过思乡的愁',
            link: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/index.php',
            imgUrl: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/images/share.png'
        });
        wx.onMenuShareWeibo({
            title: '世界再大，也要回家',
            desc: '走得出世界的圈，逃不过思乡的愁',
            link: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/index.php',
            imgUrl: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/images/share.png'
        });
        wx.onMenuShareQZone({
            title: '世界再大，也要回家',
            desc: '走得出世界的圈，逃不过思乡的愁',
            link: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/index.php',
            imgUrl: 'http://homebuyers.huiying.daxiangqun.net/WorldHome/images/share.png'
        });
    });
</script>
<script type="text/javascript">
   $(window).one("touchstart",function(){$("#music")[0].play()});document.addEventListener("WeixinJSBridgeReady",function(){$("#music")[0].play()},false);document.addEventListener("WeixinJSBridgeReady",function(){audioAutoPlay("music")},false);function audioAutoPlay(id){var audio=document.getElementById(id),play=function(){audio.play();document.removeEventListener("touchstart",play,false)};audio.play();document.addEventListener("touchstart",play,false)}$(".music").on("touchstart",function(){if($(this).hasClass("on")){$("#music")[0].pause();$(this).removeClass("on").addClass("off")}else{$("#music")[0].play();$(this).removeClass("off").addClass("on")}});
</script>
<script>
  $(function(){var swiper=new Swiper(".swiper-container",{pagination:".swiper-pagination",effect:"fade",paginationClickable:true,direction:"vertical",onInit:function(swiper){$(".p1-1").css({"animation":"zoomIn 0.8s ease-in forwards","-webkit-animation":"zoomIn 0.8s ease-in forward",});$(".xian1-z").css({"animation":"xian1 0.8s linear 0.8s forwards","-webkit-animation":"xian1 0.8s linear 0.8s forwards",});$(".xian2-z").css({"animation":"xian2 0.5s linear 1.6s forwards","-webkit-animation":"xian2 0.5s linear 1.6s forwards",})},onSlideChangeStart:function(swiper){if(swiper.activeIndex==0){$(".p1-1").css({"animation":"zoomIn 0.8s ease-in forwards","-webkit-animation":"zoomIn 0.8s ease-in forward",});$(".xian1-z").css({"animation":"xian1 0.8s linear 0.8s forwards","-webkit-animation":"xian1 0.8s linear 0.8s forwards",});$(".xian2-z").css({"animation":"xian2 0.5s linear 1.6s forwards","-webkit-animation":"xian2 0.5s linear 1.6s forwards",});$(".resize").attr("src","images/arrow1.png").show()}else{$(".p1-1").css({"animation":"","-webkit-animation":"",});$(".xian1-z").css({"animation":"","-webkit-animation":"",});$(".xian2-z").css({"animation":"","-webkit-animation":"",});$(".resize").attr("src","images/arrow.png").show()}if(swiper.activeIndex==1){$(".p2-1").css({"animation":"p2-1 0.8s ease-in forwards","-webkit-animation":"p2-1 0.8s ease-in forward",})}else{$(".p2-1").css({"animation":"","-webkit-animation":"",})}if(swiper.activeIndex==2){$(".p3-1").css({"animation":"p3-1 0.8s ease-in forwards","-webkit-animation":"p3-1 0.8s ease-in forward",})}else{$(".p3-1").css({"animation":"","-webkit-animation":"",})}if(swiper.activeIndex==3){$(".p4-1").css({"animation":"p4-1 0.8s ease-in forwards","-webkit-animation":"p4-1 0.8s ease-in forward",})}else{$(".p4-1").css({"animation":"","-webkit-animation":"",})}if(swiper.activeIndex==4){$(".p5-1").css({"animation":"p5-1 0.8s ease-in forwards","-webkit-animation":"p5-1 0.8s ease-in forward",})}else{$(".p5-1").css({"animation":"","-webkit-animation":"",})}if(swiper.activeIndex==5){$(".p6-1").css({"animation":"p6-1 0.8s ease-in forwards","-webkit-animation":"p6-1 0.8s ease-in forward",});$(".resize").hide()}else{$(".p6-1").css({"animation":"","-webkit-animation":"",})}}})});
</script>
</html>