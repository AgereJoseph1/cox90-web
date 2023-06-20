<?php 

include('ajax_init.php');

$id= $_GET['id'];


$image_ID = (int)$id;
$imagequery = mysqli_query($con, "SELECT img_name, img_album_id  FROM albumimages WHERE ID = $image_ID");
$imageresult = mysqli_fetch_array($imagequery);

$album_id = $imageresult['img_album_id'];
$image_name = $imageresult['img_name'];

unlink('../../uploads/images/gallery/'.$album_id.'/'.$image_name);
unlink("../../uploads/images/gallery/thumb/$album_id/resized_$image_name");


$r = mysqli_query($con, "DELETE FROM albumimages WHERE ID = $image_ID");

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>