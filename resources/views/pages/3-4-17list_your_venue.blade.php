@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

    <div class="container title">
         <div class="row ">
		    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-center">
                        <h1><span>List Your Venue</span></h1>  
<h6>Listing your venue with us is free, easy and gives you immediate access to qualified enquiries from suitable prospects.</h6>						
                    </div>
			<div class="col-lg-3"></div>
        </div>
        <!-- Marketing Icons Section -->
		 <form method="POST" action="{{url('list-your-venue/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
        <div class="row enquiry">
        <div class="col-lg-3"></div>
		<div class="col-lg-6">  @if(Session::get('message')) <div class="alert alert-success" role="alert">
<h4>Thank you for filling out your information to promote your venue with Search Venue.</h4>
<p>We try to respond as soon as possible, so one of our Venue Expert will get back to you within a few hours.</p>

<p>Have a great day ahead! </p>
		</div>@endif               
            </div>
			<div class="col-lg-3"></div>
            <div class="col-lg-3">               
            </div>
			 <div class="col-lg-3">
                <input type="text" name="venue_name" class="form-control" placeholder="Venue name" value="{{ old('venue_name') }}">
				<span class="error">{{ ($errors->has('venue_name')) ? $errors->first('venue_name') : ''}}</span>
				<input type="text" name="name" class="form-control" placeholder="Your full name" value="{{ old('name') }}">
				<span class="error">{{ ($errors->has('name')) ? $errors->first('name') : ''}}</span>
				<input type="text" name="phone" class="form-control" placeholder="Contact number" value="{{ old('phone') }}">
				<span class="error">{{ ($errors->has('phone')) ? $errors->first('phone') : ''}}</span>
            </div>
            <div class="col-lg-3">
                <input type="text" name="postcode" class="form-control" placeholder="Postcode" value="{{ old('postcode') }}">
				<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
				<input type="text" name="email" class="form-control" placeholder="Your Email Address" value="{{ old('email') }}">
				<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
				<input type="text" name="message" class="form-control" placeholder="Message" value="{{ old('message') }}">
				<span class="error">{{ ($errors->has('message')) ? $errors->first('message') : ''}}</span>
            </div>
            <div class="col-lg-3">               
            </div>
			 
			 <div class="col-lg-5">&nbsp;               
            </div>
          <div class="col-lg-2 text-center">&nbsp;</div>
		   <div class="col-lg-5"> &nbsp;              
            </div>
			 <div class="col-lg-5">               
            </div>
          <div class="col-lg-2 text-center">  <input type="hidden" name="_token" value="{{csrf_token()}}"><input type="submit" name="" class="btn btn-primary" value="SEND ENQUIRY"> </div>
		   <div class="col-lg-5">               
            </div>
			
        </div>
        <!-- /.row -->
     </form>

        <!-- Features Section -->
        <div class="row">
            
            <div class="col-lg-4"> 
           <p>Our pricing model is simple and gives you full control every step of the way. We understand the importance of managing budgets and maintaining great ROI, that's why we've created a unique pay-per-lead model where you pay only for prospects you're interested in contacting. Every enquiry is always double verified by us so you can be certain it is 100% valuable.</p>               
            </div>
            <div class="col-lg-4">
            <p>Search Venue also works closely with event spaces and is able to book clients directly. Our agents work closely with every venue we list to ensure they are sold properly and in a professional manner to continuing generating new interest regularly. </p>                  
            </div>
            <div class="col-lg-4">  
          <p>With every venue we sell, our promise is to deliver unrivalled service, exceptional quality and outstanding price.  So if you're a venue that can offer something more exciting, a bigger wow factor, then we'd love to work with you!  </p>         
            </div>
        </div>
        <!-- /.row -->

        

        <!-- Call to Action Section -->
        

    </div>

@stop