<?php 
/* -- login code for index.php --*/
//php folder top include files code 
include "../class/Database.php";
include "../class/session.php";
include "../class/UserCheck.php";

$db=new Database();
$db->connect();

$fname=mysql_real_escape_string(stripslashes(trim($_POST['fname'])));
$lname=mysql_real_escape_string(stripslashes(trim($_POST['lname'])));
$email=mysql_real_escape_string(stripslashes(trim($_POST['email'])));
$password=mysql_real_escape_string(stripslashes(md5(trim($_POST['password']))));
$position=mysql_real_escape_string(stripslashes(trim($_POST['position'])));
$register_date=date('Y-m-d');

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($position)){
	if(UserCheck::emailExist($email) == true){
		echo "email already exist";
	}else{
		$query_signup=mysql_query("INSERT INTO `user_login`(email,password,fname,lname,position,register_date) VALUES('$email','$password','$fname','$lname','$position','$register_date')"); 
		if(UserCheck::sendVerificationCode($email) == true){
			$session = new Session();
			$session->set("username",$email);
			$session->set("password",$password);
		echo "signup";
		}
	}
}
?>