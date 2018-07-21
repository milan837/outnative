<?php
$postId=trim($_POST['postId']);
$userId=trim($_POST['userId']);
$dir="../uploads/".$userId."/post/".$postId;
if(is_dir($dir)){
	$images=glob($dir."/"."*jpg");
	foreach($images as $image){
		$image=str_replace("../","",$image);
		echo '<img src="'.$image.'" class="list_images" height="110" width="120" />';
	}
}else{
	echo "asd";
}
?>