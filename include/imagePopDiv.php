<style>
</style>
<script>
$(document).ready(function(e) {
    
	
	$(".list_images").click(function(){
		current_image=$(this);
		$(".main_display_image").attr('src',current_image.attr('src'));
	});
	
	$(".right_icon_div").click(function(){
		var right_img=current_image.next();
		if(current_image.is(":last-child")){
			current_image=$(".image_list_div").find("img").first();
		}else{
			current_image=right_img;
		}
		$(".main_display_image").attr('src',current_image.attr('src'));
		current_image=current_image;
		
	});
	
	$(".left_icon_div").click(function(){
		var left_img=current_image.prev();
		if(current_image.is(":first-child")){
			current_image=$(".image_list_div").find("img").last();
		}else{
			current_image=left_img;
		}
		$(".main_display_image").attr('src',current_image.attr('src'));
		current_image=current_image;
	});
});
</script>
<?php 

$userId=trim($_POST['userId']);
$postId=trim($_POST['postId']);
$dir="../uploads/".$userId."/post/".$postId;

?>
       <div class="top_image_main_container">
       <div class="left_icon_div"></div>
       <img src="../images/5.jpg" class="main_display_image"/>
       <div class="right_icon_div"></div>
       </div>
       <div class="image_list_div">
<?php
	if(is_dir($dir)){
		$images=glob($dir."/"."*jpg");
		foreach($images as $image){
			$image=str_replace("../","",$image);
			echo '<img src="'.$image.'" class="list_images" height="110" width="120" />';
		}
	}else{
		echo "llll";
	}
?>
       </div>

