<?php

require_once('functions/init.php');

$sub_site_name = $site_name.' details';

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
                     <div>
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                </div>
                                <div class="card-body ">
									<div >
									  <div>
										<?php $sql= "SELECT * FROM settings ORDER BY NAME ASC";
															$result = query($sql);

													while($setting = mysqli_fetch_assoc($result)) { 
														
										  	if(($setting['name'] == "access" || $setting['name'] == "dev_email" || $setting['name'] == "dev_contact" || $setting['name'] == "dev_website" || $setting['name'] == "dev_address" || $setting['name'] == "dev_restricted_message") && $user['id'] != 1) continue;  
														
										  ?>

										<div class="input-group input-group-sm col-md-8 col-sm-12 p-2 offset-md-2">
                                                <span class="input-group-btn m-1">
											  <button type="button" class="btn btn-info" id="button_<?php echo($setting['id']); ?>"><?php echo($setting['name']); ?></button>
												</span>
                                                <input type="<?php if($setting['name'] == 'Email') {echo('email');} else {echo('text');}?>" class="form-control m-1 " id="setting_<?php echo($setting['id']); ?>" value="<?php echo($setting['content']); ?>">
                                                <span class="input-group-btn m-1">
                                                <div class="response">
											 		 <button type="button" class="btn btn-pink update_setting loader" id="<?php echo($setting['id']); ?>" data-name="<?php echo($setting['name']); ?>">Update</button>
                                                </div>
											</span>
                                        </div>

										<?php } ?>
										
										
										
								 <!--Media upload dialog--> 
					           <!--  <div class="card col-lg-5 p-t-20 m-l-20 center">
                                   <div class="card-head card-topline-aqua">
                                        <header>
											<?php /*if(single_image('video') != '') { ?>
											<label>Update Home Background Video<sup>(optional)</sup>:</label>
												<div class="btn-group">
													<a href="" id="addRow" class="btn btn-pink"  data-toggle="modal" data-target="#myModalmedia">
														View <?php if(ext(single_image('video')) == 'mp4'){ echo(' Video'); }else{ echo(' Audio'); } ?> attached+ <i class="fa fa-plus"></i>
													</a>
												</div>
											<?php }else { ?>
											<label>Choose Home Background Video:</label>
											 <?php }*/ ?>
                                        </header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
												<div class="col-lg-6 p-t-20"> 
												  <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
															<select  class = "mdl-textfield__input" id="format" >
															<option value="video" selected> Video </option>
															</select>
													 <label class = "mdl-textfield__label">Upload media type:</label>
												  </div>
												</div>
												<div class="col-lg-6 p-t-10">
													<input type="file" name="media" id="media"/>
												</div>
										
								<div style="margin-top: 2%; background-color: transparent" class="progress col-lg-12">
									<div id="progressBar" class="progress-bar deepPink-bgcolor" role="progressbar" aria-valuenow="0" aria-valuemin='0' aria-valuemax="100" style="width: 0%;" >
										0%
									</div>
								</div>
											</div>
										</div>
                                    </div>
                                    
								 <button type="button" class="btn-sm btn-pink loader m-b-20" id="video_submit"  onClick="uploadFile()">Update</button>
                                </div>-->
                                 <!--Media upload dialog end-->
									 </div>

                                  </div>
                                </div>
                          </div>
                          
                          
							<div class="card  card-box">
								<div class="card-head">
									<header>SOCIAL MEDIA</header>
								</div>
								<div class="card-body ">
									<div class="button-list row">
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-primary waves-effect waves-light">
											<i class="fa fa-facebook m-r-5"></i> Facebook
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-facebook">
										 		 <input type="checkbox" id="switch-facebook" data-social="facebook" class="mdl-switch__input" <?php if(social('status', 'facebook') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'facebook') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter Facebook link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'facebook') == 0) {echo('hidden');}?>" type = "text" name="facebook" id ="facebook" 
											 value="<?php if(social('link', 'facebook') != '') {echo(social('link', 'facebook'));}?>">
									</div>
									
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-twitter waves-effect waves-light">
											<i class="fa fa-twitter m-r-5"></i> Twitter
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-twitter">
										 		 <input type="checkbox" id="switch-twitter" data-social="twitter" class="mdl-switch__input" <?php if(social('status', 'twitter') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'twitter') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter twitter link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'twitter') == 0) {echo('hidden');}?>" type = "text" name="twitter" id ="twitter" 
											 value="<?php if(social('link', 'twitter') != '') {echo(social('link', 'twitter'));}?>">
									</div>
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-linkedin waves-effect waves-light">
											<i class="fa fa-linkedin m-r-5"></i> Linkedin
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-linkedin">
										 		 <input type="checkbox" id="switch-linkedin" data-social="linkedin" class="mdl-switch__input" <?php if(social('status', 'linkedin') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'linkedin') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter linkedin link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'linkedin') == 0) {echo('hidden');}?>" type = "text" name="linkedin" id ="linkedin" 
											 value="<?php if(social('link', 'linkedin') != '') {echo(social('link', 'linkedin'));}?>">
									</div>
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-youtube waves-effect waves-light">
											<i class="fa fa-youtube m-r-5"></i> Youtube
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-youtube">
										 		 <input type="checkbox" id="switch-youtube" data-social="youtube" class="mdl-switch__input" <?php if(social('status', 'youtube') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'youtube') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter youtube link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'youtube') == 0) {echo('hidden');}?>" type = "text" name="youtube" id ="youtube" 
											 value="<?php if(social('link', 'youtube') != '') {echo(social('link', 'youtube'));}?>">
									</div>
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-googleplus waves-effect waves-light">
											<i class="fa fa-google-plus m-r-5"></i> google
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-google">
										 		 <input type="checkbox" id="switch-google" data-social="google" class="mdl-switch__input" <?php if(social('status', 'google') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'google') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter google link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'google') == 0) {echo('hidden');}?>" type = "text" name="google" id ="google" 
											 value="<?php if(social('link', 'google') != '') {echo(social('link', 'google'));}?>">
									</div>
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-pinterest waves-effect waves-light">
											<i class="fa fa-pinterest m-r-5"></i> Pinterest
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-pinterest">
										 		 <input type="checkbox" id="switch-pinterest" data-social="pinterest" class="mdl-switch__input" <?php if(social('status', 'pinterest') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'pinterest') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter pinterest link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'pinterest') == 0) {echo('hidden');}?>" type = "text" name="pinterest" id ="pinterest" 
											 value="<?php if(social('link', 'pinterest') != '') {echo(social('link', 'pinterest'));}?>">
									</div>
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-dribbble waves-effect waves-light">
											<i class="fa fa-dribbble m-r-5"></i> Dribbble
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-dribble">
										 		 <input type="checkbox" id="switch-dribble" data-social="dribble" class="mdl-switch__input" <?php if(social('status', 'dribble') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'dribble') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter dribble link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'dribble') == 0) {echo('hidden');}?>" type = "text" name="dribble" id ="dribble" 
											 value="<?php if(social('link', 'dribble') != '') {echo(social('link', 'dribble'));}?>">
									</div>
									
									<div class="col-md-3 center m-b-10">
										<button type="button" class="btn btn-instagram waves-effect waves-light">
											<i class="fa fa-instagram m-r-5"></i> Instagram
											<div class="p-t-20"> 
												<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-instagram">
										 		 <input type="checkbox" id="switch-instagram" data-social="instagram" class="mdl-switch__input" <?php if(social('status', 'instagram') == 1) {echo('checked');} ?>>
												  <span class="mdl-switch__label">
												  <?php if(social('status', 'instagram') == 1) {echo('Yes');} else echo('No') ?>
												  </span>
												</label>
											</div>
										</button>
											 <input placeholder="Enter instagram link" class = "mdl-textfield__input social_link center m-t-20 m-b-10 <?php if(social('status', 'instagram') == 0) {echo('hidden');}?>" type = "text" name="instagram" id ="instagram" 
											 value="<?php if(social('link', 'instagram') != '') {echo(social('link', 'instagram'));}?>">
									</div>
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
        
             	 <?php /*if(single_image('video') != '') { ?>
       	 <!-- Video Modals  -->
        <div class="modal fade cat_modal" id="myModalmedia" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Home background Video</h5>
                </div>
                <div class="modal-body center">
                	<div id="cat_boby">
					<div class="col-lg-12"> 
											
									<div class="center-block">
										  <video id="video" class='audio' controls width="100%" >
											<source src="../uploads/media/<?php echo(single_image('video')); ?>" type="video/mp4" />
											<p> Your browser does not support this feature to play</p>
											</video>
									</div>
										
					</div>
                	</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
   	 </div>
   	 <?php }*/ ?>
   	 
