<?php



include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_video") {
	
	$format = escape(clean($_POST["format"]));
	
	//----------------------------- mediafile validate ----------------------------------//
	if(!empty($_FILES['media'])) {
			$mediaf_name = $_FILES['media']['name'];
			$mediaf_size = $_FILES['media']['size'];
			$mediaf_temp = $_FILES['media']['tmp_name'];

			$allowedf_audio_ext = ['mp4', 'ogg', 'mp3', 'webm'];
			$allowedf_video_ext = ['mp4', 'ogg', 'mp3', 'webm'];
			$explode = explode('.', $mediaf_name);
			$mediaf_ext = strtolower(end($explode));

			$newnamef = 'background';
			$rand = time();
			$newmedia_name = $newnamef.'_'.$rand.'.'.$mediaf_ext;

	
		if ($format == 'nomedia' && !empty($_FILES['media'])) { 
			$errors[] = 'Please choose the correct media format for uploaded file';
		}
		if ($format != 'nomedia' && empty($_FILES['media'])) { 
			$errors[] = 'Media format('.$format.') chosen but no '.$format.' selected';
		}
		if($format == 'audio' && $mediaf_ext != 'mp3'){
				$errors[] = 'Media File type not allowed; only MP3 allowed for audios';
		} elseif($format == 'video' && $mediaf_ext != 'mp4'){
				$errors[] = 'Media File type not allowed; only MP4 allowed for videos';
		}
		if($mediaf_size > 10240000 ){
				$errors[] = 'Video size should not be more than 10mb';
		}
		
	} else {
				$errors[] = 'No video Uploaded';
	}
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {

				$vid = query("SELECT image FROM single_images WHERE id = 'video'");
				$vid_results = mysqli_fetch_assoc($vid);
				
				if($vid_results['image'] != ''){
						unlink('../../uploads/media/'.$vid_results['image']);
					}
			
				$r = query("UPDATE single_images SET image = '$newmedia_name' WHERE id= 'video'");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
						move_uploaded_file($mediaf_temp, '../../uploads/media/'.$newmedia_name);
						
						echo("success".$lastid);
						
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
		
		} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
			}
	
	
	
	if($message != "") {
		foreach($message as $mes) {
					echo($mes."<br>");
				}
	}
	
	
	    
	
}// else {
//	echo("ne");
//}

?>