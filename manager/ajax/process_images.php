<?php
include('ajax_init.php');

$ads = DIRECTORY_SEPARATOR;
$id = escape(clean($_GET['id']));
$w = (int)$_GET['w'];
$h = (int)$_GET['h'];

$storeFolder = "../../uploads/";

if($id != '' && $w != 0 && $h != 0) {
	$r = query("SELECT image FROM single_images where id = '$id'");
	$image = mysqli_fetch_assoc($r);
	
	if($image['image'] != ''){
		unlink('../../uploads/'.$image['image']);
	}
	
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	//$newname = time();
	$random = rand(100,999);
	$name = $id.$random.'.'.$ext;
	$fileinfo = getimagesize($_FILES['file']['tmp_name']);
	$filewidth = $fileinfo[0];
	$fileheight = $fileinfo[1];

	$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];


	if($w == $filewidth && $h == $fileheight) {

		if(in_array($ext, $allowed_ext) == true) {
			$q = "UPDATE single_images SET image = '$name' WHERE id= '$id'";
			$r = mysqli_query($con, $q);
		
			if($r){
				if (!empty($_FILES)) {
					$tempFile = $_FILES['file']['tmp_name'];
		
					//$targetPath = dirname(__FILE__) . $ads. $storeFolder . $ads;
		
					$targetFile = '../../uploads/'. $name;
		
					//$imagePath = "../../uploads/images/news/$newimage_name";	
		
					// smart_resize_image($tempFile,
					// 			  $string             = $tempFile,
					// 			  $width              = $w, 
					// 			  $height             = $h, 
					// 			  $proportional       = false, 
					// 			  $output             = "../../uploads/$name", 
					// 			  $delete_original    = false, 
					// 			  $use_linux_commands = false,
					// 			  $quality = 100
					// );
		
					move_uploaded_file($tempFile,$targetFile);
		
				}
		
			} else {
				echo('Error 2');
				echo(mysqli_error($con));
			}
				} else {
				echo('Error 3');
			}

	} else {
		echo('size not matching');
	}
	
} else {
	echo('Error 1');
}













?>