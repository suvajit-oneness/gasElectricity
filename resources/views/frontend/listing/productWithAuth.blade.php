@extends('frontend.layouts.master')
@section('title','Plan Listing')
@section('css')
<style>
	.page-item.active .page-link {
	    z-index: 3;
	    color: #fff;
	    background-color: #279679;
	    border-color: #007bff;
	    width: 47px;
	    height: 47px;
	    display: inline-flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 18px;
	    font-weight: 600;
	    border: 1px solid #279679;
	    border-radius: 3px;
	}
	.page-item:first-child .page-link {
		z-index: 3;
	    color: #000;
	    background-color: white;
	    border-color: #007bff;
	    width: 47px;
	    height: 47px;
	    display: inline-flex;
	    align-items: center;
	    justify-content: center;
	    font-size: 18px;
	    font-weight: 600;
	    border: 1px solid #c7c7c7;
	    border-radius: 3px;
	}
	.pagination {
		justify-content: flex-end;
	}
</style>
@endsection
@section('content')

<section class="plan_listing_wraper d-none">
	<!-- <div class="blurcontent"><div class="toasterClass"></div></div> -->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<center><h4 class="listing_wrap_title">Compare “{{getEnergyType($rfq->energy_type)}}” Plans <br><span>Total : “{{$productData->count}}” data found</span> {{($state) ? 'In "'.$state->name.'"' : ''}}</h4></center>
				<div class="your-search">
					<div class="search-panel">
						<!-- ${{number_format(($rfq->kwh_rate) / ($rfq->kwh_usage),1)}} / unit -->
						<p>The below offers are based on a your consumption <span> {{$rfq->kwh_usage}} units </span> at the price <span> $ {{number_format($rfq->kwh_rate,2)}}</span> for <span>{{$rfq->serviceChargedPeriod}} days</span> on a single rate tariff in the <span> SWITCHR </span> network. The lowest annual price is displayed for each offer. Your bill will differ, based on your actual usage.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="plan_listing_items">
					<div class="plan_title_wrap">
						<h5>Plan <span>and highlights</span></h5>
						<h5>Price/{{$rfq->serviceChargedPeriod}} day <span>(estimated^)</span></h5>
					</div>
					<div class="plan_tab">
						<h5>Sponsored</h5>
						<a href="javascript:void(0)" class="close-panel">CLOSE</a>
					</div>
					<div class="plan_wraper">
						@php
							$url='?';
							if(!empty($request) && !empty($request['rfqId'])){
								$url .= 'rfqId='.$request['rfqId'].'&';
							}
							if(!empty($request) && !empty($request['eneryType'])){
								$url .= 'eneryType='.$request['eneryType'].'&';
							}
							if(!empty($request) && !empty($request['property_type'])){
								$url .= 'property_type='.$request['property_type'].'&';
							}
							if(!empty($request) && !empty($request['stateId'])){
								$url .= 'stateId='.$request['stateId'].'&';
							}
							if(!empty($request) && !empty($request['search'])){
								$url .= 'search='.$request['search'];
							}
						@endphp
						@foreach($productData as $product)
							<?php
								$gasData = (!empty($request['eneryType']) && ($request['eneryType'] == 'gas' || $request['eneryType'] == 'gas_electricity')) ? $product->product_gas : [];
								$electricityData = (!empty($request['eneryType']) && ($request['eneryType'] == 'electricity' || $request['eneryType'] == 'gas_electricity')) ? $product->product_electricty : [];
							?>
							<!-- && ($gasData && $gasData->price) || ($electricityData && $electricityData->price) -->
							@if($gasData || $electricityData)
								@php
									$companyData = $product->company;
								@endphp
								<div class="plane_list_wrapper">
									{{-- <div class="res-planheading addBlur"><h5>Plan <span>and highlights</span></h5></div> --}}
									<div class="plan_icon_wrap addBlur">
										<img src="{{asset($companyData->logo)}}">
										<h6>{{$companyData->name}}</h6>
										<a href="{{route('product.details',$product->id)}}{{$url}}" class="company-details-anchor">Details</a>
									</div>
									<div class="list_container_first addBlur">
										<h4>{{$product->name}} <!-- <a href="javascript:void(0)"><i class="fas fa-share"></i></a> --></h4>
										<ul class="reward_facilities">
											@forelse ($companyData->feature as $featureData)
												<li>{{$featureData->title}}</li>
											@empty
												<li>N/A</li>
											@endforelse
										</ul>
									</div>
									<div class="plan_value addBlur">
										<h4>Rating <span>({{findAVG($product->product_rating)}} out of 5)</span></h4>
										<!-- <img src="{{asset('forntEnd/images/rating.png')}}"> -->
									</div>
									{{-- <div class="res-planheading addBlur"><h5>Price/year <span>(estimated^)</span></h5></div> --}}
									<div class="list_amount">
										@if($gasData)
											@php $gasUpdatedprice = $gasData->price * $rfq->kwh_usage; @endphp
											<div class="list_amount_inner">
												<div class="price_compare">
													<span><img src="{{asset('forntEnd/images/fire-icon.png')}}">Gas</span>
													<h2>{{calculateHowMuchSave($rfq->kwh_rate,$gasUpdatedprice)}}</h2>
												</div>
												<div class="price_amount">
													<h2>$ {{moneyFormat($gasUpdatedprice)}}</h2>
												</div>
											</div>
										@endif
										@if($electricityData)
											@php $electricityUpdatedprice = $electricityData->price * $rfq->kwh_usage; @endphp
											<div class="list_amount_inner">
												<div class="price_compare">
													<span><img src="{{asset('forntEnd/img/lightbulb.png')}}">ELECTRICITY</span>
													<h2>{{calculateHowMuchSave($rfq->kwh_rate,$electricityUpdatedprice)}}</h2>
													<!-- <h2>{{$electricityData->title}}</h2> -->
												</div>
												<div class="price_amount">
													<h2>${{moneyFormat($electricityUpdatedprice)}}</h2>
												</div>
											</div>
										@endif
										@guest
											<div class="viewMoreDetailsDIV">
												<a href="{{route('product.details',$product->id)}}{{$url}}" class="btn btn-link viewMoreDetailsAnchortag">View more details</a>
											</div>
										@endguest
									</div>
									<div class="plan_info">
										<p>{{$product->tag}} <img src="{{asset('forntEnd/images/question.png')}}" data-toggle="tooltip" data-placement="bottom" title="{!! $product->tag_description !!}"></p>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<ul class="plan_pagination mx-auto">
						{{-- {!! $productData->appends(request()->query())->links() !!} --}}
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="inner_banner_form">
	<div class="container">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">Your  <small class="position-relative">Usage<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
				<p class="w-75 m-auto text-center mt-3">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
			</div>
		</div>
	</div>
