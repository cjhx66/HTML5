<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxe1ab423afa869828", "3916bd9a4e0fb410906678549e7ebbfd");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我们“偷窥”了你的国庆</title>
    <meta name="keywords" content="我们“偷窥”了你的国庆" />
    <script>
        window.loadingStartTime = new Date();
    </script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/zepto.min.js"></script>
    <script src="js/resetpage.js"></script>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<audio class="firstAudio" loop src="img/X-Ray Dog - At First Glance.mp3" id="audio"></audio>
<div class="loading">
    <div class="load">
        <p class>loading...</p>
        <p class="progress" id="progress">0%</p>
    </div>
</div>
<div class="main">
   <!--  <div class="first active">
        <img class="home_1" src="img/home_guang.png">
        <img class="home_2" src="img/sun.png">
        <img class="home_3" src="img/home_font.png">
    </div>
    <div class="start">
        <div class="title">
            <p首页</p>
        </div>
        <div class="btn">开始你的国庆之旅</div>
    </div>
    <div class="logo logo_1">
        <div class="title">
            <img class="home_6" src="img/3_huo1.png">
            <img class="home_7" src="img/3_huo2.png">
        </div>
        <div class="choose">
            <a href="javascript:void(0)" class="yes"><img class="home_4" src="img/btn_ok.png"></a>
            <a href="javascript:void(0)" class="no"><img class="home_5" src="img/btn_no.png"></a>
        </div>
    </div> -->
    <div class="logo logo_2 active">
        <div class="title">
            <img class="home_8" src="img/4_ku.png">
            <img class="home_9" src="img/4_xiao.png">
            <img class="home_10" src="img/4_font.png">
        </div>
        <div class="choose">
            <a href="javascript:void(0)" class="yes"><img class="home_4" src="img/btn_ok.png"></a>
            <a href="javascript:void(0)" class="no"><img class="home_5" src="img/btn_no.png"></a>
        </div>
    </div>
    <!-- <div class="logo logo_3">
        <div class="title">
            <img class="home_11" src="img/5_font.png">
            <img class="home_12" src="img/bg5_1.png">
            <img class="home_13" src="img/5_lei2.png">
        </div>
        <div class="choose">
            <a href="javascript:void(0)" class="yes"><img class="home_4" src="img/btn_ok.png"></a>
            <a href="javascript:void(0)" class="no"><img class="home_5" src="img/btn_no.png"></a>
        </div>
    </div> -->
    <!-- <div class="logo logo_4">
        <div class="title">
            <img class="home_14" src="img/6_parent.png">
            <img class="home_15" src="img/6_child.png">
            <img class="home_16" src="img/6_mei.png">
            <img class="home_17" src="img/6_xin.png">
        </div>
        <div class="choose">
            <a href="javascript:void(0)" class="yes"><img class="home_4" src="img/btn_ok.png"></a>
            <a href="javascript:void(0)" class="no"><img class="home_5" src="img/btn_no.png"></a>
        </div>
    </div> -->
    <!-- <div class="logo logo_5">
        <div class="title">
            <img class="home_18" src="img/bg7_mei.png">
            <img class="home_19" src="img/bg7_gy.png">
            <img class="home_20" src="img/7_font.png">
        </div>
        <div class="choose">
            <a href="javascript:void(0)" class="yes"><img class="home_4" src="img/btn_ok.png"></a>
            <a href="javascript:void(0)" class="no"><img class="home_5" src="img/btn_no.png"></a>
        </div>
    </div> -->
    <!-- <div class="logo logo_6">
        <div class="title">
            <img class="home_21" src="img/bg8.png">
            <img class="home_22" src="img/bg8_1.png">
            <img class="home_23" src="img/8_hand.png">
        </div>
        <div class="choose">
            <a href="javascript:void(0)" class="yes"><img class="home_4" src="img/btn_ok.png"></a>
            <a href="javascript:void(0)" class="no"><img class="home_5" src="img/btn_no.png"></a>
        </div>
    </div> -->
</div>
<div class="poster">
    <div class="label_img"></div>
    <div class="label">
        <!-- <p class="label_name">乌龟爬</p> -->
        <p class="label_name"></p>
        <!-- <p class="play"><a href="jihua.html">再玩一次</a></p> -->
        <p class="play"><a href="javascript:void(0);">再玩一次</a></p>
    </div>
</div>
<div class="fina">
    <img class="home_24" src="img/fenxiang_bq.png">
    <img class="home_25" src="img/fenxiang_la.png">
    <img class="home_26" src="img/fenxiang_lao.png">
    <img class="home_27" src="img/fenxiang_tie.png">
    <img class="home_28" src="img/fenxiang_men.png">
    <img class="home_29" src="img/fenxiang_lai.png">
    <img class="home_30" src="img/fenxiang_wan.png">
    <img class="home_31" src="img/fenxiang_jt.png">
</div>
    <div id="music_k" class="music_k"></div>
    <div id="music_g" class="music_g"></div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/loading.js"></script>
<!-- <script src="js/main.js"></script> -->
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
                alert(JSON.stringify(res));
            }
        });
//        分享给朋友
        wx.onMenuShareAppMessage({
            title: '我们“偷窥”了你的国庆',
            desc: '据说，这是90%成年人的国庆日常',
            link: location.href,
            imgUrl: 'http://guoqing.zhihuitui.daxiangqun.net/img/share.jpg',
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
            title: '我们“偷窥”了你的国庆',
            link: location.href,
            imgUrl: 'http://guoqing.zhihuitui.daxiangqun.net/img/share.jpg',
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
            imgUrl: 'http://guoqing.zhihuitui.daxiangqun.net/img/share.jpg',
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
          imgUrl: 'http://guoqing.zhihuitui.daxiangqun.net/img/share.jpg',
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
          imgUrl: 'http://guoqing.zhihuitui.daxiangqun.net/img/share.jpg',
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
<script src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(function(){
    $('body').on('touchmove',function(event){
        event.preventDefault();
    });
    var music_k=document.getElementById('music_k');
    var audio=document.getElementById('audio');
    var music_g=document.getElementById('music_g');
    audio.play();
    music_g.onclick=function(){
        music_g.style.display='none';
        audio.play();
        music_k.style.display="block";
    }
    music_k.onclick=function(){
        music_k.style.display="none";
        audio.pause();
        music_g.style.display="block";
    };
}); 
</script>
</html>