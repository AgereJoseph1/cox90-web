<?php

include('../functions/db.php');
include('../functions/functions.php');

session_start();

$total_price = 0;
$total_item = 0;


if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
  $total_item = $total_item + 1;
 }
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $customer_id = isset($_POST['customer_id']) ? (int)$_POST['customer_id']: null;
    // $first_name = isset($_POST['first_name']) ? escape(clean($_POST['first_name'])): null;
    // $last_name = isset($_POST['last_name']) ? escape(clean($_POST['last_name'])): null;
    $fullname = isset($_POST['fullname']) ? trim(escape(clean($_POST['fullname']))): null;
    $address = isset($_POST['address']) ? trim(escape(clean($_POST['address']))): null;
    $town = isset($_POST['town']) ? trim(escape(clean($_POST['town']))): null;
    $phone = isset($_POST['phone']) ? trim(escape(clean($_POST['phone']))): null;
    $phone2 = isset($_POST['phone2']) ? trim(escape(clean($_POST['phone2']))): null;
    $payment_method = isset($_POST['payment_method']) ? trim(escape(clean($_POST['payment_method']))): null;
    $order_notes = isset($_POST['order_notes']) ? trim(escape(clean($_POST['order_notes']))): null;
    $order_items = $_SESSION["shopping_cart"];
    $delivery_fee = $_SESSION["delivery_fee"];
    $grand_total = $total_price;

	if(strlen($fullname) == ''){
		$errors[] = 'Please enter your Name';
    }
	if(strlen($address) == ''){
		$errors[] = 'Please enter your Address';
    }
	if(strlen($phone) == ''){
		$errors[] = 'Please enter your phone';
    } elseif(strlen($phone) < 10){
		$errors[] = 'Please enter a valid Mobile Number ';
    }
    
	if(empty($errors)){

    $sql = "INSERT INTO orders (`customer_id`,`fullname`,`address`,`town`,`phone`,`phone2`,`order_notes`,`order_status`,`payment_status`,`grand_total`,`delivery_fee`, `payment_method`)";
    $sql   .= "VALUES('$customer_id','$fullname','$address','$town','$phone','$phone2','$order_notes','0','0','$grand_total','$delivery_fee', '$payment_method')";
    $result = query($sql);

    confirm($result);

	if($result) {
				
		
		$we  = $order_items;
//		
			 $sql =     "SELECT id FROM orders WHERE customer_id = '$customer_id' ORDER by id DESC LIMIT 1";
            $results = query($sql);
            $order_id = mysqli_fetch_assoc($results);

$insert_query = "INSERT INTO order_items (product_id, product_name, product_price, product_quantity, order_id, customer_id) VALUES ";

foreach($we as $each_item){

$insert_query .= "('".(int)$each_item['product_id']."',
					'".escape($each_item['product_name'])."',
					'".escape($each_item['product_price'])."',
					'".(int)$each_item['product_quantity']."',
					'".(int)$order_id['id']."',
					'".$customer_id."'
					),";

}

$queryq = rtrim($insert_query, ',');

$insert_order_result = query($queryq);
confirm($insert_order_result);

        if($insert_order_result){ 
            $q= query("SELECT id FROM orders WHERE phone = '$phone' ORDER BY id DESC LIMIT 1");
            $id = mysqli_fetch_assoc($q);
            $orderId = $id['id'];
            echo('success'.$orderId); 
            $_SESSION["shopping_cart"] = ""; 
            $_SESSION["delivery_fee"] = 0; 
        } else {
		
		echo(mysqli_error($con));
		
	}
		
	} else {
		
		echo(mysqli_error($con));
		
    }
    
} else {	
				foreach($errors as $error) {
					echo($error."<br>");
				}
	}
	



}
?>