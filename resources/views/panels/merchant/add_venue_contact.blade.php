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
                            <h3 style="color:#08c;">Add Venue Contact</h3>
                            <div class="row mt-30 "></div>
                           
						    <div class="col-md-4 col-xs-12"></div>
						    <form id="commentForm" action="{{url('merchant/added-venue-contact')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
                           <div class="col-md-4 col-xs-12">
								<div class="x_panel">
								
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	
									
									
									<div class="form-group">
                                        <div class="col-sm-12"><label class="col-sm-4 control-label">Title *</label>
										
										<div class="col-sm-8"><input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control required" data-error="#err_title" >                                     
                                        <span class="error" style="position:relative;top: -10px;">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span> 
										</div>
										</div>
                                       
                                    </div>
									
								   <div class="form-group">
                                        <div class="col-sm-12"> <label class="col-sm-4 control-label">Address *</label>
										
										<div class="col-sm-8">
										<input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" >
										<span class="error" style="position:relative;top: -10px;">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
                                        <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" >
                                        
										</div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label class="col-sm-4 control-label">Country *</label>
										<div class="col-sm-8"><select name="country" id="country"  class="form-control country required" data-error="#err_country" >		
									<option value="">Choose Country</option>									
										 @foreach ($country as $country)
										 <option value="{{ $country->id }}">
										 {{ $country->name }}
										 </option>
										 @endforeach
									 </select>									
									 <span class="error" style="position:relative;top: -10px;">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										</div>
                                      </div>
                                    </div>
									 <div class="form-group">
                                        <div class="col-sm-12"><label  class="col-sm-4 control-label">States *</label>
										<div class="col-sm-8"><select name="states" id="states"  class="form-control states required" data-error="#err_states">
									    <option value="">
										 ---Choose---
										 </option>
									 </select>								 
                                    
										<span class="error" style="position:relative;top: -10px;">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span>
										</div>
										</div>
                                     
									 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label  class="col-sm-4 control-label">City *</label>
										<div class="col-sm-8">
										<select name="cities" id="cities"  class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                    
										<span class="error" style="position:relative;top: -10px;">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span>
										</div>
										</div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label  class="col-sm-4 control-label">Postcode *</label>
										<div class="col-sm-8">
										<input type="text" class="form-control required" name="postcode" id="postcode" value="{{ old('postcode') }}" data-error="#err_postcode">
									<span class="error" style="position:relative;top: -10px;">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										</div>
										</div>										
                                    </div>
									<div class="form-group">
                                        <div class="col-sm-12">
										<label  class="col-sm-4 control-label">Nearest transport link *</label>
										<div class="col-sm-8">
										<input type="text" class="form-control required" name="nearest_transport_link" id="nearest_transport_link" value="{{ old('nearest_transport_link') }}" data-error="#err_nearest_transport_link">
										
										<span class="error" style="position:relative;top: -10px;">{{ ($errors->has('nearest_transport_link')) ? $errors->first('nearest_transport_link') : ''}}</span>
										</div>
										</div>										
                                    </div>
															
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="row mt-30 "></div>
									  <div class="form-group">
										<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">						
										  <input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>
										
										</div>
									  </div>
								  

								</div>
							</div>
					</form> 
					
					 <div class="col-md-4 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
						
                        </div>
                    </div>
					   
            </div>
            
        </div>
    </section>
	 <div class="row mt-30 "></div>
	  <div class="row mt-30 "></div> 
	

	 <script type="text/javascript">
// Get States
 $(document).on("change", ".country", getstates);
	function getstates(){ 

   var id= $(this).val(); 

	var host="{{ url('merchant/getstates/') }}";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':"{{ csrf_token() }}"},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:rendergetstates
	
	})
	return false;
}
function rendergetstates(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	  



// Get Sub Cities
 $(document).on("change", ".states", getcities);
	function getcities(){ 

   var id= $(this).val(); 

	var host="{{ url('merchant/getcities') }}";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':"{{ csrf_token() }}"},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:rendergetcities
	
	})
	return false;
}
function rendergetcities(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#cities').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#cities').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	
	  </script>

   @stop
