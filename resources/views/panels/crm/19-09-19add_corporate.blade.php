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
		.jerror{ font-size:12px; color:red}
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
					<div class="card mb-3" style="min-height: 550px;">
         
          <div class="card-body">
			<h4 class="card-title">@if($EditHotel) EDIT @else ADD @endif CORPORATE ACCOUNTS</h4>
			<div class="row mt-30 "></div>  
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="navbar-pills " id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav nav-tabs tab-no-active-fill " style="margin-top: 10px;">                    
								<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Business Information</a></li>	
								<li class="nav-item"><a class="nav-link" href="#tab01" data-toggle="tab">Corporate Regional office location</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab03" data-toggle="tab">Consortia contacts</a></li>
								
								<li class="nav-item"><a class="nav-link" href="#tab02" data-toggle="tab">Corporate contact</a></li>
								
								
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                         
					              
					
					<div class="tab-content" id="tab-contents" style="margin-top:0px;">
					    <div class="tab-pane active" id="tab1">
						 <form id="commentForm" action="{{url('crm/corporateadded')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
					    	{{ csrf_field() }}
                                <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    
                                    <input type="hidden" name="hl_ccb_id" value="@if($EditHotel) {{$EditHotel->hl_ccb_id}} @else {{ old('business_name') }} @endif">
										
										<div class="form-group">
										<div class="col-sm-12"><label>Business name *</label><input name="business_name" id="business_name" type="text" tabindex="1" class="form-control required" data-error="#err_title" value="@if($EditHotel) {{$EditHotel->hl_business_name}} @else {{ old('business_name') }} @endif" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('business_name')) ? $errors->first('business_name') : ''}}</span>
										</div>
										
                                        </div>
										
										
                                     <div class="form-group">
                                        <div class="col-sm-12"><label>Head Office Address *</label><input tabindex="3" type="text" name="address1" id="address1" value="@if($EditHotel) {{$EditHotel->hl_head_office_address}} @else {{ old('address1') }} @endif"  class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
										</div>                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="col-sm-12 form-group"><label>Country *</label>
										<select tabindex="5" name="h_country" id="h_country"  class="form-control country required" data-error="#err_country" >		
									<option value="">Choose Country</option>									
										foreach($editcountry as $country)
										<option value="{{ $country->id }}" @if($EditHotel) @if($EditHotel->hl_country == $country->id) selected="selected" @endif @endif >{{$country->name}}</option>
										@endforeach
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										</div>    

									 <div class="form-group">
                                        <div class="col-sm-12"><label>City *</label><select name="cities" id="cities" tabindex="7" class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span></div>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
									
									<div class="form-group">
                                        <div class="col-sm-12"><label>Website *</label><input type="text" tabindex="9" class="form-control required" name="website" id="website" value="@if($EditHotel) {{$EditHotel->hl_website}} @else {{ old('website') }} @endif" data-error="#website">
										<span id="website" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('website') : ''}}</span>
										</div>
										
                                         
                                    </div>
                                    
									<!-- <div class="form-group">
                                        <div class="col-sm-12"><label>Subsidiary of</label><input tabindex="11" type="text" class="form-control required" name="subs_of" id="subs_of" value="{{ old('postcode') }}" data-error="#err_subs_of">
										<span id="err_subs_of" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('subs_of')) ? $errors->first('subs_of') : ''}}</span>
										</div>
										
                                         
                                    </div> -->
									
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
								
								<div class="form-group">
                                        <div class="col-sm-12"><label>Business Type *</label><select tabindex="2" name="business_type" id="business_type" class="form-control required" data-error="#err_type" >
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
                                        <div class="col-sm-12"><label>Landline No *</label><input tabindex="4" type="text" name="landline" id="landline1" value="@if($EditHotel) {{$EditHotel->hl_landline}} @else {{ old('landline1') }} @endif" class="form-control required mobile" data-error="#err_landline1" ><span id="err_landline1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error">{{ ($errors->has('landline1')) ? $errors->first('landline1') : ''}}</span> 
										</div>                                        
                                    </div>


										<div class="col-sm-12 form-group"><label>States *</label><select tabindex="6" name="states" id="states"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span></div>										
                                   
									 
                                   
									
								
								<div class="form-group">
                                        <div class="col-sm-12"><label>Postcode *</label><input type="text" tabindex="8" class="form-control required" name="postcode" id="postcode" value="@if($EditHotel) {{$EditHotel->hl_pincode}} @else {{ old('postcode') }} @endif" data-error="#err_postcode">
										<span id="err_postcode" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										</div>
										
                                         
                                    </div>
									
								
                                    	
                                     <div class="form-group">
                                     <div class="col-sm-12"><label>Lead Type *</label><select name="lead_type" tabindex="10" id="lead_type" class="form-control required" data-error="#err_type" >
									 <option value="">
										 ---Choose---
										 </option>
									 @include ('panels.crm.leads_types')
									 </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('lead_type')) ? $errors->first('lead_type') : ''}}</span>
										</div>
										</div>
                                    
                                     
									
                                     <!-- <div class="form-group">
                                        <div class="col-sm-12"><label>Travel Desk Type</label><select tabindex="12" class="form-control required" name="h_desk_type" id="h_desk_type" data-error="#desk_type1">
										<option value=''>Select</option>
										 @include ('panels.crm.travel_desk')
										 </select>
										<span id="err_desk_type" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('desk_type')) ? $errors->first('desk_type') : ''}}</span>
										</div>
										
                                         
                                    </div> -->
                                    
									
                                    
                                     
                                </div>
                                </div>
								  <div class="row ">
								  <div class="form-group col-sm-6 col-md-6 col-lg-6 ">
					   <input type="button" class="btn btn-light" style="width:auto" value="Cancel">
					  </div>
					  <div align="right" class="form-group col-sm-6 col-md-6 col-lg-6">
									<input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary  next-btn" style="">
								</div>
								</form>
					    </div>
					    </div>
					   
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
						 <form id="commentForm1" action="{{url('crm/corregional_added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
						 <input type="hidden" name="_token" value="{{ csrf_token() }}">
						 <div  class="col-sm-12 col-md-12 col-lg-12">
						 <div class="alert alert-danger hidden" id="form2Error"></div>
						 </div>
							<div  class="col-sm-12 col-md-12 col-lg-12">
							<span> <input type="checkbox" name="sel_add_type" id="direct_check1" value="Direct Address">  Select  Direct Address </input></span>
							</div>
							<div style="margin-bottom:20px;margin-top:20px;padding-left:20px;"></div>
							<div  class="col-sm-12 col-md-12 col-lg-12">
							<span> <input type="checkbox" name="sel_add_type" id="direct_check2" value="Consortia">   Select Consortia </input></span>
							
							</div>

							<span class="error">{{ ($errors->has('sel_add_type')) ? $errors->first('sel_add_type') : ''}}</span>
							<div style="margin-bottom:20px;margin-top:20px;padding-left:20px;"></div>
						<div id="contact_section">
						 <div class="col-lg-12" id="contact_add_form0">
						
							<div class="row"  id="direct2">
							<div class="col-sm-6  col-md-6 col-lg-6 form-group">
							<select name="ofz_type" id="ofz_type" class="form-control"><option value="">Select</option>
							<option value="Implant">Implant</option>
							<option value="Outplant">Outplant</option></select>
							<span id="err_subsidy_ofz2" class="jerror"></span>
								</div>
								
							
							</div>
							
							<div style="margin-bottom:20px;margin-top:20px;padding-left:20px;"></div>
							
							
							<div class="col-sm-12 col-md-12 col-lg-12 row"  id="direct2_implant">
							<div class="row">
								<div class="col-sm-6  col-md-6 col-lg-6">
									<div style=""><label>Select Agent *</label>
									<!-- <input name="subsidy1[]" tabindex="1" id="subsidy1" type="text" class="form-control required" data-error="#err_subsidy1" > -->
									<select name="subsidy1" id="subsidy1" class="form-control required">
									<option value="">Select Agent</option>
											@if($Hotelagentcontactbasic)
											@foreach ($Hotelagentcontactbasic as $Hotelagentcontactbasics)
											<option value="{{$Hotelagentcontactbasics->hl_agentcont_id }}">{{$Hotelagentcontactbasics->hl_business_name }}</option>
											@endforeach
											@endif
									</select>
									<span id="err_subsidy1"  class="jerror"></span>
									<span class="error">{{ ($errors->has('subsidy1')) ? $errors->first('subsidy1') : ''}}</span>
									</div>
								</div>
								<div class="col-sm-6  col-md-6 col-lg-6 ">
									
								</div>

								<div class="col-sm-12  col-md-12 col-lg-12 form-group">
								<label><strong>Address *</strong></label>
								</div>
								

								
								<div class="col-sm-12 col-md-6 col-lg-6  form-group">

	<label>Office Address *</label>
	<input name="ic_off_address1" tabindex="1" id="ic_off_address1" type="text" class="form-control required" data-error="#err_off_address1" >
										<span id="err_ic_off_address1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_address1')) ? $errors->first('ic_address1') : ''}}</span>
										
										</div>
										
									<div class="col-sm-12 col-md-6 col-lg-6" ><label>Location Type *</label>
										<select tabindex="6" name="ic_location_type1" id="ic_location_type1"  class="form-control states required" data-error="#err_ic_states">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office">Regional Office</option>
										 <option value="Country Office">Country Office</option>
										 <option value="State Office">State Office</option>
										</select>
										
										
										<span id="err_ic_location_type1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_location_type1')) ? $errors->first('ic_location_type1') : ''}}</span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select tabindex="2" name="ic_country1" id="ic_country1"  class="form-control country required" data-error="#err_ic_country1" >		
									<option value="">Choose Country</option>									
										@include ('panels.crm.countries')
									 </select>
									 <span id="err_ic_country1" class="jerror">&nbsp;</span>
									 <span class="error">{{ ($errors->has('ic_country1')) ? $errors->first('ic_country1') : ''}}</span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States *</label>
										<select tabindex="3" name="ic_states1" id="ic_states1" class="form-control states required" data-error="#err_ic_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_ic_states1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_states1')) ? $errors->first('ic_states1') : ''}}</span>
										</div>
									
										<div class="col-sm-12 col-md-6 col-lg-6"><label>City *</label><select name="ic_cities1" tabindex="4" id="ic_cities1"  class="form-control required" data-error="#err_ic_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_ic_cities1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_cities1')) ? $errors->first('ic_cities1') : ''}}</span>
										</div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
					<label>Postcode *</label><input type="text" tabindex="5"  class="form-control required" name="ic_postcode1" id="ic_postcode1" value="{{ old('ic_postcode') }}" data-error="#err_ic_postcode1">
										<span id="err_ic_postcode1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_postcode1')) ? $errors->first('ic_postcode1') : ''}}</span>   
                                    </div>

									<!-- <div class="col-sm-12 col-md-6 col-lg-6 form-group">
									<label>Mobile Number*</label><input tabindex="7" name="ic_contact_number1" id="ic_contact_number1" type="text" class="form-control required" data-error="#err_ic_contact_number1" >
										<span id="err_ic_contact_number1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_contact_number1')) ? $errors->first('ic_contact_number1') : ''}}</span>
										</div> -->
										
										<!-- <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type *</label>
										<select  tabindex="9" name="ic_lead_type1" id="ic_lead_type1" class="form-control required" data-error="#err_ic_lead_type1" >
										<option value="">
										 ---Choose---
										 </option>
										 @include ('panels.crm.leads_types')
										 </select>
										<span id="err_ic_lead_type1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_lead_type1')) ? $errors->first('ic_lead_type1') : ''}}</span>
										</div> -->      
									
									
										
										
									
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number*</label><input tabindex="10" name="ic_landline_no1" id="ic_landline_no1" type="text" class="form-control required" data-error="#err_ic_landline_no" >
										<span id="err_ic_landline_no1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_landline_no1')) ? $errors->first('ic_landline_no1') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="ic_email1" tabindex="8" id="ic_email1" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1"  class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('ic_email1')) ? $errors->first('ic_email1') : ''}}</span>
										</div>


