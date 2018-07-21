<?php
include "includeCode.php";
include "../class/UserCheck.php";


//getting the date 
$friendId = mysql_real_escape_string(stripslashes(trim($_POST['follow_id'])));
$user_id=$user->id;
if(!empty($friendId)){
   if(UserCheck::already_follow($user_id,$friendId) == 0){
	  UserCheck::follow($user_id,$friendId);
	}else if(UserCheck::already_follow($user_id,$friendId) == 1){
	  UserCheck::unfollow($user_id,$friendId);
	}
}else{
echo "empty";
}
?>