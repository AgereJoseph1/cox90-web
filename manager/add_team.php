<?php

require_once('functions/init.php');

$sub_site_name = "Add Team Member";
$action = 'Added';

$toast = "team";

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	
	$team_id = select_from_id('team', $id);
	$team = mysqli_fetch_assoc($team_id);
	$sub_site_name = "Update Team Member";
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
								<form method="post" action="ajax/ajax_add_team.php" enctype="multipart/form-data">
								<div class="card-body row">
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="title" id ="title" maxlength="100" 
					                     value="<?php if(isset($team)) {echo($team['title']);} ?>">
					                     <label class = "mdl-textfield__label">Team member name</label>
					                  </div>
						            </div>
                                       <div class="col-lg-12 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="position" id ="position" maxlength="100" 
					                     value="<?php if(isset($team)) {echo($team['position']);} ?>">
					                     <label class = "mdl-textfield__label">Team member position</label>
					                  </div>
							         </div>   
						            <div class="col-lg-12 p-t-20">
						            	<?php if(isset($team)) { ?>
										<img src="../uploads/images/team/thumb/<?php echo($team['image']); ?>" alt="" width="60px">
										<label>Update Team Member image<sup>(optional)</sup>:</label><br>
						            	<?php }else { ?>
										<label>Choose Team Member image:</label><br>
						            	 <?php } ?>
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal image size must be width: 650px and height: 569px:</label><br>
										<input type="file" name="mediapic" id="mediapic"/><br>
								   </div>
								   
								   
                                  
							<div class="col-md-12 p-t-20">
								<div class="card-head">
									<header>SOCIAL MEDIA</header>
								</div>
								<div class="card-body">
									<div class="button-list row">
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-primary waves-effect waves-light">
											<i class="fa fa-facebook m-r-5"></i> Facebook
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-facebook">
										 		 <input type="checkbox" id="switch-facebook" data-social="facebook" class="mdl-switch__input" <?php if(isset($team) && $team['facebook_status'] == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(isset($team) && $team['facebook_status'] == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter Facebook link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(isset($team) && $team['facebook_status'] == 0) {echo('hidden');} if(!isset($team)) echo('hidden');?>" type = "text" name="facebook" id ="facebook" 
											 value="<?php if(isset($team) && $team['facebook'] != '') {echo($team['facebook']);}?>">
									</div>
									
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-twitter waves-effect waves-light">
											<i class="fa fa-twitter m-r-5"></i> Twitter
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-twitter">
										 		 <input type="checkbox" id="switch-twitter" data-social="twitter" class="mdl-switch__input" <?php if(isset($team) && $team['twitter_status'] == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(isset($team) && $team['twitter_status'] == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter twitter link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(isset($team) && $team['twitter_status'] == 0) {echo('hidden');} if(!isset($team)) echo('hidden');?>" type = "text" name="twitter" id ="twitter" 
											 value="<?php if(isset($team) && $team['twitter'] != '') {echo($team['twitter']);}?>">
									</div>
									
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-instagram waves-effect waves-light">
											<i class="fa fa-instagram m-r-5"></i> Instagram
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-instagram">
										 		 <input type="checkbox" id="switch-instagram" data-social="instagram" class="mdl-switch__input" <?php if(isset($team) && $team['instagram_status'] == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												   <?php if(isset($team) && $team['instagram_status'] == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter instagram link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(isset($team) && $team['instagram_status'] == 0) {echo('hidden');} if(!isset($team)) echo('hidden');?>" type = "text" name="instagram" id ="instagram" 
											 value="<?php if(isset($team) && $team['instagram'] != '') {echo($team['instagram']);}?>">
									</div>
									</div>
						</div>
                    </div>
                    
                    
								<input type="hidden" id="update" value="<?php if(isset($team)) {echo($team['id']);} else {echo('add');} ?>">
								<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
								</div>
							         <div class="col-lg-12 p-t-20 text-center"> 
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
		    
		    
		    
		    
		    
<script>
	
	
	
	///////////////////////////////////////////////Switch toggle //////////////
	$('.mdl-switch__input').change(function(){
		
					if($(this).is(':checked')) {
						
						var social = $(this).attr('data-social');
						//alert(social);
						$('#'+social).removeClass('hidden');
						$(this).next().text("Yes");		
						
					}
					else {
						
						var social = $(this).attr('data-social');
						//alert(social);
						$('#'+social).addClass('hidden');
						$(this).next().text("No"); 
						
					}
		
				});
	
	
				function _(el) {
			return document.getElementById(el);
		}
		function uploadFile () {
			var newspicf = _("mediapic").files[0];
			var position = _("position").value;
			var title = _("title").value;
			var update = _("update").value;
			
			
			var facebook = _("facebook").value;
			var instagram = _("instagram").value;
			var twitter = _("twitter").value;
			
			// for switches //////////////////
			
					if($('#switch-facebook').is(':checked'))
						var facebook_status = 1;
					else
						var facebook_status = 0;
					if($('#switch-instagram').is(':checked'))
						var instagram_status = 1;
					else
						var instagram_status = 0;
					if($('#switch-twitter').is(':checked'))
						var twitter_status = 1;
					else
						var twitter_status = 0;
			// End for switches //////////////////
			
			
					 $('html, body').animate({
						scrollTop: $('#above').offset().top
					}, 200);
			
			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_news");
			formdata.append("newspic", newspicf);
			formdata.append("title", title);
			formdata.append("position", position);
			formdata.append("update", update);
			
			
			formdata.append("facebook_status", facebook_status);
			formdata.append("instagram_status", instagram_status);
			formdata.append("twitter_status", twitter_status);
			
			formdata.append("facebook", facebook);
			formdata.append("instagram", instagram);
			formdata.append("twitter", twitter);
			
			
			var ajax = new window.XMLHttpRequest();
			ajax.upload.addEventListener("progress", function(e) {
				
				if(e.lengthComputable) {
					$(".ajax_loader").removeClass("hidden");
				}
				
			});
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_team.php");
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
				
				

	CKEDITOR.replace( 'description' );
	   
	</script>
  </body>
</html>