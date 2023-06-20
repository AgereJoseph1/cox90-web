<?php

require_once('functions/init.php');

//$action = 'Added';

//$toast = "album";

if(isset($_GET['id']) && isset($_GET['name'])) {
	
	$id = (int)$_GET['id'];
	$name = clean($_GET['name']);
	
} else {
	header('Location: all_album.php');
}


$sub_site_name = "Add Multiple Images to ".$name." album";
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
								<div class="card-body" id="bar-parent">
									<form id="my-awesome-dropzone" action="ajax/ajax_add_album_image.php?id=<?php echo($id); ?>" class="dropzone form-horizontal dz-clickable"><div class="dz-default dz-message"><div class="dropIcon"><i class="material-icons">cloud_upload</i></div>
									<span>Click or Drop files here to upload</span><br><span>Image size should not be more than 2MB</span></div></form>
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
  </body>
</html>