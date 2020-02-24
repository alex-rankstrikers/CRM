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
			//padding:10px;
			//border:1px solid rgba(0, 0, 0, 0.125);
			//margin:5px;
		}
		.firstrow{
			flex-direction: row;
			display: flex;
			align-items: center;
			justify-content: center;
		}
					  </style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>	
    

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                                                       
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, corporate contacts details has been successfully added.</div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
					<div class="card mb-3">
         
          <div class="card-body">
			<h4 class="card-title">ADD AGENTS</h4>
			<div class="row mt-30 "></div>  
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="navbar-pills " id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav nav-tabs tab-no-active-fill " style="margin-top: 10px;">                    
								<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Business Information</a></li>	
								<li class="nav-item"><a class="nav-link" href="#tab01" data-toggle="tab">Agent Regional office location</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab02" data-toggle="tab">Agent contact</a></li>
								
								
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                         
					              
					
					<div class="tab-content" id="tab-contents" style="margin-top:0px;">
					    <div class="tab-pane active" id="tab1">
						 <form id="commentForm" action="{{url('crm/agentadded')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
					    	{{ csrf_field() }}
                                <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    
										
										<div class="form-group">
										<div class="col-sm-12"><label>Business name *</label><input name="business_name" id="business_name" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('business_name')) ? $errors->first('business_name') : ''}}</span>
										</div>
										
                                        </div>
										
										<div class="form-group">
                                        <div class="col-sm-12"><label>Agent Type *</label><select name="business_type" id="business_type" class="form-control required" data-error="#err_type" >
										<option value="">
										 ---Choose---
										 </option>
										@foreach($master_business as $master_business)
										<option value="{{$master_business->hl_mt_bus_id}}">{{$master_business->hl_business_name}}</option>
										@endforeach</select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('business_type')) ? $errors->first('business_type') : ''}}</span>
										</div>
										</div>

                                     <div class="form-group">
                                        <div class="col-sm-12"><label>Office Address *</label><input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
										</div>                                        
                                    </div>
                                    
                                    
                                        <div class="col-sm-12 form-group"><label>Country *</label>
										<select name="h_country" id="h_country"  class="form-control country required" data-error="#err_country" >		
									<option value="">Choose Country</option>									
										@include ('panels.crm.countries')
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										</div>

										<div class="col-sm-12 form-group"><label>States *</label><select name="states" id="states"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span></div>										
                                   
									 
                                    
									
                                    
									
									
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
								
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
									
								<div class="form-group">
                                        <div class="col-sm-12"><label>Website *</label><input type="text" class="form-control required" name="website" id="website" value="{{ old('postcode') }}" data-error="#website">
										<span id="website" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('website') : ''}}</span>
										</div>
										
                                         
                                    </div>
                                    	
                                     <div class="form-group">
                                     <div class="col-sm-12"><label>Lead Type *</label><select name="lead_type" id="lead_type" class="form-control required" data-error="#err_type" >
									 <option value="">
										 ---Choose---
										 </option>
									 @include ('panels.crm.leads_types')
									 </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('lead_type')) ? $errors->first('lead_type') : ''}}</span>
										</div>
										</div>
                                    
                                     
                                    
									
                                    
                                     
                                </div>
                                </div>
								  <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
					   <input type="button" class="btn btn-light" style="width:auto" value="Cancel">
					  </div>
					  <div align="right" class="col-12">
									<input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary  next-btn" style="">
								</div>
								</form>
					    </div>
					   
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
						 <form id="commentForm" action="{{url('crm/ageregional_added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div id="contact_section">
						 <div class="col-lg-12 cform row" id="contact_add_form0">
							<div class="col-sm-6 col-md-6 col-lg-6">
                                   

                                   	<div class="col-sm-12 vcenter form-group"><div style=""><label>Select Head Office *</label>
                                   		<select name="head_off1[]" id="head_off1" class="form-control">
                                   			<option value="">Select Heade office</option>
                                   			@if($Hotelagentcontactbasic)
                                   			@foreach($Hotelagentcontactbasic as $Hotelagentcontactbasics)
                                   			<option value="{{$Hotelagentcontactbasics->hl_agentcont_id}}">{{$Hotelagentcontactbasics->hl_business_name}}</option>
                                   			@endforeach
                                   			@endif
                                   		</select>
                                   		
										<span id="err_address1" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>
										</div>
										</div>
                                  
										<div class="col-sm-12 vcenter form-group"><div style=""><label>Office Address *</label><input name="off_address1[]" id="off_address1" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_address1" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>
										</div>
										</div>
										
										
										
										
										
										<div class="col-sm-12 form-group"><label>Country *</label>
										<select name="country1" id="country1"  class="form-control country required" data-error="#err_country1" >		
									<option value="">Choose Country</option>									
										@include ('panels.crm.countries')
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('country1')) ? $errors->first('country1') : ''}}</span>
										</div>

										<div class="col-sm-12 form-group"><label>States *</label><select name="states1[]" id="states1" class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states1')) ? $errors->first('states1') : ''}}</span></div>
									
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>City *</label><select name="cities1[]" id="cities1"  class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities1')) ? $errors->first('cities1') : ''}}</span></div>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
										<div class="form-group">
                                        <div class="col-sm-12"><label>Postcode *</label><input type="text" class="form-control required" name="postcode1[]" id="postcode1" value="{{ old('postcode') }}" data-error="#err_postcode1">
										<span id="err_postcode1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode1')) ? $errors->first('postcode1') : ''}}</span>
										</div>
										
                                         
                                    </div>
										
										
										

										</div>
										<div class="col-sm-6 col-md-6 col-lg-6" id="secondcol">
										
										<div class="form-group">
										
										<div class="col-sm-12" ><label>Location Type *</label>
										<select name="location_type[]" id="location_type"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office">Regional Office</option>
										 <option value="Country Office">Country Office</option>
										</select>
										
										
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('location_type')) ? $errors->first('location_type') : ''}}</span>
										</div>
										</div>
									
										<div class="form-group">
										
										<div class="col-sm-12" ><label>IATA/ARC/TIDS/CLIA/TRUE Number *</label>
										
										<input name="iata_number[]" id="iata_number1" type="text" class="form-control required" data-error="#err_iata_number1" >
										
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('location_type')) ? $errors->first('location_type') : ''}}</span>
										</div>
										</div>
										
										<div class="col-sm-12 form-group"><label>Office Number*</label><input name="contact_number1[]" id="contact_number1" type="text" class="form-control required" data-error="#err_linked_in" >
										<span id="err_linked_in" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_number')) ? $errors->first('contact_number') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Email *</label><input name="email1[]" id="email1" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_email')) ? $errors->first('contact_email') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Lead Type *</label><select name="lead_type1" id="lead_type1" class="form-control required" data-error="#err_type" >
										<option value="">
										 ---Choose---
										 </option>
										 @include ('panels.crm.leads_types')
										 </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''}}</span>
										</div>
										
										 <div class="form-group">
                                        <div class="col-sm-12"><label>Subsidiary of</label>

										<!-- <select name="subsidy1" id="subsidy1" class="form-control required">
											<option value="">Select Subsidy</option>
											@if($Hotelagentcontactbasic)
											@foreach ($Hotelagentcontactbasic as $Hotelagentcontactbasics)
											<option value="{{$Hotelagentcontactbasics->hl_agentcont_id }}">{{$Hotelagentcontactbasics->hl_business_name }}</option>
											@endforeach
											@endif
										</select> -->
                                        	 <input type="text" class="form-control required" name="subs_of1" id="subs_of1" value="{{ old('postcode') }}" data-error="#subs_of1"> 
										<span id="subs_of1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('subs_of1')) ? $errors->first('subs_of1') : ''}}</span>
										</div>
										
                                         
                                    </div>
									
                                     <!-- <div class="form-group">
                                        <div class="col-sm-12"><label>Travel Desk Type</label><select class="form-control required" name="desk_type1" id="desk_type1" data-error="#desk_type1">
										 @include ('panels.crm.travel_desk')
										 </select>
										<span id="err_desk_type1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('desk_type1') : ''}}</span>
										</div>
										
                                         
                                    </div> -->
									
                                       
                                        </div>
										
                                </div>	
                               </div>	
								<input type="hidden" id="contact_status_hidden" name="contact_status_hidden"></input>

																		
						<!-- <div align="right" class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" id="clone" class="btn btn-inverse-info btn-icon">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </button>
						</div> -->
						
						<div align="right" style="margin-bottom:20px;" class="col-sm-12 col-md-12 col-lg-12">
						</div>
						<div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
					   <input type="button" class="btn btn-light" style="width:auto" value="Cancel">
					  </div>
					  <div align="right" class="col-12">
									<input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary  next-btn" style="">
								</div>
						<!---<div class="row">
						
								 
							<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>
							<div  class="col-sm-6 col-md-6 col-lg-6">
							 <a class="btn btn-info btnNext pull-right" >Next</a></div>
							
						</div>-->
						
						</form>
					    </div>
						
						
						<div class="tab-pane" id="tab02">
						 <form id="commentForm" action="{{url('crm/agecontact_added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
						 <input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div id="contactnew_section">
						 <div class="col-lg-12 cform row" id="corporate_contactnew_form0">
						 	
							<div class="col-sm-6 col-md-6 col-lg-6">
                                   <div class="col-sm-12 vcenter form-group"><div style=""><label>Select Office  *</label>
                                   		<select name="head_off2[]" id="head_off2" class="form-control">
                                   			<option value="">Select Office Location</option>
                                   			@if($regionalLocations)
                                   			@foreach($regionalLocations as $regionalLocation)
                                   			<option value="{{ $regionalLocation->hl_regl_id}}">{{$regionalLocation->hl_ofz_address}} -- {{ $regionalLocation->name}}</option>
                                   			@endforeach
                                   			@endif
                                   		</select>
                                   		
										<span id="err_address1" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>
										</div>
										</div>
                                     
										<div class="col-sm-12 vcenter form-group"><div style=""><label>Title *</label><input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_contact_person" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
										</div>
										
										
										
										<div class="col-sm-12 form-group"><label>First Name *</label><input name="first_name[]" id="first_name" type="text" class="form-control required" data-error="#err_first_name" >
										<span id="err_first_name" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('first_name')) ? $errors->first('first_name') : ''}}</span>
										</div>
										<div class="col-sm-12 form-group"><label>Last Name *</label><input name="last_name[]" id="last_name" type="text" class="form-control required" data-error="#err_last_name" >
										<span id="err_last_name" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('last_name')) ? $errors->first('last_name') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Contact Designation *</label><input name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation" >
										<span id="err_contact_designation" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''}}</span>
										</div>
										<div class="col-sm-12 form-group aligncheck"><span><input type="checkbox" id="event_invite" class="" >Not Eligible for event invite </input></span>
										
										</div>
										
								</div>
								
								<div class="col-sm-6 col-md-6 col-lg-6">
										
										
										<div class="col-sm-12 form-group"><label>Mobile Number*</label><input name="mobile_no[]" id="mobile_no" type="text" class="form-control required" data-error="#err_mobile_no" >
										<span id="err_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Email *</label><input name="email[]" id="email" type="text" class="form-control required" data-error="#err_email" >
										<span id="err_email" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>LinkedIn Contact *</label><input name="linkedin_contact[]" id="linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact" >
										<span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Skype Contact *</label><input name="skype_contact[]" id="skype_contact" type="text" class="form-control required" data-error="#err_skype_contact" >
										<span id="err_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Date of Birth *</label><input name="dob[]" id="dob" type="date" class="form-control required" data-error="#dob" >
										<span id="err_dob" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('dob')) ? $errors->first('dob') : ''}}</span>
										</div>
										
										
										
                                        </div>
                                        </div>
										
										
										
                                </div>	
								
							<!--<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>-->
							<!-- <div align="right" class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" id="clone1" class="btn btn-inverse-info btn-icon">
							<i class="fa fa-plus" aria-hidden="true"></i>
						  </button>
							</div> -->
							
							
						<div  style="margin-bottom:20px;" class="col-sm-12 col-md-12 col-lg-12">
						</div>
						<div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
						<input type="button" class="btn btn-light" style="width:auto" value="Cancel">
						</div>
						<div align="right" class="form-group col-sm-6 col-md-6 col-lg-6 pull-right">
						<input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary  next-btn" style="">
						</div>
					 </form>
                               </div>	
								
																		
						
						
						
						
					    </div>
					
				</div>
					
                         
            
	
          
                                                      
                       </div>
                      
                    </div>
          </div>
         
        </div>
                    

                </div><!-- Steps ends -->
                      
            </div>
            
        </div>

	<script type="text/javascript">
	
