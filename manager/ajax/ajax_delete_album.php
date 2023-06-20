<?php 

include('ajax_init.php');

$id= $_GET['id'];


$album_ID = (int)$id;
$del_album = mysqli_query($con, "DELETE FROM albums WHERE album_ID = $album_ID");
$del_image = mysqli_query($con, "DELETE FROM albumimages WHERE img_album_id = $album_ID");

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>