<?php 
include "include/topCode.php"; 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
 $path="uploads/".trim($user->id);
if(!is_dir($path)){
	if(mkdir($path)){
					if(mkdir($path."/profile")){
						mkdir($path."/profile/small");
					}
					mkdir($path."/post");
				}
}else{
	echo "noooo";
}
				
echo htmlspecialchars("<hi></hi>");
?>
</body>
</html>