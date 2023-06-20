//[Master Javascript]

//Project:	Cosmetic Agency Html Responsive Template
//Version:	1.1
//Last change:	01/06/2017
//Primary use:	Cosmetic Agency Html Responsive Template 



jQuery(function ($) {
    "use strict";
	
// Masterslider 
	var slider = new MasterSlider();
		slider.setup('masterslider' , {
			width:1024,
			height:580,
			//space:100,
			fullwidth:true,
			centerControls:false,
			speed:18,
			view:'flow',
			overPause:false,
			autoplay:true
		});
		//slider.control('arrows');
		slider.control('bullets' ,{autohide:false}); 
	
// Masterslider shop
	 var slider = new MasterSlider();
         
        slider.control('arrows');  
        slider.control('thumblist' , {autohide:false ,dir:'h',arrows:true, align:'bottom', width:127, height:137, margin:5, space:5});
     
        slider.setup('masterslidershop' , {
            width:540,
            height:586,
            space:5,
            view:'scale'
        });

	
// Portfolio and blog slider
	
	$('.owl-carousel').owlCarousel({
			loop:true,
			margin:15,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:false,
			responsiveClass:true,
			responsive:{
				0:{
					items:2,
					nav:false
				},
				600:{
					items:4,
					nav:false
				},
				1000:{
					items:6,
					nav:true,
					dots:false
				}
			}
			
		})
	

	
});// End of use strict