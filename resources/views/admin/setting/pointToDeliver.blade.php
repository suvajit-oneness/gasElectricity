@extends('layouts.master')
@section('title','Point Setting')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Point Setting</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.points.update',$master->id)}}">
                        @csrf
						<div class="row">
							<input type="hidden" name="masterId" value="{{$master->id}}">
							@error('masterId')<span class="text-danger"><strong>{{ $message }}</strong></span>@enderror
							<div class="form-group col-md-4">
	                            <label for="point_equals" class="col-form-label">1 Point is Equal to $</label>
	                            <input type="text" name="point_equals" class="form-control @error('point_equals') is-invalid @enderror" placeholder="1 Point is Equal to $" value="{{(old('point_equals') ? old('point_equals') : $master->onepoint_equals)}}">
	                            @error('point_equals')<span class="text-danger"><strong>{{ $message }}</strong></span>@enderror
	                        </div>

							<div class="form-group col-md-4">
	                            <label for="referral_bonus" class="col-form-label">Referral Bonus In Point</label>
	                            <input type="text" name="referral_bonus" class="form-control @error('referral_bonus') is-invalid @enderror" placeholder="Referral Bonus In Point" value="{{(old('referral_bonus') ? old('referral_bonus') : $master->referral_bonus)}}">
	                            @error('referral_bonus')<span class="text-danger"><strong>{{ $message }}</strong></span>@enderror
	                        </div>

	                        <div class="form-group col-md-4">
	                            <label for="joining_bonus" class="col-form-label">Joining Bonus In Point</label>
	                            <input type="text" name="joining_bonus" class="form-control @error('joining_bonus') is-invalid @enderror" placeholder="Joining Bonus" value="{{(old('joining_bonus') ? old('joining_bonus') : $master->joining_bonus)}}">
	                            @error('joining_bonus')<span class="text-danger"><strong>{{ $message }}</strong></span>@enderror
	                        </div>
						</div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
	<script>
		
	</script>
@stop
@endsection