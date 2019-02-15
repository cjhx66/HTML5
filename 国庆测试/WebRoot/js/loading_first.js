/**
 * Created by yuh on 2017/9/18.
 */
var prg = 0;
var timer = 0;
var now = new Date();
var timeout = 5000;
var next = prg;
add([30, 50], [1, 3], 100);
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
        }, 1000)
    })
}
function add(dist, speed, delay, callback) {
//        debugger;
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
//           debugger;
    if (typeof n == "object") {
        var times = n[1] - n[0];
        var offset = n[0];
        return Math.random() * times + offset;
    } else {
        return n;
    }
}
function humanChange() {
//        debugger;
    var loadingPath = 'img/';
    var sq = "sq/";
    var manifest = [
        {src: loadingPath + sq + 'q01cont.png'},
        {src: loadingPath + sq + 'q02cont.png'},
        {src: loadingPath + sq + 'q03cont.png'},
        {src: loadingPath + sq + 'q04cont.png'},
        {src: loadingPath + sq + 'q05cont.png'},
        {src: loadingPath + sq + 'q01dynasty.png'},
        {src: loadingPath + sq + 'q02dynasty.png'},
        {src: loadingPath + sq + 'q03dynasty.png'},
        {src: loadingPath + sq + 'q04dynasty.png'},
        {src: loadingPath + sq + 'q05dynasty.png'},
        {src: loadingPath + sq + 'q01r.png'},
        {src: loadingPath + sq + 'q02r.png'},
        {src: loadingPath + sq + 'q03r.png'},
        {src: loadingPath + sq + 'q04r.png'},
        {src: loadingPath + sq + 'q05r.png'},
    ];
    for (var i = 0; i < manifest.length; i++) {
        C[i] = new Image();
        C[i].src = manifest[i].src;
    }
    add([60, 80], [1, 3], 100);
}
