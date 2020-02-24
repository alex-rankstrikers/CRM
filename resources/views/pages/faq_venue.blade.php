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

<li><h4>Can I book a venue outside London?</h4>
<p>We’re only working with London venues at present, but watch this space as we’ve got plans to expand to other locations soon! </p></li>
<li><h4>What is SearchVenue?</h4>
<p>SearchVenue is a free listing website that promotes venues across London. It provides venue managers with an additional, low cost tool to reach their audience to market their event space. SearchVenue hopes to be your primary partner in securing new bookings in a fast and safe way!</p></li>
<li><h4>Why SearchVenue?</h4>
<p>We’ve made joining our platform really simple.  <a  href="{{ url('register') }}">Registering with us</a> and completing your profile takes minutes! You’re venue will be made live on our engine instantly and accessible to all our users. </p></li>

<li><h4>Can I use SearchVenue from any device?</h4>
<p>SearchVenue is designed to be fully responsive platform and can be used on your mobile, tablet or desktop. </p></li>

<li><h4>How much does it cost?</h4>
<p>SearchVenue gives you the flexibility in deciding how we work together. You’ll be able to work with us on a pay per lead model or a simple commissions model. We leave that decision for you to make. </p></li>

<li><h4>How should I fill my profile?</h4>
<p>Here are our five top tips to ensuring you get more enquiries. </p>
<p>&nbsp;</p>
<p>1.Ensure you complete your profile fully. The more refined this is, the better the likelihood of enquiries coming through. </p>
<p>2.A accurate and honest profile will avoid disappointing potential customers. </p>
<p>3.Include some professional photos to show your venue off. Try and select images that give an overall glimpse of the venue and also try to include images that highlight your uniqueness. </p>
<p>4.Include social media pages as additional reference points for potential customers.</p> 
<p>5.Keep your profile up to date. This means remembering to change information on your profile. This will reduce unexpected surprises for your clients. 
</p>
<p>&nbsp;</p>
<p><a href="{{ url('register') }}">Promote your venue today!</a></p>
</li>
<li><h4>How do I calculate the price?</h4>

<p>Think about calculating prices in one of three ways: dry hire, fixed package per person or minimum spend. </p></li>

<li><h4>I can't log in.</h4>
<p>That’s easy, it's usually nothing more than resetting a password for you. Send us an email and we’ll get it fixed for you! </p></li>
</ul>
 <div class="row mt-30"></div>
		   
<p class="text-center">And feel free to visit us on <a href="{{ url('blog') }}">our blog</a></p>
		    <div class="row mt-30"></div>

          </section>		  
         </div>
        </div>
    	</div>
@stop