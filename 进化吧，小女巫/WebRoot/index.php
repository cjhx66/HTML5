<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxe1ab423afa869828", "3916bd9a4e0fb410906678549e7ebbfd");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="screen-orientation" content="portrait">
    <title>万圣节来袭，进化吧，小女巫！</title>
    <script src="js/zepto.min.js"></script>
    <script src="js/resetpage.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #container {
            width: 100vw;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .start {
            background: url("images/start.jpg") no-repeat;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            position: relative;
            /*display: none;*/
        }

        .start .btn {
            position: absolute;
            top: 81.75%;
            left: 50%;
            width: 223px;
            margin-left: -111.5px;
        }

        .btn_start {
            margin-bottom: 36px;
        }

        .guize {
            width: 100%;
            height: 100%;
            display: none;
            z-index: 10;
            position: absolute;
            left: 0;
            top: 0
        }

        #gamepanel {
            width: 100%;
            height: 100%;
            position: relative;
            /*display: none;*/
        }

        canvas {
            width: 100%;
            height: 100%;
            background: #000;
        }

        .score-wrap {
            width: 215px;
            height: 59px;
            position: absolute;
            left: 480px;
            top: 3%;
            background: url("images/score.png") no-repeat;
        }

        .score-wrap span {
            color: white;
            margin-left: 130px;
            font-size: 34px;
            line-height: 59px;
        }

        .mupai{
            position: absolute;
            left:21px;
            top:0;
        }

        #resultPanel {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
        }

        #resultPanel, #resultPanel .weixin-share {
            position: absolute;
            left: 0;
            top: 0
        }

        #resultPanel .weixin-share {
            width: 100%;
            height: 100%;
            background: url("images/fenxiang.png") no-repeat;
            background-size: 100% 100%;
            display: none;
            z-index: 10;
        }

        #fenghao, .success {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        #fenghao {
            width: 632px;
            height: 795px;
        }

        .success {
            width: 651px;
            height: 770px;
            background: url("images/success.png") no-repeat;
            display: none;
        }

        .out_bf {
            background: url("images/out_bf.png") no-repeat;
        }

        .out_gg {
            background: url("images/out_gg.png") no-repeat;
        }

        .out_ss {
            background: url("images/out_sishen.png") no-repeat;
        }

        .out_kl {
            background: url("images/out_kl.png") no-repeat;
        }

        .textc {
            width: 287px;
            height: 175px;
            margin: 598px auto 0;
        }

        .textc-success {
            margin: 693px auto 0;
        }

        .textc .replay {
            margin-right: 73px;
        }

        .gameTisi {
            position: absolute;
            left: 50%;
            top: 100px;
            width: 381px;
            height: 171px;
            margin-left: -190.5px;
            display: none;
        }

        .gameTisi_20 {
            background: url("images/zhong.png") no-repeat;
        }

        .gameTisi_50 {
            background: url("images/gao.png") no-repeat;
        }

        .gz {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 2;
            width: 100%;
            height: 100%;
        }

        .gz_1 {
            background: url("images/guize.png") no-repeat;
            background-size: 100% 100%;
        }

        .gz img {
            position: absolute;
            left: 50%;
            margin-left: -185px;
            top: 89%;
        }

        .shuzi {
            position: absolute;
            left: 50%;
            margin-left: -368px;
            top: 840px;
        }
    </style>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?8519a3fcec80e6ad278018760027c48f";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</head>
<body>
<div id="container">
    <div class="start">
        <div class="btn">
            <img src="images/btn_start.png" alt="" class="btn_start" id="guidePanel">
            <img src="images/btn_gz.png" alt="" class="btn_guize">
        </div>
        <img src="images/guize.png" alt="" class="guize">
    </div>
    <div id="gamepanel">
        <div class="gz gz_1">
            <img src="images/dianji.png" alt="" class="dianji">
        </div>
        <div class="score-wrap">
            <span id="score">0</span>
        </div>
        <img src="images/mupai.png" alt="" class="mupai">
        <canvas id="stage" width="750" height="1208"></canvas>
    </div>
    <div class="gameTisi gameTisi_20"></div>
    <audio src="images/bg.mp3" preload="auto" loop="loop" class="audio"></audio>
    <div id="resultPanel">
        <img src="images/fenxiang.png" class="weixin-share"/>
        <div id="fenghao" class="out">
            <div class="textc">
                <img src="images/out_reset.png" alt="" class="replay">
                <img src="images/out_share.png" alt="" class="btn1">
            </div>
        </div>
        <div id="" class="success">
            <div class="textc textc-success">
                <img src="images/success_reset.png" alt="" class="replay">
                <img src="images/success_share.png" alt="" class="btn1">
            </div>
        </div>
    </div>
</div>
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
            title: '万圣节来袭，进化吧，小女巫！',
            desc: '躲妖魔鬼怪，吃美味糖果，向着高级女巫前进吧！',
            link: location.href,
            imgUrl: 'http://wanshen.huiying.daxiangqun.net/images/share.jpg',
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
            title: '万圣节来袭，进化吧，小女巫！',
            link: location.href,
            imgUrl: 'http://wanshen.huiying.daxiangqun.net/images/share.jpg',
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
            ttitle: '万圣节来袭，进化吧，小女巫！',
            desc: '躲妖魔鬼怪，吃美味糖果，向着高级女巫前进吧！',
            link: location.href,
            imgUrl: 'http://wanshen.huiying.daxiangqun.net/images/share.jpg',
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
          title: '万圣节来袭，进化吧，小女巫！',
          desc: '躲妖魔鬼怪，吃美味糖果，向着高级女巫前进吧！',
          link: location.href,
          imgUrl: 'http://wanshen.huiying.daxiangqun.net/images/share.jpg',
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
          title: '万圣节来袭，进化吧，小女巫！',
          desc: '躲妖魔鬼怪，吃美味糖果，向着高级女巫前进吧！',
          link: location.href,
          imgUrl: 'http://wanshen.huiying.daxiangqun.net/images/share.jpg',
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
        $(".btn_guize").click(function () {
            $(".guize").show();
            $(".btn").hide();
        });
        $(".guize").click(function () {
            $(".guize").hide();
            $(".btn").show();
        });
        $(".btn1").click(function () {
            $(".weixin-share").show();
        });
        $(".weixin-share").click(function () {
            $(".weixin-share").hide();
        });
    });
</script>
</body>
</html>