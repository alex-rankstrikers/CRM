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
			//border:1px solid rgba(0, 0, 0, 0.125);
			margin:5px;
		}
		.firstrow{
			flex-direction: row;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		
		$unchecked-star: '\2606';
$unchecked-color: #888;
$checked-star: '\2605';
$checked-color: #e52;

.star-cb-group {
  /* remove inline-block whitespace */
  font-size: 0;
  * {
    font-size: 1rem;
  }
  /* flip the order so we can use the + and ~ combinators */
  unicode-bidi: bidi-override;
  direction: rtl;
  & > input {
    display: none;
    & + label {
      /* only enough room for the star */
      display: inline-block;
      overflow: hidden;
      text-indent: 9999px;
      width: 1em;
      white-space: nowrap;
      cursor: pointer;
      &:before {
        display: inline-block;
        text-indent: -9999px;
        content: $unchecked-star;
        color: $unchecked-color;
      }
    }
    &:checked ~ label:before,
      & + label:hover ~ label:before,
      & + label:hover:before {
      content: $checked-star;
      color: #e52;
      text-shadow: 0 0 1px #333;
    }
  }
  
  /* the hidden clearer */
  & > .star-cb-clear + label {
    text-indent: -9999px;
    width: .5em;
    margin-left: -.5em;
  }
  & > .star-cb-clear + label:before {
    width: .5em;
  }

  &:hover > input + label:before {
    content: $unchecked-star;
    color: $unchecked-color;
    text-shadow: none;
  }
  &:hover > input + label:hover ~ label:before,
  &:hover > input + label:hover:before {
    content: $checked-star;
    color: $checked-color;
    text-shadow: 0 0 1px #333;
  }
}
  .select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #dfcbac 1px !important;
    outline: 0;
}
.select2-container--default .select2-selection--multiple{border:1px solid #dfcbac !important;
	border-radius:0px !important;cursor:text;
}

					  </style>
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
 <form id="commentForm" action="{{url('crm/hotel/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
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
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, hotel lead details has been successfully added.</div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
					<div class="card mb-3">
         
          <div class="card-body">
			<h4 class="card-title">ADD HOTEL LEADS</h4>
			<div class="row mt-30 "></div>  
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="navbar-pills " id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav nav-tabs tab-no-active-fill " style="margin-top: 10px;">                    
								<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Hotel Information</a></li>	
								<li class="nav-item"><a class="nav-link" href="#tab01" data-toggle="tab">Hotel Contact</a></li>
								
								
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                         
					              
					
					<div class="tab-content" id="tab-contents" style="margin-top:0px;">
						
					
					    <div class="tab-pane active" id="tab1">
					    	{{ csrf_field() }}
                                <div class="row">
                              
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                       <label>Hotel Type </label><select name="hotel_type" id="hotel_type" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" ><option value="Group/Chain">Group/Chain</option><option value="Independent">Independent</option></select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('hotel_type')) ? $errors->first('hotel_type') : ''}}</span>
										

										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										<div  id="grp_sec"><label>Group Name </label><input name="grp_name" id="grp_name" type="text" class="form-control required" data-error="#err_grp_name" >
										<span id="err_grp_name" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
										</div>
									</div>


									

										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										<label>Hotel Name </label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
                                        </div>

                                     <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Address </label><input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
										                                       
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Country </label>
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
									 <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>State </label><select name="states" id="states"  class="form-control states js-example-basic-multiple w-100" style="width: 100%" data-error="#err_states">
									    <option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span>                                    
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City </label><select name="cities" id="cities"  class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    
									
									
                               
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                       <label>Postcode </label><input type="text" class="form-control required" name="postcode" id="postcode" value="{{ old('postcode') }}" data-error="#err_postcode">
										<span id="err_postcode" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										
										
                                         
                                    </div>
									
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                       <label>Website </label><input type="text" class="form-control required" name="website" id="website" value="{{ old('postcode') }}" data-error="#website">
										<span id="website" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('website') : ''}}</span>
										
										
                                         
                                    </div>
                                    	<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        
										<label>Contact Number </label>
										
										<input type="tel" class="form-control required" name="contact_no" id="contact_no" value="{{ old('contact_no') }}" data-error="#err_contact_no">
									<span class="error" id="err_contact_no" style="position:relative;top: -10px;">{{ ($errors->has('err_contact_no')) ? $errors->first('err_contact_no') : ''}}</span>
																			
                                    </div>
                                	<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>No of Room </label><input name="no_of_room" id="no_of_room" type="text" class="form-control required" data-error="#no_of_room" >
										<span id="no_of_room" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('no_of_room')) ? $errors->first('no_of_room') : ''}}</span>
																			
                                      
                                    </div>
									
									<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                       <label>No of Meeting Room </label><input name="no_of_m_room" id="no_of_m_room" type="text" class="form-control required" data-error="#err_price" >
										<span id="err_price" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('no_of_m_room')) ? $errors->first('no_of_m_room') : ''}}</span>
																				
                                      
                                    </div>
									
									
                                    
                                     <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type </label><select name="lead_type" id="lead_type" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" >
									 <option value="">Choose Lead Type</option>									
										 @foreach ($hdlead_type as $hdlead_type)
										 <option value="{{ $hdlead_type->hl_mt_lt_id }}">
										 {{ $hdlead_type->hl_lead_type_name }}
										 </option>
										 @endforeach
									 </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('lead_type')) ? $errors->first('lead_type') : ''}}</span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Property Type </label>
										<select class="form-control js-example-basic-multiple w-100 " multiple="multiple" tabindex="2" name="property_type[]" id=""  data-error="#err_type" >
										@foreach ($hdproperty_type as $hdproperty_type)
										<option value="{{ $hdproperty_type->hl_pro_id }}">{{ $hdproperty_type->hl_property_description }}</option>
										@endforeach
										</select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('property_type')) ? $errors->first('property_type') : ''}}</span>
										</div>

									<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Solution Type</label>								
<select class="form-control js-example-basic-multiple w-100 " multiple="multiple"  name="solution_type[]" id="" style="width:100%;"> 
											<option value="1">Sales Solutions</option>
									<option value="2">Marketing Solutions</option>
									<option value="3">Revenue Solutions</option>
									<option value="4">Software Solutions</option>
									<option value="5">The Great Stays</option>
									<option value="6">CRM Solutions</option>	
										</select> 

									<!-- <select  multiple="multiple" tabindex="2" name="solution_type[]" id="solution_type" class="form-control" data-error="#err_type" >					
									<option value="1">Sales Solutions</option>
									<option value="2">Marketing Solutions</option>
									<option value="3">Revenue Solutions</option>
									<option value="4">Software Solutions</option>
									<option value="5">The Great Stays</option>
									<option value="6">CRM Solutions</option>						
									</select> -->
									<span id="err_type" style="position: relative;top: -2px;"></span>
									<span class="error">{{ ($errors->has('solution_type')) ? $errors->first('solution_type') : ''}}</span>
									</div>

										
										<div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                        <div class="aligncheck flex-items"><label style="margin-top:10px;">Star Rating </label>
										
										<span class="star-rating">
									   <!--RADIO 1-->
										<input style="margin-right:0" type='radio' class="radio_item" value="1" name="star_rate" id="radio1">
											<label style="margin-right:10px" class="label_item" for="radio1"> <i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>

										<!--RADIO 2-->
										<input style="margin-right:0" type='radio' class="radio_item" value="2" name="star_rate" id="radio2">
										<label style="margin-right:10px" class="label_item" for="radio2"><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>

										  <!--RADIO 3-->
										<input style="margin-right:0" type='radio' class="radio_item" value="3" name="star_rate" id="radio3">
										<label style="margin-right:10px" class="label_item" for="radio3"><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>


										  <!--RADIO 4-->
										<input style="margin-right:0" type='radio' class="radio_item" value="4" name="star_rate" id="radio4">
										<label style="margin-right:10px" class="label_item" for="radio4"><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>
										  <!--RADIO 5-->
										<input style="margin-right:0" type='radio' class="radio_item" value="5" name="star_rate" id="radio5">
										<label style="margin-right:10px" class="label_item" for="radio5"><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>
										
										<input style="margin-right:0" type='radio' class="radio_item" value="6" name="star_rate" id="radio6">
										<label style="margin-right:10px" class="label_item" for="radio6"><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>
										
										<input style="margin-right:0" type='radio' class="radio_item" value="7" name="star_rate" id="radio7">
										<label style="margin-right:10px" class="label_item" for="radio7"><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i><i style="color:orange" class="fa fa-star" aria-hidden="true"></i></label></input>
									</span>
										
										
										  
										<span id="star_rate" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('star_rate')) ? $errors->first('star_rate') : ''}}</span>
										</div>										
                                      
                                   
                                    
									
                                    
                                     
                                </div>
                                </div>
								  <div class="col-sm-12 col-md-12 col-lg-12">
								  <label>Notes </label>
								  <input name="hotel_description" class="tinymce" id="hotel_description"> </input>
									</div>
									<div style="height:20px"></div>
								  <div align="right" class="col-sm-12">
								 <a class="btn btn-primary btn-lg btnNext pull-right" >Next</a>
								 </div>
					    </div>
					   
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
						<div id="contact_section" class="">
						 <div id="contact_add_form0" class="row">
							
		<div class="col-sm-12 col-md-6 col-lg-6 form-group ">

		<label>Title </label><select name="c_title[]" id="c_title" type="text" class="form-control" data-error="#err_c_title"><option value="">Choose Title</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select>
		<span id="err_contact_person" style="position: relative; top: -2px;"></span>
		<span class="error">{{ ($errors->has('contact_person')) ? $errors->first('contact_person') : ''}}</span>

		</div>
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Main Contact</label>
		<div style="padding-top: 5px;">
			<input type="checkbox" id="contact_status" name="contact_status">&nbsp;&nbsp;Yes
		</div>
		</div>

		<div class="col-sm-12 col-md-6 col-lg-6 form-group">

		<label>First Name </label><input name="firstname[]" id="firstname" type="text" class="form-control required" data-error="#err_firstname" >
		<span id="err_firstname" style="position: relative; top: -2px;"></span>
		<span class="error">{{ ($errors->has('firstname')) ? $errors->first('firstname') : ''}}</span>

		</div>
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">

		<label>Last Name </label><input name="lastname[]" id="lastname" type="text" class="form-control required" data-error="#err_lastname" >
		<span id="err_lastname" style="position: relative; top: -2px;"></span>
		<span class="error">{{ ($errors->has('lastname')) ? $errors->first('lastname') : ''}}</span>

		</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation </label>
											<input type="text" id="contact_designation" name="contact_designation[]" class="form-control">

											<!-- <select name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation">
												<option value="">Choose</option>
												@foreach($Contactdesignation as $ConDes)
												<option value="{{$ConDes->hl_cd_id}}">{{$ConDes->hl_title}}</option>
												@endforeach
											</select> -->

										


										<span id="err_contact_designation" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''}}</span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Number </label><input name="contact_number[]" id="contact_number" type="tel" class="form-control required" data-error="#err_contact_number" >
										<span id="err_contact_number" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_number')) ? $errors->first('contact_number') : ''}}</span>
										</div>

									
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email</label><input name="contact_email[]" id="contact_email" type="text" class="form-control required" data-error="#err_contact_email" >
										<span id="err_contact_email" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('linked_in')) ? $errors->first('linked_in') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn Contact </label><input name="linked_in[]" id="linked_in" type="text" class="form-control " data-error="#err_linked_in" >
										<span id="err_linked_in" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('linked_in')) ? $errors->first('linked_in') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype Contact </label><input name="skype_con[]" id="skype_con" type="text" class="form-control " data-error="#skype_con" >
										<span id="skype_con" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('skype_con')) ? $errors->first('skype_con') : ''}}</span>
										</div>
										

										<div class="col-sm-12 col-md-12 col-lg-12">
								  <label>Notes </label>
								  <input name="contact_hotel_description[]" class="tinymce" id="contact_hotel_description"> </input>
									</div>


									<div align="right" class="col-sm-12 col-md-12 col-lg-12 mt-30">
										<button type="button" id="clone" class="btn btn-inverse-info btn-icon">
										<i class="fa fa-plus" aria-hidden="true"></i>
										</button>
										</div>
										
                                </div>	
								
                               </div>	
								<input type="hidden" id="contact_status_hidden" name="contact_status_hidden"></input>

					<!-- 	<div style="height:20px"></div>												
						<div class="row">
							<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>
							<div align="right" class="col-sm-6 col-md-6 col-lg-6">
							<button type="button" id="clone" class="btn btn-inverse-info btn-icon">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </button>
						</div>
						</div> -->
						
						<div style="height:30px;"></div>
						<div class="form-row text-right" style="clear:both">
						<div class="mt-lg-4"></div>
						<div class="mt-lg-4"></div>
						
						<div class="col-12">
							<input style="width:auto;" type="submit" id="saveform" value="Finish" class="btn btn-primary  btn-lg next-btn" style="">
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
<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>	
	<script type="text/javascript">
	
	 $(function () {
 $('select#property_type').multiselect({
								columns: 2,
								placeholder: 'Property type',
								search: true,
								searchOptions: {
									'default': 'Search Property type'
								},
								selectAll: true
							});

 $('select#solution_type').multiselect({
								columns: 2,
								placeholder: 'Solution type',
								search: true,
								searchOptions: {
									'default': 'Search Solution type'
								},
								selectAll: true
							});

 });
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
	   $('#cities').html('');

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
	
	/*$(document).ready(function() {
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
	*/
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

	$("button#clone").click(function () {
			var $div = $('div[id^="contact_add_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="contact_add_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'contact_add_form'+divlength );
			
			//$klon.prepend('<div align="right" class="pull-right"><span id=rem'+divlength+' onclick="removediv('+divlength+')" class="mdi mdi-window-close"></span></div>');
			
			$("#contact_section").append($klon);
			$('#contact_add_form'+divlength ).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			var input = document.querySelector("#contact_add_form"+divlength+" input#contact_number");
		//	var tiny_input = document.querySelector("#contact_add_form"+divlength+" input#contact_hotel_description");
			$("#contact_add_form"+divlength+" input#contact_hotel_description").prop('id', 'contact_hotel_description'+divlength );
			//$('#contact_add_form'+divlength).find('.mce-content-body').each(function () {
			//	$(this).removeAttr('id');
			//});
			$('#contact_add_form'+divlength).find('div.mce-tinymce').remove();
			//tinyMCE.execCommand('mceAddControl',false,'#contact_hotel_description'+divlength);

			tinymce.init({
				selector: ".tinymce",theme: "modern",height: 200,
				 plugins: [
					  "advlist autolink link image lists charmap print preview hr anchor pagebreak",
					  "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
					  "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
				],
				relative_urls : false,
				menubar: false,
				toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
				toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
				image_advtab: false ,
				external_filemanager_path:"{{ url('') }}/file_manager/filemanager/",
				filemanager_title:"Responsive Filemanager" ,
				external_plugins: { "filemanager" : "{{ url('') }}/file_manager/filemanager/plugin.min.js"}
		  });
			
			  $('.mce-tinymce').css('display', 'block');



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
        var token = "{{ Session::token() }}";
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
	
	$('.star-rating input').click( function(){
    starvalue = $(this).attr('value');
    
    // iterate through the checkboxes and check those with values lower than or equal to the one you selected. Uncheck any other.
    for(i=0; i<=7; i++){
        if (i <= starvalue){
            $("#radio" + i).prop('checked', true);
        } else {
            $("#radio" + i).prop('checked', false);
        }
    }
});
	  
	</script>

   @stop
