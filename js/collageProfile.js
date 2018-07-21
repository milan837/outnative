// JavaScript Document
$(document).ready(function(e) {
    $("#clz_gallary").click(function(){
		$(this).css({"color":"#5fba7d"});
		$("#clz_student").css({"color":"#000"});
		$("#clz_reviews").css({"color":"#000"});
		$("#clz_contacts").css({"color":"#000"});
		
		$(".clz_gallary_div").fadeIn('fast');
		$(".students_list_container").fadeOut();
		$(".review_container_div").fadeOut();
	});
	$("#clz_student").click(function(){
		$(this).css({"color":"#5fba7d"});
		$("#clz_gallary").css({"color":"#000"});
		$("#clz_reviews").css({"color":"#000"});
		$("#clz_contacts").css({"color":"#000"});
		
		$(".students_list_container").fadeIn('fast');
		$(".clz_gallary_div").fadeOut();
		$(".review_container_div").fadeOut();
	});
	$("#clz_reviews").click(function(){
		$(this).css({"color":"#5fba7d"});
		$("#clz_student").css({"color":"#000"});
		$("#clz_gallary").css({"color":"#000"});
		$("#clz_contacts").css({"color":"#000"});
		
		$(".review_container_div").fadeIn('fast');
		$(".students_list_container").fadeOut();
		$(".clz_gallary_div").fadeOut();
	});
	$("#clz_contacts").click(function(){
		$(this).css({"color":"#5fba7d"});
		$("#clz_student").css({"color":"#000"});
		$("#clz_gallary").css({"color":"#000"});
		$("#clz_reviews").css({"color":"#000"});
		
		$(".students_list_container").fadeIn('fast');
		$(".review_container_div").fadeOut();
		$(".clz_gallary_div").fadeOut();
	});
	
	$("#clz_leave_review").click(function(){
		$(".leavePopReview").fadeIn('fast');
	});
	$(".cancle_btn").click(function(){
		$(".leavePopReview").fadeOut('fast');
	});
	
	$(".write_btn").click(function(){
		var reviewText=$(".review_textarea").val();
		var cId=$("#cId").val();
		var username=$("#Lusername").val();
		var userId=$("#LuserId").val();
		var userImg=$("#LuserPic").val();
		
		if(reviewText == ""){
		}else{
			$.post("php/writeClzReview.php",{reviewText:reviewText,cId:cId},function(getData){
				if(getData == "1"){
					$(".leavePopReview").fadeOut('fast');
					$(".review_container_div").prepend('<div class="main_each_review_div"><div class="top_reviewrs_info_div"><div class="inside_content"><div class="left_image_container"><img src="'+userPic+'" class="reviews_images"/></div><div class="right_info_container"><div class="username_review_div"><a href="profile.php?id='+userId+'" class="username_link">'+username+'</a></div><div class="clz_review_div">Collage</div><div class="date_review_div">Just now</div></div></div></div><div class="text_review_div">'+reviewText+'</div><br></div>');	
				}
			});
		}
	});
});