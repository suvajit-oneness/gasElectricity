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
	<div class="container">
		<!-- <div class="row align-items-center">
			<div class="col-12 col-md-7">
				<div class="custom-control custom-checkbox custom-control-mod">
			        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="referral_partner" value="true">
			        <label class="custom-control-label" for="customControlAutosizing">Just compare plans which link to a Referral Partner's website.</label>
			    </div>
			</div>
			<div class="col-12 col-md-5 text-right">
				<div class="filter_wrap">
					<div class="filter_icon">
						<img src="{{asset('forntEnd/images/filter.png')}}">
					</div>
					<div class="dropdown filter_selected">
					  	<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><p><span>Sorted by:</span>Value Score</p> <img src="{{asset('forntEnd/images/double-arrow-down.png')}}"></a>
					 	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <a class="dropdown-item" href="javascript:void(0)">Action</a>
						    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
						    <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
					  	</div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-12">
				<div class="plan_listing_items">
					<!-- <div class="plan_listing_header">
						<p>Based on the general usage^ in the Energex network the AER reference price is: <span>$1,508 / year</span></p>
					</div>
					<div class="plan_title_wrap">
						<h5>Plan <span>and highlights</span></h5>
						<h5>Price/year <span>(estimated^)</span></h5>
					</div> -->
					<div class="plan_tab">
						<h5>Sponsored</h5>
						<a href="javascript:void(0)" class="close-panel">CLOSE</a>
					</div>
					<div class="plan_wraper">
						@foreach ($productData as $key => $product)
							<?php 
								$gasData = (!empty($request['eneryType']) && ($request['eneryType'] == 'gas' || $request['eneryType'] == 'gas_electricity')) ? $product->product_gas : [];
								$electricityData = (!empty($request['eneryType']) && ($request['eneryType'] == 'electricity' || $request['eneryType'] == 'gas_electricity')) ? $product->product_electricty : [];
							?>
							@if($gasData || $electricityData)
								<?php $companyData = $product->company;
									$otherURL = '?';
									if(!empty($request['eneryType'])){
										$otherURL .= 'eneryType='.$request['eneryType'].'&';
									}
									if(!empty($request['stateId'])){
										$otherURL .= 'stateId='.$request['stateId'];
									}
								?>
								<div class="plane_list_wrapper">
									<div class="res-planheading"><h5>Plan <span>and highlights</span></h5></div>
									<div class="list_container_first wid-pad">
										<h4>{{$product->name}}</h4>
										<ul class="reward_facilities">
											@forelse ($companyData->feature as $featureData)
												<li>{{$featureData->title}}</li>
											@empty
												<li>N/A</li>
											@endforelse
										</ul>
										<div class="plan_info">
											<p>{{$product->tag}} <img src="{{asset('forntEnd/images/question.png')}}" data-toggle="tooltip" data-placement="bottom" title="{!! $product->tag_description !!}"></p>
										</div>
									</div>
									<div class="plan_value">
										<h4>Rating <span>({{findAVG($product->product_rating)}} out of 5)</span></h4>
									</div>

									<div class="res-planheading"><h5>Price/year <span>(estimated^)</span></h5></div>
									<div class="list_amount mb-0">
										@if($gasData)
											<div class="list_amount_inner">
												<div class="price_compare">
													<span><img src="{{asset('forntEnd/images/fire-icon.png')}}">Gas</span>
													<h2>{{$gasData->title}}</h2>
												</div>
												<div class="price_amount">
													<h2>$ {{moneyFormat($gasData->price)}}</h2>
													<!-- <a href="{{route('company.supplier.form',$companyData->id)}}{{$otherURL}}" class="blue-btm">EXPLORE <span><i class="fas fa-arrow-circle-right"></i></span></a> -->
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
													<h2>$ {{moneyFormat($electricityData->price)}}</h2>
													<!-- <a href="{{route('company.supplier.form',$companyData->id)}}{{$otherURL}}" class="blue-btm">EXPLORE <span><i class="fas fa-arrow-circle-right"></i></span></a> -->
												</div>
											</div>
										@endif
										
									</div>
								</div>
							@endif
						@endforeach
					</div>

					<ul class="plan_pagination justify-content-end">
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

@section('script')
    <script type="text/javascript">
    	$(document).ready(function(){
	  		$(".trigger").click(function(){
	    		$(".note_content").slideToggle("fast");
	  		});
		});
		$(document).ready(function(){
	  		$(".close-panel").click(function(){
	    		$(".plan_wraper").slideToggle("fast");
	  		});
		});
    </script>
@stop
@endsection