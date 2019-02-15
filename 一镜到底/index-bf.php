<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, maximum-scale=1.0, user-scalable=no">
    <title>点击查看你的2018年中关键词</title>
    <script src='js/pixi.js'></script>
    <script src='js/PixiPlugin.js'></script>
    <script src='js/zepto.min.js'></script>
    <script src='js/TweenMax.min.js'></script>
    <script src='js/timelineMax.js'></script>
    <script src='js/star.js'></script>
    <script src="js/loadash.js"></script>
    <script src="js/jweixin-1.0.0.js"></script>
</head>
<?php
			require_once "../jssdk.php";
			$jssdk = new JSSDK("wxe7715fb43a035e5a", "398a036f03be64a3f7e38808368c85e5");
			$signPackage = $jssdk->GetSignPackage();
?>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    html,
    body {
        -webkit-user-select: none;
        position: relative;
        background: #1d1d1d;
        overflow: hidden;
    }

    .circle {
        position: absolute;
        top: 200px;
        left: 0;
        border-radius: 80%;
        height: 40px;
        width: 40px;
        background: #86CC01;
    }
    .btn{
        position: absolute;
        top: 0;
        left: 0;
        width: 100px;
         height: 100px;
        background: lightgreen;;
    }
    #loadBox{
        background-image: url(images/bg.jpg);
        background-repeat:no-repeat;
        width: 640px;
        height: 1136px;
        position: absolute;

    }
    .loadImg{
        position: absolute;
        width: 245px;
        height: 292px;
        -webkit-mask-image: url("images/loadIcon.png");
        background-repeat: no-repeat;
        background-size: 100%;
        background: #3e5781;
        top: 370px;
        left: 210px;
        z-index: 20;
    }
    .loadMsk{
        position: absolute;
        width: 245px;
        height: 292px;
        background-image: url("images/loadMask.png");
        background-repeat: no-repeat;
        background-size: 100%;
        top: 370px;
        left: 210px;
        z-index: 2;
        display: none;
    }
    #enterBox{
        width: 640px;
        height: 1136px;
        /*background-image: url(images/page_Enter.jpg);*/
        background: none;
        background-repeat:no-repeat;
        background-size: 100%;
        position: absolute;
        top:0;
        left: 0;
        display: none;
        opacity:0;
    }

    .logo{
        position: absolute;
        top: 98px;
        left: 185px;
        width: 270px;
        height: 62px;
        background: url("images/logo.png");
        background-repeat: no-repeat;
    }
    .enterText{
        position: absolute;
        top: 285px;
        left: 65px;
        width: 515px;
        height: 207px;
        background: url("images/entenTopText.png");
        background-repeat: no-repeat;
    }
    .enterBot{
        position: absolute;
        top: 918px;
        left: 0px;
        width: 640px;
        height:220px;
        background: url("images/entenBotPic.png");
        background-repeat: no-repeat;
    }

    .userName{
        position: absolute;
        border: none;
        top: 580px;
        left: 105px;
        width: 432px;
        background: url("images/inputBg.png");
        background-repeat: no-repeat;
        background-position-x:-20px;
        text-align: center;
        font-size: 26px;
        outline: none;
        color: #fff;
        line-height: 56px;
    }
    .starBtnBg{
        position: absolute;
        background-image: url("images/starBtnBG.png");
        background-repeat:no-repeat;
        background-size: 100%;
        width: 238px;
        height: 238px;
        top: 785px;
        left: 200px;
    }
    .starBtnText{
        position: absolute;
        background-image: url("images/startBtnText.png");
        background-repeat:no-repeat;
        background-size: 100%;
        width: 269px;
        height: 117px;
        top: 880px;
        left: 186px;
    }
    .music{
        width:38px;
        height: 38px;
        position: absolute;
        top: 40px;
        right:40px ;
        background-size: 100%;
        background-repeat: no-repeat;
        z-index: 102;
    }
    .on{
        background-image: url(images/musicOn.png);
    }
    .off{
        background-image: url(images/musicOff.png);
    }

    .clicled{
        animation: rotating 1.8s linear infinite;

    }
    #imgBox,#endImgBox{
        position: absolute;
        width: 640px;
        height: 1136px;
        top: 0;
        left:0;
        display: none;
    }
    ._userName{
        position: absolute;
        width: 300px;
        line-height: 32px;
        font-size: 32px;
        font-weight: bold;
        color:#2ebadf;
        left: 54px;
        top: 40px;
        z-index: 10;
    }

    #save_img{
        position: absolute;
        top: 0;
        left:0;
        opacity: 0;
        z-index: 99;
    }
    #demoImgBg{
        position: absolute;
        top: 0;
        left: 0;
    }
    #imgBox .shareBtn, #imgBox .continueBtn{
        width: 230px;
        height: 70px;
        position: absolute;
        top: 940px;
        left: 56px;
        z-index: 100;
    }
    #imgBox .continueBtn{
        left: 350px;
    }
    #endImgBox .shareBtn, #endImgBox .continueBtn{
        width: 230px;
        height: 70px;
        position: absolute;
        top: 834px;
        left: 56px;
        z-index: 100;
    }
    #endImgBox .continueBtn{
        left: 350px;
    }
    .shareShadow{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 105;
        display: none;
    }
    @keyframes rotating {
        0%{transform: rotate(0deg)}
        0%{transform: rotate(360deg)}
    }
</style>

<body>
<div id="loadBox">
    <div class="loadImg"></div>
    <div class="loadMsk"></div>
</div>
<div id="enterBox">
    <div class="logo"></div>
    <div class="enterText"></div>
    <input class="userName" type="text" placeholder="输入昵称，探索关键词">
    <div class="starBtnBg "></div>
    <div class="starBtnText"></div>
    <div class="enterBot"></div>
</div>
<div id="imgBox">
    <div class="_userName">123</div>
    <div class="shareBtn"></div>
    <div class="continueBtn"></div>
    <img src="" id="demoImgBg" alt=""/>
    <img src="" id="save_img" alt=""/>
</div>
<div id="endImgBox">
    <div class="shareBtn"></div>
    <div class="continueBtn"></div>
    <img src="images/lastPage.jpg" id="endImg" alt=""/>
</div>
<div class="music on"></div>
<img class="shareShadow" src="images/shadow.png" alt=""/>
<audio id="background-music" src="music/music1.mp3" controls="controls" hidden="true" autoplay loop="loop"></audio>

