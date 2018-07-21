<?php
include "includeCode.php";
$location=trim($_POST['location']);
$year=trim($_POST['year']);
$name=trim($_POST['name']);
$website=trim($_POST['website']);
$info=str_replace("'","\'",trim($_POST['info']));


$query=$db->query("insert into `college_details`(user_id,name,location,date_of_college,website,wiki_info) values('".$user->id."','$name','$location','$year','$website','$info')");
if($query){
	$query=$db->query("select * from `college_details` where user_id='".$user->id."' order by c_id desc");
	$row=mysql_fetch_array($query);
	echo "insert/".$row['c_id'];
}else{
	echo "not";
}
?>