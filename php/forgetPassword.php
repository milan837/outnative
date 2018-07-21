<?php
include "../class/Database.php";
include "../class/User.php";
include "../class/session.php";
include "../class/UserCheck.php";

$db=new Database();
$db->connect();
$session=new Session();

$method=trim($_POST['method']);
if($method == "check_email"){
	$email=trim($_POST['email']);
	$check=UserCheck::emailExist($email);
	if($check == true){
		$session->set("myUsername",$email);
		$codeSend=UserCheck::sendForgetPasswordCode($email);
		if($codeSend == true){
			echo "exist";
		}
	}else{
		echo "not_exist";
	}
}else if($method == "check_code"){
	$code=trim($_POST['code']);
	$email=$session->get("myUsername");
	$query=$db->query("select * from `user_login` where email='$email'");
	$row=mysql_fetch_array($query);
	if($row['forget_password_code'] == $code){
		$session->set("username",$email);
		$session->delete("myUsername");
		echo "code_match";		
	}else{
		echo "code_donot_match";
	}
}else if($method == "change_password"){
	$newPassword=md5(trim($_POST['newPassword']));
	$email=$session->get("username");
	if(isset($email)){
		$query=$db->query("update `user_login` set password='$newPassword' where email='$email'");
		$session->set("password",$newPassword);
	    echo "change";
	}else{
		echo "sorry oops";
	}
	
}
?>