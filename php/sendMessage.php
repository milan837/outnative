<?php
include "includeCode.php";
$receiverId=trim($_POST['receiverId']);
$message=trim($_POST['message']);
$mTime=date("i:m:s");
$mdate=date("Y-m-d");
$query=$user->query("insert into `message`(send_id,receive_id,message,time,msg_date) values('".$user->id."','$receiverId','$message','$mTime','$mdate')");
if($query){
	echo "send";
}
?>