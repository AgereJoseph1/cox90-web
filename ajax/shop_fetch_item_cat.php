<?php

include('../functions/db.php');
include('../functions/functions.php');

                $category = escape($_POST['category']);
                if(isset($_POST['type']) && $_POST['type'] == 'brand') {
                    $brand = (int)$_POST['category'];
                    $db_query = "SELECT * FROM tbl_products WHERE brand='$category' ORDER BY id DESC";

                } elseif(isset($_POST['type']) && $_POST['type'] == 'color') {

                    $db_query = "SELECT * FROM tbl_products WHERE color='$category' ORDER BY id DESC";

                } else {

                    $db_query = "SELECT * FROM tbl_products WHERE category='$category' ORDER BY id DESC";

                }
                
				$pages_number_result = mysqli_query($con, $db_query);
				$rows = mysqli_num_rows($pages_number_result);

// how many records to show in each list
$page_rows = 12;
$last = ceil($rows / $page_rows);

if($last <1) {
	$last = 1;
}
$loadData = 1;

if(isset($_REQUEST['pn'])) {
	$loadData = preg_replace('#(^0-9)#', '', $_REQUEST['pn']);
}

if ($loadData < 1) {
	$loadData = 1;
} elseif ($loadData > $last) {
	$loadData = $last;
}

$limit = 'LIMIT ' .($loadData - 1) * $page_rows .',' .$page_rows;
$sql = $db_query." $limit";
$resResult = mysqli_query($con, $sql);


//count page num of total pages 

$textline2 = "Showing $loadData of $last products";
$paginationlinks = '';

// if there is more than 1 page worth of results 
if($last != 1) {
	if($loadData > 1) {
		$previous = $loadData - 1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="loadData_cat('.$previous.')"><i class="fa fa-long-arrow-left"></i></a></li>';
		
		//render clikable number links that should appear on the left of the target page number 
		for($i = $loadData-4; $i < $loadData; $i++) {
			if($i > 0) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="loadData_cat('.$i.')">'.$i.'</a></li>';
			}
		}
	}
	
	$paginationlinks .= '<li><a style="background-color: #73b21a; color: #fff;" >'.$loadData.'</a></li>';
	for($i = $loadData+1; $i <= $last; $i++) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="loadData_cat('.$i.')">'.$i.'</a></li>';
		if($i >= $loadData-4) {
			break;
		}
	}
	
	if($loadData != $last) {
		$next = $loadData +1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="loadData_cat('.$next.')"><i class="fa fa-long-arrow-right"></i></a></li>';
	}
}


$x=0;	

if(isset($_POST['type']) && $_POST['type'] == 'brand') {
    $ucategory = strtoupper(get_title_from_id($brand, 'products_brands') );
    echo("<h3 style='color: #e64567'>Brand - $ucategory </h3>");
} elseif(isset($_POST['type']) && $_POST['type'] == 'color') {
    echo("<h3 style='color: #e64567'>Color - ".strtoupper($category)." </h3>");
} else {
    $ucategory = strtoupper(product_cat_title($category));
    echo("<h3 style='color: #e64567'> $ucategory </h3>");
} ?>
        
<div class="shorter">
    <div class="row">                        
        <div class="col-sm-6 col-xs-12">
            <span class="showing-result"><?php echo($textline2); ?> </span>
        </div>
        <div class="col-sm-6 col-xs-12 text-right">
            <div class="short-by">                                     
                <span>short by</span>
                <select id="toolber-sorter" class="selectpicker form-control" data-role="sorter">
                    <option selected="selected" value="">Filter</option>
                    <option value="Lowest">Price - Lowest to Highest</option>
                    <option value="Highest">Price - Highest to Lowest</option>
                    <option value="ProductA">Product Name: A to Z</option>
                    <option value="ProductZ">Product Name: Z to A</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="product-wrap">
        <div class="row">

