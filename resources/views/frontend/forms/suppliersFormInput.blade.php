@extends('frontend.layouts.master')
@section('title','Electricity Form')
@section('content')

<div class="container dashboard-content">
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

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection
