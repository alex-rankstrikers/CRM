@extends('layouts.main')

@section('content')
<style>.sr-only{display:none}
@media screen and (max-width: 320px) {.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{ 
    padding-right: 2.5% !important;
    padding-left: 2.5% !important;
min-height:25px; height:auto;}
	}
</style>
    @include('partials.status-panel')
@include('layouts.homemenu');
	<?php /*@include('layouts.listmenu')*/?>
  <div class="container">
     <div class="row">
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
      <div class="row ">
        <div class="col-lg-12">
         <h3 class="text-center">{{ $venue->venuetitle }}</h3>
		  <h4 class="text-center">{{ $venue->space }}</h4>
		 
		 <p class="text-center">{{ $venue->address1 }},@if($venue->address2) {{ $venue->address2 }}, @endif {{ $venue->city }},{{ $venue->state }},{{ $venue->postcode }}</p>
		 @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 
         <div id="myCarousel" class="carousel slide hidden-xs mt-30" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      @if($venue->image_2)<li data-target="#myCarousel" data-slide-to="1"></li> @endif
	  @if($venue->image_3)<li data-target="#myCarousel" data-slide-to="2"></li> @endif
	  @if($venue->image_4)<li data-target="#myCarousel" data-slide-to="3"></li> @endif
	  @if($venue->image_5)<li data-target="#myCarousel" data-slide-to="4"></li> @endif
	  @if($venue->image_6)<li data-target="#myCarousel" data-slide-to="5"></li> @endif
    </ol>

    <!-- Wrapper for slides active-->
    <div class="carousel-inner" role="listbox">
	@if($venue->image_1)
      <div class="item active">
        <img class="img-responsive" src="{{url('')}}/uploads/venue/original/{{ $venue->image_1 }}" alt="Chania">
      </div>      
    @endif
	@if($venue->image_2)
      <div class="item">
        <img class="img-responsive" src="{{url('')}}/uploads/venue/original/{{ $venue->image_2 }}" alt="Chania">
      </div>      
    @endif
	@if($venue->image_3)
      <div class="item">
        <img class="img-responsive" src="{{url('')}}/uploads/venue/original/{{ $venue->image_3 }}" alt="Chania">
      </div>      
    @endif
	@if($venue->image_4)
      <div class="item">
        <img class="img-responsive" src="{{url('')}}/uploads/venue/original/{{ $venue->image_4 }}" alt="Chania">
      </div>      
    @endif
	@if($venue->image_5)
      <div class="item">
        <img class="img-responsive" src="{{url('')}}/uploads/venue/original/{{ $venue->image_5 }}" alt="Chania">
      </div>      
    @endif
	@if($venue->image_6)
      <div class="item">
        <img class="img-responsive" src="{{url('')}}/uploads/venue/original/{{ $venue->image_6 }}" alt="Chania">
      </div>      
    @endif
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 border">
			<h4 class="text-center">Price per hour 				
			</h4>  
			<p class="text-center">£{{ $venue->per_hour }} </p>	
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 border">
			<h4 class="text-center">Price per person</h4>
<p class="text-center">£{{ $venue->per_person }}</p>			
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 border">
			<h4 class="text-center">Price per day	 </h4> 
<p class="text-center">£{{ $venue->per_day }}</p>			
		</div>
        </div>
		
      </div> 


				
 
	  
      <div class="row mt-30 main_cont">
       <div class="col-lg-8 ">
        <?php /*<h3>{{ $venue->title }}</h3>   
        <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>{{ $venue->address1 }},@if($venue->address2) {{ $venue->address2 }}, @endif {{ $venue->city }},{{ $venue->state }},{{ $venue->postcode }}</p> {{ $venue->nearest_transport_link }}
		*/?>
       <div class="col-lg-12 text-justify padding_zero" > 
	   @if($venue->use_venue_description ==1)
	   {!! $venue->vc_description !!}
		@else
		{!! $venue->space_description !!}
		@endif
   </div>
<hr/>
<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <h4>Capacity</h4>  
  </div>
  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="row">
		@foreach($venue_capacity as $capacity) 
		@if($capacity->capacity_value !='')
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding: 0;"><p><span class="glyphicon glyphicon-ok"></span> {{$capacity->title}}</p></div>
		
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>{{$capacity->capacity_value}} People</p></div>
		@endif
		@endforeach 

  @if(!empty($venue->floor_plan_pdf)) 

		
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>&nbsp;</p></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right">&nbsp;</p></div>
		
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>&nbsp;</p></div>
	
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right"><a target="_blank" href="{{url('')}}/uploads/pdf/{{ $venue->floor_plan_pdf }}">Floor Plan Download</a> </p></div> 
		

