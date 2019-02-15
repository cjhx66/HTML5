<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxe1ab423afa869828", "3916bd9a4e0fb410906678549e7ebbfd");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
    <script>
        var elem = document.createElement('meta');
        var h = window.screen.width / 750;
        elem.name = 'viewport';
        elem.content = 'width=device-width,user-scalable=no,initial-scale=' + h;
        document.getElementsByTagName('head')[0].appendChild(elem);
    </script>
    <meta charset="utf-8"/>
    <title>请回答1978 </title>
    <meta name="msapplication-tap-highlight" content="no"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <script>
        function rem(psd){var wWidth=window.innerWidth;var font=wWidth>800?100:100*wWidth/318;var fontSize=wWidth>800?100:100*wWidth/psd;document.documentElement.style.fontSize=fontSize+"px"}rem(750);
    </script>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=19"/>
</head>
<body landscape="no">
<div class="loading-wrap">
    <div class="loading-img">
        <div class="loading">
            <div class="loading-hand"></div>
            <div class="loading-num">
                <i class="jindu"></i>
            </div>
        </div>
        <div class="loading-zi"></div>
    </div>
    <img src="images/loading/ts.png" alt="" class="music-ts">
</div>
<div class="main">
    <div class="box">
        <div class="music"></div>
    </div>
    <div class="anniu">
        <img src="images/p5/repeat.png" alt="" class="repeat">
        <img src="images/p5/liuyan.png" alt="" class="liuyan">
        <img src="images/p5/schb.png" alt="" class="liuyan1">
        <img src="images/p5/fenxiang.png" alt="" class="fenxiang">
    </div>
    <div class="write">
        <textarea placeholder="" maxlength="32" class="textarea"></textarea>
    </div>
</div>
<div class="dialog">
    <img src="images/fxtb.png" alt="" class="tol">
    <div class="pop">
         <p class="pop-ts">您已成功留言！</p>
         <p class="ok">OK</p>
    </div>
</div>
<div class="footer">
    <div class="btn_footer">
        <img src="images/p5/repeat.png" alt="" class="repeat">
        <img src="images/p5/fenxiang.png" alt="" class="fenxiang">
    </div>
    <img src="images/tisi.png" alt="" class="tisi">
    <img src="images/haibao.jpg" alt="" class="save">
    <canvas id="myCanvas" style="display: none" width="750" height="1334">您的浏览器不支持canvas</canvas>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/lodash.min.js"></script>
<script src="js/zepto.min.js"></script>
<script src="js/pixi.min.js"></script>
<script src="js/pixi-sound.js"></script>
<script src="js/pixi-display.js"></script>
<script src="js/Animate.js"></script>
<script src="js/Scroller.js"></script>
<script src="js/script.js"></script>
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
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
        ]
    });
    wx.ready(function () {
        loader.resources.bgm.sound.play();
        wx.checkJsApi({
            jsApiList: [
                'getNetworkType',
                'previewImage'
            ]
        });
        wx.onMenuShareAppMessage({
            title: '时光之旅|请回答1978',
            desc: '穿越1978，谱一段改革开放40年的锦绣中华',
            link: location.href,
            imgUrl: 'http://kqcwls.huiying.daxiangqun.net/webpage/chphone/cms/index/images/share.jpg'
        });
        wx.onMenuShareTimeline({
            title: '时光之旅|请回答1978',
            link: location.href,
            imgUrl: 'http://kqcwls.huiying.daxiangqun.net/webpage/chphone/cms/index/images/share.jpg'
        });
        wx.onMenuShareQQ({
            ttitle: '时光之旅|请回答1978',
            desc: '穿越1978，谱一段改革开放40年的锦绣中华',
            link: location.href,
            imgUrl: 'http://kqcwls.huiying.daxiangqun.net/webpage/chphone/cms/index/images/share.jpg'
        });
        wx.onMenuShareWeibo({
          title: '时光之旅|请回答1978',
          desc: '穿越1978，谱一段改革开放40年的锦绣中华',
          link: location.href,
          imgUrl: 'http://kqcwls.huiying.daxiangqun.net/webpage/chphone/cms/index/images/share.jpg'});
        wx.onMenuShareQZone({
          title: '时光之旅|请回答1978',
          desc: '穿越1978，谱一段改革开放40年的锦绣中华',
          link: location.href,
          imgUrl: 'http://kqcwls.huiying.daxiangqun.net/webpage/chphone/cms/index/images/share.jpg'});
    })
