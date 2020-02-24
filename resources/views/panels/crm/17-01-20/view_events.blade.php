@extends('layouts.crm')

@section('head')

@stop

@section('content')

	<style>
				.modal-dialog {
    max-width: 800px !important;}
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
	.text-color{
	color: #425CC7 !important;
	}
	.modal-content .form-group {
    margin-bottom: 20px !important;
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

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
                  <form name="export" action="{{ url('crm/import-events') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
                <div class="row">            
				 <h4 class="card-title">VIEW EVENTS</h4>
                <input name="mhotel_id" id="mhotel_id" type="hidden"  value="">
				<div class="col-sm-2 col-md-2 col-lg-2" style="margin-top: -10px;">
				<div class="form-group">
                     
                      <input type="file" name="events_file" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Select</button>
                        </span>
                      </div>
                </div>
                </div>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-2 col-md-2 col-lg-2" style="margin-top: -15px;"><input type="submit" name="events" value="Import Events" class="btn btn-outline-inverse-info btn-lg"></div>
                <div class="col-sm-3 col-md-3 col-lg-3"></div>
				<div class="col-sm-4 col-md-4 col-lg-4 text-right" style="margin-top: -10px;">
              <a href="{{ url('crm/export-event-details') }}/xlsx"  class="btn btn-outline-inverse-info btn-lg">Export Event Details</a>
             </div>
               
                </div>
                 </form>
            </div>
					<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Events Inserted successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							@if(Session::get('messageNotes')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Events notes updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
							
                    
							<!--   <div class="table-responsive"> -->
							<div class="row" style="width: 100%;">
							<div class="table-responsive col-sm-12 col-md-12 col-lg-12" id="table_id">	
							<table class="table table-expandable  table-bordered" id="hoteltable" width="100%" cellspacing="0">
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Region</th>
								<th>Month</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>No. of days</th>
								<th>Event/ Activity Type</th>
								<th>Event/ Activity Name</th>
								<!-- <th>City </th> -->
								<th>Location</th>
								<th>Target Segment</th>
								<th>Event Fee</th> 								
								<th>Space left</th>
								<th>Deadline</th>
								<th>Users Count</th>
								<th>View</th>
								
							  </tr>
							</thead>
							</tbody>
							@if(count($hlevents))
							<?php $i=1;?>	
							@foreach ($hlevents as $cor_view)
							<?php
							$datetime1 = new DateTime($cor_view->event_start_date);
							$datetime2 = new DateTime($cor_view->event_end_date);
							$interval = $datetime1->diff($datetime2);
							$days = $interval->format('%a');
							$cnt=$cor_view->hotel_participate;
							if($cnt==1){
								$space_left='APLBC ONLY';
							}elseif ($cnt==2) {
								$space_left='Unlimited';
							}elseif ($cnt==3) {
								$number=$cor_view->RegisteredList();
								$space_left=$cor_view->if_limited-count($number);
							}
							$event_type=$cor_view->Eventtypeget(); 
							$region=$cor_view->Regionget(); 
						
							 $string = array();
							// array_push($string, $cor_view->target_segment);
							$ex_val=explode(',',$cor_view->target_segment);
							$countReg=$cor_view->Countreg();
							?>
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td width="200px">{{ $region->hl_regional_name }}</td>
									<td>{{(date('F', strtotime($cor_view->event_start_date)))}}</td>
									<td>{{(date('d-M-Y', strtotime($cor_view->event_start_date)))}} </td>
									<td>{{(date('d-M-Y', strtotime($cor_view->event_end_date)))}}</td>
									<td>{{ $days }}</td>
									<td>{{ $event_type->task_name }}</td>
									<td><a href="{{url('crm/edit-events')}}/{{ $cor_view->hl_events_id }}" class="text-color">{{ $cor_view->event_name}}</a></td>
									<!-- <td>{{ $cor_view->event_location }}</td> -->
									<td>{{ $cor_view->event_location }}</td>
									<td>@foreach ($ex_val as $key => $value)
										@if(in_array(1,array($value))){{ 'Corporate,' }}<br>
										@elseif(in_array(2,array($value))){{ 'Leisure,' }}<br>
										@elseif(in_array(3,array($value))){{ 'High End Leisure,' }}<br>
										@elseif(in_array(4,array($value))){{ 'MICE,' }}<br>
										@elseif(in_array(5,array($value))){{ 'Entertainment' }}
										@endif
										@endforeach</td>
									<td>@if($cor_view->Eventfeetype()){{ $cor_view->Eventfeetype()->symbol }} @endif{{ $cor_view->participation_fee }}</td>
									
									<td>{{ $space_left }}</td>
									<td><!-- {{ date('Y-m-d', strtotime('+15 days', strtotime($cor_view->deadline)))}} --> {{(date('d-M-Y', strtotime($cor_view->deadline))) }}</td>
									<td>{{ count($countReg) }}</td>




									<!-- <td align="center"><a href="{{url('crm/edit-events')}}/{{ $cor_view->hl_events_id }}"><i class="fa fa-edit fa-lg"></i></a></td> -->
									<!-- <td align="center"><a href="{{url('crm/view-register')}}/{{ $cor_view->hl_events_id }}"><i class="fa fa-eye fa-lg"></i></a></td> -->
									<!-- <td><a href="#" data-toggle="modal" data-id="{{ $cor_view->hl_events_id}}" data-target="#modalRegister">View</a></td> -->									
								</tr>
							
								<tr>
									<td colspan="16">
										<table class="table  table-bordered"  width="100%" cellspacing="0">
										<thead>
										  <tr>
										  	<!-- <th></th> -->
										  	<th>S.No</th>
											<th>Hotel name</th>
											<th>First name</th>
											<th>Last name </th>
											<th>Email</th>
											<th>Contact number</th>
											<th>Registration date</th> 
											<th>Payment Status</th>
											<th>Notes</th>
											<th>Views</th>
											<th width="280">Actions</th>
										  </tr>
										</thead>
										</tbody>
								
										<tbody>
										<?php $reglists=$cor_view->RegisteredList(); ?>
										

										@if(count($reglists))
										<?php 
										$i=1;?>
										@foreach ($reglists as $reglist)
										<?php //$hotelname=$reglist->Hotelnameget();  ?>
											<tr>
												<!-- <td><input type='checkbox' name='dataval[]' id="dataval" value="{{ $reglist->hl_reg_id }}"></input></td> -->
												<td>{{$i}}</td>
												<td>@if($reglist->Hotelnameget()){{ $reglist->Hotelnameget()->hotel_name }}@endif</td>
												<td>{{ $reglist->first_name }}</td>
												<td>{{ $reglist->last_name}}</td>
												<td>{{ $reglist->email }}</td>
												<td>{{ $reglist->contact_num }}</td>
												<td>{{(date('d-M-Y', strtotime($reglist->created_at)))}} </td>
												<td>@if($reglist->payment_status==1){{ 'Not Paid' }}
													@elseif($reglist->payment_status==2){{ 'Invoice Sent' }}
													@elseif($reglist->payment_status==3){{ 'Paid' }}
													@endif</td>

<td>
<div class="row">								

<div class="col-md-12 text-left">
<a href="#notes_model{{ $reglist->hl_reg_id }}" class="" onclick="show_modal('{{ $reglist->hl_reg_id }}')" data-target="#notes_model{{ $reglist->hl_reg_id }}"><i class="fa fa-sticky-note-o fa-lg"></i></a>
</div>

</div>
</td>








<td>
<div class="row">								
<div class="col-md-12 text-left">
<a href="#views_model{{ $reglist->hl_reg_id }}" class="" data-toggle="modal" data-target="#views_model{{ $reglist->hl_reg_id }}"><i class="fa fa-edit fa-lg"></i></a>
</div>

</div>
<div id="views_model{{ $reglist->hl_reg_id }}" class="modal fade" role="dialog">
<div class="modal-dialog">

<div class="modal-content">

<form id="commentForm" action="{{url('crm/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal-header">
<h4 class="modal-title">View Event Details</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

<div class="row">
<div class="alert alert-success alert-success-offer hidden" role="alert">
</div>
<input type="hidden" id="hotel_id" name="hotel_id" value="{{ $reglist->hl_reg_id }}">

<div class="col-md-12">
<div class="panel-collapse" id="collapseOne">
<div class="panel-body">
<ul class="chat">
</ul>
</div>
<div class="panel-footer">
<div class="input-group">

<div class="col-lg-12">

<div class="row">
<div class="form-group col-md-6 eventView"><label>Hotel name</label>
	<input type="text" name="" id="" value="@if($reglist->Hotelnameget()){{ $reglist->Hotelnameget()->hotel_name }}@endif" class="form-control">
</div><br>
<div class="form-group col-md-6 eventView"><label>First name</label>
	<input type="text" name="" id="" value="{{ $reglist->first_name }}" class="form-control">
</div>
<div class="form-group col-md-6 eventView"><label>Last name	</label>
	<input type="text" name="" id="" value="{{ $reglist->last_name}}" class="form-control">
</div><br>
<div class="form-group col-md-6 eventView"><label>Email</label>
	<input type="text" name="" id="" value="{{ $reglist->email }}" class="form-control">
</div><br>
<div class="form-group col-md-6 eventView"><label>Contact number	</label>
	<input type="text" name="" id="" value="{{ $reglist->contact_num }}" class="form-control">
</div><br>
<div class="form-group col-md-6 eventView"><label>Registration date</label>
	<input type="text" name="" id="" value="{{(date('d/m/Y', strtotime($reglist->created_at)))}}" class="form-control">
</div><br>
<div class="form-group col-md-6 eventView"><label>Payment Status</label>
	<input type="text" name="" id="" value="@if($reglist->payment_status==1){{ 'Not Paid' }}
	@elseif($reglist->payment_status==2){{ 'Invoice Sent' }}
	@elseif($reglist->payment_status==3){{ 'Paid' }}
	@endif" class="form-control">
</div><br>


</div> 
</div>


</div>
</div>
</div>
</div>

</div>

</div>
<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>

</div>

</div>
</div>
</td>
<td>
	<select class="btn col-md-7" name="payment" class="payment{{ $reglist->hl_reg_id }}" id="payment{{ $reglist->hl_reg_id }}">
    <option value="1" <?= ($reglist->payment_status == 1)?'selected':''; ?>>Not Paid</option>
    <option value="2" <?= ($reglist->payment_status == 2)?'selected':''; ?>>Invoice Sent</option>
    <option value="3" <?= ($reglist->payment_status == 3)?'selected':''; ?>>Paid</option>
  </select>
  
  <button type="button" name="payment" value="{{ $reglist->hl_reg_id }}" style="width:auto" class="btn btn-outline-inverse-info paymentId col-md-3">Update</button>

	<!-- <button type="button" name="payment" id="{{ $reglist->hl_reg_id }}" style="width:auto" class="btn btn-outline-inverse-info payment" value="1">Not Paid</button>
	<button type="button" name="payment" id="{{ $reglist->hl_reg_id }}" style="width:auto" class="btn btn-outline-inverse-info payment" value="2">IS</button>
	<button type="button" name="payment" id="{{ $reglist->hl_reg_id }}" class="btn btn-outline-inverse-info payment" value="3">P</button> -->


</td>


											</tr>
											
										<?php $i++;?>		
										@endforeach
										<!-- <div class="row">
										<div class="col-sm-9"></div>
										
										<div class="col-sm-1">
											<button type="button" name="payment" id="payment1" style="width:auto" class="btn btn-outline-inverse-info payment" value="1">Not Paid</button>
										</div>
										<div class="col-sm-1">
											<button type="button" name="payment" id="payment2" style="width:auto" class="btn btn-outline-inverse-info payment" value="2">Invoice Sent</button>
										</div>
										<div class="col-sm-1">
											<button type="button" name="payment" id="payment" class="btn btn-outline-inverse-info payment" value="3">Paid</button>
										</div>
										</div> -->
										@endif	
										</tbody>
									  </table>
									</td>
								</tr>

								<?php $i++;?>		
								@endforeach
								@endif	
							</tbody>
							
						  </table>
							</div>
@foreach ($hlevents as $cor_view1)
<?php $reglists=$cor_view1->RegisteredList();?>
@foreach ($reglists as $reglist1)
<div id="notes_model{{ $reglist1->hl_reg_id }}" class="rcbScroll col-sm-3 col-md-3 col-lg-3" style="display: none;   margin-top: -25px;" role="">
<div class="modal-dialog">

<div class="modal-content">
<form id="commentForm" action="{{url('crm/events/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal-header">
<h4 class="modal-title">Notes History</h4>
<button type="button" class="close" onclick="close_modal()" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

<div class="row">
<div class="alert alert-success alert-success-offer hidden" role="alert">
</div>
<input type="hidden" id="event_id" name="event_id" value="{{ $reglist1->hl_reg_id }}">

<div class="col-md-12">
<div class="panel-collapse" id="collapseOne">
<div class="panel-body">
<ul class="chat">
	<?php $count = 0;
	$enotes=$reglist1->getNotes();
	?>



	@foreach ($enotes as $notes)
	<?php $addedBy = $notes->getAddedName(); ?>
	
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
	<strong class="primary-font">{{$addedBy}}</strong>
	</div>
	<div class="chat-body clearfix">
	<div class="header" align='right'>

	<small class="pull-right text-muted">
	<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{date('d-m-Y H:i:s', strtotime($notes->updated_at))}}</small>
	</div>
	<div  class="chat-content pull-<?php echo  $clsname ?>">
	{!!$notes->et_n_notes!!}
	</div>
	<div class="spacer5"></div>
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

	<strong class="pull-right primary-font">{{$addedBy}}</strong>&nbsp;&nbsp;&nbsp;<i class="mdi mdi-pencil-box"></i>
	</div>
	<div class="chat-body clearfix">
	<div class="header" align="left">
	<small class="text-muted">
	<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;{{date('d-m-Y H:i:s', strtotime($notes->updated_at))}}</small>

	</div>
	<div class="chat-content pull-<?php echo  $clsname ?>">
	{!!$notes->et_n_notes!!}</div>
	<div class="spacer5"></div>	
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
<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
<button type="button" class="btn btn-default" onclick="close_modal()" data-dismiss="modal">Close</button>
</div>
</form>
</div>

</div>
</div>
@endforeach
@endforeach
</div>
						</div>
                </div>
              </div>
                </div><!-- Steps ends -->
                      
            </div>
            
        </div>
         <script src="{{ asset('assets/js/file-upload.js') }}"></script>

<script>

function show_modal(val){
	$(".rcbScroll").hide();
	$('#table_id').addClass('col-sm-9 col-md-9 col-lg-9').removeClass('col-sm-12 col-md-12 col-lg-12');
	$("#notes_model"+val).toggle();

}

function close_modal(){
	$('#table_id').addClass('col-sm-12 col-md-12 col-lg-12').removeClass('col-sm-10 col-md-10 col-lg-10');
	$(".rcbScroll").hide();
}

$(".paymentId").on('click', function(){
  
      var value = $(this).val();

   //    var checkedVals = $(':checkbox:checked').map(function() {
			// 	return this.value;
			// }).get();

	//var checkedVals = $(".payment").prop('id');
	var payment_status = $("#payment"+value).val();
//alert(value+' '+payment_status);
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var host="{{ url('crm/view-events/update-payment') }}";	
		$.ajax({
		type: 'POST',
		data:{'value': value,'payment_status':payment_status,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response
		success:function(data){
					location.reload();
				}		
	})
   
});




$(document).ready(function() {

  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
    }
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//alert(CSRF_TOKEN);
		var host="{{ url('crm/view-events/registered_hotel/') }}";	
		$.ajax({
		type: 'POST',
		data:{'id': data_id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:function load_details(res){
			//alert(res);
		}
	})
   
  })
});
</script>
	
	<script type="text/javascript">
	  
 $(document).ready( function () {
    $('#hoteltable').DataTable( {
    	"bPaginate": false,
		 // "columnDefs": [
		 //   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 // ],
		 dom: 'Bfrtip',
				buttons: [
					{
						text: 'Add Event',
						action: function ( e, dt, node, config ) {
							 window.location.href = '{{url("crm/add-events")}}'; //using a named route

						}
					}
			]
		} );
	} );


	  </script>
   @stop
