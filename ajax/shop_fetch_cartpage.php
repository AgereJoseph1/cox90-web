<?php

include('../functions/db.php');
include('../functions/functions.php');
//fetch_cart.php

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
<tr class="cart_item">
<td class="cart-product-thumbnail">
  <a href="product-details/'.get_url_title_from_id($values["product_id"]).'"><img width="64" height="64" src="uploads/images/shop/thumb/mini_'.get_image_from_id($values["product_id"]).'" alt="'.$values["product_name"].'"></a>
</td>

<td class="cart-product-name">
  <a href="product-details/'.get_url_title_from_id($values["product_id"]).'">'.$values["product_name"].'</a>
</td>

<td class="cart-product-price">
  <span class="amount">GH₵ '.$values["product_price"].'</span>
</td>

<td class="quantity">
<input type="number" min="0" name="quantity" data-proid="'.$values["product_id"].'" id="quantity'.$values["product_id"].'" class="dart-form-control col-lg-6 col-sm-6 cart_input" value="'.$values["product_quantity"].'" />
</td>

<td class="cart-product-subtotal">
  <span class="amount">GH₵ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</span>
</td>

<td class="cart-product-remove">
<button name="delete" class="btn btn-danger btn-xs deletecartpage" id="'. $values["product_id"].'">Remove</button>
<!-- <input type="button" name="add_to_cartpage" id="'. $values["product_id"].'" class="btn btn-success btn-xs add_to_cartpage" value="Update Item" /> -->

<input type="hidden" name="hidden_name" id="name'. $values["product_id"].'" value="'.$values["product_name"].'" />
<input type="hidden" name="hidden_price" id="price'. $values["product_id"].'" value="'.$values["product_price"].'" />
</td>
</tr>
  ';
  $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
  $total_item = $total_item + 1;
 }
//  $output .= '
//  <tr>  
//  <td></td>  
//         <td colspan="3" align="right">Total</td>  
//         <td align="left">GH₵ '.number_format($total_price, 2).'</td>  
//         <td></td>  
//     </tr>
//  ';
}
else
{
 $output .= '
    <tr>
     <td colspan="6" align="center">
      Your Cart is Empty!
     </td>
    </tr>
    ';
}
$data = array(
 'cart_details'  => $output,
 'total_price'  => 'GH₵ '. number_format($total_price, 2),
 'total_item'  => $total_item
); 

echo json_encode($data);


?>