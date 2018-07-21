<style>
.title_friends_div{
	padding:5px;
	background:;
	font-family:Elegant Lux Mager;
	font-size:18px;
	padding-left:10px;
	border-bottom:1px solid rgba(0,0,0,.25);
}
.each_ntf_content_div2{
	font-family:Elegant Lux Mager;
	font-size:15px;
	min-height:35px;
	padding:5px;
	color:#000;
	cursor:pointer;
}
.each_ntf_content_div2:hover{
	background:rgba(0, 0, 0, 0.1);
}
.result_nt_fnd{
	background:#5fba7d;
	display:none;
	font-family:Elegant Lux Mager;
	font-size:16px;
	color:#FFF;
	padding:10px;
}
</style>
<div class="title_friends_div">Friends</div>
     <!-- search div  --> 
     <div class="search_content_div">
       <input type="text" class="ntf_msg_chat_search1" placeholder="search"/>
     </div>
     
<div class="ntf_content_div" id="each_chat_content_div" style="display:block;height:470px;">
     <!-- each online contact div content -->
	  <?php 
	  $myFriendsQuery=$db->query("select * from `user_login` where user_id in (select friend_id from friend_list where user_id='".$user->id."') and user_id in (select user_id from friend_list where friend_id='".$user->id."')");
	  while($myFrnsRow=mysql_fetch_array($myFriendsQuery)){ 
	  $myFrnsUser = new User($myFrnsRow['user_id']);
	  ?>
      <a href="#" style="text-decoration:none;">
      <div class="each_ntf_content_div2" id="">
        <input type="hidden" value="<?php echo $myFrnsUser->id; ?>" id="userIdValue"/>
        <input type="hidden" value="<?php echo $myFrnsUser->username(); ?>" id="userNameValue"/>
        <div class="top_profile_pic_username_div" style="height:35;padding-top:3px">
            <img src="images/jb.jpg" height="30px" width="30px" class="msg_profile_pic"/>
            <span class="msg_username"><?php echo $myFrnsUser->username(); ?></span>
        </div>
     </div>
     </a>
     <?php } ?>
     <div class="result_nt_fnd">No Result Found</div>
    </div>