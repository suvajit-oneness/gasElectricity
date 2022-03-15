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

<section class="inner_banner_about">
			<div class="container">
				<div class="row m-0">
					<div class="page_title">
						<h1 data-aos="fade-down" data-aos-duration="1000">How It <small class="position-relative">Works<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
					</div>
				</div>
			</div>
		</section>
		<!--end_inner_banner-->

		<section class="how_it_sec">
			<div class="container-fluid">
				@foreach($data->howItWorks as $key => $howWorks)
					<?php if(($key + 1) %2 ==0){?>
						<div class="row m-0 how_it_sub align-items-center">
							<div class="col-12 col-lg-6 text-sec">
								<div class="page_title">
									<h1 class="text-start mb-3 mb-lg-4" data-aos="fade-down" data-aos-duration="1000">{{$howWorks->title}}<small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
									<p class="py-2" data-aos="fade-up" data-aos-duration="1400">{{$howWorks->description}}</p>
								</div>
							</div>
							<div class="col-12 col-lg-6 img-sec">
								<img src="{{asset($howWorks->image)}}"> 
							</div>
						</div>
					<?php }else{?>
						<div class="row m-0 how_it_sub align-items-center">
							<div class="col-12 col-lg-6 img-sec order-lg-1 order-2">
								<img src="{{asset($howWorks->image)}}"> 
							</div>
							<div class="col-12 col-lg-6 text-sec order-lg-2 order-1">
								<div class="page_title">
									<h1 class="text-start mb-3 mb-lg-4" data-aos="fade-down" data-aos-duration="1000">{!!$howWorks->title!!}d <br/><small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
									<p class="py-2" data-aos="fade-up" data-aos-duration="1400">{!!$howWorks->description!!}</p>
									<p class="py-2" data-aos="fade-up" data-aos-duration="1800">
									</p>
								</div>
							</div>
						</div>
					<?php }?>
						
						
				@endforeach
				
			</div>
		</section>

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
    	var howItWorksHeading = 'HOW IT WORKS';
    	@foreach($data->howItWorks as $key => $how)
			howItWorksHeading = '{{$how->heading}}';
    		$('#howItWorksHeading').text(howItWorksHeading);
    		@break
    	@endforeach
    </script>
@stop
@endsection