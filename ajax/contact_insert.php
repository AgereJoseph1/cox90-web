<?php
include('../functions/db.php');
include('../functions/functions.php');

$errors = [];

if(isset($_POST['task']) && $_POST['task'] == 'contact_insert') {
	$name = trim(escape(clean($_POST['user_name'])));
	$email = trim(escape(clean($_POST['email'])));
	$comment = trim(escape(clean($_POST['comment'])));
	$phone = trim(escape(clean($_POST['phone'])));
	
	if(trim($name) == ''){
		$errors[] = 'Please enter your Name';
	}
	// if($email == ''){
	// 	$errors[] = 'Please enter your email';
	// }
	if(trim($comment) == ''){
		$errors[] = 'Please enter Message';
	}
	if((trim($phone) !== '' && !is_numeric($phone)) || (trim($phone) !== '' && strlen($phone) < 9)) {
		$errors[] = 'Please enter a valid phone number';
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
		  $errors[] = "Please enter a valid email address";
	 }
	
	
	if(empty($errors)){
		
		$r = query("INSERT INTO contact_messages (message, name, email, phone) VALUES ('$comment','$name', '$email', '$phone')");
		
		if($r){
			echo('success');
		} else {
			echo('Error sending Message');
			echo(mysqli_error($con));
		}
		
	} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
	}
}







?>
