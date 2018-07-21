<?php 
include "include/topCode.php"; 
if($user->active() == 1){
	header("location: home.php");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Verify your E-mail</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(e) {
	$("#send_btn").click(function(){
		var code = $("#input_code").val();
		var method = "check";
		
		if(code == ""){
			$(".error_display").fadeIn('fast');
			$(".error_display").html("Please enter the code");
		}else{
			$.post("php/verification.php",{code:code,method:method},function(getCodeData){
				//alert(getCodeData);
				if(getCodeData == "verified"){
					window.location.replace("home.php");
				}else if(getCodeData == "not verified"){
					$(".error_display").fadeIn('fast');
					$(".error_display").html("Please enter the correct code");
				}
			});
		}
	});
	
	$("#resend_btn").click(function(){
		var method="resend";
		$.post("php/verification.php",{method:method},function(getSendData){
			if(getSendData == "mail sent"){
				$(".error_display").fadeIn('fast');
				$(".error_display").html("Code is sent to your mail");
			}
		});
	});
	
});
</script>
<body>
<!-- top eader dv -->
<div class="top_header_div">
  <?php include "include/sessionOutHeader.php"; ?>
</div>
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
.gmail_link{
	color:#8BC34A;
}
.error_display{
	text-align:left;
	padding-left:10px;
	font-family:Elegant Lux mager;
	font-size:14px;
	color:#F96;
	display:none;
}
</style>
<!-- middle div -->
<div class="full_middle_div_content">
    <center>
    
      <!-- main div for verification -->
      <div class="main_forgetpassword_div">
       <br><br><br><br><br><br><br>
          <div class="content_div_all">
             <!-- top div -->
             <div class="f_g_p_t">Verify Your E-mail : <font style="font-weight:bold;text-decoration:underline;"><?php echo $user->email(); ?></font></div>
             <div class="text_content_div">Please enter the 4 digit code.The 4 digit has been send to this email address<br>
                Please check your email address <a href="#" class="gmail_link">Gmail</a></div>
                <div class="error_display">Verification Code is not Correct</div>
             <!-- input box and button -->
             <div class="input_text_button_div">
             <input text="text" placeholder="Code" id="input_code" class="text_box_input"/>
             <input type="button" value="Proceed" id="send_btn" class="send_buton" />
             </div>
             
             <div class="input_text_button_div">
             <input type="button" value="Resend Code" id="resend_btn" class="resend_buton" />
             </div>
          </div>
       </div>
        
    </center>
</div>

<!-- bottom div -->
<div class="bottom_footer_div">
  <?php include "include/footer.php"; ?>
</div>

</body>
</html>