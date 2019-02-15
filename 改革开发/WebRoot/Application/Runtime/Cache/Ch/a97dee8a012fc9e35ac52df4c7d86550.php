<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>盛景澜湾</title>
    <link rel="stylesheet" href="/webpage/chphone/cms/public/css/swiper.css"/>
    <link rel="stylesheet" href="/webpage/chphone/cms/public/css/animate.min.css"/>
    <link rel="stylesheet" href="/webpage/chphone/cms/public/css/main.css"/>
    <!--箭头动画-->
    <link rel="stylesheet" href="/webpage/chphone/cms/public/css/contact.css"/>
    <!--手机适配-->
    <script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
            margin-right: auto;
            margin-left: auto;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
        }

        /*向下箭头*/
        #array {
            position: absolute;
            z-index: 999;
            -webkit-animation: start 1.5s infinite ease-in-out;
            -ms-animation: start 1.5s infinite ease-in-out;
            -moz-animation: start 1.5s infinite ease-in-out;
            animation: start 1.5s infinite ease-in-out;
        }

        /*电话*/
        .middle_box {
            position: absolute;
            margin-top: -350px;
            right: 0;
        }

        .middle_box a {
            text-decoration: none;
        }

        .middle_box img {
            position: absolute;
            width: 80px;
            height: 84px;
            display: block;
            /*top: 690px;*/
            right: 0;
            z-index: 5;
        }

        .middle_box .dong {
            position: absolute;
            top: 8.5px;
            right: 12.5px;
            width: 44px;
            height: 63px;
            animation: dong 0.3s linear infinite;
            -webkit-animation: dong 0.3s linear infinite;
            -moz-animation: dong 0.3s linear infinite;
            -ms-animation: dong 0.3s linear infinite;
        }

        /*输入框组*/
        .bottom_box {
            width: 100%;
            height: 100px;
            /*filter: alpha;*/
            -moz-opacity: 1;
            opacity: 1;
            -position: fixed;
            position: fixed;
            z-index: 100;
            bottom: -4px;
            left: 0;
            background: #0e2e57;
            padding: 5px 0;
        }

        .bottom_box input {
            border: none;
            outline: none;
            height: 67px;
        }

        .xm, .dh {
            height: 67px;
            border-radius: 20px;
            font-size: 35px;
            text-align: center;
            line-height: 50px;
        }

        .btn {
            background: url(/webpage/chphone/cms/public/images/jt.png) 0 0 no-repeat;
            position: absolute;
            top: 20px;
            right: 18px;
            width: 63px;
        }

        .inner_box {
            margin: auto 0;
        }

        .xm {
            width: 214px;
            margin-left: 22px;
        }

        .dh {
            width: 371px;
            margin-top: 15px;
            margin-left: 10px;
        }

        /*弹出框*/
        .tank {
            width: 100%;
            height: 100%;
            position: absolute;
            background: rgba(0, 0, 0, 0.7);
            top: 0;
            left: 0;
            z-index: 999;
            display: none;
        }

        .tan {
            /*display: none;*/
            width: 400px;
            height: 150px;
            color: #000;
            background-color: #fff;
            position: absolute;
            top: 30%;
            left: 50%;
            margin-left: -200px;
            z-index: 999;
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            border-radius: 30px 30px;
        }

        .guan img {
            width: 35px;
            height: 35px;
            position: absolute;
            top: 5px;
            right: 10px;
        }

        .tan p {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<!--轮播swiper-->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/webpage/chphone/cms/public/images/logo_1.jpg"></div>
        <div class="swiper-slide"><img src="/webpage/chphone/cms/public/images/logo_2.jpg"></div>
        <div class="swiper-slide"><img src="/webpage/chphone/cms/public/images/logo_3.jpg"></div>
        <div class="swiper-slide"><img src="/webpage/chphone/cms/public/images/logo_4.jpg"></div>
        <div class="swiper-slide"><img src="/webpage/chphone/cms/public/images/logo_5.jpg"></div>
        <div class="swiper-slide"><img src="/webpage/chphone/cms/public/images/logo_6.jpg"></div>
    </div>
    <!--向下箭头-->
    <img src="/webpage/chphone/cms/public/images/arrow.png" style="width:30px;height:25px; top:860px; left:300px;"
         id="array" class="resize">
</div>
<!--获取打开途径-->
<input type="hidden" id="source" value="<?php echo ($source); ?>">
<!--预约电话-->
<div class="middle_box">
    <img src="/webpage/chphone/cms/public/images/tel.png">
    <a class="yjbo" href=""><img class="dong" src="/webpage/chphone/cms/public/images/tel1.png"></a>
</div>
<!--输入框组-->
<div class="bottom_box">
    <div class="iner_box">
        <input type="text" class="xm" id="name" placeholder="姓名" onfocus="if(placeholder=='姓名'){placeholder=''}"
               onblur="if(placeholder==''){placeholder='姓名'}">
        <input type="text" class="dh" id="phone" placeholder="电话" onfocus="if(placeholder=='电话'){placeholder=''}"
               onblur="if(placeholder==''){placeholder='电话'}">
    </div>
    <input type="button" id="submit" class="btn">
</div>
<!--弹出框-->
<div class="tank">
    <div class="tan">
        <p></p>
        <div class="guan"><img src="/webpage/chphone/cms/public/images/guan.png"></div>
    </div>
</div>
</body>
<script src="/webpage/chphone/cms/public/js/swiper.min.js"></script>
<script src="/webpage/chphone/cms/public/js/swiper.animate.min.js"></script>
<script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
<!--swiper动画-->
<script type="text/javascript">
    $(function () {
        var swiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            slidesPerView: 1,
            mousewheelControl: true,
            watchSlidesProgress: true,
            onSetTransition: function (swiper, speed) {
                for (var i = 0; i < swiper.slides.length; i++) {
                    es = swiper.slides[i].style;
                    es.webkitTransitionDuration = es.MsTransitionDuration = es.msTransitionDuration = es.MozTransitionDuration = es.OTransitionDuration = es.transitionDuration = speed + 'ms';
                }
            },
            onProgress: function (swiper) {
                for (var i = 0; i < swiper.slides.length; i++) {
                    var slide = swiper.slides[i];
                    var progress = slide.progress;
                    var translate = progress * swiper.height / 4;
                    scale = 1 - Math.min(Math.abs(progress * 0.5), 1);
                    var opacity = 1 - Math.min(Math.abs(progress / 2), 0.5);
                    slide.style.opacity = opacity;
                    es = slide.style;
                    es.webkitTransform = es.MsTransform = es.msTransform = es.MozTransform = es.OTransform = es.transform = 'translate3d(0,' + translate + 'px,-' + translate + 'px) scaleY(' + scale + ')';
                }
            }
        });
    })
