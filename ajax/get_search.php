<?php
include('../functions/db.php');
include('../functions/functions.php');

$errors = array();
			
		if (empty($_REQUEST['search'])) {
				$errors[] =  'Please enter a search term';
				}	
				
		if (strlen(trim($_REQUEST['search'])) < 3) {
					$errors[] = 'Your search term must be three or more characters';
			}	
			

		if (empty($errors)) {	

			$search = escape(clean($_REQUEST['search']));
			$full = query("ALTER TABLE tbl_products ADD FULLTEXT(title, description, keywords)");
			//confirm($full);

			$db_query = "SELECT * FROM tbl_products WHERE MATCH (title, description, keywords) AGAINST ('$search')";

			// $db_query = "SELECT * FROM tbl_products WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR keywords LIKE '%$search%' ORDER BY id DESC";

			$pages_number_result = mysqli_query($con, $db_query);
			//confirm($pages_number_result);
			$rows = mysqli_num_rows($pages_number_result);
	
			if($rows > 0) {
			$suffix = ($rows != 1) ? 's' : ''; 
			$number = "<p>Your search for <strong> $search, </strong> returned <strong> $rows </strong> result$suffix</p>";

			} else {
				$number = '
				<div >
				<img src="uploads/oops.jpg" class="img-responsive"/>
						<h2 style="color:#73b21a">No Search Results matching your search "'.$search.'"!</h2>
						<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
						<div class="suggestions">
							<h3>Suggestions:</h3>
							<ul>
								<li><i class="fa fa-angle-double-right"></i> Make sure all words are spelled correctly</li>
								<li><i class="fa fa-angle-double-right"></i> Try more general keywords, especially if you are attempting a name</li>
							</ul>
						</div> 
						Back to <a href="home">Home page</a><br>
						Back to <a href="products">Product page</a></div>';
			}



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
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="loadData_search('.$previous.')"><i class="fa fa-long-arrow-left"></i></a></li>';
		
		//render clikable number links that should appear on the left of the target page number 
		for($i = $loadData-4; $i < $loadData; $i++) {
			if($i > 0) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="loadData_search('.$i.')">'.$i.'</a></li>';
			}
		}
	}
	
	$paginationlinks .= '<li><a style="background-color: #73b21a; color: #fff;" >'.$loadData.'</a></li>';
	for($i = $loadData+1; $i <= $last; $i++) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="loadData_search('.$i.')">'.$i.'</a></li>';
		if($i >= $loadData-4) {
			break;
		}
	}
	
	if($loadData != $last) {
		$next = $loadData +1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="loadData_search('.$next.')"><i class="fa fa-long-arrow-right"></i></a></li>';
	}
}

		
$x=0;	
		if(mysqli_num_rows($resResult) > 0) { ?>

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
		while ($rsResult = mysqli_fetch_assoc($resResult)) { $x++ 

  ?>
					
				                        
                    <div class="col-sm-4 col-md-4 col-xs-6">
                        <div class="wa-theme-design-block card">
                            <figure>
                                <a href="product-details/<?php echo($rsResult['url_title']); ?>">
                                <figure class="dark-theme">
                                <img class="<?php if($rsResult['in_stock'] != 1) { echo("imageStockOut"); } ?>" src="uploads/images/<?php echo('shop/thumb/'.$rsResult['image']); ?>" alt="<?php echo($rsResult['title'].' '.$site_name); ?>">
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
                                    <span class="sell-price">GH₵ <?php echo($rsResult['price']); ?></span>
                                    <span class="actual-price"><?php if($rsResult['old_price'] > 0) { echo('GH₵ '.$rsResult['old_price']); } ?></span>
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
                            
				
		<?php if(($x % 3) == 0 ) { ?>
            <div class='clearfix'></div>
        <?php } }
			
$strhtml = '
    </div>
</div>
<div class="pagination-wrap text-right">
    <ul>
    '.$paginationlinks.'
    </ul>
</div>';
echo($strhtml);

		} else { echo($number); }


} elseif(!empty($errors)) { ?>  		
			
	<div class="title-section">
		<h4><span>
		<?php if(isset($number)) {echo($number);} else { ?>

					<h2 style="color:#73b21a">OOps! </h2>
					<div class="suggestions">
						<ul>
						<?php
							foreach($errors as $error) { ?>

							<li><i class="fa fa-angle-double-right"></i><?php echo($error) ?></li>

						<?php } ?>
						</ul>
					</div> <?php }  ?>
					
				</span></h4>
			</div> 
					
					
					
		<?php } 
		
		
		?>
