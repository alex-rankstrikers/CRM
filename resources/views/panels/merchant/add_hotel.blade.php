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
 <form id="commentForm" action="{{url('merchant/hotel/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>	
    
    <section>
        <div class="container-fluid">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>ADD HOTEL</h3>                            
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, thank you for adding your hotel to TBBC.  We’ll review your details now and make the listing live within 24 hours. Should we need any further information from you, we’ll contact you on the telephone number and email address provided. </div>
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
								<li><a href="#tab01" data-toggle="tab">Befefits </a></li>
								<li><a href="#tab2" data-toggle="tab">Amenities</a></li>
								<li><a href="#tab02" data-toggle="tab">Meeting & Events</a></li>
								<li><a href="#tab03" data-toggle="tab">Business</a></li>
								<li><a href="#tab3" data-toggle="tab">Features</a></li>
								<li><a href="#tab4" data-toggle="tab">Food & Drink</a></li>
								<li><a href="#tab5" data-toggle="tab">Licensing</a></li>
								<li><a href="#tab6" data-toggle="tab">Nature Day Light</a></li>
								<li><a href="#tab7" data-toggle="tab">Capacity Chart</a></li>
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
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Hotel name *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
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
                                    	<div class="form-group">
                                        <div class="col-sm-12">
										<label>Contact Number *</label>
										
										<input type="text" class="form-control required" name="contact_no" id="contact_no" value="{{ old('contact_no') }}" data-error="#err_contact_no">
									<span class="error" id="err_contact_no" style="position:relative;top: -10px;">{{ ($errors->has('contact_no')) ? $errors->first('contact_no') : ''}}</span>
										
										</div>										
                                    </div>
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                	<div class="form-group">
                                        <div class="col-sm-12"><label>Starting From Price *</label><input name="price" id="price" type="text" class="form-control required" data-error="#err_price" >
										<span id="err_price" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('price')) ? $errors->first('price') : ''}}</span>
										</div>										
                                      
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Web Site *</label><input name="web" id="web" type="text" class="form-control required" data-error="#err_web" >
										<span id="err_web" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('web')) ? $errors->first('web') : ''}}</span>
										</div>										
                                      
                                    </div>
							
                                     <div class="form-group mb-20">                                        
                                        <div class="col-sm-12 mb-8"><label>Hotel Description (600 characters left) *</label>
                                            <textarea rows="21" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
											<span id="err_description" style="position:relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                        </div> 
                                    </div>
                                    
									
                                    <div class="form-group">
                                        <div class="col-sm-12">&nbsp;</div>                                      
                                    </div>
                                     
                                </div>
								
					    </div>
					   
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
						 <div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Benefits</h4>
                            <div class="row mt-20 "></div>
                            <p>Let customers know what type of events you're able to host. Multi-select any of the options below. Selecting more options from this list will give you a better chance of appearing in searches.</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
						<p id="err_category" style="position:relative;top: -2px;"></p>
							<ul class="col-lg-12 listAppend">
							 @foreach ($Benefits as $Benefit)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="befefit[]" value="{{ $Benefit->id }}" data-error="#err_befefit"/>	 
                                            <label >{{ $Benefit->title }}</label>
											
                                        </li> 
										@endforeach
                                              
                                </ul>								
							
					    </div>

					 <!--//VENUE CAPACITY-->
					    <div class="tab-pane" id="tab2">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Amenities</h4>
                            <div class="row mt-20 "></div>
                            <p>It’s really important to let your target audience know what your capacity is in a variety of settings. While some wedding receptions may only be for 60 quests, others may want to host 300+ people. State the maximum number of people your venue can hold. Consider each “setup” with seating arrangements where appropriate.</p>
							<div class="row mt-20 mb-20 "></div> 
							
							
										
											
											
							</div> 

							<p id="err_category" style="position:relative;top: -2px;"></p>
							<ul class="col-lg-12 listAppend">
							 @foreach ($Amenities as $Amenitie)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="amenities[]" value="{{ $Amenitie->id }}" data-error="#err_amenities"/>	 
                                            <label >{{ $Amenitie->title }}</label>
											
                                        </li> 
										@endforeach
                                              
                                </ul>	

<?php /*
						<p id="err_capacity_value" style="position:relative;top: -2px;"></p>
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
																				
										</div>
									 </div>                                 
                                <?php echo $val; $i++;?>
								@endforeach  */?>
								
							<!-- <div class="col-sm-5" >	
						<div class="form-group">
						
						<div class="fileUpload btn btn-default btn-file" style="margin-left:0px">
							<span>Upload Floor Plan PDF</span>
							<input type="file" class="upload" onchange="$('#upload-file-info4').html(this.files[0].name)" name="pdf4"/>					
							</div>										
							<span class='label label-info' id="upload-file-info4"></span>
							</div>
						</div> -->
                                
					    </div>
						
						<div class="tab-pane" id="tab02">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Meeting & Events</h4>
                            <div class="row mt-20 "></div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        	<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-group mb-20">  
							<div class="fileUpload btn btn-default btn-file" style="margin-left:0px; background: #d2d1d1">
							<span>Upload Meeting Photo</span>
							<input type="file" class="upload" onchange="$('#upload-file-info4').html(this.files[0].name)" name="pdf4"/>					
							</div>
							<span class='label label-info' id="upload-file-info4"></span>
							</div>
							</div>
<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="form-group mb-20">     
							<div class="fileUpload btn btn-default btn-file" style="margin-left:0px; background: #d2d1d1">
							<span>Upload Fact Sheet</span>
							<input type="file" class="upload" onchange="$('#upload-file-info5').html(this.files[0].name)" name="pdf5"/>					
							</div>										
							<span class='label label-info' id="upload-file-info5"></span>
							</div>
						</div>

							<div class="form-group mb-20">                                        
                                        <div class="col-sm-12 mb-8"><label>Check-in/check-out policy</label>
                                            <textarea rows="5" cols="5" class="form-control required" id="checkout_policy" name="checkout_policy" data-error="#err_checkout_policy"> </textarea>
											<span id="err_checkout_policy" style="position:relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('checkout_policy')) ? $errors->first('checkout_policy') : ''}}</span>
                                        </div> 
                                    </div>

					 <div class="form-group mb-20">                                        
                                        <div class="col-sm-12 mb-8"><label>Meeting Description (600 characters left) *</label>
                                            <textarea rows="5" cols="5" class="form-control required" id="m_description" name="m_description" data-error="#err_m_description"> </textarea>
											<span id="err_m_description" style="position:relative;top: -2px;"></span>
											<span class="error">{{ ($errors->has('m_description')) ? $errors->first('m_description') : ''}}</span>
                                        </div> 
                                    </div>

                        </div>

                    	</div>
                    	<div class="tab-pane" id="tab03">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Business</h4>
                            <div class="row mt-20 "></div>
                        </div>
                        <p id="err_features" style="position:relative;top: -2px;"></p>
							<ul class="col-lg-12 listAppend">
							 @foreach ($Business as $Busines)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="business[]" value="{{ $Busines->id }}" data-error="#err_business"/>	 
                                            <label >{{ $Busines->title }}</label>
											
                                        </li> 
										@endforeach
                                              
                                </ul>							
							
                    	</div>
						
						 <!--//VENUE FEATURES-->
						<div class="tab-pane" id="tab3">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Features</h4>
                            <div class="row mt-20 "></div>
                            <p>What are the main benefits or features of your venue that your target customers will be interested in?
These are all the details that will matter to clients, such as capacity, IT setup and on-site services.
Potential clients use this information in their search to decide whether they should call for more information or book a viewing. Accurate and thorough information means more targeted enquiries and a higher success rate of bookings.</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
						<p id="err_features" style="position:relative;top: -2px;"></p>
							<ul class="col-lg-12 listAppend">
							 @foreach ($VenueFeatures as $VenueFeatures)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" data-error="#err_features"/>	 
                                            <label >{{ $VenueFeatures->title }}</label>
											
                                        </li> 
										@endforeach
                                              
                                </ul>							
							
					    </div>
						<!--//VENUE FOOD & DRINK-->
						<div class="tab-pane" id="tab4">
							
                               <div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Food and Drink</h4>
                            <div class="row mt-20 "></div>
                            <p>You’ll receive many enquiries when your profile is complete. However, it's important to let customers know of any restrictions with catering. Are external caterers allow? Are all standard kitchen facilities available?</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
							
                               <ul class="col-lg-12 listAppend">
							 @foreach ($VenueFoodDrink as $VenueFoodDrink)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" data-error="#err_fooddrink"/>		 
                                            <label >{{ $VenueFoodDrink->title }}</label>
										
                                        </li> 
							@endforeach
                                              
                                </ul>
							
								
					
					    </div>
						<!--//VENUE LICENSING-->
						
						<div class="tab-pane" id="tab5">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Licensing </h4>
                            <div class="row mt-20 "></div>
                            <p>What types of events is your venue suitable for? Are there any restrictions?
Be upfront with your customers about any rules, restrictions or special conditions that apply at your venue. Are there any events that you cannot accommodate?

</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
							 <ul class="col-lg-12 listAppend">
							 @foreach ($VenueLicensing as $VenueLicensing)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" data-error="#err_licensing"/>				 
                                            <label >{{ $VenueLicensing->title }}</label>
											
                                        </li> 
							@endforeach
                                              
                                </ul>
							 
					    </div>
							<!--//VENUE RESTRICTIONS-->
						<div class="tab-pane" id="tab6">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Nature Day Light</h4>
                            <div class="row mt-20 "></div>
                            <p>What types of events is your venue suitable for? Are there any restrictions?
Be upfront with your customers about any rules, restrictions or special conditions that apply at your venue. Are there any events that you cannot accommodate?
</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
							 <ul class="col-lg-12 listAppend">
							
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="nature_day_light" value="Yes" data-error="#nature_day_light"/>		 
                                            <label >Yes</label>
											
                                        </li> 
							
                                              
                                </ul>
							
					    </div>

	<div class="tab-pane" id="tab7">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Capacity Chart </h4>
                            <div class="row mt-20 "></div>
                            <p>What types of events is your venue suitable for? Are there any restrictions?
Be upfront with your customers about any rules, restrictions or special conditions that apply at your venue. Are there any events that you cannot accommodate?

</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
							 <ul class="col-lg-12 listAppend">
							 	<div class="table-responsive">
							 	<table class="table table-striped">
							 		<tr><th>Capacity Chart</th>
							 		<th><img src="{{ asset('tbbc/img/1.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/2.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/3.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/4.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/5.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/6.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/7.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/8.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/9.png')}}"></th>
							 		<th><img src="{{ asset('tbbc/img/10.png')}}"></th>
							 		</tr>
							 		<tbody>
							 			 @foreach ($VenueCapacity as $VenueCapacity)
							 			<tr>
							 				<td> <input type="hidden" name="capacity[]" value="{{ $VenueCapacity->id }}" />
							 				<input type="hidden" name="capacity_value[]" value="{{ $VenueCapacity->title }}" />
							 				 <label >{{ $VenueCapacity->title }}</label>	</td>
							 				<td><input type="text" name="total_sq_fit[]"class=""></td>
							 				<td><input type="text" name="room_size[]"class=""></td>
							 				<td><input type="text" name="celing_height[]"class=""></td>
							 				<td><input type="text" name="class_room[]"class=""></td>
							 				<td><input type="text" name="theater_1[]"class=""></td>
							 				<td><input type="text" name="theater_2[]"class=""></td>
							 				<td><input type="text" name="reception[]"class=""></td>
							 				<td><input type="text" name="conference[]"class=""></td>
							 				<td><input type="text" name="u_shape[]"class=""></td>
							 				<td><input type="text" name="h_shape[]"class=""></td>
							 			</tr>
							 			@endforeach
							 		</tbody>
							 	</table>
							 </div>
						
                                              
                                </ul>
							 
					    </div>
					    
						<!--//VENUE PICTURES-->
						
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
	
	<hr style="display:block;">
   @stop
