<?php 

ini_set('session.cookie_httponly', true);

ob_start();

session_start();



include('../functions/db.php');
include('../functions/functions.php');
include('galleryfuncs/allgalleryfuncs.php');

include('login_admin.php');
?>