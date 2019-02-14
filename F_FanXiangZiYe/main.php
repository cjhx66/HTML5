<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx7bef8f6f623a60b1", "d3870131aa9ffdf3d8004a88b1c9822a");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>第一次被识破重庆人真身的日子</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div id="allmap"></div>
    <h1>我离开重庆一两三四五六七八九十年了重庆，我想你了</h1>
    <header>
        <audio src="images/di.mp3" autoplay="" id="audio"></audio>
        <img src="images/top.png" alt="" class="h_strat">
        <img src="images/time.png" alt="" class="h_time">
        <div class="xiaoxi">
            <img src="images/xiaoxi.png" alt="" class="x1">
            <img src="images/xiaoxi.png" alt="" class="x2">
            <img src="images/xiaoxi.png" alt="" class="x3">
            <img src="images/xiaoxi.png" alt="" class="x4">
        </div>
        <img src="images/jiesuo.png" alt="" class="jiesuo">
    </header>
    <div class="main">
        <audio src="images/bg.mp3" preload="auto" id="bg" loop></audio>
        <div class="message">
            <div class="mes">
                <div class="m_023 clearfix m_cq">
                    <img src="images/023.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title m023 ts">重庆023全国后援会</span><span class="time">15:18</span></p>
                        <p>gai放碑马尔扎哈：[ 视频 ]</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/father.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title">老汉</span><span class="time">14:30</span></p>
                        <p>[ 微信红包 ]省着点花</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/mather.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title">全家最美的女人</span><span class="time">12:18</span></p>
                        <p>[链接] 熬夜给人体带来的伤害简直不敢想...</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/wanke.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title blue">重庆万科翡翠公园</span><span class="time">11:14</span></p>
                        <p>中央公园头排中轴主位,万科2018翡翠系...</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/dingyue.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title dyh ts">订阅号消息</span><span class="time">11:10</span></p>
                        <p>时尚芭莎:国民初恋秀智都胖了？冬天果...</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/xxk.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title ts xxk">叉叉裤<i class="bq"></i></span><span class="time">10:05</span></p>
                        <p>下铺兄弟：好久去吃个火锅 搓哈麻将也 <i class="jy time"></i></p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/xinchen.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title blue">新城控股</span><span class="time">09:20</span></p>
                        <p>千里入渝,从北到南,布局重庆热点区域</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/neibu.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title">内部油碟</span><span class="time">09:15</span></p>
                        <p> daaaaaad：来，喊爸爸</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/wanke-.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title blue">重庆万科</span><span class="time">08:30</span></p>
                        <p>天地十年|一座城市 一个时代的封面</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/von.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title">Von der Fuhr,王德福</span><span class="time">08:20</span></p>
                        <p>签证一周搞定，旅行社弄的所以贵点，不...</p>
                    </div>
                </div>
                <div class="m_023 clearfix">
                    <img src="images/wen.png" alt="" class="m023_img">
                    <div class="m_center">
                        <p><span class="title">文化路陈子然</span><span class="time">08:20</span></p>
                        <p>我专门问了医生的 可以喝白酒</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="images/bottom.png" alt="" class="m_bottom">
    </div>
    <div class="dialogue">
        <div class="dialog">
            <div class="d_meg clearfix">
                <img src="images/1.png" alt="">
            </div>
            <input class="input-upload" id="upload" type="file" accept="image/*">
        </div>
        <audio src="images/di4.mp3" id="music" preload="auto"></audio>
        <img src="images/m_bottom.jpg" alt="" class="m_bottom">
    </div>
    <footer>
        <canvas id="canvas" width="750" height="1206"></canvas>
        <p class="save">长按保存图片</p>
        <img src="images/start.jpg" class="canvasImg">
    </footer>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/resetpage.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=IDtpu8UOQyM21WIXth8KCIDfwT4nrFeP"></script>
<script src="js/index-ok.js"></script>
<script src="js/exif.js"></script>
<script>
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
                title: '第一次被识破重庆人真身的日子',
                desc: '此刻你在何地，你那边几点？',
                link: 'http://homebuyers.huiying.daxiangqun.net/main.php',
                imgUrl: 'http://homebuyers.huiying.daxiangqun.net/images/share.jpg'
            });
            wx.onMenuShareTimeline({
                title: '第一次被识破重庆人真身的日子',
                link: 'http://homebuyers.huiying.daxiangqun.net/main.php',
                imgUrl: 'http://homebuyers.huiying.daxiangqun.net/images/share.jpg'
            });
            wx.onMenuShareQQ({
                ttitle: '第一次被识破重庆人真身的日子',
                desc: '此刻你在何地，你那边几点？',
                link: 'http://homebuyers.huiying.daxiangqun.net/main.php',
                imgUrl: 'http://homebuyers.huiying.daxiangqun.net/images/share.jpg'
            });
            wx.onMenuShareWeibo({
                title: '第一次被识破重庆人真身的日子',
                desc: '此刻你在何地，你那边几点？',
                link: 'http://homebuyers.huiying.daxiangqun.net/main.php',
                imgUrl: 'http://homebuyers.huiying.daxiangqun.net/images/share.jpg'
            });
            wx.onMenuShareQZone({
                title: '第一次被识破重庆人真身的日子',
                desc: '此刻你在何地，你那边几点？',
                link: 'http://homebuyers.huiying.daxiangqun.net/main.php',
                imgUrl: 'http://homebuyers.huiying.daxiangqun.net/images/share.jpg'
            });
        });
</script>
<script>
    if(!localStorage.getItem("info")){
            location.href="index.php";
    }else{
        $(".xiaoxi .x1").addClass("x_1");
        $(".xiaoxi .x2").addClass("x_2");
        $(".xiaoxi .x3").addClass("x_3");
        $(".xiaoxi .x4").addClass("x_4");
        init();
    }
    if (!$("header").is(":hidden")) {
        $(window).one('touchstart', function () {
            $("#audio")[0].play();
        });
        document.addEventListener("WeixinJSBridgeReady", function () {
            $("#audio")[0].play();
        }, false);
        document.addEventListener("WeixinJSBridgeReady", function () {
            audioAutoPlay('audio'); //给个全局函数
        }, false);
        musicTime();
    }
    function audioAutoPlay(id) { //全局控制播放函数
        var audio = document.getElementById(id),
            play = function () {
                audio.play();
                document.removeEventListener("touchstart", play, false);
            };
        audio.play();
        document.addEventListener("touchstart", play, false);
    }

    function musicTime() {
        var audio = document.getElementById("audio");
        var index = 1;
        audio.play();
        audio.addEventListener('ended', function () {
            // setTimeout(function () {
                if (index < 2) {
                    audio.play();
                    index++
                } else {
                    audio.pause();
                }
            // }, 300);
        }, false);
    }
</script>
</html>