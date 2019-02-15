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
        function rem(psd) {
            var wWidth = window.innerWidth;
            var font = wWidth > 800 ? 100 : 100 * wWidth / 318;
            var fontSize = wWidth > 800 ? 100 : 100 * wWidth / psd;
            document.documentElement.style.fontSize = fontSize + 'px';
        }
        rem(750);
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
    <div class="btn">
        <img src="images/p5/repeat.png" alt="" class="repeat">
        <img src="images/p5/liuyan.png" alt="" class="liuyan">
        <img src="images/p5/schb.png" alt="" class="liuyan1">
        <img src="images/p5/fenxiang.png" alt="" class="fenxiang">
    </div>
    <div class="write">
        <textarea placeholder="" maxlength="50" class="textarea"></textarea>
    </div>
</div>
<div class="dialog">
    <img src="images/fxtb.png" alt="" class="tol">
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
            imgUrl: 'http://kqcwls.huiying.daxiangqun.net/GeiGe/WebRoot/webpage/chphone/cms/index/images/share.jpg'
        });
        wx.onMenuShareTimeline({
            title: '时光之旅|请回答1978',
            link: location.href,
            imgUrl: 'http://kqcwls.huiying.daxiangqun.net/GeiGe/WebRoot/webpage/chphone/cms/index/images/share.jpg'
        });
        wx.onMenuShareQQ({
            ttitle: '时光之旅|请回答1978',
            desc: '穿越1978，谱一段改革开放40年的锦绣中华',
            link: location.href,
            imgUrl: 'http://kqcwls.huiying.daxiangqun.net/GeiGe/WebRoot/webpage/chphone/cms/index/images/share.jpg'
        });
        wx.onMenuShareWeibo({
          title: '时光之旅|请回答1978',
          desc: '穿越1978，谱一段改革开放40年的锦绣中华',
          link: location.href,
          imgUrl: 'http://kqcwls.huiying.daxiangqun.net/GeiGe/WebRoot/webpage/chphone/cms/index/images/share.jpg'});
        wx.onMenuShareQZone({
          title: '时光之旅|请回答1978',
          desc: '穿越1978，谱一段改革开放40年的锦绣中华',
          link: location.href,
          imgUrl: 'http://kqcwls.huiying.daxiangqun.net/GeiGe/WebRoot/webpage/chphone/cms/index/images/share.jpg'});
    })
</script>
<script>
    $(function () {
        $(".repeat").click(function () {
            window.location.href = location.href;
        });
        $(".liuyan").click(function () {
            $(".write").show();
            $(".liuyan").hide();
            $(".liuyan1").show();
        });
        var winHeight = $(window).height();   //获取当前页面高度
        $(window).resize(function () {
            var thisHeight = $(this).height();
            if (winHeight - thisHeight > 50) {
                $(".main").height(winHeight);
            }
        });
        $(".liuyan1").click(function () {
            var leave = $(".textarea").val();
            if (leave != "") {
                $.post('/index.php/Ch/Mcenter/GuangGubm/baomingadd', {name: leave},
                    function (msg) {
                        if (msg == "ok") {
                            alert("您已成功留言！");
                            canvasImg(leave);
                        }
                        if (msg == "error") {
                            alert("留言失败，请重新提交");
                        }
                    })
            }
        });
        $(".fenxiang").click(function () {
            $(".dialog").show();
        });
        $(".dialog").click(function () {
            $(".dialog").hide();
        })
    });
   function canvasImg(text) {
           var canvas = document.getElementById("myCanvas");
           var ctx = canvas.getContext("2d");
           canvas.width = 750;
           canvas.height = $(window).height();
           var imgUrl = new Image;
           imgUrl.src = "images/haibao.jpg";
           var write_text = text;
           imgUrl.onload = function () {
               ctx.fillStyle = "#000";
               ctx.fillRect(0, 0, canvas.width, canvas.height);
               var ziHeight = 380;
               var wyDyY1 = canvas.height * 0.47 + ziHeight / 2;
               var wyDyY2 = canvas.height * 0.595;
               var wyDyY3 = canvas.height * 0.575;
               ctx.drawImage(imgUrl, 0, 0, 750, canvas.height);
               ctx.beginPath();
               ctx.font = "normal 38px shou";
               var width = ctx.measureText(write_text).width;
               ctx.textAlign = "center";
               if (width <= 440) {
                   ctx.fillText(write_text, canvas.width / 2, wyDyY1);
               } else if (width <= 880) {
                   canvasTextAutoLine(write_text, canvas, canvas.width / 2, wyDyY2, 55)
               } else {
                   canvasTextAutoLine(write_text, canvas, canvas.width / 2, wyDyY3, 55)
               }
               ctx.beginPath();
               $(".save").attr("src", canvas.toDataURL('image/jpeg'));
               $(".main").hide();
               $(".footer").show();
           }
       }
       function canvasTextAutoLine(str, canvas, initX, initY, lineHeight) {
           var ctx = canvas.getContext("2d");
           var lineWidth = 0;
           var lastSubStrIndex = 0;
           for (var i = 0; i < str.length; i++) {
               lineWidth += ctx.measureText(str[i]).width;
               if (lineWidth > 440) {
                   ctx.fillText(str.substring(lastSubStrIndex, i), initX, initY);
                   initY += lineHeight;
                   lineWidth = 0;
                   lastSubStrIndex = i;
               }
               if (i == str.length - 1) {
                   ctx.fillText(str.substring(lastSubStrIndex, i + 1), initX, initY);
               }
           }
       }
</script>
</body>
</html>
