<?php 

include('ajax_init.php');

$id= $_GET['id'];


$img = query("SELECT image FROM tbl_products WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

unlink('../../uploads/images/shop/'.$img_results['image']);
unlink('../../uploads/images/shop/thumb/'.$img_results['image']);
unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image']);
unlink('../../uploads/images/shop/thumb/home_'.$img_results['image']);

$img = query("SELECT image2 FROM tbl_products WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

if($img_results['image2'] != ''){
unlink('../../uploads/images/shop/'.$img_results['image2']);
unlink('../../uploads/images/shop/thumb/'.$img_results['image2']);
unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image2']);
unlink('../../uploads/images/shop/thumb/home_'.$img_results['image2']);
}


$img = query("SELECT image3 FROM tbl_products WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

if($img_results['image3'] != ''){
unlink('../../uploads/images/shop/'.$img_results['image3']);
unlink('../../uploads/images/shop/thumb/'.$img_results['image3']);
unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image3']);
unlink('../../uploads/images/shop/thumb/home_'.$img_results['image3']);
}


$img = query("SELECT image4 FROM tbl_products WHERE id = '$id'");
$img_results = mysqli_fetch_assoc($img);

if($img_results['image4'] != ''){
unlink('../../uploads/images/shop/'.$img_results['image4']);
unlink('../../uploads/images/shop/thumb/'.$img_results['image4']);
unlink('../../uploads/images/shop/thumb/mini_'.$img_results['image4']);
unlink('../../uploads/images/shop/thumb/home_'.$img_results['image4']);
}


$q = "DELETE FROM tbl_products WHERE id = $id";
$r = mysqli_query($con, $q);

if ($r) {
	echo('deleted');
} else{
	echo('error'. mysqli_error($con));
	echo($q);
}


?>