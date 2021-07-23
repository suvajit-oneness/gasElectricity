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
                    <form method="POST" action="{{route('supplier.setting.form.add')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Form Input Type</label>
                                <select class="form-control col-md-6 @error('formInputId'){{('is-invalid')}}@enderror" id="selectInputType" name="formInputId">
                                    <option value="">Select Input Type</option>
                                    <option value="2">Radio</option>
                                    <!-- @foreach($formInput as $input)
                                        <option value="{{$input->id}}" @if(old('formInputId') == $input->id){{('selected')}}@endif>{{$input->input_type}}</option>
                                    @endforeach -->
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
                                <!-- <th>Key</th> -->
                                <th>Heading</th>
                                <th>Placeholder</th>
                                <th>Options</th>
                                <!-- <th>Required</th> -->
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $d)
                                <tr id="tableDataTr_{{$d->id}}">
                                    <?php $inputType = $d->input_type;?>
                                    <td>{{$inputType->input_type}}</td>
                                    <!-- <td>{{$d->key}}</td> -->
                                    <td>{{$d->label}}</td>
                                    <td>{{($d->placeholder != '' ? $d->placeholder : 'N/A')}}</td>
                                    <td>
                                        @if(formInputTypeCheck($inputType->input_type))
                                            <?php $formOption = $d->form_option; ?>
                                            <a class="optionView" href="javascript:void(0)" data-details="{{json_encode($d)}}">View</a>
                                        @endif
                                    </td>
                                    <!-- <td>
                                        <input type="checkbox" data-id="{{$d->id}}" class="form-control isRequired" @if($d->is_required == 1){{('checked')}}@endif>
                                    </td> -->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Options</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('supplier.setting.form.option.save')}}">
                @csrf
                <div class="modal-body">
                    <table class="table" style="width: 100% !important;" id="MyTable">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).on('click','.isRequired',function(){
        var thisClicked = $(this);
        var id = thisClicked.attr('data-id');
        updateCheckBoxButton(id,'is_required',thisClicked);
    });

    $(document).on('click','.statusUpdate',function(){
        var thisClicked = $(this);
        var id = thisClicked.attr('data-id');
        updateCheckBoxButton(id,'status',thisClicked);
    });

    function updateCheckBoxButton(supplierFormId,whatToDo,clickEvent) {
        $('.loading-data').show();
        $.ajax({
            url : "{{route('supplier.setting.form.updatecheckbox')}}",
            type: 'POST',
            dataType : 'JSON',
            data : {supplierFormId:supplierFormId,whatToDo:whatToDo,_token:'{{csrf_token()}}'},
            success:function(response){
                if(response.error == false){}
                else{
                    if(clickEvent.prop('checked')){
                        clickEvent.prop('checked',false);
                    }else{
                        clickEvent.prop('checked',true);
                    }
                    swal('Error',response.message, 'error');
                }
                $('.loading-data').hide();
            }
        });
    }

    $(document).on('click','.optionView',function(){
        var details = JSON.parse($(this).attr('data-details'));
        var toAppendData = '<tr><td><input type="hidden" name="formSupplierId" value="'+details.id+'"></td><td></td></tr>';
        if(details.form_option.length > 0){
            var counter = 0;
            $.each(details.form_option, function( index, value ) {
                counter++;
                toAppendData += '<tr><td>'+value.option+'</td>';
                if(counter == details.form_option.length){
                    toAppendData += '<td><a href="javascript:void(0)" class="actionbtn addOption" data-id="'+value.id+'" data-form_id="'+value.supplierFormId+'">+</a></td>';
                }else{
                    toAppendData += '<td><a href="javascript:void(0)" class="actionbtn removeOption" data-id="'+value.id+'" data-form_id="'+value.supplierFormId+'">&#10006;</a></td>';
                }
                toAppendData += '</tr>';
            });
        }else{
            toAppendData += '<tr><td><input type="text" name="option[]" placeholder="Enter Option" required></td><td><a href="javascript:void(0)" class="actionbtn addOption">+</a></td></tr>';
        }
        $('#tableBody').empty().append(toAppendData);
        console.log(details);
        $('#exampleModal').modal('show');
    });

    $(document).on('click','.addOption',function(){
        $('.actionbtn').removeClass('addOption').addClass('removeOption');
        $('.removeOption').empty().append('<span class="text-danger">&#10006;</span>');
        var toAppendData = '<tr><td><input type="text" name="option[]" placeholder="Enter Option" required></td><td><a href="javascript:void(0)" class="actionbtn addOption">+</a></td></tr>';
        $('#MyTable tr:last').after(toAppendData);
    });

    $(document).on('click','.removeOption',function(){
        var clickEvent = $(this);
        var id = clickEvent.attr('data-id');
        var formId = clickEvent.attr('data-form_id');
        if(id != undefined || formId != undefined){
            $('.loading-data').show();
            $.ajax({
                url : "{{route('supplier.setting.form.option.remove')}}",
                type: 'POST',
                dataType : 'JSON',
                data : {formOptionId:id,formId:formId,_token:'{{csrf_token()}}'},
                success:function(response){
                    if(response.error == false){
                        clickEvent.closest('tr').remove();
                    }
                    else{
                        swal('Error',response.message, 'error');
                    }
                    $('.loading-data').hide();
                }
            });
        }else{
            clickEvent.closest('tr').remove();
        }
    });
</script>
@endsection