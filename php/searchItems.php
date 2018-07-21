<?php
include "includeCode.php";

$keyword=mysql_real_escape_string(stripslashes(trim($_POST['input_search_data'])));
if(!empty($keyword)){
	$searchQuery=$db->query("SELECT * FROM `user_login` WHERE concat(fname,' ',lname) like '".$keyword."%' and active='1' limit 7");
	if(mysql_num_rows($searchQuery) >= 1){
		while($row=mysql_fetch_array($searchQuery)){
			$searchUser=new User($row['user_id']);
		
?>
<a href="profile.php?id=<?php echo $searchUser->id; ?>" class="search_item_link">
<div class="each_item_search">   
 <img src="images/jb.jpg" height="50" width="50" class="search_profile_pic"/>
 <span class="search_username"><?php echo $searchUser->username(); ?></span>
</div>
</a>
<?php
	}
		}else{
		echo '<div class="each_item_search">   
			 <img src="images/search.jpg" height="50" width="50" class="search_profile_pic"/>
			 <span class="search_username">'.$keyword.' Not Found</span>
			 </div>';
		}
}
?>
              