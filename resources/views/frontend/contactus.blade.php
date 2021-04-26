@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')
	
<section class="contact_wraper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="contact_form">
					<div class="row">
						<div class="col-12 col-lg-6 col-md-12">
							<div class="contact_details_wrap">
								<ul class="conatct_links">
									<li>
										<img src="{{asset('forntEnd/images/location-pin.png')}}">
										<h3>{{$contact->name}}</h3>
										<p>{{$contact->address}}</p>
									</li>
									<li>
										<img src="{{asset('forntEnd/images/call-2.png')}}">
										<a href="tel:+88 657524332">{{$contact->phone}}</a>
									</li>
									<li class="d-flex justify-content-between">
										<img src="{{asset('forntEnd/images/envelop-2.png')}}">
										<a href="mailto:info@example.com">{{$contact->email}}</a>
										<ul class="contact_social_links">
											<li>
												<a href="#"><img src="{{asset('forntEnd/images/facebook.png')}}"></a>
											</li>
											<li>
												<a href="#"><img src="{{asset('forntEnd/images/linkedin.png')}}"></a>
											</li>
											<li>
												<a href="#"><img src="{{asset('forntEnd/images/youtube.png')}}"></a>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-md-12">
							<div class="contact_form_wrap">
								<div class="form_container">
									<h3>Get in touch with us</h3>
									<form method="post" action="{{route('contactus.save')}}">
										@csrf
										<input type="text" name="name" class="custom_input @error('name'){{'is-invalid'}}@enderror" placeholder="Your Name">
										@error('name')
                                			<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            			@enderror
										<input type="text" name="phone" class="custom_input @error('phone'){{'is-invalid'}}@enderror" placeholder="Enter Phone No" maxlength="10" onkeypress="return isNumberKey(event)">
										@error('phone')
                                			<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            			@enderror
										<input type="email" name="email" class="custom_input @error('email'){{'is-invalid'}}@enderror" placeholder="Enter email address">
										@error('email')
                                			<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            			@enderror
										<textarea class="custom_textarea @error('message'){{'is-invalid'}}@enderror" name="message" placeholder="Your Message"></textarea>
										@error('message')
                                			<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            			@enderror
                            			@error('msg')
                            				<span class="valid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            			@enderror
										<button class="blue-btm" type="submit">submit<span><i class="fas fa-arrow-circle-right"></i></span></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection