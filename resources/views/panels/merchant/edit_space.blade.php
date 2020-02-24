@extends('layouts.merchant_main')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')
<section class="hero-section-view-hotel mb-10 mt-10 sticky">
<div class="container">
<div class="row">
<style>
					  .croppedImg{width:180px;}
					  .img-sz{width: 180px; min-height: 100px;
    background: #ccc;   
    margin-bottom: 10px;
    }
	.error{color:#a01d1c;    margin: 0 !important;}
	hr{display:none;}
	
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{    padding: 4px!important;
    line-height: 1!important;
    vertical-align: middle !important;}
	td,th{text-align:center;}	
	
	.checkbox{margin:0!important;}
		.label-info{ background:none !important}
		.label{ color:#807b7b !important}
					  </style>
 <form id="commentForm" action="{{url('merchant/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>
	
			
    
    
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3 >EDIT VENUES</h3>
                            <div class="row mt-30 "></div>
                           
						    <div class="col-md-2 col-xs-12"></div>
						   
                           <div class="col-md-8 col-xs-12">
								<div class="x_panel">
								
								 <div class="x_title">
								  </div>
								
   @foreach ($hotels as $hotel)
					<div class="row rm{{ $hotel->id }}" >
					<div class="row mb-10 "></div>	
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							 <div class="row">
							 	@if($hotel->image_1 != '')
							<img class="img-responsive 1" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_1 }}" alt="">
							@else
								if($hotel->image_2 !=)
								<img class="img-responsive 2" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_2 }}" alt="">
								@else

									if($hotel->image_3 !=)
									<img class="img-responsive 3" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_3 }}" alt="">								
									@endif

								@endif
							@endif
							</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left mt-10">
							
							<p>{{ $hotel->hotel_name }}</p>
							
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="row mt-10">
							
							<a href="{{ url('venue-details') }}/{{ $hotel->id }}" class="btn-info btn-xs border-radius-none custom-btn-inner" target="blank"> View </a>
                            <a href="javascript:void(0);" class="edit_blog btn-info btn-xs border-radius-none custom-btn-inner" id="{{ $hotel->id }}" > Edit </a>
                            <a href="javascript:void(0);" class="btn-danger btn-xs delete_blog border-radius-none custom-btn-inner" id="{{ $hotel->id }}"> Delete </a>
							<?php 
