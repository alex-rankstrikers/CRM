@extends('layouts.adminmain')

@section('head')

@stop

@section('content')



   <div class="">
    <div class="page-title">
              <div class="title_left">
                <h3>Hotels</h3>
              </div>

    </div>
            <div class="clearfix"></div>           

            <div class="row">

		
					<!-- <div class="col-md-12 col-xs-12">
					 <div class="x_panel">-->
					 
					 <!-- LEFT BAR Start-->
					 <div class="col-md-5 col-xs-12">
								<div class="x_panel">
								<form name="actionForm" action="{{url('admin/merchants/hotels/destroy')}}" method="post" onsubmit="return deleteConfirm();"/> 
									<h2>All Hotels <span class="pull-right"><a href="#" class="btn btn-success btn-xs add_blog"><i class="fa fa-plus"></i> Add </a>  
									<button  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete All</button>
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									</span></h2>
								 <div class="x_title">
								  </div>
								
   
    
								  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr><th>
						<input type="checkbox" name="check_all" id="check_all" value=""/></th>						 
                          <th>Title</th>
                          <th>Action</th>                         
                        </tr>
                      </thead>
                      <tbody>
					@foreach ($venue as $venue)
                        <tr class="rm{{ $venue->id }}">
                          <td>
						  <input type="checkbox" name="selected_id[]" class="checkbox" value="{{ $venue->id }}"/>				 	  
						  </td>
                          <td>{{ $venue->hotel_name }}</td>
                         <td>
						 @if($venue->status=='Enable')
						 <a href="#" class="enable btn btn-primary btn-xs" id="{{ $venue->id }}"><i class="glyphicon glyphicon-ok"></i> Enable </a>
						 @else
							 <a href="#" class="disable btn btn-primary btn-xs" id="{{ $venue->id }}" ><i class="glyphicon glyphicon-remove"></i> Disable </a>
						 @endif
						 <!--<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="javascript:void(0);" class="edit_blog btn btn-info btn-xs" id="{{ $venue->id }}" ><i class="fa fa-pencil"></i> Edit </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs delete_blog" id="{{ $venue->id }}"><i class="fa fa-trash-o"></i> Delete </a></td>
                        </tr> 
					@endforeach
						 								
                      </tbody>
                    </table>
</form>	  
								</div>
					</div>
					 <!-- LEFT BAR End-->
					
					
					 <!-- Right BAR Start-->
					<div class="col-md-7 col-xs-12">
					<div class="x_panel" id="add_div" style="">
						<h2>Add Hotels </h2>
						<div class="x_title">
						</div>
						@if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 
						<div class="alert alert-success hidden"></div>
								  <!-- Add Form Start-->
						 <form method="POST" action="{{url('admin/merchants/hotels/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
                      
                            <div id="reportArea">
		<ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
        <li role="presentation" class="active">
          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            <span class="text">Overview</span>
          </a>
        </li>
		 <li role="presentation" class="next">
          <a href="#images" id="profile-tab" role="tab" data-toggle="tab" aria-controls="images">
            <span class="text">Photos</span>
          </a>
        </li>
        <li role="presentation" class="next">
          <a href="#benefits" role="tab" id="benefits-tab" data-toggle="tab" aria-controls="benefits">
            <span class="text">Benefits</span>
          </a>
        </li>
         <li role="presentation" class="next">
          <a href="#amenities" role="tab" id="amenities-tab" data-toggle="tab" aria-controls="amenities">
            <span class="text">Amenities</span>
          </a>
        </li>

		 <li role="presentation" class="next">
          <a href="#features" tabindex="-1" role="tab" id="features-tab" data-toggle="tab" aria-controls="features">
            <span class="text">Features</span>
          </a>
        </li>
		 <li role="presentation" class="next">
         <a href="#food-drink" tabindex="-1" role="tab" id="food-drink-tab" data-toggle="tab" aria-controls="food-drink">
            <span class="text">Food & Drink</span>
          </a>
        </li>
		
        <li role="presentation">
          <a href="#licensing" role="tab" id="licensing-tab" data-toggle="tab" aria-controls="licensing">
            <span class="text">Licensing</span>
          </a>
        </li>
		 <li role="presentation">
          <a href="#business" role="tab" id="business-tab" data-toggle="tab" aria-controls="business">
            <span class="text">Business</span>
          </a>
        </li>
         <li role="presentation" class="next">
          <a href="#capacity" role="tab" id="capacity-tab" data-toggle="tab" aria-controls="capacity">
            <span class="text">Capacity Chart</span>
          </a>
        </li>
      </ul>
	  <div id="myTabContent" class="tab-content">
	    <div role="tabpanel" class="tab-pane in active" id="home" aria-labelledby="home-tab" >
		<br />
         <div class="form-group">
                                    <label class="col-sm-3 control-label"> User Name</label>
                                    <div class="col-sm-6">
									<select name="user_id" id="user_id"  class="form-control">				  
										 @foreach ($users as $user)
										 <option value="{{ $user->uid }}">
										 {{ $user->first_name }}
										 </option>
										 @endforeach
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('user_id')) ? $errors->first('user_id') : ''}}</span>
                                    </div>
                                </div>
														
								
								
								
							
							
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Title</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="title" id="b_title" value="{{ old('title') }}"/>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Price starting from</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="price" id="b_price" value="{{ old('price') }}"/>	
										
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-6">
									<select name="country" id="country"  class="form-control country">		
									<option value="">Choose Country</option>									
										 @foreach ($country as $country)
										 <option value="{{ $country->id }}">
										 {{ $country->name }}
										 </option>
										 @endforeach
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">States</label>
                                    <div class="col-sm-6">
									<select name="states" id="states"  class="form-control states">
									    <option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Cities</label>
                                    <div class="col-sm-6">
									<select name="cities" id="cities"  class="form-control">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Address 1</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="address1" id="address1" value="{{ old('address1') }}"/>
									<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>                                   
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Address 2</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="address2" id="address2" value="{{ old('address2') }}"/>
                                       
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Postcode</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="postcode" id="postcode" value="{{ old('postcode') }}"/>
									 <span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Web Site</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="nearest_transport_link" id="nearest_transport_link" value="{{ old('nearest_transport_link') }}"/>
									 <span class="error">{{ ($errors->has('nearest_transport_link')) ? $errors->first('nearest_transport_link') : ''}}</span>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" style="text-align:left">Description</label>
									  <div class="col-sm-5"><br /><br /></div>
                                    <div class="col-sm-12">
                                        <textarea  class="tinymce" id="description" name="description">{{ old('description') }}</textarea>
										<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                    </div>
                                </div>
        </div>
						<style>
							.croppedImg{width:150px;}
							.img-sz{width: 150px; min-height: 100px;
								background: #ccc;   
								margin-bottom: 10px;
							}
						</style>
						<div role="tabpanel" class="tab-pane in" id="images" aria-labelledby="images-tab" style="min-height:240px" >
						<br /><br />
						<h2>Images</h2>
						<div class="dropzone" id="dropzoneFileUpload">
						</div>
						</div>								


<?php /*- See more at: https://arjunphp.com/how-to-use-dropzone-js-laravel-5/#sthash.qbz7JwGr.dpuf*/ ?>
		
		
       
       
        <div role="tabpanel" class="tab-pane " id="benefits" aria-labelledby="benefits-tab" >
			<br />
			<table style="width:80%">
         @foreach ($VenueBenefits as $VenueBenefits)
                      <tr><td style="padding:5px"><input type="checkbox" name="benefits[]" value="{{ $VenueBenefits->id }}" />	{{ $VenueBenefits->title }}	</td></tr>				
		  @endforeach
		  </table>	
        </div>
         <div role="tabpanel" class="tab-pane " id="amenities" aria-labelledby="amenities-tab" >
			<br />
			<table style="width:80%">
         @foreach ($VenueAmenities as $VenueAmenities)
                      <tr><td style="padding:5px"><input type="checkbox" name="amenities[]" value="{{ $VenueAmenities->id }}" />	{{ $VenueAmenities->title }}	</td></tr>				
		  @endforeach
		  </table>	
        </div>
         <div role="tabpanel" class="tab-pane " id="features" aria-labelledby="features-tab" >
			<br />
			<table style="width:80%">
         @foreach ($VenueFeatures as $VenueFeatures)
                      <tr><td style="padding:5px"><input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" />	{{ $VenueFeatures->title }}	</td></tr>				
		  @endforeach
		  </table>	
        </div>        

        <div role="tabpanel" class="tab-pane " id="food-drink" aria-labelledby="food-drink-tab" >
			<br />
			<table style="width:80%">
        @foreach ($VenueFoodDrink as $VenueFoodDrink)
                      <tr><td style="padding:5px"><input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" />	{{ $VenueFoodDrink->title }}	</td></tr>					
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="licensing" aria-labelledby="licensing-tab" >
         	<br />
			<table style="width:80%">
         @foreach ($VenueLicensing as $VenueLicensing)
                       <tr><td style="padding:5px"><input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" />	{{ $VenueLicensing->title }}	</td></tr>			
		  @endforeach
		  </table>	
        </div>
		 <div role="tabpanel" class="tab-pane " id="business" aria-labelledby="business-tab" >
         	<br />
			<table style="width:80%">
         @foreach ($VenueBusiness as $VenueBusiness)
                       <tr><td style="padding:5px"><input type="checkbox" name="business[]" value="{{ $VenueBusiness->id }}" />	{{ $VenueBusiness->title }}	</td></tr>					
		  @endforeach
		  </table>	
        </div>
         <div role="tabpanel" class="tab-pane " id="capacity" aria-labelledby="capacity-tab" >
			<br />
			<div class="responsive" style="width: 100%; overflow: auto;">
			<table style="width:100%" class="table table-striped">
			
          @foreach ($VenueCapacity as $VenueCapacity)
          <tr>
          	<td style="padding:5px">
          	<input type="checkbox" name="capacity[]" value="{{ $VenueCapacity->id }}" />	{{ $VenueCapacity->title }}	
          </td>
          <td style="padding:3px"><input type="text" name="total_sq_fit[]" class="form-control" ></td>
          	<td style="padding:3px"><input type="text" name="room_size[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="celing_height[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="class_room[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="theater_1[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="theater_2[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="reception[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="conference[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="u_shape[]" class="form-control"></td>
          	<td style="padding:3px"><input type="text" name="h_shape[]" class="form-control"></td>
          </tr>	 

		  @endforeach
			</table>	
			</div>		 			
        </div>
		</div>					
							
							
							
							
							
							
							
								
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="ln_solid"></div>
									  <div class="form-group">
										<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">						
										  <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit"/>
										
										</div>
									  </div>
									  
									  
                               
                                <div class="clearfix visible-lg"></div>
                            </div>
                    </form>
								  
												  
								  <!-- Add Form End-->
								  
								  
								  
								  
								</div>
								
								
								
					<div class="x_panel" id="edit_div" style=" display:none">
						<h2>Edit Hotels </h2>
						<div class="x_title">
						</div>					
								  <!-- Edit Form Start-->
						 <form method="POST" action="{{url('admin/merchants/venue/updated')}}"  enctype="multipart/form-data" class="form-horizontal">
                       <input type="hidden" value="" name="id" id="edit_id" />
                            <div id="reportArea">
                                <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
        <li role="presentation" class="active">
          <a href="#home1" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            <span class="text">Overview</span>
          </a>
        </li>
		 <li role="presentation" class="next">
          <a href="#images1" role="tab" id="profile-tab" data-toggle="tab" aria-controls="images1">
            <span class="text">Images</span>
          </a>
        </li>
		
        <li role="presentation" class="next">
          <a href="#profile1" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
            <span class="text">Capacity</span>
          </a>
        </li>
		 <li role="presentation" class="next">
          <a href="#dropdown11" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
            <span class="text">Features</span>
          </a>
        </li>
		 <li role="presentation" class="next">
         <a href="#dropdown21" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
            <span class="text">Food & Drink</span>
          </a>
        </li>
		
        <li role="presentation">
          <a href="#samsa11" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">
            <span class="text">Licensing</span>
          </a>
        </li>
		 <li role="presentation">
          <a href="#samsa111" role="tab" id="samsa1-tab" data-toggle="tab" aria-controls="samsa1">
            <span class="text">Restrictions</span>
          </a>
        </li>
      </ul>
	  <div id="myTabContent" class="tab-content">
	    <div role="tabpanel" class="tab-pane in active" id="home1" aria-labelledby="home-tab" >
		<br />
        <div class="form-group">
                                    <label class="col-sm-3 control-label"> User Name</label>
                                    <div class="col-sm-6">
									<select name="user_id" id="edit_user_id"  class="form-control">				  
										 @foreach ($editusers as $user)
										 <option value="{{ $user->uid }}">
										 {{ $user->first_name }}
										 </option>
										 @endforeach
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('user_id')) ? $errors->first('user_id') : ''}}</span>
                                    </div>
                                </div>
								
								
							
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Title</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="title" id="edit_title" value="{{ old('title') }}"/>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Price starting from</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="price" id="edit_price" value="{{ old('price') }}"/>
										<span id="ed_per_head">
										<input  type="checkbox" name="per_head" id="per_head" value="1" />
										</span>
										Per head
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-6">
									<select name="country" id="edit_country"  class="form-control edit_country">						  
										 @foreach ($editcountry as $country)
										 <option value="{{ $country->id }}">
										 {{ $country->name }}
										 </option>
										 @endforeach
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">States</label>
                                    <div class="col-sm-6">
									<select name="states" id="edit_states"  class="form-control edit_states">
									    <option value="">
										 ---Choose---
										 </option>
										  @foreach ($editstates as $editstates)
										 <option value="{{ $editstates->id }}">
										 {{ $editstates->name }}
										 </option>
										 @endforeach
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Cities</label>
                                    <div class="col-sm-6">
									<select name="cities" id="edit_cities"  class="form-control">		
										<option value="">
										 ---Choose---
										 </option>
										  @foreach ($editcities as $editcities)
										 <option value="{{ $editcities->id }}">
										 {{ $editcities->name }}
										 </option>
										 @endforeach
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Address 1</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="address1" id="edit_address1" value="{{ old('address1') }}"/>
									<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>                                   
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Address 2</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="address2" id="edit_address2" value="{{ old('address2') }}"/>
                                       
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Postcode</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="postcode" id="edit_postcode" value="{{ old('postcode') }}"/>
									 <span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Nearest Transport Link</label>
                                    <div class="col-sm-6">
									<input class="form-control" type="text" name="nearest_transport_link" id="edit_nearest_transport_link" value="{{ old('nearest_transport_link') }}"/>
									 <span class="error">{{ ($errors->has('nearest_transport_link')) ? $errors->first('nearest_transport_link') : ''}}</span>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" style="text-align:left">Description</label>
									  <div class="col-sm-5"><br /><br /></div>
                                    <div class="col-sm-12">
                                        <textarea  class="tinymce " id="edit_description" name="description"></textarea>
										<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                    </div>
                                </div>
        </div>
        
		<div role="tabpanel" class="tab-pane in" id="images1" aria-labelledby="images-tab" style="min-height:240px" >
		<br /><br />
		<div class="dropzone" id="dropzoneEditFileUpload">
		
		<span id="image_1"></span>
		<span id="image_2"></span>
		<span id="image_3"></span>
		<span id="image_4"></span>
		<span id="image_5"></span>
		<span id="image_6"></span>	
			
			
        </div>
		
		<?php /*<div class="col-sm-4">
								<div id="cropContaineroutputedit" class="img-sz">
								<img class="croppedImg" id="image_1" src="{{url('')}}/uploads/venue/original/venuesearch_11046.jpeg">
								</div>
									<input type="hidden" name="image_1"  id="cropOutputedit" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutputedit1" class="img-sz">
								<img class="croppedImg" id="image_2" src="{{url('')}}/uploads/venue/original/venuesearch_11046.jpeg">
								
								
								<?php /*<div id="cropContaineroutput" class="img-sz">
								<img class="croppedImg" src="http://localhost/searchvenue/public/uploads/venue/original/venuesearch_11046.jpeg"><div class="cropControls cropControlsUpload"> <i class="cropControlUpload"></i><i class="cropControlRemoveCroppedImage"></i> </div>
								
								<form class="cropContaineroutput_imgUploadForm" style="visibility: hidden;">  <input type="file" name="img" id="cropContaineroutput_imgUploadField">  </form>
								
								</div>
								*/?>
								
					<?php /*				<input type="hidden" name="image_2"  id="cropOutputedit1" />
		</div>
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutputedit2" class="img-sz">
								<img class="croppedImg" id="image_3" src="{{url('')}}/uploads/venue/original/venuesearch_11046.jpeg">
								
								</div>
									<input type="hidden" name="image_3"  id="cropOutputedit2" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutputedit3" class="img-sz">
								<img class="croppedImg" id="image_4" src="{{url('')}}/uploads/venue/original/venuesearch_11046.jpeg">
								
								</div>
									<input type="hidden" name="image_4"  id="cropOutputedit3" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutputedit4" class="img-sz">
								<img class="croppedImg" id="image_5" src="{{url('')}}/uploads/venue/original/venuesearch_11046.jpeg">
								</div>
									<input type="hidden" name="image_5"  id="cropOutputedit4" />
		</div>
<div class="col-sm-4">
								<div id="cropContaineroutputedit5" class="img-sz">
								<img class="croppedImg" id="image_6" src="{{url('')}}/uploads/venue/original/venuesearch_11046.jpeg">
								</div>
									<input type="hidden" name="image_6"  id="cropOutputedit5" />
		</div>		
		*/ ?>							
	</div>
	
	
	
		<div role="tabpanel" class="tab-pane " id="profile1" aria-labelledby="profile-tab" >
			<br />
			<table style="width:80%" id="uvc">
			
          @foreach ($Edit_VenueCapacity as $VenueCapacity)
		  <tr><td style="padding:5px">	{{ $VenueCapacity->title }}	</td><td style="padding:5px"><input type="hidden" name="capacity[]" value="{{ $VenueCapacity->id }}"  value="" /><input type="text" name="capacity_value[]" id="capcity_{{ $VenueCapacity->id }}" value="" /></td</tr>		
		  @endforeach
			</table>			 			
        </div>
        <div role="tabpanel" class="tab-pane " id="dropdown11" aria-labelledby="dropdown1-tab" >
			<br />
			<table style="width:80%" id="uvf">
         @foreach ($Edit_VenueFeatures as $VenueFeatures)
                      <tr><td style="padding:5px"><input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" />	{{ $VenueFeatures->title }}	</td></tr>				
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="dropdown21" aria-labelledby="dropdown2-tab" >
			<br />
			<table style="width:80%" id="uvfd">
        @foreach ($Edit_VenueFoodDrink as $VenueFoodDrink)
                      <tr><td style="padding:5px"><input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" />	{{ $VenueFoodDrink->title }}	</td></tr>					
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="samsa11" aria-labelledby="samsa-tab" >
         	<br />
			<table style="width:80%" id="uvl">
         @foreach ($Edit_VenueLicensing as $VenueLicensing)
                       <tr><td style="padding:5px"><input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" />	{{ $VenueLicensing->title }}	</td></tr>			
		  @endforeach
		  </table>	
        </div>
		 <div role="tabpanel" class="tab-pane " id="samsa111" aria-labelledby="samsa1-tab" >
         	<br />
			
			<table style="width:80%" id="uvr">
         @foreach ($Edit_VenueRestrictions as $VenueRestrictions)
                       <tr><td style="padding:5px"><input type="checkbox" name="restrictions[]" value="{{ $VenueRestrictions->id }}" />	{{ $VenueRestrictions->title }}	</td></tr>					
		  @endforeach
		  </table>	
        </div>
		</div>	
								
								
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="ln_solid"></div>
									  <div class="form-group">
										<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">						
										  <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit"/>
										
										</div>
									  </div>
									  
									  
                               
                                <div class="clearfix visible-lg"></div>
                            </div>
                    </form>
								  
												  
								  <!-- Edit Form End-->
								  
								  
								  
								  
								</div>
								
								
								
								
					</div>
					 <!-- Right BAR End-->
					<!--</div>
					 </div>-->
<div class="clearfix"></div>  
			</div>
    </div>
	
<script>
// Add Blog
    $(document).on("click", ".add_blog", add_venue);
	function add_venue(){ 

	var id= $(this).attr('id');  
	$('#edit_div').hide();
	$('#add_div').fadeIn("slow");	
	$(".editpro .alert-danger").addClass('hidden') ;
	$(".editpro .alert-success").addClass('hidden') ;

}

// EDit Blog
 $(document).on("click", ".edit_blog", edit_venue);
	function edit_venue(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 

	var host="{{ url('admin/merchants/hotels/getvenue/') }}";
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
	$('#edit_title').val(res.view_details.venue.title);
$('#edit_price').val(res.view_details.venue.price); 
	if(res.view_details.venue.per_head == 1){
	$("#ed_per_head input[name=per_head][value=1]").prop('checked', true);	
	}
	$('#edit_user_id').val(res.view_details.venue.user_id);	
	$('#edit_country').val(res.view_details.venue.c_id);
	$('#edit_states').val(res.view_details.venue.state);
	$('#edit_cities').val(res.view_details.venue.city);
	$('#edit_address1').val(res.view_details.venue.address1);
	$('#edit_address2').val(res.view_details.venue.address2);
	$('#edit_postcode').val(res.view_details.venue.postcode);

	var image_path1=res.view_details.venue.image_1;
	var image_path2=res.view_details.venue.image_2;
	var image_path3=res.view_details.venue.image_3;
	var image_path4=res.view_details.venue.image_4;
	var image_path5=res.view_details.venue.image_5;
	var image_path6=res.view_details.venue.image_6;
	
	var id=res.view_details.venue.id;

if(image_path1 != null){
$('#image_1').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/original/'+image_path1+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+id+','+image_path1+',1" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

if(image_path2 != null){
$('#image_2').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/original/'+image_path2+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+id+','+image_path2+',2" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

if(image_path3 != null){
$('#image_3').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/original/'+image_path3+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+id+','+image_path3+',3" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path4 != null){
$('#image_4').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/original/'+image_path4+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+id+','+image_path4+',4" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path5 != null){
$('#image_5').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/original/'+image_path5+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+id+','+image_path5+',5" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path6 != null){
$('#image_6').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/original/'+image_path6+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+id+','+image_path6+',6" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}



/*
$('#image_1').attr('src',url+'/uploads/venue/original/'+image_path1);
$('#image_2').attr('src',url+'/uploads/venue/original/'+image_path2);	
$('#image_3').attr('src',url+'/uploads/venue/original/'+image_path3);
$('#image_4').attr('src',url+'/uploads/venue/original/'+image_path4);	
$('#image_5').attr('src',url+'/uploads/venue/original/'+image_path5);
$('#image_6').attr('src',url+'/uploads/venue/original/'+image_path6);
	*/

	
	$(tinymce.get('edit_description').getBody()).html(res.view_details.venue.description);	
	
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

$(document).on("click", ".remove_image", remove_image);
	function remove_image(){ 
	
	 if (confirm("Are you sure delete remove image?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/merchants/hotels/remove/') }}";
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
			


 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
	
	 if (confirm("Are you sure delete Hotels?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/merchants/hotels/deleted/') }}";
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

  
    </script>
	
	<script type="text/javascript">
function deleteConfirm(){
	if($('.checkbox:checked').length == ''){
		alert('Please check atleast one venue');
		return false;
	}	
}
$(document).ready(function(){
    $('#check_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#check_all').prop('checked',true);
        }else{
            $('#check_all').prop('checked',false);
        }
    });
});


//Change Status Enable

 $(document).on("click", ".enable", enable);
	function enable(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/merchants/hotels/enable/') }}";
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
        },success:enableStatus
	
	})
	return false;
}
function enableStatus(res){
			location.reload();
			}
 	
	
	
//Change Status Disable

 $(document).on("click", ".disable", disable);
	function disable(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/merchants/hotels/disable/') }}";
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
        },success:disableStatus
	
	})
	return false;
}
function disableStatus(res){ 
location.reload();
    }
	
	
