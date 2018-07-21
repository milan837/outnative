<?php 
include "include/topCode.php";
if($user->active() == 0){
	header("location: verification.php");
} 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
</head>
<style>
.center_content_div{
	float:left;
	margin-left:3px;
	width:710px;
	height:500px;
	background:;
	overflow:auto;
	font-size:17px;
	overflow-x:hidden;
	font-family:Elegant Lux Mager;
}
.left_div_admin{
	width:300px;
	height:500px;
	background:;
	text-align:left;
	float:left;
	padding-left:7px;
}
.right_div_admin{
	width:400px;
	height:500px;
	background:;
	float:right;
}
.insert_clz_details_div{
	width:180px;
	height:100px;
	box-shadow:0px 0px 3px 0px rgba(0,0,0,.55);
	border-radius:3px;
	display:inline-block;
	margin:5px;
	padding:5px;
	cursor:pointer;
	border:1px solid #FFF;
}
.insert_clz_details_div:hover{
	border:1px solid #09F;
}
.upper{
	height:20px;
	background:;
}
.lower{
	height:70px;
	background:;
}
.show_case_div_users{
	margin-top:10px;
	background:;
}
.show_case_div{
	display:inline-block;
	width:130px;
	height:50px;
	margin:5px;
	border-radius:3px;
	background:;
	box-shadow:0 0 3px 0 rgba(0,0,0,.55);
}
.show_case_div:hover{
	background:#09C;
	cursor:pointer;
	color:#FFF;
}
.top_div_title{
	height:20px;
	padding:3px;
	text-align:center;
}
.bottom_div_text{
	height:25px;
	padding:3px;
	text-align:center;
}
.bottom_div_text_user{
	height:50px;
	padding:3px;
	text-align:center;
	font-size:30px;
}
</style>
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
   
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
         <!-- left div -->
			 <div class="left_div_admin">
                <div class="show_case_div">
                   <div class="top_div_title">Active users</div>
                   <div class="bottom_div_text">20</div>
                </div>
                <div class="show_case_div">
                   <div class="top_div_title">UnActive users</div>
                   <div class="bottom_div_text">20</div>
                </div>
                <div class="show_case_div">
                   <div class="top_div_title">Total post</div>
                   <div class="bottom_div_text">20</div>
                </div>
                <div class="show_case_div">
                   <div class="top_div_title">Total Likes</div>
                   <div class="bottom_div_text">20</div>
                </div>
                <div class="show_case_div">
                   <div class="top_div_title">Total Dislikes</div>
                   <div class="bottom_div_text">20</div>
                </div>
                <div class="show_case_div">
                   <div class="top_div_title">Total Comment</div>
                   <div class="bottom_div_text">20</div>
                </div>
                
                <div class="show_case_div_users">
                   <div class="top_div_title_users">Total users</div>
                   <div class="bottom_div_text_user">212,312,30</div>
                </div>
                
             </div>
             <!-- right div -->
             <div class="right_div_admin">
                <a href="insert_college_details.php">
                <div class="insert_clz_details_div" style="color:#000;text-decoration:none;">
                  <div class="upper">Insert Collage</div>
                  <div class="lower"><img src="images/chat1.png"/></div>
                </div>
                </a>
                <div class="insert_clz_details_div">
                  <div class="upper">Update Collage</div>
                  <div class="lower"><img src="images/chat1.png"/></div>
                </div>
                <div class="insert_clz_details_div">
                  <div class="upper">Delete Collage</div>
                  <div class="lower"><img src="images/chat1.png"/></div>
                </div>
                <div class="insert_clz_details_div">
                  <div class="upper">Collage list</div>
                  <div class="lower"><img src="images/chat1.png"/></div>
                </div>
             </div>
         </center>
        </div>
            
   </div>
  
</center><br>
<?php include "include/footer.php"; ?>
</body>
</html>