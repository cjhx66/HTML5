<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新世界丽樽</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <link rel="icon" href="/webpage/chphone/cms/public/images/logoh.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/webpage/chphone/cms/public/images/logoh.png" type="image/x-icon"/>
    <style>

        * {
            padding: 0;
            margin: 0;
        }

        .main {
            position: relative;
        }

        .baoming {
            background: none;
            position: absolute;
            left: 46px;
            margin-top: -680px;
            overflow: hidden;
            width: 554px;
        }

        .bms {
            overflow: hidden;
            width: 554px;
        }

        .baoming .bms p {
            font-size: 26px;
            color: #ffbc6c;
            padding-bottom: 15px;
        }

        .form input {
            display: block;
            width: 554px;
            height: 72px;
            border: none;
            background: #fff;
            font-size: 26px;
            outline: none;
            border-radius: 10px;
            text-indent: 1em;
            /*padding-left: 10px;*/
        }

        .form input.btn {
            width: 554px;
            height: 72px;
            border: none;
            display: block;
            margin-top: 45px;
            background: url("/webpage/chphone/cms/public/images/btn.png");
        }

        .main_1 {
            position: absolute;
            margin-top: -1100px;
        }

        .foot {
            text-align: center;
            height: 80px;
            /*background: url("/webpage/chphone/cms/public/images/db.png");*/
            background: #e83636;
            color: #fff;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .foot a {
            display: inline-block;
            color: #fff;
            font-size: 32px;
            width: 100%;
            height: 100%;
            text-decoration: none;
            padding-top: 15px;
        }

        .foot img {
            width: 50px;
            height: 50px;
            margin-right: 5px;
            vertical-align: middle;
        }
        .dialog {
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 998;
            /*background: rgb(0, 0, 0); !*The Fallback color,这里也可以使用一张图片来代替*!*/
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=1,startColorstr=#70000000,endColorstr=#70000000)"; /*Filter for IE8 */
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=1, startColorstr=#70000000, endColorstr=#70000000); /*Filter for older IEs */
        }

        .tol {
            /*display: none;*/
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
            /*background: orange;*/
            background: url("/webpage/chphone/cms/public/images/db.png");
            width: 70%;
            height: 45px;
            line-height: 45px;
            margin: 40px auto 0;
            border-radius: 10px;
            color: #40150C;
        }

        .fancybox-lock-test {
            overflow-y: hidden !important;
        }
    </style>
</head>
<body>
<!--主题图片-->
<div class="main">
    <img src="/webpage/chphone/cms/public/images/main.jpg" alt="" style="display: block">
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
    <a href="" class="yjbo" style="display:block">
        <img src="/webpage/chphone/cms/public/images/tel_2.png" alt="">
        <span>一键拨打</span></a>
</div>
<div class="dialog">
    <div class="tol">
        <p class="ts"></p>
        <p class="close">我知道了</p>
    </div>
</div>
</body>
<script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
<script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
<script language="javascript" type="text/javascript">
    $(".main").css("width", $(window).width());
    $("#submit").click(function () {
        var name = $("#name").val();
        if (!name) {
            $(".dialog").fadeIn();
            $(".ts").html("请输入姓名");
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
                $("#name").focus();
            });
            return false;
        }

        var phone = $("#phone").val();
        if (!phone) {
            $(".dialog").fadeIn();
            $(".ts").html("请输入电话");
            $("body").height($(window).height()).css({
                "overflow-y": "hidden"
            });
            $(".close").click(function () {
                $(".dialog").fadeOut();
                $("body").height($(window).height()).css({
                    "overflow-y": "visible"
                });
                $("#phone").focus();
            });
            return false;
        }
        var source = $("#source").val();
        // var p=/1[0-9]{10}/;
        var p = /^1[3|4|5|7|8]\d{9}$/;
        if (!p.exec(phone)) {
            $(".ts").html("请输入正确的电话");
            $(".dialog").fadeIn();
            $("body").height($(window).height()).css({
                "overflow-y": "hidden"
            });
            $(".close").click(function () {
                $(".dialog").fadeOut();
                $("body").height($(window).height()).css({
                    "overflow-y": "visible"
                });
                $("#phone").val('').focus();
            });
            return false;
        }
        $.post('/index.php/Ch/Mcenter/XinShiJiebm/baomingadd', {phone: phone, name: name, source: source},
            function (msg) {
                if (msg == "ok") {
                    $(".ts").html("报名成功！");
                    $(".dialog").fadeIn();
                    $("body").height($(window).height()).css({
                        "overflow-y": "hidden"
                    });
                    $(".close").click(function () {
                        $(".dialog").fadeOut();
                        $("body").height($(window).height()).css({
                            "overflow-y": "visible"
                        });
                        var source = $("#source").val();
                        location.href = "/index.php/Ch/Cms/XinShiJie/index/source/" + source;
                    });
                }
                if (msg == "chongfu") {
                    $(".ts").html("请勿重复提交");
                    $(".dialog").fadeIn();
                    $("body").height($(window).height()).css({
                        "overflow-y": "hidden"
                    });
                    $(".close").click(function () {
                        $(".dialog").fadeOut();
                        $("body").height($(window).height()).css({
                            "overflow-y": "visible"
                        });
                    });

                }
                if (msg == "error") {
                    $(".ts").html("提交失败，请重新提交");
                    $(".dialog").fadeIn();
                    $("body").height($(window).height()).css({
                        "overflow-y": "hidden"
                    });
                    $(".close").click(function () {
                        $(".dialog").fadeOut();
                        $("body").height($(window).height()).css({
                            "overflow-y": "visible"
                        });
                    });
                }
            })
    })
</script>
<!--百度流量监测-->
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?c8b9c2533ca4a8ebbcc0f0b3931f5273";
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
            $(".yjbo").attr("href", "tel:4008195555");
        } else if (isiOS == true) {
            $(".yjbo").attr("href", "tel:4008195555,611777")
        }
    })
</script>
</html>