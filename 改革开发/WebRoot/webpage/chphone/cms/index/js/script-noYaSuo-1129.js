var shareData,
    scrollDirection = "top",
    scrollPro = 0,
    wrap = $('.main'),
    ww = window.innerWidth,
    wh = window.innerHeight,
    stop = false,
    shayuPlay = false, loader;
var TweenChuan;
var imgArr = [
    "images/loading/bg.jpg",
    "images/loading/qing.png",
    "images/p1/bg_00.jpg",
    "images/p1/bg_01.jpg",
    "images/p1/bg_02.jpg",
    "images/p2/bg2-1.png",
    "images/p2/bg2-2.jpg",
    "images/p2/bg3.png",
    "images/p2/bg4-1.png",
    "images/p2/bg4-2.jpg",
    "images/p3/bg.jpg",
    "images/p4/bg_1.jpg",
    "images/p4/bg_2.jpg",
    "images/p5/bg1.jpg",
    "images/p5/bg2.jpg",
    "images/p5/liuyq.png",
    "images/haibao.jpg"

];
// 横屏内容长度
var lastHeight = $(window).height();
var lastWidth = 750;
var contentLength = 22860;

// 音乐播放
var musicOn = true;
//防止屏幕移动
$(document).bind("touchmove", function (e) {
    e.preventDefault();
});

$(function () {
    // loading图片加载
    var loadingImg = new Image();
    loadingImg.src = "images/loading/bg.jpg";
    loadingImg.onload = function () {
        // pixi初始化
        pixiFn();
    }
});

