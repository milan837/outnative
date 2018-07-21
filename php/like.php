<?php
include "includeCode.php";
include "../class/postDetails.php";
$postId=trim($_POST['post_id']);
$post=new Post($postId);
if($post->alreadyLike($user->id) == 0){
	$post->setLike($user->id);
	if($post->alreadyDislike($user->id) == 1){
		$post->removeDislike($user->id);
	}
	echo $post->getLike()."/".$post->getDislike();
}else if($post->alreadyLike($user->id)== 1){
	$post->removeLike($user->id);
	echo $post->getLike()."/".$post->getDislike();
}
?>