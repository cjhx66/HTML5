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
    <script>
        var xx = getUrlParam('id');
        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            alert(r);
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }
        </script>
</head>
<body>
<audio src="music/music.mp3" id="audio" loop></audio>
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
            <div class="center9 swiper-slide">
                <p class="title">致最爱的妈妈</p>
                <div class="info clearfix">
                    <textarea name="" id="area" placeholder="有些话说不出来...."></textarea>
                    <input type="text" class="name" id="name" placeholder="爱你的..." maxlength="6">
                    <input type="button" class="btn" id="btn" value="保存">
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
<script type="text/javascript" src="js/lib.js"></script>
<script>
    var url=location.href;
    $(function () {
        var types = false;
        $("#btn").click(function () {
            if (types) {
                return false;
            }
            types = true;
            var name = $("#name").val();
            if (!name) {
                alert("请输入姓名");
                return false
            }
            var text = $("#area").val();
            if (!text) {
                alert("请输入想说的话");
                return false
            }
            $.post('/index.php/Ch/Mcenter/XiaoYuanbm/baomingadd', {
                name: name,
                text: text
            }, function (msg) {
                if (msg !== null && msg!=="error") {
                    $(".dialog").fadeIn();
                    setTimeout(function () {
                        $(".dialog").fadeOut();
                        $('#area').attr("readonly",true);
                        $('#name').attr("readonly",true);
                        $(".btn").css("opacity","0.7");
                        url=location.href+"?id="+msg;
                    },2000);
                }
                if (msg == "error") {
                    alert("提交失败，请重新提交");
                }
            });
        })
    })
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
            link: url,
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
            desc: '想说的在这里，没说的你都懂。',
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
          desc: '想说的在这里，没说的你都懂。',
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
          desc: '想说的在这里，没说的你都懂。',
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
</html>