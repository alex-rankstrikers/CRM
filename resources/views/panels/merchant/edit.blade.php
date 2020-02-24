@extends('layouts.merchant_main')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')
<style>
					  .croppedImg{width:180px;}
					  .img-sz{width: 180px; min-height: 100px;
    background: #ccc;   
    margin-bottom: 10px;
    }
	.error{color:#a01d1c;}
	hr{display:none;}
	
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{    padding: 4px!important;
    line-height: 1!important;
    vertical-align: middle !important;}
	td,th{text-align:center;}	
	
	.checkbox{margin:0!important;}
	.previous{display:none !important;}

					  </style>
 <form id="commentForm" action="{{url('merchant/updated-venue-contact')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>
    
    <section>
        <div class="container-fluid">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3 >EDIT VENUES</h3>
                            <div class="row mt-30 "></div>
                           
						
					
					
                           
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 							
                        </div>
                    </div>
					<section class="edit_section" >
                    <div class="row">
                        <nav class="navbar navbar-default" role="navigation">
                         <div class="container">
                         <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>                      
                            </div>

                          
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav navbar-nav" style="display: inline-block;">    
									<li><a href="#tab0" data-toggle="tab">VENUE TYPE</a></li>
								<li><a href="#tab1" data-toggle="tab">CONTACT</a></li>					
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                          </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row">
                       <div class="col-lg-2"></div>
                       <div class="col-lg-8" id="venue_form">
                            
                            <div >
				
					
					<div class="tab-content">
					
					<!--//VENUE Contact Type-->
					
					<div class="tab-pane" id="tab0">
					 <div class="col-sm-12 col-md-12 col-lg-12">
						<h4>Venue Type</h4>					 
                            <div class="row mt-20 "></div>
                            <p>Let customers know what style of Venue they can hire.  This will help target the right customers seeking event space you have to hire.</p>
							<div class="row mt-20 "></div>
							<p>You can multi-select any of the options below.</p>
                            <div class="row mt-20 mb-20 "></div>  
							</div> 
							
		<p id="err_venuetype" style="position:relative;top: -2px;"></p>	
		
							<ul class="col-lg-12 listAppend" id="uvtype">
							 @foreach ($VenueType as $VenueType)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="venuetype[]" value="{{ $VenueType->id }}" data-error="#err_venuetype"/>	 
                                            <label >{{ $VenueType->title }}</label>
											
                                        </li> 
										@endforeach
                                              
                                </ul>
								 
							
					    </div>
						
				
					    <div class="tab-pane" id="tab1">
						<div class="col-sm-12 col-md-12 col-lg-12">
						<h4>Contact & Venue Description</h4>					 
                            <div class="row mt-20 "></div>
							<p>What should my venue description be?</p>
							<div class="row mt-20 "></div>
                            <p>It's important to stay true to your brand and mindful of what words your target customers will be interested in and what makes your venue different. For example, if one of the best features of your venue is its proximity to the airport, you should highlight that in the first sentence or two. The information completed here will be available to potential customers. Including a price that is honest and competitive will yield the most interest in searches.</p>
							<div class="row mt-20 "></div>							
							</div>
					    	{{ csrf_field() }}
							<input type="hidden" value="" name="id" id="edit_id" />
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Venue name *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
                                    </div>
																	
                                 <div class="form-group">
                                        <div class="col-sm-12"> <label>Address *</label>									
										<input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" >
										<span class="error" id="err_address1" style="position:relative;top: -10px;">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
                                        <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" >
                                        
										
                                       </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Country *</label>
										<select name="country" id="country"  class="form-control country required" data-error="#err_country" >		
									<option value="">Choose Country</option>									
										 @foreach ($country as $country)
										 <option value="{{ $country->id }}">
										 {{ $country->name }}
										 </option>
										 @endforeach
									 </select>									
									 <span class="error" id="err_country" style="position:relative;top: -10px;">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										
                                      </div>
                                    </div>
									 <div class="form-group">
                                        <div class="col-sm-12"><label>States *</label>
										<select name="states" id="states"  class="form-control states required" data-error="#err_states">
									    <option value="">
										 ---Choose---
										 </option>
										  @foreach ($editstates as $editstates)
										 <option value="{{ $editstates->id }}">
										 {{ $editstates->name }}
										 </option>
										 @endforeach
									 </select>								 
                                    
										<span id="err_states" class="error" style="position:relative;top: -10px;">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span>
										
										</div>
                                     
									 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>City *</label>
										
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
                                    
										<span class="error" id="err_cities" style="position:relative;top: -10px;">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span>										
										</div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label>Postcode *</label>
										
										<input type="text" class="form-control required" name="postcode" id="postcode" value="{{ old('postcode') }}" data-error="#err_postcode">
									<span class="error " id="err_postcode" style="position:relative;top: -10px;">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										
										</div>										
                                    </div>
									
									
									
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6 ">
								<div class="form-group">
                                        <div class="col-sm-12">
										<label>Contact Number *</label>
										
										<input type="text" class="form-control required" name="contact_no" id="contact_no" value="{{ old('contact_no') }}" data-error="#err_contact_no">
									<span class="error" id="err_contact_no" style="position:relative;top: -10px;">{{ ($errors->has('contact_no')) ? $errors->first('contact_no') : ''}}</span>
										
										</div>										
                                    </div>
                                     <div class="form-group mb-20">                                        
                                        <div class="col-sm-12 mb-8"><label>Venue Description (600 characters left) *</label>
                                            <textarea rows="16" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
											<span id="err_description" style="position:relative;top: -2px;"></span>
											<span class="error" id="err_description">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label  >Nearest transport link *</label>
										
										<input type="text" class="form-control required" name="nearest_transport_link" id="nearest_transport_link" value="{{ old('nearest_transport_link') }}" data-error="#err_nearest_transport_link">
										
										<span class="error" id="err_nearest_transport_link" style="position:relative;top: -10px;">{{ ($errors->has('nearest_transport_link')) ? $errors->first('nearest_transport_link') : ''}}</span>
										
										</div>										
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">&nbsp;</div>                                      
                                    </div>
                                     
                                </div>
								
					    </div>					
						
						<div class="col-sm-12 col-md-12 col-lg-12 mb-10">&nbsp;</div> 
						<ul class="pager wizard">
						<li class="previous first" ><a href="javascript:;" style="display:none;">First</a></li>
							<li class="previous"><a href="javascript:;">Previous</a></li>
							<li class="next last"><a href="javascript:;" style="display:none;">Last</a></li>
						  	<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right" style="width:12%"></li>
							<li class="finish"><input type="submit" value="Finish" class="btn btn-primary pull-right" style="width:12%"></li>
							<?php /*
							
							<li class="previous first" style="display:none;" ><a href="#">First</a></li>
							<li class="previous"><a href="#" >Previous</a></li>
							<li class="next last" style="display:none;"><a href="#" >Last</a></li>
						  	<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right" style="width:12%"></li>
							<li class="finish"><a href="javascript:;">Finish</a></li>*/?>
						</ul>
					</div>
				</div>
                         
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row mt-30"></div> 
              <!--
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
	   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> </div>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"> <button type="button" class="btn btn-primary btn-center enqiry-button">Next</button></div> -->
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
          
                                                      
                       </div>
                       <div class="col-lg-2"></div>
                    </div>

                </div><!-- Steps ends -->
               <section>       
            </div>
            
        </div>
    </section>
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
	$(document).ready(function() {
		var $validator = $("#commentForm").validate({		
		  rules: {
			  "venuetype[]": {
		      required: true,		     
		    },
		    title: {
		      required: true,		    
		      minlength: 5
		    },
		    address: {
		      required: true,
		      minlength: 3
		    },
		    country: {
		      required: true,		      
		    },
		    states: {
		      required: true,		     
		    },
		    cities: {
		      required: true,		     
		    },
		    postcode: {
		      required: true,		     
		    },
			contact_no: {
		      required: true,		     
		    }			
			,
		    description: {
		      required: true,		      
		    },
		    nearest_transport_link: {
		      required: true,
		      minlength: 3
		    }	
			
		   
		  }  ,
			messages: {
			"venuetype[]": "Please choose atleast one venue type",
			title:"Please enter a title",		
			address:"Please enter a address",
			country:"Please enter a country",
			states:"Please enter a state",
			cities:"Please enter a city",
			postcode:"Please enter a postcode",
			contact_no:"Please enter a contact no",			
			description:"Please enter a description",
			nearest_transport_link:"Please enter a nearest transport link",		
			
			
            
        }, errorPlacement: function(error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
		return true;
      } else {
        error.insertAfter(element);
		return false;
      }
		}, submitHandler: function(form) {
                form.submit();
            }
		
		});

	  	$('#rootwizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  			var $valid = $("#commentForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}else{
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				$('.progress-bar').css({width:$percent+'%'});
				}
	  		}
	  	});		
		window.prettyPrint && prettyPrint()
	});
	
	
	
	
	
	// EDit Blog

	$('.edit_section').fadeIn('slow');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= {{ $venue->	v_c_id }}; 

	var host="{{ url('merchant/getvenue/') }}";
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


