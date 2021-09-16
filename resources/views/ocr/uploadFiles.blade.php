@extends('frontend.layouts.master')
@section('title','OCR File Upload')
@section('content')
	<section class="page_banner">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="heading text-white pb-0 mb-0 text-center">Upload your bills</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="blog_wrapper">
		<div class="container">
			<div class="row flex-row-reverse">
				<div class="col-12 col-lg-3 col-md-12">
					<form method="post" action="{{route('ocr.uploadfiles')}}" enctype="multipart/form-data">
						@csrf
						<input type="file" name="file" class="form-control">
						<input type="submit" name="">
					</form>
				</div>
			</div>
		</div>
	</section>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection