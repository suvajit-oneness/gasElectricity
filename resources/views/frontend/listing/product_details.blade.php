@extends('frontend.layouts.master')
@section('title','Product Details')
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

<section class="feature-part">
	<div class="container-fluid">
		<div class="bs-example">
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

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection