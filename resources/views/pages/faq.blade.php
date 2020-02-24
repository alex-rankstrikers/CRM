@extends('layouts.main')

@section('content')

@include('partials.status-panel')
@include('layouts.othermenu')  

        <div class="container">
         <div class="row">
         <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
    	  
		  
		  <section class="about_cont">
           <h3 class="text-center">Frequently Asked Questions</h3>
            <div class="row mt-30"></div>
		   
<ul class="faq_cont">
<li><h4>Does it cost anything to use Searchvenue?</h4>
<p>Our service is 100% free. We do not charge any bookings fees or any administration fees.</p></li> 

<li><h4>How does SearchVenue work?</h4>
<p>Our user friendly site helps take the stress out of finding the perfect space for your upcoming event. You’ll be able to quickly explore a venue and assess its suitability and get in touch directly with the venue to arrange a viewing or answer any further questions.</p></li>  

<li><h4>Why should I use SearchVenue?</h4>
<p>Our site is designed with you in mind. We’ve take then the time to create a platform that lets you easily review, compare and contrast venues at the click of a button. Many of the offers and promotions on SearchVenue are exclusive to us and by booking your event with SearchVenue, you’ll be eligible for these amazing savings! </p></li>

<li><h4>How much does it cost?</h4>
<p>There are no charges for using our service. We are 100% free with no hidden costs! The price you see advertised is the price you pay. Remember, there are many additional extras to think about when you're organising an event, whether is catering and decor, or lighting and photography. Before booking, we always recommend our users to speak directly with the venue regarding all the specifics of the event day and negotiating the best price. 
</p></li>

<li><h4>How do I look for venues?</h4>
<p>Our venue search lets you access 100’s of potential event spaces based on the event your planning. We’re able to help arrange the perfect space for weddings, corporate meetings and everything in between. We make it simple for you to see all the vital information about our venues including their capacity, key features, licensing regulations and whether or not there are any restrictions. </p></li>

<li><h4>Need help finding a venue. Can you help?</h4>
<p><a href="{{ url('ask-a-venue-expert') }}">Get in touch</a> with our team and we’ll take care of the rest! </p></li>

<li><h4>A venue hasn’t responded to my enquiry. What do I do?</h4>

<p>Sometimes venue managers can take a few days to get back to you, but don't worry this normal given the number of enquiries they are often chasing up. We help speed up the process as our agent usually have a great working relationship with venue managers so you can be sure somone from our team will chase up your enquiry so that you get a timely response! </p></li>

<li><h4>Can I change a reservation that has already been confirmed?</h4>
<p>This will be at the discretion of the venue manager. Each venue will have their own of cancellations and change policies, so we recommend you get in touch with them as soon as possible. </p></li>

<li><h4>I’m having trouble logging in. What do I do?</h4>
<p>That’s easy, it's usually nothing more than resetting a password for you. Send us an email (<a href="#">hello@searchvenue.co.uk</a>) and we’ll get it fixed for you! </p></li>

</ul>
 <div class="row mt-30"></div>
		   
<p class="text-center">And feel free to visit us on <a href="{{ url('blog') }}">our blog</a></p>
		    <div class="row mt-30"></div>

          </section>		  
         </div>
        </div>
    	</div>
@stop