<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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

	</style>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW CORPORATE CONTACTS</h4>
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
							
							<!-- <table id="mytable">
						<tr data-depth="0" class="collapse level0">
						<td><span class="toggle collapse"></span>Item 1</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse level1">
						<td><span class="toggle"></span>Item 2</td>
						<td>123</td>
						</tr>
						<tr data-depth="2" class="collapse level2">
						<td>Item 3</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse level1">
						<td>Item 4</td>
						<td>123</td>
						</tr>
						<tr data-depth="0" class="collapse collapsable level0">
						<td><span class="toggle collapse"></span>Item 5</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse collapsable level1">
						<td>Item 6</td>
						<td>123</td>
						</tr>
					</table> -->

			
                    
														  <table class="table  table-bordered" id="hoteltable" width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Business</th>
								<th>Region</th>
								<th>Country</th>
								<th>City</th>
								<!-- <th>Agent</th> -->
								<th>Contact</th>
								<th>Designation</th>
								<th>Contact Number</th>
								<!-- <th>Implant/Outplant</th> -->
								<th>Email</th>
								 <th>Sales Manager</th> 
								<!-- <th>Linked Hotel Targets</th> -->
								<th><!-- Follow up --></th>
							<!-- 	<th>Notes</th>
								<th>Edit</th> -->
								<!-- <th>Business Providers</th> -->
							  </tr>
							</thead>
							 <!-- <tfoot>
							  <tr>
							
								<th class="searchth">Business</th>
								<th class="searchth">Region</th>
								<th class="searchth">Country</th>
								<th class="searchth">City</th>
								 <th class="searchth">Agent</th> 
								<th class="searchth">Contact</th>
								<th class="searchth">Designation</th>
								<th class="searchth">Contact Number</th>
								 <th class="searchth">Implant/Outplant</th> 
								<th class="searchth">Email</th>
								<th class="searchth">Sales Manager</th>
								 <th class=""></th> 
								<th class=""></th>
								<th class=""></th>
								<th class=""></th>
								
							  </tr>
							</tfoot> -->
							</tbody>
							<?php if(count($hotelsCont)): ?>
							<?php $i=1;?>
							 <?php $__currentLoopData = $hotelsCont; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td ><?php echo e($cor_view->hl_business_name); ?></td>
									<td>
										<?php if($cor_view->getRegion()): ?><?php echo e($cor_view->getRegion()->	hl_regional_name); ?> <?php endif; ?>
									</td>
									<td>
										<?php if($cor_view->getCountry()): ?><?php echo e($cor_view->getCountry()->name); ?> <?php endif; ?>
									</td>
									<td>
										<?php if($cor_view->getCity()): ?><?php echo e($cor_view->getCity()->name); ?><?php endif; ?>
									</td>
									<td>
										<?php echo e($cor_view->m_con_first_name); ?> <?php echo e($cor_view->m_con_last_name); ?>

									</td>
									<td>
										<?php if(is_numeric($cor_view->m_con_contact_designation)): ?>
											<?php if($cor_view->getDes()): ?>
												<?php echo e($cor_view->getDes()->hl_title); ?>

											<?php endif; ?>
										<?php else: ?>										
											<?php echo e($cor_view->m_con_contact_designation); ?>

										<?php endif; ?>
									</td>
									<td>
										<?php echo e($cor_view->hl_mob_no); ?>

									</td>
									<td>
										<?php echo e($cor_view->m_con_email); ?>

									</td>
									<td>
										<?php if($cor_view->getSales()): ?>
											<?php echo e($cor_view->getSales()->first_name); ?>

										<?php endif; ?>
									</td>
									<td align="center">
										<a href="<?php echo e(url('crm/events')); ?>"><i class="fa fa-calendar" aria-hidden="true"></i></a>
										 &nbsp; <a href="<?php echo e(url('crm/edit-corporate')); ?>/<?php echo e($cor_view->hl_ccb_id); ?>"><i class="fa fa-edit fa-lg"></i></a>
										</td>
								<?php /*<tr>
									
									<td >{{ $cor_view->hl_business_name }}
									</td>
									<td>
										{{ $cor_view->hl_regional_name }}
									</td>
									<td>
										{{ $cor_view->countries }} 
									</td>
									<td>
										{{ $cor_view->cities }}
									</td>
									<td>
										{{ $cor_view->hl_first_name}}
									</td>
									<td>
										{{ $cor_view->hl_title}}
									</td>
									<td>
										{{ $cor_view->hl_mob_no }}
									</td>								
									<td>
										{{ $cor_view->cemail }}
									</td>
									<td>
										{{ $cor_view->first_name }}
									</td>
									<td align="center">
										<a href="{{url('crm/events')}}"><i class="fa fa-calendar" aria-hidden="true"></i></a>
										&nbsp;<a href="{{ url('crm/edit-corporate')}}/{{ $cor_view->hl_ccb_id }}" class="" ><i class="fa fa-edit fa-lg"></i></a>
									</td>

									<!-- <td ><div align="center"><a href="#notes_model{{ $i }}" class="" data-toggle="modal" data-target="#notes_model{{ $i }}"><i class="fa fa-edit fa-lg"></i></i>

</a></div>
									<div id="notes_model{{ $i }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
									
									
									<div class="modal-content">
									<form id="commentForm" action="{{url('crm/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-header">
									<h4 class="modal-title">Notes History</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<div class="modal-footer">
									<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div>
									</td>
									<td></td> -->
									*/ ?>
								
									
								</tr>

								<?php if($cor_view->getHotelCorpRegional()): ?>

