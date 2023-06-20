<?php
include('../functions/db.php');
include('../functions/functions.php');

$errors = [];

if(isset($_POST['task']) && $_POST['task'] == 'comment_insert') {
	$name = escape(clean($_POST['user_name']));
	$email = escape(clean($_POST['email']));
	$comment = escape(clean($_POST['comment']));
	$news_id = (int)$_POST['news_id'];
	
	$timestamp = time();
	
	if($name == ''){
		$errors[] = 'Please enter your name';
	}
	if($email == ''){
		$errors[] = 'Please enter your email';
	}
	if($comment == ''){
		$errors[] = 'Please enter comment';
	}
	if (! filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
		  $errors[] = "Please enter a valid email address";
	 }
	
	if(empty($errors)){
		
		$r = query("INSERT INTO comments (comment_text, user_name, email, timestamp, news_id) VALUES ('$comment','$name', '$email', '$timestamp', $news_id)");
		
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
