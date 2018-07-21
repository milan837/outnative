// JavaScript Document
 $(document).ready(function(e) {
	 //likes
	 var totalLikes=null;
	 var totalDislikes=null;
	 
    $(".like_div").click(function(){
		var post_id=$(this).parent().parent().find("#post_id").val();
		var likeImage = $(this).parent().find(".like").attr('src');
		var setDislikeImg=$(this).parent().parent().find(".dislike");
		
		var setLike=$(this).parent().find(".number_count_like");
		var setDisLike=$(this).parent().parent().find(".number_count_dislike");
		
		$.post("php/like.php",{post_id:post_id},function(getLikes){
			//alert(getLikes);
			var getl=getLikes.split("/");
			getLikes=getl[0];
			getDislike=getl[1];
			
			setLike.text(getLikes);
			setDisLike.text(getDislike);
			setDislikeImg.attr('src','images/dislike.png');
		});
		
		if(likeImage == "images/like.png"){
			$(this).parent().find(".like").attr('src','images/dislike.png');
		}else if(likeImage == "images/dislike.png"){
			$(this).parent().find(".like").attr('src','images/like.png');
		}
	});
	
	//dislike
	  $(".dislike_div").click(function(){
		var post_id=$(this).parent().parent().find("#post_id").val();
		var likeImage = $(this).parent().find(".dislike").attr('src');
		var setLikeImg=$(this).parent().parent().find(".like");
		
		var setDisLike=$(this).parent().find(".number_count_dislike");
		var setLike=$(this).parent().parent().find(".number_count_like");
		
		$.post("php/dislike.php",{post_id:post_id},function(getDislikes){
			//alert(getDislikes);
			var getl=getDislikes.split("/");
			getDislikes=getl[0];
			getLike=getl[1];
			
			setDisLike.text(getDislikes);
			setLike.text(getLike);
			setLikeImg.attr('src','images/like.png');
		});
		
		if(likeImage == "images/like.png"){
			$(this).parent().find(".dislike").attr('src','images/dislike.png');
		}else if(likeImage == "images/dislike.png"){
			$(this).parent().find(".dislike").attr('src','images/like.png');
		}
	});
	
	//comments for the post
	$(".input_comment_box").keyup(function(e) {
		var postId=$(this).parent().find("#comment_post_id").val();
		var commentText=$(this).val();
		var userId=$("#LuserId").val();
		var userPic=$("#LuserPic").val();
		var username=$("#Lusername").val();
		var mty=$(this);
		var placeCmt=$(this).parent().parent().parent().find(".total_comment_div");
		
		if(e.keyCode == 13){
			if(commentText.length != 0){
			$.post("php/comment.php",{postId:postId,commentText:commentText},function(getData){
				//alert(getData);
				if(getData == 1){
					placeCmt.prepend('<div class="comment_output_div"><div class="output_image_username_div"><div class="output_image_div"><img src="'+userPic+'" height="35" width="35" class="output_comment_profile_pic_image"/></div><div class="commenter_username"><a href="profile.php?id='+userId+'" class="output_comment_name_link">'+username+'</a></div><span class="date_comment">just now</span></div><div class="comment_username_output_div"><div class="comment_text" id="just_user_txt_cmt">'+commentText+'</div></div></div>');
					mty.val("");
				}
			});
			}
		}
    });
});