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
setupManifest();
startPreload();
var manifest, preload;

function setupManifest() {
    manifest = [{
        src: "music/audio.mp3"
    }, {
        src: "css/da.TTF"
    }, {
        src: "images/bg.png"
    }, {
        src: "images/hb-zi1.png"
    }, {
        src: "images/hb-zi2.png"
    }, {
        src: "images/ewm.png"
    }]
}

function startPreload() {
    preload = new createjs.LoadQueue(true);
    preload.on("progress", handleFileProgress);
    preload.on("complete", loadComplete);
    preload.loadManifest(manifest)
}

function handleFileProgress(a) {
    $(".progress").html(parseInt(preload.progress * 100) + "%")
}

function loadComplete(a) {
    $("header").hide();
    $(".main").show();
    swiper()
}

function swiper() {
    $("#music")[0].play();
    $(".music").show();
    $(".resize").show();
    var a = new Swiper(".swiper-container", {
        pagination: ".swiper-pagination",
        paginationClickable: true,
        direction: "vertical",
        onSlideChangeStart: function (b) {
            if (b.activeIndex == 2) {
                $(".fm-t").css({
                    "animation": "show 1.5s 0.6s forwards",
                });
                $(".fm-t").css({
                    "-webkit-animation": "show 1.5s 0.6s forwards",
                });
                $(".ar-t").css({
                    "animation": "show 1.5s 0.6s forwards",
                });
                $(".ar-t").css({
                    "-webkit-animation": "show 1.5s 0.6s forwards",
                });
                $(".hz-t").css({
                    "animation": "show 1.5s 0.6s forwards",
                });
                $(".hz-t").css({
                    "-webkit-animation": "show 1.5s 0.6s forwards",
                });
                $(".py-t").css({
                    "animation": "show 1.5s 0.6s forwards",
                });
                $(".py-t").css({
                    "-webkit-animation": "show 1.5s 0.6s forwards",
                });
                $(".fm").css({
                    "animation": "zoomIn 1s 0.8s forwards",
                });
                $(".fm").css({
                    "-webkit-animation": "zoomIn 1s 0.8s forwards",
                });
                $(".ar").css({
                    "animation": "zoomIn 1s 0.8s forwards",
                });
                $(".ar").css({
                    "-webkit-animation": "zoomIn 1s 0.8s forwards",
                });
                $(".hz").css({
                    "animation": "zoomIn 1s 0.8s forwards",
                });
                $(".hz").css({
                    "-webkit-animation": "zoomIn 1s 0.8s forwards",
                });
                $(".py").css({
                    "animation": "zoomIn 1s 0.8s forwards",
                });
                $(".py").css({
                    "-webkit-animation": "zoomIn 1s 0.8s forwards",
                });
                $(".zdy").css({
                    "animation": "zoomIn 1s 0.8s forwards",
                });
                $(".zdy").css({
                    "-webkit-animation": "zoomIn 1s 0.8s forwards",
                });
                $(".ts").css({
                    "animation": "show 1s 1.2s forwards",
                });
                $(".ts").css({
                    "-webkit-animation": "show 1s 1.2s forwards",
                });
                $("#array").hide()
            } else {
                $("#array").show();
                $(".fm-t").css({
                    "animation": "",
                });
                $(".fm-t").css({
                    "-webkit-animation": "",
                });
                $(".ar-t").css({
                    "animation": "",
                });
                $(".ar-t").css({
                    "-webkit-animation": "",
                });
                $(".hz-t").css({
                    "animation": "",
                });
                $(".hz-t").css({
                    "-webkit-animation": "",
                });
                $(".py-t").css({
                    "animation": "",
                });
                $(".py-t").css({
                    "-webkit-animation": "",
                });
                $(".fm").css({
                    "animation": "",
                });
                $(".fm").css({
                    "-webkit-animation": "",
                });
                $(".ar").css({
                    "animation": "",
                });
                $(".ar").css({
                    "-webkit-animation": "",
                });
                $(".hz").css({
                    "animation": "",
                });
                $(".hz").css({
                    "-webkit-animation": "",
                });
                $(".py").css({
                    "animation": "",
                });
                $(".py").css({
                    "-webkit-animation": "",
                });
                $(".zdy").css({
                    "animation": "",
                });
                $(".zdy").css({
                    "-webkit-animation": "",
                });
                $(".ts").css({
                    "animation": "",
                });
                $(".ts").css({
                    "-webkit-animation": "",
                })
            }
        }
    })
}
$(".click").on("click", ".click-btn", function () {
    if ($(this).index() == 0) {
        $(".fumu").show();
        $(".liuyan").show()
    } else {
        if ($(this).index() == 2) {
            $(".airen").show();
            $(".liuyan").show()
        } else {
            if ($(this).index() == 4) {
                $(".create-hb").show();
                $(".liuyan").hide()
            } else {
                if ($(this).index() == 6) {
                    $(".haizi").show();
                    $(".liuyan").show()
                } else {
                    if ($(this).index() == 8) {
                        $(".pengyou").show();
                        $(".liuyan").show()
                    }
                }
            }
        }
    }
    $(".swiper-container").hide()
});
$("ul").on("click", "li", function () {
    var c = $(".ly1");
    var b = $(".ly2");
    var e = $(this).html();
    var a = e.split("，");
    parent = $(this).parent()[0];
    if ($(this).children("input").is(".zdy-ipt")) {
        $(".edit").show();
        var d = $(this).children("input");
        $(".edit").click(function () {
            if (d.val() !== "") {
                e = d.val();
                if (e.indexOf("，") == -1 && e.length > 12) {
                    a[0] = e.substring(0, 10);
                    a[1] = e.substring(10, e.length - 1)
                } else {
                    a = e.split("，")
                }
                pd(parent, a)
            } else {
                d.focus()
            }
        })
    } else {
        pd(parent, a)
    }
});

