<?php

require_once('functions/init.php');

$sub_site_name = "Email Inbox";

$emails = getContactMessages();

$toast = 'email';
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
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-body no-padding height-9">
									<div class="inbox">
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
				                                    <div class="inbox-body no-pad table-responsive">
				                                        <table class="table table-inbox table-hover m-0">
			                                            <thead>
															<tr>
																<th></th>
																<th>Name</th>
																<th>Purpose</th>
																<th>Contact</th>
																<th class="text-center">Date</th>
																<th class="text-center">Action</th>
															</tr>
														</thead>
				                                            <tbody>
			                                                <?php while($email = mysqli_fetch_assoc($emails)) { ?> 
				                                                <tr id="remove_<?php echo($email['id']); ?>">
				                                                    <td>
				                                                        <a class="avatar">
				                                                            <img src="assets/img/default.png" alt="">
				                                                        </a>
				                                                    </td>
				                                                    <td class="view-message dont-show"><?php echo($email['name']); ?></td>
				                                                    <td class="view-message view-message"><a href="email_view.php?id=<?php echo($email['id']); ?>">
				                                                    <?php end_text($email['subject'],100); ?></a></td>
				                                                    <td class="view-message text-center"><?php echo($email['phone']); ?></td>
				                                                    <td class="view-message text-center"><?php echo(date("jS M, Y", strtotime( $email['date']))); ?></td>
				                                                    <td class="view-message text-center">
																		<a href="email_view.php?id=<?php echo($email['id']); ?>" class="btn btn-tbl-edit btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="btn btn-tbl-delete btn-xs delete_<?php echo($toast); ?>" id="del_<?php echo($toast); ?>_<?php echo($email['id']); ?>">
																			<i class="fa fa-trash-o "></i>
																		</a>
			                                               			 </td>
				                                                </tr>
															<?php } ?>
				                                            </tbody>
				                                        </table>
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