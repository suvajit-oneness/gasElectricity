@extends('layouts.master')
@section('title','Pincode')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Pincode
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
                                    <th>Pincode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add State Modal -->
<div class="modal fade" id="addPincodeModal" tabindex="-1" role="dialog" aria-labelledby="addPincodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPincodeModalLabel">Add Pincode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="#">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="form_type" value="add">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" required placeholder="State" value="{{old('state')}}">
                            @error('state')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <form method="post" action="#">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="form_type" value="edit">
                        <input type="hidden" name="pincodeId" id="pincodeId" value="{{old('pincodeId')}}">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" id="stateName" class="form-control @error('state') is-invalid @enderror" required placeholder="State" value="{{old('state')}}">
                            @error('state')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            $('#addPincodeModal').modal('show');
        });

        @if(old('form_type') == 'add')
            $('#addPincodeModal').modal('show');
        @endif

        @if(old('form_type') == 'edit')
            $('#editPincodeModal').modal('show');
        @endif

        $(document).on('click','.editState',function(){
            var Id = $(this).attr('data-id');
            $('#editPincodeModal #pincodeId').val(Id);
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
                        url:"{{route(urlPrefix().'.state.delete',"+pincodeId+")}}",
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