<?php
/*
database connection for the outnative
created
Date 8-8-2015
Milan shrestha 
*/

class Database{
	private $database;
	private $username;
	private $password;
	private $host;
	
	public function __construct(){
		$this->database = "0728_outnative";
		$this->username = "root";
		$this->password = "mashoom";
		$this->host = "127.0.0.1";
	}
	public function connect(){
		$conn=mysql_connect($this->host,$this->username,$this->password);
		$select=mysql_select_db($this->database,$conn);
		if($conn == true && $select == true){
			return "connected";
		}else{
			return "cannot connect";
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