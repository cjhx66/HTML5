<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxbc566a9c28b27b13", "1006df17b02064c21fc59dcbc0991597");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title>国庆假期，为爱回家</title>
    <style type="text/css">
       * {
            padding: 0;
            margin: 0;
        }
        .main{
            width:100vw;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="main">
     <img class="img" src="images/main.jpg" alt="" style="display: block">
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script src="js/resetpage.js"></script>
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
            title: '我们“偷窥”了你的国庆',
            desc: '据说，这是90%成年人的国庆日常',
            link: location.href,
            imgUrl: 'http://jiujianh5.zhihuitui.daxiangqun.net/images/share.jpg',
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
            title: '我们“偷窥”了你的国庆',
            link: location.href,
            imgUrl: 'http://jiujianh5.zhihuitui.daxiangqun.net/images/share.jpg',
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
            ttitle: '我们“偷窥”了你的国庆',
            desc: '据说，这是90%成年人的国庆日常',
            link: location.href,
            imgUrl: 'http://jiujianh5.zhihuitui.daxiangqun.net/images/share.jpg',
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
          title: '我们“偷窥”了你的国庆',
          desc: '据说，这是90%成年人的国庆日常',
          link: location.href,
          imgUrl: 'http://jiujianh5.zhihuitui.daxiangqun.net/images/share.jpg',
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
          title: '我们“偷窥”了你的国庆',
          desc: '据说，这是90%成年人的国庆日常',
          link: location.href,
          imgUrl: 'http://guoqing.zhihuitui.daxiangqun.net/images/share.jpg',
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