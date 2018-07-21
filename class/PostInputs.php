<?php
#post clas

class PostInputs{
	public $userId;
	
	public function __construct($id){
		$this->userId=$id;
	}
	
	public function postImage($postId,$device){
		if(!empty($postId) && !empty($device)){
			if($device == "mobile"){
				$directory = "../uploads/".$this->userId."/post";
			}else if($device == "desktop"){
				$directory = "uploads/".$this->userId."/post";
			}
			
			$makeDir=mkdir($directory."/".$postId);
			$makeSmallDir=mkdir($directory."/".$postId."/small");
			if($makeDir == true && $makeSmallDir == true){
				$size=count($_FILES['upload_image']['name']);
				for($i=0;$i<$size;$i++){
					if(($_FILES['upload_image']['type'][$i] == "image/pjpeg") ||
					   ($_FILES['upload_image']['type'][$i] == "image/jpeg") ||
					   ($_FILES['upload_image']['type'][$i] == "image/jpg") &&
					   ($_FILES['upload_image']['type'][$i] < 10485760)){
						   move_uploaded_file($_FILES['upload_image']['tmp_name'][$i],$directory."/$postId/".$i.".jpg");
						   //$ext=end(explode("/",$_FILES['upload_image']['type'][$i]));
						   //$this->resize_post_image($_FILES['upload_image']['tmp_name'][$i],$directory."/$postId/small/".$i.".jpg",$ext);
					}
				}
			}else{
				return "cannot make an directory";
			}
			
		}		
	}
	
	public function postData($location,$status,$postType){
		$uploadDate=date('Y-m-d');
		if(!empty($location) && !empty($status) && !empty($postType)){
			$query=$this->query("insert into `post`(user_id,upload_text,upload_date,location,privacy) 
		values('".$this->userId."','$status','$uploadDate','$location','$postType')");
		    if($query == true){
				$selectQuery=$this->query("select max(post_id) from `post` where user_id='".$this->userId."'");
				if($row=mysql_fetch_array($selectQuery)){
					return $row[0];
				}
			}
		}
	}
	
	// resizing the  image 
	public function resize_post_image($tmp_name,$imageDir,$ext){
		$target_file =$tmp_name;
		$resized_file =$imageDir;
		$fileExt = $ext;
		$wmax = 300;
		$hmax = 250;
		$this->ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
	}
	
	// Function for resizing jpg, gif, or png image files
	public function ak_img_resize($target, $newcopy, $w, $h, $ext) {
		list($w_orig, $h_orig) = getimagesize($target);
		$scale_ratio = $w_orig / $h_orig;
		if (($w / $h) > $scale_ratio) {
			   $w = $h * $scale_ratio;
		} else {
			   $h = $w / $scale_ratio;
		}
		$img = "";
		$ext = strtolower($ext);
		if ($ext == "gif"){ 
		  $img = imagecreatefromgif($target);
		} else if($ext =="png"){ 
		  $img = imagecreatefrompng($target);
		} else { 
		  $img = imagecreatefromjpeg($target);
		}
		$tci = imagecreatetruecolor($w, $h);
		// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
		imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		imagejpeg($tci, $newcopy, 80);
	}

	public function query($query){
		if(!empty($query)){
			$query1=mysql_query($query);
			if($query1){
				return $query1;
			}else{
				return "Query is not working";
			}
		}else{
			return "please enterthe query";
		}
	}
}
?>