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
		.cform
		{
			//padding:10px;
			//border:1px solid rgba(0, 0, 0, 0.125);
			//margin:5px;
		}
		.firstrow{
			flex-direction: row;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.jerror{ font-size:12px; color:red}
		 .select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #dfcbac 1px !important;
    outline: 0;
}
.select2-container--default .select2-selection--multiple{border:1px solid #dfcbac !important;
	border-radius:0px !important;cursor:text;
}
					  </style>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/base/vendor.bundle.base.css')); ?>">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

         <div class="row mt-30 "></div>	
    

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                                                       
                            <div class="row mt-30 "></div>  
<?php if(Session::get('message')): ?> 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear <?php echo e(Auth::user()->first_name); ?>, corporate contacts details has been successfully added.</div>
</div>
<div class="col-lg-2"></div>

<?php endif; ?> 							
                        </div>
                    </div>
					<div class="card mb-3" style="min-height: 550px;">
         
          <div class="card-body">
			<h4 class="card-title text-uppercase">ADD CORPORATE ACCOUNTS</h4>
			<div class="row mt-30 "></div>  
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="navbar-pills " id="bs-example-navbar-collapse-2">
							
                                  <ul class="nav nav-tabs tab-no-active-fill " style="margin-top: 10px;">                    
								<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Business Information</a></li>	
								<li class="nav-item"><a class="nav-link" href="#tab01" data-toggle="tab">Corporate Regional Office Location</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab03" data-toggle="tab">Consortia Contacts</a></li>
								
								<li class="nav-item"><a class="nav-link" href="#tab02" data-toggle="tab">Corporate Contact</a></li>
								
								
				
						
                                                        
                                  </ul>
                            </div><!-- /.navbar-collapse -->
                         
					              
					
					<div class="tab-content" id="tab-contents" style="margin-top:0px;">
					    <div class="tab-pane active" id="tab1">
						 <form id="commentForm" action="<?php echo e(url('crm/corporateadded')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
					    	<?php echo e(csrf_field()); ?>

                                <div class="row">
                            
                                    
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										<label>Business Name </label><input name="business_name" id="business_name" type="text" tabindex="1" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('business_name')) ? $errors->first('business_name') : ''); ?></span>
										
										
                                        </div>
										
										
                                   

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Business Type </label><select tabindex="2" name="business_type" id="business_type" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" >
										<option value="">
										 ---Choose---
										 </option>
										<?php $__currentLoopData = $master_business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($master_business->hl_mt_bus_id); ?>" ><?php echo e($master_business->hl_business_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('business_type')) ? $errors->first('business_type') : ''); ?></span>
										
										</div>

										
                                    
                                    
                                      <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Head Office Address </label><input tabindex="3" type="text" name="address1" id="address1"  class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span> 
										                                      
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country </label>
										<select tabindex="5" name="h_country" id="h_country"  class="form-control country js-example-basic-multiple w-100" data-error="#err_country" style="width: 100%" >		
									<option value="">Choose Country</option>									
										<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($coun->id); ?>" ><?php echo e($coun->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error"><?php echo e(($errors->has('h_country')) ? $errors->first('h_country') : ''); ?></span>
										</div>  
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States </label><select tabindex="6" name="states" id="states"  class="form-control states js-example-basic-multiple w-100" data-error="#err_states" style="width: 100%">
										<option value="">
										 ---Choose---
										 </option>
										 <?php if($Hotellccontact): ?>
										 <?php $__currentLoopData = $editstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($Hotellccontact->hl_country==$states->country_id): ?>
											<option value="<?php echo e($states->id); ?>"  ><?php echo e($states->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('states')) ? $errors->first('states') : ''); ?></span></div>	  

									 <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City </label><select name="cities" id="cities" tabindex="7" class="form-control js-example-basic-multiple w-100" data-error="#err_cities" style="width: 100%">		
										<option value="">
										 ---Choose---
										 </option>										
										
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('cities')) ? $errors->first('cities') : ''); ?></span>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
									
									
									<!-- <div class="form-group">
                                        <div class="col-sm-12"><label>Subsidiary of</label><input tabindex="11" type="text" class="form-control required" name="subs_of" id="subs_of" value="<?php echo e(old('postcode')); ?>" data-error="#err_subs_of">
										<span id="err_subs_of" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('subs_of')) ? $errors->first('subs_of') : ''); ?></span>
										</div>
										
                                         
                                    </div> -->
								
                                
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Postcode </label><input type="text" tabindex="8" class="form-control required" name="postcode" id="postcode"  data-error="#err_postcode">
										<span id="err_postcode" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('postcode')) ? $errors->first('postcode') : ''); ?></span>
										
										
                                         
                                    </div>
								
										
										 <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                       <label>Landline No </label><input tabindex="4" type="text" name="landline" id="landline1"  class="form-control required mobile" data-error="#err_landline1" ><span id="err_landline1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error"><?php echo e(($errors->has('landline1')) ? $errors->first('landline1') : ''); ?></span> 
										                                  
                                    </div>


										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										<label>Website </label><input type="text" tabindex="9" class="form-control required" name="website" id="website"  data-error="#website">
										<span id="website" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('website')) ? $errors->first('website') : ''); ?></span>
										</div>
								
                                    	
                                     <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                     <label>Lead Type </label><select name="lead_type" tabindex="10" id="lead_type" class="js-example-basic-multiple w-100" data-error="#err_type" style="width: 100%">
									 <option value="">
										 ---Choose---
										 </option>
									 <?php $__currentLoopData = $master_lead_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_l_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($master_l_type->hl_mt_lt_id); ?>" ><?php echo e($master_l_type->hl_lead_type_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									 </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('lead_type')) ? $errors->first('lead_type') : ''); ?></span>
										
										</div>
                                    
                                  <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Subsidy of </label><select multiple="multiple" tabindex="2" name="subsidy_m_off[]" id="" class="js-example-basic-multiple w-100" data-error="#err_type" style="width: 100%">
										

										<?php $__currentLoopData = $hl_corporate_contact_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_corporate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($hl_corporate->hl_ccb_id); ?>_1" ><?php echo e($hl_corporate->hl_business_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										<?php $__currentLoopData = $hl_agents_contacts_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_agents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($hl_agents->hl_agentcont_id); ?>_2"><?php echo e($hl_agents->hl_business_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									</select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('business_type')) ? $errors->first('business_type') : ''); ?></span>
										
										</div>

										<div class="col-sm-12 col-md-12 col-lg-12 mt-30"> <label><strong>Contact Details:</strong></label></div>


										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation </label>

											<select name="m_con_contact_designation" id="m_con_contact_designation" type="text" class="js-example-basic-multiple w-100" data-error="#err_m_con_contact_designation" style="width: 100%">
											<option value="">Choose</option>
											<?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($ConDes->hl_cd_id); ?>"><?php echo e($ConDes->hl_title); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
											<!-- <input name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation" > -->
											<span id="err_m_con_contact_designation" style="position: relative;    top: -2px;"></span>
											<span class="error"><?php echo e(($errors->has('m_con_contact_designation')) ? $errors->first('m_con_contact_designation') : ''); ?></span>
										</div>
                                        	<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Title </label>
<select name="m_con_title" id="m_con_title" type="text" class="js-example-basic-multiple w-100" data-error="#err_m_con_title" style="width: 100%"><option value="">Choose Title</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select>
                                        		<!-- <input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" > -->
										<span id="err_m_con_title" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_title')) ? $errors->first('m_con_title') : ''); ?></span>
										</div>
																			
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name </label><input name="m_con_first_name" id="m_con_first_name" type="text" class="form-control " data-error="#err_m_con_first_name" >
										<span id="err_m_con_first_name" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_first_name')) ? $errors->first('first_name') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name </label><input name="m_con_last_name" id="m_con_last_name" type="text" class="form-control" data-error="#err_m_con_last_name" >
										<span id="err_m_con_last_name" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_last_name')) ? $errors->first('m_con_last_name') : ''); ?></span>
										</div>
										
										
										
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="m_con_mobile_no" id="m_con_mobile_no" type="text" class="form-control " data-error="#err_m_con_mobile_no" >
										<span id="err_m_con_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_mobile_no')) ? $errors->first('m_con_mobile_no') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label><input name="m_con_landline_no" id="m_con_landline_no" type="text" class="form-control" data-error="#err_m_con_landline_no" >
										<span id="err_m_con_landline_no" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('landline_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="m_con_email" id="m_con_email" type="text" class="form-control " data-error="#err_m_con_email" >
										<span id="err_m_con_email" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_email')) ? $errors->first('email') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  </label><input name="m_con_linkedin_contact" id="m_con_linkedin_contact" type="text" class="form-control " data-error="#err_m_con_linkedin_contact" >
										<span id="err_m_con_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_linkedin_contact')) ? $errors->first('m_con_linkedin_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype </label><input name="m_con_skype_contact" id="m_con_skype_contact" type="text" class="form-control " data-error="#err_m_con_skype_contact" >
										<span id="err_m_con_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_skype_contact')) ? $errors->first('m_con_skype_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input name="m_con_dob" id="m_con_dob" type="date" class="form-control " data-error="#m_con_dob" >
										<span id="err_m_con_dob" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('m_con_dob')) ? $errors->first('m_con_dob') : ''); ?></span>
										</div>
										<!-- <div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span>
											<input type="checkbox" name="invite[]" id="event_invite" class="" >Not Eligible for event invite </input></span>
										
										</div> -->
									
                                    
                                     
                                
                                </div>
								  <div class="row ">
								  <div class="form-group col-sm-6 col-md-6 col-lg-6 ">
					  <!--  <input type="button" class="btn btn-outline-inverse-info btn-lg" style="width:auto" value="Cancel"> -->
					  </div>
					  <div align="right" class="form-group col-sm-6 col-md-6 col-lg-6">
									<input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary btn-lg next-btn" style="">
								</div>
								</form>
					    </div>
					    </div>
					   
						
						<!--//VENUE OCCASION-->
						<div class="tab-pane" id="tab01">
						 <form id="commentForm1" action="<?php echo e(url('crm/corregional_added')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
						 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						 <div  class="col-sm-12 col-md-12 col-lg-12">
						 <div class="alert alert-danger hidden" id="form2Error"></div>
						 </div>
							<div  class="col-sm-12 col-md-12 col-lg-12">
							<span> <input type="checkbox" name="sel_add_type" id="direct_check1" value="Direct Address">  Create New Office Address </input></span>
							</div>
							<div style="margin-bottom:20px;margin-top:20px;padding-left:20px;"></div>
							<div  class="col-sm-12 col-md-12 col-lg-12">
							<span> <input type="checkbox" name="sel_add_type" id="direct_check2" value="Consortia">   Add Consortia </input></span>
							
							</div>

							<span class="error"><?php echo e(($errors->has('sel_add_type')) ? $errors->first('sel_add_type') : ''); ?></span>
							<div style="margin-bottom:20px;margin-top:20px;padding-left:20px;"></div>
						<div id="contact_section">
						 <div class="col-lg-12" id="contact_add_form0">
						
							<div class="row"  id="direct2">
							<div class="col-sm-6  col-md-6 col-lg-6 form-group">
							<select name="ofz_type" id="ofz_type" class="form-control  js-example-basic-multiple w-100" style="width:100%"><option value="">Select</option>
							<option value="Implant">Implant</option>
							<option value="Outplant">Outplant</option></select>
							<span id="err_subsidy_ofz2" class="jerror"></span>
								</div>
								
							
							</div>
							
							<div style="margin-bottom:20px;margin-top:20px;padding-left:20px;"></div>
							
							<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12"  id="direct2_implant">
							<div class="row">
								<div class="col-sm-6  col-md-6 col-lg-6">
									<div style=""><label>Select Agent</label>
									<!-- <input name="subsidy1[]" tabindex="1" id="subsidy1" type="text" class="form-control required" data-error="#err_subsidy1" > -->
									<select name="subsidy1" id="subsidy1" class="form-control js-example-basic-multiple w-100" style="width: 100%">
									<option value="">Select Agent</option>
											<?php if($Hotelagentcontactbasic): ?>
											<?php $__currentLoopData = $Hotelagentcontactbasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Hotelagentcontactbasics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($Hotelagentcontactbasics->hl_agentcont_id); ?>"><?php echo e($Hotelagentcontactbasics->hl_business_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									</select>
									<span id="err_subsidy1"  class="jerror"></span>
									<span class="error"><?php echo e(($errors->has('subsidy1')) ? $errors->first('subsidy1') : ''); ?></span>
									</div>
								</div>
								<div class="col-sm-6  col-md-6 col-lg-6 ">
									&nbsp;
								</div>

								<div class="col-sm-12  col-md-12 col-lg-12 form-group">
								&nbsp;
								</div>

								<div class="col-sm-12  col-md-12 col-lg-12 form-group">
								<label><strong>Address </strong></label>
								</div>
								</div>

								<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-6  form-group">

	<label>Office Address </label>
	<input name="ic_off_address1" tabindex="1" id="ic_off_address1" type="text" class="form-control required" data-error="#err_off_address1" >
										<span id="err_ic_off_address1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_address1')) ? $errors->first('ic_address1') : ''); ?></span>
										
										</div>
										
									
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country </label>
										<select tabindex="2" name="ic_country1" id="ic_country1"  class="js-example-basic-multiple w-100" data-error="#err_ic_country1" style="width: 100%">		
									<option value="">Choose Country</option>									
										<?php echo $__env->make('panels.crm.countries', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									 </select>
									 <span id="err_ic_country1" class="jerror">&nbsp;</span>
									 <span class="error"><?php echo e(($errors->has('ic_country1')) ? $errors->first('ic_country1') : ''); ?></span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States </label>
										<select tabindex="3" name="ic_states1" id="ic_states1" class="js-example-basic-multiple w-100" data-error="#err_ic_states" style="width: 100%">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_ic_states1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_states1')) ? $errors->first('ic_states1') : ''); ?></span>
										</div>
									
										<div class="col-sm-12 col-md-6 col-lg-6"><label>City </label><select name="ic_cities1" tabindex="4" id="ic_cities1"  class="js-example-basic-multiple w-100" data-error="#err_ic_cities" style="width:100%">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_ic_cities1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_cities1')) ? $errors->first('ic_cities1') : ''); ?></span>
										</div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
					<label>Postcode </label><input type="text" tabindex="5"  class="form-control required" name="ic_postcode1" id="ic_postcode1" value="<?php echo e(old('ic_postcode')); ?>" data-error="#err_ic_postcode1">
										<span id="err_ic_postcode1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_postcode1')) ? $errors->first('ic_postcode1') : ''); ?></span>   
                                    </div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label><input tabindex="10" name="ic_landline_no1" id="ic_landline_no1" type="text" class="form-control required" data-error="#err_ic_landline_no" >
										<span id="err_ic_landline_no1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_landline_no1')) ? $errors->first('ic_landline_no1') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="ic_email1" tabindex="8" id="ic_email1" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1"  class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_email1')) ? $errors->first('ic_email1') : ''); ?></span>
										</div>


<div class="col-sm-12 col-md-12 col-lg-12 form-group"><label><strong>Contact Details </strong></label></div>
	<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation </label>
											<select name="ic_contact_designation" id="ic_contact_designation" type="text" class="form-control js-example-basic-multiple w-100" data-error="#err_ic_contact_designation" style="width: 100%">
												<option value="">Choose</option>
												<?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($ConDes->hl_cd_id); ?>"><?php echo e($ConDes->hl_title); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>

										<span id="err_ic_contact_designation" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_contact_designation')) ? $errors->first('ic_contact_designation') : ''); ?></span>
										</div>

							<div class="col-sm-12 col-md-6 col-lg-6  form-group">
											
											<label>Title </label>
<select name="ic_title" id="ic_title" type="text" class="form-control required" data-error="#err_ic_title" ><option value="">Choose Title</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select>
										
											<span id="err_ic_title" class="jerror"></span>
											<span class="error"><?php echo e(($errors->has('ic_title')) ? $errors->first('ic_title') : ''); ?></span>
											
										</div>
									
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name </label><input name="ic_first_name" id="ic_first_name" type="text" class="form-control required" data-error="#err_ic_first_name" >
										<span id="err_ic_first_name" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_first_name')) ? $errors->first('ic_first_name') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name </label><input name="ic_last_name" id="ic_last_name" type="text" class="form-control required" data-error="#err_ic_last_name" >
										<span id="err_ic_last_name" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_last_name')) ? $errors->first('ic_last_name') : ''); ?></span>
										</div>
										

<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="ic_mobile_no" id="ic_mobile_no" type="text" class="form-control required" data-error="#err_ic_mobile_no" >
										<span id="err_ic_mobile_no" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_mobile_no')) ? $errors->first('ic_mobile_no') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label><input name="ic_clandline_no" id="ic_clandline_no" type="text" class="form-control required" data-error="#err_ic_clandline_no" >
										<span id="err_ic_clandline_no" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_clandline_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="ic_cemail" id="ic_cemail" type="text" class="form-control required" data-error="#err_ic_cemail" >
										<span id="err_ic_cemail" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_cemail')) ? $errors->first('ic_cemail') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  </label><input name="ic_linkedin_contact" id="ic_linkedin_contact" type="text" class="form-control required" data-error="#err_ic_linkedin_contact" >
										<span id="err_ic_linkedin_contact" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_linkedin_contact')) ? $errors->first('ic_linkedin_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype </label><input name="ic_skype_contact" id="ic_skype_contact" type="text" class="form-control required" data-error="#err_ic_skype_contact" >
										<span id="err_ic_skype_contact" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_skype_contact')) ? $errors->first('ic_skype_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input name="ic_dob" id="ic_dob" type="date" class="form-control required" data-error="#ic_dob" >
										<span id="err_ic_dob" class="jerror"></span>
										<span class="error"><?php echo e(($errors->has('ic_dob')) ? $errors->first('ic_dob') : ''); ?></span>
										</div>


								</div>
							</div>
						</div>
							<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12"  id="direct2_outplant">
							<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6 form-group"><div style=""><label>Select Agent </label>
							<select name="subsidy2" id="subsidy2" class="js-example-basic-multiple w-100" style="width:100%">
							<option value="">Select Agent</option>
							<?php if($Hotelagentcontactbasic): ?>
							<?php $__currentLoopData = $Hotelagentcontactbasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Hotelagentcontactbasics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($Hotelagentcontactbasics->hl_agentcont_id); ?>"><?php echo e($Hotelagentcontactbasics->hl_business_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
							</select>
							<!-- <input name="subsidy2[]" tabindex="1" id="subsidy2" type="text" class="form-control required" data-error="#err_subsidy2" > -->
							<span id="err_subsidy2"  class="jerror"></span>
							<span class="error"><?php echo e(($errors->has('subsidy2')) ? $errors->first('subsidy2') : ''); ?></span></div></div>
							<div class="col-sm-6 col-md-6 col-lg-6 form-group">&nbsp;</div>
							
							<div class="col-sm-12 col-md-12 col-lg-12 form-group"><div style=""><label>Select Office Location </label>

								<table class="table table-bordered"  width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<th>&nbsp;</th>
								<th>Office Address</th>
								<th>Location Type</th>                               
								<th>Country</th>
                             					
								
							
								
							  </tr>
							</thead>
<tbody id="officeadd"></tbody>
                            </table>
							<!-- <?php echo $__env->make('panels.crm.regionaldirectaddress', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
							
							<!-- <input name="subsidy_ofz2[]" tabindex="1" id="subsidy_ofz2" type="text" class="form-control required" data-error="#err_subsidy_ofz2" > -->
							<span id="err_head_off2" class="jerror"></span>
							<span class="error"><?php echo e(($errors->has('subsidy_ofz2')) ? $errors->first('subsidy_ofz2') : ''); ?></span></div></div>
						</div>
							</div>
</div>

							<div class="row"  id="direct1">
								<div class="col-sm-12 col-md-12 col-lg-12 "><label><strong>Address Details:</strong></label></div>
							
                                   
                                    
										
										<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Office Address </label>
										<input name="off_address1" tabindex="1" id="off_address1" type="text" class="form-control required" data-error="#err_off_address1" >
										<span id="err_off_address1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span>									
										</div>
										
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>Location Type </label>
										<select  name="location_type1" id="location_type1"  class="form-control  js-example-basic-multiple w-100"  data-error="#err_states" style="width: 100%">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office">Regional Office</option>
										 <option value="Country Office">Country Office</option>
										 <option value="State Office">State Office</option>
										</select>
										
										
										<span id="err_location_type1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('location_type1')) ? $errors->first('location_type1') : ''); ?></span>
										
										</div>
										
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country </label>
										<select tabindex="2" name="country1" id="country1"  class="form-control country  js-example-basic-multiple w-100" data-error="#err_country1" style="width: 100%" >		
									<option value="">Choose Country</option>									
										<?php echo $__env->make('panels.crm.countries', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									 </select>
									 <span id="err_country1" class="jerror">&nbsp;</span>
									 <span class="error"><?php echo e(($errors->has('country1')) ? $errors->first('country1') : ''); ?></span>
										</div>							
									
                                    
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>State </label>
										<select tabindex="3" name="states1" id="states1" class="form-control js-example-basic-multiple states   w-100" data-error="#err_states" style="width: 100%">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('states1')) ? $errors->first('states1') : ''); ?></span>
									</div>
									<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                      <label>City </label><select name="cities1" tabindex="4" id="cities1"  class="form-control js-example-basic-multiple w-100" data-error="#err_cities" style="width: 100%">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('cities1')) ? $errors->first('cities1') : ''); ?></span>                                     
                                    </div>
									
										
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
									<label>Postcode </label>
									<input type="text" tabindex="5"  class="form-control required" name="postcode1" id="postcode1" value="<?php echo e(old('postcode')); ?>" data-error="#err_postcode1">
									<span id="err_postcode1" class="jerror">&nbsp;</span>
									<span class="error"><?php echo e(($errors->has('postcode1')) ? $errors->first('postcode1') : ''); ?></span>
								</div>
									
									<!-- <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label>
									<input tabindex="7" name="contact_number1" id="contact_number1" type="text" class="form-control required" data-error="#err_linked_in" >
										<span id="err_contact_number1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('contact_number1')) ? $errors->first('contact_number1') : ''); ?></span>
										</div> -->
										
										
										<!--<div class="form-group">
                                        <div class="col-sm-12"><label>Subsidiary of</label><input  tabindex="11" type="text" class="form-control required" name="subs_of1[]" id="subs_of1" value="<?php echo e(old('postcode')); ?>" data-error="#subs_of1">
										<span id="subs_of1" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('subs_of1')) ? $errors->first('subs_of1') : ''); ?></span>
										</div>
										
                                         
                                    </div>-->
									
									<!-- <div class="form-group">
                      <div class="col-sm-12"><label>Head Office Location</label>
										
											
											<input type="text" tabindex="13" class="form-control required" style="width:100%; !important" name="head_off1[]" id="head_off1" value="<?php echo e(old('head_off1')); ?>" data-error="#head_off1">
										<span id="err_head_off1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('head_off')) ? $errors->first('head_off') : ''); ?></span>
										</div>
										
                                         
                                    </div> -->
										

										
										
										
									
									
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label>
										<input tabindex="10" name="landline_no" id="landline_no1" type="text" class="form-control required" data-error="#err_landline_no" >
										<span id="err_landline_no1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('landline_no1')) ? $errors->first('landline_no1') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="email1" tabindex="8" id="email1" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1"  class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('email1')) ? $errors->first('email1') : ''); ?></span>
										</div>
										 <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type </label>
										<select  tabindex="9" name="lead_type1" id="lead_type1" class="form-control js-example-basic-multiple w-100" data-error="#err_type" style="width: 100%">
										<option value="">
										 ---Choose---
										 </option>
										 <?php $__currentLoopData = $master_lead_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_l_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($master_l_type->hl_mt_lt_id); ?>" ><?php echo e($master_l_type->hl_lead_type_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										 </select>
										<span id="err_lead_type1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''); ?></span>
										</div>



									
                                     <!--<div class="form-group">
                                        <div class="col-sm-12"><label>Travel Desk Type</label><select class="form-control required" name="desk_type1[]" id="desk_type1" tabindex="12" data-error="#desk_type1">
										 <?php echo $__env->make('panels.crm.travel_desk', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										 </select>
										<span id="err_desk_type1" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('website')) ? $errors->first('desk_type1') : ''); ?></span>
										</div>
										
                                         
                                    </div>-->
									
									 
									
                                       
                             
