<?php 

include('ajax_init.php');

$id= (int)$_GET['id'];

$q1 = "UPDATE tbl_products SET brand = 0 WHERE brand = '$id'";
$r1 = mysqli_query($con, $q1);

if($r1) {
	$q = "DELETE FROM products_brands WHERE id = '$id'";
	$r = mysqli_query($con, $q);
}
								

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>