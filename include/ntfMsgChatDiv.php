<style>
.ntf_msg_chat_div{
	width:200px;
	height:500px;
	background:;
}
.top_tabs_div{
	width:205px;
	height:35px;
	background:;
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
}
.ntf_icon_div{
	text-align:center;
	padding:5px;
	margin-left:1px;
	float:left;
	width:65px;
	height:35px;
	background:;
	border-right:1px solid rgba(0, 0, 0, 0.2);
	cursor:pointer;
}
.msg_icon_div{
	text-align:center;
	padding:5px;
	margin-left:1px;
	float:left;
	width:65px;
	height:35px;
	background:;
	border-right:1px solid rgba(0, 0, 0, 0.2);
	cursor:pointer;
}
.chat_icon_div{
	text-align:center;
	padding:5px;
	margin-left:1px;
	float:left;
	width:65px;
	height:35px;
	background:;
	cursor:pointer;
}
.ntf_content_div{
	background:;
	height:425px;
	overflow:auto;
	overflow-x:hidden;
}
.ntf_content_div::-webkit-scrollbar
{
  width: 7px;  /* for vertical scrollbars */
  height: 5px; /* for horizontal scrollbars */
}
.ntf_content_div::-webkit-scrollbar-track
{
  background: rgba(0, 0, 0, 0.1);
}
.ntf_content_div::-webkit-scrollbar-thumb
{
  background: rgba(0, 0, 0, 0.2);
}
.each_ntf_content_div{
	font-family:Elegant Lux Mager;
	font-size:15px;
	min-height:35px;
	padding:5px;
	color:#000;
	cursor:pointer;
}
.each_ntf_content_div:hover{
	background:rgba(0, 0, 0, 0.1);
}
.search_content_div{
	height:28px;
	background:;
}
.ntf_msg_chat_search1{
	font-family:Elegant Lux Mager;
	font-size:15px;
	width:204px;
	height:28px;
	text-indent:10px;
	outline:none;
	border:0px;
	border-bottom:1px solid rgba(0,0,0,.3);
	border-right:1px solid rgba(0,0,0,.3);
	color:gray;
	margin-top:0px;
}
.ntf_msg_chat_search{
	font-family:Elegant Lux Mager;
	font-size:15px;
	width:204px;
	height:28px;
	text-indent:10px;
	outline:none;
	border:0px;
	border-bottom:1px solid rgba(0,0,0,.3);
	border-left:1px solid rgba(0,0,0,.3);
	color:gray;
	margin-top:0px;
}
.top_profile_pic_username_div{
	height:30px;
	text-align:left;
	background:;
}
.msg_profile_pic{
	border-radius:50%;
	margin-left:3px;
}
.msg_username{
	position:relative;
	top:-9px;
	font-family:Elegant Lux Mager;
	font-size:16px;
}
.time_div_msg{
	background:;
	text-align:right;
	font-size:13px;
	color:gray;
}
.msg_display_div{
	background:;
	min-height:20px;
	padding-left:5px;
	padding-top:3px;
	padding-right:5px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#000;
}
#each_msg_content_div{
	display:none;
}
#each_chat_content_div{
	display:none;
}
.no_new_msg_div{
	background:;
	text-align:center;
	font-family:Elegant Lux Mager;
	height:30px;
	margin-top:10px;
	color:gray;
}
.username_link_ntf{
	text-decoration:none;
	color:#09F;
}
.username_link_ntf:hover{
	text-decoration:underline;
}
</style>
<script>
$(document).ready(function(e) {
    // on notification tab click
	$(".ntf_icon_div").click(function(){
		$("#each_msg_content_div").fadeOut(10);
		$("#each_chat_content_div").fadeOut(10);
		$("#each_ntf_content_div").fadeIn(100);
	});
	
	// on message tab click
	$(".msg_icon_div").click(function(){
		$("#each_chat_content_div").fadeOut(10);
		$("#each_ntf_content_div").fadeOut(10);
		$("#each_msg_content_div").fadeIn(100);
	});
	
	// on chats tab click
	$(".chat_icon_div").click(function(){
		$("#each_ntf_content_div").fadeOut(10);
		$("#each_msg_content_div").fadeOut(10);
		$("#each_chat_content_div").fadeIn(100);
	});
	setInterval(function(){
		var mydata=$("#each_ntf_content_div").html();
		mydata.find(".aaa").html();
		},1000);
	$(".messageNtfMainDiv").click(function(){
		var senderId=$(this).find("#senderId").val();
		$.post("php/messageSeen.php",{senderId:senderId},function(getData){
			if(getData == 1){
				window.location.replace("message.php?sm_id="+senderId);
			}
			
		});
	});
});
</script>
<div class="ntf_msg_chat_div">
   <!-- top div -->
   <div class="top_tabs_div">
      <div class="ntf_icon_div"><img src="images/sport1.png" height="25" width="45"/></div>
      <div class="msg_icon_div"><img src="images/msg.png" height="25" width="30"/></div>
      <div class="chat_icon_div"><img src="images/chat1.png" height="25" width="25"/></div>
   </div>
   
     <!-- search div  --> 
     <div class="search_content_div">
       <input type="text" class="ntf_msg_chat_search" placeholder="search"/>
     </div>
     
   <!-- ntf div -->
   <div class="ntf_content_div" id="each_ntf_content_div">
     <!-- each ntf msg div -->
     <?php 
	 //include "class/Notification.php";
	 $likeNtfQuery=$db->query("select * from `post` where user_id='".$user->id."' order by post_id desc");
	 while($ntfRow=mysql_fetch_array($likeNtfQuery)){
		 $postNtfId=$ntfRow['post_id'];
		 $postDetails = new Post($postNtfId);
		 $likeQuery=$db->query("select * from `like` where post_id='".$postNtfId."'");
		 $totalNoLikers=array();
		 $likersId="";
		// ini_set('display_errors',0);
		 while($likesNtfRow=mysql_fetch_array($likeQuery)){
			 $likersId=$likesNtfRow['user_id'];
			 $likeDate=$likesNtfRow['like_date'];
			 //for displaying number of likers of this post
			 $totalNoLikers[]=$likesNtfRow['user_id'];
			 
		 $likersUser = new User($likersId);
	 ?>
     <div class="each_ntf_content_div">
      <a href="profile.php?id=<?php echo $likersUser->id;?>" class="username_link_ntf"><?php echo $likersUser->username(); ?></a>
       and <?php echo count($totalNoLikers); ?> other like your <span class="aaa"><?php echo substr($postDetails->status(),0,100); ?></span>
	  <?php 
	  ?>
      <div class="time_div_msg"><?php echo $likeDate; ?></div>
     </div>
     
     <?php } } ?>
    </div>
    
    <div class="ntf_content_div" id="each_msg_content_div">
      <!-- each message div content -->
	  <?php 
	  $unseenMsgQuery=$db->query("select * from `message` where receive_id='".$user->id."' and seen='0' order by msg_id desc");
	  if(mysql_num_rows($unseenMsgQuery) == "0"){
		  echo "<div class='no_new_msg_div'>No New Message To you</div>";
	  }else{
	  while($msgRow=mysql_fetch_array($unseenMsgQuery)){
		  $msgId=$msgRow['msg_id'];
		  $message = new Message($msgId);
		  $senderUser = new User($message->sender());
	 ?>
      <div class="each_ntf_content_div">
      <div class="messageNtfMainDiv">
      <input type="hidden" value="<?php echo $senderUser->id; ?>" id="senderId"/>
        <div class="top_profile_pic_username_div">
            <img src="images/jb.jpg" height="30px" width="30px" class="msg_profile_pic"/>
            <span class="msg_username"><?php echo $senderUser->username(); ?></span>
        </div>
        <div class="msg_display_div">
			<?php 
				 $messageText=$message->messageText(); 
				 if(strlen($messageText) >= 75){
					 echo substr($messageText,0,60)."....";
				 }else{
					 echo $messageText;
				 }
            ?>
        </div>
        <div class="time_div_msg">6 hours ago</div>
     </div>
     </div>
     <?php } }?>
    </div>
    
    <div class="ntf_content_div" id="each_chat_content_div">
     <!-- each online contact div content -->
	  <?php 
	  $myFriendsQuery=$db->query("select * from `user_login` where user_id in (select friend_id from friend_list where user_id='".$user->id."') and user_id in (select user_id from friend_list where friend_id='".$user->id."')");
	  while($myFrnsRow=mysql_fetch_array($myFriendsQuery)){ 
	  $myFrnsUser = new User($myFrnsRow['user_id']);
	  ?>
      <a href="message.php" style="text-decoration:none;">
      <div class="each_ntf_content_div">
        <div class="top_profile_pic_username_div" style="height:35;padding-top:3px">
            <img src="images/jb.jpg" height="30px" width="30px" class="msg_profile_pic"/>
            <span class="msg_username"><?php echo $myFrnsUser->username(); ?></span>
        </div>
     </div>
     </a>
     <?php } ?>
    </div>
   
   
</div>