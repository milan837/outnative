<?php
include "includeCode.php";
include "../class/UserCheck.php";
$method=trim($_POST['method']);

if($method == "check"){
	$code=trim($_POST['code']);
	$query=$db->query("select * from `user_login` where user_id='".$user->id."'");
	if($row=mysql_fetch_array($query)){
		if($row['verification_code'] == $code){
			$activeQuery=$db->query("update `user_login` set active='1' where user_id='".$user->id."'");
			if($activeQuery){
			    $path="../uploads/".trim($user->id);
				if(!is_dir($path)){
					if(mkdir($path)){
						if(mkdir($path."/profile")){
							mkdir($path."/profile/small");
						}
						mkdir($path."/post");
					}
				}
				echo "verified";
			}
		}else{
			echo "not verified";
		}
	}
}else if($method == "resend"){
	$sendCode=UserCheck::sendVerificationCode($user->email());
	if($sendCode == true){
		echo "mail sent";
	}
}

?>