function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

jQuery(document).ready(function($) { 




$('.slide-logo').slick({
  dots: false,
  infinite: true,
  speed: 300,
  autoplay:true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
});


$('.testi-alider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  autoplay:false,
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: false,
	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow:2,
	        slidesToScroll:1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow:1,
	        slidesToScroll:1
	      }
	    }
	  ]
});

$('.team_member_list').slick({
  dots: true,
  infinite: true,
  speed: 300,
  autoplay:false,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow:4,
	        slidesToScroll:1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow:3,
	        slidesToScroll:1
	      }
	    },
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow:2,
	        slidesToScroll:1
	      }
	    },
	    {
	      breakpoint: 575,
	      settings: {
	        slidesToShow:1,
	        slidesToScroll:1
	      }
	    }
	  ]
});

// Acordeon
	$('.dropdown-toggle').click(function(e) {
	  	e.preventDefault();
	  
	    var $this = $(this);
	  
	    if ($this.hasClass('dropdown-active')) {
	        $this.removeClass('dropdown-active');
	        $this.next().slideUp(350);
	    } else {
	        $this.toggleClass('dropdown-active');
	        $this.next().slideToggle(350);
	        $('.dropdown-toggle').not($(this)).removeClass('dropdown-active');
	        $('.dropdown-inner').not($(this).next()).slideUp('600');
	    }
	});

	 



$(document).ready(function(){
  $(".trigger").click(function(){
    $(".note_content").slideToggle("fast");
  });
});
$(document).ready(function(){
  $(".close-panel").click(function(){
    $(".plan_wraper").slideToggle("fast");
  });
});



});