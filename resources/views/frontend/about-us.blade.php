@extends('frontend.layouts.master')
@section('title','About Us')
@section('content')
	
<section class="page_banner">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading text-white pb-0 mb-0 text-center">{{$data->aboutus->heading}}</h1>
			</div>
		</div>
	</div>
</section>

<section class="section_intro_wrap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-7 col-lg-7">
				<div class="intro_content">
					<h2>{!! $data->aboutus->title !!}</h2>
					<div>{!! $data->aboutus->description !!}</div>
				</div>
			</div>
			<div class="col-12 col-md-5 col-lg-5">
				<div class="intro_img_wrap">
					<img src="{{asset($data->aboutus->image)}}">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="why_choose_wrap">
	<div class="container">
		<h2 class="heading text-center whyChooseUsHeading">Why Choose Us</h2>
		<div class="row">
			<div class="why_choose_content">
				<ul>
					@foreach($data->whychooseus as $key=> $choose)
						<li>
							<div class="why_choose_img_wrap">
								<img src="{{asset($choose->image)}}">
							</div>
							<h5>{!! $choose->title !!}</h5>
							<p>{!! $choose->description !!}</p>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- <section class="consumers_update">
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
</section> -->

<!-- <section class="energy_savings_plan_wrap">
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
</section> -->

@section('script')
    <script type="text/javascript">
    	var whyChooseUsHeading = 'Why Choose Us';
    	@foreach($data->whychooseus as $key => $choose)
        	whyChooseUsHeading = '{{$choose->heading}}';
    		$('.whyChooseUsHeading').text(whyChooseUsHeading);
    		@break
    	@endforeach
    </script>
@stop
@endsection
