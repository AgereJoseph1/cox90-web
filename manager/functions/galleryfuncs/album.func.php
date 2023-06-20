<?php 
$today= date("jS M, Y");

function album_data($album_id, $con) {
	$album_id = (int)$album_id;
	
	$q = "SELECT * FROM albums where album_id = $album_id";
	$r = mysqli_query($con, $q);
	
	return $r;
	
}


function album_check($album_id) {
	
}


function get_albums($con) {
	
	$q = "SELECT * , COUNT(albumimages.ID) as images_count FROM albums LEFT JOIN albumimages ON albums.album_ID = albumimages.img_album_ID GROUP BY albums.album_ID ";
	$r = mysqli_query($con, $q);
	
	return $r;
}


function create_album($album_name, $album_description, $user, $today, $con) {
	$album_name = mysqli_real_escape_string($con, htmlentities($album_name));
	$album_description = mysqli_real_escape_string($con, $album_description);
	
	$q = "INSERT INTO albums (name, description, timestamp, album_user, album_dateadded) VALUES ('$album_name', '$album_description', UNIX_TIMESTAMP(),'$user','$today')";
	$r = mysqli_query($con, $q);
	/*if ($r) {
		echo('success');
	} else {
		echo('error'.$q);
		mysqli_error($r);
	}*/
	mkdir('../uploads/images/gallery/'.mysqli_insert_id($con), 0744);
	mkdir('../uploads/images/gallery/thumb/'.mysqli_insert_id($con), 0744);
	
	if ($r) {
		header('Location: gallery.php');
		exit();
	} else {
		echo('Error Creating Album');
	}
}


function edit_album($album_id, $album_name, $album_description, $con) {
	$album_id = (int)$album_id;
	$album_name = mysqli_real_escape_string($con, htmlentities($album_name));
	
	$r = mysqli_query($con,"UPDATE albums SET name ='$album_name', description = '$album_description' WHERE album_ID = $album_id" );
	
	if($r) {
		header('Location: gallery.php');
	}else {
		echo('Error updating Album');
	}
	
	
}


function delete_album($con, $album_id) {
	$album_ID = (int)$album_id;
	$del_album = mysqli_query($con, "DELETE FROM albums WHERE album_ID = $album_ID");
	$del_image = mysqli_query($con, "DELETE FROM albumimages WHERE img_album_id = $album_ID");
	
}




//..............................................................media queries
function get_media($con) {
	$q =  "SELECT * FROM music ORDER by ID DESC";
	$r = mysqli_query($con, $q);
	
	return($r);
}
function media_data($media_id, $con) {
	$media_id = (int)$media_id;
	
	$q = "SELECT * FROM music where ID = $media_id";
	$r = mysqli_query($con, $q);
	
	return $r;
	
}
function edit_media($media_id, $title, $description, $format, $con) {
	$media_id = (int)$media_id;
	$media_title = mysqli_real_escape_string($con, htmlentities($title));
	$media_format = mysqli_real_escape_string($con, htmlentities($format));
	$media_description = $description;
	
	$r = mysqli_query($con,"UPDATE music SET title ='$media_title', description = '$media_description', format ='$media_format' WHERE ID = $media_id" );
	
	if($r) {
		header('Location: videoview.php');
	}else {
		echo('Error updating Album');
	}
	
	
}
function get_mediaaudio($con) {
	$q =  "SELECT * FROM music WHERE format  = 'audio' ORDER by ID DESC";
	$r = mysqli_query($con, $q);
	
	return($r);
}
function get_mediavideo($con) {
	$q =  "SELECT * FROM music WHERE format = 'video' ORDER by ID DESC";
	$r = mysqli_query($con, $q);
	
	return($r);
}
function delete_media($con, $media_id) {
	$media_ID = (int)$media_id;
	$mediaquery = mysqli_query($con, "SELECT *  FROM music WHERE ID = $media_ID");
	$mediaresult = mysqli_fetch_array($imagequery);
	
	$mediaimg_name = $imageresult['image'];
	$mediafile_name = $mediaresult['type1'];
	
	unlink('../uploads/media/'.$mediafile_name);
	unlink('../uploads/images/media/'.$mediaimg_name);
	
	
	$del_media = mysqli_query($con, "DELETE FROM albumimages WHERE ID = $media_ID");
	
}

?>