// Get States
 $(document).on("change", "#h_country", getstates);
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

// Get States
 
function rendergetstates(res){
		
       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	

$(document).on('change', $('select[id^="country"]'), function(el) 
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var id = $(this); 
	var idvalue = $(this).attr("id"); 
	console.log(id);
	console.log("dsmfnsnmfds");
	console.log(idvalue);
/*     var length = idvalue.length; 
	var idval = idvalue.substring(7, length);
	var id = $('#country'+idval).val();  */
	
	var host="{{ url('crm/getstates/') }}";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(res){
        $('.image_loader').hide();
        },success:
		function (res){
			rendergetstates1(res, idval);
			function rendergetstates1(res, idval){
			
			   $.each(res.view_details, function(index, data) {
				  if (index==0) {
					$('#states'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
				  }else {
					$('#states'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
				  };
				});   
			}
		}		
	  
	
	})
	return false;
	
});
			


// Get States
 



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

function getcities1(idvalue){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var length = idvalue.length; 
	var idval = idvalue.substring(7, length);
	var id = $('#states'+idval).val(); 
	var host="{{ url('crm/getcities') }}";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(res){
        $('.image_loader').hide();
        },success:
		function (res){
		rendergetcities1(res, idval);
			function rendergetcities1(res, idval){
		   $.each(res.view_details, function(index, data) {
			  if (index==0) {
				$('#cities'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
			  }else {
				$('#cities'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
			  };
			});   
		  }	
		}
	
	})
	return false;
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

	 //  	$('#rootwizard').bootstrapWizard({
	 //  		'tabClass': 'nav nav-pills',
	 //  		'onNext': function(tab, navigation, index) {
	 //  			var $valid = $("#commentForm").valid();
	 //  			if(!$valid) {
	 //  				$validator.focusInvalid();
	 //  				return false;
	 //  			}else{
		// 		var $total = navigation.find('li').length;
		// 		var $current = index+1;
		// 		var $percent = ($current/$total) * 100;
		// 		$('.progress-bar').css({width:$percent+'%'});
		// 		}
	 //  		}
	 //  	});		
		// window.prettyPrint && prettyPrint()
	});
	
		  //event.preventDefault();
		//});
		$(".btnNext").click(function() {
			//alert();
			$(window).scrollTop(0);	
			
		});


	$("button#clone").click(function () {
			var $div = $('div[id^="contact_add_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="contact_add_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'contact_add_form'+divlength );
			
				
			
			$("#contact_section").append($klon);
			var input = document.querySelector("#contact_add_form"+divlength+" input#contact_number1");
			$('#contact_add_form'+divlength ).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			
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
			utilsScript: "../admin-assets/js/utils.js"
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
	
    
	$("button#clone1").click(function () {
			var $div = $('div[id^="corporate_contactnew_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="corporate_contactnew_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'corporate_contactnew_form'+divlength );
			
				
			
			$("#contactnew_section").append($klon);
			$('#corporate_contactnew_form'+divlength).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv1('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			var input = document.querySelector("#corporate_contactnew_form"+divlength+" input#mobile_no");
			
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
			utilsScript: "../admin-assets/js/utils.js"
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
	
	function removediv1(val){
		var $cnid = $('#corporate_contactnew_form'+val);
		$cnid.remove();
	};
	//utilsScript: baseUrl + "/admin-assets/js/utils.js",			

   
	</script>
	
	<script type="text/javascript">
var input = document.querySelector("#contact_number1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: false,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});
		
var input = document.querySelector("#mobile_no");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: false,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});	


	// Get States
$(document).on("change", "#country1", getstates1);
	function getstates1(){
		
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
        },success:rendergetstates1
	
	})
	return false;
}

// Get States
 
function rendergetstates1(res){
		
       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }	
	  


	  $(document).on("change", "#states1", getcities1);
	function getcities1(){ 
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
        },success:rendergetcities1
	
	})
	return false;
}
function rendergetcities1(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }
	  

		
	</script>

   @stop