<div class="col-lg-12 col-md-12 col-sm-12" id="corp_contact_address_form0">
  <div class="row">        
                                        <div class="col-sm-12 col-md-12 col-lg-12 mt-30"> <label><strong>Contact Details: </strong></label></div>


										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation </label>

											<select name="contact_designation[]" id="contact_designation" type="text" class="form-control js-example-basic-multiple w-100" data-error="#err_contact_designation" style="width: 100%">
											<option value="">Choose</option>
											<?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($ConDes->hl_cd_id); ?>"><?php echo e($ConDes->hl_title); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
											<!-- <input name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation" > -->
											<span id="err_contact_designation" style="position: relative;    top: -2px;"></span>
											<span class="error"><?php echo e(($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''); ?></span>
										</div>
                                        	<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Title </label>
<select name="title[]" id="title" type="text" class="form-control js-example-basic-multiple w-100" data-error="#err_title" style="width: 100%"><option value="">Choose Title</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select>
                                        		<!-- <input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" > -->
										<span id="err_contact_person" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?></span>
										</div>
																			
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name </label><input name="first_name[]" id="first_name" type="text" class="form-control required" data-error="#err_first_name" >
										<span id="err_first_name" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('first_name')) ? $errors->first('first_name') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name </label><input name="last_name[]" id="last_name" type="text" class="form-control required" data-error="#err_last_name" >
										<span id="err_last_name" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('last_name')) ? $errors->first('last_name') : ''); ?></span>
										</div>
																				
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="mobile_no[]" id="mobile_no" type="text" class="form-control required" data-error="#err_mobile_no" >
										<span id="err_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label><input name="landline_no[]" id="landline_no" type="text" class="form-control required" data-error="#err_landline_no" >
										<span id="err_landline_no" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('landline_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="email[]" id="email" type="text" class="form-control required" data-error="#err_email" >
										<span id="err_email" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  </label><input name="linkedin_contact[]" id="linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact" >
										<span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype </label><input name="skype_contact[]" id="skype_contact" type="text" class="form-control required" data-error="#err_skype_contact" >
										<span id="err_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input name="dob[]" id="dob" type="date" class="form-control required" data-error="#dob" >
										<span id="err_dob" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('dob')) ? $errors->first('dob') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span>
											<input type="checkbox" name="invite[]" id="event_invite" class="" >Not Eligible for Event Invite </input></span>
										
										</div>


										<div align="right" class="col-sm-12 col-md-12 col-lg-12">
										<button type="button" id="clone_corp_add" class="btn btn-inverse-info btn-icon">
										<i class="fa fa-plus" aria-hidden="true"></i>
										</button>
										</div>

</div>
</div>



                                        </div>
                                       
										
                                </div>	
                               </div>	
								<input type="hidden" id="contact_status_hidden" name="contact_status_hidden"></input>

																		
						 
						
						<div align="right" style="margin-bottom:20px;" class="col-sm-12 col-md-12 col-lg-12">
						</div>
						<div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
					   <!-- <input type="button" class="btn btn-light" style="width:auto" value="Cancel"> -->
					  </div>
					  <div align="right" class="col-12">
									<input style="width:auto;" type="submit" id="saveform1" value="Save" class="btn btn-primary  btn-lg next-btn" style="">
								</div>
						<!---<div class="row">
						
								 
							<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>
							<div  class="col-sm-6 col-md-6 col-lg-6">
							 <a class="btn btn-info btnNext pull-right" >Next</a></div>
							
						</div>-->
						
						</form>
					    </div>
						


						<div class="tab-pane" id="tab03">
						<div class="col-lg-12 cform ">

<h3>Implant Contact:</h3>

<!-- table-expandable -->

						<table class="table table-hover   table-bordered dataTable" id="implant_cont_table"><thead>
						<th>Business Name</th>
						<th>Region</th>						
						<th>Country</th>
						<th>State</th>
						<th>City</th>
						<th>Contact Name</th>
						<th>Contact Mobile</th>
						<th>Designation</th>
						<th>Contact Email</th>
						<th>Sales Manager</th>
						
						</thead>
						<?php $i=1;?>
						<?php $__currentLoopData = $Implant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Subsidy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						<td><?php echo e($Subsidy->hl_business_name); ?></td>
						<td><?php echo e($Subsidy->hl_regional_name); ?></td>						
						<td><?php echo e($Subsidy->countries); ?></td>
						<td><?php echo e($Subsidy->states); ?></td>
						<td><?php echo e($Subsidy->cities); ?></td>
						<td><?php echo e($Subsidy->hl_first_name); ?></td>
						<td><?php echo e($Subsidy->hl_mob_no); ?></td>
						<td><?php echo e($Subsidy->hl_title); ?></td>
						<td><?php echo e($Subsidy->cemail); ?></td>
						<td><?php echo e($Subsidy->fname); ?></td>
						
						</tr>
						<!--<tr>
						<td colspan="9">
<br/>
							<h4>Edit Implant Consortia Contact</h4>
