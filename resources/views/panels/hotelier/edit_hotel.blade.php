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
 <form id="commentForm" action="{{url('merchant/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
							<div class="col-lg-12" id="content_desc">
							<h3>VIEW HOTEL</h3>                            
							<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Hotel updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif 							
							</div>
                    </div>


                    @foreach ($hotels as $hotel)
					<div class="row mb-10 mt-30  rm{{ $hotel->id }}" >
					
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 ">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">
										<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
											<div class="row">
							 	<?php if($hotel->image_1 != ''){
							 		?>
							<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_1 }}" alt="">

							<?php }else{
								if($hotel->image_2 !=''){									?>
								
								<img class="img-responsive 2" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_2 }}" alt="">
								<?php 
									}else{
									if($hotel->image_3 !=''){ 
									?>
									<img class="img-responsive 3" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_3 }}" alt="">					
								<?php 
									}

									}
									} 
							?>
							</div>
										</div>
									
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
											<h4 style="margin-bottom: 0px;">{{ $hotel->hotel_name }}</h4>
											@if($hotel->offer!=0)
										<p style="font-size: 12px"><strong>Offer:</strong>{{ $hotel->offer }} %</p>
										<p style="font-size: 12px"><strong>Start Date:</strong><?php echo date('d-m-Y', strtotime($hotel->offer_start_date))?>-<strong>End Date:</strong><?php echo date('d-m-Y', strtotime($hotel->offer_end_date))?> </p>
										@endif
										
										</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="row mt-10">

													 <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-xs border-radius-none custom-btn-inner offerId" id="{{ $hotel->id }}" > Update Offer</a>
														

														
														<a href="javascript:void(0);" class="btn edit_blog btn-info btn-xs border-radius-none custom-btn-inner" id="{{ $hotel->id }}" > Edit Hotel</a>
													
														<a href="javascript:void(0);" class="btn btn-danger btn-xs delete_blog border-radius-none custom-btn-inner" id="{{ $hotel->id }}"> Delete Hotel</a>	
														
														<a href="{{ url('merchant') }}/add-room/{{ $hotel->id }}" class="btn btn-success btn-xs border-radius-none custom-btn-inner" > Add Room</a>
														
														<a href="{{ url('merchant') }}/view-rooms/{{ $hotel->id }}" class="btn btn-info btn-xs border-radius-none custom-btn-inner" > View Rooms</a>
														


												</div>
											</div>
								</div>
							</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>					  
                    </div>
					@endforeach


                  
<!-- Add Offer -->
			<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Offer</h4>
			</div>
			<div class="modal-body">
					<div class="row">
						<div class="alert alert-success alert-success-offer hidden" role="alert">
						</div>
						<input type="hidden" id="hotel_id" name="hotel_id" value="">
						<div class="col-lg-6"><label>Date Ragnge</label>
						<input type="text" name="DateRange" id="daterange" value="" class="form-control daterange" required>
						<span class="error errordateRange"></span>
						</div>

						<div class="col-lg-6">
						<label>Offer %</label>
						<input type="text" name="offer" id="offer" value="" class="form-control" required>
						<span class="error erroroffer"></span>
						</div>
					</div>

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-success" id="addOffer" >Update</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>

			</div>
			</div>
