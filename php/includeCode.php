<?php
include "../class/Database.php";
include "../class/User.php";
include "../class/session.php";

$db=new Database();
$db->connect();

//checking the session
$session = new Session();
$myUsername=$session->get("username");
$myPassword=$session->get("password");

if(isset($myUsername) && isset($myPassword)){
	$selectId = $db->query("select * from `user_login` where email='".$myUsername."'");
	if($row = mysql_fetch_array($selectId)){
		 $userId = $row['user_id'];
		 $user = new User($userId);
	}
}else{
	header("location: index.php");
}  

?>