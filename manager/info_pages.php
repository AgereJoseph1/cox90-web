<?php

require_once('functions/init.php');

$sub_site_name = "Add Details";

if(isset($_GET['id'])) {
	$id = clean(escape($_GET['id']));
	$page = get_page($id);
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
		#listings_tagsinput {
			height: 400px !important;
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
										<?php $sql= "SELECT * FROM pages";
															$result = query($sql);

													while($pages = mysqli_fetch_assoc($result)) { ?>

										<a href="?page=info-pages&id=<?php echo($pages['id']) ?>" class="link">
										  <button style="cursor:pointer; width: 100%; margin-bottom: 2%; display: inline-block; background-color: <?php echo($pages['color'].'!important'); ?>" id="<?php echo($pages['id']) ?>" class="btn btn-<?php if($id == $pages['id']) {echo('pink');} else {echo('info');} ?> page ">
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
											
									<?php if(substr($id, 0, 4) == 'list') { ?>
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="control-label">Add list item and press <b>ENTER</b></label>
											<input type="text" class="tags tags-input" data-type="tags" id="list_data" value="<?php echo($page['content']); ?>" style="border: none" />
										</div>
									<?php } else { ?> 
											<label for="report">Description:</label>
											<div class = "mdl-textfield mdl-js-textfield txt-full-width">
													<textarea class="form-control description" id="description" rows="8" name="description" placeholder="Description">
													<?php echo($page['content']); ?>
												</textarea>
											</div>
									<?php } ?>
											<button class="btn btn-success update pull-right" style="margin-top: 3%;">UPDATE</button>
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
        <!-- end page container -->
        <!-- start footer -->
        <?php include('webparts/footer.php'); ?>
<script>
   window.onload = function () {
	
	$('.update').click(function(){
		
		var page_id = '<?php echo($id) ?>';
	//	$('#'+page_id).siblings().removeClass('active');
		<?php if(substr($id, 0, 4) == 'list') { ?>
			var description = $("#list_data").val()
		<?php } else { ?>
			var description = CKEDITOR.instances.description.getData();
		<?php } ?>
		//alert(description);
		//alert(1)
		$.ajax({
                   url:"ajax/ajax_update_pages.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   idselect: page_id,
					   description: description
                   },
					beforeSend: function() {
							$(".loader").text(' updating');
					},
                   success:function(data){
					   $('.response').html(data);
					   setTimeout(function(){  },2000)
					   //console.log(data);
					   
                   },
                   fail:function(data){
					   
                   }
               });
		
	});
	
	   
   }
</script>
</body>
</html>