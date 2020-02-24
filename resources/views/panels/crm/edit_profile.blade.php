@extends('layouts.crm')

@section('head')

@stop

@section('content')
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
 <form id="commentForm" action="{{url('crm/profileupdated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>PROFILE</h3>
                            
						    
						   
                           <div class="col-md-6 col-xs-12" style="margin-top:35px;">
								<div class="x_panel">
								<div class="card mb-3">
							  <div class="card-header">
								<i class="fas fa-edit"></i>
								Edit Profile</div>
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	
    <div class="form-group">
                                    <label class="col-sm-4 control-label">  First Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->first_name}}" name="firstname" id="edit_firstname" value="{{ old('firstname') }}"/>
										<span class="error">{{ ($errors->has('firstname')) ? $errors->first('firstname') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">  Last Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->last_name}}" name="lastname" id="edit_lastname" value="{{ old('lastname') }}"/>
										<span class="error">{{ ($errors->has('lastname')) ? $errors->first('lastname') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label ">Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->email}}" name="email" id="edit_email" value="{{ old('email') }}"/>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
                                    </div>
                                </div>

                                <input type="hidden" name="hle_timezone_hid" id="hle_timezone_hid" value="{{ $users->timezone }}">
				   <?php
				  $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
				  $cntv = count($tzlist);
				  ?>
				<div class="form-group">
				   <label class="col-sm-4 control-label ">Timezone</label>
				   <div class="col-sm-6">
				   	<select class="form-control js-example-basic-single w-100" name="timezone" id="timezone" >
				   	  @for($ff=0;$ff<$cntv;$ff++)
					  <option value="{{ $tzlist[$ff] }}" >{{ $tzlist[$ff]  }}</option>
					  @endfor
					</select>
				   </div>
				  </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label ">Location</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->location}}" name="location" id="location" value="{{ old('location') }}"/>
										<span class="error">{{ ($errors->has('location')) ? $errors->first('location') : ''}}</span>
                                    </div>
                                </div>				
								
							<input type="hidden" name="id" value="{{ $users->id}}">								
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="row mt-30 "></div>
									  <div class="form-group">
										<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">						
										  <input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>
										
										</div>
									  </div>
								  

								</div>
							</div>
					
					
					
                        </div>
                    </div>
					   
            </div>
            </div>
            
        </div>   
	</form> 
  <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
	 
<script>
   $(document).ready(function(){
	var time_zone=$("#hle_timezone_hid").val();
	$('#timezone').val(time_zone).trigger('change');
});
</script>
   @stop
