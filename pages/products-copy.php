<?php

require_once("functions/init.php");
$sub_site_name = "products";

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
          <h2>Shop</h2>
          
          	<ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active"><span>Shop</span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!--Shoping with Sidebar Section-->
    
		<section class="sidebar-shop shop-pages dart-pt-20">
            <div class="container">
                <div class="content-wrap ">
                    <div class="row"> 
                        <div class="col-sm-3 col-md-4 col-lg-3">
                            <div class="shop-sidebar mt-20">
                                <aside class="widget">
                                    <h2 class="widget-title">Categories</h2>
                                    <div class="panel-group shop-links-widget" id="accordion" role="tablist" aria-multiselectable="true">

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse">All Products</a>
                                                </h4>
                                            </div>
                                        </div>

									<?php 
                    $categories = get_shop_categories();
                    if(mysqli_num_rows($categories) > 0) {
                        while($category = mysqli_fetch_assoc($categories)) { ?> 

                                <?php 
                                    $subcategories = get_category_subcategories($category['id']);
                                    if(mysqli_num_rows($subcategories) > 0) { ?>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="<?php echo($category['url_title']); ?>">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo($category['url_title']); ?>" aria-expanded="false" aria-controls="collapseOne"><?php echo(ucfirst($category['title'])); ?><span class="caret"></span></a>
										</h4>
									</div>
                                            <div id="collapse<?php echo($category['url_title']); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo($category['url_title']); ?>">
                                                <div class="panel-body">
                                                    <ul class="list-unstyled">

                                    <?php

                                    while($subcategory = mysqli_fetch_assoc($subcategories)) { ?> 

                                            <li><a href="products/<?php echo($subcategory['url_title']) ?>"><?php echo(ucfirst($subcategory['title'])); ?></a></li>

                                    <?php } ?>

                                                    </ul>
                                                </div>
                                            </div>
									</div>

                                    <?php } ?>


                            <?php  } }  ?>
 
                                    </div>
                                </aside>
                                <aside class="widget">
                                    <h2 class="widget-title">Brands</h2>
                                    <ul class="list-unstyled">
                                        <li> <a href="#">Black</a> </li>
                                        <li> <a href="#">Blue</a> </li>
                                        <li> <a href="#">Yellow</a> </li>
                                        <li> <a href="#">Grey</a> </li>
                                        <li> <a href="#">Anthracite</a> </li>
                                        <li> <a href="#">White</a> </li>                                                    
                                    </ul>
                                </aside>
                                <aside class="widget">
                                    <h2 class="widget-title">Colors</h2>
                                    <ul class="list-unstyled">
                                        <li> <a href="#">Black</a> </li>
                                        <li> <a href="#">Blue</a> </li>
                                        <li> <a href="#">Yellow</a> </li>
                                        <li> <a href="#">Grey</a> </li>
                                        <li> <a href="#">Anthracite</a> </li>
                                        <li> <a href="#">White</a> </li>                                                    
                                    </ul>
                                </aside>
                                <aside class="widget widget_size">
                                    <h2 class="widget-title">Price</h2>
                                    <div class="widget-content">
                                        <div id="slider-range" class="slider-range"></div>
                                        <label  for="amount">Price</label> <input type="text" id="amount" readonly />  
                                        <span><a class="btn filter-btn btn-default" href="#">Filter</a></span>
                                    </div> 
                                </aside>
                            </div>
                        </div>

                        <div class="col-sm-9 col-md-8 col-lg-9 border-lft">
                    <div class="shorter">
                        <div class="row">                        
                            <div class="col-sm-6 col-xs-6">
                                <span class="showing-result">Showing 1–12 of 30 products</span>
                            </div>
                            <div class="col-sm-6 col-xs-6 text-right">
                                <div class="short-by">                                     
                                    <span>short by</span>
                                    <select  class="selectpicker form-control" >
                                        <option>Newnest</option>
                                        <option>Type 1</option>
                                        <option>Type 2</option>
                                        <option>Type 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="product-wrap">
                                <div class="row">   
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-1.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-2.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-3.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-4.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-5.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-6.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-7.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-8.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-9.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-10.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-11.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="wa-theme-design-block">
											<figure class="dark-theme">
												<img src="images/product/product-12.jpg" alt="Product">
												<span class="block-sticker-tag1">
												<span class="off_tag"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
												</span>	
												<span class="block-sticker-tag2">									   
												<span class="off_tag1"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
												</span>
												<span class="block-sticker-tag3">
												<span class="off_tag2 btn-action btn-quickview" data-toggle="modal" data-target="#quickView"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></span>
												</span>
											</figure>
											<div class="block-caption1">
												<div class="price">
													<span class="sell-price">$120.00</span>
													<span class="actual-price">$170.00</span>
												</div>
												<div class="clear"></div>
												<h4>Chevron pique shift</h4>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrap text-right">
                                <ul>
                                    <li class="disabled"><a href="#"><span class="fa fa-long-arrow-left"></span></a></li>
                                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>                           
                                    <li class="next"> <a href="#"> <span class="fa fa-long-arrow-right"></span> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>             
                   
	<?php include 'webparts/footer.php' ?>                                    
                                                                                   
                                                                                                                         
        
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    	
    <!-- Nav JavaScript -->
    <script src="js/awesomenav.js"></script>    
	    
    <!-- custom JavaScript -->
    <script src="js/custom.js"></script> 
    
    <!-- template JavaScript -->
    <script src="js/template.js"></script>


  </body>
</html>
