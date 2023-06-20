<?php
ini_set('session.cookie_httponly', true);
session_start();

include('../functions/db.php');
include('../functions/functions.php');
include('../functions/account_func.php');
//sleep(3);
$errors = [];
$min = 3;
$max = 40;

if(isset($_POST['task']) && $_POST['task'] == 'register') {
	$fullname = trim(escape(clean($_POST['fullname'])));
	$username = trim(escape(clean($_POST['username'])));
	$email = trim(escape(clean($_POST['email'])));
	$homeaddress = trim(escape(clean($_POST['homeaddress'])));
	$number = trim(escape(clean($_POST['number'])));
	$password = trim(escape(clean($_POST['password'])));
	$verify_password = escape(clean($_POST['verify_password']));
	
	$timestamp = time();
	
	if(strlen($username) == ''){
		$errors[] = 'Please enter your username';
	} elseif (strlen($username) < $min) {
		$errors[] = 'Username should not be less than 4 characters';
	} elseif (strlen($username) > $max) {
		$errors[] = 'Username should not exceed 40 characters';
	}
	
	if(strlen($fullname) == ''){
		$errors[] = 'Please enter your Full name';
	} elseif (strlen($fullname) < $min) {
		$errors[] = 'Full name should not be less than 4 characters';
	} elseif (strlen($fullname) > $max) {
		$errors[] = 'Full name should not exceed 40 characters';
	}
	
	if(strlen($email) == ''){
		$errors[] = 'Please enter your email';
	}
	if(strlen($password) < 6){
		$errors[] = 'Password should be 6 or more characters';
	}
	
	if (! filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
		  $errors[] = "Please enter a valid email address";
	 }
	
	if($verify_password !== $verify_password) {
		$errors[] = 'Passwords do not match';
	}
	
	if($email != '') {
		$q = query("SELECT * FROM customers WHERE email = '$email'");
		if(mysqli_num_rows($q) > 0) {
			  $errors[] = "Email already registered";
		}
	}
	
	$q = query("SELECT * FROM customers WHERE username = '$username'");
	if(mysqli_num_rows($q) > 0) {
		  $errors[] = "Username already registered";
	}

	if(empty($errors)){
     
		$validation_code = md5($username);
		
// $htmlContent = '
//     <html>
//     <head>
//         <title>Hello '.$username.'</title>
//     </head>
//     <body>
//         <h1>Thank you for Registering with '.$site_name.'</h1>
//         <h3>Please activate your account with the link below</h3>
//         <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
//             <tr>
//                 <th></th><td><a href="http://'.$website_link.'/activate?email='.$email.'&validation_code='.$validation_code.'">ACTIVATE ACCOUNT HERE</a></td>
//             </tr>
//         </table>
//     </body>
//     </html>';
				
// $to = $email;
// $subject = $site_name." Activate account";
// $from = $web_mail;
 
// // To send HTML mail, the Content-type header must be set
// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $headers .= "Organization: ".$site_name."\r\n";
 
// // Create email headers
// $headers .= 'From: noreply'.$from."\r\n".
//     'Reply-To: '.$from."\r\n" .
//     'X-Mailer: PHP/' . phpversion();
 
// if(!mail($to,$subject,$htmlContent, $headers)) {
// 	$message[] = '<br>Email not sent';
// };
		
		$r = query("INSERT INTO customers (username, email, fullname, address, phone, password, validation_code, active) VALUES ('$username','$email', '$fullname', '$homeaddress', '$number', SHA1('$password'), '$validation_code', 1)");
		
		if($r){
			echo('success');
		} else {
			echo('Error Signing up');
			echo(mysqli_error($con));
		}
		
	} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
	}
	
	
	
	
}




if(isset($_POST['task']) && $_POST['task'] == 'login') {
	$email = trim(escape(clean($_POST['username'])));
	$password = trim(escape(clean($_POST['password'])));
	$remember = (int)$_POST['remember'];
	
	$timestamp = time();

	if(empty($email)) {
		$errors[] = "Email | Username field cannot be empty";
	}
	if(empty($password)) {
		$errors[] = "Password field cannot be empty";
	}

	if(empty($errors)){

		if(login_user($email, $password, $remember)) {

			echo('success');

		} else {

			echo('Oops! Invalid Email or Password');

		} 
		
	} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
	}
	
	
	
	
}






?>
