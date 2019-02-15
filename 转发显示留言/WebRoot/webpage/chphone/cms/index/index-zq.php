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
</head>
<body>
<!-- <div class="start" id="start">
    <audio src="music/铃声-电话铃声.mp3" autoplay id="audio" loop></audio>
    <img src="images/phone.png" alt="" class="phone">
    <img src="images/hand.png" alt="" class="hand">
    <img src="images/home_font.png" alt="" class="home_font">
</div> -->
<div class="main">
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
        </div>
    </div>
    <img src="images/arrow.png" id="array" class="resize">
    <div class="music music-k"></div>
    <audio src="music/Bandari-Snowdreams.mp3" id="music" loop></audio>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="js/lib.js"></script>
<script type="text/javascript">
    var text=window.location.href;
    alert(text);
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
            desc: '想说的在这里，没说的你都懂。',
            link: location.href,
            imgUrl: 'http://kqcmother.huiying.daxiangqun.net/share.jpg',
            trigger: function (res) {
                //alert("用户点击发送给朋友");
            },
            success: function (res) {
                 // alert("已分享");
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
            desc: '想说的在这里，没说的你都懂。',
            link: location.href,
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
            desc: '想说的在这里，没说的你都懂。',
            link: location.href,
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
          desc: '想说的在这里，没说的你都懂。',
          link: location.href,
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
          desc: '想说的在这里，没说的你都懂。',
          link: location.href,
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
<script type="text/javascript">
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
</script>
</html>