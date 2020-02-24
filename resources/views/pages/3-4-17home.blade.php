@extends('layouts.main')

@section('content')

    @include('partials.status-panel')

    <div class="container title">
         <div class="row ">
		    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-center">
                        <h1><span>Search Venue</span></h1>
                        <h2>Find and contact venues for your event from across the UK</h2>
                     					 
                    </div>
			<div class="col-lg-3"></div>
        </div>
        <!-- Marketing Icons Section -->
		 <form method="POST" action="{{url('added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
        <div class="row enquiry">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">  @if(Session::get('message')) <div class="alert alert-success" role="alert">
<h4>Thank you for filling out your information!</h4>
<p>We appreciate you contacting us about {{Session::get('message')}}. We try to respond as soon as possible, so one of our Venue Expert will get back to you within a few hours.</p>

<p>Have a great day ahead!</p>
		</div>@endif              
            </div>
			<div class="col-lg-3"></div>
        
            <div class="col-lg-3">               
            </div>
			 <div class="col-lg-3">       
                 <input type="text" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false"  placeholder="Type of event" name="event_type" value="{{ old('event_type') }}">
				 <span class="error">{{ ($errors->has('event_type')) ? $errors->first('event_type') : ''}}</span>
				<input type="text" name="event_date" class="form-control" placeholder="Date" id="datepicker" value="{{ old('event_date') }}">
				<span class="error">{{ ($errors->has('event_date')) ? $errors->first('event_date') : ''}}</span>
				<input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
				<span class="error">{{ ($errors->has('name')) ? $errors->first('name') : ''}}</span>
            </div>
            <div class="col-lg-3">
                <input type="text" name="no_of_guest" class="form-control" placeholder="No of guests" value="{{ old('no_of_guest') }}">
				<span class="error">{{ ($errors->has('no_of_guest')) ? $errors->first('no_of_guest') : ''}}</span>
				<input type="text" name="bph" class="form-control" placeholder="Budget per head" value="{{ old('bph') }}">
				<span class="error">{{ ($errors->has('bph')) ? $errors->first('bph') : ''}}</span>
				<input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
				<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
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
          <div class="col-lg-2 text-center"> 
		  <input type="hidden" name="_token" value="{{csrf_token()}}">
		  <input type="submit" name="" class="btn btn-primary" value="SEND ENQUIRY"> </div>
		   <div class="col-lg-5">               
            </div>
			
        </div>
		  </form>
        <!-- /.row -->
   

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