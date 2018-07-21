// setting page JavaScript Document

$(document).ready(function(e) {
    $(".change_password_main_div").click(function(){
		$(".change_password_content_div").slideToggle('fast');
	});
	$(".account_setting_main_div").click(function(){
		$(".account_setting_content_div").slideToggle('fast');
	});
	
	$(".change_button").click(function(){
		var oldPassword=$("#oldPassword").val();
		var newPassword=$("#newPassword").val();
		var reNewPassword=$("#reNewPassword").val();
		if(oldPassword == ""){
			$(".error_display").html("please enter the old password");
		}else if(newPassword == ""){
			$(".error_display").html("please enter the new password");
		}else if(reNewPassword == ""){
			$(".error_display").html("please Re-enter the new password");
		}else if(newPassword != reNewPassword){
			$(".error_display").html("New Password do not match");
		}else{
			$(".error_display").html("Processing");
			$.post("php/changePassword.php",
			{
				oldPassword:oldPassword,
				newPassword:newPassword
			},function(getResult){
				if(getResult == "notmatch"){
					$(".error_display").html("Old password do not match");
				}else if(getResult == "change"){
					$(".error_display").html("Your password is sucassfully change");
				}
			});
		}
	});
});