
@extends('frontend.layouts.master')
@section('title','About Us')
@section('content')
<section class="inner_banner_about">
<div class="container">
	<div class="row m-0">
		<div class="page_title">
			<h1 data-aos="fade-down" data-aos-duration="1000">{{$data->aboutus->heading}} <small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
		</div>
	</div>
</div>
</section>
<!--end_inner_banner-->

<section class="py-4 py-lg-5 about_body">
<div class="container-fluid overflow-hidden">
	<div class="row m-0 align-items-center">
		<div class="col-12 col-lg-6 p-lg-4">
			<div class="page_title p-4 p-lg-4">
				<h3 data-aos="fade-down" data-aos-duration="1000">{!! $data->aboutus->title !!}<small class="position-relative"><div class="border_text" data-aos="fade-left" data-aos-duration="1400"></div></small></h3>
				<p data-aos="fade-up" data-aos-duration="1300">
					<b class="d-block mb-2"></b>{!! $data->aboutus->description !!}
				</p>
				{{-- <p class="py-2" data-aos="fade-up" data-aos-duration="1500"><b>That’s why SwitchR exists!</b></p>
				<p data-aos="fade-up" data-aos-duration="1700">
					At SwitchR, we make it easy for you to find the best energy deal around. By working with Australia’s leading energy providers, we can quickly tell you how much you could, and should, be paying for your gas and electricity.All you need to do is upload your energy bill and we’ll do the rest! Our system is designed to identify your energy usage and match it to the best provider and lowest energy plan available in your area.
				</p>
				<p data-aos="fade-up" data-aos-duration="1900">
					Discover how much you could save on your energy bills with SwitchR today!
				</p> --}}
			</div>
		</div>
		<div class="col-12 col-lg-6 p-0 pt-lg-5 p-0" data-aos="fade-left" data-aos-duration="1900">
			<img src="{{asset($data->aboutus->image)}}" class="w-100">
		</div>
	</div>
</div>
</section>

<section class="py-4 py-lg-5 why_choose">
<div class="container">
	<div class="row m-0">
		<div class="page_title">
			<h1 data-aos="fade-down" data-aos-duration="1000">Why  <small class="position-relative">Choose Us<div class="border_text" data-aos="fade-left" data-aos-duration="1800"></div></small></h1>
			<p class="w-50 m-auto text-center mt-3" data-aos="fade-up" data-aos-duration="1400">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
		</div>
	</div>
	<div class="row m-0 mt-4 mt-lg-5 why_card">
		@foreach($data->whychooseus as $key=> $choose)
			<div class="col-12 col-lg-3 mb-3 mb-lg-0 plr-3">
				<div class="card border-0">
					<img src="{{asset($choose->image)}}">
					<h6>{!! $choose->title !!}</h6>
					<p>
						{!! $choose->description !!}
					</p>
				</div>
			</div>
		@endforeach
	</div>
</div>
</section>

		@section('script')
    <script type="text/javascript">
    	var whyChooseUsHeading = 'Why Choose Us';
    	@foreach($data->whychooseus as $key => $choose)
        	whyChooseUsHeading = '{{$choose->heading}}';
    		$('.whyChooseUsHeading').text(whyChooseUsHeading);
    		@break
    	@endforeach
    </script>
@stop
@endsection

