<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_album") {
	$title = escape(clean($_POST["title"]));
	$url = clean_url($title);
	$description = escape($_POST["description"]);
	$update = $_POST['update'];
	
	
	if($update == 'add') {
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['albumpic'])) {
		$media_name = $_FILES['albumpic']['name'];
		$media_size = $_FILES['albumpic']['size'];
		$media_temp = $_FILES['albumpic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
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
	
		
	} elseif(!empty($_FILES['albumpic'])) {
		
		$media_name = $_FILES['albumpic']['name'];
		$media_size = $_FILES['albumpic']['size'];
		$media_temp = $_FILES['albumpic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
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
		
	}
	
	
	
	
	
	
	//----------------------------- validate text fields ----------------------------------//
	if($title == "") {
		$errors[] = 'Title Field cannot be empty';
	}
	if($description == ""){
		$errors[] = 'Album Description cannot be empty';
	}
	
	
	
	//----------------------------- add album if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO albums (name, description, timestamp, image, url_title, album_dateadded) VALUES ('$title', '$description', UNIX_TIMESTAMP(), '$newimage_name', '$url', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
					mkdir('../../uploads/images/gallery/'.$lastid, 0744);
					mkdir('../../uploads/images/gallery/thumb/'.$lastid, 0744);

					//move_uploaded_file($media_temp, '../../uploads/images/gallery/album_img/'.$newimage_name);

					//$imagePath = "../../uploads/images/gallery/album_img/$newimage_name";	

					smart_resize_image($media_temp,
								  $string             = $media_temp,
								  $width              = 400, 
								  $height             = 400, 
								  $proportional       = false, 
								  $output             = "../../uploads/images/gallery/album_img/$newimage_name", 
								  $delete_original    = false, 
								  $use_linux_commands = false,
								  $quality = 100
					);

						echo("success".$lastid);
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				$r = query("UPDATE albums set name='$title', description ='$description', timestamp=UNIX_TIMESTAMP(), url_title='$url', album_dateadded=NOW() WHERE album_ID = '$update_id' ");
				
					if($r) { 
						//update image if not empty on update
							if(!empty($_FILES['albumpic'])) {
								
								$img = query("SELECT image FROM albums WHERE album_ID = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE albums set image='$newimage_name' WHERE album_ID = '$update_id' ");
								
									if($r) {
										
										//move_uploaded_file($media_temp, '../../uploads/images/gallery/album_img/'.$newimage_name);
										unlink('../../uploads/images/gallery/album_img/'.$img_results['image']);
										
										//$imagePath = "../../uploads/images/$newimage_name";	

										smart_resize_image($media_temp,
													  $string             = $media_temp,
													  $width              = 400, 
													  $height             = 400, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/gallery/album_img/$newimage_name", 
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);
									} else {
										$message[] = 'Image not updated'.mysqli_error($con);
									}
							}

						echo("success".$update_id);
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}


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