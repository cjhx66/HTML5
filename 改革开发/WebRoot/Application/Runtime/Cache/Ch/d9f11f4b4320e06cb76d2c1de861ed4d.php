<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <script src="/webpage/chphone/cms/public/js/jquery-1.11.3.min.js"></script>
    <script src="/webpage/chphone/cms/public/js/resetpage.js"></script>
    <style>

        *{
            padding: 0;
            margin: 0;
        }
        .main{
            position: relative;
        }
        .baoming{
            background: none;
            /* padding: 60px 30px 150px 33px;
            margin-top: -1px; */
            position: absolute;
            font-weight: bold;
            left: 40px;
            margin-top: -725px;
            overflow: hidden;
            width: 554px;
        }
        .p1{
            display: block;
            color: #fff;
            height: 86px;
            line-height: 106px;
            font-size: 20px;
            float: left;
            margin-right: 10px;
        }
        .p2{
            display: block;
            color: #fff;
            height: 86px;
            line-height: 86px;
            font-size: 20px;
            float: left;
            margin-right: 10px;
        }
        .form input{
            display: block;
            width: 554px;
            height: 72px;
            border: none;
            background: #fff;
            font-size: 26px;
            float: left;
            outline: none;
        }
        .form input.btn{
            background: url(/webpage/chphone/cms/public/images/btn.png) no-repeat;
            width: 554px;
            height: 72px;
            border: none;
            display: block;
            margin-top: 75px;
        }
        .foot{
            text-align: center;
            height: 81px;
            line-height: 90px;
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
            font-size: 44px;
            text-decoration:none;
            font-weight: bold;
        }
        .foot img{
            width: 63px;
            height: 63px;
            margin-top: -15px;
            margin-right: 5px;
            vertical-align: middle;
        }
        .bms{
            overflow: hidden;
            margin-top: 10px;
            width: 554px;
        }
        #phone{
            margin-top: -20px;
        }
        .middle{
            width: 100%;
            height: 81px;
        }
    </style>
</head>
<body>
<div class="main">
    <img src="/webpage/chphone/cms/public/images/bg.png" alt="" style="display:block">
</div>
<div class="middle"></div>
<div class="baoming">
    <form action="" class="form">
        <input type="hidden" id="source" name="source" value="<?php echo ($source); ?>" />
        <div class="bms">
            <p class="p1">姓名:<p>
            <input type="text" id="name">
        </div>
        <div class="bms">
            <p class="p2">电话:<p>
            <input type="text" id="phone">
        </div>

        <input type="button" class="btn" id="submit">
    </form>
</div>
<div class="foot">
    <a href="" class="yjbo" style="display:block"><img src="/webpage/chphone/cms/public/images/tel1.png" alt="">
        一键拨打</a>
</div>
</body>
<script src="/webpage/chphone/cms/public/js/validate.js"></script>
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