@extends('layouts.main')

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
                            
                            <div class="row mt-30 "></div>
							
							<div class="row mt-30 "></div>
                           
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
				 


    <div class="row">
        <div class="col-md-12  col-xs-12">
            <div class="panel panel-default">
             
				
			
				<div class="panel-heading"><h3 style="color:#08c;">Leads Details</h3></div>
				
				@if($payment_details)
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{url('')}}/merchant/stripe" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('card_no') ? ' has-error' : '' }}">
                            <label for="card_no" class="col-md-6 control-label">Name</label>
                           
							 <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">{{$leads->name}}</label>
                            
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryMonth') ? ' has-error' : '' }}">
                            <label for="ccExpiryMonth" class="col-md-6 control-label">Phone</label>
                           <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                                {{$leads->phone}} 
                            </label>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryYear') ? ' has-error' : '' }}">
                            <label for="ccExpiryYear" class="col-md-6 control-label">Email</label>
                            <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                               	{{$leads->email}}
                            </label>
                        </div>
                        <div class="form-group{{ $errors->has('cvvNumber') ? ' has-error' : '' }}">
                            <label for="cvvNumber" class="col-md-6 control-label">	Event date</label>
                            <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                              {{$leads->event_date}}
                            </label>
                        </div>
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-6 control-label">	Event time</label>
                            <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                                	{{$leads->event_time}}
                            </label>
                        </div>
						
						 <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-6 control-label">	Number of Guest </label>
                            <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                                	{{$leads->no_of_guest}}
                            </label>
                        </div>
						
						 <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-6 control-label">	Budget per head</label>
                            <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                                	{{$leads->bph}}
                           </label>
                        </div>
						
						 <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-6 control-label">	Additional details</label>
                            <label for="card_no" class="col-md-6 control-label text-left" style="text-align:left">
                                	{{$leads->specific_req}}
                            </label>
                        </div>
                        
                        
                    </form>
                </div>
				@else
				<div class="panel-body">
                    <h3 style="color:#08c;">Your Subscription is Expired</h3>
                </div>
				@endif
				
            </div>
		
			
            
        </div>
    </div>

				 

								</div>
							</div>
					
					
					 <div class="col-md-3 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
						
                        </div>
                    </div>
					   
            </div>
            
        </div>
    </section>
	 <div class="row mt-30 "></div>
	  <div class="row mt-30 "></div> 


	  

   @stop
