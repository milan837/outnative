<style>
.profile_each_following_div{
	text-align:left;
	height:112px;
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
	height:112px;
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
.following_btn{
	width:100px;
	height:30px;
	border-radius:3px;
	background:rgb(32,105,142);
	outline:none;
	border:0px;
	cursor:pointer;
	font-size:16px;
	padding-bottom:4px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#FFF;
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
/*followers folowing views showing div*/
.followers_following_view_div{
	height:20px;
	margin-top:3px;
	text-align:left;
}
.following_showing_div{
	float:left;
	margin-left:5px;
	height:20px;
	width:115px;
	color:gray;
	font-size:16px;
}
</style>

<?php
$newFriends = new User($friendRow['user_id']);
?>
<div class="profile_each_following_div">
  <!-- image Div -->
  <div class="following_image_div">
   <img src="<?php echo $newFriends->profilePicture("medium"); ?>" height="80" width="80" class="following_profile_pic" />
  </div>
  
  <!-- information div -->
  <div class="following_info_div">
     <div class="following_top_username_div"><a href="profile.php?id=<?php echo $newFriends->id; ?>" class="following_user_username"><?php echo $newFriends->username(); ?></a></div>
     <div class="following_top_colloge_name_div"><?php echo $newFriends->college(); ?></div>
     <div class="followers_following_view_div">
        <div class="following_showing_div">Following <?php echo $newFriends->following(); ?></div>
        <div class="following_showing_div">Followers <?php echo $newFriends->followers(); ?></div>
        <div class="following_showing_div">Views <?php echo $newFriends->profileViews(); ?></div>
     </div>
     <div class="following_top_button_div">
        <input type="button" class="following_btn" value="Follow" id="<?php echo $newFriends->id(); ?>"/>
     </div>
  </div>
  
</div>