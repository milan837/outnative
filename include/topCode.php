<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<?php
include "class/Database.php";
include "class/Session.php";
include "class/User.php";
include "class/Comment.php";
include "class/Message.php";
include "class/PostDetails.php";

$db = new Database();
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
//$session->destroy();
?>