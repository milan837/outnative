<?php
 include "include/topCode.php";
 include "class/UserCheck.php";
 $user=new User(UserCheck::userId($session->get("username")));
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Outnative</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>
<style>

</style>
<script>
$(document).ready(function(e) {
    $(".following_btn").click(function(){
		var follow_id=$(this).attr('id');
		$.post("php/follow.php",{follow_id:follow_id},function(getData){
			//alert(getData);
		});
		if($(this).attr('value') == "Follow"){
			$(this).attr('value','Unfollow');
			$(this).css({"background":"#5fba7d"});
		}else if($(this).attr('value') == 'Unfollow'){
			$(this).attr('value','Follow');
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
        
        <!-- center middle div -->
        <div class="center_content_div">
         <center>       
         <?php 
if(isset($_GET['title'])){
   $searchKeywords=trim($_GET['title']);
   $friendQuery=$db->query("select * from `user_login` where concat(fname,' ',lname) like '".$searchKeywords."%' and active='1'");
}else{
   $friendQuery=$db->query("select * from `user_login` where user_id not in (select friend_id from `friend_list` where user_id='".$user->id()."') and user_id!='".$user->id()."'");
}
if(mysql_num_rows($friendQuery) == 0){
	echo "sorry User not found";
}
		 while($friendRow=mysql_fetch_array($friendQuery)){
		  ?>   
             <div class="find_new_friends_div">
               <?php include "include/findFriendsPageDiv.php"; ?>
             </div>
             <div class="line_div"></div>
         <?php } ?> 
         </center>
        </div>
        
        <!-- right middle div -->
        <div class="right_content_div">
           <?php include "include/MixMaxDiv.php"; ?>
        </div>       
   </div>
</center><br>
<?php //include "include/footer.php"; ?>
</body>
</html>