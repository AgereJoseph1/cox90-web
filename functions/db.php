<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "kus90";

// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "root";
// $dbname = "kus90_main";

global $con;
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

function row_count($result) {
	return mysqli_num_rows($result);
}

function query($sql) {
	global $con;
	return mysqli_query($con, $sql);
	
}

function escape ($string) {
	global $con;
	
	return 	mysqli_real_escape_string($con, $string);
}

function fetch_array($result){
	global $con;
	
	return mysqli_fetch_array($result);
}

function confirm($result){
	global $con;
	
	if(!$result) {
		die("QUERY FAILED" . mysqli_error($con));
	}
}

?>