@extends('layouts.master')
@section('title','State')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">States
                        <a class="headerbuttonforAdd" id="addState">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add State
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($state as $st)
                                    <tr>
                                        <td>{{$st->country->name}}</td>
                                        <td>{{$st->name}}</td>
                                        <td><a href="javascript:void(0)" class="text-success editState" data-id="{{$st->id}}" data-name="{{$st->name}}" data-country="{{$st->countryId}}">Edit</a> | <a href="javascript:void(0)" class="text-danger deleteState" data-id="{{$st->id}}">Delete</a></td>
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

<!-- Add State Modal -->
<div class="modal fade" id="addStateModal" tabindex="-1" role="dialog" aria-labelledby="addStateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStateModalLabel">Add State</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route(urlPrefix().'.state.save')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="form_type" value="add">
                        <div class="form-group col-md-3">
                            <label>Country</label>
                            <select name="country" class="form-control @error('country') is-invalid @enderror" required>
                                <option value="2">Australia</option>
                            </select>
                            @error('country')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
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
<div class="modal fade" id="editStateModal" tabindex="-1" role="dialog" aria-labelledby="editStateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStateModalLabel">Edit State</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route(urlPrefix().'.state.update')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="form_type" value="edit">
                        <input type="hidden" name="stateId" id="stateId" value="0">
                        <div class="form-group col-md-3">
                            <label>Country</label>
                            <select name="country" id="countryId" class="form-control @error('country') is-invalid @enderror" required>
                                <option value="2">Australia</option>
                            </select>
                            @error('country')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
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

        $(document).on('click','#addState',function(){
            $('#addStateModal').modal('show');
        });

        @if(old('form_type') == 'add')
            $('#addStateModal').modal('show');
        @endif

        @if(old('form_type') == 'edit')
            $('#editStateModal').modal('show');
        @endif

        $(document).on('click','.editState',function(){
            var Id = $(this).attr('data-id');
            var countryId = $(this).attr('data-country');
            var state = $(this).attr('data-name');

            console.log(Id);
            console.log(countryId);
            console.log(state);

            $('#editStateModal #stateId').val(Id);
            $('#editStateModal #stateName').val(state);
            $('#editStateModal').modal('show');
        });

        $(document).on('click','.deleteState',function(){
            var deleteState = $(this);
            var stateId = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this State!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type:'POST',
                        dataType:'JSON',
                        url:"{{route(urlPrefix().'.state.delete',"+stateId+")}}",
                        data: {stateId:stateId,'_token': $('input[name=_token]').val()},
                        success:function(data){
                            if(data.error == false){
                                deleteState.closest('tr').remove();
                                swal('Success',"Poof! State has been deleted!", 'success');
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
