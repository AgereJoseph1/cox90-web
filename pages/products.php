<?php

require_once("functions/init.php");
$sub_site_name = "products";

$cat_query1 = "SELECT brand, COUNT(brand) AS count FROM tbl_products WHERE brand != 0 AND available = 1 GROUP BY brand ORDER BY count(brand) DESC LIMIT 7";
$brands = query($cat_query1);

$cat_id_sent = '';

$cat_query2 = "SELECT color, COUNT(color) AS count FROM tbl_products WHERE color != '' AND available = 1 GROUP BY color ORDER BY count(color) DESC LIMIT 5";
$colors = query($cat_query2);

if(isset($path['call_parts'][1]) && $path['call_parts'][1] !== '' ) {

	$cat_url = mysqli_real_escape_string($con, strip_tags($path['call_parts'][1]));

	$q = "SELECT id FROM products_subcategories WHERE url_title = '$cat_url' ";
	$r = query($q);
	

	if(mysqli_num_rows($r) == 0) {header("Location: ../products"); }
	else { 
		$result = mysqli_fetch_assoc($r);
		$cat_id_sent = $result['id'];
	 }
} 

$search = null;

if(isset($_GET['search'])) {
    $search = escape(htmlentities($_GET['search']));
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

	 <style>
	 .card {
		/* Add shadows to create the "card" effect */
		box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);
		transition: 0.3s;
		padding-bottom: 5px;
	}

	/* On mouse-over, add a deeper shadow */
	.card:hover {
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
	}

	 </style>
  </head>

  <body id="home">
  	
<?php 

if (isset($_COOKIE['shop_message']) && $_COOKIE['shop_message'] == 1) {

	setcookie('shop_message', 2, time() - 500);
    unset($_COOKIE['shop_message']);

    echo "
		<div style='position: absolute; right: 0;top:40%; z-index: 100000000;' class='animated bounceInRight  alert alert-info alert-dismissible' role='alert'>
		<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span>
		</button>Cart is empty, Add Products to prooceed to checkout.</div>
		";


}

?>
<?php include('webparts/header.php') ?>
    <!--Page Title-->
    
	<div class="page_title_ctn" id='move_to'> 
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
                    <div class="row reorder-xs"> 
                        <div class="col-sm-3 col-md-4 col-lg-3 col-xs-12">
                            <div class="shop-sidebar mt-20">
                                <aside class="widget">
                                    <h2 class="widget-title">Categories</h2>
                                    <div class="panel-group shop-links-widget" id="accordion" role="tablist" aria-multiselectable="true">

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" onClick="load_product()">All Products</a>
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

                                            <li><a style="cursor: pointer" id="<?php echo($subcategory['id']) ?>" class="cat_products_sel"><?php echo(ucfirst($subcategory['title'])); ?></a></li>

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
                                    <h2 class="widget-title">Popular Brands</h2>
                                    <ul class="list-unstyled">
							<?php 
							while ($brand = mysqli_fetch_assoc($brands)) {
								$numb =get_title_from_id($brand['brand'], 'products_brands') . ' <span class="badge">'. $brand['count'] . '</span><br>'; ?>
								
								<li style='cursor: pointer'><a data-brand='<?php echo($brand['brand']) ?>' id="brand" class="cat_products_sel"><?php echo($numb);  ?></a>
								</li>
								
							<?php } ?>

                                    </ul>
                                </aside>
                                <aside class="widget">
                                    <h2 class="widget-title">Colors</h2>
                                    <ul class="list-unstyled">
							<?php 
							while ($color = mysqli_fetch_assoc($colors)) {
								$numb = $color['color'] . ' <span class="badge">'. $color['count'] . '</span><br>'; ?>
								
								<li style='cursor: pointer'><a data-color='<?php echo($color['color']) ?>' id="color" class="cat_products_sel"><?php echo($numb);  ?></a>
								</li>
								
							<?php } ?>

                                    </ul>
                                </aside>
                                <!-- <aside class="widget widget_size">
                                    <h2 class="widget-title">Price</h2>
                                    <div class="widget-content">
                                        <div id="slider-range" class="slider-range"></div>
                                        <label  for="amount">Price</label> <input type="text" id="amount" readonly />  
                                        <span><a class="btn filter-btn btn-default" href="#">Filter</a></span>
                                    </div> 
                                </aside> -->
                            </div>
                        </div>

				<div class="col-sm-9 col-md-8 col-lg-9 border-lft col-xs-12"  id="display_item" style="min-height:  500px">

				</div>
			</div>

                </div>
            </div>
        </section>             

    <input value="<?php echo($search); ?>" type="hidden" id="search_word" name="search_word">
	<input type="hidden" value="<?php echo($cat_id_sent) ?>" id="searched_cat">

    <?php include 'webparts/footer.php' ?>           
    
    <!-- template JavaScript -->
    <!--<script src="js/template.js"></script>-->

<script>

//$(document).ready(function() {
	//////////*Fetch Products on page load start*/

<?php if($cat_id_sent != '' && $search === null) { ?>
	loadData_cat();
<?php } elseif($cat_id_sent == '' && $search === null) { ?>
	load_product();
<?php } elseif($search !== null) { ?>
    loadData_search();
<?php } ?>

	/*Fetch Products on page load end*/
