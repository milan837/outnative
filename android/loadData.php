<?php
include "../class/Database.php";
include "../class/User.php";
$db=new Database();
$db->connect();

$userId=trim($_POST['userId']);
$query=$db->query("select * from `user_login` where user_id='$userId'");
if(mysql_num_rows($query) >= 1){
	$user=new User($userId);
echo "
Name: ".$user->username()."<br>
E-mail: ".$user->email()."<br>
Position: ".$user->position()."<br>
Sex: ".$user->sex()."<br>
College: ".$user->college()."<br><br>
";
}else{
	echo "Sorry User do not found";
}

?>