<?php
include "includeCode.php";
include "../class/postDetails.php";
$postId=trim($_POST['postId']);
$commentText=trim($_POST['commentText']);
$post=new Post($postId);
if(!empty($postId) && !empty($commentText)){
	if($post->insertComment($user->id,$commentText) == 1){
		echo 1;
	}
}
?>