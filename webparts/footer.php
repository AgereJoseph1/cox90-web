
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script> 
<script>
    
    jQuery(document).ready(function($) {
        //open popup
        $('.cd-popup-trigger').on('click', function(event) {
            event.preventDefault();
            $('.cd-popup').addClass('is-visible');
        });
    
        $('.closemodal').on('click', function(event) {
            $('.cd-popup2').removeClass('is-visible');
            $('.cd-popup').removeClass('is-visible');
        });
        //close popup
        $('.cd-popup').on('click', function(event) {
            if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
        $('.cd-popup2').on('click', function(event) {
            if ($(event.target).is('.cd-popup-close2') || $(event.target).is('.cd-popup2')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
        //close popup when clicking the esc keyboard button
        $(document).keyup(function(event) {
            if (event.which == '27') {
                $('.cd-popup').removeClass('is-visible');
            }
        });
        $(document).keyup(function(event) {
            if (event.which == '27') {
                $('.cd-popup2').removeClass('is-visible');
            }
        });
    });

	/* ---------------------------------------------------------------------- */
	/*	magnific-popup
	/* ---------------------------------------------------------------------- */

	// Example with multiple objects
	$('.zoom').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});
	
	
// shoping cart script //////////////////////////////////////////////////////////////////////

	/*------------------------ shop -------------------------------*/
	$('#cart-popover').popover({
		html : true,
			  container: 'body',
			  content:function(){
			   return $('#popover_content_wrapper').html();
			  }
	  });

		  
		  /////////////*Fetch Cart session values start*///////////////
		  load_cart_data();

		  function load_cart_data()
		  {
			$.ajax({
			 url:"ajax/shop_fetch_cart.php",
			 method:"POST",
			 dataType:"json",
			 success:function(data)
			 {
			  $('#cart_details').html(data.cart_details);
			  $('.total_price').text(data.total_price);
			  $('.main_badge').text(data.total_item);
			 }
			});
		  /*Fetch Cart session values end*/
	  };
		  
		  
		  /////////////*Add products to cart start*//////////////    
		   $('body').on('click', '.add_to_cart', function(){
			var product_id = $(this).attr("id");
			var product_name = $('#name'+product_id+'').val();
			var product_price = $('#price'+product_id+'').val();
			var product_quantity = $('#quantity'+product_id).val();
			var action = "add";
			if(product_quantity > 0)
			{
			 $.ajax({
			  url:"ajax/shop_action.php",
			  method:"POST",
			  data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
			  beforeSend: function() {
				
				},
			  success:function(data)
			  {
			   load_cart_data();
			 //  alert("Item has been Added into Cart");
			    $('#pop-up-text').text(`${product_name} has being added successfully to your cart`);
                $('.cd-popup').addClass('is-visible');
			  }
			 });
			}
			else
			{
			 alert("Please Enter Number of Quantity");
			}
		   });
		   
window.onload = function(){
	$('.register-line a').on('click', function(event){
		event.preventDefault();
		$('div.login-form').slideUp(400);
		$('div.register-form').slideDown(400);
	});
	
	$('a.lost-password').on('click', function(event){
		event.preventDefault();
		$('div.login-form').slideUp(400);
		$('div.lost-password-form').slideDown(400);
	});
	
	$('.login-line a').on('click', function(){
		console.log("clicked");
		$('div.lost-password-form').slideUp(400);
		$('div.register-form').slideUp(400);
		$('div.login-form').slideDown(400);
	});
}

function notify(message) {
            $('body').append("<div style='position: absolute; right: 0;top:40%; z-index: 100000000;' class='animated bounceInRight  alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>"+message+"</div>");
		}
</script>
    <footer class="footer">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<img src='uploads/free-delivery.png' width='100%' />
    			</div>
    			<div class="col-md-4 col-sm-4">
    				<div class="footer-block about">
						<h3>about us</h3>
						<p><?php echo(setting('About')); ?></p>
    				</div>
    			</div>
    			<div class="col-md-4 col-sm-4">
    				<div class="footer-block twitter">
						<h3><?php echo(setting('mid_footer_head')); ?></h3>
						<p><?php echo(setting('mid_footer_body')); ?></p>
    				</div>
    			</div>
    			<div class="col-md-4 col-sm-4">
    				<div class="footer-block contact">
						<h3>contact</h3>
						<p><?php echo(setting('footer_contact')); ?></p>
    				</div>
    			</div>
    			<div class="col-md-12  col-sm-12">
    				<div class="social">
    					<h5>IT STARTS WITH YOU. FOLLOW US</h5>
    					<ul class="list-inline">
						<li><a href="https://web.facebook.com/cox90gh/" target="_blank" alt="cox90 Facebook" class='social-icon'>
							<img class="facebook_on" src="images/face.PNG" width="70%"><img class="facebook_off" src="images/face2.PNG" width="70%">
						</a></li>
						<li><a href="https://www.instagram.com/cox90gh/" target="_blank" alt="cox90 Instagram" class='social-icon'>
							<img class="instagram_on" src="images/insta.PNG" width="70%"><img class="instagram_off" src="images/insta2.PNG" width="70%">
						</a></li>
						<li><a href="https://twitter.com/cox90gh" target="_blank" alt="cox90 Twitter" class='social-icon'>
							<img class="twitter_on" src="images/twit.PNG" width="70%"><img class="twitter_off" src="images/twit2.PNG" width="70%">
						</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="copy">
    				<p><span> <?php echo(setting('Company name')); ?> </span>© <?php echo(setting('year')); ?>  | <?php echo(setting('dev_website')); ?></p>
    			</div>
    		</div>
    	</div>
	</footer>       
			<!-- Contents of log in popup-->
    <script>
		  /////////////*remove products to cart start*/
		  $(document).on('click', '.delete', function(){
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
			   load_cart_data();
			   alert("Item has been removed from Cart");
			  }
			 })
			}
			else
			{
			 return false;
			}
		   });

		  /////////////*remove products to cart end*/
	

		$('body').on('click', '.wishlist', function() {
		
			var wishes = parseInt($('.total-wish').text());
				
			var product_id = $(this).attr('id');
			var customer_id = $('#customer_id').val();
			//alert(product_id);
					$.ajax ({ 
				url:'ajax/process_wishlist.php',
				method:'POST',
				dataType:'html',
				data: {
					customer_id: customer_id,
					product_id: product_id
				},
				beforeSend: function() {
					
				},
				 success: function(data){
					 if(data == 'success') {
						notify('<b>Wishlist Message</b><br>Product Added successfully');
					 } else {
						notify('<b>Wishlist Message</b><br>'+ data);
					 }
					 if(data == 'success') {
					 var updated = wishes + 1;
					 $('.total-wish').text(updated);
						 }
				}
			});
				
		});
		
		        
    </script>

    <!-- Nav JavaScript -->
    <script src="js/awesomenav.js"></script>   <script src="js/yall.min.js"></script>  
    <script type="text/javascript">
     document.addEventListener("DOMContentLoaded", function() {
        yall({
          observeChanges: true
        });
      });
     
    // var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    // (function(){
    // var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    // s1.async=true;
    // s1.src='https://embed.tawk.to/5c1665be82491369ba9e50e9/1curo1hg5';
    // s1.charset='UTF-8';
    // s1.setAttribute('crossorigin','*');
    // s0.parentNode.insertBefore(s1,s0);
    // })();

    objImg = new Image();
    objImg.src = 'uploads/carousel_image_1800.jpg';
    objImg.onload = function() { 
    $(".loader").fadeOut("slow");
					}

    </script>
<!-- <script src="js/jquery.barrating.min.js"></script> -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c17c301f857fb5c"></script>