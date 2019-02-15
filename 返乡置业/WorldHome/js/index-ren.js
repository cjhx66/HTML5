var url = null;
var file = null;
var im = new ImageMonitor();
var logo_src = "images/logo.png";
var logo = im.createImage(logo_src);
var ewm_src = "images/ewm.png";
var ewm = im.createImage(ewm_src);

var json = localStorage.getItem("info");
var jsonObj = JSON.parse(json);
// var uname = "沉静幻想";
// var icon_src = "images/ewm.png";
var uname = jsonObj.user;
var icon_src = jsonObj.src;
var icon = im.createImage(icon_src);


var wx_h = $(window).height() * 0.05;
var uname_h = $(window).height() * 0.08;
var one_h = $(window).height() * 0.63;
var two_h = $(window).height() * 0.61;
var text_h = $(window).height() * 0.595;
var ewm_h = $(window).height() * 0.575;
var logo_h = $(window).height() * 0.94;
var src_h = $(window).height() * 0.14;
var src_height = $(window).height() * 0.38;
var src_o = src_h + src_height / 2;

$(".start").click(function () {
    $(".music").hide();
    $("#music")[0].pause();
    var w = (window.innerHeight - window.innerWidth) / 2;
    $(".landscape").css("transform", "translate(-" + w + "px, -" + w + "px) rotate(90deg)");
    $("#vidoe").width($(window).height()).height($(window).width());
    lang();
    $(".main").hide();
    $(".landscape").show();
    $("#video")[0].play();
});

$("#video")[0].onended = function () {
    closeVideo();
}
$("#video")[0].onpause = function () {
    closeVideo();
}

function closeVideo() {
    $("#video")[0].pause();
    $(".landscape").css("transform", "translate(0,0) rotate(0deg)");
    $(".landscape").hide();
    $(".main").show();
    $(".resize").show();
}
$("textarea").focus(function () {
    if (iosAndandroid()) {
        var winHeight = $(window).height(); //获取当前页面高度
        var thisHeight = $(this).height();
        if (winHeight - thisHeight > 50) {
            $(".main").height(winHeight);
        }
    }
})
if (!iosAndandroid()) {
    $("textarea").blur(function () {
        var distance = $(document).scrollTop();
        if (distance != 0) {
            document.body.scrollTop = 0;
        }
    })
}

