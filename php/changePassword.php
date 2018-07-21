<?php
include "includeCode.php";
include "../class/postDetails.php";
$oldPassword=md5(trim($_POST['oldPassword']));
$newPassword=md5(trim($_POST['newPassword']));
if(!empty($oldPassword) && !empty($newPassword)){
	$selectQuery=$user->query("select * from `user_login` where user_id='".$user->id."'");
	if($row=mysql_fetch_array($selectQuery)){
		$oldPwd=$row['password'];
		if($oldPassword == $oldPwd){
			$query=$user->query("update `user_login` set password='$newPassword' where user_id='".$user->id."'");
			if($query){
				echo "change";
			}
		}else{
			echo "notmatch";
		}
	}
}
?>