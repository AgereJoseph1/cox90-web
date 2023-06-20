<?php




function email_exists($email) {
	$sql = "SELECT id FROM customers WHERE email = '$email'";
	$results = query($sql);
	
	if (row_count($results) == 1) {
		return true;
	} else {
		return false;
	}
}

function username_exists($username) {
	$sql = "SELECT id FROM customers WHERE username = '$username'";
	$results = query($sql);
	
	if (row_count($results) == 1) {
		return true;
	} else {
		return false;
	}
}


// validation functions##############################################

function validate_user_registration() {
	
	$errors = [];
	
	$min = 3;
	$max = 20;
	
	if(isset($_POST['register_form'])) {
		$first_name            = escape(clean($_POST['first_name']));
		$last_name             = escape(clean($_POST['last_name']));
		$username              = escape(clean($_POST['username']));
		$email                 = escape(clean($_POST['email']));
		$address               = escape(clean($_POST['address']));
		$country               = escape(clean($_POST['country']));
		$contact               = escape(clean($_POST['contact']));
		$town                  = escape(clean($_POST['town']));
		$password              = escape(clean($_POST['password']));
		$confirm_password      = escape(clean($_POST['confirm_password']));
		
		if(strlen($first_name) < $min) {
			$errors[] = "Your first name cannot be less than $min characters";
		}
		if(strlen($first_name) > $max) {
			$errors[] = "Your first name cannot be mare than $max characters";
		}
		if(strlen($last_name) < $min) {
			$errors[] = "Your last name cannot be less than $min characters";
		}
		if(strlen($last_name) > $max) {
			$errors[] = "Your last name cannot be mare than $max characters";
		}
		if(strlen($username) < $min) {
			$errors[] = "Your username name cannot be less than $min characters";
		}
		if(strlen($username) > $max) {
			$errors[] = "Your username name cannot be mare than $max characters";
		}
		if(strlen($password) < $min) {
			$errors[] = "Your password cannot be less than $min characters";
		}
		if($password !== $confirm_password) {
			$errors[] = "Password fields do not match";
		}
		if(email_exists($email)) {
			$errors[] = "Sorry email has already bring registered";
		}
		if(username_exists($username)) {
			$errors[] = "Sorry the username has already bring used";
		}
		if(!empty($errors)) {
			
			
			foreach($errors as $error) { 
			
			echo(validation_errors($error));
				
			}
		} else {
			
			if(register_user($first_name, $last_name, $username, $email, $address, $country, $contact, $town, $password)) {
				
//					set_message("<div class='alert alert-success alert-dismissible' role='alert'>
//				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
//				  <strong>Registered Successfully</strong> Please check your Email or spam folder for your activation link
//				</div>");
					
					set_message("<div class='alert alert-success alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Registered Successfully</strong> Please Login</div>");
				
//					redirect('register');
			} else {
				
				set_message("<p class='bg-danger text-center'>Sorry registration was unsuccesful</p>");
					
//				redirect('home');
			}
			
		}
		
	}
}

// Register user##############################################
function register_user($first_name, $last_name, $username, $email, $address, $country, $contact, $town, $password) {
	
	if(email_exists($email)) {
		return false;
	} elseif(username_exists($username)) {
		return false;
	} else {
		$validation_code = md5($username.microtime());
		$password = sha1($password);
		
		$sql = "INSERT INTO customers (first_name, last_name, username, email, address, country, phone, town, password, validation_code, active) VALUES ('$first_name', '$last_name', '$username', '$email', '$address', '$country', '$contact', '$town', '$password', '$validation_code', 1)";
		$results = query($sql);
		confirm($results);
		
		
		//send message*************************************************
//		$subject = "Activate Account";
//		$msg = "Please click on the link below to activate your accounts
//		
//		http://localhost/app/activate&email=$email&code=$validation_code
//		";
//		$headers = "From: support@webs.com";
//		
//		send_email($email, $subject, $msg, $headers);
		
		return(true);
	}

}

// Activate user functions##############################################

