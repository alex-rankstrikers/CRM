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
				 <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="content_desc">
                            <h3 style="color:#08c;">ADD VENUES</h3>
                            <div class="row mt-30 "></div>
                            <h4>Add a new venue here</h4>
                            <div class="row mt-30 "></div>
                            <p>Build a profile for your venue to display on Search Venue and target customer enquiries</p>
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 							
                        </div>
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
									
									<li><a href="#tab1" data-toggle="tab">OVERVIEW</a></li>
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
                       <div class="col-lg-3"></div>
                       <div class="col-lg-6" id="venue_form">
                            
                            
				
					
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
					    	{{ csrf_field() }}
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    
									<div class="form-group">
                                        <div class="col-sm-12"><label>Venue name *</label>
											<input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
											<span id="err_title" style="position: relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
                                    </div>
									<div class="form-group">
                                        <div class="col-sm-12"><label>Category *</label>
										
										<select name="category" id="category"  class="form-control category required" data-error="#err_category" >		
									<option value="">Choose category</option>									
										 @foreach ($Category as $Category)
										 <option value="{{ $Category->c_id }}">
										 {{ $Category->c_title }}
										 </option>
										 @endforeach
									 </select>											
											<span id="err_category" style="position: relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('category')) ? $errors->first('category') : ''}}</span>
										</div>
                                    </div>
									
									<div class="form-group">
                                        <div class="col-sm-12"><label>Venue Contact *</label>
										
										<select name="contact" id="contact"  class="form-control contact required" data-error="#err_contact" >		
									<option value="">Choose Contact</option>									
										 @foreach ($VenueContact as $VenueContact)
										 <option value="{{ $VenueContact->v_c_id }}">
										 {{ $VenueContact->title }}
										 </option>
										 @endforeach
									 </select>											
											<span id="err_contact" style="position: relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('contact')) ? $errors->first('contact') : ''}}</span>
										</div>
                                    </div>
									
									 <div class="form-group">
                                        <div class="col-sm-12"><label>Price *</label>
										<input name="price" id="price" type="text" class="form-control required" data-error="#err_price" >
										<span id="err_price" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('price')) ? $errors->first('price') : ''}}</span>
										</div>
                                    </div>
									
									<div class="form-group">
                                        <div class="col-sm-12" style="margin-bottom:5px;"><label>Per head </label>	
										<input type="checkbox" name="per_head" id="per_head" value="1"> Yes
										</div>
										
                                    </div>
									
                                
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                     <div class="form-group">                                        
                                        <div class="col-sm-12"><label>Venue Description (600 characters left) *</label>
                                            <textarea rows="15" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"></textarea>
											<span id="err_description" style=""></span>
											<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                        </div> 
                                    </div> 
                                    
                                </div>
								
</div>
<div class="col-sm-12 col-md-12 col-lg-12"></div> 
						
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
                                       <li class="col-lg-6 checkbox">
                                           <input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" data-error="#err_features"/>	 
                                            <label >{{ $VenueFeatures->title }}</label>
											<span id="err_features" style="position:relative;top: -2px;"></span>
                                        </li> 
										@endforeach
                                              
                                </ul>
								 <div class="col-lg-offset-4 col-lg-6 col-sm-offset-4 col-sm-6 col-md-offset-4 col-md-6 col-xs-12 add_feature_box">
                                     <input type="text" class="form-control" id="feature_name" name="add_feature" placeholder="Add a Feature">
                                     <div><i class="fa fa-plus listCheck" aria-hidden="true"></i></div>
                                </div> 
								 
					    </div>
						<div class="col-sm-12 col-md-12 col-lg-12"></div> 
						<!--//VENUE FOOD & DRINK-->
						<div class="tab-pane" id="tab4">
							
                                
                               <ul class="col-lg-12 listAppend">
							 @foreach ($VenueFoodDrink as $VenueFoodDrink)
                                       <li class="col-lg-6 checkbox">
                                           <input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" data-error="#err_fooddrink"/>		 
                                            <label >{{ $VenueFoodDrink->title }}</label>
											<span id="err_fooddrink" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
								 
					    </div>
						<div class="col-sm-12 col-md-12 col-lg-12"></div> 
						<!--//VENUE LICENSING-->
						
						<div class="tab-pane" id="tab5">
							 <ul class="col-lg-12 listAppend">
							 @foreach ($VenueLicensing as $VenueLicensing)
                                       <li class="col-lg-6 checkbox">
                                           <input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" data-error="#err_licensing"/>				 
                                            <label >{{ $VenueLicensing->title }}</label>
											<span id="err_licensing" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
							
					    </div>
						<div class="col-sm-12 col-md-12 col-lg-12"></div> 
							<!--//VENUE RESTRICTIONS-->
						<div class="tab-pane" id="tab6">
							 <ul class="col-lg-12 listAppend">
							 @foreach ($VenueRestrictions as $VenueRestrictions)
                                       <li class="col-lg-6 checkbox">
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
					  
							
					    </div>
						<div class="col-sm-12 col-md-12 col-lg-12"></div> 
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
				
                         
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row mt-30"></div> 
              <!--
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
	   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> </div>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"> <button type="button" class="btn btn-primary btn-center enqiry-button">Next</button></div> -->
	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
          
                                                      
                       </div>
                       <div class="col-lg-3"></div>
                    </div>
                </div><!-- Steps ends -->
                      
            </div>
            
        </div>
    </section>
	</form> 
	

	
	  <script>
	  //image_1:"Please choose atleast one image",image_1: {
		   //   required: true,		     
		 //   },
	$(document).ready(function() {
		var $validator = $("#commentForm").validate({		
		  rules: {
		    title: {
		      required: true,		    
		      minlength: 5
		    },category: {
		      required: true,
		    },
			contact: {
		      required: true,
		    },
			price: {
		      required: true,
		    }
			,
		    description: {
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
			title:"Please enter a title",
			title:"Please choose a category",			
			contact:"Please choose a venue cantact",			
			price:"Please enter a price",			
			description:"Please enter a description",			
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