</script>
<script>
 $(function () {
        $(".repeat").click(function () {
            window.location.href = location.href
        });
        $(".liuyan").click(function () {
            $(".write").show();
            $(".liuyan").hide();
            $(".liuyan1").show()
        });
        $(".liuyan1").click(function () {
            var b = $(".textarea").val();
            if (b != "") {
                $.post("/index.php/Ch/Mcenter/GuangGubm/baomingadd", {name: b}, function (c) {
                    if (c == "ok") {
                        $(".pop-ts").html("您已成功留言！");
                        $(".dialog").show();
                        $(".pop").show();
                        $(".ok").click(function () {
                            $(".dialog").hide();
                            canvasImg(b);
                        })
                    }
                    if (c == "error") {
                        $(".pop-ts").html("留言失败，请重新提交");
                        $(".dialog").show();
                        $(".pop").show();
                    }
                })
            }
        });
        $(".fenxiang").click(function () {
            $(".dialog").show();
            $(".tol").show();
        });
        $(".dialog").click(function () {
            $(".dialog").hide();
            $(".tol").hide();
        });
    });
    function canvasImg(d) {
        var b = document.getElementById("myCanvas");
        var a = b.getContext("2d");
        b.width = 750;
        b.height = $(window).height();
        var e = new Image;
        e.src = "images/haibao.jpg";
        var c = d;
        e.onload = function () {
            a.fillStyle = "#000";
            a.fillRect(0, 0, b.width, b.height);
            var j = 380;
            var i = b.height * 0.47 + j / 2;
            var g = b.height * 0.595;
            var f = b.height * 0.575;
            a.drawImage(e, 0, 0, 750, b.height);
            a.beginPath();
            a.font = "normal 40px shou";
            var h = a.measureText(c).width;
            a.textAlign = "center";
            if (h <= 430) {
                a.fillText(c, b.width / 2, i)
            } else {
                if (h <= 870) {
                    canvasTextAutoLine(c, b, b.width / 2, g, 60)
                } else {
                    canvasTextAutoLine(c, b, b.width / 2, f, 60)
                }
            }
            a.beginPath();
            $(".save").attr("src", b.toDataURL("image/jpeg"));
            $(".main").hide();
            $(".footer").show()
        }
    }
    function canvasTextAutoLine(e, a, h, f, g) {
        var j = a.getContext("2d");
        var d = 0;
        var b = 0;
        for (var c = 0; c < e.length; c++) {
            d += j.measureText(e[c]).width;
            if (d > 430) {
                j.fillText(e.substring(b, c), h, f);
                f += g;
                d = 0;
                b = c
            }
            if (c == e.length - 1) {
                j.fillText(e.substring(b, c + 1), h, f)
            }
        }
    }
    var a = $(window).height();
    $(window).resize(function () {
        if (iosAndandroid()) {
            var b = $(this).height();
            if (a - b > 50) {
                $(".main").height(a);
            }
        }
    });
    if (!iosAndandroid()) {
        $(".textarea").blur(function () {
            var distance = $("body").scrollTop();
            if (distance != 0) {
                document.body.scrollTop = 0;
            }
        });
    }
    function iosAndandroid() {
        var u = navigator.userAgent, app = navigator.appVersion;
        var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //g
        var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
        if (isAndroid) {
            return true;
        }
        if (isIOS) {
            return false;
        }
    }
</script>
</body>
</html>
