


	<script type="text/javascript" src="{{asset('forntEnd/js/jquery-3.6.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/aos.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/custom.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
            $('.loading-data').hide();
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
                $('.loading-data').show();
            });
            var datalist = document.querySelector("datalist");
            datalist.id = "";
            $(document).on('input','.postCodeSearch',function(e){
            	var input = $(this).val();
            	if (input != '' && input.length > 1) {
					datalist.id = "suppliersPincode";
				} else {
					datalist.id = "";
				}
				console.log($(this).val());
            });
        });
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
			      breakpoint: 600,
			      settings: {
			        slidesToShow:1,
			        slidesToScroll:1
			      }
			    }
			  ]
		});

		jQuery(document).ready(function($){
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
		});

		@if(Session::has('Success'))
            swal('Success','{{Session::get('Success')}}', 'success');
        @elseif(Session::has('Errors'))
            swal('Error','{{Session::get('Errors')}}', 'error');
        @endif

		function isNumberKey(evt){  
            if(evt.charCode >= 48 && evt.charCode <= 57){  
                return true;  
            }  
            return false;  
        }
	</script>
	@yield('script')
</body>
</html>