@endif 
  </div> 
   </div> 
  
  </div>
  
  
 <!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
   <p>100 - 220</p>   
   <p>200 - 220</p>
   <p>100 - 220</p>   
   <p>200 - 220</p>
  </div> --> 
</div>
<hr/>
<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <h4>Features</h4>  
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">   
 @foreach($venue_features as $venue_features) 
		<p><span class="glyphicon glyphicon-ok"></span> {{$venue_features->title}}</p> 
		@endforeach 
  </div>

</div>
<hr/>
<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

    <h4>Food & Drink</h4>  
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
 @foreach($venue_fooddrink as $venue_fooddrink) 
		<p><span class="glyphicon glyphicon-ok"></span> {{$venue_fooddrink->title}}</p> 
		@endforeach 
		
			 
			<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>&nbsp;</p></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right">&nbsp;</p></div>
					@if(!empty($venue->menu_name_1) || !empty($venue->menu_name_2) || !empty($venue->menu_name_3) || !empty($venue->menu_name_4) )
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p><strong>Download Menu</strong></p></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right">&nbsp;</p></div>
					
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>&nbsp;</p></div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right">&nbsp;</p></div>
					@endif 
					@if(!empty($venue->menu_name_1))
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>{{$venue->menu_name_1}}</p></div>				
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right"><a target="_blank" href="{{url('')}}/uploads/pdf/{{$venue->fd_menu_pdf_1}}">Download</a> </p></div> 
					@endif 
					
					@if(!empty($venue->menu_name_2))
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>{{$venue->menu_name_2}}</p></div>				
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right"><a target="_blank" href="{{url('')}}/uploads/pdf/{{$venue->fd_menu_pdf_2}}">Download</a> </p></div>
					@endif 
					
					@if(!empty($venue->menu_name_3))					
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>{{$venue->menu_name_3}}</p></div>				
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right"><a target="_blank" href="{{url('')}}/uploads/pdf/{{$venue->fd_menu_pdf_3}}">Download</a> </p></div>
					@endif 
					
					@if(!empty($venue->menu_name_4))					
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>{{$venue->menu_name_4}}</p></div>
				
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p class="text-right"><a target="_blank" href="{{url('')}}/uploads/pdf/{{$venue->fd_menu_pdf_4}}">Download</a> </p></div>
					@endif
			  </div> 
			
  </div> 

  
</div>
<hr/>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <h4>Licensing</h4>  
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

 @foreach($venue_licensing as $venue_licensing) 
		<p><span class="glyphicon glyphicon-ok"></span> {{$venue_licensing->title}}</p> 
		@endforeach 
  </div>  
</div>
<hr/>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <h4>Restrictions</h4>  
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
 @foreach($venue_restrictions as $venue_restrictions) 
		<p><span class="glyphicon glyphicon-ok"></span> {{$venue_restrictions->title}}</p> 
		@endforeach 
  </div>  
</div>

<hr/>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

    <h4>Prices</h4>  
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
   <div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

   
	  <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5 " style="padding: 0;">
	  <p><span class="glyphicon glyphicon-ok"></span> Price per hour </p>
	  </div>
	   <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
	   <p>£{{ $venue->per_hour }}  </p>
	   </div>
	   <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
	   <p class="text-right">@if($venue->per_hour_pdf) <a target="_blank" href="{{url('')}}/uploads/pdf/{{ $venue->per_hour_pdf }}">PDF Download</a> @endif</p>
	   </div>
	   
	   <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5 " style="padding: 0;">
	  <p><span class="glyphicon glyphicon-ok"></span> Price per person </p>
	  </div>
	   <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
	   <p>£{{ $venue->per_person }} </p>
	   </div>
	   <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
	   <p class="text-right">@if($venue->per_person_pdf) <a target="_blank" href="{{url('')}}/uploads/pdf/{{ $venue->per_person_pdf }}">PDF Download</a> @endif</p>
	   </div>
	   
	   <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5 " style="padding: 0;">
	  <p><span class="glyphicon glyphicon-ok"></span> Price per day </p>
	  </div>
	   <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
	   <p>£{{ $venue->per_day }}  </p>
	   </div>
	   <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
	   <p class="text-right">@if($venue->per_day_pdf) <a target="_blank" href="{{url('')}}/uploads/pdf/{{ $venue->per_day_pdf }}">PDF Download</a> @endif</p>
	   </div>
 
   </div> 
   </div>
 </div>
		
	
  </div>  

