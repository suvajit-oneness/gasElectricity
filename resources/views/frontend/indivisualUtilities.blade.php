@extends('frontend.layouts.master')
@section('title','Utility')
@section('content')

<section class="energy-comp">
	<div class="container">
		<div class="electric-head text-center">
			<h2 class="heading text-center">Compare by ENERGY </h2>
			<p>Easily compare, select and save on your energy plans</p>
		</div>
		<div class="energy_select_box block-display">
			<form action="{{route('product.listing')}}" method="get" autocomplete="off">
				<div class="row">
					<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					<p>Energy type</p>
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="custom-control custom-radio autowidth">
								  	<input type="radio" id="customRadio1" name="eneryType" value="electricity" class="custom-control-input" @if(old('eneryType') == 'electricity'){{('checked')}}@elseif(old('eneryType') == 'gas')@else{{('checked')}}@endif>
								  	<label class="custom-control-label" for="customRadio1">Electricity</label>
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
				</div>
				<div class="search-form">
					<datalist id="suppliersPincode">
						@foreach($data->pincode as $key => $pincde)
							<option value="{{$pincde->autocomplete}}">
						@endforeach
					</datalist>
					@error('eneryType')<span class="text-danger">{{$message}}</span>@enderror
					@error('search')<span class="text-danger">{{$message}}</span>@enderror
					<label>Enter your suburb or postcode</label>
					<input type="text" name="search" class="postCodeSearch" id="postcodesearch" placeholder="Enter your postcode or suburb..." required value="{{old('search')}}" list="suppliersPincode">
				</div>
				<div class="ccheckandbtn">
					<!-- <div class="custom-control custom-checkbox custom-control-mod">
					    <input type="checkbox" name="referral_partner" value="true" class="custom-control-input" id="customControl2" @if(old('referral_partner')){{('checked')}}@endif>
					    <label class="custom-control-label" for="customControl2">Just compare plans which link to a Referral Partner.</label>
					</div> -->
					<button type="submit" class="blue-btm">COMPARE <span><i class="fas fa-arrow-circle-right"></i></span></button>
				</div>
			</form>
		</div>
		<!-- <div class="important_note_wrap margin-top0">
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
		</div> -->
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
								<img src="{{$choose->image}}">
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