<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx5893f2ddccf64d9b", "bb24c5cd99d90f1f20e1bca7fe45ac89");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="screen-orientation" content="portrait">
    <title>圣诞大作战！看看你的手速快还是我转的快~</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        a{
            display:none;
        }
        #container {
            width: 100vw;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .start {
            background: url("images/start-bg.jpg") no-repeat;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            position: relative;
        }

        .start .btn {
            position: absolute;
            top: 79.6%;
            left: 50%;
            width: 245px;
            margin-left: -122.5px;
        }

        .btn_start {
            margin-bottom: 15px;
        }

        .dialog {
            width: 100%;
            height: 100%;
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .dialog img {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .dialog .guize {
            top: calc((100% - 896px) / 2 - 100px);
        }

        .dialog .close {
            top: calc((100% - 896px) / 2 + 850px);
        }

        #gamepanel {
            width: 100%;
            height: 100%;
            position: relative;
            display: none;
        }

        canvas {
            width: 100%;
            height: 100%;
            background: url("images/bg.jpg") no-repeat;
            background-size: 100% 100%;
        }

        .score-wrap {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 7%;
        }

        .score-wrap img {
            width: 32.8px;
            height: auto;
        }

        .logo {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: calc(22% + 130px);
        }

        .level {
            position: absolute;
            left: 50%;
            top: calc(24% + 170px);
            transform: translateX(-50%) scale(0);
            font-size: 40px;
            color: #fff;
            font-family: 楷体;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.8);
            line-height: 250px;
            text-align: center;
            animation: scale 0.8s ease-out forwards;
        }

        @keyframes scale {
            0% {
                transform: translateX(-50%) scale(0);
            }
            100% {
                transform: translateX(-50%) scale(1);
            }
        }

        .num {
            margin: 0 15px;
        }

        .resultPanel, .resultPanel .weixin-share,.resultPanel .fx {
            position: absolute;
            left: 0;
            top: 0
        }

        .resultPanel {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
        }
        .fx {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 1);
            display: none;
            z-index: 10;
        }
        #over {
            position: absolute;
            left: 50%;
            top: 13.93%;
            margin-left: -333.5px;
            width: 667px;
            height: auto;
        }

        #over > img {
            display: none;
        }

        #over .out {
            display: block;
        }

        .textc {
            width: 100%;
            padding: 0 79px;
            box-sizing: border-box;
            margin-top: 136px;
        }

        .textc .replay-s {
            display: none;
        }

        .textc .btn1 {
            margin-left: 40px;
        }
        .music-k {
            animation: xuanzhuan 5s infinite linear;
        }
        .music {
            background: url(images/musicicon.png) no-repeat;
            width: 42px;
            height: 43px;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 11;
            display: none;
        }
        @keyframes xuanzhuan {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        @-webkit-keyframes xuanzhuan {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        @media only screen and (device-width: 375px) and (device-height: 812px) and        (-webkit-device-pixel-ratio: 3) {
            .start {
                background: url("images/startX-bg.jpg") no-repeat;
                background-size: 100% 100%;
            }

            .btn_start {
                margin-bottom: 20px;
            }

            canvas {
                background: url("images/bgX.jpg") no-repeat;
                background-size: 100% 100%;
            }

            #over {
                top: 22%;
            }
        }
    </style>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1275748654'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s96.cnzz.com/z_stat.php%3Fid%3D1275748654%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script>
</head>
<body>
<div id="container">
    <div class="start">
        <div class="btn">
            <img src="images/start-btn.png" alt="" class="btn_start" id="guidePanel">
            <img src="images/start-gz.png" alt="" class="btn_guize">
        </div>
        <div class="dialog">
            <img src="images/gz.png" alt="" class="guize">
            <img src="images/close.png" alt="" class="close">
        </div>
    </div>
    <div id="gamepanel">
        <div class="score-wrap">
            <img src="images/time/1.png" alt="" id="shi">
            <img src="images/time/5.png" alt="" id="ge">
        </div>
        <img src="images/logo.png" alt="" class="logo">
        <canvas id="stage" class="canvas" width="750" height="1208"></canvas>
        <p class="level">第<img src="images/time/1_1.png" alt="" class="num">关</p>
    </div>
    <div class="music music-k"></div>
    <audio src="music/1.mp3" preload="auto" loop="loop" class="audio" id="music"></audio>
    <div id="resultPanel" class="resultPanel">
        <div class="fx">
            <img src="images/fenxiang.png" class="weixin-share"/>
        </div>
        <div id="over">
            <img src="images/error.png" alt="" class="out">
            <img src="images/success.png" alt="" class="success">
            <div class="textc">
                <img src="images/reset-e.png" alt="" class="replay-e replay">
                <img src="images/reset-s.png" alt="" class="replay-s replay">
                <img src="images/fx.png" alt="" class="btn1">
            </div>
        </div>
    </div>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/zepto.min.js"></script>
<script src="js/resetpage.js"></script>
<script src="js/play.js"></script>
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
//          获取网络信息
            'getNetworkType',
//          微信扫一扫
            'scanQRCode',
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
            title: '圣诞大作战！看看你的手速快还是我转的快~',
            desc: '圣诞快乐哟~',
            link: location.href,
            imgUrl: 'http://game.huiying.daxiangqun.net/images/share.jpg',
            trigger: function (res) {
                //alert("用户点击发送给朋友");
            },
            success: function (res) {
                // alert("已分享");
            },
            cancel: function (res) {
                // alert('已取消');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

// / 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
        wx.onMenuShareTimeline({
            title: '圣诞大作战！看看你的手速快还是我转的快~',
            link: location.href,
            imgUrl: 'http://game.huiying.daxiangqun.net/images/share.jpg',
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
            ttitle: '圣诞大作战！看看你的手速快还是我转的快~',
            desc: '圣诞快乐哟~',
            link: location.href,
            imgUrl: 'http://game.huiying.daxiangqun.net/images/share.jpg',
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
            title: '圣诞大作战！看看你的手速快还是我转的快~',
            desc: '圣诞快乐哟~',
            link: location.href,
            imgUrl: 'http://game.huiying.daxiangqun.net/images/share.jpg',
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
            title: '圣诞大作战！看看你的手速快还是我转的快~',
            desc: '圣诞快乐哟~',
            link: location.href,
            imgUrl: 'http://game.huiying.daxiangqun.net/images/share.jpg',
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
<script>
    $(function () {
        $(".btn_start").click(function () {
            $(".start").hide();
            $(".music").show();
            $("#gamepanel").show();
            Game();
            $("#music")[0].play();
            setTimeout(function () {
                $(".level").hide();
            }, 800);
        });
        $(".btn_guize").click(function () {
            $(".dialog").show();
        });
        $(".dialog").click(function () {
            $(".dialog").hide();
        });
        $(".btn1").click(function () {
            $(".fx").show();
        });
        $(".fx").click(function () {
            $(".fx").hide();
        });
        $(".replay").click(function () {
            $(".out").show();
            $(".success").hide();
            $(".replay-e").show();
            $(".replay-s").hide();
            $("#resultPanel").hide();
            Game();
        });
        $(".music").on("touchstart", function () {
            if ($(this).hasClass('music-k')) {
                $("#music")[0].pause();
                $(this).removeClass("music-k");
            } else {
                $("#music")[0].play();
                $(this).addClass("music-k");
            }
        });
        $('#gamepanel').on("touchstart", function (e) {
            e.preventDefault()
        });
    });

</script>
</html>