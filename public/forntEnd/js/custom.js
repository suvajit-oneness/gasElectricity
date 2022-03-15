(function ($, window, Typist) {
    
	/*---------owl-carousel------------*/
	
	
  $('.client_talk').owlCarousel({
		loop:true,
		margin:0,
		autoplay:true,
		dots: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		responsiveClass: true,
		smartSpeed: 2500,
		animateOut: 'slideOutUp',
		//navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:3,
				nav:false
			}
		}
	});
	
	/*-------active---------*/
	
	$(document).ready(function() {
		$(".nav-link").click(function () {
			$(".nav-link").removeClass("active");
			$(this).addClass("active");   
		});
	});
	
	
	/*-------------headder_fixed-------------*/
	
	
		$(window).scroll(function(){
			var sticky = $('.header'),
				scroll = $(window).scrollTop();
		  
			if (scroll >= 20) sticky.addClass('fixed');
			else sticky.removeClass('fixed');
		});
	
/*--------------ASO.JS---------------*/
	
 AOS.init();
		
//refresh animations
 
 $(window).on('load', function() {
 	AOS.refresh();
 });


})(jQuery, window);