<div class="col-sm-12 col-md-12 col-lg-12 form-group"><label><strong>Contact Details *</strong></label></div>

							<div class="col-sm-12 col-md-6 col-lg-6  form-group">
											
											<label>Title *</label><input name="ic_title" id="ic_title" type="text" class="form-control required" data-error="#err_ic_title" >
											<span id="err_ic_title" style="position: relative; top: -2px;"></span>
											<span class="error">{{ ($errors->has('ic_title')) ? $errors->first('ic_title') : ''}}</span>
											
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name *</label><input name="ic_first_name" id="ic_first_name" type="text" class="form-control required" data-error="#err_ic_first_name" >
										<span id="err_ic_first_name" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_first_name')) ? $errors->first('ic_first_name') : ''}}</span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name *</label><input name="ic_last_name" id="ic_last_name" type="text" class="form-control required" data-error="#err_ic_last_name" >
										<span id="err_ic_last_name" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_last_name')) ? $errors->first('ic_last_name') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation *</label><input name="ic_contact_designation" id="ic_contact_designation" type="text" class="form-control required" data-error="#err_ic_contact_designation" >
										<span id="err_ic_contact_designation" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_contact_designation')) ? $errors->first('ic_contact_designation') : ''}}</span>
										</div>
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number*</label><input name="ic_mobile_no" id="ic_mobile_no" type="text" class="form-control required" data-error="#err_ic_mobile_no" >
										<span id="err_ic_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_mobile_no')) ? $errors->first('ic_mobile_no') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number*</label><input name="ic_clandline_no" id="ic_clandline_no" type="text" class="form-control required" data-error="#err_ic_clandline_no" >
										<span id="err_ic_clandline_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_clandline_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="ic_cemail" id="ic_cemail" type="text" class="form-control required" data-error="#err_ic_cemail" >
										<span id="err_ic_cemail" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_cemail')) ? $errors->first('ic_cemail') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  *</label><input name="ic_linkedin_contact" id="ic_linkedin_contact" type="text" class="form-control required" data-error="#err_ic_linkedin_contact" >
										<span id="err_ic_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_linkedin_contact')) ? $errors->first('ic_linkedin_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype *</label><input name="ic_skype_contact" id="ic_skype_contact" type="text" class="form-control required" data-error="#err_ic_skype_contact" >
										<span id="err_ic_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_skype_contact')) ? $errors->first('ic_skype_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input name="ic_dob" id="ic_dob" type="date" class="form-control required" data-error="#ic_dob" >
										<span id="err_ic_dob" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('ic_dob')) ? $errors->first('ic_dob') : ''}}</span>
										</div>







								</div>
							</div>
							
							<div class="col-sm-12 col-md-12 col-lg-12 row"  id="direct2_outplant">
							
							<div class="col-sm-6 form-group"><div style=""><label>Select Agent *</label>
							<select name="subsidy2" id="subsidy2" class="form-control required">
							<option value="">Select Agent</option>
							@if($Hotelagentcontactbasic)
							@foreach ($Hotelagentcontactbasic as $Hotelagentcontactbasics)
											<option value="{{$Hotelagentcontactbasics->hl_agentcont_id }}">{{$Hotelagentcontactbasics->hl_business_name }}</option>
											@endforeach
											@endif
							</select>
							<!-- <input name="subsidy2[]" tabindex="1" id="subsidy2" type="text" class="form-control required" data-error="#err_subsidy2" > -->
							<span id="err_subsidy2"  class="jerror"></span>
							<span class="error">{{ ($errors->has('subsidy2')) ? $errors->first('subsidy2') : ''}}</span></div></div>
							
							<div class="col-sm-6 form-group"><div style=""><label>Select Office Location *</label>

								<table class="table table-bordered"  width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<th>&nbsp;</th>
								<th>Office Address</th>
								<th>Location Type</th>                               
								<th>Country</th>
                             					
								
							
								
							  </tr>
							</thead>
<tbody id="officeadd"></tbody>
                            </table>
							<!-- @include ('panels.crm.regionaldirectaddress') -->
							
							<!-- <input name="subsidy_ofz2[]" tabindex="1" id="subsidy_ofz2" type="text" class="form-control required" data-error="#err_subsidy_ofz2" > -->
							<span id="err_head_off2" class="jerror"></span>
							<span class="error">{{ ($errors->has('subsidy_ofz2')) ? $errors->first('subsidy_ofz2') : ''}}</span></div></div>
							</div>
							<div class="row"  id="direct1">
								<div class="col-sm-12 col-md-12 col-lg-12 "><label><strong>Address Details:</strong></label></div>
							
                                   
                                    
										
										<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Office Address *</label>
										<input name="off_address1" tabindex="1" id="off_address1" type="text" class="form-control required" data-error="#err_off_address1" >
										<span id="err_off_address1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>									
										</div>
										
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>Location Type *</label>
										<select tabindex="6" name="location_type1" id="location_type1"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office">Regional Office</option>
										 <option value="Country Office">Country Office</option>
										 <option value="State Office">State Office</option>
										</select>
										
										
										<span id="err_location_type1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('location_type1')) ? $errors->first('location_type1') : ''}}</span>
										
										</div>
										
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select tabindex="2" name="country1" id="country1"  class="form-control country required" data-error="#err_country1" >		
									<option value="">Choose Country</option>									
										@include ('panels.crm.countries')
									 </select>
									 <span id="err_country1" class="jerror">&nbsp;</span>
									 <span class="error">{{ ($errors->has('country1')) ? $errors->first('country1') : ''}}</span>
										</div>
									
									
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                      <label>City *</label><select name="cities1" tabindex="4" id="cities1"  class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('cities1')) ? $errors->first('cities1') : ''}}</span>                                     
                                    </div>
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States *</label>
										<select tabindex="3" name="states1" id="states1" class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('states1')) ? $errors->first('states1') : ''}}</span></div>
									
										
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
									<label>Postcode *</label>
									<input type="text" tabindex="5"  class="form-control required" name="postcode1" id="postcode1" value="{{ old('postcode') }}" data-error="#err_postcode1">
									<span id="err_postcode1" class="jerror">&nbsp;</span>
									<span class="error">{{ ($errors->has('postcode1')) ? $errors->first('postcode1') : ''}}</span>
								</div>
									
									<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number*</label>
									<input tabindex="7" name="contact_number1" id="contact_number1" type="text" class="form-control required" data-error="#err_linked_in" >
										<span id="err_contact_number1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('contact_number1')) ? $errors->first('contact_number1') : ''}}</span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type *</label>
										<select  tabindex="9" name="lead_type1" id="lead_type1" class="form-control required" data-error="#err_type" >
										<option value="">
										 ---Choose---
										 </option>
										 @include ('panels.crm.leads_types')
										 </select>
										<span id="err_lead_type1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''}}</span>
										</div>
										
										<!--<div class="form-group">
                                        <div class="col-sm-12"><label>Subsidiary of</label><input  tabindex="11" type="text" class="form-control required" name="subs_of1[]" id="subs_of1" value="{{ old('postcode') }}" data-error="#subs_of1">
										<span id="subs_of1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('subs_of1')) ? $errors->first('subs_of1') : ''}}</span>
										</div>
										
                                         
                                    </div>-->
									
									<!-- <div class="form-group">
                      <div class="col-sm-12"><label>Head Office Location</label>
											@include ('panels.crm.headoffice')
											
											<input type="text" tabindex="13" class="form-control required" style="width:100%; !important" name="head_off1[]" id="head_off1" value="{{ old('head_off1') }}" data-error="#head_off1">
										<span id="err_head_off1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('head_off')) ? $errors->first('head_off') : ''}}</span>
										</div>
										
                                         
                                    </div> -->
										

										
										
										
									
									
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number*</label>
										<input tabindex="10" name="landline_no" id="landline_no1" type="text" class="form-control required" data-error="#err_landline_no" >
										<span id="err_landline_no1" class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('landline_no1')) ? $errors->first('landline_no1') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="email1" tabindex="8" id="email1" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1"  class="jerror">&nbsp;</span>
										<span class="error">{{ ($errors->has('email1')) ? $errors->first('email1') : ''}}</span>
										</div>
										 
									
                                     <!--<div class="form-group">
                                        <div class="col-sm-12"><label>Travel Desk Type</label><select class="form-control required" name="desk_type1[]" id="desk_type1" tabindex="12" data-error="#desk_type1">
										 @include ('panels.crm.travel_desk')
										 </select>
										<span id="err_desk_type1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('desk_type1') : ''}}</span>
										</div>
										
                                         
                                    </div>-->
									
									 
									
                                       
                                       


                                        <div class="col-sm-12 col-md-12 col-lg-12"> <label><strong>Contact Details:</strong></label></div>



                                        	<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Title *</label><input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_contact_person" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name *</label><input name="first_name[]" id="first_name" type="text" class="form-control required" data-error="#err_first_name" >
										<span id="err_first_name" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('first_name')) ? $errors->first('first_name') : ''}}</span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name *</label><input name="last_name[]" id="last_name" type="text" class="form-control required" data-error="#err_last_name" >
										<span id="err_last_name" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('last_name')) ? $errors->first('last_name') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation *</label><input name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation" >
										<span id="err_contact_designation" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''}}</span>
										</div>
										
										<!--<div class="form-group">
										<div class="col-sm-12 col-md-6 col-lg-6"><label>Type of Contact*</label><input name="contact_type[]" id="contact_type" type="text" class="form-control required" data-error="#err_contact_type" >
										<span id="err_contact_type" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_type')) ? $errors->first('contact_type') : ''}}</span></input>
										</div>
										
										</div>-->
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span>
											<input type="checkbox" name="invite[]" id="event_invite" class="" >Not Eligible for event invite </input></span>
										
										</div>
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number*</label><input name="mobile_no[]" id="mobile_no" type="text" class="form-control required" data-error="#err_mobile_no" >
										<span id="err_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number*</label><input name="landline_no[]" id="landline_no" type="text" class="form-control required" data-error="#err_landline_no" >
										<span id="err_landline_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('landline_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="email[]" id="email" type="text" class="form-control required" data-error="#err_email" >
										<span id="err_email" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  *</label><input name="linkedin_contact[]" id="linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact" >
										<span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype *</label><input name="skype_contact[]" id="skype_contact" type="text" class="form-control required" data-error="#err_skype_contact" >
										<span id="err_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input name="dob[]" id="dob" type="date" class="form-control required" data-error="#dob" >
										<span id="err_dob" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('dob')) ? $errors->first('dob') : ''}}</span>
										</div>





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
									<input style="width:auto;" type="submit" id="saveform1" value="Save" class="btn btn-primary  next-btn" style="">
								</div>
						<!---<div class="row">
						
								 
							<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>
							<div  class="col-sm-6 col-md-6 col-lg-6">
							 <a class="btn btn-info btnNext pull-right" >Next</a></div>
							
						</div>-->
						
						</form>
					    </div>
						


						<div class="tab-pane" id="tab03">
						<div class="col-lg-12 cform row">

						<table class="table table-bordered dataTable"><thead>
						<th>Location Type</th>
						<th>Address</th>
						<th>Country</th>
						<th>State</th>
						<th>City</th>
						<th>Contact Name</th>
						<th>Contact Mobile</th>
						<th>Contact Email</th>
						<th>Edit</th>
						</thead>
						@foreach($regionalLocationsSubsidy as $Subsidy)
						<tr>
						<td>{{$Subsidy->hl_loc_type}}</td>
						<td>{{$Subsidy->hl_ofz_address}}</td>
						<td>{{$Subsidy->countries}}</td>
						<td>{{$Subsidy->states}}</td>
						<td>{{$Subsidy->cities}}</td>
						<td>{{$Subsidy->hl_first_name}}</td>
						<td>{{$Subsidy->hl_mob_no}}</td>
						<td>{{$Subsidy->cemail}}</td>
						<td><div align="center"><a href="#edit_corp_model{{$Subsidy->hl_con_off_add_id}}" class="" data-toggle="modal" data-target="#edit_corp_model{{$Subsidy->hl_con_off_add_id}}"><i class="fa fa-edit fa-lg"></i></i>

