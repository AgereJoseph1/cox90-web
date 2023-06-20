<?php 

include('ajax_init.php');

$id= $_GET['id'];

$q = "DELETE FROM tbl_products WHERE maincategory = '$id'";
$r = mysqli_query($con, $q);
								
$q = "DELETE FROM products_categories WHERE id = '$id'";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>