<?php

require_once('functions/init.php');

$sub_site_name = "All Advertisement";

$toast = "advertisement";

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
                                                <a href="add_advertisement.php" id="addRow" class="btn btn-info">
                                                    Add Advertisement <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                                <th class="center"> # </th>
                                                <th class="center"> img </th>
                                                <th class="center"> Ad Title </th>
                                                <th class="center"> Expiration </th>
                                                <th class="center"> Clicks </th>
                                                <th class="center"> Impression </th>
                                                <th class="center"> Status </th>
                                                <th class="center"> Position </th>
                                                <th class="center"> Added on </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $ads = get_ads(); $x=1;
											while($ad = mysqli_fetch_assoc($ads)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($ad['id']); ?>">
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><img src="../uploads/images/ads/<?php echo($ad['image']); ?>" alt="" width="60px"></td>
												<td class="center"><?php echo($ad['title']); ?></td>
												<td class="center"><?php echo(date("jS M, Y", strtotime($ad['expire']))); ?></td>
												<td class="center">
													<button data-toggle="button" class="btn btn-circle btn-instagram"><i class="fa fa-hand-o-up "></i><?php echo($ad['clicks']); ?></button>
												</td>
												<td class="center">
													<button data-toggle="button" class="btn btn-circle btn-info"><i class="fa fa-eye "></i><?php echo($ad['impression']); ?></button>
												</td>
												<td class="center">
													<?php if(strtotime($ad['expire']) < time()) { ?> 
													<label class="label label-sm label-danger">Expired</label>
													<?php } else { ?> 
													<label class="label label-sm label-warning">Active</label>
													<?php } ?>
												</td>
												<td class="center">
													<label class="label label-sm light-dark-bgcolor"><?php echo($ad['position']); ?></label>
												</td>
												<td class="center"><?php echo(date("jS M, Y", strtotime( $ad['date_added']))); ?></td>
												<td class="center">
													<a href="add_advertisement.php?id=<?php echo($ad['id']); ?>" class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs delete_<?php echo($toast) ?>" id="del_<?php echo($toast) ?>_<?php echo($ad['id']); ?>">
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