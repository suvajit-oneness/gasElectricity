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
						<div class="row m-0 justify-content-center">
						<div class="col-12 col-lg-10">
							<ul>
								<li class="active"><a href="">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href="">4</a></li>
							</ul>
						</div>
						</div>
						<div class="sw_form">
						<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
							<h6>Choose a service</h6>
							@foreach($requestedData as $key => $value)
								<input type="hidden" name="otherPageRequest[{{$key}}]" value="{{$value}}">
							@endforeach
							<div class="col-12 col-lg-4 p-0">
								<div class="form-check ct_select">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" id="customRadio1" name="energy_type"
                                value="gas_electricity" @if(old('energy_type')=='gas_electricity'
                                ){{('checked')}}@endif>
										Gas & Electricity
									</label>
								</div>
							</div>
							<div class="col-12 col-lg-4 p-0">
								<div class="form-check ct_select">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" id="customRadio2" name="energy_type"
                                value="electricity" @if(old('energy_type')=='electricity'
                                ){{('checked')}}@elseif(!old('energy_type')){{('checked')}}@endif>
										Electricity
									</label>
								</div>
							</div>
							<div class="col-6 col-lg-4 p-0">
								<div class="form-check ct_select">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" id="customRadio3" class="custom-control-input" name="energy_type"
                                value="gas" @if(old('energy_type')=='gas' ){{('checked')}}@endif>
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
										<input class="form-check-input" type="radio" id="myhome" name="type_of_property" value="home"
                                    class="custom-control-input" @if(old('type_of_property')=='home'
                                    ){{('checked')}}@elseif(!old('type_of_property')){{('checked')}}@endif>
										My home
									</label>
								</div>
							</div>
							<div class="col-12 col-lg-4 p-0">
								<div class="form-check ct_select">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" id="mybusness" name="type_of_property" value="business"
                                    class="custom-control-input" @if(old('type_of_property')=='business'
                                    ){{('checked')}}@endif>
										My business
									</label>
								</div>
							</div>
						</div>
						 @error('type_of_property')<span class="text-danger">{{$message}}</span>@enderror
						<div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
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
							<h6> What is your move in date? * <span class="text-danger">*</span></h6>
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
						</div>
						</div>
						<div class="mt-3">
						<button class="btn log_next btn-sm d-block">Continue to next</button>
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