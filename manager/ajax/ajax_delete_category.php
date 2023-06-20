<?php 

include('ajax_init.php');

$id= $_GET['id'];

$q = "DELETE FROM news WHERE category = '$id'";
$r = mysqli_query($con, $q);
								
$q = "DELETE FROM categories WHERE id = '$id'";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>