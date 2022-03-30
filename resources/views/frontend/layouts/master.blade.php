<!DOCTYPE html>
<html lang="en">
{{-- <head>
	<title>{{config('app.name', 'Laravel')}} - @yield('title')</title>
	<link rel="icon" href="{{asset('forntEnd/images/logo.png')}}" type="image/gif" sizes="any">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="{{asset('forntEnd/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('forntEnd/css/slick.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('forntEnd/css/slick-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('forntEnd/css/style.css')}}">
	@yield('css')
</head> --}}
 <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="./favicon.ico">
		<title>{{config('app.name', 'Laravel')}} - @yield('title')</title>

        <!--CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link href="{{asset('forntEnd/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/aos.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('forntEnd/css/responsive.css')}}" rel="stylesheet" type="text/css">
		@yield('css')
    </head>

<body>
    <!-- loader -->
    {{-- <div class="loading-data" style="display:block; color: #fff;">Loading&#8230;</div> --}}

	<header class="header">
	<!-- Header -->
	@include('frontend.layouts.header')

	<!-- Content -->
	@yield('content')

	<!-- Footer -->
	@include('frontend.layouts.footer')

	{{-- <script src="{{asset('forntEnd/js/jquery.min.js')}}"></script>
	<script src="{{asset('forntEnd/js/popper.min.js')}}"></script>
	<script src="{{asset('forntEnd/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('forntEnd/js/custome.js')}}"></script>
	<script type="text/javascript" src="{{asset('design/js/sweetalert.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/slick.min.js')}}"></script> --}}


	<script type="text/javascript" src="{{asset('forntEnd/js/jquery-3.6.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('forntEnd/js/aos.js')}}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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