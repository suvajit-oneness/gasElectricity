@extends('frontend.layouts.master')
@section('title','About Us')
@section('content')
	
<section class="page_banner">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading text-white pb-0 mb-0 text-center">About Us</h1>
			</div>
		</div>
	</div>
</section>

<section class="section_intro_wrap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-7 col-lg-7">
				<div class="intro_content">
					<h2>Compare, Switch & Save today with Switchr</h2>
					<h6 class="semibold green f-20">We believe all consumers deserve to know that there is a better energy deal available to them. And they should be able to access that deal quickly and easily so they can begin saving on their energy bills right away.</h6>
					<p
					>At Econnex we are affiliated with the best energy retailers in the Australian market, making it easy for consumers to compare energy prices and access the best deals. We bring you only the best electricity and gas deals while cutting through the marketing spin. Our sophisticated engine compares all the options quickly and presents you with the very best plans available, ensuring that you are immediately saving on your next bill.</p>
					<a href="#">Learn how energy comparison works with Econnex.</a>
				</div>
			</div>
			<div class="col-12 col-md-5 col-lg-5">
				<div class="intro_img_wrap">
					<img src="{{asset('forntEnd/images/img-1.png')}}">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="why_choose_wrap">
	<div class="container">
		<h2 class="heading text-center">Why Choose Us</h2>
		<div class="row">
			<div class="why_choose_content">
				<ul>
					<li>
						<div class="why_choose_img_wrap">
							<img src="{{asset('forntEnd/images/inovative_system.png')}}">
						</div>
						<h5>Innovative System</h5>
						<p>Econnex is an innovative system helping you and thousands of Aussies compare energy plans across Australia.</p>
					</li>
					<li>
						<div class="why_choose_img_wrap">
							<img src="{{asset('forntEnd/images/calculator.png')}}">
						</div>
						<h5>Latest Technology</h5>
						<p>We use the latest technology to search and compare electricity and gas plans from our panel of leading retailers.</p>
					</li>
					<li>
						<div class="why_choose_img_wrap">
							<img src="{{asset('forntEnd/images/service.png')}}">
						</div>
						<h5>Free Service</h5>
						<p>We don’t charge you anything to use our service and we won’t call or try to steer you into something you don’t need.</p>
					</li>
					<li>
						<div class="why_choose_img_wrap">
							<img src="{{asset('forntEnd/images/ecosystem.png')}}">
						</div>
						<h5>Be Energy Smart</h5>
						<p>Econnex filters through available energy prices and deals so you can make an informed decision of your Energy needs.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="consumers_update">
	<div class="container">
		<div class="update_content">
			<h2 class="text-center text-white">We’ve helped consumers to reduce <span class="bold d-block">their bills by up to 32% in their first year!</span></h2>
			<ul class="update_items">
				<li>
					<h2>250000+</h2>
					<p>compared on Econnex</p>
				</li>
				<li>
					<h2>4.6/5</h2>
					<p>Real User Reviews</p>
				</li>
				<li>
					<h2>$8.5M+</h2>
					<p>Savings on Energy Bills</p>
				</li>
			</ul>
		</div>
	</div>
</section>

<section class="team_wraper">
	<h2 class="heading text-center">Our Team</h2>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="team_member_list">
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-1.png')}}">
						<h5>Olivia Goams</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-2.png')}}">
						<h5>Jenny Watson</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-3.png')}}">
						<h5>John Doe</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-4.png')}}">
						<h5>Alix Jonson</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-1.png')}}">
						<h5>Olivia Goams</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-2.png')}}">
						<h5>Jenny Watson</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-3.png')}}">
						<h5>John Doe</h5>
						<p>CEO / Director</p>
					</div>
					<div class="team_member">
						<img src="{{asset('forntEnd/images/member-4.png')}}">
						<h5>Alix Jonson</h5>
						<p>CEO / Director</p>
					</div>
				</div>
				<a href="#" class="blue-btm d-inline-block mt-4 mt-md-5">view all <span><i class="fas fa-arrow-circle-right"></i></span></a>
			</div>
		</div>
	</div>
</section>

