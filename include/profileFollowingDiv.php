<style>
.profile_each_following_div{
	text-align:left;
	height:92px;
}
.following_image_div{
	float:left;
	height:92px;
	width:100px;
	margin-left:20px;
}
.following_profile_pic{
	margin-top:6px;
	margin-left:10px;
	border-radius:50%;
}
.following_info_div{
	float:left;
	width:360px;
	height:92px;
}
.following_top_username_div{
	color:#09C;
	padding:5px;
}
.following_top_colloge_name_div{
	font-size:15px;
	color:gray;
	padding:5px;
}
.following_top_button_div{
	padding:5px;
}
.follow_btn{
	width:100px;
	height:30px;
	border-radius:3px;
	background:#5fba7d;
	outline:none;
	border:0px;
	cursor:pointer;
	font-size:15px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#FFF;
	padding-bottom:5px;
}
.following_btn:active{
	position:relative;
	top:2px;
}
.following_user_username{
	text-decoration:none;
	color:#09C;
}
.following_user_username:hover{
	text-decoration:underline;
}
</style>
<div class="profile_each_following_div">
  <!-- image Div -->
  <div class="following_image_div">
   <img src="<?php echo $followingUser->profilePicture("medium"); ?>" height="80" width="80" class="following_profile_pic" />
  </div>
  
  <!-- information div -->
  <div class="following_info_div">
     <div class="following_top_username_div"><a href="profile.php?id=<?php echo $followingUser->id; ?>" class="following_user_username"><?php echo $followingUser->username(); ?></a></div>
     <div class="following_top_colloge_name_div"><?php echo $followingUser->college(); ?></div>
     <div class="following_top_button_div">
     <?php if($followBtn == "show"){ ?>
        <input type="button" class="follow_btn" 
		<?php if($buttonText == "Follow"){ ?>
        style="background:rgb(32,105,142)"
		<?php } ?>
        value="<?php echo $buttonText; ?>" id="<?php echo $followingUser->id; ?>"/>
     <?php } ?>
     </div>
  </div>
  
</div>