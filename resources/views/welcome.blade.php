@extends('frontend.layouts.master')
@section('title','Welcome')
@section('content')
<div class="sticky_social_icon">
	<ul>
		<li>
			<a href="javascript:void(0)"><img src="{{asset('forntEnd/images/twitter.png')}}"></a>
		</li>
		<li>
			<a href="javascript:void(0)"><img src="{{asset('forntEnd/images/linkedin.png')}}"></a>
		</li>
		<li>
			<a href="javascript:void(0)"><img src="{{asset('forntEnd/images/youtube.png')}}"></a>
		</li>
	</ul>
</div>

<section class="banner">
	<div class="container">
		<div class="banner-caption">
			<h1 class="banner-heading">LOREM IPSUM <span>DOLOR SIT AMET</span> <br> <span> IS A DUMMY TEXT</span></h1>
			<ul class="button-list">
				<li>
					<a href="javascript:void(0)" class="blue-btm">Explore now 
						<span><i class="fas fa-arrow-circle-right"></i></span>
					</a>
				</li>
				@guest
					<li>
						<a href="{{url('login')}}" class="login-btm">Login 
							<span><i class="fas fa-user-circle"></i></span>
						</a>
					</li>
				@endguest
			</ul>
			<div class="location-search-section">
				<h3>Compare, Switch, Save & postcode </h3>
				<div class="search-form">
					<label>Where are you located?</label>
					<input type="text" id="searchCompareNow" name="search" placeholder="Enter your postcode or suburb...">
					<div class="button">
						<input type="submit" id="searchBtnCompareNow" value="compare now">
						<i class="fas fa-arrow-circle-right"></i>
					</div>
				</div>
				<p>Currently available in NSW, ACT, SA, VIC, parts of QLD, TAS & WA (only Gas). Not available in Ergon Area (QLD), NT and embedded networks or non-quotable meters.</p>
			</div>
		</div>
	</div>
	<div class="machine-image">
		<img src="{{asset('forntEnd/images/machine.png')}}">
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

<section class="what-provide">
	<div class="provide-image">
		<img src="{{asset('forntEnd/images/bulb.png')}}" class="img-fluid" alt=""/>
	</div>
	<div class="provide-content">
		<h2 class="heading heading-left-border">What we provide</h2>
		<p>It’s never been simpler to switch energy providers and save. It takes 5 mins to compare your electricity and gas rates with Econnex</p>

		<ul class="provide-list">
			<li>
				<div class="provide-icon">
					<img src="{{asset('forntEnd/images/pro-icon-1.png')}}" alt=""/>
				</div>
				<div class="provide-text">
					<h4>Panel of Providers</h4>
					<p>Compare Energy Prices, Rates & Tariffs across our panel of TOP retailers – EnergyAustralia, AGL, Origin Energy, Alinta Energy, Powershop and much more.</p>
				</div>
			</li>

			<li>
				<div class="provide-icon">
					<img src="{{asset('forntEnd/images/pro-icon-2.png')}}" alt=""/>
				</div>
				<div class="provide-text">
					<h4>FREE Energy Comparison</h4>
					<p>There is no obligation to sign up, our electricity and gas comparison service is 100% free to use!</p>
				</div>
			</li>

			<li>
				<div class="provide-icon">
					<img src="{{asset('forntEnd/images/pro-icon-3.png')}}" alt=""/>
				</div>
				<div class="provide-text">
					<h4>Find the Right One</h4>
					<p>Choose competitive Energy Rates and Plans to make an informed choice. Take advantage of a better energy plan.</p>
				</div>
			</li>

		</ul>
	</div>
</section>

<section class="gray-section section-border">
	<div class="container">
		<h2 class="heading text-center heading-center-border">What we provide</h2>
		<p class="text-center sub-content">It’s never been simpler to switch energy providers and save.</p>

		<ul class="step-list">
			<li>
				<div class="box">
					<span class="count">01</span>
					<h3>Share few details</h3>
					<p>Share few details like your postcode, type of energy plan, typical usage rates and if you have solar power.</p>
					<a href="javascript:void(0)" class="arrow-btm"><i class="fas fa-arrow-right"></i></a>
				</div>
			</li>
			<li>
				<div class="box">
					<span class="count">02</span>
					<h3>Compare Rates & Tariffs</h3>
					<p>Shop around for the right plan using our constantly updated database of all the competitive energy plans and rates.</p>
					<a href="javascript:void(0)" class="arrow-btm"><i class="fas fa-arrow-right"></i></a>
				</div>
			</li>
			<li>
				<div class="box">
					<span class="count">03</span>
					<h3>Pick Your Energy Plan</h3>
					<p>Like what you see? Pick your cheaper plan and we do the rest. No calls, no fuss, no worries, just a better deal on your electricity and gas bill!</p>
					<a href="javascript:void(0)" class="arrow-btm"><i class="fas fa-arrow-right"></i></a>
				</div>
			</li>
		</ul>
	</div>
</section>
<!-- Testimonial Section -->
@if(count($data->testimonials) > 0)
<section class="testimonial-section">
	<div class="container">
		<h2 class="heading text-center">TESTIMONIALS</h2>
		<div class="testi-alider">
			@foreach($data->testimonials as $testimonial)
				<div class="testi-rotator">
					<figure>
						<img src="{{asset('forntEnd/images/mentor2.jpg')}}">
					</figure>
					<h4>{{$testimonial->name}}</h4>
					<p>{{$testimonial->quote}}.</p>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endif

<section class="compare-section">
	<h2 class="heading text-center">Compare by State </h2>
	<p class="text-center sub-content">Easily compare, select and save on your energy plans</p>

	<div class="map-section">
		<div class="left-map">
			<img src="{{asset('forntEnd/images/map.png')}}">
		</div>
		<div class="map-content">
			<div class="map-content-wrap">
				<ul>
					<li>
						<a href="{{route('electricityform')}}">Energy Comparison – NSW</a>
					</li>
					<li>
						<a href="{{route('electricityform')}}">Energy Comparison SA</a>
					</li>
					<li>
						<a href="{{route('electricityform')}}">Energy Comparison VIC</a>
					</li>
					<li>
						<a href="{{route('electricityform')}}">Energy Comparison ACT</a>
					</li>
					<li>
						<a href="{{route('electricityform')}}">Energy Comparison QLD</a>
					</li>
					<li>
						<a href="{{route('electricityform')}}">Comparison Solar Providers</a>
					</li>
					<li>
						<a href="{{route('electricityform')}}">Comparison Feed in Tariffs</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- Blogs -->
@if(count($data->blogs) > 0)
<section class="blog_wraper">
	<div class="container">
		<h2 class="heading text-center">latest blog</h2>
		<div class="blog_container text-center">
			<ul class="blog-list">
				@foreach($data->blogs as $index => $blog)
				<li>
					<div class="inner-box" style="background:url({{$blog->image}}) no-repeat center center; background-size: cover;">
						<div class="grid-content">
							<a href="javascript:void(0)" class="date">{{date('M, d Y',strtotime($blog->created_at))}}</a>
							<a href="javascript:void(0)" class="blog-heading">{{$blog->title}}</a>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
			<a href="{{route('blogs')}}" class="blue-btm">view all <span><i class="fas fa-arrow-circle-right"></i></span></a>
		</div>
	</div>
</section>
@endif

@if(count($data->faq) > 0)
<section class="faq_wraper">
	<div class="container">
		<h2 class="heading text-center">FREQUENTLY ASKED QUESTIONS</h2>
		<p class="text-center sub-content">Check your energy comparison questions answered</p>
		<div class="faq-place">
			@foreach($data->faq as $key => $faq)
				<div class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle @if($key == 0){{('dropdown-active')}}@endif">
						<span class="caret minus"><img src="{{asset('forntEnd/images/minus.png')}}"></span>
						<span class="caret plus"><img src="{{asset('forntEnd/images/plus.png')}}"></span>	
						Where does it come from? 
					</a>
					<div class="dropdown-inner @if($key == 0){{('open')}}@endif">
					    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endif

@section('script')
    <script type="text/javascript">
    	$(document).on('click','#searchBtnCompareNow',function(){
    		var URL = "{{route('plan.listing')}}",keyword = $('#searchCompareNow').val();
    		var redirectURL = URL+'?search='+keyword;
    		window.location.href = redirectURL;
    	});
    </script>
@stop
@endsection

