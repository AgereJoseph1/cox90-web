<?php 

include('ajax_init.php');

$id= $_GET['id'];


$img = query("SELECT image FROM news WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

//unlink('../../uploads/images/news/'.$img_results['image']);
unlink('../../uploads/images/news/thumb/'.$img_results['image']);
unlink('../../uploads/images/news/thumb/mini_'.$img_results['image']);
/*
unlink('../../uploads/images/carousel_small_'.$img_results['image']);
unlink('../../uploads/images/main_big_'.$img_results['image']);
unlink('../../uploads/images/main_small_'.$img_results['image']);
unlink('../../uploads/images/trending_'.$img_results['image']);*/
										
$media = query("SELECT media FROM news WHERE id = '$id'");
$media_results = mysqli_fetch_assoc($media);

if($media_results['media'] != ''){
unlink('../../uploads/media/'.$media_results['media']);
}

$q = "DELETE FROM news WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}
?>