<?php

require_once('functions/init.php');

$sub_site_name = "All News";

$toast = "news";

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
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <a href="add_news.php" id="addRow" class="btn btn-pink">
                                                    Add News <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
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
                                            <div class="btn-group">
                                                <a href="add_news.php" id="addRow" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                                    Add category <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                            	<th class="center"> img </th>
                                                <th class="center"> # </th>
                                                <th class="center"> Headline </th>
                                                <th class="center"> Description </th>
                                                <th class="center"> Keywords </th>
                                                <th class="center"> Author </th>
                                                <th class="center"> Category </th>
                                                <th class="center"> Media </th>
                                                <th class="center"> Response </th>
                                                <th class="center"> Date added </th>
                                                <!--<th class="center"> Also In </th>-->
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $all_news = get_news(); $x=1;
											while($news = mysqli_fetch_assoc($all_news)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($news['id']); ?>">
												<td class="">
														<img src="../uploads/images/news/thumb/<?php echo($news['image']); ?>" alt="" width="60px">
												</td>
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><?php echo($news['title']); ?></td>
												<td class="center"><?php echo(substr($news['description'], 0, 400)); ?></td>
												<td class="center"><?php echo(substr($news['keywords'], 0, 200)); ?></td>
												<td class="center"><?php echo(author($news['author'])); ?></td>
												<td class="center"><label class="label label-sm label-warning"><?php echo(substr($news['category'], 0, 200)); ?></label></td>
												<td class="center">
													<?php if($news['media'] != '') {
																if(ext($news['media']) == 'mp4'){ 
																	echo(' Video'); 
																}else{ 
																	echo(' Audio'); 
																}
															} else echo('None'); ?>
												</td>
												<td class="center">
													<button data-toggle="button" class="btn btn-circle btn-primary" style="margin-bottom: 3px;"><i class="fa fa-comments-o"></i><?php echo(comment_count($news['id'])); ?></button><br>
													<button data-toggle="button" class="btn btn-circle btn-pink"><i class="fa fa-eye "></i><?php echo($news['views']); ?></button>
												</td>
												<td class="center"><?php echo(date("jS M, Y", strtotime( $news['date']))); ?></td>
												<!--<td class="center">
												
													<?php /*if(isset($news) && $news['top_stories'] == 1) { ?>
													<label class="label label-sm label-pink"><?php echo('Top stories'); ?></label><br>
													<?php } ?>
													
													<?php if(isset($news) && $news['carousel_small_news'] == 1) { ?>
													<label class="label label-sm label-event"><?php echo('Carousel news'); ?></label><br>
													<?php } ?>
													
													<?php if(isset($news) && $news['breaking_news'] == 1) { ?>
													<label class="label label-sm label-danger"><?php echo('Breaking news'); ?></label><br>
													<?php } ?>
													
													<?php if(isset($news) && $news['featured_news'] == 1) { ?>
													<label class="label label-sm label-primary"><?php echo('Featured news'); ?></label><br>
													<?php } ?>
													
													<?php if(isset($news) && $news['trending_news'] == 1) { ?>
													<label class="label label-sm label-warning"><?php echo('Trending news'); ?></label><br>
													<?php }*/ ?>
												</td>-->
												<td class="center">
													<a href="add_news.php?id=<?php echo($news['id']); ?>" class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs delete_news" id="del_news_<?php echo($news['id']); ?>">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											
											<?php  $x++;  } ?>
										</tbody>
                                    </table>
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
        
        <!--   Category Modals  -->
        
        
       	 <!-- Add Category Modals  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
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
			
        <div class="modal fade" id="myModal<?php echo($category['id']); ?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
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
    <script>
		
	
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
			   
   
       $('.modal').on('hidden.bs.modal',function () {
           location.reload();
       });
	   
   }
		
	</script>
    
</html>