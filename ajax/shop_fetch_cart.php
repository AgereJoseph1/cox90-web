<?php

//fetch_cart.php

include('../functions/db.php');
include('../functions/functions.php');
session_start();

$total_price = 0;
$total_item = 0;

$output = '

';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
    <li>
        <a href="product-details/'.get_url_title_from_id($values["product_id"]).'" class="photo"><img src="uploads/images/shop/thumb/mini_'.get_image_from_id($values["product_id"]).'" 
         class="cart-thumb" 
        alt="'.$values["product_name"].'" /></a>
        <h6><a href="product-details/'.get_url_title_from_id($values["product_id"]).'">'.$values["product_name"].'</a></h6>
        <p>'.$values["product_quantity"].'x - <span class="price">GH₵ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</span></p>
        <button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button>
    </li>
  ';
  $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
  $total_item = $total_item + 1;
 } 
 $output .= '
 <li class="total">
    <span class="pull-right "><strong>Total</strong>: <span class="total_price">GH₵ '.number_format($total_price, 2).'</span></span>
    <a href="./cart" class="btn btn-default btn-cart">Cart</a>
</li>
 ';
}
else
{
 $output .= '
    <li>
    <p><span class="price">Your Cart is Empty</span></p>
    <h6><a href="products">Start Shopping</a></h6>
    </li>
    ';
}

$data = array(
 'cart_details'  => $output,
 'total_price'  => 'GH₵'. number_format($total_price, 2),
 'total_item'  => $total_item
); 

echo json_encode($data);


?>