@extends('layouts.main_inner')
@section('head')
 <title>@if($title) {{$title}} @else Welcome to tbbc.com @endif</title> 

 
@section('content')
@include('layouts.othermenu')

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>GET IN TOUCH</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- page -->
	<section class="contact-page">
		<div class="container">
			
			<!-- <div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>3475411-564 Nudf dfSt, dfgMo, Sippi</p>
				<p><i class="fa fa-envelope"></i>info@tbbc.com</p>
				<p><i class="fa fa-phone"></i>(+00) 000 000 0000</p>
			</div> -->
			<div class="row">
				
							
						<div class="col-lg-12 col-md-12 col-sm-12 section-title abt-txt-main">						
								<div class="section-title text-center">
								<h3>Global Office Locations</h3>
								</div>
							<div class="row">
							@if($page->description){!! $page->description !!}@endif
								
						
							</div>
					
<br >
<br >
<br > 
<div class="col-lg-8 col-md-8 col-sm-8 offset-2 offset-2">
	<div class="section-title text-center">
								<h3>Enquiry Form</h3>
								</div>
						
							 <form method="POST" action="{{url('contact-us/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="contact-form" id="contact-form">
							<div class="row">


								 @if(Session::get('message')) <div class="col-lg-12 alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 
								
							
								<div class="col-md-12">
									<label>Type of Inquiry <span>*</span></label>
									<select id="inquiry_type" name="inquiry_type" class="form-control">
									 <option value="I want to make a booking" @if(old('inquiry_type')=='I want to make a booking') selected="selected" @endif>I want to make a booking</option>
									 <option value="I have a question about an upcoming reservation" @if(old('inquiry_type')=='I have a question about an upcoming reservation') selected="selected" @endif>I have a question about an upcoming reservation</option>
									 <option value="I have a question about the hotel I am currently staying at" @if(old('inquiry_type')=='I have a question about the hotel I am currently staying at') selected="selected" @endif> I have a question about the hotel I'm currently staying at</option>
									 <option value="I would like to follow up regarding a previous hotel I have stayed at" @if(old('inquiry_type')=='I would like to follow up regarding a previous hotel I have stayed at') selected="selected" @endif>I would like to follow up regarding a previous hotel I've stayed at</option>
									 <option value="I am a member of a media organization and have an inquiry" @if(old('inquiry_type')=='I am a member of a media organization and have an inquiry') selected="selected" @endif>I am a member of a media organization and have an inquiry</option>
								</select>
								<span class="error">{{ ($errors->has('inquiry_type')) ? $errors->first('inquiry_type') : ''}}</span>
								</div>
									<div class="col-md-12 mtb-20">
									<h6>Enter Your Details</h6>
									</div>
								


								<div class="col-md-6 form-group">
									<label>First Name<span>*</span></label>
									<input type="text" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}" required="required">
									<span class="error">{{ ($errors->has('first_name')) ? $errors->first('first_name') : ''}}</span>
								</div>
								<div class="col-md-6">
									<label>Last Name<span>*</span></label>
									<input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required="required">
									<span class="error">{{ ($errors->has('last_name')) ? $errors->first('last_name') : ''}}</span>
								</div>
								<div class="col-md-12">
									<label>Email<span>*</span></label>
									<input type="text" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required="required">
									<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
								</div>
								<div class="col-md-6">
									<label>Phone<span>*</span></label>
									<input type="text" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}" required="required">
									<span class="error">{{ ($errors->has('phone')) ? $errors->first('phone') : ''}}</span>
								</div>
								<div class="col-md-6">
									<label>Country<span>*</span></label>
									<select name="country" id="country"  class="form-control country required" data-error="#err_country" required="required">		
									<option value="">Choose Country</option>									
										 @foreach ($country as $country)
										 <option value="{{ $country->name }}" @if(old('country')==$country->name) selected="selected" @endif>
										 {{ $country->name }}
										 </option>
										 @endforeach
									 </select>
									 <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
								</div>
								<div class="col-md-12 mtb-20">
								<h6>Where Do You Want to Stay?</h6>
								</div>
								<div class="col-md-12">
									<label>Enter a specific destination or hotel name<span>*</span></label>
									<textarea  placeholder="Your message" name="message" required="required">{{ old('message') }}</textarea>
									<span class="error">{{ ($errors->has('message')) ? $errors->first('message') : ''}}</span>									
								</div>
								<div class="borderbot1px"></div>
								<div class="col-md-12 mtb-20">
								<h6>Select Travel Dates</h6>
							    </div>

							<div class="col-lg-6 col-md-6 col-sm-6">
								<label>Check In<span>*</span></label>
							<div class="right-inner-addon-top">
							<i class="fa fa-calendar"></i>
							<input type="text" class="form-control datepicker" placeholder="Check In" name="ch_in_date" value="{{ old('ch_in_date') }}" required="required"/>
							
							</div>
							<span class="error">{{ ($errors->has('ch_in_date')) ? $errors->first('ch_in_date') : ''}}</span>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
							<label>Check Out<span>*</span></label>		
							<div class="right-inner-addon-top">
							<i class="fa fa-calendar"></i>
							<input type="text" class="form-control datepicker" placeholder="Check Out" name="ch_out_date" value="{{ old('ch_out_date') }}" required="required"/>
							</div>
							<span class="error">{{ ($errors->has('ch_out_date')) ? $errors->first('ch_out_date') : ''}}</span>
							</div>
							<div class="borderbot1px"></div>

							<div class="col-md-12 mtb-20">
								<h6>Select Rooms</h6>
							    </div>
							 
									
									<div class="col-lg-4 col-md-4 col-sm-4">
									<label>Adults<span>*</span></label>							
									<select class="form-control" name="adults[]" required="required">
									<option value="">Please Adults</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10+</option>
									</select>
