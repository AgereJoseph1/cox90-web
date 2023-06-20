
 			<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	                <div id="remove-scroll">
	                    <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>
	                        <li class="sidebar-user-panel">
	                            <div class="user-panel">
	                                <div class="row">
                                            <div class="sidebar-userpic">
                                                <img src="assets/img/profile.png" class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="sidebar-userpic-name"> <?php echo admin_name(); ?></div>
                                        </div>
                                        <div class="sidebar-userpic-btn">
									        <a class="tooltips" href="admin.php?id=<?php echo($user['id']); ?>" data-placement="top" data-original-title="Profile">
									        	<i class="material-icons">person_outline</i>
									        </a>
									        <a class="tooltips" href="email_inbox.php" data-placement="top" data-original-title="Mail">
									        	<i class="material-icons">mail_outline</i>
									        </a>
									        <a class="tooltips" href="logout.php" data-placement="top" data-original-title="Logout">
									        	<i class="material-icons">input</i>
									        </a>
									    </div>
	                            </div>
	                        </li>
	                        <li class="nav-item <?php if($sub_site_name == 'Home'){echo('active');} ?> ">
	                                    <a href="index.php" class="nav-link ">
	                                        <span class="title">Home | Dashboard</span>
	                                    </a>
							</li>
	                        <li class="nav-item <?php if($toast == 'email'){echo('active');} ?> ">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">email</i>
	                                <span class="title">Enquiries | Messages</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu ">
	                                <li class="nav-item <?php if($sub_site_name == 'Email Inbox'){echo('active');} ?> ">
	                                    <a href="email_inbox.php" class="nav-link">
	                                        <span class="title">Inbox</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="nav-item  <?php if($toast == 'news'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">library_books</i>
	                                <span class="title">Blog</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'Add News' || $sub_site_name == 'Update News'){echo('active');} ?>">
	                                    <a href="add_news.php" class="nav-link">
	                                        <span class="title">Add Blog News</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All News'){echo('active');} ?>">
	                                    <a href="all_news.php" class="nav-link ">
	                                        <span class="title">All Blog News</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        <!-- <li class="nav-item  <?php /*if($toast == 'event'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">event</i>
	                                <span class="title">Events</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'Add Event' || $sub_site_name == 'Update Event'){echo('active');} ?>">
	                                    <a href="add_event.php" class="nav-link">
	                                        <span class="title">Add Event</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All Events'){echo('active');}  ?>">
	                                    <a href="all_event.php" class="nav-link ">
	                                        <span class="title">All Events</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li> 
	                        
	                        
	                        
	                        <li class="nav-item  <?php if($toast == 'service'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="fa fa-server"></i>
	                                <span class="title">Services</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'Add service' || $sub_site_name == 'Update service'){echo('active');} ?>">
	                                    <a href="add_service.php" class="nav-link">
	                                        <span class="title">Add Service</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All service'){echo('active');} ?>">
	                                    <a href="all_service.php" class="nav-link ">
	                                        <span class="title">All Service</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        
	                       
	                        
	                        <li class="nav-item  <?php if($toast == 'team'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="fa fa-group (alias)"></i>
	                                <span class="title">Team Members</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'Add Team Member' || $sub_site_name == 'Update Team Member'){echo('active');} ?>">
	                                    <a href="add_team.php" class="nav-link">
	                                        <span class="title">Add Team Member</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All Team Member'){echo('active');} */?>">
	                                    <a href="all_team.php" class="nav-link ">
	                                        <span class="title">All Team Members</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>-->
	                        
	                        <li class="nav-item  <?php if($toast == 'products' || $toast == 'customer' || $toast == 'order'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="fa fa-shopping-cart"></i>
	                                <span class="title">Shop</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'All Customers'){echo('active');} ?>">
	                                    <a href="all_customers.php" class="nav-link ">
	                                        <span class="title">All Customers</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'Add Products' || $sub_site_name == 'Update Products'){echo('active');} ?>">
	                                    <a href="add_products.php" class="nav-link">
	                                        <span class="title">Add Product</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All Products'){echo('active');} ?>">
	                                    <a href="all_products.php" class="nav-link ">
	                                        <span class="title">All Products</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All Orders'){echo('active');} ?>">
	                                    <a href="all_orders.php" class="nav-link ">
	                                        <span class="title">All Orders</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>
	                        
	                        <li class="nav-item  <?php if($toast == 'album' || $toast == 'image'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
									<i class="material-icons">picture_in_picture</i>
	                                <span class="title">Gallery</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'Add Album' || $sub_site_name == 'Update Album'){echo('active');} ?>">
	                                    <a href="add_album.php" class="nav-link">
	                                        <span class="title">Create Album</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'Add Image' || $sub_site_name == 'Update News'){echo('active');} ?>">
	                                    <a href="add_image.php" class="nav-link">
	                                        <span class="title">Add Image to Album </span>
	                                    </a>
	                                </li>
									<li class="nav-item <?php if($sub_site_name == 'Albums'){echo('active');} ?>">
												<a href="all_album.php" class="nav-link ">
													<span class="title">View Albums</span>
												</a>
									</li>
	                            </ul>
	                        </li>
<!--	                        <li class="nav-item  <?php /*if($toast == 'advertisement'){echo('active');} ?>">
	                            <a href="#" class="nav-link nav-toggle">
	                                <i class="material-icons">library_books</i>
	                                <span class="title">Advertisements</span>
	                                <span class="arrow"></span>
	                            </a>
	                            <ul class="sub-menu">
	                                <li class="nav-item <?php if($sub_site_name == 'Add Advertisement' || $sub_site_name == 'Update Advertisement'){echo('active');} ?>">
	                                    <a href="add_advertisement.php" class="nav-link">
	                                        <span class="title">Add Advertisement</span>
	                                    </a>
	                                </li>
	                                <li class="nav-item <?php if($sub_site_name == 'All Advertisement'){echo('active');} */?>">
	                                    <a href="all_advertisement.php" class="nav-link ">
	                                        <span class="title">All Advertisements</span>
	                                    </a>
	                                </li>
	                            </ul>
	                        </li>-->
	                        <li class="nav-item  <?php if($sub_site_name == 'Add Details'){echo('active');} ?>">
	                                    <a href="info_pages.php" class="nav-link ">
	                                		<i class="material-icons">book</i>
	                                        <span class="title">Pages</span>
	                                    </a>
							</li>
	                        <li class="nav-item  <?php if($sub_site_name == 'Images'){echo('active');} ?>">
	                                    <a href="images.php" class="nav-link ">
	                                		<i class="material-icons">book</i>
	                                        <span class="title">Images</span>
	                                    </a>
							</li>
<!--	                        <li class="nav-item <?php //if($sub_site_name == 'All Comments'){echo('active');} ?>">
	                                    <a href="all_comments.php" class="nav-link ">
	                                		<i class="material-icons">comment</i>
	                                        <span class="title">Comments</span>
	                                    </a>
							</li>-->
	                        <li class="nav-item <?php if($sub_site_name == $site_name.' details'){echo('active');} ?>">
	                                    <a href="setting.php" class="nav-link ">
	                                		<i class="material-icons">settings</i>
	                                        <span class="title">Settings</span>
	                                    </a>
							</li>
	                        <li class="nav-item  <?php if($toast == 'admin'){echo('active');} ?>">
	                                    <a href="admin.php" class="nav-link ">
	                                		<i class=" fa fa-user"></i>
	                                        <span class="title">Admins</span>
	                                    </a>
							</li>
	                    </ul>
	                </div>
                </div>
            </div>