<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_albumpic") {
	$album_id = (int)$_POST["album_id"];
	
	
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['albumpic'])) {
		$media_name = $_FILES['albumpic']['name'];
		$media_size = $_FILES['albumpic']['size'];
		$media_temp = $_FILES['albumpic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $album_id;
		$rand = time().rand(0,999);
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['albumpic']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image File type not allowed';
			}

	   }
//		
//	if ($fileheight != '411' && $filewidth != '630') { 
//		$errors[] = 'Image size whould be 630 by 411px';
//	}
		
	} else {
		$errors[] = 'Image not uploaded';
	}
	
		
	 
	
	//----------------------------- validate text fields ----------------------------------//
	if($album_id == "") {
		$errors[] = 'Select Album to add Image';
	}
	
	//----------------------------- add album if no errors ------------------------------//
		if(empty($errors)) {
			


				$r = query("INSERT INTO albumimages (img_name, img_album_id, ext, dateadded) VALUES ('$newimage_name', $album_id, '$media_ext', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
							move_uploaded_file($media_temp, '../../uploads/images/gallery/'.$album_id.'/'.$newimage_name);
						
					$imagePath = '../../uploads/images/gallery/'.$album_id.'/'.$newimage_name;	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 400, 
													  $height             = 300, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/gallery/thumb/$album_id/resized_$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
						
//							$target_file = '../../uploads/images/gallery/'.$album_id.'/'.$newimage_name;
//							$resized_file = "../../uploads/images/gallery/thumb/$album_id/resized_$newimage_name";
//							$wmax = '200';
//							$hmax = '200';
//
//							resize($target_file, $resized_file, $wmax, $hmax, $media_ext);

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
	
	
	    
	
} elseif(isset($_GET['id'])) {
	
	$album_id = (int)$_GET['id'];
	
		//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['file'])) {
		$media_name = $_FILES['file']['name'];
		$media_size = $_FILES['file']['size'];
		$media_temp = $_FILES['file']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $album_id;
		$rand = time().rand(0,999);
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['file']['tmp_name']);
		$filewidth = $fileinfo[0];
		$fileheight = $fileinfo[1];
		
		
	if($media_name !== '') {
		if ($media_size > 2097152 || $media_size < 1) 
			{
				$errors[] = 'Image size should not be more than 2mb';
			}
		if(in_array($media_ext, $allowed_ext) === false) {
			$errors[] = 'Image File type not allowed';
			}

	   }
		
	} else {
		$errors[] = 'Image not uploaded';
	}
	
		//----------------------------- add image if no errors ------------------------------//
		if(empty($errors)) {
			


				$r = query("INSERT INTO albumimages (img_name, img_album_id, ext, dateadded) VALUES ('$newimage_name', $album_id, '$media_ext', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
							move_uploaded_file($media_temp, '../../uploads/images/gallery/'.$album_id.'/'.$newimage_name);
						
					$imagePath = '../../uploads/images/gallery/'.$album_id.'/'.$newimage_name;	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 400, 
													  $height             = 300, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/gallery/thumb/$album_id/resized_$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
						
//							$target_file = '../../uploads/images/gallery/'.$album_id.'/'.$newimage_name;
//							$resized_file = "../../uploads/images/gallery/thumb/$album_id/resized_$newimage_name";
//							$wmax = '200';
//							$hmax = '200';
//
//							resize($target_file, $resized_file, $wmax, $hmax, $media_ext);
							echo("success".$lastid);
						 }
		
		} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
			}
	
	
	
} else {
	echo("ne");
}




?>