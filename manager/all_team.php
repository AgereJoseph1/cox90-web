<?php

require_once('functions/init.php');

$sub_site_name = "All Team Member";

$toast = "team";

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
                                                <a href="add_team.php" id="addRow" class="btn btn-info">
                                                    Add team <i class="fa fa-plus"></i>
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
                                                <th class="center"> Name </th>
                                                <th class="center"> Position </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $teams = get_teams(); $x=1;
											while($team = mysqli_fetch_assoc($teams)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($team['id']); ?>">
												<td>
														<img src="../uploads/images/team/thumb/<?php echo($team['image']); ?>" alt="" width="60px">
												</td>
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><?php echo($team['title']); ?></td>
												<td class="center"><?php echo($team['position']); ?></td>
												<td class="center">
													<a href="add_team.php?id=<?php echo($team['id']); ?>" class="btn btn-tbl-edit btn-xs">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs delete_team" id="del_team_<?php echo($team['id']); ?>">
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