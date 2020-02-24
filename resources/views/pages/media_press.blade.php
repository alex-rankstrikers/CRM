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
                            <li ><a href="{{ url('how-it-works') }}">How it works</a></li>
                            <li class="abt_active"><a href="{{ url('media-press') }}">Media & Press</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
		   </ul>
          </section>
		  
		  <section class="about_cont">
           <h3 class="text-center">Media & Press</h3>
            <div class="row mt-30"></div>
		   <h4 class="text-center">Founded in August of 2008 and based in San Francisco, California, Airbnb is a trusted community
marketplace for people to list, discover, and book unique accommodation around the world —
online or from a mobile phone or tablet.Founded in August of 2008 and based in San Francisco, California, Airbnb is a trusted community
marketplace for people to list, discover, and book unique accommodation around the world —
online or from a mobile phone or tablet.</h4>
 <div class="row mt-30"></div>
		   <h4 class="text-center mb-30">Whether a flat for a night, a castle for a week, or a villa for a month, Airbnb connects people to
unique travel experiences, at any price point, in more than 65,000 cities and 191 countries. And with
world-class customer service and a growing community of users, Airbnb is the easiest way for
people to monetise their extra space and showcase it t	o an audience of millions</h4>
 <div class="row mt-30"></div>
		   <h4 class="text-center mb-30">Whether a flat for a night, a castle for a week, or a villa for a month, Airbnb connects people to
unique travel experiences, at any price point, in more than 65,000 cities and 191 countries. And with
world-class customer service and a growing community of users, Airbnb is the easiest way for
people to monetise their extra space and showcase it t	o an audience of millions</h4>
 <div class="row mt-30"></div>
		   <h4 class="text-center mb-30">Whether a flat for a night, a castle for a week, or a villa for a month, Airbnb connects people to
unique travel experiences, at any price point, in more than 65,000 cities and 191 countries. And with
world-class customer service and a growing community of users, Airbnb is the easiest way for
people to monetise their extra space and showcase it t	o an audience of millions</h4>

		    <div class="row mt-30"></div>

          </section>		  
         </div>
        </div>
    	</div>
@stop