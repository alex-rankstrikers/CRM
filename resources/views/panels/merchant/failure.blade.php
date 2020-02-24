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
                            <h3 style="color:#08c;">PAYMENT MODEL</h3>
                            <div class="row mt-30 "></div>
							<h4>Manage your payment method</h4>
							<div class="row mt-30 "></div>
							<p>How do you want to work with enquiries</p>
							<div class="row mt-30 "></div>
                           
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
				 


    <div class="row">
        <div class="col-md-12  col-xs-12">
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
				
				
            <!--    <div class="panel-heading">Paywith Stripe</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{url('')}}/merchant/stripe" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('card_no') ? ' has-error' : '' }}">
                            <label for="card_no" class="col-md-4 control-label">Card No</label>
                            <div class="col-md-6">
                                <input id="card_no" type="text" class="form-control" name="card_no" value="{{ old('card_no') }}" autofocus>
                                @if ($errors->has('card_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryMonth') ? ' has-error' : '' }}">
                            <label for="ccExpiryMonth" class="col-md-4 control-label">Expiry Month</label>
                            <div class="col-md-6">
                                <input id="ccExpiryMonth" type="text" class="form-control" name="ccExpiryMonth" value="{{ old('ccExpiryMonth') }}" autofocus>
                                @if ($errors->has('ccExpiryMonth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccExpiryMonth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryYear') ? ' has-error' : '' }}">
                            <label for="ccExpiryYear" class="col-md-4 control-label">Expiry Year</label>
                            <div class="col-md-6">
                                <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="{{ old('ccExpiryYear') }}" autofocus>
                                @if ($errors->has('ccExpiryYear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccExpiryYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cvvNumber') ? ' has-error' : '' }}">
                            <label for="cvvNumber" class="col-md-4 control-label">CVV No.</label>
                            <div class="col-md-6">
                                <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('cvvNumber') }}" autofocus>
                                @if ($errors->has('cvvNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvvNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-center enqiry-button">
                                    Paywith Stripe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>-->
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
