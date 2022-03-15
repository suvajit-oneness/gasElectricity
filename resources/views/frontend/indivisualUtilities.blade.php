@extends('frontend.layouts.master')
@section('title','Utility')
@section('content')

		<section class="ind_loc_bg ind_utility_bg">
			<div class="container">
				<div class="row">
					<h1 data-aos="fade-down" data-aos-duration="1000">Compare Switch, 
						<small class="position-relative">Save & Postcode<div class="border_text" data-aos="fade-right" data-aos-duration="2800"></div></small>
					</h1>
					<h6 data-aos="fade-down" data-aos-duration="1400">If you’re a savvy bargain hunter like us at Econnex, you’ll love saving on your energy bills. Compare energy plans, sign up, and start saving!</h6>
					<h6 class="m-0 m-auto w-100">Energy type</h6>
					<form action="{{route('rfq.product.listing')}}" method="get" autocomplete="off">
						<div class="d-flex w-lg-25 justify-content-center pt-3">

							<div class="form-check ct_select">
								<input class="form-check-input" type="radio" id="customRadio1" name="eneryType" value="electricity" class="custom-control-input" @if(old('eneryType') == 'electricity'){{('checked')}}@elseif(old('eneryType') == 'gas')@else{{('checked')}}@endif>
								<label class="form-check-label" for="flexRadioDefault1">
									Electricity
								</label>
							</div>
							<div class="form-check ct_select">
								<input class="form-check-input" type="radio"  id="customRadio3" name="eneryType" value="gas" class="custom-control-input" @if(old('eneryType') == 'gas'){{('checked')}}@endif checked>
								<label class="form-check-label" for="flexRadioDefault2">
								Gas
								</label>
							</div>
						</div>
						<div class="input-group mt-0 mb-2" data-aos="fade-up" data-aos-duration="1300">
							<datalist id="suppliersPincode">
								@foreach($data->pincode as $key => $pincde)
									<option value="{{$pincde->autocomplete}}"></option>
								@endforeach
							</datalist>
							@error('eneryType')<span class="text-danger">{{$message}}</span>@enderror
							@error('search')<span class="text-danger">{{$message}}</span>@enderror
							<input type="text" class="form-control postCodeSearch"  name="search" id="postcodesearch" placeholder="Enter your postcode or suburb..." required value="{{old('search')}}"list="suppliersPincode">
							<button class="btn btn-comp" type="submit">Compare</button>
						</div>
					</form>
					<div class="row m-0 mt-2">
						<div class="form-check ct_select sec_two m-auto">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
							<label class="form-check-label" for="flexRadioDefault3">
								Just compare plans which link to a Referral Partner.
							</label>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--end_inner_banner-->

		<section class="py-4 py-lg-5">
			<div class="container">
				<div class="row m-0 justify-content-center text-center">
					<h5><b>We compare all of these energy suppliers</b></h5>
					<ul class="provider">
						<li><img src="{{asset('forntEnd/img/prv_1.png')}}"></li>
						<li><img src="{{asset('forntEnd/img/prv_2.png')}}"></li>
						<li><img src="{{asset('forntEnd/img/prv_3.png')}}"></li>
						<li><img src="{{asset('forntEnd/img/prv_4.png')}}"></li>
						<li><img src="{{asset('forntEnd/img/prv_5.png')}}"></li>
						<li><img src="{{asset('forntEnd/img/prv_6.png')}}"></li>
					</ul>
				</div>
			</div>
		</section>
		<!--end_provider_sec-->
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
										<h2 data-aos="fade-down" data-aos-duration="1000">{!! $whatWeProvide->title !!}<span class="d-lg-block"></span></h2>
										<p data-aos="fade-up" data-aos-duration="1400">{!! $whatWeProvide->description !!}</p>
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
		@if(count($data->howItWorks) > 0)
		<section class="how_it_sec">
			<div class="container-fluid p-0">
				@foreach($data->howItWorks as $howItWorkKey => $howItWork)
					<?php
					if(($howItWorkKey + 1) % 2 == 0 ){
					?>
						<div class="row m-0 how_it_sub align-items-center">
							<div class="col-12 col-lg-6 text-sec">
								<div class="page_title">
									<h1 class="text-start mb-3 mb-lg-4" data-aos="fade-down" data-aos-duration="1000">{!! $howItWork->title !!}<small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
									<p class="py-2" data-aos="fade-up" data-aos-duration="1400">{!! $howItWork->description !!}</p>
									{{-- <p class="py-2" data-aos="fade-up" data-aos-duration="1700">
										SwitchR takes the hassle out of switching your energy plan! In just a few steps, you can discover whether you’re paying more for your gas and electricity than you should be, and quickly switch to a better deal if there’s one available. With access to the best energy plans from all of Australia’s leading energy providers, why not sign up and save money today with SwitchR?!
									</p> --}}
								</div>
							</div>
							<div class="col-12 col-lg-6 img-sec">
								<img src="{{asset($howItWork->image)}}"> 
							</div>
						</div>
					<?php} else{ ?>
					<div class="row m-0 how_it_sub align-items-center">
						<div class="col-12 col-lg-6 img-sec order-lg-1 order-2">
							<img src="{{asset($howItWork->image)}}"> 
						</div>
						<div class="col-12 col-lg-6 text-sec order-lg-2 order-1">
							<div class="page_title">
								<h1 class="text-start mb-3 mb-lg-4" data-aos="fade-down" data-aos-duration="1000">{!! $howItWork->title !!} <br/><small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
								<p class="py-2" data-aos="fade-up" data-aos-duration="1400">{!! $howItWork->description !!}</p>
								<p class="py-2" data-aos="fade-up" data-aos-duration="1800">
									
								</p>
							</div>
						</div>
					</div>
					<?php } ?>
				
					
				@endforeach
			</div>
		</section>
		@endif
		<!--end_howit_sec-->

		<section class="get_start overflow-hidden">
			<div class="container">
				<div class="row m-0">
					<div class="d-flex align-items-center justify-content-between">
						<h1 data-aos="fade-up" data-aos-duration="1000">Compare Energy Plans Here – <span>Free!</span> <small>No obligation to sign up, and it’s 100% free to use!</small></h1>
						<a href="start_form.html" class="btn log_drop" data-aos="fade-left" data-aos-duration="1600">GET STARTED</a>
					</div>
				</div>
			</div>
		</section>
		@if(count($data->individual) > 0)
		<section class="py-4 py-lg-5">
			<div class="container">
				<div class="row m-0">
					<div class="page_title">
						<h1 data-aos="fade-down" data-aos-duration="1000">Here’s everything you <small class="position-relative">need to know<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
					</div>
				</div>
				<div class="row m-0 mt-4 mt-lg-5 align-items-center need_to_text">
					@foreach ($data->individual as $key => $individual)
					<?php if(($key + 1) %2 == 0){?>
						<div class="col-12 col-lg-6">
							<h6>{{$individual->title}}</h6>
							<p>
								{{$individual->description}}
							</p>
						</div>
						<div class="col-12 col-lg-6">
							<img src="{{asset($individual->image)}}" class="w-100">
						</div>
					<?php }else{?>
						<div class="col-12 col-lg-5 text-lg-end">
							<img src="{{asset($individual->image)}}" class="w-75">
						</div>
						<div class="col-12 col-lg-6">
							<h6>{{$individual->title}}</h6>
							<p>
								{{$individual->description}}
							</p>
						</div>	
					<?PHP } ?>
					@endforeach
				</div>
			</div>
		</section>
		@endif

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
							<?php if(($key + 1) %2 == 0){?>
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
							<?php}else{?>
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
							<?php } ?>

							@endforeach
						  </div>
					</div>
				</div>
			</div>
		</section>
		@endif
		<!--end_testimonial-->

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