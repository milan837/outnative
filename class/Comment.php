<?php
//scomment class
class Comment{
	public $commentId;
	
	public function __construct($id){
		$this->commentId=$id;
	}
	
	public function result(){
		$query=$this->query("select * from `comment` where comment_id='".$this->commentId."'");
		if($row=mysql_fetch_array($query)){
			return $row;
		}
	}
	
	public function userId(){
		$row=$this->result();
		return $row['user_id'];
	}
	
	public function text(){
		$row=$this->result();
		return htmlspecialchars($row['comment']);
	}
	
	public function cDate(){
		$row=$this->result();
		return $row['comment_date'];
	}
	
	public function cTime(){
		$row=$this->result();
		return $row['comment_time'];
	}
	
	public function seen(){
		$row=$this->result();
		return $row['seen'];
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