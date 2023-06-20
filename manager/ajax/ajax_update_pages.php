<?php

include('ajax_init.php');

if(isset($_POST['idselect']) && $_POST['idselect'] != '') {
	
	$page_id = escape($_POST['idselect']);
	$description = escape($_POST["description"]);
	
	$sql = "UPDATE pages SET content = '$description' WHERE id = '$page_id'";
	$result = query($sql);
	
	if($result) { ?>
		
		<span class="btn btn-success loader"><?php echo(strtoupper($page_id)) ?> SUCCESSFULLY UPDATED</span>
		
	<?php }
	
}



?>