<hr/>
<!--
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <h4>102 Reviews</h4>  
  </div>
  <div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
   <p>****</p>   
  </div>  
</div>
<hr/>

<hr/>
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <span class="face-img"><img class="img-circle" src="{{ asset('assets/images/dan.jpg') }}"></span>  
    <p>Dan</p>
  </div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
   <p>Lovely little house with a great view! Very nice area
with lots of lovely beaches!</p>   
   <p>February 2017</p>
  </div>  
</div>
<hr/>
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <span class="face-img"><img class="img-circle" src="{{ asset('assets/images/dan.jpg') }}"></span>  
    <p>Dan</p>
  </div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
   <p>Lovely little house with a great view! Very nice area
with lots of lovely beaches!</p>   
   <p>February 2017</p>
  </div>  
</div>
<hr/>
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <span class="face-img"><img class="img-circle" src="{{ asset('assets/images/dan.jpg') }}"></span> 
    <p>Dan</p>
  </div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
   <p>Lovely little house with a great view! Very nice area
with lots of lovely beaches!</p>   
   <p>February 2017</p>
  </div>  
</div>
<hr/>
<div class="row">
  <ul class="pagination">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
  </ul>  
</div>-->
       </div>
       <div class="col-lg-4">
        <!--  <aside class="side_categories">
          <ul>
         <li>Add to wishlist</li> 
           <li>Share this venue</li>
          <li>Map</li>
          </ul>  
        </aside>-->
		<style>
.alert{display:none;
    padding: 0px;
    margin-bottom: 0px;
    border: none;
   border-radius: 0px; margin-top:7px;
}
</style>
        <div class="price_range">
		<?php $flag=true;?>
		 <?php $cartDatas = Cart::content();?>
		@if(count($cartDatas)!=0)
			
@foreach($cartDatas as $cartDs)
	@if($cartDs->id==$venue_id )
		<?php $flag=false;?>
	@endif 
		@endforeach
		@endif 
		<?php 
		if($flag==false)
		{?>
			<div class="venue_msg" style="color: rgb(0, 136, 204); display: block;">Venue Shortlisted</div>	
		<?php 	
		}else{
			?>
			<div id="successMsg" class="venue_msg" style="color:#08c"></div><h3><a href="javascript:void(0)" id="cartBtn">Get a Quote</a></h3>
		<?php } ?>
		
		
		</div> 
        <div class="row contact_venue">
         <div class="col-lg-12">
          <h5>CONTACT VENUE DIRECTLY</h5>
		 
		 <form method="POST" action="{{url('venue-enquiry-added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-control" id="msform" >
	   
	   <input type="hidden" name="venue_id" id="venue_id" value="{{$venue_id}}">
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
			<!--<div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
				<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                    <input type='text' class="form-control" />
                    
                </div>
            </div>
			<script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>-->
		<!--	<div class="input-group date " >
                <input type="text" name="event_time" class="form-control form_time" placeholder="Date and Time *" value="{{ old('event_time') }}"/>  <span class="input-group-addon"><span class="glyphicon-time glyphicon"></span></span>
            </div>	<script>
$('.form_date').dateDropper();
</script>
<script>$( ".form_time" ).timeDropper();</script>	-->
		
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
 
<h4 class="text-center">CALL VENUE DIRECTLY</h4>
<h3 class="text-center">020 3733 8723</h3>
 </form>           
         </div>   
        </div> 
		<div class="row mt-15">
		 <h4 class="text-center"><i class="fa fa-commenting" aria-hidden="true"></i> <a href="{{ url('ask-a-venue-expert') }}">Ask a Venue Expert</a></h4>
		</div>
       </div>   
	<?php $cntval= count($venue_host);?> 
@if($cntval!=0)
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-15">
<div class="row ">
 <hr>
<h4 class="text-center">More spaces from the Host</h4>
<div class="morespaceshost"></div>
<div class="productlist">

@foreach($venue_host as $venue_host) 
		
