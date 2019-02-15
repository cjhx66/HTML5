<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公园懿府</title>
    <script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
    <script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
    <script src="/webpage/chphone/cms/public/js/validate.js"></script>
    <style>

        *{
            padding: 0;
            margin: 0;
        }
        .main {
            position: relative;
        }
        .baoming{
            background: none;
            position: absolute;
            left: 46px;
            margin-top: -1580px;
            overflow: hidden;
            width: 554px;
        }
        .bms{
            overflow: hidden;
            width: 554px;
        }
        .baoming .bms p{
            font-size: 26px;
            color:white;
            padding-bottom: 15px;
        }

        .form input{
            display: block;
            width: 554px;
            height: 72px;
            border: none;
            background: #fff;
            font-size: 26px;
            outline: none;
            border-radius: 20px;
        }
        .form input.btn{
            width: 554px;
            height: 72px;
            border: none;
            display: block;
            margin-top: 45px;
            background: url("/webpage/chphone/cms/public/images/anniu.png");
        }
        .main_1{
            position: absolute;
            margin-top: -1100px;
        }
        .foot{
            text-align: center;
            height: 80px;
            background: #e83636;
            color: #fff;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        .foot a{
            display: inline-block;
            color: #fff;
            font-size: 32px;
            width:100%;
            height:100%;
            text-decoration:none;
            padding-top: 15px;
        }
        .foot img{
            width: 50px;
            height: 50px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="main">
    <img src="/webpage/chphone/cms/public/images/main.jpg" alt="" style="display: block">
</div>
<div class="baoming">
    <form action="" class="form">
        <input type="hidden" id="source" name="source" value="<?php echo ($source); ?>" />
        <div class="bms">
            <p class="p1">姓名:<p>
            <input type="text" id="name" >
        </div>
        <div class="bms">
            <p class="p2">电话:<p>
            <input type="text" id="phone">
        </div>
        <input type="button" class="btn" id="submit">
    </form>
</div>
<div class="main_1">
    <img src="/webpage/chphone/cms/public/images/main_1.png" alt="" style="display: block">
</div>
<div class="foot">
    <a href="" class="yjbo" style="display:block">
        <img src="/webpage/chphone/cms/public/images/tel1.png" alt="">
        <span>一键拨打</span></a>
</div>
</body>
<script language="javascript" type="text/javascript">
    $(".main").css("width",$(window).width());
    $("#submit").click(function(){
        validate($("#name"),$("#phone"),$("#source"),0,'/index.php/Ch/Mcenter/DemoCs/baoMingAdd',"Demo");
    });
    isAndIos();
</script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?66e0b0d6f26b6d76ea69c6e0f9b6cc0e";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</html>