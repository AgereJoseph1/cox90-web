<?php

require_once('functions/init.php');

$sub_site_name = "All Events";

$toast = "event";

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
                            <div class="card card-box">
                                <div class="card-head">
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <a href="add_event.php" id="addRow" class="btn btn-pink">
                                                    Add Events <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="add_news.php" id="addRow" class="btn btn-pink">
                                                    Add News <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                            	<th class="center"> img </th>
                                                <th class="center"> # </th>
                                                <th class="center"> Headline </th>
                                                <th class="center"> Description </th>
                                                <th class="center"> Keywords </th>
                                                <th class="center"> Venue </th>
                                                <th class="center"> Date of Event </th>
                                                <th class="center"> Time </th>
                                                <th class="center"> Date added </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $all_events = get_events(); $x=1;
											while($event = mysqli_fetch_assoc($all_events)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($event['id']); ?>">
												<td class="">
														<img src="../uploads/images/events/<?php echo($event['image']); ?>" alt="" width="60px">
												</td>
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><?php echo($event['title']); ?></td>
												<td class="center"><?php echo(substr($event['description'], 0, 400)); ?></td>
												<td class="center"><?php echo(substr($event['keywords'], 0, 200)); ?></td>
												<td class="center"><?php echo($event['location']); ?></td>
												<td class="center"><label class="label label-sm label-info"><?php echo(date("jS M, Y", $event['start_time'])); ?></label></td>
												<td class="center"><?php echo(date("h:i a", $event['start_time'])); ?> <?php if($event['end_time'] != 0) echo("-".date("h:i a", $event['end_time'])); ?></td>
												<td class="center"><?php echo(date("jS M, Y", strtotime($event['date']))); ?></td>
												<td class="center">
													<a href="add_event.php?id=<?php echo($event['id']); ?>" class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs delete_event" id="del_event_<?php echo($event['id']); ?>">
														<i class="fa fa-trash-o "></i>
													</a>
												</td>
											</tr>
											
											<?php  $x++;  } ?>
										</tbody>
                                    </table>
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
    
</html>