<br/>
				


					<div class="col-sm-12 col-md-12 col-lg-12 "  >
							<div class="row">
								<div class="col-lg-12"><div class="alert alert-success hidden" id="status_<?php echo e($i); ?>"></div></div>
								<div class="col-sm-6  col-md-6 col-lg-6">
									<input type="hidden" name="hl_con_off_add_id_<?php echo e($i); ?>" id="hl_con_off_add_id_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_con_off_add_id); ?>">
									<input type="hidden" name="hl_cons_m_id_<?php echo e($i); ?>" id="hl_cons_m_id_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_cons_m_id); ?>">
									
									<div style=""><label>Select Agent </label>									
									<select name="subsidy1_<?php echo e($i); ?>" id="subsidy1_<?php echo e($i); ?>" class="form-control required">
									<option value="">Select Agent</option>
											<?php if($Hotelagentcontactbasic): ?>
											<?php $__currentLoopData = $Hotelagentcontactbasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Hotelagentcontactbasics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($Hotelagentcontactbasics->hl_agentcont_id); ?>" <?php if($Hotelagentcontactbasics->hl_agentcont_id == $Subsidy->hl_agent_m_id): ?> selected="selected" <?php endif; ?>><?php echo e($Hotelagentcontactbasics->hl_business_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									</select>
									<span id="err_subsidy1"  class="jerror"></span>
									<span class="error"><?php echo e(($errors->has('subsidy1')) ? $errors->first('subsidy1') : ''); ?></span>
									</div>
								</div>
								<div class="col-sm-6  col-md-6 col-lg-6 ">
									
								</div>

								<div class="col-sm-12  col-md-12 col-lg-12 form-group" style="margin-top: 30px;">
								<label><strong>Address *</strong></label>
								</div>
								

								
								<div class="col-sm-12 col-md-6 col-lg-6  form-group">

	<label>Office Address *</label>
	<input name="ic_off_address1_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_ofz_address); ?>" tabindex="1" id="ic_off_address1_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_off_address1" >
										<span id="err_ic_off_address1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_address1')) ? $errors->first('ic_address1') : ''); ?></span>
										
										</div>
										
									<div class="col-sm-12 col-md-6 col-lg-6" ><label>Location Type </label>
										<select tabindex="6" name="ic_location_type1_<?php echo e($i); ?>" id="ic_location_type1_<?php echo e($i); ?>"  class="form-control states required" data-error="#err_ic_states">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office" <?php if($Subsidy->hl_loc_type=="Regional Office"): ?> selected="selected" <?php endif; ?>>Regional Office</option>
										 <option value="Country Office" <?php if($Subsidy->hl_loc_type=="Country Office"): ?> selected="selected" <?php endif; ?>>Country Office</option>
										 <option value="State Office" <?php if($Subsidy->hl_loc_type=="State Office"): ?> selected="selected" <?php endif; ?>>State Office</option>
										</select>
										
										
										<span id="err_ic_location_type1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_location_type1')) ? $errors->first('ic_location_type1') : ''); ?></span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select tabindex="2" name="ic_country1_<?php echo e($i); ?>" id="ic_country1_<?php echo e($i); ?>"  class="form-control country required" data-error="#err_ic_country1" >		
									<option value="">Choose Country</option>
									 <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($coun->id); ?>" <?php if($Subsidy->hl_country==$coun->id): ?> selected="selected" <?php endif; ?>><?php echo e($coun->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									 </select>
									 <span id="err_ic_country1" class="jerror">&nbsp;</span>
									 <span class="error"><?php echo e(($errors->has('ic_country1')) ? $errors->first('ic_country1') : ''); ?></span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States *</label>
										<select tabindex="3" name="ic_states1_<?php echo e($i); ?>" id="ic_states1_<?php echo e($i); ?>" class="form-control states required" data-error="#err_ic_states">
										<option value="">
										 ---Choose---
										 </option>
											<?php $__currentLoopData = $editstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($Subsidy->hl_country==$states->country_id): ?>
											<option value="<?php echo e($states->id); ?>" <?php if($Subsidy->hl_state==$states->id): ?> selected="selected" <?php endif; ?>><?php echo e($states->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										 
									 </select>									 
									 <span id="err_ic_states1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_states1')) ? $errors->first('ic_states1') : ''); ?></span>
										</div>
									
										<div class="col-sm-12 col-md-6 col-lg-6"><label>City *</label><select name="ic_cities1_<?php echo e($i); ?>" tabindex="4" id="ic_cities1_<?php echo e($i); ?>"  class="form-control required" data-error="#err_ic_cities">		
										<option value="">
										 ---Choose---
										 </option>
											<?php $__currentLoopData = $editcities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($Subsidy->hl_state==$cities->state_id): ?>
											<option value="<?php echo e($cities->id); ?>" <?php if($Subsidy->hl_city==$cities->id): ?> selected="selected" <?php endif; ?>><?php echo e($cities->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										 
									 </select>									 
                                     <span id="err_ic_cities1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_cities1')) ? $errors->first('ic_cities1') : ''); ?></span>
										</div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
					<label>Postcode *</label><input type="text" tabindex="5"  class="form-control required" name="ic_postcode1_<?php echo e($i); ?>" id="ic_postcode1_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_postcode); ?>" data-error="#err_ic_postcode1">
										<span id="err_ic_postcode1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_postcode1')) ? $errors->first('ic_postcode1') : ''); ?></span>   
                                    </div>

																		
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label><input tabindex="10" name="ic_landline_no1_<?php echo e($i); ?>" id="ic_landline_no1_<?php echo e($i); ?>" type="text" class="form-control required" value="<?php echo e($Subsidy->hl_ofz_no); ?>" data-error="#err_ic_landline_no" >
										<span id="err_ic_landline_no1" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_landline_no1')) ? $errors->first('ic_landline_no1') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="ic_email1_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_email); ?>" tabindex="8" id="ic_email1_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1"  class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('ic_email1')) ? $errors->first('ic_email1') : ''); ?></span>
										</div>


<div class="col-sm-12 col-md-12 col-lg-12 form-group"><label><strong>Contact Details *</strong></label></div>

							<div class="col-sm-12 col-md-6 col-lg-6  form-group">
											
											<label>Title *</label>
<select name="ic_title_<?php echo e($i); ?>" id="ic_title_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_ic_title_<?php echo e($i); ?>"   ><option value="">Choose Title</option><option value="Mr" <?php if($Subsidy->hl_title=="Mr"): ?> selected="selected" <?php endif; ?>>Mr</option><option value="Mrs"  <?php if($Subsidy->hl_title=="Mrs"): ?> selected="selected" <?php endif; ?>>Mrs</option></select>

											
											<span id="err_ic_title_<?php echo e($i); ?>"  style="position: relative; top: -2px;"></span>
											<span class="error"><?php echo e(($errors->has('ic_title')) ? $errors->first('ic_title') : ''); ?></span>
											
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation *</label>
										<select name="ic_contact_designation_<?php echo e($i); ?>" id="ic_contact_designation_<?php echo e($i); ?>" class="form-control required" data-error="#err_ic_contact_designation_<?php echo e($i); ?>">
										<option value="">Choose</option>
										<?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($ConDes->hl_cd_id); ?>" <?php if($ConDes->hl_cd_id==$Subsidy->hl_cont_design): ?> selected="selected" <?php endif; ?>><?php echo e($ConDes->hl_title); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>

										
										<span id="err_ic_contact_designation_<?php echo e($i); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_contact_designation')) ? $errors->first('ic_contact_designation') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name *</label><input name="ic_first_name_<?php echo e($i); ?>" id="ic_first_name_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_ic_first_name_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_first_name); ?>" >
										<span id="err_ic_first_name_<?php echo e($i); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_first_name')) ? $errors->first('ic_first_name') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name *</label><input name="ic_last_name_<?php echo e($i); ?>" id="ic_last_name_<?php echo e($i); ?>" value="<?php echo e($Subsidy->hl_last_name); ?>" type="text" class="form-control required" data-error="#err_ic_last_name_<?php echo e($i); ?>" >
										<span id="err_ic_last_name_<?php echo e($i); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_last_name')) ? $errors->first('ic_last_name') : ''); ?></span>
										</div>
										
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number*</label><input name="ic_mobile_no_<?php echo e($i); ?>" id="ic_mobile_no_<?php echo e($i); ?>" type="text" class="form-control required" value="<?php echo e($Subsidy->hl_mob_no); ?>" data-error="#err_ic_mobile_no_<?php echo e($i); ?>" >
										<span id="err_ic_mobile_no_<?php echo e($i); ?>" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_mobile_no')) ? $errors->first('ic_mobile_no') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number*</label><input value="<?php echo e($Subsidy->hl_clandline_no); ?>" name="ic_clandline_no_<?php echo e($i); ?>" id="ic_clandline_no_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_ic_clandline_no_<?php echo e($i); ?>" >
										<span id="err_ic_clandline_no_<?php echo e($i); ?>" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_clandline_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input value="<?php echo e($Subsidy->hl_email); ?>" name="ic_cemail_<?php echo e($i); ?>" id="ic_cemail_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_ic_cemail_<?php echo e($i); ?>" >
										<span id="err_ic_cemail_<?php echo e($i); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_cemail')) ? $errors->first('ic_cemail') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  *</label><input value="<?php echo e($Subsidy->hl_linked_in); ?>" name="ic_linkedin_contact_<?php echo e($i); ?>" id="ic_linkedin_contact_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_ic_linkedin_contact_<?php echo e($i); ?>" >
										<span id="err_ic_linkedin_contact_<?php echo e($i); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_linkedin_contact')) ? $errors->first('ic_linkedin_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype *</label><input value="<?php echo e($Subsidy->hl_skype); ?>" name="ic_skype_contact_<?php echo e($i); ?>" id="ic_skype_contact_<?php echo e($i); ?>" type="text" class="form-control required" data-error="#err_ic_skype_contact_<?php echo e($i); ?>" >
										<span id="err_ic_skype_contact_<?php echo e($i); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_skype_contact')) ? $errors->first('ic_skype_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input value="<?php echo e($Subsidy->hl_dob); ?>" name="ic_dob_<?php echo e($i); ?>" id="ic_dob_<?php echo e($i); ?>" type="date" class="form-control required" data-error="#ic_dob_<?php echo e($i); ?>" >
										<span id="err_ic_dob_<?php echo e($i); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('ic_dob')) ? $errors->first('ic_dob') : ''); ?></span>
										</div>







								</div>
<div align="right" class="col-md-12 col-lg-12">
<input style="width:auto;" id="<?php echo e($i); ?>" type="submit"  value="Update" class="btn btn-primary UpdateConsortia  next-btn" style="">
</div>


								
							</div>
				

					</td>
						</tr>-->
						<?php $i++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
						
<div class="col-md-12 col-lg-12" style="height: 50px">&nbsp;</div>

						<h3>Outplant Contact:</h3>

<!-- table-expandable -->

						<table class="table table-hover   table-bordered dataTable" id="outplant_cont_table"><thead>
						<th>Business Name</th>	
						<th>Region</th>						
						<th>Country</th>
						<th>State</th>
						<th>City</th>
						<th>Contact Name</th>
						<th>Contact Mobile</th>
						<th>Designation</th>
						<th>Contact Email</th>
						<th>Sales Manager</th>
						</thead>
						<?php $j=1;?>
						<?php $__currentLoopData = $Outplant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Outp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						<td><?php echo e($Outp->hl_business_name); ?></td>
						<td><?php echo e($Outp->hl_regional_name); ?></td>						
						<td><?php echo e($Outp->countries); ?></td>
						<td><?php echo e($Outp->states); ?></td>
						<td><?php echo e($Outp->cities); ?></td>
						<td><?php echo e($Outp->hl_first_name); ?></td>
						<td><?php echo e($Outp->hl_mob_no); ?></td>
						<td><?php echo e($Outp->hl_title); ?></td>
						<td><?php echo e($Outp->cemail); ?></td>
						<th><?php echo e($Outp->fname); ?></th>
						</tr>
						<!--<tr>
						<td colspan="9">
<br/>
							<h4>Edit Outplant Consortia Contact</h4>
<br/>

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12  form-group">
<h5>Agent Regional Office Location</h5>
</div>
<input type="hidden" name="headOffce_id_<?php echo e($j); ?>" id="headOffce_id_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_regl_id); ?>">
<input type="hidden" name="agent_id_<?php echo e($j); ?>" id="agent_id_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_corcont_id); ?>">

	<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Select Head Office *</label>
                                   		<select name="head_off1_<?php echo e($j); ?>_[]" id="head_off1_<?php echo e($j); ?>" class="form-control">
                                   			<option value="">Select Heade office</option>
                                   			<?php if($Hotelagentcontactbasic): ?>
                                   			<?php $__currentLoopData = $Hotelagentcontactbasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Hotelagentcontactbasics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   			<option value="<?php echo e($Hotelagentcontactbasics->hl_agentcont_id); ?>" <?php if($Outp->hl_cor_basic_id==$Hotelagentcontactbasics->hl_agentcont_id): ?> selected="selected" <?php endif; ?>><?php echo e($Hotelagentcontactbasics->hl_business_name); ?></option>
                                   			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   			<?php endif; ?>
                                   		</select>
                                   		
										<span id="err_address1_<?php echo e($j); ?>" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span>
										
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>IATA/ARC/TIDS/CLIA/TRUE Number *</label>
										
										<input name="iata_number_<?php echo e($j); ?>_[]" id="iata_number1_<?php echo e($j); ?>" type="text" class="form-control required" value="<?php echo e($Outp->iata_number); ?>" data-error="#err_iata_number1" >
										
										<span id="err_iata_number_<?php echo e($j); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
										</div>
										
                                  
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Office Address *</label><input name="off_address1_<?php echo e($j); ?>_[]" id="off_address1_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_address1_<?php echo e($j); ?>"  value="<?php echo e($Outp->hl_ofz_address); ?>">
										<span id="err_address1_<?php echo e($j); ?>" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span>
										
										</div>
										
										
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select name="country1_<?php echo e($j); ?>_[]" id="country1_<?php echo e($j); ?>"  class="form-control country required" data-error="#err_country1_<?php echo e($j); ?>" >		
									<option value="">Choose Country</option>									
										<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($coun->id); ?>" <?php if($Outp->hl_country==$coun->id): ?> selected="selected" <?php endif; ?>><?php echo e($coun->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									 </select>
									 <span id="err_country1_<?php echo e($j); ?>" style="position:relative;top: -2px;"></span>
									 <span class="error"><?php echo e(($errors->has('country1')) ? $errors->first('country1') : ''); ?></span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States *</label><select name="states1_<?php echo e($j); ?>_[]" id="states1_<?php echo e($j); ?>" class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
										 <?php $__currentLoopData = $editstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($Outp->hl_country==$states->country_id): ?>
											<option value="<?php echo e($states->id); ?>" <?php if($Outp->hl_state==$states->id): ?> selected="selected" <?php endif; ?>><?php echo e($states->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('states1')) ? $errors->first('states1') : ''); ?></span>
									</div>
									
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City *</label><select name="cities1_<?php echo e($j); ?>_[]" id="cities1_<?php echo e($j); ?>"  class="form-control required" data-error="#err_cities1_<?php echo e($j); ?>">		
										<option value="">
										 ---Choose---
										 </option>
										 <?php $__currentLoopData = $editcities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($Outp->hl_state==$cities->state_id): ?>
											<option value="<?php echo e($cities->id); ?>" <?php if($Outp->hl_city==$cities->id): ?> selected="selected" <?php endif; ?>><?php echo e($cities->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									 </select>									 
                                     <span id="err_cities1_<?php echo e($j); ?>" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('cities1')) ? $errors->first('cities1') : ''); ?></span>
                                       
                                    </div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Postcode *</label><input type="text" class="form-control required" name="postcode1_<?php echo e($j); ?>_[]" id="postcode1_<?php echo e($j); ?>" value="<?php echo e(old('postcode')); ?>" data-error="#err_postcode1_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_postcode); ?>">
										<span id="err_postcode1_<?php echo e($j); ?>" style="position:relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('postcode1')) ? $errors->first('postcode1') : ''); ?></span>
										</div>
										
										
							
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>Location Type *</label>
										<select name="location_type_<?php echo e($j); ?>_[]" id="location_type_<?php echo e($j); ?>"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office" <?php if($Outp->hl_loc_type == "Regional Office"): ?> selected="selected" <?php endif; ?>>Regional Office</option>
										 <option value="Country Office" <?php if($Outp->hl_loc_type == "Country Office"): ?> selected="selected" <?php endif; ?>>Country Office</option>
										</select>
										
										
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
										</div>
										
									
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Office Number*</label><input name="contact_number1_<?php echo e($j); ?>_[]" id="contact_number1_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_contact_number1_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_ofz_no); ?>" >
										<span id="err_contact_number1_<?php echo e($j); ?>" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('contact_number')) ? $errors->first('contact_number') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="email1_<?php echo e($j); ?>_[]" id="email1_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_email1_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_email); ?>">
										<span id="err_email1_<?php echo e($j); ?>" style="position: relative;
    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('contact_email')) ? $errors->first('contact_email') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type *</label><select name="lead_type1_<?php echo e($j); ?>" id="lead_type1_<?php echo e($j); ?>" class="form-control required" data-error="#err_type1_<?php echo e($j); ?>" >
										<option value="">
										 ---Choose---
										 </option>
											<?php $__currentLoopData = $master_lead_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_l_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($master_l_type->hl_mt_lt_id); ?>"  
												<?php if($Outp->hl_lead_type == $master_l_type->hl_mt_lt_id): ?> selected="selected" <?php endif; ?>><?php echo e($master_l_type->hl_lead_type_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										 </select>
										<span id="err_type1_<?php echo e($j); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''); ?></span>
										</div>
										
										


	<div class="col-sm-12 col-md-12 col-lg-12  form-group">
<h5>Agent Contact </h5>
</div>

	<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Select Office  *</label>
                                   		<select name="head_off2_<?php echo e($j); ?>_[]" id="head_off2_<?php echo e($j); ?>" class="form-control">
                                   			<option value="">Select Office Location</option>
                                   			<?php if($regionalLocations): ?>
                                   			<?php $__currentLoopData = $regionalLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regionalLocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   			<option value="<?php echo e($regionalLocation->hl_regl_id); ?>" <?php if($Outp->hl_agentcont_id==$regionalLocation->hl_regl_id): ?> selected="selected" <?php endif; ?>><?php echo e($regionalLocation->hl_ofz_address); ?> -- <?php echo e($regionalLocation->name); ?></option>
                                   			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   			<?php endif; ?>
                                   		</select>
                                   		
										<span id="err_head_off2" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span>
										
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation *</label>
										<select name="contact_designation_<?php echo e($j); ?>_[]" id="contact_designation_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_contact_designation">
										<option value="">Choose</option>
										<?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($ConDes->hl_cd_id); ?>" <?php if($ConDes->hl_cd_id==$Outp->hl_cont_design): ?> selected="selected" <?php endif; ?>><?php echo e($ConDes->hl_title); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										<span id="err_contact_designation_<?php echo e($j); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''); ?></span>
										</div>
                                     
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><div style=""><label>Title *</label>
<select name="title_<?php echo e($j); ?>_[]" id="title_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_title"><option value="">Choose Title</option><option value="Mr" <?php if($Outp->hl_title=='Mr'): ?> selected="selected" <?php endif; ?>>Mr</option><option value="Mrs" <?php if($Outp->hl_title=='Mrs'): ?> selected="selected" <?php endif; ?>>Mrs</option><option value="Ms" <?php if($Outp->hl_title=='Ms'): ?> selected="selected" <?php endif; ?>>Mr</option></select>
											
										<span id="err_title_<?php echo e($j); ?>" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?></span>
										</div>
										</div>
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name *</label><input name="first_name_<?php echo e($j); ?>_[]" id="first_name_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_first_name_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_first_name); ?>">
										<span id="err_first_name_<?php echo e($j); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('first_name')) ? $errors->first('first_name') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name *</label><input name="last_name_<?php echo e($j); ?>_[]" id="last_name_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_last_name" value="<?php echo e($Outp->hl_last_name); ?>">
										<span id="err_last_name_<?php echo e($j); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('last_name')) ? $errors->first('last_name') : ''); ?></span>
										</div>
										
										
										
								
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="mobile_no_<?php echo e($j); ?>_[]" id="mobile_no_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_mobile_no_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_mob_no); ?>">
										<span id="err_mobile_no_<?php echo e($j); ?>" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="email_<?php echo e($j); ?>_[]" id="email_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_email_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_email); ?>">
										<span id="err_email_<?php echo e($j); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn Contact </label><input name="linkedin_contact_<?php echo e($j); ?>_[]" id="linkedin_contact_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_linkedin_contact_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_linked_in); ?>">
										<span id="err_linkedin_contact_<?php echo e($j); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype Contact </label><input name="skype_contact_<?php echo e($j); ?>_[]" id="skype_contact_<?php echo e($j); ?>" type="text" class="form-control required" data-error="#err_skype_contact" value="<?php echo e($Outp->hl_skype); ?>">
										<span id="err_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth </label><input name="dob_<?php echo e($j); ?>_[]" id="dob_<?php echo e($j); ?>" type="date" class="form-control required" data-error="#dob_<?php echo e($j); ?>" value="<?php echo e($Outp->hl_dob); ?>">
										<span id="err_dob_<?php echo e($j); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('dob')) ? $errors->first('dob') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span><input type="checkbox" id="event_invite_<?php echo e($j); ?>" name="event_invite_<?php echo e($j); ?>" class="" <?php if($Outp->hl_event_invite=='Yes'): ?> checked="checked" <?php endif; ?>>Not Eligible for event invite </input></span>
										
										</div>
										
	
	<div align="right" class="col-md-12 col-lg-12">
									<input style="width:auto;" type="submit"  id="<?php echo e($j); ?>" value="Update" class="btn btn-primary outplant  next-btn" style="">
								</div>
