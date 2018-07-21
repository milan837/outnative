<?php
include "includeCode.php";
include "../class/postDetails.php";
$postId=trim($_POST['post_id']);
$post=new Post($postId);
//if user has not dislike  
if($post->alreadyDislike($user->id) == 0){
	$post->setDisLike($user->id);
	//removing the like from the post when user dislike the post
	if($post->alreadyLike($user->id) == 1){
		$post->removeLike($user->id);
	}
	echo $post->getDislike()."/".$post->getLike();
//if user has already dislike
}else if($post->alreadyDislike($user->id)== 1){
	$post->removeDislike($user->id);
	echo $post->getDislike()."/".$post->getLike();
}
?>