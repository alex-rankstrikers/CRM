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
								View User <a href="{{ url('crm/view-users') }}" style="float: right;">Back</a> </div>
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	

  
								<div class="row">
									
					    	
								<div class="col-lg-6 col-md-7 offset-3" style="margin-top: 5%;" > 
								
 <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">First Name</label>
                          <div class="col-sm-6 col-md-8" style="margin-top: 15px;">
                           {{ $users->first_name}}
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Last Name</label>
                          <div class="col-sm-6 col-md-8" style="margin-top: 15px;">
                            {{ $users->last_name}}
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Email</label>
                          <div class="col-sm-6 col-md-8" style="margin-top: 15px;">
                            {{ $users->email}}
										
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Business Name</label>
                          <div class="col-sm-6 col-md-8" style="margin-top: 15px;">
                          
                            	@foreach($Hotelcorporatecontactbasic as $Hotel)
                            	@if($users->business_id==$Hotel->hl_ccb_id)
                            	{{$Hotel->hl_business_name}}
                            	@endif
                            	@endforeach

                          </div>
                        </div>

                      <!--   <div class="form-group row">
                          <label class="col-sm-6 col-md-4 col-form-label">Password</label>
                          <div class="col-sm-6 col-md-8">
                            <input class="form-control" type="password" value="" name="password" id="edit_password" />
										<span class="error">{{ ($errors->has('password')) ? $errors->first('password') : ''}}</span>
                          </div>
                        </div> -->


									
                           
					
					
					
                        </div>

                     
                    </div>
					   
      
            </div>
            
        </div>
         </div>     
	</form> 

	 

   @stop