</div>

</td>
</tr>-->
<?php $j++;?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
						</div>
						</div>



						<div class="tab-pane" id="tab02">
						 <form id="commentForm2" action="<?php echo e(url('crm/corcontact_added')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
						  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

						<div id="contactnew_section">
						 <div class="col-lg-12 cform" id="corporate_contactnew_form0">
<!-- table-expandable -->
						 <table class="table table-hover   table-bordered dataTable" id="corp_cont_table"><thead>
					
						<th>Region</th>						
						<th>Country</th>
						<th>State</th>
						<th>City</th>
						<th>Contact Name</th>
						<th>Contact Mobile</th>
						<th>Designation</th>
						<th>Contact Email</th>
						<th>Sales Manager</th>
						</thead>
						<?php if($CorporateContact): ?>
						<?php $k=1;?>
						<?php $__currentLoopData = $CorporateContact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CorporateContacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						
						<td><?php echo e($CorporateContacts->hl_regional_name); ?></td>						
						<td><?php echo e($CorporateContacts->countries); ?></td>
						<td><?php echo e($CorporateContacts->states); ?></td>
						<td><?php echo e($CorporateContacts->cities); ?></td>
						<td><?php echo e($CorporateContacts->hl_first_name); ?></td>
						<td><?php echo e($CorporateContacts->hl_mob_no); ?></td>
						<td><?php echo e($CorporateContacts->hl_title); ?></td>
						<td><?php echo e($CorporateContacts->cemail); ?></td>
						<td><?php echo e($CorporateContacts->fname); ?></td>

						</tr>

						<!--<tr><td colspan="9">
							<h4>Edit Corporate Contact</h4>
							<div class="row"  id="direct1">
								<div class="col-sm-12 col-md-12 col-lg-12 " style="margin-top: 20px"><label><strong>Address Details:</strong></label></div>
							
                                   <input type="hidden" name="cc_off_main_id" id="cc_off_main_id_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_regl_id); ?>">
                                   <input type="hidden" name="cc_c_main_id" value="<?php echo e($CorporateContacts->hl_corcont_id); ?>" id="cc_c_main_id_cc<?php echo e($k); ?>">
                                    
										
										<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Office Address *</label>
										<input name="off_address1_cc<?php echo e($k); ?>" tabindex="1" id="off_address1_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_off_address1_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_ofz_address); ?>" >
										<span id="err_off_address1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span>									
										</div>
										
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>Location Type </label>
										<select tabindex="6" name="location_type1_cc<?php echo e($k); ?>" id="location_type1_cc<?php echo e($k); ?>"  class="form-control states required" data-error="#location_type1_cc<?php echo e($k); ?>">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office" <?php if($CorporateContacts->hl_loc_type=='Regional Office'): ?> selected="selected" <?php endif; ?>>Regional Office</option>
										 <option value="Country Office" <?php if($CorporateContacts->hl_loc_type=='Country Office'): ?> selected="selected" <?php endif; ?>>Country Office</option>
										 <option value="State Office" <?php if($CorporateContacts->hl_loc_type=='State Office'): ?> selected="selected" <?php endif; ?>>State Office</option>
										</select>
										
										
										<span id="err_location_type1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('location_type1')) ? $errors->first('location_type1') : ''); ?></span>
										
										</div>
										
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select tabindex="2" name="country1_cc<?php echo e($k); ?>" id="country1_cc<?php echo e($k); ?>"  class="form-control country required" data-error="#err_country1_cc<?php echo e($k); ?>" >		
									<option value="">Choose Country</option>									
										<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($coun->id); ?>" <?php if($CorporateContacts->hl_country==$coun->id): ?> selected="selected" <?php endif; ?>><?php echo e($coun->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									 </select>
									 <span id="err_country1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
									 <span class="error"><?php echo e(($errors->has('country1')) ? $errors->first('country1') : ''); ?></span>
										</div>							
									
                                    
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States *</label>
										<select tabindex="3" name="states1_cc<?php echo e($k); ?>" id="states1_cc<?php echo e($k); ?>" class="form-control states required" data-error="#err_states1_cc<?php echo e($k); ?>">
										<?php $__currentLoopData = $editstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($CorporateContacts->hl_country==$states->country_id): ?>
											<option value="<?php echo e($states->id); ?>" <?php if($CorporateContacts->hl_state==$states->id): ?> selected="selected" <?php endif; ?>><?php echo e($states->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									 </select>									 
									 <span id="err_states1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('states1')) ? $errors->first('states1') : ''); ?></span>
									</div>
									<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                      <label>City *</label><select name="cities1_cc<?php echo e($k); ?>" tabindex="4" id="cities1_cc<?php echo e($k); ?>"  class="form-control required" data-error="#err_cities1_cc<?php echo e($k); ?>">		
										<?php $__currentLoopData = $editcities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($CorporateContacts->hl_state==$cities->state_id): ?>
											<option value="<?php echo e($cities->id); ?>" <?php if($CorporateContacts->hl_city==$cities->id): ?> selected="selected" <?php endif; ?>><?php echo e($cities->name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									 </select>									 
                                     <span id="err_cities1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('cities1')) ? $errors->first('cities1') : ''); ?></span>                                     
                                    </div>
									
										
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
									<label>Postcode *</label>
									<input type="text" tabindex="5"  class="form-control required" name="postcode1_cc<?php echo e($k); ?>" id="postcode1_cc<?php echo e($k); ?>" value="<?php echo e(old('postcode')); ?>" data-error="#err_postcode1" value="<?php echo e($CorporateContacts->hl_ofz_no); ?>">
									<span id="err_postcode1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
									<span class="error"><?php echo e(($errors->has('postcode1')) ? $errors->first('postcode1') : ''); ?></span>
								</div>
									
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label>
										<input tabindex="10" name="landline_no1_cc<?php echo e($k); ?>" id="landline_no1_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_landline_no1_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_ofz_no); ?>">
										<span id="err_landline_no1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('landline_no1')) ? $errors->first('landline_no1') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="email1_cc<?php echo e($k); ?>" tabindex="8" id="email1_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_email1_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->remail); ?>">
										<span id="err_email1_cc<?php echo e($k); ?>"  class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('email1')) ? $errors->first('email1') : ''); ?></span>
										</div>
										 <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type *</label>
										<select  tabindex="9" name="lead_type1_cc<?php echo e($k); ?>" id="lead_type1_cc<?php echo e($k); ?>" class="form-control required" data-error="#err_lead_type1_cc<?php echo e($k); ?>" >
										<option value="">
										 ---Choose---
										 </option>
										<?php $__currentLoopData = $master_lead_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_l_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($master_l_type->hl_mt_lt_id); ?>" <?php if($CorporateContacts->hl_lead_type==$master_l_type->hl_mt_lt_id): ?> selected="selected" <?php endif; ?>><?php echo e($master_l_type->hl_lead_type_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										 </select>
										<span id="err_lead_type1_cc<?php echo e($k); ?>" class="jerror">&nbsp;</span>
										<span class="error"><?php echo e(($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''); ?></span>
										</div>
									
                              

                                       


                                        <div class="col-sm-12 col-md-12 col-lg-12"> <label><strong>Contact Details:</strong></label></div>



                                        	<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Title *</label>
<select name="title_cc<?php echo e($k); ?>_[]" id="title_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_title_cc<?php echo e($k); ?>" ><option value="">Choose Title</option><option value="Mr" <?php if($CorporateContacts->hl_title=='Mr'): ?> selected="selected" <?php endif; ?>>Mr</option><option value="Mrs" <?php if($CorporateContacts->hl_title=='Mrs'): ?> selected="selected" <?php endif; ?>>Mrs</option><option value="Ms" <?php if($CorporateContacts->hl_title=='Ms'): ?> selected="selected" <?php endif; ?>>Ms</option></select>
										<span id="err_title_cc<?php echo e($k); ?>" style="position: relative; top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation *</label>

											<select name="contact_designation_cc<?php echo e($k); ?>_[]" id="contact_designation_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_contact_designation_cc<?php echo e($k); ?>">
												<option value="">Choose</option>
												<?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($ConDes->hl_cd_id); ?>" <?php if($CorporateContacts->hl_cont_design==$ConDes->hl_cd_id): ?> selected="selected" <?php endif; ?> ><?php echo e($ConDes->hl_title); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
											
										<span id="err_contact_designation_cc<?php echo e($k); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''); ?></span>
										</div>										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name *</label><input name="first_name_cc<?php echo e($k); ?>_[]" id="first_name_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_first_name_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_first_name); ?>">
										<span id="err_first_name_cc<?php echo e($k); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('first_name')) ? $errors->first('first_name') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name *</label><input name="last_name_cc<?php echo e($k); ?>_[]" id="last_name_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_last_name_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_last_name); ?>">
										<span id="err_last_name_cc<?php echo e($k); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('last_name')) ? $errors->first('last_name') : ''); ?></span>
										</div>
										
										
										
										