function renderListform(res){ 
var url="{{ url('') }}";

//alert(result[0].view_details.image);
//var image_path=res.view_details.venue.image;

$('#edit_id').val(res.view_details.venue.v_c_id);	
	$('#title').val(res.view_details.venue.title);
	$('#contact').val(res.view_details.venue.venue_c_id);	
	$('#price').val(res.view_details.venue.price);
	$('#country').val(res.view_details.venue.c_id);
	$('#states').val(res.view_details.venue.state);
	$('#cities').val(res.view_details.venue.city); 
	$('#address1').val(res.view_details.venue.address1);
	$('#address2').val(res.view_details.venue.address2);
	$('#postcode').val(res.view_details.venue.postcode);
	$('#contact_no').val(res.view_details.venue.contact_no);	
	$('#nearest_transport_link').val(res.view_details.venue.nearest_transport_link);
	$('#description').val(res.view_details.venue.description);	
	$('#uvtype input').filter(':checkbox').prop('checked',false);
	$.each(res.view_details.user_venue_type, function(index, data) { 		
			$('#uvtype input[value='+data.venuetype_id+']').filter(':checkbox').prop('checked',true);	      
        });
				
}

 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
	
	 if (confirm("Are you sure delete venue?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('merchant/deleted/') }}";
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
