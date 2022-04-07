@extends('frontend.layouts.master')
@section('title','RFQ')
@section('content')

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
<!--end_inner_banner-->

<section class="form_section">
	<div class="container">
		<div class="row m-0 justify-content-center">
			<div class="col-12 col-lg-7 p-0">
				<div class="card border-0">
					<form method="post" action="{{route('elecricity.form.rfq.save')}}" enctype="multipart/form-data" id="RFqFormSection">
						@csrf
							{{-- <div class="row m-0 justify-content-center">
							<div class="col-12 col-lg-10">
								<ul>
									<li class="active"><a href="">1</a></li>
									<li><a href="">2</a></li>
									<li><a href="">3</a></li>
									<li><a href="">4</a></li>
								</ul>
							</div>
							</div> --}}
							<div class="sw_form">
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6>Choose a service</h6>
									@foreach($requestedData as $key => $value)
										<input type="hidden" name="otherPageRequest[{{$key}}]" value="{{$value}}">
									@endforeach
									<div class="col-12 col-lg-4 p-0 position-relative">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" id="customRadio1" name="energy_type" value="gas_electricity" @if(old('energy_type') == 'gas_electricity'){{('checked')}}@endif>
												Gas & Electricity
											</label>
										</div>
									</div>
									<div class="col-12 col-lg-4 p-0 position-relative">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="energy_type" id="customRadio2"  value="electricity" @if(old('energy_type') == 'electricity'){{('checked')}}@elseif(!old('energy_type')){{('checked')}}@endif>
												Electricity
											</label>
										</div>
									</div>
									<div class="col-6 col-lg-4 p-0 position-relative">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" id="customRadio3" class="custom-control-input" name="energy_type" value="gas" @if(old('energy_type') == 'gas'){{('checked')}}@endif>
												Gas
											</label>
										</div>
									</div>
								</div>
								@error('energy_type')<span class="text-danger">{{$message}}</span>@enderror
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6> What type of property? <span class="text-danger">*</span></h6>
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" id="myhome" name="type_of_property" value="home" @if(old('type_of_property') == 'home'){{('checked')}}@elseif(!old('type_of_property')){{('checked')}}@endif>
												My home
											</label>
										</div>
									</div>
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" id="mybusness" name="type_of_property" value="business" @if(old('type_of_property') == 'business'){{('checked')}}@endif>
												My business
											</label>
										</div>
									</div>
								</div>
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6 class="mb-3"> Do you own or rent the property? <span class="text-danger">*</span></h6>
									<div class="col-12 col-lg-8">
										<label class="form-check-label mb-3">
											Do you have your Elecricity / Gas Bill ?
										</label>
										<input class="form-control" type="file" name="file" id="OCRFormField" class="form-control @error('OCRFormField'){{('is_invalid')}}@enderror" onchange="OCRFILEUPLOAD(event)">
										@error('OCRFormField')<span class="invalid-feedback" style="position: initial;">{{$message}}</span>@enderror
									</div>
									<div class="col-12 position-relative">
										<h2 style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, 15%);background: #fff;padding: 0px 30px;font-weight: 600;">OR</h2>
									</div>
								</div>
								<div class="row m-0 mb-3 mb-lg-6 pb-3 pb-lg-4 border-bottom">
									<h6 class="mb-3"> Energy usage details  <span class="text-danger">*</span></h6>
									<div class="col-12 col-lg-6 position-relative">
										<label class="form-check-label mb-3">
											kWh usage
										</label>
										<input type="text"  id="kwh_usage" name="kwh_usage" placeholder="kWh usage" class="form-control @error('kwh_usage'){{('is_invalid')}}@enderror" value="{{(old('kwh_usage'))}}">
										@error('kwh_usage')<span class="invalid-feedback">{{$message}}</span>@enderror
									</div>
									<div class="col-12 col-lg-6 position-relative">
										<label class="form-check-label mb-3">
											kWh rate
										</label>
										<input type="text" id="kwh_rate" name="kwh_rate" placeholder="kWh rate" class="form-control @error('kwh_rate'){{('is_invalid')}}@enderror" value="{{(old('kwh_rate'))}}">
										@error('kwh_rate')<span class="invalid-feedback">{{$message}}</span>@enderror
									</div>
									<div class="col-12 col-lg-6 position-relative">
										<label class="form-check-label mb-3">
											Service charged period
										</label>
										<input type="text" id="serviceChargedPeriod" name="serviceChargedPeriod" placeholder="Service charged period" class="form-control @error('serviceChargedPeriod'){{('is_invalid')}}@enderror" value="{{(old('serviceChargedPeriod'))}}">
										@error('serviceChargedPeriod')<span class="invalid-feedback">{{$message}}</span>@enderror
									</div>
									<div class="col-12 col-lg-6 position-relative">
										<label class="form-check-label mb-3">
											Service charged rate
										</label>
										<input type="text" id="serviceChargedRate" name="serviceChargedRate" placeholder="Service charged rate" class="form-control @error('serviceChargedRate'){{('is_invalid')}}@enderror" value="{{(old('serviceChargedRate'))}}">
										@error('serviceChargedRate')<span class="invalid-feedback">{{$message}}</span>@enderror
									</div>
								</div>
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6>What level best describes your typical electricity usage?</h6>
									@foreach($requestedData as $key => $value)
										<input type="hidden" name="otherPageRequest[{{$key}}]" value="{{$value}}">
									@endforeach
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="electricity_usage" value="low"  @if(old('electricity_usage') == 'low'){{('checked')}}@endif>
												Low
											</label>
										</div>
									</div>
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" id="Medium" name="electricity_usage" value="medium" @if(old('electricity_usage') == 'medium'){{('checked')}}@elseif(!old('electricity_usage')){{('checked')}}@endif>
												Medium
											</label>
										</div>
									</div>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio"  id="High" name="electricity_usage" value="high" @if(old('electricity_usage') == 'high'){{('checked')}}@endif>
												High
											</label>
										</div>
									</div>
								</div>
								@error('type_of_property')<span class="invalid-feedback">{{$message}}</span>@enderror
								<!--<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6> Do you own or rent the property? <span class="text-danger">*</span></h6>
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch6">
												Gas & Electricity
											</label>
										</div>
									</div>
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch7">
												Electricity
											</label>
										</div>
									</div>
								</div>
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6> Are you moving into this property? <span class="text-danger">*</span></h6>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch8">
												Yes
											</label>
										</div>
									</div>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch9">
												No
											</label>
										</div>
									</div>
								</div>
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6> What is your move in date?  <span class="text-danger">*</span></h6>
									<div class="col-6 col-lg-4 p-0">
										
									</div>
								</div>
								<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
									<h6> Do you also need to connect a broadband or home 
										entertainment service? <span class="text-danger">*</span></h6>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch12">
												Yes
											</label>
										</div>
									</div>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch13">
												No
											</label>
										</div>
									</div>
								</div>
								<div class="row m-0">
									<h6> Do you have gas connection to the property? <span class="text-danger">*</span></h6>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch11">
												Yes
											</label>
										</div>
									</div>
									<div class="col-6 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch12">
												No
											</label>
										</div>
									</div>
									<div class="col-12 col-lg-4 p-0">
										<div class="form-check ct_select">
											<label class="form-check-label">
												<input class="form-check-input" type="radio" name="flexRadioDefault" id="ch13">
												Do’nt know
											</label>
										</div>
									</div>
								</div>-->
								<input type="hidden" id="rfqId" name="rfqId" value="{{old('rfqId')}}">
								@error('rfqId')<span class="invalid-feedback">{{$message}}</span>@enderror
								@error('electricity_usage')<span class="invalid-feedback">{{$message}}</span>@enderror
								<div class="row m-0 position-relative">
									<div class="form-check ct_select col-12">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="understand" value="1" id="customControl1" checked>
											I understand SwitchR recommends plans from a range of providers on its <a href="">Approved Product List</a>.
										</label>
									</div>
									<div class="form-check ct_select col-12">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="termsandconsition" value="1" id="customControl2" checked>
											I have read, understood and accept the <a href="">Terms and Conditions</a> & <a href="">Privacy Collection Notice</a>.
										</label>
									</div>
								@error('understand')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            	@enderror
							</div>
							</div>
							
						<div class="mt-3">
							<button type="submit" class="btn log_next btn-sm d-block">Continue to next</button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
    		$('#fileUploadError').text('');
    		$.ajax({
				url : "{{route('ocr.upload_and_get_data')}}",
				method : "POST",
				dataType : 'JSON',
				processData: false,
				contentType: false,
				cache: false,
				data : formData,
				beforeSend: function() {
					$loadingSwal = Swal.fire({
						title: 'Please wait...',
						text: 'We are fetching your details!',
						showConfirmButton: false,
						allowOutsideClick: false
						// timer: 1500
					})
				},
				success:function(response){
					if(response.error == false){
						$('#rfqId').val(response.data.rfqId);
						$('#kwh_usage').val(response.data.kwh_usage);
						$('#kwh_rate').val(response.data.kwh_rate);
						$('#serviceChargedPeriod').val(response.data.serviceChargedPeriod);
						$('#serviceChargedRate').val(response.data.serviceChargedRate);

						$loadingSwal.close()
						$successSwal = Swal.fire({
							icon: 'success',
							text: 'Details found!',
							showConfirmButton: false,
							timer: 1000
						})
					} else {
						$('#fileUploadError').text(response.message);

						$loadingSwal.close()
						$successSwal = Swal.fire({
							icon: 'warning',
							text: response.message,
							// showConfirmButton: false,
							confirmButtonText: "Okay",
							timer: 2000
						})
					}
				},
				error:function(error){
					$('#fileUploadError').text('Something went wrong please try after some time');
					console.log(error)
					$loadingSwal.close()
					$errorSwal = Swal.fire({
						icon: 'error',
						title: 'Something Happened',
						text: 'Try again!',
					})
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