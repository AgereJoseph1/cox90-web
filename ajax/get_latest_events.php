<?php
include('../functions/db.php');
include('../functions/functions.php');
//sleep(5);
				$db_query = "SELECT * FROM events ORDER BY id DESC";
				$pages_number_result = mysqli_query($con, $db_query);
				$rows = mysqli_num_rows($pages_number_result);



// how many records to show in each list
$page_rows = 5;
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

$textline2 = "<span class='pull-right fraction'>page <b>$loadData<b> of <b>$last</b></span>";
$paginationlinks = '';

// if there is more than 1 page worth of results 
if($last != 1) {
	if($loadData > 1) {
		$previous = $loadData - 1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="load_latest_events('.$previous.')"><i class="fa fa-long-arrow-left"></i></a></li>';
		
		//render clikable number links that should appear on the left of the target page number 
		for($i = $loadData-4; $i < $loadData; $i++) {
			if($i > 0) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="load_latest_events('.$i.')">'.$i.'</a></li>';
			}
		}
	}
	
	$paginationlinks .= '<li><a style="background-color: #73b21a; color: #fff;" >'.$loadData.'</a></li>';
	for($i = $loadData+1; $i <= $last; $i++) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="load_latest_events('.$i.')">'.$i.'</a></li>';
		if($i >= $loadData-4) {
			break;
		}
	}
	
	if($loadData != $last) {
		$next = $loadData +1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="load_latest_events('.$next.')"><i class="fa fa-long-arrow-right"></i></a></li>';
	}
}

		###################################################################################
##############################	FILTRATION PANEL    #############################################
		?>
							<div class="article-box">

								<div class="title-section">
									<h3><span>EVENTS</span></h3>
								</div>

		<?php
$x=0;	
		if(mysqli_num_rows($resResult) > 0) {
		while ($rsResult = mysqli_fetch_assoc($resResult)) { 

  ?>
					
					
					<div class="grid">
						<div class="entry-header">
							<div class="entry-media">
								<img src="uploads/images/events/thumb/<?php echo($rsResult['image']); ?>" alt='<?php echo($rsResult['title']); ?>'>
							</div>
							<div class="entry-meta">
								<ul>
									<li><i class="fa fa-calendar"></i> <a><?php echo(date("jS M, Y", $rsResult['start_time'])); ?></a></li>
									<li><i class="fa fa-map-marker"></i><a>Venue - <?php echo($rsResult['location']); ?></a></li>
									<!--<li><i class="fa fa-commenting"></i> <a>5 Comments</a></li>-->
								</ul>
							</div>
						</div>
						<div class="entry-body">
							<h3><a href="blog-details/<?php echo($rsResult['url_title']); ?>"><?php echo(end_text($rsResult['title'], '300')); ?></a></h3>
							<p><?php echo(end_text($rsResult['keywords'], '300')); ?></p>
							<a href="blog-details/<?php echo($rsResult['url_title']); ?>" class="read-more">See more <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
						<!-- Events -->
							
		<?php }	?>
		
		
							</div>
<?php
			
$strhtml = '<div>
                    <div class="col col-xs-12">
                        <div class="pagi">
                            <ul>
                                '.$paginationlinks.'
                            </ul>'.$textline2.'
                        </div>
                    </div>
                </div>';
/*$strhtml = '<div class="fullpagination"><div id="pagination_controls">'.$paginationlinks.'</div>'.$textline2.'</div>';*/
echo($strhtml);

		} else {
			
			echo("<h1 style='color: white;'>No Events Available</h1>");
		}
		?>
