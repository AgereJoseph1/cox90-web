<?php
include('ajax_init.php');


if (isset($_POST['url'])) {
		
	$url = clean(escape($_POST['url']));		

		// for update
	$id = $_POST['id'];
	
			$q = "UPDATE single_images SET url = '$url' WHERE id = '$id'";
		

		$r = query($q);
		if ($r) {
			
			echo 'SUCCESFULLY UPDATED';
			
		} else {
			
			echo 'Error updating images';
			
		}
} else {
	echo('URL set');
}














?>