@if($cntval==1)
<div class="col-sm-12 col-md-4 col-lg-4 list-view"></div>
<div class="col-sm-12 col-md-4 col-lg-4 list-view">
		<section class="corp_hire_similar mt-30">

		<div  class="carousel" >
		<ol class="carousel-indicators"><li data-target="#myCarousel1" data-slide-to="0" class=""></li></ol><a href="{{url('')}}/venue-details/{{$venue_host->v_id}}"><div class="carousel-inner corp_slider_similar" role="listbox"><div class="item active smil"><img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/{{$venue_host->image_1}}"  alt=""></div></div></a>
		</div>

			<div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom">
					<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center">
					<div class="row"><h3><a href="{{url('')}}/venue-details/{{$venue_host->v_id}}">{{$venue_host->title}}</a></h3>
					</div>
					</div>
<?php /*
					<div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="{{url('')}}venue-details/{{$venue_host->v_id}}">Get a Quate</a></h3></div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id="8">Enquiry</a></h3></div>
					
					*/?>
					
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per hour</p><p class="text-center">£{{$venue_host->per_hour}}</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per person</p><p class="text-center">£{{$venue_host->per_person}}	</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 "><div class="row"><p class="text-center">Per day</p><p class="text-center">£{{$venue_host->per_day}}</p></div></div>
					
					</div>
			</div>
		</section>
</div>
<div class="col-sm-12 col-md-4 col-lg-4 list-view"></div>
@elseif($cntval==2)

<div class="col-sm-12 col-md-4 col-lg-4 list-view">
		<section class="corp_hire_similar mt-30">

		<div  class="carousel" >
		<ol class="carousel-indicators"><li data-target="#myCarousel1" data-slide-to="0" class=""></li></ol><a href="{{url('')}}/venue-details/{{$venue_host->v_id}}"><div class="carousel-inner corp_slider_similar" role="listbox"><div class="item active smil"><img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/{{$venue_host->image_1}}"  alt=""></div></div></a>
		</div>

			<div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom">
					<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center">
					<div class="row"><h3><a href="{{url('')}}/venue-details/{{$venue_host->v_id}}">{{$venue_host->title}}</a></h3>
					</div>
					</div>
<?php /*
					<div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="{{url('')}}venue-details/{{$venue_host->v_id}}">Get a Quate</a></h3></div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id="8">Enquiry</a></h3></div>
					
					*/?>
					
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per hour</p><p class="text-center">£{{$venue_host->per_hour}}</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per person</p><p class="text-center">£{{$venue_host->per_person}}	</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 "><div class="row"><p class="text-center">Per day</p><p class="text-center">£{{$venue_host->per_day}}</p></div></div>
					
					</div>
			</div>
		</section>
</div>

@else
	<div class="col-sm-12 col-md-4 col-lg-4 list-view">
		<section class="corp_hire_similar mt-30">

		<div  class="carousel" >
		<ol class="carousel-indicators"><li data-target="#myCarousel1" data-slide-to="0" class=""></li></ol><a href="{{url('')}}/venue-details/{{$venue_host->v_id}}"><div class="carousel-inner corp_slider_similar" role="listbox"><div class="item active smil"><img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/{{$venue_host->image_1}}"  alt=""></div></div></a>
		</div>

			<div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom">
					<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center">
					<div class="row"><h3><a href="{{url('')}}/venue-details/{{$venue_host->v_id}}">{{$venue_host->title}}</a></h3>
					</div>
					</div>
<?php /*
					<div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="{{url('')}}venue-details/{{$venue_host->v_id}}">Get a Quate</a></h3></div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id="8">Enquiry</a></h3></div>
					
					*/?>
					
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per hour</p><p class="text-center">£{{$venue_host->per_hour}}</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per person</p><p class="text-center">£{{$venue_host->per_person}}	</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 "><div class="row"><p class="text-center">Per day</p><p class="text-center">£{{$venue_host->per_day}}</p></div></div>
					
					</div>
			</div>
		</section>
</div>
@endif 
@endforeach 

</div>
</div>


 </div> 
@endif 
 
</div>
  
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-15">
<?php /*@if(!$venue_similar->isEmpty())*/?>
<?php $cntvs=count($venue_similar);
?>
@if($cntvs!=0)
<div class="row ">
 <hr>
<h4 class="text-center">Similar Spaces</h4>
<div class="similarspaces"></div>

<div class="productlist">

@foreach($venue_similar as $venue_similar) 
		
