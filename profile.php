<?php 
include "include/topCode.php";
include "class/UserCheck.php";
$profileId=mysql_real_escape_string(stripslashes(trim($_GET['id'])));
$profileUser= new User($profileId);
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Profile</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="js/profileTopDiv.js" type="text/javascript"></script>
<script src="js/postDisplayDiv.js"></script>
<script>
$(document).ready(function(e) {
    	var current_image;
    $(".post_images").click(function(){
		var cilck_images=$(this).attr('src');
		$(".pop_image_div").fadeIn('fast');
		
		var postId=$(this).parent().find("#popPostId").val();
		var userId=$(this).parent().find("#popUserId").val();
		
		$.post("include/imagePopDiv.php",
		{
			  postId:postId,
			  userId:userId	
		},
		function(getImages){
			//alert(getImages);
			$(".contain_image_div").html(getImages);
		    $(".main_display_image").attr('src',cilck_images);
			current_image=$(".contain_image_div").find(".image_list_div").first();
			//alert(current_image);
		});
	});
	
	$(document).keydown(function(e){
		if(e.keyCode == 27){
			$(".pop_image_div").fadeOut('fast');
		}
	});
});
	
</script>
<style>
.profile_post_display_div{
	width:480px;
	min-height:500px;
}
.profile_about_div{
	width:480px;
	min-height:320px;
	display:none;
}
.profile_post_profile_images_div{
	width:480px;
	min-height:500px;
	display:none;
}
.profile_main_following_div{
	width:480px;
	min-height:100px;
	margin-top:5px;
	display:none;
}
.profile_main_followers_div{
	width:480px;
	min-height:100px;
	margin-top:5px;
	display:none;
}
</style>
</head>

<body>
<div class="include_header_div">
 <?php 
include "include/header.php"; 
include "class/ImageUpload.php";
if(isset($_POST['uploadButton'])){
	ImageUpload::uploadProfilePic($user->id);
}
?>
</div><br><br><br><br><br><br><br>
<div class="pop_image_div">
<center>
    <div class="contain_image_div">
        </div>
</center>
</div>

<center>
  <div class="main_div">
        <!-- left middle div -->
        <div class="left_content_div">
          <?php include "include/ntfMsgChatDiv.php"; ?>
        </div>
        
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
			<?php include "include/profileTopDiv.php"; ?>
            <div class="line_div"></div>
                
                <!-- user post div -->
                <div class="profile_post_display_div">
                   <?php
					 $postQuery=$db->query("select * from `post` where user_id='".$profileId."' order by post_id desc");
						 while($postRow=mysql_fetch_array($postQuery)){
							 $postId=$postRow['post_id'];
							 $post=new Post($postId);
							 $postUser = new User($post->userId());
							 include "include/postDisplayDiv.php"; 
						 } 
			       ?>
                </div>
                
                <!-- user details about tab layout-->
                <div class="profile_about_div">
                  <?php include "include/profileAboutDiv.php"; ?>
                
                </div>
                <!-- images div to display profile and post images -->
                <div class="profile_post_profile_images_div">
                   <?php include "include/profilePhotosDiv.php";?>
                </div>
                
                <?php
                $followingQuery=$db->query("select friend_id from `friend_list` where user_id='".$profileId."' order by friend_id");
				while($followingUserRows=mysql_fetch_array($followingQuery)){
					$followingUserId=$followingUserRows['friend_id'];
					$followingUser = new User($followingUserRows['friend_id']);
					if(UserCheck::already_follow($user->id,$followingUser->id) == 0){
						$buttonText="Follow";
					}else{
						$buttonText="Unfollow";
					}
					if($followingUserId == $user->id){
						$followBtn="hide";
					}else{
						$followBtn="show";
						}
				?>
                <!-- following div -->
                <div class="profile_main_following_div">
                       <?php include "include/profileFollowingDiv.php";?>
                    <div class="line_div"></div>
                </div>
               <?php } ?>
               
               <?php 
			   $followersQuery=$db->query("select * from `friend_list` where friend_id='".$profileId."' order by user_id");
			   while($followersRow=mysql_fetch_array($followersQuery)){
				   $followersUserId=$followersRow['user_id'];
				   $fDate=$followersRow['following_date'];
				   $followersUser = new User($followersUserId);
			   ?>
                <!-- followers div -->
                <div class="profile_main_followers_div">
                       <?php include "include/profileFollowersDiv.php";?>
                    <div class="line_div"></div>
                </div>
               <?php }  ?>
            
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/newFrnsDiv.php"; ?>
        </div>       
   </div>
</center><br>
<?php include "include/profilePopupBox.php"; ?>
<?php //include "include/footer.php"; ?>
</body>
</html>