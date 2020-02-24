<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
.fc-day:hover
{
	//background:#F9E2E8;
}

.hsevent
{
	background:black !important;
}
.graphl-legend-rectangle li {
    padding: 5px !important;
    }
    
#leftbar div {
padding: 1px !important;
}
.btnC{
background-color:#5FD0DF !important;
border-color:#5FD0DF !important;
}
.btn-info{
	color: white !important;
}
.gap10{
margin-top: 10px;
}
.gap20{
margin-top: 20px;
}

#map {
    height: 100%;
  }

  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 2px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin: 6px;
    padding: 5px 10px;
    text-overflow: ellipsis;
    /*width: 400px;*/
    border: #e0e0e0 1px solid;
  }

  #pac-input:focus {
    outline: none;
  }

  #label {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
  }
  div#pac-card.pac-card{
    z-index: 0;
    position: absolute;
    left: 105px;
    top: 30px;
  }
  
  #location-error {
    display: inline-block;
    padding: 6px;
    background: #e4a7a7;
    border: #d49c9c 1px solid;
    font-size: 1.3em;
    color: #333;
    display:none;
    margin: 12px;
  }
   .select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #dfcbac 1px !important;
    outline: 0;
}
.select2-container--default .select2-selection--multiple{border:1px solid #dfcbac !important;
	border-radius:2px !important;cursor:text;
} 
.select2 select2-container select2-container--default {
width: 100% !important;
}
</style>
 <?php 
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
// if($_SESSION['oauth_state']){
// $acc_token=$_SESSION['oauth_state'];//Session::get('acc_token');
// }else{
// $acc_token='';
// }