<section class="blog_wraper blog_wraper-mod bg_lightgrey">
	<div class="container">
		<h2 class="heading text-center">latest blog</h2>
		<div class="blog_container text-center">
			<ul class="blog-list">
				<li>
					<div class="inner-box" style="background:url(forntEnd/images/blog-1.png) no-repeat center center; background-size: cover;">
						<div class="grid-content">
							<a href="#" class="date">October 24, 2018</a>
							<a href="#" class="blog-heading">LOREM IPSUM DOLOR SIT AMET DUMMY</a>
						</div>
						
					</div>
				</li>
				<li>
					<div class="inner-box" style="background:url(forntEnd/images/blog-2.png) no-repeat center center; background-size: cover;">
						<div class="grid-content">
							<a href="#" class="date">March 10, 2017</a>
							<a href="#" class="blog-heading">DOLOR SIT AMET DUMMY TEXT</a>
						</div>
					</div>
				</li>
				<li>
					<div class="inner-box" style="background:url(forntEnd/images/blog-3.png) no-repeat center center; background-size: cover;">
						<div class="grid-content">
							<a href="#" class="date">March 10, 2017</a>
							<a href="#" class="blog-heading">CAN AGILE PRODUCE RELIABLE PLANS?</a>
						</div>
					</div>
				</li>
				<li>
					<div class="inner-box" style="background:url(forntEnd/images/blog-4.png) no-repeat center center; background-size: cover;">
						<div class="grid-content">
							<a href="#" class="date">January 22, 2018</a>
							<a href="#" class="blog-heading">BEING AGILE OUTSIDE OF I.T.</a>
						</div>
					</div>
				</li>
				<li>
					<div class="inner-box" style="background:url(forntEnd/images/blog-5.png) no-repeat center center; background-size: cover;">
						<div class="grid-content">
							<a href="#" class="date">April 18, 2017</a>
							<a href="#" class="blog-heading">YOU JUST CAN’T GET THE STAFF THESE DAYS</a>
						</div>
					</div>
				</li>
			</ul>
			<a href="#" class="blue-btm">view all <span><i class="fas fa-arrow-circle-right"></i></span></a>
		</div>
	</div>
</section>

<section class="faq_wraper faq_wraper-mod">
	<div class="container">
		<h2 class="heading text-center text-white">FREQUENTLY ASKED QUESTIONS</h2>
		<p class="text-center sub-content text-white">Check your energy comparison questions answered</p>
		<div class="faq-place">
			<div class="dropdown">
				<a href="javascript:void(0)" class="dropdown-toggle dropdown-active">
					<span class="caret minus"><img src="{{asset('forntEnd/images/minus.png')}}"></span>
					<span class="caret plus"><img src="{{asset('forntEnd/images/plus.png')}}"></span>	
					Where does it come from? 
				</a>
				<div class="dropdown-inner open">
				    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
				</div>
			</div>

			<div class="dropdown">
				<a href="javascript:void(0)" class="dropdown-toggle">
					<span class="caret minus"><img src="{{asset('forntEnd/images/minus.png')}}"></span>
					<span class="caret plus"><img src="{{asset('forntEnd/images/plus.png')}}"></span>	
					What is Lorem Ipsum?
				</a>
				<div class="dropdown-inner">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
				</div>
			</div>

			<div class="dropdown">
				<a href="javascript:void(0)" class="dropdown-toggle">
					<span class="caret minus"><img src="{{asset('forntEnd/images/minus.png')}}"></span>
					<span class="caret plus"><img src="{{asset('forntEnd/images/plus.png')}}"></span>	
					Time Commitment
				</a>
			  	<div class="dropdown-inner">
			    	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of</p>
			  	</div>
			</div>
		</div>
	</div>
</section>

<section class="energy_savings_plan_wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="box_wraper">
					<div class="row align-items-center">
						<div class="col-12 col-md-8">
							<h3>Compare Energy Plans Here – <span>Free!</span></h3>
							<h4>No obligation to sign up, and it’s 100% free to use!</h4>
						</div>
						<div class="col-12 col-md-4 text-md-left text-center pl-md-5 pl-0">
							<a href="#" class="green-btn">Get Started <span><i class="fas fa-arrow-circle-right"></i></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
    <script type="text/javascript">
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
    </script>
@stop
@endsection