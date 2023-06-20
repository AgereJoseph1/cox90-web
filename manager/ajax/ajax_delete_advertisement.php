<?php 

include('ajax_init.php');

$id= $_GET['id'];


$img = query("SELECT image FROM advertisements WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

unlink('../../uploads/images/ads/'.$img_results['image']);
										
$q = "DELETE FROM advertisements WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>