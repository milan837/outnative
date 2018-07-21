<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create A New Account</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/signup.css"/>
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(e) {
    $("#signup_btn").click(function(){
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var re_password = $("#re_password").val();
		var position = $("#position").val();
		
		if(fname == ""){
			$(".error_display_div").html("Please enter the first name");
		}else if(lname == ""){
			$(".error_display_div").html("Please enter the last name");
		}else if(email == ""){
			$(".error_display_div").html("Plase enter the email");
		}else if(password == ""){
			$(".error_display_div").html("please enter the password");
		}else if(re_password == ""){
			$(".error_display_div").html("Please re-type our password");
		}else if(position == ""){
			$(".error_display_div").html("Please select your position");
		}else if(password != re_password){
			$(".error_display_div").html("password do not match");
		}else{
			$.post("php/signup.php",{
				fname:fname,
				lname:lname,
				email:email,
				password:password,
				position:position
				},function(getSignupData){
					//alert(getSignupData);
					if(getSignupData == "email already exist"){
						$(".error_display_div").html("E-mail already exist");
					}else if(getSignupData == "signup"){
						window.location.replace("verification.php");
					}
				});
		}
	});
});
</script>
</head>
<style>

</style>
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
               <div class="top_login_title_div">Create A New Account</div>
               <!-- eror display div -->
               <div class="error_display_div">Please Enter the all the fields</div>
               
               <!-- input box container div -->
               <div class="input_box_container_div">
                   <!-- username and password input box -->
                   <input type="text" class="username" id="fname" placeholder="Fname " />
                   <input type="text" class="username" id="lname" placeholder="Lname" />
                   <input type="text" class="username" id="email" placeholder="E-mail" />
                   <input type="text" class="username" id="password" placeholder="Password" />
                   <input type="text" class="username" id="re_password" placeholder="Re-type Password" />
                   
                   <select class="textbox" id="position" style="color: rgb(105,105,105)" name="">
                        <option>Select your Current Position</option>
                        <option>Engineering Student</option>
                        <option>Nursing Student</option>
                        <option>Management Student</option>
                        <option>Pharmacy Student</option>
                        <option>Engineer</option>
                        <option>Nurse</option>
                        <option>Manager/Accountant</option>
                        <option>Other Jobs</option>
                        <option>Jobless</option>
                        <option>Roamer</option>
                        <option>Visitor</option>
                  </select>

                   <div class="button_container_div">
                   <input type="button" value="Sign Up" class="login_button" id="signup_btn"/>
                   </div>
                 
                   <!-- join us button div -->
                   <div class="last_text_div">Already have an account <a href="index.php" class="signUp_link">Login</a></div>
                   
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