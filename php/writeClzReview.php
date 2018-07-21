<?php
include "includeCode.php";
$review=mysql_real_escape_string(stripslashes(trim($_POST['reviewText'])));
$cId=trim($_POST['cId']);
$rData=date('Y-m-d');
$rTime=date('i:m:s');
$query=$db->query("insert into `college_reviews`(c_id,user_id,review,review_date,review_time) values('$cId','".$user->id."','$review','$rData','$rTime')");
echo 1;
?>