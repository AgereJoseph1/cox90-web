	<!-- loader start -->

	<div class="loader">
		<div id="awsload-pageloading">
			<div class="awsload-wrap">
				<ul class="awsload-divi">
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- loader end -->
    
    <!-- Start top area -->
	<div class="top-container">
		<div class="container-fluid">
			<div class="row">
				<div class="top-column-left">
					<ul class="contact-line">
						<li><i class="fa fa-envelope"></i> <?php echo(setting('Email')); ?></li>
						<li><i class="fa fa-phone"></i> <?php echo(setting('Contact')); ?></li>
					</ul>
				</div>
				<div class="top-column-right">
					<div class="top-social-network">
						<a href="https://web.facebook.com/cox90gh/"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/cox90gh"><i class="fa fa-twitter"></i></a>
						<a href="https://www.instagram.com/cox90gh/"><i class="fa fa-instagram"></i></a>
					</div>
					<ul class="register">
<?php
if (logged_in()) :
    $result  = getCustomer();
    $user = mysqli_fetch_array($result); ?>

						<li><a ><?php echo(strtoupper($user['fullname'])); ?></a></li>
						<li><a href='logout'>Logout</a></li>
						<li><a href="checkout"> Checkout</a></li>
   <?php else: ?>
						<li><a href="login">Login </a></li>
						<li><a href="register"> Register</a></li>
						<li><a href="checkout"> Checkout</a></li>
                                    
