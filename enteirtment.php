<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Enteirtment</title>
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
		.main_ent_div{
			background:;
			width:490px;
			min-height:400px;
		}
		.top_title_info_div{
			background:;
			text-align:left;
			padding:5px;
		}
		.main_content_enter_div{
			background:;
			min-height:400px;
			margin-top:5px;
			text-align:left;
		}
		/*--------------------------*/
.artistManDiv{
	display:inline-block;
	width:235px;
	height:70px;
	border-radius:3px;
	background:;
	margin-left:5px;
	margin-top:5px;
	margin-bottom:3px;
	box-shadow:0 0 1px 0 rgba(0,0,0,.45);
}
.divLink{
	text-decoration:none;
}
.artistManDiv:hover{
	box-shadow:0 0 1px 1px #09C;
}
.videoDiv{
	width:70px;
	height:70px;
	background:;
	border-bottom-left-radius:3px;
	border-top-left-radius:3px;
	float:left;
}
.thumb{
	border-bottom-left-radius:3px;
	border-top-left-radius:3px;
}
.detailsDiv{
	float:left;
	width:165px;
	height:70px;
	border-bottom-right-radius:3px;
	border-top-right-radius:3px;
	color:#000;
	background:;
}
.songTitleDiv{
	font-family:Elegant Lux Mager;
	font-size:15px;
	background:;
	word-break:normal;
	padding:5px;
	height:40px;
	border-top-right-radius:3px;
	text-align:left;
	color:#09C;
}
.songArtistName{
	text-align:left;
	font-family:Elegant Lux Mager;
	font-size:13px;
	height:30px;
	color:gray;
	background:;
	padding-top:2px;
	padding-left:5px;
	border-bottom-right-radius:3px;
}
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
			 <!-- div for enteirtment -->
             <div class="main_ent_div">
               <!-- top div fro enteirtment -->
               <div class="top_title_info_div">
                 Watch new songs with lyrics
               </div>
               
               <!-- content videos divs -->
               <div class="main_content_enter_div">
               <?php for($y=0;$y<14;$y++){ ?>
                    <a href="#" class="divLink">
                    <div class="artistManDiv">
                        <div class="videoDiv"><img src="images/maxresdefault.jpg" height="70" width="70" class="thumb"/></div>
                        <div class="detailsDiv">
                        <div class="songTitleDiv">my life is brillent my life is brillent my life is..</div>
                        <div class="songArtistName">By justin beiber fb milan shrestha</div>
                        </div>
                    </div>
                    </a>
                <?php } ?>
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