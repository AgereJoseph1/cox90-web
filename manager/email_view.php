<?php

require_once('functions/init.php');

$sub_site_name = "View Email";

$emails = getContactMessages();

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	
	$email_id = select_from_id('contact_messages', $id);
	$email = mysqli_fetch_assoc($email_id);
} else {
	redirect("email_inbox.php");
}

$toast = "email";

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
                    <div class="inbox">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-body no-padding height-9">
									<div class="row">
				                            <div class="col-md-3">
				                                <div class="inbox-sidebar">
				                                    <a data-title="Compose" class="btn red compose-btn btn-block">
				                                        <i class="fa fa-edit"></i> Contact Messages </a>
				                                    <ul class="inbox-nav inbox-divider">
				                                        <li class="active"><a href="email_inbox.php"><i
																class="fa fa-inbox"></i> Inbox <span
																class="label mail-counter-style label-danger pull-right"><?php echo(mysqli_num_rows($emails)); ?></span></a>
				                                        </li>
				                                    </ul>
				                                </div>
				                            </div>
			                            <div class="col-md-9">
			                                <div class="inbox-header">
			                                    <div class="inbox-body no-pad">
			                                        <section class="mail-list">
			                                            <div class="mail-sender">
			                                            	<div class="mail-heading">
			                                                	<h4 class="vew-mail-header"><b>
			                                                	<?php if(!empty($email['subject'])){echo($email['subject']);} else {echo('No Subject');} ?>
																</b></h4>
			                                                </div>
			                                                <hr>
															<div class="media">
																<a href="#" class="pull-left"> <img alt=""
																	src="assets/img/default.png" class="img-circle" width="40">
																</a>
																<div class="media-body">
																	<span class="date pull-right"><?php echo(date("jS M, Y h:i a", strtotime( $email['date']))); ?></span>
																	<h4 class="text-primary"><?php echo($email['name']); ?></h4>
																	<small class="text-muted">Email: <?php if(!empty($email['email'])){echo($email['email']);} else {echo('No Email');} ?></small><br>
																	<small class="text-muted">Phone: <?php echo($email['phone']); ?></small><br>
																	<small class="text-muted">Status: <?php echo($email['status']); if($email['status'] == 'Student'){echo(' - '.$email['school_sub']);} ?></small><br>
																</div>
															</div>
														</div>
			                                            <div class="view-mail">
			                                                <?php echo($email['message']); ?>
			                                            </div>
			                                        </section>
			                                    </div>
			                                </div>
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
  </body>
</html>