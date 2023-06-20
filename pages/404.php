<?php

require_once("functions/init.php");
$sub_site_name = "404";

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
				<div id="notfound">
				<div class="notfound">
					<div class="notfound-404">
						<h1>404</h1>
					</div>
					<h2>Oops, The Page you are looking for can't be found!</h2>
            		<form class="notfound-search" role="search" id="searchform" method="get" action="products">
						<input type="text" class="form-control"value="" name="search" type="search" placeholder="Search product here..." autofocus>
						<button type="submit">Search</button>
					</form>
					<a href="./home"><span class="arrow"></span>Return To Homepage</a> <br>
					<a href="./products"><span class="arrow"></span>Return To Product page</a> <br>
					<a href="./contact"><span class="arrow"></span>Contact Us</a> <br>
				</div>
			</div>              
            </div>            
        </div>
    </section>            
    
      <?php include('webparts/footer.php') ?>    
    
    <!-- template JavaScript -->
    <script src="js/template.js"></script>

    <script>
    
	
	$('#submit_contact').click(function(e){
    e.preventDefault();
    
		var _comment = $('#comment_text').val();
		var _user_name = $('#name').val();
		var _email = $('#mail').val();
		var _phone = $('#contactmobile').val();
		
		
    if(_user_name == '' || _comment == ''){
				
			notify('<b>Contact Form</b>', 'Name and message is required', 'danger');
				
			} else {
				
			
		//post data
		//	console.log('text');
			$('#comment_text').css('border', '1px solid #e1e1e1');
			
			$.ajax({
			   url:"ajax/contact_insert.php",
			   method: "POST",
			   dataType: "html",
			   data:{ 
				 task: "contact_insert",
				 user_name: _user_name,
				 email: _email,
				 phone: _phone,
				 comment: _comment,
			   },
				beforeSend: function() {
						$('#coment_response').removeClass('hidden').addClass('btn-primary');
						$("#coment_response").text('Sending Message ');
				},
			   success:function(data){
				   if(data == 'success'){
				   	$('#coment_response').text('Message Successfully Sent').removeClass('btn-danger').addClass('btn-success');
					// remove text from textarea
					$('#comment_text').val('');
				   } else {
				    $('#coment_response').removeClass('hidden').addClass('btn-danger');
				   	$('#coment_response').html(data);
				   }

			   },
			   fail:function(data){

			   }
		   });
			
			
		} 
		
		
		
	});
		
	
    
    </script>

  </body>
</html>