//});

//$(document).ready(function() {
                //});

                //jquery for sending products request to database
function load_product(page_num) {
	$.ajax ({
		url:'ajax/shop_fetch_item.php?pn='+page_num,
		method:'POST',
		dataType:'html',
		data: {
		},
		beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
				if($.isNumeric(page_num)){
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 300);
				}

				},
	   success: function(responseData) {
			$('#display_item').html(responseData);
		}
	});
			}
			
	function loadData_cat(page_num) {
		var type = $('#searched_cat').data('type') || 0;

		$.ajax ({ 
			url:'ajax/shop_fetch_item_cat.php?pn='+page_num,
			method:'POST',
			dataType:'html',
			data: {
				category: $('#searched_cat').val(),
				type: type,
			},
			beforeSend: function() {
				$('#display_item').html('<div class="loader2"></div>');
				if($.isNumeric(page_num)){
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 300);
				}
			},
			success: function(responseData) {
				$('#display_item').html(responseData);
			}
		});
	}
	
    function loadData_search(page_num) {
        $.ajax ({
			url:'ajax/get_search.php?pn='+page_num,
            method:'POST',
			dataType:'html',
			data: {
				search: $('#search_word').val()
			},
			beforeSend: function() {
		        $('#display_item').html('<div class="loader2"></div>');
                    $('html, body').animate({
                        scrollTop: $('#move_to').offset().top
                    }, 500);
				
					},
           success: function(data) {
                    $('#display_item').html(data);
                    //$('#forloader').remove('.loader-wrapper2')
                    $('html, body').animate({
                        scrollTop: $('#move_to').offset().top
                    }, 500);
            }
		});
				}
					
//...................category products selection/////////////
	$(".cat_products_sel").on("click", function() {

		var selected = $(this).attr("id");
		var type = 'empty';
		if(selected == 'brand') {
			selected = $(this).data('brand');
			type = 'brand';
			//alert(selected);
		} else if(selected == 'color') {
			selected = $(this).data('color');
			type = 'color';
			//alert(selected);
		} else {
			//alert(selected);
		}
		
		$.ajax ({ 
			url:'ajax/shop_fetch_item_cat.php',
			method:'POST',
			dataType:'html',
			data: {
				category: selected,
				type: type,
			},
			beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 300);
			},
			success: function(responseData){
				$('#display_item').html(responseData);
			}
		});
	});
	
	
//...................category products selection end/////////////
	
$('body').on('change','#toolber-sorter', function() {
		var value = $(this).val();
		var type = $('#searched_cat').data('type') || 0;
		//alert(value);
	//=====================lowest to highest first call ==================//
		if(value == 'Lowest' || value =='Highest') {
			
			//alert($('#searched_cat').val());
			
			if(value == 'Lowest') {
				var sort = 'ASC';
			} else if(value == 'Highest') {
				var sort = 'DESC';
			}
			
			//alert(sort);
			
			$.ajax ({ 
				url:'ajax/get_products_price.php',
				method:'POST',
				dataType:'html',
				data: {
					category: $('#searched_cat').val(),
					sort_by: sort,
					type: type
				},
				beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
				success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
			});
			
		}
		
		
		/////------------------ Get product by name first call ----------------/////
		if(value == 'ProductA' || value =='ProductZ') {
			//alert('yes');
			if(value == 'ProductA') {
				var sort = 'ASC';
			} else if(value == 'ProductZ') {
				var sort = 'DESC';
			}
			
			//alert(sort);
			
			$.ajax ({ 
				url:'ajax/get_products_name.php',
				method:'POST',
				dataType:'html',
				data: {
					category: $('#searched_cat').val(),
					sort_by: sort,
					type: type
				},
				beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
				success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
			});
			
		}
	});
//===================== FILTRATION END ==================//
	

/////------------------ Get product by price pagination call start----------------/////
	function loadData_sort(page_num) {
		var value = $('#filter_type').val();
		var type = $('#searched_cat').data('type') || 0;

		if(value == 'Lowest') {
				var sort = 'ASC';
			} else if(value == 'Highest') {
				var sort = 'DESC';
			}
		
	   $.ajax ({ 
			url:'ajax/get_products_price.php?pn='+page_num,
			 method:'POST',
			dataType:'html',
			data: {
				category: $('#searched_cat').val(),
				sort_by: sort,
				type: type
			},
		   beforeSend: function() {
				$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
		  success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
	   });
	}
/////------------------ Get product by price pagination call end ----------------/////


/////------------------ Get product by name pagination call start----------------/////
	function loadData_name(page_num) {
		var value = $('#filter_type').val();
		var type = $('#searched_cat').data('type') || 0;

		if(value == 'ProductA') {
				var sort = 'ASC';
			} else if(value == 'ProductZ') {
				var sort = 'DESC';
			}
		
	   $.ajax ({ 
			url:'ajax/get_products_name.php?pn='+page_num,
			 method:'POST',
			dataType:'html',
			data: {
				category: $('#searched_cat').val(),
				sort_by: sort,
				type: type
			},
		   beforeSend: function() {
				$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
		  success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
	   });
	}
/////------------------ Get product by name pagination call end----------------/////

</script>

  </body>
</html>
