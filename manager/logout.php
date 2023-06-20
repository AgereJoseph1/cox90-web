<?php

include('functions/init.php');

session_destroy();
redirect('login.php');

if(isset($_COOKIE['admin_email'])) {
	unset($_COOKIE['admin_email']);
	setcookie('admin_email', '', time()-60);
}


?>