<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

$_GET = abacaAddslashes_index($_GET);
$_POST = abacaAddslashes_index($_POST);
@$_REQUEST = abacaAddslashes_index($_REQUEST);
@$_SESSION = abacaAddslashes_index($_SESSION);

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !'); 
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
//定义公共文件
define('COMMON_PATH','./Application/Common/'); 
// 定义应用目录
define('APP_PATH','./Application/'); 
// 引入ThinkPHP入口文件
require './Engine/ThinkPHP.php'; 
// 亲^_^ 后面不需要任何代码了 就是如此简单

function remove_xss_index($val) {
	// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
	// this prevents some character re-spacing such as <java\0script>
	// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
	// $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

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
function abacaAddslashes_index($var) {
	if (! get_magic_quotes_gpc ()) {
		if (is_array ( $var )) {
			foreach ( $var as $key => $val ) {
				if($key != 'content'){
					$var[$key] = abacaAddslashes_index ( $val );	
				}else{
					$var[$key] = $val;
				}
			}
		} else {
			$var = addslashes ( $var );
			$var = remove_xss_index ( $var );
			$var = dowith_xss_index ( $var );
			$var = dowith_xss2_index ( $var );
		}
	}
	return $var;
}


// 过滤mysql关键字
function dowith_xss_index($str){
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
function dowith_xss2_index($str){
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