/*
							<a href="{{ url('merchant/enquiry') }}/{{ $venue->v_id }}" class="btn btn-primary btn-center enqiry-button">View Enquiries</a>
							<p>&nbsp;</p>
							
							<a href="{{ url('merchant/edit-venue') }}" class="btn btn-primary btn-center enqiry-button">Update Venue Details</a>
							*/?>
							</div>
							</div>
						</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>					  
                    </div>
					@endforeach
					<div class="row mt-30 "></div>
  
								</div>
					</div>
					
					
					 <div class="col-md-2 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 							
                        </div>
                    </div>
                     </div>
            
        </div>
    </section>
					<section class="edit_section"  style="background: #000;">
                    
                        <nav class="navbar navbar-default" role="navigation">
                        
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


								<!-- <li><a href="#tab1" data-toggle="tab">CONTACT</a></li>
								<li><a href="#tab01" data-toggle="tab">OCCASION </a></li>
								<li><a href="#tab2" data-toggle="tab">CAPACITY</a></li>
								<li><a href="#tab3" data-toggle="tab">FEATURES</a></li>
								<li><a href="#tab4" data-toggle="tab">FOOD & DRINK</a></li>
								<li><a href="#tab5" data-toggle="tab">LICENSING</a></li>
								<li><a href="#tab6" data-toggle="tab">RESTRICTIONS</a></li>
								<li><a href="#tab7" data-toggle="tab">PICTURES</a></li> -->
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                          </div>
                           
                        </nav>
                  
                    <div class="container">
                    <div class="row">
                       <div class="col-lg-2"></div>
                       <div class="col-lg-8" id="venue_form">
                            
                            <div >
				
					
					<div class="tab-content">
					
									
					    <div class="tab-pane" id="tab1">
					    	{{ csrf_field() }}
							<input type="hidden" value="" name="id" id="edit_id" />
							 <div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Add a new venue space here</h4>
                            <div class="row mt-20 "></div>
                            <p>Let customers know what style of Venue they can hire.  This will help target the right customers seeking event space you have to hire.</p>
							<div class="row mt-20 "></div>
							<p>You can multi-select any of the options below.</p>
                            <div class="row mt-20 mb-20 "></div>  
							</div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group mt-2">
                                        <div class="col-sm-12"><label>Space name *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
                                    </div>
									
									<div class="form-group mt-2">
                                       <div class="col-sm-12">
										 <div class="row">
										 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										 
										 <label>Price per hour *</label>
										<input type="text" placeholder="£" name="per_hour" id="per_hour" value="{{ old('per_hour') }}" class="form-control required" data-error="#err_per_hour" >
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#upload-file-info1').html(this.files[0].name)" name="pdf1"/>
												
											</div>
											<span class='label label-info' id="upload-file-info1"></span>
										</div>
										</div>
										<span id="err_per_hour" style="position:relative;top: -2px;"></span>                                     
                                        <span class="error" style="position: relative;
    top: -12px;">{{ ($errors->has('per_hour')) ? $errors->first('per_hour') : ''}}</span> 
										</div>                                        
                                    </div>
                                    <div class="form-group mt-2">
                                       <div class="col-sm-12">
										<div class="row">
										
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										<label>Price per person *</label>
										<input type="text" placeholder="£" name="per_person" id="per_person" value="{{ old('per_person') }}" class="form-control required" data-error="#err_per_person" >
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#upload-file-info2').html(this.files[0].name)" name="pdf2"/>					
											</div>										
											<span class='label label-info' id="upload-file-info2"></span>
										</div>
										
										</div>
										
										<span id="err_per_person" style="position:relative;top: -2px;"></span>                                     
                                        <span class="error" style="position: relative;
    top: -12px;">{{ ($errors->has('per_person')) ? $errors->first('per_person') : ''}}</span> 
										</div>                                     
                                    </div>
									 <div class="form-group mt-2">
                                        
										
										
										 <div class="col-sm-12">
										<div class="row">
										
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										<label>Price per day *</label>
										<input type="text" placeholder="£" name="per_day" id="per_day" value="{{ old('per_day') }}" class="form-control required" data-error="#err_per_day" >
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									
											<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#upload-file-info').html(this.files[0].name)" name="pdf3"/>
												
											</div>
											<span class='label label-info' id="upload-file-info"></span>
										</div>
										</div>
										
										<span id="err_per_day" style="position:relative;top: -2px;"></span>                                     
                                        <span class="error" style="position: relative;
    top: -12px;">{{ ($errors->has('per_day')) ? $errors->first('per_day') : ''}}</span> 
										</div>
									 </div>	
									
									
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6 ">
								<div class="form-group">
                                        <div class="col-sm-12"><label>Used Venue Description </label>
										<span id="used_venue">
										<input type="checkbox"  name="use_venue_description"    data-error="#use_venue_description" value="1" > 
										</span>
										</div>                                      
                                    </div>
                                     <div class="form-group mb-20">                                        
                                        <div class="col-sm-12"><label>Venue Description (600 characters left) *</label>
                                            <textarea rows="13" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
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
                            <h4>Occasion</h4>
                            <div class="row mt-20 "></div>
                            <p>Let customers know what type of events you're able to host. Multi-select any of the options below. Selecting more options from this list will give you a better chance of appearing in searches.</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
							<ul class="col-lg-12 listAppend" id="ucategory">
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
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Capacity</h4>
                            <div class="row mt-20 "></div>
                            <p>It’s really important to let your target audience know what your capacity is in a variety of settings. While some wedding receptions may only be for 60 quests, others may want to host 300+ people. State the maximum number of people your venue can hold. Consider each “setup” with seating arrangements where appropriate.</p>
							<div class="row mt-20 mb-20 "></div> 
							
							
										
											
											
							</div> 
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
										<label>{{ $VenueCapacity->title }}</label>
										<input type="hidden" name="capacity[]" value="{{ $VenueCapacity->id }}"  value="" /><input type="text" name="capacity_value[]" id="capcity_{{ $VenueCapacity->id }}" value="" data-error="#err_capacity_value"/>
										<span id="err_capacity_value" style="position:relative;top: -2px;"></span>										
										</div>
									 </div>                                 
                                <?php echo $val; $i++;?>
								@endforeach 
						<div class="col-sm-5" >	
						<div class="form-group">
						
						<div class="fileUpload btn btn-default btn-file" style="margin-left:0px">
							<span>Upload Floor Plan PDF</span>
							<input type="file" class="upload" onchange="$('#upload-file-info4').html(this.files[0].name)" name="pdf4"/>					
							</div>										
							<span class='label label-info' id="upload-file-info4"></span>
							</div>
						</div>
						
                                
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
							<ul class="col-lg-12 listAppend" id="uvf">
							 @foreach ($VenueFeatures as $VenueFeatures)
                                       <li class="col-lg-4 checkbox">
                                           <input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" data-error="#err_features"/>	 
                                            <label >{{ $VenueFeatures->title }}</label>
											<span id="err_features" style="position:relative;top: -2px;"></span>
                                        </li> 
										@endforeach
                                              
                                </ul>
								<!-- <div class="col-lg-offset-4 col-lg-6 col-sm-offset-4 col-sm-6 col-md-offset-4 col-md-6 col-xs-12 add_feature_box">
                                     <input type="text" class="form-control" id="feature_name" name="add_feature" placeholder="Add a Feature">
                                     <div><i class="fa fa-plus listCheck" aria-hidden="true"></i></div>
                                </div> -->
								
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
											<span id="err_fooddrink" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
								
								<div class="col-sm-12 col-md-12 col-lg-12 mb-20" ><label>Upload Your Menu</label><!--<input type='button' value='Add Button' id='addButton'>
