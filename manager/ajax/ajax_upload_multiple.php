<?php

include('ajax_init.php');


$ads = DIRECTORY_SEPARATOR;
$id = $_GET['id'];

$storeFolder = "../../uploads/";

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//$newname = time();
$random = rand(100,999);
$name = $site_name.'_logo_'.$random.'.'.$ext;
$fileinfo = getimagesize($_FILES['file']['tmp_name']);
$filewidth = $fileinfo[0];
$fileheight = $fileinfo[1];

if ($fileheight == '38' && $filewidth == '348') {
$q = "UPDATE single_images SET image = '$name' WHERE id= 'logo'";
$r = mysqli_query($con, $q);

if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	
	$targetPath = dirname(__FILE__) . $ads. $storeFolder . $ads;
	
	$targetFile = $targetPath. $name;
	
	move_uploaded_file($tempFile,$targetFile);

}
	}
?>