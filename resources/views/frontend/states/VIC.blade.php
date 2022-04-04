@extends('frontend.layouts.master')
@section('title','Plan Listing')
@section('content')

<section class="ind_loc_bg">
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

					<input type="hidden" name="stateId" value="10">
					<input type="hidden" name="stateName" value="Victoria">
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

<section class="py-4 py-lg-5 about_body">
	<div class="container overflow-hidden">
		<div class="row m-0 align-items-center justify-content-between">
			<div class="col-12 col-lg-5 p-0 pt-lg-5 p-0" data-aos="fade-right" data-aos-duration="1900">
				<img src="{{asset('forntEnd/img/VIC.png')}}" class="w-100">
			</div>
			<div class="col-12 col-lg-6 p-lg-4">
				<div class="page_title">
					<h3 data-aos="fade-down" data-aos-duration="1000"> 
							<small class="position-relative">Victoria <div class="border_text" data-aos="fade-left" data-aos-duration="1400"></div></small>Energy Comparison</h3>
					<p data-aos="fade-up" data-aos-duration="1300">
						<b class="d-block mb-2">Victoria energy usage is on the rise due to growing Gas and 
							Electricity industry.
						</b> 
					</p>
					<p data-aos="fade-up" data-aos-duration="1700">
						Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. 
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

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

<section class="get_start overflow-hidden">
	<div class="container">
		<div class="row m-0">
			<div class="d-lg-flex d-block align-items-center justify-content-between">
				<h1 data-aos="fade-up" data-aos-duration="1000">Compare Energy Plans Here – <span>Free!</span> <small>No obligation to sign up, and it’s 100% free to use!</small></h1>
				<a href="{{route('rfq.product.listing')}}" class="btn log_drop mt-3 mt-lg-0" data-aos="fade-left" data-aos-duration="1600">GET STARTED</a>
			</div>
		</div>
	</div>
</section>

<section class="py-4 py-lg-5 why_choose">
	<div class="container">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">Why  <small class="position-relative">Choose Us<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
				<p class="w-50 m-auto text-center mt-3" data-aos="fade-up" data-aos-duration="1400">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
			</div>
		</div>
		<div class="row m-0 mt-4 mt-lg-5 why_card">
			@foreach($data->whychooseus as $key=>$choose)
			<div class="col-12 col-lg-3 mb-3 mb-lg-0 plr-3">
				<div class="card border-0">
					<img src="{{asset($choose->image)}}">
					<h6>{!! $choose->title !!}</h6>
					<p>
						{!! $choose->description !!}
					</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

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