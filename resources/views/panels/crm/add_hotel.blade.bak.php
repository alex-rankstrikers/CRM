@extends('layouts.crm')

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
		.cform
		{
			padding:10px;
			border:1px solid rgba(0, 0, 0, 0.125);
			margin:5px;
		}
		.firstrow{
			flex-direction: row;
			display: flex;
			align-items: center;
			justify-content: center;
		}
					  </style>
 <form id="commentForm" action="{{url('crm/hotel/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>	
    

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>HOTEL LEADS</h3>                            
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, hotel details has been successfully added.</div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
					<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Add Hotel Leads</div>
          <div class="card-body">
         
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="navbar-pills" id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav nav-tabs new" style="margin-top: 10px;">                    
								<li><a href="#tab1" class="active" data-toggle="tab">Hotel Information</a></li>	
								<li><a href="#tab01" data-toggle="tab">Hotel Contact </a></li>
								
								
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                         
					              
					
					<div class="tab-content" style="margin-top:35px;">
						
					
					    <div class="tab-pane active" id="tab1">
					    	{{ csrf_field() }}
                                <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Hotel Type *</label><select name="hotel_type" id="hotel_type" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" ><option value="Group/Chain">Group/Chain</option><option value="Independent">Independent</option></select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('hotel_type')) ? $errors->first('hotel_type') : ''}}</span>
										</div>
										</div>
										<div class="form-group">
										<div class="col-sm-12" id="grp_sec"><label>Group name *</label><input name="grp_name" id="grp_name" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
										</div>
										</div>
										<div class="form-group">
										<div class="col-sm-12"><label>Hotel name *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
										
                                        </div>

                                     <div class="form-group">
                                        <div class="col-sm-12"><label>Address *</label><input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
										</div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Country *</label>
										<select name="country" id="country"  class="form-control country js-example-basic-multiple w-100" style="width: 100%" data-error="#err_country" >		
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
                                        <div class="col-sm-12"><label>States *</label><select name="states" id="states"  class="form-control states js-example-basic-multiple w-100" style="width: 100%" data-error="#err_states">
									    <option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span></div>                                     
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>City *</label><select name="cities" id="cities"  class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span></div>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    
									
									
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
                                        <div class="col-sm-12"><label>Postcode *</label><input type="text" class="form-control required" name="postcode" id="postcode" value="{{ old('postcode') }}" data-error="#err_postcode">
										<span id="err_postcode" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										</div>
										
                                         
                                    </div>
									
								<div class="form-group">
                                        <div class="col-sm-12"><label>Website *</label><input type="text" class="form-control required" name="website" id="website" value="{{ old('postcode') }}" data-error="#website">
										<span id="website" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('website') : ''}}</span>
										</div>
										
                                         
                                    </div>
                                    	<div class="form-group">
                                        <div class="col-sm-12">
										<label>Contact Number *</label>
										
										<input type="tel" class="form-control required" name="contact_no" id="contact_no" value="{{ old('contact_no') }}" data-error="#err_contact_no">
									<span class="error" id="err_contact_no" style="position:relative;top: -10px;">{{ ($errors->has('err_contact_no')) ? $errors->first('err_contact_no') : ''}}</span>
										
										</div>										
                                    </div>
                                	<div class="form-group">
                                        <div class="col-sm-12"><label>No of Room *</label><input name="no_of_room" id="no_of_room" type="text" class="form-control required" data-error="#no_of_room" >
										<span id="no_of_room" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('no_of_room')) ? $errors->first('no_of_room') : ''}}</span>
										</div>										
                                      
                                    </div>
									
									<div class="form-group">
                                        <div class="col-sm-12"><label>No of Meeting Room *</label><input name="no_of_m_room" id="no_of_m_room" type="text" class="form-control required" data-error="#err_price" >
										<span id="err_price" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('no_of_m_room')) ? $errors->first('no_of_m_room') : ''}}</span>
										</div>										
                                      
                                    </div>
									
									<div class="form-group">
                                        <div class="col-sm-12"><label>Star Rating *</label><input name="star_rate" id="star_rate" type="text" class="form-control required" data-error="#star_rate" >
										<span id="star_rate" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('star_rate')) ? $errors->first('star_rate') : ''}}</span>
										</div>										
                                      
                                    </div>
                                    
                                     <div class="col-sm-12"><label>Lead Type *</label><select name="lead_type" id="lead_type" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" ><option value="Website">Website</option><option value="Sales team">Sales team</option><option value="Event">Event</option><option value="LinkedIn">LinkedIn</option><option value="Email">Email</option></select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('lead_type')) ? $errors->first('lead_type') : ''}}</span>
										</div>
                                    
									
                                    
                                     
                                </div>
                                </div>
								 <a class="btn btn-primary btnNext pull-right" >Next</a>
								 
					    </div>
					   
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
						<div id="contact_section">
						 <div class="col-lg-12 cform" id="contact_add_form0">
							<div class="col-sm-6 col-md-6 col-lg-6">
                                   
                                      <div class="firstrow">
										<div class="col-sm-8 vcenter form-group"><div style=""><label>Contact Person *</label><input name="contact_person[]" id="contact_person" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_contact_person" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_person')) ? $errors->first('contact_person') : ''}}</span>
										</div>
										</div>
										<div class=" col-sm-4 vcenter">
										<div style=""><input type="checkbox" id="contact_status" name="contact_status">&nbsp;&nbsp;Main Contact</input>
										<span id="err_main_contact" style="position: relative; top: -2px;"></span>

										</div>
										</div>
										</div>
										
										<div class="col-sm-12 form-group"><label>Contact designation *</label><input name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation" >
										<span id="err_contact_designation" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''}}</span>
										</div>
										<div class="col-sm-12 form-group"><label>Contact Number *</label><input name="contact_number[]" id="contact_number" type="tel" class="form-control required" data-error="#err_contact_number" >
										<span id="err_contact_number" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_number')) ? $errors->first('contact_number') : ''}}</span>
										</div>

										</div>
										<div class="col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
										
										<div class="col-sm-12"><label>Email*</label><input name="contact_email[]" id="contact_email" type="text" class="form-control required" data-error="#err_contact_email" >
										<span id="err_contact_email" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('linked_in')) ? $errors->first('linked_in') : ''}}</span>
										</div>
										
										<div class="col-sm-12"><label>LinkedIn Contact *</label><input name="linked_in[]" id="linked_in" type="text" class="form-control required" data-error="#err_linked_in" >
										<span id="err_linked_in" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('linked_in')) ? $errors->first('linked_in') : ''}}</span>
										</div>
										

                                        </div>
                                        </div>
										
                                </div>	
                               </div>	
								<input type="hidden" id="contact_status_hidden" name="contact_status_hidden"></input>

																		
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div  class="form-group">
							<a class="btn btn-primary btnPrevious" >Previous</a>
							<a href="" style = "" id="clone" class="btn btn-info btn-sm pull-right">Add Contact</a>
						</div>
						</div>
						
						
						<div class="form-row text-center" style="clear:both">
						<div class="mt-lg-4"></div>
						<div class="mt-lg-4"></div>
						
						<div class="col-12">
							<input type="submit" id="saveform" value="Finish" class="btn btn-primary  next-btn" style="">
						</div>
					 </div>
					    </div>
						

					 <!--//VENUE CAPACITY-->
					  
						<!--<ul class="pager wizard">
						<li class="previous first" ><a href="javascript:;" style="display:none;">First</a></li>
							<li class="previous"><a href="javascript:;">Previous</a></li>
							<li class="next last"><a href="javascript:;" style="display:none;">Last</a></li>
						  	<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right next-btn" style=""></li>
						
							<?php /*
							
							<li class="previous first" style="display:none;" ><a href="#">First</a></li>
							<li class="previous"><a href="#" >Previous</a></li>
							<li class="next last" style="display:none;"><a href="#" >Last</a></li>
						  	<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right" style="width:12%"></li>
							<li class="finish"><a href="javascript:;">Finish</a></li>*/?>
						</ul>-->
				</div>
					
                         
            
	
          
                                                      
                       </div>
                      
                    </div>
          </div>
         
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

	var host="{{ url('crm/getstates/') }}";	
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
 $(document).on("change", "#hotel_type", getbox);
 function getbox()
 {
	 var hotl_typeval = $('#hotel_type').val();
	 if(hotl_typeval == 'Independent')
	 {
		 $('#grp_sec').hide();
		 $('#grp_name').val('');
	 }
	 else if(hotl_typeval == 'Group/Chain')
	 {
		 $('#grp_sec').show();
		 $('#grp_name').val('');
	 }
	 
 }

 
 $(document).on("change", ".states", getcities);
	function getcities(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('crm/getcities') }}";	
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
	//$( "#commentForm" ).submit(function( event ) {
		$('#saveform').click(function(){
			
			var flag = 0;
			var fonttype1_validate = "";
			$('input[name="contact_status"]').each(function(i){
				if($(this).prop("checked")==true){
					fonttype1_validate = fonttype1_validate+",1";
					flag = 1;
				}else{
					fonttype1_validate = fonttype1_validate+",0";
				}
			});
			var allv = fonttype1_validate.substr(1);
			if(flag == 0)
			{
				alert("Warning: Anyone contact should be a main contact");
				return false;
			}
			else
			{
				$('#contact_status_hidden').val(allv);
			}
			
			
	});
		  //event.preventDefault();
		//});

	$("a#clone").click(function () {
			var $div = $('div[id^="contact_add_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="contact_add_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'contact_add_form'+divlength );
			
				$klon.prepend('<div class="pull-right"><span id=rem'+divlength+' onclick="removediv('+divlength+')" class="fas fa-window-close"></span></div>');
			
			$("#contact_section").append($klon);
			var input = document.querySelector("#contact_add_form"+divlength+" input#contact_number");
			
			window.intlTelInput(input, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/build/js/utils.js"
			});
			var $divnew = $('div[id^="contact_add_form"]:last');
			//$("#contact_add_form"+divlength).intlTelInput();

			
			$divnew.find('input[type=text]:first').focus();
			//var newdiv = $("#contact_add_form").clone(true);
			//newdiv.find('input,textarea').val('');
			//$("#contact_section").append(newdiv).find("input[type=text]:first").focus();
			//var lastadd = $("#contact_section").find('#contact_add_form:last');
			//lastadd.find('input').focus();
			return false;
	});

	function removediv(val){
		var $cnid = $('#contact_add_form'+val);
		$cnid.remove();
	};
	
       //utilsScript: baseUrl + "/admin-assets/build/js/utils.js",			

   
	</script>
	
	<script type="text/javascript">
$(function() {
	var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/crm/dropzone/uploadFiles",			
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
