@extends('layouts.adminmain')

@section('head')

@stop

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />


   <div class="">
    <div class="page-title">
              <div class="title_left">
                <h3>Venue</h3>
              </div>

    </div>
            <div class="clearfix"></div>           

            <div class="row">

		
					<!-- <div class="col-md-12 col-xs-12">
					 <div class="x_panel">-->
					 
					 <!-- LEFT BAR Start-->
					 <div class="col-md-5 col-xs-12">
								<div class="x_panel">
								<form name="actionForm" action="{{url('admin/merchants/venue/destroy')}}" method="post" onsubmit="return deleteConfirm();"/> 
									<h2>All Venue <span class="pull-right"><a href="#" class="btn btn-success btn-xs add_blog"><i class="fa fa-plus"></i> Add </a>  
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
                        <tr class="rm{{ $venue->v_id }}">
                          <td>
						  <input type="checkbox" name="selected_id[]" class="checkbox" value="{{ $venue->v_id }}"/>				 	  
						  </td>
                          <td>{{ $venue->title }}</td>
                         <td>
						 @if($venue->status=='Enable')
						 <a href="#" class="enable btn btn-primary btn-xs" id="{{ $venue->v_id }}"><i class="glyphicon glyphicon-ok"></i> Enable </a>
						 @else
							 <a href="#" class="disable btn btn-primary btn-xs" id="{{ $venue->v_id }}" ><i class="glyphicon glyphicon-remove"></i> Disable </a>
						 @endif
						 <!--<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="javascript:void(0);" class="edit_blog btn btn-info btn-xs" id="{{ $venue->v_id }}" ><i class="fa fa-pencil"></i> Edit </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs delete_blog" id="{{ $venue->v_id }}"><i class="fa fa-trash-o"></i> Delete </a></td>
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
						<h2>Add Venue </h2>
						<div class="x_title">
						</div>
						@if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 
						<div class="alert alert-success hidden"></div>
								  <!-- Add Form Start-->
						 <form method="POST" action="{{url('admin/merchants/venue/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
                      
                            <div id="reportArea">
		<ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
        <li role="presentation" class="active">
          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            <span class="text">Overview</span>
          </a>
        </li>
        <li role="presentation" class="next">
          <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
            <span class="text">Capacity</span>
          </a>
        </li>
		 <li role="presentation" class="next">
          <a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
            <span class="text">Features</span>
          </a>
        </li>
		 <li role="presentation" class="next">
         <a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
            <span class="text">Food & Drink</span>
          </a>
        </li>
		
        <li role="presentation">
          <a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">
            <span class="text">Licensing</span>
          </a>
        </li>
		 <li role="presentation">
          <a href="#samsa1" role="tab" id="samsa1-tab" data-toggle="tab" aria-controls="samsa1">
            <span class="text">Restrictions</span>
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
                                    <label class="col-sm-3 control-label">Nearest Transport Link</label>
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
        <div role="tabpanel" class="tab-pane " id="profile" aria-labelledby="profile-tab" >
			<br />
			<table style="width:80%">
			
          @foreach ($VenueCapacity as $VenueCapacity)
		  <tr><td style="padding:5px"><input type="checkbox" name="capacity[]" value="{{ $VenueCapacity->id }}" />	{{ $VenueCapacity->title }}	</td></tr>		
		  @endforeach
			</table>			 			
        </div>
        <div role="tabpanel" class="tab-pane " id="dropdown1" aria-labelledby="dropdown1-tab" >
			<br />
			<table style="width:80%">
         @foreach ($VenueFeatures as $VenueFeatures)
                      <tr><td style="padding:5px"><input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" />	{{ $VenueFeatures->title }}	</td></tr>				
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="dropdown2" aria-labelledby="dropdown2-tab" >
			<br />
			<table style="width:80%">
        @foreach ($VenueFoodDrink as $VenueFoodDrink)
                      <tr><td style="padding:5px"><input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" />	{{ $VenueFoodDrink->title }}	</td></tr>					
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="samsa" aria-labelledby="samsa-tab" >
         	<br />
			<table style="width:80%">
         @foreach ($VenueLicensing as $VenueLicensing)
                       <tr><td style="padding:5px"><input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" />	{{ $VenueLicensing->title }}	</td></tr>			
		  @endforeach
		  </table>	
        </div>
		 <div role="tabpanel" class="tab-pane " id="samsa1" aria-labelledby="samsa1-tab" >
         	<br />
			<table style="width:80%">
         @foreach ($VenueRestrictions as $VenueRestrictions)
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
								  
												  
								  <!-- Add Form End-->
								  
								  
								  
								  
								</div>
								
								
								
					<div class="x_panel" id="edit_div" style=" display:none">
						<h2>Edit Venue </h2>
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
        <div role="tabpanel" class="tab-pane " id="profile1" aria-labelledby="profile-tab" >
			<br />
			<table style="width:80%">
			
          @foreach ($Edit_VenueCapacity as $VenueCapacity)
		  <tr><td style="padding:5px"><input type="checkbox" name="capacity[]" value="{{ $VenueCapacity->id }}" />	{{ $VenueCapacity->title }}	</td></tr>		
		  @endforeach
			</table>			 			
        </div>
        <div role="tabpanel" class="tab-pane " id="dropdown11" aria-labelledby="dropdown1-tab" >
			<br />
			<table style="width:80%">
         @foreach ($Edit_VenueFeatures as $VenueFeatures)
                      <tr><td style="padding:5px"><input type="checkbox" name="features[]" value="{{ $VenueFeatures->id }}" />	{{ $VenueFeatures->title }}	</td></tr>				
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="dropdown21" aria-labelledby="dropdown2-tab" >
			<br />
			<table style="width:80%">
        @foreach ($Edit_VenueFoodDrink as $VenueFoodDrink)
                      <tr><td style="padding:5px"><input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->id }}" />	{{ $VenueFoodDrink->title }}	</td></tr>					
		  @endforeach
		  </table>	
        </div>
        <div role="tabpanel" class="tab-pane " id="samsa11" aria-labelledby="samsa-tab" >
         	<br />
			<table style="width:80%">
         @foreach ($Edit_VenueLicensing as $VenueLicensing)
                       <tr><td style="padding:5px"><input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->id }}" />	{{ $VenueLicensing->title }}	</td></tr>			
		  @endforeach
		  </table>	
        </div>
		 <div role="tabpanel" class="tab-pane " id="samsa111" aria-labelledby="samsa1-tab" >
         	<br />
			<table style="width:80%">
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

	var host="{{ url('admin/merchants/venue/getvenue/') }}";
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
var image_path=res.view_details.image;
	$('#edit_id').val(res.view_details.v_id);	
	$('#edit_title').val(res.view_details.title);	
	$('#edit_user_id').val(res.view_details.user_id);	
	$('#edit_country').val(res.view_details.c_id);
	$('#edit_states').val(res.view_details.	state);
	$('#edit_cities').val(res.view_details.city);
	$('#edit_address1').val(res.view_details.address1);
	$('#edit_address2').val(res.view_details.address2);
	$('#edit_postcode').val(res.view_details.postcode);

   // $('#edit_photo').attr('src',url+'/uploads/listing/thumbnail/'+image_path);
	//$('#edit_meta_tag').val(res.view_details.meta_tag);
//	$('#edit_meta_description').val(res.view_details.meta_description);
	
	$(tinymce.get('edit_description').getBody()).html(res.view_details.description);	
}

 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
	
	 if (confirm("Are you sure delete venue?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/merchants/venue/deleted/') }}";
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
	var host="{{ url('admin/merchants/venue/enable/') }}";
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
	var host="{{ url('admin/merchants/venue/disable/') }}";
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

	var host="{{ url('admin/merchants/venue/getsubcategory/') }}";	
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

	var host="{{ url('admin/merchants/venue/getstates/') }}";	
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

	var host="{{ url('admin/merchants/venue/getcities/') }}";	
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

	var host="{{ url('admin/merchants/venue/getsubcategory/') }}";	
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

	var host="{{ url('admin/merchants/venue/getstates/') }}";	
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

	var host="{{ url('admin/merchants/venue/getcities/') }}";	
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
@stop