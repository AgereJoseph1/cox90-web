<?php

include('ajax_init.php');

if(isset($_POST['setting']) && $_POST['setting'] != '') {
	
	$setting = escape($_POST['setting']);
	$value = (int)$_POST['value'];
	$product_id = (int)$_POST['product_id'];
	
	$sql = "UPDATE tbl_products SET $setting = '$value' WHERE id = '$product_id'";
	$result = query($sql);
	
	if($result) {
		echo('success');
	}
	
}



?>