@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('assets/css/combined.css') }}">
@section('head')

@stop

@section('content')
@include('layouts.othermenu')

         <div class="row mt-30 "></div>
	
					<!--
        <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:42.84%"> </div>
                </div>-->
    
    <section>
        <div class="container-fluid">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3 style="color:#08c;">PAYMENT MODEL</h3>
                            <div class="row mt-30 "></div>
							<h4>Manage your payment method</h4>
							<div class="row mt-30 "></div>
							<p>How do you want to work with enquiries</p>
							<div class="row mt-30 "></div>
                           
						    <div class="col-md-2 col-xs-12"></div>
						   
                           <div class="col-md-8 col-xs-12">
								<div class="x_panel">
								
				 <form id="commentForm" action="" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
		 
								
   <div class="alert alert-success hidden" role="alert"></div>
   <div class="row mt-30 mb-30 "></div>
   <div class="col-md-6 col-xs-12"> 
  <h5 class="center" style="color: #08c;"> @if($user_payment_type->type==1) Current Plan @else &nbsp; @endif </h5>
<div id="free-box" class="box center" style="height: 488px;@if($user_payment_type->type==1)border: 1px solid#ccc;@endif">

					<h3>Basic</h3>
					<h4>2.5% <span>COMMISSION</span> <p>(On confirmed bookings only)</p></h4>
					<hr>
					<div class="free-content" style="height: 300px;">
						<ul>
							<li>£0 joining fee</li>
							<li>Commision on bookings only</li>
							<li>Tag your venue for relevant enquiries</li>							
							<li>Social media marketing</li>
							<li>Unlimited enquiries in ‘My Inbox’</li>
							<li>Add unlimited spaces</li>
							<li>Cancel or switch plan any time</li>
						</ul>
					</div>
<input id="toggle1" type="radio" name="types" class="update" value="1" @if($user_payment_type->type==1) checked @endif >
  <label for="toggle1">GO BASIC</label>
					<!--<button class="ux-button ux-button-action ng-binding" id="Tags_D_LJ_Plan_Free" ng-click="choosePlan('basic')">Get Started</button>-->
					<p>&nbsp;</p>
				</div>


   

  
   <!--
   <input type="radio" name="type" class="form-data" value="1" @if($user_payment_type->type==1) checked @endif >PAY PER LEAD-->
   <p>&nbsp;</p>
    <p class="text-justify">No contracts and no commission. Simply buy credit and purchase complete details of any lead that we've verified and made available on your user dashboard. We charge a fixed fee of £35 per lead and we'll share this information with other suitable venues in close proximity. </p>
   </div>
    <div class="col-md-6 col-xs-12">
	<h5 class="center" style="color: #08c;">@if($user_payment_type->type==2) Current Plan @else &nbsp;@endif</h5>
<div id="subscription-box" class="box center" style="@if($user_payment_type->type==2)border: 1px solid#ccc;@endif">

					<h3>Subscription</h3>
					<h4>£39/<span>MO</span> <p>(0% commission on unlimited bookings)</p></h4>
					<hr>
					<div class="subscription-content">
						<ul>
							<li>Basic Plan Features +</li>
							<li>'Call button' on your venue page</li>
							<li>Client contact details unlocked</li>
							<li>Social media marketing</li>
							<li>Unlimited enquiries in 'My Inbox'</li>
							<li>Add unlimited spaces</li>							
							<li>Perfect tags for optimal enquiries</li>						
							<li>Perfect your photos with our photographer</li>
							<li>Optional SMS notifications</li>
							<li>Cancel or switch plan any time</li>
						</ul>
						
					</div>
<input id="toggle2" type="radio" class="update" name="types" value="2" @if($user_payment_type->type==2) checked @endif>
  <label for="toggle2">GO UNLIMITED</label>
					<!--<button class="ux-button ux-button-action ng-binding" id="Tags_D_LJ_Plan_Premium" ng-click="choosePlan('subscription_49')">Get Started</button>-->					
				</div>

	
	
	
	<p>&nbsp;</p>
    <p class="text-justify">Our commission model allows users to access all available leads on our user dashboard. Search venue will act as a third party to negotiate the best deal for it clients. Venues choosing our commission plan will be charged a fixed percentage of the final sale value, usually 2-5%.  </p>
	</div>
    	 <div class="col-md-4 col-xs-12"></div>
		  <div class="col-md-4 col-xs-12">
		  <div class="row mt-30 "></div>
		  <div class="row mt-30 "></div>
					<input type="hidden" name="id" id="uid" value="{{ $user_payment_type->u_id}}">								
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					
					<div class="form-group">
<!--
					<input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>-->

					</div>
			</div>
		   <div class="col-md-4 col-xs-12"></div>
							
</form> 				  

								</div>
							</div>
					
					
					 <div class="col-md-2 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
						
                        </div>
                    </div>
					   
            </div>
            
        </div>
    </section>
	 <div class="row mt-30 "></div>
	  <div class="row mt-30 "></div> 

<script type="text/javascript">
	$(document).on("click", ".update", updates);
	function updates(){ 
 
var types = $("input[name='types']:checked").val(); 
 var id= $('#uid').val(); 
if(types==1)
{
   
 

	var host="{{ url('merchant/payment-updated/') }}";
	$.ajax({
		type: 'POST',
		data:{'id': id,'type': types,'_token':"{{ csrf_token() }}"},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:Status
	
	})
	return false;
	 
}else{
	
	window.location.href = 'payment';
}

} 
function Status(res){ 
			
			$(".alert-success").html(res.status).removeClass('hidden');
window.location.href ='';
			} 
</script>
<style>
input {
  position: absolute;
  left: -9999px;
}

label {
  display: block;
  position: relative;
  margin: 10px;
  padding: 10px ; 
  color: #fff;
  background-color: #08c; 
  white-space: nowrap;
  cursor: pointer;
  user-select: none;
  transition: background-color .2s, box-shadow .2s;
}

label::before {
 
  display: block;
  position: absolute;
  top: 10px;
  bottom: 10px;
  left: 10px;
  width: 22px;
  border-radius: 100px;

  transition: background-color .2s;
}


label:hover, input:focus + label {
  box-shadow: 0 0 20px rgba(0, 0, 0, .6);
}

input:checked + label {
  background-color: #6b6b6b;
}
/*
input:checked + label::before {  
   content: '✔';
  
} */
</style>
   @stop
