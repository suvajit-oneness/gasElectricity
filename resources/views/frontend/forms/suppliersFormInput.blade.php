@extends('frontend.layouts.master')
@section('title','Electricity Form')
@section('content')


<section class="inner_banner_form">
	<div class="container">
		<div class="row m-0">
			<div class="page_title">
				<h1 data-aos="fade-down" data-aos-duration="1000">Your <small class="position-relative">Usage<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
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
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
					<form method="post" action="{{route('company.supplier.form.save')}}" enctype="multipart/form-data">
                        <div class="sw_form">
                            @csrf
                            @error('success')
                                <span class="text-success" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <input type="hidden" name="productId" value="{{$product->id}}">
                            <input type="hidden" name="companyId" value="{{$data->company->id}}">
                            <input type="hidden" name="supplierId" value="{{$data->company->created_by}}">
                            <input type="hidden" name="rfqId" value="{{$rfq->id}}">
                            @error('productId')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            @error('companyId')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            @error('supplierId')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            @error('rfqId')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            @foreach($data->supplierForm as $key => $form)
                                @php $formInput = $form->input_type; @endphp
                                <div class="row m-0 mb-3 mb-lg-4 pb-3 pb-lg-4 border-bottom">
                                    <h6 for="{{$form->key}}">{{$form->label}}</h6>
                                    @if($formInput->input_type == 'text' || $formInput->input_type == 'email' || $formInput->input_type == 'url')
                                    {{-- full-name --}}

                                        @php
                                            $value = '';
                                            if ($form->key == "name" && Auth::user()) {
                                                $value = Auth::user()->name;
                                            }
                                            if ($form->key == "email" && Auth::user()) {
                                                $value = Auth::user()->email;
                                            }
                                        @endphp

                                        <input type="{{$formInput->input_type}}" class="form-control @error($form->key) is-invalid @enderror" id="{{$form->key}}" name="{{$form->key}}" placeholder="{{$form->placeholder}}" value="{{$value}}" @if($form->is_required){{'required'}}@endif maxlength="200">
                                        {{-- <input type="{{$formInput->input_type}}" class="form-control @error($form->key) is-invalid @enderror" id="{{$form->key}}" name="{{$form->key}}" placeholder="{{$form->placeholder}}" {{$test}} value="{{old($form->key)}}" @if($form->is_required){{'required'}}@endif maxlength="200"> --}}
                                    @elseif($formInput->input_type == 'radio')
                                        @php $option = $form->form_option; @endphp
                                        @if(count($option) > 0)
                                            <div class="d-flex">
                                                @foreach($option as $index => $opt)
                                                {{-- gender --}}
                                                <label class="me-2">
                                                    <input type="radio" class="form-check-input" name="{{$form->key}}" @if($form->is_required){{'required'}}@endif value="{{$opt->option}}" class="@error($form->key) is-invalid @enderror" @if(old($form->key) == $opt->option){{('checked')}}@endif>
                                                    {{$opt->option}}
                                                </label>
                                                @endforeach
                                             </div>
                                        @endif
                                    @elseif($formInput->input_type == 'checkbox')
                                        @php $option = $form->form_option; @endphp
                                        @if(count($option) > 0)
                                            <div class="d-flex">
                                                @foreach($option as $index => $opt)
                                                {{-- interest --}}
                                                <label class="me-2">
                                                    <input type="checkbox" class="form-check-input" name="{{$form->key}}[]" value="{{$opt->option}}" class="@error($form->key) is-invalid @enderror" @if(old($form->key) && in_array($opt->option, old($form->key))){{('checked')}}@endif>{{$opt->option}}
                                                </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    @elseif($formInput->input_type == 'file')
                                    @elseif($formInput->input_type == 'textarea')
                                    {{-- address --}}
                                        <textarea name="{{$form->key}}" @if($form->is_required){{'required'}}@endif class="form-control" placeholder="{{$form->placeholder}}">{{old($form->key)}}</textarea>
                                    @endif
                                    @error($form->key)
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                            <div class="form-group">
                                @error('submit')
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn log_next btn-sm d-block" onclick="userTrack('finalStageUserDetails')">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="container dashboard-content d-none">
    <div class="row justify-content-center align-content-center m-0">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 mt-5 mb-5">
            <div class="card border-0 shadow-sm bg-light pl-3 pt-2">
                <div class="card-header bg-transparent border-0 pl-0">
                    <h5 class="mb-0">Please share the following details</h5>
                </div>
                @if ($errors->any())
                     @foreach ($errors->all() as $error)
                         <div>{{$error}}</div>
                     @endforeach
                 @endif
                <div class="card-body pl-0 suplier_form">
                    <form method="post" action="{{route('company.supplier.form.save')}}" enctype="multipart/form-data">
                        @csrf
                        @error('success')
                            <span class="text-success" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                        <input type="hidden" name="productId" value="{{$product->id}}">
                        <input type="hidden" name="companyId" value="{{$data->company->id}}">
                        <input type="hidden" name="supplierId" value="{{$data->company->created_by}}">
                        <input type="hidden" name="rfqId" value="{{$rfq->id}}">
                        @error('productId')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                        @error('companyId')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                        @error('supplierId')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                        @error('rfqId')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                        @foreach($data->supplierForm as $key => $form)
	                        @php $formInput = $form->input_type; @endphp
	                        <div class="form-group col-md-12 pl-0 radio_btn">
	                            <label for="{{$form->key}}" class="col-form-label">{{$form->label}}:</label>
		                        @if($formInput->input_type == 'text' || $formInput->input_type == 'email' || $formInput->input_type == 'url')
	                                <input type="{{$formInput->input_type}}" class="form-control @error($form->key) is-invalid @enderror" id="{{$form->key}}" name="{{$form->key}}" placeholder="{{$form->placeholder}}" value="{{old($form->key)}}" @if($form->is_required){{'required'}}@endif maxlength="200">
		                        @elseif($formInput->input_type == 'radio')
			                        @php $option = $form->form_option; @endphp
			                        @if(count($option) > 0)
			                        	@foreach($option as $index => $opt)
				                        	<input type="radio" name="{{$form->key}}" @if($form->is_required){{'required'}}@endif value="{{$opt->option}}" class="@error($form->key) is-invalid @enderror" @if(old($form->key) == $opt->option){{('checked')}}@endif>{{$opt->option}}
			                        	@endforeach
			                        @endif
		                        @elseif($formInput->input_type == 'checkbox')
			                        @php $option = $form->form_option; @endphp
			                        @if(count($option) > 0)
			                        	@foreach($option as $index => $opt)
				                        	<input type="checkbox" name="{{$form->key}}[]" value="{{$opt->option}}" class="@error($form->key) is-invalid @enderror" @if(old($form->key) && in_array($opt->option, old($form->key))){{('checked')}}@endif>{{$opt->option}}
			                        	@endforeach
			                        @endif
		                        @elseif($formInput->input_type == 'file')
		                        @elseif($formInput->input_type == 'textarea')
			                        <textarea name="{{$form->key}}" @if($form->is_required){{'required'}}@endif class="form-control" placeholder="{{$form->placeholder}}">{{old($form->key)}}</textarea>
		                        @endif
		                        @error($form->key)
                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
	                        </div>
                        @endforeach
                        <div class="form-group">
                        	@error('submit')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end_inner_banner-->

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection
