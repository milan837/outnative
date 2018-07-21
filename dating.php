<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dating</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
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
		.main_dating_div{
			margin-top:5px;
			width:490px;
			height:480px;
			box-shadow: 0 0 1px 0 rgba(0,0,0,.55);
			border-radius:3px;
		}
		.text_div_for_date{
			padding:10px;
			height:80px;
			background:;
			font-family:Elegant Lux Mager;
			font-size:35px;
			color:#09F;
		}
		.below_line_div{
			width:350px;
			margin-top:20px;
			border-bottom:1px solid rgba(0,0,0,.55);
		}
		.heart_main_div{
			background:url(images/HEART.png);
			height:300px;
			width:300px;
		}
		.profile_picture_div{
			position:relative;
			border-radius:50%;
			margin-top:70px;
		}
		.start_button{
			margin-top:15px;
			width:100px;
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
		.start_button:active{
			position:relative;
			top:2px;
		}
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
			<div class="main_dating_div">
            <br>
             <!-- text for this div -->
             <div class="text_div_for_date">Find a perfect Women for you
             <div class="below_line_div"></div>
             </div>
             
             <!-- heart div -->
             <div class="heart_main_div">
                <center>
                <div class="user_image_div">
                  <img src="images/jb.jpg" height="120" width="120" class="profile_picture_div"/>
                </div>
                </center>
             </div>
             
             <!-- div for button -->
             <div class="button_start_div">
               <input type="button" class="start_button" value="Start" onClick="window.location.replace('find_date.php');"/>
             </div>
            </div>
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/newFrnsDiv.php"; ?>
        </div>       
   </div>
</center><br>
<?php //include "include/footer.php"; ?>
</body>
</html>