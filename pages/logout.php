<?php

require_once("functions/init.php");

session_destroy();

if(isset($_COOKIE['web_email'])) {
	unset($_COOKIE['web_email']);
	setcookie('web_email', '', time()-60);
}

redirect('login');

?>