<?php 

include('ajax_init.php');

$id= $_GET['id'];
										
$q = "UPDATE orders set order_status = 1 WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('success');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>