<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx5893f2ddccf64d9b", "bb24c5cd99d90f1f20e1bca7fe45ac89");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>以爱之名晒幸福</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no,viewport-fit=cover"/>
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<header>
    <img src="images/xin.png" alt="" class="xin">
    <img src="images/ren.png" alt="" class="ren">
    <img src="images/loading.gif" alt="" class="loading">
    <p class="progress">0%</p>
    <img src="images/loading.png" alt="" class="load">
    <img src="images/logo.png" alt="" class="logo">
</header>
<div class="main">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="top swiper-slide">
                <img src="images/bg.png" class="bg">
                <img src="images/p2-title.png" class="p2-title">
                <img src="images/p2-zi.gif" class="p2-zi">
                <img src="images/logo.png" class="p2-logo logo">
                <img src="images/qiu.png" class="qiu">
            </div>
            <div class="center2 swiper-slide">
                <img src="images/bg.png" class="bg">
                <img src="images/p3-title.png" class="p3-title">
                <img src="images/p3-zi.gif" class="p3-zi">
                <img src="images/logo.png" class="p2-logo">
                <img src="images/qiu.png" class="qiu">
            </div>
            <div class="center3 swiper-slide">
                <img src="images/bg.png" class="bg">
                <img src="images/p3-title.png" class="p3-title">
                <div class="click">
                    <img src="images/fm.png" alt="" class="fm click-btn">
                    <img src="images/fm-t.png" alt="" class="fm-t">
                    <img src="images/ar.png" alt="" class="ar click-btn">
                    <img src="images/hz-t.png" alt="" class="hz-t">
                    <img src="images/zdy.png" alt="" class="zdy click-btn">
                    <img src="images/ar-t.png" alt="" class="ar-t">
                    <img src="images/hz.png" alt="" class="hz click-btn">
                    <img src="images/py-t.png" alt="" class="py-t">
                    <img src="images/py.png" alt="" class="py click-btn">
                    <img src="images/ts.png" class="ts">
                </div>
                <img src="images/logo.png" class="p2-logo logo">
                <img src="images/qiu.png" class="qiu">
            </div>
        </div>
        <img src="images/arrow.png" id="array" class="resize">
    </div>
    <div class="liuyan">
        <img src="images/bg.png" class="bg">
        <img src="images/p3-title.png" class="p3-title">
        <ul class="fumu">
            <li>时光慢些吧，不要再让你变老了</li>
            <li>你陪我长大，我陪你变老</li>
            <li>不管是衬衫还是针织衫，你就是我巍峨的大山</li>
            <li><input type="text" maxlength="20" placeholder="爸爸妈妈，我想对你说：" class="zdy-ipt ipt"></li>
        </ul>
        <ul class="airen">
            <li>不要抱怨，抱我</li>
            <li>我一点都不想你，一点半在想</li>
            <li>小猪佩奇，我配你</li>
            <li><input type="text" maxlength="20" placeholder="亲爱的，我想对你说：" class="zdy-ipt ipt"></li>
        </ul>
        <ul class="haizi">
            <li>这是手心，这是比心，你是我的小甜心</li>
            <li>世界上最甜的不是糖，是我对你的爱</li>
            <li>小猪佩奇，我配你</li>
            <li><input type="text" maxlength="20" placeholder="宝贝，我想对你说：" class="zdy-ipt ipt"></li>
        </ul>
        <ul class="pengyou">
            <li>原来你，就是另一个我自己</li>
            <li>风里雨里，酒桌等你</li>
            <li>穿过校服和迷彩服，你就是我的小幸福</li>
            <li><input type="text" maxlength="20" placeholder="死党，我想对你说：" class="zdy-ipt ipt"></li>
        </ul>
        <span class="btn edit">编辑海报</span>
        <img src="images/logo.png" class="p2-logo">
        <img src="images/qiu.png" class="qiu">
    </div>
    <div class="create-hb">
        <img src="images/bg.png" class="bg">
        <img src="images/zdy-h.jpg" alt="" class="hb-h" id="pic">
        <canvas id="canvas" width="601" height="752"></canvas>
        <div class="tubiao">
            <img src="images/fd.png" class="" id="bigBtn">
            <img src="images/sx.png" class="" id="smallBtn">
            <img src="images/xz.png" class="rightRotate" id="rightRotate">
        </div>
        <div class="upload">
            <img src="images/photo.png" alt="" class="photo">
            <input class="input-upload" id="upload" type="file">
            <span class="btn save-1" id="save">生成海报</span>
        </div>
        <div class="hb-liuyan">
            <input type="text" class="ipt name" placeholder="想对谁说:" maxlength="4">
            <div class="talk">
                <p class="ly1"></p>
                <p class="ly2"></p>
            </div>
            <div class="zdy-talk">
                <textarea name="" id="" maxlength="20" class="talk-zi" placeholder="想说的话:"></textarea>
            </div>
        </div>
        <img src="images/logo.png" class="p2-logo">
        <img src="images/qiu.png" class="qiu">
    </div>
    <div class="haibao">
        <img src="images/bg.png" alt="" class="canvasImg" style="display: block;height:100%;width:750px;">
        <canvas id="myCanvas" style="display: none" width="750" height="1206">您的浏览器不支持canvas</canvas>
    </div>
    <i class="music music-k"></i>
    <audio src="music/audio.mp3" id="music" loop></audio>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="js/all.js"></script>
<script src="js/index-ok.js"></script>
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
            'translateVoice',
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
            title: '以爱之名 大胆告白',
            desc: '这一次，给自己一次机会， 大声对TA说，我爱你。',
            link: 'http://kqcai.huiying.daxiangqun.net',
            imgUrl: 'http://kqcai.huiying.daxiangqun.net/images/share.jpg'
        });
        wx.onMenuShareTimeline({
            title: '以爱之名 大胆告白',
            link: 'http://kqcai.huiying.daxiangqun.net',
            imgUrl: 'http://kqcai.huiying.daxiangqun.net/images/share.jpg'
        });
        wx.onMenuShareQQ({
            ttitle: '以爱之名 大胆告白',
            desc: '这一次，给自己一次机会， 大声对TA说，我爱你。',
            link: 'http://kqcai.huiying.daxiangqun.net',
            imgUrl: 'http://kqcai.huiying.daxiangqun.net/images/share.jpg'
        });
        wx.onMenuShareWeibo({
            title: '以爱之名 大胆告白',
            desc: '这一次，给自己一次机会， 大声对TA说，我爱你。',
            link: 'http://kqcai.huiying.daxiangqun.net',
            imgUrl: 'http://kqcai.huiying.daxiangqun.net/images/share.jpg'
        });
        wx.onMenuShareQZone({
            title: '以爱之名 大胆告白',
            desc: '这一次，给自己一次机会， 大声对TA说，我爱你。',
            link: 'http://kqcai.huiying.daxiangqun.net',
            imgUrl: 'http://kqcai.huiying.daxiangqun.net/images/share.jpg'
        });
    })
</script>
</html>