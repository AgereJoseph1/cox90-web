
		<div class="page-header navbar navbar-fixed-top" id="above">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="index.php">
                    <img width="40px" src="../uploads/<?php echo single_image('logo'); ?>"/>
                    <span class="logo-default" style="font-size: 15px" ><?php echo($site_name); ?></span> </a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
                
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="assets/img/profile.png" />
                                <span class="username username-hide-on-mobile"> <?php echo admin_name(); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <li>
                                    <a href="admin.php?id=<?php echo($user['id']); ?>">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="setting.php">
                                        <i class="icon-settings"></i> Settings
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                    </ul>
                </div>
            </div>
        </div>