<?php	

        while ($rsResult = mysqli_fetch_assoc($resResult)) { $x++ ?>
					
                    <div class="col-sm-4 col-md-4 col-xs-6">
                        <div class="wa-theme-design-block card">
                            <figure>
                                <a href="product-details/<?php echo($rsResult['url_title']); ?>">
                                <figure class="dark-theme">
                                <img class="<?php if($rsResult['in_stock'] != 1) { echo("imageStockOut"); } ?>" src="uploads/images/<?php echo('shop/thumb/product_'.$rsResult['image']); ?>" alt="<?php echo($rsResult['title'].' '.$site_name); ?>">
                                </figure>
                                </a>
								<?php if($rsResult['in_stock'] == 1) { ?>
								<span class="block-sticker-tag1">
								<span class="off_tag add_to_cart" id="<?php echo($rsResult["id"]); ?>"><strong><i class="fa fa-shopping-basket" aria-hidden="true"></i></strong></span>
								</span>	
								<?php } ?>
                                <span class="block-sticker-tag2">									   
                                <span class=" off_tag1 wishlist" id="<?php echo($rsResult["id"]); ?>"><strong><i class="fa fa-heart-o" aria-hidden="true"></i></strong></span>
                                </span>
                                <span class="block-sticker-tag3">
                                <span class="off_tag2 btn-action btn-quickview"><a style='color: white' href="product-details/<?php echo($rsResult['url_title']); ?>"><a style='color: white' href="product-details/<?php echo($rsResult['url_title']); ?>"><strong><i class="fa fa-eye" aria-hidden="true"></i></strong></a></a></span>
                                </span>
                            </figure>
                            <div class="block-caption1">
                                <div class="price">
                                    <span class="sell-price">₵ <?php echo($rsResult['price']); ?></span>
                                    <span class="actual-price"><?php if($rsResult['old_price'] > 0) { echo('₵ '.$rsResult['old_price']); } ?></span>
                                </div>
                                <div class="clear"></div>
                                <h4><a href="product-details/<?php echo($rsResult["url_title"]); ?>"><?php echo(product_name_stock($rsResult['title'], $rsResult['in_stock'])); ?></a></h4>
                                <div class=' col-lg-12 col-sm-12 '>
                                <div class="row">
                                </div>
			 <input type="number" min="0" name="quantity" id="quantity<?php echo($rsResult["id"]); ?>" class="dart-form-control col-lg-6 col-sm-6" value="1" />
			<?php if($rsResult['in_stock'] == 1) { ?>
             <input type="button" name="add_to_cart" id="<?php echo($rsResult["id"]); ?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart col-lg-6 col-sm-6" value="Add to Cart" />
			<?php } ?>	
                                </div>
             <input type="hidden" name="hidden_name" id="name<?php echo($rsResult["id"]); ?>" value="<?php echo($rsResult["title"]); ?>" />
             <input type="hidden" name="hidden_price" id="price<?php echo($rsResult["id"]); ?>" value="<?php echo($rsResult["price"]); ?>" />
                            </div>
                        </div>
                    </div>
                            
                    <!-- /article -->
        <?php
            if(isset($_POST['type']) && ($_POST['type'] == 'brand' || $_POST['type'] == 'color')) { ?>
                <input type="hidden" data-type="<?php echo($_POST['type']) ?>" value="<?php echo($category) ?>" id="searched_cat">
            <?php } else { ?>
                <input type="hidden" value="<?php echo($category) ?>" id="searched_cat">
            <?php } ?>

				
        <?php if(($x % 3) == 0 ) { ?>
            <div class='clearfix hidden-xs'></div>
        <?php }
        if(($x % 2) == 0 ) { ?>
            <div class='clearfix col-xs-12 visible-xs'></div>
        <?php } } if($rows == 0) {
                if(isset($_POST['type']) && $_POST['type'] == 'brand') {

                    echo('<div style="margin-left: 10%"><img src="uploads/oops.jpg" class="img-responsive"/><h4 style="min-height: 300px;">No Products available in '.$ucategory.' brand</h4>
                <input type="hidden" data-type="brand" value="'.$category.'" id="searched_cat"></div>');

                } else if(isset($_POST['type']) && $_POST['type'] == 'color') {

                    echo('<div style="margin-left: 10%"><img src="uploads/oops.jpg" class="img-responsive"/><h4 style="min-height: 300px;">No Products available in '.$ucategory.' color</h4>
                <input type="hidden" data-type="color" value="'.$category.'" id="searched_cat"></div>');

                } else {

                    echo('<div style="margin-left: 10%"><img src="uploads/oops.jpg" class="img-responsive"/><h4 style="min-height: 300px;">No Products available in '.$ucategory.' category</h4>
                <input type="hidden" value="'.$category.'" id="searched_cat"></div>');

                }
		}
		


			
$strhtml = '
    </div>
</div>
<div class="pagination-wrap text-right">
    <ul>
    '.$paginationlinks.'
    </ul>
</div>';
echo($strhtml);







?>