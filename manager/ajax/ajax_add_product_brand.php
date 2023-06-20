<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_brand") {
	$brand = trim(escape(clean($_POST["brand"])));
	$url = clean_url($brand);
	$adder = escape(clean($_POST['adder']));
	$update = $_POST['update'];
	$table='products_brands';

	
	
	//----------------------------- validate text fields ----------------------------------//
	if($brand == "") {
		$errors[] = 'brand Field cannot be empty';
	}
	
		if(url_exists($url, $con, $table)) {
		$errors[] = $brand.' Product brand already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO products_brands (title, url_title, adder) VALUES ('$brand', '$url', '$adder')");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						echo("success");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				
				$r = query("UPDATE products_brands set title='$brand', url_title='$url', adder='$adder' WHERE id = '$update_id' ");

					if($r) { 
						
						echo("success_update");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}


			}
		
		} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
			}
	
	
	
	if($message != "") {
		foreach($message as $mes) {
					echo($mes."<br>");
				}
	}
	
	
	    
	
}

if(isset($_POST['task']) && $_POST["task"] == "add_subbrand") {
	$mainbrand = (int)$_POST["mainbrand"];
	$subbrand = trim(escape(clean($_POST["subbrand"])));
	$url = clean_url($subbrand);
	$adder = escape(clean($_POST['adder']));
	$update = $_POST['update'];
	$table='products_subbrands';

	
	
	//----------------------------- validate text fields ----------------------------------//
	if($subbrand == "") {
		$errors[] = 'Sub-brand Field cannot be empty';
	}
	
		if(url_exists($url, $con, $table)) {
		$errors[] = $subbrand.' product brand already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO products_subbrands (title, url_title, main_brand, adder) VALUES ('$subbrand', '$url', '$mainbrand', '$adder')");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						echo("success");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				
				$r = query("UPDATE products_subbrands set title='$subbrand', url_title='$url', main_brand='$mainbrand', adder='$adder' WHERE id = '$update_id' ");

					if($r) { 
						
						echo("success_update");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}


			}
		
		} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
			}
	
	
	
	if($message != "") {
		foreach($message as $mes) {
					echo($mes."<br>");
				}
	}
	
	
	    
	
}

			
?>