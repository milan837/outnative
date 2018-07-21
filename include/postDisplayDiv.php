<style>
.each_post_display_div{
	width:480px;
	min-height:100px;
	background:;
	box-shadow:0 0 1px 0 rgba(0,0,0,.55);
	margin-top:10px;
	padding:5px;
}
.top_user_details{
	height:75px;
	padding:5px;
	background:;
}
.left_image_username_div{
	text-align:left;
	width:400px;
	float:left;
	height:65px;
	background:;
}
.upload_user_profile_pic_div{
	height:65px;
	width:65px;
	float:left;
	background:;
}
.post_profile_pic{
	border-radius:50%;
}
.post_username_div{
	height:60px;
	width:330px;
	margin-left:5px;
	float:left;
	background:;
}
.show_date_div{
	height:18px;
	background:;
	font-size:14px;
	color:gray;
}
.show_username_div{
	height:25px;
	background:;
	font-size:19px;
}
.username_link{
	text-decoration:none;
	color:#09F;
}
.username_link:hover{
	text-decoration:underline;
}
.show_location_div{
	height:22px;
	font-size:16px;
	background:;
}
.right_setting_icon_div{
	width:60px;
	float:right;
	height:60px;
	background:;
	text-align:right;
}
.post_setting_icons{
	margin-top:20px;
}
/*post status div*/
.post_text_div{
	text-align:left;
	padding:5px;
	padding-left:10px;
	text-justify:auto;
	font-size:16px;
	background:;
	min-height:20px;
	margin-top:2px;
}
.post_image_div{
	text-align:left;
	min-height:10px;
	background:;
	padding:5px;
}
.post_image{
	max-width:500px;
	max-height:400px;
}
.post_images img{
	width:95%;
	height:95%;
	position:absolute;
	top:50%;
	left:50%;
	-webkit-transform: translate(-50%,-50%);
	transform:translate(-50%,-50%);
}
.like_dislike_comment_main_div{
	height:40px;
	background:;
}
.like_div{
	cursor:pointer;
	height:40px;
	background:;
	min-width:50px;
	float:left;
	margin-left:5px;
}
.dislike_div{
	cursor:pointer;
	background:;
	float:left;
	min-width:50px;
	height:40px;
	margin-left:15px;
}
.commen_div{
	cursor:pointer;
	background:;
	float:left;
	min-width:50px;
	height:40px;
	margin-left:15px;
}
.number_count{
	margin-left:5px;
	position:relative;
	bottom:10px;
	font-size:17px;
	color:gray;
}
.number_count_dislike{
	margin-left:5px;
	position:relative;
	bottom:10px;
	font-size:17px;
	color:gray;
}
.number_count_like{
	margin-left:5px;
	position:relative;
	bottom:5px;
	font-size:17px;
	color:gray;
}
.like{
	margin-top:5px;
}
.dislike{
	margin-top:10px;
}
.comment{
	margin-top:10px;
}
.more_image_div{
	position:relative;
	top:-50px;
	padding-top:5px;
	padding-left:9px;
	left:0px;
	border-bottom-left-radius:1px;
	height:50px;
	width:50px;
	font-size:30px;
	opacity:0.7;
	color:#FFF;
	background:#000;
}
</style>

<!-- each post display div -->
<div class="each_post_display_div">
 <!-- top user details for each post -->
 <div class="top_user_details">
    <!-- left div for image username content -->
    <div class="left_image_username_div">
      <!-- profile picture div -->
      <div class="upload_user_profile_pic_div">
       <img src="<?php echo $postUser->profilePicture("medium"); ?>" height="60" width="60px" class="post_profile_pic" />
      </div>
      <!-- details name date and location -->
      <div class="post_username_div">
        <div class="show_date_div"><?php echo $post->uploadDate(); ?></div>
        <div class="show_username_div">
            <a href="profile.php?id=<?php echo $postUser->id; ?>" class="username_link"><?php echo $postUser->username(); ?></a>
        </div>
        <div class="show_location_div">At <span style="color:gray;"><?php echo $post->location();?></span></div>
      </div>
    </div>
    
    <!-- right div for setting icon -->
    <div class="right_setting_icon_div">
     <img src="images/setting.png" class="post_setting_icons" height="20" width="20"/>
    </div>
    
 </div>
 
 <!-- status post div -->
 <div class="post_text_div">
 <?php echo $post->status(); ?>
 </div>
 
 <!-- post images div -->
 <div class="post_image_div">
 <?php 
 $path="uploads/".$postUser->id."/post/".$post->id();
 if(is_dir($path)){
		 $image=glob($path."/"."*jpg");
		 $totalImageCount=0;
		 foreach($image as $images){
			$postImage=$images;
			$totalImageCount++;
		 }
 ?>
  <img src="<?php echo $postImage; ?>" width="300" class="post_images" style="border-radius:2px;cursor:pointer;position:relative;"/>
  <input type="hidden" value="<?php echo $post->id(); ?>" id="popPostId"/>
  <input type="hidden" value="<?php echo $postUser->id; ?>" id="popUserId"/>
  <?php if($totalImageCount > "1"){
	  $totalImageCount=$totalImageCount-1;
	  ?>
  <div class="more_image_div">+<?php echo $totalImageCount; ?></div> 
  <?php
  }
   } 
  ?>
 </div>

 <!-- like dislike comment main div -->
 <div class="like_dislike_comment_main_div">
 <input type="hidden" id="post_id" value="<?php echo $post->id(); ?>" />
  <div class="like_div">
    <?php if($post->alreadyLike($user->id) == 0){ ?>
     <img src="images/like.png" height="25" width="25" class="like"/>
     <?php }else{ ?>
     <img src="images/like.png1" height="25" width="25" class="like"/>
     <?php } ?>
     <span class="number_count_like"><?php echo $post->getLike(); ?></span>
  </div>
  <div class="dislike_div">
     <?php if($post->alreadyDislike($user->id) == 0){ ?>
     <img src="images/dislike.png" height="25" width="25" class="dislike"/>
     <?php }else{ ?>
     <img src="images/dislike.png1" height="25" width="25" class="dislike"/>
     <?php } ?>
    
    <span class="number_count_dislike"><?php echo $post->getDislike(); ?></span>
  </div>
  <div class="commen_div"><img src="images/comment.png" height="25" width="25" class="comment"/><span class="number_count"><?php echo $post->getComment(); ?></span></div>
 </div>
 <style>
