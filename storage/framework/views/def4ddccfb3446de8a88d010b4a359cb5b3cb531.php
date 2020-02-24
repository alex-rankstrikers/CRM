<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<style>
	.fa{font-size: 18px;}
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
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/base/vendor.bundle.base.css')); ?>">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW HOTEL LEADS</h4>
					<div class="row mt-30 "></div>  
							<?php if(Session::get('message')): ?> 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear <?php echo e(Auth::user()->first_name); ?>, Hotel Lead updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							<?php endif; ?>
							
							
                    		<div class="row">
							<div class="table-responsive col-sm-12 col-md-12 col-lg-12" id="table_id">
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
								<th>Action</th>
							  </tr>
							</thead>
							 
							<tbody>
							<?php if($hotels): ?>
							 <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td ><?php echo e($hotel->hl_name); ?></td>
									<td><?php echo e($hotel->hl_grp_name); ?></td>
									<td><?php echo e($hotel->hl_address); ?> </td>
									<td><?php if($hotel->getCity()): ?><?php echo e($hotel->getCity()->name); ?><?php endif; ?></td>
									<td><?php if($hotel->getCountry()): ?><?php echo e($hotel->getCountry()->name); ?><?php endif; ?></td>
									<td><?php if($hotel->getHotelContact()): ?><?php echo e($hotel->getHotelContact()->hl_c_firstname); ?><?php endif; ?></td>
									<td><?php if($hotel->getHotelContact()): ?><?php echo e($hotel->getHotelContact()->hl_c_no); ?><?php endif; ?></td>
									<td><?php if($hotel->getHotelContact()): ?><?php echo e($hotel->getHotelContact()->hl_c_email); ?><?php endif; ?></td>
									<td><?php if($hotel->getSales()): ?><?php echo e($hotel->getSales()->first_name); ?><?php endif; ?></td>
									<td><?php if($hotel->getSales()->hl_c_status == 0): ?> <div class="badge badge-danger">New Lead </div><?php elseif($hotel->getSales()->hl_c_status == 1): ?> <div class="badge badge-success">Contacted</div> <?php elseif($hotel->getSales()->hl_c_status == 2): ?> <div class="badge badge-info">Preposal Sent</div> <?php elseif($hotel->getSales()->hl_c_status == 3): ?> <div class="badge badge-warning">Not Intrested </div><?php endif; ?></td>
									
									<td >
										<a href="<?php echo e(url('crm/events')); ?>" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="fa fa-calendar" aria-hidden="true" ></i></a>
										<a data-toggle="tooltip" data-placement="top" title="Add / View Notes" href="#notes_model<?php echo e($hotel->hl_id); ?>" class="" data-target="#notes_model<?php echo e($hotel->hl_id); ?>"  onclick="show_notes('<?php echo e($hotel->hl_id); ?>')"><i class="fa fa-sticky-note-o fa-lg"></i>
										</a>

										<a href="<?php echo e(url('crm/edit-hotel')); ?>/<?php echo e($hotel->hl_id); ?>" data-toggle="tooltip" data-placement="top" title="Edit Hotel Leads"><i class="fa fa-edit fa-lg"></i>
										</a>
									</td>
									
								</tr>
								
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>	
							</tbody>
							
						  </table>
							</div>
							 



<?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="notes_model<?php echo e($hotel1->hl_id); ?>" class="rcbScroll col-sm-3 col-md-3 col-lg-3" style="display: none;margin-top: 35px" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->

<div class="modal-content">
<form id="commentForm" action="<?php echo e(url('crm/hotels/updated')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="modal-header">
<h4 class="modal-title">Notes History</h4>
<button type="button" class="close" data-dismiss="modal" onclick="close_modal()">&times;</button>
</div>
<div class="modal-body">

		<div class="row">
			<div class="alert alert-success alert-success-offer hidden" role="alert">
			</div>
			<input type="hidden" id="hotel_id" name="hotel_id" value="<?php echo e($hotel1->hl_id); ?>">
			
			<div class="col-md-12">
			<div class="panel-collapse" id="collapseOne">
	<div class="panel-body">
		<ul class="chat">
		<?php $count = 0;
		$hnotes=$hotel1->getNotes();
		?>
		
			<?php $__currentLoopData = $hnotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
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
				<strong class="primary-font"><?php echo e($notes->hl_n_added_by_name); ?></strong>
				</div>
				<div class="chat-body clearfix">
					<div class="header" align='right'>
					
						 <small class="pull-right text-muted">
							<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo e(date('d-m-Y H:i:s', strtotime($notes->updated_at))); ?></small>
					</div>
					<div  class="chat-content pull-<?php echo  $clsname ?>">
					<?php echo $notes->hl_n_notes; ?>

					</div>
					      <div class="spacer5"></div>
					<div align="right" class="chat-img pull-right">
					<?php if($notes->hl_c_status == 0): ?> <div class="isa_errorm">New Lead </div><?php elseif($notes->hl_c_status == 1): ?> <div class="isa_successmm">Contacted</div> <?php elseif($notes->hl_c_status == 2): ?> <div class="isa_warningm">Preposal Sent</div> <?php elseif($notes->hl_c_status == 3): ?> <div class="isa_infom">Not Intrested </div><?php endif; ?>
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
			
				<strong class="pull-right primary-font"><?php echo e($notes->hl_n_added_by_name); ?></strong>&nbsp;&nbsp;&nbsp;<i class="mdi mdi-pencil-box"></i>
				</div>
				<div class="chat-body clearfix">
					<div class="header" align="left">
						<small class="text-muted">
							<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo e(date('d-m-Y H:i:s', strtotime($notes->updated_at))); ?></small>
						 
					</div>
					<div class="chat-content pull-<?php echo  $clsname ?>">
					<?php echo $notes->hl_n_notes; ?></div>
				<div class="spacer5"></div>	
					<div align="left" class="chat-img pull-left">
					<?php if($notes->hl_c_status == 0): ?> <div class="isa_errorm">New Lead </div><?php elseif($notes->hl_c_status == 1): ?> <div class="isa_successm">Contacted</div> <?php elseif($notes->hl_c_status == 2): ?> <div class="isa_warningm">Preposal Sent</div> <?php elseif($notes->hl_c_status == 3): ?> <div class="isa_infom">Not Intrested </div><?php endif; ?>
					</div>
				</div>
				
			</li>
				<?php
			}
			?>
			
			
			<?php $count++;?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
												



												
											   
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
									<button type="button" class="btn btn-default" onclick="close_modal()">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>

							</div>
                </div>
              </div>
           
                  
										
									

          


                </div><!-- Steps ends -->
                      
            </div>
            
        </div>

	<script src="<?php echo e(asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendors/select2/select2.min.js')); ?>"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('assets/js/typeahead.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>	
	
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
							 window.location.href = '<?php echo e(url("crm/add-hotel")); ?>'; //using a named route

						}
					}
			]
		} );
	} );


function show_notes(val){
	$(".rcbScroll").hide();
	$('#table_id').addClass('col-sm-9 col-md-9 col-lg-9').removeClass('col-sm-12 col-md-12 col-lg-12');
	$("#notes_model"+val).toggle();

}
function close_modal(){
	$('#table_id').addClass('col-sm-12 col-md-12 col-lg-12').removeClass('col-sm-10 col-md-10 col-lg-10');
	$(".rcbScroll").hide();
}
// Get States
 $(document).on("change", ".country", getstates);
	function getstates(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('merchant/getstates/')); ?>";	
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

	var host="<?php echo e(url('merchant/getcities')); ?>";	
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
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>