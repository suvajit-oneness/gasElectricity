@extends('frontend.layouts.master')
@section('title','Product Details')
@section('content')
	
<section class="state_banner">
	<div class="container">
	</div>
</section>

<section class="feature_list_wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="feature_heading text-center">{{$productData->name}}</h2>
				<h4 class="feature_subheading text-center">Features</h4>
				<ul class="feature_list">
					@foreach($productData->feature as $feature)
						<li>
							<h6>{{$feature->title}}</h6>
							<p>{{$feature->description}}</p>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="momentum_wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 class="momentum_title">Why Momentum?</h4>
				<ul class="momentum_list">
					<li>
						<img src="{{asset('forntEnd/images/gear.png')}}">
						No confusing discounts. Just great rates. 
					</li>
					<li>
						<img src="{{asset('forntEnd/images/gear.png')}}">
						100% Australian owned 
					</li>
					<li>
						<img src="{{asset('forntEnd/images/gear.png')}}">
						Award Winning Customer Service 
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="elctricity_bill_wrap">
	<div class="container">
		<div class="row">
		<div class="col-12">
			<ul class="plan_details_wrap">
				<li class="electricity_plan_info_wrap">
					<h4>Electricity details</h4>
					<a href="#">Plan details</a>
					<h3>Discounts and fees</h3>
				</li>
				<li class="plan_price_info">
					<ul>
						@foreach($productData->product_discount as $discount)
							<li><p>{{$discount->title}}</p></li>
							<li><p>{{$discount->description}}</p></li>
						@endforeach
					</ul>
				</li>
			</ul>
			<div class="amount_details_wrap">
				<h3 class="rate_title semibold">Rates details</h3>
				<p class="rate_sub_content">The price you pay for energy services includes tariff and other feeds and charges. The rates applicable to your address is dependent on your distribution area and meter type, which you should be able to find on your energy bills. The meter number (10 to 11 digits  usually found on back of the bill) is  used to identify the type of meter.</p>

				<div class="load_consumption">
					<nav>
					  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
					    	<a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-single-rate" role="tab" aria-controls="nav-single-rate" aria-selected="true">Single rate</a>
					    	<a class="nav-link" id="nav-controlled-load" data-toggle="tab" href="#nav-controlled-load" role="tab" aria-controls="nav-controlled-load" aria-selected="false">Controlled Load</a>
					  	</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
					  	<div class="tab-pane fade show active" id="nav-single-rate" role="tabpanel" aria-labelledby="nav-single-rate">
					  		<div class="load_details">
					  			<p><span>Network area <span>:</span></span>Energex</p>
					  			<p><span>Effective from <span>:</span></span>28/01/2021</p>
					  			<p><span>Connection Fee <span>:</span></span>$54.00 - Inclusive of GST (Distributor PassThrough Charge)</p>
					  			<p><span>Tariff Description <span>:</span></span>Electricity charges - 8400/Peak Anytime/RESI</p>
					  		</div>
					  		<div class="usage_wrap">
								<ul class="usage_price_info">
									<li></li>
									<li>Price (Excl GST)</li>
									<li>Price (Incl GST)</li>
								</ul>
								<ul class="usage_price_info_content">
									<li>Daily supply charge</li>
									<li>85.43 cents per day</li>
									<li>93.973 cents per day</li>
								</ul>
								<ul class="usage_price_info_content">
									<li>Usage</li>
									<li>17.62 cents per kWh</li>
									<li>19.382 cents per kWh</li>
								</ul>
							</div>
					  	</div>
					  <div class="tab-pane fade" id="nav-controlled-load" role="tabpanel" aria-labelledby="nav-controlled-load">...</div>
					</div>
				</div>
				<div class="rate_details_wrap">
					<h4>Rates details</h4>
					<ul class="rate_details_content">
						<li>Feed in tariff type	</li>
						<li>Applicable Feed-In Tariff</li>
					</ul>
					<ul class="rate_details_content">
						<li>Feed in tariff</li>
						<li>7.0c</li>
					</ul>
					<ul class="rate_details_content">
						<li>Tariff Description</li>
						<li>Available to Queensland residents and small to medium businesses depending on generating capacity. Terms and conditions apply.</li>
					</ul>
				</div>
				<p class="state_content">Please be advised that by signing up to this product, your Feed-in Tariff may be different from what you are currently receiving. If you are eligible for a different feed in tariff type or are uncertain of your feed in tariff please contact out energy consultants on 13 19 20.Any pricing we display is indicative based on the rates our providers have given us and information provided by you. Any energy plan and network presented will be based on the postcode you have provided and you will be advised by the retailer if your rates subsequently differ due to a different meter type or network.</p>
			</div>
		</div>
	</div>
	</div>
</section>

<section class="apply_wrap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 d-flex flex-column flex-md-row align-items-center justify-content-around">
				<a href="#" class="green-btn">apply now <span><i class="fas fa-arrow-circle-right"></i></span></a>
				<a href="tel:800-600-700" class="call_btn"><span><i class="fas fa-phone-alt"></i></span> 800-600-700</a>
			</div>
		</div>
	</div>
</section>

@if($productData->terms_condition != '')
	<section class="terms_condition_wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="terms_title">Terms and conditions - <a href="{{$productData->terms_condition}}" target="_blank">click here</a></p>
					<p>When moving home your new provider will organise your initial meter read, this may incur a connection fee which will be appear on your first energy bill. You may also be charged a disconnection fee from your current provider if you are moving out.</p>
				</div>
			</div>
		</div>
	</section>
@endif

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection