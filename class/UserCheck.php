<?php
#checking user details class
class UserCheck{
	
	//checking the email is exist or not
	public static function emailExist($email){
		if(!empty($email)){
			$query=UserCheck::query("select * from `user_login` where email='".$email."'");
			if(mysql_num_rows($query) == 1){
				return true;
			}else{
				return false;
			}
		}else{
			return "please enter the email as params";
		}
	}
	
	//sending the verification code to email
	public static function sendVerificationCode($email){
		$email=trim($email);
		if(!empty($email)){
			$code=rand(1000,10000);
			$query=UserCheck::query("update `user_login` set verification_code='".$code."' where email='".$email."'");
			if($query){				
				$to=$email;
				$from="Out Native <sushang@outnative.com>";
				$subject="Your Outnative 4 digit verification code!";
				$from_new = "From: " .$from. "\r\n";
				$from_new .= "CC: Outhome.com\r\n";
				$from_new .= "MIME-Version: 1.0\r\n";
				$from_new .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$body = '<html><body>';
				$body .= '				
					<center>
					<div style="width:100%; height:56px;   box-shadow: 2px 5px 7px -5px #6F6F6F;">
					<img src="http://outnative.com/image/nsibs.png" height="50" width="85">
					</div>
					<div style="height:auto; width:auto; text-align:left;">
					<h1>&nbsp;Your Verification code For Outnative is</h1>
					<br>Hi milan shrestha<br>
					To your request we have send you the <b>Verification Code</b> to You.
					<br><br><br><font color="#95980E">Your Verification code is</font><br><div style="border-right:5px solid #2555B4; width:120px; text-align:center; height:38px; font-size:36px; padding:5px; background-color:#174D68; color:#fff;">33244</div>
					<br><br><br>    <font size="+2"> Dont recognize these activity? </font> <br>Contact us now <br>
					<br>Why are we sending this? We take security very seriously and we want to keep u in the loop on important action in your account and not let any one to acess your account.<br>We were unable to determine whether you have use this account or device with your account before. This can be happen for the firt time when you sign in mobile,computer so at the time it will notify u and clear the cookies when somebody else is trying to acess your account.
					   <br>
					 <h3>The Outnative team.<h3>
					</div>
					</div>
					</center></body></html>
';
	            mail($to,$subject,$body,$from_new);
				return true;
			}else{
				return false;
			}
		}else{
			return "please enter the email as params";
		}
	}
	
		//sending the forget password code to email
	public static function sendForgetPasswordCode($email){
		$email=trim($email);
		if(!empty($email)){
			$code=rand(1000,10000);
			$query=UserCheck::query("update `user_login` set forget_password_code='".$code."' where email='".$email."'");
			if($query){				
				$to=$email;
				$from="Out Native <sushang@outnative.com>";
				$subject="Your Outnative 4 digit verification code!";
				$from_new = "From: " .$from. "\r\n";
				$from_new .= "CC: Outhome.com\r\n";
				$from_new .= "MIME-Version: 1.0\r\n";
				$from_new .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$body = '<html><body>';
				$body .= '				
					<center>
					<div style="width:100%; height:56px;   box-shadow: 2px 5px 7px -5px #6F6F6F;">
					<img src="http://outnative.com/image/nsibs.png" height="50" width="85">
					</div>
					<div style="height:auto; width:auto; text-align:left;">
					<h1>&nbsp;Your Verification code For Outnative is</h1>
					<br>Hi milan shrestha<br>
					To your request we have send you the <b>Verification Code</b> to You.
					<br><br><br><font color="#95980E">Your Verification code is</font><br><div style="border-right:5px solid #2555B4; width:120px; text-align:center; height:38px; font-size:36px; padding:5px; background-color:#174D68; color:#fff;">33244</div>
					<br><br><br>    <font size="+2"> Dont recognize these activity? </font> <br>Contact us now <br>
					<br>Why are we sending this? We take security very seriously and we want to keep u in the loop on important action in your account and not let any one to acess your account.<br>We were unable to determine whether you have use this account or device with your account before. This can be happen for the firt time when you sign in mobile,computer so at the time it will notify u and clear the cookies when somebody else is trying to acess your account.
					   <br>
					 <h3>The Outnative team.<h3>
					</div>
					</div>
					</center></body></html>
';
	            mail($to,$subject,$body,$from_new);
				return true;
			}else{
				return false;
			}
		}else{
			return "please enter the email as params";
		}
	}
	
	//returning the user_id by using email 
	public static function userId($email){
		if(!empty($email)){
			$query=UserCheck::query("select * from `user_login` where email='".$email."'");
			if($row=mysql_fetch_array($query)){
				return $row['user_id'];
			}else{
				return false;
			}
		}else{
			return "please enter the email as params";
		}
	}
	
    public static function already_follow($user_id1,$friend_id1){
	$query_check=mysql_query("select * from `friend_list` where user_id='$user_id1' and friend_id='$friend_id1'");
	 if($query_check){
		$num=mysql_num_rows($query_check);
		return $num;
	 }else{
	 echo "Query is not working";
	 }
	}
	
	function follow($user_id,$friend_id){
		$fDate=date('Y-m-d');
	$query=mysql_query("insert into `friend_list`(user_id,friend_id,following_date) values('$user_id','$friend_id','$fDate')");	
		if($query){
		echo "now you are following ".$friend_id;
		}else{
		echo "cannot follow";
		}
	}
	function unfollow($user_id,$friend_id){
	$query_check=mysql_query("select * from `friend_list` where user_id='$user_id' and friend_id='$friend_id'");
	 if($query_check){
		$num=mysql_num_rows($query_check);
		if($num >= 1){
			$query=mysql_query("delete from `friend_list` where user_id='$user_id' and friend_id='$friend_id'");	
			if($query){
			echo "now you unfollow ".$friend_id;
			}
		}
	 }
	}
	public static function query($query){
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