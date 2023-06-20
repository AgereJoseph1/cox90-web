<?php

include('../functions/db.php');
include('../functions/functions.php');

if(isset($_POST['product_id'])) {
	
	if(isset($_POST['customer_id']) && $_POST['customer_id'] != '' && $_POST['customer_id'] != 0) {
	
	$product_id = (int)$_POST['product_id'];
	$customer_id = (int)$_POST['customer_id'];
	
	
	if(select_list($customer_id, $product_id)) {
		
		echo('Product already added');
		
	} else {
		
	if(wishlist_product($product_id)) {
		
		$wish_product = mysqli_fetch_assoc(wishlist_product($product_id)); 
	//	print_r($wish_product);
		$sql = "INSERT INTO wishlist (customer_id, product_id, product_name, price, image) VALUES ($customer_id, $product_id, '".escape($wish_product['title'])."', '".escape($wish_product['price'])."', '$wish_product[image]')";
		$insert_result = query($sql);
		confirm($insert_result);
		
		if($insert_result) {
			
			echo('success');
			
		} else {
			
			echo('Not Added to Wishlist');
			
				}
			}
		
		}
	
	} else {
		
		echo('You must be Logged in to add to wishlist');
	}
	
}








?>