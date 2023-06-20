<?php 
$sub_site_name = 'login';
require_once('functions/init.php');

?>



<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title><?php echo($site_name); ?>- Admin login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <!-- Le styles -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/css/login.css" type="text/css">


    <style type="text/css">
      body {
        padding-top: 30px;
      }
    </style>

</head>
  <body>

  	<!-- NAVIGATION MENU -->


    <div class="container">
        <div class="row">
   		<div class="offset-4 col-lg-4" style="margin-top:100px">

				<?php display_message();  ?>

				<?php validate_admin_login(); ?>			

   			<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
   				<br>
   				<img src="assets/img/profile.png" style="border-radius: 50%" width="50px" alt="" class="img-circle">
   				<br>
   				<br>
					<form class="cmxform" id="signupForm" method="post" action="login.php">
						<fieldset>
							<p>
								<input id="username" value="" name="email" autocomplete="off"  type="email" placeholder="Email" required>
								<input id="password" autocomplete="off" name="password" type="password" placeholder="Password"><br>
								<div id="registererror" style="color: red" ></div>
							</p>
								<input class="submit btn-success btn btn-large"  type="submit" value="Login" name="submit" required>
						</fieldset>
					</form>
					<a href="../home"><p style="text-align: center; margin-top: 10px; color: goldenrod">Back to main page</p></a>
					<div style="color: wheat"><?php echo($site_name); ?></div>
					<p style="color: wheat"><?php echo($company_name); ?></p>
   			</div>

   		</div>

		
        </div>
    </div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    
  
</body></html>