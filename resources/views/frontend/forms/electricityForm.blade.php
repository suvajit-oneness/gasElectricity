@extends('frontend.layouts.master')
@section('title','Electricity Form')
@section('content')

<section class="state_banner">
	<div class="container">
	</div>
</section>

<section class="contact_wraper bac-white">
	<div class="container">
		<div class="electric-head">
			<h2 class="heading text-center"> Your Usage </h2>
			<p class="text-center">To find you a great plan we need to collect some details about you.</p>
		</div>

		<div class="energy_select_box block-display elect-form">
			<p>What are you looking to compare? <span class="orange-color">*</span></p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="customRadio1">Gas &amp; Electricity</label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth electricy-icon">
					  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="customRadio2">Electricity</label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth gas-icon">
					  <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="customRadio3">Gas </label>
					</div>
				</div>
			</div>
		</div>
		<div class="light-green border-area elect-form">

			<div class="energy_select_box block-display back-transparent">
			<p class="black-content"> What type of property? <span class="orange-color">*</span></p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="myhome" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="myhome">My home</label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="mybusness" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mybusness">My business</label>
					</div>
				</div>
			</div>
		   </div>

		   <div class="energy_select_box block-display back-transparent">
			<p class="black-content"> Do you own or rent the property? <span class="orange-color">*</span></p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="own" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="own"> Own </label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth ">
					  <input type="radio" id="rent" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="rent"> Rent </label>
					</div>
				</div>
			</div>
		   </div>

		   <div class="energy_select_box block-display back-transparent">
			<p class="black-content"> Are you moving into this property? <span class="orange-color">*</span> </p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="mov-yes" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mov-yes"> Yes </label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth ">
					  <input type="radio" id="mov-no" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mov-no"> No </label>
					</div>
				</div>
			</div>
		   </div>

		   <div class="energy_select_box block-display back-transparent">
			<p class="black-content"> What is your move in date? <span class="orange-color">*</span> </p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="date-control autowidth">
						<input class="form-control" type="date" value="2021-02-15" >
					</div>
				</div>
			</div>
		   </div>


		   <div class="energy_select_box block-display back-transparent">
			<p class="black-content"> Do you also need to connect a broadband or home entertainment service? <span class="orange-color">*</span> </p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="mov-yes2" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mov-yes2"> Yes </label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth ">
					  <input type="radio" id="mov-no2" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mov-no2"> No </label>
					</div>
				</div>
			</div>
		   </div>

		    <div class="energy_select_box block-display back-transparent border-b-none">
			<p class="black-content"> Do you have gas connection to the property? <span class="orange-color">*</span> </p>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="mov-yes3" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mov-yes3"> Yes </label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth ">
					  <input type="radio" id="mov-no3" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="mov-no3"> No </label>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="custom-control custom-radio autowidth">
					  <input type="radio" id="know" name="customRadio" class="custom-control-input">
					  <label class="custom-control-label" for="know"> Don't Know </label>
					</div>
				</div>
			</div>
		   </div>


		</div>


		<div class="electricity-details elect-form">
			<h2 class="heading text-center"> Your Electricity Details </h2>

			<div class="light-green border-area">
				<div class="energy_select_box block-display back-transparent">
					<p class="black-content"> Do you have gas connection to the property? <span class="orange-color">*</span> </p>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth">
							  <input type="radio" id="det-yes" name="customRadio" class="custom-control-input">
							  <label class="custom-control-label" for="det-yes"> Yes </label>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="custom-control custom-radio autowidth electricy-icon">
							  <input type="radio" id="det-no" name="customRadio" class="custom-control-input">
							  <label class="custom-control-label" for="det-no"> No </label>
							</div>
						</div>
					</div>
			   	</div>

			   	<div class="energy_select_box block-display back-transparent border-b-none ">
					<p class="black-content"> Who is your current electricity provider? <span class="orange-color">*</span> </p>
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
							<div class="drop-control autowidth">
								  <select class="form-control">
								 	<option>Origin Energy</option>
								 	<option>Origin 2</option>
								 	<option>Origin 3</option>
								 </select>  
							</div>
						</div>
					</div>
			   	</div>
			</div>

			<div class="what-label">
				<strong class="black-content "> What level best describes your typical electricity usage? <span class="orange-color">*</span> </strong>

				<ul class="feature_list">
					<li>
						<div class="energy_select_box block-display">
							<div class="custom-control custom-radio autowidth">
								<input type="radio" id="low" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="low"> Low </label>
							</div>
						</div>
						<div class="label-content text-center">
							<p><span>1 to 2 people</span></p>
							<p><span>1 to 2 bedrooms</span></p>
							<p>Weekly washing, little heating and cooling</p>
							<p>Employed full time, spend little time at home</p>
						</div>
					</li>
					<li>
						<div class="energy_select_box block-display">
							<div class="custom-control custom-radio autowidth">
								<input type="radio" id="Medium" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="Medium"> Medium </label>
							</div>
						</div>

						<div class="label-content text-center">
							<p><span>3 to 4 people</span></p>
							<p><span>3 bedrooms</span></p>
							<p>Washing a few times a week, regular heating and cooling Employed full time, children at school, home most evenings and weekends</p>
							 
						</div>
					</li>
					<li>
						<div class="energy_select_box block-display">
							<div class="custom-control custom-radio autowidth">
								<input type="radio" id="High" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="High">  High </label>
							</div>
						</div>
						<div class="label-content text-center">
							<p><span>4 to 5+ people</span></p>
							<p><span>4+ bedrooms</span></p>
							<p>Daily washing, heating and cooling regularly. Multiple TVs and appliances.</p>
							<p>Home evenings, weekends and some days.</p>
						</div>
					</li>
				</ul>

				<div class="check-area">
					<div class="custom-control custom-checkbox custom-control-mod">
				        <input type="checkbox" class="custom-control-input" id="customControl1">
				        <label class="custom-control-label" for="customControl1"><b> I understand iSelect recommends plans from a range of providers on its</b><span> Approved Product List.</span></label>
				    </div>
				    <div class="custom-control custom-checkbox custom-control-mod">
				        <input type="checkbox" class="custom-control-input" id="customControl2">
				        <label class="custom-control-label" for="customControl2"><b>  I have read, understood and accept the</b><span> Terms and Conditions </span> <b>&</b> <span> Privacy Collection Notice. </span></label>
				    </div>
				    <a href="#" class="blue-btm top-gap30">Apply Now <span><i class="fas fa-arrow-circle-right"></i></span></a>
				</div>
			</div>
 		</div>
	</div>
</section>
@section('script')
    <script type="text/javascript"></script>
@stop
@endsection