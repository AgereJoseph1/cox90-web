<?php

require_once('functions/init.php');

$sub_site_name = "Albums";

$toast = "album";
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
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box ">
                                <div class="card-body ">
                                	<div class="tab-pane" id="tab2">
										<div class="row">					
					<?php 
					$x =0;
						$albums = get_albums($con);
						if(mysqli_num_rows(get_albums($con)) == 0) {
							echo('<h3>There are no albums created</h3>');
						} else {
							while ($albums_row = mysqli_fetch_assoc($albums)) { ?>
							
											<div class="col-md-4" >
												<div class="card" id="remove_<?php echo($albums_row['album_ID']); ?>">
													<div class="m-b-20">
														<div class="doctor-profile">
														<div class="profile-header <?php color(); ?>">
																<div class="user-name"> <?php echo(strtoupper($albums_row['name'])) ?></div>
															</div>
															<img src="../uploads/images/gallery/album_img/<?php echo($albums_row['image']) ?>" class="user-img"
																alt="">
															<div>
																<p>
																	<i class="fa fa-image"></i>
																	 <a>
																		 (<?php echo($albums_row['images_count']) ?> images) 
																	  </a>
																</p>
															</div>
															<p>
																<?php echo($albums_row['description']) ?>
															</p>
															<div>
																<p>
																	<i class="fa fa-address-book"></i><a>
																		Album added <?php //echo($albums_row['album_user']) ?> on <?php echo(date('j F Y @ h:i a', strtotime($albums_row['album_dateadded']))); ?></a>
																</p>
															</div>
															<div class="profile-userbuttons">
																<a href="all_album_images.php?id=<?php echo($albums_row['album_ID']) ?>"
																	class="btn btn-circle btn-pink btn-sm">View Images</a>
															</div>
															<div class="profile-userbuttons">
																<a href="add_album.php?id=<?php echo($albums_row['album_ID']) ?>"
																	class="btn btn-circle btn-primary btn-sm">Edit</a>
																<a href=""  id="del_<?php echo($toast); ?>_<?php echo($albums_row['album_ID']); ?>"
																	class="btn btn-circle fa fa-trash-o deepPink-bgcolor btn-sm delete_<?php echo($toast); ?>"> Delete</a>
															</div>
															<div class="profile-userbuttons">
																<a href="uploadmultiple.php?id=<?php echo($albums_row['album_ID']) ?>&amp;name=<?php echo(strtoupper($albums_row['name'])) ?>"
																	class="btn btn-circle btn-pink btn-sm">Upload Multiple Images</a>
															</div>
														</div>
													</div>
												</div>
											</div>

						<?php 
								
				$x++;
																			   

				if($x%2 == 0) { ?>
					<div class="clearfix visible-sm"></div>
				<?php }

				if($x%3 == 0) { ?>
					<div class="clearfix hidden-sm"></div>
				<?php } ?>
						
						
						
							<?php }
						}
					?>
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            
            
            
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->

        <?php include('webparts/footer.php'); ?>
</body>
</html>