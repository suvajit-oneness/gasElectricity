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
				<datalist id="suppliersPincode">
					@foreach($data->pincode as $key => $pincde)
						<option value="{{$pincde->autocomplete}}"></option>
					@endforeach
				</datalist>
				<form action="{{route('rfq.product.listing')}}" method="post" autocomplete="off" enctype="multipart/form-data">
					@csrf
					<div class="search-form">
						@error('search')<span class="text-danger">{{$message}}</span>@enderror
						<label>Where are you located?</label>
						<input type="text" class="postCodeSearch" name="search" id="search" placeholder="Enter your postcode or suburb..." required="" value="{{old('search')}}" list="suppliersPincode">
						<input type="file" name="file" class="form-control">
						@error('file')<span class="text-danger">{{$message}}</span>@enderror
						<div class="button">
							<button type="submit">compare now</button>
							<i class="fas fa-arrow-circle-right"></i>
						</div>
					</div>
				</form>
				<p>Currently available in 
					@foreach($data->state as $state)
						<a href="{{route('rfq.product.listing')}}?stateId={{base64_encode($state->id)}}" style="color:ffffff">{{$state->name}}</a> ,
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

<section class="energy-comp">
	<div class="container">
		<div class="electric-head text-center">
			<h2 class="heading text-center">Compare by ENERGY </h2>
			<p>Easily compare, select and save on your energy plans</p>
		</div>
		<div class="energy_select_box block-display">
			<form action="{{route('rfq.product.listing')}}" method="get" autocomplete="off">
				<div class="row">
					<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					<p>Energy type</p>
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="custom-control custom-radio autowidth">
								  	<input type="radio" id="customRadio1" name="eneryType" value="gas_electricity" class="custom-control-input" @if(old('eneryType') == 'gas_electricity'){{('checked')}}@elseif(old('eneryType') == 'gas')@else{{('checked')}}@endif>
								  	<label class="custom-control-label" for="customRadio1">Gas &amp; Electricity</label>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="custom-control custom-radio autowidth gas-icon white-bg">
								  	<input type="radio" id="customRadio3" name="eneryType" value="gas" class="custom-control-input" @if(old('eneryType') == 'gas'){{('checked')}}@endif>
								  	<label class="custom-control-label" for="customRadio3">Gas </label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
						<div class="text-center">
							<p>Do you have a recent bill?</p>
							<div class="yes-no-btn">
								<input type="radio" name="recentbill" value="yes" @if(old('recentbill') == 'yes'){{('checked')}}@endif>Yes
								<input type="radio" name="recentbill" value="no" @if(old('recentbill') == 'no'){{('checked')}}@elseif(old('recentbill') == 'yes')@else{{('checked')}}@endif>No
							</div>
						</div>
					</div>
				</div>
				<div class="search-form">
					@error('eneryType')<span class="text-danger">{{$message}}</span>@enderror
					@error('search')<span class="text-danger">{{$message}}</span>@enderror
					<label>Enter your suburb or postcode</label>
					<input type="text" class="postCodeSearch" name="search" id="postcodesearch" placeholder="Enter your postcode or suburb..." required value="{{old('search')}}" list="suppliersPincode">
				</div>
				<div class="ccheckandbtn">
					<div class="custom-control custom-checkbox custom-control-mod">
					    <input type="checkbox" name="referral_partner" value="true" class="custom-control-input" id="customControl2" @if(old('referral_partner')){{('checked')}}@endif>
					    <label class="custom-control-label" for="customControl2">Just compare plans which link to a Referral Partner.</label>
					</div>
					<button type="submit" class="blue-btm">COMPARE <span><i class="fas fa-arrow-circle-right"></i></span></button>
				</div>
			</form>
		</div>
	</div>
</section>

<section class="why_choose_wrap">
	<div class="container">
		<h2 class="heading text-center whyChooseUsHeading">Why Choose Us</h2>
		<div class="row">
			<div class="why_choose_content">
				<ul>
					@foreach($data->whychooseus as $key=>$choose)
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