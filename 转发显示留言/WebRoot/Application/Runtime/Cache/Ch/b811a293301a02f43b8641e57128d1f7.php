<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"/>
    <script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            position: relative;
        }

        #main {
            width: 100%;
            position: relative;
            overflow: hidden;
            background: url("/webpage/chphone/cms/public/images/main.jpg") no-repeat;
            background-size: 100% auto;
        }

        .main:after {
            content: "";
            display: block;
            /*margin-top: 1023.125%;*/
            margin-top: 1008%;
            /*margin-top: 863.908%;*/
        }

        .bm {
            position: absolute;
            left: 6%;
            /*margin-top: calc(863.908% - 535px);*/
            margin-top: calc(1008% - 230%);
            overflow: hidden;
            width: 88%;
        }

        .form input {
            display: block;
            width: 100%;
            height: 60px;
            border: none;
            background: #fff;
            font-size: 26px;
            outline: none;
            border-radius: 20px;
        }

        .bm .bms p {
            font-size: 26px;
            color: white;
            padding-bottom: 15px;
        }

        .form input.btn {
            border: none;
            display: block;
            margin-top: 45px;
            background: #cccc77;
            border-radius: 20px;
        }

        .img {
            position: absolute;
            left: 0;
            bottom: 0;
            /*margin-top: calc(1023.125% - 1015px);*/
            overflow: hidden;
            width: 100%;
            /*height: 1015px;*/
        }

        .img img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="main" id="main">
    <div class="bm">
        <form action="" class="form">
            <input type="hidden" id="source" name="source" value="">

            <div class="bms">
                <p class="p1">姓名:
                </p>
                <p>
                    <input type="text" id="name">
                </p></div>
            <div class="bms">
                <p class="p2">电话:
                </p>
                <p>
                    <input type="text" id="phone">
                </p></div>
            <input type="button" class="btn" id="submit">
        </form>
    </div>
    <div class="img">
        <img src="/webpage/chphone/cms/public/images/main_1.png" alt="">
    </div>
</div>
</body>
</html>