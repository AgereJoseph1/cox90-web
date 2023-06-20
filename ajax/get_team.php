<?php
include('../functions/db.php');
include('../functions/functions.php');
//sleep(5);
				$db_query = "SELECT * FROM team ORDER BY title ASC";
				$pages_number_result = mysqli_query($con, $db_query);
				$rows = mysqli_num_rows($pages_number_result);



// how many records to show in each list
$page_rows = 9;
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
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="load_team('.$previous.')"><i class="fa fa-long-arrow-left"></i></a></li>';
		
		//render clikable number links that should appear on the left of the target page number 
		for($i = $loadData-4; $i < $loadData; $i++) {
			if($i > 0) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="load_team('.$i.')">'.$i.'</a></li>';
			}
		}
	}
	
	$paginationlinks .= '<li><a style="background-color: #73b21a; color: #fff;" >'.$loadData.'</a></li>';
	for($i = $loadData+1; $i <= $last; $i++) {
				$paginationlinks .= '<li class"active" ><a style="cursor: pointer" onclick="load_team('.$i.')">'.$i.'</a></li>';
		if($i >= $loadData-4) {
			break;
		}
	}
	
	if($loadData != $last) {
		$next = $loadData +1;
		$paginationlinks .= '<li><a style="cursor: pointer" onclick="load_team('.$next.')"><i class="fa fa-long-arrow-right"></i></a></li>';
	}
}

		
$x=0;	
		if(mysqli_num_rows($resResult) > 0) { 
		while ($rsResult = mysqli_fetch_assoc($resResult)) { 

  ?>
					
				                   
                            <div class="grid">
                                <div class="member">
                                    <div class="pic">
                                        <img src="uploads/images/<?php echo('team/thumb/'.$rsResult['image']); ?>" alt="<?php echo($rsResult['title']); ?>">
                                    </div>
                                    <div class="member-social-links">
                                        <ul class="social-links">
							    
										<?php if($rsResult['facebook'] != '' && $rsResult['facebook_status'] == 1) { ?>
                                            <li><a target="_blank" href="<?php echo($rsResult['facebook']) ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
										<?php } ?>

										<?php if($rsResult['twitter'] != '' && $rsResult['twitter_status'] == 1) { ?>
                                            <li><a  target="_blank" href="<?php echo($rsResult['twitter']) ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
										<?php } ?>

										<?php if($rsResult['instagram'] != '' && $rsResult['instagram_status'] == 1) { ?>
                                            <li><a target="_blank" href="<?php echo($rsResult['instagram']) ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										<?php } ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4><?php echo($rsResult['title']); ?></h4>
                                    <span class="post"><?php echo($rsResult['position']); ?></span>
                                </div>
                            </div>
                            
							
		<?php }	
			
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
			
			echo("<h1>No Team Member Available</h1>");
		}
		?>
