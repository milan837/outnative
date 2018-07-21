<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dating</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<script>
$(document).ready(function(e) {
    $(".date_button").click(function(){
		var date_user_id=$(this).attr('id');
		//$.post("",{date_user_id:date_user_id},function(getData){
			//alert(getData);
		//});
		alert(date_user_id);
		if($(this).attr('value') == "Ask For A Date"){
			$(this).attr('value','Requested');
			$(this).css({"background":"#5fba7d"});
		}else if($(this).attr('value') == 'Requested'){
			$(this).attr('value','Ask For A Date');
			$(this).css({"background":"rgb(32,105,142)"});
		}
	});
});
</script>
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
		.match_main_date_div{
			min-height:400px;
			width:490px;
			background:;
			text-align:left;
		}
		.each_div_class{
			margin-top:8px;
			margin-left:5px;
			display:inline-block;
			background:#FFF;
			boder-radius:3px;
			box-shadow:0 0 1px 0 rgba(0,0,0,.55);
			width:150px;
			height:180px;
		}
		.name_div{
			text-align:center;
			padding:7px;
			height:25px;
			background:;
			color:#09F;
			font-size:15px;
		}
		.image_div{
			padding:5px;
			height:110px;
			background:;
		}
		.dating_select_image{
			border-radius:50%;
		}
		.bottom_div_for_buttom{
			background:;
			height:45px;
		}
		.date_button{
		    margin-top:5px;
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
		.date_button:active{
			position:relative;
			top:2px;
		}
		.dating_username_link{
			text-decoration:none;
			color:#09F;
		}
		.dating_username_link:hover{
			text-decoration:underline;
		}
		
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
           <!-- date match main div -->
            <div class="match_main_date_div">
            <?php 
			if(strtolower($user->sex()) == "male"){
				$selectSex="female";
			}else{
				$selectSex="male";
			}
			$genderQuery=$db->query("select * from `user_details` where sex='".$selectSex."'");
			while($genderRow=mysql_fetch_array($genderQuery)){
				$findUserId=$genderRow['user_id'];
				$datingUser = new User($findUserId);
		    ?>
              <!-- each div for all the selected users -->
              <div class="each_div_class">
                  <a href="profile.php?id=<?php echo $datingUser->id; ?>" class="dating_username_link">
                    <div class="name_div"><?php echo $datingUser->username(); ?></div>
                  </a>
                  <div class="image_div">
                    <center><img src="images/jb.jpg" height="100" width="100" class="dating_select_image"/></center>
                  </div>
                  <div class="bottom_div_for_buttom">
                    <center> <input type="button" class="date_button" id="<?php echo $datingUser->id; ?>" value="Ask For A Date" /> </center>
                  </div>
              </div>
              <?php } ?>
            </div>
         
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/newFrnsDiv.php"; ?>
        </div>       
   </div>
</center><br>
<?php // include "include/footer.php"; ?>
</body>
</html>