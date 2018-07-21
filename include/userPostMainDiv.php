<style>
.user_post_main_div{
	width:480px;
	min-height:150px;
	background:;
	margin-top:5px;
	box-shadow:0 0 1px rgba(0,0,0,.5);
}
.text_post_div{
	min-height:80px;
	background:;
	width:480px;
}
.textarea_post{
	padding:7px;
	min-height:80px;
	width:475px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	font-weight:300;
	outline:none;
	border:0px;
	resize:vertical;
	overflow:hidden;
	border-bottom:1px solid rgba(0,0,0,.3);
}
.image_upload_div{
	height:70px;
	width:475px;
	margin-top:3px;
	background:;
}
.left_images_div{
	width:250px;
	height:70px;
	background:;
	float:left;
}
.center_location_post_type_div{
	margin-left:3px;
	width:220px;
	height:70px;
	background:;
	float:left;
}
.upload_image{
	border-radius:2px;
	cursor:pointer;
	margin-top:8px;
}
.location_input_div{
	height:30px;
	background:;
}
.input_location{
	font-family:Elegant Lux Mager;
	font-size:17px;
	width:200px;
	height:25px;
	text-indent:15px;
	outline:none;
	border:0px;
	border-bottom:1px solid rgba(0,0,0,.3);
	color:gray;
}
.select_input_and_btn_div{
	background:;
	height:40px;
}
.select_input_div{
	float:left;
	margin-top:3px;
	width:150px;
	background:;
}
.select_input{
	height:30px;
	font-family:Elegant Lux Mager;
	font-size:16px;
	color:gray;
}
.post_button_div{
	float:right;
	width:70px;
	height:40px;
	background:;
}
.post_btn{
	margin-top:3px;
	width:70px;
	font-family:Elegant Lux Mager;
	font-size:16px;
	cursor:pointer;
	padding-bottom:5px;
	height:30px;
}
.each_images{
	background:;
	height:55px;
	width:57px;
	float:left;
	margin-left:5px;
	}
.upload_image_file{
	display:none;
}
</style>
<script>
$(document).ready(function(e) {
   $(".upload_image").click(function(){
	   $(this).parent().find(".upload_image_file").click();
   }); 
   
   $(".upload_image_file").change(function(){
	   $(this).parent().find('.upload_image')[0].src = window.URL.createObjectURL(this.files[0]);
   });
   $(".post_btn").click(function(){
	   //alert("asd");
	   $(".popUpLoader").fadeIn(10);
   });
});
</script>
<?php
include "class/PostInputs.php";
$postInput = new PostInputs($user->id);
if(isset($_POST['post_button'])){
    $location=$_POST['location'];
	$status=$_POST['status'];
	$postType=$_POST['post_type'];
	$selectPostId=$postInput->postData($location,$status,$postType);
	if(!empty($selectPostId)){
		$postInput->postImage($selectPostId,"desktop");
	}
	
}
?>

<div class="user_post_main_div">
<form method="post" enctype="multipart/form-data">
    <div class="text_post_div">
      <textarea class="textarea_post" placeholder="Share Your Feeelings" name="status"></textarea>
    </div>
    <div class="image_upload_div">
      <!-- select upload image -->
      <div class="left_images_div">
       <div class="each_images">
         <img src="images/upload.jpg" height="55" width="57" class="upload_image"/>
         <input type="file" name="upload_image[]" class="upload_image_file"/>
       </div>
       
       <div class="each_images">
       <img src="images/upload.jpg" height="55" width="57" class="upload_image"/>
       <input type="file" name="upload_image[]" class="upload_image_file"/>
       </div>
       
       <div class="each_images">
       <img src="images/upload.jpg" height="55" width="57" class="upload_image"/>
       <input type="file" name="upload_image[]" class="upload_image_file"/>
       </div>
       
       <div class="each_images">
       <img src="images/upload.jpg" height="55" width="57" class="upload_image"/>
       <input type="file" name="upload_image[]" class="upload_image_file"/>
       </div>
       
      </div>
      
      <!-- post type and location -->
      <div class="center_location_post_type_div">
        <div class="location_input_div"> 
          <input type="text" placeholder="Location" class="input_location" name="location"/>
        </div>
        
        <!-- below select and butn div -->
        <div class="select_input_and_btn_div">
          
          <!-- left select option button div -->
          <div class="select_input_div">
           <select class="select_input" name="post_type">
             <option>Firends</option>
             <option>Friends of Friends</option>
           </select>
           </div>
           
           <!-- button div -->
           <div class="post_button_div">
            <input type="submit" value="Post" class="post_btn" name="post_button"/>
           </div>
        
        </div>
      </div>
      
    </div>
    </form>
</div>