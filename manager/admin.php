<?php

require_once('functions/init.php');

$sub_site_name = "Add Admin";
$action = 'Added';

	  if (isset($_GET['id'])) {
		  
		  $id = (int)$_GET['id'];
		  $q = "SELECT * FROM admin WHERE id = $id";
		  $r = mysqli_query($con, $q);
		  
		  $opened = mysqli_fetch_assoc($r);
		  $sub_site_name = "Update Admin";
		  $action = 'Updated';
	  }/* else {
		  $id = $user['id'];
		  $q = "SELECT * FROM admin WHERE id = $id";
		  $r = mysqli_query($con, $q);
		  
		  $opened = mysqli_fetch_assoc($r);
	  }*/
$toast = "admin"


?>


<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <link href="assets/css/register.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/font-style.css" rel="stylesheet" type="text/css" />
    <?php include('webparts/css.php'); ?>
    <style>
	.sweet-alert {
    background-color: white;
    font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    width: 100%;
    padding: 17px;
    border-radius: 5px;
    text-align: center;
     position: initial; 
    left: 50%;
     top: 0%; 
     margin-left: 0px; 
     margin-top: 0; 
	margin: auto;
    /* overflow: hidden; */
    /* display: none; */
     z-index: 0;
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
                     <div>
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                </div>
                                <div class="card-body ">
        <div class="row">

        	<div class="col-lg-6">
        		
        		<div>
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<img src="<?php if(isset($opened) && $opened['image'] != '') {echo('../uploads/images/admin/'.$opened['image']);} else { echo('assets/img/profile.png'); } ?>" alt="<?php  echo($opened['last_name'].' '.$opened['first_name']);  ?>" class="img-circle" width="100px">
							</div><!-- /thumbnail -->
							<h2 class="text-info text-capitalize"><?php if(isset($opened)) { echo($opened['last_name'].' '.$opened['first_name']); } else { echo('Select Admin to Edit | Add Admin'); } ?></h2>
        				</div>
        				<div class="row">
        					<div class="col-lg-6">
        						<div class="cont3">
        							<p><ok>Username:</ok> <?php if(isset($opened)) {echo($opened['username']);} ?></p>
        							<p><ok>Mail:</ok> <?php if(isset($opened)) {echo($opened['email']);} ?></p>
        							<p><ok>Location:</ok> <?php if(isset($opened)) {echo($opened['location']);} ?></p>
        							<p><ok>Status:</ok> <?php if (isset($opened)) {if ('0' == $opened['active']) {
														echo('Inactive');} elseif ('1' == $opened['active']) {
														echo('Active');} } ?>
									</p>
        						</div>
        					</div>
        					<div class="col-lg-6">
        						<div class="cont3">
        						<p><ok>Registered:</ok> <?php if(isset($opened)) {echo($opened['dateadded']);} ?></p>
        						<p><ok>Last Login:</ok> <?php if(isset($opened)) {echo($opened['lastlogin']);} ?></p>
        						<p><ok>Phone:</ok> <?php if(isset($opened)) {echo($opened['contact']);} ?></p>
        						<p><ok>Added by</ok> <?php if(isset($opened)) {echo($opened['addedby']);} ?></p>
        						</div>
        					</div>
        				</div><!-- /inner row -->
						<hr>
        			</div>
        		</div>
				
      			
       			<div>
				 <!--listing and styling page title and bodypart-->
				 <div class="list-group" style='width: 90%; margin: 2% auto;'>
					<?php 
				  $q = "SELECT * FROM admin ORDER BY last_name ASC";
				  $r = mysqli_query($con, $q); ?>
				  <div id="admin">
				  <?php
				  while ($user_list = mysqli_fetch_assoc($r)) { ?>

				   <!-- echo id for get in order to MAKE SELECTED AND display content in box--> <!--echo active-->
				   <div id="remove_<?php echo($user_list['id']) ?>" class="<?php if($user_list['id'] == 1) echo('hidden'); ?>">
				   <i class="btn btn-danger m-1 fa fa-trash-o pull-right delete_<?php echo($toast); ?>" id="del_<?php echo($toast); ?>_<?php echo($user_list['id']); ?>"></i>
				   <a class="list-group-item btn btn-info m-1 <?php if(isset($opened)) { if ($user_list['id'] == $opened['id']) { echo('active');} } ?>" href="admin.php?id=<?php echo $user_list['id']; ?>">
					 <h4 class="list-group-item-heading"><?php echo($user_list['last_name'].' '.$user_list['first_name']); ?>
					 </h4>
				   </a>
				   </div>
				   <?php } ?>
				   </div>
				   <a class="list-group-item" href="admin.php">
					 <h4 class="list-group-item-heading"> + &nbsp; New user</h4>
				   </a>
				 </div>
			   </div>
        	</div>

        	<div class="col-sm-6 col-lg-6 card">
        		<div id="register-wraper">
        		    <form id="register-form" class="form" method="post" action="admin.php">
        		        <legend><?php echo($site_name); ?> Admin</legend>
        		    
        		        <div class="body">
        		        	<label class="text-info" for="status" class="text-info">Status</label><br>

								<select class="input-huge  mdl-textfield__input p-1" type="text" name="status" id="status">
									<option value="0" <?php if (isset($_GET['id'])) {if ('0' == $opened['active']) {
														echo('selected');}
										} ?> >Inactive
									</option>
									<option value="1" <?php if (isset($_GET['id'])) {if ('1' == $opened['active']) {
														echo('selected');}
										} ?>>Active</option>
								</select>
        		        	<!-- first name --><br>

    		        		<label class="text-info" for="name">First name</label>
    		        		<input name="first" class="input-huge  mdl-textfield__input p-1" type="text" id="first_name" value="<?php if(isset($opened)) {echo($opened['first_name']);} ?>" placeholder="Enter First Name" required>
        		        	<!-- last name -->
    		        		<label class="text-info" for="surname">Last name</label>
    		        		<input name="last" class="input-huge  mdl-textfield__input p-1" type="text" id="last_name" value="<?php if(isset($opened)) {echo($opened['last_name']);} ?>" placeholder="Enter Last Name" required>
        		        	<!-- username -->
        		        	<label class="text-info">Username</label>
        		        	<input class="input-huge  mdl-textfield__input p-1" name="username" type="text" id="username" value="<?php if(isset($opened)) {echo($opened['username']);} ?>" placeholder="Enter Username Name" required>
        		        	<label class="text-info">Location</label>
        		        	<input class="input-huge  mdl-textfield__input p-1" name="location" type="text" id="location" value="<?php if(isset($opened)) {echo($opened['location']);} ?>" placeholder="Enter Residence" required>
        		        	<!-- email -->
        		        	<label class="text-info">E-mail</label>
        		        	<input class="input-huge  mdl-textfield__input p-1" name="email" type="email" id="email" value="<?php if(isset($opened)) {echo($opened['email']);} ?>" placeholder="Enter a valid email" required>
        		        	<label class="text-info">Contact</label>
        		        	<input class="input-huge  mdl-textfield__input p-1" name="contact" type="text" id="contact"  value="<?php if(isset($opened)) {echo($opened['contact']);} ?>" placeholder="Enter contact number" required>
        		        	
        		        	
        		        	<label class="text-info">Description</label>
        		        	<textarea class="input-huge  mdl-textfield__input p-1" id="Adescription"><?php if(isset($opened)) {echo($opened['description']);} ?></textarea>
        		        	
        		        	<!-- password -->
        		        	<label class="text-info">Password</label>
        		        	<input class="input-huge  mdl-textfield__input p-1" type="password" name="password" id="password">
        		        	<label class="text-info">Verify Password</label>
        		        	<input class="input-huge  mdl-textfield__input p-1" type="password" name="passwordv" id="verify_password">

       		        
       		        
        		        	<label class="text-info p-t-10">Admin Profile image</label>
							<label style="font-weight: bold; margin-top: 0%;">Image size must be width: 200px and height: 200px:</label><br>
							<input type="file" name="mediapic" id="mediapic"/><br>
        		        </div>
        		    
        		        <div class="footer">
							<div id="p2" class="ajax_loader hidden mdl-progress mdl-js-progress mdl-progress__indeterminate is-upgraded" data-upgraded=",MaterialProgress" style="margin-top: 2%; margin-bottom: 2%"><div class="progressbar bar bar1" style="width: 0%;"></div><div class="bufferbar bar bar2" style="width: 100%;"></div><div class="auxbar bar bar3" style="width: 0%;"></div>
							</div>
       		            
        		            <input type="hidden" value="<?php echo($user['first_name']) ?>" name="adder" id="adder" />
					        <input type="hidden" id="update" value="<?php if(isset($opened)) {echo($opened['id']);} else {echo('add');} ?>">
       		        		<button type="button" name="submit" onClick="uploadFile()" class="btn btn-pinterest m-3"><?php if(isset($opened)) {echo('Update Admin');} else {echo('Register Admin');} ?></button>
        		        </div>
        		    </form>
        		</div>
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
<script>
	
				function _(el) {
			return document.getElementById(el);
		}
		function uploadFile () {
			var newspicf = _("mediapic").files[0];
			var first_name = _("first_name").value;
			var last_name = $("#last_name").val();
			var username = _("username").value;
			var location = _("location").value;
			var email = _("email").value;
			var contact = _("contact").value;
			var description = _("Adescription").value;
			var password = _("password").value;
			var verify_password = _("verify_password").value;
			var adder = _("adder").value;
			var status = _("status").value;
			var update = _("update").value;
			
					 $('html, body').animate({
						scrollTop: $('#above').offset().top
					}, 200);
			
			//alert(file.name+" | "+file.size+" | "+file.type);
			var formdata = new FormData();
			formdata.append("task", "add_admin");
			formdata.append("newspic", newspicf);
			formdata.append("first_name", first_name);
			formdata.append("last_name", last_name);
			formdata.append("username", username);
			formdata.append("location", location);
			formdata.append("email", email);
			formdata.append("contact", contact);
			formdata.append("description", description);
			formdata.append("password", password);
			formdata.append("verify_password", verify_password);
			formdata.append("adder", adder);
			formdata.append("status", status);
			formdata.append("update", update);
			
			var ajax = new window.XMLHttpRequest();
			ajax.upload.addEventListener("progress", function(e) {
				
				if(e.lengthComputable) {
					$(".ajax_loader").removeClass("hidden");
				}
				
			});
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/ajax_add_admin.php");
			ajax.send(formdata);
			

			
		}
		function completeHandler(event) {
			var sub = event.target.responseText;
			if( sub.substring(0,7) == "success") {
				<?php if($action == "Added") { ?> 
					
					$("#admin").prepend("<a class='list-group-item  btn btn-info ' href='admin.php?id="+sub.substring(7)+"'><h4 class='list-group-item-heading'>"+last_name.value+" "+first_name.value+"</h4></a>")
				
				<?php } ?>
				//alert(sub.substring(0,7));
				//alert(sub.substring(7));
				ajax_succes(sub.substring(7));
				$(".jq-icon-error").css("display", "none");
				$("#password").val('');
				$("#verify_password").val('');
			}else{
				ajax_error(event.target.responseText);
				$(".jq-icon-success").css("display", "none")
			}
			$(".ajax_loader").addClass("hidden");
			
		}
</script>
</body>
</html>