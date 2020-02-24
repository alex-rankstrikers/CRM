@extends('layouts.adminmain')

@section('head')

@stop

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />


   <div class="">
    <div class="page-title">
              <div class="title_left">
                <h3>Ask a Venue Expert</h3>
              </div>

    </div>
            <div class="clearfix"></div>           

            <div class="row">

		
					<!-- <div class="col-md-12 col-xs-12">
					 <div class="x_panel">-->
					 
					 <!-- LEFT BAR Start-->
					 <div class="col-md-5 col-xs-12">
								<div class="x_panel">
								<form name="actionForm" action="{{url('admin/ask-venue-expert/destroy')}}" method="post" onsubmit="return deleteConfirm();"/> 
									<h2>All Venue Expert <span class="pull-right"><!-- <a href="#" class="btn btn-success btn-xs add_blog"><i class="fa fa-plus"></i> Add </a>  -->
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
					@foreach ($leads as $leads)
                        <tr class="rm{{ $leads->id }}">
                          <td>
						  <input type="checkbox" name="selected_id[]" class="checkbox" value="{{ $leads->id }}"/>				 	  
						  </td>
                          <td>{{ $leads->event_type }}</td>
                         <td>
						<?php /* @if($leads->status=='Enable')
						 <a href="#" class="enable btn btn-primary btn-xs" id="{{ $leads->id }}"><i class="glyphicon glyphicon-ok"></i> Enable </a>
						 @else
							 <a href="#" class="disable btn btn-primary btn-xs" id="{{ $leads->id }}" ><i class="glyphicon glyphicon-remove"></i> Disable </a>
						 @endif */?>
						 <!--<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="javascript:void(0);" class="edit_blog btn btn-info btn-xs" id="{{ $leads->id }}" ><i class="fa fa-pencil"></i> Edit </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs delete_blog" id="{{ $leads->id }}"><i class="fa fa-trash-o"></i> Delete </a></td>
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
						
								
						</div>		
								
					<div class="x_panel" id="edit_div" style=" display:none">
						<h2>View Venue Expert </h2>
						<div class="x_title">
						</div>					
								  <!-- Edit Form Start-->
						 <form method="POST" action="{{url('admin/leads/updated')}}"  enctype="multipart/form-data" class="form-horizontal">
                       <input type="hidden" value="" name="id" id="edit_id" />
                            <div id="reportArea">
                                
								
							<div class="form-group">
                                    <label class="col-sm-3 control-label"> Event Type</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="title" id="edit_event_type" value="{{ old('title') }}"/>
										<span class="error">{{ ($errors->has('event_type')) ? $errors->first('event_type') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> Location</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="location" id="edit_location" value="{{ old('location') }}"/>
										<span class="error">{{ ($errors->has('location')) ? $errors->first('location') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Venue style</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="venue_style" id="edit_venue_style" value="{{ old('venue_style') }}"/>
										<span class="error">{{ ($errors->has('venue_style')) ? $errors->first('venue_style') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Budget type</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="budget_type" id="edit_budget_type" value="{{ old('budget_type') }}"/>
										<span class="error">{{ ($errors->has('budget_type')) ? $errors->first('budget_type') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Budget</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="budget" id="edit_budget" value="{{ old('budget') }}"/>
										<span class="error">{{ ($errors->has('budget')) ? $errors->first('budget') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Layout</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="layout" id="edit_layout" value="{{ old('layout') }}"/>
										<span class="error">{{ ($errors->has('layout')) ? $errors->first('layout') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> No of Guest</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="no_of_people" id="edit_no_of_people" value="{{ old('no_of_people') }}"/>
										<span class="error">{{ ($errors->has('no_of_people')) ? $errors->first('no_of_people') : ''}}</span>
                                    </div>
                                </div>
								
							<div class="form-group">
                                    <label class="col-sm-3 control-label"> Event Date</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="event_date" id="edit_event_date" value="{{ old('event_date') }}"/>
										<span class="error">{{ ($errors->has('event_date')) ? $errors->first('event_date') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> Event Time</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="event_time" id="edit_event_time" value="{{ old('event_time') }}"/>
										<span class="error">{{ ($errors->has('event_time')) ? $errors->first('event_time') : ''}}</span>
                                    </div>
                                </div>
							
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> Equipment</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="equipment" id="edit_equipment" value="{{ old('equipment') }}"/>
										<span class="error">{{ ($errors->has('equipment')) ? $errors->first('equipment') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Accommodation</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="bph" id="edit_accommodation" value="{{ old('accommodation') }}"/>
										<span class="error">{{ ($errors->has('accommodation')) ? $errors->first('accommodation') : ''}}</span>
                                    </div>
                                </div>
								 <div class="form-group">
                                    <label class="col-sm-3 control-label"> Full Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="name" id="edit_full_name" value="{{ old('full_name') }}"/>
										<span class="error">{{ ($errors->has('full_name')) ? $errors->first('full_name') : ''}}</span>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> Contact No</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="phone" id="edit_phone" value="{{ old('phone') }}"/>
										<span class="error">{{ ($errors->has('phone')) ? $errors->first('phone') : ''}}</span>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="email" id="edit_email" value="{{ old('email') }}"/>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-3 control-label"> Additional Details</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="specific_req" id="edit_specific_req" value="{{ old('specific_req') }}"/>
										<span class="error">{{ ($errors->has('specific_req')) ? $errors->first('specific_req') : ''}}</span>
                                    </div>
                                </div>			
								
												
								
                                
								
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="ln_solid"></div>
									   <!--<div class="form-group">
										<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">						
										  <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit"/>
										
										</div>
									  </div>-->
									  
									  
                               
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
    $(document).on("click", ".add_blog", add_blog);
	function add_blog(){  
	var id= $(this).attr('id');  
	$('#edit_div').hide();
	$('#add_div').fadeIn("slow");	
	$(".editpro .alert-danger").addClass('hidden') ;
	$(".editpro .alert-success").addClass('hidden') ;

}

// EDit Blog
 $(document).on("click", ".edit_blog", edit_blogs);
	function edit_blogs(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 

	var host="{{ url('admin/ask-venue-expert/getleads') }}";
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

	$('#edit_id').val(res.view_details.id);	
	$('#edit_event_type').val(res.view_details.event_type);	
	$('#edit_location').val(res.view_details.location);
	$('#edit_venue_style').val(res.view_details.venue_style);
	$('#edit_budget_type').val(res.view_details.budget_type);
	$('#edit_budget').val(res.view_details.budget);
	$('#edit_layout').val(res.view_details.	layout);
	$('#edit_no_of_people').val(res.view_details.no_of_people);	
	$('#edit_full_name').val(res.view_details.full_name);
	$('#edit_phone').val(res.view_details.phone);
	$('#edit_email').val(res.view_details.email);
	$('#edit_event_time').val(res.view_details.event_time);
	$('#edit_event_date').val(res.view_details.event_date);
	$('#edit_equipment').val(res.view_details.equipment);
	$('#edit_accommodation').val(res.view_details.accommodation);
	$('#edit_specific_req').val(res.view_details.specific_req);	
	
}

 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/ask-venue-expert/deleted') }}";
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
}
function deleteStatus(res){ 
 if (confirm("Are you sure delete ask venue expert?")) {
			var id=res.delete_details.deletedid;
			 $('.rm'+id).hide();
			$(".alert-success").html(res.delete_details.deletedtatus).removeClass('hidden');

			}

    return false;
    }
    </script>
	
	<script type="text/javascript">
function deleteConfirm(){
	if($('.checkbox:checked').length == ''){
		alert('Please check atleast one leads');
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
	var host="{{ url('admin/ask-venue-expert/enable/') }}";
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
	var host="{{ url('admin/ask-venue-expert/disable/') }}";
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
	
	


	  
</script>


@stop