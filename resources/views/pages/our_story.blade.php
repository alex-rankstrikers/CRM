@extends('layouts.main')

@section('content')

@include('partials.status-panel')  
@include('layouts.othermenu')
<div class="container">
         <div class="row">
         <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
    	  <section class="about_nav">
           <ul class="text-center">
		   <li class="abt_active"><a href="{{ url('about-us') }}">About us</a></li>
                            <li ><a href="{{ url('how-it-works-users') }}">How it works for users</a></li>
							<li><a href="{{ url('how-it-works-venues') }}">How it works for venues</a></li>
                           <li><a href="{{ url('jobs') }}">Jobs</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
		   </ul>
          </section>
		  
		  <section class="about_cont">
           <h3 class="text-center">About Us</h3>
            <div class="row mt-30"></div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		   <p class="text-justify">Search Venue gives you access to a comprehensive range of UK venues at the click of a finger. You can compare price and reviews in one place and even get exclusive discounts when you book through our website. We make it as easy as 1, 2, 3.</p>
		   </div>
		   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
  <div class="row mt-30"></div> 
           <h2 class="text-center mt-30">Search venue make it easier</h2>		   
             			
		   <div class="row mt-30">
		    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			 <h3 class="text-center">For Customers</h3>	
			  <div class="row mt-30"></div> 
			 <section class="abt_cnt">
			 <span class="glyphicon glyphicon-search">			 
			 </span>
			 <h3 class="text-center">Easy to use</h3>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			  <p class="text-justify">Why spend ages trying to find the perfect location when you can find one in three simple steps on our site.</p>
			 </div>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			
			 </section>
			 <section class="abt_cnt">
			<span class="glyphicon glyphicon-heart">			 
			 </span>
			 <h3 class="text-center">Keep your guests happy</h3>
			  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			  <p class="text-justify">Find venues that can accommodate all your guests needs.</p>
			 </div>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 
			 
			 
			 </section>
			 <section class="abt_cnt">
			 <span class="glyphicon glyphicon-eye-open">			 
			 </span>
			 <h3 class="text-center">Focus on what’s important</h3>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			  <p class="text-justify">Let our venues handle all the little details so that you can focus on having fun.</p>
			 </div>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			
			 </section>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3 class="text-center">For Venues</h3>
			 <div class="row mt-30"></div> 
			<section class="abt_cnt">
			<span class="glyphicon glyphicon-thumbs-up">			 
			 </span>
			 <h3 class="text-center">More control</h3>
			 
			  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			  <p class="text-justify">List your venue instantly, appear in searches and take control of your own listing.</p>
			 </div>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 
			 </section>
			 <section class="abt_cnt">
			 <span class="glyphicon glyphicon-gbp">			 
			 </span>
			 <h3 class="text-center">More bookings</h3>
			 
			   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			  <p class="text-justify">We’re an extension of your sales team. Our team will take bookings and help generate more interest.</p>
			 </div>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 
			 </section>
			 <section class="abt_cnt">
			 <span class="glyphicon glyphicon-user">			 
			 </span>
			 <h3 class="text-center">Increase exposure</h3>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			  <p class="text-justify">Each one of our users could be your customer. Let us help extend your reach.</p>
			 </div>
			 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			 
			 </section>
			</div>
		   </div>  			
		   <div class="row mt-30">
		   <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 col-xs-offset-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
		   <h3 class="text-center">It's easy to list your venue on SearchVenue</h3>
		   <a class="form-control btn btn-primary btn-center" href="{{ url('register') }}">List your venue now!</a>
		   </div>
		   </div>
            <div class="row mt-30"></div>
          </section>		  
         </div>
        </div>
    	</div> 
@stop