if(isset($_SESSION['acc_token'])!=''){
$acc_token=$_SESSION['acc_token'];
}else{
	$acc_token="";
}
//dd($out_events);
?>

 <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/base/vendor.bundle.base.css')); ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>">
 <form id="commentForm" action="<?php echo e(url('crm/eventsupdate')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
         <div class="row mt-30 "></div>	
    

        
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    
					<div class="card mb-3">
		         	<div class="col-lg-8 col-sm-8 col-md-8  alert alert-success" role="alert" style="display: none;margin-top: 10px;text-align: center;margin-left: 20%;" id="del_success">
					</div>		

          <div class="card-body">
				 <div class="col-lg-6 col-sm-6 col-md-6 pull-right">
			<span id="del_success" style="display: none;" class="alert alert-success" role="alert"></span>
			</div>	

		
			 
			
			<div class="row">
				<?php if(Session::get('message')): ?> 
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
				<div class="alert alert-danger" role="alert"><?php echo e(Session::get('message')); ?></div>
				</div>
				<div class="col-lg-2"></div>
				<?php endif; ?> 
			<div class="col-sm-2 col-md-2">
			<div  id="example" ></div>
			<div class="row mt-30 "></div>	
			<!-- <div id="event-cal-container" class="calendar-container"></div> -->
			<h4 class="card-title">View &nbsp;&nbsp;<a href="<?php echo e(url('crm/events')); ?>"><i class="fa fa-refresh" aria-hidden="true"></i></a></h4>
			<div id='leftbar'>
			<?php $i=1;?>
			<?php $__currentLoopData = $task_types1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_types2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="form-check form-check-<?php echo e($task_types2->task_color); ?>">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input viewbox" name="task_types" value="<?php echo e($task_types2->hl_mt_id); ?>" ><?php echo e($task_types2->task_name); ?>

				</label>
			</div>
			<?php $i++;?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			 </div>
			 <div class="col-sm-7 col-md-7">
			 <h4 class="card-title">MY CALENDER</h4>
			 <div class="row">
			 <div class="col-lg-8 col-md-8 col-sm-12">
				 <div class="form-group">
				  <label> Select User:</label>
					  <select id="hle_users" name="hle_users[]" class="form-control js-example-basic-multiple w-100 hle_users"  multiple="multiple">
					  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <?php if( Auth::user()->first_name  ==  $users->first_name ): ?>
					  <option selected value="<?php echo e($users->user_id); ?>" ><?php echo e($users->first_name); ?> <?php echo e($users->last_name); ?></option>
					  <?php else: ?>
					  <option  value="<?php echo e($users->user_id); ?>" ><?php echo e($users->first_name); ?> <?php echo e($users->last_name); ?></option>
				      <?php endif; ?>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				  </div>

			  
			  </div>

			  <div class="col-lg-4 col-md-4 col-sm-12 text-right"> 
			  	<a href="<?php echo e(url('crm/create')); ?>" class="btn btn-primary btn-lg" id="addOffer">Add Task</a>
			  </div>
			  </div>

			<div id='calendar'></div>
			 </div>
			 <div class="col-sm-3 col-md-3 text-left">
		    <div>
			
			<div id="treeview_container" class="humminll-large">
			<div class="card-body" >
				<h4 class="card-title" style="margin-left: 5px;margin-bottom: 5px;"><u>Today Tasks</u></h4>
			    <!-- <div id="treeview_container" class="hummingbird-treeview"> -->
					<ul class="graphl-legend-rectangle">
				   <?php $__currentLoopData = $today_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $today_tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <li><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
	<?php echo e($today_tasks->task_name); ?> &nbsp;&nbsp;&nbsp;<b><a href=""><?php echo e($today_tasks->hle_title); ?></a></b><div><?php echo e((date('d M , H:i', strtotime($today_tasks->hle_start_date)))); ?>&nbsp;-&nbsp;<?php echo e((date('H:i', strtotime($today_tasks->hle_end_date)))); ?>&nbsp; for <a><?php echo e($today_tasks->assignee); ?></a></div></li>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				   </ul>
			</div>
			</div>
		    </div>
		</div>
			 </div>
			 </div>
                      
                    </div>
          </div>
         
        </div>
                    
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<input type="hidden" name="event_id" id="event_id" value="" />
            <input type="hidden" name="hle_id" id="hle_id" value="" />
         
            
				<div class="modal-body">
					<div class="card mb-3">
         
          <div class="card-body">
			<h4 class="card-title">Edit Task</h4>
			<div class="row mt-30 "></div>
			<div class="col-sm-12 col-md-12 col-lg-12">
			  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
			  <div class="row">
			  <div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				  <div class="row">
				  <div class="form-group col-sm-6 col-md-6 col-lg-6">
				  <label> Task Title:</label>
				  
				  <input type="text" name="hle_title" id="hle_title" class="form-control" />
				  </div>
				 <div class="form-group col-sm-6 col-md-6 col-lg-6">
				  <label>Task Type:</label>
				  
				  <select class="form-control" id="hle_task_type" name="hle_task_type" data-show-icon="true">
				  <?php $__currentLoopData = $task_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <option value="<?php echo e($task_types->hl_mt_id); ?>" ><?php echo e($task_types->task_name); ?></option>
				 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 </select>
				 </div>
				 <div class="form-group col-sm-10 col-md-10 col-lg-10 aligncheck gap10" id="list">
				  <label> Task For:</label>
				  <?php $i=1; ?>
				  <?php $__currentLoopData = $task_for; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_for): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <span><input name="task_for[]" id="task_for_<?php echo $i;?>" type="checkbox" value="<?php echo e($task_for->hl_ms_id); ?>" class="task_for" onclick="taskfor(this.value)"><?php echo e($task_for->hl_service_name); ?></input></span>		
				  <?php $i++; ?>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </div>		
				   <div class="form-group col-sm-10 col-md-10 col-lg-10 aligncheck gap10" id="activityL">
				  <label> Activity:</label>
				 <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <span><input name="activity[]" type="checkbox" value="<?php echo e($activity->hl_act_id); ?>" ><?php echo e($activity->hl_activity_name); ?></input></span>
				 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				  </div>
				  <div class="row mt-30 "></div>
				 
					<div class="form-group col-sm-6 col-md-6 col-lg-6" style="float: left;margin-top: 10px;" >
					<label>Select Hotels:</label>

					<select class="form-control js-example-basic-multiple w-100 hotels_name" multiple="multiple"  name="hotels_name[]" id="hotels_name" style="width: 100%"> 
						<optgroup label="ALL HOTELS">
 						<?php for($ee=0;$ee<count($sleads);$ee++): ?>
							<optgroup label="<?php echo e($sleads[$ee]['region']); ?>">
								<?php if(count($sleads[$ee]['dataval']) > 0): ?>
									<?php $__currentLoopData = $sleads[$ee]['dataval']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($datav->hl_id); ?>"><?php echo e($datav->hl_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
						<?php endfor; ?>
					</optgroup>
					</select>  
					</div>
					<div class="form-group col-sm-6 col-md-6 col-lg-6" style="float: left; margin-top: 10px;">
					<label>Contacts:</label>
					<select class="form-control js-example-basic-multiple w-100 hotel_contacts"  name="hotel_contacts[]" id="hotel_contacts" style="width: 100%" multiple="multiple"> 
						<option>---Choose---</option>
					</select>				  
					</div>
				<div  class="col-sm-12 col-md-12 col-lg-12 "></div>
				<div id="invitenew_section" class="col-sm-12 col-md-12 col-lg-12 cform ">
					<div class="col-sm-12 col-md-12 col-lg-12 cform " id="ag_corporate_new_form0" style="margin-left: -30px;">
					<div class="col-sm-6 col-md-6 col-lg-6 copy-cls" style="float: left;    margin-top: 10px;" id="copy-cls">
					<label>Select Agents/Corporates:</label>

					<select class="form-control js-example-basic-single w-100 searchbar_agents"  name="searchbar_agents[]" id="searchbar_agents_0" style="width: 107%;"> 
			<option value="">Select</option>
 						<optgroup label="Agents">
						<?php $__currentLoopData = $hl_business_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_business_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="a<?php echo e($hl_business_name->hl_agentcont_id); ?>" ><?php echo e($hl_business_name->hl_business_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</optgroup>
						<optgroup label="Corporate ">
						<?php $__currentLoopData = $hl_corporate_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_corporate_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="c<?php echo e($hl_corporate_name->hl_ccb_id); ?>" ><?php echo e($hl_corporate_name->hl_business_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</optgroup>
					</select>  
					</div>
				<div class="col-sm-5 col-md-5 col-lg-5" style="float: left; margin-left:30px;    width: 365px;   margin-top: 10px;">
					<label>Guests:</label>
					<select class="form-control js-example-basic-single w-100 hle_guests "  name="hle_guests[]" id="hle_guests_0" style="margin-left:30px;width: 110%;"> 
						<option>---Choose---</option>
					</select>				  
				</div>
				<input type="hidden" name="attendee_mail[]" id="attendee_mail_0" />
				<input type="hidden" name="hle_guest_id[]" id="hle_guest_id_0"/>


				<div  id="removeplus_0" class="col-sm-1 col-md-1 col-lg-1 deleteguest" style="float: left;margin-top: 38px;">
				<button style="margin-left:37px;" type="button" id="clone1" class="btn btn-inverse-info btn-icon">
				<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
				</div>
				</div>
				</div>

				    <div class="form-group col-sm-3 col-md-3 col-lg-3 gap10">
				  <div class="form-group">
				   <label>Start Date & Time:</label><br>
				  <div class="flex-items">
				  <input class="form-control" type="text" style="width:60%" autocomplete = "off" name="hle_start_date" id="hle_start_date" class="date" />
				  <select class="form-control"  style="width:20%;padding:0px;" name="hle_start_hour" id="hle_start_hour"  >
				  <option value="" >--</option>
				  <?php for($ff=1;$ff<13;$ff++): ?>
				  <option value="<?php echo e(sprintf("%02d", $ff)); ?>" ><?php echo e(sprintf("%02d", $ff)); ?></option>
				 <?php endfor; ?>
				 </select>
				  <select class="form-control" style="width:20%;padding:0px;" name="hle_start_min" id="hle_start_min">
				  <option value="" >--</option>
				   <?php for($ff=1;$ff<61;$ff++): ?>
				  <option value="<?php echo e(sprintf("%02d", $ff)); ?>" ><?php echo e(sprintf("%02d", $ff)); ?></option>
				 <?php endfor; ?>
				  </select>
				  </div>
				  </div>
				  </div>
				  <div class="form-group col-sm-3 col-md-3 col-lg-3 gap10">
				  <div class="form-group">
				  <label>End Date & Time:</label><br>
				  <div class="flex-items">
				  <input class="form-control" type="text" style="width:60%" autocomplete = "off" name="hle_end_date" id="hle_end_date" class="date" />
				   <select class="form-control"  style="width:20%;padding:0px;" name="hle_end_hour" id="hle_end_hour"  >
				    <option value="" >--</option>
				  <?php for($ff=1;$ff<13;$ff++): ?>
					   <option value="<?php echo e(sprintf("%02d", $ff)); ?>" ><?php echo e(sprintf("%02d", $ff)); ?></option>
				 
				 <?php endfor; ?>
				 </select>
				  <select class="form-control" style="width:20%;padding:0px;" name="hle_end_min" id="hle_end_min">
				  <option value="" >--</option>
				   <?php for($ff=01;$ff<61;$ff++): ?>
				  <option value="<?php echo e(sprintf("%02d", $ff)); ?>" ><?php echo e(sprintf("%02d", $ff)); ?></option>
				 <?php endfor; ?>
				  </select> </div>
				  </div>
				  </div>
				  <div class="col-sm-6 col-md-6 col-lg-6 flex-items gap10">
				  
				  <div class="flex-items" style=" width:50%;" >
				  <div style="width:75%;    margin-top: 35px;" >

						<div style=""><input type="checkbox" name="hle_recurr_status" id="hle_recurr_status" value="1" onClick="openwin(this.checked);" >&nbsp;&nbsp;Repeat Task
						</div>
					</div>
				 
				   
				   <select  style="    margin-top: 26px;" aria-label="Repeat frequency" name="hle_recurr_duration" class="form-control required">
				  
					  <option value="WEEKLY" id="ember228" class="native-single-select-option ember-view">week(s)</option>
					  <option value="MONTHLY" id="ember229" class="native-single-select-option ember-view">month(s)</option>
					  <option value="YEARLY" id="ember230" class="native-single-select-option ember-view">year(s)</option>
				</select>	 
				  </div>
				   <?php
				  $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
				  $cntv = count($tzlist);
				  ?>
					<div class="form-group">
				   <label>Timezone:</label>
				   <select class="form-control" name="hle_timezone" id="hle_timezone" >
				   <?php for($ff=0;$ff<$cntv;$ff++): ?>
				  <option value="<?php echo e($tzlist[$ff]); ?>" ><?php echo e($tzlist[$ff]); ?></option>
				  <?php endfor; ?>
				  </select>
				  </div>
				  </div>

				<div class="form-group col-sm-12 col-md-12 col-lg-12 gap20" >
				  
				  <input type="checkbox"  id="show_location" onclick="open_location()" value="1" name="show_location"> <span style="margin-bottom: 5px;">&nbsp;Guest/Agent Location</span>
				</div>

				<!-- <div class="form-group col-sm-6 col-md-6 col-lg-6" >
				  <label>Location:</label>
				  
				  <input type="text" class="form-control" id="search_input" onkeyup="show_map()" onblur="hide_map()" name="hle_location" autocomplete="on">
				  
				  </input>
						 
				  </div> -->
<!-- -start-->
				  
					<div class="form-group col-sm-6 col-md-6 col-lg-6 gap10" style="height: 500px;width:400px;">
						<div class="pac-card" id="pac-card" style="right: 20;left: 30px;">
							<div>
							<div id="label">
							Location search
							</div>       
							</div>
							<div id="pac-container">
								<input id="pac-input"  name="hle_location" type="text"
								placeholder="Enter a location"><div id="location-error"></div>
							</div>
						</div>
						<div id="map"></div>
						<div id="infowindow-content">
						<!-- <img src="" width="16" height="16" id="place-icon"> -->
						<span id="place-name"  class="title"></span><br>
						<span id="place-address"></span>
						</div>
					</div>

<!--end-->
				   <div class="form-group col-sm-6 col-md-6 col-lg-6">
				   <label> Description:</label>
				  
				   <textarea name="hle_description" class="myTextEditor" id="hle_description"> </textarea>
				   </div>
				  <div class="form-group col-sm-12 col-md-12 col-lg-12 gap20">
				  <div class="form-group">
				  </div>
				  </div>
				
				  
					<!--   <div class="form-group col-sm-6 col-md-6 col-lg-6 gap20">
				  <div class="form-group">
				  
				  
					<input type="checkbox" name="hle_allday_status" id="hle_allday_status" value="1" onClick="" /><span>&nbsp;&nbsp;All Day</span>
				  </div>
				  </div> -->
				
				  
				 
				  
				  
				  
				  <input type="hidden" name="hle_status" value="1" />
			<div class="container">	  
			  <div class="panel-group">
				<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title ">
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse1">Outcome & Next Steps</a></p>
						</h4>
					  </div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row mt-30 "></div>
							<div class="col-sm-12 col-md-12 col-lg-12">

							  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							  <input type="hidden" name="my_api_token" id="my_api_token" value="<?php echo $acc_token;?>">

							  <div id="outcomediv">
							  <div id="outcome_section" class="row" style="margin-top: 30px;">
								  <div class="form-group col-sm-11 col-md-11 col-lg-11 appto">
									  <label style="vertical-align:text-top;"> Applicable To:</label>
										<select class="form-control js-example-basic-multiple w-100 applicable_to" multiple="multiple"  name="applicable_to_0[]" id="applicable_to_0" style="width:90%;"> 
											<optgroup label="ALL HOTELS">
					 						<?php for($ee=0;$ee<count($sleads);$ee++): ?>
											<optgroup label="<?php echo e($sleads[$ee]['region']); ?>">
												<?php if(count($sleads[$ee]['dataval']) > 0): ?>
													<?php $__currentLoopData = $sleads[$ee]['dataval']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($datav->hl_id); ?>"><?php echo e($datav->hl_name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
										<?php endfor; ?>
										</optgroup>
										</select> 
								  </div>

								   <div id="removelink" class="form-group col-sm-1 col-md-1 col-lg-1">
								   <a href="" style = "" id="clone" class="btn btn-info btn-sm pull-right">Add</a>
								    </div>
							 		<input type="hidden" name="hl_ocns_id[]" id="hl_ocns_id_0" val="" />

							  		<input type="hidden" name="hle_status" value="1" />
							  		<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="margin-top: 15px;padding: 0px 10px 0px 0px;">Standard Outcomes:</label>
									<select class="form-control std_outcomes" style="margin-right: 5px;" id="std_outcomes_0" name="std_outcomes[]" data-show-icon="true">
									<option value="0">Select</option>
									<?php $__currentLoopData = $outcomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outcomes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($outcomes->hl_out_id); ?>" ><?php echo e($outcomes->hl_out_title); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>					
									</div>
									<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="margin-top: 15px;padding: 0px 10px 0px 0px;">Standard Nextstep:</label>
									<select class="form-control std_nextsteps"  id="std_nextsteps_0" name="std_nextsteps[]" data-show-icon="true">
									<option value="0">Select</option>
									<?php $__currentLoopData = $nextstep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nextstep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($nextstep->hl_ns_id); ?>" ><?php echo e($nextstep->hl_ns_title); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
							  		</div>
								  <div class="form-group col-sm-6 col-md-6 col-lg-6">
								  <label>Outcome:</label>
								 <!--  <input type="text"  name="hle_outcome[]" id="hle_outcome_0" class="tinymce" value="" /> -->
								 <textarea name="hle_outcome[]" id="hle_outcome_0" class="tinymce"></textarea>
								  
								  </div>
								  
								  <div class="form-group col-sm-6 col-md-6 col-lg-6">
								  <label>Next Step:</label>
								 <textarea name="hle_next_step[]" id="hle_nextstep_0" class="tinymce"></textarea>

								  <!-- <input type="text" name="hle_next_step[]" id="hle_nextstep_0" class="tinymce" id="hle_next_step" value="" /> -->
								  </div>
							 
							  </div>
							  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
				 
				  </div>
			  </div>
			  </div>
				</div>

				<div class="modal-footer">
				
					<div class="col-sm-6 col-md-6 col-lg-6">
										<!-- 	<input type="button" class="btn btn-crm" style="width:auto"  id="deletebut" value="Save"> -->

					<a id="deletebut"  href="<?php echo e(url('crm/deletevent?id=')); ?>" class="btn btn-outline-inverse-info btn-lg btn-crm" >Delete</a>&nbsp;&nbsp;
					<a id="completebut"  class="btn btn-outline-inverse-info btn-lg btn-crm" href="<?php echo e(url('crm/completevent?id=')); ?>">Complete Task</a>
					</div>
					
					
					<div class="col-sm-6 col-md-6 col-lg-6 pull-right">
						<button type="button" class="btn btn-outline-inverse-info btn-lg" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-lg" style="width:auto"  id="event_update" value="Save"> Save</button>
					
					</div>
					
				
				</div>
			</div>
		</div>
	</div>
                </div><!-- Steps ends -->
                      
            </div>
            </div>
   
	</form>
	<script>

// $(function () {
// $('select[multiple]#hle_users').multiselect({
// 	columns: 2,
// 	placeholder: 'select',
// 	search: true,
// 	searchOptions: {
// 	'default': 'Search Users'
// 	},
// 	selectAll: true
// 	});


// });
 $(document).ready(function() {
 	var del_suc='<?php echo isset($_GET["status"]);?>';
 	//alert(del_suc);
 	if(del_suc==1){
 		$("#del_success").show();
 		$("#del_success").html('Event successfully deleted');

 	}
 });

	 $( function() {
		$( "#hle_start_date" ).datepicker({
			dateFormat: 'yy-mm-dd',
			
		});
		$( "#hle_end_date" ).datepicker({
			dateFormat: 'yy-mm-dd',
			
		});
	  } );

    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
			header: {
			 	 right: 'month,agendaWeek,timelineCustom,agendaDay,prev,today,next',
			},
			/*dayClick: function(objDate, allDay, jsEvent, view) {
				 var strDate = (objDate.getMonth() / 1 + 1) + '/' + objDate.getDate() + '/' + objDate.getFullYear(); 
				 alert(strDate);
				
			},*/
buttonText: {today: 'Today', month: 'Month', week: 'week', day: 'Day', list: 'List'},
events : [


                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {

                	<?php $search=$task->Guestsinvite();
                		$ocnss=$task->Getoutcomesns();?> 
                	
               //hle_allday_status : '<?php echo e($task->hle_allday_status); ?>',
					id: '<?php echo e($task->hle_id); ?>',
                    title : "<?php echo e(trim(preg_replace('/\s+/', ' ', $task->hle_title))); ?>",
                    searchbar_agents:'<?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($value["searchbar_agents"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    hle_guests:'<?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($value["hle_guests"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    hle_guest_id:'<?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($value["hle_guest_id"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    hl_ocns_id:'<?php $__currentLoopData = $ocnss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ocns["hl_ocns_id"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    applicable_to:'<?php $__currentLoopData = $ocnss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ocns["applicable_All_Hotels"]); ?>~<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    std_outcome:'<?php $__currentLoopData = $ocnss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ocns["std_outcomes"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    std_nextstep:'<?php $__currentLoopData = $ocnss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ocns["std_nextsteps"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    hle_outcome:'<?php $__currentLoopData = $ocnss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ocns["hl_outcome"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    hle_nextstep:'<?php $__currentLoopData = $ocnss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ocns["hl_nextstep"]); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
                    outlook_id: '<?php echo e($task->outlook_id); ?>',
                    description : "<?php echo e(trim(preg_replace('/\s+/', ' ', $task->hle_description))); ?>",
                    allhotel : '<?php echo e($task->hle_applicable_All_Hotels); ?>',
                    allcontact : '<?php echo e($task->hle_applicable_contacts); ?>',
                    category : '<?php echo e($task->hle_category); ?>',
                    task_for : '<?php echo e($task->hle_task_for); ?>',
                    activity : '<?php echo e($task->hle_activity); ?>',
                    start_hour : '<?php echo e(date("H", strtotime($task->hle_start_date))); ?>',
                    start_min : '<?php echo e(date("i", strtotime($task->hle_start_date))); ?>',
                    end_hour : '<?php echo e(date("H", strtotime($task->hle_end_date))); ?>',
                    end_min : '<?php echo e(date("i", strtotime($task->hle_end_date))); ?>',
                    task_type : '<?php echo e($task->hle_task_type); ?>',
                    hle_recurr_status : '<?php echo e($task->hle_recurr_status); ?>',
                    show_location : '<?php echo e($task->show_location); ?>',
                    recurr_cnt : '<?php echo e($task->hle_recurr_cnt); ?>',
                    recurr_duration : '<?php echo e($task->hle_recurr_duration); ?>',
                    hle_timezone : '<?php echo e($task->hle_timezone); ?>',
                    hle_lead : '<?php echo e($task->hl_lead); ?>',
                    start : '<?php echo e($task->hle_start_date); ?>',
					end: '<?php echo e($task->hle_end_date); ?>',
					
					<?php if($task->hle_task_type == 'Hosted Events'): ?>
						color: '#ff9f89'
											
					<?php endif; ?>
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
           
                
            ],
            
			//selectable: true,
			selectHelper: true,
			     // start contains the date you have selected
			 // end contains the end date. 
			 // Caution: the end date is exclusive (new since v2).
			 select: function(start, end, jsEvent, view) {      
			 var allDay = !start.hasTime() && !end.hasTime();
			 alert(["Event Start date: " + moment(start).format(),
                "Event End date: " + moment(end).format(),
                "AllDay: " + allDay].join("\n"));
			 },
			eventMouseover: function(calEvent, jsEvent) {
			var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background:#B6E0EF;position:absolute;z-index:10001;padding:10px;border-radius:5px;">' + calEvent.description + '</div>';
			var $tooltip = $(tooltip).appendTo('body');

			$(this).mouseover(function(e) {
				$(this).css('z-index', 10000);
				$tooltip.fadeIn('500');
				$tooltip.fadeTo('10', 1.9);
			}).mousemove(function(e) {
				$tooltip.css('top', e.pageY + 10);
				$tooltip.css('left', e.pageX + 20);
			});
		},

		eventMouseout: function(calEvent, jsEvent) {
			$(this).css('z-index', 8);
			$('.tooltipevent').remove();
		},
		/*eventRender: function(event, element) {
			console.log(event);
				//element.find(".fc-title").remove();
				//element.find(".fc-time").remove();
				var new_description =   
					moment(event.start).format('H:m') + '-'
					+ moment(event.end).format('H:m') + '<br/>'
					+ '<strong>Title: </strong><br/>' + event.title + '<br/>'
					+ '<strong>Description: </strong><br/>' + event.description + '<br/>'
					;
				element.append(new_description); 
			},*/
			eventClick: function(calEvent, jsEvent, view) {

				$('#event_id').val(calEvent._id);
				$('#hle_id').val(calEvent.id);
				$('#outlook_id').val(calEvent.outlook_id);
//$('#hle_category').val(calEvent.category);
				$('#hle_task_type').val(calEvent.task_type);
				$('#hle_title').val(calEvent.title);
				$(tinymce.get('hle_description').getBody()).html(calEvent.description).delay(1000);
				//$(myTextEditor.get('hle_description').getBody()).html(calEvent.description);
				//$('#hle_description').val(calEvent.description);
				$('#hle_timezone').val(calEvent.hle_timezone);
				 $('#hle_location').val(calEvent.hle_location);
				// $('#hle_outcome').val(calEvent.hle_outcome);
				// $('#hle_next_step').val(calEvent.hle_next_step);

				var hlid=calEvent.allhotel;
				var element = document.getElementById('hotels_name');

				for (var i = 0; i < element.options.length; i++) {

				    element.options[i].selected = hlid.indexOf(element.options[i].value) >= 0;
				}
				var hlidValue = hlid.split(',');
				$('select#hotels_name').val(hlidValue).trigger('change');


				setTimeout(function () {
				var contac=calEvent.allcontact;
				var element1 = document.getElementById('hotel_contacts');
				//alert(element1.options.length);
				for (var i = 0; i < element1.options.length; i++) {
				    element1.options[i].selected = contac.indexOf(element1.options[i].value) >= 0;

				}
				var contacValue = contac.split(',');
				//alert(contacValue);
				$('select#hotel_contacts').val(contacValue).trigger('change');
				} , 1000);
				var invite_id=calEvent.hle_guest_id;
				var invi_id = invite_id.split(',');	
				var a_id=calEvent.searchbar_agents;	
				var agentcorp_id = a_id.split(',');		
				var g_id=calEvent.hle_guests;
				var guest_id = g_id.split(',');
				var ac_count=agentcorp_id.length-1;
				var loop_rotate=ac_count-1;
				//alert(loop_rotate);
				for(var j=0;j<ac_count;j++){
					$('select#searchbar_agents_'+j).val(agentcorp_id[j]).delay(1000).trigger('change');
					$('input#hle_guest_id_'+j).val(invi_id[j]).delay(1000);
				if(j<loop_rotate){
					$('#clone1').trigger('click');
					}	
				}
				
				setTimeout(function () {
				
				for(var j=0;j<ac_count;j++){					
						$('select#hle_guests_'+j).val(guest_id[j]).trigger('change');
					}
				} , 1000);		

			//alert(calEvent.hle_outcome)
				var applicable=calEvent.applicable_to;	
				var applicableValue = applicable.split('~');
				//var ap_id=applicableValue.split(',');
				var ocns=calEvent.hl_ocns_id;
				var ocns_id = ocns.split(',');	
				var so=calEvent.std_outcome;
				var so_id = so.split(',');		
				var sn=calEvent.std_nextstep;
				var sn_id = sn.split(',');		
				var ho=calEvent.hle_outcome;
				var ho_id = ho.split(',');
				// var ho_id1=str_ireplace('<p>','',ho_id);
				// var ho_id2=str_ireplace('</p>','',ho_id1);
				var hn=calEvent.hle_nextstep;
				var hn_id = hn.split(',');
				var tot_cnt=ho_id.length-1;
//alert(hn);
				setTimeout(function () {
				for(var j=0;j<tot_cnt;j++){
					//alert(applicableValue[j]);
					//alert(hn_id[1]);
					var elementA = document.getElementById('applicable_to_'+j);

					for (var i = 0; i < elementA.options.length; i++) {
					 elementA.options[i].selected = applicable.indexOf(elementA.options[i].value) >= 0;
					}
					var sel_id = applicableValue[j].split(',');
					//alert(hn_id[j]);
					$('select#applicable_to_'+j).val(sel_id).trigger('change');
					$('input#hl_ocns_id_'+j).val(ocns_id[j]);
					$('select#std_outcomes_'+j).val(so_id[j]).trigger('change');
					$('select#std_nextsteps_'+j).val(sn_id[j]).trigger('change');
					$(tinymce.get('hle_outcome_'+j).getBody()).html(ho_id[j]);
					$(tinymce.get('hle_nextstep_'+j).getBody()).html(hn_id[j]);
					//$('textarea#hle_outcome_'+j).html(ho[j]).delay(1000);
					//$('textarea#hle_nextstep_'+j).html(hn[j]).delay(1000);

					if(j<tot_cnt-1){
					$('#clone').trigger('click');
					}	
				
				}
 				} , 2000);


				var valuesT=calEvent.task_for;
				$('#list :checkbox').filter(function () {
				    return $.inArray(this.value, valuesT) >= 0;
				}).prop('checked', true);

				var valuesA=calEvent.activity;
				$('#activityL :checkbox').filter(function () {
				    return $.inArray(this.value, valuesA) >= 0;
				}).prop('checked', true);

			    // jQuery("input[name='task_for']").each(function() {
			    // myid=this.id;
			    // myvalue=this.value;
			    // alert(myid);
			    // $.each(object,function(key,value)
			    //         {
			    //             if(calEvent.task_for==myvalue)
			    //                 {
			    //                 $("#"+myid).attr("checked",true);
			    //                 }
			    //         });

			    //  });

				// if(calEvent.category == '1')
				// {
				// 	$('#hle_category').prop('checked', true);

				// }
				//alert(calEvent.show_location);
				if(calEvent.show_location == '1')
				{
					$('#show_location').trigger('click');
					$('#show_location').val(1);

				}
				if(calEvent.hle_allday_status == '1')
				{
					$('#hle_allday_status').prop('checked', true);

				}
				if(calEvent.hle_recurr_status == '' || calEvent.hle_recurr_status == null)
				{
					$('#repeatblock_a, #repeatblock_b').css('visibility', 'hidden');
					$('#hle_recurr_cnt').val('1');
					$('#hle_recurr_duration').val('');
				}
				else
				{
					$('#hle_recurr_status').prop('checked', true);

					$('#hle_recurr_cnt').val(calEvent.recurr_cnt);
					$('#hle_recurr_duration').val(calEvent.recurr_duration);
				}
				if(calEvent.category == 'Hotel Development')
				{
					$("#searchbar").css('visibility', 'inherit');
					$("#searchbar").val(calEvent.hle_lead);
				}
				console.log(calEvent);
				var urlval = "<?php echo e(url('crm/completevent')); ?>";
				urlval += "/"+calEvent.id;
				
				
				var urlval_del = "<?php echo e(url('crm/deletevent')); ?>";
				urlval_del += "/"+calEvent.id;
				//console.log(urlval);
				$('#completebut').html("<a href='"+urlval+"'>Complete Task</a>");
				$('#deletebut').html("<a href='"+urlval_del+"'>Delete</a>");
				
				$('#hle_start_date').val(moment(calEvent.start).format('YYYY-MM-DD'));
				$('#hle_start_hour').val(calEvent.start_hour);
				$('#hle_start_min').val(calEvent.start_min);
				$('#hle_end_date').val(moment(calEvent.end).format('YYYY-MM-DD'));
				$('#hle_end_hour').val(calEvent.end_hour);
				$('#hle_end_min').val(calEvent.end_min);
				//$('#editModal').modal('show');

				window.location.href = "edit-taskevent/"+calEvent.id;
			}
        })
    });
	
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
	$("#treeview").hummingbird();
	
	
	$("#searchbar").css('visibility', 'hidden');
	function opentext(val)
	{
		if(val == 'Hotel Development')
		{
			$("#searchbar").css('visibility', 'inherit');
			$("#searchbar").focus();
			return false;
		}
		else
		{
			$("#searchbar").css('visibility', 'hidden');
			return false;
		}
	}	
	
	$( "#searchbar" ).autocomplete({
		
        source: function(request, response) {
            $.ajax({
            url: "<?php echo e(url('crm/autocomplete')); ?>",
            data: {
                    search : $('#searchbar').val(),
                    type : $('#hle_category').val()
             },
            dataType: "json",
			complete: function(data) {
				//alert(data);
				//console.log(request.searchbar);
			},
            success: function(data){
				
               var resp = $.map(data,function(obj){
                   //console.log(obj.hl_id);
                    return '['+obj.hl_id+'] - '+obj.hl_name+', '+obj.hl_address;
               }); 
 
               response(resp);
            }
			
        });
    },
    minLength: 1
 });


  $( function() {
    $( "#example" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );

		$("#hotels_name").change(function () {
    	var hlid = $(this).val();

    	$('select#applicable_to_0').val(hlid).trigger('change');
		var element = document.getElementById('applicable_to_0');
		for (var i = 0; i < element.options.length; i++) {
		    element.options[i].selected = hlid.indexOf(element.options[i].value) >= 0;
		}
	
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var host="<?php echo e(url('crm/getcontacts/')); ?>";	
		$.ajax({
		type: 'POST',
		data:{'hlid': hlid,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:rendergetcontacts

		})

    	});

	function rendergetcontacts(res){
		//alert(res);
		  $('#hotel_contacts').html('');
       $.each(res.view_details, function(index, data) {
          if (index==0) {
          //	alert(data.hl_c_firstname);
            $('#hotel_contacts').append('<option value="'+data.hl_c_id+'">'+data.hl_c_firstname+' '+data.hl_c_lastname+'</option>');

          }else {
            $('#hotel_contacts').append('<option value="'+data.hl_c_id+'">'+data.hl_c_firstname+' '+data.hl_c_lastname+'</option>');

          };
        }); 
      }	 
$('body').ready(function(){
	$("a#clone").click(function () {
			var $div = $('div[id^="outcome_section"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="outcome_section"]').length;
			//alert(divlength);
			var editor_id='hle_outcome_'+divlength;
			//alert(editor_id);

			tinymce.remove();
			// tinymce.get(editor_id).remove();

			$(".applicable_to").select2("destroy");
			
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.find('a#clone').remove();
			$klon.prop('id', 'outcome_section'+divlength );
			
				var remove_link = '<div align="right" class="pull-right"><span id=rem'+divlength+' onclick="removediv('+divlength+')" class="mdi mdi-window-close"></span></div>';
					
			$("#outcomediv").append($klon);
																		
			$("#outcome_section"+divlength+" select#applicable_to_0").prop({id:"applicable_to_"+divlength, name:"applicable_to_"+divlength+'[]'});
			$(".applicable_to").select2();
			setTimeout(function() {
				  tinymce.init({
					    selector: 'textarea',
					    height: 250,
					    theme: 'modern'
				  });
				}, 50);
			$("#outcome_section"+divlength+" select#std_outcomes_0").prop('id', 'std_outcomes_'+divlength);
			$("#outcome_section"+divlength+" input#hl_ocns_id_0").prop('id', 'hl_ocns_id_'+divlength);

			$("#outcome_section"+divlength+" select#std_nextsteps_0").prop('id', 'std_nextsteps_'+divlength);
			$("#outcome_section"+divlength+" #hle_outcome_0_ifr").prop('id', 'hle_outcome_'+divlength+'_ifr');
			//tinymce.init();
			$("#outcome_section"+divlength+" textarea#hle_outcome_0").prop('id', 'hle_outcome_'+divlength);


			// tinymce.EditorManager.execCommand('mceAddControl',true, 'editor_id');

			$("#outcome_section"+divlength+" textarea#hle_nextstep_0").prop('id', 'hle_nextstep_'+divlength);
			$("#outcome_section"+divlength).find('div#removelink').append(remove_link);
            
			/*$('select[multiple]').multiselect({
								columns: 2,
							search: true,
								searchOptions: {
									'default': 'Search Leads'
								},
								selectAll: true
							});
							
			alert("This is test");*/			
			return false;
	});
});

	function removediv(val){
		var id=$("#hl_ocns_id_"+val).val();
		//alert(id);
		if(confirm('Are you sure want to delete?')){
		var $cnid = $('#outcome_section'+val);
		$cnid.remove();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		var host="<?php echo e(url('crm/remove_ocns/')); ?>";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		

	})

	}else{

	}

	};


 $(document).ready(function(){
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		    $(".hle_users").on('change', function postinput(){
			//$('#calendar').fullCalendar( 'destroy' );
			var selecteduser = $(this).val();
			//alert(selecteduser);

			$.ajax({
				/* the route pointing to the post function */
				url: 'postusersajax',
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, 'value':selecteduser},
				dataType: 'JSON',
				complete: function (data) {
					console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (events) {
					jsonObj = [];
					
					$.each(events, function(i, items) {
						item = {};
						item ["id"]=events[i].hle_id;
						item ["outlook_id"]=events[i].outlook_id;
						item ["title"]='"'+events[i].hle_title+'"';
						item ["description"] ='"'+events[i].hle_description+'"';
						item ["category"] =events[i].hle_category;
						item ["start_hour"] =  moment(events[i].hle_start_date).format('HH');     
						item ["start_min"] =  moment(events[i].hle_start_date).format('m');   
						item ["end_hour"] =  moment(events[i].hle_end_date).format('HH');     
						item ["end_min"] =  moment(events[i].hle_end_date).format('m');   
						item ["task_type"] =events[i].hle_task_type;
						item ["hle_recurr_status"] =events[i].hle_recurr_status;
						item ["recurr_cnt"] =events[i].hle_recurr_cnt;
						item ["recurr_duration"] =events[i].hle_recurr_duration;
						item ["hle_timezone"] =events[i].hle_timezone;
						item ["hle_allday_status"] =events[i].hle_allday_status;
						item ["hle_location"] ='"'+events[i].hle_location+'"';
						item ["hle_outcome"] =events[i].hle_outcome;
						item ["hle_next_step"] =events[i].hle_next_step;
						item ["hle_lead"] =events[i].hl_lead;
						item ["start"] =events[i].hle_start_date;
						item ["end"]=events[i].hle_end_date;
						jsonObj.push(item);
					});
					
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', jsonObj);         
					$('#calendar').fullCalendar('rerenderEvents' );
				}
			}); 
		});

		$(".viewbox").change(function() {
			

			var checkedVals = $('.viewbox:checkbox:checked').map(function() {
				return this.value;
			}).get();
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var selectedall = checkedVals.join(",");
			var userid = $('#hle_users').val();
			//alert(selectedall);
			if(selectedall!=''){
			$.ajax({
				/* the route pointing to the post function */
				url: 'postviewsajax',
				type: 'POST',
				/* send the csrf-token and the input to the controller */
				data: {'_token': CSRF_TOKEN, 'value':selectedall, 'useridval':userid},
				dataType: 'JSON',
				complete: function (data) {
					//console.log(data);
				},
				/* remind that 'data' is the response of the AjaxController */
				success: function (events) {
					//console.log(events);
					//console.log('fsfdfd');
					jsonObj = [];
					
					$.each(events, function(i, items) {
						item = {};
						item ["id"]=events[i].hle_id;
						item ["outlook_id"]=events[i].outlook_id;
						item ["title"]='"'+events[i].hle_title+'"';
						item ["description"] ='"'+events[i].hle_description+'"';
						item ["category"] =events[i].hle_category+'"';
						item ["start_hour"] =  moment(events[i].hle_start_date).format('HH');     
						item ["start_min"] =  moment(events[i].hle_start_date).format('m');   
						item ["end_hour"] =  moment(events[i].hle_end_date).format('HH');     
						item ["end_min"] =  moment(events[i].hle_end_date).format('m');   
						item ["task_type"] =events[i].hle_task_type;
						item ["hle_recurr_status"] =events[i].hle_recurr_status;
						item ["recurr_cnt"] =events[i].hle_recurr_cnt;
						item ["recurr_duration"] =events[i].hle_recurr_duration;
						item ["hle_timezone"] =events[i].hle_timezone;
						item ["hle_allday_status"] =events[i].hle_allday_status;
						item ["hle_location"] ='"'+events[i].hle_location+'"';
						item ["hle_outcome"] =events[i].hle_outcome;
						item ["hle_next_step"] =events[i].hle_next_step;
						item ["hle_lead"] =events[i].hl_lead;
						item ["start"] =events[i].hle_start_date;
						item ["end"]=events[i].hle_end_date;
						jsonObj.push(item);
					});
					
					$('#calendar').fullCalendar('removeEvents');
					$('#calendar').fullCalendar('addEventSource', jsonObj);         
					$('#calendar').fullCalendar('rerenderEvents' );
				}
			}); 
		}
		else{
			window.location.reload();	
			}
		});

   });    

function open_location()
{	
	
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var main=$('#searchbar_agents_0').val();
	var res = main.slice(0, 1);
	var res1 = main.slice(1, 5);
	//alert(res1);

	if(res=='a'){
	var id=res1;
		var host="<?php echo e(url('crm/getagent_loc/')); ?>";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:rendergetagent_loc

	})
	}else if(res=='c'){
		var id=res1;
		var host="<?php echo e(url('crm/getcorporate_loc/')); ?>";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:rendergetagent_loc
	})
	}

	return false;
	

}
	function rendergetagent_loc(res){
		//alert(res);
			if ($('#show_location').prop("checked")){
          	$('#pac-input').val(res.view_details.hl_ofz_address+', '+res.view_details.cities+', '+res.view_details.states+', '+res.view_details.country);	
          	}else{
			$('#pac-input').val('');
			}
      }	 



	$("button#clone1").on('click', function (e) {
		 e.preventDefault();
			var $div = $('div[id^="ag_corporate_new_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 2 ) +1;
			var divlength = $('div[id^="ag_corporate_new_form"]').length;
			
			
			 $(".searchbar_agents").select2("destroy");
			 $(".hle_guests").select2("destroy");
			 
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'ag_corporate_new_form'+divlength );
			
			
			var add_close='<div align="right" class="pull-right" style="margin-top:38px;"><button id=rem'+divlength+' onclick="removediv1('+divlength+')" type="abutton" class="btn btn-outline-secondary btn-rounded btn-icon" style="margin-left:37px;"><i class="mdi mdi-close text-info"></i>    </button></div>';

			$("#invitenew_section").append($klon);



			$("#ag_corporate_new_form"+divlength+" select#searchbar_agents_0").prop('id', 'searchbar_agents_'+divlength);
			$("#ag_corporate_new_form"+divlength+" span#select2-searchbar_agents_0-container").prop('id', 'select2-searchbar_agents_'+divlength+'-container');
			$(".searchbar_agents").select2({               
                placeholder: "--Choose--",
                alowClear:true
            });
        	$(".hle_guests").select2({               
                placeholder: "--Choose--",
                alowClear:true
            });

			// $('.select2-selection__rendered').select2({
			// 	placeholder:'--select--'
			// });
			// $('.searchbar_agents').last().next().next().remove();
			$("#ag_corporate_new_form"+divlength+" select#hle_guests_0").prop('id', 'hle_guests_'+divlength);
			$("#ag_corporate_new_form"+divlength+" input#attendee_mail_0").prop('id', 'attendee_mail_'+divlength);
			$("#ag_corporate_new_form"+divlength+" input#hle_guest_id_0").prop('id', 'hle_guest_id_'+divlength);

if(divlength>0){
	$("#ag_corporate_new_form"+divlength+" div#removeplus_0").prop('id', 'removeplus_'+divlength);	
}
		$('#removeplus_'+divlength).remove();
		$('#ag_corporate_new_form'+divlength).append(add_close);

			//$divnew.find('input[type=text]:first').focus();
			return false;
	});
	
	function removediv1(val){
		//alert(val);
		var id=$("#hle_guest_id_"+val).val();
		//alert(id);
		if(confirm('Are you sure want to delete?')){
		var $cnid = $('#ag_corporate_new_form'+val);
		$cnid.remove();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		var host="<?php echo e(url('crm/remove_guest/')); ?>";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		})

		var outlook_id= $("#outlook_id").val();
	 	//alert(outlook_id);
		var my_api_token = $("#my_api_token").val();


		var host="https://graph.microsoft.com/v1.0/me/events/"+outlook_id;	
		$.ajax({
		type: 'DELETE',
		url: host,
		dataType: "json",
		headers: { "Authorization": "Bearer " + my_api_token, "Content-Type": "application/json", "Content-Length": 600},
		success: function() {
				setTimeout(function () {
				self.submit();
				} , 5000);

           
          }

	})

	}else{

	}
	};



 $(document).on("change", "#searchbar_agents_0", changeloc);
	function changeloc(){ 
	
	$("#show_location"). prop("checked", false);
	$("#pac-input").val('');

}
var globalVariable;

 $(document).on("change", ".searchbar_agents", getguests);
	function getguests(){ 

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var id= $(this).val(); 
	var id1=$(this).attr('id');	
	var split_val=id1.split('_');
	var val1 = split_val[2];

	//alert(id);
	globalVariable=val1;
	var host="<?php echo e(url('crm/getguests/')); ?>";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN,'global_val':val1},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(){
        $('.image_loader').hide();
        },success:rendergetguests

	})
	return false;
}
function rendergetguests(res){
	 // var local = globalVariable;
	//console.log("res:"+JSON.stringify(res));
	 var local = res.view_details.global_val;
	   $('#hle_guests_'+local).html('');
       $.each(res.view_details.hle_guests, function(index, data) {
       //	alert(local+'test'+data.hl_corcont_id)
          if (index==0) {
            $('#hle_guests_'+local).append('<option value="">---Choose---</option>');
            $('#hle_guests_'+local).append('<option value="'+data.hl_corcont_id+'">'+data.hl_first_name+' '+data.hl_last_name+'</option>');

          }else {
            $('#hle_guests_'+local).append('<option value="'+data.hl_corcont_id+'">'+data.hl_first_name+' '+data.hl_last_name+'</option>');

          };
        });   
      }	  
