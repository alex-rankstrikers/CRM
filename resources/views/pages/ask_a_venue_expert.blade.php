@extends('layouts.main')

@section('content')

@include('partials.status-panel')  
@include('layouts.othermenu')
<div class="container">
         <div class="row">
         <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
    <form method="POST" action="{{url('ask-a-venue-added')}}" accept-charset="UTF-8" enctype="multipart/form-data"  id="msform" > 		  
		  <section class="page_cont">
           <h3 class="text-center">Tell us about your event</h3>
            <div class="row mt-30"></div>
			 @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 
			
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		   <p class="text-center">Speak to a venue expert. They’ve got the knowledge, experience and credentials to help with most queries. Our venue experts usually call back within the hour! </p></div>
		   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
 <div class="row mt-30"></div>
 <div class="row mt-30">
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<hr>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h3 class="text-center">Your event details</h3>  
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<hr>
		</div>	
 
 </div>

		   <div class="row mt-30">
		   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
		   
		   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><section>
		   
		   <input type="hidden" name="_token" value="{{csrf_token()}}">
		   
<input type="text" name="event_type" placeholder="Occassion / Event Type *" class="form-control" data-bind="textInput: location,  css: { error: emptyErrorFieldOnLoad('location', location) }, event: { blur: function() { blurEvent('location'); } }" autocomplete="off" aria-autocomplete="list" value="{{ old('event_type') }}">	
<span class="error ">{{ ($errors->has('event_type')) ? $errors->first('event_type') : ''}}</span>		 
			 </section>	</div>
		    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">			
			 <section>
<input type="text" placeholder="Location *" name="location" class="form-control" value="{{ old('location') }}">
<span class="error ">{{ ($errors->has('location')) ? $errors->first('location') : ''}}</span>				 
			 </section>			 
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			 <section>
			 <select name="venue_style" class="form-control">
			 
                                     <option {{ (Input::old("venue_style") == "Any Venue Style" ? "selected":"") }}>
                                        Any Venue Style
                                    </option>
                                     <option {{ (Input::old("venue_style") == "Traditional" ? "selected":"") }}>
                                        Traditional
                                    </option>
                                     <option {{ (Input::old("venue_style") == "Modern" ? "selected":"") }}>
                                        Modern
                                    </option>
                                    <option {{ (Input::old("venue_style") == "Creative" ? "selected":"") }}>
                                        Creative
                                    </option>
                                     <option {{ (Input::old("venue_style") == "Spacious" ? "selected":"") }}>
                                        Spacious
                                    </option>
                                     <option {{ (Input::old("venue_style") == "Casual" ? "selected":"") }}>
                                        Casual
                                    </option>
                                    <option {{ (Input::old("venue_style") == "Affordable" ? "selected":"") }}>
                                        Affordable
									</option>
                                   
			 </select>	
<span class="error ">{{ ($errors->has('venue_style')) ? $errors->first('venue_style') : ''}}</span>			 
			 </section> 
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			
			
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
						<section>
						<select name="budget_type" class="form-control">			 
										   <option {{ (Input::old("budget_type") == "Total event budget" ? "selected":"") }}>
													Total event budget
												</option>
											   <option {{ (Input::old("budget_type") == "Venue hire budget" ? "selected":"") }}>
													Venue hire budget
												</option>
											
										   
					   </select>
				  <span class="error ">{{ ($errors->has('budget_type')) ? $errors->first('budget_type') : ''}}</span> 
				</section>
				</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
					<section>
					<input type="text" name="budget" placeholder="Budget *" class="form-control" value="{{ old('budget') }}">	
 <span class="error ">{{ ($errors->has('budget')) ? $errors->first('budget') : ''}}</span>					
					</section>
					</div>
				</div>
			 
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
					<section>
					<select name="layout" class="form-control">			 
                                  <option {{ (Input::old("layout") == "Any layout" ? "selected":"") }}>
                                            Any layout
                                        </option>
                                        <option {{ (Input::old("layout") == "Banquet" ? "selected":"") }}>
                                            Banquet
                                        </option>
                                        <option {{ (Input::old("layout") == "Boardroom" ? "selected":"") }}>
                                            Boardroom
                                        </option>
                                        <option {{ (Input::old("layout") == "Buffet" ? "selected":"") }}>
                                            Buffet
                                        </option>
                                        <option {{ (Input::old("layout") == "Cabaret" ? "selected":"") }}>
                                            Cabaret
                                        </option>
                                        <option {{ (Input::old("layout") == "Classroom" ? "selected":"") }}>
                                            Classroom
                                        </option>
                                        <option {{ (Input::old("layout") == "Dining" ? "selected":"") }}>
                                            Dining
                                        </option>
                                        <option {{ (Input::old("layout") == "Dinner Dance" ? "selected":"") }}>
                                            Dinner Dance
                                        </option>
                                        <option {{ (Input::old("layout") == "Reception" ? "selected":"") }}>
                                            Reception
                                        </option>
                                        <option {{ (Input::old("layout") == "Standing" ? "selected":"") }}>
                                            Standing
                                        </option>
                                        <option {{ (Input::old("layout") == "Theatre" ? "selected":"") }}>
                                            Theatre
                                        </option>
                                        <option {{ (Input::old("layout") == "U-Shaped" ? "selected":"") }}>
                                            U-Shaped
                                        </option>
                                    
                                   
			   </select>