</a></div>
<div id="edit_corp_model{{$Subsidy->hl_con_off_add_id}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
									
									<div class="modal-content">
									<form id="commentForm" action="{{url('crm/hotels/consordia/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-header">
									<h4 class="modal-title">Edit Contact Details</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<div class="modal-footer">
									<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div></td>
						</tr>
						@endforeach
						</table>
						
						</div>
						</div>



						<div class="tab-pane" id="tab02">
						 <form id="commentForm2" action="{{url('crm/corcontact_added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
						  <input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div id="contactnew_section">
						 <div class="col-lg-12 cform row" id="corporate_contactnew_form0">

						 <table class="table table-bordered dataTable"><thead>
						<th>Location Type</th>
						<th>Address</th>
						<th>Country</th>
						<th>State</th>
						<th>City</th>
						<th>Contact Name</th>
						<th>Contact Mobile</th>
						<th>Contact Email</th>
						<th>Action</th>
						</thead>
						@if($CorporateContact)
						@foreach($CorporateContact as $CorporateContacts)
						<tr>
						<td>{{$CorporateContacts->hl_loc_type}}</td>
						<td>{{$CorporateContacts->hl_ofz_address}}</td>
						<td>{{$CorporateContacts->countries}}</td>
						<td>{{$CorporateContacts->states}}</td>
						<td>{{$CorporateContacts->cities}}</td>
						<td>{{$CorporateContacts->hl_first_name}}</td>
						<td>{{$CorporateContacts->hl_mob_no}}</td>
						<td>{{$CorporateContacts->cemail}}</td>
						<td><div align="center"><a href="#edit_corp_model{{$CorporateContacts->hl_regl_id}}" class="" data-toggle="modal" data-target="#edit_corp_model{{$CorporateContacts->hl_regl_id}}"><i class="fa fa-edit fa-lg"></i></i>

