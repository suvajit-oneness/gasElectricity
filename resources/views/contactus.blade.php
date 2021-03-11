@extends('frontend.layouts.master')
@section('title','About Us')
@section('content')
	
<section class="contact_wraper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="contact_form">
					<div class="row">
						<div class="col-12 col-md-6 d-none d-md-block">
							<div class="contact_details_wrap">
								<ul class="conatct_links">
									<li>
										<img src="{{asset('forntEnd/images/location-pin.png')}}">
										<h3>Headquarters</h3>
										<p>5/13 Fielden Way, Port Kennedy,WA, 6172, Dummy location</p>
									</li>
									<li>
										<img src="{{asset('forntEnd/images/call-2.png')}}">
										<a href="tel:+88 657524332">[88] 657 524 332</a>
									</li>
									<li class="d-flex justify-content-between">
										<img src="{{asset('forntEnd/images/envelop-2.png')}}">
										<a href="mailto:info@example.com">info@example.com</a>
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
						<div class="col-12 col-md-6">
							<div class="contact_form_wrap">
								<div class="form_container">
									<h3>Get in touch with us</h3>
									<form>
										<input type="text" name="" class="custom_input" placeholder="Your Name">
										<input type="text" name="" class="custom_input" placeholder="Enter Phone No">
										<input type="email" name="" class="custom_input" placeholder="Enter email address">
										<textarea class="custom_textarea" placeholder="Your Message"></textarea>
										<button class="blue-btm">submit<span><i class="fas fa-arrow-circle-right"></i></span></button>
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