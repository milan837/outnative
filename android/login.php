<?php
include "../class/Database.php";
$db=new Database();
$db->connect();

$username=trim($_POST['username']);
$password=md5(trim($_POST['password']));
	$loginQuery=$db->query("select * from `user_login` where email='$username' and password='$password'");
	if(mysql_num_rows($loginQuery) == 1){
		echo "Login sucessful ".$username;
	}else{
		echo "Incorect Username/password";
	}
?>