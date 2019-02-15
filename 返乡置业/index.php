<?php
    require_once "jssdk.php";
    $jssdk = new JSSDK("wx7bef8f6f623a60b1", "d3870131aa9ffdf3d8004a88b1c9822a");
    $signPackage = $jssdk->GetSignPackage();
    $url=$signPackage["url"];
    $name = $jssdk->_userInfoAuth($url);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>第一次被识破重庆人真身的日子</title>
    <!-- <link rel="stylesheet" href="css/index.css">  -->
</head>
<body>
    <!-- <header>
        <img src="images/top.png" alt="" class="h_strat">
        <img src="images/time.png" alt="" class="h_time">
        <img src="images/jiesuo.png" alt="" class="jiesuo">
    </header> -->
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=IDtpu8UOQyM21WIXth8KCIDfwT4nrFeP"></script>
<!-- <script src="js/resetpage.js"></script> -->
<script>
    var userInfo="<?php echo $name;?>";
    var data={};
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: '<?php echo $signPackage["timestamp"];?>',
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"]?>',
        jsApiList: [
            'getLocation'
        ]
    });
    wx.ready(function () {
        // alert(location.href.split('#')[0]);
        wx.getLocation({
            type: 'wgs84', 
            success: function (res) {
                // alert("获取地理位置");
                latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。             
                var map = new BMap.Map("allmap");
                var point = new BMap.Point(longitude,latitude);
                var geoc = new BMap.Geocoder();
                geoc.getLocation(point, function (rs) {
                    // alert("调用百度地图");
                    var addComp = rs.addressComponents;
                    var city=addComp.city;
                    // alert("第一次获取的"+city);
                    data['city']=city;
                    if(userInfo.indexOf(",")!=-1){
                        // alert("有用户信息");
                        data['user']=userInfo.split(",")[0];
                        data['src']=userInfo.split(",")[1];        
                        data = JSON.stringify(data);
                        localStorage.setItem("info",data);
                        console.log(localStorage.getItem("info"));
                        window.location.href="main.php";
                    }
                });
            },
            cancel: function (res) {
                alert('用户拒绝授权获取地理位置');
                if(userInfo.indexOf(",")!=-1){
                    data['city']="重庆";
                    data['user']=userInfo.split(",")[0];
                    data['src']=userInfo.split(",")[1];        
                    data = JSON.stringify(data);
                    localStorage.setItem("info",data);
                    window.location.href="main.php";
                }
            }
        });
    })
    wx.error(function(res){
        alert(res);
    });
</script>
</html>