function init(user) {
    var url = null;
    var file = null;
    var im = new ImageMonitor();
    var ewm_src = "images/ewm.png";
    var ewm = im.createImage(ewm_src);
    var uname = user;
    var icon_src = "images/cs.jpeg";
    var icon = im.createImage(icon_src);

    $(".start").click(function () {
        $(".music").hide();
        $("#music")[0].pause();
        var w = (window.innerHeight - window.innerWidth) / 2;
        $(".landscape").css("transform", "translate(-" + w + "px, -" + w + "px) rotate(90deg)");
        $("#vidoe").width($(window).height()).height($(window).width());
        if ($(window).height() > 1334) {
            $("#video").css("margin-left", ($(window).height() - 1334) / 2)
        }
        lang();
        $(".main").hide();
        $(".landscape").show();
        $("#video")[0].play()
    });
    $("#video")[0].onended = function () {
        closeVideo()
    };
    $("#video")[0].onpause = function () {
        if (iosAndandroid()) {
            closeVideo()
        }
    };
    $(".close").click(function(){
        closeVideo();
    })
    function closeVideo() {
        $("#video")[0].pause();
        $(".landscape").css("transform", "translate(0,0) rotate(0deg)");
        $(".landscape").hide();
        $(".music").show();
        $("#music")[0].play();
        $(".main").show();
        $(".resize").show()
    }
    $("textarea").focus(function () {
        if (iosAndandroid()) {
            var winHeight = $(window).height();
            var thisHeight = $(this).height();
            if (winHeight - thisHeight > 50) {
                $(".main").height(winHeight)
            }
        }
    });
    if (!iosAndandroid()) {
        $("textarea").blur(function () {
            var distance = $(document).scrollTop();
            if (distance != 0) {
                document.body.scrollTop = 0
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
                $(".false").attr("src", url).show()
            } else {
                alert("请选择正确的图片格式！")
            }
        }
    });
    $("#btn").click(function () {
        var src = $("#upload").val();
        if (src == "") {
            alert("请上传图片");
            return false
        }
        var zi = $(".talk-zi").val();
        if (zi == "") {
            zi = "家是一个充满亲情的地方,无论你在天涯,还是在海角,只有一想到家,就会有一种亲情感回荡在心头"
        }
        $(".btn").hide();
        $("footer").show();
        canvasImg(url, zi, file)
    });
    $(".anniu").on("click", "img", function () {
        $(".false").hide();
        $(".photo").show();
        $(".btn").show();
        $("#upload").val("");
        $(".talk-zi").val("");
        $("footer").hide()
    });

    function canvasImg(src, text, file) {
        var orientation = 0;
        EXIF.getData(file, function () {
            orientation = EXIF.getTag(this, "Orientation")
        });
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        canvas.width = 750;
        canvas.height = $(window).height();
        var imgUrl = new Image;
        imgUrl.src = "images/haibao.jpg";
        imgUrl.onload = function () {
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(imgUrl, 0, 0, canvas.width, canvas.height);
            ctx.save();
            var wx_h = canvas.height * 0.045;
            var uname_h = canvas.height * 0.08;

            var one_h = canvas.height * 0.67;
            var one_h1 = canvas.height * 0.66;
            var two_h = canvas.height * 0.645;
            var text_h = canvas.height * 0.625;
            var ewm_h = canvas.height * 0.82;
            var src_h = canvas.height * 0.12;
            var src_height = canvas.height * 0.425;
            var src_o = src_h + src_height / 2;
            var srcUrl = new Image;
            srcUrl.src = src;
            srcUrl.setAttribute("crossOrigin", "Anonymous");

            ctx.font = "normal 38px Da";
            ctx.fillStyle = "#222222";
            var zi_w = ctx.measureText(uname).width;

            var i_w = Math.floor((canvas.width - zi_w - 80) / 2);
            ctx.fillText(uname,i_w+80, uname_h);

            icon.setAttribute("crossOrigin", "Anonymous");
            roundedRect(ctx,i_w, wx_h, 66, 66, 15);
            ctx.clip();
            ctx.drawImage(icon,i_w, wx_h, 66, 66);
            ctx.restore();


            ctx.save();
            ctx.drawImage(ewm, 234, ewm_h, ewm.width, ewm.height);
            ctx.save();
            srcUrl.onload = function () {
                if (orientation == 6) {
                    ctx.save();
                    ctx.translate(375.5, src_o);
                    ctx.rotate(90 * Math.PI / 180);
                    roundedRect(ctx, -src_height / 2, -205.5, src_height, 411, 40);
                    ctx.clip();
                    ctx.drawImage(srcUrl, -src_height / 2, -205.5, src_height, 411);
                    ctx.restore()
                } else {
                    roundedRect(ctx, 170, src_h, 411, src_height, 40);
                    ctx.clip();
                    ctx.drawImage(srcUrl, 170, src_h, 411, src_height);
                    ctx.restore()
                }
                ctx.save();
                canvas.style.letterSpacing = "2px";
                if (text.length <= 11) {
                    ctx.font = "normal 50px Xiao";
                    ctx.fillText(text, 90, one_h)
                } else {
                    ctx.font = "normal 28px Xiao";
                    var width = ctx.measureText(text).width;
                    if (width <= 560) {
                        canvasTextAutoLine(text, canvas, 90, one_h1, 42)
                    } else {
                        if (width <= 1120) {
                            canvasTextAutoLine(text, canvas, 90, two_h, 42)
                        } else {
                            canvasTextAutoLine(text, canvas, 90, text_h, 42)
                        }
                    }
                }
                ctx.save();
                $("#canvas").hide();
                $(".save").attr("src", canvas.toDataURL("image/jpeg")).show()
            }
        }
    }

    function iosAndandroid() {
        var u = navigator.userAgent,
            app = navigator.appVersion;
        var isAndroid = u.indexOf("Android") > -1 || u.indexOf("Linux") > -1;
        var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
        if (isAndroid) {
            return true
        }
        if (isIOS) {
            return false
        }
    }

    function lang() {
        window.addEventListener("orientationchange", function () {
            if (window.orientation == "-90" || window.orientation == "90") {
                $(".landscape").css("transform", "translate(0,0) rotate(0deg)");
                var height = window.screen.availWidth - 5;
                $("#vidoe").width($(window).width()).height(height)
            }
        }, false)
    }

    function canvasTextAutoLine(str, canvas, initX, initY, lineHeight) {
        var ctx = canvas.getContext("2d");
        var lineWidth = 0;
        var lastSubStrIndex = 0;
        for (var i = 0; i < str.length; i++) {
            lineWidth += ctx.measureText(str[i]).width;
            if (lineWidth > 560) {
                ctx.fillText(str.substring(lastSubStrIndex, i), initX, initY);
                initY += lineHeight;
                lineWidth = 0;
                lastSubStrIndex = i
            }
            if (i == str.length - 1) {
                ctx.fillText(str.substring(lastSubStrIndex, i + 1), initX, initY)
            }
        }
    }

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
        ctx.stroke()
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
};