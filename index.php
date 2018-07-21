<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome To Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(e) {
	$(".login_button").click(function(){
		var myUsername = $("#myUsername").val();
	    var myPassword = $("#myPassword").val();
		
		if(myUsername == ""){
			$(".error_display_div").html("Please enter the E-mail");
		}else if(myPassword == ""){
			$(".error_display_div").html("Please enter the password");
		}else{
			$(".error_display_div").html("Processing");
			$.post("php/login.php",{
				myUsername:myUsername,
				myPassword:myPassword
			},function(getLoginData){
				//alert(getLoginData);
				if(getLoginData == "not active"){
					window.location.replace("verification.php");
				}else if(getLoginData == "loggedin"){
					window.location.replace("home.php");
				}else{
					$(".error_display_div").html(getLoginData);
				}
			});
		}
	});
});
</script>
<body>
<!-- top eader dv -->
<div class="top_header_div">
  <?php include "include/sessionOutHeader.php"; ?>
</div>

<!-- middle div -->
<div class="full_middle_div_content">
    <center>
        <div class="middle_contain_div">
             <!-- login div -->
             <div class="login_main_div">
               <!-- top div -->
               <div class="top_login_title_div">Login</div>
               <!-- eror display div -->
               <div class="error_display_div">Please Login</div>
               
               <!-- input box container div -->
               <div class="input_box_container_div">
                   <!-- username and password input box -->
                   <input type="text" class="username" id="myUsername" placeholder="E-mail" />
                   <input type="password" class="username" id="myPassword" placeholder="****************" />
                   
                   <div class="button_container_div">
                   <input type="button" value="Login" class="login_button"/>
                        <div class="forget_div">
                        <input type="button" value="Forget Password?" onClick="window.location.replace('forget_password.php');" class="signUp_button"/>
                        </div>
                   </div>
                 
                   <!-- join us button div -->
                   <div class="last_text_div">Join Us <a href="signup.php" class="signUp_link">Sign Up?</a></div>
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