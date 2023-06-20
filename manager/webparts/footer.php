        <div class="page-footer p-t-20" style="bottom: 0">
            <div class="page-footer-inner"> <?php echo($year); ?> &copy; <?php echo($site_name); ?>
            <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss"><?php echo($company_name); ?> v 2.0.3</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
        
    </div>
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <script src="assets/plugins/popper/popper.min.js" ></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" ></script>

    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
    <script src="assets/js/theme-color.js" ></script>
    <script src="assets/js/ajax.js" ></script>
    <!-- summernote -->
    <script src="assets/plugins/summernote/summernote.min.js" ></script>
    <script src="assets/js/pages/summernote/summernote-data.js" ></script>
    <!-- counterup -->
    <script src="assets/plugins/counterup/jquery.waypoints.min.js" ></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js" ></script>
	<!-- data tables -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js" ></script>
 	<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
 	<script src="assets/js/pages/table/table_data.js" ></script>
    <!-- material -->
    <script src="assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="assets/js/pages/ui/animations.js" ></script>
    <!-- chart js -->
    <script src="assets/plugins/chart-js/Chart.bundle.js" ></script>
    <script src="assets/plugins/chart-js/utils.js" ></script>
    <script src="assets/js/pages/chart/chartjs/home-data2.js" ></script>
    <!-- dropzone -->
    <script src="assets/plugins/dropzone/dropzone.js" ></script>
    <!-- sparkline -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js" ></script>
	<script src="assets/js/pages/sparkline/sparkline-data.js" ></script>
    <!-- notifications -->
    <script src="assets/plugins/jquery-toast/dist/jquery.toast.min.js" ></script>
    <script src="assets/plugins/jquery-toast/dist/toast.js" ></script>
    <!--tags input-->
    <script src="assets/plugins/jquery-tags-input/jquery-tags-input.js" ></script>
    <script src="assets/plugins/jquery-tags-input/jquery-tags-input-init.js" ></script>
    <!-- Sweet Alert -->
    <script src="assets/plugins/sweet-alert/sweetalert.min.js" ></script>
    <script src="assets/js/pages/sweet-alert/sweet-alert-data.js" ></script>
	<!-- gallery -->
	<script src="assets/plugins/light-gallery/js/lightgallery-all.js"></script> <!-- Light Gallery Plugin Js --> 
	<script src="assets/plugins/light-gallery/js/image-gallery.js"></script>
    <!--select2-->
    <script src="assets/plugins/select2/js/select2.js" ></script>
    <script src="assets/js/pages/select2/select2-init.js" ></script>
	<!-- Date time picker -->
	<script  src="assets/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
	<script  src="assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
	<script  src="assets/plugins/material-datetimepicker/datetimepicker.js"></script>

    <!-- end js include path -->
    <script src="assets/js/ckeditor/ckeditor.js"></script>
    
   <script>
	   
	   ///// delete item /////////////////////////////////////////
		$(".delete_<?php echo($toast); ?>").on("click", function() {	
			//alert('yes');
		var selected = $(this).attr("id");
		var dataid = selected.split("del_<?php echo($toast); ?>_").join("");

		var confirmed = confirm("Are you sure you want to delete this <?php echo($toast); ?> <?php if($toast == 'admin') echo('\n Deleting Admin Would delete all posts created by this admin') ?>"/*+dataid*/);

		if(confirmed == true){
				 $.ajax ({ 
					url:"ajax/ajax_delete_<?php echo($toast); ?>.php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					 success: function(data){
						 if(data == 'deleted') {
							 ajax_delete(data);
							$("#remove_"+dataid).remove();
						 } else{
							  ajax_error(data);
						 }	
					}
				});			
		}


		//alert(selected);
		});  
	   
		$(".delete_category").on("click", function() {	

		var selected = $(this).attr("id");
		var dataid = selected.split("del_category_").join("");

		var confirmed = confirm("Are you sure you want to delete this category?\n Deleting category Would delete all posts associated with it"/*+dataid*/);

		if(confirmed == true){
				 $.ajax ({ 
					url:"ajax/ajax_delete_category.php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					 success: function(data){
						 if(data == 'deleted') {
							 location.reload();
							alert('Category successfully deleted');
							$("#remove_category_"+dataid).remove();
						 } else{
							alert(data);
						 }	
					}
				});			
		}
		});	

	   
		$(".delete_products_category").on("click", function() {	

		var selected = $(this).attr("id");
		var dataid = selected.split("del_category_").join("");

		var confirmed = confirm("Are you sure you want to delete this category?\n Deleting category Would delete all products associated with it"/*+dataid*/);

		if(confirmed == true){
				 $.ajax ({ 
					url:"ajax/ajax_delete_products_category.php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					 success: function(data){
						 if(data == 'deleted') {
							 location.reload();
							alert('Category successfully deleted');
							$("#remove_category_"+dataid).remove();
						 } else{
							alert(data);
						 }	
					}
				});			
		}
		});	
	   /////  ajax error toaster /////////////////////////////////////////
	   function ajax_error(data) {
		   
	   $.toast({
            heading: 'Error <?php if(!isset($_GET['id'])) { echo('adding');} else {echo('updating');} ?>  data',
            text: data,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 15000
            
          });
	   }
	   
	   $(".delete_part").on("click", function() {	

		var selected = $(this).attr("id");
		var table = $(this).data('table');
		var dataid = selected.split("del_"+table+"_").join("");
		if(table != 'brand') {
			var message = "Deleting "+table.toUpperCase()+" Would delete all <?php echo($toast); ?> associated with it";
		} else {
			var message = "Deleting "+table.toUpperCase()+" Would reset brands of all <?php echo($toast); ?> associated with it";
		}

			
		var confirmed = confirm("Are you sure you want to delete this "+table.toUpperCase()+"?\n "+message/*+dataid*/);

		if(confirmed == true){
				$.ajax ({ 
					url:"ajax/ajax_delete_"+table+".php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					success: function(data){
						if(data == 'deleted') {
							<?php if($toast != 'staff'){ ?>
							location.reload();
							<?php } ?>
							alert(table+' successfully deleted');
							$("#remove_"+table+"_"+dataid).remove();
						} else{
							alert(data);
						}	
					}
				});			
		}
		});	

	   /////  ajax success toaster /////////////////////////////////////////
	   function ajax_succes(data) {
           $.toast({
            heading: ' <?php echo(strtoupper($toast)); ?> Successfully <?php echo($action); ?>',
			<?php if($toast != 'admin') { ?>
            text: ['<div class="toast-link"><a href="add_<?php echo($toast); ?>.php?id='+data+'">Edit</a> added <?php echo($toast); ?></div>',
				   '<div class="toast-link"><a href="all_<?php echo($toast); ?>.php">View</a> all <?php echo($toast); ?></div>', 
				   //'<div class="toast-link"><a href="" class="delete_<?php echo($toast); ?>" id="del_<?php echo($toast); ?>_'+data+'" >Delete</a> added <?php //echo($toast); ?><div>'
				  ],
			<?php } ?>
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: false, 
            stack: 6
          });
	   }
	           
	   
	   /////  ajax delete toaster /////////////////////////////////////////
	   function ajax_delete(data) {
	   	$.toast({
            heading: '<?php echo(strtoupper($toast)); ?> Successfully deleted',
            text: '',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 3000, 
            stack: 6
          });
		   
	   }
	   
	   function notify(data){
    	  $.toast({
    		    text: data,
    		    heading: 'Slide transition',
    		    position: 'top-center',
            	loaderBg:'#3f51b5', 
    		    showHideTransition: 'slide',
			  	hideAfter: 2000, 
    		})
	   }
	   <?php if($sub_site_name != 'All Products' || $sub_site_name != 'All News') { ?>
	   	CKEDITOR.replace( 'description' );
	   <?php } ?>
	  
   </script>