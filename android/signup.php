<?php
include "../class/Database.php";
$db=new Database();
$db->connect();

$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$email=trim($_POST['email']);
$password=md5(trim($_POST['password']));

$signupQuery=$db->query("insert into `user_login`(fname,lname,email,password) values('$fname','$lname','$email','$password')");
if($signupQuery){
	//echo "insert";
}
?>