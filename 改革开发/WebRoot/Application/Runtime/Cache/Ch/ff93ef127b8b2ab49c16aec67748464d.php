<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>光谷澎湃城奥山府</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <link rel="icon" href="/webpage/chphone/cms/public/images/logoh.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/webpage/chphone/cms/public/images/logoh.png" type="image/x-icon"/>
    <link rel="stylesheet" href="/webpage/chphone/cms/public/css/contact.css"/>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            width: 100%;
            overflow-x: hidden;
            font-size: 26px;
            font-family: "PingFang SC Regilar", "Microsoft Yahei", Tahoma, Arial, Helvetica;
        }

        .content {
            margin: 0 auto;
            position: relative;
            width:750px;
        }

        .main {
            position: relative;
        }

        .baoming {
            background: none;
            position: absolute;
            margin-left: 34px;
            margin-top: -700px;
            overflow: hidden;
            width: 682px;
        }

        .bms {
            overflow: hidden;
        }

        .baoming .bms p {
            font-size: 33px;
            color: #7e6b5a;
            padding-bottom: 25px;
        }

        .form input {
            display: block;
            width: 682px;
            height: 91px;
            /*background: #a5dae5;*/
            /*border: 3px solid #316898;*/
            border: none;
            font-size: 28px;
            outline: none;
            border-radius: 10px;
            text-indent: 1em;
        }

        .form input.btn {
            width: 682px;
            height: 91px;
            /*border: 3px solid #316898;*/
            border: none;
            display: block;
            margin-top: 45px;
            background: url("/webpage/chphone/cms/public/images/btn.png") no-repeat;
        }

        .foot {
            text-align: center;
            height:102px;
            background: url("/webpage/chphone/cms/public/images/btn_1.png") no-repeat;
            /*background: #e83636;*/
            color: #fff;
            width: 750px;
            position: fixed;
            bottom: 0;
        }

        .foot a {
            display: inline-block;
            color: #fff;
            font-size: 34px;
            width: 100%;
            height: 100%;
            text-decoration: none;
            line-height: 102px;;
            /*padding-top: 18px;*/
        }

        .foot img {
            width: 50px;
            height: 50px;
            margin-top: -5px;
            margin-right: 5px;
            vertical-align: middle;
        }

        .dialog {
            height: 100%;
            width: 750px;
            display: none;
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            margin: 0 auto;
            top: 0;
            z-index: 998;
            /*background: rgb(0, 0, 0); !*The Fallback color,这里也可以使用一张图片来代替*!*/
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=1,startColorstr=#70000000,endColorstr=#70000000)"; /*Filter for IE8 */
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=1, startColorstr=#70000000, endColorstr=#70000000); /*Filter for older IEs */
        }

        .tol {
            width: 400px;
            height: 200px;
            color: #000;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -200px;
            /*transform: translateX(-45%);*/
            margin-left: -200px;
            z-index: 999;
            background-color: #fff;
            font-size: 28px;
            text-align: center;
            font-weight: bold;
            border-radius: 30px 30px;
        }

        .dialog .tol p:first-child {
            margin-top: 40px;
        }

        .dialog .tol p:last-child {
            font-size: 24px;
            background: orange;
            /*background: url("/webpage/chphone/cms/public/images/db.png");*/
            width: 70%;
            height: 45px;
            line-height: 45px;
            margin: 40px auto 0;
            border-radius: 10px;
            color: white;
        }

        .fancybox-lock-test {
            overflow-y: hidden !important;
        }

        .middle_box_left {
            margin-left: 0;
        }

        .middle_box {
            margin-left: 646px;
        }

        .middle_box, .middle_box_left {
            position: fixed;
            top: 575px;
            width: 104px;
            height: 99px;
        }

        .middle_box img, .middle_box_left img {
            position: absolute;
            width:100%;
            height:100%;
            display: block;
            z-index: 5;
        }

        .middle_box a, .middle_box_left a {
            text-decoration: none;
        }

        .middle_box .dong, .middle_box_left .dong {
            position: absolute;
            top: 10px;
            font-size: 30px !important;
            color: white;
            z-index: 15;
            letter-spacing:6px;
            line-height: 38px;
            right: 19px;
            animation: dong 0.15s linear infinite;
            -webkit-animation: dong 0.15s linear infinite;
            -moz-animation: dong 0.15s linear infinite;
            -ms-animation: dong 0.15s linear infinite;
        }

        .middle_box .dong {
            right: 6px !important;
        }
        .middle_box_left img{
            transform: rotate(180deg);
        }
        .info {
            display: none;
            width: 670px;
            height: 512px;
            background: #efefef;
            position: fixed;
            top: 50%;
            z-index: 99;
            margin-top: -217.5px;
            margin-left: 40px;
            font-size: 28px;
            text-align: center;
            font-weight: bold;
            border-radius: 10px 10px;
        }

        .info .info_box {
            background: white;
            border-radius: 8px;
            margin: 82px auto 0;
            width: 620px;
            height: 189px;
            position: absolute;
            bottom: 218px;
            left: 25px;
        }

        .info_box .box {
            height: 50%;
            padding: 5px 15px 0 20px;
            font-size: 28px;
            box-sizing: border-box;
        }

        .box input {
            width: 80%;
            height: 95%;
            border: 0;
            outline: none;
            font-size: 28px;
            vertical-align: middle;
            margin-left: 25px;
            display: inline-block;
        }

        .box span {
            vertical-align: middle;
        }

        .info_box .box:first-child {
            border-bottom: 1px solid #ccc;
        }

        .info .btn {
            background: url(/webpage/chphone/cms/public/images/btn-1.png) no-repeat;
            width: 620px;
            height: 100px;
            border: none;
            top: 328px;
            left: 25px;
            outline: none;
            position: absolute;
        }

        .info .btn_1 {
            background: url(/webpage/chphone/cms/public/images/btn-h5.png) no-repeat;
        }

        .guan img {
            width: 67px;
            height: 66px;
            position: absolute;
            z-index: 1000;
            top: -35px;
            right: -15px;
        }
    </style>
