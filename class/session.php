<?php
/* sesstion class and methods */

class Session{
	
	// starting session
	public function __construct(){
		session_start();	
	}
	
	//set the session value and key name
	public function set($key,$value){
		if(isset($key) && isset($value)){
			$_SESSION[$key]=$value;
		}else{
			echo "session key or value is not set properly";
		}
	}
	
	//get the session value using the key 
	public function get($key){
		if(isset($key)){
			return $_SESSION[$key];
		}else{
			return "please pass the session key";
		}
	}
	
	//unset the session
	public function delete($key){
		if(isset($key)){
			unset($_SESSION[$key]);
		}else{
			echo "please enter the key of the session to be destroy";
		}
	}
	
	//checking the session is login or not 
	public function login($key){
		if(!empty($key)){
			if(isset($_SESSION[$key]) && !empty($_SESSION[$key])){
				return true;
			}else{
				return false;
			}
		}else{
			return "please enter the key";
		}
	}
	//destroy entire session
	public function destroy(){
		session_destroy();
	}
}

?>