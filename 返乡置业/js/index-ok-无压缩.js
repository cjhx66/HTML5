function init() {
    $("header").click(function () {
        $(this).fadeOut(500);
        $(".main").fadeIn(500);
        $("#audio")[0].pause();
    });
    var timer = null;
    var error = false;
    var error_2 = false;
    var ans = 0;
    var im = new ImageMonitor();
    var logo_src = "images/logo.png";
    var logo = im.createImage(logo_src);
    var ewm_src = "images/ewm.png";
    var ewm = im.createImage(ewm_src);
    var xm_img = [im.createImage("images/wk.png"), im.createImage("images/xc.png")];
    var random = Math.round(Math.random() * (xm_img.length - 1));
    var xm = xm_img[random];

    var json = localStorage.getItem("info");
    var jsonObj = JSON.parse(json);
    var user = jsonObj.user;
    var user_img = jsonObj.src;
    var city = jsonObj.city;
    // alert("页面上显示的"+city);

    $(".main").click(function () {
        $(".m_cq").addClass("active");
        setTimeout(function () {
            $(".dialogue").show().addClass("dialogue-acitve");
            animate();
        }, 200);
    });

    var arrMeg = [{
            title: "我爱科本",
            img: "images/tx-kb.png",
            mesage: "群头没开腔是不回重庆迈？",
            mesage1: "平时像个话包子嫩个，今天啷个不开腔啊，话说你现在在哪里哟？",
            user_name: user,
        },
        {
            title: "我爱科本",
            img: "images/tx-kb.png",
            mesage: "你在那边过的怎么样嘛，",
            mesage1: "有没有随时暴露重庆人的本性",
            user_name: user,
        },
        {
            title: "重庆小张",
            img: "images/cq-xz.png",
            mesage: "诶对老，出来嫩个久，你最想重庆撒子？",
            user_name: user,
        },
        {
            title: "我爱科本",
            img: "images/tx-kb.png",
            mesage: "重庆百晓生，你晓不晓得勒是哪里嘛",
            user_name: user,
        },
        {
            title: "我爱科本",
            img: "images/tx-kb.png",
            mesage: "如果是你，今年会有回重庆安家的打算吗？",
            user_name: user,
        }
    ]
    var arrUl = [{
            list1: '1年',
            list2: '2年',
            list3: '3年',
            list4: '4年',
            list5: '5年',
            list6: '6年',
            list7: '7年',
            list8: '8年',
            list9: '9年',
            list10: '10年'
        },
        {
            list1: "对火锅和川菜的蜜汁执着",
            list2: "被川普social支配的恐惧",
            list3: "自带暴脾气属性",
            list4: "偶然听见重庆话，就想立刻确认眼神"
        },
        {
            list1: "火锅江湖菜夜啤酒",
            list2: "凌晨两点压过的九街",
            list3: "最爱的亲人&内伙子些",
            list4: "关于重庆的一切，都想！"
        },
        {
            list1: "南滨路",
            list2: "万科重庆天地",
            list3: "北滨路",
        },
        {
            list1: "重庆邮电大学",
            list2: "万科鹅岭峯",
            list3: "悦来会展中心",
        },
        {
            list1: "会",
            list2: "暂时不会",
        }
    ]
    $('.input-upload').change(function (event) {
        var files = this.files;
        if (files && files.length) {
            var file = files[0];
            if (/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {
                var uploadedImageURL = window.URL.createObjectURL(file);
                canvasImg(uploadedImageURL, file);
                $("footer").show();
            } else {
                alert('请选择正确的图片格式！');
            }
        }
    });
   
    function animate() {
        var list = $(".d_meg").children().last();
        var index = $('.d_meg').children().not("ul").length;
        var arr = null;
        if (list.is(":hidden")) {
            list.show();
            var speed=[0.2,0.3,0.4,0.5];
            var random=Math.floor(Math.random()*4);
            // console.log(speed[random]);
            list.css('animation', 'liaotian 0.4s '+speed[random]+'s ease-out forwards');
            $("#music")[0].play();
            if ($(".dialog").height() - list.offset().top < list.height()) {
                for_bottom($(".dialog").scrollTop() + list.height() + 50);
            }
            if (index <= 8 || index == 10 || index == 12 || index > 17 && index < 20 || index > 22 && index < 27 ||
                index == 28 || index == 32 || index == 36) {
                arr = "<img src='images/" + (index + 1) + ".png' alt=''>";
            }
            if (index == 31) {
                if (error) {
                    arr = "<img src='images/cuo_1.png' alt=''>";
                } else {
                    arr = "<img src='images/dui_1.png' alt=''>";
                }
            }
            if (index == 35) {
                if (error_2) {
                    arr = "<img src='images/cuo_2.png' alt=''>";
                } else {
                    arr = "<img src='images/dui_2.png' alt=''>";
                }
            }
            if (index == 9 || index == 15) {
                var num = 0;
                if (index == 9) {
                    num = 0;
                } else if (index == 15) {
                    num = 1;
                }
                arr = "<div class='img_kb clearfix'>" +
                    "<img src='images/tx-kb.png' alt=''>" +
                    "<div class='center'>" +
                    "<p class='title'>" + arrMeg[num].title + "</p>" +
                    "<p class='mesage'>" + arrMeg[num].mesage +
                    "<span class='user_name'>@" + arrMeg[num].user_name + "</span>" + arrMeg[num].mesage1 +
                    "</p></div></div>";
            }
            if (index == 11) {
                arr = "<div class='img_me clearfix'>" +
                    "<img src='" + user_img + "' alt=''>" +
                    "<div class='center'>" +
                    "<p class='title user_name'>" + user + "</p>" +
                    "<p class='mesage daan0'>" + city +
                    "</p></div></div>";
            }

            if (index == 20 || index == 27 || index == 37) {
                var num = 2;
                if (index == 20) {
                    num = 2;
                }
                if (index == 27) {
                    num = 3;
                }
                if (index == 37) {
                    num = 4;
                }
                arr = "<div class='img_kb clearfix'>" +
                    "<img src='" + arrMeg[num].img + "' alt=''>" +
                    "<div class='center'>" +
                    "<p class='title'>" + arrMeg[num].title + "</p>" +
                    "<p class='mesage'><span class='user_name'>@" + arrMeg[num].user_name + "</span>" +
                    arrMeg[num].mesage + "</p></div></div>";
            }

            $(".d_meg").append(arr);
            if (index == 13 || index == 16 || index == 21 || index == 29 || index == 33 || index == 38) {
                var bz = "";
                if (index == 13) {
                    bz = "time_an";
                } else if (index == 16) {
                    bz = "sinian";
                } else if (index == 21) {
                    bz = "xiangfa";
                } else if (index == 29) {
                    bz = "pic1";
                } else if (index == 33) {
                    bz = "pic2";
                } else if (index == 38) {
                    bz = "last";
                }
                arr = "<img src='images/anniu.png' alt='' class='anniu " + bz + "'>";
                $(".d_meg").append(arr);
                anniu(bz);
            }
            if (list.find(".daan6").length > 0) {
                arr = "<img src='images/add.png' alt='' class='add'>";
                $(".d_meg").append(arr);
                $("#upload").show();
            }

            timer = window.setTimeout(function () {
                animate();
            }, 900);
            if (index > 13 && index < 15 || index > 16 && index < 18 || index > 21 && index < 23 || index > 29 && index <
                31 || index > 33 && index < 35 || index > 38 && index < 40 || index > 40) {
                window.clearTimeout(timer);
            }
        }
    }

    function anniu(bz) {
        var ul = null;
        var num = 0;
        if (bz == "time_an") {
            ul = "time_ul";
            num = 0;
        } else if (bz == "sinian") {
            ul = "sinian_ul";
            num = 1;
        } else if (bz == "xiangfa") {
            ul = "xiangfa_ul";
            num = 2
        } else if (bz == "pic1") {
            ul = "pic1_ul";
            num = 3
        } else if (bz == "pic2") {
            ul = "pic2_ul";
            num = 4
        } else if (bz == "last") {
            ul = "last_ul";
            num = 5;
        }

        $("." + bz + "").click(function () {
            if ($("." + ul + "").length > 0) {
                $("." + ul + "").slideDown(200);
                if (ul == "time_ul") {
                    $("." + ul + "").css("overflow-y", "scroll");
                }
            } else if ($("." + ul + "").length == 0) {
                var str = '<ul class="' + ul + '">';
                if (ul == "pic1_ul" || ul == "pic2_ul") {
                    str = '<ul class="pic_ul ' + ul + '">';
                }
                for (var i in arrUl[num]) {
                    str += '<li>' + arrUl[num][i] + '</li>';
                }
                str += '</ul>';
                $(".d_meg").append(str);
                $("." + ul + "").slideDown(200);
                if (ul == "time_ul") {
                    $("." + ul + "").css("overflow-y", "scroll");
                }
            }
            click();
        });
    }

    function click() {
        var daan = null;
        $(".d_meg ul").off("click", "li").on("click", "li", function (e) {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
            daan = $(this).html();
            if ($(this).parent("ul").hasClass("pic1_ul")) {
                if (daan != arrUl[3].list2) {
                    error = true;
                }
            }
            if ($(this).parent("ul").hasClass("pic2_ul")) {
                if (daan != arrUl[4].list2) {
                    error_2 = true;
                }
            }
            var arr = "<div class='img_me clearfix'>" +
                "<img src=" + user_img + " alt=''>" +
                "<div class='center'>" +
                "<p class='title user_name'>" + user + "</p>" +
                "<p class='mesage daan" + (ans += 1) + "'>" + daan + "</p></div></div>";
            // $(".anniu").hide();
            $(".d_meg").append(arr);
            $(".d_meg ul").slideUp(200);
            animate();
        })
    }

    function for_bottom(h) {
        $('.dialog').animate({
            scrollTop: h
        }, 400);
    }

    function canvasImg(src, file) {
        var num = $(".daan1").html();
        switch (num) {
            case "1年":
                num = "一年";
                break;
            case "2年":
                num = "两年";
                break;
            case "3年":
                num = "三年";
                break;
            case "4年":
                num = "四年";
                break;
            case "5年":
                num = "五年";
                break;
            case "6年":
                num = "六年";
                break;
            case "7年":
                num = "七年";
                break;
            case "8年":
                num = "八年";
                break;
            case "9年":
                num = "九年";
                break;
            case "10年":
                num = "十年";
                break;
        }
        var orientation = 0;
        EXIF.getData(file, function () {
            orientation = EXIF.getTag(this, 'Orientation');
        });
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        canvas.width = 750;
        canvas.height = $(window).height();

        var wx_h = canvas.height * 0.4;
        var u_h = wx_h + wx_h * 0.35;
        if (screen.height>=812) {
            u_h = wx_h + wx_h * 0.28;
        }
        var logo_h = canvas.height * 0.89;
        var ewm_h = canvas.height * 0.83;
        var imgUrl = new Image;
        imgUrl.src = src;
        imgUrl.onload = function () {
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            if (orientation == 6) {
                ctx.save();
                ctx.translate(canvas.width / 2, canvas.height / 2);
                ctx.rotate(90 * Math.PI / 180);
                ctx.drawImage(imgUrl, 0 - canvas.height / 2, 0 - canvas.width / 2, canvas.height, canvas.width);
                ctx.restore();//恢复状态
            } else {
                ctx.drawImage(imgUrl, 0, 0, canvas.width, canvas.height);
            }
            ctx.save();
            var wx = new Image;
            wx.src = "images/mark.png";
            wx.setAttribute("crossOrigin",'Anonymous')
            wx.onload = function () {
                ctx.drawImage(wx, 0, wx_h, wx.width, wx.height);
                ctx.save();
                ctx.beginPath();

                ctx.font = "normal 36px PingFang Medium";
                canvas.style.letterSpacing = '2px';
                var name = "我是 " + user;
                var address = "我在 " + city;
                ctx.letterSpacingText(name, 43, u_h);
                ctx.letterSpacingText(address, 43, u_h + 70);

                ctx.font = "normal 68px GSKA00H";
                canvas.style.letterSpacing = '-5px';
                ctx.fillStyle = "#b10303";
                var year = "我离开重庆" + num + "了";
                var miss = "重庆,我想你了";
                ctx.letterSpacingText(year, 30, u_h + 160);
                ctx.letterSpacingText(miss, 30, u_h + 238);
                ctx.save();
                ctx.fillStyle ="rgba(0,0,0,0.7)";
                ctx.fillRect(0,logo_h-20,canvas.width,97);
                ctx.save();
                ctx.drawImage(logo, 22, logo_h, logo.width, logo.height);
                ctx.save();

                if (random == 1) {
                    logo_h = logo_h - 10;
                }
                ctx.drawImage(xm, 220, logo_h, xm.width, xm.height);
                ctx.save();

                ctx.drawImage(ewm, 550, ewm_h, ewm.width, ewm.height);
                ctx.save();

                $(".canvasImg").attr("src", canvas.toDataURL('image/jpeg'));
                $(".canvasImg").show();
            };
        };
       
      
        $(".save").show();

    }
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

    function isIphoneX() {
        return /iphone/gi.test(navigator.userAgent) && (screen.height == 812 && screen.width == 375);
    }

    function ImageMonitor() {
        var imgArray = [];
        return {
            createImage: function (src) {
                return typeof imgArray[src] != 'undefined' ? imgArray[src] : (imgArray[src] = new Image(), imgArray[
                    src].src = src, imgArray[src])
            },
            loadImage: function (arr, callback) {
                for (var i = 0, l = arr.length; i < l; i++) {
                    var img = arr[i];
                    imgArray[img] = new Image();
                    imgArray[img].onload = function () {
                        if (i == l - 1 && typeof callback == 'function') {
                            callback();
                        }
                    };
                    imgArray[img].src = img
                }
            }
        }
    }
}