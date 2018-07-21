<?php 

/* -- login code for index.php --*/
//php folder top include files code 
include "../class/Database.php";
include "../class/session.php";

$db=new Database();
$db->connect();

$username=mysql_real_escape_string(stripslashes(trim($_POST['myUsername'])));
$password=mysql_real_escape_string(stripslashes(md5(trim($_POST['myPassword']))));

if(!empty($username) && !empty($password)){
	$query=$db->query("select * from `user_login` where email='".$username."' and password='".$password."'");
	if(mysql_num_rows($query) == 1){
		$row=mysql_fetch_array($query);
		$session=new Session();
		$session->set("username",$username);
		$session->set("password",$password);
		if($row['active'] == 0){
			echo "not active";
		}else{
			echo "loggedin";
		}
	}else{
		echo "Please enter corect username/password";
	}
}else{
	echo "empty variable";
}
?>