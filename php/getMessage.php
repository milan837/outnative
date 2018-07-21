<?php
include "includeCode.php";
$reciverId=trim($_POST['userId']);
echo "<input type='hidden' value='".$reciverId."' id='receiverId'";
$query=$user->query("select * from message where (send_id='".$user->id."' and receive_id='$reciverId') or (send_id='$reciverId' and receive_id='".$user->id."') order by msg_id desc");
while($row=mysql_fetch_array($query)){
	$message=$row['message'];
	
	$emo_query=mysql_query("SELECT * FROM `emoicons`");
			while($emo=mysql_fetch_array($emo_query)){
			$code=trim($emo['code']);
			$image_emo=" <img src='emo/".trim($emo['name'])."' height='17' width='17'/> ";
			$message=str_replace($code,$image_emo,$message);
			}
			
	if($row['send_id'] != $user->id){
?>
                <!-- receiver div -->
                <div class="receiver_message_div">
                   <div class="date_time_div"><?php echo $row['time']; ?></div>
                   <div class="main_message"<?php if($row['seen'] == 0){ echo "style='background:#5fba7d'"; }?> ><?php echo $message; ?></div>
                </div>
<?php }else{ ?>         
                <!-- sender part -->
                <div class="sender_message_div">
                   <div class="date_time_div2"><?php echo $row['time']; ?></div>
                   <div class="main_message_send"><?php echo $message; ?>
                   </div>
                </div>      
<?php } } 
if(mysql_num_rows($query) == 0){ ?>
<div class="no_any_message">No Any Message
</div>
<?php
}
?>