<script>
    var imgs = [
        "images/bg.jpg",
        "images/p1/page1_pic_1.png",
        "images/p1/page1.png",
        "images/p1/page1_pic_2.png",
        "images/p1/page1_pic_3.png",
        "images/p1/page1_pic_4.png",
        "images/p1/page1_pic_5.png",
        "images/p1/page1_pic_6.png",
        "images/p1/page1_pic_7.png",
        "images/p1/page1_pic_8.png",
        "images/p1/page1_pic_9.png",
        "images/p1/page2.png",
        "images/p2/page2_pic_1.png",
        "images/p2/page2_pic_2.png",
        "images/p2/page2_pic_3.png",
        "images/p2/page2_pic_4.png",
        "images/p2/page2_pic_5.png",
        "images/p2/page2_pic_6.png",
        "images/p2/page2_pic_7.png",
        "images/p2/page2_pic_8.png",
        "images/p2/page2_pic_9.png",
        "images/p1/page3.png",
        "images/p3/page3_pic_1.png",
        "images/p3/page3_pic_2.png",
        "images/p3/page3_pic_3.png",
        "images/p3/page3_pic_4.png",
        "images/p3/page3_pic_5.png",
        "images/p3/page3_pic_6.png",
        "images/p3/page3_pic_7.png",
        "images/p3/page3_pic_8.png",
        "images/p3/page3_pic_9.png",
        "images/p3/page3_pic_10.png",
        "images/p3/page3_pic_11.png",
        "images/p3/page3_pic_12.png",
        "images/p3/page3_pic_13.png",
        "images/p3/page3_pic_14.png",
        "images/p3/page3_pic_15.png",
        "images/p3/page3_pic_16.png",
        "images/p3/page3_pic_17.png",
        "images/p3/page3_pic_18.png",
        "images/p3/page3_pic_19.png",
        "images/p3/page3_pic_20.png",
        "images/p3/page3_pic_21.png",
        "images/p3/page3_pic_22.png",
        "images/p3/page3_pic_23.png",
        "images/p3/page3_pic_24.png",
        "images/p3/page3_pic_25.png",
        "images/p3/page3_pic_26.png",
        "images/p3/page3_pic_27.png",
        "images/p1/page4.png",
        "images/p4/page4_pic_1.png",
        "images/p4/page4_pic_2.png",
        "images/p4/page4_pic_3.png",
        "images/p4/page4_pic_4.png",
        "images/p4/page4_pic_5.png",
        "images/p4/page4_pic_6.png",
        "images/p4/page4_pic_7.png",
        "images/p4/page4_pic_8.png",
        "images/p4/page4_pic_9.png",
        "images/p4/page4_pic_10.png",
        "images/p4/page4_pic_11.png",
        "images/p4/page4_pic_12.png",
        "images/p4/page4_pic_13.png",
        "images/p4/page4_pic_14.png",
        "images/p4/page4_pic_15.png",
        "images/p4/page4_pic_16.png",
        "images/p4/page4_pic_17.png",
        "images/p4/page4_pic_18.png",
        "images/p4/page4_pic_19.png",
        "images/p4/page4_pic_20.png",
        "images/p4/page4_pic_21.png",
        "images/p4/page4_pic_22.png",
        "images/p4/page4_pic_23.png",
        "images/p4/page4_pic_24.png",
        "images/p4/page4_pic_25.png",
        "images/p4/page4_pic_26.png",
        "images/p4/page4_pic_27.png",
        "images/p4/page4_pic_28.png",
        "images/p4/page4_pic_29.png",
        "images/p1/page5.png",
        "images/p5/page5_pic_01.png",
        "images/p5/page5_pic_02.png",
        "images/p5/page5_pic_03.png",
        "images/p5/page5_pic_04.png",
        "images/p5/page5_pic_05.png",
        "images/p5/page5_pic_06.png",
        "images/p5/page5_pic_07.png",
        "images/p5/page5_pic_08.png",
        "images/p5/page5_pic_09.png",
        "images/p5/page5_pic_10.png",
        "images/p5/page5_pic_11.png",
        "images/p5/page5_pic_12.png",
        "images/p5/page5_pic_13.png",
        "images/p5/page5_pic_14.png",
        "images/p5/page5_pic_15.png",
        "images/p5/page5_pic_16.png",
        "images/p5/page5_pic_17.png",
        "images/p5/page5_pic_18.png",
        "images/p5/page5_pic_19.png",
        "images/p5/page5_pic_20.png",
        "images/p5/page5_pic_21.png",
        "images/p5/page5_pic_22.png",
        "images/p5/page5_pic_23.png",
        "images/p5/page5_pic_24.png",
        "images/p5/page5_pic_25.png",
        "images/p1/page6.png",
        "images/p6/page6_pic_1.png",
        "images/p6/page6_pic_2.png",
        "images/p6/page6_pic_3.png",
        "images/p6/page6_pic_4.png",
        "images/p6/page6_pic_5.png",
        "images/p6/page6_pic_6.png",
        "images/p6/page6_pic_7.png",
        "images/p6/page6_pic_8.png",
        "images/p6/page6_pic_9.png",
        "images/p6/page6_pic_10.png",
        "images/p6/page6_pic_11.png",
        "images/p6/page6_pic_12.png",
        "images/p6/page6_pic_13.png",
        "images/p6/page6_pic_14.png",
        "images/p6/page6_pic_15.png",
        "images/p6/page6_pic_16.png",
        "images/p6/page6_pic_17.png"
    ];
    var demoImgs=[
        "images/1.jpg",
        "images/2.jpg",
        "images/3.jpg",
        "images/4.jpg",
        "images/5.jpg",
        "images/6.jpg"
    ];
    var demoImgBgs=[
        "images/demoBg_1.jpg",
        "images/demoBg_2.jpg",
        "images/demoBg_3.jpg",
        "images/demoBg_4.jpg",
        "images/demoBg_5.jpg",
        "images/demoBg_6.jpg"
    ];
    var userName ="";
    var allTL = new TimelineLite;//总时间线
    var p2TimeLine;
    var p3TimeLine;
    var p4TimeLine;
    var p5TimeLine;
    var p6TimeLine;
    var p7TimeLine;
    var isOver=false;
    var bjSound;
    var w=window.innerWidth;
    var h=window.innerHeight;
    $("input").on("blur",function(e){
        scroll(0,0)
    });
    document.oncontextmenu = function (e) {
        e.preventDefault();
    }
    document.addEventListener('touchmove', function (e) {
        e.preventDefault();
        e.stopPropagation();
    }, {
        passive: false
    });
    var wxInit=function(){
                //微信分享初始化
                wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: '<?php echo $signPackage["timestamp"];?>',
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'hideMenuItems',
                'openLocation'
            ]
        });
        wx.ready(function () {
            //alert("微信JS-Api初始化成功!");
            ///////////////////////////////////////////////////////////////////////////////////////
            wx.hideMenuItems({
                menuList: [
                    'menuItem:copyUrl', // 复制链接
                    'menuItem:originPage', //原网页
                    'menuItem:openWithQQBrowser', //在QQ浏览器中打开
                    'menuItem:openWithSafari' //在Safari中打开
                ],
                success: function (res) {
                    //alert('已隐藏“阅读模式”，“分享到朋友圈”，“复制链接”等按钮');
                },
                fail: function (res) {
                    //alert(JSON.stringify(res));
                }
            });
            // 微信分享好友的数据
            var wxDataToAppMessage = {
                "appId": "",
                "imgUrl": "http://h5.daxiangqun.cn/bin/20180720/images/share/shareImg.jpg",
                "link": "http://h5.daxiangqun.cn/bin/20180720/index.php",
                "desc": "查收2018上半年关键词，开启下半年的小确幸！",
                "title": "点击查看你的2018年中关键词",
                trigger: function (res) {},
                success: function (res) {},
                cancel: function (res) {},
                fail: function (res) {}
            };

            // 微信分享朋友圈的数据
            var wxDataToTimeLine = {
                "appId": "",
                "imgUrl": "http://h5.daxiangqun.cn/bin/20180720/images/share/shareImg.jpg",
                "link": "http://h5.daxiangqun.cn/bin/20180720/index.php",
                "desc": "查收2018上半年关键词，开启下半年的小确幸！",
                "title": "点击查看你的2018年中关键词",
                trigger: function (res) {},
                success: function (res) {},
                cancel: function (res) {},
                fail: function (res) {}
            };
            wx.error(function (res) {
                //alert(res.errMsg);
            });

            wx.onMenuShareAppMessage(wxDataToAppMessage);
            wx.onMenuShareTimeline(wxDataToTimeLine);
            bjSound.play();
        })
    }
    var init=function(){
        userName="";
        bjSound=document.getElementById("background-music");
        bjSound.play();
        $(".userName").val("");
        $(".userName").fadeIn();
        $("#imgBox").hide();
        $("#endImgBox").hide();
        allTL.pause();
    };
    //图片加载
    var loadingBefore=function (imgs,callback){
        $(".loadMsk").show();
        if(!imgs){return false};
        var img=[];
        var len=imgs.length;
        var loadedCount = 0;
        for(var i=0;i<len;i++){
            img[i]=new Image();
            img[i].src=imgs[i];
            img[i].onload = function(){
                loadedCount++;
                var loadProgressNum=parseInt(loadedCount / len * 100, 10);
                console.log(loadProgressNum);
                $(".loadImg").css("height",292-(292*loadProgressNum)/100+'px');
                if(loadProgressNum==100&& $(".loadImg").css("height","0px")){
                    setTimeout(function(){
                        init();
                        wxInit();
                        TweenMax.to($("#loadBox"),0.8,{
                            opacity:0,
                            onComplete:function(){
                                $("#loadBox").hide();
                                $("#enterBox").show();
                                TweenMax.to($("#enterBox"),0.8,{
                                    opacity:1
                                });
                            }
                        });
                    },800)

                }

                if (loadedCount>=len){
                    callback ? callback() : null;
                }
            };
        }
    }
    loadingBefore(imgs);
    var app = new PIXI.Application(w, h, {
        backgroundColor: 0x1099bb,
        transparent: true //背景是否设为透明

    });
    document.body.appendChild(app.view);//将创建的canvas视图添加到body
    var loader = new PIXI.loaders.Loader();//加载器
    loader.add(imgs)
            .onProgress.add(function(e){
                console.log(Math.round(e.progress)+"%")
            });
    loader.load(function(loader){
        //首页
        var p1=new PIXI.Container();
        var sprite=createSprite("images/page_Enter.jpg");
//        sprite.x = 640/2;
//        sprite.y = 1030/2;
//        sprite.pivot.x = 640/2;
//        sprite.pivot.y = 1030/2;
        sprite.scale.x = 1;
        sprite.scale.y = 1;
        var p1_1Tween=TweenMax.to($(".enterBot"),1,{x:0,y:1000,scale:3,opacity:0,ease:Power1.easeIn},0.3);
        var p1_2Tween=TweenMax.to($(".logo"),1,{y:-280,scale:5,opacity:0,ease:Power1.easeIn});
        var p1_3Tween=TweenMax.to($(".enterText"),1.2,{y:100,scale:5,opacity:0,ease:Power1.easeIn},0.5);
        //第二页
        var p2Cont = new PIXI.Container();
        var p2Pic0=createSprite("images/p1/page1.png",{
            x:202,
            y:100
        });
        p2Pic0.pivot.x = 202;
        p2Pic0.pivot.y =100;

        var p2Pic1=createSprite("images/p1/page1_pic_1.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic1.pivot.x = 515/2;
        p2Pic1.pivot.y = 398/2;
        var p2Pic2=createSprite("images/p1/page1_pic_2.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic2.pivot.x = 555/2;
        p2Pic2.pivot.y = 458/2;
        var p2Pic3=createSprite("images/p1/page1_pic_3.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic3.pivot.x = 585/2;
        p2Pic3.pivot.y = 528/2;
        var p2Pic4=createSprite("images/p1/page1_pic_4.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic4.pivot.x = 561/2;
        p2Pic4.pivot.y = 432/2;
        var p2Pic5=createSprite("images/p1/page1_pic_5.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic5.pivot.x = 584/2;
        p2Pic5.pivot.y = 430/2;
        var p2Pic6=createSprite("images/p1/page1_pic_6.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic6.pivot.x = 499/2;
        p2Pic6.pivot.y = 441/2;
        var p2Pic7=createSprite("images/p1/page1_pic_7.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic7.pivot.x = 640/2;
        p2Pic7.pivot.y = 406/2;
        var p2Pic8=createSprite("images/p1/page1_pic_8.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic8.pivot.x = 570/2;
        p2Pic8.pivot.y = 396/2;
        var p2Pic9=createSprite("images/p1/page1_pic_9.png",{
            x:640/2,
            y:1030/2
        });
        p2Pic9.pivot.x = 550/2;
        p2Pic9.pivot.y = 419/2;
        //第三页
        var p3Cont = new PIXI.Container();
        var p3Pic1=createSprite("images/p2/page2_pic_1.png",{
            x:640/2,
            y:1030/2
        });
        p3Pic1.pivot.x = 248/2;
        p3Pic1.pivot.y = 358/2;
        var p3Pic2=createSprite("images/p2/page2_pic_2.png",{
            x:640/2,
            y:1030/2
        });
        p3Pic2.pivot.x = 248/2;
        p3Pic2.pivot.y = 358/2;
        var p3Pic3=createSprite("images/p2/page2_pic_3.png",{
            x:640/2,
            y:1030/2
        });
        p3Pic3.pivot.x = 248/2;
        p3Pic3.pivot.y = 358/2;
        var p3Pic4=createSprite("images/p2/page2_pic_4.png",{
            x:640/2,
            y:1030/2,
            visible:false
        });
        p3Pic4.pivot.x = 248/2;
        p3Pic4.pivot.y = 358/2;
        var p3Pic5=createSprite("images/p2/page2_pic_5.png",{
            x:640/2,
            y:1030/2,
            visible:false
        });
        p3Pic5.pivot.x = 248/2;
        p3Pic5.pivot.y = 358/2;
        var p3Pic6=createSprite("images/p2/page2_pic_6.png",{
            x:640/2,
            y:1030/2,
            visible:false
        });
        p3Pic6.pivot.x = 248/2;
        p3Pic6.pivot.y = 358/2;
        var p3Pic7=createSprite("images/p2/page2_pic_7.png",{
            x:640/2,
            y:1030/2,
            visible:false

        });
        p3Pic7.pivot.x = 248/2;
        p3Pic7.pivot.y = 358/2;
        var p3Pic8=createSprite("images/p2/page2_pic_8.png",{
            x:640/2,
            y:1030/2,
            visible:false
        });
        p3Pic8.pivot.x = 248/2;
        p3Pic8.pivot.y = 358/2;
        var p3Pic9=createSprite("images/p2/page2_pic_9.png",{
            x:640/2,
            y:1030/2,
            visible:false
        });
        p3Pic9.pivot.x = 248/2;
        p3Pic9.pivot.y = 358/2;
        //第四页
        var p4Cont = new PIXI.Container();
        var p4Pic1=createSprite("images/p3/page3_pic_1.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic1.pivot.x = 264/2;
        p4Pic1.pivot.y = 147/2;
        var p4Pic2=createSprite("images/p3/page3_pic_2.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic2.pivot.x = 257/2;
        p4Pic2.pivot.y = 61/2;
        var p4Pic3=createSprite("images/p3/page3_pic_3.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic3.pivot.x = 206/2;
        p4Pic3.pivot.y = 164/2;
        var p4Pic4=createSprite("images/p3/page3_pic_4.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic4.pivot.x = 288/2;
        p4Pic4.pivot.y = 108/2;
        var p4Pic5=createSprite("images/p3/page3_pic_5.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic5.pivot.x = 244/2;
        p4Pic5.pivot.y = 69/2;
        var p4Pic6=createSprite("images/p3/page3_pic_6.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic6.pivot.x = 271/2;
        p4Pic6.pivot.y = 145/2;
        var p4Pic7=createSprite("images/p3/page3_pic_7.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic7.pivot.x = 268/2;
        p4Pic7.pivot.y = 165/2;
        var p4Pic8=createSprite("images/p3/page3_pic_8.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic8.pivot.x = 257/2;
        p4Pic8.pivot.y = 189/2;
        var p4Pic9=createSprite("images/p3/page3_pic_9.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic9.pivot.x = 148/2;
        p4Pic9.pivot.y = 148/2;
        var p4Pic10=createSprite("images/p3/page3_pic_10.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic10.pivot.x = 148/2;
        p4Pic10.pivot.y = 148/2;
        var p4Pic11=createSprite("images/p3/page3_pic_11.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic11.pivot.x = 148/2;
        p4Pic11.pivot.y = 148/2;
        var p4Pic12=createSprite("images/p3/page3_pic_12.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic12.pivot.x = 148/2;
        p4Pic12.pivot.y = 148/2;
        var p4Pic13=createSprite("images/p3/page3_pic_13.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic13.pivot.x = 148/2;
        p4Pic13.pivot.y = 148/2;
        var p4Pic14=createSprite("images/p3/page3_pic_14.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic14.pivot.x = 148/2;
        p4Pic14.pivot.y = 148/2;
        var p4Pic15=createSprite("images/p3/page3_pic_15.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic15.pivot.x = 148/2;
        p4Pic15.pivot.y = 148/2;
        var p4Pic16=createSprite("images/p3/page3_pic_16.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic16.pivot.x = 148/2;
        p4Pic16.pivot.y = 148/2;
        var p4Pic17=createSprite("images/p3/page3_pic_17.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic17.pivot.x = 148/2;
        p4Pic17.pivot.y = 148/2;
        var p4Pic18=createSprite("images/p3/page3_pic_18.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic18.pivot.x = 148/2;
        p4Pic18.pivot.y = 148/2;
        var p4Pic19=createSprite("images/p3/page3_pic_19.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic19.pivot.x = 148/2;
        p4Pic19.pivot.y = 148/2;
        var p4Pic20=createSprite("images/p3/page3_pic_20.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic20.pivot.x = 148/2;
        p4Pic20.pivot.y = 148/2;
        var p4Pic21=createSprite("images/p3/page3_pic_21.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic21.pivot.x = 148/2;
        p4Pic21.pivot.y = 148/2;
        var p4Pic22=createSprite("images/p3/page3_pic_22.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic22.pivot.x = 148/2;
        p4Pic22.pivot.y = 148/2;
        var p4Pic23=createSprite("images/p3/page3_pic_23.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic23.pivot.x = 148/2;
        p4Pic23.pivot.y = 148/2;
        var p4Pic24=createSprite("images/p3/page3_pic_24.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic24.pivot.x = 148/2;
        p4Pic24.pivot.y = 148/2;
        var p4Pic25=createSprite("images/p3/page3_pic_25.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic25.pivot.x = 148/2;
        p4Pic25.pivot.y = 148/2;
        var p4Pic26=createSprite("images/p3/page3_pic_26.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic26.pivot.x = 148/2;
        p4Pic26.pivot.y = 148/2;
        var p4Pic27=createSprite("images/p3/page3_pic_27.png",{
            x:640/2,
            y:1030/2
        });
        p4Pic27.pivot.x = 148/2;
        p4Pic27.pivot.y = 148/2;
        //第五页
        var p5Cont = new PIXI.Container();
        var p5Pic1=createSprite("images/p4/page4_pic_1.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic1.pivot.x = 264/2;
        p5Pic1.pivot.y = 80/2;
        var p5Pic2=createSprite("images/p4/page4_pic_2.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic2.pivot.x = 257/2;
        p5Pic2.pivot.y = 80/2;
        var p5Pic3=createSprite("images/p4/page4_pic_3.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic3.pivot.x = 206/2;
        p5Pic3.pivot.y = 80/2;
        var p5Pic4=createSprite("images/p4/page4_pic_4.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic4.pivot.x = 288/2;
        p5Pic4.pivot.y = 80/2;
        var p5Pic5=createSprite("images/p4/page4_pic_5.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic5.pivot.x = 309/2;
        p5Pic5.pivot.y = 80/2;
        var p5Pic6=createSprite("images/p4/page4_pic_6.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic6.pivot.x = 271/2;
        p5Pic6.pivot.y = 80/2;
        var p5Pic7=createSprite("images/p4/page4_pic_7.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic7.pivot.x = 268/2;
        p5Pic7.pivot.y = 80/2;
        var p5Pic8=createSprite("images/p4/page4_pic_8.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic8.pivot.x = 257/2;
        p5Pic8.pivot.y = 80/2;
        var p5Pic9=createSprite("images/p4/page4_pic_9.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic9.pivot.x = 252/2;
        p5Pic9.pivot.y = 80/2;
        var p5Pic10=createSprite("images/p4/page4_pic_10.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic10.pivot.x = 252/2;
        p5Pic10.pivot.y = 80/2;
        var p5Pic11=createSprite("images/p4/page4_pic_11.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic11.pivot.x = 252/2;
        p5Pic11.pivot.y = 80/2;
        var p5Pic12=createSprite("images/p4/page4_pic_12.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic12.pivot.x = 252/2;
        p5Pic12.pivot.y = 80/2;
        var p5Pic13=createSprite("images/p4/page4_pic_13.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic13.pivot.x = 252/2;
        p5Pic13.pivot.y = 80/2;
        var p5Pic14=createSprite("images/p4/page4_pic_14.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic14.pivot.x = 252/2;
        p5Pic14.pivot.y = 80/2;
        var p5Pic15=createSprite("images/p4/page4_pic_15.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic15.pivot.x = 252/2;
        p5Pic15.pivot.y = 80/2;
        var p5Pic16=createSprite("images/p4/page4_pic_16.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic16.pivot.x = 252/2;
        p5Pic16.pivot.y = 80/2;
        var p5Pic17=createSprite("images/p4/page4_pic_17.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic17.pivot.x = 252/2;
        p5Pic17.pivot.y = 80/2;
        var p5Pic18=createSprite("images/p4/page4_pic_18.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic18.pivot.x = 252/2;
        p5Pic18.pivot.y = 80/2;
        var p5Pic19=createSprite("images/p4/page4_pic_19.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic19.pivot.x = 138/2;
        p5Pic19.pivot.y = 80/2;
        var p5Pic20=createSprite("images/p4/page4_pic_20.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic20.pivot.x = 138/2;
        p5Pic20.pivot.y = 80/2;
        var p5Pic21=createSprite("images/p4/page4_pic_21.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic21.pivot.x = 138/2;
        p5Pic21.pivot.y = 80/2;
        var p5Pic22=createSprite("images/p4/page4_pic_22.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic22.pivot.x = 138/2;
        p5Pic22.pivot.y = 80/2;
        var p5Pic23=createSprite("images/p4/page4_pic_23.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic23.pivot.x = 138/2;
        p5Pic23.pivot.y = 80/2;
        var p5Pic24=createSprite("images/p4/page4_pic_24.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic24.pivot.x = 138/2;
        p5Pic24.pivot.y = 80/2;
        var p5Pic25=createSprite("images/p4/page4_pic_25.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic25.pivot.x = 138/2;
        p5Pic25.pivot.y = 80/2;
        var p5Pic26=createSprite("images/p4/page4_pic_26.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic26.pivot.x = 138/2;
        p5Pic26.pivot.y = 80/2;
        var p5Pic27=createSprite("images/p4/page4_pic_27.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic27.pivot.x = 138/2;
        p5Pic27.pivot.y = 80/2;
        var p5Pic28=createSprite("images/p4/page4_pic_28.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic28.pivot.x = 138/2;
        p5Pic28.pivot.y = 80/2;
        var p5Pic29=createSprite("images/p4/page4_pic_29.png",{
            x:640/2,
            y:1030/2
        });
        p5Pic29.pivot.x = 138/2;
        p5Pic29.pivot.y = 80/2;
        //第六页
        var p6Cont = new PIXI.Container();
        var p6Pic1=createSprite("images/p5/page5_pic_01.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic1.pivot.x = 320/2;
        p6Pic1.pivot.y = 100/2;
        var p6Pic2=createSprite("images/p5/page5_pic_02.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic2.pivot.x = 320/2;
        p6Pic2.pivot.y = 100/2;
        var p6Pic3=createSprite("images/p5/page5_pic_03.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic3.pivot.x = 320/2;
        p6Pic3.pivot.y = 100/2;
        var p6Pic4=createSprite("images/p5/page5_pic_04.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic4.pivot.x = 320/2;
        p6Pic4.pivot.y = 100/2;
        var p6Pic5=createSprite("images/p5/page5_pic_05.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic5.pivot.x = 320/2;
        p6Pic5.pivot.y = 100/2;
        var p6Pic6=createSprite("images/p5/page5_pic_06.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic6.pivot.x = 320/2;
        p6Pic6.pivot.y = 100/2;
        var p6Pic7=createSprite("images/p5/page5_pic_07.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic7.pivot.x = 320/2;
        p6Pic7.pivot.y = 100/2;
        var p6Pic8=createSprite("images/p5/page5_pic_08.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic8.pivot.x = 320/2;
        p6Pic8.pivot.y = 100/2;
        var p6Pic9=createSprite("images/p5/page5_pic_09.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic9.pivot.x = 320/2;
        p6Pic9.pivot.y = 100/2;
        var p6Pic10=createSprite("images/p5/page5_pic_10.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic10.pivot.x = 320/2;
        p6Pic10.pivot.y = 100/2;
        var p6Pic11=createSprite("images/p5/page5_pic_11.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic11.pivot.x = 320/2;
        p6Pic11.pivot.y = 100/2;
        var p6Pic12=createSprite("images/p5/page5_pic_12.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic12.pivot.x = 320/2;
        p6Pic12.pivot.y = 100/2;
        var p6Pic13=createSprite("images/p5/page5_pic_13.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic13.pivot.x = 320/2;
        p6Pic13.pivot.y = 100/2;
        var p6Pic14=createSprite("images/p5/page5_pic_14.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic14.pivot.x = 320/2;
        p6Pic14.pivot.y = 100/2;
        var p6Pic15=createSprite("images/p5/page5_pic_15.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic15.pivot.x = 320/2;
        p6Pic15.pivot.y = 100/2;
        var p6Pic16=createSprite("images/p5/page5_pic_16.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic16.pivot.x = 320/2;
        p6Pic16.pivot.y = 100/2;
        var p6Pic17=createSprite("images/p5/page5_pic_17.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic17.pivot.x = 320/2;
        p6Pic17.pivot.y = 100/2;
        var p6Pic18=createSprite("images/p5/page5_pic_18.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic18.pivot.x = 320/2;
        p6Pic18.pivot.y = 100/2;
        var p6Pic19=createSprite("images/p5/page5_pic_19.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic19.pivot.x = 320/2;
        p6Pic19.pivot.y = 100/2;
        var p6Pic20=createSprite("images/p5/page5_pic_20.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic20.pivot.x = 320/2;
        p6Pic20.pivot.y = 100/2;
        var p6Pic21=createSprite("images/p5/page5_pic_21.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic21.pivot.x = 320/2;
        p6Pic21.pivot.y = 100/2;
        var p6Pic22=createSprite("images/p5/page5_pic_22.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic22.pivot.x = 320/2;
        p6Pic22.pivot.y = 100/2;
        var p6Pic23=createSprite("images/p5/page5_pic_23.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic23.pivot.x = 320/2;
        p6Pic23.pivot.y = 100/2;
        var p6Pic24=createSprite("images/p5/page5_pic_24.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic24.pivot.x = 320/2;
        p6Pic24.pivot.y = 100/2;
        var p6Pic25=createSprite("images/p5/page5_pic_25.png",{
            x:640/2,
            y:1030/2
        });
        p6Pic25.pivot.x = 320/2;
        p6Pic25.pivot.y = 100/2;
        //第七页
        var p7Cont = new PIXI.Container();
        var p7Pic1=createSprite("images/p6/page6_pic_1.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic1.pivot.x = 230/2;
        p7Pic1.pivot.y = 104;
        var p7Pic2=createSprite("images/p6/page6_pic_2.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic2.pivot.x = 230/2;
        p7Pic2.pivot.y = 104;
        var p7Pic3=createSprite("images/p6/page6_pic_3.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic3.pivot.x = 230/2;
        p7Pic3.pivot.y = 104;
        var p7Pic4=createSprite("images/p6/page6_pic_4.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic4.pivot.x = 230/2;
        p7Pic4.pivot.y = 104;
        var p7Pic5=createSprite("images/p6/page6_pic_5.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic5.pivot.x = 230/2;
        p7Pic5.pivot.y = 104;
        var p7Pic6=createSprite("images/p6/page6_pic_6.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic6.pivot.x = 230/2;
        p7Pic6.pivot.y = 104;
        var p7Pic7=createSprite("images/p6/page6_pic_7.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic7.pivot.x = 230/2;
        p7Pic7.pivot.y = 104;
        var p7Pic8=createSprite("images/p6/page6_pic_8.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic8.pivot.x = 230/2;
        p7Pic8.pivot.y = 104;
        var p7Pic9=createSprite("images/p6/page6_pic_9.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic9.pivot.x = 230/2;
        p7Pic9.pivot.y = 104;
        var p7Pic10=createSprite("images/p6/page6_pic_10.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic10.pivot.x = 230/2;
        p7Pic10.pivot.y = 104;
        var p7Pic11=createSprite("images/p6/page6_pic_11.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic11.pivot.x = 230/2;
        p7Pic11.pivot.y = 104;
        var p7Pic12=createSprite("images/p6/page6_pic_12.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic12.pivot.x = 230/2;
        p7Pic12.pivot.y = 104;
        var p7Pic13=createSprite("images/p6/page6_pic_13.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic13.pivot.x = 230/2;
        p7Pic13.pivot.y = 104;
        var p7Pic14=createSprite("images/p6/page6_pic_14.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic14.pivot.x = 230/2;
        p7Pic14.pivot.y = 104;
        var p7Pic15=createSprite("images/p6/page6_pic_15.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic15.pivot.x = 230/2;
        p7Pic15.pivot.y = 104;
        var p7Pic16=createSprite("images/p6/page6_pic_16.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic16.pivot.x = 230/2;
        p7Pic16.pivot.y = 104;
        var p7Pic17=createSprite("images/p6/page6_pic_17.png",{
            x:640/2,
            y:1030/2
        });
        p7Pic17.pivot.x = 230/2;
        p7Pic17.pivot.y = 104;

        p1.addChild(sprite)
        p2Cont.addChild(p2Pic0,p2Pic1,p2Pic2,p2Pic3,p2Pic4,p2Pic5,p2Pic6,p2Pic7,p2Pic8,p2Pic9);
        p3Cont.addChild(p3Pic1,p3Pic2,p3Pic3,p3Pic4,p3Pic5,p3Pic6,p3Pic7,p3Pic8,p3Pic9);
        p4Cont.addChild(p4Pic1,p4Pic2,p4Pic3,p2Pic4,p4Pic5,p4Pic6,p4Pic7,p4Pic8,p4Pic9,p4Pic10,p4Pic11,p4Pic12,
                p4Pic13,p4Pic14,p4Pic15,p4Pic16,p4Pic17,p4Pic18,p4Pic19,p4Pic20,p4Pic21,p4Pic22,p4Pic23,p4Pic24,
                p4Pic25,p4Pic26,p4Pic27);
        p5Cont.addChild(p5Pic1,p5Pic2,p5Pic3,p2Pic4,p5Pic5,p5Pic6,p5Pic7,p5Pic8,p5Pic9,p5Pic10,p5Pic11,p5Pic12,
                p5Pic13,p5Pic14,p5Pic15,p5Pic16,p5Pic17,p5Pic18,p5Pic19,p5Pic20,p5Pic21,p5Pic22,p5Pic23,p5Pic24,
                p5Pic25,p5Pic26,p5Pic27,p5Pic28,p5Pic29);
        p6Cont.addChild(p6Pic1,p6Pic2,p6Pic3,p2Pic4,p6Pic5,p6Pic6,p6Pic7,p6Pic8,p6Pic9,p6Pic10,p6Pic11,p6Pic12,
                p6Pic13,p6Pic14,p6Pic15,p6Pic16,p6Pic17,p6Pic18,p6Pic19,p6Pic20,p6Pic21,p6Pic22,p6Pic23,p6Pic24,
                p6Pic25);
        p7Cont.addChild(p7Pic1,p7Pic2,p7Pic3,p7Pic4,p7Pic5,p7Pic6,p7Pic7,p7Pic8,p7Pic9,p7Pic10,p7Pic11,p7Pic12,
                p7Pic13,p7Pic14,p7Pic15,p7Pic16,p7Pic17);
        app.stage.addChild(p1,p2Cont,p3Cont,p4Cont,p5Cont,p6Cont,p7Cont);//将元素全部放到舞台中
//        app.stage.addChild(p4Cont);//将元素全部放到舞台中
        app.ticker.add(function(delta) {});
        p2TimeLine=new TimelineLite();//第二页的时间线
        var p2Tween0=TweenMax.fromTo(p2Pic0,10,{pixi:{scale:0,alpha:1}},{pixi:{alpha:0,x:640/2-108,y:100},ease:Linear.easeNone}).delay(1);
        var p2Tween1=TweenMax.fromTo(p2Pic1,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(2);
        var p2Tween2=TweenMax.fromTo(p2Pic2,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(3);
        var p2Tween3=TweenMax.fromTo(p2Pic3,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(4);
        var p2Tween4=TweenMax.fromTo(p2Pic4,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(5);
        var p2Tween5=TweenMax.fromTo(p2Pic5,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(6);
        var p2Tween6=TweenMax.fromTo(p2Pic6,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(7);
        var p2Tween7=TweenMax.fromTo(p2Pic7,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(8);
        var p2Tween8=TweenMax.fromTo(p2Pic8,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(9);
        var p2Tween9=TweenMax.fromTo(p2Pic9,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(10);
        p2TimeLine.add([p2Tween0,p2Tween1,p2Tween2,p2Tween3,p2Tween4,p2Tween5,p2Tween6,p2Tween7,p2Tween8,p2Tween9],"start");
        p3TimeLine=new TimelineLite();//第三页的时间线
        var p3Tween1=TweenMax.fromTo(p3Pic1,1,{pixi:{scale:0,alpha:1}},{pixi:{scale:1,alpha:0.8},onComplete:function(){
                TweenMax.to(p3Pic1,0.5,{
                    alpha:0,
                    onComplete:function(){
                     p3Pic1.visible=false;
                    }
                });
               p3Pic4.visible=true;
        },ease:Linear.easeNone}).delay(1);
        var p3Tween4=TweenMax.fromTo(p3Pic4,1.6,{pixi:{scale:0.85,alpha:0.76}},{pixi:{scale:1.4,alpha:0.3},onComplete:function(){
            TweenMax.to(p3Pic4,0.5,{
                alpha:0,
                onComplete:function(){
                p3Pic4.visible=false;
                }
            });
            p3Pic7.visible=true;

        },ease:Linear.easeNone}).delay(1.2);
        var p3Tween2=TweenMax.fromTo(p3Pic2,1,{pixi:{scale:0,alpha:1}},{pixi:{scale:1,alpha:0.8},onComplete:function(){
            TweenMax.to(p3Pic2,0.5,{
                alpha:0,
                onComplete:function(){
                    p3Pic2.visible=false;
                }
            });
            p3Pic5.visible=true;
        },ease:Linear.easeNone}).delay(3);
        var p3Tween3=TweenMax.fromTo(p3Pic3,1,{pixi:{scale:0,alpha:1}},{pixi:{scale:1,alpha:0.8},
            onComplete:function(){
                TweenMax.to(p3Pic3,0.5,{
                    alpha:0,
                    onComplete:function(){
                        p3Pic3.visible=false;
                    }
                });
                p3Pic6.visible=true;
            },ease:Linear.easeNone}).delay(5);
        var p3Tween5=TweenMax.fromTo(p3Pic5,1.6,{pixi:{scale:0.85,alpha:0.76}},{pixi:{scale:1.4,alpha:0.3},onComplete:function(){
            TweenMax.to(p3Pic5,0.5,{
                alpha:0,
                onComplete:function(){
                    p3Pic5.visible=false;
                }
            });
            p3Pic8.visible=true;
        },ease:Linear.easeNone}).delay(3.2);
        var p3Tween6=TweenMax.fromTo(p3Pic6,1.6,{pixi:{scale:0.85,alpha:0.76}},{pixi:{scale:1.4,alpha:0.3},onComplete:function(){
            TweenMax.to(p3Pic6,0.5,{
                alpha:0,
                onComplete:function(){
                    p3Pic6.visible=false;
                }
            });
            p3Pic9.visible=true;
        },ease:Linear.easeNone}).delay(5.2);
        var p3Tween7=TweenMax.fromTo(p3Pic7,2,{pixi:{scale:0.98,alpha:0.4}},{pixi:{scale:2.5,alpha:0},ease:Linear.easeNone}).delay(1.8);
        var p3Tween8=TweenMax.fromTo(p3Pic8,2,{pixi:{scale:0.98,alpha:0.4}},{pixi:{scale:2.5,alpha:0},ease:Linear.easeNone}).delay(3.8);
        var p3Tween9=TweenMax.fromTo(p3Pic9,2,{pixi:{scale:0.98,alpha:0.4}},{pixi:{scale:2.5,alpha:0},onComplete:function(){
            setTimeout(function(){
                p3Pic1.opacity=0;
                p3Pic2.opacity=0;
                p3Pic3.opacity=0;
//                p3Pic1.visible=true;
//                p3Pic2.visible=true;
//                p3Pic3.visible=true;
                p3Pic7.visible=false;
                p3Pic8.visible=false;
                p3Pic9.visible=false;
            },2000)
        },ease:Linear.easeNone}).delay(5.8);
        p3TimeLine.add([p3Tween1,p3Tween2,p3Tween3,p3Tween4,p3Tween5,p3Tween6,p3Tween7,p3Tween8,p3Tween9],"+=0.4");
        p4TimeLine=new TimelineLite();//第四页的时间线
        var p4Tween1=TweenMax.fromTo(p4Pic1,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone});
        var p4Tween2=TweenMax.fromTo(p4Pic2,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:1030/2+100},ease:Linear.easeNone}).delay(1);
        var p4Tween3=TweenMax.fromTo(p4Pic3,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(1.8);
        var p4Tween4=TweenMax.fromTo(p4Pic4,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1200},ease:Linear.easeNone}).delay(2.3);
        var p4Tween5=TweenMax.fromTo(p4Pic5,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030/2},ease:Linear.easeNone}).delay(2.9);
        var p4Tween6=TweenMax.fromTo(p4Pic6,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:900},ease:Linear.easeNone}).delay(3.4);
        var p4Tween7=TweenMax.fromTo(p4Pic7,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+350,y:300},ease:Linear.easeNone}).delay(3.7);
        var p4Tween8=TweenMax.fromTo(p4Pic8,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+200,y:1030},ease:Linear.easeNone}).delay(4);
        var p4Tween9=TweenMax.fromTo(p4Pic9,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-400,y:800},ease:Linear.easeNone}).delay(4.3);
        var p4Tween10=TweenMax.fromTo(p4Pic10,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:150},ease:Linear.easeNone}).delay(4.6);
        var p4Tween11=TweenMax.fromTo(p4Pic11,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+250},ease:Linear.easeNone}).delay(4.9);
        var p4Tween12=TweenMax.fromTo(p4Pic12,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:600},ease:Linear.easeNone}).delay(5.2);
        var p4Tween13=TweenMax.fromTo(p4Pic13,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:10},ease:Linear.easeNone}).delay(5.5);
        var p4Tween14=TweenMax.fromTo(p4Pic14,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(5.8);
        var p4Tween15=TweenMax.fromTo(p4Pic15,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2,y:860},ease:Linear.easeNone}).delay(6.1);
        var p4Tween16=TweenMax.fromTo(p4Pic16,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:200},ease:Linear.easeNone}).delay(6.4);
        var p4Tween17=TweenMax.fromTo(p4Pic17,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:1030},ease:Linear.easeNone}).delay(6.7);
        var p4Tween18=TweenMax.fromTo(p4Pic18,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(7);
        var p4Tween19=TweenMax.fromTo(p4Pic19,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+200,y:100},ease:Linear.easeNone}).delay(7.3);
        var p4Tween20=TweenMax.fromTo(p4Pic20,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-50,y:1030/2-400},ease:Linear.easeNone}).delay(7.6);
        var p4Tween21=TweenMax.fromTo(p4Pic21,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:700},ease:Linear.easeNone}).delay(7.9);
        var p4Tween22=TweenMax.fromTo(p4Pic22,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(8.2);
        var p4Tween23=TweenMax.fromTo(p4Pic23,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:900},ease:Linear.easeNone}).delay(8.5);
        var p4Tween24=TweenMax.fromTo(p4Pic24,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+00,y:1030/2+100},ease:Linear.easeNone}).delay(8.8);
        var p4Tween25=TweenMax.fromTo(p4Pic25,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:100},ease:Linear.easeNone}).delay(9.1);
        var p4Tween26=TweenMax.fromTo(p4Pic26,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030/2-400},ease:Linear.easeNone}).delay(9.4);
        var p4Tween27=TweenMax.fromTo(p4Pic27,4,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(9.7);
        p4TimeLine.add([p4Tween1,p4Tween2,p4Tween3,p4Tween4,p4Tween5,p4Tween6,p4Tween7,p4Tween8,p4Tween9,p4Tween10,p4Tween11,p4Tween12,p4Tween13,p4Tween14,p4Tween15,p4Tween16,
            p4Tween17,p4Tween18,p4Tween19,p4Tween20,p4Tween21,p4Tween22,p4Tween23,p4Tween24,p4Tween25,p4Tween26,p4Tween27],"-=1.2");

        p5TimeLine=new TimelineLite();//第五页的时间线
        var p5Tween1=TweenMax.fromTo(p5Pic1,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone});
        var p5Tween2=TweenMax.fromTo(p5Pic2,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(0.5);
        var p5Tween3=TweenMax.fromTo(p5Pic3,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(0.9);
        var p5Tween4=TweenMax.fromTo(p5Pic4,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(1.2);
        var p5Tween5=TweenMax.fromTo(p5Pic5,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(1.5);
        var p5Tween6=TweenMax.fromTo(p5Pic6,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(1.8);
        var p5Tween7=TweenMax.fromTo(p5Pic7,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(2.1);
        var p5Tween8=TweenMax.fromTo(p5Pic8,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(2.4);
        var p5Tween9=TweenMax.fromTo(p5Pic9,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(2.7);
        var p5Tween10=TweenMax.fromTo(p5Pic10,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(3);
        var p5Tween11=TweenMax.fromTo(p5Pic11,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(3.3);
        var p5Tween12=TweenMax.fromTo(p5Pic12,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(3.6);
        var p5Tween13=TweenMax.fromTo(p5Pic13,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(3.9);
        var p5Tween14=TweenMax.fromTo(p5Pic14,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(4.2);
        var p5Tween15=TweenMax.fromTo(p5Pic15,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(4.5);
        var p5Tween16=TweenMax.fromTo(p5Pic16,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(4.8);
        var p5Tween17=TweenMax.fromTo(p5Pic17,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(5.1);
        var p5Tween18=TweenMax.fromTo(p5Pic18,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(5.4);
        var p5Tween19=TweenMax.fromTo(p5Pic19,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(5.7);
        var p5Tween20=TweenMax.fromTo(p5Pic20,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(6);
        var p5Tween21=TweenMax.fromTo(p5Pic21,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(6.3);
        var p5Tween22=TweenMax.fromTo(p5Pic22,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(6.6);
        var p5Tween23=TweenMax.fromTo(p5Pic23,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(6.9);
        var p5Tween24=TweenMax.fromTo(p5Pic24,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(7.2);
        var p5Tween25=TweenMax.fromTo(p5Pic25,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(7.5);
        var p5Tween26=TweenMax.fromTo(p5Pic26,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(7.8);
        var p5Tween27=TweenMax.fromTo(p5Pic27,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(8.1);
        var p5Tween28=TweenMax.fromTo(p5Pic28,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(8.4);
        var p5Tween29=TweenMax.fromTo(p5Pic29,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(8.7);

        p5TimeLine.add([p5Tween1,p5Tween2,p5Tween3,p5Tween4,p5Tween5,p5Tween6,p5Tween7,p5Tween8,p5Tween9,p5Tween10,p5Tween11,p5Tween12,p5Tween13,p5Tween14,p5Tween15,p5Tween16,
            p5Tween17,p5Tween18,p5Tween19,p5Tween20,p5Tween21,p5Tween22,p5Tween23,p5Tween24,p5Tween25,p5Tween26,p5Tween27,p5Tween28,p5Tween29],"-=1.2");

        p6TimeLine=new TimelineLite();//第六页页的时间线
        var p6Tween1=TweenMax.fromTo(p6Pic1,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone});
        var p6Tween2=TweenMax.fromTo(p6Pic2,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(0.5);
        var p6Tween3=TweenMax.fromTo(p6Pic3,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(0.9);
        var p6Tween4=TweenMax.fromTo(p6Pic4,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(1.2);
        var p6Tween5=TweenMax.fromTo(p6Pic5,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(1.5);
        var p6Tween6=TweenMax.fromTo(p6Pic6,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(1.8);
        var p6Tween7=TweenMax.fromTo(p6Pic7,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(2.1);
        var p6Tween8=TweenMax.fromTo(p6Pic8,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(2.4);
        var p6Tween9=TweenMax.fromTo(p6Pic9,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(2.7);
        var p6Tween10=TweenMax.fromTo(p6Pic10,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(3);
        var p6Tween11=TweenMax.fromTo(p6Pic11,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(3.3);
        var p6Tween12=TweenMax.fromTo(p6Pic12,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(3.6);
        var p6Tween13=TweenMax.fromTo(p6Pic13,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(3.9);
        var p6Tween14=TweenMax.fromTo(p6Pic14,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(4.2);
        var p6Tween15=TweenMax.fromTo(p6Pic15,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(4.5);
        var p6Tween16=TweenMax.fromTo(p6Pic16,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(4.8);
        var p6Tween17=TweenMax.fromTo(p6Pic17,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(5.1);
        var p6Tween18=TweenMax.fromTo(p6Pic18,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(5.4);
        var p6Tween19=TweenMax.fromTo(p6Pic19,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(5.7);
        var p6Tween20=TweenMax.fromTo(p6Pic20,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(6);
        var p6Tween21=TweenMax.fromTo(p6Pic21,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(6.3);
        var p6Tween22=TweenMax.fromTo(p6Pic22,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(6.6);
        var p6Tween23=TweenMax.fromTo(p6Pic23,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(6.9);
        var p6Tween24=TweenMax.fromTo(p6Pic24,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(7.2);
        var p6Tween25=TweenMax.fromTo(p6Pic25,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(7.5);
        p6TimeLine.add([p6Tween1,p6Tween2,p6Tween3,p6Tween4,p6Tween5,p6Tween6,p6Tween7,p6Tween8,p6Tween9,p6Tween10,p6Tween11,p6Tween12,p6Tween13,p6Tween14,p6Tween15,p6Tween16,
            p6Tween17,p6Tween18,p6Tween19,p6Tween20,p6Tween21,p6Tween22,p6Tween23,p6Tween24,p6Tween25],"-=1.2");
        p7TimeLine=new TimelineLite();//第四页页的时间线
        var p7Tween1=TweenMax.fromTo(p7Pic1,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone});
        var p7Tween2=TweenMax.fromTo(p7Pic2,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(0.5);
        var p7Tween3=TweenMax.fromTo(p7Pic3,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(1);
        var p7Tween4=TweenMax.fromTo(p7Pic4,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(1.5);
        var p7Tween5=TweenMax.fromTo(p7Pic5,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(2);
        var p7Tween6=TweenMax.fromTo(p7Pic6,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(2.5);
        var p7Tween7=TweenMax.fromTo(p7Pic7,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(3);
        var p7Tween8=TweenMax.fromTo(p7Pic8,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(3.5);
        var p7Tween9=TweenMax.fromTo(p7Pic9,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+400,y:600},ease:Linear.easeNone}).delay(4);
        var p7Tween10=TweenMax.fromTo(p7Pic10,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(4.5);
        var p7Tween11=TweenMax.fromTo(p7Pic11,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1030/2+100},ease:Linear.easeNone}).delay(5);
        var p7Tween12=TweenMax.fromTo(p7Pic12,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1000},ease:Linear.easeNone}).delay(5.5);
        var p7Tween13=TweenMax.fromTo(p7Pic13,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+500,y:1000},ease:Linear.easeNone}).delay(6);
        var p7Tween14=TweenMax.fromTo(p7Pic14,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:100},ease:Linear.easeNone}).delay(6.5);
        var p7Tween15=TweenMax.fromTo(p7Pic15,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2-300,y:1030},ease:Linear.easeNone}).delay(7);
        var p7Tween16=TweenMax.fromTo(p7Pic16,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2+800,y:100},ease:Linear.easeNone}).delay(7.5);
        var p7Tween17=TweenMax.fromTo(p7Pic17,2.5,{pixi:{scale:0,alpha:1}},{pixi:{scale:2.5,alpha:0,x:640/2,y:1030/2},ease:Linear.easeNone,onComplete:function(){
            $("#endImgBox").fadeIn();
            setTimeout(function(){
                p3Pic1.visible=true;
                p3Pic2.visible=true;
                p3Pic3.visible=true;
            },2000)
            $(".starBtnBg").removeClass("clicled");
        }}).delay(8);
        p7TimeLine.add([p7Tween1,p7Tween2,p7Tween3,p7Tween4,p7Tween5,p7Tween6,p7Tween7,p7Tween8,p7Tween9,p7Tween10,p7Tween11,p7Tween12,p7Tween13,p7Tween14,p7Tween15,p7Tween16,
            p7Tween17],"-=1.2");
        p2TimeLine.add(p3TimeLine);
        p3TimeLine.add(p4TimeLine);
        p4TimeLine.add(p5TimeLine,"-=0.8");
        p5TimeLine.add(p6TimeLine,"-=1.2");
        p6TimeLine.add(p7TimeLine,"-=1.2");
        allTL.add([p1_1Tween,p1_2Tween,p1_3Tween,p2TimeLine]);
//        allTL.add([p4TimeLine]);
        allTL.pause();
    });
    //输入姓名开始
    //按下
    $(".starBtnText").on("touchstart", function () {
        if ($(".userName").val() == "" || $(".userName").val() == " ") {
            alert("请输入您的大名")
            return;
        } else {
            userName = $(".userName").val();
            $(".userName").hide();
            $(".starBtnBg").addClass("clicled");
            allTL.play();
        }

    })

    //抬起
    $(".starBtnText").on("touchend",function(){
        allTL.pause();
        $(".starBtnBg").removeClass("clicled");
        if ($(".userName").val() == "" || $(".userName").val() == " ") {
            alert("请输入您的大名")
            return;
        }else{
            userName=$(".userName").val();
            $("._userName").html(userName)
            if(allTL.progress()>0.02&&allTL.progress()<=0.2){
                makePic(demoImgs[0],userName);
                $("#demoImgBg").attr("src",demoImgBgs[0]);
                $("#imgBox").show();
            }
            if(allTL.progress()>0.2&&allTL.progress()<=0.32){
                makePic(demoImgs[1],userName);
                $("#demoImgBg").attr("src",demoImgBgs[1]);
                $("#imgBox").show();
            }
            if(allTL.progress()>0.32&&allTL.progress()<=0.52){
                makePic(demoImgs[2],userName);
                $("#demoImgBg").attr("src",demoImgBgs[2]);
                $("#imgBox").show();
            }
            if(allTL.progress()>0.52&&allTL.progress()<=0.68){
                makePic(demoImgs[3],userName);
                $("#demoImgBg").attr("src",demoImgBgs[3]);
                $("#imgBox").show();
            }
            if(allTL.progress()>0.68&&allTL.progress()<=0.82){
                makePic(demoImgs[4],userName);
                $("#demoImgBg").attr("src",demoImgBgs[4]);
                $("#imgBox").show();
            }
            if(allTL.progress()>0.82&&allTL.progress()<=0.9){
                makePic(demoImgs[5],userName);
                $("#demoImgBg").attr("src",demoImgBgs[5]);
                $("#imgBox").show();
            }
        }
    })
            //音乐控制
            $(".music").on("click",function(){
            if(bjSound.paused){
                // 播放
                bjSound.play();
                $(".music").removeClass("off").addClass("on");
            }else{
                // 暂停
                bjSound.pause();
                $(".music").removeClass("on").addClass("off");
            } 

             
        });

    // 创建sprite对象
    function createSprite(name,opt){
        var newSprite = new PIXI.Sprite.fromImage(name);
        if (opt) {
            _.forIn(opt, function(value, key) {
                newSprite[key] = value;
            });
        }
        return newSprite;
    }
    //


    $("#imgBox .shareBtn").on("touchstart",function(){
        $(".shareShadow").show();
        $(".shareShadow").on("touchstart",function(){
            $(this).hide();
        })

    });
    $("#imgBox .continueBtn").on("touchstart",function(){
        $("#imgBox").hide();
    });
    $("#endImgBox .shareBtn").on("touchstart",function(){
        $(".shareShadow").show();
        $(".shareShadow").on("touchstart",function(){
            $(this).hide();
        })

    });
    $("#endImgBox .continueBtn").on("touchstart",function(){
        console.log("再来一次");
        $("#endImgBox").hide();
        allTL.progress()==0;
        allTL.restart();
        init();
    });
    var makePic=function (demoPic,userName) {
        var postApp = new PIXI.Application(640, 1136, {
            backgroundColor: 0x1099bb,
            transparent: true //背景是否设为透明
        });
        console.log(makePic.arguments[0])
        var message = new PIXI.Text(//创建文字
                userName,
                {fontFamily: "Arial", fontSize: 32, fill: "#3beaff", fontWeight: "bold"}
        );
        message.position.set(54, 40);
        document.body.appendChild(postApp.view);//将创建的canvas视图添加到body
        var drawLoader = new PIXI.loaders.Loader();//加载器
        drawLoader.add(demoImgs)
                .onProgress.add(function (e) {
                    console.log("加载完成");
                });
        drawLoader.once('complete', function () {
            onComplete();
        });
        drawLoader.load();
        //创建一个精灵
        console.log("画背景")
        //资源加载完成
        function onComplete() {
            var postImgBg = new PIXI.Sprite.fromImage(demoPic);
            var postImg = new PIXI.Container();
            postImg.addChild(postImgBg);
            postApp.stage.addChild(postImg, message);//将元素全部放到舞台中
            postApp.renderer.render(postApp.stage);
            var imageData = postApp.view.toDataURL("image/png");
            var myImg = document.getElementById("save_img");
            myImg.src = imageData;
            postApp.visible = false;


        }
    }

</script>


</body>

</html>