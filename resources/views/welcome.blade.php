








@extends('frontend.layouts.master')
@section('title','Welcome')
@section('content')

<section class="banner">
	<div class="container">
		<div class="row m-0 justify-content-center">
			<div class="col-12 col-lg-9 text-center overflow-hidden">
				<h1 data-aos="fade-down" data-aos-duration="1000">
					<small class="position-relative">Why pay <div class="border_text" data-aos="fade-right" data-aos-duration="2800"></div></small>more than you should for your 
					<span>Gas & Electricity?</span>
				</h1>
				<h6 data-aos="fade-down" data-aos-duration="1400">If you’re a savvy bargain hunter like us at <b>SwitchR</b>, you’ll love saving on your energy bills. Compare energy plans, <a href="javascript:void(0);">sign up, and start saving!</a></h6>
			</div>
				<form action="{{route('rfq.product.listing')}}" autocomplete="off">
			<div class="bg_l_blue">
						<datalist id="suppliersPincode">
							@foreach($data->pincode as $key => $pincde)
								<option value="{{$pincde->autocomplete}}"></option>
							@endforeach
						</datalist>
			
				@error('search')<span class="text-danger">{{$message}}</span>@enderror
				<h5 data-aos="fade-down" data-aos-duration="1000">Where are you located?</h5>
				<div class="input-group mb-2" data-aos="fade-up" data-aos-duration="1300">
					<input type="text" class="form-control" name="search" id="search" placeholder="Enter your postcode or suburb..."  required="" value="{{old('search')}}">
					<button class="btn btn-comp">Compare</button>
				</div>
				<p><b>Currently available in</b>
				@foreach($data->state as $state) 
					<a href="{{route('rfq.product.listing',['stateId'=>base64_encode($state->id),'stateName'=>$state->name])}}">{{$state->name}}</a> 
				@endforeach
				</p>
			</div>
			</form>
			<ul>
				<li><img src="{{asset('forntEnd/img/b1.png')}}"></li>
				<li><img src="{{asset('forntEnd/img/b2.png')}}"></li>
				<li><img src="{{asset('forntEnd/img/b3.png')}}"></li>
				<li><img src="{{asset('forntEnd/img/b4.png')}}"></li>
				<li><img src="{{asset('forntEnd/img/b5.png')}}"></li>
				<li><img src="{{asset('forntEnd/img/b6.png')}}"></li>
			</ul>
		</div>
	</div>
</section>
<!--end_banner-->

@if(count($data->whatWeProvide) > 0)
<section class="py-4 py-lg-5 wh_provide">
	<div class="container">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">What we <small class="position-relative">provide<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
			</div>
		</div>
		<div class="row m-0 mt-3 mt-lg-5">
			@foreach($data->whatWeProvide as $whatWeProvide)
			<div class="col-12 col-lg-4 why_prosub">
				<div class="card border-0">
					<div class="w_mark">01</div>
					<div class="d-flex">
						<div>
							<img src="{{asset($whatWeProvide->image)}}" height="30px">
						</div>
						<div class="ms-3">
							<h2 data-aos="fade-down" data-aos-duration="1000">{{$whatWeProvide->title}}</span></h2>
							<p data-aos="fade-up" data-aos-duration="1400">{{$whatWeProvide->description}}</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
<!--end_Provide_sec-->
@if(count($data->state) > 0)
<section class="pt-4 pt-lg-5 find_body">
	<div class="container-fluid p-0">
		<div class="row m-0">
			<div class="col-12 col-lg-6 p-0 pt-lg-5">
				<img src="{{asset('forntEnd/img/wire-frame.png')}}">
				
			</div>
			<div class="col-12 col-lg-6 find">
				<div class="page_title p-4 p-lg-5">
					<h3>Find a better gas & electricity plan where <small class="position-relative">you live<div class="border_text" data-aos="fade-right" data-aos-duration="1400"></div></small></h3>
					<p>Select your state to find the cheapest gas and electricity providers where you live.</p>
					<h6>Energy Comparison:</h6>
					<ul class="con_text">
						@foreach($data->state as $state)
							<li><a href="{{route('rfq.product.listing')}}?stateId={{base64_encode($state->id)}}">{{$state->name}}</a></li>
						@endforeach
						<div class="clear-fx"></div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
<!--end_Find a better gas-->
@if(count($data->testimonials) > 0)
<section class="client_says py-4 py-lg-5">
	<div class="container">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">What <small class="position-relative">Client’s Says<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
				<p class="w-50 m-auto text-center mt-3" data-aos="fade-up" data-aos-duration="1400">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
			</div>
		</div>
		<div class="row m-0 mt-3 mt-lg-5">
			<div class="ret_text"><p>4.08</p></div>
			<div class="owl-carousel client_talk owl-theme">
				@foreach($data->testimonials as $testimonial)
					<div class="item">
						<div class="card border-0 p-4">
							<h6>
								{{$testimonial->name}}
								{{-- <span>Transportation Manager</span> --}}
							</h6>
							<p>
								{{$testimonial->quote}}
							</p>
						</div>
					</div>
				@endforeach
				
			</div>
		</div>
	</div>
</section>
@endif

<!--end_client_says-->
@if(count($data->faq) > 0)
<section class="py-4 py-lg-5 testimonial_sec">
	<div class="container-fluid p-0">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">Friquently asked <small class="position-relative">questions<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
				<p class="text-center mt-3" data-aos="fade-up" data-aos-duration="1400">Check your energy comparison questions answered</p>
			</div>
		</div>
		<div class="row m-0 justify-content-center">
			<div class="col-12 col-lg-8 mt-4">
				<div class="accordion" id="accordionExample">
					@foreach ($data->faq as $key => $faq)
					@if(($key + 1) %2 == 0)
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									{{$faq->title}}
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p>{{$faq->description}}</p>
								</div>
							</div>
							</div>
					@else
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									{{$faq->title}}
								</button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p>{{$faq->description}}</p>
								</div>
							</div>
						</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endif
<!--end_testimonial-->
@endsection