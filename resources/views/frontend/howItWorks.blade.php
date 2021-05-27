@extends('frontend.layouts.master')
@section('title','how it Works')
@section('content')
	
<section class="page_banner">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="heading text-white pb-0 mb-0 text-center" id="howItWorksHeading">How It Works</h1>
			</div>
		</div>
	</div>
</section>

<section class="section_intro_wrap section_intro_wrap-mod">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<div class="intro_content">
					<h2 class="text-center">Switchr makes it easier than ever to <br> compare the energy market</h2>
					<h6 class="semibold green f-20 text-center">Compare Electricity and Gas Plans, Find a Deal, Sign Up On The Spot! Comparing electricity and gas rates on Econnex means you never hit the call wall! Electricity Comparison is easy with Econnex.</h6>
					<p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="feature_wraper">
	@foreach($data->howItWorks as $key => $howWorks)
		<?php $odd = false;if($key % 2 == 0){$odd = true;}?>
		@if($odd)
			<div class="feature_wrap_list">
				<div class="feature_wrap_list_grid_img">
					<img src="{{asset($howWorks->image)}}">
				</div>
				<div class="feature_wrap_list_grid_content_wrap">
					<div class="feature_wrap_list_grid_content">
						<h3>{{$howWorks->title}}</h3>
						<p>{!! $howWorks->description !!}</p>
					</div>
				</div>
			</div>
		@else
		<div class="feature_wrap_list feature_wrap_list-mod">
			<div class="feature_wrap_list_grid_content_wrap">
				<div class="feature_wrap_list_grid_content content_right">
					<h3>{{$howWorks->title}}</h3>
					<p>{!! $howWorks->description !!}</p>
				</div>
			</div>
			<div class="feature_wrap_list_grid_img">
				<img src="{{asset($howWorks->image)}}">
			</div>
		</div>
		@endif
	@endforeach
	<!-- <div class="feature_wrap_list" style="background-color: #f4f4f4;">
		<div class="feature_wrap_list_grid_img">
			<img src="{{asset('forntEnd/images/payment.png')}}">
		</div>
		<div class="feature_wrap_list_grid_content_wrap">
			<div class="feature_wrap_list_grid_content">
				<h3>Provide details and scan your bill</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>
			</div>
		</div>
	</div>
	<div class="feature_wrap_list feature_wrap_list-mod">
		<div class="feature_wrap_list_grid_content_wrap">
			<div class="feature_wrap_list_grid_content content_right">
				<h3>Our algorithms work out the comparisons for you</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>
			</div>
		</div>
		<div class="feature_wrap_list_grid_img">
			<img src="{{asset('forntEnd/images/illustration-weighing-scale.png')}}">
		</div>
	</div>
	<div class="feature_wrap_list" style="background-color: #f4f4f4;">
		<div class="feature_wrap_list_grid_img">
			<img src="{{asset('forntEnd/images/best-price.png')}}">
		</div>
		<div class="feature_wrap_list_grid_content_wrap">
			<div class="feature_wrap_list_grid_content">
				<h3>We present you with your best prices</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>
			</div>
		</div>
	</div>
	<div class="feature_wrap_list">
		<div class="feature_wrap_list_grid_content_wrap">
			<div class="feature_wrap_list_grid_content content_right">
				<h3>You save</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets.</p>
			</div>
		</div>
		<div class="feature_wrap_list_grid_img">
			<img src="{{asset('forntEnd/images/savings.png')}}">
		</div>
	</div> -->
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
    	var howItWorksHeading = 'HOW IT WORKS';
    	@foreach($data->howItWorks as $key => $how)
			howItWorksHeading = '{{$how->heading}}';
    		$('#howItWorksHeading').text(howItWorksHeading);
    		@break
    	@endforeach
    </script>
@stop
@endsection