<?php endif
?>
                </ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End top area -->
	<div class="clearfix"></div>

    
	<nav class="navbar navbar-default navbar-sticky awesomenav">
   <!-- Start Top Search -->
    <div class="top-search">
        <div class="container-fluid">
            <form class="form" role="search" id="searchform" method="get" action="products">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control"value="" name="search" type="search" placeholder="Search product here..." autofocus>
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                <!-- <button class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></button> -->
            </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->
    <div class="container-fluid">  
        
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul>
               	<li class="search singleItem"><a href="#"><i class="fa fa-search fa-2x" style="margin-top: -5px"></i></a></li>
    <?php if(logged_in()) { ?>
                <li class="singleItem"><a href="wishlist">
                    <i class="fa fa-heart"></i>
                    <span class="badge total-wish">
                    <?php if(isset($user)) {echo  wishlist_count($user['id']);} else echo(0); ?>
                    </span>
                </a>
                </li>
    <?php } else { ?> 
                <li class="singleItem"><a style='cursor: pointer'  onclick='notify("<b>Wishlist</b><br>Please Login to access your wishlist")'>
                    <i class="fa fa-heart"></i>
                    <span class="badge">
                    0
                    </span>
                </a>
                </li>
    <?php } ?>
    <?php if($sub_site_name != 'Checkout' && $sub_site_name != 'Cart') { ?>
                <li class="dropdown singleItem2">
                    <a style='cursor: pointer' class="dropdown-toggle" data-toggle="dropdown" >
                        <i class="fa fa-shopping-bag"></i>
                        <span class="badge main_badge">0 </span>
                    </a>
                    <ul class="dropdown-menu cart-list" id='cart_details'>

                    </ul>
                </li>
                <li><span class='total_price'>$0.00</span></li>
  <?php } ?>
                <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>        
        <!-- End Atribute Navigation -->


        <!-- Start Header Navigation -->
        <div class="navbar-header" style="padding-bottom: 2%">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <span style="display: inline-block">
            <a class="navbar-brand" href="./home"><img style='' height='45px' src="uploads/<?php echo single_image('logo'); ?>" class="logo" alt="<?php echo($site_name); ?>"></a>
            </span>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                <li class=" <?php if($sub_site_name === 'Home') echo('active'); ?> "><a href="./home">Home</a></li> 
                <li class="dropdown megamenu-fw <?php if($sub_site_name === 'products' || $sub_site_name1 == 'Product details') echo('active'); ?> ">
                    <a href="./products" class="dropdown-toggle" data-toggle="dropdown">Products</a>
                    <ul class="dropdown-menu megamenu-content" role="menu">
                        <li>
                            <div class="row">				
                <?php 
                    $categories = get_shop_categories();
                    if(mysqli_num_rows($categories) > 0) {
                        while($category = mysqli_fetch_assoc($categories)) { ?> 

                                <?php 
                                    $subcategories = get_category_subcategories($category['id']);
                                    if(mysqli_num_rows($subcategories) > 0) { ?>

                                <div class="col-menu col-md-3" style='padding-bottom: 15px'>
                                    <h6 class="title"><?php echo(ucfirst($category['title'])) ?></h6>
                                    <div class="content">
                                        <ul class="menu-col">

                                    <?php

                                    while($subcategory = mysqli_fetch_assoc($subcategories)) { ?> 

                                            <li><a href="products/<?php echo($subcategory['url_title']) ?>"><?php echo(ucfirst($subcategory['title'])); ?></a></li>

                                    <?php } ?>
                                    
                                        </ul>
                                    </div>
                                </div>
                                    <?php } ?>

                            <?php  } }  ?>
                                    
                            <div class='col-md-12 col-xs-12 col-lg-12'>
                            <a href="products" class="btn rd-stroke-btn border_1px dart-btn-xs  center-block">All Products</a>
                            </div>	
                                    <!-- end col-3 -->
                            </div><!-- end row -->
                        </li>
                    </ul>
                </li>

                <li class="dropdown <?php if($sub_site_name === 'blog' || $sub_site_name === 'blog-details') echo('active'); ?> ">
                    <a href="./blog" >Blog</a>
                </li>

                <li class=" <?php if($sub_site_name === 'contact') echo('active'); ?> "><a href="./contact">CONTACT</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div> 
    
    <!-- Start Side Menu -->
	<div class="side">
		<a href="#" class="close-side"><i class="fa fa-times"></i></a>
		<div class="widget">
			<h6 class="title">Quick Links</h6>
			<ul class="link">
				<li style="padding-bottom: 3px"><a class="log-in-popup" href="#log-in-popup">Login | Register</a></li>
				<li style="padding-bottom: 3px"><a href="./checkout">Checkout</a></li>
				<li style="padding-bottom: 3px"><a href="./cart">Cart</a></li>
                <?php if(logged_in()) { ?>
				<li style="padding-bottom: 3px"><a href="./wishlist">Wishlist</a></li>	
                <?php } else { ?> 
				<li style="padding-bottom: 3px"><a style='cursor: pointer'  onclick='notify("<b>Wishlist</b><br>Please Login to access your wishlist")'>Wishlist</a></li>	
                <?php } ?>
                            <li><a href="./products">All Products</a></li>	
				<li style="padding-bottom: 3px"><a href="./privacy-policy">Privacy Policy</a></li>
				<li style="padding-bottom: 3px"><a href="./about-us">About <?php echo($site_name); ?></a></li>
			</ul>
		</div>
	</div>
	<!-- End Side Menu -->
	
	</nav>
	
	
	


<div class="cd-popup" role="alert">
    <div class="cd-popup-container">
        <p id="pop-up-text"></p>
        <ul class="cd-buttons" style="padding: 0">
            <li><a class="closemodal" style="cursor: pointer; color: white">CONTINUE SHOPING </a></li>
            <li><a href="cart">VIEW CART & CHECKOUT</a></li>
        </ul>
        <a class="cd-popup-close img-replace">Close</a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<div class="cd-popup2" role="alert">
    <div class="cd-popup-container2">
        <p id="pop-up-text2"></p>
        <ul class="cd-buttons2 login-buttons d-none">
            <li><a href="login">LOGIN </a></li>
            <li><a href="register">REGISTER</a></li>
        </ul>
        <ul class="cd-buttons2 wishlist-buttons d-none">
            <li><a class="closemodal" style="cursor: pointer; color: white">CONTINUE SHOPING </a></li>
            <li><a href="wishlist">VIEW WISHLIST</a></li>
        </ul>
        <a class="cd-popup-close2 img-replace">Close</a>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->
