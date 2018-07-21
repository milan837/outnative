<!-- 
    created by milan shrestha
    date 7 20 2016
    time 12:11
-->

<style>
.main_div_for_profile_pictures{
	width:480px;
	min-height:500px;
}
.top_title_main_container{
	height:30px;
}
.top_title_profile_image_div{
	height:30px;
	text-align:left;
	padding:5px;
	font-family:Elegant Lux Mager;
	font-size:17px;
	float:left;
	cursor:pointer;
	margin-right:10px;
}
.profile_images_container_div{
	text-align:left;
	width:480px;
	margin-top:5px;
	min-height:150px;
}
.post_images_container_div{
	display:none;
	text-align:left;
	width:480px;
	margin-top:5px;
	min-height:150px;
}
.each_profile_images_div{
	display:inline-block;
	width:157px;
	height:150px;
	background:;
	margin-top:1px;
}
.all_profile_images{
	border-radius:2px;
	cursor:pointer;
}

</style>
<!-- mian images div for user pictures -->
<div class="main_div_for_profile_pictures">

  <!-- title or profile picture -->
  <div class="top_title_main_container">
      <div class="top_title_profile_image_div" id="profile_image_tab" style="color:#09C;">Profile Images</div>
      <div class="top_title_profile_image_div" id="post_image_tab">Post Images</div>
  </div>
      <!-- profile images containing div -->
      <div class="profile_images_container_div">
      <?php 
	  //fetching all profile image
	  $path="images/";
	  if(is_dir($path)){
		  $allProfileImg=glob($path."*jpg");
		  foreach($allProfileImg as $images){
	   ?>
       <div class="each_profile_images_div">
         <img src="<?php echo $images; ?>" height="150" width="157" class="all_profile_images"/>
       </div>
        <?php   }
		  }else{
			  echo "cannot find directory";
		  }
		 ?>
      </div>
      
      <!-- post images containing div -->
      <div class="post_images_container_div">
      <?php 
	  //fetching all post images
	  $postImagePath="images/";
	  if(is_dir($postImagePath)){
		  $allPostImages=glob($postImagePath."*jpg");
		  foreach($allProfileImg as $postImg){
	  ?>
      <div class="each_profile_images_div">
        <img src="<?php echo $postImg; ?>" height="150" width="157" class="all_profile_images"/>
       </div>
        <?php }
	    }else{
			echo "cannot find directory";
		}
		?>
      </div>
      
</div>