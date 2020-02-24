@extends('layouts.hotelier')

@section('head')

@stop

@section('content')

	<style>
	.croppedImg{width:180px;}
	.img-sz{width: 180px; min-height: 100px;
	background: #ccc;   
	margin-bottom: 10px;
	}
	.error{color:#a01d1c;}
	hr{display:none;}
	.label-info{ background:none !important}
	.label{ color:#807b7b !important}
	</style>
 <form id="commentForm" action="{{url('merchant/add-room')}}/{{$hid}}/added" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
       
        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>ADD ROOM</h3>                            
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, thank you for adding your room to TBBC.  We’ll review your details now and make the listing live within 24 hours. Should we need any further information from you, we’ll contact you on the telephone number and email address provided. </div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
                    <div class="row">
                        <nav class="navbar navbar-default" role="navigation">
                         <div class="container">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
							
                                  <ul class="nav navbar-nav" style="display: inline-block; margin-top: 10px;">                    
								<li><a href="#tab1" data-toggle="tab">Overview</a></li>	
								<!-- <li><a href="#tab01" data-toggle="tab">Befefits </a></li>
								<li><a href="#tab2" data-toggle="tab">Amenities</a></li>
								<li><a href="#tab02" data-toggle="tab">Meeting & Events</a></li>
								<li><a href="#tab03" data-toggle="tab">Business</a></li>
								<li><a href="#tab3" data-toggle="tab">Features</a></li>
								<li><a href="#tab4" data-toggle="tab">Food & Drink</a></li>
								<li><a href="#tab5" data-toggle="tab">Licensing</a></li>
								<li><a href="#tab6" data-toggle="tab">Nature Day Light</a></li>
								<li><a href="#tab7" data-toggle="tab">Capacity Chart</a></li> -->
								<li><a href="#tab8" data-toggle="tab">Photos</a></li>
								
				
						
                                                        
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
						<style type="text/css">
							.tab-pane{ min-height: 300px; }
							.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{padding: 3px;}
						</style>
					<!--//VENUE Venue Type-->
				
						<!--//VENUE Contact Type-->
						<!--//VENUE Contact Type-->
					    <div class="tab-pane" id="tab1">
					    	{{ csrf_field() }}
                                <input type="hidden" name="hotel_id" value="{{$hid}}">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Title *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
										
                                        <!-- <div class="col-sm-6"><label>U-Shape</label><input type="text" class="form-control"></div> -->
                                    </div>

                                    	<div class="form-group">
                                        <div class="col-sm-12">
										<label>Number guest *</label>
										
										<input type="text" class="form-control required" name="guest" id="guest" value="{{ old('guest') }}" data-error="#err_guest">
									<span class="error" id="err_guest" style="position:relative;top: -10px;">{{ ($errors->has('guest')) ? $errors->first('guest') : ''}}</span>
										
										</div>										
                                    </div>

                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label>Number beds *</label>
										
										<input type="text" class="form-control required" name="bed" id="bed" value="{{ old('bed') }}" data-error="#err_bed">
									<span class="error" id="err_bed" style="position:relative;top: -10px;">{{ ($errors->has('bed')) ? $errors->first('bed') : ''}}</span>
										
										</div>										
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label>Room feet *</label>
										
										<input type="text" class="form-control required" name="feet" id="feet" value="{{ old('feet') }}" data-error="#err_feet">
									<span class="error" id="err_feet" style="position:relative;top: -10px;">{{ ($errors->has('feet')) ? $errors->first('feet') : ''}}</span>
										
										</div>										
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label>Deposit *</label>
										
										<input type="text" class="form-control required" name="deposit" id="deposit" value="{{ old('deposit') }}" data-error="#err_deposit">
									<span class="error" id="err_deposit" style="position:relative;top: -10px;">{{ ($errors->has('deposit')) ? $errors->first('deposit') : ''}}</span>
										
										</div>										
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label>Cancellation  *</label>
										
										<input type="text" class="form-control required" name="cancellation" id="cancellation" value="{{ old('cancellation') }}" data-error="#err_cancellation">
									<span class="error" id="err_cancellation" style="position:relative;top: -10px;">{{ ($errors->has('cancellation')) ? $errors->first('cancellation') : ''}}</span>
										
										</div>										
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
										<label>Breakfast *</label>
										
										<input type="text" class="form-control required" name="breakfast" id="breakfast" value="{{ old('breakfast') }}" data-error="#err_breakfast">
									<span class="error" id="err_breakfast" style="position:relative;top: -10px;">{{ ($errors->has('breakfast')) ? $errors->first('breakfast') : ''}}</span>
										
										</div>										
                                    </div>
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                	<div class="form-group">
                                        <div class="col-sm-12"><label>Price *</label><input name="price" id="price" type="text" class="form-control required" data-error="#err_price" >
										<span id="err_price" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('price')) ? $errors->first('price') : ''}}</span>
										</div>										
                                      
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Booking Link *</label><input name="web_link" id="web_link" type="text" class="form-control required" data-error="#err_web_link" >
										<span id="err_web_link" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('web_link')) ? $errors->first('web_link') : ''}}</span>
										</div>										
                                      
                                    </div>
							
                                     <div class="form-group mb-20">                                        
                                        <div class="col-sm-12 mb-8"><label>Room Description (600 characters left) *</label>
                                            <textarea rows="18" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
											<span id="err_description" style="position:relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                        </div> 
                                    </div>
                                    
									
                                    <div class="form-group">
                                        <div class="col-sm-12">&nbsp;</div>                                      
                                    </div>
                                     
                                </div>
								
					    </div>			   
						
						
					    
						<!--//ROOM PICTURES-->
						
						<div class="tab-pane" id="tab8">				
							
							
							<div class="dropzone" id="dropzoneFileUpload">
							<div class="dz-message" data-dz-message><span>Drog and Drop Images Here</span></div>
							<div class="dz-message" data-dz-message><span>Maximum 6 images only, minimum width:1024px </span></div>
							</div>							
					    </div>
					   <div class="col-sm-12 col-md-12 col-lg-12 mb-10">&nbsp;</div> 
						<ul class="pager wizard">
						<li class="previous first" ><a href="javascript:;" style="display:none;">First</a></li>
							<li class="previous"><a href="javascript:;">Previous</a></li>
							<li class="next last"><a href="javascript:;" style="display:none;">Last</a></li>
						  	<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right next-btn" style=""></li>
							<li class="finish"><input type="submit" value="Finish" class="btn btn-primary pull-right next-btn" style=""></li>							
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
		    title: {
		      required: true,		    
		      minlength: 5
		    },
			per_hour: {
		      required: true,
		    },
			per_person: {
		      required: true,
		    },
			per_day: {
		      required: true,
		    },		   
			"category[]": {
		      required: true,		     
		    },
			/* "capacity_value[]": {
		      required: true,		     
		    },*/
			"features[]": {
		      required: true,		     
		    },	
			
		   
		  }  ,
			messages: {			
			title:"Please enter a title",
			per_hour:"Please enter a price per hour",
			per_person:"Please enter a price per person",
			per_day:"Please enter a price per day",			
			"category[]":"Please choose atleast one occasion",
			/*"capacity_value[]": "Please enter a capacity value",*/
			"features[]":"Please choose atleast one features",
			
			
			
            
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
	
   @stop
