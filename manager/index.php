<?php

//header("Location: setting.php");
require_once('functions/init.php');

$sub_site_name = "Home";


$author_query = "SELECT author, COUNT(author) AS count FROM news GROUP BY author ORDER BY count(author)";
$authors = query($author_query);




?>

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <?php include('webparts/css.php'); ?>
</head>
 
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
       
        <!-- start header -->
        <?php include('webparts/header.php'); ?>
        <!-- end header -->
        
        <!-- start page container -->
        <div class="page-container">
        
 			<!-- start sidebar menu -->
        <?php include('webparts/nav.php'); ?>
			 <!-- end sidebar menu -->
			 
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
		<?php include('webparts/breadcrumb.php'); ?>
                    </div>
                   <!-- start widget -->
	                  <div class="row">
		                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
		                        <div class="card">
		                            <div class="panel-body">
		                                <h3 class="center" style="padding-bottom: 0;">Total Number of Posts</h3>
		                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
		                                    <div class="progress-bar progress-bar-green width-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_news())); ?></button>
										</span> 
	                        		</div>
		                        </div>
		                    </div>
		                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
		                        <div class="card">
		                            <div class="panel-body">
		                                <h3 class="center" style="padding-bottom: 0;">Total Number of Customers</h3>
		                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
		                                    <div class="progress-bar progress-bar-orange width-100" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
		                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_customers())); ?></button>
										</span> 
	                        		</div>
		                        </div>
		                    </div>
		                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
		                        <div class="card">
		                            <div class="panel-body">
		                                <h3 class="center" style="padding-bottom: 0;">Total Number of Orders</h3>
		                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active" >
		                                    <div class="progress-bar progress-bar-purple width-100" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
		                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_orders())); ?></button>
										</span> 
	                        		</div>
		                        </div>
		                    </div>
			                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
			                        <div class="card">
			                            <div class="panel-body">
			                                <h3 class="center" style="padding-bottom: 0;">Orders Pending Delivery</h3>
			                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active" >
			                                    <div class="progress-bar progress-bar-cyan width-100" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
			                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_not_delivered_orders())); ?></button>
										</span> 
	                        		</div>
			                        </div>
								</div>
			        		</div>
                  
	                  <div class="row">
		                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
		                        <div class="card">
		                            <div class="panel-body">
		                                <h3 class="center" style="padding-bottom: 0;">Orders Pending Payment</h3>
		                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
		                                    <div class="progress-bar progress-bar-green width-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
		                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_not_paid_orders())); ?></button>
										</span> 
	                        		</div>
		                        </div>
		                    </div>
		                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
		                        <div class="card">
		                            <div class="panel-body">
		                                <h3 class="center" style="padding-bottom: 0;">Total Number of Products</h3>
		                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
		                                    <div class="progress-bar progress-bar-orange width-100" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
		                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_products())); ?></button>
										</span> 
	                        		</div>
		                        </div>
		                    </div>
		                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
		                        <div class="card">
		                            <div class="panel-body">
		                                <h3 class="center" style="padding-bottom: 0;">Contact Messages Received</h3>
		                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active" >
		                                    <div class="progress-bar progress-bar-purple width-100" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
		                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(getContactMessages())); ?></button>
										</span> 
	                        		</div>
		                        </div>
		                    </div>
			                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
			                        <div class="card">
			                            <div class="panel-body">
			                                <h3 class="center" style="padding-bottom: 0;">Total Team Members</h3>
			                                <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active" >
			                                    <div class="progress-bar progress-bar-cyan width-100" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
			                                </div>
		                                <span class="text-small margin-top-10 full-width center">
                                                    <button type="button" class="btn btn-circle btn-info"><?php echo(mysqli_num_rows(get_teams())); ?></button>
										</span> 
	                        		</div>
			                        </div>
								</div>
			        		</div>
					<!-- end widget -->
					<div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Category Products Count</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive tblHeightSet">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>#</th>
														<th>Category Name</th>
														<th>Number of Products</th>
													</tr>
												</thead>
												<tbody>									  
											<?php 
										  	$categories = get_shop_subcategories();
													$x=0;
										  if(mysqli_num_rows($categories) > 0) {
											  while($category = mysqli_fetch_assoc($categories)) { $x++; ?> 
										  	
													<tr>
														<td><?php echo($x); ?></td>
														<td><?php echo(product_cat_title($category['id'])); ?></td>
														<td><?php echo(categories_products_count($category['id'])) ?></td>
													</tr>
													
										 <?php }
										  } else {echo('<tr><td>No categories created</td><tr/>');}
										  	 ?>
												</tbody>
											</table>
										</div>
									</div>	
                                </div>
                            </div>
                        </div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12">
                             <div class="card card-box">
                                 <div class="card-head">
                                     <header>Admin List</header>
                                 </div>
                                 <div class="card-body ">
                                 <div>
                                        <ul class="empListWindow small-slimscroll-style">
					<?php 
				  $q = "SELECT * FROM admin ORDER BY last_name ASC";
				  $r = mysqli_query($con, $q); ?>
				  <div id="admin">
				  <?php
				  while ($user_list = mysqli_fetch_assoc($r)) { ?>

				   
                                            <li class="<?php if($user_list['id'] == 1) echo('hidden'); ?>">
                                                <div class="prog-avatar">
                                                    <img src="<?php if($user_list['image'] != '') {echo('../uploads/images/admin/'.$user_list['image']);} else { echo('assets/img/profile.png'); } ?>" alt="" width="40" height="40">
                                                </div>
                                                <div class="details">
                                                    <div class="title">
                                                        <a href="admin.php?id=<?php echo $user_list['id']; ?>"><?php echo($user_list['last_name'].' '.$user_list['first_name']); ?></a>
                                                    </div>
                                                        <div>
                                                            <span class="clsAvailable"><?php if ('0' == $user_list['active']) {
														echo('Inactive');} elseif ('1' == $user_list['active']) {
														echo('Active');} ?></span><span class="clsNotAvailable"> Last Login: <?php echo(date('j F Y', strtotime($user_list['lastlogin']))); ?></span>
                                                        </div>
                                                </div>
                                            </li>
                                            
				   <?php } ?>
                                        </ul>
                                    </div>
                                 </div>
                             </div>
						</div>
					</div>

					
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Posts Stats</header>
								</div>
								<div class="card-body ">
					            <div class = "mdl-tabs mdl-js-tabs">
					               <div class = "mdl-tabs__tab-bar tab-left-side">
					                  <a href = "#tab4-panel" class = "mdl-tabs__tab tabs_three is-active">Popular posts</a>
					                  <!-- <a href = "#tab5-panel" class = "mdl-tabs__tab tabs_three">Most Commented Post</a> -->
					                  <!-- <a href = "#tab6-panel" class = "mdl-tabs__tab tabs_three">Authors posts</a> -->
					               </div>
					               <div class = "mdl-tabs__panel is-active p-t-20" id = "tab4-panel">
					               <div class="table-responsive">
										<table class="table">
											<tbody>
												<tr class="text-center">
													<th>Image</th>
													<th>Title</th>
													<th>Author</th>
													<th>Views</th>
													<th>Comments</th>
													<th>Date added</th>
												</tr>											
											<?php 
											$popular = get_highest('views', 10); 
											
											while($post = mysqli_fetch_assoc($popular)) { ?> 
											
												<tr class="text-center">
													<td class="patient-img sorting_1">
														<img src="../uploads/images/news/thumb/mini_<?php echo($post['image']); ?>" alt="">
													</td>
													<td><?php echo(end_text($post['title'], '100')); ?></td>
													<td><?php echo(author($post['author'])); ?></td>
													<td><span class="label label-event"><i class="fa fa-eye"></i> <?php echo($post['views']); ?></span></td>
													<td><span class="label label-primary"><i class="fa fa-comments-o"></i> <?php echo(comment_count($post['id'])); ?></span></td>
													<td><?php echo(date('j F Y', strtotime($post['date']))); ?></td>
												</tr>
												
											<?php }
										?>
											</tbody>
										</table>
									</div>
					               </div>
					               <!-- <div class = "mdl-tabs__panel p-t-20" id = "tab5-panel">
										<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr class="text-center">
													<th>Image</th>
													<th>Title</th>
													<th>Author</th>
													<th>Comments</th>
													<th>Views</th>
													<th>Date added</th>
												</tr>	
												
										<?php /* // $top_reviews = top_reviews(5);
											$q = "SELECT news_id, COUNT(news_id) AS count FROM comments WHERE approved = 1 GROUP BY news_id ORDER BY count(news_id) DESC LIMIT 10";
											$results = query($q);
											//print_r($results);
											  if(mysqli_num_rows($results) > 0) {
												  while($review = mysqli_fetch_assoc($results)){
													   $post =  mysqli_fetch_assoc(select_from_id('news', $review['news_id']));
													  ?>
													  
												<tr class="text-center">
													<td class="patient-img sorting_1">
														<img src="../uploads/images/news/thumb/mini_<?php echo($post['image']); ?>" alt="">
													</td>
													<td><?php echo(end_text($post['title'], '100')); ?></td>
													<td><?php echo(author($post['author'])); ?></td>
													<td><span class="label label-event"><i class="fa fa-comments-o"></i> <?php echo(comment_count($post['id'])); ?></span></td>
													<td><span class="label label-primary"><i class="fa fa-eye"></i> <?php echo($post['views']); ?></span></td>
													<td><?php echo(date('j F Y', strtotime($post['date']))); ?></td>
												</tr>
												  
													  <?php
												  }
											  } else { echo('<tr><td>No Top Reviews yet, STAY TUNED!</td></tr>');}
										?>
										
											</tbody>
										</table>
									</div>
					               </div>
					               <div class = "mdl-tabs__panel p-t-20" id = "tab6-panel">
					               		<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr class="text-center">
													<th>Image</th>
													<th>Name</th>
													<th>Total Number of posts</th>
													<th>Total Views of Posts</th>
													<th>Last post Date</th>
												</tr>
								<?php 
									if(mysqli_num_rows($authors) > 0){
								while ($author = mysqli_fetch_assoc($authors)) { ?>
									
												<tr class="text-center">
													<td class="patient-img sorting_1">
														<img src="<?php if(admin_attr($author['author'], 'image') != '') { 
																	echo('../uploads/images/admin/'.admin_attr($author['author'], 'image'));
																} else { echo('../images/avatar.jpg'); } ?>" alt="">
													</td>
													<td><?php echo(author($author['author'])); ?></td>
													<td><?php echo($author['count']); ?></td>
													<td>
														<?php $views_q= "SELECT views FROM news WHERE author = $author[author]";
															  $views_r = query($views_q);
															  $total = 0;
															while($view = mysqli_fetch_assoc($views_r)) {
																$total += $view['views'];
															}
																echo($total);				
														?>
													</td>
													<td><?php $views_q= "SELECT date FROM news WHERE author = $author[author] ORDER BY id DESC LIMIT 1";
															  $views_r = mysqli_fetch_assoc(query($views_q));
																echo(date('j F Y', strtotime($views_r['date'])));				
														?></td>
												</tr>
									
								<?php } } */ ?>
											</tbody>
										</table>
									</div>
					               </div> -->
					            </div>
								</div>
							</div>
					</div> 
                </div>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
		<?php include('webparts/footer.php'); ?>
  </body>
</html>