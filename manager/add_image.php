<?php

require_once('functions/init.php');

$sub_site_name = "Add Image";
$action = 'Added';

$toast = "album";

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
					<?php
						$albums = get_albums($con);
	
						if(mysqli_num_rows(get_albums($con)) == 0) {
							echo('No Album created'); ?> <a href="add_album.php"> Create album </a> <?php
						} else { ?>
					
								<form method="post" action="ajax/ajax_add_album.php" enctype="multipart/form-data">
								<div class="card-body row"> 
						            <div class="col-lg-12 p-t-20 form-group">
										<p>Choose an album:</p>
										<select name="album_id" id="album_id" class="form-control" required>
											<?php
												while ($albumslist = mysqli_fetch_assoc($albums)) { ?>
													<option value="<?php echo($albumslist['album_ID']); ?>"><?php echo($albumslist['name']); ?></option>
												<?php }
											?>
										</select><br>
								   </div>
						            <div class="col-lg-12 p-t-20">
										<label>Choose image to be uploaded:</label><br>
										<input type="file" name="mediapic" id="mediapic"/><br>
								   </div>
								<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
								</div>
							         <div class="col-lg-12 p-t-20 text-center"> 
						              	<button type="button"  onClick="uploadFile()" id="add_news_submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</a>
						            </div>
								</div>
								</form>
					
						<?php }
					?>
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
				function _(el) {
			return document.getElementById(el);
		}
		function uploadFile () {
			var albumpicf = _("mediapic").files[0];
			var album_id = _("album_id").value;
			
					 $('html, body').animate({
						scrollTop: $('#above').offset().top
					}, 200);
			
			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_albumpic");
			formdata.append("albumpic", albumpicf);
			formdata.append("album_id", album_id);
			
			var ajax = new window.XMLHttpRequest();
			ajax.upload.addEventListener("progress", function(e) {
				
				if(e.lengthComputable) {
					$(".ajax_loader").removeClass("hidden");
				}
				
			});
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_album_image.php");
			ajax.send(formdata);
			

			
		}
		function completeHandler(event) {
			var sub = event.target.responseText;
			if( sub.substring(0,7) == "success") {
				//alert(sub.substring(0,7));
				//alert(sub.substring(7));
				ajax_succes(sub.substring(7));
				$(".jq-icon-error").css("display", "none");
				$("#keywords").val('');
				$("#content").val('');
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