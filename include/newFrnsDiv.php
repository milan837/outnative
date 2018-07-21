<style>
.right_frns_div{
	background:;
	width:204px;
	height:500px;
}
.top_title_div{
	font-family:Elegant Lux Mager;
	font-size:18px;
	padding:5px;
	font-weight:bold;
	margin-left:3px;
	width:200px;
	height:30px;
	background:;
	color:gray;
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
}
.frns_list_body{
	background:;
	height:290px;
	padding:2px;
}
.frn_image_name_div{
	height:50px;
	background:;
}
.new_frn_profile_pic{
	border-radius:50%;
}
.new_frn_name{
	font-family:Elegant Lux Mager;
	font-size:17px;
	position:relative;
	top:-20px;
	margin-left:6px;
}
.frns_username_link{
	color:#09F;
	text-decoration:none;
}
.frns_username_link:hover{
	text-decoration:underline;
}
.button_div{
	text-align:right;
	background:;
	height:30px;
}
.follow_button{
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
.follow_button:active{
	position:relative;
	top:2px;
}
.frn_list_content_div{
	margin-top:5px;
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
	height:88px;
	padding:2px;
	background:;
}
.ads_content_div{
	padding:5px;
	height:180px;
	background:;
	border-right:1px solid rgba(0, 0, 0, 0.2);
}
</style>
  <div class="right_frns_div">
     <!-- top title friend -->
     <div class="top_title_div">New Friends</div>
     <!-- each frns div -->
     <div class="frns_list_body">
       <?php 
	   $newFrnsQuery=$db->query("select * from `user_details` where user_id!='".$user->id."' order by views desc limit 3");
	   while($newFrnsDivRow=mysql_fetch_array($newFrnsQuery)){
		   $rightUserId = $newFrnsDivRow['user_id'];
		   $rightUser = new User($rightUserId);
	    ?>
         <div class="frn_list_content_div">
               <!-- image and name div -->
               <div class="frn_image_name_div">
                 <img src="images/jb.jpg" height="50px" width="50px" class="new_frn_profile_pic"/>
                 <span class="new_frn_name"><a href="#" class="frns_username_link"><?php echo $rightUser->username(); ?></a></span>
               </div>
               <!-- button div -->
               <div class="button_div">
                <input type="button" class="follow_button" value="Follow"/>
               </div>
          </div>
        <?php } ?>  
     </div>
     <!-- publishing ads div -->
     <div class="ads_content_div">
        <center><span style="margin-top:20px;">Ads</span></center>
     </div>
     
  </div>