<span class="error ">{{ ($errors->has('layout')) ? $errors->first('layout') : ''}}</span>				   
					</section>
					</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
					<section>
					<input type="text" name="no_of_people" placeholder="Number of People *" class="form-control" value="{{ old('no_of_people') }}">	
                    <span class="error ">{{ ($errors->has('no_of_people')) ? $errors->first('no_of_people') : ''}}</span>						
					</section>
					</div>
					</div>
				
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">			
			 <section>

			
              <div class='input-group date' id='datetimepicker2'>
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input type='text' class="form-control" name="event_date" value="{{ old('event_date') }}"/>
                    
                </div>
				<script>
						$(document).ready(function(){
							var date_input=$('input[name="event_date"]'); //our date input has the name "date"
							var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
							date_input.datepicker({
							format: 'mm/dd/yyyy',
							container: container,
							todayHighlight: true,
							autoclose: true,
							})
						})
				</script>		
			<span class="error">{{ ($errors->has('event_date')) ? $errors->first('event_date') : ''}}</span>
			
						 
			 </section>			 
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			 <section>
<div class='input-group date' id='datetimepicker3'>
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-time"></span>
			</span>
		<input type='text' class="form-control" name="event_time" value="{{ old('event_time') }}"/>

		</div>

	<script>
		$(document).ready(function(){
			var time_input=$('input[name="event_time"]'); //our date input has the name "date"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			time_input.timepicker({			
			autoclose: true,
			})
		})
	</script>		 
			 </section> 
			</div>
			
		   </div>
		   <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
		   </div>
		   
		   
		  <div class="row mt-30">
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<hr>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h3 class="text-center">Your event requirements</h3>  
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<hr>
		</div>	
 
 </div>
		<div class="row mt-30">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">			
			<section>
			<select name="equipment" class="form-control">			 
                     <option {{ (Input::old("equipment") == "No AV Equipment Required" ? "selected":"") }}>
                        No AV Equipment Required
                     </option>
                     <option {{ (Input::old("equipment") == "AV Equipment is Required" ? "selected":"") }}>
                        AV Equipment is Required
                     </option>    
			   </select>
<span class="error ">{{ ($errors->has('equipment')) ? $errors->first('equipment') : ''}}</span> 			   
			</section>			 
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<section>
			<select name="accommodation" class="form-control">			 
                     <option {{ (Input::old("accommodation") == "No Accommodation Required" ? "selected":"") }}>
                        No Accommodation Required
                     </option {{ (Input::old("accommodation") == "Accommodation Required" ? "selected":"") }}>
                     <option>
                        Accommodation Required
                     </option>    
			   </select>
<span class="error ">{{ ($errors->has('accommodation')) ? $errors->first('accommodation') : ''}}</span> 			   
			</section> 
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><section>
			<textarea placeholder="Does your event have any specific requirements?" class="form-control" name="specific_req">{{ old('specific_req') }}</textarea>			 
			</section>	
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
		</div>
 
  <div class="row mt-30">
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<hr>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h3 class="text-center">Your contact details</h3>  
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<hr>
		</div>	
 
 </div>
 <div class="row mt-30">
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">			
			<section>
			<input type="text" placeholder="Your full name *" name="full_name" class="form-control" value="{{ old('full_name') }}">	
<span class="error ">{{ ($errors->has('full_name')) ? $errors->first('full_name') : ''}}</span>			
			</section>			 
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<section>
			<input type="text" placeholder="Phone number *" name="phone" class="form-control" value="{{ old('phone') }}">
<span class="error ">{{ ($errors->has('phone')) ? $errors->first('phone') : ''}}</span>			
			</section> 
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><section>
			<input type="text" placeholder="Email address *" name="email" class="form-control" value="{{ old('email') }}">
			<span class="error ">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>			
			</section>	
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
		</div>
		   <div class="row mt-30">
		   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
		   
		   <button type="submit" class="form-control btn btn-primary btn-center">Send</button>
		   </div>
		   </div>
            <div class="row mt-30"></div>
          </section>	
</form>		  
         </div>
        </div>
    	</div> 
@stop