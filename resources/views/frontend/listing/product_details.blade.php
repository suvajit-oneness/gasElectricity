@extends('frontend.layouts.master')
@section('title','Product Details')
@section('css')

<style>
	.plan_details_btn{border: 1px solid #000;color: #fff;padding: 10px;margin-left: 20px;background-color: #5cdb94;}
	.emailplanDetails{}
	.switch_and_save{background-color: #f1b734;}
</style>
@stop
@section('content')
<section class="state_banner"><div class="container"></div></section>

<section class="momentum_wrap">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 class="momentum_title">Why Momentum?</h4>
				<ul class="momentum_list">
					@foreach($productData->product_momentum as $momentum)
						<li>
							<img src="{{asset($momentum->icon)}}">
							{{$momentum->title}}
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="plan_listing_wraper">
	<div class="container">
		<div class="row">
			@php 
				$url='?productId='.$productData->id.'&';
				if(!empty($req->rfqId)){
					$url .= 'rfqId='.$req->rfqId.'&';
				}
				if(!empty($req->eneryType)){
					$url .= 'eneryType='.$req->eneryType.'&';
				}
				if(!empty($req->property_type)){
					$url .= 'property_type='.$req->property_type.'&';
				}
				if(!empty($req->stateId)){
					$url .= 'stateId='.$req->stateId.'&';
				}
			@endphp
			<button class="btn plan_details_btn emailplanDetails @if(count($data->tariff_type) <= 0) emailedPlanDetails @endif">Email Plan Details</button>
			<a href="{{route('company.supplier.form')}}{{$url}}" class="btn plan_details_btn switch_and_save">Switch & Save Today</a>
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
								<div class="res-planheading"><h5>Plan <span>and highlights</span></h5></div>
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
								<div class="res-planheading"><h5>Price/year <span>(estimated^)</span></h5></div>
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
								</div>
								<div class="plan_info">
									<p>{{$productData->tag}} <img src="{{asset('forntEnd/images/question.png')}}" data-toggle="tooltip" data-placement="bottom" title="{!! $productData->tag_description !!}"></p>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="bs-example feature-part">
		    <div class="accordion" id="accordionExample">
		    	<!-- Product Company Feature -->
		        <div class="card">
		            <div class="card-header" id="headingTwo">
		                <h2 class="mb-0">
		                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"> Features <i class="fa fa-plus"></i></button>
		                </h2>
		            </div>
		            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
		                <div class="card-body features">
		                	@foreach($productData->company->feature as $feature)
			                	<strong>{{$feature->title}} :</strong>
			                    <p>{!! $feature->description !!}</p>
		                	@endforeach
		                </div>
		            </div>
		        </div>
		        <!-- Product Company Plan Details-->
		        <div class="card">
		            <div class="card-header" id="headingOne">
		                <h2 class="mb-0">
		                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">Plan Details <i class="fa fa-plus"></i></button>									
		                </h2>
		            </div>
		            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		                <div class="card-body">
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
		        <!-- Product Company Rate Details -->
		        <div class="card">
		            <div class="card-header" id="headingThree">
		                <h2 class="mb-0">
		                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"> Rates Details <i class="fa fa-plus"></i></button>                     
		                </h2>
		            </div>
		            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
		                <div class="card-body">
							<ul class="nav nav-tabs gapbott" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Single Rate </a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Single + Controlled load </a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Time of use </a>
								</li>
							</ul>
							<?php $rateDetails = $productData->company->company_rates; ?>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
									<p>The rates shown are indicative prices based on the rates our participating providers have given us, your postcode and information provided by you. Your chosen supplier will inform you of the rates which will apply depending on the network and meter type configuration at your property. If your chosen supplier determines that your property is serviced by a different meter type or network than shown above your rates may be different. You will be advised of this by your chosen supplier.</p>
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
									<p>The rates shown are indicative prices based on the rates our participating providers have given us, your postcode and information provided by you. Your chosen supplier will inform you of the rates which will apply depending on the network and meter type configuration at your property. If your chosen supplier determines that your property is serviced by a different meter type or network than shown above your rates may be different. You will be advised of this by your chosen supplier.</p>
								</div>
								<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> 
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
									<p>The rates shown are indicative prices based on the rates our participating providers have given us, your postcode and information provided by you. Your chosen supplier will inform you of the rates which will apply depending on the network and meter type configuration at your property. If your chosen supplier determines that your property is serviced by a different meter type or network than shown above your rates may be different. You will be advised of this by your chosen supplier.</p>
								</div>
							</div>
		                </div>
		            </div>
		        </div>
		        <!-- Product Company Calculation Details -->
		        <div class="card">
		            <div class="card-header" id="headingFour">
		                <h2 class="mb-0">
		                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"> Calculation Details <i class="fa fa-plus"></i></button>                     
		                </h2>
		            </div>
		            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
		                <div class="card-body">
		                	<div class="tab-listing-green">
		                		<?php $companyCalculation = $productData->company->company_calculation;?>
			                    <p>For Movers</p>
			                    <ul>
			                    	@foreach($companyCalculation as $key => $calculation)
				                    	@if($calculation->type == 1)
					                    	<li>{!! $calculation->details !!}</li>
				                    	@endif
			                    	@endforeach
			                    </ul>
			                    <p>For Switchers (when usage details are provided)</p>
			                    <ul>
			                     	@foreach($companyCalculation as $key => $calculation)
				                    	@if($calculation->type == 2)
					                    	<li>{!! $calculation->details !!}</li>
				                    	@endif
			                    	@endforeach
			                    </ul>
			                    <p>For Switchers (when usage details are not-provided)</p>
			                    <ul>
				                    @foreach($companyCalculation as $key => $calculation)
				                    	@if($calculation->type == 3)
					                    	<li>{!! $calculation->details !!}</li>
				                    	@endif
			                    	@endforeach
				                </ul>
				                <p>All estimates</p>
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
@if(count($data->tariff_type) > 0)
	<!-- Email Plan Details Modal -->
	<div class="modal fade" id="emailPlanDetailsModal" tabindex="-1" role="dialog" aria-labelledby="emailPlanDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="emailPlanDetailsModalLabel">Please select tariff type you want to send</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <div class="modal-body">
			    	<h5>Electricity</h5>
			    	<ul>
			    		@foreach($data->tariff_type as $tariffElectricity)
				    		@if($tariffElectricity->type == 1)
					    		<li><input type="radio" name="plan_rate_link" value="{{$tariffElectricity->link}}"><a href="{{$tariffElectricity->link}}" target="_blank">{{$tariffElectricity->title}}</a></li>
					    	@endif
			    		@endforeach
			    	</ul>
			    	<hr>
			    	<h5>Gas</h5>
			    	<ul>
			    		@foreach($data->tariff_type as $tariffElectricity)
				    		@if($tariffElectricity->type == 2)
					    		<li><input type="radio" name="plan_rate_link_gas" value="{{$tariffElectricity->link}}"><a href="{{$tariffElectricity->link}}" target="_blank">{{$tariffElectricity->title}}</a></li>
					    	@endif
			    		@endforeach
			    	</ul>
			    </div>
			    <div class="modal-footer">
			        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
			        <button type="button" class="btn plan_details_btn emailedPlanDetails">Email Plan Details</button>
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
				data : {plan_rate_link:plan_rate_link,plan_rate_link_gas:plan_rate_link_gas,rfqId:'{{$req->rfqId}}',productId:'{{$productData->id}}',_token:'{{csrf_token()}}'},
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