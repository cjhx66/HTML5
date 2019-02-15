<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxe1ab423afa869828", "3916bd9a4e0fb410906678549e7ebbfd");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>我们这一年</title>
    <script src="js/html5media.min.js"></script>
    <script src="js/resetpage.js"></script>
    <style type="text/css">
          * {
              margin: 0;
              padding: 0;
          }

          body {
              background: #000;
          }

          .main {
              width: 100%;
              height: 100%;
              position: relative;
          }

          .main1 {
              position: absolute;
              display: block;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              background: url("img/5.jpg") no-repeat;
              background-size: 100% 100%;
          }

          .btn {
              position: absolute;
              width: 50px;
              height: 50px;
              background: #fff;
              border-radius: 100%;
              left: 50%;
              top: 50%;
              margin-left: -25px;
              margin-top: -25px;
          }

          .btn:after {
              content: "";
              position: absolute;
              left: 18px;
              top: 18px;
              width: 0;
              height: 0;
              border-top: 10px solid transparent;
              border-left: 15px solid #333333;
              border-bottom: 10px solid transparent;
              transform: rotate(90deg);
          }

          #video {
              position: absolute;
              top: 0;
              left: 0;
              display: none;
              border: 0;
          }
      </style>
</head>
<body>
<div class="main" id="main">
    <i class="main1" id="main1"></i>
    <i class="btn" id="btn"></i>
    <video src="img/3.mp4" id="video" x5-video-player-type="h5" webkit-playsinline="true" playsinline
           x-webkit-airplay="true" airplay="allow" width="" height="" x5-video-orientation="landscape"
           x5-video-player-fullscreen="true" poster="" preload="auto" controls></video>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    var video = document.getElementById("video");
    var btn = document.getElementById("btn");
    var main = document.getElementById("main");
    var main1 = document.getElementById("main1");
    main.style.height = window.innerHeight + "px";
    video.style.width = window.innerWidth + "px";
    video.style.height = window.innerHeight + "px";
    var ua = navigator.userAgent;
    window.addEventListener("orientationchange", function() {
         if(window.orientation=="-90"||window.orientation=="90"){
            video.style.width = document.body.clientWidth + "px";
            video.style.height =(window.screen.availWidth-50) + "px";
            main.style.height =(window.screen.availWidth-50) + "px";
        }
         if(window.orientation=="0"){
           main.style.height = window.innerHeight + "px";
           video.style.width = window.innerWidth + "px";
           video.style.height = window.innerHeight + "px";
        }
    }, false);
     if (ua.indexOf("iPhone") > 0) {
            btn.style.display = "none";
            main1.style.display = "none";
            video.style.display = "block";
            video.style.width = window.innerWidth + "px";
            video.style.height = window.innerHeight + "px";
            video.play();
        } else if (ua.indexOf("Android") > 0) {
            btn.onclick = function () {
              video.style.width = "640px";
              video.style.height = window.innerHeight + "px";
                btn.style.display = "none";
                main1.style.display = "none";
                video.style.display = "block";
                video.play();
            }
        }
    document.addEventListener("WeixinJSBridgeReady", function onBridgeReady() {
        if (ua.indexOf("iPhone") > 0) {
            btn.style.display = "none";
            main1.style.display = "none";
            video.style.display = "block";
            video.style.width = "640px";
            video.style.height = window.innerHeight + "px";
            video.play();
        } else if (ua.indexOf("Android") > 0) {
            btn.onclick = function () {
                btn.style.display = "none";
                main1.style.display = "none";
                video.style.display = "block";
                video.style.width = "640px";
                video.style.height = window.innerHeight + "px";
                video.play();
            }
        }
    });

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
//          分享到qq
            'onMenuShareQQ',
            // 分享到微博
            'onMenuShareWeibo',
            // 分享到空间
            'onMenuShareQZone',
        ]
    });
    wx.ready(function () {
        video.play();//video标签id=media
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
            title: '《我们这一年》',
            desc: '网势传媒·腾讯价值传递者',
            link: location.href,
            imgUrl: 'http://sp.zhihuitui.daxiangqun.net/img/share.jpg',
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
            title: '《我们这一年》',
            link: location.href,
            imgUrl: 'http://sp.zhihuitui.daxiangqun.net/img/share.jpg',
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
            ttitle: '《我们这一年》',
            desc: '网势传媒·腾讯价值传递者',
            link: location.href,
            imgUrl: 'http://sp.zhihuitui.daxiangqun.net/img/share.jpg',
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
            title: '《我们这一年》',
            desc: '网势传媒·腾讯价值传递者',
            link: location.href,
            imgUrl: 'http://sp.zhihuitui.daxiangqun.net/img/share.jpg',
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
            title: '《我们这一年》',
            desc: '网势传媒·腾讯价值传递者',
            link: location.href,
            imgUrl: 'http://sp.zhihuitui.daxiangqun.net/img/share.jpg',
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