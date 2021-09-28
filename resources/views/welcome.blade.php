@extends('frontend.layouts.master')
@section('title','Welcome')
@section('content')
<div class="sticky_social_icon">
	<ul>
		@if($contact->facebook != '')
			<li>
				<a href="{{$contact->facebook}}" target="_blank"><img src="{{asset('forntEnd/images/facebook.png')}}"></a>
			</li>
		@endif
		@if($contact->linkedin != '')
			<li>
				<a href="{{$contact->linkedin}}" target="_blank"><img src="{{asset('forntEnd/images/linkedin.png')}}"></a>
			</li>
		@endif
		@if($contact->youtube != '')
			<li>
				<a href="{{$contact->youtube}}" target="_blank"><img src="{{asset('forntEnd/images/youtube.png')}}"></a>
			</li>
		@endif
	</ul>
</div>

<section class="banner gas-electricity-banner">
	<div class="container">
		<div class="banner-caption">
			<h1 class="banner-heading"> <span> Why pay more than you should  </span> <br> for your gas and electricity? </h1>
				<div class="text-center white-para">
				 <p>If you’re a savvy bargain hunter like us at SwitchR, you’ll love saving on your energy bills. Compare energy plans, sign up, and start saving!</p>
				</div>
			<div class="location-search-section">
				<form action="{{route('rfq.product.listing')}}" autocomplete="off">
					<div class="search-form">
						<datalist id="suppliersPincode">
							@foreach($data->pincode as $key => $pincde)
								<option value="{{$pincde->autocomplete}}"></option>
							@endforeach
						</datalist>
						<!-- @error('eneryType')<span class="text-danger">{{$message}}</span>@enderror -->
						@error('search')<span class="text-danger">{{$message}}</span>@enderror
						<label>Where are you located?</label>
						<!-- <input type="hidden" name="eneryType" value="gas_electricity"> -->
						<input type="text" class="postCodeSearch" name="search" id="search" placeholder="Enter your postcode or suburb..." required="" value="{{old('search')}}" list="suppliersPincode">
						<div class="button">
							<button type="submit">compare now</button>
							<i class="fas fa-arrow-circle-right"></i>
						</div>
					</div>
				</form>
				<p>Currently available in 
					@foreach($data->state as $state)
						<a href="{{route('rfq.product.listing',['stateId'=>base64_encode($state->id),'stateName'=>$state->name])}}" style="color:ffffff">{{$state->name}}</a> ,
					@endforeach
				</p>
			</div>
		</div>
	</div> 
</section>

@if(count($data->compareallSupplier) > 0)
<section class="logo-slider">
	<div class="heading-place">
		<strong>We compare all of these energy suppliers</strong>
	</div>
	<div class="logo-scroll">
		<div class="slide-logo">
			@foreach($data->compareallSupplier as $compareallSupplier)
				<div class="logo-area"><img src="{{asset($compareallSupplier->image)}}"/></div>
			@endforeach
		</div>
	</div>
</section>
@endif

@if(count($data->whatWeProvide) > 0)
<section class="what-provide">
	<div class="provide-image">
		<img src="{{asset('forntEnd/images/bulb.png')}}" class="img-fluid">
	</div>
	<div class="provide-content">
		<h2 class="heading heading-left-border">What we provide</h2>
		<!--<p>It’s never been simpler to switch energy providers and save. It takes 5 mins to compare your electricity and gas rates with SwitchR</p>-->

		<ul class="provide-list">
			@foreach($data->whatWeProvide as $whatWeProvide)
				<li>
					<div class="provide-icon">
						<img src="{{asset($whatWeProvide->image)}}">
					</div>
					<div class="provide-text">
						<h4>{{$whatWeProvide->title}}</h4>
						<p>{{$whatWeProvide->description}}</p>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</section>
@endif

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

<section>
    <div class="container">
        <div class="row m-0 mb-2 pt-4">
            <div class="col-12 p-0 text-center ">
                <h2 class="heading text-center pb-0 mb-0">Switching is easy with SwitchR!</h2>
			    <p class="sub-content text-center">In just a few minutes, you can be on the path to saving money!</p>
            </div>
        </div>
        <div class="row m-0 mb-4 mb-md-5 justify-content-center align-items-center">
            <div class="col-12 col-md-4">
                <div class="card border-0 p-3 just_few">
                    <div class="num_text"><h1>1</h1></div>
                    <h4>Tell us where you live</h4>
                    <p>Enter your postcode or suburb so we know which energy providers serve your location.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 p-3 just_few">
                    <div class="num_text"><h1>2</h1></div>
                    <h4>Upload your energy bill</h4>
                    <p>Get the best deals quicker by uploading your energy bill to our portal!</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 p-3 just_few">
                    <div class="num_text"><h1>3</h1></div>
                    <h4>Find a better deal and switch</h4>
                    <p>Once you’ve found a better deal, create a SwitchR account to view details of your new plan and switch!</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if(count($data->state) > 0)
<section class="compare-section pt-0">
	<div class="map-section mt-0 border-top-0">
		<div class="left-map">
			<img src="{{asset('forntEnd/images/map.png')}}">
		</div>
		<div class="map-content">
			<div class="map-content-wrap">
			    <h2 class="heading heading-left-border">Find a better gas and electricity plan where you live</h2>
			    <p class="sub-content mb-4">Select your state to find the cheapest gas and electricity providers where you live.</p>
				<ul>
					@foreach($data->state as $state)
						<li>
							<a href="{{route('rfq.product.listing')}}?stateId={{base64_encode($state->id)}}" style="color:ffffff">Energy Comparison – {{$state->name}}</a> ,
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endif
<!-- Blogs -->
<?php $totalBlogs = $data->blogs; ?>
@if(count($totalBlogs) > 0)
<section class="blog_wraper">
	<div class="container">
		<h2 class="heading text-center">latest blog</h2>
		<div class="blog_container text-center">
			<ul class="blog-list">
				@foreach($totalBlogs as $index => $blog)
    				@php $className = 'blog_design_one';
        				switch(count($totalBlogs)){
            				case 1: $className = 'blog_design_one';break;
            				case 2: $className = 'blog_design_two';break;
            				case 3: $className = 'blog_design_three';break;
            				case 4: $className = 'blog_design_four';break;
            			}
    				 @endphp
    				<li class="{{$className}}">
						<div class="inner-box" style="background:url({{asset($blog->image)}}) no-repeat center center; background-size: cover;">
							<div class="grid-content">
								<a href="{{route('blog.detail',$blog->id)}}" class="date">{{date('M, d Y',strtotime($blog->created_at))}}</a>
								<a href="{{route('blog.detail',$blog->id)}}" class="blog-heading">{{$blog->title}}</a>
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
						{{$faq->title}} 
					</a>
					<div class="dropdown-inner @if($key == 0){{('open')}}@endif">
					    <p>{{$faq->description}}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endif

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection