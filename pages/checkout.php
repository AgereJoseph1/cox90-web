<?php

require_once("functions/init.php");
$sub_site_name = "Checkout";

if(empty($_SESSION["shopping_cart"])) {
	redirect('products');
	setcookie('shop_message', 1, time() + 500);
}

if(!isset($_SESSION['delivery_fee']) || (int)$_SESSION['delivery_fee'] < 1 ) {
	redirect('cart');
}

if(isset($_POST['task']) && $_POST['task'] == 'login') {
	$email = trim(escape(clean($_POST['username'])));
	$password = trim(escape(clean($_POST['password'])));
	$remember = (int)$_POST['remember'];
	
	$timestamp = time();

	if(empty($email)) {
		$errors[] = "Email | Username field cannot be empty";
	}
	if(empty($password)) {
		$errors[] = "Password field cannot be empty";
	}

	if(empty($errors)){

		if(login_user($email, $password, $remember)) {


		} else {

			$errors[] = "Oops! Invalid Email or Password";

		} 
		
	} 
	
	
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

     
  </head>

  <body id="home">
  	
  	
<?php include('webparts/header.php') ?>
    
    <!--Page Title-->
    
	<div class="page_title_ctn" id='move_to'> 
		<div class="container-fluid">
          <h2>Checkout</h2>
          
          	<ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active"><span>Checkout</span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!--Shoping Cart-->
    <div class="col-md-12 checkout-area2">
    
    </div>
    <section class="dart-pt-30 checkout-area" >
    	<div class="container">
         
            <div class="row">
<?php
if (!logged_in()) { ?> 
            	<div class="col-md-6 col-sm-6">
   				
                <div id="rd_login_form" style="display: block;">
                    <h3>Existing customer?</h3>
                    
                    <div class="dart-pt-20">
					<form action='checkout' method='POST'>
                    <div id="login2_response" style="color: white; text-align: center">
                                <?php 
									if(!empty($errors)) { ?>
										<div class="alert label-danger alert-dismissible" role="alert">
											<?php
												foreach($errors as $error) {
													echo($error."<br>");
												} 
											?>
										</div>
										<?php
									}
								?>
                    </div>
                    <div id="login2_body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username or email <span class="required">*</span> </label>
                        <input type="text" class="dart-form-control" name="username" placeholder="Email or Username" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password <span class="required">*</span></label>
                        <input type="password" class="dart-form-control" name="password" placeholder="Password" required>
							<input type="hidden" name="task" value='login'/>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name='remember'> Remember me
                        </label>
                      </div>
                      <button type="submit" class="btn normal-btn dart-btn-xs" id="submit-login2">LOGIN NOW</button>
                    </div>
                    </Form>
                    </div>
                    
				</div>
            
            	<div class="rd_guest_checkout">
                    <h3>New customer?</h3>
                    <a class="btn normal-btn dart-btn-sm rd_guest_acc" style='margin-top: 0 !important;' data-toggle="modal" data-target="#myModal">Checkout as guest.</a><br>
                    <a class="btn rd-stroke-btn border_2px dart-btn-sm rd_guest_acc" style='margin-top: 2px !important;' href="register">Create an account.</a>
                </div>
            </div>
<?php } ?>
            
            <div class="col-md-6 col-sm-6">
                <h3>Billing & Delivery details</h3>

                <p>Kindly fill the order form with your accurate details for processing your order.</p>

                <div class="hidden" id='checkout_response'>
                
                </div>

                <form id="billing-form" name="billing-form" class="row" action="#" method="post">

                    <div class="col-sm-12">
                        <label for="billing-form-name">Full Name<sup style='color: red'>*</sup>:</label>
                        <input type="text" max='100' id="orderfullname" name="billing-form-name" 
                        value="<?php if(isset($user)) echo(ucfirst ($user['fullname'])); ?>"
                         class="dart-form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col-sm-12">
                        <label for="billing-form-address">Address<sup style='color: red'>*</sup>:</label>
                        <input type="text" max='100' id="address" name="billing-form-address" 
                        value="<?php if(isset($user)) echo(ucfirst ($user['address'])); ?>" class="dart-form-control" />
                    </div>

                    <div class="col-sm-12">
                        <label for="billing-form-city">City / Town</label>
                        <input type="text" max='100' id="town" name="billing-form-city" value="" class="dart-form-control" />
                    </div>

                    <div class="col-sm-6 col_last">
                        <label for="billing-form-phone">Mobile Number 1<sup style='color: red'>*</sup>:</label>
                        <input type="number" id="phone" name="billing-form-phone" 
                        value="<?php if(isset($user)) echo(ucfirst ($user['phone'])); ?>" class="dart-form-control" />
                    </div>

                    <div class="col-sm-6 col_last">
                        <label for="billing-form-phone">Mobile Number 2:</label>
                        <input type="number" id="phone2" name="billing-form-phone" value="" class="dart-form-control" />
                    </div>
                    <div>
                        <label>Order Notes</label>
                        <textarea id="order_notes" class="dart-form-control" style="width: 100%" rows="5"></textarea>
                    </div>

                </form>
            </div>
<?php
if (!logged_in()) { ?> 
    <div class="clear col-md-12"></div>
<?php } ?>

                <div class="col-md-6 col-sm-6">
   				<div class="table-responsive">
    				<h3 class="dart-pb-20" style='margin-left: 5px'>Your Orders</h3>
                    <table class="table cart checkout">
                        <thead>
                            <tr>
                                <th class="cart-product-thumbnail">Product</th>
                                <th class="cart-product-name">Description</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody id='cartout_details'>

                        </tbody>
                    </table>
                </div>
                
    		</div>
            
<?php
if (logged_in()) { ?> 
    <div class="clear col-md-12" style='border-bottom: 2px solid #dddddd; padding-top: 15px'></div>
<?php } ?>

            <div class="col-md-6  col-sm-6 clearfix">
                    <div class="table-responsive totle-cart">
                        <h3 class="dart-pb-20">Cart Totals</h3>

                        <table class="table cart">
                            <tbody>
                                <tr class="cart_item cart_totle">
                                    <td class="cart-product-name">
                                        <strong>Cart Subtotal</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount total_price">GH₵ 0.00</span>
                                    </td>
                                </tr>
                                <tr class="cart_item cart_totle">
                                    <td class="cart-product-name">
                                        <strong>Delivery</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount">GH₵ <?php echo($_SESSION['delivery_fee']); ?></span>
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
                    
                    <div class="payments-options">
                        <ul class="list-unstyled">
                            <li>
                                <label id="direct-transfer" for="payment_method_bacs">
                                    <input id="payment_method_bacs" class="input-radio" type="radio" data-order_button_text="" value="on-delivery" name="payment_method">
                                    Payment on Delivery
                                </label>
                                <div class="direct-transfer-msg">
                	                <?php echo page_content('payment on delivery text'); ?>
                                </div>
                            </li>
                            <li>
                                <label for="payment_method_paypal" id="paypal-transfer">
                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="before-delivery" name="payment_method" class="input-radio" id="payment_method_paypal" checked>
                                    Payment on Mobile Money
                                </label>
                                <div class="paypal-transfer-msg">
                	                <?php echo page_content('payment mobile money guidelines'); ?>
                                    <button type="submit" class="btn normal-btn dart-btn-xs" id="view-payment" data-toggle="modal" data-target="#myModal2">View more details</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            	
                <input id="customer_id" type="hidden" 
                value="<?php if(isset($user)){ echo $user['id']; } else { echo(0); }?>">
                <div class="col-md-12">
                	<a style='cursor: pointer' class="btn rd-3d-btn dart-btn-sm dart-fright " id='place_order'>Place Order</a>

                    <a href="cart" style='margin-right: 10px' class="btn rd-stroke-btn border_1px dart-btn-xs dart-fright">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Back to cart</a>
                </div>
                
            </div>
        </div>    	
    </section>            
                   


<?php include('webparts/footer.php') ?>   

    <script>
load_cartout_data();
    
				
		function load_cartout_data()
		{
		$.ajax({
			url:"ajax/shop_fetch_cartout.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
			$('#cartout_details').html(data.cart_details);
			$('.total_price').text(data.total_price);
			get_all_price(data.total_price);
			}
		});
		/*Fetch Cart session values end*/
		};


