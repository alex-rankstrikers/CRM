<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
.gap10{
	margin-top: 10px;
}
.gap30{
	margin-top: 30px;
}
</style>
	<div class="row">
		<div class="col-sm-12 grid-margin d-flex stretch-card">
			<div class="card">
				<div class="card-body">
				<?php if(Session::get('message')): ?> <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?> </div><?php endif; ?>
				<h4 class="card-title">Account Settings</h4>	
					<div class="row">
				<div class="settingstab col-sm-2 col-md-2 col-lg-2">
				  <button class="tablinks" onclick="openCity(event, 'task_automation')" id="defaultOpen">Task Automation</button>
				 
				  <button class="tablinks" onclick="openCity(event, 'region')">Region</button>
				  <button class="tablinks" onclick="openCity(event, 'hotel_types')">Hotel Types</button>
				  <button class="tablinks" onclick="openCity(event, 'lead_types')">Lead Types</button>
				  <button class="tablinks" onclick="openCity(event, 'task_types')">Task Types</button>
				  <button class="tablinks" onclick="openCity(event, 'task_for')">Task For</button>
				  <button class="tablinks" onclick="openCity(event, 'activity')">Activity</button>
				  <button class="tablinks" onclick="openCity(event, 'applicable_to')">Applicable to</button>
				  <button class="tablinks" onclick="openCity(event, 'outcome')">Outcome</button>
				  <button class="tablinks" onclick="openCity(event, 'next_step')">Next Step</button>
				  <button class="tablinks" onclick="openCity(event, 'email_setting')">Email Integrations</button>
				  <button class="tablinks" onclick="openCity(event, 'template')">Templates</button>
				  <button class="tablinks" onclick="openCity(event, 'user_setting')">User Setting</button>
          <button class="tablinks" onclick="openCity(event, 'hotel_group')">Hotel Group</button>
          <button class="tablinks" onclick="openCity(event, 'contact_designation')">Contact Designation</button>
				</div>
				
					
				
				<div id="task_automation" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				<form id="automationForm" action="<?php echo e(url('crm/automationupdate')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
				<div class="container">
				  <h4 class="card-title">Tracking Setup</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse1">Hotel Development</a>
						</h4>
					  </div>
					  <div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body"><div class="row mt-30 "></div>
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <div class="row">
				  <div class="form-group col-sm-4 col-md-4 col-lg-4">
				  <label> Name:</label>
				  
				  <input type="text" readonly name="hle_tracking_title" id="hle_tracking_title" value="Hotel Development"/>
				  </div>
				  
				  <div class="form-group col-sm-4 col-md-4 col-lg-4">
				  <label> Mapping:</label>
				  
				  <input name="hle_track_mapping" id="hle_track_mapping"> </input>
				  </div>
				  
				 
				  
				  <div class="form-group col-sm-4 col-md-4 col-lg-4">
				  <label>Process Dates:</label>
				  <input type="text" name="hle_track_date" id="hle_track_date" />
				  </div>
				  
				  <div class="form-group col-sm-12 col-md-12 col-lg-12">
				  <div class="table-responsive" >
                    <table valign="center" id="task_automation" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Seq
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Task
                          </th>
                          <th>
                            Due
                          </th>
                          <th>
                            
                          </th>
						  <th>
                            
                          </th>
						  <th>
                          SA  
                          </th>
						  
						  <th>
                          NA  
                          </th>
						  <th>
                          Eur  
                          </th>
						  
						  <th>
                          MI E&A  
                          </th>
						  <th>
                          APAC 
                          </th>
                        </tr>
                      </thead>
                      <tbody>
						<?php for($i = 0; $i <= 11; $i++): ?>
						<tr>
                          <td class="py-1" valign="center">
                            <label><?php echo e($i+1); ?></label>
                          </td>
						  <td valign="center"><input style="margin:0;" type="text" name="mst_description" id="mst_description"></input></td>
							<td valign="center"><select class="form-control" name="tasks" id="tasks">
						   <?php echo $__env->make('panels.crm.tasks', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						  </select></td>
						  <td valign="center"><select class="form-control" name="days" id="days"><option value="1">1</option><option value="2">2</option></select></td>
                          <td valign="center">days</td>
						  <td valign="center"><select class="form-control" name="due" id="due"><option value="1">Before end date</option><option value="2">After end date</option></select></td>
						  <td valign="center"><select multiple = "multiple"  onChange="postinput(<?php echo e($i+1); ?>, this.value)" class="form-control" name="sa[]" id="sa<?php echo e($i+1); ?>">
						 
						   <?php echo $__env->make('panels.crm.sa_regional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						  </select></td>
						  
						  <td valign="center"><select class="form-control" multiple = "multiple" name="na[]" id="na<?php echo e($i+1); ?>">
						  
						 <?php echo $__env->make('panels.crm.na_regional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						  </select></td>
						  <td valign="center"><select class="form-control" multiple = "multiple" name="eur[]" id="eur<?php echo e($i+1); ?>">
						  
						   <?php echo $__env->make('panels.crm.eur_regional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						  </select></td>
						  <td valign="center"><select class="form-control" multiple = "multiple" name="mea[]" id="mea<?php echo e($i+1); ?>">
						  
						   <?php echo $__env->make('panels.crm.mea_regional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						  </select></td>
						  <td valign="center"><select class="form-control" multiple = "multiple" name="apac[]" id="apac<?php echo e($i+1); ?>">
						  
						  <?php echo $__env->make('panels.crm.apac_regional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						  </select></td>
						 <script>
						 $('select#sa'+<?php echo e($i+1); ?>).multiselect(  );
						 $('select#na'+<?php echo e($i+1); ?>).multiselect(  );
						 $('select#eur'+<?php echo e($i+1); ?>).multiselect(  );
						 $('select#mea'+<?php echo e($i+1); ?>).multiselect(  );
						 $('select#apac'+<?php echo e($i+1); ?>).multiselect(  );
						 </script>
                        </tr>
					  <?php endfor; ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
				  
				  
				  <div class="pull-right">SA - South America, NA - North America, Eur - Europe, MEA - Middle East & Africa</div>
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
					 <!--   <input type="button" class="btn btn-light" style="width:auto"  id="appointment_cancel" value="Cancel"> -->
					  </div>
					  <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-right">
					 
					  <input type="submit" class="btn btn-primary pull-right" style="width:auto"  id="appointment_update" value="Save">
					  </div>
				  </div>
				  </div></div>
						
					  </div>
					</div>
				  </div>
				</div>	

					
					
				  
				</form>
				</div>
				<div id="region" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				
				
				<div class="container">	
				<div class="alert-success1" ></div>
				  <h4 class="card-title">Master</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					 <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse2">Region</a>
						</h4>
					  </div>
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div id="collapse2" class="panel-collapse collapse">
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>
				<a href="#add_region_model" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_region_model">Add Region</a>	
				
				<div id="add_region_model" class="modal fade" role="dialog">
				<form id="regionForm"  accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
					<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							
							<h4 class="modal-title">Add</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<input type="hidden" id="hotel_id" name="hotel_id" value="">
										<div class="col-lg-12"><label>Region Name</label>
										<input name="add_region_name" id="add_region_name" value="" class="form-control" ></input>
										</div>

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addregion" value="Save"> Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_fun" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>				
				  <table id="hoteltable" class="table table-striped" style="width:100%">
					 <thead>
						<tr>
							<th style="border-left: none;">Region Name</th>
							<th style="border-left: none;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="text-align: center;"><a href="#edit_region_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_region_model<?php echo e($loop->iteration); ?>"><?php echo e($region->hl_regional_name); ?></a>
							</td>
							<td style="text-align: center;">
							
							<a href="#edit_region_model<?php echo e($loop->iteration); ?>" class="btn btn-outline-inverse-info btn-xs"   data-toggle="modal" data-target="#edit_region_model<?php echo e($loop->iteration); ?>"><i class="fa fa-pencil"></i> </a>
                            <a href="#delete_region_model<?php echo e($loop->iteration); ?>" class="btn btn-danger btn-xs delete_blog"  data-toggle="modal" data-target="#delete_region_model<?php echo e($loop->iteration); ?>"><i class="fa fa-trash-o"></i>  </a>
							
							<form id="region_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div id="edit_region_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Edit Region</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Region Name</label><div class="col-lg-12">
										<input name="region_name" id="region_name_<?php echo e($region->hl_ms_r_id); ?>" value="<?php echo e($region->hl_regional_name); ?>" class="form-control" ></input>
										</div>

									</div>

							</div>
							<div class="modal-footer">
							

							<button type="button" class="btn btn-primary btn-lg editRegion" id="<?php echo e($region->hl_ms_r_id); ?>"  style="width: auto;">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_reg" data-dismiss="modal" style="width: auto;">Close</button>
							</div>
							</div>

							</div>
							</div>
							</form>
							
							
							<div id="delete_region_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<form id="region_cForm"accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Delete Region</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to delete this Region?

									</div>

							</div>
							<div class="modal-footer">


							<button type="button" class="btn btn-primary delregion btn-lg" id="<?php echo e($region->hl_ms_r_id); ?>" style="width: auto;">Delete</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_del"  data-dismiss="modal" style="width: auto;">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>
							</td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					</tbody>	
					</table>
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
				</div>


<div id="contact_designation" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				
				
				<div class="container">	
				
				  <h4 class="card-title">Master</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					 <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#cont_design">Contact Designation</a>
						</h4>
					  </div>
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div id="cont_design" class="panel-collapse collapse">
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>
				<a href="#add_cont_design" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_cont_design">Add Contact Designation</a>	
				
				<div id="add_cont_design" class="modal fade" role="dialog">
				<form id="regionForm"  accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
					<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							
							<h4 class="modal-title">Add</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-cont_design hidden" role="alert">
										</div>
										<input type="hidden" id="cont_design_id" name="cont_design_id" value="">
										<div class="col-lg-12"><label>Contact Designation Name</label>
										<input name="add_cont_design_name" id="add_cont_design_name" value="" class="form-control" ></input>
										</div>

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addcont_design" value="Save"> Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_fun" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>				
				  <table id="hoteltable" class="table table-striped" style="width:100%">
					 <thead>
						<tr>
							<th style="border-left: none;">Contact Designation Name</th>
							<th style="border-left: none; text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $Contact_Designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ContactDesignation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="text-align: left;"><a href="#edit_cont_design_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_cont_design_model<?php echo e($loop->iteration); ?>"><?php echo e($ContactDesignation->hl_title); ?></a>
							</td>
							<td style="text-align: center;">
							
							<a href="#edit_cont_design_model<?php echo e($loop->iteration); ?>" class="btn btn-outline-inverse-info btn-xs"   data-toggle="modal" data-target="#edit_cont_design_model<?php echo e($loop->iteration); ?>"><i class="fa fa-pencil"></i> </a>
                            <a href="#delete_cont_design_model<?php echo e($loop->iteration); ?>" class="btn btn-danger btn-xs delete_blog"  data-toggle="modal" data-target="#delete_hotel_model<?php echo e($loop->iteration); ?>"><i class="fa fa-trash-o"></i>  </a>
							
							<form id="groub_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div id="edit_cont_design_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Edit Contact Designation</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success13 hidden" role="alert">
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Hotel Contact Designation</label><div class="col-lg-12">
										<input name="group_name" id="group_name_<?php echo e($ContactDesignation->hl_cd_id); ?>" value="<?php echo e($ContactDesignation->hl_title); ?>" class="form-control" ></input>
										</div>

									</div>

							</div>
							<div class="modal-footer">
							

							<button type="button" class="btn btn-primary btn-lg editgroupname" id="<?php echo e($ContactDesignation->hl_cd_id); ?>"  style="width: auto;">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_reg" data-dismiss="modal" style="width: auto;">Close</button>
							</div>
							</div>

							</div>
							</div>
							</form>
							
							
							<div id="delete_hotel_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<form id="region_cForm"accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Delete Contact Designation</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success14 hidden" role="alert">
										</div>
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to delete this contact designation?

									</div>

							</div>
							<div class="modal-footer">


							<button type="button" class="btn btn-primary delgroupname btn-lg" id="<?php echo e($ContactDesignation->hl_cd_id); ?>" style="width: auto;">Delete</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_del"  data-dismiss="modal" style="width: auto;">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>
							</td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					</tbody>	
					</table>
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
				</div>
<!-- task types start-->
<!-- task types start-->


<div id="hotel_group" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				
				
				<div class="container">	
				
				  <h4 class="card-title">Master</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					 <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse12">Hotel Group</a>
						</h4>
					  </div>
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div id="collapse12" class="panel-collapse collapse">
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>
				<a href="#add_hotel_model" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_hotel_model">Add Hotel Group</a>	
				
				<div id="add_hotel_model" class="modal fade" role="dialog">
				<form id="regionForm"  accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
					<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							
							<h4 class="modal-title">Add</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success12 hidden" role="alert">
										</div>
										<input type="hidden" id="hotel_id" name="hotel_id" value="">
										<div class="col-lg-12"><label>Hotel Group Name</label>
										<input name="add_group_name" id="add_group_name" value="" class="form-control" ></input>
										</div>

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addgroupnname" value="Save"> Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_fun" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>				
				  <table id="hoteltable" class="table table-striped" style="width:100%">
					 <thead>
						<tr>
							<th style="border-left: none;">Hotel Group Name</th>
							<th style="border-left: none; text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $hotel_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotelgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="text-align: left;"><a href="#edit_hotel_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_region_model<?php echo e($loop->iteration); ?>"><?php echo e($hotelgroup->title); ?></a>
							</td>
							<td style="text-align: center;">
							
							<a href="#edit_hotel_model<?php echo e($loop->iteration); ?>" class="btn btn-outline-inverse-info btn-xs"   data-toggle="modal" data-target="#edit_hotel_model<?php echo e($loop->iteration); ?>"><i class="fa fa-pencil"></i> </a>
                            <a href="#delete_hotel_model<?php echo e($loop->iteration); ?>" class="btn btn-danger btn-xs delete_blog"  data-toggle="modal" data-target="#delete_hotel_model<?php echo e($loop->iteration); ?>"><i class="fa fa-trash-o"></i>  </a>
							
							<form id="groub_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div id="edit_hotel_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Edit Hotel Group</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success13 hidden" role="alert">
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Hotel Group Name</label><div class="col-lg-12">
										<input name="group_name" id="group_name_<?php echo e($hotelgroup->id); ?>" value="<?php echo e($hotelgroup->title); ?>" class="form-control" ></input>
										</div>

									</div>

							</div>
							<div class="modal-footer">
							

							<button type="button" class="btn btn-primary btn-lg editgroupname" id="<?php echo e($hotelgroup->id); ?>"  style="width: auto;">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_reg" data-dismiss="modal" style="width: auto;">Close</button>
							</div>
							</div>

							</div>
							</div>
							</form>
							
							
							<div id="delete_hotel_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<form id="region_cForm"accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Delete Hotel Group</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success14 hidden" role="alert">
										</div>
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to delete this hotel group?

									</div>

							</div>
							<div class="modal-footer">


							<button type="button" class="btn btn-primary delgroupname btn-lg" id="<?php echo e($hotelgroup->id); ?>" style="width: auto;">Delete</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_del"  data-dismiss="modal" style="width: auto;">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>
							</td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					</tbody>	
					</table>
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
				</div>
<!-- task types start-->

				<div id="task_types" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				 
				<div class="container">
					<div class="alert-success1" ></div>
				  <h4 class="card-title">Master</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					 <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse3">Task Types</a>
						</h4>
					  </div>
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div id="collapse3" class="panel-collapse collapse">
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>
				<a href="#add_task_model" class="btn btn-primary btn-lg" style="width: auto" data-toggle="modal" data-target="#add_task_model">Add Task</a>	
				
				<div id="add_task_model" class="modal fade" role="dialog">
				<form id="taskForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							
							<h4 class="modal-title">Add</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<input type="hidden" id="hotel_id" name="hotel_id" value="">
										<div class="col-lg-12"><label>Task Name</label>
										<input name="add_task_name" id="add_task_name" value="" class="form-control" ></input>
										<label>Description</label>
										<textarea style="min-height: 80px;" name="task_description" id="task_description" value="" class="form-control"></textarea> 
										</div>

									</div>

							</div>
							<div class="modal-footer">


							<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addtask" value="Save">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_task_add" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>				
				  <table id="hoteltable" class="table table-striped" style="width:100%">
					 <thead>
						<tr>
							<th style="border-left: none;">Task Name</th>
							<th style="border-left: none;">Description</th>
							<th style="border-left: none;">Action</th>
						</tr>
					</thead>
				<tbody>
					<?php $__currentLoopData = $master_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="text-align: center;"><a href="#edit_task_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_task_model<?php echo e($loop->iteration); ?>"><?php echo e($master_tasks->task_name); ?></a>
							</td>
							<td style="text-align: center;"><a href="#edit_task_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_task_model<?php echo e($loop->iteration); ?>"><?php echo e($master_tasks->task_description); ?></a>
							<td style="text-align: center;">
							
							<a href="#edit_task_model<?php echo e($loop->iteration); ?>" class="btn btn-outline-inverse-info btn-lg btn-xs"   data-toggle="modal" data-target="#edit_task_model<?php echo e($loop->iteration); ?>"><i class="fa fa-pencil"></i> </a>
                            <a href="#delete_task_model<?php echo e($loop->iteration); ?>" class="btn btn-danger btn-xs delete_blog"  data-toggle="modal" data-target="#delete_task_model<?php echo e($loop->iteration); ?>"><i class="fa fa-trash-o"></i>  </a>
							
							<form id="task_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div id="edit_task_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Edit Task</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Task Name</label>
										<div class="col-lg-12">
										<input name="task_name" id="task_name_<?php echo e($master_tasks->hl_mt_id); ?>" value="<?php echo e($master_tasks->task_name); ?>" class="form-control" ></input>
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Description</label>
										<div class="col-lg-12">
											<textarea name="task_description" id="task_description_<?php echo e($master_tasks->hl_mt_id); ?>" value="" class="form-control"> <?php echo e($master_tasks->task_description); ?></textarea>
										</div>
									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg editTask" id="<?php echo e($master_tasks->hl_mt_id); ?>" value="Save" style="width: auto">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_task_edit"  data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</div>
							</form>
							
							
							<div id="delete_task_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<form id="task_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Delete Task</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<input type="hidden" id="hl_mt_id" name="hl_mt_id" value="">
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to delete this Tasktype?

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg deltask" style="width: auto;" id="<?php echo e($master_tasks->hl_mt_id); ?>" value="Delete" >Delete</button>
							<button type="button" class="btn btn-default close_task_del" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>
							</td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					</tbody>
					</table>
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
		</div>
				<!-- task types end-->
			<!--outcome start-->
			<div id="outcome" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				 
				<div class="container">
					<div class="alert-success1" ></div>
				  <h4 class="card-title">Master</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					 <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse4">Outcomes</a>
						</h4>
					  </div>
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div id="collapse4" class="panel-collapse collapse">
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>
				<a href="#add_outcome_model" class="btn btn-primary btn-lg" style="width: auto;" data-toggle="modal" data-target="#add_outcome_model">Add Outcome</a>	
				
				<div id="add_outcome_model" class="modal fade" role="dialog">
				<form id="taskForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							
							<h4 class="modal-title">Add Outcome</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<input type="hidden" id="hotel_id" name="hotel_id" value="">
										<div class="col-lg-12"><label> Title</label>
										<input name="hl_out_title" id="hl_out_title" value="" class="form-control" ></input>
										<label>Description</label>
										<textarea style="min-height: 80px;" name="hl_out_description" id="hl_out_description" value="" class="form-control"></textarea> 
										</div>

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addoutcome" value="Save">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_oc_add" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>				
				  <table id="hoteltable" class="table table-striped" style="width:100%">
					 <thead>
						<tr>
							<th style="border-left: none;">Title</th>
							<th style="border-left: none;">Description</th>
							<th style="border-left: none;">Action</th>
						</tr>
					</thead>
				<tbody>
					<?php $__currentLoopData = $master_outcomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_outcomes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="text-align: center;"><a href="#edit_oc_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_oc_model<?php echo e($loop->iteration); ?>"><?php echo e($master_outcomes->hl_out_title); ?></a>
							</td>
							<td style="text-align: center;"><a href="#edit_oc_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_oc_model<?php echo e($loop->iteration); ?>"><?php echo e($master_outcomes->hl_out_description); ?></a>
							</td>
							<td style="text-align: center;">
							
							<a href="#edit_oc_model<?php echo e($loop->iteration); ?>" class="btn btn-outline-inverse-info btn-lg btn-xs"   data-toggle="modal" data-target="#edit_oc_model<?php echo e($loop->iteration); ?>"><i class="fa fa-pencil"></i> </a>
                            <a href="#delete_oc_model<?php echo e($loop->iteration); ?>" class="btn btn-danger btn-xs delete_blog"  data-toggle="modal" data-target="#delete_oc_model<?php echo e($loop->iteration); ?>"><i class="fa fa-trash-o"></i>  </a>
							
							<form id="task_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div id="edit_oc_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Edit Outcome</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Title</label>
										<div class="col-lg-12">
										<input name="out_title" id="out_title_<?php echo e($master_outcomes->hl_out_id); ?>" value="<?php echo e($master_outcomes->hl_out_title); ?>" class="form-control" ></input>
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Description</label>
										<div class="col-lg-12">
											<textarea name="out_description" id="out_description_<?php echo e($master_outcomes->hl_out_id); ?>" value="" class="form-control"> <?php echo e($master_outcomes->hl_out_description); ?></textarea>
										</div>
										

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg editoutcome" style="width: auto;"  id="<?php echo e($master_outcomes->hl_out_id); ?>" value="Save">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_oc_edit" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</div>
							</form>
							
							
							<div id="delete_oc_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<form id="outcome_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Delete Outcome</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to delete this Outcome?

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg deloc" style="width: auto;"  id="<?php echo e($master_outcomes->hl_out_id); ?>" value="Delete">Delete</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_oc_del"  data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>
							</td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					</tbody>
					</table>
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
		</div>
				<!--outcome end-->
	<!--nextstep start-->
			<div id="next_step" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				 
				<div class="container">
					<div class="alert-success1" ></div>
				  <h4 class="card-title">Master</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					 <div class="panel-heading">
						<h4 class="panel-title">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse5">Nextstep</a>
						</h4>
					  </div>
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div id="collapse5" class="panel-collapse collapse">
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>
				<a href="#add_ns_model" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_ns_model">Add Nextstep</a>	
				
				<div id="add_ns_model" class="modal fade" role="dialog">
				<form id="taskForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										<input type="hidden" id="hotel_id" name="hotel_id" value="">
										<div class="col-lg-12"><label> Title</label>
										<input name="hl_ns_title" id="hl_ns_title" value="" class="form-control" ></input>
										<label>Description</label>
										<textarea style="min-height: 80px;" name="hl_ns_description" id="hl_ns_description" value="" class="form-control"></textarea> 
										</div>

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addnextstep" value="Save">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_ns_add" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>				
				  <table id="hoteltable" class="table table-striped" style="width:100%">
					 <thead>
						<tr>
							<th style="border-left: none;">Title</th>
							<th style="border-left: none;">Description</th>
							<th style="border-left: none;">Action</th>
						</tr>
					</thead>
				<tbody>
					<?php $__currentLoopData = $master_nextstep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_nextstep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="text-align: center;"><a href="#edit_oc_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_oc_model<?php echo e($loop->iteration); ?>"><?php echo e($master_nextstep->hl_ns_title); ?></a>
							</td>
							<td style="text-align: center;"><a href="#edit_oc_model<?php echo e($loop->iteration); ?>" class="btn-model" data-toggle="modal" data-target="#edit_oc_model<?php echo e($loop->iteration); ?>"><?php echo e($master_nextstep->hl_ns_description); ?></a>
							</td>
							<td style="text-align: center;">
							
							<a href="#edit_ns_model<?php echo e($loop->iteration); ?>" class="btn btn-outline-inverse-info btn-xs"   data-toggle="modal" data-target="#edit_ns_model<?php echo e($loop->iteration); ?>"><i class="fa fa-pencil"></i> </a>
                            <a href="#delete_ns_model<?php echo e($loop->iteration); ?>" class="btn btn-danger btn-xs delete_blog"  data-toggle="modal" data-target="#delete_ns_model<?php echo e($loop->iteration); ?>"><i class="fa fa-trash-o"></i>  </a>
							
							<form id="task_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div id="edit_ns_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Edit Nextstep</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Title</label>
										<div class="col-lg-12">
										<input name="ns_title" id="ns_title_<?php echo e($master_nextstep->hl_ns_id); ?>" value="<?php echo e($master_nextstep->hl_ns_title); ?>" class="form-control" ></input>
										</div>
										<label>&nbsp;&nbsp;&nbsp;&nbsp;Description</label>
										<div class="col-lg-12">
											<textarea name="ns_description" id="ns_description_<?php echo e($master_nextstep->hl_ns_id); ?>" value="" class="form-control"> <?php echo e($master_nextstep->hl_ns_description); ?></textarea>
										</div>
										

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" id="<?php echo e($master_nextstep->hl_ns_id); ?>" class="btn btn-primary btn-lg editnextstep" style="width: auto;" value="Save">Save</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_ns_edit" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</div>
							</form>
							
							
							<div id="delete_ns_model<?php echo e($loop->iteration); ?>" class="modal fade" role="dialog">
							<form id="outcome_cForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Delete Nextstep</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
										
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure you want to delete this Nextstep?

									</div>

							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-lg delns" id="<?php echo e($master_nextstep->hl_ns_id); ?>" value="Delete" style="width: auto;">Delete</button>
							<button type="button" class="btn btn-outline-inverse-info btn-lg close_ns_del" data-dismiss="modal">Close</button>
							</div>
							</div>

							</div>
							</form>
							</div>
							</td>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					</tbody>
					</table>
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
		</div>
<!--nextstep end-->

<!--template start-->
			<div id="template" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">

			<div class="container">
			
				<h4 class="card-title">Master</h4>
					<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
						<h4 class="panel-title">
						<p><a class="accordion collapsed" data-toggle="collapse" href="#collapse6">Template</a></p>
						</h4>
						</div>
						<h4 class="card-title"></h4>
						<div class="row mt-30 "></div>
						<div id="collapse6" class="panel-collapse collapse">
							<div class="col-sm-12 col-md-12 col-lg-12">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							
							<a href="#" class="btn btn-primary btn-lg" onclick="show_template()">Add Template</a>	

								<div id="add_temp_model" style="display:none;">
								<form id="taskForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


									<h4 class="modal-title">Add Nextstep</h4>


									<div class="row">

									<input type="hidden" id="hotel_id" name="hotel_id" value="">
									<div class="col-lg-12">
									<label> Title</label>
									<input name="hl_ns_title" id="hl_ns_title" value="" class="form-control" >
									<label>Description</label>
									<textarea style="min-height: 80px;" name="hl_ns_description" id="hl_ns_description" value="" class="form-control"></textarea> 
									</div>
									</div>
									<div class="">
									<button type="button" class="btn btn-primary btn-lg" style="width: auto;" id="addnextstep" value="Save">Save</button>
									<button type="button" class="btn btn-outline-inverse-info btn-lg" id="close_ns_add" >Close</button>
									</div>
								</form>
								</div>

								<table id="hoteltable" class="table table-striped" style="width:100%">
									<thead>
									<tr>
									<th style="border-left: none;">Title</th>
									<th style="border-left: none;">Description</th>
									<th style="border-left: none;">Action</th>
									</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
						</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		
<!--template end-->


<!--email setting start-->
			<div id="email_setting" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">
				 
				<div class="container">
					<div class="alert-success1" ></div>
				  <h4 class="card-title">Email Integrations</h4>
				   <div class="panel-group">
					<div class="panel panel-default">
					
					<h4 class="card-title"></h4>
					<div class="row mt-30 "></div>
					<div >
					<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <p></p>

					<div class="row mt-30 ">
					<div class="col-sm-12 col-md-5 col-lg-5"><div class="form-group"><label>Outlook Email</label><input type="text" class="form-control" name="outlook_email" id="outlook_email" <?php if($USetting): ?> value="<?php echo e($USetting->email); ?>" <?php endif; ?> autocomplete="off"></div>
<span id="err_outlook_email" style="position: relative;
    top: -2px;"></span>
				</div>
					<div class="col-sm-12 col-md-5 col-lg-5"><div class="form-group"><label>Outlook Password</label><input type="password" class="form-control" name="outlook_password" id="outlook_password" autocomplete="off"></div>
<span id="err_outlook_password" style="position: relative;
    top: -2px;"></span>
				</div>
					<div class="col-sm-12 col-md-2 col-lg-2"><div class="form-group"><div style="margin-top: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><button class="btn btn-primary btn-lg save_email" id="<?php if($USetting): ?><?php echo e($USetting->id); ?><?php endif; ?>">Save</button></div></div>
					</div>
				
					


				<!-- <a href="#add_connect_inbox" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_connect_inbox">Connect an inbox</a> -->	
				
				<div id="add_connect_inbox" class="modal fade" role="dialog">
				<form id="taskForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							
							<h4 class="modal-title">Connect an inbox</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
									<div class="row">
										<div class="alert alert-success alert-success-offer hidden" role="alert">
										</div>
									
										<div class="col-lg-12 text-center">
										
<img src="<?php echo e(asset('admin-assets/images/outlook-365.webp')); ?>">
										<h3>Office 365</h3>
										<br />
										<h4>Connect your Office 365 account to APLBC CRM</h4>
									 	<br />
										</div>
										<div class="col-lg-12 ">
											
											<label>Here's what to expect when you connect to APLBC:</label>
											<textarea class="form-control" rows="10">
													First, by granting APLBC access to your inbox, your APLBC will be able to locate relevant email conversations and log them in your CRM so you and your team can work on them together. Emails that you send from APLBC will also appear in your Outlook sent folder, so there'll be no confusion about which emails live where.
													
This means that your APLBC will have access to some information about your emails, like the email address you’re sending them from, the email addresses of your recipients, what’s in the subject line, and what’s in the body of the email. We’ll only use that access to power your APLBC Outlook integration and make life easier for you, never for any nefarious purposes of our own. It's your data. We just want to help you use it better. You'll always be able to delete specific email records from your CRM with just a couple of clicks. APLBC will also have access to view and create calendar events so we can ensure your CRM and calendar are perfectly in sync.

You'll be able to make more sweeping changes to how your integration works (for instance, removing the integration or adding another email account) just by adjusting your settings. It's all up to you. Want to learn more? Visit www.ap-lbc.com/security for more information on our security policies and read the FAQ page about the APLBC Outlook 365 integration.
											</textarea>
										</div>
										

									</div>

							</div>
							<div class="modal-footer">
								<a href="<?php echo e(url('crm/outlook-auth')); ?>" class="btn btn-primary btn-lg" style="width: auto;" > Continue</a>
						
							<a type="button" class="btn btn-outline-inverse-info btn-lg" id="close_ns_add" data-dismiss="modal">Close</a>
							</div>
							</div>

							</div>
							</form>
							</div>				
				
				</div>
				</div>
				</div>
				</div>
				</form>
			</div>
				
		</div>
				<!--email setting end-->


<!--usersetting start-->
			<div id="user_setting" class="settingstabcontent col-sm-10 col-md-10 col-lg-10">

			<div class="container">
			<div class="alert-success1" ></div>
				<h4 class="card-title">Master</h4>
					<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
						<h4 class="panel-title">
						<p><a class="accordion collapsed" data-toggle="collapse" href="#collapse7">Users Setting</a></p>
						</h4>
						</div>
						<h4 class="card-title"></h4>
						<div class="row mt-30 "></div>
						<div id="collapse7" class="panel-collapse collapse">
							<div class="col-sm-12 col-md-12 col-lg-12">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							
							<a href="#" class="btn btn-primary btn-lg" id="setting1" onclick="show_usersetting(1)">Add Users</a>	

								<div id="add_us_model" style="display:none;" class="gap30">
								<form id="taskForm" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


									<h4 class="modal-title">Add/Edit Users Information</h4>
									<div class="row gap10">
									<input type="hidden" id="uid" name="uid" value="">
									<input type="hidden" id="aplbc_hotel_id" name="aplbc_hotel_id" value="4">
									<div class="form-group col-sm-6 col-lg-6 col-md-12">
									<label> First Name</label>
									<input name="first_name" id="first_name" value="" class="form-control" >
									</div>
									<div class="form-group col-sm-6 col-lg-6 col-md-12"><label> Last Name</label>
									<input name="last_name" id="last_name" value="" class="form-control" >
									</div>
									<div class="form-group col-sm-6 col-lg-6 col-md-12"><label> Email Id</label>
									<input name="email_id" id="email_id" value="" class="form-control" >
									</div>
									<div class="form-group col-sm-6 col-lg-6 col-md-12"><label> Contact Number</label>
									<input name="contact_number" id="contact_number" value="" class="form-control" >
									</div>
									<div class="form-group col-sm-6 col-lg-6 col-md-12"><label> Region</label>
									<input name="region" id="user_region" value="" class="form-control" >
									</div>
									<?php
									$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
									$cntv = count($tzlist);
									?>
									<div class="col-sm-6 col-lg-6 col-md-12">
									<label>Timezone:</label>
									<select class="form-control js-example-basic-single w-100" name="timezone" id="timezone" >
									<?php for($ff=0;$ff<$cntv;$ff++): ?>
									<option value="<?php echo e($tzlist[$ff]); ?>" ><?php echo e($tzlist[$ff]); ?></option>
									<?php endfor; ?>
									</select>
									</div>	
									</div>
									
									<div class="col-sm-12 col-lg-12 col-md-12 gap30 pull-right">
									<button type="button" class="btn btn-primary btn-lg " style="width: auto;" id="save_user" value="Save">Save</button>
									<button type="button" class="btn btn-outline-inverse-info btn-lg"  onclick="show_usersetting()" id="" >Close</button>
									</div>
								</form>
								</div>
						</div>
								<table id="hoteltable" class="table table-striped gap30" style="width:100%">
									<thead>
									<tr>
									<th>Username</th>
									<th>Timezone</th>
									<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $user_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
										<td style="text-align: center;"><?php echo e($user_setting->first_name); ?> <?php echo e($user_setting->last_name); ?></td>
										<td style="text-align: center;"><?php echo e($user_setting->timezone); ?></td>
										<td style="text-align: center;">
										<a href="#" class="btn btn-outline-inverse-info btn-lg btn-xs" onclick="edit_user('<?php echo e($user_setting->id); ?>')"><i class="fa fa-pencil"></i> </a>
			                            <a href="#" class="btn btn-danger btn-xs delete_blog"  onclick="delete_user('<?php echo e($user_setting->id); ?>')"><i class="fa fa-trash-o"></i>  </a>
										</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
					</div>
				</div>
				</div>
			</div>
			</div>
		
<!--usersetting end-->
				
			</div>
		</div>
	</div>
</div>
</div>


	
	
<script>
$( ".save_email" ).click(function() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var id = $(this).attr('id');
	var outlook_email = $('#outlook_email').val();
	var outlook_password = $('#outlook_password').val();
if(outlook_email==''){
$('#err_outlook_email').html('Enter your outlook email address');
return false
}else if(outlook_password==''){
$('#err_outlook_password').html('Enter your outlook password');
return false
}
	if(id=='')
	{
		var data={'_token': CSRF_TOKEN, 'id':'0','outlook_email':outlook_email,'outlook_password':outlook_password};
	
	}else{
	var data={'_token': CSRF_TOKEN, 'id':id,'outlook_email':outlook_email,'outlook_password':outlook_password};
	}

	var host = "<?php echo e(url('crm/ajaxuseremailsettingadd/')); ?>";	
		$.ajax({
		
		/* the route pointing to the post function */
		url: host,
		type: 'POST',
		/* send the csrf-token and the input to the controller */
		data: data,
		dataType: 'JSON',
		complete: function (data) {
			console.log(data);
		},
		/* remind that 'data' is the response of the AjaxController */
		success: function (response) 
		{
			if(response=='updated'){
				$('.alert-success1').html("User outlook details updated successfully..");
			}else{
			$('.alert-success1').html("User outlook details added successfully..");
			}
			 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
			 setTimeout(function(){
            // window.location.reload();
               },1000)
			console.log(response);
		}
	});
 });



$( "#save_user" ).click(function() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var uid = $('#uid').val();
	var aplbc_hotel_id = $('#aplbc_hotel_id').val();
	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
	var email_id = $('#email_id').val();
	var contact_number = $('#contact_number').val();
	var region = $('#user_region').val();
	var timezone = $('#timezone').val();
	var host = "<?php echo e(url('crm/ajaxuseradd/')); ?>";	
		$.ajax({
		
		/* the route pointing to the post function */
		url: host,
		type: 'POST',
		/* send the csrf-token and the input to the controller */
		data: {'_token': CSRF_TOKEN, 'uid':uid,'aplbc_hotel_id':aplbc_hotel_id,'first_name':first_name,'last_name':last_name,'email_id':email_id,'contact_number':contact_number,'region':region,'timezone':timezone},
		dataType: 'JSON',
		complete: function (data) {
			console.log(data);
		},
		/* remind that 'data' is the response of the AjaxController */
		success: function (response) 
		{
			if(response=='updated'){
				$('.alert-success1').html("User details updated successfully..");
			}else{
			$('.alert-success1').html("User details added successfully..");
			}
			 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
			 setTimeout(function(){
             window.location.reload();
               },1000)
			console.log(response);
		}
	});
 });	
function edit_user(val){
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var uid = val;
			var host = "<?php echo e(url('crm/fetchuserdetail/')); ?>";	
				$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, 'uid':uid},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$.each(response, function(index, data) {
						$("#setting1").trigger('click');
						$("#uid").val(data.id);
						$("#first_name").val(data.first_name);
						$("#last_name").val(data.last_name);
						$("#email_id").val(data.email);
						$("#contact_number").val(data.phone);
						$("#user_region").val(data.region);
						$("#timezone").val(data.timezone);

					});
					
				}
			});
}
function delete_user(val){

    if(confirm("Are you sure you want to delete this?")){
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var uid = val;
			var host = "<?php echo e(url('crm/deleteuserdetail/')); ?>";	
				$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, 'uid':uid},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					
					$('.alert-success1').html("User details deleted successfully..");
					$('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					setTimeout(function(){
					window.location.reload();
					},1000)
					
				}
			});
    }
    else{
        return false;
    }

}
function show_template(){
	$("#add_temp_model").toggle();
}
function show_usersetting(val){
	if(val==1){
		$('#first_name').val('');
		$('#last_name').val('');
		$('#email_id').val('');
		$('#contact_number').val('');
		$('#user_region').val('');
		$('#timezone').val('');
	}

	$("#add_us_model").toggle();
}
$( function() {
		$( "#hle_start_date" ).datepicker({
			format: 'dd-mm-yyyy',
			
		});
		$( "#hle_end_date" ).datepicker({
			format: 'dd-mm-yyyy',
			
		});
	  } );
	
	$("#repeatblock_a").css('visibility', 'hidden');
	$("#repeatblock_b").css('visibility', 'hidden');
	function openwin(val)
	{
		if(val == true)
		{
			$("#repeatblock_a").css('visibility', 'inherit');
			$("#repeatblock_b").css('visibility', 'inherit');
			$("#repeatblock_b input").focus();
			return false;
		}
		else
		{
			$("#repeatblock_a").css('visibility', 'hidden');
			$("#repeatblock_b").css('visibility', 'hidden');
			return false;
		}
	}
	
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("settingstabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


	/*
		var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	},
		updateIndex = function(e, ui) {
			$('td.index', ui.item.parent()).each(function (i) {
				$(this).html(i+1);
			}); 
			$('label', ui.item.parent()).each(function (i) {
				$(this).html(i + 1);
			});
		};

	$("#task_automation tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	}).disableSelection();
	*/
	
	 $("#sort tbody").on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });
        $.ui.sortable.prototype._rearrange = function (event, i, a, hardRefresh) {
            a ? a[0].appendChild(this.placeholder[0]) : (i.item[0].parentNode) ? i.item[0].parentNode.insertBefore(this.placeholder[0], (this.direction === "down" ? i.item[0] : i.item[0].nextSibling)) : i.item[0];
            this.counter = this.counter ? ++this.counter : 1;
            var counter = this.counter;
            this._delay(function () {
                if (counter === this.counter) {
                    this.refreshPositions(!hardRefresh); 
                }
            });
        }
		$("tbody").sortable({
		connectWith: "tbody",
            delay: 150, 
            revert: 0,
			cursor:'move',
            helper: function (e, item) {                               
                var helper = $('<tr/>');
                if (!item.hasClass('selected')) {
                    item.addClass('selected').siblings().removeClass('selected');
                }
                var elements = item.parent().children('.selected').clone();
                item.data('multidrag', elements).siblings('.selected').remove();
                return helper.append(elements);
            },
            stop: function (e, info) {
                info.item.after(info.item.data('multidrag')).remove();
				updateIndex;
             },
        sort: function (e, ui) {
           jQuery("tr").removeClass('selected');
        }
        });
    
	
	function postinput(idval, value){
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				$('select#assignee'+idval).find('option').remove();
			var element = this;
			$.ajax({
				/* the route pointing to the post function */
				url: 'postregionalajax',
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {_token: CSRF_TOKEN, value:value},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					console.log(response);
					$('select#assignee'+idval).append(new Option("Account Owner", "0"));
					response.forEach((elements, index, array) => {
						$('select#assignee'+idval).append(new Option( elements.first_name , elements.id));
						
					});
					$('select#assignee'+idval).multiselect('destroy');

					$('select#assignee'+idval).multiselect( 'refresh' );

					
					
				}
			});
				
		}


