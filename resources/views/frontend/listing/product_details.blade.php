@extends('frontend.layouts.master')
@section('title','Product Details')
@section('css')

{{-- <style>
	.plan_details_btn{border: 1px solid #000;color: #fff;padding: 10px;margin-left: 20px;background-color: #5cdb94;}
	.emailplanDetails{}
	.switch_and_save{background-color: #f1b734;}
</style> --}}
@stop
@section('content')
{{-- <section class="state_banner"><div class="container"></div></section> --}}

<section class="inner_banner_about">
<div class="container">
	<div class="row m-0">
		<div class="page_title">
			<h1 data-aos="fade-down" data-aos-duration="1000">Why  <small class="position-relative">Momentum?<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
		</div>
	</div>
</div>
</section>
<!--end_inner_banner-->
<section class="py-5">
<div class="container">
	<div class="row">
			@php
				$url='?productId='.$productData->id.'&';$newURL = [];
				if(!empty($req->rfqId)){
					$url .= 'rfqId='.$req->rfqId.'&';
					$newURL['rfqId'] = $req->rfqId;
				}
				if(!empty($req->eneryType)){
					$url .= 'eneryType='.$req->eneryType.'&';
					$newURL['eneryType'] = $req->eneryType;
				}
				if(!empty($req->property_type)){
					$url .= 'property_type='.$req->property_type.'&';
					$newURL['property_type'] = $req->property_type;
				}
				if(!empty($req->stateId)){
					$url .= 'stateId='.$req->stateId.'&';
					$newURL['stateId'] = $req->stateId;
				}
				if(!empty($req->search)){
					$url .= 'search='.$req->search.'&';
					$newURL['search'] = $req->search;
				}
			@endphp
			<div class="col-md-8">
				<button class="btn plan_details_btn2 emailplanDetails @if(count($data->tariff_type) <= 0) emailedPlanDetails @endif">Email Plan Details</button>
				<a href="{{route('company.supplier.form')}}{{$url}}" class="btn btn3 plan_details_btn2">Switch & Save Today</a>
			</div>
			<div class="col-md-4 text-end mr-auto">
				<a href="{{route('product.listing',$newURL)}}" class="btn plan_details_btn"> <i class="fa-solid fa-arrow-left"></i> Go back to result</a><!--Go back to search result-->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="plan_listing_items">
					<div class="plan_wraper">
						<?php
							$gasData = $productData->product_gas;
							$electricityData = $productData->product_electricty;
						?>
						@if($gasData || $electricityData)
							<?php $companyData = $productData->company;?>
							<div class="plane_list_wrapper">
								{{-- <div class="res-planheading"><h5>Plan <span>and highlights</span></h5></div> --}}
								@guest
								@else
									<div class="plan_icon_wrap">
										<img src="{{asset($companyData->logo)}}">
										<h6>{{$companyData->name}}</h6>
									</div>
								@endguest
								<div class="list_container_first ">
									<h4>{{$productData->name}}</h4>
									<ul class="reward_facilities">
										@forelse ($companyData->feature as $featureData)
											<li>{{$featureData->title}}</li>
										@empty
											<li>N/A</li>
										@endforelse
									</ul>
								</div>
								<div class="plan_value">
									<h4>Rating <span>({{findAVG($productData->product_rating)}} out of 5)</span></h4>
								</div>
								{{-- <div class="res-planheading"><h5>Price/year <span>(estimated^)</span></h5></div> --}}
								<div class="list_amount">
									@if($gasData)
										@php $gasUpdatedprice = $gasData->price * $rfq->kwh_usage; @endphp
										<div class="list_amount_inner">
											<div class="price_compare">
												<span><img src="{{asset('forntEnd/img/fire-icon.png')}}">Gas</span>
												<h2>{{calculateHowMuchSave($rfq->kwh_rate,$gasUpdatedprice)}}</h2>
												<!-- <h2>{{$gasData->title}}</h2> -->
											</div>
											<div class="price_amount">
												<h2>$ {{moneyFormat($gasData->price * $rfq->serviceChargedPeriod)}}</h2>
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
												<!-- <p>than reference price</p> -->
											</div>
											<div class="price_amount">
												<h2>${{moneyFormat($electricityData->price * $rfq->serviceChargedPeriod)}}</h2>
											</div>
										</div>
									@endif
								</div>
								<div class="plan_info">
									<p>{{$productData->tag}} <img src="{{asset('forntEnd/img/question.png')}}" data-toggle="tooltip" data-placement="bottom" title="{!! $productData->tag_description !!}"></p>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
</div>
</section>


{{-- Plan Details --}}
<!-- Product Company Plan Details-->
<section class="py-4 py-lg-5 testimonial_sec">
	<div class="container p-0">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">Plan <small class="position-relative">Details<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
				{{-- <p class="text-center mt-3" data-aos="fade-up" data-aos-duration="1400">Check your energy comparison questions answered</p> --}}
			</div>
		</div>
		<div class="row m-0 mt-4 justify-content-center">
			<div class="accordion col-12 col-lg-9" id="accordionExample">
				<div class="card border-0 mb-1">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Features
						</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								@foreach($productData->company->feature as $feature)
									<h6>{{$feature->title}} :</h6>
									<p>{!! $feature->description !!}</p>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="card border-0 mb-1">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							Plan Details
						</button>
						</h2>
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<table>
									<tbody>
										<?php $companyPlan = $productData->company->company_plan; ?>
										<tr>
											<td colspan="2"><h4>Bonuses and Fees</h4></td>
										</tr>
										@foreach($companyPlan as $key => $plan)
											@if($plan->type == 1)
												<tr>
													<td>{{$plan->title}}</td>
													<td>{!! $plan->description !!}</td>
												</tr>
											@endif
										@endforeach
										<tr>
											<td colspan="2"><h4>Other details</h4></td>
										</tr>
										@foreach($companyPlan as $key => $plan)
											@if($plan->type == 2)
												<tr>
													<td>{{$plan->title}}</td>
													<td>{!! $plan->description !!}</td>
												</tr>
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="card border-0 mb-1">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingThree">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
							Calculation Details
						</button>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<?php $companyCalculation = $productData->company->company_calculation;?>
								<h6>For Movers</h6>
								<ul>
									@foreach($companyCalculation as $key => $calculation)
										@if($calculation->type == 1)
											<li>{!! $calculation->details !!}</li>
										@endif
									@endforeach
								</ul>
								<h6>For Switchers (when usage details are provided)</h6>
								<ul>
									@foreach($companyCalculation as $key => $calculation)
										@if($calculation->type == 2)
											<li>{!! $calculation->details !!}</li>
										@endif
									@endforeach
								</ul>
								<h6>For Switchers (when usage details are not-provided)</h6>
								<ul>
									@foreach($companyCalculation as $key => $calculation)
										@if($calculation->type == 3)
											<li>{!! $calculation->details !!}</li>
										@endif
									@endforeach
								</ul>
								<h6>All estimates</h6>
								<ul>
									@foreach($companyCalculation as $key => $calculation)
										@if($calculation->type == 4)
											<li>{!! $calculation->details !!}</li>
										@endif
									@endforeach
								</ul>
								<p>For more information about rates and fees, check plan details and retailers energy fact sheet (for VIC) or BPID (for NSW, QLD & SA). Additional charges may also apply. You may also be eligible for a state-government concession or rebate on your bill.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card border-0 mb-1">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingFour">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
							Rates Details
						</button>
						</h2>
						<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="network_wrapper">
									<ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
										<li class="nav-item">
											<a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#sr">Single Rate </a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-bs-toggle="tab" href="#scl">Single + Controlled load</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-bs-toggle="tab" href="#tu">Time of use</a>
										</li>
									</ul>
									<?php $rateDetails = $productData->company->company_rates; ?>
									<form class="tab-content">
										<div class="tab-pane active" id="sr">
											<table>
												<tbody>
													@foreach($rateDetails as $key => $rate)
														@if($rate->type == 1)
															<tr>
																<td>{{ $rate->title }}</td>
																<td>{!! $rate->description !!}</td>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
											<p>
												The rates shown are indicative prices based on the rates our participating providers have given us, your postcode and information provided by you. Your chosen supplier will inform you of the rates which will apply depending on the network and meter type configuration at your property. If your chosen supplier determines that your property is serviced by a different meter type or network than shown above your rates may be different. You will be advised of this by your chosen supplier.
											</p>
										</div>
										<div class="tab-pane" id="scl">
											<table class="mb-3">
												<tbody>
													@foreach($rateDetails as $key => $rate)
														@if($rate->type == 2)
															<tr>
																<td>{{ $rate->title }}</td>
																<td>{!! $rate->description !!}</td>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
											<p>
												The rates shown are indicative prices based on the rates our participating providers have given us, your postcode and information provided by you. Your chosen supplier will inform you of the rates which will apply depending on the network and meter type configuration at your property. If your chosen supplier determines that your property is serviced by a different meter type or network than shown above your rates may be different. You will be advised of this by your chosen supplier.
											</p>
										</div>
										<div class="tab-pane" id="tu">
											<table class="mb-3">
												<tbody>
													@foreach($rateDetails as $key => $rate)
														@if($rate->type == 3)
															<tr>
																<td>{{ $rate->title }}</td>
																<td>{!! $rate->description !!}</td>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
											<p>
												The rates shown are indicative prices based on the rates our participating providers have given us, your postcode and information provided by you. Your chosen supplier will inform you of the rates which will apply depending on the network and meter type configuration at your property. If your chosen supplier determines that your property is serviced by a different meter type or network than shown above your rates may be different. You will be advised of this by your chosen supplier.
											</p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

{{-- endif --}}
@if(count($data->tariff_type) > 0)
	<!-- Email Plan Details Modal -->
	<div class="modal fade" id="emailPlanDetailsModal" tabindex="-1" role="dialog" aria-labelledby="emailPlanDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
		    <div class="modal-content modal-dialog-centered " >
			    <div class="modal-header">
			        <h5 class="modal-title" id="emailPlanDetailsModalLabel">Please select tariff type you want to send</h5>
			        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
			        </button> --}}
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			    </div>
			    <div class="modal-body">
			    	<h5>Electricity</h5>
			    	<ul class="email_send_ch">
			    		@foreach($data->tariff_type as $tariffElectricity)
				    		@if($tariffElectricity->type == 1)
					    		<li>
									<label>
										<input type="radio" class="me-2" name="plan_rate_link" value="{{$tariffElectricity->link}}"><!--<a href="{{$tariffElectricity->link}}" target="_blank">{{$tariffElectricity->title}}</a>-->
										{{$tariffElectricity->title}}
									</label>
								</li>
					    	@endif
			    		@endforeach
			    	</ul>
			    	<hr>
			    	<h5>Gas</h5>
			    	<ul class="email_send_ch">
			    		@foreach($data->tariff_type as $tariffElectricity)
				    		@if($tariffElectricity->type == 2)
					    		<li>
								<label>
									<input type="radio" class="me-2" name="plan_rate_link_gas" value="{{$tariffElectricity->link}}">
									{{-- <a href="{{$tariffElectricity->link}}" target="_blank">{{$tariffElectricity->title}}</a> --}}
									{{$tariffElectricity->title}}
								</label>
								</li>
					    	@endif
			    		@endforeach
			    	</ul>
			    </div>
			    <div class="modal-footer border-0 bg-light w-100">
			        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
			        <button type="button" class="btn log_drop btn-sm">Email Plan Details</button>
			    </div>
		    </div>
		</div>
	</div>
@endif

@section('script')
    <script type="text/javascript">
    	$(document).on('click','.emailplanDetails',function(){
			$('#emailPlanDetailsModal').modal('show');
    	});

    	$(document).on('click','.emailedPlanDetails',function(){
    		var thisBtn = $(this);
    		var plan_rate_link = $("input[name='plan_rate_link']:checked").val(),plan_rate_link_gas = $("input[name='plan_rate_link_gas']:checked").val();
    		$('.loading-data').show();thisBtn.attr('disabled',true);
			$.ajax({
				url : '{{route('rfq.email.plan.details')}}',
				type : 'post',
				dataType : 'JSON',
				data : {userId:'{{Auth::user()->id}}',plan_rate_link:plan_rate_link,plan_rate_link_gas:plan_rate_link_gas,rfqId:'{{$rfq->id}}',productId:'{{$productData->id}}',_token:'{{csrf_token()}}'},
				success:function(response){
					$('.loading-data').hide();thisBtn.attr('disabled',false);
					if(response.error == false){
						$('.modal').modal('hide');$('.emailplanDetails').remove();
						swal('success' , response.message);
					}else{
						swal('error' , response.message);
					}
				}
			});
    	});
    </script>
@stop
@endsection