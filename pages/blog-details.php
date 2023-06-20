<?php

require_once("functions/init.php");
$sub_site_name = "blog-details";
		
if(isset($path['call_parts'][1]) && $path['call_parts'][1] !== '' ) {

    $id = mysqli_real_escape_string($con, strip_tags($path['call_parts'][1]));

    $q = "SELECT * FROM news WHERE url_title = '$id' ";
    $r = query($q);
    
    $news_sel = mysqli_fetch_assoc($r);

    if(!isset($_SESSION[$id])) {
        query("UPDATE news SET views = views + 1 WHERE url_title = '$id'");
        $_SESSION[$id] = 1;
    }
    
    if(mysqli_num_rows($r) == 0) {
        
        $q = "SELECT * FROM news WHERE url_title = '$id' ";
        $r = query($q);
        
        $news_sel = mysqli_fetch_assoc($r);
    }	

            //.............redirect user if fecth results is 0
    if(mysqli_num_rows($r) == 0) {header("Location: ../home"); }

        //.............redirect user if part 2 is set but is empty
} elseif (isset($path['call_parts'][1]) && $path['call_parts'][1] == '') {
    header("Location: ../home");

    //.............redirect user if part 2 is not set 
} else {
    header("Location: home");
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

    <!-- flexSlider CSS file -->
	<link rel="stylesheet" href="vendor/woocommerce-FlexSlider/flexslider.css" type="text/css" media="screen" />
	
    <style>
	 .card {
		/* Add shadows to create the "card" effect */
		box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);
		transition: 0.3s;
		padding-bottom: 5px;
	}

	/* On mouse-over, add a deeper shadow */
	.card:hover {
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
	}

	 </style>
  </head>

  <body id="home">
  	
  	
