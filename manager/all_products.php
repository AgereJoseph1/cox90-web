<?php

require_once('functions/init.php');

$sub_site_name = "All Products";

$toast = "products";

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <?php include('webparts/css.php'); ?>
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
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
                                                <a href="add_products.php" id="addRow" class="btn btn-info">
                                                    Add products <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-checkable order-column full-width"
                                            id="example4">
                                            <thead>
                                                <tr>
                                                    <th class="center"> img </th>
                                                    <th class="center"> # </th>
                                                    <th class="center"> Name </th>
                                                    <th class="center"> Price (GH₵) </th>
                                                    <th class="center"> Category </th>
                                                    <th class="center"> Brand </th>
                                                    <th class="center"> Description </th>
                                                    <th class="center"> Slots </th>
                                                    <!-- <th class="center"> Date added </th> -->
                                                    <th class="center"> Switch </th>
                                                    <th class="center"> Stock </th>
                                                    <th class="center"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $productss = get_products("order by id DESC"); $x=1;
											while($products = mysqli_fetch_assoc($productss)) { ?>

                                                <tr class="odd gradeX" id="remove_<?php echo($products['id']); ?>">
                                                    <td>
                                                        <img src="../uploads/images/shop/thumb/<?php echo($products['image']); ?>"
                                                            alt="" width="60px">
                                                    </td>
                                                    <td class="center"><?php echo($x); ?></td>
                                                    <td class="center"><?php echo($products['title']); ?></td>
                                                    <td class="center"><?php echo($products['price']); ?></td>
                                                    <td class="center"><span
                                                            style='font-weight: bold'><?php echo(get_title_from_id($products['maincategory'], 'products_categories')); ?></span><br>
                                                        <?php echo(product_cat_title($products['category'])); ?>
                                                    </td>
                                                    <td class="center">
                                                        <?php echo(get_title_from_id($products['brand'], 'products_brands')); ?>
                                                    </td>
                                                    <td class="center">
                                                        <?php echo(substr(strip_tags($products['description']), 0, 50)); ?>
                                                    </td>
                                                    <td class="center"><?php 
                                                    if($products['best_seller'] == 1) {
                                                        echo('<button class=" btn-xs btn btn-info">Best seller</button>');
                                                    }
                                                    if($products['new_arrival'] == 1) {
                                                        echo('<button class=" btn-xs btn btn-primary">New Arrival</button>');
                                                    }
                                                    if($products['most_wanted'] == 1) {
                                                        echo('<button class=" btn-xs btn btn-warning">Most Wanted</button>');
                                                    }
                                                    if($products['featured'] == 1) {
                                                        echo('<button class=" btn-xs btn btn-success">Featured</button>');
                                                    }
                                                    if($products['slot_1'] == 1) { ?>
                                                        <button class=" btn-xs btn btn-linkedin">Slot-1</button>
                                                        <?php }
                                                    if($products['slot_2'] == 1) { ?>
                                                        <button class=" btn-xs btn btn-pink">Slot-2</button>
                                                        <?php }
                                                    if($products['slot_3'] == 1) { ?>
                                                        <button class=" btn-xs btn btn-pinterest">Slot-3</button>
                                                        <?php }
                                                    if($products['slot_4'] == 1) { ?>
                                                        <button class=" btn-xs btn btn-skype">Slot-4</button>
                                                        <?php }
                                                ?></td>
                                                    <td class="center">
                                                        <span>BS</span>
                                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                            for="switch-best_seller<?php echo($products['id']); ?>"
                                                            style='padding-left: 0px; width:50% !important'>
                                                            <input type="checkbox"
                                                                id="switch-best_seller<?php echo($products['id']); ?>"
                                                                data-setting="best_seller"
                                                                data-id="<?php echo($products['id']); ?>"
                                                                class="mdl-switch__input job_input"
                                                                <?php if(product_settings($products['id'], 'best_seller')) {echo('checked');} ?>>
                                                        </label>


                                                        <span>NA</span>
                                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                            for="switch-new_arrival<?php echo($products['id']); ?>"
                                                            style='padding-left: 0px; width:50% !important'>
                                                            <input type="checkbox"
                                                                id="switch-new_arrival<?php echo($products['id']); ?>"
                                                                data-setting="new_arrival"
                                                                data-id="<?php echo($products['id']); ?>"
                                                                class="mdl-switch__input job_input"
                                                                <?php if(product_settings($products['id'], 'new_arrival')) {echo('checked');} ?>>
                                                        </label>


                                                        <span>MW</span>
                                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                            for="switch-most_wanted<?php echo($products['id']); ?>"
                                                            style='padding-left: 0px; width:50% !important'>
                                                            <input type="checkbox"
                                                                id="switch-most_wanted<?php echo($products['id']); ?>"
                                                                data-setting="most_wanted"
                                                                data-id="<?php echo($products['id']); ?>"
                                                                class="mdl-switch__input job_input"
                                                                <?php if(product_settings($products['id'], 'most_wanted')) {echo('checked');} ?>>
                                                        </label>


                                                        <span>FP</span>
                                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                            for="switch-featured<?php echo($products['id']); ?>"
                                                            style='padding-left: 0px; width:50% !important'>
                                                            <input type="checkbox"
                                                                id="switch-featured<?php echo($products['id']); ?>"
                                                                data-setting="featured"
                                                                data-id="<?php echo($products['id']); ?>"
                                                                class="mdl-switch__input job_input"
                                                                <?php if(product_settings($products['id'], 'featured')) {echo('checked');} ?>>
                                                        </label>
                                                    </td>
                                                    <td class="center">
                                                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                            for="switch-in_stock<?php echo($products['id']); ?>"
                                                            style='padding-left: 0px; width:50% !important'>
                                                            <input type="checkbox"
                                                                id="switch-in_stock<?php echo($products['id']); ?>"
                                                                data-setting="in_stock"
                                                                data-id="<?php echo($products['id']); ?>"
                                                                class="mdl-switch__input job_input"
                                                                <?php if(product_settings($products['id'], 'in_stock')) {echo('checked');} ?>>
                                                        </label>
                                                    </td>
                                                    <td class="center">
                                                        <a href="add_products.php?id=<?php echo($products['id']); ?>"
                                                            class="btn btn-tbl-edit btn-xs">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-tbl-delete btn-xs delete_products"
                                                            id="del_products_<?php echo($products['id']); ?>">
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
        ///// Enable job title form
        $('.job_input').change(function() {
            var product_id = $(this).attr('data-id');

            if ($(this).is(':checked')) {

                var setting = $(this).attr('data-setting');
                //alert(setting);
                $('#' + setting).removeClass('hidden');
                //$(this).next().text("Yes");	

                $.ajax({
                    url: "ajax/ajax_update_product_settings.php",
                    method: "POST",
                    dataType: "html",
                    data: {
                        setting: setting,
                        value: 1,
                        product_id: product_id
                    },
                    beforeSend: function() {
                        notify('Updating setting');
                    },
                    success: function(data) {
                        if (data == 'success') {
                            notify('setting updated successfully');
                        } else {
                            notify('Error updating setting');
                        }
                    },
                    fail: function(data) {

                    }
                });

            } else {

                var setting = $(this).attr('data-setting');
                //alert(setting);
                $('#' + setting).addClass('hidden');
                //$(this).next().text("No"); 

                $.ajax({
                    url: "ajax/ajax_update_product_settings.php",
                    method: "POST",
                    dataType: "html",
                    data: {
                        setting: setting,
                        value: 0,
                        product_id: product_id
                    },
                    beforeSend: function() {
                        notify('Updating setting');
                    },
                    success: function(data) {
                        if (data == 'success') {
                            notify('setting updated successfully');
                        } else {
                            notify('Error updating setting');
                        }
                    },
                    fail: function(data) {

                    }
                });

            }

        });
        </script>

</html>