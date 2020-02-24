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
	.dataTables_length{display:none;}
	tfoot {display: table-header-group;}
	</style>

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
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Hotel updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif 							
							</div>
                    </div>
					 
					<div class="card mb-3">
					  <div class="card-header">
						<i class="fas fa-table"></i>
						View Hotel Leads</div>
					

					  <div class="card-body">
						<div class="table-responsive">
						  <table class="table table-bordered" id="hoteltable" width="100%" cellspacing="0">
						  <tfoot>
							  <tr>
								<th class="searchth">Hotel Name</th>
								<th class="searchth">Group/Chain Name</th>
								<th class="searchth">Address</th>
								<th class="searchth">City</th>
								<th class="searchth">Main Contact Name</th>
								<th class="searchth">Contact Number</th>
								<th class="searchth">Email</th>
								<th class="searchth">Sales Manager</th>
								<th class="searchth">Status</th>
								<th></th>
								<th></th>
							  </tr>
							</tfoot>
							<thead>
							  <tr>
								<th width="10%">Hotel Name</th>
								<th width="10%">Group/Chain Name</th>
								<th width="10%">Address</th>
								<th width="10%">City</th>
								<th width="10%">Main Contact Name</th>
								<th width="10%">Contact Number</th>
								<th width="10%">Email</th>
								<th width="10%">Sales Manager</th>
								<th width="10%">Status</th>
								<th width="10%">Follow up</th>
								<th width="10%">Notes</th>
							  </tr>
							</thead>
							
							<tbody>
							 @foreach ($contacts as $hotel)
								@if($hotel['cnt'] > 0) 
								<tr>
									<td width="10%">{{$hotel['hl_name'] }}</td>
									<td width="10%">{{$hotel['hl_grp_name'] }}</td>
									<td width="10%">{{$hotel['hl_address'] }}</td>
									<td width="10%">{{$hotel['hl_city'] }}, {{$hotel['hl_country']}}</td>
									
									<td width="10%">{{$hotel['hl_c_person'] }}</td>
									<td width="10%">{{$hotel['hl_c_no'] }}</td>
									<td width="10%">{{$hotel['hl_c_email'] }}</td>
									<td width="10%">{{$hotel['user_name'] }}</td>
									<td width="10%">@if($hotel['hl_c_status'] == 0) <div class="isa_error">New Lead </div>@elseif($hotel['hl_c_status'] == 1) <div class="isa_success">Contacted</div> @elseif($hotel['hl_c_status'] == 2) <div class="isa_warning">Preposal Sent</div> @elseif($hotel['hl_c_status'] == 3) <div class="isa_info">Not Intrested </div>@endif</td>
									<td width="10%" align="center"><a href="">Action</a></td>
									<td width="10%" ><div align="center"><a href="#notes_model{{$hotel['hl_id']}}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#notes_model{{$hotel['hl_id']}}"><i class="far fa-edit"></i>

