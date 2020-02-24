@extends('layouts.crm')

@section('head')

@stop

@section('content')

 <form id="commentForm" action="{{url('crm/update-user')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
{{ csrf_field() }}
        <div class="container">
          
                     
								<div class="x_panel">
								<div class="card mb-3">
							  <div class="card-header">								
								Edit User <a href="{{ url('crm/view-users') }}" style="float: right;">Back</a></div>
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	

  
								<div class="row">
									
					    	
								<div class="col-lg-6 col-md-7 offset-3" style="margin-top: 5%;" > 
								
 <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">First Name</label>
                          <div class="col-sm-6 col-md-8">
                           <input class="form-control" type="text" value="{{ $users->first_name}}" name="firstname" id="edit_firstname" value="{{ old('firstname') }}"/>
										<span class="error">{{ ($errors->has('firstname')) ? $errors->first('firstname') : ''}}</span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Last Name</label>
                          <div class="col-sm-6 col-md-8">
                            <input class="form-control" type="text" value="{{ $users->last_name}}" name="lastname" id="edit_lastname" value="{{ old('lastname') }}"/>
										<span class="error">{{ ($errors->has('lastname')) ? $errors->first('lastname') : ''}}</span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Email</label>
                          <div class="col-sm-6 col-md-8">
                            <input class="form-control" type="text" value="{{ $users->email}}" name="email" id="edit_email" value="{{ old('email') }}"/>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Password</label>
                          <div class="col-sm-6 col-md-8">
                            <input class="form-control" type="password" value="" name="password" id="edit_password" />
										<span class="error">{{ ($errors->has('password')) ? $errors->first('password') : ''}}</span>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Choose Business Name</label>
                          <div class="col-sm-6 col-md-8">
                            <select class="form-control"  name="hotel" id="hotel" />
                            	<option value="">Choose</option>
                            	@foreach($Hotelcorporatecontactbasic as $Hotel)
                            	<option value="{{$Hotel->hl_ccb_id}}">{{$Hotel->hl_business_name}}</option>
                            	@endforeach

                            </select>
										<span class="error">{{ ($errors->has('hotel')) ? $errors->first('hotel') : ''}}</span>
                          </div>
                        </div>


									
                              
							
								
							<input type="hidden" name="id" value="{{ $users->id}}">								
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="row mt-30 "></div>
								<div class="form-group">
								<div class="col-md-4 col-sm-4 col-xs-12 offset-4">						
								<input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>
								</div>
								</div>
					
					
					
                        </div>

                     
                    </div>
					   
      
            </div>
            
        </div>
         </div>     
	</form> 

	 

   @stop
