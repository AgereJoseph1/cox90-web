<?php

include('ajax_init.php');

if(isset($_POST['social']) && $_POST['social'] != '') {
	
	$social = escape($_POST['social']);
	$col = $_POST['col'];
	$value = $_POST['value'];
	
	$sql = "UPDATE social SET $col = '$value' WHERE name = '$social'";
	$result = query($sql);
	
	if($result) {
		echo('success');
	}
	
}



?>