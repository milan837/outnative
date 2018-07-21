<style>
.main_about_div_contents{
	width:480px;
	min-height:300px;
	background:;
	margin-top:5px;
	box-shadow:0 0 1px 0 rgba(0,0,0,.55);
	border-radius:3px;
}
.top_details_about_user{
	text-align:left;
	padding:5px;
	padding-left:10px;
	height:30px;
	border-bottom:1px solid rgba(0,0,0,.15);
}
.main_about_user_body{
	min-height:250px;
	background:;
}
.about_user_rows_details{
	background:;
	height:30px;
}
.left_content_item{
	text-align:left;
	padding:5px;
	padding-left:10px;
	float:left;
	height:30px;
	background:;
	width:170px;
}
.right_content_item{
	background:;
	height:30px;
	text-align:left;
	float:left;
	width:310px;
	padding:5px;
}
.edit_image{
	width:30px;
	height:30px;
	background:;
	float:right;
}
</style>

<div class="main_about_div_contents">
  <!-- top details about user -->
  <div class="top_details_about_user">About
   <div class="edit_image"><img src="images/edit.png" height="20" width="23"/></div>
  </div>
  
  <!-- for main details body -->
  <div class="main_about_user_body">
  
     <!-- email details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">E-mail</div>
       <div class="right_content_item"><?php echo $profileUser->email(); ?></div>
     </div>
     
     <!-- Username details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Username</div>
       <div class="right_content_item"><?php echo $profileUser->fname(); ?></div>
     </div>
     
     <!-- Username details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Last Name</div>
       <div class="right_content_item"><?php echo $profileUser->lname(); ?></div>
     </div>
     
     <!-- Collage details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Collage</div>
       <div class="right_content_item"><?php echo $profileUser->college(); ?></div>
     </div>
     
     <!-- Age details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Date Of Birth</div>
       <div class="right_content_item"><?php echo $profileUser->dateOfBirth(); ?></div>
     </div>
     
     <!-- Profession details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Profession</div>
       <div class="right_content_item"><?php echo $profileUser->position(); ?></div>
     </div>
     
     <!-- email details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">WorKplace</div>
       <div class="right_content_item"><?php echo $profileUser->workplace(); ?></div>
     </div>
     
     <!-- email details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Location</div>
       <div class="right_content_item"><?php echo $profileUser->location(); ?></div>
     </div>
   
     <!-- email details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Phone Number</div>
       <div class="right_content_item">8050078113</div>
     </div>
     
     <!-- email details -->
     <div class="about_user_rows_details">
       <div class="left_content_item">Recovery E-mail</div>
       <div class="right_content_item">smashoom@yahoo.com</div>
     </div>
  </div>
</div>