$( "#addnextstep" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_ns_title = $('#hl_ns_title').val();
			var hl_ns_description = $('#hl_ns_description').val();
			var host = "<?php echo e(url('crm/postaddnextstep_ajax/')); ?>";	
		if(hl_ns_title!='' && hl_ns_description!=''){
				$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_ns_title:hl_ns_title, hl_ns_description:hl_ns_description},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#hl_ns_title').val('');
					$('#hl_ns_description').val('');
					$("#close_ns_add").click();
					//window.location.reload();
					
					$('.alert-success1').html("Nextstep added successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
		  }
		  else
		  {
		  	alert("All Fields required");
		  }
		});	

	$( ".editnextstep" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_ns_id = $(this).attr('id');
			var hl_ns_title = $('#ns_title_'+hl_ns_id).val();
			var hl_ns_description = $('#ns_description_'+hl_ns_id).val();
			
			//alert(hl_ns_id);
			var host = "<?php echo e(url('crm/postupdatenextstep_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_ns_title:hl_ns_title, hl_ns_description:hl_ns_description, hl_ns_id:hl_ns_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#ns_title_'+hl_ns_id).val('');
					$('#ns_description_'+hl_ns_id).val('');
					$(".close_ns_edit").click();
					//window.location.reload();
					
					$('.alert-success1').html("Nextstep Updated Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});

	$( ".delns" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_ns_id = $(this).attr('id');
			var host = "<?php echo e(url('crm/postdeletenextstep_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_ns_id:hl_ns_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$(".close_ns_del").click();
					//window.location.reload();
					
					$('.alert-success1').html("Nextstep Deleted Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});

	$( "#addoutcome" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_out_title = $('#hl_out_title').val();
			var hl_out_description = $('#hl_out_description').val();
			var host = "<?php echo e(url('crm/postaddoutcome_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_out_title:hl_out_title, hl_out_description:hl_out_description},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#hl_out_title').val('');
					$('#hl_out_description').val('');
					$("#close_oc_add").click();
					//window.location.reload();
					
					$('.alert-success1').html("Outcome added successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});	
	$( ".editoutcome" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_out_id = $(this).attr('id');
			var hl_out_title = $('#out_title_'+hl_out_id).val();
			var hl_out_description = $('#out_description_'+hl_out_id).val();
			
			var host = "<?php echo e(url('crm/postupdateoutcome_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_out_title:hl_out_title, hl_out_description:hl_out_description, hl_out_id:hl_out_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#out_title_'+hl_out_id).val('');
					$('#out_description_'+hl_out_id).val('');
					$(".close_oc_edit").click();
					//window.location.reload();
					
					$('.alert-success1').html("Outcome Updated Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});

	$( ".deloc" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		
			var hl_out_id = $(this).attr('id');
			var host = "<?php echo e(url('crm/postdeleteoutcome_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_out_id:hl_out_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$(".close_oc_del").click();
					//window.location.reload();
					
					$('.alert-success1').html("Outcome Deleted Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});
	$( "#addregion" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var add_region_name = $('#add_region_name').val();
			var host = "<?php echo e(url('crm/postaddregion_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, add_region_name:add_region_name},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#add_region_name').val('');
					$("#close_fun").click();
					//window.location.reload();
					
					$('.alert-success1').html("Region added successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});

	$( ".editRegion" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_ms_r_id = $(this).attr('id');
			var region_name = $('#region_name_'+hl_ms_r_id).val();
			var host = "<?php echo e(url('crm/postupdateregion_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, region_name:region_name,hl_ms_r_id:hl_ms_r_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#region_name_'+hl_ms_r_id).val('');
					$(".close_reg").click();
					//window.location.reload();
					
					$('.alert-success1').html("Region Updated successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});

	$( ".delregion" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		
			var hl_ms_r_id = $(this).attr('id');
			var host = "<?php echo e(url('crm/postdeleteregion_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_ms_r_id:hl_ms_r_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$(".close_del").click();
					//window.location.reload();
					
					$('.alert-success1').html("Region Deleted Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});
	$( "#addtask" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var add_task_name = $('#add_task_name').val();
			var task_description = $('#task_description').val();
			var host = "<?php echo e(url('crm/postaddtask_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, 'add_task_name':add_task_name,'task_description':task_description},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#add_task_name').val('');
					$("#close_task_add").click();
					//window.location.reload();
					
					$('.alert-success1').html("Task added successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});
				
	$( ".editTask" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var hl_mt_id = $(this).attr('id');
			var task_name = $('#task_name_'+hl_mt_id).val();
			var task_description = $('#task_description_'+hl_mt_id).val();
			var host = "<?php echo e(url('crm/postupdatetask_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, 'task_name':task_name, 'hl_mt_id':hl_mt_id,'task_description':task_description},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$('#task_name_'+hl_mt_id).val('');
					$(".close_task_edit").click();
					//window.location.reload();
					
					$('.alert-success1').html("Task Updated Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					 setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});
	$( ".deltask" ).click(function() {

			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		
			var hl_mt_id = $(this).attr('id');
			var host = "<?php echo e(url('crm/postdeletetask_ajax/')); ?>";	
			$.ajax({
				
				/* the route pointing to the post function */
				url: host,
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, hl_mt_id:hl_mt_id},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (response) 
				{
					$(".close_task_del").click();
					//window.location.reload();
					
					$('.alert-success1').html("Task Deleted Successfully..");
					 $('.alert-success1').css({"background-color":"#cff8f1","color": "#077260","padding": "10px 0px"});
					setTimeout(function(){
                     window.location.reload();
                       },1000)
					console.log(response);
				}
			});
				
		});

</script>
   

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>