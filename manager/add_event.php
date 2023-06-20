<?php

require_once('functions/init.php');

$sub_site_name = "Add Event";
$action = 'Added';

$toast = "event";

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	
	$news_id = select_from_id('events', $id);
	$news = mysqli_fetch_assoc($news_id);
	$sub_site_name = "Update Event";
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
						<a href="all_event.php" id="addRow" class="btn btn-info">
							All Events <i class="fa fa-plus"></i>
						</a>
					</div>
					<div class="btn-group">
						<a href="add_news.php" id="addRow" class="btn btn-pink">
							Add News <i class="fa fa-plus"></i>
						</a>
					</div>
				</div>
			</div>
                            <div class="card">
								<form method="post" action="ajax/ajax_add_news.php" enctype="multipart/form-data">
								<div class="card-body row">
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="title" id ="title" maxlength="100" 
					                     value="<?php if(isset($news)) {echo($news['title']);} ?>">
					                     <label class = "mdl-textfield__label">Event Title</label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" name="location" id ="location" maxlength="200" 
					                     value="<?php if(isset($news)) {echo($news['location']);} ?>">
					                     <label class = "mdl-textfield__label">Event Location</label>
					                  </div>
						            </div>
                                      
								   <div class="col-lg-12 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <textarea class = "mdl-textfield__input" rows =  "4" 
					                        id = "keywords" name="keywords" ><?php if(isset($news)) {echo($news['keywords']);} ?></textarea>
					                     <label class = "mdl-textfield__label" for = "text7">Events Short description or keywords</label>
					                  </div>
						              <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <label style="color: #AAAAAA">Event Full description</label>
				                     	  <div id="summernote"><?php if(isset($news)) {echo($news['description']);} ?></div>
					                        <input type="hidden" id="update" value="<?php if(isset($news)) {echo($news['id']);} else {echo('add');} ?>">
					                  </div>
							       </div>
                                
                                 <!--Image upload dialog--> 
					            <div class="card col-lg-11 p-t-20 m-r-20 m-l-20">
                                    <div class="card-head card-topline-aqua">
                                        <header>
											<?php if(isset($news)) { ?>
											<img src="../uploads/images/events/thumb/<?php echo($news['image']); ?>" alt="" width="60px">
											<label>Update Event image<sup>(optional)</sup>:</label><br>
											<?php }else { ?>
											<label>Choose Event image:</label><br>
						            	 <?php } ?>
                                   		</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
										<label style="font-weight: bold; margin-top: 0%; padding-top: 0">Ideal image size must be width: 500px and height: 333px:</label><br>
										<input type="file" name="mediapic" id="mediapic"/><br>
											</div>
										</div>
                                    </div>
                                </div> 
                                
							   <div class="input-group input-group-sm col-md-6 m-4">
									<span class="input-group-btn">
									  <button type="button" class="btn btn-pink">Date of Event &amp; time Event starts</button>
									</span>
										<input type="text" id="date-format" class="form-control"  placeholder="Date & Time" value="<?php if(isset($news)) {echo($news['start']);} ?>">
								</div>
							   <div class="input-group input-group-sm col-md-6 m-4">
									<span class="input-group-btn">
									  <button type="button" class="btn btn-info">Time Event ends</button>
									</span>
									<input type="text" id="time" class="form-control" placeholder="Time" value="<?php if(isset($news)) {echo($news['end']);} ?>">
								</div>
                                 <!--Image upload dialog end--> 
                                    
								<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
								</div>
								
								<div style="margin-top: 2%; background-color: transparent" class="progress col-lg-12">
									<div id="progressBar" class="progress-bar deepPink-bgcolor" role="progressbar" aria-valuenow="0" aria-valuemin='0' aria-valuemax="100" style="width: 0%;" >
										0%
									</div>
								</div>
						         
							         <div class="col-lg-12 p-t-20 text-center m-t-20"> 
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
	
				
		function _(el) {
			return document.getElementById(el);
		}
	
		function uploadFile () {
			var newspicf = _("mediapic").files[0];
			var description = $("#summernote").summernote('code');
			var keywords = _("keywords").value;
			var title = _("title").value;
			var location = _("location").value;
			var start_time = _("date-format").value;
			var end_time = _("time").value;
			var update = _("update").value;
			
			//alert(file.name+" | "+file.size+" | "+file.type);

					 $('html, body').animate({
						scrollTop: $('#above').offset().top
					}, 200);

			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_news");
			formdata.append("newspic", newspicf);
			formdata.append("start_time", start_time);
			formdata.append("end_time", end_time);
			formdata.append("title", title);
			formdata.append("location", location);
			formdata.append("description", description);
			formdata.append("keywords", keywords.replace(/\n/g,"<br>"));
			formdata.append("update", update);
			
			var ajax = new window.XMLHttpRequest();
				
			ajax.upload.addEventListener("progress", function(e) {
				
					if(e.lengthComputable) {
						$(".ajax_loader").removeClass("hidden");
					}
				
				
			});
				
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_<?php echo($toast); ?>.php");
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