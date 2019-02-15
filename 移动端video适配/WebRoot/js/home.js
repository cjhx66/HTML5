"use strict";

$(function () {
    orientNotice();
    canvas.init();
    //onorientationchange：html5屏幕旋转事件
    window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
        setTimeout(orientNotice, 200);
        console.log($(window).width() + " " + $(window).height());
    });
})


function checkDirect() {
    if (document.documentElement.clientHeight >= document.documentElement.clientWidth) {
        return "portrait";
    } else {
        return "landscape";
    }
}

function orientNotice() {
    var orient = checkDirect();
    console.log(orient);
    if (orient === "landscape") {
        document.getElementById("orientLayer").style.display = "block";
        $('.page').hide()
    } else {
        document.getElementById("orientLayer").style.display = "none";
        $('.page').show()
    }
}

var canvas = (function () {
    var myScroll;
    var maxh = 24940 - $(window).height();
    var maxh_btn = -500;
    return {
        init: function () {

            $(window).on('touchmove.prevent', function (e) {
                e.preventDefault();
            });

            var loader = new PxLoader();
            loader.addImage('//s3b.pstatp.com/toutiao/xigua_activity/image/xigua_hanmai/lbg.jpg');
            loader.addImage('//s3b.pstatp.com/toutiao/xigua_activity/image/xigua_hanmai/zp_tips.jpg');
            loader.addImage('//s3b.pstatp.com/toutiao/xigua_activity/image/xigua_hanmai/jz_all.png');
            for (var i = 1; i <= 6; i++) {
                var pxImage = new PxLoaderImage('//s3b.pstatp.com/toutiao/xigua_activity/image/xigua_hanmai/' + i + 's.jpg');
                loader.add(pxImage);
            }

            $('.govideo').on('click', function () {
                $('#wrapper').hide();
                $('.video').show();
                $('.video').css('opacity', '1')
                $('#tsz_vdDom')[0].play();
                setvideo($('#tsz_vdDom')[0])
            })

            loader.addCompletionListener(function () {

                $('.prestart,.dj_txt').delay(500).fadeIn();
                for (var i = 1; i <= 6; i++) {
                    $('#scroller').append('<img src="//s3b.pstatp.com/toutiao/xigua_activity/image/xigua_hanmai/' + i + 's.jpg" width="100%"/>')
                }


            });

            loader.addProgressListener(function (e) {
                var num = 715 / 9 * e.completedCount
                $('.ld_txt').animate({
                    width: num + 'px'
                }, 10)
            });

            loader.start();

            $('.jz_l,.jz_r').on('click', function () {
                $('.ld_txt,.dj_txt,.logo').hide();
                $('.jz_l img').show();

                $('.jz_r img').animate({
                    top: '-180px'
                }, 3000)
                $('.prestart').addClass('setjzani');
                $('.ldbg').addClass('setldani')

                $('#tsz_vdDom')[0].play();
                setvideo($('#tsz_vdDom')[0])

                setTimeout(function () {
                    $('.video').show();
                    $('.video').css('opacity', 1);
                }, 3000)
            })


        }

    };


    function setvideo(videoIndex) {

        var videotime;
        setTimeout(function () {
            $('.loading').remove();
        }, 3000)
        var timer = setInterval(function () {

            if (videoIndex.currentTime >= 10) {
                $('.p_content').show()
            }

            if (videoIndex.currentTime >= videoIndex.duration - 0.5) {

                setTimeout(function () {
                    $('.video').hide();
                    $('.video').css('opacity', '0')
                    $('#wrapper').fadeIn()
                    imghammer()
                    setDeviceMotion();
                }, 500)

                videotime = setTimeout(function () {
                    clearInterval(timer)
                    videoIndex.pause();
                    videoIndex.currentTime = 0;

                }, 4500)
            }
        }, 500)

        $('.pass').on('click', function () {
            clearInterval(timer)
            videoIndex.pause();
            videoIndex.currentTime = 0;
            $('.video').hide();
            $('.video').css('opacity', '0')
            $('#wrapper').fadeIn()
            imghammer()
            setDeviceMotion();
        })
    }

    function imghammer() {
        var last_posY, posY = Math.floor($('#scroller').css('transform').split(',')[5].split(')')[0]);
        var myElement = document.getElementById("wrapper");
        var mc = new Hammer.Manager(myElement);
        mc.add(new Hammer.Pan({threshold: 0, pointers: 0}));
        mc.on("panstart panmove panend", function (ev) {
            if (ev.type == 'panstart') {
                posY = Math.floor($('#scroller').css('transform').split(',')[5].split(')')[0])
                window.removeEventListener('devicemotion', deviceMotionHandler, false);
            }
            if (ev.type == 'panmove') {
                last_posY = posY;
                posY = last_posY + ev.deltaY / 5;
                if (posY >= 0) {
                    posY = 0;
                    $('.l_icon').hide()
                } else {
                    $('.l_icon').fadeIn()
                }
                if (posY <= maxh_btn) {
                    $('.end').fadeIn()
                }

                if (posY <= -maxh) {
                    posY = -maxh;
                    $('.r_icon').hide()
                } else {
                    $('.r_icon').fadeIn()
                }
                document.getElementById("scroller").style.webkitTransform = "translate(0px," + posY + "px)";
            }
            if (ev.type == 'panend') {
                window.addEventListener('devicemotion', deviceMotionHandler, false);
            }
        });
    }


    function setDeviceMotion() {

        if (window.DeviceMotionEvent) {
            window.addEventListener('devicemotion', deviceMotionHandler, false);
        } else {
            alert('亲，你的浏览器不支持DeviceMotionEvent哦~');
        }
    }

    function deviceMotionHandler(eventData) {
        var acceleration = eventData.accelerationIncludingGravity;
        var tiltLR = Math.round(((acceleration.y) / 9.81) * -90);
        var ry = Math.floor($('#scroller').css('transform').split(',')[5].split(')')[0]);
        if (ry == 0) {
            $('.l_icon').hide()
        } else {
            $('.l_icon').fadeIn()
        }
        if (ry == -maxh) {
            $('.r_icon').hide()
        } else {
            $('.r_icon').fadeIn()
        }
        if (tiltLR > 5 && ry < 0) {
            var Rlength = Math.floor(Math.floor(tiltLR / 10) + ry);
            if (Rlength >= 0) {
                Rlength = 0;

            }
            document.getElementById("scroller").style.webkitTransform = "translate(0px," + Rlength + "px)"
        }
        if (ry <= maxh_btn) {
            $('.end').fadeIn()
        }
        if (tiltLR < -5 && ry > -maxh) {
            var Rlength = Math.floor(tiltLR / 10 + ry);
            if (Rlength <= -maxh) {
                Rlength = -maxh;

            }
            document.getElementById("scroller").style.webkitTransform = "translate(0px," + Rlength + "px)";
        }


    }

})();