<?php
class Collage{
	public $id;
	public function __construct($id){
		$this->id = $id;
	}
	
	public function result(){
		$query=$this->query("select * from `college_details` where c_id='".$this->id."'");
		if($row=mysql_fetch_array($query)){
			return $row;
		}else{
			return "cannot be fetch";
		}		
	}
	
	public function name(){
		$row=$this->result();
		return $row['name'];
	}
	public function location(){
		$row=$this->result();
		return $row['location'];
	}
	public function year(){
		$row=$this->result();
		return $row['date_of_college'];
	}
	public function website(){
		$row=$this->result();
		return $row['website'];
	}
	
	public function info(){
		$row=$this->result();
		return $row['wiki_info'];
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