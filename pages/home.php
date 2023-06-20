<?php

require_once("../functions/init.php");
$sub_site_name = "Home";

?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('../webparts/css.php'); ?>
	
   	<!-- Base MasterSlider style sheet -->
    <link rel="stylesheet" href="vendor/masterslider/style/masterslider.css" />
     
    <!-- Master Slider Skin -->
    <link href="vendor/masterslider/skins/default/style.css" rel="stylesheet" type="text/css" />
    
    <!-- masterSlider Template Style -->
	<link href="vendor/masterslider/style/ms-layers-style.css" rel="stylesheet" type="text/css">   
   
    <!-- owl Slider Style -->
    <link rel="stylesheet" href="vendor/owlcarousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owlcarousel/dist/assets/owl.theme.default.min.css">

     
  </head>

  <body id="home">
  	
<?php include('../webparts/header.php') ?>
    
    <!--Slider Here-->
    <!--<section class="dart-no-padding-tb"> -->
        
    <!--    <div class="ms-layers-template">-->
            <!-- masterslider -->
    <!--        <div class="master-slider ms-skin-black-2 round-skin" id="masterslider">-->
    <!--            <div class="ms-slide slide-1" style="z-index: 10" data-delay="10">-->
    <!--                <img src="vendor/masterslider/style/blank.gif" data-src="uploads/<?php echo(single_image('carousel_image_1')) ?>" alt="lorem ipsum dolor sit"/>-->
    <!--            </div>                -->
                                      
    <!--        </div>-->
            <!-- end of masterslider -->
    <!--    </div>-->
        <!-- end of template -->
    <!--</section>   -->
    
    <div class="clearfix"></div>    
    
    <section class="dart-no-padding">
    	<div class="container-fluid">
    		<div class="row no-gutter">
    			<div class="col-lg-6 col-md-6">
    				<div class="clearfix no-gutter">
    					<div class="col-sm-6">
							<a <?php if(trim(image_url('carousel_image_2')) != '') {
								echo('href="'.image_url('carousel_image_2').'"');
							} ?> ><img src="uploads/placeholder_carousel_2.png" data-src="uploads/<?php echo(single_image('carousel_image_2')) ?>" class="img-responsive lazy" alt="cox90 Beauty and Cosmetics online shop"></a>
    					</div>
    					<div class="col-sm-6">
							<a <?php if(trim(image_url('carousel_image_3')) != '') {
								echo('href="'.image_url('carousel_image_3').'"');
							} ?> ><img src="uploads/placeholder_carousel_3.png" data-src="uploads/<?php echo(single_image('carousel_image_3')) ?>" class="img-responsive lazy" alt="cox90 Beauty and Cosmetics online shop"></a>
    					</div>
    					<div class="col-sm-12">
    						<a <?php if(trim(image_url('carousel_image_4')) != '') {
								echo('href="'.image_url('carousel_image_4').'"');
							} ?> ><img src="uploads/placeholder_carousel_4.png" data-src="uploads/<?php echo(single_image('carousel_image_4')) ?>" class="img-responsive lazy" alt="cox90 Beauty and Cosmetics online shop"></a>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6 col-md-6">
    				<a <?php if(trim(image_url('carousel_image_5')) != '') {
								echo('href="'.image_url('carousel_image_5').'"');
							} ?> ><img src="uploads/placeholder_carousel_5.png" data-src="uploads/<?php echo(single_image('carousel_image_5')) ?>" class="img-responsive lazy" alt="cox90 Beauty and Cosmetics online shop"></a>
    			</div>
    		</div>    		
    	</div>   	
    </section>
       
       
    <section class="product-slide" style='padding: 10px 0px !important'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div role="tabpanel" class="tabSix text-center"><!--Style 6-->

                      <!-- Nav tabs -->
                      <ul id="tabSix" class="nav nav-tabs">
                        <li class="active">
                            <a href="#contentSix-one" data-toggle="tab">
                                <p>Best Seller</p>
                            </a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="#contentSix-two" data-toggle="tab">-->
                        <!--        <p>New Arrival</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!-- <li>
                            <a href="#contentSix-three" data-toggle="tab">
                                <p>Most Wanted</p>
                            </a>
                        </li> -->
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane in active" id="contentSix-one">
                            <div class="tab-pane" id="contentSix-2">
                            <div class="owl-carousel owl-theme">
					<?php 
						$popular = get_slot('best_seller', 9); 
						while($product = mysqli_fetch_assoc($popular)) { ?> 

								<div class="wa-theme-design-block">
									<figure>
									    <a href="product-details/<?php echo($product['url_title']); ?>">
									    <figure class="dark-theme">
										<img src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
										<?php
										$new_time_interval = strtotime($product['date']) + $new_interval;
											 if($new_time_interval > $time) {
												echo('<div class="ribbon"><span>New</span></div>');
											 }
										?>
									    </figure>
									    </a>
										<?php if($product['in_stock'] == 1) { ?>
										<span class="block-sticker-tag1">
										<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
										</span>	
										<?php } ?>	
										<span class="block-sticker-tag2">									   
										<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
										</span>
										<span class="block-sticker-tag3">
										<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></a></span>
										</span>
									</figure>
									<div class="block-caption1">
										<div class="price">
											<span class="sell-price">₵ <?php echo($product['price']); ?></span>
											<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
										</div>
										<div class="clear"></div>
							<a href="product-details/<?php echo($product['url_title']); ?>">
							<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
							</h4>
							</a>
			 <input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
             <input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
             <input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
             <input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
									</div>
								</div>
						<?php } ?>
					</div>
                        </div>
                        </div>
                        <!--<div class="tab-pane" id="contentSix-two">-->
                            
                        <!--</div>-->
                        <!-- <div class="tab-pane" id="contentSix-three">
                            <div class="owl-carousel owl-theme">
							<?php /*
						$popular = get_slot('most_wanted', 9); 
						while($product = mysqli_fetch_assoc($popular)) { ?> 

								<div class="wa-theme-design-block">
									<figure>
									    <a href="product-details/<?php echo($product['url_title']); ?>">
									    <figure class="dark-theme">
										<img src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
										<?php
										$new_time_interval = strtotime($product['date']) + $new_interval;
											 if($new_time_interval > $time) {
												echo('<div class="ribbon"><span>New</span></div>');
											 }
										?>
									    </figure>
									    </a>
										<?php if($product['in_stock'] == 1) { ?>
										<span class="block-sticker-tag1">
										<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
										</span>	
										<?php } ?>	
										<span class="block-sticker-tag2">									   
										<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
										</span>
										<span class="block-sticker-tag3">
										<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
										</span>
									</figure>
									<div class="block-caption1">
										<div class="price">
											<span class="sell-price">₵ <?php echo($product['price']); ?></span>
											<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
										</div>
										<div class="clear"></div>
							<a href="product-details/<?php echo($product['url_title']); ?>">
							<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
							</h4>
							</a>
			 <input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
             <input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
             <input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
             <input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
									</div>
								</div>
						<?php } */ ?>
							</div>
                        </div> -->
                      </div>
                    </div>              
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>     


	 <section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading">New In Town &#128519</h2>
		    		<img src="images/Icon-sep.png" alt="img" />
			    </div>

                            <div class="owl-carousel owl-theme">
							<?php 
						$popular = get_slot('new_arrival', 9); 
						while($product = mysqli_fetch_assoc($popular)) { ?> 

								<div class="wa-theme-design-block">
									<figure>
									    <a href="product-details/<?php echo($product['url_title']); ?>">
									    <figure class="dark-theme">
										<img src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
										<?php
										$new_time_interval = strtotime($product['date']) + $new_interval;
											 if($new_time_interval > $time) {
												echo('<div class="ribbon"><span>New</span></div>');
											 }
										?>
									    </figure>
									    </a>
										<?php if($product['in_stock'] == 1) { ?>
										<span class="block-sticker-tag1">
										<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
										</span>	
										<?php } ?>	
										<span class="block-sticker-tag2">									   
										<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
										</span>
										<span class="block-sticker-tag3">
										<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
										</span>
									</figure>
									<div class="block-caption1">
										<div class="price">
											<span class="sell-price">₵ <?php echo($product['price']); ?></span>
											<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
										</div>
										<div class="clear"></div>
							<a href="product-details/<?php echo($product['url_title']); ?>">
							<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
							</h4>
							</a>
			 <input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
             <input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Buy Now" />
             <input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
             <input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
									</div>
								</div>
						<?php } ?>
							</div>

    		</div>
    	</div>
    </section> 
	 
	 <section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading">Hot Cakes &#128523</h2>
		    		<img src="images/Icon-sep.png" alt="img" />
			    </div>

                            <div class="owl-carousel owl-theme">
							<?php 
						$popular = get_slot('most_wanted', 9); 
						while($product = mysqli_fetch_assoc($popular)) { ?> 

								<div class="wa-theme-design-block">
									<figure>
									    <a href="product-details/<?php echo($product['url_title']); ?>">
									    <figure class="dark-theme">
										<img src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
										<?php
										$new_time_interval = strtotime($product['date']) + $new_interval;
											 if($new_time_interval > $time) {
												echo('<div class="ribbon"><span>New</span></div>');
											 }
										?>
									    </figure>
									    </a>
										<?php if($product['in_stock'] == 1) { ?>
										<span class="block-sticker-tag1">
										<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
										</span>	
										<?php } ?>	
										<span class="block-sticker-tag2">									   
										<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
										</span>
										<span class="block-sticker-tag3">
										<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
										</span>
									</figure>
									<div class="block-caption1">
										<div class="price">
											<span class="sell-price">₵ <?php echo($product['price']); ?></span>
											<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
										</div>
										<div class="clear"></div>
							<a href="product-details/<?php echo($product['url_title']); ?>">
							<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
							</h4>
							</a>
			 <input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
             <input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
             <input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
             <input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
									</div>
								</div>
						<?php } ?>
							</div>

    		</div>
    	</div>
    </section> 

	<section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading">Dont Miss Out &#128525;</h2>
		    		<img src="images/Icon-sep.png" alt="img" />
			    </div>
				<?php 
			$popular = get_slot('featured', 6); $x=0;
			while($product = mysqli_fetch_assoc($popular)) { $x++; ?> 

    			<div class="col-md-2 col-sm-4 col-xs-6">
				<div class="wa-theme-design-block">
				<figure>
					<a href="product-details/<?php echo($product['url_title']); ?>">
					<figure class="dark-theme">
					<img class="lazy" src="uploads/placeholder.png" data-src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
					<?php
					$new_time_interval = strtotime($product['date']) + $new_interval;
							if($new_time_interval > $time) {
							echo('<div class="ribbon"><span>New</span></div>');
							}
					?>
					</figure>
					</a>
					<?php if($product['in_stock'] == 1) { ?>
					<span class="block-sticker-tag1">
					<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
					</span>	
					<?php } ?>
					<span class="block-sticker-tag2">									   
					<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
					</span>
					<span class="block-sticker-tag3">
					<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
					</span>
				</figure>
				<div class="block-caption1">
					<div class="price">
						<span class="sell-price">₵ <?php echo($product['price']); ?></span>
						<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
					</div>
					<div class="clear"></div>
		<a href="product-details/<?php echo($product['url_title']); ?>">
		<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
		</h4>
		</a>
<input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
<input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
<input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
<input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
				</div>
			</div>
				</div>

			<?php 
			if($x % 2 == 0) { ?>
				<div class='clearfix col-xs-12 visible-xs-block'></div>
			<?php }	
			if($x % 3 == 0) { ?>
				<div class='clearfix col-sm-12 visible-sm-block'></div>
			<?php }	
		} ?>

    		</div>
	<div class="col-md-12 col-sm-12 col-xs-12">   
		<a href="products" class="btn rd-stroke-btn center-block">
		<span class="glyphicon glyphicon-shopping-cart"></span> All Products
		</a>                   
	</div> 
    	</div>
    </section>  
          
    <section class="super-deal-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-5 col-sm-5">
    				<div class="super-deal">
    					<p class="dart-fs-18"><?php echo(page_content('banner top text')); ?></p>
    					<h1 class="dart-fs-48"><?php echo(page_content('banner header text')); ?></h1>
    					<p><?php echo(page_content('banner main text')); ?></p>
    					<div class="clearfix"></div>
    					    					
    					<div class="demo2"></div>
    					
    					<a <?php echo(setting('banner shop link')); ?> class="btn btn-normal">Shop Now</a>
    				</div>
    			</div>
    			<div class="col-md-7 col-sm-7">
					<a <?php if(trim(image_url('mid_image_1')) != '') {
								echo('href="'.image_url('mid_image_1').'"');
							} ?> ></a>
    				<img src="uploads/<?php echo(single_image('mid_image_1')) ?>" class="img-responsive" alt="cox90" />
    			</div>
    		</div>
    	</div>
    </section>       
            
    
    <section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
				<?php 
			$popular = get_slot('slot_1', 6); 
			if(mysqli_num_rows($popular) > 3) { $x=0;
				if(setting('slot 1 name') != '') { ?>
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading"><?php echo(setting('slot 1 name')); ?></h2>
		    		<img src="images/Icon-sep.png" alt="img" />
				</div>
			<?php }
			while($product = mysqli_fetch_assoc($popular)) { $x++; ?> 

    			<div class="col-md-2 col-sm-4 col-xs-6">
				<div class="wa-theme-design-block">
				<figure>
					<a href="product-details/<?php echo($product['url_title']); ?>">
					<figure class="dark-theme">
					<img class="lazy" src="uploads/placeholder.png" data-src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
					<?php
					$new_time_interval = strtotime($product['date']) + $new_interval;
							if($new_time_interval > $time) {
							echo('<div class="ribbon"><span>New</span></div>');
							}
					?>
					</figure>
					</a>
					<?php if($product['in_stock'] == 1) { ?>
					<span class="block-sticker-tag1">
					<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
					</span>	
					<?php } ?>
					<span class="block-sticker-tag2">									   
					<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
					</span>
					<span class="block-sticker-tag3">
					<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
					</span>
				</figure>
				<div class="block-caption1">
					<div class="price">
						<span class="sell-price">₵ <?php echo($product['price']); ?></span>
						<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
					</div>
					<div class="clear"></div>
		<a href="product-details/<?php echo($product['url_title']); ?>">
		<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
		</h4>
		</a>
<input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
<input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
<input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
<input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
				</div>
			</div>
				</div>

			<?php 
			if($x % 2 == 0) { ?>
				<div class='clearfix col-xs-12 visible-xs-block'></div>
			<?php }	
			if($x % 3 == 0) { ?>
				<div class='clearfix col-sm-12 visible-sm-block'></div>
			<?php }	
		} 
		} ?>
    		</div>
    	</div>
    </section>  


    <section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
			<?php 
			$popular = get_slot('slot_2', 6); 
			if(mysqli_num_rows($popular) > 3) { $x=0;
				if(setting('slot 2 name') != '') { ?>
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading"><?php echo(setting('slot 2 name')); ?></h2>
		    		<img src="images/Icon-sep.png" alt="img" />
				</div>
			<?php }
			while($product = mysqli_fetch_assoc($popular)) { $x++; ?> 

    			<div class="col-md-2 col-sm-4 col-xs-6">
				<div class="wa-theme-design-block">
				<figure>
					<a href="product-details/<?php echo($product['url_title']); ?>">
					<figure class="dark-theme">
					<img class="lazy" src="uploads/placeholder.png" data-src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
					<?php
					$new_time_interval = strtotime($product['date']) + $new_interval;
							if($new_time_interval > $time) {
							echo('<div class="ribbon"><span>New</span></div>');
							}
					?>
					</figure>
					</a>
					<?php if($product['in_stock'] == 1) { ?>
					<span class="block-sticker-tag1">
					<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
					</span>	
					<?php } ?>
					<span class="block-sticker-tag2">									   
					<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
					</span>
					<span class="block-sticker-tag3">
					<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
					</span>
				</figure>
				<div class="block-caption1">
					<div class="price">
						<span class="sell-price">₵ <?php echo($product['price']); ?></span>
						<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
					</div>
					<div class="clear"></div>
		<a href="product-details/<?php echo($product['url_title']); ?>">
		<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
		</h4>
		</a>
<input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
<input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
<input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
<input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
				</div>
			</div>
				</div>


			<?php 
			if($x % 2 == 0) { ?>
				<div class='clearfix col-xs-12 visible-xs-block'></div>
			<?php }	
			if($x % 3 == 0) { ?>
				<div class='clearfix col-sm-12 visible-sm-block'></div>
			<?php }	
		} 
		} ?>
			
			<div class="col-md-12 col-sm-12 col-xs-12">   
				<a href="products" class="btn rd-stroke-btn center-block">
				<span class="glyphicon glyphicon-shopping-cart"></span> All Products
				</a>                   
			</div> 
    		</div>
    	</div>
    </section>  


    <section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
			<?php 
			$popular = get_slot('slot_3', 6); 
			if(mysqli_num_rows($popular) > 3) { $x=0;
				if(setting('slot 3 name') != '') {  ?>
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading"><?php echo(setting('slot 3 name')); ?></h2>
		    		<img src="images/Icon-sep.png" alt="img" />
				</div>
			<?php }
			while($product = mysqli_fetch_assoc($popular)) {$x++; ?> 

    			<div class="col-md-2 col-sm-4 col-xs-6">
				<div class="wa-theme-design-block">
				<figure>
					<a href="product-details/<?php echo($product['url_title']); ?>">
					<figure class="dark-theme">
					<img class="lazy" src="uploads/placeholder.png" data-src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
					<?php
					$new_time_interval = strtotime($product['date']) + $new_interval;
							if($new_time_interval > $time) {
							echo('<div class="ribbon"><span>New</span></div>');
							}
					?>
					</figure>
					</a>
					<?php if($product['in_stock'] == 1) { ?>
					<span class="block-sticker-tag1">
					<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
					</span>	
					<?php } ?>
					<span class="block-sticker-tag2">									   
					<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
					</span>
					<span class="block-sticker-tag3">
					<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
					</span>
				</figure>
				<div class="block-caption1">
					<div class="price">
						<span class="sell-price">₵ <?php echo($product['price']); ?></span>
						<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
					</div>
					<div class="clear"></div>
		<a href="product-details/<?php echo($product['url_title']); ?>">
		<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
		</h4>
		</a>
<input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
<input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
<input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
<input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
				</div>
			</div>
				</div>


			<?php 
			if($x % 2 == 0) { ?>
				<div class='clearfix col-xs-12 visible-xs-block'></div>
			<?php }	
			if($x % 3 == 0) { ?>
				<div class='clearfix col-sm-12 visible-sm-block'></div>
			<?php }	
		} 
		} ?>
    		</div>
    	</div>
    </section>  


    <section class="featured-product" style='padding: 10px 0px !important'>
    	<div class="container">
    		<div class="row">
			<?php 
			$popular = get_slot('slot_4', 6); 
			if(mysqli_num_rows($popular) > 3) { $x=0;
				if(setting('slot 4 name') != '') { ?>
    			<div class="dart-headingstyle-one text-center dart-mb-10">  <!--Style 1-->
					<h2 class="dart-heading"><?php echo(setting('slot 4 name')); ?></h2>
		    		<img src="images/Icon-sep.png" alt="img" />
				</div>
			<?php }
			while($product = mysqli_fetch_assoc($popular)) { $x++; ?> 

    			<div class="col-md-2 col-sm-4 col-xs-6">
				<div class="wa-theme-design-block">
				<figure>
					<a href="product-details/<?php echo($product['url_title']); ?>">
					<figure class="dark-theme">
					<img class="lazy" src="uploads/placeholder.png" data-src="uploads/images/<?php echo('shop/thumb/home_'.$product['image']); ?>" alt="<?php echo($product['title'].' '.$site_name); ?>">
					<?php
					$new_time_interval = strtotime($product['date']) + $new_interval;
							if($new_time_interval > $time) {
							echo('<div class="ribbon"><span>New</span></div>');
							}
					?>
					</figure>
					</a>
					<?php if($product['in_stock'] == 1) { ?>
					<span class="block-sticker-tag1">
					<span class="off_tag add_to_cart" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
					</span>	
					<?php } ?>
					<span class="block-sticker-tag2">									   
					<span class=" off_tag1 wishlist" id="<?php echo($product["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
					</span>
					<span class="block-sticker-tag3">
					<span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($product['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></span>
					</span>
				</figure>
				<div class="block-caption1">
					<div class="price">
						<span class="sell-price">₵ <?php echo($product['price']); ?></span>
						<span class="actual-price"><?php if($product['old_price'] > 0) { echo('₵ '.$product['old_price']); } ?></span>
					</div>
					<div class="clear"></div>
		<a href="product-details/<?php echo($product['url_title']); ?>">
		<h4><?php echo(product_name_stock($product['title'], $product['in_stock'])); ?>
		</h4>
		</a>
<input type="number" min="0" name="quantity" id="quantity<?php echo($product["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6 hidden" value="1" />
<input type="button" name="add_to_cart" id="<?php echo($product["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6 hidden" value="Add to Cart" />
<input type="hidden" name="hidden_name" id="name<?php echo($product["id"]); ?>" value="<?php echo($product["title"]); ?>" />
<input type="hidden" name="hidden_price" id="price<?php echo($product["id"]); ?>" value="<?php echo($product["price"]); ?>" />
				</div>
			</div>
				</div>


			<?php 
			if($x % 2 == 0) { ?>
				<div class='clearfix col-xs-12 visible-xs-block'></div>
			<?php }	
			if($x % 3 == 0) { ?>
				<div class='clearfix col-sm-12 visible-sm-block'></div>
			<?php }	
		} 
		 ?>
			<div class="col-md-12 col-sm-12 col-xs-12">   
				<a href="products" class="btn rd-stroke-btn center-block">
				<span class="glyphicon glyphicon-shopping-cart"></span> All Products
				</a>                   
			</div> 
		<?php } ?>
    		</div>
    	</div>
    </section>                 
              
               
    <section class="blog">
    	<div class="container">
    		<div class="row">
    			<div class="dart-headingstyle-one dart-mb-60 text-center">  <!--Style 1-->
					<h2 class="dart-heading">Latest Blog</h2>
		    		<img src="images/Icon-sep.png" alt="img" />
			    </div>    			
    		</div>
    		
    		<div class="row no-gutter">
	<?php 
			$q= "SELECT title, url_title, date, image, keywords FROM news ORDER BY id DESC LIMIT 3";
			$results = query($q);
			if(mysqli_num_rows($results) > 0){ $x= 0;
				while($rec_news = mysqli_fetch_assoc($results)) { $x++; 
					if($x != 2) {
				?>
					
    			<div class="col-md-4 col-sm-4">
    				<div class="blog-wapper">
    					<div class="blog-img ImageWrapper">
							<a href="blog-details/<?php echo($rec_news['url_title']) ?>" class="bubble-top">
								<img src="uploads/images/news/thumb/mini_<?php echo($rec_news['image']); ?>" alt="<?php echo($rec_news['title']); ?>" width='100%'/>
								<div class="PStyleHe"></div>
   							</a>
    					</div>
    					<div class="blog-content">
    						<h4 class="blog-title"><a href="blog-details/<?php echo($rec_news['url_title']) ?>"><?php echo($rec_news['title']); ?></a></h4>
    						<p class="post-date"><?php echo(date('M jS, Y', strtotime($rec_news['date']))); ?></p>
    						<p class="post-content"><?php echo(end_text($rec_news['keywords'], '200')); ?></p>
    						<a href="blog-details/<?php echo($rec_news['url_title']) ?>">Read More</a>
    					</div>
    				</div>
    			</div>
							 <?php } else { ?> 
							 
    			<div class="col-md-4 col-sm-4" style='margin-bottom: 10px'>
    				<div class="blog-wapper">
    					<div class="blog-content dart-mb-0">
    						<h4 class="blog-title"><a href="blog-details/<?php echo($rec_news['url_title']) ?>"><?php echo($rec_news['title']); ?></a></h4>
    						<p class="post-date"><?php echo(date('M jS, Y', strtotime($rec_news['date']))); ?></p>
    						<p class="post-content"><?php echo(end_text($rec_news['keywords'], '200')); ?></p>
    						<a href="blog-details/<?php echo($rec_news['url_title']) ?>">Read More</a>
    					</div>    					
    					<div class="blog-img ImageWrapper">
							<a href="blog-details/<?php echo($rec_news['url_title']) ?>" class="bubble-bottom">
								<img src="uploads/images/news/thumb/mini_<?php echo($rec_news['image']); ?>" alt="<?php echo($rec_news['title']); ?>"/>
								<div class="PStyleHe"></div>
   							</a>
    					</div>
    				</div>
    			</div>
							 
							 <?php
							} } } else { ?> 
					<div class="post">
						<h4 style='text-align:center'><a>No Post Available</a></h4>
					</div>	
		<?php } ?>

	  </div>
    		</div>    		
    	</div>
    </section>            

	<div class='container'>
	<div class="row no-gutter">
	<div class="col-xs-12 center-button" style='text-align:center'>
	<a class="typeform-share button inline-block" href="https://xela2.typeform.com/to/RyofoU" data-mode="drawer_left" style="display:inline-block;text-decoration:none;background-color:#267DDD;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:50px;text-align:center;height:50px;padding:0px 33px;border-radius:25px;max-width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;" target="_blank">Need another product? </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
	</div>
	</div>
	</div>

    <section class="newsletter-bg">
    	<div class="container">
    		<div class="row">
    			<div class="dart-headingstyle-one dart-mb-20 text-center">  <!--Style 1-->
					<h2 class="dart-heading">Newsletter</h2>
			    </div> 
    		</div>
    		<div class="row">
    			<div class="col-md-12">
    				<form class="form-inline">
						<div class="newsletter">
						  <div class="form-group">
							<input type="email" class="form-control" id="subscribe" placeholder="Email" required>
						  </div>
						  <button type="submit" id="submit_subscribe" class="btn btn-default">Subcribe<i class="fa fa-envelope-o"></i></button><br>
							<div class="btn hidden" id="email_response" style="border-radius: 0; margin-top: 4%"></div>
						</div>
					</form>
    			</div>
    		</div>
    	</div>
    </section>             
				  
	<?php include '../webparts/footer.php' ?>
                                                 
                                                   
        
	<!-- jQuery -->
    <!--<script src="vendor/masterslider/jquery.min.js"></script>-->
    <script src="vendor/masterslider/jquery.easing.min.js"></script>
     
    <!-- Master Slider -->
    <script src="vendor/masterslider/masterslider.min.js"></script> 
	
	<!-- owl Slider JavaScript -->
    <script src="vendor/owlcarousel/dist/owl.carousel.min.js"></script>
    
    <!-- Counter required files -->
	<script type="text/javascript" src="js/dscountdown.min.js"></script>
    
    <!-- template JavaScript -->
    <script src="js/template.js"></script>
    
    <script>

//Coundown
<?php if (setting('banner countdown enable') == 1 && setting('banner countdown end date') != '') { ?>
	$('.demo2').dsCountDown({
				endDate: new Date("<?php echo(setting('banner countdown end date')); ?>"),
				theme: 'black'
	});	

<?php } ?>

	$('#submit_subscribe').click(function(e){
		e.preventDefault();

		var _email = $('#subscribe').val();
		
		
		if(_email.length > 0) {
			
		//post data
		//	console.log('text');
			$('#subscribe').css('border', '1px solid #e1e1e1');
			
			$.ajax({
			   url:"../ajax/email_insert.php",
			   method: "POST",
			   dataType: "html",
			   data:{ 
				 task: "email_insert",
				 email: _email,
			   },
				beforeSend: function() {
						$('#email_response').removeClass('hidden').addClass('btn-primary');
						$("#email_response").text('Processing comment');
				},
			   success:function(data){
				   if(data == 'success'){
				   	$('#email_response').text('Email Successfully Sent').removeClass('btn-danger').addClass('btn-success');;
					// remove text from textarea
					$('#subscribe').val('');
		
				   } else {
				    $('#email_response').removeClass('hidden').addClass('btn-danger');
				   	$('#email_response').html(data);
				   }

			   },
			   fail:function(data){

			   }
		   });
			
			
		} else {
			//text area empty
			alert('Please Enter a valid Email address');
			
		}
		
		
	});
	
		/*---------------Login Scripts -----------------------*/
	$('#submit-login').click(function(e){
		    e.preventDefault();
			
			var username = $("#username").val();
			var password = $("#password").val();
			
			if($('#remember').is(':checked'))
				var remember = 1;
			else
				var remember = 0;	
	
			if(password == '' || username == ''){
				
				alert("All Fields are required");
				
			} else {
				
				$.ajax({
					   url:"ajax/ajax_register.php",
					   method: "POST",
					   dataType: "html",
					   data:{
						   task: "login",
						   username: username,
						   password: password,
						   remember: remember,
					   },
						beforeSend: function() {
							$("#login_body").addClass("hidden");
							$("#login_footer").addClass('hidden');
							$("#login_process").removeClass('hidden');
							$("#login_response").addClass('hidden');
						},
					   success:function(data){
						   if(data == 'success'){
							   $("#login_response").removeClass('hidden');
							   $("#login_response").html('<div class="alert label-success alert-dismissible" role="alert">'+username.toUpperCase()+' Successfully Logged In.. Redirecting</div>');
							   
								$('#login_body').removeClass('hidden');
								$("#login_footer").removeClass('hidden');
								$("#login_process").addClass('hidden');
							   
								$("#username").val('');
								$("#password").val('');
	
								setTimeout(() => {
									location.reload();
								}, 1500);
						   } else {
								$("#login_response").removeClass('hidden');
								$("#login_response").html('<div class="alert label-danger alert-dismissible" role="alert">'+data+'</div>');
							   
							   $('#login_body').removeClass('hidden');
							   $("#login_footer").removeClass('hidden');
							   $("#login_process").addClass('hidden');
						   }
					   },
					   fail:function(data){
						   
					   }
				   });
			
			}
		});
	</script>

  </body>
</html>