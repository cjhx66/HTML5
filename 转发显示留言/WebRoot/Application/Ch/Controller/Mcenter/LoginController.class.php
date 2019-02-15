<?php
/**
 *简要说明	
 * @package 		Ch/Mcenter	            //所属包
 * @author 		    wanglin<1210321011@qq.com>	//作者王琳
 * @version 		V1.0	                    //版本号  
 * @firstday 	    2014/09/08	                //最先写的日期
 * @lastmodifide	2014/09/09	                //最后修改日期
 */
namespace Ch\Controller\Mcenter;
use Think\Controller;

//注册类
class LoginController extends ComController{ 

  	//用户退出登录
	public function logout(){
		unset($_SESSION['memberid']);
		unset($_SESSION['membername']); 
		$this->assign("jumpUrl",__MODULE__."/Mcenter/Index/index");
		$this->success("成功退出");
	}
	
	//修改密码页面
	public function modmima(){
		$id=$_SESSION['memberid']; 
		if(empty($id)){
			$this->assign('jumpUrl',__MODULE__."/Mcenter/Login/login"); 
			$this->success('请先登录');
		}
		$this->display();
	}
	
	//ajax验证原密码是否正确
	public function passwordcheck(){
		if(IS_AJAX){
			$mod	=	M("Member");
			$name	=	$_SESSION["membername"];  
			$list	=	$mod->where("name='$name'")->find(); 
			$data['msg']    = '√';
			$data['status'] = 1;
			if($list['pass']	!==	md5($_POST['password'])){
				$data['msg']    = '×';
				$data['status'] = 0;
			}
			$this->ajaxReturn($data);
		}
	}
	//修改密码方法
	public function modmimaff(){
		$id=$_SESSION['memberid']; 
		$obj = M('Member');
		$arr = $obj->find($id);  
					$obj->pass = md5($_POST['password1']);
					if($obj->save()){
						$this->assign('jumpUrl', __MODULE__."/Mcenter/Login/login"); 
						$this->success('修改成功,请重新登录');
					}else{
						$this->error('修改失败'); 
					}
				 
	}
	
	//登陆页面
	public function login(){
		 $this->display();
	}
	
	
	 //ajax验证用户名，密码，验证码 
	//用户名验证
	public function lnamecheck(){
		if(IS_AJAX){
			$mod	=	M("Member");
			$name	=	$_POST["name"]; 
			$list	=	$mod->where("name='$name'")->find(); 
			$data['msg']    = '√';
			$data['status'] = 1;			
			if (!$list){
				$data['msg']    = '×';
				$data['status'] = 0;
			}
			$this->ajaxReturn($data);
		}
	}
	
	
	//密码验证
	public function lmimacheck(){
		if(IS_AJAX){
			$mod	=	M("Member");
			$name	=	$_POST["name"];  
			$list	=	$mod->where("name='$name'")->find();
			$data['msg']    = '√';
			$data['status'] = 1;
			if($list['pass']	!==	md5($_POST['password'])){
				$data['msg']    = '×';
				$data['status'] = 0;
			}
			$this->ajaxReturn($data);
		}
	}
	
	
	//验证码验证
	public function lcodecheck(){
		if(IS_AJAX){
			$yzm=$_POST['code'];
			$verify = new \Think\Verify();
			$data['msg']    = '√';
			$data['status'] = 1;			
			if(!$verify->check($yzm)){
				$data['msg']    = '×';
				$data['status'] = 0;
			}
			$this->ajaxReturn($data);
		}
	}
	
	
	//登录
	public function login_y(){
		$user=M('Member'); 
		$name=$_POST['name'];
		$pass=$_POST['password'];
		$yzm=$_POST['code']; 
		$list=$user->where("name='$name'")->find();
		//1，正常   2，未激活   3，锁定
		if($list['status']==3){
			$this->error("该会员已被锁定");
		}else if($list['status']==2){
			$this->error("账户还未激活");
		}else{ 
				$_SESSION['memberid']=$list['id'];
				$_SESSION['membername']=$list['name'];
				$_SESSION['logtype']=1;
				if(isset($mdl) && $mdl=='on'){
					$value=base64_encode($list['id'].'#'.rand(100,999999));
					setcookie('autologin',$value,7*24*3600+time(),'/');
				} 
				/* $User = A("Hyzx");
				$User->addshopcar(); */
				$this->success("登录成功",__MODULE__."/Mcenter/Index");
		 
	}}
	 

