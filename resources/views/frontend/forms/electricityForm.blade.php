@extends('frontend.layouts.master')
@section('title','Electricity Form')
@section('content')

<section class="state_banner">
	<div class="container">
	</div>
</section>

<section class="contact_wraper bac-white">
	<div class="container">
		<div class="electric-head">
			<h2 class="heading text-center"> Your Usage </h2>
			<p class="text-center">To find you a great plan we need to collect some details about you.</p>
		</div>
		<form method="post" action="{{route('company.supplier.form.save',[$data->company->id,$data->company->created_by])}}" enctype="multipart/form-data">
			@csrf
			@error('success')
                <span class="text-success" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <input type="hidden" name="companyId" value="{{$data->company->id}}">
            <input type="hidden" name="supplierId" value="{{$data->company->created_by}}">
            @if(!empty($req->stateId))
	            <input type="hidden" name="stateId" value="{{base64_decode($req->stateId)}}">
	            @error('stateId')
	                <span class="text-danger" role="alert">{{ $message }}</span>
	            @enderror
            @endif
            
            @error('companyId')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
            @error('supplierId')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror

			<div class="energy_select_box block-display elect-form">
				<p>What are you looking to compare? <span class="orange-color">*</span></p>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="custom-control custom-radio autowidth">
						  <input type="radio" id="customRadio1" checked name="eneryType" value="gas_electricity" class="custom-control-input" required>
						  <label class="custom-control-label" for="customRadio1">Gas &amp; Electricity</label>
						</div>
					</div>
					<!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="custom-control custom-radio autowidth electricy-icon">
						  <input type="radio" id="customRadio2" name="eneryType" value="electricity" class="custom-control-input">
						  <label class="custom-control-label" for="customRadio2">Electricity</label>
						</div>
					</div> -->
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="custom-control custom-radio autowidth gas-icon">
						  <input type="radio" id="customRadio3" name="eneryType" value="gas" class="custom-control-input" required>
						  <label class="custom-control-label" for="customRadio3">Gas </label>
						</div>
					</div>
					@error('eneryType')
		                <span class="text-danger" role="alert">{{ $message }}</span>
		            @enderror
				</div>
			</div>

			<div class="light-green border-area elect-form">
				@foreach($data->supplierForm as $key => $form)
					@php $formInput = $form->input_type; @endphp
					<!-- for radio Option -->
					@if($formInput->input_type == 'radio')
						@php $option = $form->form_option; @endphp
						@if(count($option) > 0)
							<div class="energy_select_box block-display back-transparent">
								<p class="black-content"> {{$form->label}} <span class="orange-color">*</span></p>
								<div class="row">
									@foreach($option as $index => $opt)
										<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
											<div class="custom-control custom-radio autowidth">
											  <input type="radio" id="{{$form->key}}" name="{{$form->key}}" class="custom-control-input @error($form->key) is-invalid @enderror" @if($form->is_required){{'required'}}@endif value="{{$opt->option}}" @if(old($form->key) == $opt->option || checkUserOldForm($form->key,$opt->option,$user->formData)){{('checked')}}@endif>
											  <label class="custom-control-label" for="{{$form->key}}">{{$opt->option}}</label>
											</div>
										</div>
									@endforeach
								</div>
						   </div>
						@endif
					@endif
				    @error($form->key)
                        <span class="text-danger" role="alert">{{ $message }}</span>
                    @enderror
				@endforeach
			</div>
			<div class="electricity-details elect-form">
				<div class="what-label">
					<div class="check-area">
						<div class="custom-control custom-checkbox custom-control-mod">
					        <input type="checkbox" name="approve" class="custom-control-input" id="customControl1" required="">
					        <label class="custom-control-label" for="customControl1"><b> I understand iSelect recommends plans from a range of providers on its</b><span> Approved Product List.</span></label>
					    </div>
					    <div class="custom-control custom-checkbox custom-control-mod">
					        <input type="checkbox" name="termsandconsition" class="custom-control-input" id="customControl2" required="">
					        <label class="custom-control-label" for="customControl2"><b>  I have read, understood and accept the</b><span> Terms and Conditions </span> <b>&</b> <span> Privacy Collection Notice. </span></label>
					    </div>
					    @error('approve')
			                <span class="text-danger" role="alert">{{ $message }}</span>
			            @enderror
					    @error('termsandconsition')
			                <span class="text-danger" role="alert">{{ $message }}</span>
			            @enderror
					    <button type="submit" class="blue-btm top-gap30">Apply Now <span><i class="fas fa-arrow-circle-right"></i></span></button>
					</div>
				</div>
	 		</div>
		</form>
	</div>
</section>
@section('script')
    <script type="text/javascript"></script>
@stop
@endsection