@if($cntvs==1)
<div class="col-sm-12 col-md-4 col-lg-4 list-view"></div>		
<div class="col-sm-12 col-md-4 col-lg-4 list-view">
		<section class="corp_hire_similar mt-30">

		<div class="carousel" >
		<ol class="carousel-indicators"><li data-target="#myCarousel1" data-slide-to="0" class=""></li></ol><a href="{{url('')}}/venue-details/{{$venue_similar->v_id}}"><div class="carousel-inner corp_slider_similar" role="listbox"><div class="item active smil" style="display: flex">
		@if($venue_similar->image_1!='')
		<img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/{{$venue_similar->image_1}}"  alt=""style="margin:0 auto" >
	@else
		<img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/36862.jpg"  alt=""style="margin:0 auto" >
	@endif
	</div></div></a>
		</div>

			<div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom">
					<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center">
					<div class="row"><h3><a href="{{url('')}}/venue-details/{{$venue_similar->v_id}}">{{$venue_similar->title}}</a></h3>
					</div>
					</div>
<?php /*
					<div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="{{url('')}}venue-details/{{$venue_similar->v_id}}">Get a Quate</a></h3></div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id="8">Enquiry</a></h3></div>
					
					*/?>
					
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per hour</p><p class="text-center">£{{$venue_similar->per_hour}}</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per person</p><p class="text-center">£{{$venue_similar->per_person}}	</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 "><div class="row"><p class="text-center">Per day</p><p class="text-center">£{{$venue_similar->per_day}}</p></div></div>
					
					</div>
			</div>
		</section>
</div>
<div class="col-sm-12 col-md-4 col-lg-4 list-view"></div>	
@else
	<div class="col-sm-12 col-md-4 col-lg-4 list-view">
		<section class="corp_hire_similar mt-30">

		<div class="carousel" >
		<ol class="carousel-indicators"><li data-target="#myCarousel1" data-slide-to="0" class=""></li></ol><a href="{{url('')}}/venue-details/{{$venue_similar->v_id}}"><div class="carousel-inner corp_slider_similar" role="listbox"><div class="item active smil" style="display: flex">
		@if($venue_similar->image_1!='')
		<img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/{{$venue_similar->image_1}}"  alt=""style="margin:0 auto" >
	@else
		<img class="img-responsive" src="{{url('')}}/uploads/venue/thumbnail/36862.jpg"  alt=""style="margin:0 auto" >
	@endif
	</div></div></a>
		</div>

			<div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom">
					<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center">
					<div class="row"><h3><a href="{{url('')}}/venue-details/{{$venue_similar->v_id}}">{{$venue_similar->title}}</a></h3>
					</div>
					</div>
<?php /*
					<div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="{{url('')}}venue-details/{{$venue_similar->v_id}}">Get a Quate</a></h3></div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id="8">Enquiry</a></h3></div>
					
					*/?>
					
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per hour</p><p class="text-center">£{{$venue_similar->per_hour}}</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 border-right"><div class="row"><p class="text-center">Per person</p><p class="text-center">£{{$venue_similar->per_person}}	</p></div></div>
					<div class="col-sm-12 col-md-4 col-lg-4 "><div class="row"><p class="text-center">Per day</p><p class="text-center">£{{$venue_similar->per_day}}</p></div></div>
					
					</div>
			</div>
		</section>
</div>
@endif

@endforeach 

</div>



 </div> 
 @endif
</div>	
	   
      </div>
     </div>
    </div>
	</div>

<script>
$(document).ready(function(){
    $('#successMsg').hide();
	$('body').on('click', '#cartBtn', function () {
         var pro_id = $('#venue_id').val();
      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/addItem');?>/'+ pro_id,
        success:function(data){
			$('#min_cart').prepend('<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 rm'+data.rowId+'"><div class="btn-list"><img src="<?php echo url('');?>/uploads/venue/thumbnail/'+data.image+'" style="width:100%"><p style="margin:0px;">'+data.name+'</p><span class="delBtn" data-role="delete" id="'+data.rowId+'"><span class="glyphicon glyphicon-minus-sign"></span></span></div></div>')
	
		
		
		$('.cn_dis').removeClass( "cnt_hide" ).addClass( "cnt_show" );
		//$('.cn_dis').addClass( "cnt_show" );
		 $('#cont').text(data.cnt);
		 $('#my_venues').css('display','block');
		 $("body").animate({scrollTop:0}, '1000');
        $('#cartBtn').hide();
        $('#successMsg').show();
        $('#successMsg').append('Venue Shortlisted');
        }
      });

    });
   
});
</script>
@stop