<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="mobile_no_cc<?php echo e($k); ?>_[]" id="mobile_no_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_mobile_no_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_mob_no); ?>">
										<span id="err_mobile_no_cc<?php echo e($k); ?>" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Landline Number</label><input name="landline_no_cc<?php echo e($k); ?>_[]" id="landline_no_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_landline_no_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_clandline_no); ?>">
										<span id="err_landline_no_cc<?php echo e($k); ?>" style="position: relative;
										top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('landline_no')) ? $errors->first('mobile_no') : ''); ?></span>
										</div>
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="cemail_cc<?php echo e($k); ?>_[]" id="cemail_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_cemail_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->cemail); ?>">
										<span id="err_cemail_cc<?php echo e($k); ?>" style="position: relative;    top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn  </label><input name="linkedin_contact_cc<?php echo e($k); ?>_[]" id="linkedin_contact_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_linkedin_contact_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_linked_in); ?>">
										<span id="err_linkedin_contact_cc<?php echo e($k); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype </label><input name="skype_contact_cc<?php echo e($k); ?>_[]" id="skype_contact_cc<?php echo e($k); ?>" type="text" class="form-control required" data-error="#err_skype_contact_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_skype); ?>">
										<span id="err_skype_contact_cc<?php echo e($k); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''); ?></span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth</label><input name="dob_cc<?php echo e($k); ?>_[]" id="dob_cc<?php echo e($k); ?>" type="date" class="form-control required" data-error="#dob_cc<?php echo e($k); ?>" value="<?php echo e($CorporateContacts->hl_dob); ?>">
										<span id="err_dob_cc<?php echo e($k); ?>" style="position: relative;top: -2px;"></span>
										<span class="error"><?php echo e(($errors->has('dob')) ? $errors->first('dob') : ''); ?></span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span>
											<input type="checkbox" name="invite_cc<?php echo e($k); ?>_[]" id="event_invite_cc<?php echo e($k); ?>" class="" value="Yes" <?php if($CorporateContacts->hl_event_invite=='Yes'): ?> selected="selected" <?php endif; ?> >Not Eligible for event invite </input></span>
										
										</div>



  <div  class="col-12 text-right">
									<input style="width:auto;" type="submit" id="saveform1" value="Update" class="btn btn-primary  next-btn" style="">
								</div>

                                        </div>	
						
					  
						</td></tr> -->
						<?php $k++;?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						</table>


                                        </div>
										
										
										
                                </div>	
								
							
					 </form>
                               </div>	
								
																		
						
						
						
						
					    </div>
					
				</div>
					
                         
            
	
          
                                                      
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
//Update Consordia Contact
 // $(function () {
 // $('select#subsidy_m_off').multiselect({
	// 							columns:2,
	// 							placeholder: 'subsidy of',
	// 							search: true,
	// 							searchOptions: {
	// 								'default': 'Search subsidy'
	// 							},
	// 							selectAll: true
	// 						});
 // });


$('body').on('click','.UpdateConsortia', function(el) 
{
	var CSRF_TOKEN = "<?php echo e(csrf_token()); ?>";
	var id = $(this); 
	var idvalue = $(this).attr("id"); 
var hl_con_off_add_id=$('#hl_con_off_add_id_'+idvalue).val();
		var hl_cons_m_id=$('#hl_cons_m_id_'+idvalue).val();
		var hl_agent_m_id=$('#subsidy1'+idvalue).val();
		var hl_ofz_address=$('#ic_off_address1_'+idvalue).val();					
		var hl_country=$('#ic_country1_'+idvalue).val();					
		var hl_state=$('#ic_states1_'+idvalue).val();
		var hl_city=$('#ic_cities1_'+idvalue).val();
		var hl_postcode=$('#ic_postcode1_'+idvalue).val();
		var hl_ofz_no=$('#ic_contact_number1_'+idvalue).val();
		var hl_loc_type=$('#ic_location_type1_'+idvalue).val();
		var hl_email=$('#ic_email1_'+idvalue).val();
		var hl_title=$('#ic_title_'+idvalue).val();					
		var hl_first_name=$('#ic_first_name_'+idvalue).val();				
		var hl_last_name=$('#ic_last_name_'+idvalue).val();
		var hl_cont_design=$('#ic_contact_designation_'+idvalue).val();
		var hl_mob_no=$('#ic_mobile_no_'+idvalue).val();
		var hl_clandline_no=$('#ic_clandline_no_'+idvalue).val();
		var hl_email=$('#ic_cemail_'+idvalue).val();
		var hl_linked_in=$('#ic_linked_in_'+idvalue).val();
		var hl_skype=$('#ic_skype_'+idvalue).val();
var hl_dob=$('#ic_dob_'+idvalue).val();


		var params={
		'idvalue':idvalue,	
		'hl_con_off_add_id':hl_con_off_add_id,
		'hl_cons_m_id':hl_cons_m_id,
		'hl_agent_m_id':hl_agent_m_id,
		'hl_ofz_address':hl_ofz_address,					
		'hl_country':hl_country,					
		'hl_state':hl_state,
		'hl_city':hl_city,
		'hl_postcode':hl_postcode,
		'hl_ofz_no':hl_ofz_no,
		'hl_loc_type':hl_loc_type,
		'hl_email':hl_email,
		'hl_title':hl_title,					
		'hl_first_name':hl_first_name,					
		'hl_last_name':hl_last_name,
		'hl_cont_design':hl_cont_design,
		'hl_mob_no':hl_mob_no,
		'hl_clandline_no':hl_clandline_no,
		'hl_email':hl_email,
		'hl_linked_in':hl_linked_in,
		'hl_skype':hl_skype,
		'hl_dob':hl_dob,'_token':CSRF_TOKEN
	}

	
	var host="<?php echo e(url('crm/updateConsordiaImplant/')); ?>";	
	$.ajax({
		type: 'POST',
		data:params,
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(res){
        $('.image_loader').hide();
        },success:
		function (res){
			ConsordiaImplant(res);

			function ConsordiaImplant(res){
			
					
					$('#status_'+res.view_details.id).html('<p>'+res.view_details.status+'</p>').removeClass('hidden');

			  // $.each(res.view_details, function(index, data) {
			   //	console.log('Status'+data);
			   //		console.log('ID'+data);

			  //  		$(".alert-success").html(res.delete_details.deletedtatus).removeClass('hidden');

				 //  if (data=='success') {
				 //  	alert('Update successfully')
					// $('#status_'+data.id).html('<p>'+data.status+'</p>');
					// $('#status_'+data.id).removeClass('hidden');

				 //  }else {
					// $('#status_'+data.id).html('<p>'+data.status+'</p>');
					// $('#status_'+data.id).removeClass('hidden');
				 //  };
				//});   
			}
		}		
	  
	
	})
	return false;
	
});

// Get States
 $(document).on("change", "#h_country", getstates);
	function getstates(){
		
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('crm/getstates/')); ?>";	
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

// Get States
 
function rendergetstates(res){
		
       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }	
	  
// Implant

// Get States
$(document).on("change", "#ic_country1", ic_getstates1);
	function ic_getstates1(){
		
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('crm/getstates/')); ?>";	
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
        },success:ic_rendergetstates1
	
	})
	return false;
}

// Get States
 
function ic_rendergetstates1(res){
		
       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#ic_states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#ic_states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }	
	  


	  $(document).on("change", "#ic_states1", ic_getcities1);
	function ic_getcities1(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('crm/getcities')); ?>";	
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
        },success:ic_rendergetcities1
	
	})
	return false;
}
function ic_rendergetcities1(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#ic_cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#ic_cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }



// Get States
$(document).on("change", "#country1", getstates1);
	function getstates1(){
		
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('crm/getstates/')); ?>";	
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
        },success:rendergetstates1
	
	})
	return false;
}

