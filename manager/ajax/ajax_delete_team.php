<?php 

include('ajax_init.php');

$id= $_GET['id'];


$img = query("SELECT image FROM team WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

unlink('../../uploads/images/team/'.$img_results['image']);
unlink('../../uploads/images/team/thumb/'.$img_results['image']);
										
$q = "DELETE FROM team WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>