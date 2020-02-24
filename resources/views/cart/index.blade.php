@extends('layouts.main')

@section('content')
<style>.sr-only{display:none}</style>
    @include('partials.status-panel')
@include('layouts.cartrmenu');

  <div class="container">
     <div class="row">
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
  

				
 
	  
      <div class="row mt-30 main_cont">
	  <div class="col-lg-3 "></div>
       <div class="col-lg-6 ">

	   


	 <?php if ($cartItems->isEmpty()) { ?>
	  @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 
	 <div align="center">  <img src="{{asset('assets/images/empty-cart.png')}}"/></div><?php } else { ?>

	  <form method="POST" action="{{url('venue-enquiry-multi-added')}}" accept-charset="UTF-8" enctype="multipart/form-data"  id="msform" >
	
	   
      
        <div class="row contact_venue">
         <div class="col-lg-12">
          <h3 class="text-center">CONTACT VENUE DIRECTLY</h3>
		 
		
	   
	 
	   <section>
	   <!--
          <div class="input-group date "  >
                <input type="text" name="event_date" class="form-control form_date" placeholder="Date and Time *" value="{{ old('event_date') }}"/>  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
            </div> -->	


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
			<span class="error event_date">{{ ($errors->has('event_date')) ? $errors->first('event_date') : ''}}</span>	
			</section>
			<section>
			
	<div class="form-group">
		<div class='input-group date' id='datetimepicker3'>
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-time"></span>
			</span>
		<input type='text' class="form-control" name="event_time" value="{{ old('event_time') }}"/>

		</div>
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
			
		
			<span class="error event_date">{{ ($errors->has('event_time')) ? $errors->first('event_time') : ''}}</span>	
			</section>
			<section>
          <input type="text" name="no_of_guest" placeholder="Number of Guest *" value="{{ old('no_of_guest') }}" class="form-control">
		  <span class="error no_of_guest">{{ ($errors->has('no_of_guest')) ? $errors->first('no_of_guest') : ''}}</span>
		  </section>
		  <section>
		  <input type="text" name="bph" placeholder="Budget per head *" value="{{ old('bph') }}" class="form-control">
		  <span class="error bph">{{ ($errors->has('bph')) ? $errors->first('bph') : ''}}</span>
		  </section>
		  <section>
		  <input type="text" name="name" placeholder="Full Name *" value="{{ old('name') }}" class="form-control">
		  <span class="error name">{{ ($errors->has('name')) ? $errors->first('name') : ''}}</span>
		  </section>
		  <section>
		  <input type="text" name="phone" placeholder="Contact Number *" value="{{ old('phone')}}" class="form-control">
		  <span class="error">{{ ($errors->has('phone')) ? $errors->first('phone') : ''}}</span>
		  </section>
		  <section>
		  <input type="text" name="email" placeholder="Email Address *" value="{{ old('email') }}" class="form-control">
		  <span class="error email">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
		  </section> 
	  
		   <textarea rows="4" class="form-control" name="specific_req" placeholder="Additional details">{{ old('specific_req') }}</textarea>
		   
		  	
		   <a href="javascript:void(0);" id="show">Have a promo code?</a>
		   <section id="promocode" style="display:none;">
		    <a href="javascript:void(0);" id="hide">Don't have a promo code?</a>		   
		   <input type="text" name="promocode"  placeholder="Promo code" value="{{ old('promocode') }}" class="form-control" >
		   </section>
		   
	<script>
	$("#show").click(function(){
    $("#promocode").show();
	 $("#show").hide();
	});
</script>
<script>
	$("#hide").click(function(){
    $("#promocode").hide();
	 $("#show").show();
	});
</script>
		
<input type="hidden" name="_token" value="{{csrf_token()}}">
		  <button type="submit" name="" class="btn btn-primary" > SEND ENQUIRY</button>
          
         </div>   
        </div> 
		<div class="row mt-15">
		 <h4 class="text-center"><i class="fa fa-commenting" aria-hidden="true"></i> <a href="{{ url('ask-a-venue-expert') }}">Ask a Venue Expert</a></h4>
		</div>
       </div>  
 </form> 	   
<?php } ?>	
	   
      
	   <div class="col-lg-3 "></div>
	   </div>
    
  
</div>
      </div>
     </div>
    </div>
	</div>


@stop