.main_comment_div{
	min-height:50px;
	padding-left:5px;
	padding-right:5px;
	background:;
}
.comment_input_div{
	background:;
	height:50px;
	margin-bottom:5px;
	text-align:left;
}
.comment_input_profile_pic{
	float:left;
	width:65px;
	height:50px;
	background:;
}
.input_comment_profile_pic_image{
	border-radius:50%;
}
.input_comment_box_div{
	float:left;
	width:380px;
	background:;
	height:50px;
}
.input_comment_box{
	font-family:Elegant Lux Mager;
	font-size:17px;
	width:380px;
	height:30px;
	text-indent:8px;
	outline:none;
	border:0px;
	border-bottom:1px solid rgba(0,0,0,.3);
	color:gray;
	margin-top:10px;
}
/*comment output div*/
.comment_output_div{
	padding:5px;
	min-height:30px;
	text-align:left;
	margin-top:1px;
}
.comment_output_div1{
	padding:5px;
	min-height:30px;
	text-align:left;
	margin-top:1px;
	display:none;
}
.output_image_username_div{
	background:;
	height:35px;
}
.output_image_div{
	float:left;
	background:;
	height:35px;
	width:50px;
	margin-left:10px;
}
.output_comment_profile_pic_image{
	border-radius:50%;
}
.commenter_username{
	height:35px;
	float:left;
	background:;
	padding-top:8px;
}
.output_comment_name_link{
	text-decoration:none;
	color:#09F;
	font-size:16px;
}
.output_comment_name_link:hover{
	text-decoration:underline;
}
.date_comment{
	margin-left:10px;
	font-size:13px;
	color:gray;
	float:right;
	margin-top:13px;
}
.comment_username_output_div{
	min-height:10px;
	background:;
}
.comment_text{
	font-size:15px;
	color:gray;
	margin-left:60px;
}
.view_more_comment_div{
	background:;
	display:none;
	text-align:right;
	margin-top:5px;
	color:gray;
	font-size:13px;
	margin-right:13px;
	padding-left:10px;
}
.view_more_comment_link{
    font-size:15px;
	color:#000;
}
.view_more_comment_link:hover{
	text-decoration:underline;
}
</style>
 <!-- comment display div -->
 <div class="main_comment_div">
    <!-- comment input div that content image and text box -->
    <div class="comment_input_div">
      <div class="comment_input_profile_pic">
        <img src="<?php echo $postUser->profilePicture("medium"); ?>" height="50" width="50" class="input_comment_profile_pic_image"/>
      </div>
      <div class="input_comment_box_div">
       <input type="hidden" id="comment_post_id" value="<?php echo $post->id(); ?>"/>
       <input type="text" class="input_comment_box" placeholder="Comment"/>
      </div>
    </div>
    <!-- fro enter each comment -->
    <div class="total_comment_div">
    <!-- fro enter each comment -->
    <?php 
	$commentQuery = $post->query("select * from `comment` where post_id='".$post->id()."' order by comment_id desc limit 5");
	while($commentRow=mysql_fetch_array($commentQuery)){
		$commentId=$commentRow['comment_id'];
		$cUser = new User($commentRow['user_id']);
		$comment = new Comment($commentId);
    ?>
    <!-- comment output div -->
    <div class="comment_output_div">
           <div class="output_image_username_div">
             <div class="output_image_div">
               <img src="<?php echo $cUser->profilePicture("medium"); ?>" height="35" width="35" class="output_comment_profile_pic_image"/>
              </div>
             <div class="commenter_username"><a href="profile.php?id=<?php echo $cUser->id; ?>" class="output_comment_name_link"><?php echo $cUser->username(); ?></a></div>
             <span class="date_comment"><?php echo $comment->cDate(); ?></span>
           </div>
           <!-- comment username and text div --> 
           <div class="comment_username_output_div">
              <div class="comment_text"><?php echo $comment->text(); ?></div>
           </div>
  
    </div>
   <?php } ?>  
   </div>
   <div class="view_more_comment_div"><a href="#" class="view_more_comment_link">see more</a></div>
    
 </div>
</div>