</a></div>
<div id="edit_corp_model{{$CorporateContacts->hl_regl_id}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
									
									<div class="modal-content">
									<form id="commentForm" action="{{url('crm/hotels/contact/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-header">
									<h4 class="modal-title">Edit Contact Details</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<div class="modal-footer">
									<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div></td>
						</tr>
						@endforeach
						@endif
						</table>


							<!-- <div class="col-sm-6 col-md-6 col-lg-6">
                                   
                                     
										<div class="fircstrow">
										
											<div class="form-group">

											<label>Select Office Location *</label>
											<select name="head_off2" class="form-control required"  >
											<option value="">Choose Location</option>
											@if($regionalLocations)
											@foreach($regionalLocations as $regionalLocation)
											<option value="{{$regionalLocation->hl_regl_id}}">{{$regionalLocation->hl_ofz_address}}-{{$regionalLocation->name}}</option>
											@endforeach
											@endif
											</select>
										
											<span id="head_off2" style="position:relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('head_off2')) ? $errors->first('head_off2') : ''}}</span>

											</div>
										
										<div class="col-sm-12 vcenter form-group"><div style=""><label>Title *</label><input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_contact_person" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
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
										
										
										
										<div class="col-sm-12 form-group aligncheck"><span>
											<input type="checkbox" name="invite[]" id="event_invite" class="" >Not Eligible for event invite </input></span>
										
										</div>
								</div> -->
								
								<!-- <div class="col-sm-6 col-md-6 col-lg-6">
										
										
										<div class="col-sm-12 form-group"><label>Mobile Number*</label><input name="mobile_no[]" id="mobile_no" type="text" class="form-control required" data-error="#err_mobile_no" >
										<span id="err_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Landline Number*</label><input name="landline_no[]" id="landline_no" type="text" class="form-control required" data-error="#err_landline_no" >
										<span id="err_landline_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('landline_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										
										<div class="col-sm-12 form-group"><label>Email *</label><input name="email[]" id="email" type="text" class="form-control required" data-error="#err_email" >
										<span id="err_email" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>LinkedIn  *</label><input name="linkedin_contact[]" id="linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact" >
										<span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Skype *</label><input name="skype_contact[]" id="skype_contact" type="text" class="form-control required" data-error="#err_skype_contact" >
										<span id="err_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 form-group"><label>Date of Birth</label><input name="dob[]" id="dob" type="date" class="form-control required" data-error="#dob" >
										<span id="err_dob" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('dob')) ? $errors->first('dob') : ''}}</span>
										</div>
										
										
										
                                        </div> -->
                                        </div>
										
										
										
                                </div>	
								
							<!--<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>-->
							<!-- <div align="right" class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" id="clone1" class="btn btn-inverse-info btn-icon">
							<i class="fa fa-plus" aria-hidden="true"></i>
						  </button>
							</div> -->
							
							
						<!-- <div  style="margin-bottom:20px;" class="col-sm-12 col-md-12 col-lg-12">
						</div>
						<div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
						<input type="button" class="btn btn-light" style="width:auto" value="Cancel">
						</div>
						<div align="right" class="form-group col-sm-6 col-md-6 col-lg-6 pull-right">
						<input style="width:auto;" type="submit" id="saveform2" value="Save" class="btn btn-primary  next-btn" style="">
						</div> -->
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
	  
