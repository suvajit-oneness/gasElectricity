@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')
	
<section class="contact_sec">
	<div class="container">
		<div class="row m-0">
			<div class="col-12 col-lg-7 address_text">
				<div class="page_title">
					<h1 data-aos="fade-down" data-aos-duration="1000" class="text-start">
						Let's chat. <br/>Tell me about. 
						<small class="position-relative">your thought
							<div class="border_text" data-aos="fade-left" data-aos-duration="1400"></div>
						</small>
					</h1>
					<h6 data-aos="fade-up" data-aos-duration="1400">Let's create something together <img src="{{asset('forntEnd/img/moj.png')}}" class="ms-2"></h6>
					<ul class="address_sec">
						<li><i class="fa-solid fa-location-dot"></i> {{$contact->address}}</li>
						<li><i class="fa-solid fa-phone"></i><a class="text-dark" href="tel:+88 657524332">{{$contact->phone}}</a></li>
						<li>
							<div class="d-lg-flex justify-content-between align-items-center">
								<div><i class="fa-solid fa-envelope"></i><a class="text-dark" href="mailto:info@example.com">{{$contact->email}}</a></div>
								<!--<div class="mt-3 mt-lg-0 ">
									<a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
									<a href="javascript:void(0);"><i class="fa-brands fa-linkedin-in"></i></a>
									<a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
								</div>-->
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-12 col-lg-5 ps-lg-5">
				<div class="card border-0 p-3 p-lg-4">
					<h5>Get in touch with us!</h5>
					@error('thankyou')
								<span class="text-success" role="alert"><strong>{{ $message }}</strong></span><br>
							@enderror
					<form method="post" action="{{route('contactus.save')}}">
						@csrf
						<div class="mb-3">
							<input type="text" name="name" class="form-control @error('name'){{'is-invalid'}}@enderror" placeholder="Full Name*">
							@error('name')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-3">
							<input type="email" name="email" class="form-control @error('email'){{'is-invalid'}}@enderror" placeholder="Email Address*">
							@error('email')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-3 mb-lg-0">
							<input type="text"  name="phone" class="form-control @error('phone'){{'is-invalid'}}@enderror" placeholder="Phone No*">
							@error('phone')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<div class="mb-3">
							<label class="form-label">Tell us more about your project*</label>
							<textarea  class="form-control @error('message'){{'is-invalid'}}@enderror" rows="3"  name="message" ></textarea>
							@error('message')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>
						<button class="btn log_drop" type="submit">Send Us</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection