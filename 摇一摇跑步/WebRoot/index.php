<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx19c524311ae7ecc9", "986e7c4b9750be972619ea16428cc3e2");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>九间全民酷跑，五一跑出趣</title>
    <link rel="stylesheet" href="css/lib.css?time=New Date()">
    <meta name="viweport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <!--<meta name="viewport" content="width=device-width, viewport-fit=cover">-->
</head>
<body>
<div class="loading">
    <!-- <p class="jd"></p> -->
    <img class="load" src="img/load.png">
    <img class="dian1" src="img/dian.png">
    <img class="dian2" src="img/dian1.png">
</div>
<div class="main first">
    <img class="rule" src="img/rule.png">
    <img class="start" src="img/start.png">
    <div class="zhuzhen"></div>
    <div class="pop-up"></div>
</div>
<div class="jChen">
    <img class="j_start" src="img/jc.png">
</div>
<div class="second">
    <img class="btn-up" src="img/btn-up.png">
    <img class="btn-down" src="img/btn-down.png">
    <img class="ts" src="img/ts.png">
</div>
<div class="center">
    <div class="zhuzhen1"></div>
    <img class="round" src="img/qiu.png">
    <img class="miao" src="img/time.png">
    <div class="time">
        <img src="img/0.png" alt="">
        <img src="img/1.png" alt="">
        <img src="img/2.png" alt="">
        <img src="img/3.png" alt="">
        <img src="img/4.png" alt="">
        <img src="img/5.png" alt="">
        <img src="img/6.png" alt="">
        <img src="img/7.png" alt="">
        <img src="img/8.png" alt="">
        <img src="img/9.png" alt="">
        <img src="img/10.png" alt="">
        <img src="img/11.png" alt="">
        <img src="img/12.png" alt="">
        <img src="img/13.png" alt="">
        <img src="img/14.png" alt="">
        <img src="img/15.png" alt="" class="img-show">
    </div>
    <img class="btn1-up" src="img/btn-up.png">
    <img class="btn1-down" src="img/btn-down.png">
    <img class="tisi" src="img/tisi.png">
    <img class="go" src="img/go.png">
    <img class="dog" src="img/dog.png">
</div>
<div class="result">
    <p class="sum"></p>
    <img class="reset" src="img/reset.png">
    <img class="fx" src="img/fx.png">
    <img class="share" src="img/share.png">
    <div class="pop-down"></div>
</div>
<div class="music">
    <audio class="firstAudio" loop src="img/music.mp3" id="audio"></audio>
    <img src="img/music.png" alt="" class="music-k" id="music-k">
    <img src="img/music-g.png" alt="" class="music-g" id="music-g">
</div>
</body>
<script src="js/resetpage.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/preloadjs-0.6.0.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/index.js"></script>
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
            title: '九间全民酷跑，五一跑出趣',
            desc: '确认过的眼神，你是领奖的那个人～',
            link: location.href,
            imgUrl: 'http://shake.huiying.daxiangqun.net/img/share.jpg',
            trigger: function (res) {
                //alert("用户点击发送给朋友");
            },
            success: function (res) {
                //alert("已分享");
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
            title: '九间全民酷跑，五一跑出趣',
            link: location.href,
            imgUrl: 'http://shake.huiying.daxiangqun.net/img/share.jpg',
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
            ttitle: '九间全民酷跑，五一跑出趣',
            desc: '确认过的眼神，你是领奖的那个人～',
            link: location.href,
            imgUrl: 'http://shake.huiying.daxiangqun.net/img/share.jpg',
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
            title: '九间全民酷跑，五一跑出趣',
            desc: '确认过的眼神，你是领奖的那个人～',
            link: location.href,
            imgUrl: 'http://shake.huiying.daxiangqun.net/img/share.jpg',
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
            title: '九间全民酷跑，五一跑出趣',
            desc: '确认过的眼神，你是领奖的那个人～',
            link: location.href,
            imgUrl: 'http://shake.huiying.daxiangqun.net/img/share.jpg',
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