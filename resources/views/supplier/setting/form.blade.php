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
                    <table class="table" style="width: 100% !important;">
                        <form method="POST" action="{{route('supplier.setting.form.update')}}">
                            @csrf
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th>Required</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($forms as $form)
                            @php
                                $id = $form->supplierFormData->id;
                                $req = $form->supplierFormData->is_required ;
                                $status = $form->supplierFormData->status ;
                            @endphp
                            <input type="hidden" name="formId[]" value="{{$id}}">

                            <tr>
                                <td>{{$form->form_label}}</td>
                                <td>
                                    <input type="checkbox" class="form-check-input" {{($req == 1)? 'checked' : ''}}>
                                    <input type="hidden" name="{{$id}}_req[]" class="hiddenvalue" value="{{$req}}">
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input" {{($status == 1)? 'checked' : ''}}>
                                    <input type="hidden" name="{{$id}}_status[]" class="hiddenvalue" value="{{$status}}">
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th>N/A</th>
                                <th>N/A</th>
                                <th>N/A</th>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><button type="submit" class="btn btn-primary">Update Form</button></td>
                            </tr>
                        </tfoot>
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).on('click','.form-check-input',function(){
        var thisCheckbox = $(this);
        var inputValue = 0;
        if (thisCheckbox.prop('checked')==true){
            inputValue = 1;
        }
        thisCheckbox.closest('td').find('.hiddenvalue').val(inputValue);
    });
</script>
@endsection