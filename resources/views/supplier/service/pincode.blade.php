@extends('layouts.master')
@section('title','Pincode')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">We served at Pincode
                        <a class="headerbuttonforAdd" id="addPincode">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add Pincode
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Landmark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pincode as $key => $pin)
                                    <tr>
                                        <td>{{$pin->state->name}}</td>
                                        <td>{{$pin->pincode}}</td>
                                        <td>{{$pin->landmark}}</td>
                                        <td><a href="javascript:void(0)" class="editState" data-id="{{$pin->id}}" data-state="{{$pin->stateId}}" data-pincode="{{$pin->pincode}}" data-landmark="{{$pin->landmark}}"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0)" class="deletePincode text-danger" data-id="{{$pin->id}}"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Pincode Modal -->
<div class="modal fade" id="addPincodeModal" tabindex="-1" role="dialog" aria-labelledby="addPincodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPincodeModalLabel">Add Pincode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('supplier.service.pincode.saveorupdate')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="form_type" value="add">
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <select name="state" class="form-control @error('state') is-invalid @enderror" required>
                                <option selected="" value="" hidden="">Select State</option>
                                @foreach($states as $key => $state)
                                    <option value="{{$state->id}}" @if(old('state') == $state->id){{('selected')}}@endif>{{$state->name}}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Pincode</label>
                            <input type="text" name="pincode" class="form-control @error('pincode') is-invalid @enderror" required placeholder="Pincode" value="{{old('pincode')}}">
                            @error('pincode')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Landmark</label>
                            <input type="text" name="landmark" class="form-control @error('landmark') is-invalid @enderror" placeholder="Landmark" value="{{old('landmark')}}">
                            @error('landmark')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit State Modal -->
<div class="modal fade" id="editPincodeModal" tabindex="-1" role="dialog" aria-labelledby="editPincodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPincodeModalLabel">Edit Pincode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('supplier.service.pincode.saveorupdate')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="form_type" value="edit">
                        <input type="hidden" name="pincodeId" id="pincodeId" value="{{old('pincodeId')}}">
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <select name="state" id="stateValue" class="form-control @error('state') is-invalid @enderror" required>
                                <option selected="" value="" hidden="">Select State</option>
                                @foreach($states as $key => $state)
                                    <option value="{{$state->id}}" @if(old('state') == $state->id){{('selected')}}@endif>{{$state->name}}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pincode</label>
                            <input type="text" name="pincode" id="pincodeValue" class="form-control @error('pincode') is-invalid @enderror" required placeholder="Pincode" value="{{old('pincode')}}">
                            @error('pincode')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Landmark</label>
                            <input type="text" name="landmark" id="landMarkValue" class="form-control @error('landmark') is-invalid @enderror" placeholder="Landmark" value="{{old('landmark')}}">
                            @error('landmark')
                                <span class="text-danger errorMessage">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable();
        });

        $(document).on('click','#addPincode',function(){
            $('.errorMessage').remove();
            $('#addPincodeModal input[name=pincode]').removeClass('is-invalid');
            $('#addPincodeModal input[name=pincode]').val('');
            $('#addPincodeModal input[name=landmark]').removeClass('is-invalid');
            $('#addPincodeModal input[name=landmark]').val('');
            $('#addPincodeModal select[name=state]').removeClass('is-invalid');
            $('#addPincodeModal select[name=state]').val('');
            $('#addPincodeModal').modal('show');
        });

        @if(old('form_type') == 'add')
            $('#addPincodeModal').modal('show');
        @endif

        @if(old('form_type') == 'edit')
            $('#editPincodeModal').modal('show');
        @endif

        $(document).on('click','.editState',function(){
            var Id = $(this).attr('data-id'),pincode = $(this).attr('data-pincode'),landmark = $(this).attr('data-landmark'),state = $(this).attr('data-state');
            $('.errorMessage').remove();
            $('#editPincodeModal input[name=pincode]').removeClass('is-invalid');
            $('#editPincodeModal #pincodeId').val(Id);
            $('#editPincodeModal #stateValue').val(state);
            $('#editPincodeModal #pincodeValue').val(pincode);
            $('#editPincodeModal #landMarkValue').val(landmark);
            $('#editPincodeModal').modal('show');
        });

        $(document).on('click','.deletePincode',function(){
            var deletePincode = $(this);
            var pincodeId = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Pincode!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route('supplier.service.pincode.delete',"+pincodeId+")}}",
                        data: {pincodeId:pincodeId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deletePincode.closest('tr').remove();
                                swal('Success',"Poof! Pincode has been deleted!", 'success');
                            }else{
                                swal('Error',data.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@stop
@endsection