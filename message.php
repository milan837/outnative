<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<link rel="stylesheet" type="text/css" href="css/message.css"/>
<script src="js/message.js" type="text/javascript"></script>
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
        
        <!-- center middle div -->
        <div class="center_content_message_div">
         <center>  
         <div class="main_center_div" style="display:none;">     
            <!-- top message contain div -->
            <div class="top_title_message_div">
              <div class="profile_picture_message_div">
                <img src="" height="40" width="40" class="message_profile_pic"/>
              </div>
              <!-- username div for message chat box -->
              <div class="username_message_top_div">
                <a href="#" class="username_link_message"><span class="usname">Username</span></a>
              </div>
               
              <!-- div right for settings -->
              <div class="right_setting_message_div">
                <img src="images/setting.png" height="20" width="20" class="message_settings_image"/>
              </div>
              
            </div>
          
            <!-- main message div -->
            <div class="main_message_display_div">
            </div>
            <style>
			.left_image_iconDiv{
				width:100px;
				height:90px;
				background:;
				float:left;
			}
			.right_content_divCtn{
				width:380px;
				height:90px;
				float:left;
				background:;
				margin-left:15px;
			}
            </style>
            <!-- send box message -->
            <div class="send_messagebox_div">
            <!-- left content div -->
            <div class="left_image_iconDiv"><img src="images/jb.jpg" height="90" width="100" style=""/></div>
            
            <!-- right content div -->
            <div class="right_content_divCtn">
               <div class="top_emo_action_div">
			     <?php 
				 $dir="emo/";
				 if(is_dir($dir)){
				 $images=glob($dir."*png");
				
				 for($t=0;$t<count($images);$t++){  ?><img src="<?php echo $images[$t];?>" height="20" width="20" style=" margin-right:5px;cursor:pointer"/><?php } }?>
               </div>
               <div class="message_type_div">
                <input type="text" placeholder="type yout message" class="message_type_box"/>
               </div>
               
            </div>
             <!-- right content div ends -->
            </div>
            </div>
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/usersOnline.php"; ?>
        </div>       
   </div>
</center><br>
<?php include "include/footer.php"; ?>
</body>
</html>