var globalVariable1;
$(document).on("change", ".hle_guests", load_mailid);
function load_mailid(){
	//alert(id1);
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var a=$("#hle_guests_0 :selected").text();
	var id1=$(this).attr('id');
	var split_val=id1.split('_');
	var val1 = split_val[2];
	globalVariable1=val1;
	var main=$('#searchbar_agents_'+val1).val();
	var res = main.slice(0, 1);
	var id= $(this).val();
	//alert(res);

		var host="<?php echo e(url('crm/getac_mail/')); ?>";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN,'res':res},
		url: host,
		dataType: "json", // data type of response		
		success:rendergetagent_mail

	})
}

 function rendergetagent_mail(res){
	  var locale = globalVariable1;
       $.each(res.view_details, function(index, data) {
       //	alert(data);
          if (index==0) {
            $('#attendee_mail_'+locale).val(data);
          }else {
          	//alert(data.hl_email);
            $('#attendee_mail_'+locale).val(data);
          };
        });   
      }	  


$('body').ready(function(){
$("#event_update").click(function () {
	 
	 	var outlook_id= $("#outlook_id").val();
	 	//alert(outlook_id);
		var my_api_token = $("#my_api_token").val();
		var sub= $("#hle_title").val();
		var content= $("#hle_description").val();
		var startdate = $("#hle_start_date").val();
		var enddate= $("#hle_end_date").val();
		var start_date= startdate+'T'+$("#hle_start_hour").val()+':'+$("#hle_start_min").val()+':00';
		var end_date= enddate+'T'+$("#hle_end_hour").val()+':'+$("#hle_end_min").val()+':00';
		var locationA= $("#pac-input").val();
		var timeZone= $("#hle_timezone").val();
		var content= $("#searchbar_agents").val();
		var cnt=$("input[name='attendee_mail[]']").length;
				jsonObj = [];

		for(var i=0; i<cnt; i++){
			var invitation=$("#attendee_mail_"+i).val();
			var attendee_name=$("#hle_guests_"+i+" option:selected").text();
			//alert(attendee_name);
			jsonObj.push({
			      "emailAddress": {
			        "address":invitation,
			        "name": attendee_name
			      },
			      "type": "required"
			  });

			//alert(jsonObj);
		}
		var host="https://graph.microsoft.com/v1.0/me/events/"+outlook_id;	
		$.ajax({
		type: 'PATCH',
		url: host,
// Content-Type: "application/json;odata.metadata=minimal;odata.streaming=true;IEEE754Compatible=false;",
		 dataType: "json",
		headers: { "Authorization": "Bearer " + my_api_token, "Content-Type": "application/json", "Content-Length": 600},

		data:JSON.stringify({"Subject": sub,
			  "Body": {
			    "ContentType": "HTML",
			    "Content": content
			  },
			  "Start": {
			      "DateTime": start_date,
			      "TimeZone": timeZone
			  },
			  "End": {
			      "DateTime": end_date,
			      "TimeZone": timeZone
			  },
			  "location":{
			      "displayName":locationA
			  },
			  "attendees": jsonObj
			}),

 // data type of response	
 // success:event_outlook	
		success: function() {
				setTimeout(function () {
				self.submit();
				} , 5000);

           
          }

	})
})

})

