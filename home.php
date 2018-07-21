<?php 
include "include/topCode.php";
if($user->active() == 0){
	header("location: verification.php");
} 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
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
		});
	});
	
	$(document).keydown(function(e){
		if(e.keyCode == 27){
			$(".pop_image_div").fadeOut('fast');
		}
	});
	
	
});

</script>
</head>
<style>

</style>
<body>
<div class="include_header_div">
 <?php include "include/header.php"; ?>
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
			 <?php include "include/userPostmainDiv.php"; ?> 
                    
             <?php 
			 
			 $postQuery=$db->query("select * from `post` order by post_id desc");
			 while($postRow=mysql_fetch_array($postQuery)){
			     $postId=$postRow['post_id'];
				 $post=new Post($postId);
				 $postUser = new User($post->userId());
				 include "include/postDisplayDiv.php"; 
             } ?>
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/newFrnsDiv.php"; ?>
        </div>       
   </div>
  
</center><br>
<?php //include "include/footer.php"; ?>
</body>
</html>