</script>
<!--保证弹出输入框时input全部显示-->
<script type="text/javascript">
    //保证弹出输入框时input全部显示
    var vh = null;
    window.onload = function () {
        vh = document.documentElement.clientHeight || document.body.clientHeight;
        $('html').css('height', vh);
        $('body').css('height', vh);
//        $('.bottom_box').css('height', vh / 10);
        $('.swiper-container').css('height', vh);
        $('.swiper-slide img').css('height', vh);
    };
    window.onresize = function () {
        document.body.scrollTop = 10000;
        $('.swiper-container').css('height', vh);
        $('.swiper-slide img').css('height', vh);
    }
</script>
<!--输入验证，成功跳转-->
<script language="javascript" type="text/javascript">
    $(function () {
        $("body").css("width", $(window).width());
        $("#submit").click(function () {
            var name = $("#name").val();
            if (!name) {
                $(".tank").show();
                $(".tan p").html("");
                $(".tan p").html("请输入姓名");
                $(".guan").click(function () {
                    $(".tank").hide();
                    $("#name").focus();
                })
                return false;
            }

            var phone = $("#phone").val();
            if (!phone) {
                $(".tank").show();
                $(".tan p").html("");
                $(".tan p").html("请输入电话");
                $(".guan").click(function () {
                    $(".tank").hide();
                    $("#phone").focus();
                });
                return false;
            }
            var source = $("#source").val();
            // var p=/1[0-9]{10}/;
            var p = /^1[3|4|5|7|8]\d{9}$/;
            if (!p.exec(phone)) {
                $(".tank").show();
                $(".tan p").html("");
                $(".tan p").html("请输入正确的电话");
                $(".guan").click(function () {
                    $(".tank").hide();
                    $("#phone").val('').focus();
                });
                return false;
            }
            $.post('/index.php/Ch/Mcenter/ShengJinglwbm/baomingadd', {phone: phone, name: name, source: source},
                function (msg) {
                    if (msg == "ok") {
                        $(".tank").show();
                        $(".tan p").html("");
                        $(".tan p").html("报名成功");
                        $(".guan").click(function () {
                            $(".tank").hide();
                            var source = $("#source").val();
                            location.href = "/index.php/Ch/Cms/ShengJinglw/index/source/" + source;
                        })
                    }
                    if (msg == "chongfu") {
                        $(".tank").show();
                        $(".tan p").html("");
                        $(".tan p").html("请勿重复提交");
                        $(".guan").click(function () {
                            $(".tank").hide();
                        })
                    }
                    if (msg == "error") {
                        $(".tank").show();
                        $(".tan p").html("");
                        $(".tan p").html("提交失败，请重新提交");
                        $(".guan").click(function () {
                            $(".tank").hide();
                        })
                    }
                })
        });
    })
</script>
<script type="text/javascript">
    $(function () {
        <!--防止安卓输入框被盖住-->
        $('input[type="text"]').on('click', function () {
            var target = this;
            setTimeout(function () {
                target.scrollIntoViewIfNeeded();
            }, 400);
        });//防止安卓输入框被盖住

        <!--防止iOS输入框被盖住-->
        $('input[type="text"]').bind('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            setTimeout(function () {
                $(window).scrollTop($this.offset().top - 10);
            }, 200)
        });//防止iOS输入框被盖住

        <!--百度流量监测-->
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?7f76c1ddd0003e42f85af0cee5f0e4a9";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
        <!--判断安卓和ios,进行拨号-->
        var u = navigator.userAgent;
        var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
        if (isAndroid == true) {
            $(".yjbo").attr("href", "tel:4008198181");
        } else if (isiOS == true) {
            $(".yjbo").attr("href", "tel:4008198181,610988")
        }
    })
</script>
</html>