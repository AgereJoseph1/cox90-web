<?php

include('ajax_init.php');


$ads = DIRECTORY_SEPARATOR;
$id = $_GET['id'];

$storeFolder = "../../uploads/";

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//$newname = time();
//$random = rand(100,999);
$r = query("SELECT image FROM single_images where id = 'home_bottom'");
$image = mysqli_fetch_assoc($r);

unlink('../../uploads/'.$image['image']);

$random = rand(100,999);
$name = $site_name.'_home_'.$random.'.'.$ext;
$fileinfo = getimagesize($_FILES['file']['tmp_name']);
$filewidth = $fileinfo[0];
$fileheight = $fileinfo[1];
$ext = strtolower($ext);

$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];


if(in_array($ext, $allowed_ext) == true) {
	
$q = "UPDATE single_images SET image = '$name' WHERE id= 'home_bottom'";
$r = mysqli_query($con, $q);

if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	
	$targetPath = dirname(__FILE__) . $ads. $storeFolder . $ads;
	
	$targetFile = $targetPath. $name;
	
	move_uploaded_file($tempFile,$targetFile);

}
	}
?>