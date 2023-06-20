<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_admin") {
	$first = escape(clean($_POST['first_name']));
	$last = escape(clean($_POST['last_name']));
	$email = escape(clean($_POST['email']));
	$contact = escape(clean($_POST['contact']));
	$description = escape(clean($_POST['description']));
	$location = escape(clean($_POST['location']));
	$username = escape(clean($_POST['username']));
	$password = escape($_POST['password']);
	$passwordv = escape(clean($_POST['verify_password']));
	$status = (int)$_POST['status'];
	$update = $_POST['update'];
	
	
	$newimage_name = '';
		
	if($update == 'add') {
		
	//-----------------------image upload valitate------------------------------//
	if(!empty($_FILES['newspic'])) {
		$media_name = $_FILES['newspic']['name'];
		$media_size = $_FILES['newspic']['size'];
		$media_temp = $_FILES['newspic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $first;
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
		
	if ($fileheight != '200' && $filewidth != '200') { 
		$errors[] = 'Image size whould be 200 by 200px';
	}
		
	} 
//		else {
//		$errors[] = 'Image not uploaded';
//	}

	
		
	} elseif(!empty($_FILES['newspic'])) {
		$media_name = $_FILES['newspic']['name'];
		$media_size = $_FILES['newspic']['size'];
		$media_temp = $_FILES['newspic']['tmp_name'];
		
		$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
		$explode = explode('.', $media_name);
		$media_ext = strtolower(end($explode));
		
		$newname = $first;
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
		
	if ($fileheight != '200' && $filewidth != '200') { 
		$errors[] = 'Image size whould be 200 by 200px';
	}
		
	}
	
	
		
	
	
	if($update == 'add'){
		
		
		if($password == "") {
			
			$errors[] = 'Please enter password';
			
		} else {

			if ($password == $passwordv) {
				$password =  $password;
				
			} else {
				$errors[] = 'Empty password Fields or passwords do not match';
			} 
			
		}
		

	}elseif(is_numeric($_POST['update'])){
		
		
		if($password != "") {

			if ($password == $passwordv) {
				$password =  "password = SHA1('$password'),";
				$verify = true;
			} else {
				$password = '';
				$errors[] = 'Empty password Fields or passwords do not match';
			} 
			
		}
		
		
	}

	
	//----------------------------- validate text fields ----------------------------------//
	if($first == "") {
		$errors[] = 'Please enter first name';
	}
	if($last == ""){
		$errors[] = 'Please enter last name';
	}
	if($email == ""){
		$errors[] = 'Please enter email';
	}
	if($username == ""){
		$errors[] = 'Please enter user name';
	}
	if($description == ""){
		$errors[] = 'Please enter description';
	}
	if (! filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
		  $errors[] = "Please enter a valid email address";
	 }
	if(admin_email_exists($email) && $update == 'add'){
		  $errors[] = "Email Already exists";
	}
	
	
	//----------------------------- add admin if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO admin (first_name, last_name, email, password, active, addedby, location, contact, description, username, image, dateadded) VALUES ('$first', '$last', '$email', SHA1('$password'), '$status', '$_POST[adder]', '$location', '$contact', '$description', '$username', '$newimage_name', NOW())");

					if($r) { 
						$lastid = mysqli_insert_id($con);
						
						if(!empty($_FILES['newspic'])) {
							move_uploaded_file($media_temp, '../../uploads/images/admin/'.$newimage_name);
						}
						
						echo("success".$lastid);
						
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update admin info
				$update_id = (int)$update;
				$r = query("UPDATE admin SET first_name = '$first', last_name = '$last', email = '$email', $password active = $status, location = '$location',  contact = '$contact', description='$description', username = '$username' WHERE id = '$update_id' ");
				
					if($r) { 
						
						$lastid = mysqli_insert_id($con);
						
												
						//update image if not empty on update
							if(!empty($_FILES['newspic'])) {
								
								$img = query("SELECT image FROM admin WHERE id = '$update_id'");
								$img_results = mysqli_fetch_assoc($img);
								
								$r = query("UPDATE admin set image='$newimage_name' WHERE id = '$update_id' ");
								
									if($r) {
										
										move_uploaded_file($media_temp, '../../uploads/images/admin/'.$newimage_name);
										if($img_results['image'] != ''){
											unlink('../../uploads/images/admin/'.$img_results['image']);
										}

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