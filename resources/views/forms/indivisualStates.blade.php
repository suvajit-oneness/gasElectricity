@extends('frontend.layouts.master')
@section('title','Plan Listing')
@section('content')

<section class="banner gas-electricity-banner">
	<div class="container">
		<div class="banner-caption">
			<h1 class="banner-heading"> <span> Compare, Switch, Save & </span> <br> POSTCODE </h1>
				<div class="text-center white-para">
				 <p>If you’re a savvy bargain hunter like us at Econnex, you’ll love saving on your energy bills. Compare energy plans, sign up, and start saving!</p>
				</div>
			<div class="location-search-section">
				 
				<div class="search-form">
					<label>Where are you located?</label>
					<input type="text" id="search" placeholder="Enter your postcode or suburb...">
					<div class="button">
						<input type="submit" id="" value="compare now">
						<i class="fas fa-arrow-circle-right"></i>
					</div>
				</div>
				<p>Currently available in NSW, ACT, SA, VIC, parts of QLD, TAS & WA (only Gas). Not available in Ergon Area (QLD), NT and embedded networks or non-quotable meters.</p>
			</div>
		</div>
	</div> 
</section>

<section class="what-provide ">
	<div class="provide-image bg-elect">
		<img src="{{asset('forntEnd/images/elect-map.png')}}" class="img-fluid" alt=""/>
	</div>
	<div class="provide-content">
		<h2 class="heading heading-left-border">lorem ipsum</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text  ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

		<a href="#" class="blue-btm">Apply Now <span><i class="fas fa-arrow-circle-right"></i></span></a>
		 
	</div>
</section>

<section class="logo-slider">
	<div class="heading-place">
		<strong>We compare all of these energy suppliers</strong>
	</div>
	<div class="logo-scroll">
		<div class="slide-logo">
			<div class="logo-area"><img src="{{asset('forntEnd/images/tango.png')}}" alt=""/></div>
			<div class="logo-area"><img src="{{asset('forntEnd/images/dodo.png')}}" alt=""/></div>
			<div class="logo-area"><img src="{{asset('forntEnd/images/simplyenergy.png')}}" alt=""/></div>
			<div class="logo-area"><img src="{{asset('forntEnd/images/sumo.png')}}" alt=""/></div>
			<div class="logo-area"><img src="{{asset('forntEnd/images/sumo.png')}}" alt=""/></div>
			<div class="logo-area"><img src="{{asset('forntEnd/images/sumo.png')}}" alt=""/></div>
		</div>
	</div>
</section>

<section class="energy-comp">
	<div class="container">

		<div class="electric-head text-center">
			<h2 class="heading text-center">Compare by ENERGY </h2>
			<p>Easily compare, select and save on your energy plans</p>
		</div>

		<div class="energy_select_box block-display">
			<div class="row">
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<p>Energy type</p>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth">
							  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
							  <label class="custom-control-label" for="customRadio1">Gas &amp; Electricity</label>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
						 
							<div class="custom-control custom-radio autowidth gas-icon white-bg">
							  <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
							  <label class="custom-control-label" for="customRadio3">Gas </label>
							</div>
						</div>
					</div> 
				</div>
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					<div class="text-center">
						<p>Do you have a recent bill?</p>
						<div class="yes-no-btn">
							<a href="#">Yes</a>
							<a class="active" href="#">No</a>
						</div>
					</div>
				</div>
			</div>

			<div class="search-form">
				<label>Enter your suburb or postcode</label>
				<input type="text" id="search" placeholder="Enter your postcode or suburb..."> 
			</div>
			<div class="ccheckandbtn">
				<div class="custom-control custom-checkbox custom-control-mod">
				    <input type="checkbox" class="custom-control-input" id="customControl2">
				    <label class="custom-control-label" for="customControl2">Just compare plans which link to a Referral Partner.</label>
				</div>
				<a href="#" class="blue-btm"> COMPARE <span><i class="fas fa-arrow-circle-right"></i></span></a>
			</div>

		</div>

		<div class="important_note_wrap margin-top0">
			<div class="note_title">
				<div class="trigger">+</div>
				<div class="note_title_head">
					<p>IMPORTANT NOTES</p>
				</div>
			</div>
			<div class="note_content">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>

	</div>
</section>
 
<section class="banner gas-electricity-banner">
	<div class="container">
		<div class="banner-caption">
			<h1 class="banner-heading capitalize-text"> <span> Compare VIC Electricity & Gas Rates</span> </h1>
				 
			<div class="location-search-section">
				 
				<div class="search-form">
					<label>Enter your post code</label>
					<input type="text" id="search" placeholder="Enter here...">
					<div class="button">
						<input type="submit" id="" value="START NOW">
						<i class="fas fa-arrow-circle-right"></i>
					</div>
				</div>
				<p>Currently available in NSW, ACT, SA, VIC, parts of QLD, TAS & WA (only Gas). Not available in Ergon Area (QLD), NT and embedded networks or non-quotable meters.</p>
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

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection