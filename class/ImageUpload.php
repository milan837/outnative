<?php
class ImageUpload{
	
	public static function uploadProfilePic($userId){
		$dir="uploads/".trim($userId)."/profile";
		$imageName=ImageUpload::uniqueName().".".end(explode("/",$_FILES['uploadFileImage']['type']));
		if(is_dir($dir)){
			if(($_FILES['uploadFileImage']['type'] == "image/jpg") ||
			   ($_FILES['uploadFileImage']['type'] == "image/jpeg")){
				  $upload=move_uploaded_file($_FILES['uploadFileImage']['tmp_name'],$dir."/".$imageName);
				  ImageUpload::query("update `user_login` set profile_picture='$imageName' where user_id='".$userId."'");
				  if($upload){
					  return "upload";
				  }else{
					  return "no no";
					 }
			}else{
				return "please select the jpg file";
			}
		}else{
			return "no dir";
		}
	}
	
	//function to generate new unique name
	public static function uniqueName(){
		$string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$randName=substr((str_shuffle($string)),0,8);
		return $randName;
	}
	
	public static function query($query){
		if(!empty($query)){
			$query1=mysql_query($query);
			if($query1){
				return $query1;
			}else{
				return "Query is not working";
			}
		}else{
			return "please enterthe query";
		}
	}
}
?>