<style>
.main_user_deails_div{
	width:480px;
	min-height:190px;
	background:;
	margin-top:5px;
	box-shadow:0 0 1px rgba(0,0,0,.5);
	background-image:url(images/3.jpg);
	background-repeat:no-repeat;
	background-size:cover;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
}
.top_containter_profile_div{
	opacity:0.7;
	background:#FFF;
	height:30px;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
	text-align:left;
}
.profile_username_div{
	margin-left:5px;
	float:left;
	padding:5px;
	width:110px;
	height:30px;
	background:;
	color:#000;
	font-family:Elegant Lux Mager;
	font-size:15px;
}
.profile_username_div_btn{
	background:;
	float:right;
	width:110px;
	height:30px;
}
.profile_follow_btn{
	width:80px;
	height:24px;
	margin-top:3px;
	cursor:pointer;
	font-family:Elegant Lux Mager;
	padding-bottom:4px;
	font-size:12px;
	background:rgb(32,105,142);
	border:0px;
	border-radius:2px;
	outline:none;
	color:#FFF;
	opacity:10;
}
.profile_follow_btn:active{
	position:relative;
	top:2px;
}

.mid_container_profile_image_div{
	text-align:left;
	height:110px;
	margin-top:10px;
}
.image_containt_div{
	width:110px;
	height:110px;
	margin-left:50px;
	background:;
	border-radius:50%;
	cursor:pointer;
}
#user_profile_picture{
	-moz-box-shadow: -2px 7px 11px -6px #276873;
    -webkit-box-shadow: -2px 7px 11px -6px #276873;
    box-shadow: -2px 7px 11px -6px #276873;
	margin-top:5px;
	border-radius:50%;
}
.main_username_div_cover{
	height:30px;
	text-align:left;
	margin-top:10px;
	background:;
}
.username_div_profile_page{
	opacity:0.7;
	width:200px;
	height:30px;
	background:#FFF;
	color:#000;
	font-family:Elegant Lux Mager;
	font-size:15px;
	border-top-right-radius:3px;
	font-weight:bold;
	padding-top:6px;
}
</style>
<div class="main_user_deails_div">
  <!-- top container for all user details -->
  <div class="top_containter_profile_div">
      <!-- username div -->
      <div class="profile_username_div">Followers <span class="numbers_count_for_followers"><?php echo $profileUser->followers(); ?></span></div>
      <div class="profile_username_div">Following <span class="numbers_count_for_followers"><?php echo $profileUser->following(); ?></span></div>
      <div class="profile_username_div">Views <span class="numbers_count_for_followers"><?php echo $profileUser->profileViews(); ?></span></div>
     
      <div class="profile_username_div_btn">
      <?php 
	    if($profileId != $user->id){
		  if(UserCheck::already_follow($user->id,$profileId) == 0){
			  $buttonValue="Follow";
		  }else{
			  $buttonValue="Unfollow";
			  }
	  ?>
      <input type="button" id="<?php echo $profileId; ?>" class="profile_follow_btn"
      <?php if($buttonValue=="Unfollow"){ echo 'style="background:#5fba7d"';} ?>
       value="<?php echo $buttonValue; ?>"/>
      <?php } ?>
      </div>
	  
  </div>
  
  <!-- profile picture div -->
  <div class="mid_container_profile_image_div" <?php if($user->id == $profileUser){ echo 'id="mid_container_profile_image_div"'; }?> >
     <div class="image_containt_div">
        <center>
        <img src="<?php echo $profileUser->profilePicture("medium"); ?>" id="user_profile_picture"
          <?php if($user->id == $profileUser->id){ echo 'class="user_profile_picture"'; }?> height="100" width="100"/>
        </center>
     </div>
  </div>
  
  <!-- user name main div in cover div -->
  <div class="main_username_div_cover">
    <div class="username_div_profile_page">
      <center><?php echo $profileUser->username(); ?></center> 
    </div>
  </div>
</div>
<style>
.profile_second_option_menu{
	width:480;
	height:35px;
	padding:5px;
	box-shadow:0 0 1px rgba(0,0,0,.5);
}
.profile_second_option_menu ul{
	list-style:none;
}
.profile_second_option_menu ul li{
	display:inline-block;
	margin-right:30px;
	margin-top:2px;
	cursor:pointer;
}
#profile_option_post{
	color:#09C;
}
</style>
<!-- profile option menu fro user details -->
<div class="profile_second_option_menu">
  <ul>
    <li style="margin-left:30px;" id="profile_option_post">Posts</li>
    <li id="profile_option_about">About</li>
    <li id="profile_option_photos">Gallary</li>
    <li id="profile_option_following">Following</li>
    <li id="profile_option_followers">Followers</li>
    
  </ul>
</div>