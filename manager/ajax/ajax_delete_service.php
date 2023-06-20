<?php 

include('ajax_init.php');

$id= $_GET['id'];


$img = query("SELECT image FROM services WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

unlink('../../uploads/images/services/'.$img_results['image']);
unlink('../../uploads/images/services/thumb/'.$img_results['image']);
unlink('../../uploads/images/services/thumb/details_'.$img_results['image']);
										
$q = "DELETE FROM services WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>