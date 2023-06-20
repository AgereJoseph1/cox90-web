<?php

require_once("functions/init.php");
$sub_site_name = "Login";

if(logged_in()) {
	redirect('home');
}
if(isset($_POST['task']) && $_POST['task'] == 'login') {
	$email = trim(escape(clean($_POST['username'])));
	$password = trim(escape(clean($_POST['password'])));
	$remember = (int)$_POST['remember'];
	
	$timestamp = time();

	if(empty($email)) {
		$errors[] = "Email | Username field cannot be empty";
	}
	if(empty($password)) {
		$errors[] = "Password field cannot be empty";
	}

	if(empty($errors)){

		if(login_user($email, $password, $remember)) {

			redirect('home');

		} else {

			$errors[] = "Oops! Invalid Email or Password";

		} 
		
	} 
	
	
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

	<?php include ('webparts/css.php'); ?>

<style>
    .rd-stroke-btn .logintext:hover {
        color: white !important;
    }
</style>
     
  </head>

  <body id="home">
  	
<?php include('webparts/header.php') ?>

    
    <!--Page Title-->
    
	<div class="page_title_ctn" id='move_to'> 
          <h2>Contact</h2>
          
          	<ol class="breadcrumb">
              <li><a href="./home">Home</a></li>
              <li class="active"><span>Contact</span></li>
            </ol>
           
    </div>  
    
    <!-- Contact Section -->
    
    <section class="contactus-one" id="contactus"><!-- Section id-->
        <div class="container">
            <div class="row">
				<div class=" col-md-12 col-sm-12">
					<div  class="white-popup log-in-popup">
						<form action='login' method='POST'>
							
						<div class="login-form">
							<div class="title-section">
								<h1><span>Login</span></h1>
							</div>
							<p>Welcome to <span  style='color:#e74769'>Cox90</span>! Login into your account</p>

							<div id="login_response" style="color: white; text-align: center">
								<?php 
									if(!empty($errors)) { ?>
										<div class="alert label-danger alert-dismissible" role="alert">
											<?php
												foreach($errors as $error) {
													echo($error."<br>");
												} 
											?>
										</div>
										<?php
									}
								?>
							</div>
						<div id="login_body">
							<label for="username">Username or email address<span>*</span></label>
							<input type="text" name="username" id="username" required/>
							<label for="password">Password<span>*</span></label>
							<input type="password" name="password" id="password" required/>
							<input type="hidden" name="task" value='login'/>
						</div>

							<button type="submit">
								<i class="fa fa-arrow-circle-right"></i> Login
							</button>
						<div id="login_footer">
							<input type="checkbox" name="remember" id='remember'/> <span>Remember me</span>
							
							<p class="register-line">Don't have account. <a style='color: #ee2b63; font-weight: 500; font-size: 1.2em; text-decoration: none; cursor: pointer'>Register</a></p>
							<a class="lost-password pull-right" style='cursor: pointer'>Lost your password?</a>
						</div>
						</div>
						</form>


<div class="lost-password-form">
	<div class="title-section">
		<h1><span>Lost Password</span></h1>
	</div>
	<label for="username">Type your email address<span>*</span></label>
	<input type="text" name="username" id="username2"/>
	<button type="submit" id="submit-login2">
		<i class="fa fa-arrow-circle-right"></i> Submit
	</button>
	<p class="login-line">Back to <a  style='cursor: pointer' >Login</a></p>
</div>



						<div class="register-form">
							<div class="title-section">
								<h1><span>Register</span></h1>
							</div>
							
							<div class="hidden" id="register_process">
								<label class = "text-info">Signing Up... Please wait!.</label><br>
								<div>
								
								</div>
							</div>
							<div id="response" style="color: white; text-align: center">

							</div>
							<div class='show-login hidden'>
							<p class="btn rd-stroke-btn center-block login-line"><a class='logintext' style='cursor: pointer; text-decoration: none; display: block;'>Login</a></p>
							</div>
						
						<div id="register_body">
							<label for="username">Full Name<span>*</span></label>
							<input type="text" name="fullname" id='fullname'/>
							<label for="username">Username<span>*</span></label>
							<input type="text" name="username" id="username3"/>
							<label for="email-address">Email Adress</label>
							<input type="text" name="email-address" id="email-address"/>
							<label for="username">Mobile Number<span>*</span></label>
							<input type="number" name="number" id="number"/>
							<label for="username">Address<span>*</span></label>
							<input type="text" name="address" id="homeaddress"/>
							<label for="password">Password<span>*</span></label>
							<input type="password" name="password" id="password2"/>
							<label for="password-con">Password<span>*</span></label>
							<input type="password" name="password-con" id="password-con"/>
						</div>
						<div id="register_footer">
							<button type="submit" id="submit-register" onclick="registerUser()" style='margin-bottom: 20px'>
								<i class="fa fa-arrow-circle-right"></i> Register
							</button>
							<p class="login-line">Back to <a style='color: #ee2b63; font-weight: 500; font-size: 1.2em; text-decoration: none; cursor: pointer'>Login</a></p>
						</div>
						</div>
					</div>
				</div>     
				<div class=" col-md-6 col-sm-12">
				</div>           
            </div>            
        </div>
    </section>            
    
    <script>
        
    function registerUser() {
		var fullname = $("#fullname").val();
		var username = $("#username3").val();
		var number = $("#number").val();
		var homeaddress = $("#homeaddress").val();
		var email = $("#email-address").val();
		var password = $("#password2").val();
		var verify_password = $("#password-con").val();	
		
		if(password == '' || fullname == '' || username == '' || number == '' || verify_password == ''){
			
			alert("All Fields are required");
			
		} else if(number.length < 10){
			
			alert("Enter a valid mobile number");
			
		} else {
			
			if(verify_password === password){
			
			$.ajax({
				   url:"ajax/ajax_register.php",
				   method: "POST",
				   dataType: "html",
				   data:{
					   task: "register",
					   fullname: fullname,
					   username: username,
					   email: email,
					   homeaddress: homeaddress,
					   number: number,
					   password: password,
					   verify_password: verify_password,
				   },
					beforeSend: function() {
						$("#response").addClass('hidden');
						$("#register_body").addClass("hidden");
						$("#register_footer").addClass('hidden');
						$("#register_process").removeClass('hidden');
						$("#response").addClass('hidden');
						$('html, body').animate({
							scrollTop: $('#move_to').offset().top
						}, 300);
					},
				   success:function(data){
					   if(data == 'success'){
							$("#response").removeClass('hidden');
							$(".show-login").removeClass('hidden');
						    $("#response").html('<div class="alert label-success alert-dismissible" role="alert">'+username.toUpperCase()+' Successfully Registered \n Please Login to continue shopping</div>');
						   
							$('#register_body').removeClass('hidden');
							$("#register_footer").removeClass('hidden');
							$("#register_process").addClass('hidden');
						   
							$("#fullname").val('');
							$("#username3").val('');
							$("#number").val('');
							$("#homeaddress").val('');
							$("#email-address").val('');
							$("#password2").val('');
							$("#password-con").val('');	
					   } else {
							$("#register_process").addClass('hidden');
							$("#response").removeClass('hidden');
							$("#response").html('<div class="alert label-danger alert-dismissible" role="alert">'+data+'</div>');
							$('#register_body').removeClass('hidden');
							$("#register_footer").removeClass('hidden');
							$("#password2").val('');
							$("#password-con").val('');	
					   }
				   },
				   fail:function(data){
					   
				   }
			   });
			
			} else {
				alert("Passwords do not match");
			}

		}
    }
    
    </script>
    
      <?php include('webparts/footer.php') ?>          
                

  </body>
</html>