$(".input-upload").change(function (event) {
    var files = this.files;
    if (files && files.length) {
        file = files[0];
        if (/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {
            url = window.URL.createObjectURL(file);
            $(".photo").hide();
            $(".false").attr("src", url).show();
        } else {
            alert("请选择正确的图片格式！")
        }
    }
});

$("#btn").click(function () {
    var src = $("#upload").val();
    if (src == "") {
        alert("请上传图片");
        return false;
    }
    var zi = $(".talk-zi").val();
    if (zi == "") {
        zi = "家是一个充满亲情的地方,无论你在天涯,还是在海角,只有一想到家,就会有一种亲情感回荡在心头"
    }
    $(".btn").hide();
    canvasImg(url, zi, file);
})
$(".anniu").on("click", "img", function () {
    $(".false").hide();
    $(".photo").show();
    $(".btn").show();
    $("#upload").val("");
    $(".talk-zi").val("");
    $("footer").hide();
})

function canvasImg(src, text, file) {
    alert(1);
    var orientation = 0;
    EXIF.getData(file, function () {
        orientation = EXIF.getTag(this, "Orientation")
    });
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    canvas.width = 750;
    canvas.height = $(window).height();

    var imgUrl = new Image;
    imgUrl.src = "images/H5.8.1.jpg";

    imgUrl.onload = function () {
        alert(2);
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        // 背景
        ctx.drawImage(imgUrl, 0, 0, canvas.width, canvas.height);
        ctx.save();

        var srcUrl = new Image;
        srcUrl.src = src;
        srcUrl.setAttribute("crossOrigin", "Anonymous");

        // 头像用户名
        icon.setAttribute("crossOrigin", "Anonymous");
        roundedRect(ctx, 290, wx_h, 66, 66, 20);
        ctx.clip();
        ctx.drawImage(icon, 290, wx_h, 66, 66);
        ctx.restore();
        ctx.font = "normal 38px Da";
        ctx.fillStyle = "#222222";
        ctx.fillText(uname, 372, uname_h);
        ctx.save();

        ctx.drawImage(ewm, 570, ewm_h, ewm.width, ewm.height);
        ctx.save();

        ctx.drawImage(logo, 256, logo_h, logo.width, logo.height);
        ctx.save();
        // 上传图片
        srcUrl.onload = function () {
            alert(3);
            if (orientation == 6) {
                ctx.save();
                ctx.translate(375.5, src_o);
                ctx.rotate(90 * Math.PI / 180);
                roundedRect(ctx,-src_height / 2,-205.5, src_height, 411, 30);
                ctx.clip();
                ctx.drawImage(srcUrl,-src_height / 2,-205.5, src_height, 411);
                ctx.restore();
            } else {
                roundedRect(ctx, 170, src_h, 411, src_height, 30);
                ctx.clip();
                ctx.drawImage(srcUrl, 170, src_h, 411, src_height);
                ctx.restore();
            }

            ctx.save();
            canvas.style.letterSpacing = "2px";
            if (text.length <= 11) {
                ctx.font = "normal 38px Xiao";
                ctx.fillText(text, 87, one_h);
            } else {
                ctx.font = "normal 24px Xiao";
                var width = ctx.measureText(text).width;
                if (width <= 900) {
                    canvasTextAutoLine(text, canvas, 87, two_h, 42)
                } else {
                    canvasTextAutoLine(text, canvas, 87, text_h, 42)
                }
            }
            ctx.save();
            $("#canvas").hide();
            $("footer").show();
            $(".saveX").attr("src", canvas.toDataURL("image/jpeg")).show();
            $(".save").attr("src", canvas.toDataURL("image/jpeg")).show();
        }
    };
}

function iosAndandroid() {
    var u = navigator.userAgent,
        app = navigator.appVersion;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //g
    var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
    if (isAndroid) {
        return true;
    }
    if (isIOS) {
        return false;
    }
}

function lang() {
    window.addEventListener("orientationchange", function () {
        if (window.orientation == "-90" || window.orientation == "90") {
            $(".landscape").css("transform", "translate(0,0) rotate(0deg)");
            var height = window.screen.availWidth - 5;
            $("#vidoe").width($(window).width()).height(height);
        }
    }, false);
}

function canvasTextAutoLine(str, canvas, initX, initY, lineHeight) {
    var ctx = canvas.getContext("2d");
    var lineWidth = 0;
    var lastSubStrIndex = 0;
    for (var i = 0; i < str.length; i++) {
        lineWidth += ctx.measureText(str[i]).width;
        if (lineWidth > 450) {
            ctx.fillText(str.substring(lastSubStrIndex, i), initX, initY);
            initY += lineHeight;
            lineWidth = 0;
            lastSubStrIndex = i;
        }
        if (i == str.length - 1) {
            ctx.fillText(str.substring(lastSubStrIndex, i + 1), initX, initY);
        }
    }
}
// 画圆角矩形
function roundedRect(ctx, x, y, width, height, radius) {
    ctx.strokeStyle = "#fff";
    ctx.beginPath();
    ctx.moveTo(x, y + radius);
    ctx.lineTo(x, y + height - radius);
    ctx.quadraticCurveTo(x, y + height, x + radius, y + height);
    ctx.lineTo(x + width - radius, y + height);
    ctx.quadraticCurveTo(x + width, y + height, x + width, y + height - radius);
    ctx.lineTo(x + width, y + radius);
    ctx.quadraticCurveTo(x + width, y, x + width - radius, y);
    ctx.lineTo(x + radius, y);
    ctx.quadraticCurveTo(x, y, x, y + radius);
    ctx.stroke();
}

CanvasRenderingContext2D.prototype.letterSpacingText = function (text, x, y, letterSpacing) {
    var context = this;
    var canvas = context.canvas;
    if (!letterSpacing && canvas) {
        letterSpacing = parseFloat(window.getComputedStyle(canvas).letterSpacing)
    }
    if (!letterSpacing) {
        return this.fillText(text, x, y)
    }
    var arrText = text.split("");
    var align = context.textAlign || "left";
    var originWidth = context.measureText(text).width;
    var actualWidth = originWidth + letterSpacing * (arrText.length - 1);
    if (align == "center") {
        x = x - actualWidth / 2
    } else {
        if (align == "right") {
            x = x - actualWidth
        }
    }
    context.textAlign = "left";
    arrText.forEach(function (letter) {
        var letterWidth = context.measureText(letter).width;
        context.fillText(letter, x, y);
        x = x + letterWidth + letterSpacing
    });
    context.textAlign = align
};

// function isIphoneX() {
//     return /iphone/gi.test(navigator.userAgent) && (screen.height == 812 && screen.width == 375)
// }

function ImageMonitor() {
    var imgArray = [];
    return {
        createImage: function (src) {
            return typeof imgArray[src] != "undefined" ? imgArray[src] : (imgArray[src] = new Image(), imgArray[src].src = src, imgArray[src])
        },
        loadImage: function (arr, callback) {
            for (var i = 0, l = arr.length; i < l; i++) {
                var img = arr[i];
                imgArray[img] = new Image();
                imgArray[img].onload = function () {
                    if (i == l - 1 && typeof callback == "function") {
                        callback()
                    }
                };
                imgArray[img].src = img
            }
        }
    }
}