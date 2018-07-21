<?php include "include/topCode.php"; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Events</title>
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
		.main_events_div{
			min-height:1500px;
			width:490px;
			background:;
			padding:5px;
		}
		.title_top_evnets_div{
			background:;
			text-align:left;
			padding:4px;
		}
		.each_events_div{
			cursor:pointer;
			margin-top:10px;
			width:450px;
			min-height:300px;
			background:#FFF;
			border-radius:3px;
			box-shadow:0 0 2px 0 rgba(0,0,0,.55);
		}
		.image_slider_div{
			background:#eee;
			border-top-left-radius:3px;
			border-top-right-radius:3px;
			height:200px;
		}
		.bottom_event_info_div{
			height:100px;
			background:;
			border-bottom-left-radius:3px;
			border-bottom-right-radius:3px;
		}
		.top_event_box_title{
			background:;
			height:30px;
			text-align:left;
			padding-left:3px;
			padding:5px;
			border-bottom:1px solid rgba(0,0,0,.15);
			color:#5fba7d;
		}
		.description_event_div{
			height:70px;
			background:;
			padding:5px;
			font-size:14px;
			text-align:left;
			word-break:break-all;
			color:gray;
		}
		.event_image_property{
			width:100%;
			height:100%;
			border-top-left-radius:3px;
			border-top-right-radius:3px;
		}
        </style>
        <!-- center middle div -->
        <div class="center_content_div">
         <center> 
         <div class="main_events_div">
          <!-- top divs -->
          <div class="title_top_evnets_div">Upcomming Events</div>
         <?php 
		 $array = array("3.jpg","1.jpeg","2.jpeg","4.jpg","5.jpg","7.jpg");
		 for($a=0;$a<5;$a++){ ?>
          <!-- each events div -->
          <div class="each_events_div">
             <!-- image slider div -->
             <div class="image_slider_div">
               <img src="images/<?php echo $array[$a]; ?>" class="event_image_property"/>
             </div>
             
             <!-- information div -->
             <div class="bottom_event_info_div">
               <div class="top_event_box_title">Retro Nights POOL PARTY</div>
               
               <div class="description_event_div">
                 You can try to diagnose the problem by taking the following steps: 
Go to Start > Control Panel > Network and Internet > Network and Sharing Center > Troubleshoot Problems (at the bottom) > Internet Connections.
Try:
Checking the network cable or router
Resetting the modem or router
Reconnecting to Wi-Fi
               </div>
               
             </div>
             
          </div>
           <!-- each events div ends -->
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
<?php //include "include/footer.php"; ?>
</body>
</html>