<?php

require_once('functions/init.php');

$sub_site_name = "Add Products";
$action = 'Added';

$toast = "products";

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	
	$products_id = select_from_id('tbl_products', $id);
	$products = mysqli_fetch_assoc($products_id);
	$sub_site_name = "Update Products";
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
						<a href="all_products.php" id="addRow" class="btn btn-pink">
							All products <i class="fa fa-plus"></i>
						</a>
					</div>

					<?php include('webparts/products_modalbuttons.php'); ?>
				</div>
			</div>
                            <div class="card">
								<form method="post" action="ajax/ajax_add_products.php" enctype="multipart/form-data">
								<div class="card-body row">
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="title" id ="title" maxlength="100" 
					                     value="<?php if(isset($products)) {echo($products['title']);} ?>">
					                     <label class = "mdl-textfield__label">Product Name</label>
					                  </div>
						            </div>
                                
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "number" name="title" id ="price" maxlength="100" 
					                     value="<?php if(isset($products)) {echo($products['price']);} ?>">
					                     <label class = "mdl-textfield__label">Product Price (GH₵)</label>
					                  </div>
						            </div>
                                
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "number" name="title" id ="old_price" maxlength="100" 
					                     value="<?php if(isset($products)) {echo($products['old_price']);} ?>">
					                     <label class = "mdl-textfield__label">Old Product Price (GH₵)<sup>(optional)</sup></label>
					                  </div>
						            </div>
                                 <!--Post category select--> 
						            <div class="col-lg-6 p-t-20"> 
									<div class="form-group row">
                                            <label class="col-lg-12 col-md-12 control-label">Select Category
                                            </label><br>
                                            <div class="col-lg-12 col-md-12">
                                                <select class="form-control  select2" id='product_category'>
                                                    <option value="">Select a category</option>
													
						<?php 
							$categories = get_shop_categories();
							if(mysqli_num_rows($categories) > 0) {
								while($category = mysqli_fetch_assoc($categories)) { ?> 

									<optgroup label="<?php echo(ucfirst($category['title'])) ?>">
										<?php 
											$subcategories = get_category_subcategories($category['id']);
											if(mysqli_num_rows($subcategories) > 0) {
											while($subcategory = mysqli_fetch_assoc($subcategories)) { ?> 

												<option 
												 id = 'subcat<?php echo($subcategory['id']) ?>'
												 data-maincat='<?php echo($category['id']) ?>'
												 value="<?php echo($subcategory['id']) ?>"
												 <?php if(isset($products) && ($subcategory['id'] == $products['category'])) echo('selected'); ?>	
												 >
												<?php echo(ucfirst($subcategory['title'])); ?>
												</option>

											<?php }
											} else { ?>
											
											<!-- <option value="0">
												No Sub category available
											</option> -->

											<?php }
										?>
									</optgroup>

								<?php }
							}
								?>
                                                </select>
                                            </div>
                                        </div>

						           	</div>
                                 <!--Post category select end--> 
                                      

							<!--Post brand select--> 
							<div class="col-lg-6 p-t-20"> 
									<div class="form-group row">
                                            <label class="col-lg-12 col-md-12 control-label">Select Brand
                                            </label><br>
                                            <div class="col-lg-12 col-md-12">
                                                <select class="form-control  select2" id='product_brand'>
                                                    <option value="">Select Brand</option>

									<optgroup label="Product Brands">
										<?php 
											$brands = get_shop_brands();
											if(mysqli_num_rows($brands) > 0) {
											while($brand = mysqli_fetch_assoc($brands)) { ?> 

												<option 
												 id = 'subcat<?php echo($brand['id']) ?>'
												 value="<?php echo($brand['id']) ?>"
												 <?php if(isset($products) && ($brand['id'] == $products['brand'])) { echo('selected'); } ?>	
												 >
												<?php echo(ucfirst($brand['title'])); ?>
												</option>

											<?php } ?>
											 <option value="0" <?php if(!isset($products)) {echo('selected');}
												 	elseif(isset($products) &&  ($products['brand'] == 0 || $products['brand'] == '')) { 
														echo('selected');
													 }; ?>>
												Not Applicable
											</option>
											<?php
											} else { ?>
											
											 <option value="0" <?php if(!isset($products)) echo('selected'); ?>>
												Not Applicable
											</option>

											<?php }
										?>
									</optgroup>

                                                </select>
                                            </div>
                                        </div>

						           	</div>
                                 <!--Post brand select end--> 

						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="color" id ="color" maxlength="100" 
					                     value="<?php if(isset($products)) {echo($products['color']);} ?>">
					                     <label class = "mdl-textfield__label">Color <sup>Optional</sup></label>
					                  </div>
						            </div>

								   <div class="col-lg-12 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <label style="color: #AAAAAA">Product Keywords or tags</label>
											<textarea class="form-control keywords" id="keywords" rows="8" name="keywords" placeholder="keywords">
											<?php if(isset($products)) {echo($products['keywords']);} ?>
										  </textarea>
					                  </div>
							       </div>

								   <div class="col-lg-12 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <label style="color: #AAAAAA">Product Full description</label>
											<textarea class="form-control description" id="description" rows="8" name="description" placeholder="Description">
											<?php if(isset($products)) {echo($products['description']);} ?>
										  </textarea>
					                        <input type="hidden" id="update" value="<?php if(isset($products)) {echo($products['id']);} else {echo('add');} ?>">
					                  </div>
							       </div>
                                
                                 <!--Image upload dialog--> 
					            <div class="card col-lg-5 p-t-20 m-r-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($products)) { ?>
											<img src="../uploads/images/shop/thumb/<?php echo($products['image']); ?>" alt="" width="60px">
											<label>Update Product image 1<sup>(optional)</sup>:</label><br>
											<?php }else { ?>
											<label>Choose Product image 1<sup>*</sup>:</label><br>
						            	 <?php } ?>
                                   		</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal Image size should be width: 510px and height: 518px:</label><br>
										<input type="file" name="mediapic" id="mediapic1"/><br>
											</div>
										</div>
                                    </div>
                                </div>  
					            <div class="card col-lg-5 p-t-20 m-r-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($products)) { ?>
											<img src="../uploads/images/shop/thumb/<?php echo($products['image2']); ?>" alt="" width="60px">
											<label>Update Product image 2<sup>(optional)</sup>:</label><br>
											<?php }else { ?>
											<label>Choose Product image 2:</label><br>
						            	 <?php } ?>
                                   		</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal Image size should be width: 510px and height: 518px:</label><br>
										<input type="file" name="mediapic" id="mediapic2"/><br>
											</div>
										</div>
                                    </div>
                                </div> 
					            <div class="card col-lg-5 p-t-20 m-r-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($products)) { ?>
											<img src="../uploads/images/shop/thumb/<?php echo($products['image3']); ?>" alt="" width="60px">
											<label>Update Product image 3<sup>(optional)</sup>:</label><br>
											<?php }else { ?>
											<label>Choose Product image 3:</label><br>
						            	 <?php } ?>
                                   		</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal Image size should be width: 510px and height: 518px:</label><br>
										<input type="file" name="mediapic" id="mediapic3"/><br>
											</div>
										</div>
                                    </div>
                                </div> 
					            <div class="card col-lg-5 p-t-20 m-r-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($products)) { ?>
											<img src="../uploads/images/shop/thumb/<?php echo($products['image4']); ?>" alt="" width="60px">
											<label>Update Product image 4<sup>(optional)</sup>:</label><br>
											<?php }else { ?>
											<label>Choose Product image 4:</label><br>
						            	 <?php } ?>
                                   		</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal Image size should be width: 510px and height: 518px:</label><br>
										<input type="file" name="mediapic" id="mediapic4"/><br>
											</div>
										</div>
                                    </div>
                                </div> 
                                 <!--Image upload dialog end--> 
                                
								<div class="col-lg-4 p-t-20"> 
										<span>Best Seller</span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-10" >
										<input type="checkbox" id="switch-10" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['best_seller'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['best_seller'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span>New Arrival</span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-11" >
										<input type="checkbox" id="switch-11" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['new_arrival'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['new_arrival'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span>Most Wanted</span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-12" >
										<input type="checkbox" id="switch-12" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['most_wanted'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['most_wanted'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span>Featured</span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-13" >
										<input type="checkbox" id="switch-13" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['featured'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['featured'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span><?php if(setting('slot 1 name') != '') { 
											echo(setting('slot 1 name'));
										 } else { echo('Slot 1');} ?></span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-14" >
										<input type="checkbox" id="switch-14" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['slot_1'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['slot_1'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span><?php if(setting('slot 2 name') != '') { 
											echo(setting('slot 2 name'));
										 } else { echo('Slot 2');} ?></span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-15" >
										<input type="checkbox" id="switch-15" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['slot_2'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['slot_2'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span><?php if(setting('slot 3 name') != '') { 
											echo(setting('slot 3 name'));
										 } else { echo('Slot 3');} ?></span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-16" >
										<input type="checkbox" id="switch-16" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['slot_3'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['slot_3'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                
								<div class="col-lg-4 p-t-20"> 
										<span><?php if(setting('slot 4 name') != '') { 
											echo(setting('slot 4 name'));
										 } else { echo('Slot 4');} ?></span> <br>
									<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-17" >
										<input type="checkbox" id="switch-17" class="mdl-switch__input" name"activity"
										<?php if(isset($products) && $products['slot_4'] == 1) {echo('checked');
																						} ?>
										>
										<span class="mdl-switch__label">
										<?php if(isset($products) && $products['slot_4'] == 1) {echo('Yes');} else echo('No') ?>
										</span>
									</label>
								</div>
                                    
								<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
								</div>
								
								<div style="margin-top: 2%; background-color: transparent" class="progress col-lg-12">
									<div id="progressBar" class="progress-bar deepPink-bgcolor" role="progressbar" aria-valuenow="0" aria-valuemin='0' aria-valuemax="100" style="width: 0%;" >
										0%
									</div>
								</div>
						         
							         <div class="col-lg-12 p-t-20 text-center m-t-20"> 
						              	<button type="button"  onClick="uploadFile()" id="add_products_submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</a>
						            </div>
						            <input type="hidden" name="task" value="add_products">
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
		<?php include('webparts/products_modals.php'); ?>
		<?php include('webparts/footer.php'); ?>
	            
<script>
				


	//////////////////// Dynamically change switch 11&12 based on id //////////////
	$('#switch-10').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-11').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-12').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-13').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-14').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-15').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-16').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	$('#switch-17').change(function(){
		if($(this).is(':checked'))
			$(this).next().text("Yes");
		else
			$(this).next().text("No");
	});
	
				
				function _(el) {
			return document.getElementById(el);
		}
		function uploadFile () {
			var productspic1 = _("mediapic1").files[0];
			var productspic2 = _("mediapic2").files[0];
			var productspic3 = _("mediapic3").files[0];
			var productspic4 = _("mediapic4").files[0];
			var title = _("title").value;
			var category = _("product_category").value;
			var brand = _("product_brand").value;
			var keywords = _("keywords").value;
			var color = _("color").value;
			var maincategory = $("#subcat"+category).data('maincat');
			var price = _("price").value;
			var old_price = _("old_price").value;
			var description = CKEDITOR.instances.description.getData();
			var update = _("update").value;
			//alert(category);

			if($('#switch-10').is(':checked'))
				var best_seller = 1;
			else
				var best_seller = 0;
				
			if($('#switch-11').is(':checked'))
				var new_arrival = 1;
			else
				var new_arrival = 0;
				
			if($('#switch-12').is(':checked'))
				var most_wanted = 1;
			else
				var most_wanted = 0;
				
			if($('#switch-13').is(':checked'))
				var featured = 1;
			else
				var featured = 0;
				
			if($('#switch-14').is(':checked'))
				var slot_1 = 1;
			else
				var slot_1 = 0;
			
			if($('#switch-15').is(':checked'))
				var slot_2 = 1;
			else
				var slot_2 = 0;
			
			if($('#switch-16').is(':checked'))
				var slot_3 = 1;
			else
				var slot_3 = 0;
			
			if($('#switch-17').is(':checked'))
				var slot_4 = 1;
			else
				var slot_4 = 0;

			if(category == "") {
				alert('Select category to proceed');
			} else {
			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_products");
			formdata.append("productspic1", productspic1);
			formdata.append("productspic2", productspic2);
			formdata.append("productspic3", productspic3);
			formdata.append("productspic4", productspic4);
			formdata.append("title", title);
			formdata.append("category", category);
			formdata.append("brand", brand);
			formdata.append("keywords", keywords);
			formdata.append("color", color);
			formdata.append("maincategory", maincategory);
			formdata.append("price", price);
			formdata.append("old_price", old_price);
			formdata.append("description", description);
			formdata.append("featured", featured);
			formdata.append("slot_1", slot_1);
			formdata.append("slot_2", slot_2);
			formdata.append("slot_3", slot_3);
			formdata.append("slot_4", slot_4);
			formdata.append("new_arrival", new_arrival);
			formdata.append("most_wanted", most_wanted);
			formdata.append("best_seller", best_seller);
			formdata.append("update", update);
			
			var ajax = new window.XMLHttpRequest();
				
			ajax.upload.addEventListener("progress", function(e) {
				
					if(e.lengthComputable) {
						$(".ajax_loader").removeClass("hidden");
					}
				
			});

			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_products.php");
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
				$("#price").val('');
				$("#old_price").val('');
				$("#title").val('');
				<?php } ?>
			}else{
				ajax_error(event.target.responseText);
				$(".jq-icon-success").css("display", "none")
			}
			$(".ajax_loader").addClass("hidden");
			
		}
	

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
                   url:"ajax/ajax_add_product_category.php",
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
                   url:"ajax/ajax_add_product_category.php",
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
			
	
	$('#addsubcategory').click(function(){
		
		var maincategory = $("#maincategory").val();
		var subcategory = $("#subcategory").val();
		var update = $("#subupdate").val();
		var adder = $("#subadder").val();
		
		if(subcategory == '') {
			$('#addsubcat_warning').removeClass("hidden")
		}
		else {
			
			//alert(category);
			$.ajax({
                   url:"ajax/ajax_add_product_category.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   task: "add_subcategory",
					   adder: adder,
					   update: update,
					   maincategory: maincategory,
					   subcategory: subcategory
                   },
					beforeSend: function() {
						$("#subcat_boby").addClass("hidden");
						$("#subcat_footer").removeClass('hidden');
					},
                   success:function(data){
					   if(data == 'success'){
						   $("#subresponse").html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+subcategory.toUpperCase()+' Successfully Added</div>');
						   $("#subcat_footer").addClass('hidden');
						   $('#addsubcategory').addClass('hidden');
					   } else {
						    $("#subresponse").html('<div class="alert label-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
						    $("#subcat_footer").addClass('hidden');
						    $('#addsubcategory').addClass('hidden');
					   }
                   },
                   fail:function(data){
					   
                   }
               });
		
		}
	});
			   
			   
	
		$('.updatesubcategory').click(function(){
		
		var id = $(this).attr('id');
		var maincategory = $("#maincategory"+id).val();
		var subcategory = $("#subcategory"+id).val();
		var old_category = $("#subold_"+id).val();
		var update = $("#subupdate"+id).val();
		var adder = $("#subadder"+id).val();
		
		if(subcategory == '') {
			$('#addsubcat_warning'+id).removeClass("hidden")
		}
		else {
			
			//alert(category);
			$.ajax({
                   url:"ajax/ajax_add_product_category.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   task: "add_subcategory",
					   adder: adder,
					   update: update,
					   maincategory: maincategory,
					   subcategory: subcategory
                   },
					beforeSend: function() {
						$("#subcat_boby"+id).addClass("hidden");
						$("#subcat_footer"+id).removeClass('hidden');
					},
                   success:function(data){
					   if(data == 'success'){
						   $("#subresponse"+id).html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+subcategory.toUpperCase()+' Successfully Added</div>');
						   $("#subcat_footer"+id).addClass('hidden');
						   $('.subupdatecategory').addClass('hidden');
					   } else if(data == 'success_update'){
						   $("#subresponse"+id).html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+old_category.toUpperCase()+' Successfully Updated to '+subcategory.toUpperCase()+'</div>');
						   $("#subcat_footer"+id).addClass('hidden');
						   $('.subupdatecategory').addClass('hidden');
					   } else {
						    $("#subresponse"+id).html('<div class="alert label-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
						    $("#subcat_footer"+id).addClass('hidden');
						    $('.subupdatecategory').addClass('hidden');
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
		



		
	/////////////////////////
	// For brand //////
	
	$('#addbrand').click(function(){
		
		var brand = $("#brand").val();
		var update = $("#brandupdate").val();
		var adder = $("#brandadder").val();
		
		if(brand == '') {
			$('#addbrand_warning').removeClass("hidden")
		}
		else {
			
			//alert(brand);
			$.ajax({
                   url:"ajax/ajax_add_product_brand.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   task: "add_brand",
					   adder: adder,
					   update: update,
					   brand: brand
                   },
					beforeSend: function() {
						$("#brand_boby").addClass("hidden");
						$("#brand_footer").removeClass('hidden');
					},
                   success:function(data){
					   if(data == 'success'){
						   $("#brandresponse").html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+brand.toUpperCase()+' Successfully Added</div>');
						   $("#brand_footer").addClass('hidden');
						   $('#addbrand').addClass('hidden');
					   } else {
						    $("#brandresponse").html('<div class="alert label-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
						    $("#brand_footer").addClass('hidden');
						    $('#addbrand').addClass('hidden');
					   }
                   },
                   fail:function(data){
					   
                   }
               });
		
		}
	});
			   
			   
	
		$('.updatebrand').click(function(){
		
		var id = $(this).attr('id');
		var brand = $("#brand"+id).val();
		var old_brand = $("#brandold_"+id).val();
		var update = $("#brandupdate"+id).val();
		var adder = $("#brandadder"+id).val();
		
		if(brand == '') {
			$('#addbrand_warning'+id).removeClass("hidden")
		}
		else {
			
			//alert(brand);
			$.ajax({
                   url:"ajax/ajax_add_product_brand.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   task: "add_brand",
					   adder: adder,
					   update: update,
					   brand: brand
                   },
					beforeSend: function() {
						$("#brand_boby"+id).addClass("hidden");
						$("#brand_footer"+id).removeClass('hidden');
					},
                   success:function(data){
					   if(data == 'success'){
						   $("#brandresponse"+id).html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+brand.toUpperCase()+' Successfully Added</div>');
						   $("#brand_footer"+id).addClass('hidden');
						   $('.updatebrand').addClass('hidden');
					   } else if(data == 'success_update'){
						   $("#brandresponse"+id).html('<div class="alert label-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+old_brand.toUpperCase()+' Successfully Updated to '+brand.toUpperCase()+'</div>');
						   $("#brand_footer"+id).addClass('hidden');
						   $('.updatebrand').addClass('hidden');
					   } else {
						    $("#brandresponse"+id).html('<div class="alert label-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>');
						    $("#brand_footer"+id).addClass('hidden');
						    $('.updatebrand').addClass('hidden');
					   }
                   },
                   fail:function(data){
					   
                   }
               });
		
		}
	});
			
	
</script>
  </body>
</html>