$('body').ready(function(){
$("#deletebut").click(function () {
	 
	 	var outlook_id= $("#outlook_id").val();
	 	//alert(outlook_id);
		var my_api_token = $("#my_api_token").val();
		var sub= $("#hle_title").val();
		var content= $("#hle_description").val();
		var startdate = $("#hle_start_date").val();
		var enddate= $("#hle_end_date").val();
		var start_date= startdate+'T'+$("#hle_start_hour").val()+':'+$("#hle_start_min").val()+':00';
		var end_date= enddate+'T'+$("#hle_end_hour").val()+':'+$("#hle_end_min").val()+':00';
		var locationA= $("#pac-input").val();
		var timeZone= $("#hle_timezone").val();
		var content= $("#searchbar_agents").val();
		var cnt=$("input[name='attendee_mail[]']").length;

		var host="https://graph.microsoft.com/v1.0/me/events/"+outlook_id;	
		$.ajax({
		type: 'DELETE',
		url: host,
// Content-Type: "application/json;odata.metadata=minimal;odata.streaming=true;IEEE754Compatible=false;",
		 dataType: "json",
		headers: { "Authorization": "Bearer " + my_api_token, "Content-Type": "application/json", "Content-Length": 600},


 // data type of response	
 // success:event_outlook	
		success: function() {
				setTimeout(function () {
				self.submit();
				} , 5000);

           
          }

	})
})

})



