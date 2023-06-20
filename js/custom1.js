//[Custom Javascript]

//Project:	Cosmetic Agency Html Responsive Template
//Version:	1.1
//Primary use:	Cosmetic Agency Html Responsive Template 

//add your script here
	
	/* ---------------------------------------------------------------------- */
	/*	register login forms
	/* ---------------------------------------------------------------------- */
	
	$('.register-line a').on('click', function(event){
		event.preventDefault();
		$('div.login-form').slideUp(400);
		$('div.register-form').slideDown(400);
	});
	
	$('a.lost-password').on('click', function(event){
		event.preventDefault();
		$('div.login-form').slideUp(400);
		$('div.lost-password-form').slideDown(400);
	});
	
	$('.login-line a').on('click', function(){
		console.log("clicked");
		$('div.lost-password-form').slideUp(400);
		$('div.register-form').slideUp(400);
		$('div.login-form').slideDown(400);
	});

	
	/* ---------------------------------------------------------------------- */
	/*	magnific-popup
	/* ---------------------------------------------------------------------- */

	try {
		// Example with multiple objects
		$('.zoom').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			}
		});

	} catch(err) {

	}

	try {
		// Example with multiple objects
		$('.video-link').magnificPopup({
			type: 'iframe'
		});
	} catch(err) {

	}

	try {
		var magnLink = $('.log-in-popup');
		magnLink.magnificPopup({
			closeBtnInside:true
		});
	} catch(err) {

	}


	function notify(title, message, type) {
		$.notify({
			// options
			//icon: 'glyphicon glyphicon-warning-sign',
			title: title+'<br>',
			message: message,
			target: '_blank'
		},{
			// settings
			element: 'body',
			position: null,
			type: type,
			allow_dismiss: true,
			newest_on_top: false,
			showProgressbar: false,
			placement: {
				from: "top",
				align: "right"
			},
			offset: 20,
			spacing: 10,
			z_index: 1031,
			delay: 5000,
			timer: 1000,
			url_target: '_blank',
			mouse_over: null,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			onShow: null,
			onShown: null,
			onClose: null,
			onClosed: null,
			icon_type: 'class',
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="icon"></span> ' +
				'<span data-notify="title">{1}</span> ' +
				'<span data-notify="message">{2}</span>' +
				'<div class="progress" data-notify="progressbar">' +
					'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
				'</div>' +
				'<a href="{3}" target="{4}" data-notify="url"></a>' +
			'</div>' 
		});
		}
		


function load_product(page_num) {
	$.ajax ({
		url:'ajax/shop_fetch_item.php?pn='+page_num,
		method:'POST',
		dataType:'html',
		data: {
		},
		beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
				if($.isNumeric(page_num)){
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 300);
				}

				},
	   success: function(responseData) {
			$('#display_item').html(responseData);
		}
	});
			}



	
//...................category products selection/////////////
	$(".cat_products_sel").on("click", function() {

		var selected = $(this).attr("id");
		var type = 'empty';
		if(selected == 'brand') {
			selected = $(this).data('brand');
			type = 'brand';
			//alert(selected);
		} else if(selected == 'color') {
			selected = $(this).data('color');
			type = 'color';
			//alert(selected);
		} else {
			//alert(selected);
		}
		
		$.ajax ({ 
			url:'ajax/shop_fetch_item_cat.php',
			method:'POST',
			dataType:'html',
			data: {
				category: selected,
				type: type,
			},
			beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 300);
			},
			success: function(responseData){
				$('#display_item').html(responseData);
			}
		});
	});


	function loadData_cat(page_num) {
		var type = $('#searched_cat').data('type') || 0;

		$.ajax ({ 
			url:'ajax/shop_fetch_item_cat.php?pn='+page_num,
			method:'POST',
			dataType:'html',
			data: {
				category: $('#searched_cat').val(),
				type: type,
			},
			beforeSend: function() {
				$('#display_item').html('<div class="loader2"></div>');
				if($.isNumeric(page_num)){
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 300);
				}
			},
			success: function(responseData) {
				$('#display_item').html(responseData);
			}
		});
	}
//...................category products selection end/////////////




//===================== FILTRATION ==================//
	
