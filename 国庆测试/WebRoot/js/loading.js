/**
 * Created by yuh on 2017/9/18.
 */
var prg = 0;
var timer = 0;
var now = new Date();
var timeout = 5000;
var next = prg;
add([30, 60], [1, 3], 100);
var C = new Array();
humanChange();
window.onload = function () {
    complete();
};
if (now - loadingStartTime > timeout) {//超时
    complete();
}
//       最后完成函数
function complete() {
    progress(100, [1, 5], 10, function () {
        window.setTimeout(function () {
            $(".loading").hide();
            $(".main").show();
            // setTimeout(function () {
            //     $(".first").removeClass("active");
            //     $(".start").addClass("active");
            // }, 4000);
        }, 800)
    });
}
function add(dist, speed, delay, callback) {
    var _dist = random(dist);
    if (next + _dist > 100) {
        next = 100;
    } else {
        next += _dist;
    }
    progress(next, speed, delay, callback);
}

// dist:距离 delay:间隔,speed:速度
function progress(dist, speed, delay, callback) {
    var _dist = random(dist);
    var _delay = random(delay);
    var _speed = random(speed);
    window.clearInterval(timer);
    timer = window.setTimeout(function () {
        if (prg + _speed >= _dist) {
            window.clearInterval(timer);
            prg = _dist;
            callback && callback();
        } else {
            prg += _speed;
            progress(_dist, speed, delay, callback);
        }
        $(".progress").html(parseInt(prg) + "%");
//               console.log(prg);
    }, _delay)
}
function random(n) {
    if (typeof n == "object") {
        var times = n[1] - n[0];
        var offset = n[0];
        return Math.random() * times + offset;
    } else {
        return n;
    }
}
function humanChange() {
    var loadingPath = 'img/';
    var manifest = [
        {src: loadingPath + 'X-Ray Dog - At First Glance.mp3'},
        {src: loadingPath + 'home_font.png'},
        {src: loadingPath + 'home_guang.png'},
        {src: loadingPath + 'sun.png'},
        {src: loadingPath + '2_1.png'},
        {src: loadingPath + '2_2.png'},
        {src: loadingPath + '2_3.png'},
        {src: loadingPath + '2_4.png'},
        {src: loadingPath + '2_5.png'},
        {src: loadingPath + '2_6.png'},
        {src: loadingPath + 'btn_ok.png'},
        {src: loadingPath + 'btn_no.png'},
        {src: loadingPath + '2_hand.png'},
        {src: loadingPath + '2_tishi.png'},
        {src: loadingPath + '3_huo1.png'},
        {src: loadingPath + '3_huo2.png'},
        {src: loadingPath + '4_font.png'},
        {src: loadingPath + '4_ku.png'},
        {src: loadingPath + '4_xiao.png'},
        {src: loadingPath + '5_font.png'},
        {src: loadingPath + '6_child.png'},
        {src: loadingPath + '6_parent.png'},
        {src: loadingPath + '7_font.png'},
        {src: loadingPath + '8_font.png'},
        {src: loadingPath + '8_hand.png'},
        {src: loadingPath + 'bg2.png'},
        {src: loadingPath + 'bg3.png'},
        {src: loadingPath + 'bg4.png'},
        {src: loadingPath + 'bg5.png'},
        {src: loadingPath + 'bg6.png'},
        {src: loadingPath + 'bg7_gy.png'},
        {src: loadingPath + 'bg7_mei.png'},
        {src: loadingPath + 'bg8.png'},
        {src: loadingPath + 'bg8_1.png'},
        {src: loadingPath + 'bottom_duche.png'},
        {src: loadingPath + 'bottom_huili.png'},
        {src: loadingPath + 'bottom_lvyou.png'},
        {src: loadingPath + 'bottom_no.png'},
        {src: loadingPath + 'bottom_tuanyuan.png'},
        {src: loadingPath + 'bottom_zaijia.png'},
        {src: loadingPath + 'guang-2.png'},
        {src: loadingPath + 'tan_btn.png'},
        {src: loadingPath + 'tan_duche.png'},
        {src: loadingPath + 'tan_huili.png'},
        {src: loadingPath + 'tan_jiaban.png'},
        {src: loadingPath + 'tan_lvyou.png'},
        {src: loadingPath + 'tan_no.png'},
        {src: loadingPath + 'tan_tuanyuan.png'},
        {src: loadingPath + 'tan_zaijia.png'},
        {src: loadingPath + 'zaiceyichi.png'},
        {src: loadingPath + 'fenxiang.png'},
    ];
    for (var i = 0; i < manifest.length; i++) {
        C[i] = new Image();
        C[i].src = manifest[i].src;
    }
    add([70, 80], [1, 3], 100);
}
