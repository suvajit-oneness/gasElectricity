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

<section class="plan_listing_wraper">
	<!-- <div class="blurcontent"><div class="toasterClass"></div></div> -->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<center><h4 class="listing_wrap_title">Compare “{{getEnergyType($rfq->energy_type)}}” Plans <br><span>Total : “{{$productData->count}}” data found</span> {{($state) ? 'In "'.$state->name.'"' : ''}}</h4></center>
				<div class="your-search">
					<div class="search-panel">
						<p>The below offers are based on a residential customer who consumes <span> 4,600 kWh / year </span> on a single rate tariff in the <span> SWITCHR </span> network. The lowest annual price is displayed for each offer. Your bill will differ, based on your actual usage.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="plan_listing_items">
					<div class="plan_title_wrap">
						<h5>Plan <span>and highlights</span></h5>
						<h5>Price/year <span>(estimated^)</span></h5>
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
						@endphp
						@foreach($productData as $product)
							<?php
								$gasData = (!empty($request['eneryType']) && ($request['eneryType'] == 'gas' || $request['eneryType'] == 'gas_electricity')) ? $product->product_gas : [];
								$electricityData = (!empty($request['eneryType']) && ($request['eneryType'] == 'electricity' || $request['eneryType'] == 'gas_electricity')) ? $product->product_electricty : [];
							?>
							@if($gasData || $electricityData)
								@php $companyData = $product->company; @endphp
								<div class="plane_list_wrapper">
									<div class="res-planheading addBlur"><h5>Plan <span>and highlights</span></h5></div>
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
									<div class="res-planheading addBlur"><h5>Price/year <span>(estimated^)</span></h5></div>
									<div class="list_amount">
										@if($gasData)
											<div class="list_amount_inner">
												<div class="price_compare">
													<span><img src="{{asset('forntEnd/images/fire-icon.png')}}">Gas</span>
													<h2>{{$gasData->title}}</h2>
												</div>
												<div class="price_amount">
													<h2>$ {{moneyFormat($gasData->price)}}</h2>
												</div>
											</div>
										@endif
										@if($electricityData)
											<div class="list_amount_inner">
												<div class="price_compare">
													<span><img src="{{asset('forntEnd/images/lightbulb.png')}}">ELECTRICITY</span>
													<h2>{{$electricityData->title}}</h2>
													<p>than reference price</p>
												</div>
												<div class="price_amount">
													<h2>${{moneyFormat($electricityData->price)}}</h2>
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
						{!! $productData->appends(request()->query())->links() !!}
					</ul>
				</div>
				<!-- <div class="important_note_wrap">
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
		</div>
	</div>
</section>

<!-- <div class="modal" tabindex="-1" role="dialog" id="loginToContinue">
	<div class="modal-dialog modal-dialog-centered please_log_modal" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Please do login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Click login to continue</p>
				<div class="col-12 p-0 text-right">
				    <button type="button" class="btn btn-primary loginToContinue">Login</button>
				</div>
			</div>
				
		</div>
	</div>
</div> -->

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
			// $('#loginToContinue').modal('show');
			// $(document).on('click','.loginToContinue',function(){
			// 	window.location.href = '{{route('login')}}';
			// });
    	@endguest
    </script>
@stop
@endsection