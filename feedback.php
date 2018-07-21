<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<script>
$(document).ready(function(e) {
	$(".leave_feedback").click(function(){
		$(".main_pop_up_div").fadeIn('fast');
	});
    $(".close_image").click(function(){
		$(".main_pop_up_div").fadeOut('fast');
	});
	
	$("#feedback_btn").click(function(){
		var fdText=$("#input_feedback_text").val();
		var username=$("#Lusername").val();
		var img=$("#LuserPic").val();
		
		if(fdText == ""){
			alert("bla bla");
		}else{
			$.post("php/feedback.php",{fdText:fdText},function(getResponse){
				if(getResponse == 1){
					$("#input_feedback_text").val("");
					$(".main_pop_up_div").fadeOut('fase');
					$(".out_each_fd_div").prepend('<div class="each_feedback_div"><div class="top_feedback_user_info"><div class="image_container_feedback"><img src="'+img+'" height="50" width="50" class="user_feedback_profile_pic"/></div><div class="right_feedback_info_div"><div class="user_feedback_name"><a href="#" class="user_link_feedback">'+username+'</a></div><div class="user_feedback_time">Just now</div></div></div><div class="details_feedback_div">'+fdText+'</div></div>');
				}
			});
		}
	});
});
</script>
</head>

<body>
<div class="include_header_div">
 <?php include "include/header.php"; ?>
</div><br><br><br><br><br><br><br>
<center>
  <div class="main_div">
        <!-- left middle div -->
        <div class="left_content_div">
          <?php include "include/ntfMsgChatDiv.php"; ?>
        </div>
        <style>
		.feedback_main_content_div{
			background:;
			min-height:400px;
			width:480px;
		}
		.top_feedback_div{
			background:;
			padding:5px;
			text-align:left;
		}
		.leave_feedback{
			position:relative;
			left:60%;
			background:rgb(32,105,142);
			height:30px;
			width:120px;
			font-family:Elegant Lux Mager;
			font-size:15px;
			color:#FFF;
			border:0px;
			outline:none;
			border-radius:3px;
			cursor:pointer;
		}
		.leave_feedback:active{
			position:relative;
			top:3px;
		}
		.each_feedback_div{
			margin-top:10px;
			min-height:100px;
			width:470px;
			padding:5px;
			box-shadow:0 0 1px 0 rgba(0,0,0,.55);
		}
		.top_feedback_user_info{
			height:60px;
			background:;
			text-align:left;
		}
		.image_container_feedback{
			background:;
			width:60px;
			height:60px;
			float:left;
		}
		.right_feedback_info_div{
			background:;
			width:350px;
			height:60px;
			float:left;
			margin-left:5px;
		}
		.details_feedback_div{
			min-height:50px;
			background:;
			padding-left:10px;
			padding-top:5px;
			padding-right:10px;
			font-family:Elegant Lux Mager;
			font-size:15px;
			color:gray;
			text-align:left;
		}
		.user_feedback_name{
			background:;
			padding:2px;
			font-family:Elegant Lux Mager;
			margin-top:10px;
		}
		.user_feedback_time{
			background:;
			padding:2px;
			font-size:13px;
			color:gray;
			font-family:Elegant Lux Mager;
		}
		.user_feedback_profile_pic{
			border-radius:50%;
			margin-top:5px;
			margin-left:5px;
		}
		.user_link_feedback{
			text-decoration:none;
			color:#09C;
		}
		.user_link_feedback:hover{
			text-decoration:underline;
		}
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
			 <!-- div for feed back -->
             <div class="feedback_main_content_div">
               <!-- top div of feedback -->
               <div class="top_feedback_div">Feedback
               <input type="button" value="Leave Feedback" class="leave_feedback"/>
               </div>
               
               <div class="out_each_fd_div">
<?php
$feedbackQuery=$db->query("select * from `feedback` order by feedback_id desc");
while($fRow=mysql_fetch_array($feedbackQuery)){
	$fUser=new User($fRow['user_id']);		
?>
               <!-- each div for feed back -->
               <div class="each_feedback_div">
                 <!-- top section for user info -->
                 <div class="top_feedback_user_info">
                   <div class="image_container_feedback">
                    <img src="<?php echo $fUser->profilePicture("medium"); ?>" height="50" width="50" class="user_feedback_profile_pic"/>
                   </div>
                   <div class="right_feedback_info_div">
                      <div class="user_feedback_name"><a href="#" class="user_link_feedback"><?php echo $fUser->username(); ?></a></div>
                      <div class="user_feedback_time"><?php echo $fRow['feedback_date']; ?></div>
                   </div>
                 </div>
                 
                 <!-- details information // feedback of user -->
                   <div class="details_feedback_div">
                   <?php echo $fRow['feedback_text']; ?>
                   </div>
               </div>
               <?php } ?>
               </div><!-- each div for feed back ends -->
               
               
             </div>
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/newFrnsDiv.php"; ?>
        </div>       
   </div>
</center><br>
<?php include "include/footer.php"; ?>
<style>
.main_pop_up_div{
	display:none;
	background:rgba(0, 0, 0, 0.8);
	position:fixed;
	top:0%;
	bottom:0%;
	left:0%;
	right:0%;
	z-index:2000;
}
.feedback_content_div{
	width:450px;
	height:240px;
	background:#FFF;
	margin-top:13%;
	padding:5px;
	border-radius:3px;
}
.input_div_content{
	margin-top:2px;
	background:;
	height:130px;
}
.feedback_send_button_div{
	background:;
	height:30px;
	margin-top:5px;
	text-align:left;
}
.feedback_input_div{
	width:440px;
	height:130px;
	padding:5px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	outline:none;
	resize:none;
	text-indent:4px;
}
.send_feedback_button{
	background:rgb(32,105,142);
	height:30px;
	width:120px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#FFF;
	border:0px;
	outline:none;
	border-radius:3px;
	cursor:pointer;
}
.send_feedback_button:active{
	position:relative;
	top:3px;
}
.close_image{
	position:relative;
	top:200px;
	left:210px;
	cursor:pointer;
}
</style>
<!-- feedback put pop up div -->
<div class="main_pop_up_div">
<center>
<img src="images/cancel.png" class="close_image" height="20" width="20"/>
  <!-- center div for feed back -->
  <div class="feedback_content_div">
                <!-- top section for user info -->
                 <div class="top_feedback_user_info">
                   <div class="image_container_feedback">
                    <img src="<?php echo $user->profilePicture("medium"); ?>" height="50" width="50" class="user_feedback_profile_pic"/>
                   </div>
                   <div class="right_feedback_info_div">
                      <div class="user_feedback_name"><a href="#" class="user_link_feedback"><?php echo $user->username(); ?></a></div>
                      <div class="user_feedback_time"><?php echo $user->college(); ?></div>
                   </div>
                 </div>
                 
                 <!-- div for input_feedback -->
                 <div class="input_div_content">
                 <textarea class="feedback_input_div" placeholder="leaves us Feedback" id="input_feedback_text"></textarea>
                 </div>
                 <!-- dutton div for sending feedbak -->
                 <div class="feedback_send_button_div">
                  <input type="button" value="Leave Feedback" id="feedback_btn" class="send_feedback_button"/>
                 </div>
  </div>
</center>
</div>
</body>
</html>