	//新浪微博登陆
	public function sinaLogin(){
		$user=M('member');
		$nickname=$_POST['nickname'];
		$logintype=$_POST['logintype'];
		$sinaid=$_POST['sinaid'];
		$status=0;
		$data["nickname"]=$nickname;
		$data["sinaid"]=$sinaid;
		$data["logintype"]=$logintype;
		$data["status"]=$status;
		$list=$user->where("sinaid=$sinaid")->find();
		if(!$list){
			$res=$user->add($data);
		}
		$_SESSION['uid']=$sinaid;
		$_SESSION['logtype']=2;
		$_SESSION['nickname']=$nickname;
		$_SESSION['uname']=$nickname;
	}

	//qq登陆
	public function qqLogin(){
		// echo 1;
		$user=M('member');
		$nickname=$_POST['nickname'];
		$logintype=$_POST['logintype'];
		echo $qqid=$_POST['qqid'];
		// $qqid="5CAE5989DD3C83DB0EC0229F07DDEC03";
		$status=0;
		$data["nickname"]=$nickname;
		$data["qqid"]=$qqid;
		$data["logintype"]=$logintype;
		$data["status"]=$status;
		$list=$user->where("qqid='$qqid'")->find();
		if(!$list){
			$res=$user->add($data);
		}
		$_SESSION['uid']=$qqid;
		$_SESSION['logtype']=3;
		$_SESSION['nickname']=$nickname;
		$_SESSION['uname']=$nickname;
	}
	 
	
	
	
	
	
	
	
	
	
	  
