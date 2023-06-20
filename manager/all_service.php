<?php

require_once('functions/init.php');

$sub_site_name = "All Services";

$toast = "service";

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
                                                <a href="add_service.php" id="addRow" class="btn btn-info">
                                                    Add Service <i class="fa fa-plus"></i>
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
                                                <th class="center"> Service </th>
                                                <th class="center"> Short description </th>
                                                <th class="center"> Full description </th>
                                                <th class="center"> Date added </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $services = get_services(); $x=1;
											while($service = mysqli_fetch_assoc($services)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($service['id']); ?>">
												<td>
														<img src="../uploads/images/services/thumb/<?php echo($service['image']); ?>" alt="" width="60px">
												</td>
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><?php echo($service['title']); ?></td>
												<td class="center"><?php echo(substr($service['short_description'], 0, 100)); ?></td>
												<td class="center"><?php echo(substr($service['full_description'], 0, 200)); ?></td>
												<td class="center"><?php echo(date("jS M, Y", strtotime( $service['date']))); ?></td>
												<td class="center">
													<a href="add_service.php?id=<?php echo($service['id']); ?>" class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs delete_service" id="del_service_<?php echo($service['id']); ?>">
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