// JavaScript Document
$(document).ready(function(e) {
	var userId=null;
    $(".each_ntf_content_div2").click(function(){
		$(".main_center_div").fadeIn(10);
		userId=$(this).find("#userIdValue").val();
		var username=$(this).find("#userNameValue").val();
		var userImage=$(this).children().find(".msg_profile_pic").attr('src');
		//alert(userImage);
		$(".message_profile_pic").attr('src',userImage);
		$(".usname").html(username);
		$(".username_link_message").attr('href','profile.php?id='+userId);
		
		$.post("php/getMessage.php",{userId:userId},function(getMessageData){
			$(".main_message_display_div").html(getMessageData);
		});
	});
	
	//testing message to users
	$(".message_type_box").keyup(function(e){
		var receiverId=$("#receiverId").val();
		var senderId=receiverId;
		var message=$(this).val();
		if(e.keyCode == 13){
			if(message == ""){
			  $(this).css({"border-bottom":"2px solid red"});
		    }else{ 
			  $(this).css({"border-bottom":"2px solid rgba(0,0,0,.55)"});
				$(this).val("");
				$(".main_message_display_div").prepend(" <div class='sender_message_div'><div class='date_time_div2'>just now</div><div class='main_message_send'>"+ message +"</div></div>");
				
				
				$.post("php/sendMessage.php",{receiverId:receiverId,message:message},function(){
					$.post("php/messageSeen.php",{senderId:senderId},function(getMydata){
				    //alert(getMydata);
			        });
				});
			}
		}
	});
	
	
	//seeting interval for message
		setInterval(function(){
		 $.post("php/getMessage.php",{userId:userId},function(getMessageData){
			$(".main_message_display_div").html(getMessageData);
			//$("#right_son_msg").scrollTop($(".main_message_display_div")[0].scrollHeight);
		 });
	    },3000);
		
	 // for search box of find friend list----------------	
	 $(".ntf_msg_chat_search1").keyup(function(){
		 var val = $(this).val().toLowerCase();
		 $(".each_ntf_content_div2").hide();
		 $(".each_ntf_content_div2").each(function(){
			 var text = $(this).children().find('.msg_username').text().toLowerCase();
			 if(text.indexOf(val) != -1){
				$(this).show();
			 }else{
				 $(".result_nt_fnd").show();
			 }
		 });
	 });
	 
});