</head>
<body>
<div class="content">
    <!--主题图片-->
    <div class="main">
        <img src="/webpage/chphone/cms/public/images/main.jpg" alt="" style="display: block">
    </div>
    <!--弹框报名-->
    <div class="da_tel">
        <div class="middle_box">
            <img src="/webpage/chphone/cms/public/images/tel.png"/>
            <p class="dong">在线<br>报名</p>
            <!--<img class="dong" src="/webpage/chphone/cms/public/images/tel1.png"/>-->
        </div>
        <div class="middle_box_left">
            <img src="/webpage/chphone/cms/public/images/tel.png">
            <a class="yjbo" href="tel:4006988610,706#"><p class="dong">免费<br>看房</p></a>
        </div>
    </div>
    <div class="info">
        <div class="guan"><img src="/webpage/chphone/cms/public/images/guan-1.png" class="close" id="guan"></div>
        <div class="info_box">
            <div class="box">
                <span>姓名</span>
                <input type="text" id="uname" placeholder="请输入您的姓名"
                       onfocus="if(placeholder=='请输入您的姓名'){placeholder=''}"
                       onblur="if(placeholder==''){placeholder='请输入您的姓名'}">
            </div>
            <div class="box">
                <span>电话</span>
                <input type="text" id="tel" placeholder="请输入您的电话"
                       onfocus="if(placeholder=='请输入您的电话'){placeholder=''}"
                       onblur="if(placeholder==''){placeholder='请输入您的电话'}">
            </div>
        </div>
        <input type="button" class="btn" id="btn">
    </div>
    <!--输入框组-->
    <div class="baoming">
        <form action="" class="form">
            <input type="hidden" id="source" name="source" value="<?php echo ($source); ?>"/>

            <div class="bms">
                <p class="p1">姓名:
                <p>
                    <input type="text" id="name">
            </div>
            <div class="bms">
                <p class="p2">电话:
                <p>
                    <input type="text" id="phone">
            </div>
            <input type="button" class="btn" id="submit">
        </form>
    </div>
    <!--电话-->
    <div class="foot">
        <a href="tel:4006988610,706#" class="yjbo" style="display:block">
            <img src="/webpage/chphone/cms/public/images/tel_2.png" alt="">
            <span>一键拨打 <span style="font-size: 26px;">(分机号:706#)</span></span></a>
    </div>
    <div class="dialog">
        <div class="tol">
            <p class="ts"></p>
            <p class="close">我知道了</p>
        </div>
    </div>
</div>
</body>
<script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
<script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
<!--opacity-->
<script>
    $(function () {
        $(window).load(function () {
            $(window).scroll(function () {
                var bottom = parseInt($(document).height() - $(window).height() - $(document).scrollTop());
                if (bottom <= 340) {
                    $(".middle_box").slideUp();
                    $(".middle_box_left").slideUp();
                } else {
                    $(".middle_box").slideDown();
                    $(".middle_box_left").slideDown();
                }
            });
        });
    })
</script>
<!--电话来源-->
<script type="text/javascript">
    var t1 = null;//这个设置为全局
    function myclick(fn) {
        if (t1 == null) {
            t1 = new Date().getTime();
        } else {
            var t2 = new Date().getTime();
            if (t2 - t1 < 500) {
                t1 = t2;
                return;
            } else {
                t1 = t2;
            }
        }
        if (fn) {
            fn();
        }
    }
    function ajax() {
        var source = $("#source").val();
        $.ajax({
            type: "post",
            url: "/index.php/Ch/Mcenter/Source/source",
            data: {
                source: source
            },
            success: function (data) {
//                alert(data);
            },
            error: function (d) {
//                alert(d)
            }
        })
    }
    $(".foot").click(function () {
        myclick(ajax)
    });
    $(".middle_box_left").click(function () {
        myclick(ajax)
    });
</script>
<!--点击显示报名-->
<script type="text/javascript">
    $(function () {
        var isIPHONE = navigator.userAgent.toUpperCase().indexOf("IPHONE") != -1;
        var vei = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
        if (vei != null) {
            var num = parseInt(vei[1], 10);
        }
        $(".middle_box").click(function () {
            $(".info").show();
            var top=$(document).scrollTop();
            time();
            function time() {
                if (isIPHONE) {
                    $(".info").css({
                        "position": "absolute",
                        "top": $(document).scrollTop() + 300
                    });
                }
            }
            $(window).scroll(function () {
                if ($(document).scrollTop() != top) {
                    setTimeout(time(),100)
                }
            });

            $("#guan").click(function () {
                $(".info").hide();
                if (isIPHONE) {
                    $(".info").css({
                        "position": "fixed",
                        "top": "50%"
                    });
                }
            });
            $(".box>input").focus(function () {
                $(".btn").addClass("btn_1");
                objBlurFun(".box>input");
            }).blur(function () {
                if ($("#uname").val() == "" && $("#tel").val() == "") {
                    $(".btn").removeClass("btn_1");
                }
            });
            objBlurFun(".box>input");
        });
        function objBlurFun(sDom, time) {
            var time = time || 300;
            //判断是否为苹果
            if (isIPHONE) {
                if (num == 11) {
                    var obj = document.querySelectorAll(sDom);
                    for (var i = 0; i < obj.length; i++) {
                        objBlur(obj[i], time);
                    }
                }
            }
        }
        // 元素失去焦点隐藏iphone的软键盘
        function objBlur(sdom, time) {
            if (sdom) {
                sdom.addEventListener("focus", function () {
                    document.addEventListener("touchend", docTouchend, false);
                }, false);

            } else {
                throw new Error("objBlur()没有找到元素");
            }
            var docTouchend = function (event) {
                if (event.target != sdom) {
                    setTimeout(function () {
                        sdom.blur();
                        document.removeEventListener('touchend', docTouchend, false);
                    }, time);
                }
            };

        }
    })
</script>
<!--报名1-->
<script language="javascript" type="text/javascript">
    $('input').on('keypress', function () {
        if (event.keyCode == 32) event.returnValue = false;
    });
    function tisi(ele) {
        $(".dialog").fadeIn();
        $("body").height($(window).height()).css({
            "overflow-y": "hidden",
            "position": "fixed"
        });
        $(".close").click(function () {
            $(".dialog").fadeOut();
            $("body").height($(window).height()).css({
                "overflow-y": "visible",
                "position": "relative"
            });
            if (ele !== '') {
                $(ele).focus();
            }
        });
    }
    function post(msg) {
        if (msg == "ok") {
            $(".ts").html("报名成功！");
            $(".dialog").fadeIn();
            $("body").height($(window).height()).css({
                "overflow-y": "hidden",
                "position": "fixed"
            });
            $(".close").click(function () {
                $(".dialog").fadeOut();
                $("body").height($(window).height()).css({
                    "overflow-y": "visible",
                    "position": "relative"
                });
                var source = $("#source").val();
                var random = Math.floor(Math.random() * 10);
                var lastNum = location.href.substr(location.href.length - 1, 1);
                if (lastNum == random) {
                    random = random + 1;
                }
                window.location.href = "/index.php/Ch/Cms/GuangGu/index/source/" + source + "/" + random;
            });
        }
        if (msg == "chongfu") {
            $(".ts").html("请勿重复提交");
            tisi();
        }
        if (msg == "error") {
            $(".ts").html("提交失败，请重新提交");
            tisi()
        }
    }
    $("#btn").click(function () {
        var name = $("#uname").val();
        if (!name) {
            $(".ts").html("请输入姓名");
            tisi("#uname");
            return false;
        }
        var phone = $("#tel").val();
        if (!phone) {
            $(".ts").html("请输入电话");
            tisi("#tel");
            return false;
        }
        var source = $("#source").val();
        var p = /^1[3|4|5|7|8]\d{9}$/;
        if (!p.exec(phone)) {
            $(".ts").html("请输入正确的电话");
            tisi("#tel");
            return false;
        }
        $.post('/index.php/Ch/Mcenter/GuangGubm/baomingadd', {phone: phone, name: name, source: source},
            function (msg) {
                post(msg);
            })
    });
    $("#submit").click(function () {
        var name = $("#name").val();
        if (!name) {
            $(".ts").html("请输入姓名");
            tisi("#name");
            return false;
        }
        var phone = $("#phone").val();
        if (!phone) {
            $(".ts").html("请输入电话");
            tisi("#phone");
            return false;
        }
        var source = $("#source").val();
        // var p=/1[0-9]{10}/;
        var p = /^1[3|4|5|7|8]\d{9}$/;
        if (!p.exec(phone)) {
            $(".ts").html("请输入正确的电话");
            tisi("#phone");
            return false;
        }
        $.post('/index.php/Ch/Mcenter/GuangGubm/baomingadd', {phone: phone, name: name, source: source},
            function (msg) {
                post(msg)
            })
    })
</script>
<!--百度流量监测-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?44e00918aa7c4e3423c237077ee099c9";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--判断安卓和ios,进行拨号-->
<script type="text/javascript">
    $(function () {
        var u = navigator.userAgent;
        var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
        if (isAndroid == true) {
            $(".yjbo").attr("href", "tel:4006988610");
        } else if (isiOS == true) {
            $(".yjbo").attr("href", "tel:4006988610,706#")
        }
    })
</script>
</html>