</section>

<section class="form_section">
	<div class="container">
		<div class="row m-0 justify-content-center">
			<div class="col-12 col-lg-10 p-0">
				<div class="card border-0">
					<div class="sw_form">
						<div class="col-12">
							<h4 class="listing_wrap_title">Compare “{{getEnergyType($rfq->energy_type)}}” Plans <br><span>Total : “{{$productData->count}}” data found</span> {{($state) ? 'In "'.$state->name.'"' : ''}}</h4>
							<div class="your-search">
								<div class="search-panel">
									<!-- ${{number_format(($rfq->kwh_rate) / ($rfq->kwh_usage),1)}} / unit -->
									<p>The below offers are based on a your consumption <span> {{$rfq->kwh_usage}} units </span> at the price <span> $ {{number_format($rfq->kwh_rate,2)}}</span> for <span>{{$rfq->serviceChargedPeriod}} days</span> on a single rate tariff in the <span> SWITCHR </span> network. The lowest annual price is displayed for each offer. Your bill will differ, based on your actual usage.</p>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="plan_listing_items">
									<div class="plan_title_wrap">
										<h5>Plan <span>and highlights</span></h5>
										<h5>Price/{{$rfq->serviceChargedPeriod}} day <span>(estimated^)</span></h5>
									</div>
									<div class="plan_tab">
										<h5>Sponsored</h5>
										<a href="javascript:void(0)" class="close-panel">CLOSE</a>
									</div>
									<div class="plan_wraper">
										@php
											$url='?';
											if(!empty($request) && !empty($request['rfqId'])){
												$url .= 'rfqId='.$request['rfqId'].'&';
											}
											if(!empty($request) && !empty($request['eneryType'])){
												$url .= 'eneryType='.$request['eneryType'].'&';
											}
											if(!empty($request) && !empty($request['property_type'])){
												$url .= 'property_type='.$request['property_type'].'&';
											}
											if(!empty($request) && !empty($request['stateId'])){
												$url .= 'stateId='.$request['stateId'].'&';
											}
											if(!empty($request) && !empty($request['search'])){
												$url .= 'search='.$request['search'];
											}
										@endphp
										@foreach($productData as $product)
											<?php
												$gasData = (!empty($request['eneryType']) && ($request['eneryType'] == 'gas' || $request['eneryType'] == 'gas_electricity')) ? $product->product_gas : [];
												$electricityData = (!empty($request['eneryType']) && ($request['eneryType'] == 'electricity' || $request['eneryType'] == 'gas_electricity')) ? $product->product_electricty : [];
											?>
											<!-- && ($gasData && $gasData->price) || ($electricityData && $electricityData->price) -->
											@if($gasData || $electricityData)
												@php
													$companyData = $product->company;
												@endphp
												<div class="plane_list_wrapper">
													{{-- <div class="res-planheading addBlur"><h5>Plan <span>and highlights</span></h5></div> --}}
													<div class="plan_icon_wrap addBlur">
														<img src="{{asset($companyData->logo)}}">
														<h6>{{$companyData->name}}</h6>
														<a href="{{route('product.details',$product->id)}}{{$url}}" class="company-details-anchor">Details</a>
													</div>
													<div class="list_container_first addBlur">
														<h4>{{$product->name}} <!-- <a href="javascript:void(0)"><i class="fas fa-share"></i></a> --></h4>
														<ul class="reward_facilities">
															@forelse ($companyData->feature as $featureData)
																<li>{{$featureData->title}}</li>
															@empty
																<li>N/A</li>
															@endforelse
														</ul>
													</div>
													<div class="plan_value addBlur">
														<h4>Rating <span>({{findAVG($product->product_rating)}} out of 5)</span></h4>
														<!-- <img src="{{asset('forntEnd/images/rating.png')}}"> -->
													</div>
													{{-- <div class="res-planheading addBlur"><h5>Price/year <span>(estimated^)</span></h5></div> --}}
													<div class="list_amount">
														@if($gasData)
															@php $gasUpdatedprice = $gasData->price * $rfq->kwh_usage; @endphp
															<div class="list_amount_inner">
																<div class="price_compare">
																	<span><img src="{{asset('forntEnd/img/fire-icon.png')}}">Gas</span>
																	<h2>{{calculateHowMuchSave($rfq->kwh_rate,$gasUpdatedprice)}}</h2>
																</div>
																<div class="price_amount">
																	<h2>$ {{moneyFormat($gasUpdatedprice)}}</h2>
																</div>
															</div>
														@endif
														@if($electricityData)
															@php $electricityUpdatedprice = $electricityData->price * $rfq->kwh_usage; @endphp
															<div class="list_amount_inner">
																<div class="price_compare">
																	<span><img src="{{asset('forntEnd/img/lightbulb.png')}}">ELECTRICITY</span>
																	<h2>{{calculateHowMuchSave($rfq->kwh_rate,$electricityUpdatedprice)}}</h2>
																	<!-- <h2>{{$electricityData->title}}</h2> -->
																</div>
																<div class="price_amount">
																	<h2>${{moneyFormat($electricityUpdatedprice)}}</h2>
																</div>
															</div>
														@endif
														@guest
															<div class="viewMoreDetailsDIV">
																<a href="{{route('product.details',$product->id)}}{{$url}}" class="btn btn-link viewMoreDetailsAnchortag">View more details</a>
															</div>
														@endguest
													</div>
													<div class="plan_info">
														<p>{{$product->tag}} <img src="{{asset('forntEnd/img/question.png')}}" data-toggle="tooltip" data-placement="bottom" title="{!! $product->tag_description !!}"></p>
													</div>
												</div>
											@endif
										@endforeach
									</div>
									<ul class="plan_pagination mx-auto">
										{{-- {!! $productData->appends(request()->query())->links() !!} --}}
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
    <script type="text/javascript">
    	@guest
    	    // cut Copy paste Disbale for this case
	    	$('body').bind('cut copy paste', function(event) {
				event.preventDefault();
			});
			document.oncontextmenu = new Function("return false");
	    	<?php Session::put('url.intended', URL::full()); ?>
	    	$('.addBlur').css({'filter': 'blur(5px)'});
			$('.plan_listing_wraper a').addClass("disable-click");
			// $('.plan_listing_wraper a').addClass("disable-click").removeAttr('href');
			$('.plan_listing_wraper button').attr('disabled',true);
			$('.viewMoreDetailsAnchortag').attr('disabled',false).removeClass('disable-click'); // only this will enabled to click
    	@endguest
    </script>
@stop
@endsection