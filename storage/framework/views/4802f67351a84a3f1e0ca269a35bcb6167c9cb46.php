 <?php $__env->startSection('head'); ?>
<!-- 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<style>
    .croppedImg {
        width: 180px;
    }
    
    .img-sz {
        width: 180px;
        min-height: 100px;
        background: #ccc;
        margin-bottom: 10px;
    }
    
    .error {
        color: #a01d1c;
    }
    
    hr {
        display: none;
    }
    
    .label-info {
        background: none !important
    }
    
    .label {
        color: #807b7b !important
    }
    
    .cform {
        //padding:10px;
        //border:1px solid rgba(0, 0, 0, 0.125);
        //margin:5px;
    }
    
    .firstrow {
        flex-direction: row;
        display: flex;
        align-items: center;
        justify-content: center;
    }
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
                        <div class="alert alert-success" role="alert">Dear <?php echo e(Auth::user()->first_name); ?>, agent contacts details has been successfully updated.</div>
                    </div>
                    <div class="col-lg-2"></div>

                    <?php endif; ?>


                    <?php if(Session::get('sms')): ?>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                    <div class="alert alert-success " role="alert"><?php echo e((Session::get('sms'))); ?></div>
                    </div>
                    <div class="col-lg-2"></div>
                    <?php endif; ?>

                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="alert alert-success hidden delete" id="delete" role="alert"></div>
                    </div>
                    <div class="col-lg-2"></div>

                </div>
            </div>
            <div class="card mb-3">

                <div class="card-body">
                    <h4 class="card-title">EDIT <?php echo e($Hotelagentcontactbasic->hl_business_name); ?> AGENTS</h4>
                    <div class="row mt-30 "></div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-pills " id="bs-example-navbar-collapse-2">

                        <ul class="nav nav-tabs tab-no-active-fill " style="margin-top: 10px;">
                            <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">Business Information</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab01" data-toggle="tab">Agent Regional Office Location</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab02" data-toggle="tab">Agent Contact</a></li>

                            <li class="nav-item"><a class="nav-link" href="#tab03" data-toggle="tab">Corporate Contact</a></li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                    <div class="tab-content" id="tab-contents" style="margin-top:0px;">
                        <div class="tab-pane active" id="tab1">
                            <form id="addAgentForm" action="<?php echo e(url('crm/agent-updated')); ?>/<?php echo e($Hotelagentcontactbasic->hl_agentcont_id); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
                                <input type="hidden" value="<?php echo e($Hotelagentcontactbasic->hl_agentcont_id); ?>" name="hl_ccb_id"> <?php echo e(csrf_field()); ?>

                                <div class="row">

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Business Name </label>
                                        <input name="business_name" id="business_name" type="text" class="form-control required" data-error="#err_title" value="<?php echo e($Hotelagentcontactbasic->hl_business_name); ?>">
                                        <span id="err_title" style="position: relative;
    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('business_name')) ? $errors->first('business_name') : ''); ?></span>

                                    </div>
<?php 
$business_type = $Hotelagentcontactbasic->getAgenttype();?>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Agent Type </label>
                                        <select name="business_type[]" multiple="multiple" id="" class="form-control js-example-basic-multiple w-100" data-error="#err_business_type" style="width: 100%">
                                            <option value="7" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='7'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Associations</option>
                                            <option value="1" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='1'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Consortia/TMCs</option>
                                            <option value="2" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='2'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>MICE</option>
                                            <option value="3" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='3'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Leisure</option>
                                            <option value="4" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='4'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Entertainment</option>
                                            <option value="5" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='5'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Tour Operators</option>
                                            <option value="6" <?php $__currentLoopData = $business_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($busi_type->h_agent_type_id=='6'): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>Wholesalers</option>
                                        </select>

                                        <span id="err_business_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('business_type')) ? $errors->first('business_type') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Office Address </label>
                                        <input type="text" name="address1" id="address1" value="<?php echo e($Hotelagentcontactbasic->hl_ofz_address); ?>" class="form-control required" data-error="#err_address1"><span id="err_address1" style="position:relative;top: -2px;"></span>

                                        <span class="error"><?php echo e(($errors->has('address1')) ? $errors->first('address1') : ''); ?></span>

                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Country </label>
                                        <select tabindex="5" name="h_country" id="h_country" class="form-control country js-example-basic-multiple w-100" data-error="#err_country" style="width: 100%">
                                            <option value="">Choose Country</option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($coun->id); ?>" <?php if($Hotelagentcontactbasic->hl_country==$coun->id): ?> selected="selected" <?php endif; ?> ><?php echo e($coun->name); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="err_country" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('h_country')) ? $errors->first('h_country') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>State </label>
                                        <select tabindex="6" name="states" id="h_states" class="form-control states js-example-basic-multiple w-100" style="width: 100%" data-error="#err_states">
                                            <option value="">
                                                ---Choose---
                                            </option>
                                            <?php if($Hotelagentcontactbasic): ?> <?php $__currentLoopData = $editstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($Hotelagentcontactbasic->hl_country==$states->country_id): ?>
                                            <option value="<?php echo e($states->id); ?>" <?php if($Hotelagentcontactbasic-> hl_state==$states->id): ?> selected="selected" <?php endif; ?> ><?php echo e($states->name); ?></option>
                                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                        </select>
                                        <span id="err_states" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('states')) ? $errors->first('states') : ''); ?></span></div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City </label>
                                        <select name="cities" id="h_cities" tabindex="7" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_cities">
                                            <option value="">
                                                ---Choose---
                                            </option>

                                            <?php if($Hotelagentcontactbasic): ?> <?php $__currentLoopData = $editcities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($Hotelagentcontactbasic->hl_state==$cities->state_id): ?>
                                            <option value="<?php echo e($states->id); ?>" <?php if($Hotelagentcontactbasic-> hl_city==$cities->id): ?> selected="selected" <?php endif; ?>><?php echo e($cities->name); ?></option>
                                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                        </select>
                                        <span id="err_cities" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('cities')) ? $errors->first('cities') : ''); ?></span>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                        <label>Postcode </label>
                                        <input type="text" class="form-control " name="postcode" id="postcode" value="<?php echo e($Hotelagentcontactbasic->hl_pincode); ?>">
                                        <span class="error"><?php echo e(($errors->has('postcode')) ? $errors->first('postcode') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Website </label>
                                        <input type="text" class="form-control required" name="website" id="website" value="<?php echo e($Hotelagentcontactbasic->hl_website); ?>" data-error="#err_website">
                                        <span id="err_website" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('website')) ? $errors->first('website') : ''); ?></span>

                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Lead Type </label>
                                        <select name="lead_type" tabindex="10" id="lead_type" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type">
                                            <option value="">
                                                ---Choose---
                                            </option>
                                            <?php $__currentLoopData = $master_lead_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_l_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($master_l_type->hl_mt_lt_id); ?>" <?php if($master_l_type->hl_mt_lt_id==$Hotelagentcontactbasic->hl_lead_type): ?> selected="selected" <?php endif; ?> ><?php echo e($master_l_type->hl_lead_type_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="err_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('lead_type')) ? $errors->first('lead_type') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Subsidy of </label><select multiple="multiple" tabindex="2" name="subsidy_of_ag[]" id="subsidy_of_ag" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" >
                                        
                                        <?php $__currentLoopData = $hl_corporate_contact_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_corporate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hl_corporate->hl_ccb_id); ?>_1"
                                            <?php $chk=$hl_corporate->hl_ccb_id.'_1';
                                                    $data=explode(',', $Hotelagentcontactbasic->subsidy_of);?> 
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($chk==$value): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($hl_corporate->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $hl_agents_contacts_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_agents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hl_agents->hl_agentcont_id); ?>_2" 
                                            <?php $chk=$hl_agents->hl_agentcont_id.'_2';
                                                    $data=explode(',', $Hotelagentcontactbasic->subsidy_of);?> 
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($chk==$value): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($hl_agents->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                        <span id="err_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('business_type')) ? $errors->first('business_type') : ''); ?></span>
                                        
                                        </div>
                                    
                            <div id="ag_section">
                            <div class="col-lg-12 col-md-12 col-sm-12" id="ag_contact_address_form0">
                             <div class="row"> 
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label><strong>Contact Details:</strong></label>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Contact Designation </label>

                                        <select name="m_con_contact_designation[]" id="m_con_contact_designation0" type="text" class="form-control js-example-basic-multiple w-100 cont_desi" style="width: 100%" data-error="#err_m_con_contact_designation">
                                            <option value="">Choose</option>
                                            <?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ConDes->hl_cd_id); ?>"><?php echo e($ConDes->hl_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <span id="err_m_con_contact_designation" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_contact_designation')) ? $errors->first('m_con_contact_designation') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6  form-group">
                                        <label>Title </label>
                                        <select name="m_con_title[]" id="m_con_title0" type="text" class="form-control js-example-basic-multiple w-100 con_title" style="width: 100%" data-error="#err_m_con_title">
                                            <option value="">Choose Title</option>
                                            <option value="Mr"  >Mr</option>
                                            <option value="Mrs" >Mrs</option>
                                            <option value="Ms" >Ms</option>
                                        </select>
                                        <!-- <input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" > -->
                                        <span id="err_m_con_title" style="position: relative; top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_title')) ? $errors->first('m_con_title') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>First Name </label>
                                        <input name="m_con_first_name[]" id="m_con_first_name0" type="text" class="form-control " value="" data-error="#err_m_con_first_name">
                                        <span id="err_m_con_first_name" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_first_name')) ? $errors->first('first_name') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Last Name </label>
                                        <input name="m_con_last_name[]" id="m_con_last_name0" type="text" class="form-control" data-error="#err_m_con_last_name" value="">
                                        <span id="err_m_con_last_name" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_last_name')) ? $errors->first('m_con_last_name') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Mobile Number</label>
                                        <input name="m_con_mobile_no[]" id="m_con_mobile_no0" type="text" class="form-control " data-error="#err_m_con_mobile_no" value="">
                                        <span id="err_m_con_mobile_no" style="position: relative;
										top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_mobile_no')) ? $errors->first('m_con_mobile_no') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Landline Number</label>
                                        <input name="m_con_landline_no[]" id="m_con_landline_no0" type="text" class="form-control" data-error="#err_m_con_landline_no" value="">
                                        <span id="err_m_con_landline_no" style="position: relative;
										top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('landline_no')) ? $errors->first('mobile_no') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Email </label>
                                        <input name="m_con_email[]" id="m_con_email0" type="text" class="form-control " data-error="#err_m_con_email" value="">
                                        <span id="err_m_con_email" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_email')) ? $errors->first('email') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>LinkedIn </label>
                                        <input name="m_con_linkedin_contact[]" id="m_con_linkedin_contact0" type="text" class="form-control " data-error="#err_m_con_linkedin_contact" value="">
                                        <span id="err_m_con_linkedin_contact" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_linkedin_contact')) ? $errors->first('m_con_linkedin_contact') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Skype </label>
                                        <input name="m_con_skype_contact[]" id="m_con_skype_contact0" type="text" class="form-control " data-error="#err_m_con_skype_contact" value="">
                                        <span id="err_m_con_skype_contact" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_skype_contact')) ? $errors->first('m_con_skype_contact') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Date of Birth</label>
                                        <input name="m_con_dob[]" id="m_con_dob0" type="date" class="form-control " data-error="#m_con_dob" value="">
                                        <span id="err_m_con_dob" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_dob')) ? $errors->first('m_con_dob') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Associate with <!--busi--> </label>
                                        <select multiple="multiple" tabindex="2" name="ag_associate_with0[]" id="ag_associate_with0" class="js-example-basic-multiple w-100 ag_associate" data-error="#err_type" style="width: 100%">
                                        <?php $__currentLoopData = $associate_c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateC->hl_ccb_id); ?>_1" ><?php echo e($associateC->business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $associate_a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateA): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateA->hl_agentcont_id); ?>_2" ><?php echo e($associateA->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>                                   
                                    </div>
                                <input type="hidden" name="hl_multi_id[]" id="hl_multi_id0" value="" />
                                </div>
                                </div>

                                <!--loop-->
                              <?php if($contactD): ?>                           
                              <?php $i=1;?>
                              <?php $__currentLoopData = $contactD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php 
                                $ass_with = $contact['ag_associate_with'];
                                $asso_with = explode(',', $ass_with);
                                ?>
                                <div class="col-lg-12 col-md-12 col-sm-12" id="ag_contact_address_form<?php echo e($i); ?>">
                                <div class="row"> 
                                <div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id="rem<?php echo e($i); ?>" onclick="removedivAE('<?php echo e($i); ?>')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button></div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label><strong>Contact Details:</strong></label>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Contact Designation </label>

                                        <select name="m_con_contact_designation[]" id="m_con_contact_designation<?php echo e($i); ?>" type="text" class="form-control js-example-basic-multiple w-100 cont_desi" style="width: 100%" data-error="#err_m_con_contact_designation">
                                            <option value="">Choose</option>
                                            <?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ConDes->hl_cd_id); ?>" <?php if($contact['m_con_contact_designation']==$ConDes->hl_cd_id): ?> selected="selected" <?php endif; ?>><?php echo e($ConDes->hl_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <span id="err_m_con_contact_designation" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_contact_designation')) ? $errors->first('m_con_contact_designation') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6  form-group">
                                        <label>Title </label>
                                        <select name="m_con_title[]" id="m_con_title<?php echo e($i); ?>" type="text" class="form-control js-example-basic-multiple w-100 con_title" style="width: 100%" data-error="#err_m_con_title">
                                            <option value="">Choose Title</option>
                                            <option value="Mr" <?php if($contact['m_con_title']=='Mr'): ?> selected="selected" <?php endif; ?>>Mr</option>
                                            <option value="Mrs" <?php if($contact['m_con_title']=='Mrs'): ?> selected="selected" <?php endif; ?>>Mrs</option>
                                            <option value="Ms" <?php if($contact['m_con_title']=='Ms'): ?> selected="selected" <?php endif; ?>>Ms</option>
                                        </select>
                                        <!-- <input name="title[]" id="title" type="text" class="form-control required" data-error="#err_title" > -->
                                        <span id="err_m_con_title" style="position: relative; top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_title')) ? $errors->first('m_con_title') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>First Name </label>
                                        <input name="m_con_first_name[]" id="m_con_first_name<?php echo e($i); ?>" type="text" class="form-control " value="<?php echo e($contact['m_con_first_name']); ?>" data-error="#err_m_con_first_name">
                                        <span id="err_m_con_first_name" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_first_name')) ? $errors->first('first_name') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Last Name </label>
                                        <input name="m_con_last_name[]" id="m_con_last_name<?php echo e($i); ?>" type="text" class="form-control" data-error="#err_m_con_last_name" value="<?php echo e($contact['m_con_last_name']); ?>">
                                        <span id="err_m_con_last_name" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_last_name')) ? $errors->first('m_con_last_name') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Mobile Number</label>
                                        <input name="m_con_mobile_no[]" id="m_con_mobile_no<?php echo e($i); ?>" type="text" class="form-control " data-error="#err_m_con_mobile_no" value="<?php echo e($contact['m_con_mobile_no']); ?>">
                                        <span id="err_m_con_mobile_no" style="position: relative;
                                        top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_mobile_no')) ? $errors->first('m_con_mobile_no') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Landline Number</label>
                                        <input name="m_con_landline_no[]" id="m_con_landline_no<?php echo e($i); ?>" type="text" class="form-control" data-error="#err_m_con_landline_no" value="<?php echo e($contact['m_con_landline_no']); ?>">
                                        <span id="err_m_con_landline_no" style="position: relative;
                                        top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('landline_no')) ? $errors->first('mobile_no') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Email </label>
                                        <input name="m_con_email[]" id="m_con_email<?php echo e($i); ?>" type="text" class="form-control " data-error="#err_m_con_email" value="<?php echo e($contact['m_con_email']); ?>">
                                        <span id="err_m_con_email" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_email')) ? $errors->first('email') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>LinkedIn </label>
                                        <input name="m_con_linkedin_contact[]" id="m_con_linkedin_contact<?php echo e($i); ?>" type="text" class="form-control " data-error="#err_m_con_linkedin_contact" value="<?php echo e($contact['m_con_linkedin_contact']); ?>">
                                        <span id="err_m_con_linkedin_contact" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_linkedin_contact')) ? $errors->first('m_con_linkedin_contact') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Skype </label>
                                        <input name="m_con_skype_contact[]" id="m_con_skype_contact<?php echo e($i); ?>" type="text" class="form-control " data-error="#err_m_con_skype_contact" value="<?php echo e($contact['m_con_skype_contact']); ?>">
                                        <span id="err_m_con_skype_contact" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_skype_contact')) ? $errors->first('m_con_skype_contact') : ''); ?></span>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Date of Birth</label>
                                        <input name="m_con_dob[]" id="m_con_dob<?php echo e($i); ?>" type="date" class="form-control " data-error="#m_con_dob" value="<?php echo e($contact['m_con_dob']); ?>">
                                        <span id="err_m_con_dob" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('m_con_dob')) ? $errors->first('m_con_dob') : ''); ?></span>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Associate with <!--busi--> </label>
                                        <select multiple="multiple" tabindex="2" name="ag_associate_with<?php echo e($i); ?>[]" id="ag_associate_with<?php echo e($i); ?>" class="js-example-basic-multiple w-100 ag_associate" data-error="#err_type" style="width: 100%">
                                        <?php $__currentLoopData = $associate_c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateC->hl_ccb_id); ?>_1" <?php $__currentLoopData = $asso_with; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $chek=$associateC->hl_ccb_id.'_1';?>
                                        <?php if($chek == $value): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($associateC->business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $associate_a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateA): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateA->hl_agentcont_id); ?>_2" <?php $__currentLoopData = $asso_with; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $chek=$associateA->hl_agentcont_id.'_2';?>
                                        <?php if($chek == $value): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($associateA->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>                                   
                                    </div>
                                    <input type="hidden" name="hl_multi_id[]" id="hl_multi_id<?php echo e($i); ?>" value="<?php echo e($contact['hl_multi_id']); ?>" />

                                </div>
                                </div>
                              <?php $i++;?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                                <!--loop end-->
                                </div>
                                    
                                </div>
                                <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <!-- <input type="button" class="btn btn-light" style="width:auto" value="Cancel"> -->
                                </div>
                                <div align="right" class="col-sm-12 col-md-12 col-lg-12">
                                    <input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary btn-lg next-btn" style="">&nbsp;
                                    <button type="button" id="clone_ag_add" class="btn btn-inverse-info btn-icon" style="margin-top: -10px;margin-right: -15px;">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!--//VENUE OCCASION-->
                        <div class="tab-pane" id="tab01">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row"> 
                                <div class="col-sm-12 col-md-5 col-lg-5 ">&nbsp;</div>
                                    <div class="col-sm-12 col-md-7 col-lg-7 ">
                                        <form name="export" action="<?php echo e(url('crm/import-agent-regional-office-location')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
                                        <div class="row">            
                                        <input type="hidden" value="<?php echo e($Hotelagentcontactbasic->hl_agentcont_id); ?>" name="import_hl_agentcont_id">
                                        <div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;">
                                           <!--  <input type="file" name="agent_off_location_file" class="form-control"> -->

                                            <div class="form-group">
                                                <input type="file" name="agent_off_location_file" class="filestyle">
                                              <!--   <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload file">
                                                    <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                                </div> -->
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="agent_Off" value="Import Agent Office Location" class="btn btn-outline-inverse-info" style="width: 210px;"></div>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <form id="commentForm" action="<?php echo e(url('crm/ageregional_added')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" value="<?php echo e($Hotelagentcontactbasic->hl_agentcont_id); ?>" name="hl_agentcont_id">
                                 <input type="hidden" name="busi_id" id="busi_id" value="<?php echo e($Hotelagentcontactbasic->hl_agentcont_id); ?>">
                                <div id="contact_section">
                                    <div class="col-lg-12 cform row" id="contact_add_form0">

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">

                                            <label>IATA/ARC/TIDS/CLIA/TRUE Number </label>

                                            <input name="iata_number" id="iata_number1" type="text" class="form-control " data-error="#err_iata_number1">

                                            <span id="err_type" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Office Address </label>
                                            <input name="off_address1" id="off_address1" type="text" class="form-control required" data-error="#err_title">
                                            <span id="err_address1" style="position: relative; top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('off_address1')) ? $errors->first('off_address1') : ''); ?></span>

                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Country </label>
                                            <select name="country1" id="country1" class="form-control country js-example-basic-multiple w-100" style="width: 100%" data-error="#err_country1">
                                                <option value="">Choose Country</option>
                                                <?php echo $__env->make('panels.crm.countries', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </select>
                                            <span id="err_country" style="position:relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('country1')) ? $errors->first('country1') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>State </label>
                                            <select name="states1" id="states1" class="form-control states js-example-basic-multiple w-100" style="width: 100%" data-error="#err_states">
                                                <option value="">
                                                    ---Choose---
                                                </option>
                                            </select>
                                            <span id="err_states" style="position:relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('states1')) ? $errors->first('states1') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>City </label>
                                            <select name="cities1" id="cities1" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_cities1">
                                                <option value="">
                                                    ---Choose---
                                                </option>
                                            </select>
                                            <span id="err_cities1" style="position:relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('cities1')) ? $errors->first('cities1') : ''); ?></span>
                                            <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Postcode </label>
                                            <input type="text" class="form-control required" name="postcode1" id="postcode1" value="<?php echo e(old('postcode1')); ?>" data-error="#err_postcode1">
                                            <span id="err_postcode1" style="position:relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('postcode1')) ? $errors->first('postcode1') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Office Number</label>
                                            <input name="contact_number1" id="contact_number1" type="text" class="form-control required" data-error="#err_linked_in">
                                            <span id="err_linked_in" style="position: relative;
										top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('contact_number')) ? $errors->first('contact_number') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Email </label>
                                            <input name="email1" id="email1" type="text" class="form-control required" data-error="#err_email1">
                                            <span id="err_email1" style="position: relative;
    top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('email1')) ? $errors->first('email1') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Lead Type </label>
                                            <select name="lead_type1" id="lead_type1" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type">
                                                <option value="">
                                                    ---Choose---
                                                </option>
                                                <?php echo $__env->make('panels.crm.leads_types', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </select>
                                            <span id="err_type" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''); ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">

                                            <label>Location Type </label>
                                            <select name="location_type" id="location_type" class="form-control states js-example-basic-multiple w-100" style="width: 100%" data-error="#err_states">
                                                <option value="">
                                                    ---Choose---
                                                </option>

                                                <option value="Regional Office">Regional Office</option>
                                                <option value="Country Office">Country Office</option>
                                            </select>

                                            <span id="err_type" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Subsidy of </label>
                                            <select multiple="multiple" tabindex="2" name="subsidy_m_off[]" id="" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type">

                                                <?php $__currentLoopData = $hl_corporate_contact_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_corporate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($hl_corporate->hl_ccb_id); ?>_1"><?php echo e($hl_corporate->hl_business_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__currentLoopData = $hl_agents_contacts_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_agents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($hl_agents->hl_agentcont_id); ?>_2"><?php echo e($hl_agents->hl_business_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                            <span id="err_type" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('business_type')) ? $errors->first('business_type') : ''); ?></span>

                                        </div>

                                       
                                       

                                    </div>
                                </div>
                                <input type="hidden" id="contact_status_hidden" name="contact_status_hidden"></input>
                                <div id="contactnew_section">
                                    <div class="col-lg-12 cform row" id="corporate_contactnew_form0">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h3> Agent Contact</h3>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Contact Designation </label>
                                            <select name="contact_designation[]" id="contact_designation" type="text" class="form-control js-example-basic-multiple w-100 e_contact_designation" style="width: 100%" data-error="#err_contact_designation">
                                                <option value="">Choose</option>
                                                <?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ConDes->hl_cd_id); ?>"><?php echo e($ConDes->hl_title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span id="err_contact_designation" style="position: relative;    top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <div style="">
                                                <label>Title </label>
                                                <select name="title[]" id="title" type="text" class="form-control js-example-basic-multiple w-100 e_title" style="width: 100%" data-error="#err_title">
                                                    <option value="">Choose Title</option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Mrs">Ms</option>
                                                </select>

                                                <span id="err_contact_person" style="position: relative; top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>First Name </label>
                                            <input name="first_name[]" id="first_name" type="text" class="form-control required" data-error="#err_first_name">
                                            <span id="err_first_name" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('first_name')) ? $errors->first('first_name') : ''); ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Last Name </label>
                                            <input name="last_name[]" id="last_name" type="text" class="form-control required" data-error="#err_last_name">
                                            <span id="err_last_name" style="position: relative;    top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('last_name')) ? $errors->first('last_name') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Mobile Number</label>
                                            <input name="mobile_no[]" id="mobile_no" type="text" class="form-control required" data-error="#err_mobile_no">
                                            <span id="err_mobile_no" style="position: relative;
										top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Email </label>
                                            <input name="email[]" id="email" type="text" class="form-control required" data-error="#err_email">
                                            <span id="err_email" style="position: relative;    top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>LinkedIn Contact </label>
                                            <input name="linkedin_contact[]" id="linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact">
                                            <span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Skype Contact </label>
                                            <input name="skype_contact[]" id="skype_contact" type="text" class="form-control required" data-error="#err_skype_contact">
                                            <span id="err_skype_contact" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label>Date of Birth </label>
                                            <input name="dob[]" id="dob" type="date" class="form-control required" data-error="#dob">
                                            <span id="err_dob" style="position: relative;top: -2px;"></span>
                                            <span class="error"><?php echo e(($errors->has('dob')) ? $errors->first('dob') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Associate with   <!-- new ofz --></label><select multiple="multiple" tabindex="2" name="associate_withM0[]" id="associate_withM0" class="js-example-basic-multiple w-100 associate_withM" data-error="#err_type" style="width: 100%">
                                        <?php $__currentLoopData = $associate_c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateE): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateE->hl_ccb_id); ?>_1" ><?php echo e($associateE->business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $associate_a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateA): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateA->hl_agentcont_id); ?>_2" ><?php echo e($associateA->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>                                   
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span><input type="checkbox" id="event_invite" class="" value="Yes" name="invite[]" >Not Eligible For Event Invite </input></span>

                                        </div>

                                    </div>

                                </div>

                                <!--<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>-->
                                <!-- <div align="right" class="col-sm-12 col-md-12 col-lg-12">
                                    
                                </div> -->

                                <!-- <div align="right" class="col-sm-12 col-md-12 col-lg-12">
							<button type="button" id="clone" class="btn btn-inverse-info btn-icon">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </button>
						</div> -->

                                <div align="right" style="margin-bottom:20px;" class="col-sm-12 col-md-12 col-lg-12">
                                </div>
                                <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <!-- <input type="button" class="btn btn-light" style="width:auto" value="Cancel"> -->
                                </div>
                                <div align="right" class="col-sm-12 col-md-12 col-lg-12">
                                    <input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary btn-lg next-btn" style="">&nbsp;
                                    <button type="button" id="clone1" class="btn btn-inverse-info btn-icon" style="margin-top: -10px;margin-right:30px;">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <!---<div class="row">

							<div  class="col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-info btnPrevious" >Previous</a></div>
							<div  class="col-sm-6 col-md-6 col-lg-6">
							 <a class="btn btn-info btnNext pull-right" >Next</a></div>

						</div>-->

                            </form>
                        </div>

                        <div class="tab-pane" id="tab02">
                            <table class="table table-bordered dataTable" id="agent_contact">
                                <thead>
                                    <th>Region</th>
                                    <th>Address</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Email</th>
                                    <th>Contact Mobile</th>
                                    <th></th>

                                </thead>
                                <?php if($hlagentscontacts): ?>
                                <?php $k=1;?>
                                    <?php $__currentLoopData = $hlagentscontacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hlagentscontact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($hlagentscontact->hl_regional_name); ?></td>
                                        <td><?php echo e($hlagentscontact->hl_ofz_address); ?></td>
                                        <td><?php echo e($hlagentscontact->hl_first_name); ?></td>
                                        <td><?php echo e($hlagentscontact->hl_last_name); ?></td>
                                        <td><?php echo e($hlagentscontact->hl_email); ?></td>
                                        <td><?php echo e($hlagentscontact->hl_mob_no); ?></td>
                                        <td><a href="#" id="<?php echo e($hlagentscontact->hl_corcont_id); ?>" class="editAgentcont"><i class="fa fa-edit fa-lg" style="font-size: 1.33333333em;"></i></a>	&nbsp;&nbsp;&nbsp;	
                                    <?php if($hlagentscontact->contacts_id !=''): ?>
                                    <a href="#" data-id="<?php echo e($hlagentscontact->contacts_id); ?>" class="deleteSubAgentcont" data-toggle="tooltip" data-placement="top" title="Delete Agent Contact"><i class="fa fa-trash fa-lg" style="color: red;"></i></a>  
                                    <?php else: ?>
                                    <a href="#" data-id="<?php echo e($hlagentscontact->hl_regl_id); ?>" class="deleteAgentcont" data-toggle="tooltip" data-placement="top" title="Delete Region Office Location"><i class="fa fa-trash fa-lg" style="color: red;"></i></a>  
                                    <?php endif; ?>    								
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                            </table>
<!--Edit Model Box Start -->
<div class="edit-form mt-30" style="border: 1px solid #dee2e642; padding: 20px; ">
<form id="updateAgentContactForm" action="<?php echo e(url('crm/update-agent-contact')); ?>/<?php echo e($Hotelagentcontactbasic->hl_agentcont_id); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
     <?php echo e(csrf_field()); ?>

    <input type="hidden"  name="agtcont_mid" id="agtcont_mid" value="">
   
    <h2 style=" padding-bottom: 10px; ">Edit Contact</h2>
                                               <div id="contact_section">
                         <div class="cform row" id="contact_add_form0">                     
                             
                                       
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        
                                        <label>IATA/ARC/TIDS/CLIA/TRUE Number </label>
                                        
                                        <input name="iata_number" id="edit_iata_number1" type="text" class="form-control"  data-error="#err_iata_number1" >
                                        
                                        <span id="err_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
                                        </div>
                                        
                                  
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Office Address </label><input name="off_address1" id="edit_off_address1" type="text" class="form-control required" data-error="#err_title" >
                                        <span id="err_address1" style="position: relative; top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('off_address1')) ? $errors->first('off_address1') : ''); ?></span>
                                        
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country </label>
                                        <select name="country1" id="edit_country1"  class="form-control country js-example-basic-single w-100" style="width: 100%" data-error="#err_country1" >       
                                    <option value="">Choose Country</option>                                    
                                        <?php echo $__env->make('panels.crm.countries', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                     </select>
                                     <span id="err_country" style="position:relative;top: -2px;"></span>
                                     <span class="error"><?php echo e(($errors->has('country1')) ? $errors->first('country1') : ''); ?></span>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>State </label><select name="states1" id="edit_states1" class="form-control states js-example-basic-single w-100" style="width: 100%" data-error="#err_states">
                                        <option value="">
                                         ---Choose---
                                         </option>
                                     </select>                                   
                                     <span id="err_states" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('states1')) ? $errors->first('states1') : ''); ?></span>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City </label><select name="cities1" id="edit_cities1"  class="form-control js-example-basic-single w-100" style="width: 100%" data-error="#err_cities1">       
                                        <option value="">
                                         ---Choose---
                                         </option>
                                     </select>                                   
                                     <span id="err_cities1" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('cities1')) ? $errors->first('cities1') : ''); ?></span>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Postcode </label><input type="text" class="form-control" name="postcode1" id="edit_postcode1"  data-error="#err_postcode1" >
                                        <span id="err_postcode1" style="position:relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('postcode1')) ? $errors->first('postcode1') : ''); ?></span>
                                        </div>
                                        
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Office Number</label><input name="contact_number1" id="edit_contact_number1" type="text" class="form-control" data-error="#err_linked_in" >
                                        <span id="err_linked_in" style="position: relative;
                                        top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('contact_number')) ? $errors->first('contact_number') : ''); ?></span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="email1" id="edit_email1" type="text" class="form-control required" data-error="#err_email1" >
                                        <span id="err_email1" style="position: relative;
    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('email1')) ? $errors->first('email1') : ''); ?></span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type </label><select name="lead_type1" id="edit_lead_type1" class="form-control js-example-basic-single w-100" style="width: 100%" data-error="#err_type" >
                                        <option value="">
                                         ---Choose---
                                         </option>
                                         <?php echo $__env->make('panels.crm.leads_types', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                         </select>
                                        <span id="err_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''); ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        
                                        <label>Location Type </label>
                                        <select name="location_type" id="edit_location_type"  class="form-control states js-example-basic-single w-100" style="width: 100%" data-error="#err_states">
                                        <option value="">
                                         ---Choose---
                                         </option>
                                         
                                         <option value="Regional Office">Regional Office</option>
                                         <option value="Country Office">Country Office</option>
                                        </select>
                                        
                                        
                                        <span id="err_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
                                        </div>
                                        <input type="hidden" name="subsidy_of_hid" id="subsidy_of_hid" value="">

                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label> Subsidy of </label>
                                        <select multiple="multiple" tabindex="2" name="edit_subsidy_m_off[]" id="edit_subsidy_m_off" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" >

                                        <?php $__currentLoopData = $hl_corporate_contact_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_corporate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hl_corporate->hl_ccb_id); ?>_1"><?php echo e($hl_corporate->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php $__currentLoopData = $hl_agents_contacts_basic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hl_agents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hl_agents->hl_agentcont_id); ?>_2"><?php echo e($hl_agents->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <span id="err_type" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('business_type')) ? $errors->first('business_type') : ''); ?></span>
                                        
                                        </div>
                                        
                                </div>  
                               </div>   
                               
