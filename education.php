<?php 
include "include/topCode.php"; 
include "class/CollageDetails.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/education.css"/>
<style>

</style>
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
        .each_collage_div{
			background:#FFF;
			height:240px;
			width:220px;
			border-radius:3px;
			box-shadow:0 0 2px 0 rgba(0,0,0,.55);
			display:inline-block;
			margin-left:3px;
			margin-top:2px;
			margin-bottom:5px;
		}
		.title_div{
			padding:5px;
			font-family:Elegant Lux Mager;
			font-size:22px;
		}
		.image_clz_div{
			width:220px;
			height:150px;
			background:;
			border-top-right-radius:3px;
			border-top-left-radius:3px;
			
		}
		.clz_image{
			border-top-right-radius:3px;
			border-top-left-radius:3px;
			height:100%;
			width:100%;
		}
		.collage_name{
			height:35px;
			background:;
			padding:5px;
		}
		.students_number{
			background:;
			font-size:14px;
			padding:5px;
			color:gray;
		}
		.location_name{
			background:;
			padding:5px;
			color:gray;
		}
		.collagename_link{
			text-decoration:none;
			color:#09F;
		}
		.collagename_link:hover{
			text-decoration:underline;
		}
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
        <div class="title_div">Collages</div>
        <?php
		$collageQuery=$db->query("select * from `college_details` order by c_id desc");
		 while($clzRow=mysql_fetch_array($collageQuery)){
			 $collage=new Collage($clzRow['c_id']);
		 ?>
         <div class="each_collage_div">
          <div class="image_clz_div"><img src="images/4.jpg" class="clz_image" /></div>
          <!-- collage name -->
          <div class="collage_name">
           <a href="college_profile.php?cid=<?php echo $collage->id; ?>" class="collagename_link"><?php echo $collage->name(); ?></a>
          </div>
          <div class="location_name"><?php echo $collage->location(); ?></div>
          <div class="students_number">12,442 Students</div>
         </div>
         <?php } ?>
        </div>
               
   </div>
</center><br>
<?php //include "include/footer.php"; ?>
</body>
</html>