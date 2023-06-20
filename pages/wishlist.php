<?php

require_once("functions/init.php");
$sub_site_name = "Wishlist";

if(!logged_in()) {
	redirect('products');
	setcookie('wishlist_message', 1, time() + 500);
    redirect('home');
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
    
	<div class="page_title_ctn"> 
		<div class="container-fluid">
          <h2>Wishlist</h2>
          
          	<ol class="breadcrumb">
              <li><a href="home">Home</a></li>
              <li class="active"><span>Wishlist</span></li>
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
                                <th class="cart-product-quantity">No.</th>
                                <th class="cart-product-thumbnail">Image</th>
                                <th class="cart-product-name">Product name</th>
                                <th class="cart-product-price">Unit Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-remove">Actions</th>
                            </tr>
                        </thead>
                        <tbody id='wishlist_details'>
<?php $wishes = wishlist($user['id']); $x=1;
        if(mysqli_num_rows($wishes) > 0) {
        while($row = mysqli_fetch_assoc($wishes)) {
    ?> 
    <tr class="cart_item" id="wish_<?php echo($row['id']); ?>">
        <td style="font-weight: bold" align='center'><?php echo($x); ?></td>
        <td class="cart-product-thumbnail">
        <a href="/product-details/<?php get_url_title_from_id($row['id']); ?>">
        <img width="64" height="64" src="uploads/images/shop/thumb/mini_<?php echo $row['image']; ?>" alt="<?php echo(ucfirst($row['product_name'])); ?>">
        </a>
        </td>

        <td class="cart-product-name">
        <a href="/product-details/<?php get_url_title_from_id($row['id']); ?>"><?php echo(ucfirst($row['product_name'])); ?></a>
        </td>

        <td class="cart-product-price">
        <span class="amount">GH₵ <?php echo($row['price']); ?></span>
        </td>

        <td class="quantity">
        <input type="number" min="0" name="quantity" id="quantity<?php echo($row["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6" value="1" />
        </td>

        <td class="cart-product-remove">
        <button id="<?php echo($row['id']); ?>" data-name=<?php echo($row['product_name']); ?> class="btn btn-danger btn-xs remove-wishlist">Remove</button>
        <input type="button" name="add_to_cart" id="<?php echo($row['id']); ?>" class="btn btn-success btn-xs add_to_cart" value="Add to Cart" /> 

        <input type="hidden" name="hidden_name" id="name<?php echo($row['id']); ?>" value="<?php echo($row['product_name']); ?>" />
        <input type="hidden" name="hidden_price" id="price<?php echo($row['id']); ?>" value="<?php echo($row['price']); ?>" />
        </td>
    </tr>
<?php  $x++; }
            
        } else { ?>    
        <tr>
        <td colspan="6" align="center">
            Your Wishlist is Empty! <a href='products'>Add products to Wishlist.</a>
        </td>
        </tr>

        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
                
    		</div>
         </div>
        </div>    	
    </section>             
                   
<?php include('webparts/footer.php') ?>
    
    <!-- template JavaScript -->
    <script src="js/template.js"></script>
    
    <script>
	$('.remove-wishlist').on('click', function(){
		
		var id = $(this).attr('id');
		var name = $(this).data('name');
		
		//alert(name);
		//alert(id);
		
		var confirmed = confirm("Remove "+name+" from Wishlist");
		
		if(confirmed == true) {
			
			$.ajax ({ 
			url:'ajax/process_wishlist_remove.php',
             method:'POST',
			dataType:'html',
            data: {
				wish_id: id
			},
		   beforeSend: function() {
				$('#'+id).html('<h6>Removing Product...</h6>');
				 //toastr.info('Removing Product');
			},
		   success: function(responseData) {
                 if(responseData == 'success') {
				    notify('<b>Wishlist</b><br>Wishlist product successfully removed');
                    
                    $('#wish_'+id).remove();
                
                    $('#wishlist_details').each(function() {
                    if($(this).find('tr').length == 0) {
                    // empty tr
                    // id of tr is available through this.id
                    $('#wishlist_details').html('<tr><td colspan="6" align="center">Your Wishlist is Empty! <a href="products">Add products to Wishlist.</a></td></tr>')
                    }
                    });
                    
                 } else {
				    notify('<b>Wishlist</b><br>'+responseData);
                 }
            }
	   });
			
		};
		
    });
    

    </script>
  </body>
</html>