function pd(b, a) {
    $(".ly1").html(a[0]);
    $(".ly2").html(a[1]);
    if (a.length == 3) {
        $(".ly1").html(a[0] + "，" + a[1]);
        $(".ly2").html(a[2])
    }
    if (b == $(".fumu")[0]) {
        $(".hb-h").attr("src", "images/fm-h.jpg");
        $(".name").attr("placeholder", "爸爸妈妈:")
    }
    if (b == $(".airen")[0]) {
        $(".hb-h").attr("src", "images/ar-h.jpg");
        $(".name").attr("placeholder", "亲爱的:")
    }
    if (b == $(".haizi")[0]) {
        $(".hb-h").attr("src", "images/hz-h.jpg");
        $(".name").attr("placeholder", "宝贝:")
    }
    if (b == $(".pengyou")[0]) {
        $(".hb-h").attr("src", "images/py-h.jpg");
        $(".name").attr("placeholder", "死党:")
    }
    $(".liuyan").hide();
    $(".create-hb").show();
    $(".zdy-talk").hide();
    $(".talk").show()
}
$(".input-upload").change(function (d) {
    var c = this.files;
    if (c && c.length) {
        var b = c[0];
        if (/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(b.name)) {
            var a = window.URL.createObjectURL(b);
            img(a);
            $("#canvas").show();
            $(".tubiao").show();
            $(".photo").hide();
            $(".hb-h").hide();
            $(".save-1").show();
            $("#upload").val("");
            $("body").css("overflow", "hidden")
        } else {
            alert("请选择正确的图片格式！")
        }
    }
});

function img(a) {
    var e = {
        width: 601,
        height: 752,
        imgSrc: a,
        maxScale: 4,
        minScale: 0.3,
        step: 0.1
    };
    var o = false;
    var f = {
        "scale": 1,
        "rotate": 0
    };
    var c = {};
    var r = {};
    var g = document.getElementById("bigBtn");
    var n = document.getElementById("smallBtn");
    var k = document.getElementById("rightRotate");
    var l = document.getElementById("save");
    var j = document.getElementById("pic");
    var d = document.getElementById("canvas");
    d.width = e.width;
    d.height = e.height;
    var q = d.getContext("2d");
    var h = new Image();
    h.src = e.imgSrc;
    h.onload = function () {
        c = {
            "imgX": -1 * h.width / 2,
            "imgY": -1 * h.height / 2,
            "mouseX": 0,
            "mouseY": 0,
            "translateX": d.width / 2,
            "translateY": d.height / 2,
            "scale": 1,
            "rotate": 0
        };
        p(d.width / 2, d.height / 2)
    };
    g.onclick = function () {
        isScale = false;
        f.scale = (f.scale >= e.maxScale) ? e.maxScale : f.scale + e.step;
        p(d.width / 2, d.height / 2)
    };
    n.onclick = function () {
        f.scale = (f.scale <= e.minScale) ? e.minScale : f.scale - e.step;
        var s = h.width * f.scale / 2;
        var t = h.height * f.scale / 2;
        if (s < d.width / 2 && t < d.height) {
            alert("超过可缩小范围");
            return false
        } else {
            p(d.width / 2, d.height / 2)
        }
    };
    k.onclick = function () {
        var s = parseInt(f.rotate / 90) * 90 + 90;
        f.rotate = s;
        p(d.width / 2, d.height / 2)
    };
    l.onclick = function () {
        j.src = d.toDataURL("image/jpeg");
        $(d).hide();
        $(".tubiao").hide();
        $(".hb-h").show();
        $("body").css("overflow", "initial");
        huoqu()
    };
    d.ontouchstart = function (t) {
        o = true;
        d.style.cursor = "move";
        var s = b(t.changedTouches[0].clientX, t.changedTouches[0].clientY);
        c.mouseX = s.x;
        c.mouseY = s.y
    };
    d.ontouchend = function (s) {
        o = false;
        d.style.cursor = "default"
    };
    d.ontouchmove = function (t) {
        t.preventDefault();
        if (o) {
            var s = b(t.changedTouches[0].clientX, t.changedTouches[0].clientY);
            m(s.x, s.y)
        }
    };

    function p(s, v) {
        var u = c.imgX - (s - c.translateX) / c.scale;
        var t = c.imgY - (v - c.translateY) / c.scale;
        q.clearRect(0, 0, d.width, d.height);
        q.fillStyle = "#F0C4BB";
        q.fillRect(0, 0, d.width, d.height);
        q.save();
        q.translate(s, v);
        q.rotate(f.rotate * Math.PI / 180);
        q.scale(f.scale, f.scale);
        q.drawImage(h, u, t, h.width, h.height);
        q.restore();
        c = {
            "imgX": u,
            "imgY": t,
            "translateX": s,
            "translateY": v,
            "scale": f.scale,
            "rotate": f.rotate
        }
    }

    function m(s, t) {
        c.translateX = c.translateX + (s - c.mouseX);
        c.translateY = c.translateY + (t - c.mouseY);
        q.clearRect(0, 0, d.width, d.height);
        q.fillStyle = "#F0C4BB";
        q.fillRect(0, 0, d.width, d.height);
        q.save();
        q.translate(c.translateX, c.translateY);
        q.rotate(f.rotate * Math.PI / 180);
        q.scale(f.scale, f.scale);
        q.drawImage(h, c.imgX, c.imgY, h.width, h.height);
        q.restore();
        c.mouseX = s;
        c.mouseY = t
    }

    function b(s, u) {
        var t = d.getBoundingClientRect();
        return {
            "x": s - t.left,
            "y": u - t.top
        }
    }
}

function huoqu() {
    var g = $(".hb-h").attr("src");
    var e = $(".name").val();
    var d = $(".ly1").html();
    var c = $(".ly2").html();
    var b = $(".zdy-talk").is(":hidden");
    if (e == "") {
        $(".name").focus();
        return false
    }
    if (!b) {
        var f = $(".talk-zi").val();
        var a = f.split("，");
        if (f !== "") {
            if (f.indexOf("，") == -1) {
                d = f.substring(0, 10);
                c = f.substring(10, f.length - 1)
            } else {
                d = a[0];
                c = a[1];
                if (d.length >= 11) {
                    d = d.substring(0, 10)
                }
                if (c.length >= 11) {
                    c = c.substring(0, 10)
                }
                if (a.length >= 3) {
                    if (a[0].length + a[1].length <= 10) {
                        d = a[0] + a[1];
                        c = a[2]
                    } else {
                        d = a[0];
                        c = a[1] + a[2]
                    }
                }
            }
        } else {
            $(".talk-zi").focus();
            return false
        }
    }
    canvasImg(g, e, d, c)
}