<input type='button' value='Remove Button' id='removeButton'>
<input type='button' value='Get TextBox Value' id='getButtonValue'>	--></div>
								<div class="col-sm-12 col-md-12 col-lg-12 mb-10" >
								<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6"> 
								<div class="row"  >
										 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										 
										 <label>Menu Name #1</label>
										<input type="text" placeholder="" name="menu_name_1" value="" id="menu_name_1" class="form-control" >
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											
												<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#fd_menu_pdf_1').html(this.files[0].name)" name="fd_menu_pdf_1"/>					
											</div>										
											<span class='label label-info' id="fd_menu_pdf_1"></span>
												
										</div>
								</div>
									</div>
								<div class="col-sm-6 col-md-6 col-lg-6"> 
								<div class="row"  >
										 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										 
										 <label>Menu Name #2</label>
										<input type="text" placeholder="" name="menu_name_2" id="menu_name_2"  value="" class="form-control" >
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											
												<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#fd_menu_pdf_2').html(this.files[0].name)" name="fd_menu_pdf_2"/>					
											</div>										
											<span class='label label-info' id="fd_menu_pdf_2"></span>
												
										</div>
								</div>
									</div>
								</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-12 mb-10" >
								<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6"> 
								<div class="row"  >
										 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										 
										 <label>Menu Name #3</label>
										<input type="text" placeholder="" name="menu_name_3" value="" id="menu_name_3" class="form-control" >
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											
												<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#fd_menu_pdf_3').html(this.files[0].name)" name="fd_menu_pdf_3"/>					
											</div>										
											<span class='label label-info' id="fd_menu_pdf_3"></span>
												
										</div>
								</div>
									</div>
								<div class="col-sm-6 col-md-6 col-lg-6"> 
								<div class="row"  >
										 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
										 
										 <label>Menu Name #4</label>
										<input type="text" placeholder="" name="menu_name_4" id="menu_name_4"  value="" class="form-control">
										</div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<label class="mob">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											
												<div class="fileUpload btn btn-default btn-file">
												<span>Upload PDF</span>
												<input type="file" class="upload" onchange="$('#fd_menu_pdf_4').html(this.files[0].name)" name="fd_menu_pdf_4"/>					
											</div>										
											<span class='label label-info' id="fd_menu_pdf_4"></span>
												
										</div>
								</div>
									</div>
								</div>
								</div>
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
											<span id="err_licensing" style="position:relative;top: -2px;"></span>
                                        </li> 
							@endforeach
                                              
                                </ul>
						
					    </div>
						
							<!--//VENUE RESTRICTIONS-->
						<div class="tab-pane" id="tab6">
						<div class="col-sm-12 col-md-12 col-lg-12">
                            <h4>Restrictions</h4>
                            <div class="row mt-20 "></div>
                            <p>What types of events is your venue suitable for? Are there any restrictions?
