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
	$table='categories';

	
	
	//----------------------------- validate text fields ----------------------------------//
	if($category == "") {
		$errors[] = 'Category Field cannot be empty';
	}
	
		if(url_exists($url, $con, $table)) {
		$errors[] = $category.' category already exist';
	}
	
	
	
	//----------------------------- add news if no errors ------------------------------//
		if(empty($errors)) {
			

			if($update == 'add') {

				$r = query("INSERT INTO categories (title, url_title, date_added, adder) VALUES ('$category', '$url', NOW(), '$adder')");

					if($r) { 
						$lastid = mysqli_insert_id($con);

						echo("success");
						 } else {
						$message[] = 'Not added'.mysqli_error($con);
								}
			} else {
				//update service info
				$update_id = (int)$update;
				
				$oldcat = query("SELECT url_title FROM categories WHERE id ='$update_id'");
				$oldcatr = mysqli_fetch_assoc($oldcat);
				
				$newsr = query("UPDATE news set category='$url' WHERE category='$oldcatr[url_title]'");
				
				$oldsort = query("SELECT title FROM categories WHERE id ='$update_id'");
				$oldsortr = mysqli_fetch_assoc($oldsort);
				
				$sortr = query("UPDATE sort_post set cat='$category' WHERE cat='$oldsortr[title]'");
				
				$r = query("UPDATE categories set title='$category', url_title='$url', date_added=NOW(), adder='$adder' WHERE id = '$update_id' ");

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
	
	
	    
	
}// else {
//	echo("ne");
//}

			
?>