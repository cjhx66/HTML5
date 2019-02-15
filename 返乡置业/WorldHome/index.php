<?php
    require_once "../jssdk.php";
    $jssdk = new JSSDK("xxx", "xxxx");
    $signPackage = $jssdk->GetSignPackage();
    $url=$signPackage["url"];
    $name = $jssdk->_userInfoAuth($url);
    
    $array=explode(',', $name);
    $imgurl=$array[1];
    $uname=$array[0];
    $header = array(   
        'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:45.0) Gecko/20100101 Firefox/45.0',    
        'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',    
        'Accept-Encoding: gzip, deflate',);
        $url=$imgurl;
        $curl = curl_init();curl_setopt($curl, CURLOPT_URL, $url);curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);$data = curl_exec($curl);$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);curl_close($curl);
        if ($code == 200) {//把URL格式的图片转成base64_encode格式的！    
        $imgBase64Code = "data:image/jpeg;base64," . base64_encode($data);
        }
        $img_content=$imgBase64Code;//图片内容
        //echo $img_content;exit;
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_content, $result))
        { 
        $type = $result[2];//得到图片类型png?jpg?gif? 
        $new_file = "./images/cs.{$type}"; 
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $img_content))))
        {}} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>世界再大，也要回家</title>
</head>
<body></body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=IDtpu8UOQyM21WIXth8KCIDfwT4nrFeP"></script>
<script>
    var userInfo="<?php echo $name;?>";
    if(userInfo.indexOf(",")!=-1){
        var data=userInfo.split(",")[0];
        localStorage.setItem("info",data);
        window.location.href="main.php";
    }
</script>
</html>