function init() {
    $(".loading").fadeOut(100);
    $(".btn").hide();
    $(".loading-zi").fadeIn(100, function () {
        setTimeout(function () {
            $(".loading-wrap").fadeOut(300);
            $(".main").show();
        }, 3200);
    });
    scroller_1();
    $(".music").on("click", function () {
        if (!loader.resources.bgm.sound.isPlaying) {
            // 播放
            musicPlay();
            loader.resources.bgm.sound.play();
            $(".music").removeClass("off");
        } else {
            // 暂停
            musicPause();
            $(".music").addClass("off");
        }
    });
}
function scroller_1() {
    scrollBegin1();
    scroller.setDimensions(app.view.width, app.view.height, 3740, 7350);
}
function musicPlay() {
    musicOn = true;
}
function musicPause() {
    musicOn = false;
    loader.resources.bgm.sound.pause();
    loader.resources.beyond.sound.pause();
    // loader.resources.chunwan.sound.pause();
    loader.resources.xiyouji.sound.pause();
    loader.resources.xiaohudui.sound.pause();
    loader.resources.cuijian.sound.pause();
    loader.resources.qizizg.sound.pause();
    loader.resources.qq.sound.pause();
    loader.resources.huoche.sound.pause();
    loader.resources.yangliwei.sound.pause();
    loader.resources.aoyun.sound.pause();
    loader.resources.dianshi.sound.pause();
    loader.resources.lunchuan.sound.pause();
    loader.resources.gaotie.sound.pause();
}
function pixiFn() {
    app = new PIXI.Application(750, wh, {
        backgroundColor: '0xffffff'
    });
    $(".main").append(app.view);
    // display
    app.stage.displayList = new PIXI.DisplayList();
    var index1 = new PIXI.DisplayGroup(1, false);

    // 预加载
    loader = new PIXI.loaders.Loader();
    loader.add(imgArr)
        .add("bgm", "music/bgm_c.mp3?v=2")
        .add("beyond", "music/beyond.mp3?v=2")
        .add("xiyouji", "music/xiyouji.mp3?v=2")
        .add("xiaohudui", "music/xiaohudui.mp3?v=2")
        .add("cuijian", "music/cuijian.mp3?v=2")
        .add("qizizg", "music/qizizg.mp3?v=2")
        .add("qq", "music/qq.mp3?v=2")
        .add("huoche", "music/huoche.mp3?v=2")
        .add("huojian", "music/huojian.mp3?v=2")
        .add("yangliwei", "music/yangliwei.mp3?v=2")
        .add("aoyun", "music/aoyun.mp3?v=2")
        .add("dianshi", "music/dianshi.mp3?v=2")
        .add("lunchuan", "music/lunchuan.mp3?v=2")
        .add("gaotie", "music/gaotie.mp3?v=2")
        .onProgress.add(function (e) {
        if (Math.round(e.progress) >= 97) {
            $(".jindu").width(246);
        } else {
            $(".jindu").width(2.46 * (Math.round(e.progress)));
        }
    });
    container = new PIXI.Container();
    container.interactive = true;
    loader.load(function (loader) {
        init();
        loader.resources.bgm.sound.loop = true;
        loader.resources.qq.sound.loop = true;
        loader.resources.lunchuan.sound.loop = true;
        loader.resources.bgm.sound.play();
        // 第一部分
        part1 = new PIXI.Container();
        part1.x = 0;
        part1.y = 0;
        part1.height = 7050 + 300;
        titleDianshi = createSprite("images/loading/qing.png", {
            x: 106,
            y: 360,
        });
        title1978 = createSprite("images/loading/1978.png", {
            x: 227,
            y: 533,
        });

        tisi = createSprite("images/loading/shang.png", {
            x: 290,
            y: 1122,
        });
        tisiT = TweenMax.fromTo(tisi, 1, {alpha: 0.5, y: 1080}, {alpha: 1, y: 1122}).repeat(-1).yoyo(true);
        // bg
        part1Bg_0 = createSprite("images/p1/bg_00.jpg", {
            x: 0,
            y: 0
        });
        part1Bg_1 = createSprite("images/p1/bg_01.jpg", {
            x: 0,
            y: 1206
        });
        part1Bg_2 = createSprite("images/p1/bg_02.jpg", {
            x: 0,
            y: 1206 + 2936
        });
        // d1
        part1D1 = createSprite("images/p1/d1.png", {
            x: 18,
            y: 409 - 20 + 300,
            alpha: 0
        });
        //d2
        part1D2 = createSprite("images/p1/d2.png", {
            x: 240,
            y: 533 - 20 + 300,
            alpha: 0
        });
        //d3
        part1D3 = createSprite("images/p1/d3.png", {
            x: 418,
            y: 339 - 20 + 300,
            alpha: 0
        });
        // d4
        part1D4 = createSprite("images/p1/d4.png", {
            x: 601,
            y: 455 - 20 + 300,
            alpha: 0
        });
        part1Sz = createSprite("images/p1/sz.png", {
            x: 0,
            y: 812,
            alpha: 0
        });
        //d2
        part1D2l = createSprite("images/p1/d2l.jpg", {
            x: 240,
            y: 533 + 300,
            alpha: 0
        });
        //d3
        part1D3l = createSprite("images/p1/d3l.jpg", {
            x: 418,
            y: 339,
            alpha: 0
        });
        // d4
        part1D4l = createSprite("images/p1/d4l.jpg", {
            x: 601,
            y: 455 + 300,
            alpha: 0
        });
        //以他为起点
        part1Stone1 = createSprite("images/p1/dengxiaoping.png", {
            x: 0,
            y: 676 + 300,
            alpha: 0
        });
        part1Hongqi = createSprite("images/p1/hongqi.png", {
            x: 240,
            // y: 885+500
            y: 885 + 300,
            alpha: 0
        });

        part1Lu1 = createSprite("images/p1/lu1.png", {
            x: 0,
            y: 676 + 615 + 300
        });
        part1Title1 = createSprite("images/p1/1978-1988.png", {
            x: 330 + 30,
            y: 676 + 506 + 300,
            alpha: 0
        });
        part1D5 = createSprite("images/p1/d6.png", {
            x: 460,
            y: 1411 + 300
        });
        //以他为标准
        part1D5l = createSprite("images/p1/d6l.jpg", {
            x: 460,
            y: 1411 + 300,
            alpha: 0
        });
        part1MingXin = createSprite("images/p1/mxp.png", {
            x: -50,
            y: 1411 + 47 + 300
        });
        part1Mzi = createSprite("images/p1/mxp-zi.png", {
            x: 52,
            y: 1411 + 47 + 256 + 300
        });
        part1Hb1 = createSprite("images/p1/hb1.png", {
            x: -20,
            y: 1411 + 701 + 300
        });
        part1Hb2 = createSprite("images/p1/hb2.png", {
            x: 211,
            y: 1411 + 701 + 300 - 20
        });
        part1Hb3 = createSprite("images/p1/hb3.png", {
            x: 394 + 20,
            y: 1411 + 511 + 300
        });
        part1Hb1l = createSprite("images/p1/hb1.png", {
            x: 0,
            y: 1411 + 701 + 300,
            alpha: 0
        });
        part1Hb2l = createSprite("images/p1/hb2l.png", {
            x: 211,
            y: 1411 + 701 + 300,
            alpha: 0
        });
        //以他为标准
        part1Hb3l = createSprite("images/p1/hb3l.png", {
            x: 394,
            y: 1922 + 300,
            alpha: 0
        });
        part1Zi1 = createSprite("images/p1/1983.png", {
            x: 92,
            y: 1922 + 63 + 300,
            alpha: 0
        });
        part1Guizi = createSprite("images/p1/guizi.png", {
            x: 176,
            y: 1922 + 341 + 300
        });
        part1Chunw = createSprite("images/p1/chunjie.png", {
            x: 510,
            y: 1922 + 362 + 300,
            alpha: 0
        });
        part1ByYinyue = createSprite("images/p1/yinyue1.png", {
            x: 407,
            y: 1922 + 361 + 300,
            alpha: 0
        });

        part1Youxi = createSprite("images/p1/youxi.png", {
            x: 46,
            y: 1922 + 834 + 300
        });
        youxiT = TweenMax.fromTo(part1Youxi, 1, {x: 40, y: 1922 + 834 + 294}, {
            x: 52,
            y: 1922 + 834 + 306
        }).repeat(-1).yoyo(true);
        part1Lu2 = createSprite("images/p1/lu2.png", {
            x: 0,
            y: 1922 + 880 + 300
        });
        part1ByHaibao = createSprite("images/p1/byhb.png", {
            x: 473,
            y: 1922 + 967 + 300
        });
        part1ByHaibaol = createSprite("images/p1/byhbl.png", {
            x: 473,
            y: 1922 + 967 + 300,
            alpha: 0
        });
        //以他为标准 1986
        part1Zi2 = createSprite("images/p1/1986.png", {
            x: 295,
            y: 3222 + 300
        });
        part1Tub = createSprite("images/p1/nianqing.png", {
            x: -150,
            y: 3222 + 300 - 125,
        });
        part1Daged = createSprite("images/p1/dageda.png", {
            x: 59,
            y: 3222 + 162 + 300
        });
        part1Dians1 = createSprite("images/p1/dianshi1.png", {
            x: 369,
            y: 3222 + 157 + 300
        });
        part1Dians2 = createSprite("images/p1/dianshi2.png", {
            // x: 401,
            x: 431,
            y: 3222 + 212 + 300
        });
        part1Dians3 = createSprite("images/p1/dianshi3.png", {
            x: 296,
            y: 3222 + 305 + 300
        });
        part1Xiaohud = createSprite("images/p1/xiaohudui.png", {
            x: 90,
            y: 3222 + 682 + 300
        });
        part1Cidai = createSprite("images/p1/cidai.png", {
            x: 268,
            y: 3222 + 809 + 300
        });
        part1Biao = createSprite("images/p1/biao.png", {
            x: 611,
            y: 3222 + 869 + 300
        });
        // //以他为标准 1988
        part1Zi3 = createSprite("images/p1/1988.png", {
            x: 186,
            y: 4287 + 300
        });
        part1Liusj = createSprite("images/p1/laba.png", {
            x: -285,
            y: 4287 + 134 + 300,
            // alpha:0
        });
        part1XhYinyue = createSprite("images/p1/yinyue2.png", {
            x: 140,
            y: 4287 + 256 + 300,
            alpha: 0
        });
        // xhYinYueT = TweenMax.fromTo(part1XhYinyue, 0.8, {alpha: 0}, {alpha: 1}).repeat(-1).yoyo(true);
        part1Cujhb = createSprite("images/p1/cjhb.png", {
            x: 185,
            y: 4287 + 493 + 300,
            alpha: 0
        });
        part1Deng = createSprite("images/p1/deng.png", {
            x: 435,
            y: 4287 + 330 + 300
        });
        part1Dengl = createSprite("images/p1/dengl.png", {
            x: 435,
            y: 4287 + 330 + 300,
            alpha: 0
        });
        part1Zi4 = createSprite("images/p1/1989.png", {
            x: 96,
            y: 4287 + 776 + 300
        });
        part1Cuijian = createSprite("images/p1/cuijian.png", {
            x: 441,
            y: 4287 + 1393 + 300
        });
        part1.addChild(part1Bg_0, part1Bg_1, part1Bg_2, titleDianshi, tisi, title1978, part1Sz, part1D1, part1D2, part1D3, part1D4, part1D2l, part1D4l, part1D5, part1D5l, part1Hongqi, part1Stone1, part1Lu1, part1Title1, part1MingXin, part1Mzi, part1Hb1, part1Hb2, part1Hb3, part1Hb1l, part1Hb2l, part1Hb3l, part1Zi1, part1Guizi, part1Chunw, part1ByYinyue, part1Lu2, part1Youxi, part1ByHaibao, part1ByHaibaol, part1Tub, part1Zi2, part1Daged, part1Dians1, part1Dians2, part1Dians3, part1Xiaohud, part1Cidai, part1Biao, part1Zi3, part1Liusj, part1XhYinyue, part1Cujhb, part1Deng, part1Dengl, part1Zi4, part1Cuijian);

        var Hongchou = new PIXI.Container();
        Hongchou.x = 0;
        Hongchou.y = 4287 + 767 + 300;
        partHongchou = createSprite("images/p1/hongsidai.png", {
            x: 750,
            y: 606,
            alpha: 0
        });
        partTitle2 = createSprite("images/p1/1989-1999.png", {
            x: 67,
            y: 1252,
            alpha: 0
        });
        Hongchou.addChild(partHongchou, partTitle2);
        // 第二部分
        part2 = new PIXI.Container();
        part2.x = 0;
        part2.y = 7050 + 300 - lastHeight;
        //part2.y = 7050 + 300 - 1206;
        part2.height = lastHeight;
        part2.width = 3740;
        part2Bg_1 = createSprite("images/p2/bg2-1.png", {
            x: 0,
            y: 0,
            alpha: 0,
            height: lastHeight
        });
        part2Bg_2 = createSprite("images/p2/bg2-2.jpg", {
            x: 750,
            y: 0,
            alpha: 0,
            height: lastHeight
        });
        part2Zi1 = createSprite("images/p2/zi2.png", {
            x: 750,
            //x:300,
            y: lastHeight / 2 - 70 + 30,
            //alpha:0
        });
        part2Tisi = createSprite("images/p2/timg.png", {
            x: 630,
            //x:300,
            y: lastHeight / 2
            //alpha:0
        });
        tisiRight = TweenMax.fromTo(part2Tisi, 1, {alpha: 0.5, x: 630}, {alpha: 1, x: 660}).repeat(-1).yoyo(true);

        part2Zi2 = createSprite("images/p2/1997c.png", {
            x: 1832,
            y: 910,
            alpha: 0
        });
        part2Zi3 = createSprite("images/p2/1997x.png", {
            x: 2684,
            y: 470,
            alpha: 0
        });

        part2Ka = createSprite("images/p2/ka.png", {
            x: 2422,
            y: 597,
            // alpha:0
        });
        kaT = TweenMax.fromTo(part2Ka, 1, {y: 597}, {y: 620}).repeat(-1).yoyo(true);
        part2Jiaodai = createSprite("images/p2/jiaodai.png", {
            x: 2419,
            y: 946,
            // alpha:0
        });
        jiaodaiT = TweenMax.fromTo(part2Jiaodai, 1, {x: 2419}, {x: 2400}).repeat(-1).yoyo(true);
        part2.addChild(part2Bg_1, part2Bg_2, part2Tisi, part2Zi1, part2Zi2, part2Zi3, part2Ka, part2Jiaodai);

        part3 = new PIXI.Container();
        part3.x = 3740 - lastWidth;
        part3.y = 7050 + 300 - lastHeight;
        part3.width = 750;
        part3.height = 3093;
        part3Bg = createSprite("images/p2/bg3.png", {
            x: 0,
            y: 0
        });
        part3Xia = createSprite("images/p2/shang.png", {
            x: 375 - 30,
            y: 946
        });
        tisiXia = TweenMax.fromTo(part3Xia, 1, {alpha: 0.6, y: 926}, {alpha: 1, y: 946}).repeat(-1).yoyo(true);
        part3Zi5 = createSprite("images/p2/1999a.png", {
            x: 447,
            y: 274,
            alpha: 0
        });
        part3Chuan = createSprite("images/p2/chuan.png", {
            x: 130,
            y: 52
        });
        part3Chuan.scale.set(0.8, 0.8);
        part3Lu = createSprite("images/p2/lu_01.png", {
            x: -100,
            y: 0,
            //alpha:0
        });
        part3Jiaodai = createSprite("images/p2/jiaodai.png", {
            x: -577,
            y: 946,
            // alpha:0
        });
        jiaodaiT = TweenMax.fromTo(part3Jiaodai, 1, {x: -577}, {x: -596}).repeat(-1).yoyo(true);
        part3Zi4 = createSprite("images/p2/zi1.png", {
            x: 5,
            y: 1088,
            alpha: 0
        });
        part3Right = createSprite("images/p2/timg.png", {
            x: 15,
            y: (3093 - lastHeight) + lastHeight / 2 - 30
        });
        tisi3Right = TweenMax.fromTo(part3Right, 1, {alpha: 0.5, x: 15}, {alpha: 1, x: 45}).repeat(-1).yoyo(true);
        part3.addChild(part3Bg, part3Xia, part3Zi5, part3Jiaodai, part3Lu, part3Chuan, part3Zi4, part3Right);

        part4 = new PIXI.Container();
        part4.x = 3740;
        part4.y = 7050 + 300 - lastHeight;
        part4.width = 1980;
        part4.height = lastHeight;

        part4Bg_1 = createSprite("images/p2/bg4-1.png", {
            x: -300,
            y: 0,
            height: lastHeight,
            alpha: 0
        });
        part4Bg_2 = createSprite("images/p2/bg4-2.jpg", {
            x: 450,
            y: 0,
            height: lastHeight
        });
        part4Heiban = createSprite("images/p2/bzj.png", {
            x: 0,
            y: 76,
        });
        part4Baozi2 = createSprite("images/p2/baozi2.png", {
            x: 198,
            y: 394,
            alpha: 0
        });
        part4Baozi3 = createSprite("images/p2/baozi3.png", {
            x: 618,
            y: 394,
            alpha: 0
        });
        part4Titled = createSprite("images/p2/title.png", {
            // x: 807,
            x: 970,
            y: 724,
            // y: 645-5,
            alpha: 0
        });
        part4Titlex = createSprite("images/p2/titlex.png", {
            x: 815,
            y: 804,
            alpha: 0
        });
        part4Dnx = createSprite("images/p3/dnx.png", {
            x: 1338,
            y: 819
        });
        part4Dn = createSprite("images/p3/dn.png", {
            x: 1336,
            y: 819,
            alpha: 0
        });

        partMask = new PIXI.Container();
        partMask.x = 2990;
        partMask.y = 7050 + 300 - lastHeight;
        rectangle = new PIXI.Graphics;
        rectangle.lineStyle(0);
        rectangle.beginFill(0xFFFFFF);
        rectangle.drawRect(0, 0, 750, lastHeight);
        rectangle.endFill();
        rectangle.x = 0;
        rectangle.y = 0;
        rectangle.alpha = 0;
        partMask.addChild(rectangle);

        part4.addChild(part4Bg_1, part4Bg_2, part4Heiban, part4Baozi2, part4Baozi3, part4Titled, part4Titlex, part4Dnx, part4Dn);

        part5 = new PIXI.Container();
        part5.x = 2990;
        part5.y = 7050 + 300 - lastHeight;
        part5.width = 750;
        part5.height = 3093;
        part5.alpha = 0;

        part5Bg = createSprite("images/p3/bg.jpg", {
            x: 0,
            y: 0
        });

        part5Dn = createSprite("images/p3/dn.png", {
            x: 50,
            y: 121,
        });

        part5Dnpm = createSprite("images/p3/dnpm.png", {
            x: 371,
            y: 256,
            alpha: 0
        });

        style = new PIXI.TextStyle({
            fontFamily: "Arial",
            fontSize: 18,
            fill: "black",
            fontWeight: "bold",
            whiteSpace: "nowrap",
            overflow: "hidden"
        });
        message1 = new PIXI.Text("中", style);
        message2 = new PIXI.Text("国", style);
        message3 = new PIXI.Text("加", style);
        message4 = new PIXI.Text("入", style);
        message5 = new PIXI.Text("世", style);
        message6 = new PIXI.Text("贸", style);
        message7 = new PIXI.Text("了", style);
        message8 = new PIXI.Text("！", style);
        message1.x = 371;
        message2.x = 391;
        message3.x = 411;
        message4.x = 431;
        message5.x = 451;
        message6.x = 471;
        message7.x = 491;
        message8.x = 511;
        message1.y = message2.y = message3.y = message4.y = message5.y = message6.y = message7.y = message8.y = 298;
        message1.alpha = message2.alpha = message3.alpha = message4.alpha = message5.alpha = message6.alpha = message7.alpha = message8.alpha = 0;

        part5Xia = createSprite("images/p2/xia.png", {
            x: 375 - 30,
            y: lastHeight - 120
        });
        tisi5Xia = TweenMax.fromTo(part5Xia, 1, {alpha: 0.5, y: lastHeight - 120}, {
            alpha: 1,
            y: lastHeight - 90
        }).repeat(-1).yoyo(true);

        part5Zi1 = createSprite("images/p3/zi1.png", {
            x: 65,
            y: 748,
            alpha: 0
        });

        part5Huoche = createSprite("images/p3/huoche.png", {
            x: -900,
            y: 995
        });

        part5Zi2 = createSprite("images/p3/zi2.png", {
            x: 116,
            y: 1158,
            alpha: 0
        });

        part5Zi3 = createSprite("images/p3/zi3.png", {
            x: 284,
            y: 1551,
            alpha: 0
        });

        part5Gaotieh = createSprite("images/p3/gaotieh.png", {
            x: 0,
            y: 1680
        });

        part5Gaotiel = createSprite("images/p3/gaotiel.png", {
            x: 0,
            y: 1680,
            alpha: 0
        });

        part5Feichuan = createSprite("images/p3/feichuan.png", {
            x: 282,
            y: 2357,
            alpha: 0
        });

        part5Zi4 = createSprite("images/p3/zi4.png", {
            x: 64,
            y: 2369,
            alpha: 0
        });

        part5Yun = createSprite("images/p3/yun.png", {
            x: 0,
            y: 2149,
            alpha: 0
        });

        part5.addChild(part5Bg, part5Dn, part5Dnpm, message1, message2, message3, message4, message5, message6, message7, message8, part5Zi1, part5Xia, part5Huoche, part5Zi2, part5Zi3, part5Gaotieh, part5Gaotiel, part5Feichuan, part5Zi4, part5Yun);

        part6 = new PIXI.Container();
        part6.x = 2990;
        part6.y = 7050 + 300 - lastHeight;
        part6.alpha = 0;
        part6.width = 750;
        part6.height = 4794;

        part6Bg_1 = createSprite("images/p4/bg_1.jpg", {
            x: 0,
            y: 0
        });
        part6Bg_2 = createSprite("images/p4/bg_2.jpg", {
            x: 0,
            y: 2200
        });

        part6Diqiu = createSprite("images/p4/diqiu.png", {
            x: 200,
            y: 200
        });
        part6Diqiu.anchor.set(0.5);
        part6Title = createSprite("images/p4/title.png", {
            x: 52 - 30,
            y: 108,
            alpha: 0
        });

        part6YuHangy = createSprite("images/p4/yuhangy.png", {
            x: 127,
            y: 449
        });
        YuHangy = TweenMax.fromTo(part6YuHangy, 1, {y: 449}, {y: 500}).repeat(-1).yoyo(true);

        part6Zi1 = createSprite("images/p4/zi0.png", {
            x: 119,
            y: 998,
            alpha: 0
        });

        part6WeiXing = createSprite("images/p4/weixing.png", {
            x: -404,
            y: 1226,
        });
        part6Diqiu1 = createSprite("images/p4/diqiu.png", {
            x: 33,
            y: 1525,
            alpha: 0
        });
        part6Zi2 = createSprite("images/p4/zi1.png", {
            x: 350,
            y: 1366,
            alpha: 0
        });
        part6Beijing = createSprite("images/p4/beijing.png", {
            x: 211,
            y: 1640,
            alpha: 0
        });

        part6Shouji = createSprite("images/p4/shouji.png", {
            x: 0,
            y: 2246,
            alpha: 0
        });
        part6Aoyun = createSprite("images/p4/aoyun.png", {
            x: 228,
            y: 2274,
            z: 0,
            alpha: 0
        });
        part6Zi3 = createSprite("images/p4/zi2.png", {
            x: 310,
            y: 2558,
            alpha: 0
        });
        part6Fuwa = createSprite("images/p4/fuwa.png", {
            x: 760,
            y: 2663
        });
        part6Shanghai = createSprite("images/p4/shanghai.png", {
            x: -560,
            y: 2826,
        });
        part6Zi4 = createSprite("images/p4/zi3.png", {
            x: 103,
            y: 3223,
            alpha: 0
        });
        part6Dianshi = createSprite("images/p4/dianshi.png", {
            x: 151,
            y: 3580
        });
        part6Tuyouy = createSprite("images/p4/tuyouyou.png", {
            x: 199,
            y: 3630,
            alpha: 0
        });
        part6Zi5 = createSprite("images/p4/zi4.png", {
            x: 168,
            y: 4055,
            alpha: 0
        });
        part6Tianyan = createSprite("images/p4/tianyan.png", {
            x: 750,
            y: 4150
        });
        part6Zi6 = createSprite("images/p4/zi5.png", {
            x: 400,
            y: 4490,
            alpha: 0
        });
        part6Chuan = createSprite("images/p4/chuan.png", {
            x: -513,
            // x:79,
            y: 4000
            // y:4770
        });
        part6Gaotie = createSprite("images/p4/gaotie.png", {
            x: 750,
            y: 5563
        });
        part6Zi7 = createSprite("images/p4/zi6.png", {
            x: 126,
            y: 5851,
            alpha: 0
        });

        part6.addChild(part6Bg_1, part6Bg_2, part6Diqiu, part6Title, part6YuHangy, part6Zi1, part6Diqiu1, part6WeiXing, part6Zi2, part6Beijing, part6Shouji, part6Aoyun, part6Zi3, part6Fuwa, part6Shanghai, part6Zi4, part6Dianshi, part6Tuyouy, part6Zi5, part6Tianyan, part6Zi6, part6Chuan, part6Gaotie, part6Zi7);

        part7 = new PIXI.Container();
        // part7.x=0;
        // part7.y=0;
        part7.x = 2990;
        part7.y = 7350;
        part7.alpha = 0;
        part7.width = 750;
        part7.height = 1500 + 1206;

        part7Bg = createSprite("images/p5/bg1.jpg", {
            x: 0,
            y: 0
        });
        part7Img1 = createSprite("images/p5/p1.png", {
            x: 125,
            y: 394
        });
        part7Img2 = createSprite("images/p5/1.png", {
            x: 125 + 79,
            y: 899 + 79
        });
        part7Img2.anchor.set(0.5);
        part7Img3 = createSprite("images/p5/2.png", {
            x: 297 + 79,
            y: 899 + 79
        });
        part7Img3.anchor.set(0.5);
        part7Img4 = createSprite("images/p5/3.png", {
            x: 125 + 79,
            y: 1064 + 79
        });
        part7Img4.anchor.set(0.5);
        part7Img5 = createSprite("images/p5/4.png", {
            x: 297 + 79,
            y: 1064 + 79
        });
        part7Img5.anchor.set(0.5);
        part7LastBg = createSprite("images/p5/bg2.jpg", {
            x: 0,
            y: 1500
        });
        part7Yun = createSprite("images/p5/yun.png", {
            // x: 126,
            x: 220,
            y: 1500 + 60,
            // alpha: 0
        });
        part7Title = createSprite("images/p5/title.png", {
            x: 224,
            y: 1500 + 60,
            alpha: 0
        });
        part7Title.width = 0;
        part7Hua = createSprite("images/p5/hua.png", {
            x: 535,
            y: 1500 + 60,
            alpha: 0
        });
        part7Zi = createSprite("images/p5/titlex.png", {
            x: 138,
            y: 1500 + 184,
            alpha: 0
        });
        part7Ka = createSprite("images/p5/kapian.png", {
            // x: 18,
            x: 375,
            y: 1500 + 338 + 331,
            // y: 1500 + 338,
            alpha: 0
        });
        part7Ka.anchor.set(0.5);
        part7LiuYanq = createSprite("images/p5/liuyq.png", {
            x: 152,
            y: 1500 + 492+55,
            alpha: 0
        });
        part7Repeat = createSprite("images/p5/repeat.png", {
            x: 47,
            y: 1500 + 1040,
            alpha: 0
        });
        part7Repeat.interactive = true;
        part7Liuyan = createSprite("images/p5/liuyan.png", {
            x: 278,
            y: 1500 + 1040,
            alpha: 0
        });
        part7Liuyan.interactive = true;
        part7FenXiang = createSprite("images/p5/fenxiang.png", {
            x: 509,
            y: 1500 + 1040,
            alpha: 0
        });
        part7FenXiang.interactive = true;
        part7.addChild(part7Bg, part7Img1, part7LastBg, part7Img2, part7Img3, part7Img4, part7Img5, part7Yun, part7Title, part7Hua, part7Zi, part7Ka, part7LiuYanq, part7Repeat, part7Liuyan, part7FenXiang);
        container.addChild(part1, part2, Hongchou, part3, part4, part5, partMask, part6, part7);
        app.stage.addChild(container);
    });
}
// 滚动
function scrollBegin1() {
    scroller = new Scroller(function (left, top, zoom) {
        if (scrollDirection == "top") {
            container.y = -top;
            scroller.options.scrollingX = false;
        }
        if (scrollDirection == "left") {
            container.x = -left;
        }
        scrollPro = top;
        //    向上滑
        scroller.options.scrollingX = false;
        if (scrollPro < 80 && scrollPro > 0) {
            titleDianshi.alpha = 1;
            tisi.alpha = 0;
            tisiT.play();
        }
        if (80 < scrollPro && scrollPro < 250) {
            title1978.alpha = scrollNum(80, 250, scrollPro, 1, 0);
            titleDianshi.scale.set(scrollNum(80, 250, scrollPro, 1, 6), scrollNum(80, 250, scrollPro, 1, 6));
            titleDianshi.x = scrollNum(80, 250, scrollPro, 106, -700);
            titleDianshi.y = scrollNum(80, 250, scrollPro, 360, -400);
            tisiT.pause();
            tisi.alpha = scrollNum(80, 250, scrollPro, 1, 0);
        }
        if (250 < scrollPro && scrollPro < 400) {
            titleDianshi.alpha = 0;
            part1D1.alpha = scrollNum(250, 400, scrollPro, 0, 1);
            part1D2.alpha = scrollNum(250, 400, scrollPro, 0, 1);
            part1D3.alpha = scrollNum(250, 400, scrollPro, 0, 1);
            part1D4.alpha = scrollNum(250, 400, scrollPro, 0, 1);
            part1D1.y = scrollNum(250, 400, scrollPro, 409 - 20 + 300, 409 + 300);
            part1D2.y = scrollNum(250, 400, scrollPro, 533 - 20 + 300, 533 + 300);
            part1D3.y = scrollNum(250, 400, scrollPro, 339 - 20 + 300, 339 + 300);
            part1D4.y = scrollNum(250, 400, scrollPro, 455 - 20 + 300, 455 + 300);
            part1Stone1.alpha = scrollNum(250, 400, scrollPro, 0, 1);
            part1Sz.alpha = scrollNum(250, 400, scrollPro, 0, 1);
        }
        if (400 < scrollPro && scrollPro < 500) {
            part1D2l.alpha = scrollNum(400, 500, scrollPro, 0, 1);
            part1D4l.alpha = scrollNum(400, 500, scrollPro, 0, 1);
        }
        if (510 < scrollPro && scrollPro < 760) {
            part1Hongqi.alpha = scrollNum(560, 760, scrollPro, 0, 1);
            part1Hongqi.scale.x = scrollNum(560, 760, scrollPro, 0, 1);
            part1Hongqi.scale.y = scrollNum(560, 760, scrollPro, 0, 1);
            part1Hongqi.y = scrollNum(560, 760, scrollPro, 885 + 500 + 300, 885 + 300);
        }
        if (760 < scrollPro && scrollPro < 900) {
            part1Title1.alpha = scrollNum(760, 900, scrollPro, 0, 1);
            part1Title1.x = scrollNum(760, 900, scrollPro, 360, 330);
            part1D5.y = scrollNum(760, 900, scrollPro, 1411 + 300, 1411 + 300 + 20);
        }
        if (900 < scrollPro && scrollPro < 1100) {
            part1Mzi.alpha = scrollNum(900, 1100, scrollPro, 0, 1);
        }
        if (1100 < scrollPro && scrollPro < 1400) {
            part1MingXin.y = scrollNum(1100, 1400, scrollPro, 1411 + 47 + 300, 1411 + 300);
            part1Mzi.y = scrollNum(1100, 1400, scrollPro, 1411 + 47 + 256 + 300, 1411 + 256 + 300);
            part1Hb1.x = scrollNum(1100, 1400, scrollPro, -30, 0);
            part1Hb2.y = scrollNum(1100, 1400, scrollPro, 1411 + 701 + 300 - 30, 1411 + 701 + 300);
            part1Hb3.x = scrollNum(1100, 1400, scrollPro, 394 + 30, 394);
        }
        if (1400 < scrollPro && scrollPro < 1750) {
            part1Zi1.alpha = scrollNum(1400, 1750, scrollPro, 0, 1);
            part1Hb1l.alpha = scrollNum(1400, 1750, scrollPro, 0, 1);
            part1Hb2l.alpha = scrollNum(1400, 1750, scrollPro, 0, 1);
            part1Hb3l.alpha = scrollNum(1400, 1750, scrollPro, 0, 1);
        }
        if (1750 < scrollPro && scrollPro < 1924) {
            part1ByYinyue.alpha = scrollNum(1750, 1924, scrollPro, 0, 1);
            part1ByYinyue.scale.x = scrollNum(1750, 1924, scrollPro, 0, 1);
            part1ByYinyue.scale.y = scrollNum(1750, 1924, scrollPro, 0, 1);
            part1ByYinyue.y = scrollNum(1750, 1924, scrollPro, 1922 + 361 + 300, 1922 + 50 + 300);
            part1Chunw.alpha = scrollNum(1750, 1924, scrollPro, 0, 1);
        }
        if (1924 < scrollPro && scrollPro < 2500) {
            part1ByYinyue.y = scrollNum(1924, 2500, scrollPro, 1922 + 50 + 300, 1922 + 300);
        }
        if (2300 < scrollPro && scrollPro < 2500) {
            part1ByHaibao.rotation = scrollNum(2300, 2500, scrollPro, 0, 0.1);
            part1ByHaibaol.rotation = scrollNum(2300, 2500, scrollPro, 0, 0.1);
            part1ByHaibaol.alpha = scrollNum(2300, 2500, scrollPro, 0, 1);
            part1Tub.x = scrollNum(2300, 2500, scrollPro, -150, 0);
        }
        if (2300 < scrollPro && scrollPro < 2400) {
            part1Zi2.alpha = scrollNum(2300, 2400, scrollPro, 0, 1);
        }
        if (2600 < scrollPro && scrollPro < 3200) {
            part1Dians1.x = scrollNum(2600, 3200, scrollPro, 369, 269);
            part1Dians1.y = scrollNum(2600, 3200, scrollPro, 3222 + 147 + 300, 3222 + 157 + 300);
            part1Dians2.x = scrollNum(2600, 3200, scrollPro, 431, 401);
            part1Dians3.x = scrollNum(2600, 3200, scrollPro, 296, 196);
            part1Dians3.y = scrollNum(2600, 3200, scrollPro, 3222 + 305 + 300, 3222 + 325 + 300);
        }
        if (3100 < scrollPro && scrollPro < 3637) {
            part1Xiaohud.rotation = scrollNum(3100, 3637, scrollPro, 0.5, 0);
            part1Zi3.alpha = scrollNum(3100, 3637, scrollPro, 0, 1);
        }
        if (3730 < scrollPro && scrollPro < 4000) {
            part1Xiaohud.rotation = scrollNum(3730, 4000, scrollPro, 0, -0.3);
            part1Liusj.x = scrollNum(3730, 4000, scrollPro, -285, 0);
        }
        if (3990 < scrollPro && scrollPro < 4100) {
            part1XhYinyue.alpha = scrollNum(3990, 4100, scrollPro, 0, 1);
            part1XhYinyue.scale.x = scrollNum(3990, 4100, scrollPro, 0, 1);
            part1XhYinyue.scale.y = scrollNum(3990, 4100, scrollPro, 0, 1);
            part1XhYinyue.x = scrollNum(3990, 4100, scrollPro, 140, 185);
            part1XhYinyue.y = scrollNum(3990, 4100, scrollPro, 4287 + 256 + 300, 4287 + 146 + 300);
        }
        if (4100 < scrollPro && scrollPro < 4310) {
            part1Cujhb.alpha = scrollNum(4100, 4310, scrollPro, 0, 1);
            part1Cujhb.scale.x = scrollNum(4100, 4310, scrollPro, 2, 1);
            part1Cujhb.scale.y = scrollNum(4100, 4310, scrollPro, 2, 1);
            part1Dengl.alpha = scrollNum(4100, 4310, scrollPro, 0, 1);
        }
        if (4310 < scrollPro && scrollPro < 4854) {
            part1Zi4.alpha = scrollNum(4310, 4854, scrollPro, 0, 1);
            part1Cuijian.alpha = scrollNum(4310, 4854, scrollPro, 0, 1);
            part1Cuijian.scale.x = scrollNum(4310, 4854, scrollPro, 0, 1);
            part1Cuijian.scale.y = scrollNum(4310, 4854, scrollPro, 0, 1);
            part1Cuijian.x = scrollNum(4310, 4854, scrollPro, 441, 105);
            part1Cuijian.y = scrollNum(4310, 4854, scrollPro, 4287 + 1393 + 300, 4287 + 787 + 300);
        }
        if (4900 < scrollPro && scrollPro < 5550) {
            part1Cuijian.rotation = scrollNum(4900, 5550, scrollPro, 0, 0.15);
            partHongchou.alpha = scrollNum(4900, 5550, scrollPro, 0, 1);
            partHongchou.scale.x = scrollNum(4900, 5550, scrollPro, 0, 1);
            partHongchou.scale.y = scrollNum(4900, 5550, scrollPro, 0, 1);
            partHongchou.x = scrollNum(4900, 5550, scrollPro, 750, 0);
        }
        if (5550 < scrollPro) {
            partHongchou.x = 0;
        }
        if (5600 < scrollPro && scrollPro < 5900) {
            partTitle2.alpha = scrollNum(5600, 5900, scrollPro, 0, 1);
            partTitle2.x = scrollNum(5600, 5900, scrollPro, 37, 67);
            part2Bg_1.alpha = scrollNum(5600, 5900, scrollPro, 0, 1);
            part2Bg_2.alpha = scrollNum(5600, 5900, scrollPro, 0, 1);
        }
        //   音乐
        //beyond音乐
        if (1200 < scrollPro && scrollPro < 2300) {
            if (!loader.resources.beyond.sound.isPlaying && loader.resources.beyond.sound.flag && musicOn) {
                loader.resources.beyond.sound.volume = 1;
                loader.resources.beyond.sound.play();
                loader.resources.beyond.sound.flag = false;
            }
        } else {
            loader.resources.beyond.sound.flag = true;
        }
        // beyond前渐隐
        if (500 < scrollPro && scrollPro < 1068) {
            if (loader.resources.beyond.sound.isPlaying) {
                loader.resources.beyond.sound.volume = (scrollPro - 500) / (1068 - 500);
            }
        }
        if (80 < scrollPro && scrollPro < 500) {
            loader.resources.beyond.sound.pause();
        }
        // beyond 后渐隐
        if (2300 < scrollPro && scrollPro < 2500) {
            if (loader.resources.beyond.sound.isPlaying) {
                loader.resources.beyond.sound.volume = 1 - (scrollPro - 2200) / (2500 - 2200);
            }
        }
        if (2500 < scrollPro) {
            loader.resources.beyond.sound.pause();
        }
        if (2500 < scrollPro && scrollPro < 2700) {
            if (loader.resources.xiyouji.sound.isPlaying) {
                loader.resources.xiyouji.sound.volume = (scrollPro - 2500) / (2700 - 2500);
            }
        }
        //西游记
        if (2700 < scrollPro && scrollPro < 3400) {
            if (!loader.resources.xiyouji.sound.isPlaying && loader.resources.xiyouji.sound.flag && musicOn) {
                loader.resources.xiyouji.sound.play();
                loader.resources.xiyouji.sound.flag = false;
            }
        } else {
            loader.resources.xiyouji.sound.flag = true;
            loader.resources.xiyouji.sound.pause();
        }
        //小虎队前渐隐
        if (3400 < scrollPro && scrollPro < 3600) {
            if (loader.resources.xiaohudui.sound.isPlaying) {
                loader.resources.xiaohudui.sound.volume = (scrollPro - 3400) / (3600 - 3400);
            }
        }
        //小虎队
        if (3600 < scrollPro && scrollPro < 4400) {
            if (!loader.resources.xiaohudui.sound.isPlaying && loader.resources.xiaohudui.sound.flag && musicOn) {
                loader.resources.xiaohudui.sound.volume = 1;
                loader.resources.xiaohudui.sound.play();
                loader.resources.xiaohudui.sound.flag = false;
            }
        } else {
            loader.resources.xiaohudui.sound.flag = true;
            loader.resources.xiaohudui.sound.pause();
        }
        //小虎队后渐隐
        if (4400 < scrollPro && scrollPro < 4500) {
            if (loader.resources.xiaohudui.sound.isPlaying) {
                loader.resources.xiaohudui.sound.volume = (scrollPro - 4400) / (4500 - 4400);
            }
        }
        // 崔健前渐隐
        if (4500 < scrollPro && scrollPro < 4600) {
            if (loader.resources.cuijian.sound.isPlaying) {
                loader.resources.cuijian.sound.volume = (scrollPro - 4500) / (4600 - 4500);
            }
        }
        //崔健
        if (4600 < scrollPro && scrollPro < 5800) {
            if (!loader.resources.cuijian.sound.isPlaying && loader.resources.beyond.sound.flag && musicOn) {
                loader.resources.cuijian.sound.volume = 1;
                loader.resources.cuijian.sound.play();
                loader.resources.cuijian.sound.flag = false;
            }
        } else {
            loader.resources.cuijian.sound.flag = true;
        }
        // 崔健 后渐隐
        if (5800 < scrollPro && scrollPro < 6000) {
            if (loader.resources.cuijian.sound.isPlaying) {
                loader.resources.cuijian.sound.volume = 1 - (scrollPro - 5800) / (6000 - 5800);
            }
        }
        if (6000 < scrollPro || scrollPro < 4500) {
            loader.resources.cuijian.sound.pause();
        }
        if (scrollPro == scroller.__maxScrollTop) {
            scroller.options.scrollingX = true;
            scroller.options.scrollingY = false;
            //向左滑
            scrollDirection = "left";
            scrollPro = left;
            if (scrollPro > 200) {
                part2Tisi.alpha = 0;
                tisiRight.pause();
            } else {
                part2Tisi.alpha = 1;
                tisiRight.play();
            }
            if (500 < scrollPro && scrollPro < 800) {
                part2Zi1.x = scrollNum(500, 800, scrollPro, 750, 700);
            }
            if (1200 < scrollPro && scrollPro < 1570) {
                part2Zi2.alpha = scrollNum(1200, 1570, scrollPro, 0, 1);
            }
            if (2000 < scrollPro && scrollPro < 2300) {
                part2Zi3.alpha = scrollNum(2000, 2300, scrollPro, 0, 1);
            }
            // if (2000 < scrollPro && scrollPro < 2300) {
            //     part2Zi3.alpha = scrollNum(2000, 2300, scrollPro, 0, 1);
            // }
            if (2600 < scrollPro && scrollPro < 2900) {
                part3Zi4.alpha = scrollNum(2600, 2900, scrollPro, 0, 1);
                part3Zi4.scale.set(scrollNum(2600, 2900, scrollPro, 1.5, 1), scrollNum(2600, 2900, scrollPro, 1.5, 1));
                part3Zi4.x = scrollNum(2600, 2900, scrollPro, -55, 5);
            }
            if (scrollPro == (3740 - lastWidth)) {
                scroller_2();
            }
        }
    }, {
        zooming: true,
        bouncing: false
    });
    touch_scroller();
}
function scrollBegin2() {
    scroller = new Scroller(function (left, top, zoom) {
            scroller.options.scrollingX = false;
            scrollPro = top;
            if (30 < scrollPro && scrollPro < contentL1 - lastHeight) {
                part3.y = scrollNum(30, contentL1 - lastHeight, scrollPro, (7350 - lastHeight), 4257);
            }
            if (scrollPro > 100) {
                part3Xia.alpha = 0;
                tisiXia.pause();
            } else {
                part3Xia.alpha = 1;
                tisiXia.play();
            }
            if (30 < scrollPro && scrollPro < 100) {
                part3Zi5.alpha = scrollNum(30, 100, scrollPro, 0, 1);
            }
            if (30 < scrollPro && scrollPro < 550) {
                part3Chuan.scale.set(scrollNum(30, 550, scrollPro, 0.8, 1.2), scrollNum(30, 550, scrollPro, 0.8, 1.2));
                part3Chuan.x = scrollNum(30, 550, scrollPro, 130, 750);
                part3Chuan.y = scrollNum(30, 550, scrollPro, 52, 745);
            }
            if (550 < scrollPro && scrollPro < 900) {
                part3Chuan.scale.set(scrollNum(550, 900, scrollPro, 1.2, 1.4), scrollNum(550, 900, scrollPro, 1.2, 1.4));
                part3Chuan.x = scrollNum(550, 900, scrollPro, 750, 73);
                part3Chuan.y = scrollNum(550, 900, scrollPro, 745, 1267);
            }

            if (1100 < scrollPro && scrollPro < contentL1 - lastHeight) {
                part4Bg_1.alpha = scrollNum(1100, contentL1 - lastHeight, scrollPro, 0, 1);
                part4Bg_2.alpha = scrollNum(1100, contentL1 - lastHeight, scrollPro, 0, 1);
                part4Heiban.x = scrollNum(1100, contentL1 - lastHeight, scrollPro, 0, -736);
            }

            //音乐
            //澳门
            if (30 < scrollPro && scrollPro < 1300) {
                if (!loader.resources.qizizg.sound.isPlaying && loader.resources.qizizg.sound.flag && musicOn) {
                    loader.resources.qizizg.sound.volume = 1;
                    loader.resources.qizizg.sound.play();
                    loader.resources.qizizg.sound.flag = false;
                }
            } else {
                loader.resources.qizizg.sound.flag = true;
            }
            // 澳门前渐隐
            if (5 < scrollPro && scrollPro < 30) {
                if (loader.resources.qizizg.sound.isPlaying) {
                    loader.resources.qizizg.sound.volume = (scrollPro - 5) / (30 - 5);
                }
            }
            // 澳门 后渐隐
            if (1300 < scrollPro && scrollPro < 1500) {
                if (loader.resources.qizizg.sound.isPlaying) {
                    loader.resources.qizizg.sound.volume = 1 - (scrollPro - 1200) / (1500 - 1200);
                }
            }
            if (1600 < scrollPro) {
                loader.resources.qizizg.sound.pause();
            }
            if (scrollPro == contentL1 - lastHeight) {
                scroller.options.scrollingX = true;
                scroller.options.scrollingY = false;
                scrollPro = left;
                if (10 < scrollPro && scrollPro < contentW1 - lastWidth) {
                    part4.x = scrollNum(10, contentW1 - lastWidth, scrollPro, 3740 - 10, 1760);
                }
                if (10 < scrollPro && scrollPro < 750) {
                    part3.x = scrollNum(10, 750, scrollPro, (3740 - lastWidth), (3740 - lastWidth - 750));
                    part4Baozi2.alpha = scrollNum(215, 750, scrollPro, 0, 1);
                }
                if (750 < scrollPro && scrollPro < 1500) {
                    part4Baozi3.alpha = scrollNum(750, 1200, scrollPro, 0, 1);
                    part4Titlex.alpha = scrollNum(1300, 1500, scrollPro, 0, 1);
                    part4Titled.alpha = scrollNum(1300, 1500, scrollPro, 0, 1);
                    part4Titled.scale.set(scrollNum(1300, 1500, scrollPro, 0, 1), scrollNum(1300, 1500, scrollPro, 0, 1));
                    part4Titled.x = scrollNum(1300, 1500, scrollPro, 970, 806);
                    part4Titled.y = scrollNum(1300, 1500, scrollPro, 724, 630);
                }
                if (1790 < scrollPro && scrollPro < contentW1 - lastWidth) {
                    part4Dnx.alpha = scrollNum(1790, contentW1 - lastWidth, scrollPro, 1, 0);
                    part4Dn.alpha = scrollNum(1790, contentW1 - lastWidth, scrollPro, 0, 1);
                    part4Dn.scale.x = scrollNum(1790, contentW1 - lastWidth, scrollPro, 0.15, 1);
                    part4Dn.scale.y = scrollNum(1790, contentW1 - lastWidth, scrollPro, 0.15, 1);
                    part4Dn.x = scrollNum(1790, contentW1 - lastWidth, scrollPro, 1336, contentW1 - lastWidth - 332.5);
                    part4Dn.y = scrollNum(1790, contentW1 - lastWidth, scrollPro, 819, 121 + 276.5);
                    part4Dn.anchor.set(0.5);
                }
                if (scrollPro == contentW1 - lastWidth) {
                    part4.alpha = 0;
                    part3.alpha = 0;
                    part2.alpha = 0;
                    part1.alpha = 0;
                    part5.alpha = 1;
                    scroller_3();
                }
            }
        }, {
            zooming: true,
            bouncing: false
        }
    );

    touch_scroller();
}
function scrollBegin3() {
    scroller = new Scroller(function (left, top, zoom) {
            scrollPro = top;
            if (scrollPro > 30) {
                tisi5Xia.pause();
                part5Xia.alpha = 0;
            } else {
                tisi5Xia.play();
                part5Xia.alpha = 1;
            }
            if (30 < scrollPro && scrollPro <1759) {
                part4.alpha = scrollNum(30, 300, scrollPro, 1, 0);
                part5.y = scrollNum(30,1759, scrollPro, (7350 - lastHeight), (7350 - lastHeight - (3093 - lastHeight)));
            }
            if (50 < scrollPro && scrollPro < 200) {
                part5Dnpm.alpha = scrollNum(50, 80, scrollPro, 0, 1);
                message1.alpha = scrollNum(80, 90, scrollPro, 0, 1);
                message2.alpha = scrollNum(90, 100, scrollPro, 0, 1);
                message3.alpha = scrollNum(100, 110, scrollPro, 0, 1);
                message4.alpha = scrollNum(110, 120, scrollPro, 0, 1);
                message5.alpha = scrollNum(120, 130, scrollPro, 0, 1);
                message6.alpha = scrollNum(130, 140, scrollPro, 0, 1);
                message7.alpha = scrollNum(140, 150, scrollPro, 0, 1);
                message8.alpha = scrollNum(150, 160, scrollPro, 0, 1);
                part5Zi1.alpha = scrollNum(160, 200, scrollPro, 0, 1);
            }
            if (300 < scrollPro && scrollPro < 500) {
                part5Huoche.x = scrollNum(300, 500, scrollPro, -900, 0);
            }
            if (500 < scrollPro && scrollPro < 700) {
                part5Zi2.alpha = scrollNum(500, 700, scrollPro, 0, 1);
            }
            if (900 < scrollPro && scrollPro < 1200) {
                part5Zi3.alpha = scrollNum(900, 1100, scrollPro, 0, 1);
                part5Gaotiel.alpha = scrollNum(900, 1200, scrollPro, 0, 1);
            }
            if (1400 < scrollPro && scrollPro < 1550) {
                part5Zi4.alpha = scrollNum(1400, 1550, scrollPro, 0, 1);
                part5Feichuan.alpha = scrollNum(1400, 1550, scrollPro, 0, 1);
            }
            if (1550 < scrollPro && scrollPro < 1665) {
                part5Yun.alpha = scrollNum(1550, 1665, scrollPro, 0, 1);
            }
            if (1665 < scrollPro && scrollPro < 3093 - lastHeight + 200) {
                part5Feichuan.y = scrollNum(1665, 3093 - lastHeight + 200, scrollPro, 2357, 2357 - lastHeight);
            }
            if (3093 - lastHeight + 200 < scrollPro && scrollPro < 3093 - lastHeight + 300) {
                // part5.y = scrollNum(3093 - lastHeight + 100, 3093 - lastHeight + 200, scrollPro, (7350 - lastHeight - (3093 - lastHeight)), (7350 - lastHeight - 3093));
            }
            if (scrollPro > 3093 - lastHeight + 200) {
                part6.alpha = 1;
            } else {
                part6.alpha = 0;
            }
            if (2400 < scrollPro && scrollPro < 9093 - lastHeight) {
                part6.y = scrollNum(2400, 9093 - lastHeight, scrollPro, (7350 - lastHeight), (7350 - lastHeight - (6000 - lastHeight)));
            }
            if (2200 < scrollPro && scrollPro < 2300) {
                part6Title.alpha = scrollNum(2200, 2300, scrollPro, 0, 1);
                part6Title.x = scrollNum(2200, 2300, scrollPro, 22, 52);
            }
            if (2300 < scrollPro && scrollPro < 2400) {
                part6Zi1.alpha = scrollNum(2300, 2400, scrollPro, 0, 1);
            }
            if (2400 < scrollPro && scrollPro < 3200) {
                part6Diqiu.x = scrollNum(2400, 3200, scrollPro, 200, 33 + 344.5);
                part6Diqiu.y = scrollNum(2400, 3200, scrollPro, 200, 1525 + 344.5);
                part6Diqiu.rotation += 0.01;
                part6Title.alpha = scrollNum(2400, 2800, scrollPro, 1, 0);
                part6Zi1.alpha = scrollNum(2400, 2800, scrollPro, 1, 0);
                // part6Diqiu1.alpha = scrollNum(3100, 3200, scrollPro, 0, 1);
                // part6Diqiu.alpha = scrollNum(3100, 3200, scrollPro, 1, 0);
            }
            if (3200 < scrollPro && scrollPro < 4800) {
                part6Diqiu.rotation += 0.01;
            }
            if (3300 < scrollPro && scrollPro < 3600) {
                part6WeiXing.x = scrollNum(3300, 3600, scrollPro, -404, 14);
                part6Zi2.alpha = scrollNum(3300, 3600, scrollPro, 0, 1);
            }
            if (3600 < scrollPro && scrollPro < 3800) {
                part6Beijing.alpha = scrollNum(3600, 3800, scrollPro, 0, 1);
            }
            if (4000 < scrollPro && scrollPro < 4200) {
                part6Shouji.alpha = scrollNum(4000, 4200, scrollPro, 0, 1);
            }
            if (4200 < scrollPro && scrollPro < 4300) {
                part6Aoyun.alpha = scrollNum(4200, 4300, scrollPro, 0, 1);
                part6Zi3.alpha = scrollNum(4200, 4300, scrollPro, 0, 1);
            }
            if (4300 < scrollPro && scrollPro < 4500) {
                part6Fuwa.x = scrollNum(4300, 4500, scrollPro, 760, 256);
            }
            if (4700 < scrollPro && scrollPro < 4970) {
                part6Shanghai.x = scrollNum(4700, 4970, scrollPro, -560, 0);
                part6Zi4.alpha = scrollNum(4700, 4970, scrollPro, 0, 1);
            }
            if (5000 < scrollPro && scrollPro < 5400) {
                part6Shanghai.y = scrollNum(5000, 5400, scrollPro, 2826, 2780);
            }
            if (5400 < scrollPro && scrollPro < 5700) {
                part6Tuyouy.alpha = scrollNum(5400, 5700, scrollPro, 0, 1);
            }
            if (5700 < scrollPro && scrollPro < 5900) {
                part6Zi5.alpha = scrollNum(5700, 5900, scrollPro, 0, 1);
            }
            if (6000 < scrollPro && scrollPro < 6100) {
                part6Tianyan.x = scrollNum(6000, 6100, scrollPro, 750, 489);
            }
            if (6500 < scrollPro && scrollPro < 7000) {
                part6Zi6.alpha = scrollNum(6500, 6700, scrollPro, 0, 1);
                part6Chuan.scale.set(scrollNum(6500, 7000, scrollPro, 1, 1.2), scrollNum(6500, 7000, scrollPro, 1, 1.2));
                part6Chuan.x = scrollNum(6500, 7000, scrollPro, -513, 79);
                part6Chuan.y = scrollNum(6500, 7000, scrollPro, 4000, 4770);
            }
            if (7000 < scrollPro && scrollPro < 7400) {
                part6Zi6.y = scrollNum(7000, 7400, scrollPro, 4490, 4690);
            }
            if (7400 < scrollPro && scrollPro < 9093 - lastHeight) {
                part6Gaotie.x = scrollNum(7400, 9093 - lastHeight, scrollPro, 750, -5);
                part6Zi7.alpha = scrollNum(7600, 9093 - lastHeight, scrollPro, 0, 1);
            }
            if (scrollPro > 9093 - lastHeight) {
                part7.alpha = 1;
            } else {
                part7.alpha = 0;
            }
            if (9093 - lastHeight < scrollPro && scrollPro < 9093) {
                part6.y = scrollNum(9093 - lastHeight, 9093, scrollPro, (7350 - lastHeight - (6000 - lastHeight)), (7350 - lastHeight - 6000));
                part7.y = scrollNum(9093 - lastHeight, 9093, scrollPro, 7350, (7350 - lastHeight));
            }
            if (9093 < scrollPro && scrollPro < contentL2 - lastHeight) {
                part7.y = scrollNum(9093, contentL2 - lastHeight, scrollPro, (7350 - lastHeight), (7350 - lastHeight - (1500 + 1206 - lastHeight)));
            }
            if (9300 < scrollPro && scrollPro < 9900) {
                part7Img2.x = scrollNum(9300, 9900, scrollPro, 125 + 79, 125 + 79 + 100);
                part7Img2.y = scrollNum(9300, 9900, scrollPro, 899 + 79, 899 + 79 + 800);
                part7Img2.rotation -= 0.01;
                part7Img2.alpha = scrollNum(9300, 9900, scrollPro, 1, 0);
                part7Img3.x = scrollNum(9300, 9900, scrollPro, 297 + 79, 297 + 79 + 100);
                part7Img3.y = scrollNum(9300, 9900, scrollPro, 899 + 79, 899 + 79 + 800);
                part7Img3.rotation += 0.01;
                part7Img3.alpha = scrollNum(9300, 9900, scrollPro, 1, 0);
                part7Img4.x = scrollNum(9300, 9900, scrollPro, 125 + 79, 125 + 79 + 100);
                part7Img4.y = scrollNum(9300, 9900, scrollPro, 1064 + 79, 1064 + 79 + 800);
                part7Img4.rotation -= 0.01;
                part7Img4.alpha = scrollNum(9300, 9900, scrollPro, 1, 0);
                part7Img5.x = scrollNum(9300, 9900, scrollPro, 297 + 79, 297 + 79 + 100);
                part7Img5.y = scrollNum(9300, 9900, scrollPro, 1064 + 79, 1064 + 79 + 800);
                part7Img5.rotation += 0.01;
                part7Img5.alpha = scrollNum(9300, 9900, scrollPro, 1, 0);
            }
            if (9700 < scrollPro && scrollPro < 9750) {
                part7Yun.alpha = scrollNum(9700, 9750, scrollPro, 0, 1);
                part7Yun.x = scrollNum(9700, 9750, scrollPro, 220, 126);
            }
            if (9750 < scrollPro && scrollPro < 9850) {
                part7Title.alpha = scrollNum(9750, 9850, scrollPro, 0, 1);
                part7Title.width = scrollNum(9750, 9850, scrollPro, 0, 311);
            }
            if (9850 < scrollPro && scrollPro < 9950) {
                part7Hua.alpha = scrollNum(9850, 9950, scrollPro, 0, 1);
            }
            if (9950 < scrollPro && scrollPro < 10150) {
                part7Zi.alpha = scrollNum(9950, 10150, scrollPro, 0, 1);
            }
            if (10150 < scrollPro && scrollPro < 10350) {
                part7Ka.alpha = scrollNum(10150, 10350, scrollPro, 0, 1);
                part7Ka.scale.x = scrollNum(10150, 10350, scrollPro, 2, 1);
                part7Ka.scale.y = scrollNum(10150, 10350, scrollPro, 2, 1);
            }
            // if (10350 < scrollPro && scrollPro < contentL2 - lastHeight - 20) {
            //     part7LiuYanq.alpha = scrollNum(10350, contentL2 - lastHeight - 20, scrollPro, 0, 1);
            // }
            if (scrollPro == contentL2 - lastHeight) {
                part7LiuYanq.alpha = 1;
                scroller.options.scrollingY = false;
                scroller.enabled = false;
                $(".btn").show();
            }
            //    音乐
            //qq
            if (50 < scrollPro && scrollPro < 400) {
                if (!loader.resources.qq.sound.isPlaying && loader.resources.qq.sound.flag && musicOn) {
                    loader.resources.qq.sound.play();
                    loader.resources.qq.sound.flag = false;
                }
            } else {
                loader.resources.qq.sound.flag = true;
                loader.resources.qq.sound.pause();
            }
            //火车
            if (450 < scrollPro && scrollPro < 700) {
                if (!loader.resources.huoche.sound.isPlaying && loader.resources.huoche.sound.flag && musicOn) {
                    loader.resources.huoche.sound.play();
                    loader.resources.huoche.sound.flag = false;
                }
            } else {
                loader.resources.huoche.sound.flag = true;
                loader.resources.huoche.sound.pause();
            }

            //    火箭
            if (1665 < scrollPro && scrollPro < 3093 - lastHeight+200) {
                if (!loader.resources.huojian.sound.isPlaying && loader.resources.huojian.sound.flag && musicOn) {
                    loader.resources.huojian.sound.play();
                    loader.resources.huojian.sound.flag = false;
                }
            } else {
                loader.resources.huojian.sound.flag = true;
                loader.resources.huojian.sound.pause();
            }
            //杨利伟
            if (2200 < scrollPro && scrollPro < 3200) {
                if (!loader.resources.yangliwei.sound.isPlaying && loader.resources.yangliwei.sound.flag && musicOn) {
                    loader.resources.yangliwei.sound.play();
                    loader.resources.yangliwei.sound.flag = false;
                }
            } else {
                loader.resources.yangliwei.sound.flag = true;
                loader.resources.yangliwei.sound.pause();
            }

            if (3200 < scrollPro && scrollPro < 3600) {
                if (loader.resources.yangliwei.sound.isPlaying) {
                    loader.resources.yangliwei.sound.volume = 1 - (scrollPro - 3100) / (3600 - 3100);
                }
            }
            if (3700 < scrollPro) {
                loader.resources.yangliwei.sound.pause();
                // loader.resources.yangliwei.sound.volume = 0;
            }
            //奥运
            if (4000 < scrollPro && scrollPro < 5000) {
                if (!loader.resources.aoyun.sound.isPlaying && loader.resources.aoyun.sound.flag && musicOn) {
                    loader.resources.aoyun.sound.play();
                    loader.resources.aoyun.sound.flag = false;
                }
            } else {
                loader.resources.aoyun.sound.flag = true;
                loader.resources.aoyun.sound.pause();
            }
            if (5000 < scrollPro && scrollPro < 5200) {
                if (loader.resources.aoyun.sound.isPlaying) {
                    loader.resources.aoyun.sound.volume = 1 - (scrollPro - 5000) / (5200 - 5000);
                }
            }
            if (5200 < scrollPro) {
                loader.resources.aoyun.sound.pause();
            }
            //    轮船
            if (6355 < scrollPro && scrollPro < 7300) {
                if (!loader.resources.lunchuan.sound.isPlaying && loader.resources.huojian.sound.flag && musicOn) {
                    loader.resources.lunchuan.sound.volume = 1;
                    loader.resources.lunchuan.sound.play();
                    loader.resources.lunchuan.sound.flag = false;
                }
            } else {
                loader.resources.lunchuan.sound.flag = true;
                loader.resources.lunchuan.sound.pause();
            }
            //    高铁
            if (7400 < scrollPro && scrollPro < 8000) {
                if (!loader.resources.gaotie.sound.isPlaying && loader.resources.huojian.sound.flag && musicOn) {
                    loader.resources.gaotie.sound.play();
                    loader.resources.gaotie.sound.flag = false;
                }
            } else {
                loader.resources.gaotie.sound.flag = true;
                loader.resources.gaotie.sound.pause();
            }

        }, {
            zooming: true,
            bouncing: false
        }
    );

    touch_scroller();
}
function scroller_2() {
    scrollBegin2();
    contentL1 = 3093;
    contentW1 = 750 + 1980;
    scroller.setDimensions(app.view.width, app.view.height, contentW1, contentL1);
    // 设置滚动对象位置（与文档相关）,缩放到事件位置时需要（鼠标滚轮，touchmove)
    // scroller.setPosition(3740 - lastWidth, 7350 - lastHeight);
    // 滚动到一个特定的位置
    // scroller.scrollTo(0, 0, false);
    //按给定的数量滚动
    // scrollerObj.scrollBy(leftOffset, topOffset, animate ? false);
    // 切换滚动条的状态。如果enabled:false，滚动条将不响应任何手势事件。
    // scroller.enabled=false;
}
function scroller_3() {
    scrollBegin3();
    contentL2 = 3093 + 6000 + 1500 + 1206;
    contentW2 = 750;
    scroller.setDimensions(app.view.width, app.view.height, contentW2, contentL2);
    // 滚动到一个特定的位置
    // scroller.scrollTo(0, 0, false);
}
function touch_scroller() {
    var mousedown = false;
    document.addEventListener("touchstart", function (e) {
        scroller.doTouchStart(e.touches, e.timeStamp);
        mousedown = true;
    }, false);
    document.addEventListener("touchmove", function (e) {
        if (!mousedown) {
            return;
        }
        // console.log(e.touches);
        scroller.doTouchMove(e.touches, e.timeStamp);
        mousedown = true;
    }, false);
    document.addEventListener("touchend", function (e) {
        if (!mousedown) {
            return;
        }
        scroller.doTouchEnd(e.timeStamp);
        mousedown = false;
    }, false);
}
// 竖屏
function v() {
    //setTimeout(function(){
    ww = $(window).width();
    wh = $(window).height();
    if (!(typeof scroller == "undefined")) {
        setTimeout(function () {
            lastHeight = wh;
            contentLength = 18540 - 390;
            scroller.setDimensions(app.view.width, app.view.height, app.view.width, contentLength);
            scroller.scrollTo(0, scrollPro, false);
        }, 200);
    }
    //},300);
}

// 区间最小值, 区间最大值, top, 初始位置, 终点, 速度, 方向
function scrollNum(minNum, maxNum, top, start, end) {
    return start + ((top - minNum) / (maxNum - minNum) * (end - start));
}
// 创建sprite对象
function createSprite(name, opt) {
    var newSprite = new PIXI.Sprite.fromImage(name);
    if (opt) {
        _.forIn(opt, function (value, key) {
            newSprite[key] = value;
        });
    }
    return newSprite;
}