	//注册页面
	  public function  zc(){   
		$this->display();  
	 }  
	//ajax验证邮箱，用户名，密码，验证码 
	//邮箱格式验证
	public function cemailcheck(){
		$email = $_POST['email'];
		$p = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
		if(preg_match($p, $email)){
			echo '正确';
		}else{
			echo '不正确';
		}
	}
	//邮箱验证
	public function emailcheck(){
		if(IS_AJAX){
			$mod	=	M("Member");
			$email	=	I('post.email', '', 'htmlspecialchars');  
			$arr = array('email' => $email);
			$list	=	$mod->where($arr)->find();  
					
			if ($list){
				$data['msg']    = '该邮箱已存在请换一个';
				$data['status'] = 0;
			}else{
				$data['msg']    = '恭喜，该邮箱可用';
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
		}
	}
	//用户名格式验证
	public function cnamecheck(){
		$name = $_POST['name'];  
	    if(mb_strlen($name)<4 || mb_strlen($name)>16){
			echo '不正确';
		}else{
			echo '正确';
		}   
	}
	//用户名验证
	public function namecheck(){
		if(IS_AJAX){
			$mod	=	M("Member"); 
			$name   =   $_POST['name'];
			$arr    =   array('name' => $name);
			$list	=	$mod->where($arr)->find();  
					
			if ($list){
				$data['msg']    = '该用户名已被注册，请换一个';
				$data['status'] = 0;
			}else{
				$data['msg']    = '恭喜，该有户名可用';
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
		}
	}
	
	//密码格式验证
	public function	cpassword1check(){
		$name = $_POST['password1'];  
	    if(mb_strlen($name)<6 || mb_strlen($name)>16){
			echo '不正确';
		}else{
			echo '正确';
		} 
	}
	  
	//验证码验证
	public function codecheck(){
		if(IS_AJAX){
			$yzm=$_POST['code'];
			$verify = new \Think\Verify();
			$data['msg']    = '√';
			$data['status'] = 1;			
			if(!$verify->check($yzm)){
				$data['msg']    = '×';
				$data['status'] = 0;
			}
			$this->ajaxReturn($data);
		}
	}	
	
	//注册的方法 
	public function do_zc(){
		$mod=M("Member");
		$email=$_POST["email"];
		$name=$_POST["name"]; 
		$pass=md5($_POST['password1']);
		 
		$data['pass']=$pass; 
		$data['name']=$name;
		$data['email']=$email;  
		$data['status']=2;  
		$data["writetime"]=time(); 
		$sendemail="http://mail.".substr($email,strripos($email,'@')+1);
	 
			if($mod->add($data)){ 
				$x=md5($name."+".$pass);  
				$String = base64_encode($name."#".$x);
				$html="尊敬的".$name."您好！<br/> 你使用了本站提供的邮件激活功能，如果你确认此功能是你启用的，请点击下面的链接，进行账户激活。<br/>";
				$html.= "<a href=http://localhost:801/index.php/Ch/Mcenter/Login/lifeok?key=$String target=_blank>http://localhost:801/index.php/Ch/Mcenter/Login/lifeok?key=$String</a>";
					 $address=$email;
					 $title="账户激活";
					 $message=$html;
					if(!SendMail($address,$title,$message)){
						header("Content-Type: text/html; charset=utf-8"); 
						echo '<script>alert("提交失败了！");history.go(-1);</script>';
					} else {
						header("Content-Type: text/html; charset=utf-8");
						$this->assign("jumpUrl",$sendemail);
						$this->success("注册成功，请您登录邮箱进行账户激活,页面跳转中...."); 
					}
			}else{
				$this->error("注册失败");
			} 
	}

	
	//账户激活
	public function lifeok(){
		$array = explode('#',base64_decode($_GET['key'])); 
		$name=$array['0'];
		$mix=$array['1'];
		$obj=M('member'); 
		$list=$obj->where("name='$name'")->find();
		// $data['status']=0;
		$pass=$list['pass'];
		$id=$list['id']; 
		$checkCode = md5($name.'+'.$pass);
		if( $mix === $checkCode ){  
			if($vo=$obj->where("id=$id")->setField('status',1)){
				$this->assign("jumpUrl",__MODULE__."/Mcenter/Login/login");
				$this->success("激活成功，去登录吧"); 
			}else{
				$this->error("激活失败，请联系管理员");
			}
		}else{
			   //给出定义错误页面
			   $this->error("出错了，，，");
		}
	}
	
	
	//找回密码页面
	public function findpass(){ 
		$this->display();
	}
	
	
	//找回密码的邮箱ajax验证
	public function findemailcheck(){
		if(IS_AJAX){
			$mod	=	M("Member");
			$email	=	I('post.email', '', 'htmlspecialchars');  
			$arr = array('email' => $email);
			$list	=	$mod->where($arr)->find();  
					
			if ($list){
				$data['msg']    = '√';
				$data['status'] = 0;
			}else{
				$data['msg']    = '该邮箱不存在';
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
		}
	}
	
	
	//找回密码的方法
	public function pass(){ 
	$member=M('member');
	$email = trim($_POST['email']);
	$list=$member->where("email='$email'")->find();
	//从数据库查找输入的用户名
	$l_name=$list['name'];
	$l_pass=$list['pass'];
	$l_email=$list["email"];
	$email="http://mail.".substr($l_email,strripos($l_email,'@')+1);//将获取的邮箱进行拼装
	//加密用户名和密码的拼接字符串
	$x=md5($l_name."+".$l_pass);  
	//用base64_encode加密，
	$String = base64_encode($l_name."#".$x);
	/* var_dump($String);
	die; */
	$html="尊敬的".$l_name."您好！<br/> 你使用了本站提供的密码找回功能，如果你确认此密码找回功能是你启用的，请点击下面的链接，按流程进行密码重设。<br/>";
	$html.= "<a href=http://localhost:801/index.php/Ch/Mcenter/Login/resetok?key=$String target=_blank>http://localhost:801/index.php/Ch/Mcenter/Login/resetok?key=$String</a>";
		 $address=$list['email'];
		 $title="密码找回";
		 $message=$html;
		if(!SendMail($address,$title,$message)) {
			header("Content-Type: text/html; charset=utf-8"); 
			echo '<script>alert("提交失败了！");history.go(-1);</script>';
		} else {
			header("Content-Type: text/html; charset=utf-8");
			$this->assign("jumpUrl",$email);
			$this->success("邮件已发送至您的邮箱，请您登录邮箱,页面跳转中...."); 
		}
	}
	
	//找回密码重设密码的页面
	public function resetok(){
		$array = explode('#',base64_decode($_GET['key'])); 
		$name=$array['0'];
		$this->assign('name',$name);
		$this->display();
	}	
	
	
	//找回密码重设密码的方法
	public function setok(){
		$name=$_POST['name'];
		$pass=$_POST['password1'];
		$obj=M('member');   
		$list=$obj->where("name='$name'")->find();
		$id=$list['id'];
		$data['pass']=md5($pass);
		if(!$list){
			$this->error("该用户不存在");
		}else{
			$vo=$obj->where("id=$id")->save($data);
			if($vo>0){
				$this->assign('jumpUrl',__MODULE__."/Mcenter/Login/login"); 
				$this->success("密码修改成功,请重新登录");
			}else{
				$this->error("密码修改失败");
			}
		}
	}
	
}