// Get States
 
function rendergetstates1(res){
		
       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#states1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }	
	  


	  $(document).on("change", "#states1", getcities1);
	function getcities1(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('crm/getcities')); ?>";	
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
        },success:rendergetcities1
	
	})
	return false;
}
function rendergetcities1(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#cities1').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
	  }
	  

$('body').on('change','country', function(el) 
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var id = $(this); 
	var idvalue = $(this).attr("id"); 
	
	var host="<?php echo e(url('crm/getstates/')); ?>";	
	$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		beforeSend: function(){
        $('.image_loader').show();
        },
        complete: function(res){
        $('.image_loader').hide();
        },success:
		function (res){
			rendergetstates1(res, idval);
			function rendergetstates1(res, idval){
			
			   $.each(res.view_details, function(index, data) {
				  if (index==0) {
					$('#states'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
				  }else {
					$('#states'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
				  };
				});   
			}
		}		
	  
	
	})
	return false;
	
});
			

$('#direct1').css('display', 'none');
$('#secondcol').css('display', 'none');
$('#direct2').css('display', 'none');
$('#direct2_implant').css('display', 'none');
$('#direct2_outplant').css('display', 'none');

$(document).ready(function() {
 //set initial state.
    $('#direct_check1').change(function() {
			$('#form2Error').addClass('hidden');
			$('#form2Error').html('');
        if(this.checked) {
			$('#direct_check2').prop('checked', false);
            $('#direct1').css('display', 'flex');
			$('#secondcol').css('display', 'block');
			$('#direct2').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
        }
        else
		{
			$('#form2Error').addClass('hidden');
			$('#form2Error').html('');
			$('#direct_check2').prop('checked', false);
			$('#direct1').css('display', 'flex');
			$('#secondcol').css('display', 'none');
			$('#direct2').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
		}			
    });

	$('#direct_check2').change(function() {
        if(this.checked) {
			$('#ofz_type').val('');
			$('#direct_check1').prop('checked', false);
            $('#direct2').css('display', 'block');
            $('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
        }
        else
		{
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'none');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
		}			
    });
	
	$('#ofz_type').change(function() {
		if(this.value == 'Implant')
		{
			$('#direct2_implant').prop('checked', false);
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'block');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'block');
			$('#direct2_outplant').css('display', 'none');
		}
		else if(this.value == 'Outplant')
		{
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'block');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'block');
		}
		else
		{
			$('#direct_check1').prop('checked', false);
			$('#direct2').css('display', 'block');
			$('#direct1').css('display', 'none');
			$('#secondcol').css('display', 'none');
			$('#direct2_implant').css('display', 'none');
			$('#direct2_outplant').css('display', 'none');
		}
		
	});
});


// Get Sub Cities
 $(document).on("change", "#hotel_type", getbox);
 function getbox()
 {
	 var hotl_typeval = $('#hotel_type').val();
	 if(hotl_typeval == 'Independent')
	 {
		 $('#grp_sec').hide();
		 $('#grp_name').val('');
	 }
	 else if(hotl_typeval == 'Group/Chain')
	 {
		 $('#grp_sec').show();
		 $('#grp_name').val('');
	 }
	 
 }

 
 $(document).on("change", ".states", getcities);
	function getcities(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="<?php echo e(url('crm/getcities')); ?>";	
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

	  $(document).on("change", "#subsidy2", getsubsidyAddress);
	function getsubsidyAddress(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 
//alert(id)
	var host="<?php echo e(url('crm/getsubsidyAddress')); ?>";	
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
        },success:rendersubsidyAddress
	
	})
	return false;
}
function rendersubsidyAddress(res){
$('#officeadd').html('')
console.log('Data:'+res.view_details);
if(res.view_details != '')
{
       $.each(res.view_details, function(index, data) {
       	//console.log('Data:'+res.view_details);
          if (index==0) {
            $('#officeadd').append('<tr><td><input type="checkbox" name="subsidy_ofz2[]" class="checkbox" value="'+data.hl_regl_id+'" ></input></td><td >'+data.hl_loc_type+'</td><td >'+data.hl_ofz_address+'</td><td>'+data.hl_country+'</td></tr>');
          }else {

            $('#officeadd').append('<tr><td><input type="checkbox" name="subsidy_ofz2[]" class="checkbox"  value="'+data.hl_regl_id+'" ></input></td><td >'+data.hl_loc_type+'</td><td >'+data.hl_ofz_address+'</td><td>'+data.hl_country+'</td></tr>');
          };
        });   
}else{

	$('#officeadd').append('<tr><td><input type="hidden" name="subsidy_ofz2[]" class="checkbox"  value="" ></input></td><td >No Office Location</td><td ></td><td></td></tr>');

}
      }


	  

// function getcities1(idvalue){ 
//   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//    var length = idvalue.length; 
// 	var idval = idvalue.substring(7, length);
// 	var id = $('#states'+idval).val(); 
// 	var host="<?php echo e(url('crm/getcities')); ?>";	
// 	$.ajax({
// 		type: 'POST',
// 		data:{'id': id,'_token':CSRF_TOKEN},
// 		url: host,
// 		dataType: "json", // data type of response		
// 		beforeSend: function(){
//         $('.image_loader').show();
//         },
//         complete: function(res){
//         $('.image_loader').hide();
//         },success:
// 		function (res){
// 		rendergetcities1(res, idval);
// 			function rendergetcities1(res, idval){
// 		   $.each(res.view_details, function(index, data) {
// 			  if (index==0) {
// 				$('#cities'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
// 			  }else {
// 				$('#cities'+idval).append('<option value="'+data.id+'">'+data.name+'</option>');
// 			  };
// 			});   
// 		  }	
// 		}
	
// 	})
// 	return false;
// }

	  </script>
	  
	

	
	  <script>