<?php include('webparts/header.php') ?>
    
    <!--Page Title-->
    
	<div class="page_title_ctn" id='move_to'> 
		<div class="container-fluid">
          <h2>Blog</h2>
          
          	<ol class="breadcrumb">
              <li><a href="home">Home</a></li>
              <li><a href="blog">Blog</a></li>
              <li class="active"><span><?php echo($news_sel['title']); ?></span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!-- Blog Post Style 1 -->
    
    <section class="blog-single" id="blog_s_post"><!-- Section id-->
        <div class="container">

            <div class="row">
            <div id='latest_articles'>
                <div class="col-md-9 col-sm-8">
                    <div class="blog-posts single-post">

                        <article class="post post-large blog-single-post">
                            <div class="post-image">
                             <img class="img-responsive" src="uploads/images/news/thumb/<?php echo($news_sel['image']); ?>" alt="">                                
                            </div>

                            <div class="post-date">
                                <span class="day"><?php echo(date('jS', strtotime($news_sel['date']))); ?></span>
                                <span class="month"><?php echo(date('M', strtotime($news_sel['date']))); ?></span>
                            </div>

                            <div class="post-content">

                                <h2><a><?php echo($news_sel['title']); ?></a></h2>

                                <!-- <div class="post-meta">
                                    <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                                </div> -->

                                <p><?php echo($news_sel['description']); ?></p>


                                <div class="post-block post-share">
                                    <h3><i class="fa fa-share"></i>Share this post</h3>

                                    <div class="addthis_inline_share_toolbox"></div>

                                </div>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
				
                
                <div class="col-md-3 col-sm-4">
                    <aside class="sidebar">

                        <div>
                            <div class="input-group input-group-lg">
                                <input class="form-control" placeholder="Search news..."  id="searchterm" type="text">
                                <span class="input-group-btn">
                                    <button type="submit" id="searchsubmit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>

                        <hr class="sep-line" />

                        <h4 class="blue">Categories</h4>
                        <ul class="nav nav-list primary">
                    <?php $cats =  get_categories();
                            if(mysqli_num_rows($cats) > 0){
                                while($cat = mysqli_fetch_assoc($cats)) { ?>
                            <li><a  style="cursor: pointer" id="<?php echo($cat['url_title']) ?>" class="cat_news_sel">
                            <?php echo(strtoupper($cat['title'])); ?>
                            <span>(<?php echo(categories_news_count($cat['url_title'])); ?>)</span>
                            </a></li>

                    <?php }
                            } ?>
                            <li><a style="cursor: pointer" href="blog">All Posts</a>
                            </li>
                        </ul>

                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Popular</a></li>
                                <li><a href="#recentPosts" data-toggle="tab">Recent</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="popularPosts">
                                    <ul class="simple-post-list">
										<?php 
											$popular = get_highest('views', 5); 
											
											while($rec_news = mysqli_fetch_assoc($popular)) { ?> 

                <li>
                    <div class="post-image">
                        <div class="img-thumbnail">
                            <a href="blog-details/<?php echo($rec_news['url_title']) ?>">
                                <img src="uploads/images/news/thumb/small_<?php echo($rec_news['image']); ?>" alt="<?php echo($rec_news['title']); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="post-info">
                        <a href="blog-details/<?php echo($rec_news['url_title']) ?>"><?php echo($rec_news['title']); ?></a>
                        <div class="post-meta">
                        <?php echo(date('M j, Y', strtotime($rec_news['date']))); ?>
                        </div>
                    </div>
                </li>
											
											<?php }
										?>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="recentPosts">
                                    <ul class="simple-post-list">
                                
                                <?php 
                                        $q= "SELECT title, url_title, date, image FROM news ORDER BY id DESC LIMIT 5";
                                        $results = query($q);
                                      if(mysqli_num_rows($results) > 0){
                                          while($rec_news = mysqli_fetch_assoc($results)) { ?>

                                        <li>
                                            <div class="post-image">
                                                <div class="img-thumbnail">
                                                    <a href="blog-details/<?php echo($rec_news['url_title']) ?>">
                                                        <img src="uploads/images/news/thumb/small_<?php echo($rec_news['image']); ?>" alt="<?php echo($rec_news['title']); ?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="post-info">
                                                <a href="blog-details/<?php echo($rec_news['url_title']) ?>"><?php echo($rec_news['title']); ?></a>
                                                <div class="post-meta">
                                                <?php echo(date('M j, Y', strtotime($rec_news['date']))); ?>
                                                </div>
                                            </div>
                                        </li>
                                        
								<?php } } else { ?> 
                           			  
                                         <div class="post">
                                               <h4><a>No Post Available</a></h4>
                                           </div>	
                             
                               <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr class="sep-line" />

                        <h4 class="blue">About Us</h4>
                        <p><?php echo(setting('About')); ?></p>

                    </aside>
                </div>                
            </div>
		</div>
    </section>           
                   

  	
      <?php include('webparts/footer.php') ?>
                                             
                                                                
    	
    
    <!-- FlexSlider -->
    <script defer src="vendor/woocommerce-FlexSlider/jquery.flexslider.js"></script> 
    
    <!-- template JavaScript -->
    <script src="js/blog-script.js"></script>

    <script>

                function load_latest_news(page_num) { 
                    $.ajax ({
						url:'ajax/get_latest_news.php?pn='+page_num,
                        method:'POST',
						dataType:'html',
						data: {
						},
						beforeSend: function() {
				                $('#latest_articles').html('<div style="min-height: 400px" class="col-md-9 col-sm-8"><div style=" left:35%" class="loader2"></div><div>');
								if($.isNumeric(page_num)){
									 $('html, body').animate({
										scrollTop: $('#move_to').offset().top
									}, 300);
								}
							
								},
                       success: function(responseData) {
                            $('#latest_articles').html(responseData);
                        }
					});
							}

                //...................category news selection
                $(".cat_news_sel").on("click", function() {

                    var selected = $(this).attr("id");

                    $.ajax ({ 
                        url:'ajax/get_news_cat.php',
                        method:'POST',
                        dataType:'html',
                        data: {
                            category: selected
                        },
                        beforeSend: function() {
				                $('#latest_articles').html('<div style="min-height: 400px" class="col-md-9 col-sm-8"><div style=" left:35%" class="loader2"></div><div>');
                                $('html, body').animate({
                                    scrollTop: $('#move_to').offset().top
                                }, 300);
                        },
                        success: function(responseData){
                            $('#latest_articles').html(responseData);
                        }
                    });
                });
	
	
                // ...............................news search field
                $('#searchsubmit').click(function() {
                    
                    $.ajax ({ 
                        url:'ajax/get_news_search.php',
                        method:'POST',
                        dataType:'html',
                        data: {
                            search: $('#searchterm').val()
                        },
                        beforeSend: function() {
				                $('#latest_articles').html('<div style="min-height: 400px" class="col-md-9 col-sm-8"><div style=" left:35%" class="loader2"></div><div>');
                                $('html, body').animate({
                                    scrollTop: $('#move_to').offset().top
                                }, 300);
                        },
                        success: function(responseData) {
                            $('#latest_articles').html(responseData);
                        }
                    });
                });
                

                function loadData_search(page_num) {
                $.ajax ({ 
                        url:'ajax/get_news_search.php?pn='+page_num,
                        method:'POST',
                        dataType:'html',
                        data: {
                            search: $('#searched_search').val()
                        },
                    beforeSend: function() {
				                $('#latest_articles').html('<div style="min-height: 400px" class="col-md-9 col-sm-8"><div style=" left:35%" class="loader2"></div><div>');
                            if($.isNumeric(page_num)){
                                $('html, body').animate({
                                    scrollTop: $('#move_to').offset().top
                                }, 300);
                            }
                        },
                        success: function(responseData) {
                            $('#latest_articles').html(responseData);
                        }
                });
                }
    </script>
  </body>
</html>
