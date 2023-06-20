<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_news") {
	$title = escape(clean($_POST["title"]));
	$url = clean_url($title);
	$position = escape(clean($_POST["position"]));
	$update = $_POST['update'];
	
	
	$facebook = escape(clean($_POST["facebook"]));
	$instagram = escape(clean($_POST["instagram"]));
	$twitter = escape(clean($_POST["twitter"]));
	
	$facebook_status = (int)$_POST["facebook_status"];
	$instagram_status = (int)$_POST["instagram_status"];
	$twitter_status = (int)$_POST["twitter_status"];
	
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
	if($position == ""){
		$errors[] = 'Position cannot be empty';
	}
	if(url_exists($url, $con, 'team') && $update == 'add'){
		$errors[] = 'Team member already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO team (title, position, image, url_title, facebook, twitter, instagram, facebook_status, twitter_status, instagram_status) VALUES ('$title', '$position', '$newimage_name', '$url', '$facebook', '$twitter', '$instagram', '$facebook_status', '$twitter_status', '$instagram_status')");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						
					move_uploaded_file($media_temp, '../../uploads/images/team/'.$newimage_name);
						
					$imagePath = "../../uploads/images/team/$newimage_name";	

					smart_resize_image($imagePath,
								  $string             = $imagePath,
								  $width              = 650, 
								  $height             = 569, 
								  $proportional       = false, 
								  $output             = "../../uploads/images/team/thumb/$newimage_name", 
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
				$r = query("UPDATE team set title='$title', position='$position', url_title='$url', facebook='$facebook', twitter='$twitter', instagram='$instagram', facebook_status='$facebook_status', twitter_status='$twitter_status', instagram_status='$instagram_status' WHERE id = '$update_id' ");
				
					if($r) { 
						//update image if not empty on update
							if(!empty($_FILES['newspic'])) {
								
								$img = query("SELECT image FROM team WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE team set image='$newimage_name' WHERE id = '$update_id' ");
								
									if($r) {
										
										unlink('../../uploads/images/team/'.$img_results['image']);
										unlink('../../uploads/images/team/thumb/'.$img_results['image']);

										move_uploaded_file($media_temp, '../../uploads/images/team/'.$newimage_name);
										
										$imagePath = "../../uploads/images/team/$newimage_name";	

										smart_resize_image($imagePath,
													  $string             = $imagePath,
													  $width              = 650, 
													  $height             = 569, 
													  $proportional       = false, 
													  $output             = "../../uploads/images/team/thumb/$newimage_name",
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