					<!--Categories start-->
					<div class="btn-group">
						  <button type="button" class="btn btn-info">Edit | Delete Main Category</button>
						  <button type="button" class="btn btn-info dropdown-toggle m-r-20" data-toggle="dropdown">
							  <i class="fa fa-angle-down"></i>
						  </button>
						  <ul class="dropdown-menu" role="menu" style="max-height: 700px; overflow-y: scroll">
							 <?php 
								$categories = get_shop_categories();
							  if(mysqli_num_rows($categories) > 0) {
								  while($category = mysqli_fetch_assoc($categories)) { ?> 

									  <li class="col-md-12 center p-b-20" id="remove_category_<?php echo($category['id']); ?>"><a><?php echo(strtoupper($category['title'])); ?>

										<a class="btn btn-xs "  data-toggle="modal" data-target="#myModal<?php echo($category['id']); ?>">
											<span>Edit</span> <i class="fa fa-pencil"></i>
										</a>
										<a class="btn btn-xs delete_products_category" id="del_category_<?php echo($category['id']); ?>">
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
						<a href="add_products.php" id="addRow" class="btn btn-info" data-toggle="modal" data-target="#myModal">
							Add Main category <i class="fa fa-plus"></i>
						</a>
					</div>




                    	<!--Sub Categories start-->
				
					<div class="btn-group p-t-10">
						<a href="add_products.php" id="addRow" class="btn btn-info" data-toggle="modal" data-target="#allsubcatModal">
							Edit | Delete Sub category <i class="fa fa-plus"></i>
						</a>
					</div>

					<div class="btn-group p-t-10">
						<a href="add_products.php" id="addRow" class="btn btn-warning" data-toggle="modal" data-target="#subcatModal">
							Add Sub category <i class="fa fa-plus"></i>
						</a>
					</div>
					<!--Categories end-->
					
					<div class="btn-group p-t-10">
						<a  id="addRow" class="btn btn-info" data-toggle="modal" data-target="#allbrandModal">
							Edit | Delete Brand <i class="fa fa-plus"></i>
						</a>
					</div>

					<div class="btn-group p-t-10">
						<a  id="addRow" class="btn btn-warning" data-toggle="modal" data-target="#brandModal">
							Add Brand <i class="fa fa-plus"></i>
						</a>
					</div>