<!-- Add Offer -->
<div class="tab-bar" style="display: none;">
                    <div class="row mt-30 " >
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
                      
                       <div class="col-lg-12" id="venue_form">
                            
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
					    	<input type="hidden" value="" name="id" id="edit_id" />
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
                                        <div class="col-sm-12"><label>Category *</label>
										<select name="category" id="category"  class="form-control category required" data-error="#err_country" >		
									<option value="">Choose Category</option>									
										 @foreach ($Category as $Categories)
										 <option value="{{ $Categories->c_id }}">
										 {{ $Categories->c_title }}
										 </option>
										 @endforeach
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('category')) ? $errors->first('category') : ''}}</span>
										</div>                                      
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
                                            <textarea rows="27" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
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
							<ul class="col-lg-12 listAppend" id="uvbnft">
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
							<ul class="col-lg-12 listAppend" id="uvamen">
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
							<ul class="col-lg-12 listAppend" id="uvbus">
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
							<ul class="col-lg-12 listAppend" id="uvf">
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
							
                               <ul class="col-lg-12 listAppend" id="uvfd">
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
							 <ul class="col-lg-12 listAppend" id="uvl">
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
                                           <input type="checkbox" name="nature_day_light"  id="nature_day_light" value="Yes" data-error="#nature_day_light"/>		 
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
							 			<?php $i=0;?>
							 			 @foreach ($VenueCapacity as $VenueCapacity)
							 			<tr>
							 				<td> <input type="hidden" name="capacity[]" value="{{ $VenueCapacity->id }}"  />
							 				<input type="hidden" name="capacity_value[]" value="{{ $VenueCapacity->title }}" id="ca_<?php echo $i;?>"/>
							 				 <label >{{ $VenueCapacity->title }}</label>	</td>
							 				<td><input type="text" name="total_sq_fit[]" class="" id="tsf_<?php echo $i;?>"></td>
							 				<td><input type="text" name="room_size[]" class="" id="rs_<?php echo $i;?>" ></td>
							 				<td><input type="text" name="celing_height[]" class="" id="ch_<?php echo $i;?>"></td>
							 				<td><input type="text" name="class_room[]" class="" id="cr_<?php echo $i;?>"></td>
							 				<td><input type="text" name="theater_1[]" class="" id="tr1_<?php echo $i;?>"></td>
							 				<td><input type="text" name="theater_2[]" class="" id="tr2_<?php echo $i;?>"></td>
							 				<td><input type="text" name="reception[]"class="" id="rep_<?php echo $i;?>"></td>
							 				<td><input type="text" name="conference[]" class="" id="conf_<?php echo $i;?>"></td>
							 				<td><input type="text" name="u_shape[]"class="" id="us_<?php echo $i;?>"></td>
							 				<td><input type="text" name="h_shape[]" class="" id="hs_<?php echo $i;?>"></td>
							 			</tr>
							 			<?php  $i++?>
							 			@endforeach
							 		</tbody>
							 	</table>
							 </div>
						
                                              
                                </ul>
							 
					    </div>
					    
						<!--//VENUE PICTURES-->
						
						<div class="tab-pane" id="tab8">				
						<div class="dropzone" id="dropzoneEditFileUpload">

						<span id="image_1"></span>
						<span id="image_2"></span>
						<span id="image_3"></span>
						<span id="image_4"></span>
						<span id="image_5"></span>
						<span id="image_6"></span>	
						<div class="dz-message" data-dz-message><span>Drog and Drop Images Here</span></div>
						<div class="dz-message" data-dz-message><span>Maximum 6 images only allowed, minimum width:1024px </span></div>

						</div>
							
							<!-- <div class="dropzone" id="dropzoneFileUpload">
							<div class="dz-message" data-dz-message><span>Drog and Drop Images Here</span></div>
							<div class="dz-message" data-dz-message><span>Maximum 6 images only, minimum width:1024px </span></div>
							</div>	 -->						
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

          
                                                      
                       </div>
                     
                    </div>


