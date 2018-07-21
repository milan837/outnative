<?php
include "../class/Database.php";
include "../class/User.php";
$db=new Database();
$db->connect();

$query=$db->query("select * from `user_login` limit 20");
$resopnse=array();
while($row=mysql_fetch_array($query)){
	$user=new User($row['user_id']);
	array_push($resopnse, array(
	"user_id"=>$user->id,
	"username"=>$user->username(),
	"email"=>$user->email(),
	"profile_picture"=>$user->profilePicture("small"),
	"followers"=>$user->followers(),
	"following"=>$user->following(),
	"views"=>$user->profileViews()
	));
}
echo json_encode(array("response_data"=>$resopnse));
?>