<?php $Reg=$cor_view->getHotelCorpRegional()?>


<?php $__currentLoopData = $Reg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reglocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
<td ><?php echo e($cor_view->hl_business_name); ?></td>
<td><?php echo e($reglocation->hl_regional_name); ?></td>
<td><?php echo e($reglocation->countries); ?> </td>
<td><?php echo e($reglocation->cities); ?></td>
<!-- <td></td> --> 
<td><?php echo e($reglocation->hl_first_name); ?></td>
<td><?php echo e($reglocation->hl_title); ?></td>
<td><?php echo e($reglocation->hl_mob_no); ?></td>
<!-- <td></td> -->
<td><?php echo e($reglocation->cemail); ?></td>
<td><?php echo e($reglocation->first_name); ?></td>
<!-- <td></td> -->

<td align="center">
<a href="<?php echo e(url('crm/events')); ?>"><i class="fa fa-calendar" aria-hidden="true"></i></a>

&nbsp; <a href="<?php echo e(url('crm/edit-corporate')); ?>/<?php echo e($cor_view->hl_ccb_id); ?>"><i class="fa fa-edit fa-lg"></i></a></td>
</tr>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>						
				
								
								<?php $i++;?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>	
							</tbody>
							
						  </table>
							</div>
							</div>
                </div>
              </div>
           
                  
										
									

					

          


                </div><!-- Steps ends -->
                      
            </div>
            
        </div>

	<style type="text/css">
	/*	table td {
		border: 1px solid #eee;
		}
		.level1 td:first-child {
		padding-left: 15px;
		}
		.level2 td:first-child {
		padding-left: 30px;
		}

		.collapse .toggle {
		background: url("http://mleibman.github.com/SlickGrid/images/collapse.gif");
		}
		.expand .toggle {
		background: url("http://mleibman.github.com/SlickGrid/images/expand.gif");
		}
		.toggle {
		height: 9px;
		width: 9px;
		display: inline-block;   
		} */
	</style>
	
	<script type="text/javascript">
	
 $(document).ready( function () {
    $('#hoteltable').DataTable( {
    	language: { search: "" },
		 // "columnDefs": [
		 //   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 // ],
		"bPaginate": false,
		 dom: 'Bfrtip',
				buttons: [
					{
						text: 'Add Corporate',
						action: function ( e, dt, node, config ) {
							 window.location.href = '<?php echo e(url("crm/add-corporate")); ?>'; //using a named route

						}
					}
			]
		} );
	} );

	  </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>