// Implant

// Get States
$(document).on("change", "#ic_country1", ic_getstates1);
	function ic_getstates1(){
		
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
        },success:ic_rendergetstates1
	
	})
	return false;
}

// Get States
 
function ic_rendergetstates1(res){
		
       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#ic_states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#ic_states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }	
	  


	  $(document).on("change", "#ic_states1", ic_getcities1);
	function ic_getcities1(){ 
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
        },success:ic_rendergetcities1
	
	})
	return false;
}
function ic_rendergetcities1(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#ic_cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#ic_cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }



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
	  

$('body').on('change','country', function(el) 
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var id = $(this); 
	var idvalue = $(this).attr("id"); 
	
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
			

$('#direct1').css('display', 'none');
$('#secondcol').css('display', 'none');
$('#direct2').css('display', 'none');
$('#direct2_implant').css('display', 'none');
$('#direct2_outplant').css('display', 'none');

$(document).ready(function() {
 //set initial state.
    $('#direct_check1').change(function() {
			$('#form2Error').addClass('hidden');
			$('#form2Error').html('');
        if(this.checked) {
			$('#direct_check2').prop('checked', false);
            $('#direct1').css('display', 'flex');
			$('#secondcol').css('display', 'block');
			$('#direct2').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
        }
        else
		{
			$('#form2Error').addClass('hidden');
			$('#form2Error').html('');
			$('#direct_check2').prop('checked', false);
			$('#direct1').css('display', 'flex');
			$('#secondcol').css('display', 'none');
			$('#direct2').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
		}			
    });

	$('#direct_check2').change(function() {
        if(this.checked) {
			$('#ofz_type').val('');
			$('#direct_check1').prop('checked', false);
            $('#direct2').css('display', 'block');
            $('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
        }
        else
		{
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'none');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
		}			
    });
	
	$('#ofz_type').change(function() {
		if(this.value == 'Implant')
		{
			$('#direct2_implant').prop('checked', false);
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'block');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'block');
			$('#direct2_outplant').css('display', 'none');
		}
		else if(this.value == 'Outplant')
		{
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'block');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'block');
		}
		else
		{
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'block');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
		}
		
	});
});


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

	  $(document).on("change", "#subsidy2", getsubsidyAddress);
	function getsubsidyAddress(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('crm/getsubsidyAddress') }}";	
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
        },success:rendersubsidyAddress
	
	})
	return false;
}
function rendersubsidyAddress(res){
$('#officeadd').html('')
       $.each(res.view_details, function(index, data) {
       	console.log(res.view_details);
          if (index==0) {
            $('#officeadd').append('<tr><td><input type="checkbox" name="subsidy_ofz2[]" value="'+data.hl_regl_id+'" ></input></td><td >'+data.hl_loc_type+'</td><td >'+data.hl_ofz_address+'</td><td>'+data.hl_country+'</td></tr>');
          }else {

            $('#officeadd').append('<tr><td><input type="checkbox" name="subsidy_ofz2[]" value="'+data.hl_regl_id+'" ></input></td><td >'+data.hl_loc_type+'</td><td >'+data.hl_ofz_address+'</td><td>'+data.hl_country+'</td></tr>');
          };
        });   
      }


	  

