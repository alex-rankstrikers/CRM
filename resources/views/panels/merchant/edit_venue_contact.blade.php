@extends('layouts.main')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')

         <div class="row mt-30 "></div>
		 <div id="bar" class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 12.5%;"></div>
                    </div>
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
                            <h3 style="color:#08c;">EDIT VENUE CONTACT</h3>
                            <div class="row mt-30 "></div>
                           
						    <div class="col-md-2 col-xs-12"></div>
						   
                           <div class="col-md-8 col-xs-12">
								<div class="x_panel">
								
								 <div class="x_title">
								  </div>
								
   @foreach ($VenueContact as $VenueContact)
					
						
						
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 rm{{ $VenueContact->v_c_id }}">
						<div class="row mb-10 "></div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">
							
							
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-left mt-10">
							
							<p>{{ $VenueContact->title }}</p>
							<p>{{ $VenueContact->address1 }},{{ $VenueContact->address2 }}</p>
							<p>{{ $VenueContact->city }}</p>
							<p>{{ $VenueContact->states }}</p>
							
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="row mt-10">
							
                            <a href="javascript:void(0);" class="edit_blog btn btn-info btn-xs" id="{{ $VenueContact->v_c_id }}" ><i class="fa fa-pencil" style="color:#fff"></i> Edit </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs delete_blog" id="{{ $VenueContact->v_c_id }}"><i class="fa fa-trash-o"style="color:#fff"></i> Delete </a>
							
							</div>
							</div>
						</div>
						</div>
											  
                
					@endforeach
					<div class="row mt-30 "></div>
  
							</div>
					</div>
					
					
					 <div class="col-md-2 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
							
                        </div>
                    </div>
					<div class="row mt-30 "></div>
                           
						    <div class="col-md-4 col-xs-12"></div>
							 <form id="commentForm" action="{{url('merchant/updated-venue-contact')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />

						  {{ csrf_field() }}
						  <input type="hidden" value="" name="id" id="edit_id" />
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
										  @foreach ($editstates as $editstates)
										 <option value="{{ $editstates->id }}">
										 {{ $editstates->name }}
										 </option>
										 @endforeach
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
										 @foreach ($editcities as $editcities)
										 <option value="{{ $editcities->id }}">
										 {{ $editcities->name }}
										 </option>
										 @endforeach
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
	  <div class="row mt-30 "></div> 
	</form> 
	<script type="text/javascript">
// Get States
 $(document).on("change", ".country", getstates);
	function getstates(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('merchant/getstates/') }}";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
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
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('merchant/getcities') }}";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
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
	  
	

	
	  <script>

	// EDit Blog
 $(document).on("click", ".edit_blog", edit_venue);
	function edit_venue(){ 
	$('.edit_section').fadeIn('slow');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 

	var host="{{ url('merchant/get-venue-contact/') }}";
	$('#add_div').hide();
	$('#edit_div').fadeIn("slow");
	
	$(".editpro .alert-danger").addClass('hidden') ;
	$(".editpro .alert-success").addClass('hidden') ;
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:renderListform
	
	})
	return false;
}
function renderListform(res){ 
var url="{{ url('') }}";

//alert(result[0].view_details.image);
//var image_path=res.view_details.venue.image;

$('#edit_id').val(res.view_details.v_c_id);	
	$('#title').val(res.view_details.title);
	$('#country').val(res.view_details.c_id);
	$('#states').val(res.view_details.state);
	$('#cities').val(res.view_details.city); 
	$('#address1').val(res.view_details.address1);
	$('#address2').val(res.view_details.address2);
	$('#postcode').val(res.view_details.postcode);	
	$('#nearest_transport_link').val(res.view_details.nearest_transport_link);
		
}

 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
	
	 if (confirm("Are you sure delete venue contact?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('merchant/deleted-venue-contact/') }}";
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:deleteStatus
	
	})
	return false;
	  return false;
    }
}
function deleteStatus(res){ 

			var id=res.delete_details.deletedid;
			 $('.rm'+id).hide();
			$(".alert-success").html(res.delete_details.deletedtatus).removeClass('hidden');

			}
$(document).on("click", ".remove_image", remove_image);
	function remove_image(){ 
	
	 if (confirm("Are you sure delete remove image?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('merchant/venue/remove/') }}";
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:removeStatus
	
	})
	return false;
	  return false;
    }
}
function removeStatus(res){ 

			var id=res.delete_details.deletedid;
			 $('#image_'+id).hide();
			$(".alert-success").html(res.delete_details.deletedtatus).removeClass('hidden');

			}
		
	</script>
	<script type="text/javascript">
$(function() {
	var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;      
		
		 var myDropzone1 = new Dropzone("div#dropzoneEditFileUpload", {
            url: baseUrl + "/merchant/dropzone/uploadFiles",			
            params: {
                _token: token
            },
			autoProcessQueue: true,
			maxFilesize: 1000, // MB			
			maxFiles: 6,
			acceptedFiles: '.jpg, .jpeg',			
			addRemoveLinks: true,
			dictRemoveFile: "Remove",
        });
		});
	</script>
	<hr style="display:block;">
   @stop
