<?php
# notification class
class Notification{
	public $userId;
	
	public function __construct($id){
		$this->userId=$id;
	}
	
	public function getPostId(){
		$postIdArray = array();
		$query=$this->query("select * from `post` where user_id='".$this->userId."'");
		while($row=mysql_fetch_array($query)){
			$postIdArray[] = $row['post_id'];
		}
		return $postIdArray;
	}
	
	public function like(){
		$likeArray = array();
			foreach($this->getPostId() as $postId){
			$query=$this->query("select * from `like` where post_id='".$postId."'");
				while($row=mysql_fetch_array($query)){
					$likeArray[] = array(
					"user_id"=>$row['user_id'],
					"post_id"=>$row['post_id'],
					"like_date"=>$row['like_date']
					);
					
				}
			}
			return $likeArray;
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
}
?>