$('body').on('change','#toolber-sorter', function() {
		var value = $(this).val();
		var type = $('#searched_cat').data('type') || 0;
		//alert(value);
	//=====================lowest to highest first call ==================//
		if(value == 'Lowest' || value =='Highest') {
			
			//alert($('#searched_cat').val());
			
			if(value == 'Lowest') {
				var sort = 'ASC';
			} else if(value == 'Highest') {
				var sort = 'DESC';
			}
			
			//alert(sort);
			
			$.ajax ({ 
				url:'ajax/get_products_price.php',
				method:'POST',
				dataType:'html',
				data: {
					category: $('#searched_cat').val(),
					sort_by: sort,
					type: type
				},
				beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
				success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
			});
			
		}
		
		
		/////------------------ Get product by name first call ----------------/////
		if(value == 'ProductA' || value =='ProductZ') {
			//alert('yes');
			if(value == 'ProductA') {
				var sort = 'ASC';
			} else if(value == 'ProductZ') {
				var sort = 'DESC';
			}
			
			//alert(sort);
			
			$.ajax ({ 
				url:'ajax/get_products_name.php',
				method:'POST',
				dataType:'html',
				data: {
					category: $('#searched_cat').val(),
					sort_by: sort,
					type: type
				},
				beforeSend: function() {
					$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
				success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
			});
			
		}
	});
//===================== FILTRATION END ==================//
	

/////------------------ Get product by price pagination call start----------------/////
	function loadData_sort(page_num) {
		var value = $('#filter_type').val();
		var type = $('#searched_cat').data('type') || 0;

		if(value == 'Lowest') {
				var sort = 'ASC';
			} else if(value == 'Highest') {
				var sort = 'DESC';
			}
		
	   $.ajax ({ 
			url:'ajax/get_products_price.php?pn='+page_num,
			 method:'POST',
			dataType:'html',
			data: {
				category: $('#searched_cat').val(),
				sort_by: sort,
				type: type
			},
		   beforeSend: function() {
				$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
		  success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
	   });
	}
/////------------------ Get product by price pagination call end ----------------/////


/////------------------ Get product by name pagination call start----------------/////
	function loadData_name(page_num) {
		var value = $('#filter_type').val();
		var type = $('#searched_cat').data('type') || 0;

		if(value == 'ProductA') {
				var sort = 'ASC';
			} else if(value == 'ProductZ') {
				var sort = 'DESC';
			}
		
	   $.ajax ({ 
			url:'ajax/get_products_name.php?pn='+page_num,
			 method:'POST',
			dataType:'html',
			data: {
				category: $('#searched_cat').val(),
				sort_by: sort,
				type: type
			},
		   beforeSend: function() {
				$('#display_item').html('<div class="loader2"></div>');
					 $('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				},
		  success: function(data){
					$('#display_item').html(data);
					//$('#forloader').remove('.loader-wrapper2')
					$('html, body').animate({
						scrollTop: $('#move_to').offset().top
					}, 500);
				}
	   });
	}
/////------------------ Get product by name pagination call end----------------/////



// shoping cart script //////////////////////////////////////////////////////////////////////

	/*------------------------ shop -------------------------------*/
	$('#cart-popover').popover({
		html : true,
			  container: 'body',
			  content:function(){
			   return $('#popover_content_wrapper').html();
			  }
	  });

		  
		  /////////////*Fetch Cart session values start*///////////////
		  load_cart_data();

		  function load_cart_data()
		  {
			$.ajax({
			 url:"ajax/shop_fetch_cart.php",
			 method:"POST",
			 dataType:"json",
			 success:function(data)
			 {
			  $('#cart_details').html(data.cart_details);
			  $('.total_price').text(data.total_price);
			  $('.main_badge').text(data.total_item);
			 }
			});
		  /*Fetch Cart session values end*/
	  };

		  
		function load_cartpage_data()
		{
		$.ajax({
			url:"ajax/shop_fetch_cartpage.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
			$('#cartpage_details').html(data.cart_details);
			$('.total_price').text(data.total_price);
			$('.badge').text(data.total_item);
			get_all_price(data.total_price);
			}
		});
		/*Fetch Cart session values end*/
		};
				
		function load_cartout_data()
		{
		$.ajax({
			url:"ajax/shop_fetch_cartout.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
			$('#cartout_details').html(data.cart_details);
			$('.total_price').text(data.total_price);
			$('.badge').text(data.total_item);
			get_all_price(data.total_price);
			}
		});
		/*Fetch Cart session values end*/
		};
		  
		  
		  /////////////*Add products to cart start*//////////////
		   $(document).on('click', '.add_to_cart', function(){
			var product_id = $(this).attr("id");
			var product_name = $('#name'+product_id+'').val();
			var product_price = $('#price'+product_id+'').val();
			var product_quantity = $('#quantity'+product_id).val();
			var action = "add";
			if(product_quantity > 0)
			{
			 $.ajax({
			  url:"ajax/shop_action.php",
			  method:"POST",
			  data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
			  success:function(data)
			  {
			   load_cart_data();
			   alert("Item has been Added into Cart");
			  }
			 });
			}
			else
			{
			 alert("Please Enter Number of Quantity");
			}
		   });

/////////////// for cart page start //////////////////////
		   $(document).on('change', '.cart_input', function(){
				var product_id = $(this).data("proid");
				var product_name = $('#name'+product_id+'').val();
				var product_price = $('#price'+product_id+'').val();
				var product_quantity = $('#quantity'+product_id).val();
				var action = "add";

				if(product_quantity > 0)
				{
				$.ajax({
				url:"ajax/shop_action_cartpage.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
				load_cartpage_data();
				alert("Product quantity updated");
				}
				});
				}
				else
				{
				alert("Please Enter Number of Quantity");
				}
			});


		   $(document).on('click', '.add_to_cartpage', function(){
			var product_id = $(this).attr("id");
			var product_name = $('#name'+product_id+'').val();
			var product_price = $('#price'+product_id+'').val();
			var product_quantity = $('#quantity'+product_id).val();
			var action = "add";

			if(product_quantity > 0)
			{
			 $.ajax({
			  url:"ajax/shop_action_cartpage.php",
			  method:"POST",
			  data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
			  success:function(data)
			  {
			   load_cartpage_data();
			   alert("Product quantity updated");
			  }
			 });
			}
			else
			{
			 alert("Please Enter Number of Quantity");
			}
		   });
		  /////////////*Add products to cart end*/

		   $(document).on('click', '.deletecartpage', function(){
			var product_id = $(this).attr("id");
			var action = 'remove';
			if(confirm("Are you sure you want to remove this Item?"))
			{
			 $.ajax({
			  url:"ajax/shop_action.php",
			  method:"POST",
			  data:{product_id:product_id, action:action},
			  success:function()
			  {
			   load_cartpage_data();
			   alert("Item has been removed from Cart");
			  }
			 })
			}
			else
			{
			 return false;
			}
		   });
/////////////// for cart page end //////////////////////
		  
		  
		  
		  /////////////*remove products to cart start*/
		  $(document).on('click', '.delete', function(){
			var product_id = $(this).attr("id");
			var action = 'remove';
			if(confirm("Are you sure you want to remove this Item?"))
			{
			 $.ajax({
			  url:"ajax/shop_action.php",
			  method:"POST",
			  data:{product_id:product_id, action:action},
			  success:function()
			  {
			   load_cart_data();
			   alert("Item has been removed from Cart");
			  }
			 })
			}
			else
			{
			 return false;
			}
		   });

		   $(document).on('click', '#clear_cart', function(){
			var action = 'empty';
			if(confirm("Are you sure you want to remove all Item?"))
			{
				$.ajax({
				 url:"ajax/shop_action.php",
				 method:"POST",
				 data:{action:action},
				 success:function()
				 {
				  load_cartpage_data();
				  alert("Your Cart has been clear");
				 }
				});
			}
			else
			{
			 return false;
			}
		   });
		  /////////////*remove products to cart end*/


/////// auth functions ///////////////////

		   /*---------------register Scripts -----------------------*/
		   $('#submit-register').click(function(){
		
			var fullname = $("#fullname").val();
			var username = $("#username3").val();
			var number = $("#number").val();
			var homeaddress = $("#homeaddress").val();
			var email = $("#email-address").val();
			var password = $("#password2").val();
			var verify_password = $("#password-con").val();	
			
			if(password == '' || fullname == '' || username == '' || number == '' || verify_password == ''){
				
				alert("All Fields are required");
				
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
							$("#register_body").addClass("hidden");
							$("#register_footer").addClass('hidden');
							$("#register_process").removeClass('hidden');
							$("#response").addClass('hidden');
						},
					   success:function(data){
						   if(data == 'success'){
								$("#response").removeClass('hidden');
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
								$("#response").removeClass('hidden');
								$("#response").html('<div class="alert label-danger alert-dismissible" role="alert">'+data+'</div>');
								$('#register_body').removeClass('hidden');
								$("#register_footer").removeClass('hidden');
						   }
					   },
					   fail:function(data){
						   
					   }
				   });
				
				} else {
					alert("Passwords do not match");
				}
	
			}
			
			
			
		});
	
	
	
	
		/*---------------Login Scripts -----------------------*/
		$('#submit-login').click(function(){
			
			var username = $("#username").val();
			var password = $("#password").val();
			
			if($('#remember').is(':checked'))
				var remember = 1;
			else
				var remember = 0;	
	
			if(password == '' || username == ''){
				
				alert("All Fields are required");
				
			} else {
				
				$.ajax({
					   url:"ajax/ajax_register.php",
					   method: "POST",
					   dataType: "html",
					   data:{
						   task: "login",
						   username: username,
						   password: password,
						   remember: remember,
					   },
						beforeSend: function() {
							$("#login_body").addClass("hidden");
							$("#login_footer").addClass('hidden');
							$("#login_process").removeClass('hidden');
							$("#login_response").addClass('hidden');
						},
					   success:function(data){
						   if(data == 'success'){
							   $("#login_response").removeClass('hidden');
							   $("#login_response").html('<div class="alert label-success alert-dismissible" role="alert">'+username.toUpperCase()+' Successfully Logged In.. Redirecting</div>');
							   
								$('#login_body').removeClass('hidden');
								$("#login_footer").removeClass('hidden');
								$("#login_process").addClass('hidden');
							   
								$("#username").val('');
								$("#password").val('');
	
								setTimeout(() => {
									location.reload();
								}, 1500);
						   } else {
								$("#login_response").removeClass('hidden');
								$("#login_response").html('<div class="alert label-danger alert-dismissible" role="alert">'+data+'</div>');
							   
							   $('#login_body').removeClass('hidden');
							   $("#login_footer").removeClass('hidden');
							   $("#login_process").addClass('hidden');
						   }
					   },
					   fail:function(data){
						   
					   }
				   });
			
			}
		});

