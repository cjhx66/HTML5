<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小院春晚观众报名</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <link rel="icon" href="/webpage/chphone/cms/public/images/logoh.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/webpage/chphone/cms/public/images/logoh.png" type="image/x-icon"/>
    <script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        @font-face {
            font-family: LiXuKe;
            src: url('/webpage/chphone/cms/public/css/LiXuKe1.ttf');
        }

        input::-webkit-input-placeholder {
            font-size: 18px;
        }

        input:-moz-placeholder, textarea:-moz-placeholder {
            font-size: 18px;
        }

        input::-moz-placeholder, textarea::-moz-placeholder {
            font-size: 18px;
        }

        input:-ms-input-placeholder, textarea:-ms-input-placeholder {
            font-size: 18px;
        }

        body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            font-family: "PingFang SC Regilar", "Microsoft Yahei", Tahoma, Arial, Helvetica;
        }

        .content {
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        .num {
            font-family: LiXuKe;
            font-size: 90px;
            width:20%;
            height:90px;
            position: absolute;
            left: 43%;
            top: 20.1%;
            color: #ffe6af;
            text-align: center;
        }
        .num span{
            height:100%;
            display: inline-block;
        }

        .main {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .main img {
            height: 100%;
            width: 100%;
        }

        .baoming {
            background: none;
            position: absolute;
            top: 46%;
            margin-left: 150px;
            overflow: hidden;
            width: 340px;
        }

        .bms {
            overflow: hidden;
            padding-bottom: 3%;
        }

        .baoming .bms .p1 {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            padding-bottom: 1.5%;
        }

        .baoming .bms .remark {
            font-size: 14px;
            font-weight: normal;
        }

        .form input {
            display: block;
            width: 100%;
            height: 45px;
            border: 1px solid #ccc;
            font-size: 18px;
            outline: none;
            border-radius: 3px;
            text-indent: 0.2em;
            box-sizing: border-box;
        }

        .form input.btn {
            width: 100%;
            height: 47px;
            border: none;
            display: block;
            margin-top: 2%;
            background: url("/webpage/chphone/cms/public/images/btn.png") no-repeat;
        }
        .form label{
            width:49%;
            display: inline-block;
            height:25px;
        }
        .form .rde{
            display: inline-block;
            width:25px;
            height:25px;
            vertical-align: middle;
        }
        .form label span{
            margin-left: 10px;
        }
        .dialog {
            height: 100%;
            width: 640px;
            display: none;
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            margin: 0 auto;
            top: 0;
            z-index: 998;
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=1,startColorstr=#70000000,endColorstr=#70000000)";
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=1, startColorstr=#70000000, endColorstr=#70000000);
        }

        .tol {
            width: 400px;
            height: 200px;
            color: #000;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -200px;
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
            width: 70%;
            height: 45px;
            line-height: 45px;
            margin: 40px auto 0;
            border-radius: 10px;
            color: white;
        }

        @media only screen and (device-width: 375px) and (device-height: 812px) and        (-webkit-device-pixel-ratio: 3) {
            .num {
                left: 43%;
                top: 20.5%;
            }

            .bms {
                padding-bottom: 6%;
            }

            .baoming .bms .p1 {
                padding-bottom: 4%;
            }

            .form input.btn {
                padding-bottom: 8%;
            }
        }
    </style>
</head>
<body>
<div class="content">
    <div class="main"><img src="/webpage/chphone/cms/public/images/main.jpg" alt="" style="display: block"></div>
    <div class="baoming">
        <form action="" class="form">
            <div class="bms"><p class="p1">姓名：</p><input type="text" id="name" placeholder="姓名"></div>
            <div class="bms"><p class="p1">房号：</p><input type="text" id="room" placeholder="房号"></div>
            <div class="bms"><p class="p1">电话：</p><input type="text" id="phone" placeholder="电话"></div>
            <div class="bms"><p class="p1">报名人数：<span class="remark">(每家仅限三人)</span></p><input type="number" id="apply" placeholder="数字"></div>
            <div class="bms">
                <p class="p1">是否参加吃鸡大赛：<span class="remark">(一家仅有一个参赛名额)</span></p>
                <label for="yes"><input type="radio" id="yes" name="ide" value="1" class="rde" checked="checked" placeholder=""/><span>是</span></label>
                <label for="no"><input type="radio" id="no" name="ide" value="0" class="rde" placeholder="" /><span>否</span></label>
            </div>
            <input type="button" class="btn" id="submit"></form>
    </div>
    <div class="dialog">
        <div class="tol"><p class="ts"></p>
            <p class="close">我知道了</p></div>
    </div>
</div>
</body>
<script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
<script language="javascript" type="text/javascript">$(function () {
    $(".main").height($(window).height());
    $('input').on('keypress', function () {
        if (event.keyCode == 32) event.returnValue = false
    });
    function tisi(ele) {
        $(".dialog").fadeIn();
        $("body").height($(window).height()).css({"overflow-y": "hidden", "position": "fixed"});
        $(".close").click(function () {
            $(".dialog").fadeOut();
            $("body").height($(window).height()).css({"overflow-y": "visible", "position": "relative"});
            if (ele !== '') {
                $(ele).focus()
            }
        })
    }

    function post(msg) {
        if (msg == "ok") {
            $(".ts").html("报名成功");
            $(".dialog").fadeIn();
            $("body").height($(window).height()).css({"overflow-y": "hidden", "position": "fixed"});
            $(".close").click(function () {
                $(".dialog").fadeOut();
                $("body").height($(window).height()).css({"overflow-y": "visible", "position": "relative"});
                var random = Math.floor(Math.random() * 10);
                var lastNum = location.href.substr(location.href.length - 1, 1);
                if (lastNum == random) {
                    random = random + 1
                }
                window.location.href = "/index.php/Ch/Cms/XiaoYuan/index/" + random
            })
        }
        if (msg == "chongfu") {
            $(".ts").html("请勿重复提交");
            tisi()
        }
        if (msg == "error") {
            $(".ts").html("提交失败，请重新提交");
            tisi()
        }
    }

    $("#submit").click(function () {
        var name = $("#name").val();
        if (!name) {
            $(".ts").html("请输入姓名");
            tisi("#name");
            return false
        }
        var room = $("#room").val();
        if (!room) {
            $(".ts").html("请输入房号");
            tisi("#room");
            return false
        }
        var phone = $("#phone").val();
        if (!phone) {
            $(".ts").html("请输入电话");
            tisi("#phone");
            return false
        }
        var p = /^1[3|4|5|7|8]\d{9}$/;
        if (!p.exec(phone)) {
            $(".ts").html("请输入正确的电话");
            tisi("#phone");
            return false
        }
        var apply = $("#apply").val();
        if (!apply) {
            $(".ts").html("请输入报名人数");
            tisi("#apply");
            return false
        }
        var reg = /^[123]$/;
        if (!reg.exec(apply)) {
            $(".ts").html("请输入报名人数，最多3人");
            tisi("#apply");
            return false
        }
        var ide=$('input[name="ide"]:checked').val();
        $.post('/index.php/Ch/Mcenter/XiaoYuanbm/baomingadd', {
            phone: phone,
            name: name,
            room: room,
            apply: apply,
            ide:ide
        }, function (msg) {
            post(msg)
        })
    })
})</script>
</html>