<script>
	CKEDITOR.replace( 'description' );
</script>
<script>	
	
	
   window.onload = function () {

///////////////////////////////////////////////update blog settings //////////////
	$('.update_setting').click(function(){
		
		var settingID = $(this).attr('id');
		var setting = $('#setting_'+settingID).val();
		var name_btn = $("#button_"+settingID).text();
		var name = $(this).data('name');
		//alert(setting);
		
		$.ajax({
                   url:"ajax/ajax_update_settings.php",
                   method: "POST",
                   dataType: "html",
                   data:{
					   idselect: settingID,
					   description: setting
                   },
					beforeSend: function() {
							$("#"+settingID).text(' updating...');
							$("#button_"+settingID).removeClass('btn-success');
					},
                   success:function(data){
					   if(data == "success") {
						    $("#button_"+settingID).removeClass('btn-info').addClass('btn-success');
						   $("#button_"+settingID).text(name + ' UPDATED');
							$("#"+settingID).text('update');
					   }
                   },
                   fail:function(data){
					   
                   }
               });
		
	});
	
///////////////////////////////////////////////update status of social media //////////////
	$('.mdl-switch__input').change(function(){
		
					if($(this).is(':checked')) {
						
						var social = $(this).attr('data-social');
						//alert(social);
						$('#'+social).removeClass('hidden');
						$(this).next().text("Yes");		
						
						$.ajax({
								   url:"ajax/ajax_update_social.php",
								   method: "POST",
								   dataType: "html",
								   data:{
									   social: social,
									   col:'status',
									   value: 1,
								   },
									beforeSend: function() {
											notify('Updating '+social);
									},
								   success:function(data){
									   if(data == 'success'){
											notify(social+' updated successfully');
									   } else {
											notify('Error updating '+social);
									   }
								   },
								   fail:function(data){

								   }
							   });
						
					}
					else {
						
						var social = $(this).attr('data-social');
						//alert(social);
						$('#'+social).addClass('hidden');
						$(this).next().text("No"); 
						
						$.ajax({
								   url:"ajax/ajax_update_social.php",
								   method: "POST",
								   dataType: "html",
								   data:{
									   social: social,
									   col:'status',
									   value: 0,
								   },
									beforeSend: function() {
											notify('Updating '+social);
									},
								   success:function(data){
									   if(data == 'success'){
											notify(social+' updated successfully');
									   } else {
											notify('Error updating '+social);
									   }
								   },
								   fail:function(data){

								   }
							   });
						
					}
		
				});
	
///////////////////////////////////////////////update url of social media //////////////
	$('.social_link').change(function(){
		
						var social = $(this).attr('id');
						//alert(social);
						var value = $('#'+social).val();
		
						$.ajax({
								   url:"ajax/ajax_update_social.php",
								   method: "POST",
								   dataType: "html",
								   data:{
									   social: social,
									   col:'link',
									   value: value,
								   },
									beforeSend: function() {
											notify('Updating '+social);
									},
								   success:function(data){
									   if(data == 'success'){
											notify(social+' updated successfully');
									   } else {
											notify('Error updating '+social);
									   }
								   },
								   fail:function(data){

								   }
							   });
		
				});
	   
	   
	   
   }
   
   		function _(el) {
			return document.getElementById(el);
		}
	
	
		function uploadFile () {
			var file = _("media").files[0];
			var format = _("format").value;
			

			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_video");
			formdata.append("media", file);
			formdata.append("format", format);
			
			var ajax = new window.XMLHttpRequest();
				
			ajax.upload.addEventListener("progress", function(e) {
				
					
					if(e.lengthComputable) {
					console.log('bytes loaded: ' + e.loaded);
					console.log('Total size: ' + e.loaded);
					console.log('Percentage : ' + (e.loaded / e.loaded) );
					
					var percent = Math.round((e.loaded / e.total) * 100);
					
					$('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
					}
				
				
			});
				
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_upload_video.php");
			ajax.send(formdata);
			
		}
			
				function completeHandler(event) {
			var sub = event.target.responseText;
			if( sub.substring(0,7) == "success") {
				//alert(sub.substring(0,7));
				//alert(sub.substring(7));
				$("#video_submit").removeClass('btn-pink').addClass('btn-success');
			   $("#video_submit").text('Video UPDATED');
				$(".jq-icon-error").css("display", "none");
			}else{
				ajax_error(event.target.responseText);
				$(".jq-icon-success").css("display", "none")
			}
			$(".ajax_loader").addClass("hidden");
			
		}
</script>
</html>