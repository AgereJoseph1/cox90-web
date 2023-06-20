<?php

require_once('functions/init.php');

$sub_site_name = "All Customers";

$toast = "customer";

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
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                                <th class="center"> # </th>
                                                <th class="center"> Name </th>
                                                <th class="center"> Phone </th>
                                                <th class="center"> Country </th>
                                                <th class="center"> Address </th>
                                                <th class="center"> Signup Date </th>
                                                <th class="center"> Total Orders </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $customers = get_customers(); $x=1;
											while($customer = mysqli_fetch_assoc($customers)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($customer['id']); ?>">
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><?php echo($customer['fullname']); ?></td>
												<td class="center"><?php echo($customer['phone']); ?></td>
												<td class="center"><?php echo($customer['country']); ?></td>
												<td class="center"><?php echo($customer['address']); ?></td>
												<td class="center"><?php echo(date("jS M, Y", strtotime( $customer['date']))); ?></td>
												<td class="center"><?php echo(total_orders_count($customer['id'])); ?></td>
												<td class="center">
													<a class="btn btn-tbl-delete btn-xs delete_customer" id="del_customer_<?php echo($customer['id']); ?>">
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