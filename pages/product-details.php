<?php

require_once("functions/init.php");
$sub_site_name1 = "Product details";
$sub_site_name = "Product details";
$table = 'tbl_products';
$main = "Products";
		
		if(isset($path['call_parts'][1]) && $path['call_parts'][1] !== '' ) {

				$id = escape(strip_tags($path['call_parts'][1]));

				$item = select_from_url('tbl_products', $id);
				
				$newscount = mysqli_num_rows($item);
			
				$item_selected = mysqli_fetch_assoc($item);
						//.............redirect user if fecth results is 0
				if($newscount == 0) {header("Location: ../products"); }

					//.............redirect user if part 2 is set but is empty
			} elseif (isset($path['call_parts'][1]) && $path['call_parts'][1] == '') {
				header("Location: ../item");
			
				//.............redirect user if part 2 is not set 
			} else {
				header("Location: products");
		}


$sub_site_name = $item_selected['title'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

   	<!-- Base MasterSlider style sheet -->
    <link rel="stylesheet" href="vendor/masterslider/style/masterslider.css" />
     
    <!-- Master Slider Skin -->
    <link href="vendor/masterslider/skins/black-1/style.css" rel="stylesheet" type="text/css" />
     
  </head>

  <body id="home">
  	
  	
<?php include('webparts/header.php') ?>

    
    <!--Page Title-->
    
	<div class="page_title_ctn"> 
		<div class="container-fluid">
          <h2>Shop</h2>
          
          	<ol class="breadcrumb">
              <li><a href="home">Home</a></li>
              <li><a href="products"><span>Products</span></a></li>
              <li class="active"><a href="products/<?php echo(get_url_title_from_id_all($item_selected['category'], 'products_subcategories')) ?>"><span>
                  <?php echo(get_title_from_id($item_selected['category'], 'products_subcategories')) ?>
                </span></a></li>
            </ol>
           
    	</div>
    </div>  
    
		
    <!--Shoping with Sidebar Section-->
    <div class="shop-pages">
        <section class="product-single-wrap section-padding">
            <div class="container">
                <div class="product-content-wrap">
                    <div class="row">                        
                        <div class="col-md-6 col-sm-8 col-sm-offset-2 col-md-offset-0">
                            
                            <!-- template -->
                            <div class="ms-showcase2-template ms-showcase2-vertical">
                                        <!-- masterslider -->
                                        <div class="master-slider ms-skin-default" id="masterslidershop">
                                            <div class="ms-slide">
                                                <img src="vendor/masterslider/style/blank.gif" data-src="uploads/images/<?php echo('shop/thumb/'.$item_selected['image']); ?>" 
                                                alt="<?php echo($item_selected['title']); ?>" /> 
                                                <img class="ms-thumb" src="uploads/images/<?php echo('shop/thumb/mini_'.$item_selected['image']); ?>" 
                                                alt="<?php echo($item_selected['title']); ?>" />
                                            </div>
								<?php if($item_selected['image2'] != '') { ?> 
                                            <div class="ms-slide">
                                                <img src="vendor/masterslider/style/blank.gif" data-src="uploads/images/<?php echo('shop/thumb/'.$item_selected['image2']); ?>" 
                                                alt="<?php echo($item_selected['title']); ?>"/>    
                                                 <img class="ms-thumb" src="uploads/images/<?php echo('shop/thumb/mini_'.$item_selected['image2']); ?>" 
                                                 alt="<?php echo($item_selected['title']); ?>" />
                                            </div>
								<?php }  ?>
								<?php if($item_selected['image3'] != '') { ?> 
                                            <div class="ms-slide">
                                                <img src="vendor/masterslider/style/blank.gif" data-src="uploads/images/<?php echo('shop/thumb/'.$item_selected['image3']); ?>" 
                                                alt="<?php echo($item_selected['title']); ?>"/>   
                                                 <img class="ms-thumb" src="uploads/images/<?php echo('shop/thumb/mini_'.$item_selected['image3']); ?>" 
                                                 alt="<?php echo($item_selected['title']); ?>" />  
                                            </div>
								<?php }  ?>
								<?php if($item_selected['image4'] != '') { ?> 
                                            <div class="ms-slide">
                                                <img src="vendor/masterslider/style/blank.gif" data-src="uploads/images/<?php echo('shop/thumb/'.$item_selected['image4']); ?>" 
                                                alt="<?php echo($item_selected['title']); ?>"/>   
                                                 <img class="ms-thumb" src="uploads/images/<?php echo('shop/thumb/mini_'.$item_selected['image4']); ?>" 
                                                 alt="<?php echo($item_selected['title']); ?>" /> 
                                            </div>
								<?php }  ?>
                                        </div>
                                        <!-- end of masterslider -->
                            </div>
                            <!-- end of template --> 
                            
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="product-content dart-mt-30">                                     
                                <div class="product-title">
                                    <h2><?php echo(ucfirst($item_selected['title'])); ?></h2>                                                
                                </div>


                                <!-- <div class="product-price-review">
                                    <span class="font-semibold black-color">GH₵ <?php //echo($item_selected['price']); ?></span> 
                                    <div class="rating"> 
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="text">3 Customer Reviews</span>
                                    </div>
                                </div> -->
                                <div class="product-description">
                                    <p>
                                    <?php echo($item_selected['description']); ?>
                                    </p>
                                    <div class="qty-add-wish-btn">
                                    <br>
										<div class="price">
                                            <span class="tag">GH₵ <?php echo($item_selected['price']); ?></span>
                                            <?php if($item_selected['old_price'] > 0) { ?>
											    <span class="actual-price" style='margin-left: 10px'> <?php echo(' GH₵'.$item_selected['old_price']); ?></span>
                                            <i class=' fa fa-arrow-circle-down' style='transform: translateY(0px); margin-left: 10px'> 
                                            </i>
                                                <?php 
                                                   echo round(getPercentageChange($item_selected['old_price'], $item_selected['price'])).'%';
                                                ?>
                                            <?php } ?>
										</div>
                                    <br>
                                    <br>
                                    <span class="quantity">
                                        <label for="billing-form-name">Quantity:</label>
                                            <input type="number" min="0" name="quantity" id="quantity<?php echo($item_selected["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6" value="1" />
                                    </span>
                                    <br>
                                    <span>
                                    <?php if($item_selected['in_stock'] == 1) { ?>
                                        <button class="btn rd-stroke-btn border_2px dart-btn-sm add_to_cart" id="<?php echo($item_selected['id']); ?>" style='z-index: 1099;'>
                                        <i class="fa fa-shopping-bag"></i> Buy Now
                                        </button>
                                    <?php } else { ?>
                                        <button class="btn rd-stroke-btn border_2px dart-btn-sm" style="color: #fff; background: #4e4e4e; border-color: #4e4e4e;" id="<?php echo($item_selected['id']); ?>" style='z-index: 1099;'>
                                        <i class="fa fa-shopping-bag"></i> Out of Stock
                                        </button>
                                    <?php } ?>
                                    </span>
                                    <span>
                                        <a class="btn rd-stroke-btn border_2px dart-btn-sm wishlist" id="<?php echo($item_selected["id"]); ?>">
                                        <i class="fa fa-heart"></i> Buy Later
                                        </a>
                                    </span>
                                    </div>
                                    <div class="social-media">
                                        <span class="black-color">Share with friends</span>
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>        
    </section>
    </div>             
                   
				  
    <input type="hidden" name="hidden_name" id="name<?php echo($item_selected['id']); ?>" value="<?php echo($item_selected['product_name']); ?>" />
    <input type="hidden" name="hidden_price" id="price<?php echo($item_selected['id']); ?>" value="<?php echo($item_selected['price']); ?>" />
    
	<?php include 'webparts/footer.php' ?>      
    <script src="vendor/masterslider/jquery.easing.min.js"></script>
     
    <!-- Master Slider -->
    <script src="vendor/masterslider/masterslider.min.js"></script>                         
    
    <script>
  
// Masterslider 
	var slider = new MasterSlider();
		slider.setup('masterslider' , {
			width:1024,
			height:580,
			//space:100,
			fullwidth:true,
			centerControls:false,
			speed:18,
			view:'flow',
			overPause:false,
			autoplay:true
		});
		//slider.control('arrows');
		slider.control('bullets' ,{autohide:false}); 
	
// Masterslider shop
	 var slider = new MasterSlider();
         
        slider.control('arrows');  
        slider.control('thumblist' , {autohide:false ,dir:'h',arrows:true, align:'bottom', width:127, height:137, margin:5, space:5});
     
        slider.setup('masterslidershop' , {
            width:540,
            height:586,
            space:5,
            view:'scale'
        });
    </script>
  </body>
</html>
