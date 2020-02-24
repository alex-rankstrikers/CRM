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
	table td {word-break:break-all};
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #dfcbac 1px !important;
    outline: 0;
}
.select2-container--default .select2-selection--multiple{border:1px solid #dfcbac !important;
	border-radius:0px !important;cursor:text;
}

.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
		left: 0;
	}
        
/*Right*/
	.modal.right.fade .modal-dialog {
		right: 0px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}
					  </style>
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW HOTEL LEADS</h4>
					<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Hotel Lead updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
							
                    
							 <div class="table-responsive">
							<table class="table table-bordered" id="hoteltable" width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Hotel Name</th>
								<th>Group/Chain Name</th>
								<th>Address</th>
								<th>City</th>
								<th>Country</th>
								<th>Main Contact Name</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Sales Manager</th>
								<th>Status</th>
								<th><!-- Follow up --></th>
								<th>Notes</th>
								<th>Action</th>
							  </tr>
							</thead>
							 
							<tbody>
							@if($hotels)
							 @foreach ($hotels as $hotel)
								
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td >{{$hotel->hl_name }}</td>
									<td>{{$hotel->hl_grp_name}}</td>
									<td>{{$hotel->hl_address}} </td>
									<td>@if($hotel->getCity()){{$hotel->getCity()->name}}@endif</td>
									<td>@if($hotel->getCountry()){{$hotel->getCountry()->name}}@endif</td>
									<td>@if($hotel->getHotelContact()){{$hotel->getHotelContact()->hl_c_firstname }}@endif</td>
									<td>@if($hotel->getHotelContact()){{$hotel->getHotelContact()->hl_c_no }}@endif</td>
									<td>@if($hotel->getHotelContact()){{$hotel->getHotelContact()->hl_c_email }}@endif</td>
									<td>@if($hotel->getSales()){{$hotel->getSales()->first_name }}@endif</td>
									<td>@if($hotel->getSales()->hl_c_status == 0) <div class="badge badge-danger">New Lead </div>@elseif($hotel->getSales()->hl_c_status == 1) <div class="badge badge-success">Contacted</div> @elseif($hotel->getSales()->hl_c_status == 2) <div class="badge badge-info">Preposal Sent</div> @elseif($hotel->getSales()->hl_c_status == 3) <div class="badge badge-warning">Not Intrested </div>@endif</td>
									<td align="center"><a href="{{url('crm/events')}}"><i class="fa fa-calendar" aria-hidden="true"></i></a></td>
									<td >
										<div class="row">								
										<div class="col-md-12 text-left"><a href="#notes_model{{$hotel->hl_id}}" class="" data-toggle="modal" data-target="#notes_model{{$hotel->hl_id}}"><i class="fa fa-edit fa-lg"></i></i>
										</a></div>

										</div>
									<div id="notes_model{{$hotel->hl_id}}" class="modal right fade" role="dialog">
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
												<input type="hidden" id="hotel_id" name="hotel_id" value="{{$hotel->hl_id}}">
												
												<div class="col-md-12">
												<div class="panel-collapse" id="collapseOne">
										<div class="panel-body">
											<ul class="chat">
											<?php $count = 0;
											$hnotes=$hotel->getNotes();
											?>
											
												@foreach ($hnotes as $notes)
												
												<?php
												if($count%2==0)
												{
													$clsname = 'left';
													if($notes->hl_c_status == 0) 
														$cls = "isa_error";
													else if($notes->hl_c_status == 1)
														$cls = "isa_success";
													else if($notes->hl_c_status == 2)
														$cls = "isa_warning";
													else if($notes->hl_c_status == 3)
														$cls = "isa_info";
													
													?>
													<li class="<?php echo $clsname ?> <?php echo $cls ?> clearfix"><div class="chat-img pull-<?php echo  $clsname ?>">
												
													<i class="mdi mdi-pencil-box"></i>
													<strong class="primary-font">{{$notes->hl_n_added_by_name}}</strong>
													</div>
													<div class="chat-body clearfix">
														<div class="header" align='right'>
														
															 <small class="pull-right text-muted">
																<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{date('d-m-Y H:i:s', strtotime($notes->updated_at))}}</small>
														</div>
														<div  class="chat-content pull-<?php echo  $clsname ?>">
														{!!$notes->hl_n_notes!!}
														</div>
														      <div class="spacer5"></div>
														<div align="right" class="chat-img pull-right">
														@if($notes->hl_c_status == 0) <div class="isa_errorm">New Lead </div>@elseif($notes->hl_c_status == 1) <div class="isa_successmm">Contacted</div> @elseif($notes->hl_c_status == 2) <div class="isa_warningm">Preposal Sent</div> @elseif($notes->hl_c_status == 3) <div class="isa_infom">Not Intrested </div>@endif
														</div>
													</div>
													
												</li>
													<?php
												}
												else
												{
													$clsname = 'right';
													if($notes->hl_c_status == 0) 
														$cls = "isa_error";
													else if($notes->hl_c_status == 1)
														$cls = "isa_success";
													else if($notes->hl_c_status == 2)
														$cls = "isa_warning";
													else if($notes->hl_c_status == 3)
														$cls = "isa_info";
													
													?>
													<li class="<?php echo $clsname ?> <?php echo $cls ?> clearfix"><div class="chat-img pull-<?php echo  $clsname ?>">
												
													<strong class="pull-right primary-font">{{$notes->hl_n_added_by_name}}</strong>&nbsp;&nbsp;&nbsp;<i class="mdi mdi-pencil-box"></i>
													</div>
													<div class="chat-body clearfix">
														<div class="header" align="left">
															<small class="text-muted">
																<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{date('d-m-Y H:i:s', strtotime($notes->updated_at))}}</small>
															 
														</div>
														<div class="chat-content pull-<?php echo  $clsname ?>">
														{!!$notes->hl_n_notes!!}</div>
													<div class="spacer5"></div>	
														<div align="left" class="chat-img pull-left">
														@if($notes->hl_c_status == 0) <div class="isa_errorm">New Lead </div>@elseif($notes->hl_c_status == 1) <div class="isa_successm">Contacted</div> @elseif($notes->hl_c_status == 2) <div class="isa_warningm">Preposal Sent</div> @elseif($notes->hl_c_status == 3) <div class="isa_infom">Not Intrested </div>@endif
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
												<br/>
												<div  class="form-group">
												<select name="action" id="action" class="form-control js-example-basic-multiple w-100" style="width: 100%" >
													<option value="0" >New lead</option>
													<option value="1" >Contacted</option>
													<option value="2" >Proposal sent</option>
													<option value="3" >Not interested</option>
												</select>
												<span class="error erroroffer"></span>
												</div>
												<br/>
												<div  class="form-group"><label>Notes</label>
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
									<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div>


									</td><td><div class="col-md-12 text-right">
	<a href="{{url('crm/edit-hotel')}}/{{$hotel->hl_id}}" ><i class="fa fa-edit fa-lg"></i></i>
</a>
</div></td>
									
								</tr>
								
							@endforeach
							@endif	
							</tbody>
							
						  </table>
							</div>
							</div>
                </div>
              </div>
           
                  
										
									

          


                </div><!-- Steps ends -->
                      
            </div>
            
        </div>

	<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>	
	
	<script type="text/javascript">
	  
 $(document).ready( function () {
    $('#hoteltable').DataTable( {
    	 language: { search: "" },
		 "columnDefs": [
		   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 ],
		 dom: 'Bfrtip',
				buttons: [
					{
						text: 'Add Leads',
						action: function ( e, dt, node, config ) {
							 window.location.href = '{{url("crm/add-hotel")}}'; //using a named route

						}
					}
			]
		} );
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
