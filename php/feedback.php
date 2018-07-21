<?php
include "includeCode.php";
$text=trim($_POST['fdText']);
$fDate=date("Y-m-d");
$q=$db->query("insert into `feedback`(user_id,feedback_text,feedback_date) values('".$user->id."','$text','$fDate')");
if($q){
	echo 1;
}
?>