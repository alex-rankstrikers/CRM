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
							 <li class="abt_active"><a href="{{ url('how-it-works-venues') }}">How it works for venues</a></li>
                            <li><a href="{{ url('jobs') }}">Jobs</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
		   </ul>
          </section>
		  
		  <section class="about_cont">
           <h3 class="text-center">How it works for venues</h3>
		   	<div class="row mt-30"></div>
           	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hw">
			<h4 class="text-center">For Agents/Venues</h4>
			
			<div class="row mt-30"></div>
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			
			
			<div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">We'll help connect you  with new clients on a daily basis and be sure we'll try our hardest to flood your inbox with high quality leads that convert well. We don’t think it's fair wasting time on leads that will never convert, that's why all our prospects are qualified. </p></div>
			   </div>		   
			   </div>
			   <hr>
			   
			   <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">Listing your venue with Searchvenue is 100% free. Complete your profile on our user friendly dashboard and we’ll make your listing visible to our users instantly. You’ll appear on searches and clients will be able to get in touch in as little as 24 hours of registering.</p></div>
			   </div>		   
			   </div>
			    <hr>
			
			 
			   
			   <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">We offer 2 models of payment:</p>
				<ul class="hw-venue">
					   <li><p class="text-justify">Our <span>Pay-Per-Lead model</span> offer you no binding contracts and the ability to buy leads you deem suitable on key information provided by us. We’ll send only qualified leads so they're guaranteed to be valuable with high conversion success.</p></li>
					   <li><p class="text-justify">Alternatively work with us on <span>fixed commission model</span> which helps builds a strong long term partnership with us. Our commission models means you’ll only pay per successful booking and we’ll charge as little as 2% on the final sale value.  </p></li>
					   
				   </ul>
				</div>
			   </div>		   
			   </div>
			    <hr>
			  <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">We promote all our venues on social media and our in-house team of digital experts ensure our SEO and digital strategies generate maximum interest in all our campaigns. On registering with us, we'll even create a short video to promote your hire space.</p></div>
			   </div>		   
			   </div>
			    <hr>
			  <div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">If you're thinking of working with us then get straight to it and list your venue here. You can add multiple spaces so think of each room (no matter how big or small) as a hirable space and select "add venue" when you want list a space with us. </p></div>
			   </div>		   
			   </div>
			    <hr>
				<div class="how_work_cont"> 
			   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			   	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><span class="glyphicon glyphicon-ok-circle"></span></div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"> <p class="text-justify">If you're an venue agent, then you'll be interested in joining us because we have some of the best commissions and rewards schemes on offer. We believe in good working relationships that are profitable for both you and us. </p></div>
			   </div>		   
			   </div>
			    <hr>
			   
			   </div>
			  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> </div>
			
			
			</div>
<div class="row mt-30"></div>
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