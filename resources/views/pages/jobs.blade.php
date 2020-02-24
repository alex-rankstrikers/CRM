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
                           <li ><a href="{{ url('how-it-works-users') }}">How it works for users</a></li>
							<li><a href="{{ url('how-it-works-venues') }}">How it works for venues</a></li>
                           <li class="abt_active"><a href="{{ url('jobs') }}">Jobs</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
		   </ul>
          </section>
		  
		  <section class="about_cont">
           <h3 class="text-center">Jobs</h3>
            <div class="row mt-30"></div>
			
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		   <p class="text-center">We are always looking to hear from bright and talented people with a strong background in event management. </p>
		   <p>&nbsp;</p>
		    <p class="text-center" >Please send us your CV at <a href="#">hello@searchvenue.co.uk</a></p>
		   </div>
		   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
		   
 <div class="row mt-30"></div>
		   

		    <div class="row mt-30"></div>

          </section>		  
         </div>
        </div>
    	</div>
@stop