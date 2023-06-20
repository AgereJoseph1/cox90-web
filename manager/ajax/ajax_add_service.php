<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_news") {
	$title = escape(clean($_POST["title"]));
	$url = clean_url($title);
	$keywords = nl2br(escape($_POST["keywords"]));
	$description = $_POST["description"];
	$update = $_POST['update'];
	
	
	if($update == 'add') {
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['newspic'])) {
		$media_name = $_FILES['newspic']['name'];
		$media_size = $_FILES['newspic']['size'];
		$media_temp = $_FILES['newspic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['newspic']['tmp_name']);
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
		
//	if ($fileheight != '411' && $filewidth != '630') { 
//		$errors[] = 'Image size whould be 630 by 411px';
//	}
		
	} else {
		$errors[] = 'Image not uploaded';
	}
	
		
	} elseif(!empty($_FILES['newspic'])) {
		
		$media_name = $_FILES['newspic']['name'];
		$media_size = $_FILES['newspic']['size'];
		$media_temp = $_FILES['newspic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $url;
		$rand = time();
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['newspic']['tmp_name']);
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
		
//	if ($fileheight != '411' && $filewidth != '630') { 
//		$errors[] = 'Image size whould be 630 by 411px';
//	}
		
	}
	
	
	
	
	
	
	//----------------------------- validate text fields ----------------------------------//
	if($title == "") {
		$errors[] = 'Title Field cannot be empty';
	}
	if($keywords == ""){
		$errors[] = 'Short Description cannot be empty';
	}
	if($description == ""){
		$errors[] = 'Full Description cannot be empty';
	}
	if(url_exists($url, $con, 'services') && $update == 'add'){
		$errors[] = 'Service with same title already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO services (title, full_description, short_description, image, url_title, date) VALUES ('$title', '$description', '$keywords', '$newimage_name', '$url', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						
					move_uploaded_file($media_temp, '../../uploads/images/services/'.$newimage_name);
						
					$imagePath = "../../uploads/images/services/$newimage_name";	

					smart_resize_image($imagePath,
								  $string             = $imagePath,
								  $width              = 600, 
								  $height             = 385, 
								  $proportional       = false, 
								  $output             = "../../uploads/images/services/thumb/$newimage_name", 
								  $delete_original    = false, 
								  $use_linux_commands = false,
								  $quality = 100
					);


					smart_resize_image($imagePath,
								  $string             = $imagePath,
								  $width              = 863, 
								  $height             = 414, 
								  $proportional       = false, 
								  $output             = "../../uploads/images/services/thumb/details_$newimage_name", 
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
				$r = query("UPDATE services set title='$title', full_description='$description', short_description='$keywords', url_title='$url', date=NOW() WHERE id = '$update_id' ");
				
					if($r) { 
						//update image if not empty on update
							if(!empty($_FILES['newspic'])) {
								
								$img = query("SELECT image FROM services WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE services set image='$newimage_name' WHERE id = '$update_id' ");
								
									if($r) {
										
										unlink('../../uploads/images/services/'.$img_results['image']);
										unlink('../../uploads/images/services/thumb/'.$img_results['image']);
										unlink('../../uploads/images/services/thumb/details_'.$img_results['image']);

										move_uploaded_file($media_temp, '../../uploads/images/services/'.$newimage_name);
										
										$imagePath = "../../uploads/images/services/$newimage_name";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 600, 
													  $height             = 385, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/services/thumb/$newimage_name",
													  $delete_original    = false, 
													  $use_linux_commands = false,
													  $quality = 100
										);


										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 863, 
													  $height             = 414, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/services/thumb/details_$newimage_name", 
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