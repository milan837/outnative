<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Forget Password</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
</head>
<style>
.main_forgetpassword_div{
	min-height:500px;
	width:900px;
	background:;
}
.full_middle_div_content{
	width:100%;
	min-height:500px;
	background:;
}
.content_div_all{
	padding-left:10px;
	height:200px;
	width:600px;
	background:#FFF;
	box-shadow:0 0 2px 0 rgba(0,0,0,.55);
}
.f_g_p_t{
	background:;
	height:40px;
	padding:5px;
	font-family:Elegant Lux Mager;
	font-size:19px;
	text-align:left;
	padding-left:10px;
	padding-top:8px;
	color:#8BC34A;
}
.text_content_div{
	height:55px;
	padding:5px;
	font-family:Elegant Lux Mager;
	font-size:17px;
	text-align:left;
	background:;
	padding-left:10px;
}
.input_text_button_div{
	height:40px;
	background:;
	text-align:left;
	margin-bottom:10px;
}
.input_text_button_div2{
	height:100px;
	background:;
	text-align:left;
	margin-bottom:10px;
}
.text_box_input{
	outline:none;
	margin-bottom:15px;
	padding:5px;
	border:0px;
	font-family:Elegant Lux Mager;
	font-size:16px;
	width:270px;
	text-indent:5px;
	border-bottom:1px solid rgba(0,0,0,.44);
	height:30px;
	margin-top:5px;
	margin-left:10px;
}
.send_buton{
    background:#415b82;
	width:100px;
	height:32px;
	border:0px;
	border-radius:3px;
	outline:none;
	font-family:Elegant Lux Mager;
	color:#FFF;
	font-size:16px;
	padding-bottom:5px;
	cursor:pointer;
	position:relative;
	bottom:3px;
	margin-left:5px;
}
.send_buton:active{
	position:relative;
	top:1px;
}
.resend_buton{
    background:#415b82;
	width:150px;
	height:32px;
	border:0px;
	border-radius:3px;
	outline:none;
	font-family:Elegant Lux Mager;
	color:#FFF;
	font-size:16px;
	padding-bottom:5px;
	cursor:pointer;
	position:relative;
	bottom:3px;
	margin-left:11px;
	margin-top:5px;
}
.resend_buton:active{
	position:relative;
	top:1px;
}
.display_msg{
	font-family:Elegant Lux Mager;
	color:#09F;
	font-size:16px;
	margin-left:30px;
	display:none;
}
</style>
<body>
<!-- top eader dv -->
<div class="top_header_div">
  <?php include "include/sessionOutHeader.php"; ?>
</div>
<script>
$(document).ready(function(e) {
    $("#email_send_btn").click(function(){
		var email=$("#email").val();
		var method="check_email";
		if(email == ""){
			$("#error_msg1").fadeIn('fast');
			$("#error_msg1").html("Please enter your email");
		}else{
			$.post("php/forgetPassword.php",{method:method,email:email},function(getResponse){
				//alert(getResponse);
				if(getResponse == "exist"){
					$(".content_item_div").hide('fast');
					$(".content_item_div2").fadeIn('fast');
				}else if(getResponse == "not_exist"){
					$("#error_msg1").fadeIn('fast');
					$("#error_msg1").html("Please enter the correct email");
				}
			});
		}
	});
	
	//checking code 
	$("#check_code_btn").click(function(){
		var code = $("#check_code").val();
		var method="check_code";
		if(code == ""){
		}else{
			$.post("php/forgetPassword.php",{method:method,code:code},function(getResponse){
				//alert(getResponse);
				if(getResponse == "code_match"){
					$(".content_item_div2").hide('fast');
					$(".content_item_div3").fadeIn('fast');
					$(".f_g_p_t").html("Create a new password");
				}else if(getResponse == "code_donot_match"){
					$("#error_msg2").fadeIn('fast');
					$("#error_msg2").html("Code do not match");
				}
			});
		}
	});
	
	//changing password
	$("#change_password_btn").click(function(){
		var method="change_password";
		var newPassword=$("#new_password").val();
		var rePassword=$("#re_password").val();
		
		if(newPassword == ""){
			$("#error_msg3").fadeIn('fast');
			$("#error_msg3").html("Plases enter the new Password");
		}else if(rePassword == ""){
			$("#error_msg3").fadeIn('fast');
			$("#error_msg3").html("Please re-enter the new password");
		}else if(newPassword != rePassword){
			$("#error_msg3").fadeIn('fast');
			$("#error_msg3").html("new password do not match");
		}else{
			$.post("php/forgetPassword.php",
			{
				newPassword:newPassword,
				method:method
			}
			,function(getResponse){
				if(getResponse == "change"){
					window.location.replace("home.php");
				}else if(getResponse == "change"){
					$("#error_msg3").fadeIn('fast');
			        $("#error_msg3").html(getResponse);
				}
			});
		}
	});
});
</script>
<!-- middle div -->
<div class="full_middle_div_content">
    <center>
       <div class="main_forgetpassword_div">
       <br><br><br><br><br><br><br>
          <div class="content_div_all">
             <!-- top div -->
             <div class="f_g_p_t">Forget Password?</div>
             <!-- show hide code div -->
             <div class="content_item_div" >
                 <div class="text_content_div">Please enter your email address.The 4 digit code will be send to this email address<br>
                    $ digit code is send to your email</div>
                 <!-- input box and button -->
                 <div class="input_text_button_div">
                 <input type="text" placeholder="E-mail" id="email" class="text_box_input"/>
                 <span class="display_msg" id="error_msg1">Mail Sent Sucessfully</span>
                 </div>
                 
                 <div class="input_text_button_div">
                 <input type="button" value="Send" id="email_send_btn" class="resend_buton" />
                 </div>
             </div>
             <!-- show div for intering code -->
              <div class="content_item_div2" style="display:none;">
                 <div class="text_content_div">Please enter your 4 digit code.The 4 digit code has been send to your email address<br>
                    $ digit code is send to your email</div>
                 <!-- input box and button -->
                 <div class="input_text_button_div">
                 <input type="text" placeholder="code" id="check_code" class="text_box_input"/>
                 <span class="display_msg" id="error_msg2">Mail Sent Sucessfully</span>
                 </div>
                 
                 <div class="input_text_button_div">
                 <input type="button" value="Proceed" id="check_code_btn" class="resend_buton" />
                 </div>
             </div>
             <!-- show div for insering code end -->
             <!-- changing password div -->
              <div class="content_item_div3" style="display:none;">
                 <!-- input box and button -->
                 <div class="input_text_button_div2" >
                     <div class="tetx_box_div">
                       <input type="password" placeholder="New password" id="new_password" class="text_box_input"/>
                     </div>
                     <div class="tetx_box_div">
                      <input type="password" placeholder="Re-type New Password" id="re_password" class="text_box_input"/>
                      <span class="display_msg" id="error_msg3">Mail Sent Sucessfully</span>
                     </div>
                 </div>
                 
                 <div class="input_text_button_div">
                 <input type="button" value="Proceed" id="change_password_btn" class="resend_buton" />
                 </div>
             </div>
             
             
          </div>
          
       </div>
    </center>
</div>

<!-- bottom div -->
<div class="bottom_footer_div">
  <!-- bottom div -->
<div class="bottom_footer_div">
  <?php include "include/footer.php"; ?>
</div>
</div>

</body>
</html>