// function getcities1(idvalue){ 
//   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//    var length = idvalue.length; 
// 	var idval = idvalue.substring(7, length);
// 	var id = $('#states'+idval).val(); 
// 	var host="{{ url('crm/getcities') }}";	
// 	$.ajax({
// 		type: 'POST',
// 		data:{'id': id,'_token':CSRF_TOKEN},
// 		url: host,
// 		dataType: "json", // data type of response		
// 		beforeSend: function(){
//         $('.image_loader').show();
//         },
//         complete: function(res){
//         $('.image_loader').hide();
//         },success:
// 		function (res){
// 		rendergetcities1(res, idval);
// 			function rendergetcities1(res, idval){
// 		   $.each(res.view_details, function(index, data) {
// 			  if (index==0) {
// 				$('#cities'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
// 			  }else {
// 				$('#cities'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
// 			  };
// 			});   
// 		  }	
// 		}
	
// 	})
// 	return false;
// }

	  </script>
	  
	

	
	  <script>

$("#saveform1").click(function() {

       if ($('input[name="sel_add_type"]:checked').length == 0) {
		
		 $('#form2Error').removeClass('hidden');
		 $('#form2Error').html('Please choose any one check box');
		 return false; 
		} 
          else {
			$('#form2Error').addClass('hidden');
			$('#form2Error').html('');

			var radi=$('input[name="sel_add_type"]:checked').val()
		
				if(radi=='Direct Address')
				{
				form1()
				}else{
				form2()
				}

		}
				return false;

}); 

	function form1(){
		
		var off_address1=$('#off_address1').val();
		var country1=$('#country1').val();
		var states1=$('#states1').val();
		var cities1=$('#cities1').val();
		var postcode1=$('#postcode1').val();
		var location_type1=$('#location_type1').val();
		var contact_number1=$('#contact_number1').val();
		var lead_type1=$('#lead_type1').val();
		var email1=$('#email1').val();		
		$('#err_off_address1').html('&nbsp;')
		$('#err_country1').html('&nbsp;')
		$('#err_states1').html('&nbsp;')
		$('#err_cities1').html('&nbsp;')
		$('#err_postcode1').html('&nbsp;')
		$('#err_location_type1').html('&nbsp;')
		$('#err_contact_number1').html('&nbsp;')
		$('#err_lead_type1').html('&nbsp;')
		$('#err_email1').html('&nbsp;')
		//$('#err_head_off1').html('&nbsp;')

				if(off_address1==''){
					$('#err_off_address1').html('Office Address is Required')
					return false;
				}if(country1==''){
					$('#err_country1').html('Country is Required')
					return false;
				}if(states1==''){
					$('#err_states1').html('State is Required')
					return false;
				}if(cities1==''){
					$('#err_cities1').html('City is Required')
					return false;
				}if(postcode1==''){
					$('#err_postcode1').html('Postcode is Required')
					return false;
				}if(location_type1==''){
					$('#err_location_type1').html('Location Type is Required')
					return false;
				}if(contact_number1==''){
					$('#err_contact_number1').html('Mobile Number is Required')
					return false;
				}if(lead_type1==''){
					$('#err_lead_type1').html('Lead Type is Required')
					return false;
				}if(email1==''){
					$('#err_email1').html('Email Address is Required')
					return false;
				}
				// if ($("input[name=head_off]:checked").length < 1) {
				// 	$('#err_head_off1').html('Head Office Location is Required')
				// 	return false;}
				
				else{
					form.submit();
				}
						
			

	}


	function form2(){
	
					var ofz_type=$('#ofz_type').val();
					var subsidy1=$('#subsidy1').val();
					var subsidy2=$('#subsidy2').val();
					
					$('#err_subsidy_ofz2').html('&nbsp;')
					$('#err_subsidy1').html('&nbsp;')
					$('#err_subsidy2').html('&nbsp;')
					$('#err_head_off2').html('&nbsp;')

				if(ofz_type==''){
				$('#err_subsidy_ofz2').html('Type is Required')
				return false;
				}else if(ofz_type !=''){

				if(ofz_type=='Implant'){
						if(subsidy1==''){
						$('#err_subsidy1').html('Subsidy is Required')
						return false;
						}
					
				}
				if(ofz_type=='Outplant'){
						if(subsidy2==''){
						$('#err_subsidy2').html('Subsidy is Required')
						return false;
						}
						if ($("input[name=subsidy_ofz2[]]:checked").length < 1) {
						$('#err_head_off2').html('Office Location is Required')
						return false;
						}else{

				form.submit();
				}
				}else{

				form.submit();
				}
				}


									
						

	}


	$(document).ready(function() {

		

	  	// $('#rootwizard').bootstrapWizard({
	  	// 	'tabClass': 'nav nav-pills',
	  	// 	'onNext': function(tab, navigation, index) {
	  	// 		var $valid = $("#commentForm").valid();
	  	// 		if(!$valid) {
	  	// 			$validator.focusInvalid();
	  	// 			return false;
	  	// 		}else{
		// 		var $total = navigation.find('li').length;
		// 		var $current = index+1;
		// 		var $percent = ($current/$total) * 100;
		// 		$('.progress-bar').css({width:$percent+'%'});
		// 		}
	  	// 	}
	  	// });		
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
			var input1 = document.querySelector("#contact_add_form"+divlength+" input#landline_no1");
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
			
			
			window.intlTelInput(input1, {
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
			//$klon.find('input,textarea').val('');
			$klon.prop('id', 'corporate_contactnew_form'+divlength );
			
			

			$("#contactnew_section").append($klon);
			$('#corporate_contactnew_form'+divlength).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv1('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			var input = document.querySelector("#corporate_contactnew_form"+divlength+" input#mobile_no");
			var input1 = document.querySelector("#corporate_contactnew_form"+divlength+" input#landline_no");
			$("#corporate_contactnew_form"+divlength+" input#contact_type").prop('id', 'contact_type'+divlength);
			
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
			
			window.intlTelInput(input1, {
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
			
			var dataSourceContactTypeval  = [
			@include('panels.crm.master_contact_type')
			];
			
			$("#corporate_contactnew_form0 #contact_type"+divlength).magicsearch({
                dataSource: dataSourceContactTypeval,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
                format: '%firstName%',
				hidden: true,
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
			$("#corporate_contactnew_form"+divlength+" #contact_type"+divlength).magicsearch({
                dataSource: dataSourceContactTypeval,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
				hidden: true,
                format: '%firstName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
			var dataSourceOfzval  = [
			@include('panels.crm.corporate_basic')
			];
			
			$("#corporate_contactnew_form"+divlength+" #head_office1").magicsearch({
                dataSource: dataSourceOfzval,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
                format: '%firstName%',
				hidden: true,
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });

			//$("#corporate_contactnew_form"+divlength+" #contact_type").clear();
			
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
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});

		var input = document.querySelector("#landline_no1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});


var input = document.querySelector("#ic_landline_no1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});



var input = document.querySelector("#corporate_contactnew_form0 input#mobile_no");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});

		var input = document.querySelector("#tab1 input#landline1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});

// var input = document.querySelector("#contact_add_form0 input#landline1");
// 		window.intlTelInput(input, {
// 		allowExtensions: true,
// 		autoFormat: false,
// 		autoHideDialCode: false,
// 		autoPlaceholder: true,
// 		defaultCountry: "auto",
// 		ipinfoToken: "yolo",
// 		nationalMode: false,
// 		numberType: "MOBILE",
// 		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
// 		//preferredCountries: ['cn', 'jp'],
// 		preventInvalidNumbers: true,
// 		utilsScript: "../admin-assets/js/utils.js"
// 		});

		
		
// var input = document.querySelector("#tab01 input#landline1");
// 		window.intlTelInput(input, {
// 		allowExtensions: true,
// 		autoFormat: false,
// 		autoHideDialCode: false,
// 		autoPlaceholder: true,
// 		defaultCountry: "auto",
// 		ipinfoToken: "yolo",
// 		nationalMode: false,
// 		numberType: "MOBILE",
// 		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
// 		//preferredCountries: ['cn', 'jp'],
// 		preventInvalidNumbers: true,
// 		utilsScript: "../admin-assets/js/utils.js"
// 		});
		
		var gdata;
		function gethead(request, response) {
			var result = false;

			$.ajax({
			url: "{{url('crm/getheadoffice')}}",
		
			dataType: "json",
			async: false,

			complete: function(data) {
				//alert(data);
				//console.log(data);
			},
			success:function(res)
			{
				result = '[';
				var obj = res.view_details;
				obj.forEach(function(e) {
					result += '{id:'+e.hl_ccb_id+', firstName:"'+e.hl_business_name+'"},';
				}); 
				result += ']';
			}
				});
			return result;

		 }
			
		
		//var ss = gethead();
		
        $(function() {
             var dataSource = [
                <?php foreach ($hdcorporatecont as $hdcorporatecont) { ?>
                {id: <?=$hdcorporatecont->hl_ccb_id?>, firstName: '<?=$hdcorporatecont->hl_business_name?>', lastName: '<?=$hdcorporatecont->hl_head_office_address?>'},

                <?php } ?>
            ];

			
	 	
            $('#head_off1').magicsearch({
                dataSource: dataSource,
               fields: ['firstName', 'lastName'],
                id: 'id',
                method:'POST',
				hidden: true,
                format: '%firstName%  %lastName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
			
            $('#head_office1').magicsearch({
                dataSource: dataSource,
               fields: ['firstName', 'lastName'],
                id: 'id',
                method:'POST',
				hidden: true,
				format: '%firstName%  %lastName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
            $('#set-btn').click(function() {
                $('#basic').trigger('set', { id: '3,4' });
            });
			
			var dataSourceContactType = [
                @include('panels.crm.master_contact_type')
            ];
	 	
            $('#corporate_contactnew_form0 input#contact_type').magicsearch({
                dataSource: dataSourceContactType,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
                format: '%firstName%',
                hidden: true,
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
        });
    </script>

   @stop
