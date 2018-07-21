<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<script src="js/setting.js" type="text/javascript"></script>
</head>

<body>
<div class="include_header_div">
 <?php include "include/header.php"; ?>
</div><br><br><br><br><br><br><br>
<center>
  <div class="main_div">
        <!-- left middle div -->
        <div class="left_content_div">
          <?php include "include/ntfMsgChatDiv.php"; ?>
        </div>
        <style>
		.main_center_content_div{
			background:;
			min-height:200px;
			width:480px;
			box-shadow:0 0 1px 0 rgba(0,0,0,.55);
			margin-top:2px;
		}
		.top_setting_title_div{
			height:30px;
			padding:5px;
			font-weight:bold;
			background:;
		}
		.change_password_main_div, .account_setting_main_div{
			background:#eee;
			height:30px;
			padding:5px;
			text-align:left;
			padding-left:20px;
			border-left:3px solid #09F;
			cursor:pointer;
		}
		.change_password_content_div{
			background:#FFF;
			height:200px;
			padding:5px;
			display:none;
		}
		.account_setting_content_div{
			background:#FFF;
			height:40px;
			padding:5px;
			display:none;
		}
		.each_input_box{
			height:30px;
			background:;
			margin-top:4px;
		}
		.text_box{
			font-family:Elegant Lux Mager;
			font-size:17px;
			width:200px;
			height:30px;
			text-indent:15px;
			outline:none;
			border:0px;
			border-bottom:1px solid rgba(0,0,0,.3);
			color:gray;
		}
		.change_button{
			width:200px;
			height:30px;
			border-radius:3px;
			background:rgb(32,105,142);
			outline:none;
			border:0px;
			cursor:pointer;
			font-size:15px;
			font-family:Elegant Lux Mager;
			font-size:15px;
			color:#FFF;
			padding-bottom:3px;
		}
		.change_button:active{
			position:relative;
			top:2px;
		}
		.deactive_link{
			text-decoration:none;
			color:#000;
		}
		.deactive_link:hover{
			text-decoration:underline;
			color:blue;
		}
		.error_display{
			background:;
			padding:5px;
		}
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
           <!-- main_center_content_div -->
           <div class="main_center_content_div">
           <div class="top_setting_title_div">Settings</div>
               <!-- each div for all te settings -->
               <div class="change_password_main_div">Change Password</div>
               <!-- main_content div -->
               <div class="change_password_content_div">
                  <div class="error_display">Please enter all the fields</div>
                  <div class="each_input_box"><input type="password" class="text_box" id="oldPassword" placeholder="Old password"/></div>
                  <div class="each_input_box"><input type="password" class="text_box" id="newPassword" placeholder="New password"/></div>
                  <div class="each_input_box"><input type="password" class="text_box" id="reNewPassword" placeholder="Re-type new password"/></div>
                  <div class="each_input_box"><input type="button" class="change_button" value="Change" /></div>
               </div>
               <div class="account_setting_main_div" style="border-left:3px solid #C33;">Account Setting</div>
               <!-- main_content div -->
               <div class="account_setting_content_div">
                  <div class="each_input_box"><a href="#" class="deactive_link">Deactive your account Milan shrestha ?</a></div>
               </div>
           </div>
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/MixMaxDiv.php"; ?>
        </div>       
   </div>
</center><br>
<?php include "include/footer.php"; ?>
</body>
</html>