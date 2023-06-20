<?php

include('../functions/db.php');
include('../functions/functions.php');

if(isset($_POST['wish_id'])) {
	
	$id = (int)$_POST['wish_id'];
	
	$sql="DELETE FROM wishlist WHERE id = $id";
	$result = query($sql);
	
	if($result) {
		
		echo('success');
		
	} else {
		
		echo('Error deleting wishlist product');
		
	}
	
}








?>