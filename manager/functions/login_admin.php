<?php



// Login validation functions##############################################

function validate_admin_login() {
	
	$errors = [];
	
	$min = 3;
	$max = 20;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		
		$email    = clean(escape($_POST['email']));
		$password = clean(escape($_POST['password']));
		//$remember = isset($_POST['rememberme']);
		
		if(empty($email)) {
			$errors[] = "Email field cannot be empty";
		}
		if(empty($password)) {
			$errors[] = "Password field cannot be empty";
		}
		
		if(!empty($errors)) {
			
			foreach($errors as $error) { 

			echo(validation_errors($error));

			}
			
		} else {
			if(login_admin($email, $password/*, $remember*/)) {
				
                    redirect("index.php");
					echo('ree');
			} else {
				echo validation_errors("Invalid Email or Password");
			} 
		}
		
		
		
	}
	
}



// Login functions##############################################

function login_admin($email, $password/*, $remember*/) {
	
	$sql = "SELECT * FROM admin WHERE email = '$email' AND password = sha1('$password') AND active = 1";
	$results = query($sql);
	
	if(row_count($results) == 1) {
		
		//----------------------------for remmember me option-------------------------//
//		if($remember == "on") {
//			setcookie('admin_email', $email, time()+259200);
//			setcookie('admin_passhash', md5('password').md5($email), time()+259200);
//		}
		
		$_SESSION['admin_email'] = $email;
		$_SESSION['admin_passhash'] = md5('password').md5($email);
		
		
		$sql = "UPDATE admin set lastlogin = NOW() WHERE email = '$email' AND password = sha1('$password')";
		$results = query($sql);
		
		return true;
	} else {
		return false;
	}
}

function logged_in_admin(){
    if (isset($_SESSION['admin_email']) && isset($_SESSION['admin_passhash']))
	{	
       	$email = $_SESSION['admin_email'];
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $results = query($sql);
		
        if(mysqli_num_rows($results) == 1) {
			$results_password = md5('password').md5($email);
			if($_SESSION['admin_passhash'] === $results_password) {
            return true;
				} else {
				return(false);
			}
        } else {
            return false;
        }
    } elseif (isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_passhash'])) {
		
		$email = $_COOKIE['admin_email'];
        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $results = query($sql);
		
        if(mysqli_num_rows($results) == 1) {
			$results_password = md5('password').md5($email);
			if($_COOKIE['admin_passhash'] === $results_password) {
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


function get_admin(){
	if (logged_in_admin()) {
		
		if(isset($_SESSION['admin_email'])) {
			
			$email = $_SESSION['admin_email'];
			
		} elseif(isset($_COOKIE['admin_email'])) {
			
			$email = $_COOKIE['admin_email'];
			
		}
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $results = query($sql);
    return mysqli_fetch_assoc($results);
		
    }
    return false;
}

$user = get_admin();

function admin_name() {
	if (logged_in_admin()) {

	if(isset($_SESSION['admin_email'])) {

		$email = $_SESSION['admin_email'];

	} elseif(isset($_COOKIE['admin_email'])) {

		$email = $_COOKIE['admin_email'];
	}
		
	$sql = "SELECT * FROM admin WHERE email = '$email'";
    $results = query($sql);
    $details = mysqli_fetch_assoc($results);
	return($details['first_name'].' '.$details['last_name']);

	}
	
}

function restrict_admin(){
	if (!logged_in_admin()){
        redirect("login.php");
        exit();
	}
}















?>