<?php

require_once('functions/init.php');

$sub_site_name = "All Comments";

$toast = "comments";

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
                                                <th class="center"> Email </th>
                                                <th class="center"> Comment </th>
                                                <th class="center"> Status </th>
                                                <th class="center"> News Title </th>
                                                <th class="center"> Added on </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $comments = get_comments(); $x=1;
											while($comment = mysqli_fetch_assoc($comments)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($comment['ID']); ?>">
												<td class="center"><?php echo($x); ?></td>
												<td class="center"><?php echo($comment['user_name']); ?></td>
												<td class="center"><?php echo($comment['email']); ?></td>
												<td class="center"><?php echo($comment['comment_text']); ?></td>
												<td class="center">
													<?php if($comment['approved'] == 0) { ?> 
													<label class="label label-sm label-danger app_<?php echo($comment['ID']); ?>">Pending</label>
													<?php } else { ?> 
													<label class="label label-sm label-warning app_<?php echo($comment['ID']); ?>">Approved</label>
													<?php } ?>
												</td>
												<td class="center"><?php $post= mysqli_fetch_assoc(select_from_id('news', $comment['news_id'])); ?>
												<a href="../post-details/<?php echo($post['url_title']) ?>" target="_blank">
													<?php echo($post['title']); ?>
												</a>
												</td>
												<td class="center"><?php echo(date("jS M, Y", strtotime( $comment['date_added']))); ?></td>
												<td class="center">
													<?php if($comment['approved'] == 0) { ?>
													<a class="btn btn-tbl-edit btn-xs approve_comment" id="approve_<?php echo($comment['ID']); ?>">
														<i class="fa fa-thumbs-o-up"></i>
													</a>
													<?php } ?> 
													<a class="btn btn-tbl-delete btn-xs delete_<?php echo($toast) ?>" id="del_<?php echo($toast) ?>_<?php echo($comment['ID']); ?>">
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
<script>
	
			$(".approve_comment").on("click", function() {	

		var selected = $(this).attr("id");
		var dataid = selected.split("approve_").join("");

		var confirmed = confirm("Are you sure you want to delete this comment"/*+dataid*/);

		if(confirmed == true){
				 $.ajax ({ 
					url:"ajax/ajax_approve_comment.php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					 success: function(data){
						 if(data == 'success') {
							 alert('Comment Approved');
							 $('#approve_'+dataid).addClass('hidden');
							 $('.app_'+dataid).removeClass('label-danger').addClass('label-warning').text('Approved');
						 } else{
							alert(data);
						 }	
					}
				});			
		}
		});	
	
</script>

</html>