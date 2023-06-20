<?php

require_once('functions/init.php');

$sub_site_name = "Add News";
$action = 'Added';

$toast = "news";

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	
	$news_id = select_from_id('news', $id);
	$news = mysqli_fetch_assoc($news_id);
	$sub_site_name = "Update News";
	$action = 'Updated';
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <?php include('webparts/css.php'); ?>
	<style>
		.toast-link {
			margin-bottom: 5%;
		}
		.toast-link a{
			font-weight: bold;
		}
		.toast-link a:hover {
			color: white;
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
                     <div class="row">
                        <div class="col-md-12">
			<div class="row p-b-20">
				<div class="col-md-6 col-sm-6 col-6">
					<div class="btn-group">
						<a href="all_news.php" id="addRow" class="btn btn-pink">
							All News <i class="fa fa-plus"></i>
						</a>
					</div>
					<!--Categories start-->
					<div class="btn-group">
						  <button type="button" class="btn btn-info">Edit | Delete Category</button>
						  <button type="button" class="btn btn-info dropdown-toggle m-r-20" data-toggle="dropdown">
							  <i class="fa fa-angle-down"></i>
						  </button>
						  <ul class="dropdown-menu" role="menu" style="max-height: 700px; overflow-y: scroll">
							 <?php 
								$categories = get_categories();
							  if(mysqli_num_rows($categories) > 0) {
								  while($category = mysqli_fetch_assoc($categories)) { ?> 

									  <li class="col-md-12 center p-b-20" id="remove_category_<?php echo($category['id']); ?>"><a><?php echo(strtoupper($category['title'])); ?>

										<a class="btn btn-xs "  data-toggle="modal" data-target="#myModal<?php echo($category['id']); ?>">
											<span>Edit</span> <i class="fa fa-pencil"></i>
										</a>
										<a class="btn btn-xs delete_category" id="del_category_<?php echo($category['id']); ?>">
											<span class="text-danger">Delete</span> <i class="fa fa-trash-o "></i>
										</a>
										  </a>
									  </li>

							 <?php }
							  } else {echo('No categories created');}
								 ?>
						  </ul>
					  </div>
					<!--Categories end-->
					<div class="btn-group">
						<a href="add_news.php" id="addRow" class="btn btn-info" data-toggle="modal" data-target="#myModal">
							Add category <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
			</div>
                            <div class="card">
								<form method="post" action="ajax/ajax_add_news.php" enctype="multipart/form-data">
								<div class="card-body row">
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="title" id ="title" maxlength="100" 
					                     value="<?php if(isset($news)) {echo($news['title']);} ?>">
					                     <label class = "mdl-textfield__label">Post Title</label>
					                  </div>
						            </div>
                                
                                 <!--Post category select--> 
						            <div class="col-lg-6 p-t-20"> 
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<select class = "mdl-textfield__input" id="sel_category" name="sel_category">
									  	<?php 
										  	$categories = get_categories();
										  if(mysqli_num_rows($categories) > 0) {
											  while($category = mysqli_fetch_assoc($categories)) { ?> 
										  	
											<option value="<?php echo($category['url_title']); ?>" 
									  		<?php if(isset($news) && ($category['url_title'] == $news['category'])) echo('selected'); ?>>
									  			<?php echo(strtoupper($category['title'])); ?>
									  		</option>
										  	
										 <?php }
										  } else {echo('<option value="no">No categories created<option/>');}
										  	 ?>
										</select>
										<label class = "mdl-textfield__label">Select Category</label>
									</div>
						           	</div>
                                 <!--Post category select end--> 
                                      
								   <div class="col-lg-12 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <textarea class = "mdl-textfield__input" rows =  "4" 
					                        id = "keywords" name="keywords" ><?php if(isset($news)) {echo($news['keywords']);} ?></textarea>
					                     <label class = "mdl-textfield__label" for = "text7">Post Short description or keywords</label>
					                  </div>
						              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <label style="color: #AAAAAA">Post Full description</label>
											<textarea class="form-control description" id="description" rows="8" name="description" placeholder="Description">
											<?php if(isset($news)) {echo($news['description']);} ?>
										  </textarea>
					                        <input type="hidden" id="update" value="<?php if(isset($news)) {echo($news['id']);} else {echo('add');} ?>">
					                  </div>
							       </div>
                                
                                 <!--Image upload dialog--> 
					            <div class="card col-lg-5 p-t-20 m-r-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($news)) { ?>
											<img src="../uploads/images/news/thumb/<?php echo($news['image']); ?>" alt="" width="60px">
											<label>Update News image<sup>(optional)</sup>:</label><br>
											<?php }else { ?>
											<label>Choose News image:</label><br>
						            	 <?php } ?>
                                   		</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal Image size should be width: 1200px and height: 450px:</label><br>
										<input type="file" name="mediapic" id="mediapic"/><br>
											</div>
										</div>
                                    </div>
                                </div>  
                                 <!--Image upload dialog end--> 
                                
                                 <!--Media upload dialog--> 
					            <div class="card col-lg-5 p-t-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($news) && $news['media'] != '') { ?>
											<label>Update News Media<sup>(optional)</sup>:</label>
												<div class="btn-group">
													<a href="" id="addRow" class="btn btn-pink"  data-toggle="modal" data-target="#myModalmedia">
														View <?php if(ext($news['media']) == 'mp4'){ echo(' Video'); }else{ echo(' Audio'); } ?> attached+ <i class="fa fa-plus"></i>
													</a>
												</div>
											<?php }else { ?>
											<label>Choose News Media<sup>(optional)</sup>:</label>
											 <?php } ?>
                                        </header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
												<div class="col-lg-6 p-t-20"> 
												  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
															<select  class = "mdl-textfield__input" id="format" >
															<option value="nomedia" selected> No media to upload </option>
															<option value="audio"> Audio </option>
															<option value="video"> Video </option>
															</select>
													 <label class = "mdl-textfield__label">Choose upload media type:</label>
												  </div>
												</div>
												<div class="col-lg-6 p-t-10">
													<input type="file" name="media" id="media"/>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                                 <!--Media upload dialog end--> 
                                   
					                <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" value="<?php echo(admin_name()); ?>" maxlength="50" disabled>
					                     <input class = "mdl-textfield__input" type = "hidden" id = "author" name="author" value="<?php echo($user['id']); ?>" maxlength="50" disabled>
					                     <label class = "mdl-textfield__label">Author of News</label>
					                  </div>
									</div>
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label class="control-label">Add tag and press <b>ENTER</b></label>
										<input type="text" class="tags tags-input" data-type="tags" id="tags" value="<?php if(isset($news)) {echo($news['tags']);} ?>" style="border: none" />
									</div>
                                    <div class="hidden">
									  <div class="col-lg-4 p-t-20"> 
										<span>Featured News</span> <br>
										<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-8">
										  <input type="checkbox" id="switch-8" class="mdl-switch__input" <?php if(isset($news) && $news['featured_news'] == 1) {echo('checked');} ?>>
										  <span class="mdl-switch__label">
											<?php if(isset($news) && $news['featured_news'] == 1) {echo('Yes');} else echo('No') ?>
											</span>
										  </label>
									  </div>
                                      <div class="col-lg-4 p-t-20"> 
                                        <span>Breaking News</span> <br>
                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-9">
                                          <input type="checkbox" id="switch-9" class="mdl-switch__input" <?php if(isset($news) && $news['breaking_news'] == 1) {echo('checked');} ?>>
                                          <span class="mdl-switch__label">
                                          <?php if(isset($news) && $news['breaking_news'] == 1) {echo('Yes');} else echo('No') ?>
                                          </span>
                                          </label>
                                        </div>
                                      <div class="col-lg-4 p-t-20"> 
                                        <span>Trending News</span> <br>
                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-10" >
                                          <input type="checkbox" id="switch-10" class="mdl-switch__input" <?php if(isset($news) && $news['trending_news'] == 1) {echo('checked');} ?>>
                                          <span class="mdl-switch__label">
                                            <?php if(isset($news) && $news['trending_news'] == 1) {echo('Yes');} else echo('No') ?>
                                          </span>
                                          </label>
                                        </div>
                                      <div class="col-lg-4 p-t-20"> 
                                        <span id="top_text">Top Stories</span> <br>
                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-11" >
                                          <input type="checkbox" id="switch-11" class="mdl-switch__input" <?php if(isset($news) && $news['top_stories'] == 1) {echo('checked');} ?>>
                                          <span class="mdl-switch__label">
                                            <?php if(isset($news) && $news['top_stories'] == 1) {echo('Yes');} else echo('No') ?>
                                          </span>
                                          
                                          <span class="" style="margin-right: 30px;"></span>
                                          <span> 
                                            <a >Max</a><span class="mdl-badge" data-badge="10"></span>
                                          </span>
                                          <span class="" style="margin-right: 10px;"></span>
                                          <span> 
                                            <a >Slots left</a><span class="mdl-badge" id="main_slots" data-badge="<?php echo(10 - slots('top_stories')); ?>"></span>
                                          </span>
                                          
                                          </label>
                                        </div>
                                      <div class="col-lg-4 p-t-20"> 
                                        <span id="carousel_text">Mini Carousel News</span> <br>
                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-12" >
                                          <input type="checkbox" id="switch-12" class="mdl-switch__input" <?php if(isset($news) && $news['carousel_small_news'] == 1) {echo('checked');} ?>>
                                          <span class="mdl-switch__label">
                                            <?php if(isset($news) && $news['carousel_small_news'] == 1) {echo('Yes');} else echo('No') ?>
                                          </span>
                                          
                                          <span class="" style="margin-right: 30px;"></span>
                                          <span> 
                                            <a>Max</a><span class="mdl-badge " data-badge="4"></span>
                                          </span>
                                          
                                          <span class="" style="margin-right: 10px;"></span>
                                          <span> 
                                            <a>Slots left</a><span class="mdl-badge" id="mini_slots" data-badge="<?php echo(4 - slots('carousel_small_news')); ?>"></span>
                                          </span>
                                          </label>
                                        </div>
                                    </div>
                                    
                                    
								<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
								</div>
								
								<div style="margin-top: 2%; background-color: transparent" class="progress col-lg-12">
									<div id="progressBar" class="progress-bar deepPink-bgcolor" role="progressbar" aria-valuenow="0" aria-valuemin='0' aria-valuemax="100" style="width: 0%;" >
										0%
									</div>
								</div>
						         
							         <div class="col-lg-12 p-t-20 text-center m-t-20"> 
						              	<button type="button"  onClick="uploadFile()" id="add_news_submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</a>
						            </div>
						            <input type="hidden" name="task" value="add_news">
								</div>
								</form>
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
	            
        <!--   Category Modals  -->
        
        
       	 <!-- Add Category Modals  -->
        <div class="modal fade cat_modal" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                </div>
                <div class="modal-body center">
                	<div id="cat_boby">
					  <div class="alert label-danger alert-dismissible hidden" id="addcat_warning" role="alert">
						Category Name cannot be empty
					  </div>
					<div class="col-lg-6 p-b-20"> 
					  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						 <input class = "mdl-textfield__input" type = "text" id = "category" name="category" value="" maxlength="50">
						 <label class = "mdl-textfield__label">Enter Category name</label>
						 <input type="hidden" id="update" value="add">
						 <input type="hidden" id="adder" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="cat_footer">
					    <label class = "text-info">Adding Category</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="response">
               			
               		</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" id="addcategory">Add Category</button>
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
       	 <!-- Edit Category Modals  -->
	 <?php 
		$categories = get_categories();
		while($category = mysqli_fetch_assoc($categories)) { ?> 
			
        <div class="modal fade cat_modal" id="myModal<?php echo($category['id']); ?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <input type="hidden" id="old_<?php echo($category['id']); ?>" value="<?php echo(strtoupper($category['title'])); ?>" >
                    <h5 class="modal-title">Edit <?php echo(strtoupper($category['title'])); ?> Category</h5>
                </div>
                <div class="modal-body center">
                	<div id="cat_boby<?php echo($category['id']); ?>">
					  <div class="alert label-danger alert-dismissible hidden " id="addcat_warning<?php echo($category['id']); ?>" role="alert">
						Category Name cannot be empty
					  </div>
					<div class="col-lg-6 p-b-20"> 
					  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						 <input class = "mdl-textfield__input" type = "text" id = "category<?php echo($category['id']); ?>" name="category" value="<?php echo(strtoupper($category['title'])); ?>" maxlength="50">
						 <label class = "mdl-textfield__label">Edit Category name</label>
						 <input type="hidden" id="update<?php echo($category['id']); ?>" value="<?php echo($category['id']); ?>">
						 <input type="hidden" id="adder<?php echo($category['id']); ?>" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="cat_footer<?php echo($category['id']); ?>">
					    <label class = "text-info">Updating Category</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="response<?php echo($category['id']); ?>">
               			
               		</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link updatecategory" id="<?php echo($category['id']); ?>">Update Category</button>
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   	<?php } ?>
      	 
      	 <?php if(isset($news) && $news['media'] != '') { ?>
       	 <!-- Video Modals  -->
        <div class="modal fade cat_modal" id="myModalmedia" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo($news['title']); if(ext($news['media']) == 'mp4'){ echo(' Video'); }else{ echo(' Audio'); }?> </h5>
                </div>
                <div class="modal-body center">
                	<div id="cat_boby">
					<div class="col-lg-12"> 
									  <?php 
											if (ext($news['media']) == 'mp3') { ?>
											
									 <div>
										  <audio id="audi" class='audio' controls>
											<source src="../uploads/media/<?php echo($news['media']); ?>" type="audio/mp3" />
											<p> Your browser does not support this feature to play</p>
											</audio>
									</div>
										
											<?php } elseif (ext($news['media']) == 'mp4') { ?>
											
									<div class="center-block">
										  <video id="video" class='audio' controls width="100%" >
											<source src="../uploads/media/<?php echo($news['media']); ?>" type="video/mp4" />
											<p> Your browser does not support this feature to play</p>
											</video>
									</div>
										
											<?php }
										?>
								
					</div>
                	</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
   	 </div>
   	 <?php } ?>
