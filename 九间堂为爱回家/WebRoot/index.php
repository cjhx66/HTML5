<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx19c524311ae7ecc9", "986e7c4b9750be972619ea16428cc3e2");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">

    <title>国庆假期，为爱回家</title>
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/swiper.animate.min.js"></script>
    <script src="js/resetpage.js"></script>
    <script src="js/swiper.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="start" id="start">
    <audio src="music/铃声-电话铃声.mp3" autoplay id="audio" loop></audio>
    <img src="images/phone.png" alt="" class="phone">
    <img src="images/hand.png" alt="" class="hand">
    <img src="images/home_font.png" alt="" class="home_font">
</div>
<div class="main">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="top swiper-slide">
                <img src="images/bg1.jpg">
                <img class="p1" src="images/hua1_1.png">
                <img class="p1-2" src="images/hua1_2.png">
                <img class="p1-3" src="images/hua1_3.png">
            </div>
            <div class="center1 swiper-slide">
                <img src="images/bg2.jpg">
                <img class="p2" src="images/hua2_1.png">
                <img class="p2-2" src="images/hua2_2.png">
            </div>
            <div class="center2 swiper-slide">
                <img src="images/bg3.jpg">
                <img class="p3" src="images/hua3_grand.png">
                <img class="p3-2" src="images/hua3.png">
            </div>
            <div class="center3 swiper-slide">
                <img src="images/bg4_2.jpg">
                <img class="p4" src="images/hua4.png">
                <img class="p4-1" src="images/parent.png">
            </div>
            <div class="center5 swiper-slide">
                <img src="images/bg5.jpg">
                <img class="p5" src="images/hua5_1.png">
                <img class="p5-2" src="images/hua5_2.png">
            </div>
            <div class="center6 swiper-slide">
                <img class="p7" src="images/bg6.jpg">
                <img class="p6-2" src="images/bg_1.png">
                <img class="p6-1" src="images/bg_2.png">
                <img class="p6" src="images/hua6.png">
                <img class="p6-3" src="images/rili.png">
                <img class="p6-4" src="images/title.png">
            </div>
            <!-- <div class="center7 swiper-slide">
                <img src="images/bg7.jpg">
                <img class="p7" src="images/title.png">
            </div> -->
        </div>
    </div>
    <img src="images/arrow.png" id="array" class="resize">
    <div class="music music-k"></div>
    <audio src="music/Bandari-Snowdreams.mp3" id="music" loop></audio>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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
