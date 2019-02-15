/**
 * Created by yuh on 2017/8/8.
 */
$(function () {
    var mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
    var touchstart = mobile ? "touchstart" : "mousedown";
    var touchend = mobile ? "touchend" : "mouseup";
    var touchmove = mobile ? "touchmove" : "mousemove";
    //阻止屏幕滑动
    $('html,body').on(touchmove, function (e) {
        e.preventDefault()
    });

    var motionObj = {};
    var sound_1 = $("#music")[0];
//    定义时间动画
    $(".page>div").each(function (i) {
        motionObj["page" + (i + 1)] = new TimelineMax();
    });

    initPageMotion();

    function initPageMotion() {
        $(".main").fadeIn(100, function () {
            motionObj['page' + 1].play();
        });

        motionObj['page' + 1].add(TweenMax.from('.t1-1', .6, {
            delay: .65, ease: Linear.easeNone, alpha: 0, onStart: function () {
                HorseRun();
            }
        }))
        motionObj['page' + 1].add(TweenMax.staggerFrom('.t1-2,.t1-3,.t1-4,.t1-5,.t1-7,.t1-6', .6, {alpha: 0, y: -30}, .2));
        motionObj['page' + 1].pause();

        motionObj['page' + 2].add(TweenMax.from('.t2-1', .6, {
            delay: .65, ease: Linear.easeNone, alpha: 0, onStart: function () {
                HorseRun();
            }
        }))
        motionObj['page' + 2].add(TweenMax.staggerFrom('.t2-2,.t2-3,.t2-4,.t2-5,.t2-7,.t2-6', .6, {alpha: 0, y: -30}, .2))
        motionObj['page' + 2].pause();

        motionObj['page' + 3].add(TweenMax.from('.t3-1', .6, {
            delay: .65, ease: Linear.easeNone, alpha: 0, onStart: function () {
                HorseRun();
            }
        }))
        motionObj['page' + 3].add(TweenMax.staggerFrom('.t3-2,.t3-3,.t3-4,.t3-5,.t3-7,.t3-6', .6, {alpha: 0, y: -30}, .2))
        motionObj['page' + 3].pause();

        motionObj['page' + 4].add(TweenMax.from('.t4-1', .6, {
            delay: .65, ease: Linear.easeNone, alpha: 0, onStart: function () {}
        }))
        motionObj['page' + 4].add(TweenMax.staggerFrom('.t4-2,.t4-3,.t4-4,.t4-5', .6, {alpha: 0, y: -30}, .2))
        motionObj['page' + 4].pause();
    }

    //阻止屏幕双击以后向上位移
    initPreventPageDobuleTap(false);
    function initPreventPageDobuleTap(isPreventPageDobuleTap) {
        if (isPreventPageDobuleTap) {
            $('.page').on(touchstart, function (e) {
                e.preventDefault();
            })
        } else {
            $('.page').off(touchstart);
        }
    }

//    点击事件
    $(".horse>div").on(touchstart, function () {
        if (allowMove && allowUserMove) {
            if ($(".page>div").eq(1).attr("class") != firstClassName || isLoop) {
                $(".horse>p").fadeOut();
                TweenMax.to('.horse>div', 1, {
                    x: -800,y:100, onComplete: function () {
                        pageMove(-1);
                    }
                })
            }
        }
    });

//    滑动页
    function pageMove(direction) {
        allowMove = false;
        var targetTop = stageH * direction;
        nextPageClassName = $(".page>div").eq(1).attr('class');
        if (direction == 1) {
            $(".page>div:first-of-type").before($(".page>div:last-of-type"));
            TweenMax.set(".page", {top: -targetTop});
            nextPageClassName = $(".page>div").eq(0).attr('class');
            targetTop = 0;
        }
        TweenMax.to('.page', pageMoveTimer, {
            top: targetTop, ease: Expo.easeInOut, onComplete: function () {
                TweenMax.set(".page", {top: 0});
                if (direction == -1) {
                    $(".page").append($(".page>div:first-of-type"));
                }
                allowMove = true;
            }
        })
        motionObj[nextPageClassName].restart();
    }

//滑动事件
    function HorseRun() {
        setTimeout(function () {
            TweenMax.set(".horse>div", {x: 0,y:0});
            TweenMax.to(".horse>div", 1, {
                x: -400,y:30, onComplete: function () {
                    $(".horse>p").fadeIn();
                }
            })
        }, 300)
    }

    var stageH = $(window).height();
    var allowMove = true;
    var allowUserMove = true;
    var firstClassName = $(".page>div:first-of-type").attr('class');
    var finalClassName = $(".page>div:last-of-type").attr("class");

    var nextPageClassName = '';
    var isLoop = true;//页面是否可以循环
    var pageMoveTimer = 0.8;//页面滑动时间
//滑动事件
    var hamertime = new Hammer(document.getElementById('page'), {
        preventDefault: true
    });

    hamertime.on('panmove', function (e) {
        if (allowMove && allowUserMove) {
            if (e.direction == 8) {
                //    向上滑动
                if ($('.page>div').eq(1).attr('class') != firstClassName || isLoop) {
                    if ($(".page>div").eq(1).attr('class') == 'page9') {
                        pageMove(-1);
                    }
                }
            } else if (e.direction == 16) {
                if ($(".page>div:last-of-type").attr("class") != finalClassName) {
                    if ($(".page>div:last-of-type").attr("class").slice(4, 5) < 7) {
                        TweenMax.to(".horse>div", 1, {
                            x: -800, onStart: function () {
                                allowMove = false;
                                $(".horse>p").fadeOut();
                            }, onComplete: function () {
                                pageMove(1);
                            }
                        })
                    }
                }
            } else {
                pageMove(1);
            }
        }
    });
    hamertime.get("pan").set({
        direction: Hammer.DIRECTION_VERTICAL
    });

//音乐按钮
    $('.musicicon').on(touchstart, function () {
        if ($(this).hasClass('musicrotate')) {
            sound_1.pause();
            $(this).removeClass('musicrotate');
        } else {
            sound_1.play();
            $(this).addClass('musicrotate');
        }
    })
})