function get_all_price(total) {
    
    var total_price = total;
    var dataid = total_price.split("GH₵ ").join("");
    var total = parseFloat(dataid);
    // alert(total_price);
    var total_prod_fee = total + parseFloat(<?php echo($_SESSION['delivery_fee']); ?>);
    $('.total_charge').text('GH₵ '+total_prod_fee+'.00');
    //  alert(total_prod_fee);

}

$('#place_order').click(function () {
   var customer_id = $('#customer_id').val();
    var fullname = $('#orderfullname').val();
    var address = $('#address').val();
    var phone = $('#phone').val();
    var phone2 = $('#phone2').val();
    var town = $('#town').val();
    var order_notes = $('#order_notes').val();
    var payment_method = $( 'input[name=payment_method]:checked' ).val();

    if(fullname == '' || address == '' || phone == ''){
				alert("Name, Address and Mobile are required");
			} else {


        $.ajax({
            url:"ajax/shop_process_order.php",
            method:"POST",
            dataType:"html",
            data:{
                customer_id:customer_id,
                fullname:fullname,
                phone:phone,
                phone2:phone2,
                address:address,
                town:town,
                order_notes:order_notes,
                payment_method:payment_method,
            },
            beforeSend: function() {
                    $('html, body').animate({
                        scrollTop: $('#move_to').offset().top
                    }, 300);
                    
                $("#checkout_response").addClass('hidden');
				$('.checkout-area').addClass('hidden');
                $('.checkout-area2').html('<div class="loader"><div id="awsload-pageloading"><div class="awsload-wrap"><ul class="awsload-divi"><li></li><li></li><li></li><li></li></ul></div></div></div>');

                    },
            success:function (data) {
                if(data.substring(0,7) == "success"){
                    var orderId = data.substring(7);
				    $('.checkout-area2').html('');
				    $('.checkout-area').removeClass('hidden');
                    $('.checkout-area').html('<div class="container-fluid"><div class="row"><div class="col-md-12"><h1 class="text-bold text-center text-center"><i class="fa fa-smile-o"></i> Thank you cherished customer, your order was placed successfully!.</h1></div><div class="container"><div class="jumbotron tex-center col-md-6"><h3 class="text-center"><i class="fa fa-dot-circle-o animated bounceIn infinite"></i> <?php echo($site_name); ?> is processing your order currently.</h3><h4 class="text-center">Order status: <button class="btn btn_danger">PENDING</button></h4><h4 class="text-center">Order ID: <button class="btn btn_danger">'+orderId+'</button></h4><h4 class="text-center"><a href="./products" class="btn normal-btn dart-btn-xs">Continue shopping</a></h4></div><div class="col-md-6"><img src="uploads/success.png" class="img-responsive"/></div></div></div></div>');
                     
                } else {
				    $('.checkout-area2').html('');
				    $('.checkout-area').removeClass('hidden');
                    $("#checkout_response").removeClass('hidden');

					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 30);
                    $("#checkout_response").html('<div class="alert label-danger alert-dismissible" role="alert" style="color:white">'+data+'</div>');
                    
                }
            },
            fail:function(){

            }

        });
    }

});


    </script>
  </body>

      <div class="modal fade myModal" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style='color: #ee2b63'>Checking out as Guest</h5>
                </div>
                <div class="modal-body center">
                	<?php echo page_content('guest checkout text'); ?>
                </div>
            </div>
        </div>
    </div>
          
          
    <div class="modal fade myModal" id="myModal2" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style='color: #ee2b63'>Payment with Mobile Money</h5>
                </div>
                <div class="modal-body center">
                	<?php echo page_content('payment mobile money details'); ?>
                </div>
            </div>
        </div>
    </div>
</html>