<script>
				
				var top_slots = $('#main_slots').data('badge');
				if(top_slots < 1) {
					$('#switch-11').prop('disabled', true);
					$('#top_text').append(' (Free some slots to enable this feature)');
				}
	
				var carousel_slots = $('#mini_slots').data('badge');
				if(carousel_slots < 1) {
					$('#switch-12').prop('disabled', true);
					$('#carousel_text').append(' (Free some slots to enable this feature)');
				}
	
				$('#switch-8').change(function(){
					if($(this).is(':checked'))
						$(this).next().text("Yes");
					else
						$(this).next().text("No");
				});
				
				$('#switch-9').change(function(){
					if($(this).is(':checked'))
						$(this).next().text("Yes");
					else
						$(this).next().text("No");
				});
				
				$('#switch-10').change(function(){
					if($(this).is(':checked'))
						$(this).next().text("Yes");
					else
						$(this).next().text("No");
				});
	
	//////////////////// Dynamically change switch 11&12 based on id //////////////
	<?php if(isset($_GET['id']) && $news['top_stories'] == 1) { ?>
	
				$('#switch-11').change(function(){
					if($(this).is(':checked')) {
						$(this).next().text("Yes");
						
						var slots = $('#main_slots').data('badge');
						$('#main_slots').attr('data-badge', slots); }
					else {
						$(this).next().text("No");
					
						var slots = $('#main_slots').data('badge');
						$('#main_slots').attr('data-badge', slots + 1); }
				});
	
	<?php } else { ?>
		
				$('#switch-11').change(function(){
					if($(this).is(':checked')) {
						$(this).next().text("Yes");
						
						var slots = $('#main_slots').data('badge');
						$('#main_slots').attr('data-badge', slots - 1); }
					else {
						$(this).next().text("No");
					
						var slots = $('#main_slots').data('badge');
						$('#main_slots').attr('data-badge', slots); }
				});
	
	<?php } ?>
	
	
	<?php if(isset($_GET['id']) && $news['carousel_small_news'] == 1) { ?>
	
				$('#switch-12').change(function(){
					if($(this).is(':checked')) {
						$(this).next().text("Yes");
						
						var slots = $('#mini_slots').data('badge');
						$('#mini_slots').attr('data-badge', slots); }
					else {
						$(this).next().text("No");
					
						var slots = $('#mini_slots').data('badge');
						$('#mini_slots').attr('data-badge', slots + 1); }
				});
	<?php } else { ?>
		
				$('#switch-12').change(function(){
					if($(this).is(':checked')) {
						$(this).next().text("Yes");
						
						var slots = $('#mini_slots').data('badge');
						$('#mini_slots').attr('data-badge', slots - 1); }
					else {
						$(this).next().text("No");
					
						var slots = $('#mini_slots').data('badge');
						$('#mini_slots').attr('data-badge', slots); }
				});
	<?php } ?>	
	
	//////////////////// Dynamically change switch 11&12 based on id //////////////
	
	
	
	
	
				
				function _(el) {
			return document.getElementById(el);
		}
		function uploadFile () {
			var file = _("media").files[0];
			var format = _("format").value;
			var newspicf = _("mediapic").files[0];
			var description = CKEDITOR.instances.description.getData();
			var keywords = _("keywords").value;
			var title = _("title").value;
			var author = _("author").value;
			var category = _("sel_category").value;
			var tags = _("tags").value;
			var update = _("update").value;
			
			//alert(file.name+" | "+file.size+" | "+file.type);
			// for switches //////////////////
					if($('#switch-8').is(':checked'))
						var featured_news = 1;
					else
						var featured_news = 0;
					if($('#switch-9').is(':checked'))
						var breaking_news = 1;
					else
						var breaking_news = 0;
					if($('#switch-10').is(':checked'))
						var trending_news = 1;
					else
						var trending_news = 0;
					if($('#switch-11').is(':checked'))
						var top_stories = 1;
					else
						var top_stories = 0;
					if($('#switch-12').is(':checked'))
						var carousel_small_news = 1;
					else
						var carousel_small_news = 0;
			// End for switches //////////////////
				var top_slots = $('#main_slots').data('badge');
				if(top_slots < 1) {
					var top_stories = 0;
				}
	
				var carousel_slots = $('#mini_slots').data('badge');
				if(carousel_slots < 1) {
					var carousel_small_news = 0;
				}
			//alert(carousel_small_news);
					 $('html, body').animate({
						scrollTop: $('#above').offset().top
					}, 200);
			if(category == "no") {
				alert('Create category to proceed');
			} else {
			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_news");
			formdata.append("media", file);
			formdata.append("newspic", newspicf);
			formdata.append("format", format);
			formdata.append("title", title);
			formdata.append("description", description);
			formdata.append("keywords", keywords.replace(/\n/g,"<br>"));
			formdata.append("author", author);
			formdata.append("category", category);
			formdata.append("update", update);
			
			
			formdata.append("tags", tags);
			formdata.append("featured_news", featured_news);
			formdata.append("breaking_news", breaking_news);
			formdata.append("trending_news", trending_news);
			formdata.append("top_stories", top_stories);
			formdata.append("carousel_small_news", carousel_small_news);
			
			var ajax = new window.XMLHttpRequest();
				
			ajax.upload.addEventListener("progress", function(e) {
				
				if(format == 'nomedia') {
					if(e.lengthComputable) {
						$(".ajax_loader").removeClass("hidden");
					}
				} else {
					if(e.lengthComputable) {
					console.log('bytes loaded: ' + e.loaded);
					console.log('Total size: ' + e.loaded);
					console.log('Percentage : ' + (e.loaded / e.loaded) );
					
					var percent = Math.round((e.loaded / e.total) * 100);
					
					$('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
					}
				}
				
			});
				
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_news.php");
			ajax.send(formdata);
			
		}
			
		}
		function completeHandler(event) {
			var sub = event.target.responseText;
			if( sub.substring(0,7) == "success") {
				//alert(sub.substring(0,7));
				//alert(sub.substring(7));
				ajax_succes(sub.substring(7));
				$(".jq-icon-error").css("display", "none");
				
				<?php if(!isset($id)) { ?>
				$("#keywords").val('');
				$("#content").val('');
				$("#title").val('');
				<?php } ?>
				
			}else{
				ajax_error(event.target.responseText);
				$(".jq-icon-success").css("display", "none")
			}
			$(".ajax_loader").addClass("hidden");
			
		}
	
	
	
	
	//////////////////////////
	/////////////////////////
	// For categories //////
		   window.onload = function () {
	
	$('#addcategory').click(function(){
		
		var category = $("#category").val();
		var update = $("#update").val();
		var adder = $("#adder").val();
		
		if(category == '') {
			$('#addcat_warning').removeClass("hidden")
		}
		else {
			
			//alert(category);
			$.ajax({
                   url:"ajax/ajax_add_category.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   task: "add_category",
					   adder: adder,
					   update: update,
					   category: category
                   },
					beforeSend: function() {
						$("#cat_boby").addClass("hidden");
						$("#cat_footer").removeClass('hidden');
					},
                   success:function(data){
					   if(data == 'success'){
						   $("#response").html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+category.toUpperCase()+' Successfully Added</div>');
						   $("#cat_footer").addClass('hidden');
						   $('#addcategory').addClass('hidden');
					   } else {
						    $("#response").html('<div class="alert label-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
						    $("#cat_footer").addClass('hidden');
						    $('#addcategory').addClass('hidden');
					   }
                   },
                   fail:function(data){
					   
                   }
               });
		
		}
	});
			   
			   
	
		$('.updatecategory').click(function(){
		
		var id = $(this).attr('id');
		var category = $("#category"+id).val();
		var old_category = $("#old_"+id).val();
		var update = $("#update"+id).val();
		var adder = $("#adder"+id).val();
		
		if(category == '') {
			$('#addcat_warning'+id).removeClass("hidden")
		}
		else {
			
			//alert(category);
			$.ajax({
                   url:"ajax/ajax_add_category.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   task: "add_category",
					   adder: adder,
					   update: update,
					   category: category
                   },
					beforeSend: function() {
						$("#cat_boby"+id).addClass("hidden");
						$("#cat_footer"+id).removeClass('hidden');
					},
                   success:function(data){
					   if(data == 'success'){
						   $("#response"+id).html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+category.toUpperCase()+' Successfully Added</div>');
						   $("#cat_footer"+id).addClass('hidden');
						   $('.updatecategory').addClass('hidden');
					   } else if(data == 'success_update'){
						   $("#response"+id).html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+old_category.toUpperCase()+' Successfully Updated to '+category.toUpperCase()+'</div>');
						   $("#cat_footer"+id).addClass('hidden');
						   $('.updatecategory').addClass('hidden');
					   } else {
						    $("#response"+id).html('<div class="alert label-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
						    $("#cat_footer"+id).addClass('hidden');
						    $('.updatecategory').addClass('hidden');
					   }
                   },
                   fail:function(data){
					   
                   }
               });
		
		}
	});
			   
	$('.modal_close').click(function(){
		location.reload();
//		$("#response").html('');
//		
//		$("#cat_footer").addClass("hidden");
//		$('#addcat_warning').addClass("hidden");
//		
//		$("#cat_boby").removeClass("hidden");
//		$('#addcategory').removeClass('hidden');
	});
			   
   
       $('.cat_modal').on('hidden.bs.modal',function () {
           location.reload();
       });
	   
   }
		
</script>
  </body>
</html>