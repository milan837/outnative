<script src="js/header.js" type="text/javascript"></script>
            <style>
			.top_text_div{
				text-align:left;
				width:150px;
				padding:3px;
				margin-top:4px;
				height:25px;
				background:;
				padding-left:20px;
				font-family:Elegant Lux Mager;
				font-size:15px;
				cursor:pointer;
			}
			.option_menu_links{
				text-decoration:none;
				color:#000;
			}
			.drop_down_list_for_search{
				display:none;
				z-index:2000;
				position:fixed;
				min-height:50px;
				width:400px;
				background:#FFF;
				border-bottom-left-radius:5px;
				border-bottom-right-radius:5px;
				box-shadow:0 1px 1px 1px rgba(0,0,0,.15);
			}
			.each_item_search{
				padding:2px;
				text-align:left;
				background:#FFF;
				cursor:pointer;
			}
			.each_item_search:hover{
				background:#eee;
			}
			.search_profile_pic{
				border-radius:50%;
				margin-left:8px;
			}
			.search_username{
				position:relative;
				bottom:20px;
				left:8px;
				font-family:Elegant Lux Mager;
				font-size:16px;
				color:gray;
			}
			.search_item_link{
				text-decoration:none;
				color:gray;
			}
            </style>
            <script>
$(document).ready(function(e) {
   $(".SearchBox").keyup(function(e){
	var input_search_data = $(".SearchBox").val().trim();
		//alert(input_search_data);
		if(input_search_data != ""){
			setTimeout(function(){
				$.post("php/searchItems.php",{input_search_data:input_search_data},function(getData){
					if(getData == "not found"){
					}else{
						$(".drop_down_list_for_search").html(getData);
					}
			    });
			},2000);
			$(".drop_down_list_for_search").slideDown('fast');	
		}else{
			$(".drop_down_list_for_search").slideUp('fast');
		}		
}); 
});
    </script>
<link rel="stylesheet" type="text/css" href="css/header.css" />
<div class="topmenu">
	<center>
       <div class="middleTop">
            <div class="logoDiv">
             <!-- logo place -->
             <a href="home.php" style="text-decoration:none;"><span class="logoName">Outnative<div class="com">.com</div></span></a>
            </div>
            
            <center>
             <div class="search_div">
                <form method="get" action="find_friends.php">
                    <input type="text" placeholder="Search Friends" name="title" class="SearchBox"/>
                    <img src="images/search.png" height="25" width="25" class="searchImage"/>
                </form>
                <!-- drop down list for the search box -->
                <div class="drop_down_list_for_search">
                
                </div>
                
             </div>
            </center>
            
            <div class="searchDiv">
              <img src="<?php echo $user->profilePicture("medium"); ?>" height="40" width="40" class="profile_picture"/>
            </div>
            <div class="option_menu_div">
            
                <!-- text information divs -->
                <a href="profile.php?id=<?php echo $user->id; ?>" class="option_menu_links"><div class="top_text_div"><?php echo $user->username(); ?></div></a>
                <a href="settings.php" class="option_menu_links"><div class="top_text_div">Settings</div></a>
                <a href="feedback.php" class="option_menu_links"><div class="top_text_div">Feedback</div></a>
                <a href="#" class="option_menu_links"><div class="top_text_div">Contact Us</div></a>
                <a href="#" class="option_menu_links"><div class="top_text_div">About Us</div></a>
                <a href="php/logout.php" class="option_menu_links"><div class="top_text_div">Logout</div></a>
                                        
            </div>
        </div>
    </center>
</div>
<div class="second_main_div" style="width:100%;">
   <center>
     <?php include "include/secondMenu.php";?>
   </center>
</div>

<!-- loader div -->
<style>
.popUpLoader{
	height:100%;
	width:100%;
	position:fixed;
	left:0%;
	right:0%;
	top:0%;
	bottom:0%;
	z-index:1000;
	background:#FFF;
	opacity:0.7;
	display:none;	
}
.loader{
	height:300px;
	width:500px;
	margin-top:10%;
	background:;
}
</style>
<div class="popUpLoader">
    <center>
    <div class="loader">
    <img src="images/ajax-loading.gif" class="loaderImage" />
    </div>
    </center>
</div>
<input type="hidden" id="Lusername" value="<?php echo $user->username();?>"/>
<input type="hidden" id="LuserId" value="<?php echo $user->id;?>"/>
<input type="hidden" id="LuserPic" value="<?php echo $user->profilePicture("medium");?>"/>
