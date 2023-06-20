<?php

require_once('functions/init.php');

$sub_site_name = "Add Advertisement";
$action = 'Added';

$toast = "advertisement";

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	
	$advertisement_id = select_from_id('advertisements', $id);
	$advertisement = mysqli_fetch_assoc($advertisement_id);
	$sub_site_name = "Update Advertisement";
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
                            <div class="card card-box">
								<form method="post" action="ajax/ajax_add_category.php" enctype="multipart/form-data">
								<div class="card-body row">
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="title" id ="title" maxlength="100" 
					                     value="<?php if(isset($advertisement)) {echo($advertisement['title']);} ?>">
					                     <label class = "mdl-textfield__label">Advertisement Name</label>
					                  </div>
						            </div>
                                     <div class="col-lg-12"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type ="text" name="url" id ="url" maxlength="100" 
					                     value="<?php if(isset($advertisement)) {echo($advertisement['url']);} ?>">
					                     <label class = "mdl-textfield__label" for = "text7">Url of image <sup>(optional)</sup></label>
					                     
										   <div class="input-group input-group-sm col-md-6 m-4">
                                            <span class="input-group-btn">
											  <button type="button" class="btn btn-info">Expiration Time in Seconds</button>
											</span>
												<input type="text" id="date" class="form-control"  placeholder="Date" value="<?php if(isset($advertisement)) {echo($advertisement['expire']);} ?>">
                                            </div>
							         

					                <label class = "text-purple" for = "text7">Select position of advertisement image</label>
									<div class="btn-group radioall" data-toggle="buttons">
									<?php if(!isset($advertisement) 
											 || (($advertisement['position'] == "header") 
											 || ($advertisement['position'] == "page-top" ) 
											 || ($advertisement['position'] == "page-bottom" ))) 
										 { ?>
										<label class="btn btn-primary long deepPink-bgcolor m-2">
											<input type="radio" class="radio1" id="radio1" name="position" value="header" <?php if(isset($advertisement) && ($advertisement['position'] == "header")) echo('checked'); ?>> Header
										</label>
										<label class="btn btn-primary long deepPink-bgcolor m-2">
											<input type="radio" class="radio1" id="radio2" name="position" value="page-top" <?php if(isset($advertisement) && ($advertisement['position'] == "page-top")) echo('checked'); ?>> Page Top
										</label>
										<label class="btn btn-primary long deepPink-bgcolor m-2">
											<input type="radio" class="radio1" id="radio3"  name="position" value="page-bottom" <?php if(isset($advertisement) && ($advertisement['position'] == "page-bottom")) echo('checked'); ?>> Page Bottom
										</label>
									<?php } ?>
									<?php if(!isset($advertisement) || (($advertisement['position'] == "aside-top") || ($advertisement['position'] == "aside-bottom"))) { ?>
										<label class="btn btn-primary short deepPink-bgcolor m-2">
											<input type="radio" class="radio1" id="radio4"  name="position" value="aside-top" <?php if(isset($advertisement) && ($advertisement['position'] == "aside-top")) echo('checked'); ?>> Aside Top
										</label>
										<label class="btn btn-primary short deepPink-bgcolor m-2">
											<input type="radio" class="radio1" id="radio5"  name="position" value="aside-bottom" <?php if(isset($advertisement) && ($advertisement['position'] == "aside-bottom")) echo('checked'); ?>> Aside Bottom
										</label>
									<?php } ?>
									</div>
                                            
											<div class="col-lg-12">
												<?php if(isset($advertisement)) { ?>
												<img src="../uploads/images/ads/<?php echo($advertisement['image']); ?>" class="m-t-20 m-b-10" alt="" width="20%">
												
												<button type="button" class="btn btn-warning btn-block ">Update Advertisement image<sup> (optional)</sup>:</button>
												<?php }else { ?>
												<button type="button" class="btn btn-warning btn-block m-t-20">Choose Advertisement image:</button>
												 <?php } ?>
												<button type="button" class="btn btn-block m-b-20 label-danger text-white" id="size">Click position to see image size to upload</button>
												<input type="file" name="mediapic" id="mediapic"/><br>
										   </div>  
					                  </div>
							         </div>
    
								<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
								</div>
							         <div class="col-lg-12 p-t-20 text-center">
										<input type="hidden" id="update" value="<?php if(isset($advertisement)) {echo($advertisement['id']);} else {echo('add');} ?>"> 
						              	<button type="button"  onClick="uploadFile()" id="add_news_submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</a>
						            </div>
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
		    <script>
				
			$('.short').click(function(){
				$('#size').text('Image size must be width: 300px and height: 250px');
				$('#size').removeClass('label-danger').removeClass('label-primary').addClass('label-event');
			});
			$('.long').click(function(){
				$('#size').text('Image size must be width: 728px and height: 90px')
				$('#size').removeClass('label-danger').removeClass('label-event').addClass('label-primary');
			});
				
				
				function _(el) {
			return document.getElementById(el);
			}
		function uploadFile () {
			var newspicf = _("mediapic").files[0];
			var title = _("title").value;
			var expire = _("date").value;
			var url = _("url").value;
			var position = $('.radio1:checked').val();
			var update = _("update").value;
			
					 $('html, body').animate({
						scrollTop: $('#above').offset().top
					}, 200);
			//alert(position);
			var formdata = new FormData();
			formdata.append("task", "add_advertisements");
			formdata.append("image", newspicf);
			formdata.append("title", title);
			formdata.append("expire", expire);
			formdata.append("url", url);
			formdata.append("position",position);
			formdata.append("update", update);
			
			var ajax = new window.XMLHttpRequest();
			ajax.upload.addEventListener("progress", function(e) {
				
				if(e.lengthComputable) {
					$(".ajax_loader").removeClass("hidden");
				}
				
			});
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_advertisement.php");
			ajax.send(formdata);
			

			
		}
		function completeHandler(event) {
			var sub = event.target.responseText;
			if( sub.substring(0,7) == "success") {
				//alert(sub.substring(0,7));
				//alert(sub.substring(7));
				ajax_succes(sub.substring(7));
				$(".jq-icon-error").css("display", "none");
				$("#discount_price").val('');
				$("#discount_text").val('');
				$("#actual_price").val('');
				$("#title").val('');
			}else{
				ajax_error(event.target.responseText);
				$(".jq-icon-success").css("display", "none")
			}
			$(".ajax_loader").addClass("hidden");
			
		}
	</script>
  </body>
</html>