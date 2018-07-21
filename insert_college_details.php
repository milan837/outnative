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
<title>Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<script>
$(document).ready(function(e) {
	$(".clz_choose_image").click(function(){
	   $(this).parent().find(".file_collage_image").click();
   }); 
   
   $(".file_collage_image").change(function(){
	   $(this).parent().find('.clz_choose_image')[0].src = window.URL.createObjectURL(this.files[0]);
   });
   
   $(".submit_btn").click(function(){
	   var name=$("#name").val();
	   var website=$("#website").val();
	   var year=$("#year").val();
	   var location=$("#location").val();
	   var info=$("#info").val();
	   
	   if(name == ""){
		   $(".display_error_div").fadeIn('fast');
		   $(".display_error_div").html("Please enter the collage name");
	   }else if(location ==""){
		   $(".display_error_div").fadeIn('fast');
		   $(".display_error_div").html("Please enter the collage location");
	   }else if(website == ""){
		   $(".display_error_div").fadeIn('fast');
		   $(".display_error_div").html("Please enter the collage website");
	   }else if(year == ""){
		   $(".display_error_div").fadeIn('fast');
		   $(".display_error_div").html("Please enter the collage Establish year");
	   }else if(info == ""){
		   $(".display_error_div").fadeIn('fast');
		   $(".display_error_div").html("Please enter the collage wiki information");
	   }else{
		   $(".display_error_div").fadeOut('fast');
		   $.post("php/insertClzInfo.php",
		   {
			   name:name,
			   location:location,
			   year:year,
			   info:info,
			   website:website
		   }
		   ,function(getData){
			   myData=getData.split("/");
			   if(myData[0] == "insert"){
				   window.location.replace("college_profile.php?cid="+myData[1]);
			   }
		   });
	   }
   });
});
</script>
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
.center_content_div::-webkit-scrollbar
{
  width: 7px;  /* for vertical scrollbars */
  height: 5px; /* for horizontal scrollbars */
}
.center_content_div::-webkit-scrollbar-track
{
  background: rgba(0, 0, 0, 0.1);
}
.center_content_div::-webkit-scrollbar-thumb
{
  background: rgba(0, 0, 0, 0.2);
}
.main_top_title{
	text-align:left;
	background:;
	font-family:Elegant Lux Mager;
	font-size:17px;
	padding:8px;
	padding-left:25px;
	box-shadow:0px 0px 2px 0px rgba(0,0,0,.55);
}
.choose_image_div{
	width:200px;
	height:200px;
	background:;
	float:left;
	margin-top:10px;
	margin-left:5px;
}
.input_type_details_div{
	width:500px;
	height:340px;
	background:;
	float:left;
	margin-top:10px;
	margin-left:10px;
}
.clz_choose_image{
	width:100%;
	height:100%;
	border-radius:3px;
	cursor:pointer;
}
.each_input_type_div{
	height:30px;
	background:;
	margin-top:5px;
	margin-left:10px;
	text-align:left;
}
.textbox_clx{
	outline:none;
	margin-bottom:15px;
	padding:5px;
	border:0px;
	font-family:Elegant Lux Mager;
	font-size:16px;
	width:460px;
	text-indent:5px;
	border-bottom:1px solid rgba(0,0,0,.44);
	height:30px;
}
.each_input_text_div{
	height:150px;
	background:;
	margin-top:5px;
	margin-left:10px;
	text-align:left;
}
.textarea_clx{
	height:150px;
	width:460px;
	resize:none;
	outline:none;
	padding:8px;
	font-size:15px;
	font-family:Elegant Lux Mager;
	color:gray;
}
.bbt_div{
	width:200px;
	background:;
	height:40px;
	padding:5px;
}
.submit_btn{
	background:rgb(32,105,142);
	height:30px;
	width:120px;
	font-family:Elegant Lux Mager;
	font-size:15px;
	color:#FFF;
	border:0px;
	outline:none;
	border-radius:3px;
	cursor:pointer;
	padding-bottom:5px;
}
.submit_btn:active{
	position:relative;
	top:3px;
}
.file_collage_image{
	display:none;
}
.display_error_div{
	padding:5px;
	margin-top:5px;
	color:red;
	display:none;
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
			<div class="main_top_title">Insert the collage details</div>
            <div class="display_error_div">Please enter all the fields</div>
            
            <div class="input_type_details_div">
              <div class="each_input_type_div"><input type="text" id="name" class="textbox_clx" placeholder="Collage Name"/></div>
              <div class="each_input_type_div"><input type="text" id="location" class="textbox_clx" placeholder="Collage Location"/></div>
              <div class="each_input_type_div"><input type="text" id="website" class="textbox_clx" placeholder="Collage Website"/></div>
              <div class="each_input_type_div"><input type="text" id="year" class="textbox_clx" placeholder="Establish year"/></div>
              <div class="each_input_text_div"><textarea class="textarea_clx" id="info" placeholder="Enter the Collage information from Wiki info(minimum 300 letter)"></textarea></</div>
              <div class="bbt_div"><input type="button" class="submit_btn" value="submit" /></div>
            </div>
            
         </center>
        </div>
       
   </div>
</center><br>
<?php //include "include/footer.php"; ?>
</body>
</html>