// ///// login 2 scripts //////

		/*---------------Login Scripts -----------------------*/
		$('#submit-login2').click(function(){
			
			var username = $("#usernamelogin2").val();
			var password = $("#passwordlogin2").val();
			
			if($('#rememberlogin2').is(':checked'))
				var remember = 1;
			else
				var remember = 0;	
	
			if(password == '' || username == ''){
				
				alert("All Fields are required");
				
			} else {
				
				$.ajax({
					   url:"ajax/ajax_register.php",
					   method: "POST",
					   dataType: "html",
					   data:{
						   task: "login",
						   username: username,
						   password: password,
						   remember: remember,
					   },
						beforeSend: function() {
							$("#login2_body").addClass("hidden");
							$("#login2_process").removeClass('hidden');
							$("#login2_response").addClass('hidden');
						},
					   success:function(data){
						   if(data == 'success'){
							   $("#login2_response").removeClass('hidden');
							   $("#login2_response").html('<div class="alert label-success alert-dismissible" role="alert">'+username.toUpperCase()+' Successfully Logged In.. Redirecting</div>');
							   
								$('#login2_body').removeClass('hidden');
								$("#login2_process").addClass('hidden');
							   
								$("#usernamelogin2").val('');
								$("#passwordlogin2").val('');
	
								setTimeout(() => {
									location.reload();
								}, 1500);
						   } else {
								$("#login2_response").removeClass('hidden');
								$("#login2_response").html('<div class="alert label-danger alert-dismissible" role="alert">'+data+'</div>');
							   
							   $('#login2_body').removeClass('hidden');
							   $("#login2_process").addClass('hidden');
						   }
					   },
					   fail:function(data){
						   
					   }
				   });
			
			}
		});


		$('body').on('click', '.wishlist', function() {
		
			var wishes = parseInt($('.total-wish').text());
				
			var product_id = $(this).attr('id');
			var customer_id = $('#customer_id').val();
			//alert(product_id);
					$.ajax ({ 
				url:'ajax/process_wishlist.php',
				method:'POST',
				dataType:'html',
				data: {
					customer_id: customer_id,
					product_id: product_id
				},
				beforeSend: function() {
					
				},
				 success: function(data){
					 if(data == 'success') {
						notify('<b>Wishlist</b>', 'Product Added successfully', 'success');
					 } else {
						notify('<b>Wishlist</b>', data, 'danger');
					 }
					 if(data == 'success') {
					 var updated = wishes + 1;
					 $('.total-wish').text(updated);
						 }
				}
			});
				
		});