@extends('layouts.crm')

@section('head')

@stop

@section('content')

 <form id="commentForm" action="{{url('crm/passupdated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>PASSWORD</h3>
                           <div class="card mb-3">
							  <div class="card-header">
								<i class="fa fa-key" aria-hidden="true"></i>

								Update Password</div>
                           
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	
    <div class="form-group">
                                    <label class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="password" id="edit_password" value="{{ old('password') }}"/>
										<span class="error">{{ ($errors->has('password')) ? $errors->first('password') : ''}}</span>
                                    </div>
                                </div><div class="row mt-30 "></div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">Confirm Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="cpassword" id="edit_cpassword" value="{{ old('cpassword') }}"/>
										<span class="error">{{ ($errors->has('cpassword')) ? $errors->first('cpassword') : ''}}</span>
                                    </div>
                                </div>
								
								  							
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="id" value="{{ Auth::user()->id }}">
								<div class="row mt-30 "></div>
									  <div class="form-group">
										<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">						
										  <input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>
										
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
        </div>
</div>
	</form> 


   @stop
