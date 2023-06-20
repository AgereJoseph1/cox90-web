<?php

require_once("functions/init.php");
$sub_site_name = "Cart";


?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

     
  </head>

  <body id="home">
  	
  	
<?php include('webparts/header.php') ?>
    
    <!--Page Title-->
    
	<div class="page_title_ctn"> 
		<div class="container-fluid">
          <h2>Cart</h2>
          
          	<ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active"><span>Cart</span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!--Shoping Cart-->
    <section>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
   				<div class="table-responsive">
    
                    <table class="table cart">
                        <thead>
                            <tr>
                                <th class="cart-product-thumbnail" align='center'>Image</th>
                                <th class="cart-product-name">Name</th>
                                <th class="cart-product-price">Unit Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Total</th>
                                <th class="cart-product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody id='cartpage_details'>

                            
                        </tbody>
                    </table>
                </div>
                
    		</div>
         </div>
            <div class="row clearfix">
                <div class="col-md-6 clearfix">
                    <h4>Delivery type</h4>
                    <div class="payments-options">
                    <ul class="list-unstyled">
                        <!--<li>-->
                        <!--    <label id="direct-transfer" for="Express">-->
                        <!--        <input id="Express" class="input-radio del_type" type="radio" data-order_button_text="" value="20" name="payment_method">-->
                        <!--        <h4 style='display: inline'>Express Delivery-->
                        <!--         <h5 style='display: inline'>(GH₵ 20)- Delivery within 24hrs</h5></h4>-->
                        <!--    </label>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <label for="Early" id="paypal-transfer">-->
                        <!--        <input type="radio" data-order_button_text="Proceed to PayPal" value="15" name="payment_method" class="input-radio del_type" id="Early">-->
                        <!--        <h4 style='display: inline'>Early Delivery-->
                        <!--         <h5 style='display: inline'>(GH₵ 15)- Delivery within a 72hrs</h5></h4>-->
                        <!--    </label>-->
                        <!--</li>-->
                        <li>
                            <label for="Standard" id="paypal-transfer">
                                <input type="radio" data-order_button_text="Proceed to PayPal" value="15" name="payment_method" class="input-radio del_type" id="Standard" checked>
                                <h4 style='display: inline'>Standard Delivery
                                 <h5 style='display: inline'>(GH₵ 15)- Delivery on weekends</h5></h4>
                            </label>
                        </li>
                    </ul>
                </div>
                </div>

                <div class="col-md-6 clearfix">
                    <div class="table-responsive totle-cart">
                        <h4 >Cart Totals</h4>

                        <table class="table cart">
                            <tbody>
                                <tr class="cart_item cart_totle">
                                    <td class="cart-product-name">
                                        <strong>Cart Subtotal</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount total_price" id='alltotal_price'>GH₵ 0.00</span>
                                    </td>
                                </tr>
                                <tr class="cart_item cart_totle">
                                    <td class="cart-product-name">
                                        <strong>Delivery</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount" id='del_fee'>Free Delivery</span>
                                    </td>
                                </tr>
                                <tr class="cart_item cart_totle">
                                    <td class="cart-product-name">
                                        <strong>Total</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="blue"><strong class='total_charge'>GH₵0.00</strong></span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                
                <div class="cart_item coupon-check">
                    <div class="row clearfix">
                            <div class="col-md-8 col-sm-6 col-xs-12">   
                            <a href="products" class="btn btn-success rd-stroke-btn" id="check_out_cart">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </a>                   
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="checkout" class="btn rd-stroke-btn border_1px dart-btn-xs">
                            <span class="glyphicon glyphicon-shopping-cart"></span>Checkout</a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12" >
                                <a class="btn btn-default" id="clear_cart">
                                <span class="glyphicon glyphicon-trash"></span> Clear cart
                                </a> 
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>    	
    </section>             
  	
<?php include('webparts/footer.php'); ?>
    
    <script>
              load_cartpage_data();
              

              function get_all_price(total) {
                var val = $( 'input[name=payment_method]:checked' ).val();
                
                var total_price = total;
                var dataid = total_price.split("GH₵ ").join("");
                var total = parseFloat(dataid);
                // alert(total_price);
                var total_prod_fee = total + parseFloat(val);
                $('.total_charge').text('GH₵ '+total_prod_fee);
                $('#del_fee').text('GH₵ '+val);
                //  alert(total_prod_fee);

                var action = 'delivery_fee';
				$.ajax({
				 url:"ajax/shop_action.php",
				 method:"POST",
				 data:{action:action, delivery_fee: val},
				 success:function()
				 {
				 }
				});
              }
              
              
		      // window.onload = function() {
        // }
		function load_cartpage_data()
		{
		$.ajax({
			url:"ajax/shop_fetch_cartpage.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
			$('#cartpage_details').html(data.cart_details);
			$('.total_price').text(data.total_price);
			// $('.badge').text(data.total_item);
			get_all_price(data.total_price);
			}
		});
		/*Fetch Cart session values end*/
		};

            $('body').on('click','.del_type', function() {
                var val = $('#alltotal_price').text();
                //var val = $( 'input[name=payment_method]:checked' ).val();
                get_all_price(val);
                 //alert(val);
            });
            
            
/////////////// for cart page start //////////////////////
		   $(document).on('change', '.cart_input', function(){
				var product_id = $(this).data("proid");
				var product_name = $('#name'+product_id+'').val();
				var product_price = $('#price'+product_id+'').val();
				var product_quantity = $('#quantity'+product_id).val();
				var action = "add";

				if(product_quantity > 0)
				{
				$.ajax({
				url:"ajax/shop_action_cartpage.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
				load_cartpage_data();
				alert("Product quantity updated");
				}
				});
				}
				else
				{
				alert("Please Enter Number of Quantity");
				}
			});


		   $(document).on('click', '.add_to_cartpage', function(){
			var product_id = $(this).attr("id");
			var product_name = $('#name'+product_id+'').val();
			var product_price = $('#price'+product_id+'').val();
			var product_quantity = $('#quantity'+product_id).val();
			var action = "add";

			if(product_quantity > 0)
			{
			 $.ajax({
			  url:"ajax/shop_action_cartpage.php",
			  method:"POST",
			  data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
			  success:function(data)
			  {
			   load_cartpage_data();
			   alert("Product quantity updated");
			  }
			 });
			}
			else
			{
			 alert("Please Enter Number of Quantity");
			}
		   });
		  /////////////*Add products to cart end*/

		   $(document).on('click', '.deletecartpage', function(){
			var product_id = $(this).attr("id");
			var action = 'remove';
			if(confirm("Are you sure you want to remove this Item?"))
			{
			 $.ajax({
			  url:"ajax/shop_action.php",
			  method:"POST",
			  data:{product_id:product_id, action:action},
			  success:function()
			  {
			   load_cartpage_data();
			   alert("Item has been removed from Cart");
			  }
			 })
			}
			else
			{
			 return false;
			}
		   });
/////////////// for cart page end //////////////////////
		  
		   $(document).on('click', '#clear_cart', function(){
			var action = 'empty';
			if(confirm("Are you sure you want to remove all Item?"))
			{
				$.ajax({
				 url:"ajax/shop_action.php",
				 method:"POST",
				 data:{action:action},
				 success:function()
				 {
				  load_cartpage_data();
				  alert("Your Cart has been clear");
				 }
				});
			}
			else
			{
			 return false;
			}
		   });
		  
    </script>
  </body>
</html>
