<?php

require_once("functions/init.php");
$sub_site_name = "blog";

?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

     
  </head>

  <body id="home">
  	
  	
<?php include('webparts/header.php') ?>

    
    <!--Page Title-->
    
	<div class="page_title_ctn" id='move_to'> 
		<div class="container-fluid">
          <h2>Blog</h2>
          
          	<ol class="breadcrumb">
              <li><a href="home">Home</a></li>
              <li class="active"><span>Blog</span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!-- Blog Post Style 1 -->    
    <section class="blogstyle-1">
        <div class="container" id='latest_articles'>
                

            
            </div><!-- /.row -->
        </div> 
    </section>            
               
  	
<?php include('webparts/footer.php') ?>
                                                  
    
    <!-- template JavaScript -->
    <script src="js/template.js"></script>
    <script>
                    load_latest_news();

                function load_latest_news(page_num) {
                    $.ajax ({
						url:'ajax/get_latest_news.php?pn='+page_num,
                        method:'POST',
						dataType:'html',
						data: {
						},
						beforeSend: function() {
				                $('#latest_articles').html('<div style="min-height: 400px"><div style="margin-top:10%" class="loader2"></div><div>');
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
