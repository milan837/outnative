<style>
.main_profile_pop_div{
	height:100%;
	width:100%;
	position:fixed;
	left:0%;
	right:0%;
	top:0%;
	bottom:0%;
	z-index:1000;
	display:none;
	background:rgba(0, 0, 0, .4);
}
.inside_profile_pop_div{
	width:400px;
	height:236px;
	background:#FFF;
	border-radius:3px;
	margin-top:13%;
}
.profile_picture_title_div{
	background:;
	font-size:18x;
	font-family:Elegant Lux Mager;
	color:#000;
	padding:7px;
	text-align:left;
	height:35px;
	padding-left:15px;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
	box-shadow:0 0 2px 0px rgba(0,0,0,.55);
	margin-bottom:1px;
}
.profile_left_div{
	background:orange;
	height:200px;
	width:200px;
	float:left;
}
.profile_right_div{
	background:;
	height:200px;
	width:200px;
	float:right;
	cursor:pointer;
}
.profile_picture_profile{
	width:100%;
	height:100%;
	border-bottom-left-radius:3px;
	cursor:pointer;
}
.choose_btn_div{
	height:30px;
	margin-top:10px;
	background:;
}
.uploads_button1{
	height:30px;
	width:120px;
	background:rgb(95, 186, 125);
	border:0px;
	border-radius:3px;
	font-family:Elegant Lux Mager;
	color:#FFF;
	outline:none;
	cursor:pointer;
	font-size:15px;
}
.uploads_button2{
	height:30px;
	width:120px;
	background:#09F;
	border:0px;
	border-radius:3px;
	font-family:Elegant Lux Mager;
	color:#FFF;
	outline:none;
	font-size:15px;
	cursor:pointer;
}
.uploads_button2:active{
	position:relative;
	top:3px;
}
.uploads_button3{
	height:30px;
	width:120px;
	background:orange;
	border:0px;
	border-radius:3px;
	font-family:Elegant Lux Mager;
	color:#FFF;
	outline:none;
	font-size:15px;
	cursor:pointer;
}
.uploads_button3:active{
	position:relative;
	top:3px;
}
.uploads_button1:active{
	position:relative;
	top:3px;
}
</style>
<script>
$(document).ready(function(e) {
    $(".user_profile_picture").click(function(){
		$(".main_profile_pop_div").fadeIn('fast');
	});
	$(".uploads_button3").click(function(){
		$(".main_profile_pop_div").fadeOut('fast');
	});
	
	$(".profile_picture_profile").click(function(){
		$("#profile_image_file").click();
	});
	$("#profile_image_file").change(function(){
		$('.profile_picture_profile')[0].src = window.URL.createObjectURL(this.files[0]);
	});
});
</script>

<div class="main_profile_pop_div">
<center>
<form method="post" enctype="multipart/form-data">
   <div class="inside_profile_pop_div">
     <!-- top title div -->
     <div class="profile_picture_title_div">Profile Picture</div> 
     <!-- left div for profile picture -->
     <div class="profile_left_div">
     <img src="<?php echo $user->profilePicture("medium")?>" class="profile_picture_profile" />
      <input type="file" id="profile_image_file" style="display:none;" name="uploadFileImage"/>
     </div>
     
     <!-- right div for profile picture -->
     <div class="profile_right_div">
     <br><br>
      <div class="choose_btn_div">
      <input type="button" class="uploads_button1" value="Choose Gallary" />
      </div>
      
      <div class="choose_btn_div">
      <input type="submit" class="uploads_button2" name="uploadButton" value="Upload" />
      </div>
      
       <div class="choose_btn_div">
      <input type="button" class="uploads_button3" value="Cancle" />
      </div>
       
     </div>  
   </div>
   </form>
</center>
</div>