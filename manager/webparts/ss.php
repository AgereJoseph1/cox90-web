
		           
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
						 <input type="hidden" id="subupdate" value="add">
						 <input type="hidden" id="subadder" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="brand_footer">
					    <label class = "text-info">Adding Brands</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="subresponse">
               			
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
                   <input type="hidden" id="subold_<?php echo($brand['id']); ?>" value="<?php echo(strtoupper($brand['title'])); ?>" >
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
						 <input type="hidden" id="subupdate<?php echo($brand['id']); ?>" value="<?php echo($brand['id']); ?>">
						 <input type="hidden" id="subadder<?php echo($brand['id']); ?>" value="<?php echo admin_name(); ?>">
					  </div>
					</div>
                	</div>
					<div class="hidden" id="brand_footer<?php echo($brand['id']); ?>">
					    <label class = "text-info">Updating Brands</label><br>
						<div class="mdl-spinner mdl-js-spinner is-active">
						</div>
               		</div>
               		<div id="subresponse<?php echo($brand['id']); ?>">
               			
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
                                                <th class="center"> Main brand</th>
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
												<td class="center"> <?php echo(get_title_from_id($brand['main_brand'], 'products_brands')); ?></td>
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