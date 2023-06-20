<?php

require_once('functions/init.php');

$sub_site_name = "Images";

if(isset($_GET['id'])) {
	$id = clean(escape($_GET['id']));
	$w = clean(escape($_GET['w']));
	$h = clean(escape($_GET['h']));
	$page = single_image($id);
	$url = image_url($id);
} else {
	$page = '';
	$id = '';
}
?>



<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <?php include('webparts/css.php'); ?>
    <style>
	.sweet-alert {
    background-color: white;
    font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    width: 100%;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
     position: initial; 
    left: 50%;
     top: 0%; 
     margin-left: 0px; 
     margin-top: 0; 
	margin: auto;
    /* overflow: hidden; */
    /* display: none; */
     z-index: 0;
		}
	</style>
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
                     <div>
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-head">
                                </div>
                                <div class="card-body ">
                                  <div class="row">
									<div class="col-md-4">
									<div >
									  <div>
										<?php $sql= "SELECT * FROM single_images";
															$result = query($sql);

													while($pages = mysqli_fetch_assoc($result)) { ?>

										<a href="?id=<?php echo($pages['id']) ?>&w=<?php echo($pages['width']) ?>&h=<?php echo($pages['height']) ?>" class="link">
										  <button style="cursor:pointer; width: 100%; margin-bottom: 2%; display: inline-block" id="<?php echo($pages['id']) ?>" class="btn btn-<?php if($id == $pages['id']) {echo('pink');} else {echo('info');} ?> page ">
											<?php echo($pages['id']) ?>
											</button>
										  </a><br>

										<?php } 
													?>
										</div>

									  </div>
									</div>

								
									<div class="col-md-8">
									
								<?php if(isset($_GET['id'])) { ?> 
								  
									  <div class="card">
										<div class="card-body">
										  <h2 class=" text-center description response">
										  <span class="btn btn-pink "><?php echo(strtoupper($id)) ?><span class=" loader"></span></span>
										  </h2>

										  <div>
										  <h4>Ideal Image size should be width:<?php echo($w.'px') ?> by height:<?php echo($h.'px') ?></h4>
										  
												<form action="ajax/process_images.php?id=<?php echo($id);?>&w=<?php echo($w);?>&h=<?php echo($h);?>" class="dropzone image" id="avatar-dropzone">

												<label><?php echo($id);?></label>
												</form>
												
							<div class="form-group">
								<label for="name" style="color:#8B6505;"> URL(optional) Please leave blank if not sure:</label>
								<input class="form-control" id="url" type="text" name="title" value="<?php echo($url); ?>" placeholder="Enter URL">
							</div>
				
						   
							   <!--update button-->
									<input type="hidden" value="<?php echo($id); ?>" name="idhidden" >
									<input type="hidden" value="<?php echo($page); ?>" name="pagehidden">
									<button class="btn btn-primary update" style="display: block; clear: both; margin-top: 2%;"> Update Url </button>
									
													<?php if ($page != '' ) { ?>
													<img style="margin-top: 2%" src="../uploads/<?php echo($page); ?>" class="img-responsive" width="30%" />
													<?php } else { 
														echo("<h4 style = 'color: black'>No image uploaded</h4>");
													 } ?>
											</div>
										</div>
									  </div>
									  
								<?php } else { ?>
								
						<div class="sweet-alert showSweetAlert visible" data-animation="pop" data-timer="null" style="display: block;">
							 <div class="sa-icon sa-warning pulseWarning" style="display: block;">
							  <span class="sa-body pulseWarningIns"></span>
							  <span class="sa-dot pulseWarningIns"></span>
							</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
							  <span class="sa-line sa-tip"></span>
							  <span class="sa-line sa-long"></span>

							  <div class="sa-placeholder"></div>
							  <div class="sa-fix"></div>
							</div><div class="sa-icon sa-custom" style="display: none;"></div><h2>No Item Selected</h2>
							<p style="display: block;">Please Select Item to Modify</p>
						</div>
									<?php } ?>
									
									</div>
                                  </div>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
        </div>

<!--end .section-body -->


        <?php include('webparts/footer.php'); ?>

<script>
   window.onload = function () {
	
	$('.update').click(function(){
		
		$.ajax({
                   url:"ajax/process_images_url.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   id: '<?php echo($id); ?>',
					   url: $('#url').val(),
                   },
					beforeSend: function() {
						$('.response').html('<div>Updating Image <b>please wait</b></div>');
					},
                   success:function(data){
					   
					   $('.response').html(data);
					   console.log(data);
					   
                   },
                   fail:function(data){
					   
                   }
               });
		
	});	   
	   
   }
</script>
