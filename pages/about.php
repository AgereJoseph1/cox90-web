<?php

require_once("functions/init.php");
$sub_site_name = "contact";

?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

     
  </head>

  <body id="home">
  	
<?php include('webparts/header.php') ?>

    
    <!--Page Title-->
    
	<div class="page_title_ctn"> 
		<div class="container-fluid">
          <h2>Contact</h2>
          
          	<ol class="breadcrumb">
              <li><a href="./home">Home</a></li>
              <li class="active"><span>About <?php echo($site_name); ?></span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!-- Contact Section -->
    
    <section class="contactus-one" id="contactus"><!-- Section id-->
        <div class="container">
            <div class="row">
            <h4>About <?php echo($site_name); ?></h4>
            	<?php echo(page_content('About-us')); ?>                
            </div>            
        </div>
    </section>            
    
      <?php include('webparts/footer.php') ?>         
    
    <!-- template JavaScript -->
    <script src="js/template.js"></script>

  </body>
</html>
