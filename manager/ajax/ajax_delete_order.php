<?php 

include('ajax_init.php');

$id= $_GET['id'];
								
$q = "DELETE FROM order_items WHERE order_id = $id";
$r = mysqli_query($con, $q);

$q = "DELETE FROM orders WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>