$("#saveform1").click(function() {

       if ($('input[name="sel_add_type"]:checked').length == 0) {
		
		 $('#form2Error').removeClass('hidden');
		 $('#form2Error').html('Please choose any one check box');
		 return false; 
		} 
          else {
			$('#form2Error').addClass('hidden');
			$('#form2Error').html('');

			var radi=$('input[name="sel_add_type"]:checked').val()
		
				if(radi=='Direct Address')
				{
				form1()
				}else{
				form2()
				}

		}
				return false;

}); 

	function form1(){
		
		var off_address1=$('#off_address1').val();
		var country1=$('#country1').val();
		var states1=$('#states1').val();
		var cities1=$('#cities1').val();
		var postcode1=$('#postcode1').val();
		//var location_type1=$('#location_type1').val();
		//var contact_number1=$('#contact_number1').val();
		var lead_type1=$('#lead_type1').val();
		//var email1=$('#email1').val();		
		$('#err_off_address1').html('&nbsp;')
		$('#err_country1').html('&nbsp;')
		$('#err_states1').html('&nbsp;')
		$('#err_cities1').html('&nbsp;')
		$('#err_postcode1').html('&nbsp;')
		$('#err_location_type1').html('&nbsp;')
		$('#err_contact_number1').html('&nbsp;')
		$('#err_lead_type1').html('&nbsp;')
		$('#err_email1').html('&nbsp;')
		//$('#err_head_off1').html('&nbsp;')

				if(off_address1==''){
					$('#err_off_address1').html('Office Address is Required')
					return false;
				}if(country1==''){
					$('#err_country1').html('Country is Required')
					return false;
				}if(states1==''){
					$('#err_states1').html('State is Required')
					return false;
				}if(cities1==''){
					$('#err_cities1').html('City is Required')
					return false;
				}if(postcode1==''){
					$('#err_postcode1').html('Postcode is Required')
					return false;
				 }
				 //if(location_type1==''){
				// 	$('#err_location_type1').html('Location Type is Required')
				// 	return false;
				// }if(contact_number1==''){
				// 	$('#err_contact_number1').html('Mobile Number is Required')
				// 	return false;
				// }
				if(lead_type1==''){
					$('#err_lead_type1').html('Lead Type is Required')
					return false;
				}
				/*if(email1==''){
					$('#err_email1').html('Email Address is Required')
					return false;
				}*/
				// if ($("input[name=head_off]:checked").length < 1) {
				// 	$('#err_head_off1').html('Head Office Location is Required')
				// 	return false;}
				
				else{
					form.submit();
				}
						
			

	}


	function form2(){
	
					var ofz_type=$('#ofz_type').val();
					var subsidy1=$('#subsidy1').val();
					var subsidy2=$('#subsidy2').val();
					
					$('#err_subsidy_ofz2').html('&nbsp;')
					$('#err_subsidy1').html('&nbsp;')
					$('#err_subsidy2').html('&nbsp;')
					$('#err_head_off2').html('&nbsp;')

					$('#err_ic_off_address1').html('&nbsp;')
					$('#err_ic_location_type1').html('&nbsp;')
					$('#err_ic_country1').html('&nbsp;')
					$('#err_ic_states1').html('&nbsp;')
					$('#err_ic_cities1').html('&nbsp;')
					$('#err_eemail1').html('&nbsp;')
					$('#err_ic_contact_designation').html('&nbsp;')
					$('#err_ic_first_name').html('&nbsp;')
					$('#err_ic_last_name').html('&nbsp;')
					$('#err_ic_cemail').html('&nbsp;');
					


				

				if(ofz_type==''){
				$('#err_subsidy_ofz2').html('Type is Required')
				return false;
				}else if(ofz_type !=''){

				if(ofz_type=='Implant'){
						if(subsidy1==''){
						$('#err_subsidy1').html('Subsidy is Required')
						return false;
						}
						var ic_off_address1=$('#ic_off_address1').val();
						var ic_location_type1=$('#ic_location_type1').val();
						var ic_country1=$('#ic_country1').val();
						var ic_states1=$('#ic_states1').val();
						var ic_cities1=$('#ic_cities1').val();
						var ic_email1=$('#ic_email1').val();
						var ic_contact_designation=$('#ic_contact_designation').val();
						var ic_first_name=$('#ic_first_name').val();
						var ic_last_name=$('#ic_last_name').val();
						var ic_cemail=$('#ic_cemail').val();				
						//alert(ic_contact_designation)
						

						if(ic_off_address1==''){
						$('#err_ic_off_address1').html('Office Address is Required')
						return false;
						}
						if(ic_location_type1==''){
						$('#err_ic_location_type1').html('Location Type is Required')
						return false;
						}

						if(ic_country1==''){
						$('#err_ic_country1').html('Country is Required')
						return false;
						}
						if(ic_states1==''){
						$('#err_ic_states1').html('States is Required')
						return false;
						}
						if(ic_cities1==''){
						$('#err_ic_cities1').html('City is Required')
						return false;
						}
						if(ic_email1==''){
						$('#err_email1').html('Email is Required')
						return false;
						}

						if(ic_title==''){
						$('#err_ic_title').html('Title is Required')
						return false;
						}

						if(ic_contact_designation==''){
						$('#err_ic_contact_designation').html('Contact designation is Required')
						return false;
						}

						if(ic_first_name==''){
						$('#err_ic_first_name').html('First name is Required')
						return false;
						}

						if(ic_last_name==''){
						$('#err_ic_last_name').html('Last name is Required')
						return false;
						}

						if(ic_cemail==''){
						$('#err_ic_cemail').html('Email is Required')
						return false;
						}

						
						
						
						

												

						
					
				}
				if(ofz_type=='Outplant'){
						if(subsidy2==''){
						$('#err_subsidy2').html('Subsidy is Required')
						return false;
						}
						var sub=$("input.checkbox:checked").length ;

						if (sub == 0) {
						$('#err_head_off2').html('Office Location is Required')
						return false;
						}else{

				form.submit();
				}
				}else{

				form.submit();
				}
				}


									
						

	}


	$(document).ready(function() {

		

	  	// $('#rootwizard').bootstrapWizard({
	  	// 	'tabClass': 'nav nav-pills',
	  	// 	'onNext': function(tab, navigation, index) {
	  	// 		var $valid = $("#commentForm").valid();
	  	// 		if(!$valid) {
	  	// 			$validator.focusInvalid();
	  	// 			return false;
	  	// 		}else{
		// 		var $total = navigation.find('li').length;
		// 		var $current = index+1;
		// 		var $percent = ($current/$total) * 100;
		// 		$('.progress-bar').css({width:$percent+'%'});
		// 		}
	  	// 	}
	  	// });		
		// window.prettyPrint && prettyPrint()
	});
	
		  //event.preventDefault();
		//});
		$(".btnNext").click(function() {
			//alert();
			$(window).scrollTop(0);	
			
		});


	$("button#clone").click(function () {
			var $div = $('div[id^="contact_add_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="contact_add_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'contact_add_form'+divlength );
			
				
			
			$("#contact_section").append($klon);
			var input = document.querySelector("#contact_add_form"+divlength+" input#contact_number1");
			var input1 = document.querySelector("#contact_add_form"+divlength+" input#landline_no1");
			$('#contact_add_form'+divlength ).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			
			window.intlTelInput(input, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/js/utils.js"
			});
			//alert(input1)
			
			window.intlTelInput(input1, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/js/utils.js"
			});
			var $divnew = $('div[id^="contact_add_form"]:last');
			//$("#contact_add_form"+divlength).intlTelInput();

			
			$divnew.find('input[type=text]:first').focus();
			//var newdiv = $("#contact_add_form").clone(true);
			//newdiv.find('input,textarea').val('');
			//$("#contact_section").append(newdiv).find("input[type=text]:first").focus();
			//var lastadd = $("#contact_section").find('#contact_add_form:last');
			//lastadd.find('input').focus();
			
			return false;
	});

	


	//Corp Contact Address New Office

	$("button#clone_corp_add").click(function () {
			var $div = $('div[id^="corp_contact_address_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="corp_contact_address_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.prop('id', 'corp_contact_address_form'+divlength );
			
				
			
			$("#contact_section").append($klon);
			var input = document.querySelector("#corp_contact_address_form"+divlength+" input#contact_number1");
			var input1 = document.querySelector("#corp_contact_address_form"+divlength+" input#landline_no1");
			$('#corp_contact_address_form'+divlength ).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			
			window.intlTelInput(input, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/js/utils.js"
			});
			//alert(input1)
			
			window.intlTelInput(input1, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/js/utils.js"
			});
			var $divnew = $('div[id^="corp_contact_address_form"]:last');
			//$("#contact_add_form"+divlength).intlTelInput();

			
			$divnew.find('input[type=text]:first').focus();
			//var newdiv = $("#contact_add_form").clone(true);
			//newdiv.find('input,textarea').val('');
			//$("#contact_section").append(newdiv).find("input[type=text]:first").focus();
			//var lastadd = $("#contact_section").find('#contact_add_form:last');
			//lastadd.find('input').focus();
			
			return false;
	});

	function removediv(val){
		var $cnid = $('#corp_contact_address_form'+val);
		$cnid.remove();
	};
	
    
	$("button#clone1").click(function () {
			var $div = $('div[id^="corporate_contactnew_form"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="corporate_contactnew_form"]').length;
			//alert(divlength);
			
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			var $klon = $div.clone(true);
			//$klon.find('input,textarea').val('');
			$klon.prop('id', 'corporate_contactnew_form'+divlength );
			
			

			$("#contactnew_section").append($klon);
			$('#corporate_contactnew_form'+divlength).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removediv1('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
			var input = document.querySelector("#corporate_contactnew_form"+divlength+" input#mobile_no");
			var input1 = document.querySelector("#corporate_contactnew_form"+divlength+" input#landline_no");
			$("#corporate_contactnew_form"+divlength+" input#contact_type").prop('id', 'contact_type'+divlength);
			
			window.intlTelInput(input, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/js/utils.js"
			});
			
			window.intlTelInput(input1, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			//numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "../admin-assets/js/utils.js"
			});
			var $divnew = $('div[id^="contact_add_form"]:last');
			//$("#contact_add_form"+divlength).intlTelInput();
			
			var dataSourceContactTypeval  = [
			<?php echo $__env->make('panels.crm.master_contact_type', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			];
			
			$("#corporate_contactnew_form0 #contact_type"+divlength).magicsearch({
                dataSource: dataSourceContactTypeval,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
                format: '%firstName%',
				hidden: true,
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
			$("#corporate_contactnew_form"+divlength+" #contact_type"+divlength).magicsearch({
                dataSource: dataSourceContactTypeval,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
				hidden: true,
                format: '%firstName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
			/*var dataSourceOfzval  = [
			<?php echo $__env->make('panels.crm.corporate_basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			];
			
			$("#corporate_contactnew_form"+divlength+" #head_office1").magicsearch({
                dataSource: dataSourceOfzval,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
                format: '%firstName%',
				hidden: true,
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });*/

			//$("#corporate_contactnew_form"+divlength+" #contact_type").clear();
			
			$divnew.find('input[type=text]:first').focus();
			//var newdiv = $("#contact_add_form").clone(true);
			//newdiv.find('input,textarea').val('');
			//$("#contact_section").append(newdiv).find("input[type=text]:first").focus();
			//var lastadd = $("#contact_section").find('#contact_add_form:last');
			//lastadd.find('input').focus();
			return false;
	});
	
	function removediv1(val){
		var $cnid = $('#corporate_contactnew_form'+val);
		$cnid.remove();
	};
	//utilsScript: baseUrl + "/admin-assets/js/utils.js",			

   
	</script>
	
	<script type="text/javascript">
var input = document.querySelector("#contact_number1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});

		var input = document.querySelector("#landline_no1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});


var input = document.querySelector("#ic_landline_no1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});



var input = document.querySelector("#corporate_contactnew_form0 input#mobile_no");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});

		var input = document.querySelector("#tab1 input#landline1");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: true,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/js/utils.js"
		});

// var input = document.querySelector("#contact_add_form0 input#landline1");
// 		window.intlTelInput(input, {
// 		allowExtensions: true,
// 		autoFormat: false,
// 		autoHideDialCode: false,
// 		autoPlaceholder: true,
// 		defaultCountry: "auto",
// 		ipinfoToken: "yolo",
// 		nationalMode: false,
// 		numberType: "MOBILE",
// 		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
// 		//preferredCountries: ['cn', 'jp'],
// 		preventInvalidNumbers: true,
// 		utilsScript: "../admin-assets/js/utils.js"
// 		});

		
		
// var input = document.querySelector("#tab01 input#landline1");
// 		window.intlTelInput(input, {
// 		allowExtensions: true,
// 		autoFormat: false,
// 		autoHideDialCode: false,
// 		autoPlaceholder: true,
// 		defaultCountry: "auto",
// 		ipinfoToken: "yolo",
// 		nationalMode: false,
// 		numberType: "MOBILE",
// 		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
// 		//preferredCountries: ['cn', 'jp'],
// 		preventInvalidNumbers: true,
// 		utilsScript: "../admin-assets/js/utils.js"
// 		});
		
		var gdata;
		function gethead(request, response) {
			var result = false;

			$.ajax({
			url: "<?php echo e(url('crm/getheadoffice')); ?>",
		
			dataType: "json",
			async: false,

			complete: function(data) {
				//alert(data);
				//console.log(data);
			},
			success:function(res)
			{
				result = '[';
				var obj = res.view_details;
				obj.forEach(function(e) {
					result += '{id:'+e.hl_ccb_id+', firstName:"'+e.hl_business_name+'"},';
				}); 
				result += ']';
			}
				});
			return result;

		 }
			
		
		//var ss = gethead();
		/*
        $(function() {
             var dataSource = [
                <?php foreach ($hdcorporatecont as $hdcorporatecont) { ?>
                {id: <?=$hdcorporatecont->hl_ccb_id?>, firstName: '<?=$hdcorporatecont->hl_business_name?>', lastName: '<?=$hdcorporatecont->hl_head_office_address?>'},

                <?php } ?>
            ];

			
	 	
            $('#head_off1').magicsearch({
                dataSource: dataSource,
               fields: ['firstName', 'lastName'],
                id: 'id',
                method:'POST',
				hidden: true,
                format: '%firstName%  %lastName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
			
            $('#head_office1').magicsearch({
                dataSource: dataSource,
               fields: ['firstName', 'lastName'],
                id: 'id',
                method:'POST',
				hidden: true,
				format: '%firstName%  %lastName%',
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
            $('#set-btn').click(function() {
                $('#basic').trigger('set', { id: '3,4' });
            });
			
			var dataSourceContactType = [
                <?php echo $__env->make('panels.crm.master_contact_type', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            ];
	 	
            $('#corporate_contactnew_form0 input#contact_type').magicsearch({
                dataSource: dataSourceContactType,
                fields: ['firstName'],
                id: 'id',
                method:'POST',
                format: '%firstName%',
                hidden: true,
                multiple: true,
                multiField: 'firstName',
                multiStyle: {
                    space: 5,
                    width: 80
                }
            });
			
        }); */



    </script>

    <script type="text/javascript">
	  
 $(document).ready( function () {
    $('#implant_cont_table').DataTable( {
    	"bLengthChange": false,
    	"bPaginate": false,
    }
  //   {
		//  "columnDefs": [
		//    { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		//  ],
		//  dom: 'Bfrtip',
		// 		buttons: [
		// 			{
		// 				text: 'Add Agent',
		// 				action: function ( e, dt, node, config ) {
		// 					 window.location.href = '<?php echo e(url("crm/add-agent")); ?>'; //using a named route

		// 				}
		// 			}
		// 	]
		// } 
		);


     $('#outplant_cont_table').DataTable( {
     	"bLengthChange": false,
     	"bPaginate": false,
     }
  //    {
		//  "columnDefs": [
		//    { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		//  ],
		//  dom: 'Bfrtip',
		// 		buttons: [
		// 			{
		// 				text: 'Add Agent',
		// 				action: function ( e, dt, node, config ) {
		// 					 window.location.href = '<?php echo e(url("crm/add-agent")); ?>'; //using a named route

		// 				}
		// 			}
		// 	]
		// } 
		);

      $('#corp_cont_table').DataTable( {
      	"bLengthChange": false,
      }
      //{
		 // "columnDefs": [
		 //   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 // ],
		//  dom: 'Bfrtip',
		// 		buttons: [
		// 			{
		// 				text: '',
		// 				action: function ( e, dt, node, config ) {
		// 					 window.location.href = '<?php echo e(url("crm/add-agent")); ?>'; 

		// 				}
		// 			}
		// 	]
		// } 
		);
	} );


	  </script>
	  <style type="text/css">.dataTables_filter{float:right;}</style>

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>