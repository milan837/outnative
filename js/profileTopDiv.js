// for profile Top Div script
$(document).ready(function(e) {
    // on click event for profile page option tabs
	// post tab
	$("#profile_option_post").click(function(){
		$(".profile_post_profile_images_div").fadeOut(10);
		$(".profile_main_followers_div").fadeOut(10);
		$(".profile_main_following_div").fadeOut(10);
		$(".profile_about_div").fadeOut(10);
		$(".profile_post_display_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#profile_option_photos").css({"color":"#000"});
		$("#profile_option_about").css({"color":"#000"});
		$("#profile_option_following").css({"color":"#000"});
		$("#profile_option_followers").css({"color":"#000"});
		
	});
	
	// about tab
	$("#profile_option_about").click(function(){
		$(".profile_post_profile_images_div").fadeOut(10);
		$(".profile_main_followers_div").fadeOut(10);
		$(".profile_main_following_div").fadeOut(10);
		$(".profile_post_display_div").fadeOut(10);
		$(".profile_about_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#profile_option_photos").css({"color":"#000"});
		$("#profile_option_following").css({"color":"#000"});
		$("#profile_option_followers").css({"color":"#000"});
		$("#profile_option_post").css({"color":"#000"});
	});
	
	// gallary tab
	$("#profile_option_photos").click(function(){
		$(".profile_about_div").fadeOut(10);
		$(".profile_post_display_div").fadeOut(10);
		$(".profile_main_following_div").fadeOut(10);
		$(".profile_main_followers_div").fadeOut(10);
		$(".profile_post_profile_images_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#profile_option_post").css({"color":"#000"});
		$("#profile_option_about").css({"color":"#000"});
		$("#profile_option_following").css({"color":"#000"});
		$("#profile_option_followers").css({"color":"#000"});
	});
	
	// following tab
	$("#profile_option_following").click(function(){
		$(".profile_about_div").fadeOut(10);
		$(".profile_post_display_div").fadeOut(10);
		$(".profile_post_profile_images_div").fadeOut(10);
		$(".profile_main_followers_div").fadeOut(10);
		$(".profile_main_following_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#profile_option_post").css({"color":"#000"});
		$("#profile_option_about").css({"color":"#000"});
		$("#profile_option_photos").css({"color":"#000"});
		$("#profile_option_followers").css({"color":"#000"});
	});
	
	// followers tab
	$("#profile_option_followers").click(function(){
		$(".profile_about_div").fadeOut(10);
		$(".profile_post_display_div").fadeOut(10);
		$(".profile_post_profile_images_div").fadeOut(10);
		$(".profile_main_following_div").fadeOut(10);
		$(".profile_main_followers_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#profile_option_post").css({"color":"#000"});
		$("#profile_option_about").css({"color":"#000"});
		$("#profile_option_photos").css({"color":"#000"});
		$("#profile_option_following").css({"color":"#000"});
	}); 
	
	
	// changing post and profile images tab layout
	//Profile Image tab
	$("#profile_image_tab").click(function(){
		$(".post_images_container_div").fadeOut(10);
		$(".profile_images_container_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#post_image_tab").css({"color":"#000"});
	});
	
	//Post Image tab
	$("#post_image_tab").click(function(){
		$(".profile_images_container_div").fadeOut(10);
		$(".post_images_container_div").fadeIn(500);
		
		//changing the tab font color
		$(this).css({"color":"#09C"});
		$("#profile_image_tab").css({"color":"#000"});
	});
	
	//follow and unfollow button script
	$(".follow_btn").click(function(){
		var follow_id=$(this).attr('id');
		$.post("php/follow.php",{follow_id:follow_id},function(getData){
			//alert(getData);
		});
		if($(this).attr('value') == "Follow"){
			$(this).attr('value','Unfollow');
			$(this).css({"background":"#5fba7d"});
		}else if($(this).attr('value') == 'Unfollow'){
			$(this).attr('value','Follow');
			$(this).css({"background":"rgb(32,105,142)"});
		}
	});
	
	//follow and unfollow button script for small btn
	$(".profile_follow_btn").click(function(){
		var follow_id=$(this).attr('id');
		$.post("php/follow.php",{follow_id:follow_id},function(getData){
			//alert(getData);
		});
		if($(this).attr('value') == "Follow"){
			$(this).attr('value','Unfollow');
			$(this).css({"background":"#5fba7d"});
		}else if($(this).attr('value') == 'Unfollow'){
			$(this).attr('value','Follow');
			$(this).css({"background":"rgb(32,105,142)"});
		}
	});
	
});