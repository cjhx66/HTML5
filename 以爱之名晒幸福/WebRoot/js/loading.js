var phoneWidth = parseInt(window.screen.width);
var phoneScale = phoneWidth / 750;
var ua = navigator.userAgent;
if (/Android (\d+\.\d+)/.test(ua)) {
    var version = parseFloat(RegExp.$1);
    if (version > 2.3) {
        document.write('<meta name="viewport" content="width=750, minimum-scale = ' + phoneScale + ", maximum-scale = " + phoneScale + ', target-densitydpi=device-dpi,user-scalable=no">')
    } else {
        document.write('<meta name="viewport" content="width=750, target-densitydpi=device-dpi,user-scalable=no">')
    }
} else {
    document.write('<meta name="viewport" content="width=750, target-densitydpi=device-dpi,user-scalable=no">')
}
var prg = 0;
var timer = 0;
var now = new Date();
var timeout = 100;
var next = prg;
add([30, 60], [1, 3], 100);
var C = new Array();
humanChange();
window.onload = function () {
    complete()
};
if (now - loadingStartTime > timeout) {
    complete()
}
function complete() {
    progress(100, [1, 5], 10, function () {
        window.setTimeout(function () {
            $("header").hide();
            $(".main").show();
            swiper()
        }, 300)
    })
}
function add(dist, speed, delay, callback) {
    var _dist = random(dist);
    if (next + _dist > 100) {
        next = 100
    } else {
        next += _dist
    }
    progress(next, speed, delay, callback)
}
function progress(dist, speed, delay, callback) {
    var _dist = random(dist);
    var _delay = random(delay);
    var _speed = random(speed);
    window.clearInterval(timer);
    timer = window.setTimeout(function () {
        if (prg + _speed >= _dist) {
            window.clearInterval(timer);
            prg = _dist;
            callback && callback()
        } else {
            prg += _speed;
            progress(_dist, speed, delay, callback)
        }
        $(".progress").html(parseInt(prg) + "%")
    }, _delay)
}
function random(n) {
    if (typeof n == "object") {
        var times = n[1] - n[0];
        var offset = n[0];
        return Math.random() * times + offset
    } else {
        return n
    }
}
function humanChange() {
    var loadingPath = "images/";
    var manifest = [{src: "music/audio.mp3"}, {src: loadingPath + "bg.png"}, {src: loadingPath + "hb-zi1.png"}, {src: loadingPath + "hb-zi2.png"}, {src: loadingPath + "ewm.png"}];
    for (var i = 0; i < manifest.length; i++) {
        C[i] = new Image();
        C[i].src = manifest[i].src
    }
    add([70, 80], [1, 3], 100)
};