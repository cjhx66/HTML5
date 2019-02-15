<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公园懿府</title>
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
            margin-top: -1580px;
            overflow: hidden;
            width: 554px;
        }

        .bms {
            overflow: hidden;
            width: 554px;
        }

        .baoming .bms p {
            font-size: 26px;
            color: white;
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
            border-radius: 20px;
            text-indent: 1em;
            /*padding-left: 10px;*/
        }

        .form input.btn {
            width: 554px;
            height: 72px;
            border: none;
            display: block;
            margin-top: 45px;
            background: url("/webpage/chphone/cms/public/images/anniu.png");
        }

        .main_1 {
            position: absolute;
            margin-top: -1100px;
        }

        .foot {
            text-align: center;
            height: 80px;
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
<!--图片-->
<div class="main_1">
    <img src="/webpage/chphone/cms/public/images/main_1.png" alt="" style="display: block">
</div>
<!--电话-->
<div class="foot">
    <a href="" class="yjbo" style="display:block">
        <img src="/webpage/chphone/cms/public/images/tel_2.png" alt="">
        <span>一键拨打</span></a>
</div>
</body>
<script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
<script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
<!-- <script src="/webpage/chphone/cms/public/js/validate.js"></script> -->
<script language="javascript" type="text/javascript">
    $(".main").css("width", $(window).width());
    isAndIos();
    $("#submit").click(function () {
        var name = $("#name").val();
        if (!name) {

            alert("请输入姓名！");
            $("#name").focus();
            return false;
        }

        var phone = $("#phone").val();
        if (!phone) {
            alert("请输入电话！");
            $("#phone").focus();
            return false;
        }
        var source = $("#source").val();
        // var p=/1[0-9]{10}/;
        var p = /^1[3|4|5|7|8]\d{9}$/;
        if (!p.exec(phone)) {
            alert("请输入正确的电话");
            $("#phone").val('').focus();
            return false;
        }
        $.post('/index.php/Ch/Mcenter/ParkYifubm/baomingadd', {phone: phone, name: name, source: source},
            function (msg) {
                if (msg == "ok") {
                    $(".tank").show();
                    $(".tan p").html("");
                    $(".tan p").html("报名成功");
                    $(".guan").click(function () {
                        $(".tank").hide();
                        var source = $("#source").val();
                        location.href = "/index.php/Ch/Cms/ParkYifu/index/source/" + source;
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
    })
</script>
<!--百度流量监测-->
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?7f23d49aa66614d8c13f9e1203ddc2ac";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--判断安卓和ios,进行拨号-->
<script type="text/javascript">
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
    //alert('是否是Android：'+isAndr
    // oid);
    if (isAndroid == true) {
        $(".yjbo").attr("href", "tel:4008198181");
    } else if (isiOS == true) {
        $(".yjbo").attr("href", "tel:4008198181,610956")
    }
</script>
</html>