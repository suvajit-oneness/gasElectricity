@extends('layouts.master')
@section('title','Form')
@section('content')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Supplier Form Setting</h5>
                </div>
                <div class="card-body">
                    <h3>Add New Form Data</h3>
                    <form method="POST" action="{{route('supplier.setting.form.update')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Form Input Type</label>
                                <select class="form-control col-md-6 @error('formInputId'){{('is-invalid')}}@enderror" id="selectInputType" name="formInputId">
                                    <option value="">Select Input Type</option>
                                    @foreach($formInput as $input)
                                        <option value="{{$input->id}}" @if(old('formInputId') == $input->id){{('selected')}}@endif>{{$input->input_type}}</option>
                                    @endforeach
                                </select>
                                @error('formInputId')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Label:</label>
                                <input type="text" name="label" class="form-control @error('label'){{('is-invalid')}}@enderror" placeholder="Enter label" value="{{old('label')}}">
                                @error('label')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Placeholder:</label>
                                <input type="text" name="placeholder" class="form-control @error('placeholder'){{('is-invalid')}}@enderror" placeholder="Enter Placeholder" value="{{old('placeholder')}}">
                                @error('placeholder')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <input type="submit" name="" class="btn btn-primary">
                    </form>
                    <hr>
                    <h3>Your Form Setting </h3>
                    <table class="table" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>Input Type</th>
                                <th>Key</th>
                                <th>Label</th>
                                <th>Placeholder</th>
                                <th>Options</th>
                                <th>Required</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $d)
                                <tr>
                                    <td>{{$d->input_type->input_type}}</td>
                                    <td>{{$d->key}}</td>
                                    <td>{{$d->label}}</td>
                                    <td>{{$d->placeholder}}</td>
                                    <td></td>
                                    <td>
                                        <input type="checkbox" data-id="{{$d->id}}" class="form-control isRequired" @if($d->is_required == 1){{('checked')}}@endif>
                                    </td>
                                    <td>
                                        <input type="checkbox" data-id="{{$d->id}}" class="form-control statusUpdate" @if($d->status == 1){{('checked')}}@endif>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

</script>
@endsection