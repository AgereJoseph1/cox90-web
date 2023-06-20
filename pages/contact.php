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
              <li><a href="#">Home</a></li>
              <li class="active"><span>Contact</span></li>
            </ol>
           
    	</div>
    </div>  
    
    <!-- Contact Section -->
    
    <section class="contactus-one" id="contactus"><!-- Section id-->
        <div class="container">
            <div class="row">
            	<div class="col-md-6 col-sm-6">
                  <div class="mapouter"><div class="gmap_canvas" style="max-width: 500px"><iframe width="500" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=madina%20ghana&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net"></a></div><style>.mapouter{text-align:right;height:500px;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                    </div>
            	<div class=" col-md-5 col-sm-6">
                	<div class="contact-block">
                        <div class="dart-headingstyle-one dart-mb-20">  <!--Style 1-->
                        <h2 class="dart-heading">Contact US</h2>
                      </div>
                        
                        <div class="contact-form"><!-- contact form -->
                            <div class="row" id="contact" name="contact">
                              <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name *" style='color: black' required >
                              </div>
                              <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="mail" id="mail" placeholder="Your Email" style='color: black' required >
                              </div>
                              <div class="form-group col-md-12">
                                <input type="email" class="form-control" name="mail" style='color: black' id="contactmobile" placeholder="Mobile Number" >
                              </div>
                              <div class="form-group col-md-12">
                                <textarea class="form-control" name="comment_text" style='color: black' id="comment_text" rows="5" placeholder="Message *" required  ></textarea>
                              </div>
                              <div class="col-md-12">
                              <button name="submit" type="submit" id='submit_contact' class="btn normal-btn dart-btn-xs">SEND MESSAGE</button><br>
										          <span class=" btn hidden" id="coment_response" style="border-radius: 0"></span>
                              </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class=" row contact-info">
                        	  <div class="col-md-12 col-sm-12">
                        		  <p class="addre"><i class="fa fa-map-marker"></i><?php echo(setting('Address')); ?></p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                        	  	<p class="phone-call"><i class="fa fa-phone"></i> <a><?php echo(setting('Contact')); ?></a></p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                        	  	<p class="mail-id"><i class="fa fa-envelope"></i><?php echo(setting('Email')); ?></p>
                            </div>
                        </div>
                        
					</div>
                </div>                
            </div>            
        </div>
    </section>            
    
      <?php include('webparts/footer.php') ?>     

    <script>
    
	
   $(document).on('click', '#submit_contact', function(e){
    
		var _comment = $('#comment_text').val();
		var _user_name = $('#name').val();
		var _email = $('#mail').val();
		var _phone = $('#contactmobile').val();
		
		
    if(_user_name == '' || _comment == ''){

			notify("Contact <br> Name and message is required");
				
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
