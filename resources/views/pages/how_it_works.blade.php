@extends('layouts.main')

@section('content')

@include('partials.status-panel')
@include('layouts.othermenu')  

        <div class="container">
         <div class="row">
         <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
    	  <section class="about_nav">
           <ul class="text-center">
		    <li ><a href="{{ url('about-us') }}">About us</a></li>
                            <li class="abt_active"><a href="{{ url('how-it-works-users') }}">How it works for users</a></li>
							 <li><a href="{{ url('how-it-works-venues') }}">How it works for venues</a></li>
                            <li><a href="{{ url('jobs') }}">Jobs</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
		   </ul>
          </section>
		  
		  <section class="about_cont">
           <h3 class="text-center">How it works for users</h3>
            <div class="row mt-30"></div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hw">
			
			<h4 class="text-center">For people seeking the perfect event space</h4>
			
			<div class="row mt-30"></div>
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			 
			   <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">We offer a free service for businesses and individuals to compare and contrast events spaces in London. Tell us about your next event and leave the rest to our team who will work around the clock to ensure we fulfil your requirements.</p></div>
			   </div>		   
			   </div>
			   <hr>
			   <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">Our team of experts will help you find you the right venue and if required they'll also go the extra mile to introduce you trusted caterers, event planners and even lighting and sound experts.</p></div>
			   </div>		   
			   </div>
			    <hr>
			   
			   <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">Our wide selection of partner venues can accommodate all event types including weddings, birthdays, exhibitions, product launches, private parties. Our service will quickly get you in touch with all suitable event spaces in London.  </p></div>
			   </div>		   
			   </div>
			    <hr>
			    <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">Search Venue makes event planning easy.  There's no minimum booking value or min capacity required to use our service. Whether you're hosting a party for 200 or a private dinner for 10, we're sure to have a venue that you'll be delighted with! </p></div>
			   </div>		   
			   </div>
			    <hr>
			   
			   <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">Simply complete a short online form stating your key requirements and we'll help put you touch with all suitable venues. We offer our clients exclusive discounts when they book their event space with Search Venue</p></div>
			   </div>		   
			   </div>
			 <hr>
			   </div>
			  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> </div>
			   
			</div>
			
			


		    <div class="row mt-30"></div>

          </section>		  
         </div>
        </div>
    	</div>
@stop