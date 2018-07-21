<style>
.main_each_review_div{
	background:;
	min-height:100px;
}
.top_reviewrs_info_div{
	height:100px;
	width:600px;
	background:;
}
.inside_content{
	height:100px;
	width:600px;
}
.left_image_container{
	height:100px;
	width:100px;
	float:left;
	background:;
	margin-left:20px;
}
.right_info_container{
	height:100px;
	width:400px;
	margin-left:10px;
	background:;
	float:left;
}
.reviews_images{
	height:100%;
	width:100%;
	border-radius:50%;
}
.text_review_div{
	background:;
	min-height:10px;
	padding:5px;
	padding-left:20px;
	padding-right:20px;
	font-size:16px;
	color:gray;
}
.username_review_div{
	background:;
	padding:5px;
	margin-top:10px;
	color:gray;
}
.clz_review_div{
	background:;
	padding:3px;
	padding-left:5px;
	font-size:15px;
	color:gray;
}
.date_review_div{
	background:;
	padding:3px;
	padding-left:5px;
	font-size:15px;
	color:gray;
}
.username_link{
	text-decoration:none;
	color:#09F;
	font-size:18px;
}
.username_link:hover{
	text-decoration:underline;
}
</style>
<div class="main_each_review_div">
   <!-- top info div -->
   <div class="top_reviewrs_info_div">
    <div class="inside_content">
         <!-- left container -->
         <div class="left_image_container">
          <img src="images/jb.jpg" class="reviews_images"/>
         </div>
         
         <!-- left container -->
         <div class="right_info_container">
            <!-- username -->
            <div class="username_review_div"><a href="#" class="username_link"><?php echo $rUser->username(); ?></a></div>
            <div class="clz_review_div">Collage</div>
            <div class="date_review_div"><?php echo $rqRow['review_date'];?></div>
         </div>
     </div>
   </div>
   <!-- text review div -->
   <div class="text_review_div">
     <?php echo $rqRow['review']; ?>
  </div><br>
</div>