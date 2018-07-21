<?php
#post details class
class Post{
	
	public $postId;
	
	public function __construct($id){
		$this->postId=$id;
	}
	
	public function result(){
		$query=$this->query("select * from `post` where post_id='".$this->postId."'");
		if($row=mysql_fetch_array($query)){
			return $row;
		}
	}
	
	public function id(){
		$row=$this->result();
		return $row['post_id'];
	}
	
	public function userId(){
		$row=$this->result();
		return $row['user_id'];
	}
	
	public function status(){
		$row=$this->result();
		return htmlspecialchars($row['upload_text']);
	}
	
	public function getLike(){
		$row=$this->result();
		return $row['like'];
	}
	
	public function getDislike(){
		$row=$this->result();
		return $row['dislike'];
	}
	
	public function getComment(){
		$row=$this->result();
		return $row['comment'];
	}
	
	public function uploadDate(){
		$row=$this->result();
		$date=str_replace("-"," ",$row['upload_date']);
		return $date;
	}
	
	public function privacy(){
		$row=$this->result();
		return $row['privacy'];
	}
	
	public function flag(){
		$row=$this->result();
		return $row['flag'];
	}
	public function location(){
		$row=$this->result();
		return htmlspecialchars($row['location']);
	}
	
	public function query($query){
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
	
	// for like
	public function alreadyLike($user_id){
		$query=$this->query("select count(user_id) from `like` where user_id='$user_id' and post_id='".$this->postId."'");
		if($row=mysql_fetch_array($query)){
			if($row[0]){
			  return 1;
			}else{
			  return 0;
			}
		}
	}

	public function setLike($user_id){
		$date=date('Y-m-d');
		$query=$this->query("insert into `like`(post_id,user_id,like_date) values('".$this->postId."','$user_id','$date')");
		if($query){
			$query_count=$this->query("select * from `like` where post_id='".$this->postId."'");
			$likes=mysql_num_rows($query_count);
			$update=$this->query("update `post` set `like`='$likes' where post_id='".$this->postId."'");
		}
	}

	public function setDisLike($user_id){
		$date=date('Y-m-d');
		$query=$this->query("insert into `dislike`(post_id,user_id,dislike_date) values('".$this->postId."','$user_id','$date')");
		if($query){
			$query_count=$this->query("select * from `dislike` where post_id='".$this->postId."'");
			$dislikes=mysql_num_rows($query_count);
			$update=$this->query("update `post` set `dislike`='$dislikes' where post_id='".$this->postId."'");
		}
	}

    // for dislike
	public function alreadyDislike($user_id){
		$query=$this->query("select count(user_id) from `dislike` where user_id='$user_id' and post_id='".$this->postId."'");
		$row=mysql_fetch_array($query); 
		if($row[0]){
		   return 1;
		}else{
		   return 0;
		}
	}
	
	//for remove like
	public function removeLike($user_id){
		$query=$this->query("delete from `like` where user_id='$user_id' and post_id='".$this->postId."'");
		if($query){
			$query_count=$this->query("select * from `like` where post_id='".$this->postId."'");
			$likes=mysql_num_rows($query_count);
			$update=$this->query("update `post` set `like`='$likes' where post_id='".$this->postId."'");
		}
	}
	
	//for function removeDisloke
	public function removeDislike($user_id){
		$query=$this->query("delete from `dislike` where user_id='$user_id' and post_id='".$this->postId."'");
		if($query){
			$query_count=$this->query("select * from `dislike` where post_id='".$this->postId."'");
			$dislikes=mysql_num_rows($query_count);
			$update=$this->query("update `post` set `dislike`='$dislikes' where post_id='".$this->postId."'");
		}
	}
	
	//inserting the comment into the post
	public function insertComment($userId,$text){
		$cDate=date('y-m-d');
		$cTime=date("h:i:s");
		$query=$this->query("insert into `comment`(post_id,user_id,`comment`,comment_date,comment_time) values('".$this->postId."','$userId','$text','$cDate','$cTime')");
		if($query){
			return 1;
		}
	}

}

?>