<div id="edit_contactnew_section">
                         <div class="cform row" id="edit_contactnew_form0">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                            <h3>Agent Contact</h3>
                            </div>
                             <input type="hidden"  name="agtcont_cid[]" id="agtcont_cid" value="">
                                
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation </label>
                                        <select name="edit_contact_designation[]" id="edit_contact_designation" type="text" class="form-control js-example-basic-single w-100 e_con_desi" style="width: 100%" data-error="#err_contact_designation">
                                        <option value="">Choose</option>
                                        <?php $__currentLoopData = $Contactdesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ConDes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ConDes->hl_cd_id); ?>"><?php echo e($ConDes->hl_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="err_contact_designation" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''); ?></span>
                                        </div>
                                     
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><div style=""><label>Title </label>
<select name="edit_title[]" id="edit_title" type="text" class="form-control js-example-basic-single w-100 e_title_m" style="width: 100%" data-error="#err_title"><option value="">Choose Title</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Mrs">Ms</option></select>
                                            
                                        <span id="err_contact_person" style="position: relative; top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?></span>
                                        </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name </label><input name="edit_first_name[]" id="edit_first_name" type="text" class="form-control required" data-error="#err_first_name" >
                                        <span id="err_first_name" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('first_name')) ? $errors->first('first_name') : ''); ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name </label><input name="edit_last_name[]" id="edit_last_name" type="text" class="form-control required" data-error="#err_last_name" >
                                        <span id="err_last_name" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('last_name')) ? $errors->first('last_name') : ''); ?></span>
                                        </div>
                                        
                                        
                                        
                                
                                        
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="edit_mobile_no[]" id="edit_mobile_no" type="text" class="form-control required" data-error="#err_mobile_no" >
                                        <span id="err_mobile_no" style="position: relative;
                                        top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''); ?></span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email </label><input name="edit_email[]" id="edit_email" type="text" class="form-control required" data-error="#err_email" >
                                        <span id="err_email" style="position: relative;    top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn Contact </label><input name="edit_linkedin_contact[]" id="edit_linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact" >
                                        <span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''); ?></span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype Contact </label><input name="edit_skype_contact[]" id="edit_skype_contact" type="text" class="form-control required" data-error="#err_skype_contact" >
                                        <span id="err_skype_contact" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''); ?></span>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth </label><input name="edit_dob[]" id="edit_dob" type="date" class="form-control required" data-error="#dob" >
                                        <span id="err_dob" style="position: relative;top: -2px;"></span>
                                        <span class="error"><?php echo e(($errors->has('dob')) ? $errors->first('dob') : ''); ?></span>
                                        </div>
                                        <input type="hidden" name="associate_hid" id="associate_hid" value="">
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Associate with <!-- consortia --></label><select multiple="multiple" tabindex="2" name="associate_withEdit0[]" id="associate_withEdit0" class="js-example-basic-multiple w-100 associate_editM" data-error="#err_type" style="width: 100%">
                                        <?php $__currentLoopData = $associate_c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateE): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateE->hl_ccb_id); ?>_1" ><?php echo e($associateE->business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $associate_a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associateA): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($associateA->hl_agentcont_id); ?>_2" ><?php echo e($associateA->hl_business_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>                                   
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span><input type="checkbox" id="edit_event_invite" name="edit_event_invite[]" class="" value="Yes" >Not Eligible For Event Invite </input></span>
                                        
                                        </div>
                                        
                                        
                                        
                                    
                                        </div>
                                        
                                        
                                        
                                </div>  
                                
                           
                            <!-- <div align="right" class="col-sm-12 col-md-12 col-lg-12">
                            
                            </div> -->

                            <div align="right" style="margin-bottom:20px;" class="col-sm-12 col-md-12 col-lg-12">
                                </div>
                                <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <!-- <input type="button" class="btn btn-light" style="width:auto" value="Cancel"> -->
                                </div>
                                <div align="right" class="col-12">
                                    <input style="width:auto;" type="button" id="cancelform" value="Cancel" class="btn btn-outline-inverse-info btn-lg" style="">
                                    <input style="width:auto;" type="submit" id="saveform" value="Save" class="btn btn-primary btn-lg next-btn" style="">&nbsp;
                                    <button type="button" id="clone2" class="btn btn-inverse-info btn-icon" style="margin-top: -10px;margin-right:-15px;">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                          </button>
                                </div>
                        </form>
                                              
</div>
<!--Edit Model Box Stop -->
                        </div>

                        <div class="tab-pane" id="tab03">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 style="margin-bottom: -20px;">Implant</h4></div>
                            <table class="table table-hover   table-bordered dataTable" id="implant_cont_table">
                                <thead>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-30">
                                <h4 style="margin-bottom: -20px;">Outplant</h4></div>
                            <table class="table table-hover   table-bordered dataTable" id="outplant_cont_table">
                                <thead>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

</div>
<!-- Steps ends -->

</div>

</div>
<script src="<?php echo e(asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendors/select2/select2.min.js')); ?>"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('assets/js/typeahead.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
        $('select#business_type').multiselect({
            columns: 2,
            placeholder: 'Agent Type',
            search: true,
            searchOptions: {
                'default': 'Search Agent Type'
            },
            selectAll: true
        });
    });

    $(function() {
        $('select#subsidy_m_off').multiselect({
            columns: 2,
            placeholder: 'subsidy of',
            search: true,
            searchOptions: {
                'default': 'Search subsidy'
            },
            selectAll: true
        });
        // $('select#edit_subsidy_m_off').multiselect({
        //     columns: 2,
        //     placeholder: 'subsidy of',
        //     search: true,
        //     searchOptions: {
        //         'default': 'Search subsidy'
        //     },
        //     selectAll: true
        // });
        
    });
    // Get States
    $(document).on("change", "#h_country", getstates);

    function getstates() {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        var host = "<?php echo e(url('crm/getstates/')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response		
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetstates

        })
        return false;
    }

    // Get States

    function rendergetstates(res) {
        $('#h_states').html('');
        $.each(res.view_details, function(index, data) {
            if (index == 0) {
                $('#h_states').append('<option value="' + data.id + '">' + data.name + '</option>');
            } else {
                $('#h_states').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
    }

$("#cancelform").click(function () {
     $('.edit-form').fadeOut();
     
});


$("button#clone_ag_add").click(function () {
            var $div = $('div[id^="ag_contact_address_form"]:first');
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
            var divlength = $('div[id^="ag_contact_address_form"]').length;
            //alert(divlength);
             $(".cont_desi").select2("destroy");
             $(".con_title").select2("destroy");
             $(".ag_associate").select2("destroy");
            // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
            var $klon = $div.clone(true);
            $klon.find('input,textarea').val('');
            $klon.prop('id', 'ag_contact_address_form'+divlength );
            
                
            
            $("#ag_section").append($klon);
            var input = document.querySelector("#ag_contact_address_form"+divlength+" input#contact_number1");
            var input1 = document.querySelector("#ag_contact_address_form"+divlength+" input#landline_no1");
            $('#ag_contact_address_form'+divlength ).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem'+divlength+' onclick="removedivA('+divlength+')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon" style="margin-right: -15px;"><i class="mdi mdi-close text-info"></i>    </button></div>');
            $("#ag_contact_address_form"+divlength+" select#ag_associate_with0").prop({id:"ag_associate_with"+divlength, name:"ag_associate_with"+divlength+'[]'}).append();
            $("#ag_contact_address_form"+divlength+" select#m_con_contact_designation0").prop('id', 'm_con_contact_designation'+divlength);
            $("#ag_contact_address_form"+divlength+" select#m_con_title0").prop('id', 'm_con_title'+divlength);

            $("#ag_contact_address_form"+divlength+" input#m_con_first_name0").prop('id', 'm_con_first_name'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_last_name0").prop('id', 'm_con_last_name'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_mobile_no0").prop('id', 'm_con_mobile_no'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_landline_no0").prop('id', 'm_con_landline_no'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_email0").prop('id', 'm_con_email'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_linkedin_contact0").prop('id', 'm_con_linkedin_contact'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_skype_contact0").prop('id', 'm_con_skype_contact'+divlength);
            $("#ag_contact_address_form"+divlength+" input#m_con_dob0").prop('id', 'm_con_dob'+divlength);
            $("#ag_contact_address_form"+divlength+" input#hl_multi_id0").prop('id', 'hl_multi_id'+divlength);


            $(".cont_desi").select2();
            $(".con_title").select2();
            $(".ag_associate").select2();
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
            var $divnew = $('div[id^="ag_contact_address_form"]:last');
            //$("#contact_add_form"+divlength).intlTelInput();

            
            $divnew.find('input[type=text]:first').focus();
            //var newdiv = $("#contact_add_form").clone(true);
            //newdiv.find('input,textarea').val('');
            //$("#contact_section").append(newdiv).find("input[type=text]:first").focus();
            //var lastadd = $("#contact_section").find('#contact_add_form:last');
            //lastadd.find('input').focus();
            
            return false;
    });

    function removedivA(val){
        var $cnid = $('#ag_contact_address_form'+val);
        $cnid.remove();
    };

    function removedivAE(val){
        var id=$("#hl_multi_id"+val).val();
        //alert(id);
        var confi=confirm('Are you sure want to delete?');
        if(confi){
        var $cnid = $('#ag_contact_address_form'+val);
        //alert($cnid);
        //console.log($cnid);
        $cnid.remove();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var host="<?php echo e(url('crm/remove_agContact/')); ?>";   
        $.ajax({
        type: 'POST',
        data:{'id': id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      

    })

    }else{
    }

    };

$('.edit-form').hide();
     $(document).on("click", ".editAgentcont", editAgentcont);

    function editAgentcont() {

        $('#agtcont_cid').val('');
        $('#agtcont_mid').val('');

        $('#edit_iata_number1').val('');
        $('#edit_off_address1').val('');
        $('#edit_country1').val('');
        $('#edit_postcode1').val('');
        $('#edit_contact_number1').val('');
        $('#edit_email1').val('');
        $('#edit_lead_type1').val('');
        $('#edit_location_type').val('');
        $('#edit_contact_designation').val('');
        $('#edit_title').val('');
        $('#edit_first_name').val('');
        $('#edit_last_name').val('');
        $('#edit_email').val('');
        $('#edit_mobile_no').val('');        
        $('#edit_linkedin_contact').val('');
        $('#edit_skype_contact').val('');            
        $('#edit_dob').val('');
        $('#associate_hid').val('');
       $("#edit_event_invite").prop( "checked", false );
       

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr("id");

        var host = "<?php echo e(url('crm/getAgents/')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response      
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetAgents

        })
        return false;
    }

    // Get States

    function rendergetAgents(res) {
        $('.edit-form').fadeIn();
$('html, body').animate({
        scrollTop: $('.edit-form').offset().top - 20 
    }, 'slow');

        
        //$('#h_states').html('');
        console.log('Dataaa:'+JSON.stringify(res.view_details.subsidy));
        var hlagentscontacts=res.view_details.hlagentscontacts;
        var states=res.view_details.states;
        var cities=res.view_details.cities;
        var subsidy=res.view_details.subsidy;

        $.each(states, function(index, data) {
            if (data.id == hlagentscontacts.hl_state) {
                $('#edit_states1').append('<option value="' + data.id + '" selected="selected">' + data.name + '</option>');
            } else {
                $('#edit_states1').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });

        $.each(cities, function(index, data) {
            if (data.id == hlagentscontacts.hl_city) {
                $('#edit_cities1').append('<option value="' + data.id + '" selected="selected">' + data.name + '</option>');
            } else {
                $('#edit_cities1').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
        var myarray = [];
        $.each(subsidy, function(index, data) {
             myarray.push(data.h_subsidy_id+'_'+data.type);
             $('#subsidy_of_hid').val(myarray);
            
        });
                
        
        $('#agtcont_cid').val(hlagentscontacts.hl_corcont_id);
        $('#agtcont_mid').val(hlagentscontacts.hl_regl_id);

        $('#edit_iata_number1').val(hlagentscontacts.iata_number);
        $('#edit_off_address1').val(hlagentscontacts.hl_ofz_address);
        $('#edit_country1').val(hlagentscontacts.hl_country).trigger('change');
        $('#edit_postcode1').val(hlagentscontacts.hl_postcode);
        $('#edit_contact_number1').val(hlagentscontacts.hl_ofz_no);
        $('#edit_email1').val(hlagentscontacts.hl_email);
        $('#edit_lead_type1').val(hlagentscontacts.hl_lead_type).trigger('change');
        $('#edit_location_type').val(hlagentscontacts.hl_loc_type).trigger('change');
        $('#edit_contact_designation').val(hlagentscontacts.hl_cont_design).trigger('change');
        $('#edit_title').val(hlagentscontacts.hl_title).trigger('change');
        $('#edit_first_name').val(hlagentscontacts.hl_first_name);
        $('#edit_last_name').val(hlagentscontacts.hl_last_name);
        $('#edit_email').val(hlagentscontacts.cemail);
        $('#edit_mobile_no').val(hlagentscontacts.hl_mob_no);        
        $('#edit_linkedin_contact').val(hlagentscontacts.hl_linked_in);
        $('#edit_skype_contact').val(hlagentscontacts.hl_skype);
        var hl_dob = moment(hlagentscontacts.hl_dob).format('DD-MM-YYYY');        
        $('#edit_dob').val(hl_dob);
        if(hlagentscontacts.hl_event_invite=="Yes"){
            $("#edit_event_invite").prop( "checked", true );
        }
        $('#associate_hid').val(hlagentscontacts.associate_with);
        

        setTimeout(function () {
            var hlid=$("#associate_hid").val();
            var element = document.getElementById('associate_withEdit0');

            for (var i = 0; i < element.options.length; i++) {

                element.options[i].selected = hlid.indexOf(element.options[i].value) >= 0;
            }
            var hlidValue = hlid.split(',');
            $('select#associate_withEdit0').val(hlidValue).trigger('change');

            var hls=$("#subsidy_of_hid").val();
            var element1 = document.getElementById('edit_subsidy_m_off');

            for (var i = 0; i < element1.options.length; i++) {

                element1.options[i].selected = hls.indexOf(element1.options[i].value) >= 0;
            }
            var hlsValue = hls.split(',');
            $('select#edit_subsidy_m_off').val(hlsValue).trigger('change');

        } , 1000);

        
    }




//Delete Agent Contact


$(document).on("click", ".deleteAgentcont", deleteAgentcont);

    function deleteAgentcont() {
         $('#delete').html(''); 

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr("data-id");
        var host = "<?php echo e(url('crm/deleteAgents/')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response      
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: renderdeleteAgents

        })
        return false;
    }

    // Get States

    function renderdeleteAgents(res) {
        if(res.view_details=='success'){

            $('#delete').removeClass('hidden');
            $('#delete').html('Agent contact deleted successfully');  
            setInterval(function(){ 
                location.reload(true);
                 }, 3000);   
        }
               

        
    }
   

 $(document).on("click", ".deleteSubAgentcont", deleteSubAgentcont);

    function deleteSubAgentcont() {
         $('#delete').html(''); 

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr("data-id");
        var host = "<?php echo e(url('crm/deleteSubAgents/')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response      
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: renderdeleteSubAgents

        })
        return false;
    }

    // Get States

    function renderdeleteSubAgents(res) {
        if(res.view_details=='success'){

            $('#delete').removeClass('hidden');
            $('#delete').html('Sub Agent contact deleted successfully');  
            setInterval(function(){ 
                location.reload(true);
                 }, 3000);   
        }
               

        
    }
   

    // Get States

    // Get Sub Cities
    $(document).on("change", "#hotel_type", getbox);

    function getbox() {
        var hotl_typeval = $('#hotel_type').val();
        if (hotl_typeval == 'Independent') {
            $('#grp_sec').hide();
            $('#grp_name').val('');
        } else if (hotl_typeval == 'Group/Chain') {
            $('#grp_sec').show();
            $('#grp_name').val('');
        }

    }

    $(document).on("change", "#h_states", getcities);

    function getcities() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        var host = "<?php echo e(url('crm/getcities')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response		
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetcities

        })
        return false;
    }

    function rendergetcities(res) {
        $('#h_cities').html('');
        $.each(res.view_details, function(index, data) {
            if (index == 0) {
                $('#h_cities').append('<option value="' + data.id + '">' + data.name + '</option>');
            } else {
                $('#h_cities').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
    }

    function getcities1(idvalue) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var length = idvalue.length;
        var idval = idvalue.substring(7, length);
        var id = $('#states' + idval).val();
        var host = "<?php echo e(url('crm/getcities')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response		
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function(res) {
                $('.image_loader').hide();
            },
            success: function(res) {
                rendergetcities1(res, idval);

                function rendergetcities1(res, idval) {
                    $.each(res.view_details, function(index, data) {
                        if (index == 0) {
                            $('#cities' + idval).append('<option value="' + data.id + '">' + data.name + '</option>');
                        } else {
                            $('#cities' + idval).append('<option value="' + data.id + '">' + data.name + '</option>');
                        };
                    });
                }
            }

        })
        return false;
    }