var globaloc;

$(document).on("change", ".std_outcomes", getoutcomes);
function getoutcomes(){ 
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id= $(this).val(); 
var id1=$(this).attr('id');

var split_val=id1.split('_');

var val1 = split_val[2];

//alert(id);
globaloc=val1;
	var host="<?php echo e(url('crm/getoutcomes/')); ?>";	
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
        },success:rendergetoutcomes

	})
	return false;
}
function rendergetoutcomes(res){
	  var local1 = globaloc;
	   //	alert('hle_outcome_'+local1);
          		$(tinymce.get('hle_outcome_'+local1).getBody()).html(res.view_details.hl_out_description);
          		//$('#hle_outcome_'+local1).val(res.view_details.hl_out_description);	
      }	 

var globalns;

$(document).on("change", ".std_nextsteps", getnextstep);
function getnextstep(){ 
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id= $(this).val(); 
var id1=$(this).attr('id');

var split_val=id1.split('_');

var val1 = split_val[2];

globalns=val1;
	var host="<?php echo e(url('crm/getnextstep/')); ?>";	
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
        },success:rendergetnextstep

	})
	return false;
}
function rendergetnextstep(res){
	  var local2 = globalns;
	 
       $(tinymce.get('hle_nextstep_'+local2).getBody()).html(res.view_details.hl_ns_description);	
      }	 

    function initMap() {
    	var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
        var map = new google.maps.Map(document.getElementById('map'), {
        center: centerCoordinates,
        zoom: 4
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var infowindowContent = document.getElementById('infowindow-content');
        
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);
        var infowindow = new google.maps.InfoWindow();
        infowindow.setContent(infowindowContent);
        
        var marker = new google.maps.Marker({
          map: map
        });

        autocomplete.addListener('place_changed', function() {
 	        document.getElementById("location-error").style.display = 'none';
            infowindow.close();
            marker.setVisible(false);
        		var place = autocomplete.getPlace();
        		if (!place.geometry) {
        		  	document.getElementById("location-error").style.display = 'inline-block';
        		  	document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
        		    return;
        		}
        		
        		map.fitBounds(place.geometry.viewport);
        		marker.setPosition(place.geometry.location);
        		marker.setVisible(true);
        		    
        		infowindowContent.children['place-icon'].src = place.icon;
        		infowindowContent.children['place-name'].textContent = place.name;
        		infowindowContent.children['place-address'].textContent = input.value;
        		infowindow.open(map, marker);
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXMpUMMrjVgbWeWF99SfuFQhe06-ST62s&libraries=places&callback=initMap"
        async defer></script>
  <script src="<?php echo e(asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendors/select2/select2.min.js')); ?>"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('assets/js/typeahead.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>
  <script type="text/javascript">

    tinymce.init({
		selector: 'textarea',
        mode : 'specific_textareas',
        editor_selector : 'myTextEditor',
        theme : 'modern',
        height: 250
    });
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>