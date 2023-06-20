<?php 

include('ajax_init.php');

$id= $_GET['id'];
										
$q = "UPDATE comments set approved = 1 WHERE ID = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('success');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>