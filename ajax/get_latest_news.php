<?php
include('../functions/db.php');
include('../functions/functions.php');
//sleep(5);
				$db_query = "SELECT * FROM news ORDER BY id DESC";
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

$textline2 = "Showing $loadData of $last Pages";
$paginationlinks = '';

// if there is more than 1 page worth of results 
if($last != 1) {
	if($loadData > 1) {
		$previous = $loadData - 1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="load_latest_news('.$previous.')"><i class="fa fa-long-arrow-left"></i></a></li>';
		
		//render clikable number links that should appear on the left of the target page number 
		for($i = $loadData-4; $i < $loadData; $i++) {
			if($i > 0) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="load_latest_news('.$i.')">'.$i.'</a></li>';
			}
		}
	}
	
	$paginationlinks .= '<li><a style="background-color: #73b21a; color: #fff;" >'.$loadData.'</a></li>';
	for($i = $loadData+1; $i <= $last; $i++) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="load_latest_news('.$i.')">'.$i.'</a></li>';
		if($i >= $loadData-4) {
			break;
		}
	}
	
	if($loadData != $last) {
		$next = $loadData +1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="load_latest_news('.$next.')"><i class="fa fa-long-arrow-right"></i></a></li>';
	}
}

		###################################################################################
##############################	FILTRATION PANEL    #############################################
		?>
								<!--<div class="title-section">
									<h3><span>Blog Posts</span></h3>
								</div>-->

		<?php
$x=0;	
		if(mysqli_num_rows($resResult) > 0) { ?>
            <div class="row">
		<?php
		while ($rsResult = mysqli_fetch_assoc($resResult)) { 

  ?>
					
					<div class="col-md-4 col-sm-4">
                    <article class="blog-post-container clearfix">
                        <div class="post-thumbnail">
                            <img src="uploads/images/news/thumb/mini_<?php echo($rsResult['image']); ?>" class="img-responsive " alt="Image">
                        </div><!-- /.post-thumbnail -->
                        
                        <div class="blog-content">
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
				
					<!-- /article -->
							
		<?php }	?>
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

		} else {
			
			echo("<h1 style='color: #e74668; text-align: center; min-height: 200px'>No Posts available</h1>");
		}
		?>
