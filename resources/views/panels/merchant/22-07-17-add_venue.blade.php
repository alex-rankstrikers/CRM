@extends('layouts.main')

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
	.error{color:#a01d1c;    margin: 0 !important;}
	hr{display:none;}
	
					  </style>
 <form id="commentForm" action="{{url('merchant/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                            <h3 style="color:#08c;">ADD VENUES</h3>
                            <div class="row mt-30 "></div>
                            <h4>Add a new venue here</h4>
                            <div class="row mt-30 "></div>
                            <p>Let customers know what style of Venue they can hire.  This will help target the right customers seeking event space you have to hire.</p>
							<p>You can multi-select any of the options below.</p>
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) <div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, thank you for adding your event space to Search Venue.  We’ll review your details now and make the listing live within 24 hours. Should we need any further information from you, we’ll contact you on the telephone number and email address provided. </div>@endif 							
                        </div>
                    </div>
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

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav navbar-nav" style="display: inline-block;">                      
                                  <!--  <li><a href="#">VENUE CAPACITY</a></li>
                                    <li><a href="#" class="active">FEATURES</a></li> -->
									
								<li><a href="#tab0" class="" data-toggle="tab">VENUE TYPE</a></li>
								<li><a href="#tab1" data-toggle="tab">CONTACT</a></li>
								<li><a href="#tab01" data-toggle="tab">OCCASION </a></li>
								<li><a href="#tab2" data-toggle="tab">CAPACITY</a></li>
								<li><a href="#tab3" data-toggle="tab">FEATURES</a></li>
								<li><a href="#tab4" data-toggle="tab">FOOD & DRINK</a></li>
								<li><a href="#tab5" data-toggle="tab">LICENSING</a></li>
								<li><a href="#tab6" data-toggle="tab">RESTRICTIONS</a></li>
								<li><a href="#tab7" data-toggle="tab">PICTURES</a></li>
				
						
                                                        
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
					<!--//VENUE Venue Type-->
						<div class="tab-pane" id="tab0">
							<ul class="col-lg-12 listAppend">
							 @foreach ($VenueType as $VenueType)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="venuetype[]" value="{{ $VenueType->id }}" data-error="#err_venuetype"/>	 
                                            <label >{{ $VenueType->title }}</label>
											<span id="err_venuetype" style="position:relative;top: -2px;"></span>
                                        </li> 
										@endforeach
                                              
                                </ul>
								 
							
					    </div>
						
						<!--//VENUE Contact Type-->
					    <div class="tab-pane" id="tab1">
					    	{{ csrf_field() }}
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Venue name *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
										
                                        <!-- <div class="col-sm-6"><label>U-Shape</label><input type="text" class="form-control"></div> -->
                                    </div>
									 <div class="form-group">
                                        <div class="col-sm-12"><label>Prices Starting From *</label><input name="price" id="price" type="text" class="form-control required" data-error="#err_price" >										
										<span id="err_price" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('price')) ? $errors->first('price') : ''}}</span>
										</div>
										
                                        <!-- <div class="col-sm-6"><label>U-Shape</label><input type="text" class="form-control"></div> -->
                                    </div>
 <div class="form-group">
                                        <div class="col-sm-12 mb-10">
										<input type="radio" name="per_head"  value="1"> Per person per hour
										<input type="radio" name="per_head"  value="2"> Per person per head
										<input type="radio" name="per_head" value="3"> Venue
										
										</div>
										
                                        <!-- <div class="col-sm-6"><label>U-Shape</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Address *</label><input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" >
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
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
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										</div>                                      
                                    </div>
									 <div class="form-group">
                                        <div class="col-sm-12"><label>States *</label><select name="states" id="states"  class="form-control states required" data-error="#err_states">
									    <option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span></div>                                     
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>City *</label><select name="cities" id="cities"  class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span></div>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Postcode *</label><input type="text" class="form-control required" name="postcode" id="postcode" value="{{ old('postcode') }}" data-error="#err_postcode">
										<span id="err_postcode" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										</div>
										
                                         
                                    </div>
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                     <div class="form-group mb-20">                                        
                                        <div class="col-sm-12 "><label>Venue Description (600 characters left) *</label>
                                            <textarea rows="26" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
											<span id="err_description" style="position:relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Nearest Transport Link *</label><input type="text" class="form-control required" name="nearest_transport_link" id="nearest_transport_link" value="{{ old('nearest_transport_link') }}" data-error="#err_nearest_transport_link">
										<span id="err_nearest_transport_link" style="position:relative;top: -2px;"></span>
										 <span class="error">{{ ($errors->has('nearest_transport_link')) ? $errors->first('nearest_transport_link') : ''}}</span>
										</div>
                                         <!-- <div class="col-sm-6"><label>Dinner/Dance</label><input type="text" class="form-control"></div>  -->
                                    </div>
									
                                    <div class="form-group">
                                        <div class="col-sm-12">&nbsp;</div>                                      
                                    </div>
                                     
                                </div>
								
					    </div>
						
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
							<ul class="col-lg-12 listAppend">
							 @foreach ($Category as $Category)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="category[]" value="{{ $Category->c_id }}" data-error="#err_category"/>	 
                                            <label >{{ $Category->c_title }}</label>
											<span id="err_category" style="position:relative;top: -2px;"></span>
                                        </li> 
										@endforeach
                                              
                                </ul>								
							
					    </div>

					 <!--//VENUE CAPACITY-->
					    <div class="tab-pane" id="tab2">
					<?php $i=1;  $val='';?>
								@foreach ($VenueCapacity as $VenueCapacity)
								<?php 	
									if ($i % 2 == 0)
									  {
									   $val='';
									  }
									  else
									  {
										$val='<div class="col-sm-2"></div>';
									  }
									?>
                                    <div class="col-sm-5" style="    min-height: 92px;">								
										<div class="form-group">
										<label>{{ $VenueCapacity->title }}</label><input type="hidden" name="capacity[]" value="{{ $VenueCapacity->id }}"  value="" /><input type="text" name="capacity_value[]" value="" class="form-control" data-error="#err_capacity_value"/>
										<span id="err_capacity_value" style="position:relative;top: -2px;"></span>										
										</div>
									 </div>                                 
                                <?php echo $val; $i++;?>
								@endforeach 
						
						
                                
					    </div>
						
						
						
						 <!--//VENUE FEATURES-->
						<div class="tab-pane" id="tab3">
							<ul class="col-lg-12 listAppend">
							 @foreach ($VenueFeatures as $VenueFeatures)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" data-error="#err_features"/>	 
                                            <label >{{ $VenueFeatures->title }}</label>
											<span id="err_features" style="position:relative;top: -2px;"></span>
                                        </li> 
										@endforeach
                                              
                                </ul>
								<?php /*
								 <div class="col-lg-offset-4 col-lg-6 col-sm-offset-4 col-sm-6 col-md-offset-4 col-md-6 col-xs-12 add_feature_box">
                                     <input type="text" class="form-control" id="feature_name" name="add_feature" placeholder="Add a Feature">
                                     <div><i class="fa fa-plus listCheck" aria-hidden="true"></i></div>
                                </div> */?> 
							
					    </div>
						<!--//VENUE FOOD & DRINK-->
						<div class="tab-pane" id="tab4">
							
                                
                               <ul class="col-lg-12 listAppend">
							 @foreach ($VenueFoodDrink as $VenueFoodDrink)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" data-error="#err_fooddrink"/>		 
                                            <label >{{ $VenueFoodDrink->title }}</label>
											<span id="err_fooddrink" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
								
					    </div>
						<!--//VENUE LICENSING-->
						
						<div class="tab-pane" id="tab5">
							 <ul class="col-lg-12 listAppend">
							 @foreach ($VenueLicensing as $VenueLicensing)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" data-error="#err_licensing"/>				 
                                            <label >{{ $VenueLicensing->title }}</label>
											<span id="err_licensing" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
							 
					    </div>
							<!--//VENUE RESTRICTIONS-->
						<div class="tab-pane" id="tab6">
							 <ul class="col-lg-12 listAppend">
							 @foreach ($VenueRestrictions as $VenueRestrictions)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="restrictions[]" value="{{ $VenueRestrictions->id }}" data-error="#err_restrictions"/>		 
                                            <label >{{ $VenueRestrictions->title }}</label>
											<span id="err_restrictions" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
							
					    </div>
						<!--//VENUE PICTURES-->
						
						<div class="tab-pane" id="tab7">
						<div class="dropzone" id="dropzoneFileUpload">
        </div>
					  <?php /*<div class="col-sm-4">
							<div id="cropContaineroutput" class="img-sz">
								
								</div>
									<input type="text" name="image_1"  id="cropOutput" data-error="#err_cropOutput" readonly/>
									<span id="err_cropOutput" style="position:relative;top: -2px;"></span>
						</div>
<div class="col-sm-4">
								<div id="cropContaineroutput1" class="img-sz">
								
								</div>
								
									<input type="text" name="image_2"  id="cropOutput1" />
									

		</div>
<div class="col-sm-4">
								<div id="cropContaineroutput2" class="img-sz">
								
								</div>
									<input type="text" name="image_3"  id="cropOutput2" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutput3" class="img-sz">
								
								</div>
									<input type="text" name="image_4"  id="cropOutput3" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutput4" class="img-sz">
								
								</div>
									<input type="text" name="image_5"  id="cropOutput4" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutput5" class="img-sz">
								
								</div>
									<input type="text" name="image_6"  id="cropOutput5" />
		</div>*/?>
							
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
                         
                  
              <!--
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
	   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> </div>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"> <button type="button" class="btn btn-primary btn-center enqiry-button">Next</button></div> -->
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
          
                                                      
                       </div>
                       <div class="col-lg-2"></div>
                    </div>
                </div><!-- Steps ends -->
                      
            </div>
            
        </div>
    </section>
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
	  //image_1:"Please choose atleast one image",image_1: {
		   //   required: true,		     
		 //   },
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
			price: {
		      required: true,
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
		    }
			,
		    description: {
		      required: true,		      
		    },
		    nearest_transport_link: {
		      required: true,
		      minlength: 3
		    },
			"category[]": {
		      required: true,		     
		    },
			 "capacity_value[]": {
		      required: true,		     
		    },
			"features[]": {
		      required: true,		     
		    },
			"fooddrink[]": {
		      required: true,		     
		    },
			"licensing[]": {
		      required: true,		     
		    },
			"restrictions[]": {
		      required: true,		     
		    },
			
			
		   
		  }  ,
			messages: {
			"venuetype[]": "Please choose atleast one venue type",
			title:"Please enter a title",
			price:"Please enter a price",
			address:"Please enter a address",
			country:"Please enter a country",
			states:"Please enter a state",
			cities:"Please enter a city",
			postcode:"Please enter a postcode",
			description:"Please enter a description",
			nearest_transport_link:"Please enter a nearest transport link",
			"category[]":"Please choose atleast one occasion",
			"capacity_value[]": "Please enter a capacity value",
			"features[]":"Please choose atleast one features",
			"fooddrink[]":"Please choose atleast one food and drink",
			"licensing[]":"Please choose atleast one licensing",
			"restrictions[]":"Please choose atleast one restrictions",
			
			
            
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
	
   
	</script>
	
	<script type="text/javascript">
$(function() {
	var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
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
