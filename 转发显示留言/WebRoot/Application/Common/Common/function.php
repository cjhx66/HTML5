<?php
//公共函数

 /**
 * getGroupNameByUserId 通过传进来的id来查出该用户所属的角色
 * @param 接受一个参数id，返回所属角色名
 **/
 
 function getGroupNameByUserId($id) {
 	$RoleUser = M("Users");
 	$roleIdList = $RoleUser->where("id=$id")->find();
	//dump($roleIdList);die;
 	$roleId = $roleIdList['rID'];
 	if ($roleId == 0) {
 		return '无权限组';
 	} 
 	$dao = D("Role");
    $list = $dao->field('id,rname')->select();//findAll(array('field' => 'id,rname'));
    foreach ($list as $vo) {
    	$nameList [$vo ['id']] = $vo ['rname'];
    }
    $name = $nameList [$roleId];
    return $name;
}


/**
 * getNameByWebId 通过传进来的id来查出该id所属站点的名字
 * @param 接受一个参数id，返回所属站点名
 **/

function getNameByWebId($id) { 
	
	$dao = D("Website");
    $list = $dao->field('id,name')->select();//findAll(array('field' => 'id,rname'));
    foreach ($list as $vo) {
    	$nameList [$vo ['id']] = $vo ['name'];
    }
    $name = $nameList [$id];
    return $name;
}


/**
 * getNameByClassId 通过传进来的id来查出该id所属栏目的名字
 * @param 接受一个参数id，返回所属栏目名
 **/

function getNameByClassId($id) {  
	$dao = D("Class");
    $list = $dao->field('id,name')->select();//findAll(array('field' => 'id,rname'));
    foreach ($list as $vo) {
    	$nameList [$vo ['id']] = $vo ['name'];
    }
    $name = $nameList [$id];
    return $name;
}


/**
 * getCate 通过传进来的pid，和language，来递归栏目，从pid=0开始，一直递归到最后，
 * @param 接受参数pid,和language， 返回一个数组，
 **/
function getCate($pid = 0){ 
	$sql = "select * from cms_lclass where  pid=".$pid;
	$res = mysql_query($sql); 
	if($res){
		while($row = mysql_fetch_assoc($res)){
			$categories[] = $row;
		}
	}  
	if(0 < count($categories)){
		for($i = 0; $i < count($categories); $i++){
			$categories[$i]['child'] = getCate($categories[$i]['id']);
		}

	}  
	return $categories;
}
function Cate($pid = 0){ 
	$sql = "select * from cms_gclass where  pid=".$pid;
	$res = mysql_query($sql); 
	if($res){
		while($row = mysql_fetch_assoc($res)){
			$categories[] = $row;
		}
	}  
	if(0 < count($categories)){
		for($i = 0; $i < count($categories); $i++){
			$categories[$i]['child'] = getCate($categories[$i]['id']);
		}

	}  
	return $categories;
}		

/**
 * SendMail  发送邮件  
 * @param    接受参数(要接收邮件的地址，标题，发送的内容)
 **/	
function SendMail($address,$title,$message){ 
    vendor('PHPMailer.class#phpmailer');// 
    $mail=new PHPMailer(); 
    // 设置PHPMailer使用SMTP服务器发送Email 
    $mail->IsSMTP(); 
    // 设置邮件的字符编码，若不指定，则为'UTF-8' 
    $mail->CharSet='UTF-8'; 
    // 添加收件人地址，可以多次使用来添加多个收件人 
    $mail->AddAddress($address); 
    // 设置邮件正文 
    $mail->Body=$message; 
    // 设置邮件头的From字段。 
    $mail->From='wlong9136@163.com';  
    // 设置发件人名字 
    $mail->FromName='LilyRecruit'; 
    // 设置邮件标题 
    $mail->Subject=$title; 
    // 设置SMTP服务器。 
    $mail->Host="smtp.163.com"; 
    // 设置为"需要验证" 
    $mail->SMTPAuth=true; 
	$mail->IsHTML ( true ); //是否支持HTML邮件
    // 设置用户名和密码。 
	$mail->Username='wlong9136@163.com'; 
	$mail->Password="wlong+4837"; 
    // 发送邮件。 
	return($mail->Send()); 
}

// 生成订单号函数
function do_order(){
	$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
	$orderSn = $yCode[intval(date('Y')) - 2014] . strtoupper(dechex(date('i'))) . date('s') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
	return $orderSn;
}


