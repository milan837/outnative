<style>
.right_frns_div{
	background:;
	width:204px;
	height:500px;
}
.top_title_div{
	font-family:Elegant Lux Mager;
	font-size:16px;
	padding:5px;
	font-weight:bold;
	padding-left:10px;
	width:200px;
	height:30px;
	background:;
	color:gray;
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
}
.frns_list_body{
	overflow:auto;
	overflow-x:hidden;
	background:;
	height:290px;
	cursor:pointer;
}

.frns_list_body::-webkit-scrollbar
{
  width: 7px;  /* for vertical scrollbars */
  height: 5px; /* for horizontal scrollbars */
}
.frns_list_body::-webkit-scrollbar-track
{
  background: rgba(0, 0, 0, 0.1);
}
.frns_list_body::-webkit-scrollbar-thumb
{
  background: rgba(0, 0, 0, 0.2);
}

.frn_image_name_div{
	height:50px;
	background:;
}
.frn_image_name_div:hover{
	background:#eee;
}
.show_case_image{
	
}
.frn_list_content_div{
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
	height:55px;
	padding:2px;
	background:;
}
.ads_content_div{
	padding:5px;
	height:180px;
	background:;
	border-right:1px solid rgba(0, 0, 0, 0.2);
}
.left_image_div{
	float:left;
	width:50px;
	height:50px;
	background:;
}
.right_content_tunt_div{
	width:200px;
	background:;
	height:50px;
}
.song_app_title_name_div{
	text-decoration:none;
	height:17px;
	font-size:14px;
	font-family:Elegant Lux Mager;
}
</style>
  <div class="right_frns_div">
     <!-- top title friend -->
     <div class="top_title_div">Outnative Tendents</div>
     <!-- each frns div -->
     <div class="frns_list_body">
       <?php for($a=0;$a<5;$a++){ ?>
         <a href="#" class="each_tendents_link" style="text-decoration:none;">
         <div class="frn_list_content_div">
               <!-- image and name div -->
               <div class="frn_image_name_div">
                 <!-- left div for image of songs -->
                 <div class="left_image_div">
                   <img src="images/jb.jpg" height="50" width="50" class="show_case_image"/>
                 </div>
                 
                 <!-- right content div -->
                 <div class="right_content_tunt_div">
                   <!-- name div -->
                   <div class="song_app_title_name_div"><span style="position:relative;left:5px;color:#000;">Sorry</span></div>
                   <div class="song_app_title_name_div">
                     <span style="position:relative;left:5px; color:gray;">By Justin beiber</span>
                   </div>
                   <div class="song_app_title_name_div">
                     <span style="position:relative;left:5px; color:gray;">Views</span><span style="margin-left:10px;text-decoration:none;">109182</span>
                   </div>
                 </div>

               </div>
              
          </div>
          </a>
        <?php } ?>  
     </div>
     <!-- publishing ads div -->
     <div class="ads_content_div">
        <center><span style="margin-top:20px;">Ads</span></center>
     </div>
     
  </div>
