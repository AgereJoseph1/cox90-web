<?php

include('ajax_init.php');


$ads = DIRECTORY_SEPARATOR;
$id = $_GET['id'];

$storeFolder = "../../uploads/";

$r = query("SELECT image FROM single_images where id = 'about_image'");
$image = mysqli_fetch_assoc($r);

unlink('../../uploads/'.$image['image']);

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//$newname = time();
$random = rand(100,999);
$name = $site_name.'_about_'.$random.'.'.$ext;
$fileinfo = getimagesize($_FILES['file']['tmp_name']);
$filewidth = $fileinfo[0];
$fileheight = $fileinfo[1];

$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];


if(in_array($ext, $allowed_ext) == true) {
$q = "UPDATE single_images SET image = '$name' WHERE id= 'about_image'";
$r = mysqli_query($con, $q);

if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	
	//$targetPath = dirname(__FILE__) . $ads. $storeFolder . $ads;
	
	//$targetFile = $targetPath. $name;
	
	//$imagePath = "../../uploads/images/news/$newimage_name";	

	smart_resize_image($tempFile,
				  $string             = $tempFile,
				  $width              = 500, 
				  $height             = 333, 
				  $proportional       = false, 
				  $output             = "../../uploads/$name", 
				  $delete_original    = false, 
				  $use_linux_commands = false,
				  $quality = 100
	);
	
	//move_uploaded_file($tempFile,$targetFile);

}
	}
?>