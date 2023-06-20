
        <!--   Category Modals  -->
		<style>
			.dataTables_scrollHeadInner{
				width: 100% !important;
			}
			#companyjob_titleModal .dataTables_scrollBody {
				height: 500px !important;
			}
		</style>
        
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
		$categories = get_shop_categories();
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


		           
       	 <!-- Add Sub Category Modals  -->
		<div class="modal fade subcat_modal" id="subcatModal" tabindex="-1" role="dialog" style="display: none; z-index: 100000"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title">Add Sub-category</h5>
                </div>
                <div class="modal-body center">
                	<div id="subcat_boby">
					
					<div class="col-lg-6 p-t-20"> 
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<select class = "mdl-textfield__input" id="maincategory" name="maincategory">
						<?php 
							$categories = get_shop_categories();
							if(mysqli_num_rows($categories) > 0) {
								while($category = mysqli_fetch_assoc($categories)) { ?> 
							
							<option value="<?php echo($category['id']); ?>">
								<?php echo(strtoupper($category['title'])); ?>
							</option>

							<?php }
							} else {echo('<option value="no">No categories created<option/>');}
								?>
						</select>
						<label class = "mdl-textfield__label">Select Main Category</label>
					</div>
					</div>

					  <div class="alert label-danger alert-dismissible hidden" id="addsubcat_warning" role="alert">
					  Sub-category Name cannot be empty
					  </div>
					<div class="col-lg-6 p-b-20"> 
					  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						 <input class = "mdl-textfield__input" type = "text" id = "subcategory" name="subcategory" value="" maxlength="50">
						 <label class = "mdl-textfield__label">Enter Sub-category name</label>
						 <input type="hidden" id="subupdate" value="add">
						 <input type="hidden" id="subadder" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="subcat_footer">
					    <label class = "text-info">Adding Sub-category</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="subresponse">
               			
               		</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" id="addsubcategory">Add Sub-category</button>
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
       	 <!-- Edit subCategory Modals  -->
	 <?php 
		$subcategories = get_shop_subcategories();
		while($subcategory = mysqli_fetch_assoc($subcategories)) { ?> 
			
        <div class="modal fade subcat_modal" id="subcatModal<?php echo($subcategory['id']); ?>" tabindex="-1" role="dialog" style="display: none; z-index: 100000" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <input type="hidden" id="subold_<?php echo($subcategory['id']); ?>" value="<?php echo(strtoupper($subcategory['title'])); ?>" >
                    <h5 class="modal-title">Edit <?php echo(strtoupper($subcategory['title'])); ?> Sub-category</h5>
                </div>
                <div class="modal-body center">
                	<div id="subcat_boby<?php echo($subcategory['id']); ?>">
					
					<div class="col-lg-8 p-t-20"> 
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<select class = "mdl-textfield__input" id="maincategory<?php echo($subcategory['id']); ?>" name="maincategory">
						<?php 
							$categories = get_shop_categories();
							if(mysqli_num_rows($categories) > 0) {
								while($category = mysqli_fetch_assoc($categories)) { ?> 
							
							<option value="<?php echo($category['id']); ?>"
							<?php if($category['id'] == $subcategory['main_category']) echo('selected') ?>
							>
								<?php echo(strtoupper($category['title'])); ?>
							</option>

							<?php }
							} else {echo('<option value="no">No categories created<option/>');}
								?>
						</select>
						<label class = "mdl-textfield__label">Select Main Category</label>
					</div>
					</div>

					  <div class="alert label-danger alert-dismissible hidden " id="addsubcat_warning<?php echo($subcategory['id']); ?>" role="alert">
						Subcategory Name cannot be empty
					  </div>
					<div class="col-lg-6 p-b-20"> 
					  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						 <input class = "mdl-textfield__input" type = "text" id = "subcategory<?php echo($subcategory['id']); ?>" name="category" value="<?php echo(strtoupper($subcategory['title'])); ?>" maxlength="50">
						 <label class = "mdl-textfield__label">Edit Subcategory name</label>
						 <input type="hidden" id="subupdate<?php echo($subcategory['id']); ?>" value="<?php echo($subcategory['id']); ?>">
						 <input type="hidden" id="subadder<?php echo($subcategory['id']); ?>" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="subcat_footer<?php echo($subcategory['id']); ?>">
					    <label class = "text-info">Updating Sub-category</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="subresponse<?php echo($subcategory['id']); ?>">
               			
               		</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link updatesubcategory" id="<?php echo($subcategory['id']); ?>">Update Sub-category</button>
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   	<?php } ?>

	            <!-- All subcategory table  -->
			<div class="modal fade outclose" id="allsubcatModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 1500px">
              <div class="modal-content">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Sub category</header>
                                    <div class="tools">
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            
					<div class="btn-group p-t-10">
						<a href="add_products.php" id="addRow" class="btn btn-warning" data-toggle="modal" data-target="#subcatModal">
							Add Sub category <i class="fa fa-plus"></i>
						</a>
					</div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4_4">
                                        <thead>
                                            <tr>
                                                <th class="center"> # </th>
                                                <th class="center"> Sub category</th>
                                                <th class="center"> Main Category</th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
			$subcategories = get_shop_subcategories(); $x=0;
			while($subcategory = mysqli_fetch_assoc($subcategories)) { $x++; ?> 
										
											<tr class="odd gradeX" id="remove_subcategory_<?php echo($subcategory['id']); ?>">
												<td class="center"><?php echo($x); ?></td>
												<td class=""> <?php echo(strtoupper($subcategory['title'])); ?></td>
												<td class="center"> <?php echo(get_title_from_id($subcategory['main_category'], 'products_categories')); ?></td>
												<td class="center">
													<a class="btn btn-tbl-edit btn-xs" data-toggle="modal" data-target="#subcatModal<?php echo($subcategory['id']); ?>">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs ">
														<i class="fa fa-trash-o delete_part" data-table='subcategory' id="del_subcategory_<?php echo($subcategory['id']); ?>"></i>
													</a>
												</td>
											</tr>
										<?php } ?>
										</tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-link modal_close close_refresh" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
            </div>



			
		           
       	 <!-- Add Brand Modals  -->
            <div class="modal fade brand_modal" id="brandModal" tabindex="-1" role="dialog" style="display: none; z-index: 100000"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title">Add Brands</h5>
                </div>
                <div class="modal-body center">
                	<div id="brand_boby">

					  <div class="alert label-danger alert-dismissible hidden" id="addbrand_warning" role="alert">
					  Brands Name cannot be empty
					  </div>
					<div class="col-lg-6 p-b-20"> 
					  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						 <input class = "mdl-textfield__input" type = "text" id = "brand" name="brand" value="" maxlength="50">
						 <label class = "mdl-textfield__label">Enter Brands name</label>
						 <input type="hidden" id="brandupdate" value="add">
						 <input type="hidden" id="brandadder" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="brand_footer">
					    <label class = "text-info">Adding Brands</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="brandresponse">
               			
               		</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" id="addbrand">Add Brands</button>
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
       	 <!-- Edit brand Modals  -->
	 <?php 
		$brands = get_shop_brands();
		while($brand = mysqli_fetch_assoc($brands)) { ?> 
			
        <div class="modal fade brand_modal" id="brandModal<?php echo($brand['id']); ?>" tabindex="-1" role="dialog" style="display: none; z-index: 100000" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <input type="hidden" id="brandold_<?php echo($brand['id']); ?>" value="<?php echo(strtoupper($brand['title'])); ?>" >
                    <h5 class="modal-title">Edit <?php echo(strtoupper($brand['title'])); ?> Brands</h5>
                </div>
                <div class="modal-body center">
                	<div id="brand_boby<?php echo($brand['id']); ?>">

					  <div class="alert label-danger alert-dismissible hidden " id="addbrand_warning<?php echo($brand['id']); ?>" role="alert">
						brand Name cannot be empty
					  </div>
					<div class="col-lg-6 p-b-20"> 
					  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						 <input class = "mdl-textfield__input" type = "text" id = "brand<?php echo($brand['id']); ?>" name="brand" value="<?php echo(strtoupper($brand['title'])); ?>" maxlength="50">
						 <label class = "mdl-textfield__label">Edit brand name</label>
						 <input type="hidden" id="brandupdate<?php echo($brand['id']); ?>" value="<?php echo($brand['id']); ?>">
						 <input type="hidden" id="brandadder<?php echo($brand['id']); ?>" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="brand_footer<?php echo($brand['id']); ?>">
					    <label class = "text-info">Updating Brands</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="brandresponse<?php echo($brand['id']); ?>">
               			
               		</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link updatebrand" id="<?php echo($brand['id']); ?>">Update Brands</button>
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   	<?php } ?>

	            <!-- All brand table  -->
			<div class="modal fade outclose" id="allbrandModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 1500px">
              <div class="modal-content">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Brand</header>
                                    <div class="tools">
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            
					<div class="btn-group p-t-10">
						<a href="add_products.php" id="addRow" class="btn btn-warning" data-toggle="modal" data-target="#brandModal">
							Add Brand <i class="fa fa-plus"></i>
						</a>
					</div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4_4">
                                        <thead>
                                            <tr>
                                                <th class="center"> # </th>
                                                <th class="center"> Brand</th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
			$brands = get_shop_brands(); $x=0;
			while($brand = mysqli_fetch_assoc($brands)) { $x++; ?> 
										
											<tr class="odd gradeX" id="remove_brand_<?php echo($brand['id']); ?>">
												<td class="center"><?php echo($x); ?></td>
												<td class=""> <?php echo(strtoupper($brand['title'])); ?></td>
												<td class="center">
													<a class="btn btn-tbl-edit btn-xs" data-toggle="modal" data-target="#brandModal<?php echo($brand['id']); ?>">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs ">
														<i class="fa fa-trash-o delete_part" data-table='brand' id="del_brand_<?php echo($brand['id']); ?>"></i>
													</a>
												</td>
											</tr>
										<?php } ?>
										</tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-link modal_close close_refresh" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
            </div>