</script>

<script>
    //image_1:"Please choose atleast one image",image_1: {
    //   required: true,		     
    //   },

    $(document).ready(function() {
        var $validator = $("#addAgentForm1").validate({
            rules: {
                business_name: {
                    required: true,
                    minlength: 5
                },
                address1: {
                    required: true,
                    minlength: 5
                },
                h_country: {
                    required: true,
                },
                states: {
                    required: true,
                },

                website: {
                    required: true,
                },
                lead_type: {
                    required: true,
                },

            },
            messages: {
                business_name: "Please enter a business name",
                address1: "Please enter a address",
                h_country: "Please choose a country",
                states: "Please choose a states",
                website: "Please enter a website",
                lead_type: "Please choose lead type",

            },
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                    return true;
                } else {
                    error.insertAfter(element);
                    return false;
                }
            },
            submitHandler: function(form) {
                form.submit();
            }

        });

        //  	$('#rootwizard').bootstrapWizard({
        //  		'tabClass': 'nav nav-pills',
        //  		'onNext': function(tab, navigation, index) {
        //  			var $valid = $("#commentForm").valid();
        //  			if(!$valid) {
        //  				$validator.focusInvalid();
        //  				return false;
        //  			}else{
        // 		var $total = navigation.find('li').length;
        // 		var $current = index+1;
        // 		var $percent = ($current/$total) * 100;
        // 		$('.progress-bar').css({width:$percent+'%'});
        // 		}
        //  		}
        //  	});		
        // window.prettyPrint && prettyPrint()
    });

    //event.preventDefault();
    //});
    $(".btnNext").click(function() {
        //alert();
        $(window).scrollTop(0);

    });

    $("button#clone").click(function() {
        var $div = $('div[id^="contact_add_form"]:first');
        var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
        var divlength = $('div[id^="contact_add_form"]').length;

        // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
        var $klon = $div.clone(true);
        $klon.find('input,textarea').val('');
        $klon.prop('id', 'contact_add_form' + divlength);

        //var sellength = $('select[id^="subsidy_m_off"]').length;
        //$klon.prop('id', 'subsidy_m_off'+sellength );

        $("#contact_section").append($klon);
        var input = document.querySelector("#contact_add_form" + divlength + " input#contact_number1");
        $('#contact_add_form' + divlength).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem' + divlength + ' onclick="removediv(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');

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

    function removediv(val) {
        var $cnid = $('#contact_add_form' + val);
        $cnid.remove();
    };

    $("button#clone1").click(function() {
        var $div = $('div[id^="corporate_contactnew_form"]:first');
        var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
        var divlength = $('div[id^="corporate_contactnew_form"]').length;
        //alert(divlength);
            $(".e_contact_designation").select2("destroy");
             $(".e_title").select2("destroy");
             $(".associate_withM").select2("destroy");

        // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
        var $klon = $div.clone(true);
        $klon.find('input,textarea').val('');
        $klon.prop('id', 'corporate_contactnew_form' + divlength);

        $("#contactnew_section").append($klon);
        $('#corporate_contactnew_form' + divlength).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem' + divlength + ' onclick="removediv1(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
        $("#corporate_contactnew_form"+divlength+" select#associate_withM0").prop({id:"associate_withM"+divlength, name:"associate_withM"+divlength+'[]'}).append();

            $(".e_contact_designation").select2();
            $(".e_title").select2();
            $(".associate_withM").select2();
        var input = document.querySelector("#corporate_contactnew_form" + divlength + " input#mobile_no");

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

    function removediv1(val) {
        var $cnid = $('#corporate_contactnew_form' + val);
        $cnid.remove();
    };


    $("button#clone2").click(function() {
        var $div = $('div[id^="edit_contactnew_form"]:first');
        var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
        var divlength = $('div[id^="edit_contactnew_form"]').length;
        //alert(divlength);
             $(".associate_editM").select2("destroy");
             $(".e_con_desi").select2("destroy");
             $(".e_title_m").select2("destroy");

        // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
        var $klon = $div.clone(true);
        $klon.find('input,textarea').val('');
        $klon.prop('id', 'edit_contactnew_form' + divlength);

        $("#edit_contactnew_section").append($klon);
        $('#edit_contactnew_form' + divlength).prepend('<div class="col-sm-12 col-md-12 col-lg-12" align="right"><button id=rem' + divlength + ' onclick="removediv2(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i>    </button></div>');
        $("#edit_contactnew_form"+divlength+" select#associate_withEdit0").prop({id:"associate_withEdit"+divlength, name:"associate_withEdit"+divlength+'[]'}).append();

            $(".associate_editM").select2();
            $(".e_con_desi").select2();
            $(".e_title_m").select2();
        var input = document.querySelector("#edit_contactnew_form" + divlength + " input#mobile_no");

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

    function removediv2(val) {
        var $cnid = $('#edit_contactnew_form' + val);
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
        autoPlaceholder: false,
        defaultCountry: "auto",
        ipinfoToken: "yolo",
        nationalMode: false,
        numberType: "MOBILE",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        //preferredCountries: ['cn', 'jp'],
        preventInvalidNumbers: true,
        utilsScript: "../admin-assets/js/utils.js"
    });

    var input = document.querySelector("#mobile_no");
    window.intlTelInput(input, {
        allowExtensions: true,
        autoFormat: false,
        autoHideDialCode: false,
        autoPlaceholder: false,
        defaultCountry: "auto",
        ipinfoToken: "yolo",
        nationalMode: false,
        numberType: "MOBILE",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        //preferredCountries: ['cn', 'jp'],
        preventInvalidNumbers: true,
        utilsScript: "../admin-assets/js/utils.js"
    });

    // Get States
    $(document).on("change", "#country1", getstates1);

    function getstates1() {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        var host = "<?php echo e(url('crm/getstates/')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response		
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetstates1

        })
        return false;
    }

    // Get States

    function rendergetstates1(res) {
        $('#states1').html('');
        $.each(res.view_details, function(index, data) {
            if (index == 0) {
                $('#states1').append('<option value="' + data.id + '">' + data.name + '</option>');
            } else {
                $('#states1').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
    }

    $(document).on("change", "#states1", getcities1);

    function getcities1() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        var host = "<?php echo e(url('crm/getcities')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response		
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetcities1

        })
        return false;
    }

    function rendergetcities1(res) {
        $('#cities1').html('');
        $.each(res.view_details, function(index, data) {
            if (index == 0) {
                $('#cities1').append('<option value="' + data.id + '">' + data.name + '</option>');
            } else {
                $('#cities1').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
    }

    //Edit States Function


     // Get States
    $(document).on("change", "#edit_country1", getstates2);

    function getstates2() {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        var host = "<?php echo e(url('crm/getstates/')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response      
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetstates2

        })
        return false;
    }

    // Get States

    function rendergetstates2(res) {
        $('#edit_states1').html('');
        $.each(res.view_details, function(index, data) {
            if (index == 0) {
                $('#edit_states1').append('<option value="' + data.id + '">' + data.name + '</option>');
            } else {
                $('#edit_states1').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
    }

    $(document).on("change", "#edit_states1", getcities1);

    function getcities1() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        var host = "<?php echo e(url('crm/getcities')); ?>";
        $.ajax({
            type: 'POST',
            data: {
                'id': id,
                '_token': CSRF_TOKEN
            },
            url: host,
            dataType: "json", // data type of response      
            beforeSend: function() {
                $('.image_loader').show();
            },
            complete: function() {
                $('.image_loader').hide();
            },
            success: rendergetcities2

        })
        return false;
    }

    function rendergetcities2(res) {
        $('#edit_cities1').html('');
        $.each(res.view_details, function(index, data) {
            if (index == 0) {
                $('#edit_cities1').append('<option value="' + data.id + '">' + data.name + '</option>');
            } else {
                $('#edit_cities1').append('<option value="' + data.id + '">' + data.name + '</option>');
            };
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#outplant_cont_table').DataTable({
                "bLengthChange": false,
                "bPaginate": false,
                "language": {
                "search": '',
                "searchPlaceholder": "Search",
        }
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

        $('#implant_cont_table').DataTable({
                "bLengthChange": false,
                "bPaginate": false,
                "language": {
                "search": '',
                "searchPlaceholder": "Search",
        }
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

         $('#agent_contact').DataTable({
                "bLengthChange": false,
                "bPaginate": false,
                "language": {
                "search": '',
                "searchPlaceholder": "Search",
        }
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
    });

    
</script>

<style type="text/css">
    .dataTables_filter {
        float: right;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>