<script>
    $(function () {
//        debugger;
        $("body>div").height($(window).height());
        $("#audio")[0].play();
        $(".start").click(function () {
//            debugger;
            $(".start").hide();
            $(".music").show();
            $(".resize").show();
            $("#audio")[0].pause();
            $("#music")[0].play();
            var swiper = new Swiper('.swiper-container', {
                pagination: '.swiper-pagination',
                paginationClickable: true,
                direction: 'vertical',
                onInit:function(swiper){
                    $(".p1-2").css({"animation":"p1-2 3s 2s forwards",});
                    $(".p1-2").css({"-webkit-animation":"p1-2 3s 2s forwards",});
                    $(".p1").css({"animation":"p1 2s 0.5s forwards",});
                    $(".p1").css({"-webkit-animation":"p1 2s 0.5s forwards",});
                    $(".p1-3").css({"animation":"p1-3 3s 4s forwards",});
                    $(".p1-3").css({"-webkit-animation":"p1-3 3s 4s forwards",});
                },
                onSlideChangeStart:function(swiper){
                    if (swiper.activeIndex==0) {
                        $(".p1-2").css({"animation":"p1-2 3s 2s forwards",});
                        $(".p1-2").css({"-webkit-animation":"p1-2 3s 2s forwards",});
                        $(".p1").css({"animation":"p1 2s 0.5s forwards",});
                        $(".p1").css({"-webkit-animation":"p1 2s 0.5s forwards",});
                        $(".p1-3").css({"animation":"p1-3 3s 4s forwards",});
                        $(".p1-3").css({"-webkit-animation":"p1-3 3s 4s forwards",});
                    }else{
                        $(".p1-2").css({"animation":"",});
                        $(".p1-2").css({"-webkit-animation":"",});
                        $(".p1").css({"animation":"",});
                        $(".p1").css({"-webkit-animation":"",});
                        $(".p1-3").css({"animation":"",});
                        $(".p1-3").css({"-webkit-animation":"",});
                    }
                    if (swiper.activeIndex==1) {
                        $(".p2-2").css({"animation":"p2-2 3s 2s forwards",});
                        $(".p2-2").css({"-webkit-animation":"p2-2 3s 2s forwards",});
                        $(".p2").css({"animation":"p2 2s 0.5s forwards",});
                        $(".p2").css({"-webkit-animation":"p2 2s 0.5s forwards",});
                    }else{
                        $(".p2-2").css({"animation":"",});
                        $(".p2-2").css({"-webkit-animation":"",});
                        $(".p2").css({"animation":"",});
                        $(".p2").css({"-webkit-animation":"",});
                    }
                    if (swiper.activeIndex==2) {
                        $(".p3-2").css({"animation":"p3-2 3s 1s forwards",});
                        $(".p3-2").css({"-webkit-animation":"p3-2 3s 1s forwards",});
                        $(".p3").css({"animation":"p3 2s 0.5s forwards",});
                        $(".p3").css({"-webkit-animation":"p3 2s 0.5s forwards",});
                    }else{
                        $(".p3-2").css({"animation":"",});
                        $(".p3-2").css({"-webkit-animation":"",});
                        $(".p3").css({"animation":"",});
                        $(".p3").css({"-webkit-animation":"",});
                    }
                    if (swiper.activeIndex==3) {
                        $(".p4").css({"animation":"p4 2s 2s forwards",});
                        $(".p4").css({"-webkit-animation":"p4 2s 2s forwards",});
                        $(".p4-1").css({"animation":"p4-1 2s 0.5s forwards",});
                        $(".p4-1").css({"-webkit-animation":"p4-1 2s 0.5s forwards",});
                    }else{
                        $(".p4").css({"animation":"",});
                        $(".p4").css({"-webkit-animation":"",});
                        $(".p4-1").css({"animation":"",});
                        $(".p4-1").css({"-webkit-animation":"",});
                    }
                    if (swiper.activeIndex==4) {
                        $(".p5-2").css({"animation":"p5-2 3s 1.5s forwards",});
                        $(".p5-2").css({"-webkit-animation":"p5-2 3s 1.5s forwards",});
                        $(".p5").css({"animation":"p5 2s 0.5s forwards",});
                        $(".p5").css({"-webkit-animation":"p5 2s 0.5s forwards",});
                    }else{
                        $(".p5-2").css({"animation":"",});
                        $(".p5-2").css({"-webkit-animation":"",});
                        $(".p5").css({"animation":"",});
                        $(".p5").css({"-webkit-animation":"",});
                    }
                    if (swiper.activeIndex==5) {
                        $(".p6").css({"animation":"p6 2s 0.5s forwards",});
                        $(".p6").css({"-webkit-animation":"p6 2s 0.5s forwards",});
                        $(".p7").css({"animation":"p7 3s 4s forwards",});
                        $(".p7").css({"-webkit-animation":"p7 3s 4s forwards",});
                        $(".p6-4").css({"animation":"p6-4 2s 5.5s forwards",});
                        $(".p6-4").css({"-webkit-animation":"p6-4 2s 5.5s forwards",});
                        $(".p6-2").css({"animation":"p6-2 3s 4s forwards",});
                        $(".p6-2").css({"-webkit-animation":"p6-2 3s 4s forwards",});
                        $(".p6-1").css({"animation":"p6-1 3s 4.5s forwards",});
                        $(".p6-1").css({"-webkit-animation":"p6-1 3s 4.5s forwards",});
                        $(".p6-3").css({"animation":"p6-3 2s 4s forwards",})
                        $(".p6-3").css({"-webkit-animation":"p6-3 2s 4s forwards",});
                        $(".resize").hide();
                    }else{
                        $(".p6").css({"animation":"",});
                        $(".p6").css({"-webkit-animation":"",});
                        $(".p7").css({"animation":"",});
                        $(".p7").css({"-webkit-animation":"",});
                        $(".p6-4").css({"animation":"",});
                        $(".p6-4").css({"-webkit-animation":"",});
                        $(".p6-2").css({"animation":"",});
                        $(".p6-2").css({"-webkit-animation":"",});
                        $(".p6-1").css({"animation":"",});
                        $(".p6-1").css({"-webkit-animation":"",});
                        $(".p6-3").css({"animation":"",});
                        $(".p6-3").css({"-webkit-animation":"",});
                        $(".resize").show();
                    }
                    // if (swiper.activeIndex==6) {
                    //     $(".p7").css({"animation":"p7 2s 0.5s forwards",});
                    //     $(".p7").css({"-webkit-animation":"p7 2s 0.5s forwards",});
                    //     $(".resize").hide();
                    // }else{
                    //     $(".p7").css({"animation":"",});
                    //     $(".p7").css({"-webkit-animation":"",});
                    //     $(".resize").show();
                    // }
                }
            });
        });
        $(".music").on("touchstart", function () {
            if ($(this).hasClass('music-k')) {
                $("#music")[0].pause();
                $(this).removeClass("music-k");
            } else {
                $("#music")[0].play();
                $(this).addClass("music-k");
            }
        })
    })
</script>
</html>