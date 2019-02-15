/**
 * Created by yuh on 2017/8/7.
 */
$(function () {
    var mobile = /Android|webOS|iPhone|iPad|BlackBerry/i.test(navigator.userAgent);
    var touchstart = mobile ? "touchstart" : "mousedown";
    var touchend = mobile ? "touchend" : "mouseup";
    var touchmove = mobile ? "touchmove" : "mousemove";
    //阻止屏幕滑动
    $("html,body").on(touchmove, function (e) {
        e.preventDefault();
    });

    TweenMax.set(".horse", {rotationY: 180});
    var sound_1 = $("#music")[0];

    var loadingPath = 'images/';
    var manifest = [
        {src: loadingPath + 'musicicon.png'},
        {src: loadingPath + 'main.jpg'},
        {src: loadingPath + 'hand.png'},
        {src: loadingPath + 'hand-1.png'},
        {src: loadingPath + 'p1-1.jpg'},
        {src: loadingPath + 'p1-2.png'},
        {src: loadingPath + 'p1-3.png'},
        {src: loadingPath + 'p1-4.png'},
        {src: loadingPath + 'p1-5.png'},
        {src: loadingPath + 'p1-logo.png'},
        {src: loadingPath + 'p2-1.jpg'},
        {src: loadingPath + 'p2-2.png'},
        {src: loadingPath + 'p2-3.png'},
        {src: loadingPath + 'p3-1.jpg'},
        {src: loadingPath + 'p3-2.png'},
        {src: loadingPath + 'p3-3.png'},
        {src: loadingPath + 'p4-1.jpg'},
        {src: loadingPath + 'p4-2.png'},
        {src: loadingPath + 'p5-1.jpg'},
        {src: loadingPath + 'p5-2.png'},
        {src: loadingPath + 'p6-1.jpg'},
        {src: loadingPath + 'p6-2.png'},
        {src: loadingPath + 'p6-3.png'},
        {src: loadingPath + 'p6-4.png'},
        {src: loadingPath + 'p6-5.png'},
        {src: loadingPath + 'p6-6.png'},
        {src: loadingPath + 'p6-7.png'},
        {src: loadingPath + 'p6-8.png'},
        {src: loadingPath + 'p6-9.png'},
        {src: loadingPath + 'p6-yu.png'},
        {src: loadingPath + 't1-1.jpg'},
        {src: loadingPath + 't1-2.png'},
        {src: loadingPath + 't1-3.png'},
        {src: loadingPath + 't1-4.png'},
        {src: loadingPath + 't1-5.png'},
        {src: loadingPath + 't1-6.png'},
        {src: loadingPath + 't1-7.png'},
        {src: loadingPath + 't1-logo.png'},
        {src: loadingPath + 't2-1.jpg'},
        {src: loadingPath + 't2-2.png'},
        {src: loadingPath + 't2-3.png'},
        {src: loadingPath + 't2-4.png'},
        {src: loadingPath + 't3-1.jpg'},
        {src: loadingPath + 't3-2.png'},
        {src: loadingPath + 't3-5.png'},
        {src: loadingPath + 't3-4.png'},
        {src: loadingPath + 't3-6.png'},
        {src: loadingPath + 't3-7.png'},
        {src: loadingPath + 't3-logo.png'},
        {src: loadingPath + 't4-1.jpg'},
        {src: loadingPath + 't4.png'},
        {src: loadingPath + 'before.mp3'},
        {src: loadingPath + 'after.mp3'},
    ];

    var quere = new createjs.LoadQueue();
    quere.installPlugin(createjs.Sound);
    quere.on("progress", handleOverallProgress, this);
    quere.on("complete", handleComplete, this);
    quere.loadManifest(manifest);

    //初始化阻止屏幕双击，当有表单页的时候，要关闭阻止事件，否则不能输入文字了，请传入false值，再次运行即可
    initPreventPageDobuleTap(false);

    function handleOverallProgress(event) {
        $(".loadingtxt").text(Math.ceil(event.loaded * 100) + "%");
    }
    // TweenMax.from('.load',2,{delay: 0,x:400,ease:Linear.easeNone,onComplete:function () {
    //
    // }})

    var loadimg=new Horse(".yu",99);
    loadimg.walk();
    TweenMax.from('.yu',2,{delay:.1,ease:Linear.easeNone,onComplete:function () {
        // $(".yu").show(100);
        loadimg.btn();
        loadimg.walk();
    }})
    function handleComplete() {
        $(".loadingtxt").fadeOut(function () {
            $(".T").fadeIn();
        });
        $(".T").on(touchstart, function () {
            sound_1.play();
            $(".T").fadeOut();
            TweenMax.to('.loadimg', 1, {
                delay: .31, onComplete: function () {
                    $(".loading").remove();
                    initPageMotion();
                }
            })
        })
    }

    var motionObj = [];
    for (var i = 1; i < 9; i++) {
        motionObj['animate' + i] = new TimelineMax();
    }
    function initPageMotion() {
        $(".main").fadeIn(500, function () {
            motionObj['animate' + 1].play();
        })

        var AnDelay1 = .2, AnDelay2 = .1, boxDelay = .6;

        motionObj['animate' + 1].from('.p1-2', .01, {delay: AnDelay2, alpha: 0});
        motionObj['animate' + 1].from('.p1-3', .01, {delay: AnDelay2, alpha: 0});
        motionObj['animate' + 1].from('.p1-4', .01, {delay: AnDelay2, alpha: 0});
        motionObj['animate' + 1].from('.p1-5', .01, {delay: AnDelay2, alpha: 0});
        motionObj['animate' + 1].from('.p1-6', .01, {delay: AnDelay2, alpha: 0});
        motionObj['animate'+1].from('.p1-logo',.5,{delay:AnDelay2,alpha:0,y:-50});
        motionObj['animate'+1].pause();

        motionObj['animate'+2].set('.box2',{delay:boxDelay,onStart:function () {
            $(".box2").show();
        }});
        motionObj['animate'+2].from('.p2-2',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+2].from('.p2-3',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+2].from('.p2-logo',.5,{delay:AnDelay1,alpha:0,y:-50});
        motionObj['animate'+2].pause();

        motionObj['animate'+3].set('.box2',{delay:boxDelay,onStart:function () {
            $(".box3").show();
        }});
        motionObj['animate'+3].from('.p3-2',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+3].from('.p3-3',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+3].from('.p3-logo',.5,{delay:AnDelay1,alpha:0,y:-50});
        motionObj['animate'+3].pause();

        motionObj['animate'+4].set('.box4',{delay:boxDelay,onStart:function () {
            $(".box4").show();
        }});
        motionObj['animate'+4].from('.p4-2',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+4].from('.p4-3',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+4].from('.p4-logo',.5,{delay:AnDelay1,alpha:0,y:-50});
        motionObj['animate'+4].pause();

        motionObj['animate'+5].set('.box5',{delay:boxDelay,onStart:function () {
            $('.box5').show()
        }})
        motionObj['animate'+5].from('.p5-2',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+5].from('.p5-3',.01,{delay:AnDelay1,alpha:0});
        motionObj['animate'+5].from('.p5-logo',.5,{delay:AnDelay1,alpha:0,y:-50});
        motionObj['animate'+5].pause();

        motionObj['animate'+6].set('.box6',{delay:boxDelay,onStart:function () {
            $('.box6').show()
        }});
        motionObj['animate'+6].from('.p6-9',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-2',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-3',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-10',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-4',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-5',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-6',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-7',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-8',.01,{delay:AnDelay2,alpha:0});
        motionObj['animate'+6].from('.p6-logo',.5,{delay:AnDelay2,alpha:0,x:-50});
        motionObj['animate'+6].pause();

        motionObj['animate'+7].set('.box7',{delay:boxDelay,onStart:function () {
            $(".box7").show();
            TweenMax.from('.p7-2',2,{x:400,ease:Linear.easeNone,onComplete:function () {
                $(".handSvg").fadeIn();
                $(".box7>p").fadeIn(function () {
                    $(".box7").on(touchstart,function () {
                        sound_1.pause();
                        // sound_1.src='./images/amxz3.mp3';
                        // sound_1.play();
                        horse.btn();
                        horse.walk();
                        TweenMax.to('.p7-2',1,{alpha:0,delay:.5,x:-400,ease:Linear.easeNone,onComplete:function () {
                            setTimeout(function () {
                                location.href='main.html'
                            },1000)
                        }});
                        TweenMax.to('.p7-1',2,{delay:.5,y:-50,alpha:0});
                        $(".box7>p,.handSvg").fadeOut();
                    })
                })
            }});
            var horse=new Horse(".yu",99);
            horse.walk();
        }});
        motionObj['animate'+7].from('.p7-1',.5,{y:-50,alpha:0});
        motionObj['animate'+7].pause();
    }

    // 检测动画播放完 回调 闭包
    for (var i = 1; i < 9; i++) {
        debugger;
        motionObj['animate' + i].eventCallback("onComplete", (function (i) {
            var j = i + 1;
            return function () {
                motionObj['animate' + j].play()
            };
        })(i))
    }

    function initPreventPageDobuleTap(isPreventPageDoubuleTap) {
        if (isPreventPageDoubuleTap) {
            $(".page").on(touchstart, function (e) {
                e.preventDefault();
            })
        } else {
            $(".page").off(touchstart);
        }
    }

//    音乐按钮
    $(".musicicon").on(touchstart, function () {
        if ($(this).hasClass('musicrotate')) {
            sound_1.pause();
            $(this).removeClass("musicrotate");
        } else {
            sound_1.play();
            $(this).addClass("musicrotate");
        }
    })
});