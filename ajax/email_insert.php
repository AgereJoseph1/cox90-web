<?php
include('../functions/db.php');
include('../functions/functions.php');

$errors = [];

if(isset($_POST['task']) && $_POST['task'] == 'email_insert') {
	$email = escape(clean($_POST['email']));
	
	if($email == ''){
		$errors[] = 'Please enter your email';
	}
	if (! filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
		  $errors[] = "Please enter a valid email address";
	 }
	
	$q = query("SELECT * FROM newsletter_emails WHERE email = '$email'");
	if(mysqli_num_rows($q) > 0) {
		  $errors[] = "Email already subscribed";
	}
	
	if(empty($errors)){
		
		$r = query("INSERT INTO newsletter_emails (email, date) VALUES ('$email', NOW())");
		
		if($r){
			echo('success');
		} else {
			echo('Error adding comment');
			echo(mysqli_error($con));
		}
		
	} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
	}
}







?>
