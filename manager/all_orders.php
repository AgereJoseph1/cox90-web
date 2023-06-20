<?php

require_once('functions/init.php');

$sub_site_name = "All Orders";

$toast = "order";

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
                                                <th class="center">Order ID</th>
                                                <th class="center"> Name </th>
                                                <th class="center"> Phone </th>
                                                <th class="center"> Grand Total </th>
                                                <th class="center"> Delivery </th>
                                                <th class="center"> Order status </th>
                                                <th class="center"> Payment status </th>
                                                <th class="center"> Address </th>
                                                <th class="center"> Date added </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $orders = get_orders(); $x=1;
											while($order = mysqli_fetch_assoc($orders)) { ?>
											
											<tr class="odd gradeX" id="remove_<?php echo($order['id']); ?>">
												<td class="center"><?php echo($x); ?></td>
                                                <td class="center"><?php echo($order['id']); ?></td>
												<td class="center"><?php echo($order['fullname']); ?></td>
												<td class="center"><?php echo($order['phone']); ?>
												<?php if($order['phone2'] != '') { 
													echo('<br>'.$order['phone2']);
												 }  ?> </td>
												<td class="center"><?php echo($order['grand_total'] + $order['delivery_fee'].'.00'); ?></td>
												<td class="center">
												    <?php if($order['delivery_fee'] == 10) { ?>
												        Standard (GH₵ 10)- Within a week
												    <?php } elseif($order['delivery_fee'] == 15) { ?>
												        Early (GH₵ 15)- Within a 72hrs
												    <?php }elseif($order['delivery_fee'] == 20) { ?>
												        Express (GH₵ 20)- Within 24hrs
												    <?php }; ?>
											    </td>
												<td class="center">
													<?php if($order['order_status'] == 0) { ?> 
													<label class="label label-sm label-danger app_order_status<?php echo($order['id']); ?>">Pending</label>
													<?php } else { ?> 
													<label class="label label-sm label-warning app_order_status<?php echo($order['id']); ?>">Delivered</label>
													<?php } ?>
												</td>
												<td class="center">
													<?php if($order['payment_status'] == 0) { ?> 
													<label class="label label-sm label-danger app_payment_status<?php echo($order['id']); ?>">Pending</label>
													<?php } else { ?> 
													<label class="label label-sm label-warning app_payment_status<?php echo($order['id']); ?>">Payed</label>
													<?php } ?>
												</td>
												<td class="center"><?php echo($order['address']); ?></td>
												<td class="center"><?php echo(date("jS M, Y", strtotime($order['date']))); ?></td>
												<td class="center">
													<?php if($order['order_status'] == 0) { ?>
													<a class="btn btn-tbl-edit btn-xs approve_order_status btn-success" id="approve_order_status<?php echo($order['id']); ?>">
														<i class="fa fa-thumbs-o-up"></i>
													</a>
													<?php } ?> 
													<?php if($order['payment_status'] == 0) { ?>
													<a class="btn btn-tbl-edit btn-xs approve_payment_status" id="approve_payment_status<?php echo($order['id']); ?>">
														<i class="fa fa-thumbs-o-up"></i><i class="fa fa-money"></i>
													</a>
													<?php } ?> 
													<a href="" class="btn btn-xs" style="margin-bottom: 5%" data-toggle="modal" data-target="#order<?php echo($order['id']); ?>">
														<i class="fa fa-eye">View</i>
													</a>
													<a class="btn btn-tbl-delete btn-xs delete_<?php echo($toast); ?>" id="del_<?php echo($toast); ?>_<?php echo($order['id']); ?>">
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
        
         <?php 
		$orders = get_orders();
		while($order = mysqli_fetch_assoc($orders)) { ?> 
			
        <div class="modal fade" id="order<?php echo($order['id']); ?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><label class="label label-warning"><?php echo($order['first_name']." ". $order['last_name']); ?></label></h5>
                </div>
                <div class="modal-body container">
                    <div class="col-md-12">
                    	
                    	<div class="row">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Order Date</div>
							</div>
							<div class="col-md-8">
								<div><?php echo(date("jS M, Y", strtotime($order['date']))); ?></div>
							</div>
                    	</div>
                    	<div class="row">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Phone</div>
							</div>
							<div class="col-md-8">
								<div><?php echo($order['phone']); ?></div>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Address</div>
							</div>
							<div class="col-md-8">
								<div><?php echo($order['address']); ?></div>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Town</div>
							</div>
							<div class="col-md-8">
								<div><?php echo($order['town']); ?></div>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Item Total</div>
							</div>
							<div class="col-md-8">
								<div><?php echo($order['grand_total']); ?></div>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Delivery Fee</div>
							</div>
							<div class="col-md-8">
								<div><?php echo($order['delivery_fee']); ?></div>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Grand Total</div>
							</div>
							<div class="col-md-8">
								<div><?php echo($order['grand_total'] + $order['delivery_fee'].'.00'); ?></div>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-4">
								<div class="title" style="font-weight: bold">Delivery Type</div>
							</div>
							<div class="col-md-8">
								<div>
									    <?php if($order['delivery_fee'] == 10) { ?>
									        Standard (GH₵ 10)- Within a week
									    <?php } elseif($order['delivery_fee'] == 15) { ?>
									        Early (GH₵ 15)- Within a 72hrs
									    <?php }elseif($order['delivery_fee'] == 20) { ?>
									        Express (GH₵ 20)- Within 24hrs
									    <?php }; ?>
								</div>
							</div>
                    	</div>
                    	<hr>
                    	
                    	<div class="row p-t-10">
							<div class="col-md-6">
								<div class="title" style="font-weight: bold">Payment Status</div>
							</div>
							<div class="col-md-6">
									<?php if($order['payment_status'] == 0) { ?> 
									<label class="label label-sm label-danger app_payment_status<?php echo($order['id']); ?>">Pending</label>
									<?php } else { ?> 
									<label class="label label-sm label-warning app_payment_status<?php echo($order['id']); ?>">Payed</label>
									<?php } ?>
							</div>
                    	</div>
                    	<div class="row p-t-10">
							<div class="col-md-6">
								<div class="title" style="font-weight: bold">Order Status</div>
							</div>
							<div class="col-md-6">
									<?php if($order['order_status'] == 0) { ?> 
									<label class="label label-sm label-danger app_order_status<?php echo($order['id']); ?>">Pending</label>
									<?php } else { ?> 
									<label class="label label-sm label-warning app_order_status<?php echo($order['id']); ?>">Delivered</label>
									<?php } ?>
							</div>
                    	</div>
                    	
                    	<hr>
                    </div>
                    
                    	<hr>
                    	
                    	<div class="card card-topline-green">
                                        <div class="card-head">
                                            <header>Order Items</header>
                                            <div class="tools">
			                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="table-scrollable">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price (GH₵)</th>
                                                            <th>Total (GH₵)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
					<?php	$x=0;
						$order_items = get_order_items($order['id']);
						if(mysqli_num_rows($order_items) > 0) {
							while($order_item = mysqli_fetch_assoc($order_items)) { $x++; ?> 
                                                        <tr>
                                                            <td><?php echo($x); ?></td>
                                                            <td><img src="../uploads/images/shop/thumb/<?php echo(get_product_image($order_item['product_id'])); ?>" width='60px'/></td>
                                                            <td><?php echo(get_title_from_id($order_item['product_id'], "tbl_products")); ?></td>
                                                            <td><?php echo($order_item['product_quantity']); ?></td>
                                                            <td><?php echo($order_item['product_price']); ?></td>
                                                            <td><?php echo($order_item['product_quantity'] * $order_item['product_price']); ?></td>
                                                        </tr>	
										
						<?php } } else {echo('1000000000');} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   	<?php } ?>
   	
<script>
	
			$(".approve_order_status").on("click", function() {	

		var selected = $(this).attr("id");
		var dataid = selected.split("approve_order_status").join("");

		var confirmed = confirm("Are you sure you want to Approve this order as delivered?"/*+dataid*/);

		if(confirmed == true){
				 $.ajax ({ 
					url:"ajax/ajax_approve_order_status.php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					 success: function(data){
						 if(data == 'success') {
							 alert('Order Approved');
							 $('#approve_order_status'+dataid).addClass('hidden');
							 $('.app_order_status'+dataid).removeClass('label-danger').addClass('label-warning').text('Delivered');
						 } else{
							alert(data);
						 }	
					}
				});			
		}
		});	
	
			$(".approve_payment_status").on("click", function() {	

		var selected = $(this).attr("id");
		var dataid = selected.split("approve_payment_status").join("");

		var confirmed = confirm("Are you sure you want to Approve Payment of this order"/*+dataid*/);

		if(confirmed == true){
				 $.ajax ({ 
					url:"ajax/ajax_approve_payment_status.php?id="+dataid,
					method:'POST',
					dataType:'html',
					data: {
					},
					beforeSend: function() {

					},
					 success: function(data){
						 if(data == 'success') {
							 alert('Payment Approved');
							 $('#approve_payment_status'+dataid).addClass('hidden');
							 $('.app_payment_status'+dataid).removeClass('label-danger').addClass('label-warning').text('Payed');
						 } else{
							alert(data);
						 }	
					}
				});			
		}
		});	
</script>	
</html>