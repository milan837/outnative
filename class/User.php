<?php
//user details class

class User{
	public $id;
	public function __construct($id){
		$this->id = $id;
	}
	
	public function result(){
		$query=$this->query("select * from `user_login` where user_id='".$this->id."'");
		if($row=mysql_fetch_array($query)){
			return $row;
		}else{
			return "cannot be fetch";
		}		
	}
	
	public function result2(){
		$query=$this->query("select * from `user_details` where user_id='".$this->id."'");
		if($row=mysql_fetch_array($query)){
			return $row;
		}else{
			return "cannot be fetch";
		}		
	}
	
	public function id(){
		$row=$this->result();
		return $row['user_id'];
	}
	
	public function username(){
		$row=$this->result();
		return htmlspecialchars($row['fname']." ".$row['lname']);
	}
	
	public function fname(){
		$row=$this->result();
		return htmlspecialchars($row['fname']);
	}
	
	public function lname(){
		$row=$this->result();
		return htmlspecialchars($row['lname']);
	}
	
	public function email(){
		$row=$this->result();
		return htmlspecialchars($row['email']);
	}
	
	public function position(){
		$row=$this->result();
		return $row['position'];
	}
	
	public function active(){
		$row=$this->result();
		return $row['active'];
	}
	
	public function lastLoginDate(){
		$row=$this->result();
		return $row['last_login_date'];	
	}
	
	public function verificationCode(){
		$row=$this->result();
		return $row['verification_code'];
	}
	
	public function forgetPasswordCode(){
		$row=$this->result();
		return $row['forget_password_code'];
	}
	
	public function signUpDate(){
		$row=$this->result();
		return $row['register_date'];
	}
	
	//result two functions
	public function sex(){
		$row=$this->result2();
		return $row['sex'];
		if(!empty($row['sex'])){
			return htmlspecialchars($row['sex']);
		}else{
			return "--------";
		}
	}
	
	public function location(){
		$row=$this->result2();
		if(!empty($row['location'])){
			return $row['location'];
		}else{
			return "--------";
		}
	}
	
	public function workplace(){
		$row=$this->result2();
		if(!empty($row['workplace'])){
			return htmlspecialchars($row['workplace']);
		}else{
			return "--------";
		}
	}
	
	public function dateOfBirth(){
		$row=$this->result2();
		//$dateOfBirth=$row['date']." ".$row['month']." ".$row['year'];
		if(!empty($row['date'])){
			return htmlspecialchars($row['date']." ".$row['month']." ".$row['year']);
		}else{
			return "--------";
		}
	}
	
	public function college(){
		$row=$this->result2();
		if(!empty($row['college'])){
			return htmlspecialchars($row['college']);
		}else{
			return "No Collage";
		}
	}
	
	public function profileViews(){
		$row=$this->result2();
		if(!empty($row['views'])){
			return $row['views'];
		}else{
			return "1";
		}
	}
	
	public function profilePicture($type){
		if(!empty($type)){
			$row=$this->result();
			$imageName=trim($row['profile_picture']);
			if(!empty($imageName)){
				if($type == "small"){
					$imageDir="uploads/".trim($this->id)."/profile/small/".$imageName;
				}else if($type == "medium"){
					$imageDir="uploads/".trim($this->id)."/profile/".$imageName;
				}
				return $imageDir;
			}else{
				return "images/jb.jpg";
			}
		}else{
			return "please give the image type small or medium as parameter";
		}
	}
	
	public function following(){
		$query=$this->query("select friend_id from `friend_list` where user_id='".$this->id."' order by friend_id ");
		if(mysql_num_rows($query) >= 1){
			return mysql_num_rows($query);
		}else{
			return "0";
		}
	}
	
	public function followers(){
		$query=$this->query("select user_id from `friend_list` where friend_id='".$this->id."' order by user_id ");
		if(mysql_num_rows($query) >= 1){
			return mysql_num_rows($query);
		}else{
			return "0";
		}
	}
	
	public function country(){
		$row=$this->result2();
		if(!empty($row['nationality'])){
			return htmlspecialchars($row['nationality']);
		}else{
			return "--------";
		}
	}
	
	//funtion for seen message
	public function messageSeen($sendId){
		$seenQuery=$this->query("update `message` set seen='1' where send_id='$sendId' and receive_id='".$this->id."'");
		if($seenQuery){
			return 1;
		}else{
			return 0;
		}
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