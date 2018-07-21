<?php 
include "include/topCode.php"; 
include "class/CollageDetails.php";
$cId=trim($_GET['cid']);
$collage=new Collage($cId);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/education.css"/>
<script src="js/collageProfile.js" type="text/javascript"></script>
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
		.main_college_info_div{
			margin-left:50px;
			min-height:400px;
			width:600px;
			background:#FFF;
			box-shadow:0 0 2px 0 rgba(0,0,0,.55);
		}
		.top_container_info{
			height:200px;
			background:;
		}
		.left_information_div{
			background:;
			width:350px;
			height:200px;
			float:left;
		}
		.right_information_div{
			background:;
			width:250px;
			height:200px;
			float:left;
		}
		.middle_container_div{
			background:;
			min-height:30px;
			padding:10px;
			color:gray;
			font-size:16px;
		}
		.title_div_wiki{
			height:20px;
			padding:5px;
			font-size:18px;
			color:;
			padding-left:10px;
		}
		.collage_profile_image{
			width:100%;
			height:100%;
			border-top-right-radius:3px;
		}
		.college_name_div{
			min-height:20px;
			background:;
			padding:5px;
			padding-left:10px;
			color:#09F;
			font-size:18px;
			margin-bottom:5px;
		}
		.collage_location_div{
			margin-top:5px;
			min-height:20px;
			background:;
			padding-left:10px;
			padding-right:10px;
			color:gray;
			font-size:16px;
		}
		.clz_web_link{
			text-decoration:none;
			color:gray;
		}
		.clz_web_link:hover{
			text-decoration:underline;
			color:#09F;
		}
       </style>
        <!-- center middle div -->
        <div class="center_content_div">
            <div class="main_college_info_div">
             <div class="top_container_info">
                <!-- left div -->
                <div class="left_information_div">
                  <!-- collage name div -->
                  <div class="college_name_div"><?php echo $collage->name(); ?></div>
                  <!-- collage location -->
                  <div class="collage_location_div"><?php echo $collage->location(); ?></div>
                  <!-- collage websites -->
                  <div class="collage_location_div">Website <a href="#" class="clz_web_link"><?php echo $collage->website(); ?></a></div>
                  <!-- collage location -->
                  <div class="collage_location_div">From <?php echo $collage->year(); ?> - 2016</div>
                  <!-- collage location -->
                  <div class="collage_location_div">2003+ Students</div>
                  
                </div>
                
                <!-- right information div -->
                <div class="right_information_div">
                <img src="images/8.jpg" class="collage_profile_image"/>
                </div>
             </div>
             <div class="title_div_wiki">Wikipedia</div>
             <!-- middle container -->
             <div class="middle_container_div">
                 <?php echo $collage->info(); ?>
             </div>
             <style>
			 .tab_options_div{
				 box-shadow:0 0 2px 0 rgba(0,0,0,.55);
				 background:;
				 height:35px;
			  }
			  .inside_container{
				 background:;
				 height:35px;
			  }
			  .tabs_items_div{
				  height:35px;
				  background:;
				  font-size:17px;
				  padding:8px;
				  width:100px;
				  float:left;
				  margin-left:5px;
				  cursor:pointer;
			 }
			 .clz_gallary_div{
				 min-height:200px;
				 background:;
				 margin-top:4px;
				 text-align:left;
				 padding-left:10px;
				 
			 }
			 .clz_images{
				 margin-left:2px;
				 margin-top:3px;
				 display:inline-block;
				 border-radius:3px;
			}
			.students_list_container{
				 min-height:200px;
				 background:;
				 margin-top:4px;
				 text-align:left;
				 display:none;
			}
			.review_container_div{
				min-height:200px;
				 background:;
				 margin-top:4px;
				 text-align:left;
				 display:none;
			}
             </style>
             <!-- tab host container -->
             <div class="tab_options_div">
               <div class="inside_container">
                  <!-- option items div -->
                  <div class="tabs_items_div" id="clz_gallary" style="color:#5fba7d">Gallery</div>
                  <div class="tabs_items_div" id="clz_student">Students</div>
                  <div class="tabs_items_div" id="clz_reviews">Reviews</div>
                  <div class="tabs_items_div" id="clz_contacts">Contacts</div>
                  <div class="tabs_items_div" id="clz_leave_review">Give Review</div>
               </div>
             </div>
             
             <!-- tabs layout container-->
             <div class="clz_gallary_div">
             <?php for($a=0;$a<10;$a++){ ?>
               <img src="images/4.jpg" height="180" width="187" class="clz_images"/>
              <?php }?>
             </div><br>
             
             <!-- container layout for students -->
             <div class="students_list_container">
               <?php 
			   for($i=0;$i<20;$i++){
			   include "include/studentListItemDiv.php";
			   }
			   ?>
             </div>
             
             <!-- container layout for reviews -->
             <div class="review_container_div">
              <?php 
			  $reviewQuery=$db->query("select * from `college_reviews` where c_id='$cId' order by c_id desc");
			  while($rqRow=mysql_fetch_array($reviewQuery)){
				  $rUser=new User($rqRow['user_id']);
			  include "include/studentReviewsDiv.php";
			  }
			  ?>
             </div>
             
            </div>
        </div>
               
   </div>
   
   <style>
.leavePopReview{
	background:rgba(0, 0, 0, 0.8);
	position:fixed;
	top:0%;
	bottom:0%;
	left:0%;
	right:0%;
	z-index:2000;
	display:none;
}
.main_content_leave_div{
	width:400px;
	background:#FFF;
	height:192px;
	border-radius:3px;
	margin-top:200px;
}
.top_div_for_review{
	height:40px;
	font-family:Elegant Lux mager;
	font-size:18px;
	text-align:left;
	padding:10px;
	padding-left:15px;
	box-shadow:0px 0px 2px 0px rgba(0,0,0,.55);
}
.review_textarea{
	height:110px;
	width:400px;
	font-family:Elegant Lux mager;
	font-size:18px;
	text-align:left;
	outline:none;
	resize:none;
	margin-top:5px;
	padding-left:10px;
	padding-right:10px;
	border:0px;
	border-bottom:1px solid rgba(0,0,0,.55);
}
.button_send_div{
	height:30px;
	background:;
	text-align:left;
	padding-left:10px;
	margin-top:3px;
}
.write_btn{
	background:rgb(32,105,142);
	height:30px;
	width:100px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#FFF;
	border:0px;
	outline:none;
	border-radius:3px;
	cursor:pointer;
	padding-bottom:3px;
}
.write_btn:active{
	position:relative;
	top:3px;
}
.cancle_btn{
	background:red;
	height:30px;
	width:100px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#FFF;
	border:0px;
	outline:none;
	border-radius:3px;
	cursor:pointer;
	margin-left:5px;
	padding-bottom:3px;
}
.cancle_btn:active{
	position:relative;
	top:3px;
}
</style>
<!-- pop up dive for leave review -->
<div class="leavePopReview">
  <div class="main_content_leave_div">
    <!-- top div -->
    <div class="top_div_for_review">Leave a review for your collage</div>
    <textarea class="review_textarea" placeholder="Write some thing to your collage?"></textarea>
    <input type="hidden" id="cId" value="<?php echo $collage->id; ?>"/>
    <div class="button_send_div"><input type="button" value="Write" class="write_btn"/><input type="button" value="Cancle" class="cancle_btn"/></div>
  </div>
</div>

</center><br>
<?php //include "include/footer.php"; ?>
</body>
</html>