@extends('frontend.layouts.master')
@section('title','RFQ')
@section('content')

<section class="contact_wraper bac-white">
	<div class="container">
		<form method="post" action="{{route('elecricity.form.rfq.save')}}" enctype="multipart/form-data" id="RFqFormSection">
			@csrf
			<div class="electric-head">
				<h2 class="heading text-center">Describe Your Usage </h2>
				<p class="text-center">To find you a great plan we need to collect some details about you.</p>
			</div>			
			@foreach($requestedData as $key => $value)
				<input type="hidden" name="otherPageRequest[{{$key}}]" value="{{$value}}">
			@endforeach
			<div class="energy_select_box block-display elect-form">
				<p>What are you looking to compare? <span class="orange-color">*</span></p>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="custom-control custom-radio autowidth p-0">
						  <input type="radio" class="custom-control-input" id="customRadio1" name="energy_type" value="gas_electricity" @if(old('energy_type') == 'gas_electricity'){{('checked')}}@endif>
						  <label class="custom-control-label ct_radio" for="customRadio1">Gas &amp; Electricity</label>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="custom-control custom-radio autowidth electricy-icon p-0">
						  <input type="radio" id="customRadio2" class="custom-control-input" name="energy_type" value="electricity" @if(old('energy_type') == 'electricity'){{('checked')}}@elseif(!old('energy_type')){{('checked')}}@endif>
						  <label class="custom-control-label ct_radio" for="customRadio2">Electricity</label>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="custom-control custom-radio autowidth gas-icon p-0">
						  <input type="radio" id="customRadio3" class="custom-control-input" name="energy_type" value="gas" @if(old('energy_type') == 'gas'){{('checked')}}@endif>
						  <label class="custom-control-label ct_radio" for="customRadio3">Gas </label>
						</div>
					</div>
				</div>
				@error('energy_type')<span class="text-danger">{{$message}}</span>@enderror
			</div><br>

			<div class="light-green border-area elect-form">
				<div class="energy_select_box block-display back-transparent">
					<p class="black-content"> What type of property? <span class="orange-color">*</span></p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="myhome" name="type_of_property" value="home" class="custom-control-input" @if(old('type_of_property') == 'home'){{('checked')}}@elseif(!old('type_of_property')){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="myhome">My home</label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mybusness" name="type_of_property" value="business" class="custom-control-input" @if(old('type_of_property') == 'business'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mybusness">My business</label>
							</div>
						</div>
					</div>
					@error('type_of_property')<span class="text-danger">{{$message}}</span>@enderror
			    </div>

			    <div class="energy_select_box block-display back-transparent">
					<p class="black-content"> Do you have your Elecricity / Gas Bill ?<span class="orange-color"></span></p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="file" name="file" id="OCRFormField" class="form-control @error('file'){{('is_invalid')}}@enderror" onchange="OCRFILEUPLOAD(event)">
							</div>
						</div>
					</div>
					<span class="text-danger" id="fileUploadError"></span>
					@error('file')<span class="text-danger">{{$message}}</span>@enderror
			    </div>
			    <div class="energy_select_box block-display back-transparent">
			    	<p class="black-content">Energy usage details <span class="orange-color">*</span></p>
			    	<div class="row">
			    		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			    			<label>kWh usage</label>
			    			<input type="text" id="kwh_usage" name="kwh_usage" placeholder="kWh usage" class="form-control @error('kwh_usage'){{('is_invalid')}}@enderror" value="{{(old('kwh_usage'))}}">
			    			@error('kwh_usage')<span class="text-danger">{{$message}}</span>@enderror
			    		</div>
			    		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			    			<label>kWh rate</label>
			    			<input type="text" id="kwh_rate" name="kwh_rate" placeholder="kWh rate" class="form-control @error('kwh_rate'){{('is_invalid')}}@enderror" value="{{(old('kwh_rate'))}}">
			    			@error('kwh_rate')<span class="text-danger">{{$message}}</span>@enderror
			    		</div>
			    		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			    			<label>Service charged period</label>
			    			<input type="text" id="serviceChargedPeriod" name="serviceChargedPeriod" placeholder="Service charged period" class="form-control @error('serviceChargedPeriod'){{('is_invalid')}}@enderror" value="{{(old('serviceChargedPeriod'))}}">
			    			@error('serviceChargedPeriod')<span class="text-danger">{{$message}}</span>@enderror
			    		</div>
			    		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
			    			<label>Service charged rate</label>
			    			<input type="text" id="serviceChargedRate" name="serviceChargedRate" placeholder="Service charged rate" class="form-control @error('serviceChargedRate'){{('is_invalid')}}@enderror" value="{{(old('serviceChargedRate'))}}">
			    			@error('serviceChargedRate')<span class="text-danger">{{$message}}</span>@enderror
			    		</div>
			    	</div>
			    </div>

			    <!-- <div class="energy_select_box block-display back-transparent">
					<p class="black-content"> Do you own or rent the property? <span class="orange-color">*</span></p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="own" name="property_type" value="own" class="custom-control-input" @if(old('property_type') == 'own'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="own"> Own </label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="rent" name="property_type" value="rent" class="custom-control-input" @if(old('property_type') == 'rent'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="rent"> Rent </label>
							</div>
						</div>
					</div>
					@error('property_type')<span class="text-danger">{{$message}}</span>@enderror
			    </div>

			    <div class="energy_select_box block-display back-transparent">
					<p class="black-content"> Are you moving into this property? <span class="orange-color">*</span> </p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mov-yes" name="areyoumovingintothisproperty" value="yes" class="custom-control-input" @if(old('areyoumovingintothisproperty') == 'yes'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mov-yes"> Yes </label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mov-no" name="areyoumovingintothisproperty" value="no" class="custom-control-input" @if(old('areyoumovingintothisproperty') == 'no'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mov-no"> No </label>
							</div>
						</div>
					</div>
					@error('areyoumovingintothisproperty')<span class="text-danger">{{$message}}</span>@enderror
			    </div>

			    <div class="energy_select_box block-display back-transparent">
					<p class="black-content"> What is your move in date? <span class="orange-color">*</span> </p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="date-control autowidth">
								<input class="form-control" type="date" name="moving_date" value="{{date('Y-m-d')}}" >
							</div>
						</div>
					</div>
					@error('moving_date')<span class="text-danger">{{$message}}</span>@enderror
			    </div>

			    <div class="energy_select_box block-display back-transparent">
					<p class="black-content"> Do you also need to connect a broadband or home entertainment service? <span class="orange-color">*</span> </p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mov-yes2" name="entertainment_service" value="yes" class="custom-control-input" @if(old('entertainment_service') == 'yes'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mov-yes2"> Yes </label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mov-no2" name="entertainment_service" value="no" class="custom-control-input" @if(old('entertainment_service') == 'no'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mov-no2"> No </label>
							</div>
						</div>
					</div>
					@error('entertainment_service')<span class="text-danger">{{$message}}</span>@enderror
			    </div>

			    <div class="energy_select_box block-display back-transparent border-b-none">
					<p class="black-content"> Do you have gas connection to the property? <span class="orange-color">*</span> </p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mov-yes3" name="gas_connection" value="yes" class="custom-control-input" @if(old('gas_connection') == 'yes'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mov-yes3"> Yes </label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="mov-no3" name="gas_connection" value="no" class="custom-control-input" @if(old('gas_connection') == 'no'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="mov-no3"> No </label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth p-0">
							  <input type="radio" id="know" name="gas_connection" value="donotknow" class="custom-control-input" @if(old('gas_connection') == 'donotknow'){{('checked')}}@endif>
							  <label class="custom-control-label ct_radio" for="know"> Don't Know </label>
							</div>
						</div>
					</div>
					@error('gas_connection')<span class="text-danger">{{$message}}</span>@enderror
			    </div> -->
			</div>

			<div class="electricity-details elect-form">
				<div class="what-label">
					<strong class="black-content "> What level best describes your typical electricity usage? <span class="orange-color">*</span> </strong>

					<ul class="feature_list">
						<li>
							<div class="energy_select_box block-display">
								<div class="custom-control custom-radio autowidth">
									<input type="radio" id="low" name="electricity_usage" value="low" class="custom-control-input" @if(old('electricity_usage') == 'low'){{('checked')}}@endif>
									<label class="custom-control-label" for="low"> Low </label>
								</div>
							</div>
							<div class="label-content text-center">
								<p><span>1 to 2 people</span></p>
								<p><span>1 to 2 bedrooms</span></p>
								<p>Weekly washing, little heating and cooling</p>
								<p>Employed full time, spend little time at home</p>
							</div>
						</li>
						<li>
							<div class="energy_select_box block-display">
								<div class="custom-control custom-radio autowidth">
									<input type="radio" id="Medium" name="electricity_usage" value="medium" class="custom-control-input" @if(old('electricity_usage') == 'medium'){{('checked')}}@elseif(!old('electricity_usage')){{('checked')}}@endif>
									<label class="custom-control-label" for="Medium"> Medium </label>
								</div>
							</div>

							<div class="label-content text-center">
								<p><span>3 to 4 people</span></p>
								<p><span>3 bedrooms</span></p>
								<p>Washing a few times a week, regular heating and cooling Employed full time, children at school, home most evenings and weekends</p>
							</div>
						</li>
						<li>
							<div class="energy_select_box block-display">
								<div class="custom-control custom-radio autowidth">
									<input type="radio" id="High" name="electricity_usage" value="high" class="custom-control-input" @if(old('electricity_usage') == 'high'){{('checked')}}@endif>
									<label class="custom-control-label" for="High">  High </label>
								</div>
							</div>
							<div class="label-content text-center">
								<p><span>4 to 5+ people</span></p>
								<p><span>4+ bedrooms</span></p>
								<p>Daily washing, heating and cooling regularly. Multiple TVs and appliances.</p>
								<p>Home evenings, weekends and some days.</p>
							</div>
						</li>
					</ul>
					<input type="hidden" id="rfqId" name="rfqId" value="{{old('rfqId')}}">
					@error('rfqId')<span class="text-danger">{{$message}}</span>@enderror
					@error('electricity_usage')<span class="text-danger">{{$message}}</span>@enderror
					@error('understand')<span class="text-danger">{{$message}}</span>@enderror
					<div class="check-area">
						<div class="custom-control custom-checkbox custom-control-mod">
					        <input type="checkbox" class="custom-control-input" name="understand" value="1" id="customControl1" checked>
					        <label class="custom-control-label" for="customControl1"><b> I understand iSelect recommends plans from a range of providers on its</b><span> Approved Product List.</span></label>
					    </div>
					    @error('termsandconsition')<span class="text-danger">{{$message}}</span>@enderror
					    <div class="custom-control custom-checkbox custom-control-mod">
					        <input type="checkbox" class="custom-control-input" name="termsandconsition" value="1" id="customControl2" checked>
					        <label class="custom-control-label" for="customControl2"><b>  I have read, understood and accept the</b><span> Terms and Conditions </span> <b>&</b> <span> Privacy Collection Notice. </span></label>
					    </div>
					    <button type="submit" class="blue-btm top-gap30">Apply Now <span><i class="fas fa-arrow-circle-right"></i></span></button>
					    <!-- <button @guest type="button" data-toggle="modal" data-target="#userInformationModal" @else type="submit" @endguest class="blue-btm top-gap30">Apply Now <span><i class="fas fa-arrow-circle-right"></i></span></button> -->
					</div>
				</div>
	 		</div>

			@guest
		 		<!-- <div class="modal fade" id="userInformationModal" tabindex="-1" role="dialog" aria-labelledby="userInformationLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					    <div class="modal-content">
						    <div class="modal-header">
						        <h5 class="modal-title" id="userInformationLabel">Your Information</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        <span aria-hidden="true">&times;</span>
						        </button>
						    </div>
						    <div class="modal-body">
						    	<div class="form-group">
						    		<label>Your Name</label>
						    		<input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" placeholder="Your name" required maxlength="200" value="{{old('user_name')}}">
						    		@error('user_name')<span class="text-danger">{{$message}}</span>@enderror
						    	</div>
						    	<div class="form-group">
						    		<label>Email</label>
						    		<input type="email" name="user_email" class="form-control @error('user_email') is-invalid @enderror" placeholder="Email id" value="{{old('user_email')}}">
						    		@error('user_email')<span class="text-danger">{{$message}}</span>@enderror
						    	</div>
						    	<div class="form-group">
						    		<label>Phone</label>
						    		<input type="text" name="user_mobile" class="form-control @error('user_mobile') is-invalid @enderror" placeholder="Phone Number" required maxlength="10" onkeypress="return isNumberKey(event);" value="{{old('user_mobile')}}">
						    		@error('user_mobile')<span class="text-danger">{{$message}}</span>@enderror
						    	</div>
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Next</button>
						    </div>
					    </div>
					</div>
				</div> -->
			@endguest
	 	</form>
	</div>
</section>
@section('script')
    <script type="text/javascript">
		var rfqId = '';
		function OCRFILEUPLOAD(thisFiles){
			$('#fileUploadError').text('');
			var ocr_FIle = $('#OCRFormField').val();
			if(ocr_FIle){
				var form = $('#RFqFormSection')[0];
	            var data = new FormData(form);
	            fileUpload(data);
			}
		}

    	function fileUpload(formData)
    	{
    		$('#fileUploadError').text('');$('.loading-data').show();
    		$.ajax({
				url : "{{route('ocr.upload_and_get_data')}}",
				method : "POST",
				dataType : 'JSON',
				processData: false,
				contentType: false,
				cache: false,
				data : formData,
				success:function(response){
					if(response.error == false){
						$('#rfqId').val(response.data.rfqId);
						$('#kwh_usage').val(response.data.kwh_usage);
						$('#kwh_rate').val(response.data.kwh_rate);
						$('#serviceChargedPeriod').val(response.data.serviceChargedPeriod);
						$('#serviceChargedRate').val(response.data.serviceChargedRate);
					}else{
						$('#fileUploadError').text(response.message);
					}
					$('.loading-data').hide();
				},
				error:function(error){
					$('#fileUploadError').text('Something went wrong please try after some time');
					$('.loading-data').hide();
				}
    		});
    	}
    	// @error('user_name')
	    // 	$('#userInformationModal').modal('show');
    	// @enderror
    	// @error('user_email')
	    // 	$('#userInformationModal').modal('show');
    	// @enderror
    	// @error('user_mobile')
	    // 	$('#userInformationModal').modal('show');
    	// @enderror
    </script>
@stop
@endsection