function canvasImg(a, b, d, c) {
    var e = document.getElementById("myCanvas");
    var o = e.getContext("2d");
    e.width = 750;
    e.height = $(window).height();
    var k = e.height * 0.2;
    var j = e.height * 0.055;
    var h = e.height * 0.82;
    var g = e.height * 0.09;
    var l = h - 121;
    var p = new Image;
    var n = d;
    var m = c;
    var f = b;
    p.src = "images/bg.png";
    p.onload = function () {
        o.fillRect(0, 0, e.width, e.height);
        o.drawImage(p, 0, 0, 750, e.height);
        o.beginPath();
        var q = new Image;
        q.src = a;
        q.onload = function () {
            o.drawImage(q, 0, k, e.width, e.height * 0.8);
            o.save();
            var s = new Image();
            var t = new Image();
            var r = new Image();
            s.src = "images/hb-zi1.png";
            t.src = "images/ewm.png";
            r.src = "images/hb-zi2.png";
            s.onload = function () {
                o.drawImage(s, 56, j, s.width, s.height);
                o.save();
                t.onload = function () {
                    o.drawImage(t, 56, h, t.width, t.height);
                    o.save();
                    r.onload = function () {
                        o.drawImage(r, 516, l, r.width, r.height);
                        o.save();
                        o.font = "normal 34px Da";
                        e.style.letterSpacing = "2px";
                        o.fillStyle = "#000000";
                        o.letterSpacingText(f + "：", 405, g);
                        o.beginPath();
                        o.font = "normal 28px Xiao";
                        o.letterSpacingText(n, 405, g + 55);
                        if (m != "") {
                            o.letterSpacingText(m, 405, g + 104)
                        }
                        o.beginPath();
                        $(".canvasImg").attr("src", e.toDataURL("image/jpeg"));
                        $(".create-hb").hide();
                        $(".haibao").show()
                    }
                }
            }
        }
    }
}
CanvasRenderingContext2D.prototype.letterSpacingText = function (j, g, f, h) {
    var b = this;
    var c = b.canvas;
    if (!h && c) {
        h = parseFloat(window.getComputedStyle(c).letterSpacing)
    }
    if (!h) {
        return this.fillText(j, g, f)
    }
    var k = j.split("");
    var e = b.textAlign || "left";
    var d = b.measureText(j).width;
    var a = d + h * (k.length - 1);
    if (e == "center") {
        g = g - a / 2
    } else {
        if (e == "right") {
            g = g - a
        }
    }
    b.textAlign = "left";
    k.forEach(function (l) {
        var m = b.measureText(l).width;
        b.fillText(l, g, f);
        g = g + m + h
    });
    b.textAlign = e
};
$(window).one("touchstart", function () {
    $("#music")[0].play()
});
document.addEventListener("WeixinJSBridgeReady", function () {
    $("#music")[0].play()
}, false);
document.addEventListener("WeixinJSBridgeReady", function () {
    audioAutoPlay("music")
}, false);

function audioAutoPlay(c) {
    var a = document.getElementById(c),
        b = function () {
            a.play();
            document.removeEventListener("touchstart", b, false)
        };
    a.play();
    document.addEventListener("touchstart", b, false)
}
audioAutoPlay("music");
var picture = document.querySelectorAll("img");
for (var i = 0; i < picture.length; i++) {
    picture[i].addEventListener("click", function (a) {
        a.preventDefault()
    })
}
$(".music").on("touchstart", function () {
    if ($(this).hasClass("music-k")) {
        $("#music")[0].pause();
        $(this).removeClass("music-k")
    } else {
        $("#music")[0].play();
        $(this).addClass("music-k")
    }
});
var winHeight = $(window).height();
$(window).resize(function () {
    var a = $(this).height();
    $(".main>div").height(winHeight);
    $(".bg").height(winHeight);
    if (iosAndandroid()) {
        if (winHeight - a > 50) {
            $(".liuyan>ul").css("top", "60%");
            $(".edit").css("bottom", "-52%");
            $(".hb-h").css("top", "-55%");
            $("#canvas").css("top", "-55%");
            $(".upload").hide();
            $(".p2-logo").hide();
            $(".qiu").hide()
        } else {
            $(".liuyan>ul").css("top", "32.17%");
            $(".edit").css("bottom", "20%");
            $(".hb-h").css("top", "5.55%");
            $("#canvas").css("top", "5.55%");
            $(".upload").show();
            $(".p2-logo").show();
            $(".qiu").show()
        }
    }
});

function iosAndandroid() {
    var b = navigator.userAgent,
        d = navigator.appVersion;
    var c = b.indexOf("Android") > -1 || b.indexOf("Linux") > -1;
    var a = !!b.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
    if (c) {
        return true
    }
    if (a) {
        return false
    }
}

function isIphoneX() {
    return /iphone/gi.test(navigator.userAgent) && (screen.height == 812 && screen.width == 375)
}
if (!iosAndandroid()) {
    $("input").blur(function () {
        var a = $(document).scrollTop();
        if (a != 0) {
            document.body.scrollTop = 0
        }
    });
    $("textarea").blur(function () {
        var a = $(document).scrollTop();
        if (a != 0) {
            document.body.scrollTop = 0
        }
    })
};