</div>   <!-- End of tab-bar -->

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
	
	
	
	
	
	// EDit Blog
 $(document).on("click", ".edit_blog", edit_venue);
	function edit_venue(){	
	
	$('.tab-bar').show();

$('input:checkbox').removeAttr('checked');
$('input:text').val('');
$('#upload-file-info1').html('');
$('#upload-file-info2').html('');
$('#upload-file-info').html('');
$('#upload-file-info4').html('');
$('#fd_menu_pdf_1').html('');
$('#fd_menu_pdf_2').html('');
$('#fd_menu_pdf_3').html('');
$('#fd_menu_pdf_4').html('');
$('#image_1').html('');
$('#image_2').html('');
$('#image_3').html('');
$('#image_4').html('');
$('#image_5').html('');
$('#image_6').html('');

	$('.edit_section').fadeIn('slow');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 

	var host="{{ url('merchant/gethotel') }}";
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

$('#edit_id').val(res.view_details.venue.id);	
$('#title').val(res.view_details.venue.hotel_name);
$('#address1').val(res.view_details.venue.address1);			
$('#address2').val(res.view_details.venue.address2);
$('#country').val(res.view_details.venue.country);
//$('#states').val(res.view_details.venue.state);
//$('#cities').val(res.view_details.venue.city);
$('#postcode').val(res.view_details.venue.postcode);
$('#contact_no').val(res.view_details.venue.contact);
$('#category').val(res.view_details.venue.category_id);

$('#upload-file-info4').html(res.view_details.venue.meeting_image);
$('#upload-file-info5').html(res.view_details.venue.meeting_fact_sheet);
$('#m_description').val(res.view_details.venue.meeting_description);
$('#checkout_policy').val(res.view_details.venue.meeting_check_out_policy);
$('#price').val(res.view_details.venue.price);
$('#web').val(res.view_details.venue.website);
$('#description').val(res.view_details.venue.description);


if(res.view_details.venue.nature_day_light=='Yes')
{
$('#nature_day_light').filter(':checkbox').prop('checked',true);
}



		$('#states').html('');

		$.each(res.view_details.states, function(index, data) {
		if(res.view_details.venue.state==data.id){
		$('#states').append('<option value="'+data.id+'" selected>'+data.name+'</option>')
		}else{
		$('#states').append('<option value="'+data.id+'">'+data.name+'</option>')
		}


		});

		$('#cities').html('');
		$.each(res.view_details.cities, function(index, data) {
		if(res.view_details.venue.city==data.id){
		$('#cities').append('<option value="'+data.id+'" selected>'+data.name+'</option>')
		}else{
		$('#cities').append('<option value="'+data.id+'">'+data.name+'</option>')
		}


		});

		$('html, body').animate({
        scrollTop: $(".navbar-default").offset().top
    }, 2000);


// $('#menu_name_4').val(res.view_details.venue.menu_name_4);
// $('#fd_menu_pdf_1').html(res.view_details.venue.fd_menu_pdf_1);
// $('#fd_menu_pdf_2').html(res.view_details.venue.fd_menu_pdf_2);
// $('#fd_menu_pdf_3').html(res.view_details.venue.fd_menu_pdf_3);
// $('#fd_menu_pdf_4').html(res.view_details.venue.fd_menu_pdf_4);

	// if(res.view_details.venue.use_venue_description == 1){
	// 	$("#used_venue input[name=use_venue_description][value=1]").prop('checked', true);	
	// 	}
	// 	var string = res.view_details.venue.category_id;
	// 	var array = string.split(',');		
	// 	$.each(array, function(index, data) {	
	// 		$('#ucategory input[value='+data+']').filter(':checkbox').prop('checked',true);	      
 //        });
	// $('#description').val(res.view_details.venue.description);	

var image_path1=res.view_details.venue.image_1;
var image_path2=res.view_details.venue.image_2;
var image_path3=res.view_details.venue.image_3;
var image_path4=res.view_details.venue.image_4;
var image_path5=res.view_details.venue.image_5;
var image_path6=res.view_details.venue.image_6;
var v_id=res.view_details.venue.id;
if(image_path1 != null){
	
$('#image_1').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path1+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path1+',1" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

if(image_path2 != null){
	
$('#image_2').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path2+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path2+',2" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

if(image_path3 != null){

$('#image_3').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path3+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path3+',3" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path4 != null){

$('#image_4').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path4+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path4+',4" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path5 != null){
	
$('#image_5').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path5+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path5+',5" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path6 != null){

$('#image_6').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path6+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path6+',6" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

	

	   $.each(res.view_details.user_venue_capacity, function(index, data) {
	 
	   $('#tsf_'+index).val(data.total_sq_fit);
	   $('#rs_'+index).val(data.room_size);
	   $('#ch_'+index).val(data.celing_height);
	   $('#cr_'+index).val(data.class_room);
	   $('#tr1_'+index).val(data.theater_1);
	   $('#tr2_'+index).val(data.theater_2);
	   $('#rep_'+index).val(data.reception);
	   $('#conf_'+index).val(data.conference);
	   $('#us_'+index).val(data.u_shape);
	   $('#hs_'+index).val(data.h_shape);
	  
	  
			// $('#uvc input[value='+data.capacity_id+']').filter(':checkbox').prop('checked',true);	      
         });
			
		$.each(res.view_details.Amenities, function(index, data) { 
			$('#uvamen input[value='+data.amenities_id+']').filter(':checkbox').prop('checked',true);	      
        }); 
        $.each(res.view_details.Benefits, function(index, data) { 
			$('#uvbnft input[value='+data.benefits_id+']').filter(':checkbox').prop('checked',true);	      
        }); 
        $.each(res.view_details.Business, function(index, data) { 
			$('#uvbus input[value='+data.business_id+']').filter(':checkbox').prop('checked',true);	      
        }); 
$.each(res.view_details.user_venue_features, function(index, data) { 
			$('#uvf input[value='+data.features_id+']').filter(':checkbox').prop('checked',true);	      
        }); 
$.each(res.view_details.user_venue_fooddrink, function(index, data) { 
			$('#uvfd input[value='+data.fooddrink_id+']').filter(':checkbox').prop('checked',true);	      
        }); 
$.each(res.view_details.user_venue_licensing, function(index, data) { 
			$('#uvl input[value='+data.licensing_id+']').filter(':checkbox').prop('checked',true);	      
        }); 

// $.each(res.view_details.user_venue_restrictions, function(index, data) { 
// 			$('#uvr input[value='+data.restrictions_id+']').filter(':checkbox').prop('checked',true);	      
//         }); 		
}

 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
	
	 if (confirm("Are you sure delete hotel?")) {
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
	var host="{{ url('merchant/hotels/remove/') }}";
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

	<script type="text/javascript">
		$('body').on("click", ".offerId", function(){ 
			var hid=$(this).attr('id');
			$('#hotel_id').val(hid);
		})
	$('body').on("click", "#addOffer", addOffer);
	function addOffer(){ 

	var daterange=$('#daterange').val();
	
	var offer = $('#offer').val();
	var hotel_id = $('#hotel_id').val();

	if(daterange==''){
		$('.errordateRange').html('Choose date range');
	}

	if(offer==''){
    $('.errordateRange').html('')
    $('.erroroffer').html('Enter offer')
	}

	if(offer != '' && daterange != ''){
		$('.errordateRange').html('')
		$('.erroroffer').html('')
		 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('merchant/update-offer/') }}";
	$.ajax({
		type: 'POST',
		data:{'id': hotel_id,'offer': offer,'daterange': daterange,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:OfferStatus
	
	})
}

	 
	return false;
	
}
function OfferStatus(res){ 			
			$(".alert-success-offer").html(res.view_details.status).removeClass('hidden');
			setInterval(function () {
			location.reload();
			},1000);
			}
</script>

   @stop
