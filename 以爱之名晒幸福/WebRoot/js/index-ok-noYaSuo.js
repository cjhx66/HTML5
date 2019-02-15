var phoneWidth = parseInt(window.screen.width);
var phoneScale = phoneWidth / 750;
var ua = navigator.userAgent;
if (/Android (\d+\.\d+)/.test(ua)) {
    var version = parseFloat(RegExp.$1);
    if (version > 2.3) {
        document.write('<meta name="viewport" content="width=750, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi,user-scalable=no">');
    } else {
        document.write('<meta name="viewport" content="width=750, target-densitydpi=device-dpi,user-scalable=no">');
    }
} else {
    document.write('<meta name="viewport" content="width=750, target-densitydpi=device-dpi,user-scalable=no">');
}
setupManifest();
startPreload();
var manifest, preload;
function setupManifest() {
    manifest = [
        {src: "music/audio.mp3"},
        {src: "css/da.TTF"},
        {src: "images/bg.png"},
        {src: "images/hb-zi1.png"},
        {src: "images/hb-zi2.png"},
        {src: "images/ewm.png"}]
}
function startPreload() {
    preload = new createjs.LoadQueue(true);
    preload.on("progress", handleFileProgress);
    preload.on("complete", loadComplete);
    preload.loadManifest(manifest)
}
function handleFileProgress(event) {
    $(".progress").html(parseInt(preload.progress * 100) + '%');
}
function loadComplete(event) {
    $("header").hide();
    $(".main").show();
    swiper();
}
function swiper() {
    $("#music")[0].play();
    $(".music").show();
    $(".resize").show();
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        direction: 'vertical',
        onSlideChangeStart: function (swiper) {
            if (swiper.activeIndex == 2) {
                $(".fm-t").css({"animation": "show 1.5s 0.6s forwards",});
                $(".fm-t").css({"-webkit-animation": "show 1.5s 0.6s forwards",});
                $(".ar-t").css({"animation": "show 1.5s 0.6s forwards",});
                $(".ar-t").css({"-webkit-animation": "show 1.5s 0.6s forwards",});
                $(".hz-t").css({"animation": "show 1.5s 0.6s forwards",});
                $(".hz-t").css({"-webkit-animation": "show 1.5s 0.6s forwards",});
                $(".py-t").css({"animation": "show 1.5s 0.6s forwards",});
                $(".py-t").css({"-webkit-animation": "show 1.5s 0.6s forwards",});
                $(".fm").css({"animation": "zoomIn 1s 0.8s forwards",});
                $(".fm").css({"-webkit-animation": "zoomIn 1s 0.8s forwards",});
                $(".ar").css({"animation": "zoomIn 1s 0.8s forwards",});
                $(".ar").css({"-webkit-animation": "zoomIn 1s 0.8s forwards",});
                $(".hz").css({"animation": "zoomIn 1s 0.8s forwards",});
                $(".hz").css({"-webkit-animation": "zoomIn 1s 0.8s forwards",});
                $(".py").css({"animation": "zoomIn 1s 0.8s forwards",});
                $(".py").css({"-webkit-animation": "zoomIn 1s 0.8s forwards",});
                $(".zdy").css({"animation": "zoomIn 1s 0.8s forwards",});
                $(".zdy").css({"-webkit-animation": "zoomIn 1s 0.8s forwards",});
                $(".ts").css({"animation": "show 1s 1.2s forwards",});
                $(".ts").css({"-webkit-animation": "show 1s 1.2s forwards",});
                $("#array").hide();
            } else {
                $("#array").show();
                $(".fm-t").css({"animation": "",});
                $(".fm-t").css({"-webkit-animation": "",});
                $(".ar-t").css({"animation": "",});
                $(".ar-t").css({"-webkit-animation": "",});
                $(".hz-t").css({"animation": "",});
                $(".hz-t").css({"-webkit-animation": "",});
                $(".py-t").css({"animation": "",});
                $(".py-t").css({"-webkit-animation": "",});
                $(".fm").css({"animation": "",});
                $(".fm").css({"-webkit-animation": "",});
                $(".ar").css({"animation": "",});
                $(".ar").css({"-webkit-animation": "",});
                $(".hz").css({"animation": "",});
                $(".hz").css({"-webkit-animation": "",});
                $(".py").css({"animation": "",});
                $(".py").css({"-webkit-animation": "",});
                $(".zdy").css({"animation": "",});
                $(".zdy").css({"-webkit-animation": "",});
                $(".ts").css({"animation": "",});
                $(".ts").css({"-webkit-animation": "",});
            }
        }
    });
}
$(".click").on("click", ".click-btn", function () {
    if ($(this).index() == 0) {
        $(".fumu").show();
        $(".liuyan").show();
    }
    else if ($(this).index() == 2) {
        $(".airen").show();
        $(".liuyan").show();
    }
    else if ($(this).index() == 4) {
        $(".create-hb").show();
        $(".liuyan").hide();
    }
    else if ($(this).index() == 6) {
        $(".haizi").show();
        $(".liuyan").show();
    }
    else if ($(this).index() == 8) {
        $(".pengyou").show();
        $(".liuyan").show();
    }
    $(".swiper-container").hide();
});
$("ul").on("click", "li", function () {
    var ly1 = $(".ly1");
    var ly2 = $(".ly2");
    var talk = $(this).html();
    var arr = talk.split("，");
    parent = $(this).parent()[0];
    if ($(this).children("input").is('.zdy-ipt')) {
        $(".edit").show();
        var ipt = $(this).children("input");
        $(".edit").click(function () {
            if (ipt.val() !== "") {
                talk = ipt.val();
                if (talk.indexOf("，") == -1 && talk.length > 12) {
                    arr[0] = talk.substring(0, 10);
                    arr[1] = talk.substring(10, talk.length - 1);
                } else {
                    arr = talk.split("，");
                }
                pd(parent, arr)
            } else {
                ipt.focus();
            }
        })
    } else {
        pd(parent, arr);
    }
});
function pd(parent, arr) {
    $(".ly1").html(arr[0]);
    $(".ly2").html(arr[1]);
    if (arr.length == 3) {
        $(".ly1").html(arr[0] + "，" + arr[1]);
        $(".ly2").html(arr[2]);
    }
    if (parent == $(".fumu")[0]) {
        $(".hb-h").attr("src", "images/fm-h.jpg");
        $(".name").attr("placeholder", "爸爸妈妈:");
    }
    if (parent == $(".airen")[0]) {
        $(".hb-h").attr("src", "images/ar-h.jpg");
        $(".name").attr("placeholder", "亲爱的:");
    }
    if (parent == $(".haizi")[0]) {
        $(".hb-h").attr("src", "images/hz-h.jpg");
        $(".name").attr("placeholder", "宝贝:");
    }
    if (parent == $(".pengyou")[0]) {
        $(".hb-h").attr("src", "images/py-h.jpg");
        $(".name").attr("placeholder", "死党:");
    }
    $(".liuyan").hide();
    $(".create-hb").show();
    $(".zdy-talk").hide();
    $(".talk").show();
}
$(".talk-1").children("input").focus(function () {
    $(this).bind('input propertychange', function () {
        if ($(this).val().length >= 10) {
            $(this).blur();
            $(".talk-2").children("input").focus();
        }
    });
});
$('.input-upload').change(function (event) {
    var files = this.files;
    if (files && files.length) {
        var file = files[0];
        if (/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {
            var uploadedImageURL = window.URL.createObjectURL(file);
            img(uploadedImageURL);
            $("#canvas").show();
            $(".tubiao").show();
            $(".photo").hide();
            $(".hb-h").hide();
            $(".save-1").show();
            $('#upload').val('');
        } else {
            alert('请选择正确的图片格式！');
        }
    }
});
function img(src) {
    var config = {
        width: 601,
        height: 752,
        imgSrc: src,
        maxScale: 4.0,
        minScale: 0.3,
        step: 0.1
    };
    var isMove = false;
    var imgStatus = {
        'scale': 1.0,
        'rotate': 0
    };
    var lastStatus = {};
    var currentStatus = {};
    var bigBtn = document.getElementById("bigBtn");
    var smallBtn = document.getElementById("smallBtn");
    var rightRotate = document.getElementById("rightRotate");
    var save = document.getElementById("save");
    var pic = document.getElementById("pic");
    var canvas = document.getElementById("canvas");
    canvas.width = config.width;
    canvas.height = config.height;
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = config.imgSrc;

    img.onload = function () {
        lastStatus = {
            "imgX": -1 * img.width / 2,
            "imgY": -1 * img.height / 2,
            'mouseX': 0,
            'mouseY': 0,
            'translateX': canvas.width / 2,
            'translateY': canvas.height / 2,
            'scale': 1.0,
            'rotate': 0
        };
        drawImgByStatus(canvas.width / 2, canvas.height / 2);
    };

    bigBtn.onclick = function () {
        isScale = false;
        imgStatus.scale = (imgStatus.scale >= config.maxScale) ? config.maxScale : imgStatus.scale + config.step;
        drawImgByStatus(canvas.width / 2, canvas.height / 2);
    };

    smallBtn.onclick = function () {
        imgStatus.scale = (imgStatus.scale <= config.minScale) ? config.minScale : imgStatus.scale - config.step;
        var img_w = img.width * imgStatus.scale / 2;
        var img_h = img.height * imgStatus.scale / 2;
        if (img_w < canvas.width / 2 && img_h < canvas.height) {
            alert("超过可缩小范围");
            return false;
        } else {
            drawImgByStatus(canvas.width / 2, canvas.height / 2);
        }
    };
    rightRotate.onclick = function () {
        var rotate = parseInt(imgStatus.rotate / 90) * 90 + 90;
        imgStatus.rotate = rotate;
        drawImgByStatus(canvas.width / 2, canvas.height / 2);
    };
    save.onclick = function () {
        pic.src = canvas.toDataURL('image/jpeg');
        $(canvas).hide();
        $(".tubiao").hide();
        $(".hb-h").show();
        huoqu();
    };
    canvas.ontouchstart = function (e) {
        isMove = true;
        canvas.style.cursor = "move";
        var box = windowToCanvas(e.changedTouches[0].clientX, e.changedTouches[0].clientY);
        lastStatus.mouseX = box.x;
        lastStatus.mouseY = box.y;
    };

    canvas.ontouchend = function (e) {
        isMove = false;
        canvas.style.cursor = "default";
    };

    canvas.ontouchmove = function (e) {
        if (isMove) {
            var box = windowToCanvas(e.changedTouches[0].clientX, e.changedTouches[0].clientY);
            drawImgByMove(box.x, box.y);
        }
    };

    function drawImgByStatus(x, y) {
        var imgX = lastStatus.imgX - (x - lastStatus.translateX) / lastStatus.scale;
        var imgY = lastStatus.imgY - (y - lastStatus.translateY) / lastStatus.scale;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "#F0C4BB";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(imgStatus.rotate * Math.PI / 180);
        ctx.scale(imgStatus.scale, imgStatus.scale);
        ctx.drawImage(img, imgX, imgY, img.width, img.height);
        ctx.restore();
        lastStatus = {
            'imgX': imgX,
            'imgY': imgY,
            'translateX': x,
            'translateY': y,
            'scale': imgStatus.scale,
            'rotate': imgStatus.rotate
        };
    }

    function drawImgByMove(x, y) {
        lastStatus.translateX = lastStatus.translateX + (x - lastStatus.mouseX);
        lastStatus.translateY = lastStatus.translateY + (y - lastStatus.mouseY);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "#F0C4BB";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.save();
        ctx.translate(lastStatus.translateX, lastStatus.translateY);
        ctx.rotate(imgStatus.rotate * Math.PI / 180);
        ctx.scale(imgStatus.scale, imgStatus.scale);
        ctx.drawImage(img, lastStatus.imgX, lastStatus.imgY, img.width, img.height);
        ctx.restore();
        lastStatus.mouseX = x;
        lastStatus.mouseY = y;
    }

    function windowToCanvas(x, y) {
        var box = canvas.getBoundingClientRect();
        return {
            'x': x - box.left,
            'y': y - box.top
        };
    }
}
function huoqu() {
    var hb = $(".hb-h").attr("src");
    var name = $(".name").val();
    var ly1 = $(".ly1").html();
    var ly2 = $(".ly2").html();
    var flag = $('.zdy-talk').is(':hidden');
    if (name == "") {
        $(".name").focus();
        return false;
    }
    if (!flag) {
        ly1 = $(".talk-1").children("input").val();
        ly2 = $(".talk-2").children("input").val();
        if (ly1 == "") {
            $(".talk-1").children("input").focus();
            return false;
        }
    }
    canvasImg(hb, name, ly1, ly2);
}
function canvasImg(src, name, text1, text2) {
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    canvas.width = 750;
    canvas.height = $(window).height();
    var h1 = canvas.height * 0.2;
    var h2 = canvas.height * 0.055;
    var h3 = canvas.height * 0.82;
    var h4 = canvas.height * 0.09;
    var h3_1=h3-121;
    var imgUrl = new Image;
    var write_1 = text1;
    var write_2 = text2;
    var user = name;
    imgUrl.src = "images/bg.png";
    imgUrl.onload = function () {
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(imgUrl, 0, 0, 750, canvas.height);
        ctx.beginPath();
        var wx = new Image;
        wx.src = src;
        wx.onload = function () {
            ctx.drawImage(wx, 0, h1, canvas.width, canvas.height * 0.8);
            ctx.save();
            var zi1 = new Image();
            var ewm = new Image();
            var zi2 = new Image();
            zi1.src = "images/hb-zi1.png";
            ewm.src = "images/ewm.png";
            zi2.src = "images/hb-zi2.png";
            zi1.onload = function () {
                ctx.drawImage(zi1, 56, h2, zi1.width, zi1.height);
                ctx.save();
                ewm.onload = function () {
                    ctx.drawImage(ewm, 56, h3, ewm.width, ewm.height);
                    ctx.save();
                    zi2.onload = function () {
                        ctx.drawImage(zi2,516,h3_1, zi2.width, zi2.height);
                        ctx.save();
                        ctx.font = "normal 34px Da";
                        canvas.style.letterSpacing = '2px';
                        ctx.fillStyle = "#000000";
                        ctx.letterSpacingText(user + "：", 405, h4);
                        ctx.beginPath();
                        ctx.font = "normal 28px Xiao";
                        ctx.letterSpacingText(write_1, 405, h4 + 55);
                        if (write_2 != "") {
                            ctx.letterSpacingText(write_2, 405, h4 + 104);
                        }
                        ctx.beginPath();
                        $(".canvasImg").attr("src", canvas.toDataURL('image/jpeg'));
                        $(".create-hb").hide();
                        $(".haibao").show();
                    };
                };
            };
        };
    };
}
/**
 * @author zhangxinxu(.com)
 * @licence MIT
 * @description http://www.zhangxinxu.com/wordpress/?p=7362
 */
CanvasRenderingContext2D.prototype.letterSpacingText = function (text, x, y, letterSpacing) {
    var context = this;
    var canvas = context.canvas;
    if (!letterSpacing && canvas) {
        letterSpacing = parseFloat(window.getComputedStyle(canvas).letterSpacing);
    }
    if (!letterSpacing) {
        return this.fillText(text, x, y);
    }
    var arrText = text.split('');
    var align = context.textAlign || 'left';
    var originWidth = context.measureText(text).width;
    var actualWidth = originWidth + letterSpacing * (arrText.length - 1);
    if (align == 'center') {
        x = x - actualWidth / 2;
    } else if (align == 'right') {
        x = x - actualWidth;
    }
    context.textAlign = 'left';
    arrText.forEach(function (letter) {
        var letterWidth = context.measureText(letter).width;
        context.fillText(letter, x, y);
        x = x + letterWidth + letterSpacing;
    });
    context.textAlign = align;
};
$(window).one('touchstart', function () {
    $("#music")[0].play();
});
document.addEventListener("WeixinJSBridgeReady", function () {
    $("#music")[0].play();
}, false);
document.addEventListener("WeixinJSBridgeReady", function () {
    audioAutoPlay('music');//给个全局函数
}, false);
function audioAutoPlay(id) {//全局控制播放函数
    var audio = document.getElementById(id),
        play = function () {
            audio.play();
            document.removeEventListener("touchstart", play, false);
        };
    audio.play();
    document.addEventListener("touchstart", play, false);
}
audioAutoPlay("music");
var picture = document.querySelectorAll("img");
for (var i = 0; i < picture.length; i++) {
    picture[i].addEventListener('click', function (e) {
        e.preventDefault();
    });
}
$(".music").on("touchstart", function () {
    if ($(this).hasClass('music-k')) {
        $("#music")[0].pause();
        $(this).removeClass("music-k");
    } else {
        $("#music")[0].play();
        $(this).addClass("music-k");
    }
});
var winHeight = $(window).height();   //获取当前页面高度
$(window).resize(function () {
    var thisHeight = $(this).height();
    $(".main>div").height(winHeight);
    $(".bg").height(winHeight);
    if (iosAndandroid()) {
        if (winHeight - thisHeight > 50) {
            //当软键盘弹出，在这里面操作
            $(".liuyan>ul").css("top", "60%");
            $(".edit").css("bottom", "-52%");
            $(".hb-h").css("top", "-55%");
            $("#canvas").css("top", "-55%");
            $(".upload").hide();
            $(".p2-logo").hide();
            $(".qiu").hide();
        } else {
            //当软键盘收起，在此处操作
            $(".liuyan>ul").css("top", "32.17%");
            $(".edit").css("bottom", "20%");
            $(".hb-h").css("top", "5.55%");
            $("#canvas").css("top", "5.55%");
            $(".upload").show();
            $(".p2-logo").show();
            $(".qiu").show();
        }
    }
});
function iosAndandroid() {
    var u = navigator.userAgent, app = navigator.appVersion;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //g
    var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
    if (isAndroid) {
        return true;
    }
    if (isIOS) {
        return false;
    }
}
if (!iosAndandroid()) {
    $("input").blur(function () {
        var distance = $(document).scrollTop();
        if (distance != 0) {
            document.body.scrollTop = 0;
        }
    })
}