function remove_xss($val) {
   		// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
   		// this prevents some character re-spacing such as <java\0script>
   		// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
		$val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

   		// straight replacements, the user should never need these since they're normal characters
  		 // this prevents like <IMG SRC=@avascript:alert('XSS')>
		$search = 'abcdefghijklmnopqrstuvwxyz';
		$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$search .= '1234567890!@#$%^&*()';
		$search .= '~`";:?+/={}[]-_|\'\\';
		for ($i = 0; $i < strlen($search); $i++) {
      		// ;? matches the ;, which is optional
      		// 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

     		// @ @ search for the hex values
		    $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
		    // @ @ 0{0,7} matches '0' zero to seven times
		    $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
		}

	   	// now the only remaining whitespace attacks are \t, \n, and \r
		$ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
		$ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
		$ra = array_merge($ra1, $ra2);

   		$found = true; // keep replacing as long as the previous round replaced something
   		while ($found == true) {
		   	$val_before = $val;
		   	for ($i = 0; $i < sizeof($ra); $i++) {
		   		$pattern = '/';
		   		for ($j = 0; $j < strlen($ra[$i]); $j++) {
		   			if ($j > 0) {
		   				$pattern .= '(';
		   					$pattern .= '(&#[xX]0{0,8}([9ab]);)';
		   					$pattern .= '|';
		   					$pattern .= '|(&#0{0,8}([9|10|13]);)';
		   					$pattern .= ')*';
					}
					$pattern .= $ra[$i][$j];
				}
				$pattern .= '/i';
	         	$replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
	        	$val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
	        	if ($val_before == $val) {
		            // no replacements were made, so exit the loop
		         	$found = false;
	        	}
	     	}
	 	}
		return $val;
	}

	// 防注入
	function abacaAddslashes($var) {
		// var_dump($var);exit();
		if (! get_magic_quotes_gpc ()) {

			if (is_array ( $var )) {
				foreach ( $var as $key => $val ) {
					if($key != 'content'){
						$var[$key] = abacaAddslashes ( $val );	
					}else{
						$var[$key] = $val;
					}
				}
			} else {
				$var = addslashes ( $var );
				$var = remove_xss ( $var );
				$var = dowith_xss ( $var );
				$var = dowith_xss2 ( $var );
			}
		}
		// var_dump($var);exit();
		return $var;
	}


	// 过滤mysql关键字
	function dowith_xss($str){
		$str = str_replace("execute","",$str);
		$str = str_replace("update","",$str);
		$str = str_replace("count","",$str);
		$str = str_replace("chr","",$str);
		$str = str_replace("mid","",$str);
		$str = str_replace("master","",$str);
		$str = str_replace("truncate","",$str);
		$str = str_replace("char","",$str);
		$str = str_replace("declare","",$str);
		$str = str_replace("select","",$str);
		$str = str_replace("create","",$str);
		$str = str_replace("delete","",$str);
		$str = str_replace("insert","",$str);
		$str = str_replace("=","",$str);
		$str = str_replace("%20","",$str);
		return $str;
	}

	// 过滤特殊字符
	function dowith_xss2($str){
		$str = str_replace("?","",$str);
		$str = str_replace("script","",$str);
		$str = str_replace("<","＜",$str);
		$str = str_replace(">","＞",$str);
		$str = str_replace("(","",$str);
		$str = str_replace(")","",$str);
		$str = str_replace("'","＇",$str);
		$str = str_replace('"',"＂",$str);
		$str = str_replace('\'','＇',$str);
		$str = str_replace('\"','＂',$str);
		$str = str_replace('#',"#",$str);
		$str = str_replace('\\',"＼",$str);
		$str = str_replace('.cgi',"",$str);
		$str = str_replace('.exe',"",$str);
		return $str;
	}

	// 后台包含文件，过滤特殊字符
	function dowith_include($str){
		$str = str_replace("?","",$str);
		$str = str_replace("<","",$str);
		$str = str_replace(">","",$str);
		$str = str_replace("%","",$str);
		$str = str_replace("+","",$str);
		$str = str_replace("(","",$str);
		$str = str_replace(")","",$str);
		$str = str_replace(":","",$str);
		$str = str_replace("javascript","",$str);
		$str = str_replace("script","",$str);
		$str = str_replace("iframe","",$str);
		$str = str_replace("alert","",$str);
		return $str;
	}


?>