<?php 
include "includeCode.php";
$sendId=trim($_POST['senderId']);
echo $user->messageSeen($sendId);
?>