<?php


include('ajax_init.php');
$errors = [];
$message = [];

//print_r($_POST);

if(isset($_POST['task']) && $_POST["task"] == "add_category") {
	$category = trim(escape(clean($_POST["category"])));
	$url = clean_url($category);
	$adder = escape(clean($_POST['adder']));
	$update = $_POST['update'];
	$table='products_categories';

	
	
	//----------------------------- validate text fields ----------------------------------//
	if($category == "") {
		$errors[] = 'Category Field cannot be empty';
	}
	
		if(url_exists($url, $con, $table)) {
		$errors[] = $category.' Product category already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO products_categories (title, url_title, adder) VALUES ('$category', '$url', '$adder')");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						echo("success");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				
				$r = query("UPDATE products_categories set title='$category', url_title='$url', adder='$adder' WHERE id = '$update_id' ");

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

if(isset($_POST['task']) && $_POST["task"] == "add_subcategory") {
	$maincategory = (int)$_POST["maincategory"];
	$subcategory = trim(escape(clean($_POST["subcategory"])));
	$url = clean_url($subcategory);
	$adder = escape(clean($_POST['adder']));
	$update = $_POST['update'];
	$table='products_subcategories';

	
	
	//----------------------------- validate text fields ----------------------------------//
	if($subcategory == "") {
		$errors[] = 'Sub-category Field cannot be empty';
	}
	
		if(url_exists_subproducts($url, $con, $table, $maincategory)) {
		$errors[] = $subcategory.' product category already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO products_subcategories (title, url_title, main_category, adder) VALUES ('$subcategory', '$url', '$maincategory', '$adder')");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						echo("success");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				
				$r = query("UPDATE products_subcategories set title='$subcategory', url_title='$url', main_category='$maincategory', adder='$adder' WHERE id = '$update_id' ");

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