// Get Sub Category
 $(document).on("change", ".category", getcategory);
	function getcategory(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('admin/merchants/hotels/getsubcategory/') }}";	
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
        },success:rendergetsubcategory
	
	})
	return false;
}
function rendergetsubcategory(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#scategory').append('<option value="'+data.c_id+'">'+data.c_title+'</option>');
          }else {
            $('#scategory').append('<option value="'+data.c_id+'">'+data.c_title+'</option>');
          };
        });   
      }  




// Get States
 $(document).on("change", ".country", getstates);
	function getstates(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('admin/merchants/hotels/getstates/') }}";	
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

	var host="{{ url('admin/merchants/hotels/getcities/') }}";	
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



/////////////////////////// Edit

// Get Sub Category
 $(document).on("change", ".edit_category", editgetcategory);
	function editgetcategory(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('admin/merchants/hotels/getsubcategory/') }}";	
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
        },success:rendereditgetcategory
	
	})
	return false;
}
function rendereditgetcategory(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#edit_scategory').append('<option value="'+data.c_id+'">'+data.c_title+'</option>');
          }else {
            $('#edit_scategory').append('<option value="'+data.c_id+'">'+data.c_title+'</option>');
          };
        });   
      }  




// Get States
 $(document).on("change", ".edit_country", editgetstates);
	function editgetstates(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('admin/merchants/hotels/getstates/') }}";	
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
        },success:rendereditgetstates
	
	})
	return false;
}
function rendereditgetstates(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#edit_states').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#edit_states').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	  



// Get Sub Cities
 $(document).on("change", ".edit_states", editgetcities);
	function editgetcities(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('admin/merchants/hotels/getcities/') }}";	
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
        },success:rendereditgetcities
	
	})
	return false;
}
function rendereditgetcities(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#edit_cities').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#edit_cities').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	
	  
</script>
<script>
(function($) {

  'use strict';

  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
		$current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
      $el
      	.find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
      	.addClass( 'pull-xs-' + position );
    };

    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next');
    
    updateDropdownMenu( $prev, 'left' );
    updateDropdownMenu( $current, 'center' );
    updateDropdownMenu( $next, 'right' );
  });

})(jQuery);
</script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

    <script type="text/javascript">
	

	
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/admin/dropzone/uploadFiles",			
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
		
		 var myDropzone1 = new Dropzone("div#dropzoneEditFileUpload", {
            url: baseUrl + "/admin/dropzone/uploadFiles",			
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
		/*
        Dropzone.options.myAwesomeDropzone = {	
			
            accept: function(file, done) {
 alert(file);
            },
        }; */
    </script> 
@stop