Be upfront with your customers about any rules, restrictions or special conditions that apply at your venue. Are there any events that you cannot accommodate?
</p>
							<div class="row mt-20 mb-20 "></div>  
							</div> 
							 <ul class="col-lg-12 listAppend" id="uvr">
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
	$.scrollTo($('#bs-example-navbar-collapse-2'), 1000); 
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

	var host="{{ url('merchant/getspace/') }}";
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

$('#edit_id').val(res.view_details.venue.v_id);	
	$('#title').val(res.view_details.venue.title);
	$('#category').val(res.view_details.venue.category_id);			
	$('#per_hour').val(res.view_details.venue.per_hour);
	$('#per_person').val(res.view_details.venue.per_person);
	$('#per_day').val(res.view_details.venue.per_day);
$('#upload-file-info1').html(res.view_details.venue.per_hour_pdf);
$('#upload-file-info2').html(res.view_details.venue.per_person_pdf);
$('#upload-file-info').html(res.view_details.venue.per_day_pdf);	

$('#upload-file-info4').html(res.view_details.venue.floor_plan_pdf);

$('#menu_name_1').val(res.view_details.venue.menu_name_1);
$('#menu_name_2').val(res.view_details.venue.menu_name_2);
$('#menu_name_3').val(res.view_details.venue.menu_name_3);
$('#menu_name_4').val(res.view_details.venue.menu_name_4);
$('#fd_menu_pdf_1').html(res.view_details.venue.fd_menu_pdf_1);
$('#fd_menu_pdf_2').html(res.view_details.venue.fd_menu_pdf_2);
$('#fd_menu_pdf_3').html(res.view_details.venue.fd_menu_pdf_3);
$('#fd_menu_pdf_4').html(res.view_details.venue.fd_menu_pdf_4);

	if(res.view_details.venue.use_venue_description == 1){
		$("#used_venue input[name=use_venue_description][value=1]").prop('checked', true);	
		}
		var string = res.view_details.venue.category_id;
		var array = string.split(',');		
		$.each(array, function(index, data) {	
			$('#ucategory input[value='+data+']').filter(':checkbox').prop('checked',true);	      
        });
	$('#description').val(res.view_details.venue.description);	

	var image_path1=res.view_details.venue.image_1;
	var image_path2=res.view_details.venue.image_2;
	var image_path3=res.view_details.venue.image_3;
	var image_path4=res.view_details.venue.image_4;
	var image_path5=res.view_details.venue.image_5;
	var image_path6=res.view_details.venue.image_6;
var v_id=res.view_details.venue.v_id;
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
	  $('#capcity_'+data.capacity_id).val(data.capacity_value);
	  
		//	$('#uvc input[value='+data.capacity_id+']').filter(':checkbox').prop('checked',true);	      
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
$.each(res.view_details.user_venue_restrictions, function(index, data) { 
			$('#uvr input[value='+data.restrictions_id+']').filter(':checkbox').prop('checked',true);	      
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
