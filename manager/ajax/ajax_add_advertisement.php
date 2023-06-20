<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_advertisements") {
	$title = escape(clean($_POST["title"]));
	$url = clean_url($title);
	$expire = $_POST["expire"];
	$expiretimestamp = strtotime($expire);
	$url = escape(clean($_POST["url"]));
	$position = escape(clean($_POST["position"]));
	$update = $_POST['update'];
	
	
	if($update == 'add') {
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['image'])) {
		$media_name = $_FILES['image']['name'];
		$media_size = $_FILES['image']['size'];
		$media_temp = $_FILES['image']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $title;
		$rand = time();
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['image']['tmp_name']);
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
	
		//----------validate image size ---------------------//
	if($position == 'header' || $position == 'page-top' || $position == 'page-bottom' ) {
		
		if ($fileheight != '90' && $filewidth != '726') { 
			$errors[] = 'Image size whould be 726 by 90px';
	}
		
	} elseif($position == 'aside-top' || $position == 'aside-bottom') {
		
		if ($fileheight != '250' && $filewidth != '300') { 
			$errors[] = 'Image size whould be 300 by 250px';
	}
		
	} else {
		
			$errors[] = 'Select image Position';
	}
		//----------validate image size end ---------------------//
		
		
		
		
	} else {
		$errors[] = 'Image not uploaded';
	}
	
		
	} elseif(!empty($_FILES['image'])) {
		
		$media_name = $_FILES['image']['name'];
		$media_size = $_FILES['image']['size'];
		$media_temp = $_FILES['image']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $title;
		$rand = time();
		$newimage_name = $newname.'_'.$rand.'.'.$media_ext;
		$fileinfo = getimagesize($_FILES['image']['tmp_name']);
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
	
		//----------validate image size ---------------------//
	if($position == 'header' || $position == 'page-top' || $position == 'page-bottom' ) {
		
		if ($fileheight != '90' && $filewidth != '726') { 
			$errors[] = 'Image size whould be 726 by 90px';
	}
		
	} elseif($position == 'aside-top' || $position == 'aside-bottom') {
		
		if ($fileheight != '250' && $filewidth != '300') { 
			$errors[] = 'Image size whould be 300 by 250px';
	}
		
	} else {
		
			$errors[] = 'Select image Position';
	}
		//----------validate image size end ---------------------//
		
		
		
	}
	
	
	
	
	
	
	//----------------------------- validate text fields ----------------------------------//
	if($title == "") {
		$errors[] = 'Name Field cannot be empty';
	}
	if($expire == ""){
		$errors[] = 'Expiration cannot be empty';
	}
	if($position == "undefined"){
		$errors[] = 'Select image Position';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO advertisements (title, url, expire, expiretimestamp, image, position, date_added) VALUES ('$title', '$url', '$expire', '$expiretimestamp', '$newimage_name', '$position', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);

					move_uploaded_file($media_temp, '../../uploads/images/ads/'.$newimage_name);


						echo("success".$lastid);
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				$r = query("UPDATE advertisements set title='$title', url='$url', expire='$expire', expiretimestamp='$expiretimestamp', position='$position', date_added=NOW() WHERE id = '$update_id' ");
				
					if($r) { 
						//update image if not empty on update
							if(!empty($_FILES['image'])) {
								
								$img = query("SELECT image FROM advertisements WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE advertisements set image='$newimage_name' WHERE id = '$update_id' ");
								
									if($r) {
										
										move_uploaded_file($media_temp, '../../uploads/images/ads/'.$newimage_name);
										unlink('../../uploads/images/ads/'.$img_results['image']);
										

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