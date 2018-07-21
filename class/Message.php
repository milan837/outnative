<?php
#message class
class Message{
	public $messageId;
	
	public function __construct($id){
		$this->messageId = $id;
	}
	
	public function result(){
		$query=$this->query("select * from `message` where msg_id='".$this->messageId."'");
		if($row=mysql_fetch_array($query)){
			return $row;
		}
	}
	
	public function sender(){
		$row=$this->result();
		return $row['send_id'];
	}
	
	public function receiver(){
		$row=$this->result();
		return $row['receive_id'];
	}
	
	public function messageText(){
		$row=$this->result();
		$msg=$row['message'];
		$query=$this->query("select * from `emoicons`");
		while($emo=mysql_fetch_array($query)){
			$code=trim($emo['code']);
			$emoImage = " <img src='emo/".trim($emo['name'])."' height='17' width='17'/>  ";
			$msg = str_replace($code,$emoImage,$msg);
		}
		
		return $msg;
	}
	
	public function seen(){
		$row=$this->result();
		return $row['seen'];
	}
	
	public function mDate(){
		$row=$this->result();
		return $row['msg_date'];
	}
	
	public function mTime(){
		$row=$this->result();
		return $row['time'];
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