function activate_user() {
	if($_SERVER['REQUEST_METHOD'] == "GET") {
		if(isset($_GET['email'])) {
			 $email = escape($_GET['email']);
			
			 $validation_code = escape($_GET['code']);
			
			$sql = "SELECT Id FROM customers WHERE email = '$email' AND validation_code = '$validation_code'";
			$results = query($sql);
			
			if(row_count($results) == 1) {
				
				$sql2 = "UPDATE customers SET active = 1, validation_code = 0 WHERE email= '$email' AND validation_code = '$validation_code'";
				$results2 = query($sql2);
				
			set_message("<div class='alert alert-success alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  <strong>Thank You!</strong> Your account has being successfully activated please login
			</div>");
				
			redirect("login");
				} else {
				
				set_message("<div class='alert alert-danger alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Oops!</strong> Sorry Your account has not being activated
				</div>");
				redirect("login");
			}
		} else {
		redirect("home");
	}
	} 
}




// Login validation functions##############################################

function validate_user_login() {
	
	$errors = [];
	
	$min = 3;
	$max = 20;
	
	if(isset($_POST['login_form'])) {
		
		$email    = clean(escape($_POST['login_email']));
		$password = clean(escape($_POST['login_password']));
		$remember = isset($_POST['rememberme']);
		
		if(empty($email)) {
			$errors[] = "Email field cannot be empty";
		}
		if(empty($password)) {
			$errors[] = "Password field cannot be empty";
		}
		
		if(!empty($errors)) {
			
			foreach($errors as $error) { 

			echo(set_message($error));

			}
			
		} else {
			if(login_user($email, $password, $remember)) {
				if ($_POST['checkout'] == 'checkout'){
					redirect("checkout");
				} else {
					setcookie('notty_message_logged_in', 1, time() + 500);
                    redirect("/home");
				}

			} else {
				echo set_message("<div class='alert alert-danger alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Oops!</strong> Invalid Email or Password
				</div>");
			} 
		}
		
		
		
	}
	
}



// Login functions##############################################

function login_user($email, $password, $remember) {
	
	$sql = "SELECT * FROM customers WHERE (email = '$email' AND password = sha1('$password') AND active = 1) OR (username = '$email'  AND password = sha1('$password') AND active = 1)";
	$results = query($sql);
	
	if(mysqli_num_rows($results) == 1) {
		
		if($remember == 1) {
			setcookie('web_email', $email, time()+864000);
			setcookie('web_passhash', md5('password').md5($email), time()+864000);
		}
		$_SESSION['web_email'] = $email;
		$_SESSION['web_passhash'] = md5('password').md5($email);
		return true;
		
	} else {
		return false;
	}
}

function logged_in(){
    if (isset($_SESSION['web_email']) && isset($_SESSION['web_passhash']))
	{	
       	$email = $_SESSION['web_email'];
        $sql = "SELECT * FROM customers WHERE email = '$email' OR username = '$email'";
        $results = query($sql);
		
        if(mysqli_num_rows($results) == 1) {
			$results_password = md5('password').md5($email);
			if($_SESSION['web_passhash'] === $results_password) {
            return true;
				} else {
				return(false);
			}
        } else {
            return false;
        }
    } elseif (isset($_COOKIE['web_email']) && isset($_COOKIE['web_passhash'])) {
		
		$email = $_COOKIE['web_email'];
        $sql = "SELECT * FROM customers WHERE email = '$email' OR username = '$email'";
        $results = query($sql);
		
        if(mysqli_num_rows($results) == 1) {
			$results_password = md5('password').md5($email);
			if($_COOKIE['web_passhash'] === $results_password) {
            return true;
				} else {
				return(false);
			}
        } else {
            return false;
        }
		
	} else {
        return false;
    }
}


function getCustomer(){
	if (logged_in()) {
		
		if(isset($_SESSION['web_email'])) {
			
			$email = $_SESSION['web_email'];
			
		} elseif(isset($_COOKIE['web_email'])) {
			
			$email = $_COOKIE['web_email'];
			
		}
    $sql = "SELECT * FROM customers WHERE email = '$email' OR username = '$email'";
    $results = query($sql);
    return $results;
		
    }
    return false;
}
    function getCountryById($id){
    $sql = "SELECT name FROM countries WHERE id = '$id'";
        $results = query($sql);
        return $results;
    }
function user_name($id) {
	$sql = "SELECT * FROM customers WHERE id = '$id'";
    $results = query($sql);
    $details = mysqli_fetch_assoc($results);
	return($details['first_name'].' '.$details['last_name']);
	
}



function restrict_front(){
	if (!logged_in()){
        redirect("home");
        exit();
	}
		
		if(isset($_SESSION['web_email'])) {
			
			$email = $_SESSION['web_email'];
			
		} elseif(isset($_COOKIE['web_email'])) {
			
			$email = $_COOKIE['web_email'];
			
		}
// retrieve usernames comment
	function logged_customer($con, $email) {
		$q = "SELECT * FROM customers WHERE email = '$email' OR username = '$email'";
		$r = mysqli_query($con, $q);

		$data= mysqli_fetch_assoc($r);

		return $data;
	}

 if(isset($_SESSION['web_email']) || $_COOKIE['web_email']) {
	    global $con;
 }
	
$user = logged_customer($con, $email);
}



// recover password functions##############################################

function recover_password() {
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
			$email = clean(escape($_POST['email'])); 
			
			if (!empty($email)) {

				if(email_exists($email)) {


					$validation_code = md5($email.microtime());
					$subject = "PLease reset your password";
					$message = "Here is your password reset code $validation_code

					Click here to reset your password 
					http//localhost/code&email=$email&code=$validation_code
					";
					$header = "From: support@webs.com";

					setcookie('temp_access_code', $validation_code, time()+1800);

					$val_escape = escape($validation_code);

					$sql = "UPDATE customers SET validation_code = '$val_escape' WHERE email = '$email'";
					$result = query($sql);

					if (send_email($email, $subject, $message, $header)) {

					} else {
						echo(validation_errors("Email is not sent"));
					}

					set_message("<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
					</button> Please check your email or spam folder for reset code at  <span>$email</span> <br> Link expires in 30 minutes
				</div>");

					redirect("login");


				} else {
					echo(validation_errors("This email does not exist"));
				}
				
			}  else {
				echo(validation_errors("Please Enter email"));
			}
			
		} else {
			redirect("home");
		}
		
		
		if(isset($_POST['cancel_submit'])) {
			redirect('login');
		}
		
	}
}


function validate_code() {
	
	if(isset($_COOKIE['temp_access_code'])) {
		
			if(isset($_GET['email']) && isset($_GET['code'])) {
				
				if(isset($_POST['code'])) {
					$clean_code = escape($_POST['code']);
					$clean_email = escape($_GET['email']);
					
					$sql = "SELECT * FROM customers WHERE validation_code = '$clean_code' AND email = '$clean_email'";
					$result = query($sql);
					
					if (row_count($result) == 1) {
						
						setcookie('reset_password', $clean_code, time()+1000);
						redirect("reset&email=$clean_email&code=$clean_code");
						
					} else {
					set_message("<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert'>
							<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
						</button> Sorry, There was an error reseting password, Please try again</span>
					</div>");
						redirect('recover');
					}
					
				}
				
			} else {
				redirect("recover");
			}
		
		
	} else {
		set_message("<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert'>
					<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
				</button> Your reset code has expired please retry <span>$email</span>
			</div>");
		redirect("recover");
	}
}

// reset password##############################################


function password_reset() {
	
	
	if(isset($_GET['email']) && isset($_GET['code'])) {
		
		$clean_code = escape($_GET['code']);
		$clean_email = escape($_GET['email']);
		$sql = "SELECT * FROM customers WHERE validation_code = '$clean_code' AND email = '$clean_email'";
		$result = query($sql);
		$val = mysqli_fetch_assoc($result);
		
		if(isset($_COOKIE['reset_password']) && $_COOKIE['reset_password'] == $val['validation_code']) {
		
			
			echo($_COOKIE['reset_password']);
			if(isset($_POST['token']) && $_POST['password'] != '') {
			
				$password =  escape($_POST['password']);
				$confirm_password =  escape($_POST['confirm_password']);
				$email = escape($_GET['email']);
				$validation_code = escape($_GET['code']);

				if($password === $confirm_password ) { 
					
					$sql2 = "SELECT * FROM customers WHERE validation_code = '$clean_code' AND email = '$clean_email'";
					$result2 = query($sql2);
					$val2 = mysqli_fetch_assoc($result2);
					
					if($val2['validation_code'] === $_GET['code'] && $_GET['email'] === $val['email']) {
						
					$password2 = sha1($password);
					$sql = "UPDATE customers SET password = '$password2', validation_code = 0 WHERE validation_code = '$validation_code' AND email = '$email' ";
					$rresults = query($sql);
					confirm(query($sql));
						
					if($rresults) {
				set_message("<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert'>
						<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
					</button> Your password is successfully updated, Please login
				</div>");
					redirect('login');
					}

					
					} else {
						set_message("<div class='alert alert-success alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert'>
							<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
						</button> Error updating passwords
					</div>");
					}
				} else {
					set_message("<div class='alert alert-danger alert-dismissible center-block text-center' role='alert'>
						<button type='button' class='close' data-dismiss='alert'>
							<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
						</button> Your password do not match
					</div>");
				}

			}

		} else {
			set_message("<div class='alert alert-danger alert-dismissible center-block text-center' role='alert'>
						<button type='button' class='close' data-dismiss='alert'>
							<span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
						</button> Follow right process
					</div>");
			redirect('recover');
		}
} else {
		//set_message("4121111111111111111111111");
		redirect("recover");
	}

}


function isset_post($post) {
	$post = clean(escape($post));
	if(isset($_POST["$post"])) {
		echo($_POST[$post]);
	}
}

