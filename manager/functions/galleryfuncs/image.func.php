<?php 
$today= date("jS M, Y");
function upload_image($con, $user,$image_name, $image_temp, $image_ext, $album_id, $today) {
	$album_id = (int)$album_id;
	
	$r = mysqli_query($con, "INSERT INTO albumimages (img_name, img_album_id, ext, user, dateadded) VALUES ('$image_name', $album_id, '$image_ext', '$user', '$today')");
	
	move_uploaded_file($image_temp, '../uploads/images/gallery/'.$album_id.'/'.$image_name);
	
	$target_file = '../uploads/images/gallery/'.$album_id.'/'.$image_name;
	$resized_file = "../uploads/images/gallery/thumb/$album_id/resized_$image_name";
	$wmax = '200';
	$hmax = '200';

	resize($target_file, $resized_file, $wmax, $hmax, $image_ext);
	
	if($r) {
		header('Location: galleryview.php?id='.$album_id);
	}
}


function get_image($image_id, $con) {
	$album_id = (int)$image_id;
	
	
	$r = mysqli_query($con, "SELECT * FROM albumimages WHERE img_album_id = $album_id");
	
	return($r);
}


function image_check($image_id) {
	
}

function delete_image($con, $image_id) {
	
	$image_ID = (int)$image_id;
	$imagequery = mysqli_query($con, "SELECT img_name, img_album_id  FROM albumimages WHERE ID = $image_ID");
	$imageresult = mysqli_fetch_array($imagequery);
	
	$album_id = $imageresult['img_album_id'];
	$image_name = $imageresult['img_name'];
	
	unlink('../uploads/images/gallery/'.$album_id.'/'.$image_name);
	unlink("../uploads/images/gallery/thumb/$album_id/resized_$image_name");
	
	
	$del_image = mysqli_query($con, "DELETE FROM albumimages WHERE ID = $image_ID");
}

?>