<span class="error">{{ ($errors->has('adults')) ? $errors->first('adults') : ''}}</span>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4">
									<label>Children<span>*</span></label>							
									<select class="form-control" name="children[]" required="required">
									<option value="">Please Children</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>								
									</select>
									<span class="error">{{ ($errors->has('children')) ? $errors->first('children') : ''}}</span>	
									</div>

									<div class="col-lg-4 col-md-4 col-sm-4" >
									<label>Beds<span>*</span></label>							
									<select class="form-control" name="beds[]" required="required">
									<option value="">Please Beds</option>								
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									</select>	
									<span class="error">{{ ($errors->has('beds')) ? $errors->first('beds') : ''}}</span>
									</div>
								
								
								
							
						
						<div class="col-lg-12 col-md-12 col-sm-12 mt-10">
								<a href="javascript:void(0);" id="add_room" class="link"> Add another room</a>
							</div>
							<script type="text/javascript">
							$("#add_room").click(function () {
							$("#add_room").closest('div').after('<div class="col-lg-4 col-md-4 col-sm-4"><label>Adults<span>*</span></label><select name="adults[]" class="form-control" required="required"><option>Please Adults</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10+</option></select></div><div class="col-lg-4 col-md-4 col-sm-4"><label>Children<span>*</span></label><select class="form-control" name="children[]" required="required"><option>Please Children</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div><div class="col-lg-4 col-md-4 col-sm-4"><label>Beds<span>*</span></label><select class="form-control" name="beds[]" required="required"><option>Please Beds</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div>');
							});

							
							</script>
							<style type="text/css">
								.error{ font-size: 12px; color: red; }
							</style>
						

							<div class="borderbot1px"></div>
								<div class="col-lg-12 col-md-12 col-sm-12 mtb-20">
								<h6>Select Your Budget</h6>
								<p>How much are you hoping to spend per room per night in USD?</p>
							    </div>
							    <div class="col-lg-6 col-md-6 col-sm-6">
							<label>Enter your budget<span>*</span></label>							
							<input type="text" name="budget" id="budget" placeholder="" value="{{ old('budget') }}" required="required">
							<span class="error">{{ ($errors->has('budget')) ? $errors->first('budget') : ''}}</span>	
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<label>What is your purpose of stay?<span>*</span></label>							
								<select name="purpose" class="form-control" required="required">
									<option value=" ">Please Select</option>
									<option value="1" @if(old('purpose')=='1') selected="selected" @endif>Family vacation</option>
									<option value="2" @if(old('purpose')=='2') selected="selected" @endif>Honeymoon</option>
									<option value="3" @if(old('purpose')=='3') selected="selected" @endif>Business trip</option>
									<option value="4" @if(old('purpose')=='4') selected="selected" @endif>Relax and unwind</option>
									<option value="5" @if(old('purpose')=='5') selected="selected" @endif>Other</option>
								</select>
								<span class="error">{{ ($errors->has('purpose')) ? $errors->first('purpose') : ''}}</span>
								
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<label>Do you have any special requests?</label>	
							<textarea name="spl_request">{{ old('spl_request') }}</textarea>

							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<button class="site-btn">SUMMIT</button>
							</div>
						
						</form>
					</div>

					</div>
				
			
			</div>
		</div>
	</section>
	<!-- page end -->

<!-- Team section -->
		<section class="team-section spad pb-0">
			<div class="container">
				<div class="section-title text-center">
					<h3>Team and team contact</h3>
					
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="{{ asset('tbbc/img/team/1.jpg') }}" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Tony Holland</h5>
								<span>THE BOSS</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2288</p>
									<p><i class="fa fa-envelope"></i>tonyholland@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="{{ asset('tbbc/img/team/2.jpg') }}" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Sasha Gordon</h5>
								<span>MANAGING DIRECTOR</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2243</p>
									<p><i class="fa fa-envelope"></i>sashagordon@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="{{ asset('tbbc/img/team/3.jpg') }}" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Nicky Butt</h5>
								<span>OFFICE ADMINISTRATOR</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2255</p>
									<p><i class="fa fa-envelope"></i>nickybutt79@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="{{ asset('tbbc/img/team/4.jpg') }}" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Gina Wesley</h5>
								<span>AFFILIATE</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2288</p>
									<p><i class="fa fa-envelope"></i>ginawesley@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- Clients section -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
 
  <script>
 $(function () {
  $(".datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: 'dd-dd-yyyy',
  });
});


  </script>
 @stop