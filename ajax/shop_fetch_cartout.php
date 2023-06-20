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

        <td class="quantity">
            <span>'.$values["product_quantity"].'</span>
        </td>

        <td class="cart-product-subtotal">
            <span class="amount">GH₵ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</span>
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