</a></div>
									<div id="notes_model{{$hotel['hl_id']}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
									
									<div class="modal-content">
									<form id="commentForm" action="{{url('crm/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-header">
									<h4 class="modal-title">Notes History</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									
											<div class="row">
												<div class="alert alert-success alert-success-offer hidden" role="alert">
												</div>
												<input type="hidden" id="hotel_id" name="hotel_id" value="{{$hotel['hl_id']}}">
												
												<div class="col-md-12">
												<div class="panel-collapse" id="collapseOne">
										<div class="panel-body">
											<ul class="chat">
											<?php $count = 0;
											
											?>
											
											@foreach ($hotel['notes'] as $notes)
												<?php
												if($count%2==0)
												{
													$clsname = 'left';
													if($notes['hl_c_status'] == 0) 
														$cls = "isa_error";
													else if($notes['hl_c_status'] == 1)
														$cls = "isa_success";
													else if($notes['hl_c_status'] == 2)
														$cls = "isa_warning";
													else if($notes['hl_c_status'] == 3)
														$cls = "isa_info";
													
													?>
													<li class="<?php echo $clsname ?> <?php echo $cls ?> clearfix"><span class="chat-img pull-<?php echo  $clsname ?>">
												
													<i class="far fa-edit"></i>
													</span>
													<div class="chat-body clearfix">
														<div class="header">
														
															<strong class="primary-font">{{$notes['hl_n_added_by_name']}}</strong> <small class="pull-right text-muted">
																<span class="glyphicon glyphicon-time"></span>{{date('d-m-Y H:i:s', strtotime($notes['updated_at']))}}</small>
														</div>
														
														{!!$notes['hl_n_notes']!!}
														      <div class="spacer5"></div>
														<div class="chat-img pull-right">
														@if($notes['hl_c_status'] == 0) <div class="isa_error">New Lead </div>@elseif($notes['hl_c_status'] == 1) <div class="isa_success">Contacted</div> @elseif($notes['hl_c_status'] == 2) <div class="isa_warning">Preposal Sent</div> @elseif($notes['hl_c_status'] == 3) <div class="isa_info">Not Intrested </div>@endif
														</div>
													</div>
													
												</li>
													<?php
												}
												else
												{
													$clsname = 'right';
													if($notes['hl_c_status'] == 0) 
														$cls = "isa_error";
													else if($notes['hl_c_status'] == 1)
														$cls = "isa_success";
													else if($notes['hl_c_status'] == 2)
														$cls = "isa_warning";
													else if($notes['hl_c_status'] == 3)
														$cls = "isa_info";
													
													?>
													<li class="<?php echo $clsname ?> <?php echo $cls ?> clearfix"><span class="chat-img pull-<?php echo  $clsname ?>">
												
													<i class="far fa-edit"></i>
													</span>
													<div class="chat-body clearfix">
														<div class="header">
															<small class="text-muted">
																<span class="glyphicon glyphicon-time"></span>{{date('d-m-Y H:i:s', strtotime($notes['updated_at']))}}</small>
															<strong class="pull-right primary-font">{{$notes['hl_n_added_by_name']}}</strong> 
														</div>
														
														{!!$notes['hl_n_notes']!!}
													<div class="spacer5"></div>	
														<div class="chat-img pull-left">
														@if($notes['hl_c_status'] == 0) <div class="isa_error">New Lead </div>@elseif($notes['hl_c_status'] == 1) <div class="isa_success">Contacted</div> @elseif($notes['hl_c_status'] == 2) <div class="isa_warning">Preposal Sent</div> @elseif($notes['hl_c_status'] == 3) <div class="isa_info">Not Intrested </div>@endif
														</div>
													</div>
													
												</li>
													<?php
												}
												?>
												
												
												<?php $count++;?>
											@endforeach
												
												
											   
											</ul>
										</div>
										<div class="panel-footer">
											<div class="input-group">
											  <div class="col-lg-12">
												<h4 class="modal-title">Action</h4>
												<div  class="form-group">
												<select name="action" id="action" class="form-control">
													<option value="0" >New lead</option>
													<option value="1" >Contacted</option>
													<option value="2" >Proposal sent</option>
													<option value="3" >Not interested</option>
												</select>
												<span class="error erroroffer"></span>
												</div>
												</div>
												<div class="col-lg-12"><div  class="form-group"><label>Notes</label>
												<textarea name="lead_notes" id="lead_notes" value="" class="form-control tinymce" ></textarea>
												</div> 
												</div> 
											</div>
										</div>
									</div>
									</div>
												
											</div>
									
									</div>
									<div class="modal-footer">
									<input type="submit" value="Update" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div>
									</td>
									
								</tr>
								@endif
							@endforeach	
							</tbody>
							
						  </table>
						</div>
					  </div>
                  

                  
<!-- Add Offer -->
			
			
<!-- Add Offer -->


                </div><!-- Steps ends -->
                      
            </div>
            
        </div>

	
	
	<script type="text/javascript">
	 
 $(document).ready( function () {
    $('#hoteltable').DataTable();
	} );

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
	  

   @stop
