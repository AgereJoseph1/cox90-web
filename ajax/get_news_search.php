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
			$full = query("ALTER TABLE news ADD FULLTEXT(title, description, keywords, category)");
			//confirm($full);

			$db_query = "SELECT * FROM news WHERE MATCH (title, description, keywords, category) AGAINST ('$search') ORDER BY id DESC";

			$pages_number_result = mysqli_query($con, $db_query);
			//confirm($pages_number_result);
			$rows = mysqli_num_rows($pages_number_result);
	
			if($rows > 0) {
			$suffix = ($rows != 1) ? 's' : ''; 
			$number = "<p>Your search for <strong> $search, </strong> returned <strong> $rows </strong> result$suffix</p>";

			} else {
				$number = '
				<div class="col-md-9 col-sm-8" >
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
						Back to <a href="blog">Blog posts</a><br>
						Back to <a href="products">Product page</a>
						</div>';
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

$textline2 = "Showing $loadData of $last posts";
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

	<div class="col-md-9 col-sm-8">
		<div class="blog-posts single-post">

        <?php
		while ($rsResult = mysqli_fetch_assoc($resResult)) { 

  ?>
				
				<div class="col-md-4 col-sm-4" style='padding-bottom: 10px'>
                    <article class="blog-post-container clearfix card">
                        <div class="post-thumbnail">
                            <img src="uploads/images/news/thumb/mini_<?php echo($rsResult['image']); ?>" class="img-responsive " alt="Image">
                        </div><!-- /.post-thumbnail -->
                        
                        <div class="blog-content" style='min-height: 100px'>
                            <div class="dart-header">
                                <h4 class="dart-title"><a href="blog-details/<?php echo($rsResult['url_title']); ?>"><?php echo(end_text($rsResult['title'], '200')); ?></a></h4>
                                <div class="dart-meta">
                                    <ul class="list-unstyled">
                                        <!-- <li><span class="author"> By: <a href="#">Admin</a></span></li> -->
                                        <li><span class="posted-date"><a href=""><?php echo(date('F jS, Y', strtotime($rsResult['date']))); ?></a></span></li>
                                    </ul>
                                </div><!-- /.dart-meta -->
                            </div><!-- /.dart-header -->
    
                            <div class="dart-content">
                                <p><?php echo(end_text($rsResult['keywords'], '200')); ?></p>
                            </div><!-- /.dart-content -->
    
                            <div class="dart-footer">
                                <ul class="dart-meta clearfix list-unstyled">
                                    <!-- <li><a class="pull-left" href="#"><i class="fa fa-comment-o"></i> &nbsp; 3 comments</a></li> -->
                                    <li><a class="pull-right" href="blog-details/<?php echo($rsResult['url_title']); ?>"> More <i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div><!-- /.dart-footer -->
                        </div><!-- /.blog-content -->
                    </article>
				</div>
                            
		<?php  } ?>
				</div>
				<?php
			
$strhtml = '
<div class="pagination-wrap text-right">
	<ul>
	'.$paginationlinks.'
	</ul>
	'.$textline2.'
</div>';
echo($strhtml); 

				?>
			</div>
<?php
			
		} else { echo($number); }


} elseif(!empty($errors)) { ?>  		
			
	<div class="title-section col-md-9 col-sm-8">
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
