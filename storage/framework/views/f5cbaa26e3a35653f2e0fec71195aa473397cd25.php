 
<?php $__env->startSection('head'); ?>
<?php $__env->startSection('content'); ?>
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

.label-info {
background: none !important
}

.label {
color: #807b7b !important
}

.cform {
padding: 10px;
//border:1px solid rgba(0, 0, 0, 0.125);
margin: 5px;
}

.firstrow {
flex-direction: row;
display: flex;
align-items: center;
justify-content: center;
}

.red {
color: red
}
</style>
<style>
.accordion {
background-color: #898989;
color: #fff;
cursor: pointer;
padding: 18px;
width: 100%;
border: none;
text-align: left;
outline: none;
font-size: 15px;
transition: 0.4s;
}
/*.active, .accordion:hover {
background-color: #ccc; 
}*/

.panel {
padding: 0 18px;
display: none;
background-color: white;
overflow: hidden;
}

.accordion:after {
content: '\002B';
color: #fff;
;
font-weight: bold;
float: right;
margin-left: 5px;
}

.accordion.active:after {
content: "\2212";
}

.custom-nav li {
padding-right: 15px;
padding-left: 15px;
}

.custom-nav li a span {
font-size: 18px;
}
.nav-tabs.tab-no-active-fill .nav-item {
     margin-right: 0rem !important; 
}
.nav-pills .nav-item {
     margin-right: 0rem !important; 
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

<!-- <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">    
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="<?php echo e(url('hotelier/import-synxis')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row">            

<input name="mhotel_id" id="mhotel_id" type="hidden"  value="<?php echo e($Hotels->id); ?>">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="synxis_file" class="form-control"></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="SynXis" value="Import SynXis" class="btn btn-outline-inverse-info"></div>

</div>
</form>
</div>
<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="<?php echo e(url('hotelier/import-hotel-configuration')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="<?php echo e($Hotels->id); ?>">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="hotel_file" class="form-control"></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Hotel" value="Import Hotel Configuration" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="<?php echo e(url('hotelier/import-property-info')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="<?php echo e($Hotels->id); ?>">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="property_file" class="form-control"></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Property" value="Import Property Info" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="<?php echo e(url('hotelier/import-room-configuration')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="<?php echo e($Hotels->id); ?>">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="room_file" class="form-control"></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Room Configuration" value="Import Room Configuration" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="<?php echo e(url('hotelier/import-tax-configuration')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="<?php echo e($Hotels->id); ?>">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="tax_file" class="form-control"></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Tax Configuration" value="Import Tax Configuration" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

</div>
</div> -->


<form id="commentForm" action="<?php echo e(url('hotelier/hotels/updated')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="row mt-30 "></div>

<div class="">
<div class="ctrlable_div">
<div class="steps" id="rootwizard">
<div class="row">
<div class="col-lg-12" id="content_desc">

<div class="row mt-30 "></div>
<?php if(Session::get('message')): ?>
<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success " role="alert">Dear <?php echo e(Auth::user()->first_name); ?>, <?php echo e((Session::get('message'))); ?></div>
</div>
<div class="col-lg-2"></div>

<?php endif; ?>

<!--   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div><?php echo e($error); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php echo e($Hotels->id); ?>-->

</div>
</div>
<div class="card mb-3">

<div class="card-body">
    <h2><?php echo e($Hotels->hotel_name); ?></h2>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">HOTEL IMPLEMENTATION</div>

<div class="col-sm-12 col-md-12 col-lg-12 panel" >
<div class="row mt-30 "></div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="navbar-pills " id="bs-example-navbar-collapse-2">

<ul class="nav nav-tabs tab-no-active-fill " style="margin-top: 10px;">
<li class="nav-item" id="synxis"><a class="nav-link" href="#tab06" data-toggle="tab">SynXis CRS</a></li>
<li class="nav-item"><a href="#tab1" class="nav-link " data-toggle="tab">Hotel Configuration</a></li>
<li class="nav-item"><a class="nav-link" href="#tab01" data-toggle="tab">Property Info</a></li>
<li class="nav-item"><a class="nav-link" href="#tab02" data-toggle="tab">Room Configuration</a></li>
<li class="nav-item"><a class="nav-link" href="#tab03" data-toggle="tab">Tax Configuration</a></li>
<!--  <li class="nav-item"><a class="nav-link" href="#tab04" data-toggle="tab">Additional Hotel Details</a></li> -->
<li class="nav-item"><a class="nav-link" href="#tab05" data-toggle="tab">Meeting & Events Facilities</a></li>

<li class="nav-item"><a class="nav-link" href="#tab07" data-toggle="tab">Hotel Images</a></li>
<!-- <li class="nav-item"><a class="nav-link" href="#tab08" data-toggle="tab">Create User</a></li> -->
<li class="nav-item"><a class="nav-link" href="#tab09" data-toggle="tab">Portal Access</a></li>  
</ul>
</div>
<!-- /.navbar-collapse -->
<?php echo e(csrf_field()); ?>


<input type="hidden" name="hotel_mid" id="hotel_mid" value="<?php echo e($Hotels->id); ?>">
<div class="tab-content" id="tab-contents" style="margin-top:0px;">

<div class="tab-pane active" id="tab1">

<div class="row">

<div class="col-sm-12 col-md-6 col-lg-6 mtb-15">
<h1>Basics</h1></div>
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15 text-right">
<a href="<?php echo e(url('hotelier/export-hotel-info')); ?>/xlsx/<?php echo e($Hotels->id); ?>" class="btn btn-outline-inverse-info btn-lg">Export Hotel Information</a>
</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Address/Contact Information</div>

<div class="col-sm-12 col-md-12 col-lg-12 panel" style="display: block;">
<div class=" row">

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">

    <label>Hotel Group Name </label>
        <select class="form-control js-example-basic-multiple w-100" name="grp_name" id="grp_name" data-error="#err_grp_name" style="width: 100%">
        <option value="">Choose</option>
        <?php $__currentLoopData = $HotelGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Hotel_Group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($Hotel_Group->id); ?>" <?php if($Hotels): ?> <?php if($Hotel_Group->id==$Hotels->grp_name): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($Hotel_Group->title); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    <span id="err_grp_name"></span>
    <span class="error"><?php echo e(($errors->has('grp_name')) ? $errors->first('grp_name') : ''); ?></span>

</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">

    <label>Hotel Name </label>
    <input name="hotel_name" id="hotel_name" type="text" class="form-control" data-error="#err_hotel_name" value="<?php echo e($Hotels->hotel_name); ?>">
    <span id="err_hotel_name"></span>
    <span class="error"><?php echo e(($errors->has('hotel_name')) ? $errors->first('hotel_name') : ''); ?></span>

</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel ID </label>
    <input name="hotel_id" id="hotel_id" type="text" class="form-control" data-error="#err_hotel_id" value="<?php echo e($Hotels->hotel_id); ?>">
    <span id="err_hotel_id"></span>
    <span class="error"><?php echo e(($errors->has('hotel_id')) ? $errors->first('hotel_id') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel Code </label>
    <input name="hotel_code" id="hotel_code" type="text" class="form-control" data-error="#err_hotel_code" value="<?php echo e($Hotels->hotel_code); ?>">
    <span id="err_hotel_code"></span>
    <span class="error"><?php echo e(($errors->has('hotel_code')) ? $errors->first('hotel_code') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel PMS Code </label>
    <input name="pms_code" id="pms_code" type="text" class="form-control" data-error="#err_pms_code" value="<?php echo e($Hotels->pms_code); ?>">
    <span id="err_pms_code"></span>
    <span class="error"><?php echo e(($errors->has('pms_code')) ? $errors->first('pms_code') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel Short Name </label>
    <input name="hotel_short_name" id="hotel_short_name" type="text" class="form-control" data-error="#err_hotel_short_name" value="<?php echo e($Hotels->hotel_short_name); ?>">
    <span id="err_hotel_short_name"></span>
    <span class="error"><?php echo e(($errors->has('hotel_short_name')) ? $errors->first('hotel_short_name') : ''); ?></span>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Hotel Address</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>
        Address 1 </label>
    <input name="address_1" id="address_1" type="text" class="form-control" data-error="#err_address_1" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->address_1); ?><?php endif; ?>">
    <span id="err_address_1"></span>
    <span class="error"><?php echo e(($errors->has('address_1')) ? $errors->first('address_1') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Address 2 </label>
    <input name="address_2" id="address_2" type="text" class="form-control" data-error="#err_address_2" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->address_2); ?><?php endif; ?>">
    <span id="err_address_2"></span>
    <span class="error"><?php echo e(($errors->has('address_2')) ? $errors->first('address_2') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Address 3</label>
    <input name="address_3" id="address_3" type="text" class="form-control" data-error="#err_address_3" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->address_3); ?><?php endif; ?>">
    <span id="err_address_3"></span>
    <span class="error"><?php echo e(($errors->has('address_3')) ? $errors->first('address_3') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Country </label>
    <br/>
    <select class="form-control airport_list10 required" name="country" id="country" data-error="#err_country">
        <option value="">Choose</option>
        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($cntry->id); ?>" <?php if($HodelAddress): ?> <?php if($cntry->id==$HodelAddress->country): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($cntry->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <!-- <input name="country" id="country" type="text" class="form-control" data-error="#err_country" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->country); ?><?php endif; ?>"> -->
    <span id="err_country"></span>
    <span class="error"><?php echo e(($errors->has('country')) ? $errors->first('country') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>State / Region </label>
    <select class="form-control airport_list11 required" name="state" id="state" data-error="#err_country">
        <option value="">Choose</option>
        <?php if($states): ?> <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($state->id); ?>" <?php if($HodelAddress): ?> <?php if($state->id==$HodelAddress->state): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($state->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
    </select>
    <span id="err_state"></span>
    <span class="error"><?php echo e(($errors->has('state')) ? $errors->first('state') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>City </label>
    <select class="form-control airport_list12 required" name="city" id="city" data-error="#err_city">
        <option value="">Choose</option>
        <?php if($cities): ?> <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($city->id); ?>" <?php if($HodelAddress): ?> <?php if($city->id==$HodelAddress->city): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($city->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
    </select>
    <span id="err_city"></span>
    <span class="error"><?php echo e(($errors->has('city')) ? $errors->first('city') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Zip Code / Postal Code </label>
    <input name="zip_code" id="zip_code" type="text" class="form-control" data-error="#err_zip_code" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->postcode); ?><?php endif; ?>">
    <span id="err_zip_code"></span>
    <span class="error"><?php echo e(($errors->has('zip_code')) ? $errors->first('zip_code') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Latitude </label>
    <input name="latitude" id="latitude" type="text" class="form-control" data-error="#err_latitude" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->latitude); ?><?php endif; ?>">
    <span id="err_latitude"></span>
    <span class="error"><?php echo e(($errors->has('latitude')) ? $errors->first('latitude') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Longitude</label>
    <input name="longitude" id="longitude" type="text" class="form-control" data-error="#err_longitude" value="<?php if($HodelAddress): ?><?php echo e($HodelAddress->longitude); ?><?php endif; ?>">
    <span id=""></span>
    <span class="error"><?php echo e(($errors->has('longitude')) ? $errors->first('longitude') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12" id="dvMap" style=" height: 300px"></div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Hotel Contacts</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Main Phone </label>
    <input name="main_phone" id="main_phone" type="text" class="form-control" data-error="#err_main_phone" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->main_phone); ?><?php endif; ?>">
    <span id="err_main_phone"></span>
    <span class="error"><?php echo e(($errors->has('main_phone')) ? $errors->first('main_phone') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Second Phone </label>
    <input name="second_phone" id="second_phone" type="text" class="form-control" data-error="#err_second_phone" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->second_phone); ?><?php endif; ?>">
    <span id="err_second_phone"></span>
    <span class="error"><?php echo e(($errors->has('second_phone')) ? $errors->first('second_phone') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Fax </label>
    <input name="fax" id="fax" type="text" class="form-control" data-error="#err_fax" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->fax); ?><?php endif; ?>">
    <span id="err_fax"></span>
    <span class="error"><?php echo e(($errors->has('fax')) ? $errors->first('fax') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Email </label>
    <input name="email" id="email" type="text" class="form-control" data-error="#err_email" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->email); ?><?php endif; ?>">
    <span id="err_email"></span>
    <span class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Website Url </label>
    <input name="url" id="url" type="text" class="form-control" data-error="#err_url" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->url); ?><?php endif; ?>">
    <span id="err_url"></span>
    <span class="error"><?php echo e(($errors->has('url')) ? $errors->first('url') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Reservation Delivery Email Address</span></label>
    <input name="r_d_email" id="r_d_email" type="text" class="form-control" data-error="#err_r_d_email" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->r_d_email); ?><?php endif; ?>">
    <span iderr_r_d_email></span>
    <span class="error"><?php echo e(($errors->has('r_d_email')) ? $errors->first('r_d_email') : ''); ?></span>
</div>
</div>
<!-- <div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="col-sm-12" id="grp_sec"><label><span >Closest Airport</span></label><input name="grp_name" id="grp_name" type="text" class="form-control" data-error="#" >
<span id="" ></span>
<span class="error"><?php echo e(($errors->has('grp_name')) ? $errors->first('grp_name') : ''); ?></span>
</div>
</div>
</div> -->
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Reservation Delivery Email </label>
    <input name="reservation_email" id="reservation_email" type="text" class="form-control" data-error="#err_reservation_email" value="<?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->reservation_email); ?><?php endif; ?>">
    <span id="err_reservation_email"></span>
    <span class="error"><?php echo e(($errors->has('reservation_email')) ? $errors->first('reservation_email') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Reservation Delivery CC Retrieval </label>
    <textarea name="cc_retrieval" id="cc_retrieval" type="text" class="form-control" data-error="#err_cc_retrieval"><?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->cc_retrieval); ?><?php endif; ?></textarea>
    <span id="err_cc_retrieval"></span>
    <span class="error"><?php echo e(($errors->has('cc_retrieval')) ? $errors->first('cc_retrieval') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Depleted Inventory Notification </label>
    <textarea name="inventory_notification" class="form-control" data-error="#err_inventory_notification"><?php if($HotelMainContacts): ?><?php echo e($HotelMainContacts->inventory_notification); ?><?php endif; ?></textarea>
    <span id="err_inventory_notification"></span>
    <span class="error"><?php echo e(($errors->has('inventory_notification')) ? $errors->first('inventory_notification') : ''); ?></span>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Add Contact Person</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="alert alert-success hidden alert-add-user col-md-12 col-lg-12 mtb-15"></div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Title</label>
    <select name="c_title" id="c_title" class="form-control" data-error="#err_c_title">
        <option >Mr</option>
        <option >Mrs</option>
        <option >Ms</option>
    </select>
    <span id="err_c_title" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('c_title')) ? $errors->first('c_title') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>First Name</label>
    <input type="text" name="f_name" id="f_name" class="form-control" data-error="err_f_name" >
    <span id="err_f_name" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('f_name')) ? $errors->first('f_name') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="l_name" id="l_name" class="form-control" data-error="err_l_name" >
    <span id="err_l_name" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('l_name')) ? $errors->first('l_name') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Job Title</label>
    <input type="text" id="job_title" name="job_title" class="form-control" data-error="err_job_title" >
    <span id="err_job_title" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('job_title')) ? $errors->first('job_title') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Email address</label>
    <input type="email" name="email_add" class="form-control" id="email_add" data-error="email_add" >
    <span id="err_email_add" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('email_add')) ? $errors->first('email_add') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Contact Number</label>
    <input type="text" id="c_number" name="c_number" class="form-control" data-error="err_c_number" value="" >
    <span id="err_c_number" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('c_number')) ? $errors->first('c_number') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Mobile Number</label>
    <input type="text" name="m_number" class="form-control" id="m_number" data-error="err_m_number" value="" min="1">
    <span id="err_m_number" class="error" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('m_number')) ? $errors->first('m_number') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Contact Purpose</label>
    <select class="form-control" data-error="err_cotact_purpose" name="cotact_purpose" id="cotact_purpose">
        <option >Main Contact</option>
        <option >Billing Contact</option>
        <option >All Sales Contact</option>
        <option >MICE Contacts</option>
        <option >Corporate Contact</option>
        <option >Leisure Contact</option>       
    </select>
    <span id="err_cotact_purpose" class="error" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('cotact_purpose')) ? $errors->first('cotact_purpose') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Request for Portal Login Credentials</label>
    <input type="checkbox" name="login_req" class="form-control" value="Yes" id="login_req" data-error="err_login_req">
    <span id="err_login_req" style="position: relative;
top: -2px;" class="error"></span>
    <span class="error"><?php echo e(($errors->has('login_req')) ? $errors->first('login_req') : ''); ?></span>
</div>
</div>
</div>
 
            <div class="row mt-30 ">
            
            <div class="col-md-2 col-sm-12 col-xs-2 offset-10">                      
            <input class="btn btn-primary btn-center portal-button" type="button" name="submit" id="portaluser" value="Submit"/>
            
            </div>
            </div>
</div>


<?php $i=1;?>
<?php $__currentLoopData = $HotelAdditionalContact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelAdditionalContacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Edit <?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->f_name); ?><?php endif; ?></div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="alert alert-success hidden alert-update-user-<?php echo e($i); ?> col-md-12 col-lg-12 mtb-15"></div>
<input type="hidden" name="cont_id" id="cont_id_<?php echo e($i); ?>" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->id); ?><?php endif; ?>">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Title</label>
    <select name="c_title_<?php echo e($i); ?>" id="c_title_<?php echo e($i); ?>" class="form-control" data-error="#err_c_title">
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->c_title == 'Mr' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Mr</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->c_title == 'Mrs' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Mrs</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->c_title == 'Ms' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Ms</option>
    </select>
    <span id="err_c_title" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('c_title')) ? $errors->first('c_title') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>First Name</label>
    <input type="text" name="f_name_<?php echo e($i); ?>" id="f_name_<?php echo e($i); ?>" class="form-control" data-error="err_f_name" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->f_name); ?><?php endif; ?>">
    <span id="err_f_name" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('f_name')) ? $errors->first('f_name') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="l_name_<?php echo e($i); ?>" id="l_name_<?php echo e($i); ?>" class="form-control" data-error="err_l_name" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->l_name); ?><?php endif; ?>">
    <span id="err_l_name" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('l_name')) ? $errors->first('l_name') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Job Title</label>
    <input type="text" id="job_title_<?php echo e($i); ?>" name="job_title_<?php echo e($i); ?>" class="form-control" data-error="err_job_title" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->job_title); ?><?php endif; ?>">
    <span id="err_job_title" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('job_title')) ? $errors->first('job_title') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Email address</label>
    <input type="email" name="email_add_<?php echo e($i); ?>" class="form-control" id="email_add_<?php echo e($i); ?>" data-error="email_add" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->email_add); ?><?php endif; ?>">
    <span id="err_email_add" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('email_add')) ? $errors->first('email_add') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Contact Number</label>
    <input type="number" id="c_number_<?php echo e($i); ?>" name="c_number_<?php echo e($i); ?>" class="form-control" data-error="err_c_number" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->c_number); ?><?php endif; ?>" min="1">
    <span id="err_c_number" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('c_number')) ? $errors->first('c_number') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Mobile Number</label>
    <input type="number" name="m_number_<?php echo e($i); ?>" class="form-control" id="m_number_<?php echo e($i); ?>" data-error="err_m_number" value="<?php if($HotelAdditionalContacts): ?><?php echo e($HotelAdditionalContacts->m_number); ?><?php endif; ?>" min="1">
    <span id="err_m_number" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('m_number')) ? $errors->first('m_number') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Contact Purpose</label>
    <select class="form-control" data-error="err_cotact_purpose" name="cotact_purpose_<?php echo e($i); ?>" id="cotact_purpose_<?php echo e($i); ?>">
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->cotact_purpose == 'Main Contact' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Main Contact</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->cotact_purpose == 'Billing Contact' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Billing Contact</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->cotact_purpose == 'All Sales Contact' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>All Sales Contact</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->cotact_purpose == 'MICE Contacts' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>MICE Contacts</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->cotact_purpose == 'Corporate Contact' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Corporate Contact</option>
        <option <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->cotact_purpose == 'Leisure Contact' ): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Leisure Contact</option>
        <option></option>
    </select>
    <span id="err_cotact_purpose" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('cotact_purpose')) ? $errors->first('cotact_purpose') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Request for Portal Login Credentials</label>
    <input type="checkbox" name="login_req_<?php echo e($i); ?>" class="form-control" value="Yes" id="login_req_<?php echo e($i); ?>" data-error="err_login_req" <?php if($HotelAdditionalContacts): ?> <?php if($HotelAdditionalContacts->login_req == 'Yes' ): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
    <span id="err_login_req" style="position: relative;
top: -2px;"></span>
    <span class="error"><?php echo e(($errors->has('login_req')) ? $errors->first('login_req') : ''); ?></span>
</div>
</div>
</div>
 
            <div class="row mt-30 ">
            
            <div class="col-md-2 col-sm-12 col-xs-2 offset-10">                      
            <input class="btn btn-primary btn-center portal-button portalupdateuser" type="button" name="submit" id="portalupdateuser_<?php echo e($i); ?>" value="Submit" data-id="<?php echo e($i); ?>"/>
            
            </div>
            </div>
</div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Airport Information</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="col-sm-12 col-md-12 col-lg-12">
<table class="table borderless">
    <thead>
        <td class="text-center">Name</td>
        <td class="text-center">Code</td>
        <td>
            <p class="text-center">Distance to Hotel</p>
            <table width="100%">
                <tr>
                    <td width="50%" class="text-center">km</td>
                    <td width="50%" class="text-center">miles</td>
                </tr>
            </table>
        </td>
        <td>&nbsp;</td>
    </thead>
    <tbody id="airportinfo-form-list">
        <?php $i=0;$total= count($HotelAirportInfo);?>
            <?php $__currentLoopData = $HotelAirportInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelAirportInfos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             <?php if($i<$total): ?> 
            <input type="hidden" value="<?php echo e($HotelAirportInfos->id); ?>" name="airport_id[]">
               
                <tr id="airportinfo-form<?php echo $i;?>">
                    <td >
                        <select id="airportinfo_<?php echo $i;?>" name="airport_name[]" class="airport_list airport_list_btn form-control">
                            <option value="">Choose any one</option>
                            <?php $__currentLoopData = $Airports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Airport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($Airport->id); ?>" <?php if($HotelAirportInfos->airport_name == $Airport->id): ?> selected="selected" <?php endif; ?> ><?php echo e($Airport->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="airport_code[]" id="airport_code_<?php echo $i;?>" class="form-control" value="<?php echo e($HotelAirportInfos->airport_code); ?>">
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="text" name="airport_km[]" class="form-control" value="<?php echo e($HotelAirportInfos->airport_km); ?>">
                                </td>
                                <td>
                                    <input type="text" name="airport_miles[]" class="form-control" value="<?php echo e($HotelAirportInfos->airport_miles); ?>">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                    </td>
                </tr>
                <?php endif; ?>
                <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php for($total;$total<5;$total++): ?> 
                    <tr id="airportinfo-form<?php echo e($total); ?>">
                        <td>
                            <select id="airportinfo_<?php echo e($total); ?>" name="airport_name[]" class="airport_list airport_list_btn form-control">
                                <option value="">Choose any one</option>
                                <?php $__currentLoopData = $Airports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Airport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Airport->id); ?>"><?php echo e($Airport->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="airport_code[]" id="airport_code_<?php echo e($total); ?>" class="form-control">
                        </td>
                        <td>
                            <table class="table">
                                <tr>
                                    <td>
                                        <input type="text" name="airport_km[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="airport_miles[]" class="form-control">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        </td>
                        </tr>
                        <?php endfor; ?>                     
    </tbody>
</table>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Other Details</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Default Currency</span> </label>
    <br/>
    <select class="form-control airport_list5" name="currency" id="currency" data-error="#err_currency">
        <option value="">Choose</option>
        <?php $__currentLoopData = $Currencylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($Currency->code); ?>" <?php if($HotelOtherInfo): ?> <?php if($HotelOtherInfo->currency == $Currency->code ): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($Currency->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span id="err_currency"></span>
    <span class="error"><?php echo e(($errors->has('currency')) ? $errors->first('currency') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Time Zone Country</span></label>
    <br />
    <select class="form-control airport_list6" name="t_zone_country" id="t_zone_country" data-error="#err_t_zone_country">
        <option value="">Choose</option>
        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($cntry->sortname); ?>" <?php if($HotelOtherInfo): ?> <?php if($cntry->sortname==$HotelOtherInfo->t_zone_country): ?> selected="selected" <?php endif; ?> <?php endif; ?> ><?php echo e($cntry->name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span id="err_t_zone_country"></span>
    <span class="error"><?php echo e(($errors->has('t_zone_country')) ? $errors->first('t_zone_country') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Time Zone Location</span></label>
    <?php /*<input name="t_zone_location" id="t_zone_location" type="text" class="form-control" data-error="#err_t_zone_location" value="@if($HotelOtherInfo){{$HotelOtherInfo->t_zone_location}}@endif">*/?>
        <br/>
        <select class="form-control airport_list7" name="t_zone_location" id="t_zone_location" data-error="#err_t_zone_location">
            <option value="">Choose</option>
            <?php $__currentLoopData = $Zone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Timez): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if($HotelOtherInfo): ?> <?php if($HotelOtherInfo->t_zone_location == $Timez->zone_id ): ?> selected="selected" <?php endif; ?> <?php endif; ?> value="<?php echo e($Timez->zone_id); ?>"><?php echo e($Timez->zone_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span id="err_t_zone_location"></span>
        <span class="error"><?php echo e(($errors->has('t_zone_location')) ? $errors->first('t_zone_location') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Time Zone Offset</span></label>
    <br />
    <select name="t_zone_offset" class="airport_list8 form-control" id="t_zone_offset" data-error="#err_t_zone_offset">
        <option value="">Choose</option>
        <?php if($HotelOtherInfo){?>
            <option value="<?php echo e($HotelOtherInfo->t_zone_offset); ?>"><?php echo e($HotelOtherInfo->t_zone_offset); ?></option>
            <?php }?>
    </select>
    <span id="err_t_zone_offset"></span>
    <span class="error"><?php echo e(($errors->has('t_zone_offset')) ? $errors->first('t_zone_offset') : ''); ?></span>
</div>
</div>
</div>
</div>
<!-- Tab -1 End -->
</div>
</div>
<!-- Channel Assignments Start -->
<div class="tab-pane" id="tab01">
<div id="contact_section">
<div class="col-lg-12 cform" id="contact_add_form0">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15">
<h1>Property Info</h1>
</div>
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15 text-right">
<a href="<?php echo e(url('hotelier/export-property-info')); ?>/xlsx/<?php echo e($Hotels->id); ?>" class="btn-outline-inverse-info btn btn-lg">Export Property Info</a>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Property Attributes</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" style="display: block;">
<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Type </label>
            <select class="form-control" name="property_type" id="property_type" data-error="#err_property_type">
                <option value="">-Select-</option>
                <?php $__currentLoopData = $CategoryPropertyType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryPropertyTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryPropertyTypes->short_name); ?>" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->property_type==$CategoryPropertyTypes->short_name): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($CategoryPropertyTypes->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_property_type"></span>
            <span class="error"><?php echo e(($errors->has('property_type')) ? $errors->first('property_type') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Type2</label>
            <select class="form-control" name="property_type2" id="property_type2">
                <option value="">-Select-</option>
                <?php $__currentLoopData = $CategoryPropertyType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryPropertyTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryPropertyTypes->short_name); ?>" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->property_type2==$CategoryPropertyTypes->short_name): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($CategoryPropertyTypes->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id=""></span>
            <span class="error"><?php echo e(($errors->has('property_type2')) ? $errors->first('property_type2') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Type3</label>
            <select class="form-control" name="property_type3" id="property_type3">
                <option value="">-Select-</option>
                <?php $__currentLoopData = $CategoryPropertyType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryPropertyTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryPropertyTypes->short_name); ?>" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->property_type3==$CategoryPropertyTypes->short_name): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($CategoryPropertyTypes->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id=""></span>
            <span class="error"><?php echo e(($errors->has('property_type3')) ? $errors->first('property_type3') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Location Type </label>
            <select class="form-control" name="location_type" id="location_type" data-error="err_location_type">
                <option value="">
                    ---Choose---
                </option>
                <option  value="AIR" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->location_type=="AIR"): ?> selected <?php endif; ?> <?php endif; ?>>Airport</option>
                    <option value="DWT" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->location_type=="DWT"): ?> selected <?php endif; ?> <?php endif; ?>>Downtown</option>
                    <option value="HWY" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->location_type=="HWY"): ?> selected <?php endif; ?> <?php endif; ?>>Highway</option>
                    <option value="RST" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->location_type=="RST"): ?> selected <?php endif; ?> <?php endif; ?>>Resort</option>
                    <option value="SUB" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->location_type=="SUB"): ?> selected <?php endif; ?> <?php endif; ?>>Suburban</option>
                
            </select>
            <span id="err_location_type"></span>
            <span class="error"><?php echo e(($errors->has('location_type')) ? $errors->first('location_type') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Alerts Email Address </label>
            <input name="alert_email" id="alert_email" type="text" class="form-control" data-error="#err_alert_email" value="<?php if($HotelPropertyAttributes): ?> <?php echo e($HotelPropertyAttributes->alert_email); ?> <?php endif; ?>">
            <span id="err_alert_email"></span>
            <span class="error"><?php echo e(($errors->has('alert_email')) ? $errors->first('alert_email') : ''); ?></span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Property Email From Address</label>
            <input name="property_email" id="property_email" type="text" class="form-control" data-error="#err_property_email" value="<?php if($HotelPropertyAttributes): ?> <?php echo e($HotelPropertyAttributes->property_email); ?> <?php endif; ?>">
            <span id="err_property_email"></span>
            <span class="error"><?php echo e(($errors->has('property_email')) ? $errors->first('property_email') : ''); ?></span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Guest Email From Address</label>
            <input name="guest_email" id="guest_email" type="text" class="form-control" data-error="#err_guest_email" value="<?php if($HotelPropertyAttributes): ?> <?php echo e($HotelPropertyAttributes->guest_email); ?> <?php endif; ?>">
            <span id="err_guest_email"></span>
            <span class="error"><?php echo e(($errors->has('guest_email')) ? $errors->first('guest_email') : ''); ?></span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Res Delivery Email Address</label>
            <input name="res_del_email" id="res_del_email" type="text" class="form-control" data-error="#err_res_del_email" value="<?php if($HotelPropertyAttributes): ?> <?php echo e($HotelPropertyAttributes->res_del_email); ?> <?php endif; ?>">
            <span id="err_res_del_email"></span>
            <span class="error"><?php echo e(($errors->has('res_del_email')) ? $errors->first('res_del_email') : ''); ?></span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Res Delivery Fax Number</label>
            <input name="res_del_fax" id="res_del_fax" type="text" class="form-control" data-error="#err_res_del_fax" value="<?php if($HotelPropertyAttributes): ?> <?php echo e($HotelPropertyAttributes->res_del_fax); ?> <?php endif; ?>">
            <span id="err_res_del_fax"></span>
            <span class="error"><?php echo e(($errors->has('res_del_fax')) ? $errors->first('res_del_fax') : ''); ?></span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Hotel Uses Promotional Pricing </label>
            <input name="pprice" id="price" type="checkbox" class="form-control" value="true" <?php if($HotelPropertyAttributes): ?> <?php if($HotelPropertyAttributes->price=='true'): ?> selected <?php endif; ?> <?php endif; ?>">
            <!-- <span id="err_price" ></span> -->
            <span class="error"><?php echo e(($errors->has('price')) ? $errors->first('price') : ''); ?></span>

        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Area Information</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Area Attractions</label>
            <textarea name="area_attractions" id="area_attractions" data-error="#err_area_attractions" class="form-control"><?php if($HotelAreaInfo): ?> <?php echo e($HotelAreaInfo->area_attractions); ?> <?php endif; ?></textarea>
            <span id="err_area_attractions"></span>
            <span class="error"><?php echo e(($errors->has('area_attractions')) ? $errors->first('area_attractions') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Corporate Locations</label>
            <textarea name="corporate_locations" id="corporate_locations" data-error="#err_corporate_locations" class="form-control"><?php if($HotelAreaInfo): ?> <?php echo e($HotelAreaInfo->corporate_locations); ?> <?php endif; ?></textarea>
            <span id="err_corporate_locations"></span>
            <span class="error"><?php echo e(($errors->has('corporate_locations')) ? $errors->first('corporate_locations') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Hotel Location Description</label>
            <textarea name="h_loc_desc" id="h_loc_desc" class="form-control" data-error="#err_h_loc_desc"><?php if($HotelAreaInfo): ?> <?php echo e($HotelAreaInfo->h_loc_desc); ?> <?php endif; ?></textarea>
            <span id="err_h_loc_desc"></span>
            <span class="error"><?php echo e(($errors->has('h_loc_desc')) ? $errors->first('h_loc_desc') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Dining </div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <h4>Restaurant</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <div class="alert alert-success resturant-status hidden"></div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="dinning" id="dinning" data-error="#err_dinning" class="form-control">
            <span id="err_dinning" class="error"></span>
            <span class="error"><?php echo e(($errors->has('dinning')) ? $errors->first('dinning') : ''); ?></span>
        </div>
        <div class="form-group">
            <label>Meal Plan</label>
            <select name="meal_plan" id="meal_plan" class="form-control" data-error="#err_meal_plan">
                <option value="">Select</option>
                <?php $__currentLoopData = $CategoryMealPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryMealPlans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryMealPlans->title); ?>"><?php echo e($CategoryMealPlans->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_meal_plan" class="error"></span>
            <span class="error"><?php echo e(($errors->has('meal_plan')) ? $errors->first('meal_plan') : ''); ?></span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="res_description" id="res_description" data-error="#err_res_description" class="form-control"></textarea>
            <span id="err_res_description" class="error"></span>
            <span class="error"><?php echo e(($errors->has('res_description')) ? $errors->first('res_description') : ''); ?></span>
        </div>
        <div class="form-group">
            <label style="margin-top: 4px">
                <input type="checkbox" value="true" name="res_breakfast">
            </label>&nbsp; Breakfast &nbsp;&nbsp;&nbsp;
            <label style="margin-top: 4px">
                <input type="checkbox" value="true" name="res_lunch">
            </label>&nbsp; Lunch &nbsp;&nbsp;&nbsp;
            <label style="margin-top: 4px">
                <input type="checkbox" value="true" name="res_dinner">
            </label>&nbsp; Dinner &nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <!--  <ul class="nav nav-tabs custom-nav" role="tablist">
<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span>Restaurant</span></a></li>
<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span>Breakfast</span></a></li>
<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span>Lunch </span></a></li>
<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span>Dinner</span></a></li> 

</ul>-->
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                <h3>Opening Hours</h3>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Opening
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Closing
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="monhourlist">
                                        <tr id="monhour0">
                                            <td>
                                                <input type="text" name="res_open_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_monday')) ? $errors->first('res_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_monday')) ? $errors->first('res_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonemonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Tuesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="tuesdayhourlist">
                                        <tr id="tuesdayhour0">
                                            <td>
                                                <input type="text" name="res_open_tuesday[]" class="form-control timepicker" value="<?php if($HotelDiningEntertainmentResOpenTime): ?> <?php echo e($HotelDiningEntertainmentResOpenTime->res_open_tuesday); ?> <?php endif; ?>">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_monday')) ? $errors->first('res_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_monday')) ? $errors->first('res_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonetuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Wednesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="wednesdayhourlist">
                                        <tr id="wednesdayhour0">
                                            <td>
                                                <input type="text" name="res_open_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_wednesday')) ? $errors->first('res_open_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_wednesday')) ? $errors->first('res_close_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonewednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Thursday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="thursdayhourlist">
                                        <tr id="thursdayhour0">
                                            <td>
                                                <input type="text" name="res_open_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_thursday')) ? $errors->first('res_open_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_thursday')) ? $errors->first('res_close_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonethursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Friday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="fridayhourlist">
                                        <tr id="fridayhour0">
                                            <td>
                                                <input type="text" name="res_open_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_friday')) ? $errors->first('res_open_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_friday')) ? $errors->first('res_close_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonefridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Saturday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="saturdayhourlist">
                                        <tr id="saturdayhour0">
                                            <td>
                                                <input type="text" name="res_open_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_saturday')) ? $errors->first('res_open_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_saturday')) ? $errors->first('res_close_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonesaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Sunday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="sundayhourlist">
                                        <tr id="sundayhour0">
                                            <td>
                                                <input type="text" name="res_open_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_sunday')) ? $errors->first('res_open_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_close_sunday')) ? $errors->first('res_close_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonesundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12  text-right"><a href="javascript:void(0);" id="Save-Restaurant" class="btn-primary btn btn-lg">Save Restaurant</a></div>
    <?php $__currentLoopData = $HotelDiningEntertainmentRestaurant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelDERes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--Start Edit Restaurant Start-->
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 " style="background: #ccc; padding: 15px;">
        <h4>Edit Restaurant ( <?php echo e($HotelDERes->title); ?> )</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <div class="alert alert-success resturant-status hidden"></div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="dinning<?php echo e($HotelDERes->id); ?>" id="dinning<?php echo e($HotelDERes->id); ?>" data-error="#err_dinning" class="form-control" value="<?php echo e($HotelDERes->title); ?>">
            <span id="err_dinning" class="error"></span>
            <span class="error"><?php echo e(($errors->has('dinning')) ? $errors->first('dinning') : ''); ?></span>
        </div>
        <div class="form-group">
            <label>Meal Plan</label>
            <select name="meal_plan<?php echo e($HotelDERes->id); ?>" id="meal_plan<?php echo e($HotelDERes->id); ?>" class="form-control" data-error="#err_meal_plan">
                <option value="">Select</option>
                <?php $__currentLoopData = $CategoryMealPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryMealPlans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryMealPlans->title); ?>" <?php if($HotelDERes->meal_plan == $CategoryMealPlans->title): ?> selected="selected" <?php endif; ?> ><?php echo e($CategoryMealPlans->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_meal_plan" class="error"></span>
            <span class="error"><?php echo e(($errors->has('meal_plan')) ? $errors->first('meal_plan') : ''); ?></span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="res_description<?php echo e($HotelDERes->id); ?>" id="res_description<?php echo e($HotelDERes->id); ?>" data-error="#err_res_description" class="form-control"><?php echo e($HotelDERes->res_description); ?></textarea>
            <span id="err_res_description" class="error"></span>
            <span class="error"><?php echo e(($errors->has('res_description')) ? $errors->first('res_description') : ''); ?></span>
        </div>
        <div class="form-group">
            <label style="margin-top: 4px">
                <input type="checkbox" value="true" name="res_breakfast<?php echo e($HotelDERes->id); ?>" id="res_breakfast<?php echo e($HotelDERes->id); ?>" <?php if($HotelDERes->res_breakfast=='true'): ?> checked="checked" <?php endif; ?>></label>&nbsp; Breakfast &nbsp;&nbsp;&nbsp;
            <label style="margin-top: 4px">
                <input type="checkbox" value="true" name="res_lunch<?php echo e($HotelDERes->id); ?>" id="res_lunch<?php echo e($HotelDERes->id); ?>" <?php if($HotelDERes->res_lunch=='true'): ?> checked="checked" <?php endif; ?>></label>&nbsp; Lunch &nbsp;&nbsp;&nbsp;
            <label style="margin-top: 4px">
                <input type="checkbox" value="true" name="res_dinner<?php echo e($HotelDERes->id); ?>" id="res_dinner<?php echo e($HotelDERes->id); ?>" <?php if($HotelDERes->res_dinner=='true'): ?> checked="checked" <?php endif; ?>></label>&nbsp; Dinner &nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                <h3>Opening Hours</h3>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Opening
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Closing
                            </div>
                            <?php $__empty_1 = true; $__currentLoopData = $HotelDERes->getResTime(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelDEResTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicmonhourlist">
                                        <?php 
$break_close_monday=explode(',', $HotelDEResTime->break_close_monday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_monday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_monday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicmonhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_monday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_monday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_monday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_monday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Tuesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublictuesdayhourlist">
                                        <?php 
$break_close_tuesday=explode(',', $HotelDEResTime->break_close_tuesday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_tuesday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_tuesday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublictuesdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="break_open_tuesday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_tuesday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_tuesday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_tuesday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Wednesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicwednesdayhourlist">
                                        <?php 
$break_close_wednesday=explode(',', $HotelDEResTime->break_close_wednesday);
$i = 0;
?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_wednesday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_wednesday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicwednesdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="break_open_wednesday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_wednesday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_wednesday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_wednesday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Thursday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicthursdayhourlist">
                                        <?php 
$break_close_thursday=explode(',', $HotelDEResTime->break_close_thursday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_thursday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_thursday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="ediypublicthursdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="break_open_thursday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_thursday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_thursday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_thursday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Friday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicfridayhourlist">
                                        <?php 
$break_close_friday=explode(',', $HotelDEResTime->public_close_friday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_friday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_friday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicfridayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="break_open_friday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_friday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_friday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_friday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Saturday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsaturdayhourlist">
                                        <?php 
$break_close_saturday=explode(',', $HotelDEResTime->break_close_saturday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_saturday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_saturday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicsaturdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="break_open_saturday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_saturday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_saturday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_saturday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Sunday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsundayhourlist">
                                        <?php 
$break_close_sunday=explode(',', $HotelDEResTime->break_close_sunday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEResTime->break_open_sunday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $break_open_sunday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicsundayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="break_open_sunday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_open_sunday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_sunday<?php echo e($HotelDERes->id); ?>[]" class="form-control timepicker" value="<?php echo e($break_close_sunday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicmonhourlist">
                                        <tr id="publicmonhour0">
                                            <td>
                                                <input type="text" name="break_open_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_open_monday')) ? $errors->first('break_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_monday')) ? $errors->first('break_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Tuesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publictuesdayhourlist">
                                        <tr id="publictuesdayhour0">
                                            <td>
                                                <input type="text" name="break_open_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_open_tuesday')) ? $errors->first('break_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_tuesday')) ? $errors->first('public_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Wednesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicwednesdayhourlist">
                                        <tr id="publicwednesdayhour0">
                                            <td>
                                                <input type="text" name="break_open_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_open_wednesday')) ? $errors->first('public_open_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_wednesday')) ? $errors->first('break_close_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Thursday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicthursdayhourlist">
                                        <tr id="publicthursdayhour0">
                                            <td>
                                                <input type="text" name="break_open_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_open_thursday')) ? $errors->first('break_open_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_thursday')) ? $errors->first('break_close_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Friday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicfridayhourlist">
                                        <tr id="publicfridayhour0">
                                            <td>
                                                <input type="text" name="break_open_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_open_friday')) ? $errors->first('break_open_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_friday')) ? $errors->first('break_close_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Saturday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsaturdayhourlist">
                                        <tr id="publicsaturdayhour0">
                                            <td>
                                                <input type="text" name="break_open_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_open_saturday')) ? $errors->first('break_open_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_saturday')) ? $errors->first('break_close_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Sunday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsundayhourlist">
                                        <tr id="publicsundayhour0">
                                            <td>
                                                <input type="text" name="break_open_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_sunday')) ? $errors->first('public_open_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('break_close_sunday')) ? $errors->first('break_close_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 offset-10 ">
       <!--  <a href="javascript:void(0);" id="updateRestaurant" class="btn btn-primary btn-lg">Update Restaurant</a> -->
       <input type="button" name="updateRestaurant" id="<?php echo e($HotelDERes->id); ?>" class="btn btn-primary btn-lg updateRestaurant" value="Update Restaurant" placeholder="Update Restaurant">
    </div>
    <!--End Edit Restaurant Start-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15" style="background: #ccc; padding: 15px;">
        <h4>Bar</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <div class="alert alert-success bar-status hidden"></div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="form-group">
            <label>Name</label>
            <input name="bar_name" id="bar_name" data-error="#err_bar_name" class="form-control ">
            <span id="err_bar_name" class="error"></span>
            <span class="error"><?php echo e(($errors->has('bar_name')) ? $errors->first('bar_name') : ''); ?></span>
        </div>
        <div class="form-group">
            <label style="margin-top: 4px;"><input type="checkbox" value="true" name="child_friendly"></label>
            &nbsp;Tick if the bar child friendly
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="bar_description" id="bar_description" class="form-control" data-error="#err_bar_description"></textarea>
            <span id="err_bar_description" class="error"></span>
        </div>
        <div class="form-group">
            <label style="margin-top: 5px;">
                <input type="checkbox" name="bar_public" value="true">
            </label>&nbsp;Public &nbsp;&nbsp;&nbsp;
            <label style="margin-top: 5px;">
                <input type="checkbox" name="bar_guest" value="true">
            </label>&nbsp;In House Guest
        </div>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <!-- <ul class="nav nav-tabs custom-nav" role="tablist">
<li role="presentation" class="active"><a href="#public" aria-controls="public" role="tab" data-toggle="tab"><span>Public</span></a></li>
<li role="presentation"><a href="#guest" aria-controls="guest" role="tab" data-toggle="tab"><span>In House Guest</span></a></li>

</ul> -->
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="public">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                <h3>Opening Hours</h3>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Opening
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Closing
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicmonhourlist">
                                        <tr id="publicmonhour0">
                                            <td>
                                                <input type="text" name="public_open_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_monday')) ? $errors->first('public_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_monday')) ? $errors->first('public_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Tuesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publictuesdayhourlist">
                                        <tr id="publictuesdayhour0">
                                            <td>
                                                <input type="text" name="public_open_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_tuesday')) ? $errors->first('public_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_tuesday')) ? $errors->first('public_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Wednesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicwednesdayhourlist">
                                        <tr id="publicwednesdayhour0">
                                            <td>
                                                <input type="text" name="public_open_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_wednesday')) ? $errors->first('public_open_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_wednesday')) ? $errors->first('public_close_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Thursday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicthursdayhourlist">
                                        <tr id="publicthursdayhour0">
                                            <td>
                                                <input type="text" name="public_open_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_thursday')) ? $errors->first('public_open_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_thursday')) ? $errors->first('public_close_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Friday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicfridayhourlist">
                                        <tr id="publicfridayhour0">
                                            <td>
                                                <input type="text" name="public_open_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_friday')) ? $errors->first('public_open_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_friday')) ? $errors->first('public_close_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Saturday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsaturdayhourlist">
                                        <tr id="publicsaturdayhour0">
                                            <td>
                                                <input type="text" name="public_open_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_saturday')) ? $errors->first('public_open_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_saturday')) ? $errors->first('public_close_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Sunday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsundayhourlist">
                                        <tr id="publicsundayhour0">
                                            <td>
                                                <input type="text" name="public_open_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_sunday')) ? $errors->first('public_open_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_sunday')) ? $errors->first('public_close_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mtb-15 text-right"><a href="javascript:void(0);" id="Save-Bar" class="btn-primary btn btn-lg">Save Bar</a></div>
    <?php $__currentLoopData = $HotelDiningEntertainmentBar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelDEBar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15" style="background: #ccc; padding: 15px;">
        <h4>Edit Bar <?php echo e($HotelDEBar->bar_name); ?></h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <div class="alert alert-success bar-status hidden"></div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="form-group">
            <label>Name</label>
            <input name="bar_name" id="bar_name" data-error="#err_bar_name" class="form-control " value="<?php echo e($HotelDEBar->bar_name); ?>">
        </div>
        <div class="form-group">

            <label style="margin-top: 4px;">
            <input type="checkbox" value="true" name="child_friendly" <?php if($HotelDEBar->child_friendly=='true'): ?> checked="checked" <?php endif; ?>></label> &nbsp;Tick if the bar child friendly
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="bar_description" id="bar_description" class="form-control" data-error="#err_bar_description"><?php echo e($HotelDEBar->bar_description); ?></textarea>
            <span id="err_bar_description" class="error"></span>
        </div>
        <div class="form-group">
            <label style="margin-top: 5px;">
                <input type="checkbox" name="bar_public" value="true" <?php if($HotelDEBar->bar_public=='true'): ?> checked="checked" <?php endif; ?>></label>&nbsp; Public &nbsp;&nbsp;&nbsp;
            <label style="margin-top: 5px;">
                <input type="checkbox" name="bar_guest" value="true" <?php if($HotelDEBar->bar_guest=='true'): ?> checked="checked" <?php endif; ?>></label>&nbsp; In House Guest &nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="public">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                <h3>Opening Hours</h3>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Opening
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4 mtb-15">
                                Closing
                            </div>
                            <?php $__empty_1 = true; $__currentLoopData = $HotelDEBar->getBarTime(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelDEBarTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicmonhourlist">
                                        <?php 
$public_close_monday=explode(',', $HotelDEBarTime->public_close_monday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_monday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_monday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicmonhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_monday[]" class="form-control timepicker" value="<?php echo e($public_open_monday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_monday[]" class="form-control timepicker" value="<?php echo e($public_close_monday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Tuesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublictuesdayhourlist">
                                        <?php 
$public_close_tuesday=explode(',', $HotelDEBarTime->public_close_tuesday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_tuesday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_tuesday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublictuesdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_tuesday[]" class="form-control timepicker" value="<?php echo e($public_open_tuesday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_tuesday[]" class="form-control timepicker" value="<?php echo e($public_close_tuesday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <!--  <tr id="publictuesdayhour0"><td><input type="text" name="public_open_tuesday[]" class="form-control timepicker">
</td><td>
   <input type="text" name="public_close_tuesday[]" class="form-control timepicker" >

</td><td><button id="clonepublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button></td></tr> -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Wednesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicwednesdayhourlist">
                                        <?php 
$public_close_wednesday=explode(',', $HotelDEBarTime->public_close_wednesday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_wednesday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_wednesday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicwednesdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_wednesday[]" class="form-control timepicker" value="<?php echo e($public_open_wednesday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_wednesday[]" class="form-control timepicker" value="<?php echo e($public_close_wednesday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <!-- <tr id="publicwednesdayhour0"><td><input type="text" name="public_open_wednesday[]" class="form-control timepicker"></td><td>
<input type="text" name="public_close_wednesday[]" class="form-control timepicker">

</td><td><button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button></td></tr> -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Thursday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicthursdayhourlist">
                                        <!-- <tr id="publicthursdayhour0"><td><input type="text" name="public_open_thursday[]" class="form-control timepicker" >
</td><td>
   <input type="text" name="public_close_thursday[]" class="form-control timepicker" >

</td><td><button id="clonepublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button></td></tr> -->
                                        <?php 
$public_close_thursday=explode(',', $HotelDEBarTime->public_close_thursday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_thursday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_thursday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="ediypublicthursdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_thursday[]" class="form-control timepicker" value="<?php echo e($public_open_thursday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_thursday[]" class="form-control timepicker" value="<?php echo e($public_close_thursday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Friday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicfridayhourlist">
                                        <!-- <tr id="publicfridayhour0"><td><input type="text" name="public_open_friday[]" class="form-control timepicker">
</td><td>
<input type="text" name="public_close_friday[]" class="form-control timepicker" >

</td><td><button id="clonepublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button></td></tr> -->
                                        <?php 
$public_close_friday=explode(',', $HotelDEBarTime->public_close_friday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_friday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_friday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicfridayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_friday[]" class="form-control timepicker" value="<?php echo e($public_open_friday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_friday[]" class="form-control timepicker" value="<?php echo e($public_close_friday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Saturday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsaturdayhourlist">
                                        <!--  <tr id="publicsaturdayhour0"><td><input type="text" name="public_open_saturday[]" class="form-control timepicker" >
</td><td>
<input type="text" name="public_close_saturday[]" class="form-control timepicker" >

</td><td><button id="clonepublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button></td></tr> -->
                                        <?php 
$public_close_saturday=explode(',', $HotelDEBarTime->public_close_saturday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_saturday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_saturday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicsaturdayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_saturday[]" class="form-control timepicker" value="<?php echo e($public_open_saturday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_saturday[]" class="form-control timepicker" value="<?php echo e($public_close_saturday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Sunday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsundayhourlist">
                                        <!--    <tr id="publicsundayhour0"><td><input type="text" name="public_open_sunday[]" class="form-control timepicker" >                
</td><td>
<input type="text" name="public_close_sunday[]" class="form-control timepicker" >              
</td><td><button id="clonepublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button></td></tr> -->
                                        <?php 
$public_close_sunday=explode(',', $HotelDEBarTime->public_close_sunday);
$i = 0;?>
                                            <?php $__currentLoopData = explode(',',$HotelDEBarTime->public_open_sunday); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_open_sunday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="editpublicsundayhour<?php echo e($i); ?>">
                                                <td>
                                                    <input type="text" name="public_open_sunday[]" class="form-control timepicker" value="<?php echo e($public_open_sunday); ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_sunday[]" class="form-control timepicker" value="<?php echo e($public_close_sunday[$i]); ?>">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicmonhourlist">
                                        <tr id="publicmonhour0">
                                            <td>
                                                <input type="text" name="public_open_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_monday')) ? $errors->first('public_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_monday')) ? $errors->first('public_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Tuesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publictuesdayhourlist">
                                        <tr id="publictuesdayhour0">
                                            <td>
                                                <input type="text" name="public_open_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_tuesday')) ? $errors->first('public_open_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_tuesday')) ? $errors->first('public_close_monday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Wednesday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicwednesdayhourlist">
                                        <tr id="publicwednesdayhour0">
                                            <td>
                                                <input type="text" name="public_open_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_wednesday')) ? $errors->first('public_open_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_wednesday')) ? $errors->first('public_close_wednesday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Thursday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicthursdayhourlist">
                                        <tr id="publicthursdayhour0">
                                            <td>
                                                <input type="text" name="public_open_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_thursday')) ? $errors->first('public_open_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_thursday')) ? $errors->first('public_close_thursday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Friday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicfridayhourlist">
                                        <tr id="publicfridayhour0">
                                            <td>
                                                <input type="text" name="public_open_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_friday')) ? $errors->first('public_open_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_friday')) ? $errors->first('public_close_friday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Saturday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsaturdayhourlist">
                                        <tr id="publicsaturdayhour0">
                                            <td>
                                                <input type="text" name="public_open_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_open_saturday')) ? $errors->first('public_open_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_saturday')) ? $errors->first('public_close_saturday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Sunday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="publicsundayhourlist">
                                        <tr id="publicsundayhour0">
                                            <td>
                                                <input type="text" name="public_open_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('res_open_sunday')) ? $errors->first('public_open_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error"><?php echo e(($errors->has('public_close_sunday')) ? $errors->first('public_close_sunday') : ''); ?></span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mtb-15 text-right"><a href="javascript:void(0);" id="Update-Bar" class="btn-primary btn btn-lg">Update</a></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Entertainment</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Off Site Entertainment</label>
            <textarea name="off_site_entertainment" id="off_site_entertainment" data-error="#err_off_site_entertainment" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->off_site_entertainment); ?> <?php endif; ?></textarea>
            <span id="err_off_site_entertainment"></span>
            <span class="error"><?php echo e(($errors->has('off_site_entertainment')) ? $errors->first('off_site_entertainment') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Off Site Restaurants</label>
            <textarea name="off_site_restaurants" id="off_site_restaurants" data-error="#err_off_site_restaurants" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->off_site_restaurants); ?> <?php endif; ?></textarea>
            <span id="err_off_site_restaurants"></span>
            <span class="error"><?php echo e(($errors->has('off_site_restaurants')) ? $errors->first('off_site_restaurants') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>On Site Entertainment</label>
            <textarea name="on_site_entertainment" id="on_site_entertainment" data-error="#err_on_site_entertainment" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->on_site_entertainment); ?> <?php endif; ?></textarea>
            <span id="err_on_site_entertainment"></span>
            <span class="error"><?php echo e(($errors->has('on_site_entertainment')) ? $errors->first('on_site_entertainment') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Special Events</label>
            <textarea name="special_events" id="special_events" data-error="#err_special_events" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->special_events); ?> <?php endif; ?></textarea>
            <span id="err_special_events"></span>
            <span class="error"><?php echo e(($errors->has('special_events')) ? $errors->first('special_events') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Other Information</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Weddings</label>
            <textarea name="weddings" id="weddings" data-error="#err_weddings" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->weddings); ?> <?php endif; ?></textarea>
            <span id="err_weddings"></span>
            <span class="error"><?php echo e(($errors->has('weddings')) ? $errors->first('weddings') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Alternate Hotels</label>
            <textarea name="alternate_hotels" id="alternate_hotels" data-error="#err_alternate_hotels" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->alternate_hotels); ?> <?php endif; ?></textarea>
            <span id="err_alternate_hotels"></span>
            <span class="error"><?php echo e(($errors->has('alternate_hotels')) ? $errors->first('alternate_hotels') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>AWARDS</label>
            <textarea name="awards" id="awards" data-error="#awards" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->awards); ?> <?php endif; ?></textarea>
            <span id="err_awards"></span>
            <span class="error"><?php echo e(($errors->has('awards')) ? $errors->first('awards') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Frequent Guest Information</label>
            <textarea name="frequent_guest_information" id="frequent_guest_information" data-error="#err_special_events" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->frequent_guest_information); ?> <?php endif; ?></textarea>
            <span id="err_frequent_guest_information"></span>
            <span class="error"><?php echo e(($errors->has('frequent_guest_information')) ? $errors->first('frequent_guest_information') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>GDS Data</label>
            <textarea name="gds_data" id="gds_data" data-error="#err_gds_data" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->gds_data); ?> <?php endif; ?></textarea>
            <span id="err_gds_data"></span>
            <span class="error"><?php echo e(($errors->has('gds_data')) ? $errors->first('gds_data') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Handicap Facilities</label>
            <textarea name="handicap_facilities" id="handicap_facilities" data-error="#err_handicap_facilities" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->handicap_facilities); ?> <?php endif; ?></textarea>
            <span id="err_handicap_facilities"></span>
            <span class="error"><?php echo e(($errors->has('handicap_facilities')) ? $errors->first('handicap_facilities') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Key Selling Points</label>
            <textarea name="key_selling_points" id="key_selling_points" data-error="#err_key_selling_points" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->key_selling_points); ?> <?php endif; ?></textarea>
            <span id="err_key_selling_points"></span>
            <span class="error"><?php echo e(($errors->has('key_selling_points')) ? $errors->first('key_selling_points') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Miscellaneous</label>
            <textarea name="miscellaneous" id="miscellaneous" data-error="#err_miscellaneous" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->miscellaneous); ?> <?php endif; ?></textarea>
            <span id="err_miscellaneous"></span>
            <span class="error"><?php echo e(($errors->has('miscellaneous')) ? $errors->first('miscellaneous') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Safety</label>
            <textarea name="safety" id="safety" data-error="#err_safety" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->safety); ?> <?php endif; ?></textarea>
            <span id="err_safety"></span>
            <span class="error"><?php echo e(($errors->has('safety')) ? $errors->first('safety') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tour Operators</label>
            <textarea name="tour_operators" id="tour_operators" data-error="#err_tour_operators" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->tour_operators); ?> <?php endif; ?></textarea>
            <span id="err_tour_operators"></span>
            <span class="error"><?php echo e(($errors->has('tour_operators')) ? $errors->first('tour_operators') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Travel Agent Commission</label>
            <textarea name="travel_agent_commission" id="travel_agent_commission" data-error="#err_travel_agent_commission" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->travel_agent_commission); ?> <?php endif; ?></textarea>
            <span id="err_travel_agent_commission"></span>
            <span class="error"><?php echo e(($errors->has('travel_agent_commission')) ? $errors->first('travel_agent_commission') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Chef</label>
            <textarea name="chef" id="chef" data-error="#err_chef" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->chef); ?> <?php endif; ?></textarea>
            <span id="err_chef"></span>
            <span class="error"><?php echo e(($errors->has('chef')) ? $errors->first('chef') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Director Of Sales and Management</label>
            <textarea name="director_of_sales_and_management" id="director_of_sales_and_management" data-error="#err_director_of_sales_and_management" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->director_of_sales_and_management); ?> <?php endif; ?></textarea>
            <span id="err_director_of_sales_and_management"></span>
            <span class="error"><?php echo e(($errors->has('director_of_sales_and_management')) ? $errors->first('director_of_sales_and_management') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>F&B Director</label>
            <textarea name="fb_director" id="fb_director" data-error="#err_fb_director" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->fb_director); ?> <?php endif; ?></textarea>
            <span id="err_fb_director"></span>
            <span class="error"><?php echo e(($errors->has('fb_director')) ? $errors->first('fb_director') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>General Manager</label>
            <textarea name="general_manager" id="general_manager" data-error="#err_general_manager" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->general_manager); ?> <?php endif; ?></textarea>
            <span id="err_general_manager"></span>
            <span class="error"><?php echo e(($errors->has('general_manager')) ? $errors->first('general_manager') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Managing Director</label>
            <textarea name="managing_director" id="managing_director" data-error="#err_managing_director" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->managing_director); ?> <?php endif; ?></textarea>
            <span id="err_managing_director"></span>
            <span class="error"><?php echo e(($errors->has('managing_director')) ? $errors->first('managing_director') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Reservations Manager</label>
            <textarea name="reservations_manager" id="reservations_manager" data-error="#err_reservations_manager" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->reservations_manager); ?> <?php endif; ?></textarea>
            <span id="err_reservations_manager"></span>
            <span class="error"><?php echo e(($errors->has('reservations_manager')) ? $errors->first('reservations_manager') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Rooms Division</label>
            <textarea name="rooms_division" id="rooms_division" data-error="#err_rooms_division" class="form-control"><?php if($HotelMealPlan): ?> <?php echo e($HotelMealPlan->rooms_division); ?> <?php endif; ?></textarea>
            <span id="err_rooms_division"></span>
            <span class="error"><?php echo e(($errors->has('rooms_division')) ? $errors->first('rooms_division') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Policies</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Cancellation/No Show</label>
            <textarea name="cancellation_policy" id="cancellation_policy" data-error="#err_cancellation_policy" class="form-control"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->cancellation_policy); ?> <?php endif; ?></textarea>
            <span id="err_cancellation_policy"></span>
            <span class="error"><?php echo e(($errors->has('cancellation_policy')) ? $errors->first('cancellation_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extended Stay</label>
            <textarea name="extended_stay_policy" id="extended_stay_policy" data-error="#err_extended_stay_policy" class="form-control"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->extended_stay_policy); ?> <?php endif; ?></textarea>
            <span id="err_extended_stay_policy"></span>
            <span class="error"><?php echo e(($errors->has('extended_stay_policy')) ? $errors->first('extended_stay_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extra Charges</label>
            <textarea name="extra_charge_policy" id="extra_charge_policy" data-error="#err_extra_charge_policy" class="form-control"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->extra_charge_policy); ?> <?php endif; ?></textarea>
            <span id="err_extra_charge_policy"></span>
            <span class="error"><?php echo e(($errors->has('extra_charge_policy')) ? $errors->first('extra_charge_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Family Plan</label>
            <textarea name="family_plan_policy" id="family_plan_policy" class="form-control" data-error="#err_family_plan_policy"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->family_plan_policy); ?> <?php endif; ?></textarea>
            <span id="err_family_plan_policy"></span>
            <span class="error"><?php echo e(($errors->has('family_plan_policy')) ? $errors->first('family_plan_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>General Policies</label>
            <textarea name="general_policy" id="general_policy" data-error="#err_general_policy" class="form-control"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->general_policy); ?> <?php endif; ?></textarea>
            <span id="err_general_policy"></span>
            <span class="error"><?php echo e(($errors->has('general_policy')) ? $errors->first('general_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Group Policy</label>
            <textarea name="group_policy" id="group_policy" data-error="err_group_policy" class="form-control"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->group_policy); ?> <?php endif; ?></textarea>
            <span id="err_group_policy"></span>
            <span class="error"><?php echo e(($errors->has('group_policy')) ? $errors->first('group_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Guarantee/Deposit</label>
            <textarea name="guarantee_policy" id="guarantee_policy" class="form-control" data-error="#err_guarantee_policy"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->guarantee_policy); ?> <?php endif; ?></textarea>
            <span id="err_guarantee_policy"></span>
            <span class="error"><?php echo e(($errors->has('guarantee_policy')) ? $errors->first('guarantee_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pet Policy</label>
            <textarea name="pet_policy" id="pet_policy" class="form-control" data-error="#err_pet_policy"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->pet_policy); ?> <?php endif; ?></textarea>
            <span id="err_pet_policy"></span>
            <span class="error"><?php echo e(($errors->has('pet_policy')) ? $errors->first('pet_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Taxes</label>
            <textarea name="taxs_policy" id="taxs_policy" class="form-control" data-error="#err_taxs_policy"><?php if($HotelPolices): ?> <?php echo e($HotelPolices->taxs_policy); ?> <?php endif; ?></textarea>
            <span id="err_taxs_policy"></span>
            <span class="error"><?php echo e(($errors->has('taxs_policy')) ? $errors->first('taxs_policy') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Local Policies</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check In Hour</label>
            <input type="text" name="check_in_hour" id="check_in_hour" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->check_in_hour); ?> <?php endif; ?>" class="form-control">
            <span id="err_check_in_hour" data-error="#err_check_in_hour"></span>
            <span class="error"><?php echo e(($errors->has('check_in_hour')) ? $errors->first('check_in_hour') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check In Minute</label>
            <input type="text" name="check_in_minute" id="check_in_minute" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->check_in_minute); ?> <?php endif; ?>" class="form-control" data-error="#err_check_in_minute">
            <span id="err_check_in_minute"></span>
            <span class="error"><?php echo e(($errors->has('check_in_minute')) ? $errors->first('check_in_minute') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check Out Hour</label>
            <input type="text" name="check_out_hour" id="check_out_hour" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->check_out_hour); ?> <?php endif; ?>" class="form-control" data-error="#err_check_out_hour">
            <span id="err_check_out_hour"></span>
            <span class="error"><?php echo e(($errors->has('check_out_hour')) ? $errors->first('check_out_hour') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check Out Minute</label>
            <input type="text" name="check_out_minute" id="check_out_minute" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->check_out_minute); ?> <?php endif; ?>" class="form-control" data-error="#err_check_out_minute">
            <span id="err_check_out_minute"></span>
            <span class="error"><?php echo e(($errors->has('check_out_minute')) ? $errors->first('check_out_minute') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extra Person Fee</label>
            <input type="text" name="extra_person_fee" id="extra_person_fee" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->extra_person_fee); ?> <?php endif; ?>" class="form-control" data-error="#err_extra_person_fee">
            <span id="err_extra_person_fee"></span>
            <span class="error"><?php echo e(($errors->has('extra_person_fee')) ? $errors->first('extra_person_fee') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extra Child Fee</label>
            <input type="text" name="extra_child_fee" id="extra_child_fee" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->extra_child_fee); ?> <?php endif; ?>" class="form-control" data-error="#err_extra_child_fee">
            <span id="err_extra_child_fee"></span>
            <span class="error"><?php echo e(($errors->has('extra_child_fee')) ? $errors->first('extra_child_fee') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Crib Charge</label>
            <input type="text" name="crib_charge" id="crib_charge" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->crib_charge); ?> <?php endif; ?>" class="form-control" data-error="#err_crib_charge">
            <span id="err_crib_charge"></span>
            <span class="error"><?php echo e(($errors->has('crib_charge')) ? $errors->first('crib_charge') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Adults-only Hotel/No Kids Allowed</label>
            <input type="checkbox" value="true" name="adults_only_hotel_no_kids_allowed" <?php if($HotelLocalPolices): ?> <?php if($HotelLocalPolices->adults_only_hotel_no_kids_allowed=='true'): ?> checked="checked" <?php endif; ?> <?php endif; ?> class="form-control">
            <span id="err_adults_only_hotel_no_kids_allowed"></span>
            <span class="error"><?php echo e(($errors->has('adults_only_hotel_no_kids_allowed')) ? $errors->first('adults_only_hotel_no_kids_allowed') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Kids Stay Free</label>
            <input type="checkbox" value="true" name="kids_stay_free" <?php if($HotelLocalPolices): ?> <?php if($HotelLocalPolices->kids_stay_free=='true'): ?> checked="checked" <?php endif; ?> <?php endif; ?> class="form-control">
            <span id="err_kids_stay_free"></span>
            <span class="error"><?php echo e(($errors->has('kids_stay_free')) ? $errors->first('kids_stay_free') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Early Checkout</label>
            <textarea name="early_checkout" id="early_checkout" data-error="err_early_checkout" class="form-control"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->early_checkout); ?> <?php endif; ?></textarea>
            <span id="err_early_checkout"></span>
            <span class="error"><?php echo e(($errors->has('early_checkout')) ? $errors->first('early_checkout') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Late Checkout</label>
            <textarea name="late_checkout" id="late_checkout" data-error="err_late_checkout" class="form-control"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->late_checkout); ?> <?php endif; ?></textarea>
            <span id="err_late_checkout"></span>
            <span class="error"><?php echo e(($errors->has('late_checkout')) ? $errors->first('late_checkout') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pet Policy</label>
            <textarea name="pet_policy" id="pet_policy" data-error="err_pet_policy" class="form-control"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->pet_policy); ?> <?php endif; ?></textarea>
            <span id="err_pet_policy"></span>
            <span class="error"><?php echo e(($errors->has('pet_policy')) ? $errors->first('pet_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pets Allowed</label>
            <input type="checkbox" value="TRUE" name="pets_allowed" <?php if($HotelLocalPolices): ?> <?php if($HotelLocalPolices->pets_allowed=='TRUE'): ?> checked="checked" <?php endif; ?> <?php endif; ?> class="form-control">
            <span id="err_pets_allowed"></span>
            <span class="error"><?php echo e(($errors->has('pets_allowed')) ? $errors->first('pets_allowed') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pets Free</label>
            <input type="checkbox" value="TRUE" name="Pets_free" <?php if($HotelLocalPolices): ?> <?php if($HotelLocalPolices->Pets_free=='TRUE'): ?> checked="checked" <?php endif; ?> <?php endif; ?> class="form-control">
            <span id="err_Pets_free"></span>
            <span class="error"><?php echo e(($errors->has('Pets_free')) ? $errors->first('Pets_free') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Family Policy</label>
            <textarea name="family_policy" id="family_policy" data-error="err_family_policy" class="form-control"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->family_policy); ?> <?php endif; ?></textarea>
            <span id="err_family_policy"></span>
            <span class="error"><?php echo e(($errors->has('family_policy')) ? $errors->first('family_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Commission Policy</label>
            <textarea name="commission_policy" id="commission_policy" class="form-control" data-error="#err_commission_policy"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->commission_policy); ?> <?php endif; ?></textarea>
            <span id="err_commission_policy"></span>
            <span class="error"><?php echo e(($errors->has('commission_policy')) ? $errors->first('commission_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Commission Percentage</label>
            <input type="text" name="commission_percentage" id="commission_percentage" value="<?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->commission_percentage); ?> <?php endif; ?>" class="form-control" data-error="#err_commission_percentage">
            <span id="err_commission_percentage"></span>
            <span class="error"><?php echo e(($errors->has('commission_percentage')) ? $errors->first('commission_percentage') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Deposit Policy</label>
            <textarea name="deposit_policy" id="deposit_policy" class="form-control" data-error="#err_deposit_policy"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->deposit_policy); ?> <?php endif; ?></textarea>
            <span id="err_deposit_policy"></span>
            <span class="error"><?php echo e(($errors->has('deposit_policy')) ? $errors->first('deposit_policy') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Cancellation Policy</label>
            <textarea name="cancellation_policy" id="cancellation_policy" class="form-control" data-error="#err_cancellation_policy"><?php if($HotelLocalPolices): ?> <?php echo e($HotelLocalPolices->cancellation_policy); ?> <?php endif; ?></textarea>
            <span id="err_taxs_policy"></span>
            <span class="error"><?php echo e(($errors->has('cancellation_policy')) ? $errors->first('cancellation_policy') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Property</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check-In/Check-Out</label>
            <textarea name="property_check_in_out_desc" id="property_check_in_out_desc" class="form-control" data-error="#err_property_check_in_out_desc"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->property_check_in_out_desc); ?> <?php endif; ?></textarea>
            <span id="err_property_check_in_out_desc"></span>
            <span class="error"><?php echo e(($errors->has('property_check_in_out_desc')) ? $errors->first('property_check_in_out_desc') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Description Long</label>
            <textarea name="property_description" id="property_description" data-error="err_property_description" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->property_description); ?> <?php endif; ?></textarea>
            <span id="err_property_description"></span>
            <span class="error"><?php echo e(($errors->has('property_description')) ? $errors->first('property_description') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Description Typical</label>
            <textarea name="property_description_typical" id="property_description_typical" data-error="err_property_description_typical" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->property_description_typical); ?> <?php endif; ?></textarea>
            <span id="err_property_description_typical"></span>
            <span class="error"><?php echo e(($errors->has('property_description_typical')) ? $errors->first('property_description_typical') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Detail</label>
            <textarea name="property_detail" id="property_detail" class="form-control" data-error="#err_property_detail"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->property_detail); ?> <?php endif; ?></textarea>
            <span id="err_property_detail"></span>
            <span class="error"><?php echo e(($errors->has('property_detail')) ? $errors->first('property_detail') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Seasonal Closure</label>
            <textarea name="seasonal_closure" id="seasonal_closure" class="form-control" data-error="#err_seasonal_closure"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->seasonal_closure); ?> <?php endif; ?></textarea>
            <span id="err_seasonal_closure"></span>
            <span class="error"><?php echo e(($errors->has('seasonal_closure')) ? $errors->first('seasonal_closure') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Selling Feature 1</label>
            <textarea name="selling_feature_1" id="selling_feature_1" data-error="#err_selling_feature_1" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->selling_feature_1); ?> <?php endif; ?></textarea>
            <span id="err_selling_feature_1"></span>
            <span class="error"><?php echo e(($errors->has('selling_feature_1')) ? $errors->first('selling_feature_1') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Selling Feature 2</label>
            <textarea name="selling_feature_2" id="selling_feature_2" data-error="#err_selling_feature_2" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->selling_feature_2); ?> <?php endif; ?></textarea>
            <span id="err_selling_feature_2"></span>
            <span class="error"><?php echo e(($errors->has('selling_feature_2')) ? $errors->first('selling_feature_2') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Selling Feature 3</label>
            <textarea name="selling_feature_3" id="selling_feature_3" data-error="#err_selling_feature_3" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->selling_feature_3); ?> <?php endif; ?></textarea>
            <span id="err_selling_feature_3"></span>
            <span class="error"><?php echo e(($errors->has('selling_feature_3')) ? $errors->first('selling_feature_3') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Arrival Room Service</label>
            <textarea name="arrival_room_service" id="arrival_room_service" data-error="#err_arrival_room_service" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->arrival_room_service); ?> <?php endif; ?></textarea>
            <span id="err_arrival_room_service"></span>
            <span class="error"><?php echo e(($errors->has('arrival_room_service')) ? $errors->first('arrival_room_service') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Business Service</label>
            <textarea name="business_service" id="business_service" data-error="#err_business_service" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->business_service); ?> <?php endif; ?></textarea>
            <span id="err_business_service"></span>
            <span class="error"><?php echo e(($errors->has('business_service')) ? $errors->first('business_service') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Facilities</label>
            <textarea name="facilities" id="facilities" data-error="#err_facilities" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->facilities); ?> <?php endif; ?></textarea>
            <span id="err_facilities"></span>
            <span class="error"><?php echo e(($errors->has('facilities')) ? $errors->first('facilities') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Health Club Or Fitness</label>
            <textarea name="health_club_or_fitness" id="health_club_or_fitness" data-error="#err_health_club_or_fitness" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->health_club_or_fitness); ?> <?php endif; ?></textarea>
            <span id="err_health_club_or_fitness"></span>
            <span class="error"><?php echo e(($errors->has('health_club_or_fitness')) ? $errors->first('health_club_or_fitness') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Local Information</label>
            <textarea name="local_information" id="local_information" data-error="#err_local_information" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->local_information); ?> <?php endif; ?></textarea>
            <span id="err_local_information"></span>
            <span class="error"><?php echo e(($errors->has('local_information')) ? $errors->first('local_information') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Meeting Facilities</label>
            <textarea name="meeting_facilities" id="meeting_facilities" data-error="#err_meeting_facilities" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->meeting_facilities); ?> <?php endif; ?></textarea>
            <span id="err_meeting_facilities"></span>
            <span class="error"><?php echo e(($errors->has('meeting_facilities')) ? $errors->first('meeting_facilities') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Recreation</label>
            <textarea name="recreation" id="recreation" data-error="#err_recreation" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->recreation); ?> <?php endif; ?></textarea>
            <span id="err_recreation"></span>
            <span class="error"><?php echo e(($errors->has('recreation')) ? $errors->first('recreation') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Room Amenities</label>
            <textarea name="room_amenities" id="room_amenities" data-error="#err_room_amenities" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->room_amenities); ?> <?php endif; ?></textarea>
            <span id="err_room_amenities"></span>
            <span class="error"><?php echo e(($errors->has('room_amenities')) ? $errors->first('room_amenities') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Services</label>
            <textarea name="services" id="services" data-error="#err_services" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->services); ?> <?php endif; ?></textarea>
            <span id="err_services"></span>
            <span class="error"><?php echo e(($errors->has('services')) ? $errors->first('services') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Shopping Local Attraction</label>
            <textarea name="shopping_local_attraction" id="shopping_local_attraction" data-error="#err_shopping_local_attraction" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->shopping_local_attraction); ?> <?php endif; ?></textarea>
            <span id="err_shopping_local_attraction"></span>
            <span class="error"><?php echo e(($errors->has('shopping_local_attraction')) ? $errors->first('shopping_local_attraction') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Spa</label>
            <textarea name="spa" id="spa" data-error="#err_spa" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->spa); ?> <?php endif; ?></textarea>
            <span id="err_spa"></span>
            <span class="error"><?php echo e(($errors->has('spa')) ? $errors->first('spa') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Directions</label>
            <textarea name="directions" id="directions" data-error="#err_directions" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->directions); ?> <?php endif; ?></textarea>
            <span id="err_directions"></span>
            <span class="error"><?php echo e(($errors->has('directions')) ? $errors->first('directions') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Parking</label>
            <textarea name="parking" id="parking" data-error="#err_parking" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->parking); ?> <?php endif; ?></textarea>
            <span id="err_parking"></span>
            <span class="error"><?php echo e(($errors->has('parking')) ? $errors->first('parking') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tourist Information</label>
            <textarea name="tourist_information" id="tourist_information" data-error="#err_tourist_information" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->tourist_information); ?> <?php endif; ?></textarea>
            <span id="err_tourist_information"></span>
            <span class="error"><?php echo e(($errors->has('tourist_information')) ? $errors->first('tourist_information') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Transfer Information</label>
            <textarea name="transfer_information" id="transfer_information" data-error="#err_transfer_information" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->transfer_information); ?> <?php endif; ?></textarea>
            <span id="err_transfer_information"></span>
            <span class="error"><?php echo e(($errors->has('transfer_information')) ? $errors->first('transfer_information') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Transportation</label>
            <textarea name="transportation" id="transportation" data-error="#err_transportation" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->transportation); ?> <?php endif; ?></textarea>
            <span id="err_transportation"></span>
            <span class="error"><?php echo e(($errors->has('transportation')) ? $errors->first('transportation') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Weather Information</label>
            <textarea name="weather_information" id="weather_information" data-error="#err_weather_information" class="form-control"><?php if($HotelProperty): ?> <?php echo e($HotelProperty->weather_information); ?> <?php endif; ?></textarea>
            <span id="err_weather_information"></span>
            <span class="error"><?php echo e(($errors->has('weather_information')) ? $errors->first('weather_information') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<!--  <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Property Detail</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Selling Feature 1</label>
<textarea name="" class="form-control"></textarea>
<span id="" ></span>
<span class="error"><?php echo e(($errors->has('grp_name')) ? $errors->first('grp_name') : ''); ?></span>
</div>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Selling Feature 2</label>
<textarea name="" class="form-control"></textarea>
<span id="" ></span>
<span class="error"><?php echo e(($errors->has('grp_name')) ? $errors->first('grp_name') : ''); ?></span>
</div>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Selling Feature 3</label>
<textarea name="" class="form-control"></textarea>
<span id="" ></span>
<span class="error"><?php echo e(($errors->has('grp_name')) ? $errors->first('grp_name') : ''); ?></span>
</div>
</div>
</div>

</div>
</div> -->
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Hotel GDS Codes</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Amadues</label>
            <input type="text" name="amadues" id="amadues" class="form-control" data-error="#err_amadues" value="<?php if($HotelGdsCodes): ?> <?php echo e($HotelGdsCodes->amadues); ?> <?php endif; ?>">
            <span id="err_amadues"></span>
            <span class="error"><?php echo e(($errors->has('amadues')) ? $errors->first('amadues') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Galileo/ Apollo</label>
            <input type="text" name="galileo" id="galileo" data-error="#err_galileo" class="form-control" value="<?php if($HotelGdsCodes): ?> <?php echo e($HotelGdsCodes->galileo); ?> <?php endif; ?>">
            <span id="err_galileo"></span>
            <span class="error"><?php echo e(($errors->has('galileo')) ? $errors->first('galileo') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Sabre</label>
            <input type="text" name="sabre" id="sabre" data-error="#err_sabre" class="form-control" value="<?php if($HotelGdsCodes): ?> <?php echo e($HotelGdsCodes->sabre); ?> <?php endif; ?>">
            <span id="err_sabre"></span>
            <span class="error"><?php echo e(($errors->has('sabre')) ? $errors->first('sabre') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Worldspan</label>
            <input type="text" name="worldspan" id="worldspan" data-error="#err_worldspan" class="form-control" value="<?php if($HotelGdsCodes): ?> <?php echo e($HotelGdsCodes->worldspan); ?> <?php endif; ?>">
            <span id="err_worldspan"></span>
            <span class="error"><?php echo e(($errors->has('worldspan')) ? $errors->first('worldspan') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Lanyon</label>
            <input type="text" name="lanyon" id="lanyon" data-error="#err_lanyon" class="form-control" value="<?php if($HotelGdsCodes): ?> <?php echo e($HotelGdsCodes->lanyon); ?> <?php endif; ?>">
            <span id="err_lanyon"></span>
            <span class="error"><?php echo e(($errors->has('lanyon')) ? $errors->first('lanyon') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pegasus</label>
            <input type="text" name="pegasus" id="pegasus" data-error="#err_pegasus" class="form-control" value="<?php if($HotelGdsCodes): ?> <?php echo e($HotelGdsCodes->pegasus); ?> <?php endif; ?>">
            <span id="err_pegasus"></span>
            <span class="error"><?php echo e(($errors->has('pegasus')) ? $errors->first('pegasus') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row" id="gdscodelist">
            <?php $__empty_1 = true; $__currentLoopData = $HotelGdsCodesOther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelGCodesOther): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <input type="hidden" name="gds_code_id[]" value="<?php echo e($HotelGCodesOther->id); ?>">
            <div class="col-sm-10 col-md-4 col-lg-4" id="gds_code0">
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label>Others</label>
                            <input type="text" name="gdsother" id="gdsother" data-error="#err_gdsother" class="form-control" value="<?php echo e($HotelGCodesOther->title); ?>">
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2" style="margin-top:5%">
                        <div class="form-group">
                            <button id="clonegds<?php echo e($HotelGCodesOther->id); ?>" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-sm-10 col-md-4 col-lg-4" id="gds_code0">
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label>Others</label>
                            <input type="text" name="gdsother" id="gdsother" data-error="#err_gdsother" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2" style="margin-top:5%">
                        <div class="form-group">
                            <button id="clonegds" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Channel Assignments End -->

<!-- Channelized Hotel Information Start -->
<div class="tab-pane" id="tab02">
<div id="contact_section">
<div class="col-lg-12 cform" id="contact_add_form0">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15">
<h1>Room Configuration </h1>
</div>
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15 text-right">
<a href="<?php echo e(url('hotelier/export-room-configuration')); ?>/xlsx/<?php echo e($Hotels->id); ?>" class="btn-outline-inverse-info btn btn-lg">Export Room Configuration</a>
</div>


<div class="add_room" style="width:100%">

<div class="add_room_clone">

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Add Details</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class="alert alert-success room-success hidden"></div>
<div class=" row">

<div class="col-md-12 col-lg-12">
<div class="row">       

<div class="col-lg-4 col-sm-4"> 
   <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"> 
    <h4>&nbsp;</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 ">
    
    <div class="form-group">
    <label>Active</label>
    <input type="checkbox" name="add_active" id="add_active" data-error="#err_active" class="form-control">
    <span class="error" id="err_add_active"></span>
    <span class="error"><?php echo e(($errors->has('active')) ? $errors->first('active') : ''); ?></span></div></div>
 <h4 style="padding: 3px;">&nbsp;</h4>
    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Code</label><input type="text" name="add_room_code" id="add_room_code" data-error="#err_add_room_code" class="form-control" required>
    <span class="error" id="err_add_room_code"></span>
    <span class="error"><?php echo e(($errors->has('add_room_code')) ? $errors->first('add_room_code') : ''); ?></span></div></div>
    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Name</label><input type="text" name="add_room_name" id="add_room_name" data-error="#err_add_room_name" class="form-control">
    <span class="error" id="err_add_room_name"></span>
    <span class="error"><?php echo e(($errors->has('add_room_name')) ? $errors->first('add_room_name') : ''); ?></span></div></div>

    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Total Rooms</label><input type="number" name="add_total_room" id="add_total_room" data-error="#err_add_total_room" class="form-control" min="1">
    <span class="error" id="err_add_total_room"></span>
    <span class="error"><?php echo e(($errors->has('add_total_room')) ? $errors->first('add_total_room') : ''); ?></span></div></div>

    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Rolling Inventry</label><input type="number" name="add_rolling_invetry" id="add_rolling_invetry" data-error="#err_add_rolling_invetry" min="1" class="form-control">
    <span class="error" id="err_add_rolling_invetry"></span>
    <span class="error"><?php echo e(($errors->has('add_rolling_invetry')) ? $errors->first('add_rolling_invetry') : ''); ?></span></div></div>

    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Category</label><select class="form-control" name="add_room_category" id="add_room_category" data-error="#err_add_room_category">
    <option value="">select</option>
    <?php $__currentLoopData = $RoomsCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($RCategory->id); ?>"><?php echo e($RCategory->title); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="error" id="err_add_room_category"></span>
    <span class="error"><?php echo e(($errors->has('add_room_category')) ? $errors->first('add_room_category') : ''); ?></span></div></div>

    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Short Description</label><textarea name="add_room_short_desc" id="add_room_short_desc" data-error="#err_add_room_short_desc" class="form-control"></textarea>
    <span class="error" id="err_add_room_short_desc"></span>
    <span class="error"><?php echo e(($errors->has('add_room_short_desc')) ? $errors->first('add_room_short_desc') : ''); ?></span></div></div>

    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>Long Description</label><textarea name="add_room_long_desc" id="add_room_long_desc" data-error="#err_add_room_long_desc" class="form-control"></textarea>
    <span class="error" id="err_add_room_long_desc"></span>
    <span class="error"><?php echo e(($errors->has('add_room_long_desc')) ? $errors->first('add_room_long_desc') : ''); ?></span>
    </div></div>

    <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
    <label>PMS Code</label>
    <input type="text" name="add_room_pms_code" id="add_room_pms_code" data-error="#err_add_room_pms_code" class="form-control">
    <span class="error" id="err_add_room_pms_code"></span>
    <span class="error"><?php echo e(($errors->has('add_room_pms_code')) ? $errors->first('add_room_pms_code') : ''); ?></span>
    </div></div>
</div>


<div class="col-md-8 col-lg-8">

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 "><h4>Attributes</h4></div>
        
<div class="col-sm-12 col-md-12 col-lg-12">
<div class=" row">

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Room Class</label>
<select class="form-control" name="add_room_class" id="add_room_class" data-error="#err_add_room_class">
<option value="">select</option>
<?php $__currentLoopData = $RoomClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($RClass->id); ?>"><?php echo e($RClass->title); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="error" id="err_add_room_class"></span>
<span class="error"><?php echo e(($errors->has('add_room_class')) ? $errors->first('add_room_class') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Use Room Size</label>
<input type="checkbox" name="add_room_size" id="add_room_size" data-error="#err_add_room_size" class="form-control" value="Yes">
<span class="error" id="err_add_room_size"></span><span class="error"><?php echo e(($errors->has('add_room_size')) ? $errors->first('add_room_size') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>ADA Compliant</label>
<input type="checkbox" name="add_ada_compliant" id="add_ada_compliant" data-error="#err_add_ada_compliant" class="form-control" value="Yes">
<span class="error" id="err_add_ada_compliant"></span><span class="error"><?php echo e(($errors->has('add_ada_compliant')) ? $errors->first('add_ada_compliant') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Room Min Size</label>
<input type="text" name="add_room_min_size" id="add_room_min_size" data-error="#err_add_room_min_size" class="form-control">
<span class="error" id="err_add_room_min_size"></span><span class="error"><?php echo e(($errors->has('add_room_min_size')) ? $errors->first('add_room_min_size') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Room Max Size</label>
<input type="text" name="add_room_max_size" id="add_room_max_size" data-error="#err_add_room_max_size" class="form-control">
<span class="error" id="err_add_room_max_size"></span><span class="error"><?php echo e(($errors->has('add_room_max_size')) ? $errors->first('add_room_max_size') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Size Units</label>
<input type="text" name="add_room_size_units" id="add_room_size_units" data-error="#err_add_room_size_units" class="form-control">
<span class="error" id="err_add_room_size_units"></span><span class="error"><?php echo e(($errors->has('add_room_size_units')) ? $errors->first('add_room_size_units') : ''); ?></span>
</div></div>

</div>
</div>


<div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><h4>Bed Type Assignment</h4></div>          

<div class="col-sm-12 col-md-12 col-lg-12">
<div class=" row">  
<div class="col-sm-12 col-md-12 col-lg-12">

<table class="table borderless">
<thead><th>Bed Type</th><th>Bed Quantity</th><th>Primary</th><th></th></thead>

<tbody id="bedtype_list">
<tr id="bedtype0">

<td><div class="form-group">
<select class="form-control add_bed_type" name="add_bed_type[]" id="add_bed_type" data-error="#err_add_bed_type">
<option selected="selected" value="">-Select-</option>
<?php $__currentLoopData = $RoomBedType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RBType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($RBType->id); ?>"><?php echo e($RBType->title); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="error" id="err_add_bed_type" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_bed_type')) ? $errors->first('add_bed_type') : ''); ?></span>
</div></td>

<td><div class="form-group">
<input type="number" name="add_bed_quantity[]" id="add_bed_quantity" data-error="#err_add_bed_quantity" class="form-control" min="1">
<span class="error" id="err_add_bed_quantity" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_bed_quantity')) ? $errors->first('add_bed_quantity') : ''); ?></span>
</div></td>

<td><div class="form-group">
<input type="radio" name="add_bed_primary[]" id="add_bed_primary" data-error="#err_add_bed_primary" class="form-control add_bed_primary">
<span class="error" id="err_add_bed_primary" style="position: relative;
top: -2px;"></span>
</div></td>

<td><td><button id="clonebed" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
</td></td>

</tr>
</tbody>
</table>

</div></div></div>


<div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><h4>Occupancy</h4></div>

<div class="col-sm-12 col-md-12 col-lg-12 ">
<div class=" row">

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Total Guests Per Room</label>
<div class="form-group">
<label style="margin-top: 4px;"><input type="checkbox" name="add_total_guest_per_room_un" id="add_total_guest_per_room_un" data-error="#err_add_total_guest_per_room_un" class="form-control" onclick="if($(this).prop('checked') == true){$('#add_total_guest_per_room').css('display','none');}else{$('#add_total_guest_per_room').css('display','block');}">
</label>&nbsp; Unlimited
</div>
<input type="number" name="add_total_guest_per_room" id="add_total_guest_per_room" data-error="#err_add_total_guest_per_room" class="form-control" min="1">
<span class="error" id="err_add_total_guest_per_room" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_total_guest_per_room')) ? $errors->first('add_total_guest_per_room') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Adult Occupancy</label>
<div class="form-group">
<label style="margin-top: 4px;"><input type="checkbox" name="add_adult_occupancy_un" id="add_adult_occupancy_un" data-error="#err_add_adult_occupancy_un" class="form-control" onclick="if($(this).prop('checked') == true){$('#add_adult_occupancy').css('display','none');}else{$('#add_adult_occupancy').css('display','block');}">
</label>&nbsp;Unlimited</div>
<input type="number" name="add_adult_occupancy" id="add_adult_occupancy" data-error="#err_add_adult_occupancy" class="form-control" min="1">
<span class="error" id="" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_adult_occupancy')) ? $errors->first('add_adult_occupancy') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Child Occupancy</label>
<div class="form-group">
<label style="margin-top: 4px;"><input type="checkbox" name="add_child_occupancy_un" id="add_child_occupancy_un" data-error="#err_add_child_occupancy_un" class="form-control" onclick="if($(this).prop('checked') == true){$('#add_child_occupancy').css('display','none');}else{$('#add_child_occupancy').css('display','block');}">
</label>&nbsp;Unlimited</div>
<input type="number" name="add_child_occupancy" id="add_child_occupancy" data-error="#err_add_child_occupancy" class="form-control" min="1">
<span class="error" id="err_add_child_occupancy" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_child_occupancy')) ? $errors->first('add_child_occupancy') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Child Limits by Age Range</label>
<div class="form-group">
<label><input type="checkbox" name="add_child_age_limit" value="Yes" id="add_child_age_limit" data-error="#err_add_child_age_limit" class="form-control"></label>
</div>
<span class="error" id="err_add_child_age_limit" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_child_age_limit')) ? $errors->first('add_child_age_limit') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Allow Extra Bed</label>
<input type="checkbox" name="add_allow_extra_bed" id="add_allow_extra_bed" data-error="#err_add_allow_extra_bed" value="Yes" class="form-control">
<span class="error" id="err_add_allow_extra_bed" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_allow_extra_bed')) ? $errors->first('add_allow_extra_bed') : ''); ?></span>
</div></div>

</div>
</div>


<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 "><h4>Default Price Adjustment</h4></div>
            
<div class="col-sm-12 col-md-12 col-lg-12">
<div class=" row">
                    
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group"><label>Price Adjustment Type</label>
<select class="form-control" name="add_price_adjustment_type" id="add_price_adjustment_type" data-error="#err_add_price_adjustment_type">
<option value="USD">USD</option>
<option value="%">%</option>
</select>
<span class="error" id="err_add_price_adjustment_type" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_price_adjustment_type')) ? $errors->first('add_price_adjustment_type') : ''); ?></span>
</div></div>


<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group"><label>Default Adjustment</label>
<input type="number" name="add_default_adjustment" id="add_default_adjustment" data-error="#err_add_default_adjustment" class="form-control" min="0">
<span class="error" id="err_add_default_adjustment" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_default_adjustment')) ? $errors->first('add_default_adjustment') : ''); ?></span>
</div></div>
</div>
</div>



<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 "><h4>Feature Assignments</h4></div>
            
<div class="col-sm-12 col-md-12 col-lg-12">
<div class=" row">
                    
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group"><label>Key Features</label>
<select class="form-control js-example-basic-multiple" multiple="multiple" style="width: 100%" name="add_key_features" id="add_key_features" data-error="#err_add_key_features">
    <?php if($CategoryRoomsFeatures): ?>
    <?php $__currentLoopData = $CategoryRoomsFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CRoomsFeatures): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($CRoomsFeatures->ota_code); ?>"><?php echo e($CRoomsFeatures->ota_desc); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select>
<span class="error" id="err_add_key_features" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_key_features')) ? $errors->first('add_key_features') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group"><label>Room Views</label>
<select class="form-control js-example-basic-multiple" multiple="multiple" style="width: 100%" name="add_room_view" id="add_room_view" data-error="#err_add_room_view">
    <?php if($CategoryRoomsView): ?>
    <?php $__currentLoopData = $CategoryRoomsView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CRoomsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($CRoomsView->ota_code); ?>"><?php echo e($CRoomsView->ota_desc); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select>
<span class="error" id="err_add_room_view" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_room_view')) ? $errors->first('add_room_view') : ''); ?></span>
</div></div>

</div>
</div>

</div>

</div>
</div>




<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>Room Main Image</label>
<input type="file" name="uploadFile" id="uploadFile" class="filestyle">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span></div> -->
</div>
<div id="image_preview" class="image_preview"></div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>&nbsp;</label>
<input type="file" name="uploadFile1" id="uploadFile1" class="filestyle">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span></div> --></div>
<div id="image_preview1" class="image_preview"></div>
</div>

<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>&nbsp;</label>
<input type="file" name="uploadFile2" id="uploadFile2" class="filestyle">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span></div> --></div>
<div id="image_preview2" class="image_preview"></div>
</div>

<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>&nbsp;</label>
<input type="file" name="uploadFile3" id="uploadFile3" class="filestyle">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button></span></div> --></div>
<div id="image_preview3" class="image_preview"></div>
</div>

<div class="col-md-2 offset-10 ">
<input type="button" name="addRoom" class="btn btn-primary btn-lg addRoom" value="Add Room">
</div>
        

</div>
</div>
</div>





<!-- DB Data Display Start -->
<div class="add_room_db">
<?php if(!$Rooms->isEmpty()): ?> <?php $__currentLoopData = $Rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Edit <?php echo e($Room->title); ?> Details</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">

<div class="alert alert-success room-success hidden" id="roomSuccess<?php echo e($Room->rid); ?>"></div>
        
<div class=" row">


<div class="col-md-12 col-lg-12">
<div class="row">


<div class="col-lg-4 col-sm-4">
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15"> 
<h4>&nbsp;</h4>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="form-group">
    <label>Active</label>
    <input type="checkbox" name="add_active<?php echo e($Room->rid); ?>" id="add_active<?php echo e($Room->rid); ?>" data-error="#err_active" class="form-control" value="Enable" <?=( $Room->status=='Enable')?'checked':''; ?> >
    <span class="error" id="err_add_active"></span>
    <span class="error"><?php echo e(($errors->has('active')) ? $errors->first('active') : ''); ?></span>
</div>
</div>
<h4 style="padding: 3px;">&nbsp;</h4>
<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Code</label>
        <input type="text" name="add_room_code<?php echo e($Room->rid); ?>" id="add_room_code<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($Room->room_code); ?>">
        <span class="error" id="err_add_room_code<?php echo e($Room->rid); ?>"></span>
    </div>
</div>
                        
<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="add_room_name<?php echo e($Room->rid); ?>" id="add_room_name<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($Room->title); ?>">
        <span class="error" id="err_add_room_name<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Total Rooms</label>
        <input type="number" name="add_total_room<?php echo e($Room->rid); ?>" id="add_total_room<?php echo e($Room->rid); ?>" class="form-control" min="1" value="<?php echo e($Room->total_room); ?>" onchange="$(add_rolling_invetry<?php echo e($Room->rid); ?>).val($(this).val());">
        <span class="error" id="err_add_total_room<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Rolling Inventry</label>
        <input type="number" name="add_rolling_invetry<?php echo e($Room->rid); ?>" id="add_rolling_invetry<?php echo e($Room->rid); ?>" min="1" class="form-control" value="<?php echo e($Room->rolling_invetry); ?>">
        <span class="error" id="err_add_rolling_invetry<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="add_room_category<?php echo e($Room->rid); ?>" id="add_room_category<?php echo e($Room->rid); ?>">
            <option value="">select</option>
            <?php $__currentLoopData = $RoomsCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($RCategory->id); ?>" <?php if($Room->room_category==$RCategory->id): ?> selected="selected" <?php endif; ?> ><?php echo e($RCategory->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span class="error" id="err_add_room_category<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Short Description</label>
        <textarea name="add_room_short_desc<?php echo e($Room->rid); ?>" id="add_room_short_desc<?php echo e($Room->rid); ?>" data-error="#err_add_room_short_desc<?php echo e($Room->rid); ?>" class="form-control"><?php echo e($Room->room_short_desc); ?></textarea>
        <span class="error" id="err_add_room_short_desc<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>Long Description</label>
        <textarea name="add_room_long_desc<?php echo e($Room->rid); ?>" id="add_room_long_desc<?php echo e($Room->rid); ?>" data-error="#err_add_room_long_desc<?php echo e($Room->rid); ?>" class="form-control"><?php echo e($Room->description); ?></textarea>
        <span class="error" id="err_add_room_long_desc<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="form-group">
        <label>PMS Code</label>
        <input type="text" name="add_room_pms_code<?php echo e($Room->rid); ?>" id="add_room_pms_code<?php echo e($Room->rid); ?>" data-error="#err_add_room_pms_code<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($Room->room_pms_code); ?>">
        <span class="error" id="err_add_room_pms_code<?php echo e($Room->rid); ?>"></span>
    </div>
</div>

</div>



<div class="col-md-8 col-lg-8">
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 "><h4>Attributes</h4></div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class=" row">

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Room Class</label>
    <select class="form-control" name="add_room_class<?php echo e($Room->rid); ?>" id="add_room_class<?php echo e($Room->rid); ?>">
        <option value="">select</option>
        <?php $__currentLoopData = $RoomClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($RClass->id); ?>" 
<?= ($Room->room_class==$RClass->id)?'selected':'' ?>
            ><?php echo e($RClass->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="error" id="err_add_room_class<?php echo e($Room->rid); ?>"></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Use Room Size</label>
    <input type="checkbox" name="add_room_size<?php echo e($Room->rid); ?>" id="add_room_size<?php echo e($Room->rid); ?>" data-error="#err_add_room_size" class="form-control" <?=( $Room->room_size == 'Yes')?'checked':''; ?> >

    <span class="error" id="err_add_room_size"></span>
    <span class="error"><?php echo e(($errors->has('add_room_size')) ? $errors->first('add_room_size') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>ADA Compliant</label>
    <input type="checkbox" name="add_ada_compliant<?php echo e($Room->rid); ?>" id="add_ada_compliant<?php echo e($Room->rid); ?>" data-error="#err_add_ada_compliant" class="form-control" <?=( $Room->ada_compliant == 'Yes')?'checked':''; ?>>
    <span class="error" id="err_add_ada_compliant"></span>
    <span class="error"><?php echo e(($errors->has('add_ada_compliant')) ? $errors->first('add_ada_compliant') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Room Min Size</label>
    <input type="text" name="add_room_min_size<?php echo e($Room->rid); ?>" id="add_room_min_size<?php echo e($Room->rid); ?>" data-error="#err_add_room_min_size<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($Room->room_min_size); ?>">
    <span class="error" id="err_add_room_min_size<?php echo e($Room->rid); ?>"></span>
    <span class="error"><?php echo e(($errors->has('add_room_min_size')) ? $errors->first('add_room_min_size') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Room Max Size</label>
    <input type="text" name="add_room_max_size<?php echo e($Room->rid); ?>" id="add_room_max_size<?php echo e($Room->rid); ?>" data-error="#err_add_room_max_size<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($Room->room_max_size); ?>">
    <span class="error" id="err_add_room_max_size<?php echo e($Room->rid); ?>"></span>
    <span class="error"><?php echo e(($errors->has('add_room_max_size')) ? $errors->first('add_room_max_size') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Size Units</label>
    <input type="text" name="add_room_size_units<?php echo e($Room->rid); ?>" id="add_room_size_units<?php echo e($Room->rid); ?>" data-error="#err_add_room_size_units<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($Room->room_size_units); ?>">
    <span class="error" id="err_add_room_size_units<?php echo e($Room->rid); ?>"></span>
    <span class="error"><?php echo e(($errors->has('add_room_size_units')) ? $errors->first('add_room_size_units') : ''); ?></span>
</div>
</div>
    </div>
</div>


<div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><h4>Bed Type Assignment</h4></div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <div class=" row">

<div class="col-sm-12 col-md-12 col-lg-12">
<table class="table borderless">
    <thead>
        <th>Bed Type</th>
        <th>Bed Quantity</th>
        <th>Primary</th>
        <th></th>
    </thead>
    







<tbody id="bedtype_listUpdate<?php echo e($Room->rid); ?>">

<?php 
    $bedDataArray = explode(',', $Room->bed_type);
    $bedQuantityArray = explode(',', $Room->bed_quantity); 
    $bedPrimaryArray = explode(',', $Room->bed_primary);
    $Room['bedDataArray'] = $bedDataArray;
?>

    <?php $__currentLoopData = $bedDataArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$RBedType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="bedtypeUpdate<?php echo e($Room->rid); ?>">

    <td>
    <div class="form-group">
    <select class="form-control" name="add_bed_type<?php echo e($Room->rid); ?>[]" id="add_bed_type<?php echo e($Room->rid); ?>">
    <option selected="selected" value="">-Select-</option>
    <?php $__currentLoopData = $RoomBedType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RBType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($RBType->id); ?>" <?=( $RBType->id == $bedDataArray[$key])?'selected':''; ?> ><?php echo e($RBType->title); ?>

    </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="error" id="err_add_bed_type<?php echo e($Room->rid); ?>" style="position: relative;
    top: -2px;"></span>
    </div>
    </td>

    <td>
    <div class="form-group">
    <input type="number" name="add_bed_quantity<?php echo e($Room->rid); ?>[]" id="add_bed_quantity<?php echo e($Room->rid); ?>" class="form-control" value="<?php echo e($bedQuantityArray[$key]); ?>" min="1">
    <span class="error" id="err_add_bed_quantity<?php echo e($Room->rid); ?>" style="position: relative;
    top: -2px;"></span>
    </div>
    </td>

    <td>
    <div class="form-group">
    <input type="radio" name="add_bed_primary<?php echo e($Room->rid); ?>[]" id="add_bed_primary<?php echo e($Room->rid); ?>" data-error="#err_add_bed_primary" class="form-control add_bed_primaryUpdate"
     <?= ($bedPrimaryArray[$key]=='Yes')?'checked':'' ?> >
    <span class="error" id="err_add_bed_primary" style="position: relative;
    top: -2px;"></span>
    </div>
    </td>

    <td><td>
    <button id="clonebedUpdate" onclick="clonebedUpdate1(<?php echo e($Room->rid); ?>)" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
    </td></td>


    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</tbody>

</table>
</div>

    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><h4>Occupancy</h4></div>

<div class="col-sm-12 col-md-12 col-lg-12 ">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Total Guests Per Room</label>

<div class="form-group">
<label style="margin-top: 4px;">
<input type="checkbox" name="add_total_guest_per_room_un<?php echo e($Room->rid); ?>" id="add_total_guest_per_room_un<?php echo e($Room->rid); ?>" data-error="#err_add_total_guest_per_room_un" class="form-control" <?=( $Room->total_guest_per_room_un == "Yes")?'checked':''; ?> onclick="if($(this).prop('checked') == true){ $('#add_total_guest_per_room<?php echo e($Room->rid); ?>').hide();}else{$('#add_total_guest_per_room<?php echo e($Room->rid); ?>').show();}" >
</label>&nbsp;Unlimited
</div>

<input type="number" name="add_total_guest_per_room<?php echo e($Room->rid); ?>" id="add_total_guest_per_room<?php echo e($Room->rid); ?>" data-error="#err_add_total_guest_per_room" class="form-control" min="1" value="<?php echo e($Room->total_guest_per_room); ?>">

<span class="error" id="err_add_total_guest_per_room_un" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_total_guest_per_room')) ? $errors->first('add_total_guest_per_room') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Adult Occupancy</label>
<div class="form-group">
<label style="margin-top: 4px;">
<input type="checkbox" name="add_adult_occupancy_un<?php echo e($Room->rid); ?>" id="add_adult_occupancy_un<?php echo e($Room->rid); ?>" data-error="#err_add_adult_occupancy_un" class="form-control" <?=( $Room->adult_occupancy_un == "Yes")?'checked':''; ?> onclick="if($(this).prop('checked') == true){ $('#add_adult_occupancy<?php echo e($Room->rid); ?>').hide();}else{$('#add_adult_occupancy<?php echo e($Room->rid); ?>').show();}"></label>&nbsp; Unlimited</div>
<input type="number" name="add_adult_occupancy<?php echo e($Room->rid); ?>" id="add_adult_occupancy<?php echo e($Room->rid); ?>" data-error="#err_add_adult_occupancy" class="form-control" min="1" value="<?php echo e($Room->adult_occupancy); ?>">
<span class="error" id="" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_adult_occupancy')) ? $errors->first('add_adult_occupancy') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Child Occupancy</label>
<div class="form-group">
<label style="margin-top: 4px;">
<input type="checkbox" name="add_child_occupancy_un<?php echo e($Room->rid); ?>" value="Yes" id="add_child_occupancy_un<?php echo e($Room->rid); ?>" data-error="#err_add_child_occupancy_un" class="form-control" <?=( $Room->child_occupancy_un == "Yes")?'checked':''; ?> onclick="if($(this).prop('checked') == true){ $('#add_child_occupancy<?php echo e($Room->rid); ?>').hide();}else{$('#add_child_occupancy<?php echo e($Room->rid); ?>').show();}"></label> &nbsp;Unlimited
</div>
<input type="number" name="add_child_occupancy<?php echo e($Room->rid); ?>" id="add_child_occupancy<?php echo e($Room->rid); ?>" data-error="#err_add_child_occupancy" class="form-control" min="1" value="<?php echo e($Room->child_occupancy); ?>">
<span class="error" id="err_add_child_occupancy" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_child_occupancy')) ? $errors->first('add_child_occupancy') : ''); ?></span>
</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Child Limits by Age Range</label>
<div class="form-group">
<label>
<input type="checkbox" name="add_child_age_limit<?php echo e($Room->rid); ?>" id="add_child_age_limit<?php echo e($Room->rid); ?>" data-error="#err_add_child_age_limit" class="form-control" <?=( $Room->child_age_limit == 'Yes')?'checked':''; ?> >
<!-- Use Child Limits by Age Range -->
</label>
</div>
<span class="error" id="err_add_child_age_limit" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_child_age_limit')) ? $errors->first('add_child_age_limit') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Allow Extra Bed</label>
<input type="checkbox" name="add_allow_extra_bed<?php echo e($Room->rid); ?>" id="add_allow_extra_bed<?php echo e($Room->rid); ?>" data-error="#err_add_allow_extra_bed" class="form-control" <?=( $Room->allow_extra_bed == 'Yes')?'checked':''; ?> >
<span class="error" id="err_add_allow_extra_bed" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_allow_extra_bed')) ? $errors->first('add_allow_extra_bed') : ''); ?></span>
</div>
</div>
</div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 "><h4>Default Price Adjustment</h4></div>

<div class="col-sm-12 col-md-12 col-lg-12">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Price Adjustment Type</label>
<select class="form-control" name="add_price_adjustment_type<?php echo e($Room->rid); ?>" id="add_price_adjustment_type<?php echo e($Room->rid); ?>" data-error="#err_add_price_adjustment_type">
<option value="USD" <?=( $Room->price_adjustment_type == "USD")?'selected':';' ?> >USD</option>
<option value="%" <?=( $Room->price_adjustment_type == "%")?'selected':';' ?> >%</option>
</select>
<span class="error" id="err_add_price_adjustment_type" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('add_price_adjustment_type')) ? $errors->first('add_price_adjustment_type') : ''); ?></span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<label>Default Adjustment</label>
<input type="number" name="add_default_adjustment<?php echo e($Room->rid); ?>" id="add_default_adjustment<?php echo e($Room->rid); ?>" class="form-control" min="0" value="<?php echo e($Room->default_adjustment); ?>">
<span class="error" id="err_add_default_adjustment<?php echo e($Room->rid); ?>" style="position: relative;
top: -2px;"></span>
</div>
</div>
</div>
</div>


<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 "><h4>Feature Assignments</h4></div>
            
<div class="col-sm-12 col-md-12 col-lg-12">
<div class=" row">
                    
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group"><label>Key Features</label>
      <?php 
    $Features='';
    $RoomView='';
    ?>
        <?php if($Room->getRoomKeyFeatures()): ?>
            <?php $Features=$Room->getRoomKeyFeatures();?>;
        <?php endif; ?>

          <?php if($Room->getRoomView()): ?>
            <?php $RoomView=$Room->getRoomView();?>;
        <?php endif; ?>

         
    
<select class="form-control js-example-basic-multiple" multiple="multiple" style="width: 100%" name="add_key_features<?php echo e($Room->rid); ?>" id="add_key_features<?php echo e($Room->rid); ?>" data-error="#err_add_key_features<?php echo e($Room->rid); ?>">


    <?php if($CategoryRoomsFeatures): ?>
    <?php $__currentLoopData = $CategoryRoomsFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CRoomsFeatures): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $rdata='';?>
            <?php $__currentLoopData = $Features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($CRoomsFeatures->ota_code==$val->kf_id): ?>
                    <?php $rdata='Yes';?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
<option value="<?php echo e($CRoomsFeatures->ota_code); ?>" <?php if($rdata=='Yes'): ?> selected="selected" <?php endif; ?>><?php echo e($CRoomsFeatures->ota_desc); ?></option>            
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select>
<span class="error" id="err_add_key_features<?php echo e($Room->rid); ?>" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_key_features')) ? $errors->first('add_key_features') : ''); ?></span>
</div></div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group"><label>Room Views</label>
<select class="form-control js-example-basic-multiple" multiple="multiple" style="width: 100%" name="add_room_view<?php echo e($Room->rid); ?>" id="add_room_view<?php echo e($Room->rid); ?>" data-error="#err_add_room_view<?php echo e($Room->rid); ?>">
    <?php if($CategoryRoomsView): ?>
    <?php $__currentLoopData = $CategoryRoomsView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CRoomsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $data='';?>
            <?php $__currentLoopData = $RoomView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($CRoomsView->ota_code==$val->rv_id): ?>
                    <?php $data='Yes';?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($CRoomsView->ota_code); ?>" <?php if($data=='Yes'): ?> selected="selected" <?php endif; ?>><?php echo e($CRoomsView->ota_desc); ?></option>
           
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select>
<span class="error" id="err_add_room_view" style="position: relative;
top: -2px;"></span><span class="error"><?php echo e(($errors->has('add_room_view')) ? $errors->first('add_room_view') : ''); ?></span>
</div></div>

</div>
</div>

</div>

</div>
</div>



<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>Room Main Image</label>
<input type="file" name="uploadFile<?php echo e($Room->rid); ?>" id="uploadFile<?php echo e($Room->rid); ?>" class="filestyle" onchange="roomImgUpdate('uploadFile<?php echo e($Room->rid); ?>','image_preview<?php echo e($Room->rid); ?>')">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span></div> --></div>
<div id="image_preview<?php echo e($Room->rid); ?>" class="image_preview">
<?php if($Room->image_1): ?><img src="<?php echo e(asset('uploads/rooms/'.$Room->image_1)); ?>"><?php endif; ?>
</div></div>

<div class="col-sm-3 col-md-3 col-lg-3">
<div class="form-group">
<label>&nbsp;</label>
<input type="file" name="uploadFile1<?php echo e($Room->rid); ?>" id="uploadFile1<?php echo e($Room->rid); ?>" class="filestyle" onchange="roomImgUpdate('uploadFile1<?php echo e($Room->rid); ?>','image_preview1<?php echo e($Room->rid); ?>')">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span></div> --></div>
<div id="image_preview1<?php echo e($Room->rid); ?>" class="image_preview">
<?php if($Room->image_2): ?><img src="<?php echo e(asset('uploads/rooms/'.$Room->image_2)); ?>"><?php endif; ?>
</div></div>

<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>&nbsp;</label>
<input type="file" name="uploadFile2<?php echo e($Room->rid); ?>" id="uploadFile2<?php echo e($Room->rid); ?>" class="filestyle" onchange="roomImgUpdate('uploadFile2<?php echo e($Room->rid); ?>','image_preview2<?php echo e($Room->rid); ?>')">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div> -->
</div>
<div id="image_preview2<?php echo e($Room->rid); ?>" class="image_preview">
<?php if($Room->image_3): ?>
<img src="<?php echo e(asset('uploads/rooms/'.$Room->image_3)); ?>"><?php endif; ?>
</div></div>


<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>&nbsp;</label>
<input type="file" name="uploadFile3<?php echo e($Room->rid); ?>" id="uploadFile3<?php echo e($Room->rid); ?>" class="filestyle" onchange="roomImgUpdate('uploadFile3<?php echo e($Room->rid); ?>','image_preview3<?php echo e($Room->rid); ?>')">
<!-- <div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span></div> --></div>
<div id="image_preview3<?php echo e($Room->rid); ?>" class="image_preview">
<?php if($Room->image_4): ?><img src="<?php echo e(asset('uploads/rooms/'.$Room->image_4)); ?>"><?php endif; ?>
</div>
</div>

<div class="col-md-2 offset-10 mtb-15">
    <input type="button" name="updateRoom" id="<?php echo e($Room->rid); ?>" class="btn btn-primary btn-lg updateRoom" value="Update Room" placeholder="Update Room">
</div>


</div>
</div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?></div>
<!-- DB Data Display End -->




</div>
</div>
</div>
</div>
</div>
<!-- Channelized Hotel Information End -->
<!-- Language Assignments End -->


<div class="tab-pane" id="tab03">
<div id="contact_section">
<div class="col-lg-12 cform" id="contact_add_form0">
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15">
<h1>TAX Configuration</h1>
</div>
<div class="col-sm-12 col-md-6 col-lg-6 mtb-15 text-right">
<a href="<?php echo e(url('hotelier/export-tax-config')); ?>/csv/<?php echo e($Hotels->id); ?>" class="btn-outline-inverse-info btn btn-lg">Export TAX Configuration</a>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 text-right ">
<!-- <a href="<?php echo e(url('hotelier/import-tax-configuration')); ?>">Import TAX Configuration</a> -->
</div>

<!-- Start Add Tax Configuration -->

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Add Tax </div>
<div class="col-sm-12 col-md-12 col-lg-12 panel ">
     <div class="alert alert-success room-tax hidden"></div>
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="tax_level" id="tax_level" data-error="#err_tax_level">
                <option value="">Select Level</option>
                <option value="Hotel" >Hotel Taxes</option>
                <option value="Package">Package Taxes</option>
                <option value="Rate">Rate Taxes</option>
                <option value="Room">Room Taxes</option>
            </select>
            </select>
            <span id="err_tax_level" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_level')) ? $errors->first('tax_level') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax Frequency</label>
            <select class="form-control" name="tax_frequency" id="tax_frequency" data-error="#err_tax_frequency">
                <option value="">Select Tax Frequency</option>
                <option value="Per Night" >Per Night</option>
                <option value="Per Stay"  >Per Stay</option>
            </select>
            <span id="err_tax_frequency" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_frequency')) ? $errors->first('tax_frequency') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax Type</label>
            <select class="form-control" name="tax_type" id="tax_type" data-error="#err_tax_type">
                <option value="">Select Tax Type</option>
                <?php $__currentLoopData = $CategoryTaxType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryTaxTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryTaxTypes->id); ?>"><?php echo e($CategoryTaxTypes->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_tax_type"  class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_type')) ? $errors->first('tax_type') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Code</label>
            <input type="text" name="tax_code" id="tax_code" data-error="#err_tax_code" class="form-control" >
            <span id="err_tax_code" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_code')) ? $errors->first('tax_code') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="tax_name" id="tax_name" data-error="#err_tax_name" class="form-control">
            <span id="err_tax_name" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_name')) ? $errors->first('tax_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Default Description</label>
            <textarea class="form-control" name="tax_desc" id="tax_desc" data-error="#err_tax_desc"></textarea>
            <span id="err_tax_desc" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_desc')) ? $errors->first('tax_desc') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Start Date</label>
            <input type="text" name="start_date" id="start_date" data-error="#err_start_date" class="form-control datepicker start_date" >
            <span id="err_start_date" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('start_date')) ? $errors->first('start_date') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>End Date</label>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <input type="text" name="end_date" id="end_date" data-error="#err_end_date" class="form-control datepicker end_date" >
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <label style="margin-top: 4px;"><input type="checkbox" name="no_end_date" id="no_end_date" value="Yes" data-error="err_no_end_date"class="form-control" ></label>&nbsp;No End Date
                    </div>
                </div>
            </div>
            <span id="" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('end_date')) ? $errors->first('end_date') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax</label>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <input type="text" name="tax" id="tax" data-error="#err_tax" class="form-control">
                        <span id="err_tax" class="error" style="position: relative;
top: -2px;"></span>
                        <span class="error"><?php echo e(($errors->has('tax')) ? $errors->first('tax') : ''); ?></span>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <select class="form-control" name="tax_type_price" id="tax_type_price" data-error="err_tax_type_price">
                            <option selected="selected" value="Amount">Amount</option>
                            <option value="Percentage" >Percentage</option>
                        </select>
                    </div>
                </div>
            </div>
            <span id="" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_type_price')) ? $errors->first('tax_type_price') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Charge Per</label>
            <select class="form-control" name="charge_per" id="charge_per" data-error="#err_charge_per">
                <option value="">Select Charge Per</option>
                <option value="FlatCharge" >Flat Charge</option>
                <option value="PerAdult" >Per Adult</option>
                <option value="PerChild" >Per Child</option>
                <option value="PerPerson" >Per Person</option>
            </select>
            <span id="err_charge_per" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('charge_per')) ? $errors->first('charge_per') : ''); ?></span>
        </div>
    </div>
   
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from External Rate</label>
            <input type="checkbox" name="cal_ext_rate" id="cal_ext_rate" data-error="#err_cal_ext_rate" class="form-control" value="True" >
            <span id="err_cal_ext_rate" class="error" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('cal_ext_rate')) ? $errors->first('cal_ext_rate') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Is Inclusive</label>
            <input type="checkbox" name="tax_inclusive" id="tax_inclusive" data-error="#err_tax_inclusive" class="form-control" value="True" data-error="err_no_end_date" >
            <span id="err_tax_inclusive"  style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_inclusive')) ? $errors->first('tax_inclusive') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from Room Price</label>
            <input type="checkbox" name="cal_room_price" id="cal_room_price" data-error="#err_cal_room_price" class="form-control" value="True" >
            <span id="err_cal_room_price" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('cal_room_price')) ? $errors->first('cal_room_price') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from Package Price</label>
            <input type="checkbox" name="cal_package_price" id="cal_package_price" data-error="#err_cal_package_price" class="form-control" value="True" data-error="err_cal_package_price">
            <span id="err_elg_dis_exclusion" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('cal_package_price')) ? $errors->first('cal_package_price') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Apply to Free Nights</label>
            <input type="checkbox" name="apply_free_night" id="apply_free_night" data-error="#err_apply_free_night" class="form-control" value="True" data-error="err_no_end_date">
            <span id="err_apply_free_night" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('apply_free_night')) ? $errors->first('apply_free_night') : ''); ?></span>
        </div>
    </div>
    <!-- <div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Tax By Price Range</label>
<input type="checkbox" name="tax_by_price_range" id="tax_by_price_range" data-error="#err_tax_by_price_range"  class="form-control" value="Yes" data-error="err_no_end_date" >
<span id="err_tax_by_price_range" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('tax_by_price_range')) ? $errors->first('tax_by_price_range') : ''); ?></span>
</div>
</div>  
</div>  -->
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax By LOS:</label>
            <input type="checkbox" name="tax_by_los" id="tax_by_los" data-error="#err_tax_by_los" class="form-control" value="True" data-error="err_no_end_date" >
            <span id="err_tax_by_los" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_by_los')) ? $errors->first('tax_by_los') : ''); ?></span>
        </div>
    </div>
<div class="col-md-2 offset-10 mtb-15 ">
                <input type="button" name="AddTax" class="btn btn-primary btn-lg AddTax" value="Add Tax">
            </div>

</div>
</div>

<!-- End Add Tax Configuration -->



<?php $__currentLoopData = $HotelTaxConfigur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HotelTax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<input type="hidden" name="tax_mid" value="<?php echo e($HotelTax->id); ?>">
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion ">Edit Tax <?php echo e($HotelTax->tax_name); ?></div>
<div class="col-sm-12 col-md-12 col-lg-12 panel " style="display: ;">
<div class="alert alert-success tax-success hidden" id="taxSuccess<?php echo e($HotelTax->id); ?>"></div>
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="edit_tax_level" id="edit_tax_level_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_level<?php echo e($HotelTax->id); ?>">
                <option value="">Select Level</option>
                <option value="Hotel"  <?php if($HotelTax->tax_level == 'Hotel'): ?> selected="selected" <?php endif; ?> >Hotel Taxes</option>
                <option value="Package" <?php if($HotelTax->tax_level == 'Package'): ?> selected="selected" <?php endif; ?> >Package Taxes</option>
                <option value="Rate"  <?php if($HotelTax->tax_level == 'Rate'): ?> selected="selected" <?php endif; ?> >Rate Taxes</option>
                <option value="Room"  <?php if($HotelTax->tax_level == 'Room'): ?> selected="selected" <?php endif; ?> >Room Taxes</option>
            </select>
            </select>
            <span id="err_tax_level<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_level')) ? $errors->first('tax_level') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax Frequency</label>
            <select class="form-control" name="edit_tax_frequency" id="edit_tax_frequency_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_frequency<?php echo e($HotelTax->id); ?>">
                <option value="">Select Tax Frequency</option>
                <option value="Per Night" <?php if($HotelTax->tax_frequency == 'Per Night'): ?> selected="selected" <?php endif; ?> >Per Night</option>
                <option value="Per Stay"  <?php if($HotelTax->tax_frequency == 'Per Stay'): ?> selected="selected" <?php endif; ?> >Per Stay</option>
            </select>
            <span id="err_tax_frequency<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_frequency')) ? $errors->first('tax_frequency') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax Type</label>
            <select class="form-control" name="edit_tax_type" id="edit_tax_type_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_type<?php echo e($HotelTax->id); ?>">
                <option value="">Select Tax Type</option>
                <?php $__currentLoopData = $CategoryTaxType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryTaxTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($CategoryTaxTypes->id); ?>" <?php if($HotelTax): ?> <?php if($HotelTax->tax_type == $CategoryTaxTypes->id): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($CategoryTaxTypes->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_tax_type<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_type')) ? $errors->first('tax_type') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Code</label>
            <input type="text" name="edit_tax_code" id="edit_tax_code_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_code<?php echo e($HotelTax->id); ?>" class="form-control" value="<?php if($HotelTax): ?><?php echo e($HotelTax->tax_code); ?><?php endif; ?>">
            <span id="err_tax_code<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_code')) ? $errors->first('tax_code') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="edit_tax_name" id="edit_tax_name_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_name<?php echo e($HotelTax->id); ?>" class="form-control" value="<?php if($HotelTax): ?><?php echo e($HotelTax->tax_name); ?><?php endif; ?>">
            <span id="err_tax_name<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_name')) ? $errors->first('tax_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Default Description</label>
            <textarea class="form-control" name="edit_tax_desc" id="edit_tax_desc_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_desc<?php echo e($HotelTax->id); ?>"><?php if($HotelTax): ?> <?php echo e($HotelTax->tax_desc); ?> <?php endif; ?></textarea>
            <span id="err_tax_desc<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_desc')) ? $errors->first('tax_desc') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Start Date</label>
            <input type="text" name="edit_start_date" id="edit_start_date_<?php echo e($HotelTax->id); ?>" data-error="#err_start_date<?php echo e($HotelTax->id); ?>" class="form-control datepicker start_date" value="<?php if($HotelTax): ?> <?php echo e((date('d-m-Y',strtotime($HotelTax->start_date)))); ?> <?php endif; ?>">
            <span id="err_start_date<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('start_date')) ? $errors->first('start_date') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>End Date</label>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <input type="text" name="edit_end_date" id="edit_end_date_<?php echo e($HotelTax->id); ?>" data-error="#err_end_date<?php echo e($HotelTax->id); ?>" class="form-control datepicker end_date" value="<?php if($HotelTax): ?> <?php echo e((date('d-m-Y',strtotime($HotelTax->end_date)))); ?> <?php endif; ?>">
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <label style="margin-top: 4px;"><input type="checkbox" name="edit_no_end_date" id="edit_no_end_date_<?php echo e($HotelTax->id); ?>" value="Yes" data-error="err_no_end_date" <?php if($HotelTax): ?> <?php if($HotelTax->no_end_date=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> class="form-control" >
                        </label> &nbsp;No End Date
                    </div>
                </div>
            </div>
            <span id="err_end_date<?php echo e($HotelTax->id); ?>" style="position: relative;top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('end_date')) ? $errors->first('end_date') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax</label>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <input type="text" name="edit_tax" id="edit_tax_<?php echo e($HotelTax->id); ?>" data-error="#err_tax<?php echo e($HotelTax->id); ?>" class="form-control" value="<?php if($HotelTax): ?> <?php echo e($HotelTax->tax); ?> <?php endif; ?>">
                        <span id="err_tax<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
                        <span class="error"><?php echo e(($errors->has('tax')) ? $errors->first('tax') : ''); ?></span>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <select class="form-control" name="edit_tax_type_price" id="edit_tax_type_price_<?php echo e($HotelTax->id); ?>" data-error="err_tax_type_price<?php echo e($HotelTax->id); ?>">
                            <option value="">Select Tax Type</option>
                            <option selected="selected" value="Amount" <?php if($HotelTax): ?> <?php if($HotelTax->tax_type_price =='Amount'): ?> selected="selected" <?php endif; ?> <?php endif; ?> >Amount</option>
                            <option value="Percentage" <?php if($HotelTax): ?> <?php if($HotelTax->tax_type_price == 'Percentage'): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Percentage</option>
                        </select>
                    </div>
                </div>
            </div>
            <span id="err_tax_type_price<?php echo e($HotelTax->id); ?>" style="position: relative;top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_type_price')) ? $errors->first('tax_type_price') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Charge Per</label>
            <select class="form-control" name="edit_charge_per" id="edit_charge_per_<?php echo e($HotelTax->id); ?>" data-error="#err_charge_per<?php echo e($HotelTax->id); ?>">
                <option value="">Select Charge Per</option>
                <option selected="selected" value="FlatCharge" <?php if($HotelTax): ?> <?php if($HotelTax->charge_per == 'FlatCharge'): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Flat Charge</option>
                <option value="PerAdult" <?php if($HotelTax): ?> <?php if($HotelTax->charge_per == 'PerAdult'): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Per Adult</option>
                <option value="PerChild" <?php if($HotelTax): ?> <?php if($HotelTax->charge_per == 'PerChild'): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Per Child</option>
                <option value="PerPerson" <?php if($HotelTax): ?> <?php if($HotelTax->charge_per == 'PerPerson'): ?> selected="selected" <?php endif; ?> <?php endif; ?>>Per Person</option>
            </select>
            <span id="err_charge_per<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('charge_per')) ? $errors->first('charge_per') : ''); ?></span>
        </div>
    </div>
   
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from External Rate</label>
            <input type="checkbox" name="edit_cal_ext_rate" id="edit_cal_ext_rate_<?php echo e($HotelTax->id); ?>" data-error="#err_cal_ext_rate<?php echo e($HotelTax->id); ?>" class="form-control" value="True" <?php if($HotelTax): ?> <?php if($HotelTax->cal_ext_rate=='True'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
            <span id="err_cal_ext_rate<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('cal_ext_rate')) ? $errors->first('cal_ext_rate') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Is Inclusive</label>
            <input type="checkbox" name="edit_tax_inclusive" id="edit_tax_inclusive_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_inclusive<?php echo e($HotelTax->id); ?>" class="form-control" value="True" data-error="err_no_end_date" <?php if($HotelTax): ?> <?php if($HotelTax->tax_inclusive=='True'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
            <span id="err_tax_inclusive<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_inclusive')) ? $errors->first('tax_inclusive') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from Room Price</label>
            <input type="checkbox" name="edit_cal_room_price" id="edit_cal_room_price_<?php echo e($HotelTax->id); ?>" data-error="#err_cal_room_price<?php echo e($HotelTax->id); ?>" class="form-control" value="True" <?php if($HotelTax): ?> <?php if($HotelTax->cal_room_price=='True'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
            <span id="err_cal_room_price<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('cal_room_price')) ? $errors->first('cal_room_price') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from Package Price</label>
            <input type="checkbox" name="edit_cal_package_price" id="edit_cal_package_price_<?php echo e($HotelTax->id); ?>" data-error="#err_cal_package_price<?php echo e($HotelTax->id); ?>" class="form-control" value="True" data-error="err_cal_package_price" <?php if($HotelTax): ?> <?php if($HotelTax->cal_package_price=='True'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
            <span id="err_cal_package_price<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('cal_package_price')) ? $errors->first('cal_package_price') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Apply to Free Nights</label>
            <input type="checkbox" name="edit_apply_free_night" id="edit_apply_free_night_<?php echo e($HotelTax->id); ?>" data-error="#err_apply_free_night<?php echo e($HotelTax->id); ?>" class="form-control" value="True" data-error="err_no_end_date" <?php if($HotelTax): ?> <?php if($HotelTax->apply_free_night=='True'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
            <span id="err_apply_free_night<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('apply_free_night')) ? $errors->first('apply_free_night') : ''); ?></span>
        </div>
    </div>
    <!-- <div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Tax By Price Range</label>
<input type="checkbox" name="edit_tax_by_price_range" id="edit_tax_by_price_range" data-error="#err_tax_by_price_range"  class="form-control" value="Yes" data-error="err_no_end_date" <?php if($HotelTax): ?> 
<?php if($HotelTax->tax_by_price_range=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
<span id="err_tax_by_price_range" style="position: relative;
top: -2px;"></span>
<span class="error"><?php echo e(($errors->has('tax_by_price_range')) ? $errors->first('tax_by_price_range') : ''); ?></span>
</div>
</div>  
</div>  -->
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax By LOS:</label>
            <input type="checkbox" name="edit_tax_by_los" id="edit_tax_by_los_<?php echo e($HotelTax->id); ?>" data-error="#err_tax_by_los<?php echo e($HotelTax->id); ?>" class="form-control" value="True" data-error="err_no_end_date" <?php if($HotelTax): ?> <?php if($HotelTax->tax_by_los=='True'): ?> checked="checked" <?php endif; ?> <?php endif; ?>>
            <span id="err_tax_by_los<?php echo e($HotelTax->id); ?>" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('tax_by_los')) ? $errors->first('tax_by_los') : ''); ?></span>
        </div>
    </div>
<div class="col-md-2 offset-10 mtb-15 ">
                <input type="button" name="EditTax" id="<?php echo e($HotelTax->id); ?>" class="btn btn-primary btn-lg updateTax" value="Update Tax">
            </div>

</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>
</div>
</div>
</div>



<!-- Channelized Hotel Information Start -->
<div class="tab-pane" id="tab05">
<div id="contact_section">
<div class="col-lg-12 cform" id="contact_add_form0">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<h1>Meeting & Events Facilities</h1>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Details</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" style="display: block;">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Short Description</label>
            <textarea name="meet_event_desc" id="meet_event_desc" data-error="#err_meet_event_desc" class="form-control"><?php echo e($Hotels->meeting_description); ?></textarea>
            <span id="err_meet_event_desc" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('meet_event_desc')) ? $errors->first('meet_event_desc') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Seasonal Rates</label>
            <input type="text" name="seasonal_rates" id="seasonal_rates" data-error="#err_seasonal_rates" class="form-control" value="<?php echo e($Hotels->seasonal_rates); ?>">
            <span id="err_seasonal_rates" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('seasonal_rates')) ? $errors->first('seasonal_rates') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Upload Floor Plan</label>
            <input type="file" name="floor_plan" id="floor_plan" data-error="#err_floor_plan" class="filestyle">
            <span id="err_floor_plan" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('floor_plan')) ? $errors->first('floor_plan') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Upload DDR Packages</label>
            <input type="file" name="ddr_packages" id="ddr_packages" data-error="#err_ddr_packages" class="form-control">
            <span id="err_ddr_packages" style="position: relative;
top: -2px;"></span>
            <span class="error"><?php echo e(($errors->has('ddr_packages')) ? $errors->first('ddr_packages') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Benefits</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <?php $__currentLoopData = $Benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" name="benefits[]" value="<?php echo e($Benefit->bid); ?>" data-error="#err_benefits" <?php if($Benefit->uvbid): ?> checked="checked" <?php endif; ?>/></div>
                    <div class="col-md-11">
                        <label><?php echo e($Benefit->title); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Amenities</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <?php $__currentLoopData = $Amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Amenitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="amenities[]" value="<?php echo e($Amenitie->aid); ?>" class="form-control" data-error="#err_amenities" <?php if($Amenitie->uvaid): ?> checked="checked" <?php endif; ?>/> </div>
                    <div class="col-md-11">
                        <label><?php echo e($Amenitie->title); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Business</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <?php $__currentLoopData = $Business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Busines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="business[]" value="<?php echo e($Busines->bsid); ?>" class="form-control" data-error="#err_business" <?php if($Busines->uvbsid): ?> checked="checked" <?php endif; ?>/> </div>
                    <div class="col-md-11">
                        <label><?php echo e($Busines->title); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Features</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <?php $__currentLoopData = $VenueFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VenueFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="features[]" value="<?php echo e($VenueFeature->fid); ?>" class="form-control" data-error="#err_features" <?php if($VenueFeature->uvfid): ?> checked="checked" <?php endif; ?>/> </div>
                    <div class="col-md-11">
                        <label><?php echo e($VenueFeature->title); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Food and Drink</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <?php $__currentLoopData = $VenueFoodDrink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VenueFoodDrink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="fooddrink[]" value="<?php echo e($VenueFoodDrink->fdid); ?>" class="form-control" data-error="#err_fooddrink" <?php if($VenueFoodDrink->uvfdid): ?> checked="checked" <?php endif; ?>/> </div>
                    <div class="col-md-11">
                        <label><?php echo e($VenueFoodDrink->title); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Licensing</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <?php $__currentLoopData = $VenueLicensing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VenueLicensing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="licensing[]" value="<?php echo e($VenueLicensing->lid); ?>" class="form-control" data-error="#err_licensing" <?php if($VenueLicensing->uvlid): ?> checked="checked" <?php endif; ?>/> </div>
                    <div class="col-md-11">
                        <label><?php echo e($VenueLicensing->title); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Capacity Chart</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="table-responsive">
        <table class="table ">
            <tr>
                <th>Capacity Chart</th>
                <th><img src="<?php echo e(asset('tbbc/img/1.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/2.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/3.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/4.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/5.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/6.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/7.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/8.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/9.png')); ?>"></th>
                <th><img src="<?php echo e(asset('tbbc/img/10.png')); ?>"></th>
            </tr>
            <tbody>
                <?php $i=0;?>
                    <?php $__currentLoopData = $VenueCapacity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VenueCapacit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <input type="hidden" name="capacity[]" value="<?php echo e($VenueCapacit->vcid); ?>" />
                            <input type="hidden" name="capacity_mid[]" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->uvcid); ?><?php endif; ?>" />
                            <input type="hidden" name="capacity_value[]" value="<?php echo e($VenueCapacit->title); ?>" id="ca_<?php echo $i;?>" />
                            <label><?php echo e($VenueCapacit->title); ?></label>
                        </td>
                        <td>
                            <input type="text" name="total_sq_fit[]" class="" id="tsf_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->total_sq_fit); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="room_size[]" class="" id="rs_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->room_size); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="celing_height[]" class="" id="ch_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->celing_height); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="class_room[]" class="" id="cr_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->class_room); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="theater_1[]" class="" id="tr1_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->theater_1); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="theater_2[]" class="" id="tr2_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->theater_2); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="reception[]" class="" id="rep_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->reception); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="conference[]" class="" id="conf_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->conference); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="u_shape[]" class="" id="us_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->u_shape); ?><?php endif; ?>">
                        </td>
                        <td>
                            <input type="text" name="h_shape[]" class="" id="hs_<?php echo $i;?>" value="<?php if($VenueCapacit): ?><?php echo e($VenueCapacit->h_shape); ?><?php endif; ?>">
                        </td>
                    </tr>
                    <?php  $i++?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Channelized Hotel Information End -->
<div class="tab-pane" id="tab07">
<div id="contact_section">
<div class="col-lg-12 cform" id="contact_add_form0">

<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<h1>Hotel Images</h1>
</div>
<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Main Image</label>
    <input type="file" name="hotel_img_1" id="hotel_img_1" class="filestyle">
    <!-- <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div> -->
</div>

<div id="h_image_preview1" class="image_preview">
    <?php if($Hotels->image_1): ?>
    <img src="<?php echo e(url('')); ?>/uploads/hotels/<?php echo e($Hotels->image_1); ?>"> <?php endif; ?>
</div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 1</label>
    <input type="file" name="hotel_img_2" id="hotel_img_2" class="filestyle">
    <!-- <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div> -->
</div>

<!--  <input type="file" id="hotel_img_2" name="hotel_img_2" />
<br/> -->

<div id="h_image_preview2" class="image_preview">
    <?php if($Hotels->image_2): ?>
    <img src="<?php echo e(url('')); ?>/uploads/hotels/<?php echo e($Hotels->image_2); ?>"> <?php endif; ?>
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 2</label>
    <input type="file" name="hotel_img_3" id="hotel_img_3" class="filestyle">
   <!--  <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div> -->
</div>

<div id="h_image_preview3" class="image_preview">
    <?php if($Hotels->image_3): ?>
    <img src="<?php echo e(url('')); ?>/uploads/hotels/<?php echo e($Hotels->image_3); ?>"> <?php endif; ?>
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 3</label>
    <input type="file" name="hotel_img_4" id="hotel_img_4" class="filestyle">
    <!-- <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div> -->
</div>

<div id="h_image_preview4" class="image_preview">
    <?php if($Hotels->image_4): ?>
    <img src="<?php echo e(url('')); ?>/uploads/hotels/<?php echo e($Hotels->image_4); ?>"> <?php endif; ?>
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 4</label>
    <input type="file" name="hotel_img_5" id="hotel_img_5" class="filestyle">
    <!-- <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div> -->
</div>

<div id="h_image_preview5" class="image_preview">
    <?php if($Hotels->image_5): ?>
    <img src="<?php echo e(url('')); ?>/uploads/hotels/<?php echo e($Hotels->image_5); ?>"> <?php endif; ?>
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 5</label>
    <input type="file" name="hotel_img_6" id="hotel_img_6" class="filestyle">
    <!-- <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info " type="button">Upload</button>
</span>
    </div> -->
</div>

<div id="h_image_preview6" class="image_preview">
    <?php if($Hotels->image_6): ?>
    <img src="<?php echo e(url('')); ?>/uploads/hotels/<?php echo e($Hotels->image_6); ?>"> <?php endif; ?>
</div>

</div>

</div>
</div>
</div>
</div>

    <div class="tab-pane" id="tab08">
    <!-- <form id="commentForm" action="<?php echo e(url('hotelier/added-user')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST"> -->
    
    <!-- </form> -->
    </div>

    <!-- view start-->
    <div class="tab-pane" id="tab09">    
<div class="navbar-pills " id="bs-example-navbar-collapse-2">

<ul class="nav nav-tabs tab-no-active-fill nav-pills" style="margin-top: 10px;">
<li class="nav-item" ><a class="nav-link" href="#subtab01" data-toggle="tab">Partner Hotel Access</a></li>
<li class="nav-item"><a href="#subtab02" class="nav-link " data-toggle="tab">APLBC Team Acess</a></li>
</ul>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><div class="alert alert-success alert-success-users hidden" role="alert"></div></div>


 <div class="tab-panel active show" id="subtab01"> <h3>Partner Hotel Access</h3>
<div class="table-responsive">

    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!--<th><input type="checkbox" id="selectall"/></th>-->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Login Created</th>            
            <th>Action</th>
          </tr>
        </thead>
         
        <tbody>
            <?php if($portalUsers): ?>
            <?php $__currentLoopData = $portalUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($view_user->f_name); ?></td>
                <td><?php echo e($view_user->l_name); ?></td>
                <td><?php echo e($view_user->job_title); ?></td>                
                 <td><?php echo e($view_user->email_add); ?></td>
                 <td><?php echo e(date("d-m-Y", strtotime($view_user->login_created))); ?></td>
                <td>
               <!--  <a href="#edit_model" class="" data-toggle="modal" data-target="#edit_model" onclick="load_model('<?php echo e($view_user->ptid); ?>')"><i class="fa fa-key" aria-hidden="true"></i></a>
                    &nbsp; --> 

<?php if($view_user->hotelier_cont_id): ?>
                     <a href="javascript:void(0);" class="send_welcome_letter" id='<?php echo e($view_user->uid); ?>' data-toggle="tooltip" data-placement="top" title="Welcome Letter to Partner" ><i class="fa fa-handshake-o" style="font-size: 20px;"></i></a>
                    &nbsp;
 <?php else: ?>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>

                <a href="javascript:void(0);" class="send_password" id='<?php echo e($view_user->ptid); ?>' data-toggle="tooltip" data-placement="top" title="Send Password to Partner" ><i class="fa fa-envelope" style="font-size: 20px;"></i></a>
                    &nbsp;
               
                    <?php if($view_user->activated==1): ?>   
                    <a href="javascript:void(0);" class="send_active" data-id="1"  id="<?php echo e($view_user->uid); ?>" data-toggle="tooltip" data-placement="top" title="Inactive"><i class="fa fa-user" style="font-size: 20px;"></i> </a>
                    <?php elseif($view_user->activated==2): ?> 
                    <a href="javascript:void(0);" class="send_active" data-id="2" id="<?php echo e($view_user->uid); ?>" alt="Active" data-toggle="tooltip" data-placement="top" title="Active"><i class="fa fa-user" style="font-size: 20px;"></i> </a>
                    <?php else: ?>
                    <a href="javascript:void(0);" class="send_active" data-id="1"  id="<?php echo e($view_user->uid); ?>" data-toggle="tooltip" data-placement="top" title="Inactive"><i class="fa fa-user" style="font-size: 20px;"></i> </a>
                    <?php endif; ?>
                
<!-- <a href="#edit_model" class="" data-toggle="modal" data-target="#edit_model" onclick="load_model('<?php echo e($view_user->ptid); ?>')"><i class="fa fa-edit fa-lg"></i></a> --></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
 </div>
 <div class="tab-panel" id="subtab02" > 
<h3>APLBC Team Acess</h3>
<div class="table-responsive">

    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!--<th><input type="checkbox" id="selectall"/></th>-->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Assigned</th>
            <th>Login Created</th>            
            <th>Action</th>
          </tr>
        </thead>
         
        <tbody>
            <?php if($CrmUser): ?>
            <?php $__currentLoopData = $CrmUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php $variable=explode(',', $crm_user->business_id);
$ass='No';
foreach ($variable as $value) {
    if($value==$Hotels->id){ 
        $ass='Yes';
    }
}
            ?>
            <tr>
                <td><?php echo e($crm_user->first_name); ?></td>
                <td><?php echo e($crm_user->last_name); ?></td>                
                 <td><?php echo e($crm_user->email); ?></td>
                 <td><?php echo e($ass); ?></td>
                 <td><?php echo e(date("d-m-Y", strtotime($crm_user->login_created))); ?></td>
                <td>              
                <a href="javascript:void(0);" class="assign_portal" data-toggle="tooltip" data-placement="top" title="Assign Portal" alt="Assign Portal" id='<?php echo e($crm_user->uid); ?>' data-id=''><i class="fa fa-user" style="font-size:20px"></i></a>
                    
<!-- <a href="#edit_model" class="" data-toggle="modal" data-target="#edit_model" onclick="load_model('<?php echo e($crm_user->uid); ?>')"><i class="fa fa-edit fa-lg"></i></a> --></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
 </div>


   <!--  <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Add User</div> -->
   <!--  <div class="col-sm-12 col-md-12 col-lg-12 panel">
        <div class="alert alert-success room-success hidden"></div>
   
    <div id="contact_section" class="">
    <div id="contact_add_form0" class="row">
        
         
    <?php echo e(csrf_field()); ?>


    <div class="col-lg-6 col-md-7 offset-3" style="margin-top: 5%;" > 
                                    
     <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">First Name</label>
      <div class="col-sm-6 col-md-8">
       <input class="form-control" type="text" value="" name="firstname" id="firstname" value="" autocomplete="off"/>
                    <span class="error"><?php echo e(($errors->has('firstname')) ? $errors->first('firstname') : ''); ?></span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">Last Name</label>
      <div class="col-sm-6 col-md-8">
        <input class="form-control" type="text" value="" name="lastname" id="lastname" value="" autocomplete="off"/>
                    <span class="error"><?php echo e(($errors->has('lastname')) ? $errors->first('lastname') : ''); ?></span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">Email</label>
      <div class="col-sm-6 col-md-8">
        <input class="form-control" type="text" value="" name="emailId" id="emailId" value="" onkeyup="emailExist(this.value)" autocomplete="off"/>
                    <span id="email_error" class="error"><?php echo e(($errors->has('email')) ? $errors->first('email') : ''); ?></span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">Password</label>
      <div class="col-sm-6 col-md-8">
        <input class="form-control" type="password" autocomplete="off" value="" name="cpassword" id="cpassword" />
                    <span id="cpassword_error" class="error"><?php echo e(($errors->has('password')) ? $errors->first('password') : ''); ?></span>
      </div>
    </div>

                    
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <input type="hidden" id="hotel_bid" name="hotel_bid" value="<?php echo e(request()->route('id')); ?>">
            <div class="row mt-30 "></div>
            <div class="form-group">
            <div class="col-md-4 col-sm-4 col-xs-12 offset-4">                      
            <input class="btn btn-primary btn-center enqiry-button" type="button" name="submit" id="adduser"
              value="Submit"/>
            </div>
            </div>
    </div>
    
    </div>
    </div>
    </div> -->
    <!-- add user end-->
   <!--  <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion ">View User</div>
        <div class="col-sm-12 col-md-12 col-lg-12 panel">
        <div class="alert alert-success room-success hidden"></div>
    <form id="commentForm" action="" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
    <div class="table-responsive">

    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
         
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Edit</th>
          </tr>
        </thead>
         
        <tbody>
            <?php if($view_users): ?>
            <?php $__currentLoopData = $view_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($view_user->first_name); ?></td>
                <td><?php echo e($view_user->last_name); ?></td>
                <td><?php echo e($view_user->email); ?></td>
                <td><a href="#edit_model" class="" data-toggle="modal" data-target="#edit_model" onclick="load_model('<?php echo e($view_user->id); ?>')"><i class="fa fa-edit fa-lg"></i></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
    </form> -->
<!--     </div> -->
    </div>

    <!-- view end-->
<!--edit modal open-->
<form  id="edit_user" action="<?php echo e(url('hotelier/userpw-updated')); ?>" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<div id="edit_model" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="modal-header">
            <h4 class="modal-title">View Password</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            
                    <div class="row">
                        <div class="alert alert-success alert-success-offer hidden" role="alert">
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="">
                        <input type="hidden" id="edit_id" name="edit_id" value="<?php echo e($id); ?>">
                        
                        <div class="col-md-10 offset-2" >
                        <div class="panel-collapse" id="collapseOne">
                            <div class="panel-body">
                                <!-- <div class="row"> -->
                            <!--     <div class="col-sm-10 col-md-10 col-lg-10 form-group">
                                    <label>First Name </label>
                                    <input type="text" name="first_name" id="first_name" value="" class="form-control required" >
                                </div>                                              
                                <div class="col-sm-10 col-md-10 col-lg-10 form-group">
                                    <label>Last Name </label>
                                    <input type="text" name="last_name" id="last_name" value="" class="form-control required" >
                                </div>                                          
                                <div class="col-sm-10 col-md-10 col-lg-10 form-group">
                                    <label>Email </label>
                                    <input type="text" name="email_id" id="email_id" value="" class="form-control required"  readonly>
                                </div>  --> 
                                <div class="col-sm-10 col-md-10 col-lg-10 form-group">
                                    <label>Password </label>
                                    <h4 id="password"></h4>
                                  <!--   <input type="password" name="password" id="password" value="" class="form-control " > -->
                                </div>
                                <!-- </div>  -->                    
                            </div>
            
                        </div>
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer">
            <div class="col-md-8 offset-4" >
            <input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="updateuser" ></input>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
</form>
<!--edit modal user end-->

<!-- SynXis CRS Initialization Questionnaire Start -->
<div class="tab-pane" id="tab06">
<div id="contact_section">
<div class="row">
<!--   <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><div class="alert alert-success synxis-status hidden"></div>
<div class="alert alert-danger print-error-msg" style="display:none">
<ul></ul>
</div>

                  </div> -->
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<h1>SynXis CRS Initialization Questionnaire</h1>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Basic Property Information</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" style="display: block;">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Chain Name </label>
            <input name="chain_name" id="chain_name" type="text" class="form-control" data-error="#err_chain_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->chain_name); ?><?php endif; ?>">
            <span id="err_chain_name"></span>
            <span class="error"><?php echo e(($errors->has('chain_name')) ? $errors->first('chain_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Chain ID </label>
            <input name="chain_id" id="chain_id" type="text" class="form-control" data-error="#err_chain_id" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->chain_id); ?><?php endif; ?>">
            <span id="err_chain_id"></span>
            <span class="error"><?php echo e(($errors->has('chain_id')) ? $errors->first('chain_id') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Name Displayed in the GDSs,IDS and the SynXis CRS</label>
            <input name="syn_property_name" id="syn_property_name" type="text" class="form-control" data-error="#err_syn_property_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_name); ?><?php endif; ?>">
            <span id="err_syn_property_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_name')) ? $errors->first('syn_property_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Name – Displayed in all other channels </label>
            <input name="syn_property_name_all" id="syn_property_name_all" type="text" class="form-control" data-error="#err_syn_property_name_all" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_name_all); ?><?php endif; ?>">
            <span id="err_syn_property_name_all"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_name_all')) ? $errors->first('syn_property_name_all') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Code (Same as your PMS Code)</label>
            <input name="syn_property_code" id="syn_property_code" type="text" class="form-control" data-error="#err_syn_property_code" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_code); ?><?php endif; ?>">
            <span id="err_syn_property_code"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_code')) ? $errors->first('syn_property_code') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Physical Address</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Street Address Line 1 </label>
            <input name="syn_phy_address1" id="syn_phy_address1" type="text" class="form-control" data-error="#err_syn_phy_address1" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_phy_address1); ?><?php endif; ?>">
            <span id="err_syn_phy_address1"></span>
            <span class="error"><?php echo e(($errors->has('syn_phy_address1')) ? $errors->first('syn_phy_address1') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Street Address Line 2 </label>
            <input name="syn_phy_address2" id="syn_phy_address2" type="text" class="form-control" data-error="#err_syn_phy_address1" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_phy_address2); ?><?php endif; ?>">
            <span id="err_syn_phy_address2"></span>
            <span class="error"><?php echo e(($errors->has('syn_phy_address2')) ? $errors->first('syn_phy_address2') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Country </label>
            <select class="form-control airport_list13 required" name="syn_phy_country" id="syn_phy_country" data-error="#err_syn_phy_country">
                <option value="">Choose</option>
                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cntry->id); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($cntry->id==$Hotelsynxiscrs->syn_phy_country): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($cntry->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_syn_phy_country"></span>
            <span class="error"><?php echo e(($errors->has('syn_phy_country')) ? $errors->first('syn_phy_country') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>State </label>
            <select class="form-control airport_list14 required" name="syn_phy_state" id="syn_phy_state" data-error="#err_syn_phy_state">
                <option value="">Choose</option>
                <?php if($states): ?> <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($state->id==$Hotelsynxiscrs->syn_phy_state): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($state->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
            </select>
            <span id="err_syn_phy_country"></span>
            <span class="error"><?php echo e(($errors->has('syn_phy_country')) ? $errors->first('syn_phy_country') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>City </label>
            <select class="form-control airport_list15 required" name="syn_phy_city" id="syn_phy_city" data-error="#err_syn_phy_city">
                <option value="">Choose</option>
                <?php if($cities): ?> <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($city->id); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($city->id==$Hotelsynxiscrs->syn_phy_city): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($city->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
            </select>
            <span id="err_syn_phy_city"></span>
            <span class="error"><?php echo e(($errors->has('syn_phy_city')) ? $errors->first('syn_phy_city') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Post Code </label>
            <input name="syn_phy_postcode" id="syn_phy_postcode" type="text" class="form-control" data-error="#err_hotel_short_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_phy_postcode); ?><?php endif; ?>">
            <span id="err_syn_phy_postcodee"></span>
            <span class="error"><?php echo e(($errors->has('syn_phy_postcode')) ? $errors->first('syn_phy_postcode') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Rolling Inventory Amount </label>
            <input name="syn_invertry_amt" id="syn_invertry_amt" type="text" class="form-control" data-error="#err_syn_invertry_amt" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_invertry_amt); ?><?php endif; ?>">
            <span id="err_syn_invertry_amt"></span>
            <span class="error"><?php echo e(($errors->has('syn_invertry_amt')) ? $errors->first('syn_invertry_amt') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Phone and Fax</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Main Phone</label>
            <input name="syn_main_phone" id="syn_main_phone" type="text" class="form-control" data-error="#err_syn_main_phone" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_main_phone); ?><?php endif; ?>">
            <span id="err_syn_main_phone"></span>
            <span class="error"><?php echo e(($errors->has('syn_main_phone')) ? $errors->first('syn_main_phone') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Main Fax </label>
            <input name="syn_main_fax" id="syn_main_fax" type="text" class="form-control" data-error="#err_syn_main_fax" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_main_fax); ?><?php endif; ?>">
            <span id="err_syn_main_fax"></span>
            <span class="error"><?php echo e(($errors->has('syn_main_fax')) ? $errors->first('syn_main_fax') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            &nbsp;
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Latitude</label>
            <input name="syn_latitude" id="syn_latitude" type="text" class="form-control" data-error="#err_syn_latitude" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_latitude); ?><?php endif; ?>">
            <span id="err_syn_latitude"></span>
            <span class="error"><?php echo e(($errors->has('syn_latitude')) ? $errors->first('syn_latitude') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Longitude</label>
            <input name="syn_longitude" id="syn_longitude" type="text" class="form-control" data-error="#err_syn_longitude" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_longitude); ?><?php endif; ?>">
            <span id="err_syn_longitude"></span>
            <span class="error"><?php echo e(($errors->has('syn_longitude')) ? $errors->first('syn_longitude') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property’s General Enquiry Email address</label>
            <input name="syn_gen_enq_email" id="syn_gen_enq_email" type="text" class="form-control" data-error="#err_syn_gen_enq_email" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_gen_enq_email); ?><?php endif; ?>">
            <span id="err_syn_gen_enq_email"></span>
            <span class="error"><?php echo e(($errors->has('syn_gen_enq_email')) ? $errors->first('syn_gen_enq_email') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property’s Website Address</label>
            <input name="syn_web" id="syn_web" type="text" class="form-control" data-error="#err_syn_web" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_web); ?><?php endif; ?>">
            <span id="err_syn_web"></span>
            <span class="error"><?php echo e(($errors->has('syn_web')) ? $errors->first('syn_web') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Language Selection</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Default </label>           
            <select class="form-control airport_list15 required" name="syn_default_lang" id="syn_default_lang" data-error="#err_syn_default_lang">                
                <?php $__currentLoopData = $Languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($Lang->id); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($Lang->id==$Hotelsynxiscrs->syn_default_lang): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($Lang->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <span id="err_syn_default_lang"></span>
            <span class="error"><?php echo e(($errors->has('syn_default_lang')) ? $errors->first('syn_default_lang') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 2 </label>
               <select class="form-control airport_list16 required" name="syn_op2_lang" id="syn_op2_lang" >                
                <?php $__currentLoopData = $Languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($Lang->id); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($Lang->id==$Hotelsynxiscrs->syn_op2_lang): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($Lang->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_syn_op2_lang"></span>
            <span class="error"><?php echo e(($errors->has('syn_op2_lang')) ? $errors->first('syn_op2_lang') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 3</label>         
             <select class="form-control airport_list16 required" name="syn_op3_lang" id="syn_op3_lang" >                
                <?php $__currentLoopData = $Languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($Lang->id); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($Lang->id==$Hotelsynxiscrs->syn_op3_lang): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($Lang->name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span id="err_syn_op3_lang"></span>
            <span class="error"><?php echo e(($errors->has('syn_op3_lang')) ? $errors->first('syn_op3_lang') : ''); ?></span>
        </div>
    </div>
    
    <!-- <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 5</label>
            <input name="syn_op5_lang" id="syn_op5_lang" type="text" class="form-control" data-error="#err_syn_op5_lang" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_op5_lang); ?><?php endif; ?>">
            <span id="err_syn_op5_lang"></span>
            <span class="error"><?php echo e(($errors->has('syn_op5_lang')) ? $errors->first('syn_op5_lang') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 6</label>
            <input name="syn_op6_lang" id="syn_op6_lang" type="text" class="form-control" data-error="#err_syn_op6_lang" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_op6_lang); ?><?php endif; ?>">
            <span id="err_syn_op6_lang"></span>
            <span class="error"><?php echo e(($errors->has('syn_op6_lang')) ? $errors->first('syn_op6_lang') : ''); ?></span>
        </div>
    </div> -->
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Others</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Currency</label>  
                <select class="form-control airport_list5" name="syn_currency" id="syn_currency" data-error="#err_syn_currency">
                <option value="">Choose</option>
                <?php $__currentLoopData = $Currencylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($Currency->code); ?>" <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_currency == $Currency->code ): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($Currency->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>


            <span id="err_hotel_short_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_currency')) ? $errors->first('syn_currency') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Time Zone</label>
            <select class="form-control airport_list7" name="syn_time_zone" id="syn_time_zone" data-error="#err_syn_time_zone">
            <option value="">Choose</option>
            <?php $__currentLoopData = $Zone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Timez): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_time_zone == $Timez->zone_id ): ?> selected="selected" <?php endif; ?> <?php endif; ?> value="<?php echo e($Timez->zone_id); ?>"><?php echo e($Timez->zone_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
            <span id="err_syn_time_zone"></span>
            <span class="error"><?php echo e(($errors->has('syn_time_zone')) ? $errors->first('syn_time_zone') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Main Airport</label>
            <select id="syn_airport" name="syn_airport" class="airport_list airport_list_btn form-control" data-error="#err_syn_airport">
                            <option value="">Choose any one</option>
                            <?php $__currentLoopData = $Airports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Airport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($Airport->id); ?>" <?php if($Hotelsynxiscrs->syn_airport == $Airport->id): ?> selected="selected" <?php endif; ?> ><?php echo e($Airport->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>            
            <span id="err_syn_airport"></span>
            <span class="error"><?php echo e(($errors->has('syn_airport')) ? $errors->first('syn_airport') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Receiving Reservations from the SynXis CRS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Via Email?</label>
            <br><br>
            <input type="radio" name="syn_via_email" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_via_email=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> Yes &nbsp;&nbsp;
            <input type="radio" name="syn_via_email" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_via_email=='No'): ?> checked="checked" <?php endif; ?> <?php else: ?> checked="checked <?php endif; ?>"> No
          
            <span id="err_grp_name"></span>
            <span class="error"><?php echo e(($errors->has('grp_name')) ? $errors->first('grp_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Email Address</label>
            <input name="syn_via_email_add" id="syn_via_email_add" type="text" class="form-control" data-error="#err_syn_via_email_add" value="<?php if($Hotelsynxiscrs): ?> <?php echo e($Hotelsynxiscrs->syn_via_email_add); ?> <?php endif; ?>">
            <span id="err_syn_via_email_add"></span>
            <span class="error"><?php echo e(($errors->has('syn_via_email_add')) ? $errors->first('syn_via_email_add') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Via Fax? </label>
            <br><br>
            <input type="radio" name="syn_via_fax" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_via_fax=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_via_fax" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_via_fax=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
            
            <span id="err_hotel_id"></span>
            <span class="error"><?php echo e(($errors->has('hotel_id')) ? $errors->first('hotel_id') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Phone Number </label>
            <input name="syn_via_fax_no" id="syn_via_fax_no" type="text" class="form-control" data-error="#err_syn_via_fax_no" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_via_fax_no); ?><?php endif; ?>">
            <span id="err_syn_via_fax_no"></span>
            <span class="error"><?php echo e(($errors->has('syn_via_fax_no')) ? $errors->first('syn_via_fax_no') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Channels that you will distribute your hotel to via the SynXis CRS</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>GDS</label>
            <label>Sabre</label>
            <label>Apollo/Gailieo</label>
            <label>Amadeus</label>
            <label>Worldspan</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <input type="radio" name="syn_channel_1" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_1=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_channel_1" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_1=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
           
            <span id="err_syn_channel_1"></span>
            <span class="error"><?php echo e(($errors->has('syn_channel_1')) ? $errors->first('syn_channel_1') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
          <!--   <textarea class="form-control" name="syn_channel_desc_1" id="syn_channel_desc_1"><?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_channel_desc_1); ?><?php endif; ?></textarea> -->
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>IDS</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <input type="radio" name="syn_channel_2" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_2=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_channel_2" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_2=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
            
            <span id="err_syn_channel_2"></span>
            <span class="error"><?php echo e(($errors->has('syn_channel_2')) ? $errors->first('syn_channel_2') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <!-- <textarea class="form-control" name="syn_channel_desc_2" id="syn_channel_desc_2"><?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_channel_desc_2); ?><?php endif; ?></textarea> -->
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Voice Agent</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <input type="radio" name="syn_channel_3" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_3=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_channel_3" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_3=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
          
            <span id="err_syn_channel_3"></span>
            <span class="error"><?php echo e(($errors->has('syn_channel_3')) ? $errors->first('syn_channel_3') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <!-- <textarea class="form-control" name="syn_channel_desc_3" id="syn_channel_desc_3"><?php if($Hotelsynxiscrs): ?> <?php echo e($Hotelsynxiscrs->syn_channel_desc_3); ?><?php endif; ?></textarea> -->
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Booking Engine</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <input type="radio" name="syn_channel_4" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_4=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_channel_4" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_4=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
            
            <span id="err_syn_channel_4"></span>
            <span class="error"><?php echo e(($errors->has('hotel_short_name')) ? $errors->first('hotel_short_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <!-- <textarea class="form-control" name="syn_channel_desc_4" id="syn_channel_desc_4"><?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_channel_desc_4); ?><?php endif; ?></textarea> -->
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Mobile Engine</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <input type="radio" name="syn_channel_5" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_5=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_channel_5" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_5=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
           

            <span id="err_syn_channel_5"></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <!-- <textarea class="form-control" name="syn_channel_desc_5" id="syn_channel_desc_5"><?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_channel_desc_5); ?><?php endif; ?></textarea> -->
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Direct Connect</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <input type="radio" name="syn_channel_6" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_6=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_channel_6" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_channel_6=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
            
            <span id="err_syn_channel_6"></span>
            <span class="error"><?php echo e(($errors->has('syn_channel_6')) ? $errors->first('syn_channel_6') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <!-- <textarea class="form-control" name="syn_channel_desc_6" id="syn_channel_desc_6"><?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_channel_desc_6); ?><?php endif; ?></textarea> -->
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Billing Contact</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Primary Billing Contact</strong></div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Title</label>
            <select name="syn_pri_title" id="syn_pri_title" class="form-control valid" data-error="#err_c_title" aria-required="true" aria-invalid="false">
            <option value="Mr" <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_pri_title=='Mr'): ?> selected='selected' <?php endif; ?> <?php endif; ?>">Mr</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_pri_title=='Mrs'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Mrs</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_pri_title=='Ms'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Ms</option>
            </select>           
            <span id="err_syn_pri_title"></span>
            <span class="error"><?php echo e(($errors->has('syn_pri_title')) ? $errors->first('syn_pri_title') : ''); ?></span>
        </div>
    </div>
   <!--  <?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_pri_name); ?><?php endif; ?> -->
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Full Name</label>
            <input name="syn_pri_name" id="syn_pri_name" type="text" class="form-control" data-error="#err_syn_pri_name" value ="Edwin Bekoe" >
            <span id="err_syn_pri_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_pri_name')) ? $errors->first('syn_pri_name') : ''); ?></span>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_pri_phone" id="syn_pri_phone" type="text" class="form-control" data-error="#err_syn_pri_phone" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_pri_phone); ?><?php endif; ?>">
            <span id="err_syn_pri_phone"></span>
            <span class="error"><?php echo e(($errors->has('syn_pri_phone')) ? $errors->first('syn_pri_phone') : ''); ?></span>
        </div>
    </div><!-- <?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_pri_email); ?><?php endif; ?> -->
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_pri_email" id="syn_pri_email" type="text" class="form-control" data-error="#err_syn_pri_email" value="edwin.bekoe@ap-lbc.com">
            <span id="err_syn_pri_email"></span>
            <span class="error"><?php echo e(($errors->has('syn_pri_email')) ? $errors->first('syn_pri_email') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Additional Billing Contact</strong></div>
     <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Title</label>
            <select name="syn_add1_title" id="syn_add1_title" class="form-control valid" data-error="#err_c_title" aria-required="true" aria-invalid="false">
            <option value="Mr" <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_add1_title=='Mr'): ?> selected='selected' <?php endif; ?> <?php endif; ?>">Mr</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_add1_title=='Mrs'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Mrs</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_add1_title=='Ms'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Ms</option>
            </select>            
            <span id="err_syn_add1_title"></span>
            <span class="error"><?php echo e(($errors->has('syn_add1_title')) ? $errors->first('syn_add1_title') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Full Name</label>
            <input name="syn_add1_name" id="syn_add1_name" type="text" class="form-control" data-error="#err_syn_add1_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_add1_name); ?><?php endif; ?>">
            <span id="err_syn_add1_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_add1_name')) ? $errors->first('syn_add1_name') : ''); ?></span>
        </div>
    </div>
   
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_add1_phone" id="syn_add1_phone" type="text" class="form-control" data-error="#err_syn_add1_phone" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_add1_phone); ?><?php endif; ?>">
            <span id="err_syn_add1_phone"></span>
            <span class="error"><?php echo e(($errors->has('syn_add1_phone')) ? $errors->first('syn_add1_phone') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_add1_email" id="syn_add1_email" type="text" class="form-control" data-error="#err_syn_add1_email" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_add1_email); ?><?php endif; ?>">
            <span id="err_syn_add1_email"></span>
            <span class="error"><?php echo e(($errors->has('syn_add1_email')) ? $errors->first('syn_add1_email') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Additional Billing Contact</strong></div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Title</label>
            <select name="syn_add2_title" id="syn_add2_title" class="form-control valid" data-error="#err_c_title" aria-required="true" aria-invalid="false">
            <option value="Mr" <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_add2_title=='Mr'): ?> selected='selected' <?php endif; ?> <?php endif; ?>">Mr</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_add2_title=='Mrs'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Mrs</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_add2_title=='Ms'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Ms</option>
            </select>

            <span id="err_syn_add2_title"></span>
            <span class="error"><?php echo e(($errors->has('syn_add2_title')) ? $errors->first('syn_add2_title') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Full Name</label>
            <input name="syn_add2_name" id="syn_add2_name" type="text" class="form-control" data-error="#err_syn_add2_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_add2_name); ?><?php endif; ?>">
            <span id="err_syn_add2_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_add2_name')) ? $errors->first('syn_add2_name') : ''); ?></span>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_add2_phone" id="syn_add2_phone" type="text" class="form-control" data-error="#err_syn_add2_phone" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_add2_phone); ?><?php endif; ?>">
            <span id="err_syn_add2_phone"></span>
            <span class="error"><?php echo e(($errors->has('syn_add2_phone')) ? $errors->first('syn_add2_phone') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_add2_email" id="syn_add2_email" type="text" class="form-control" data-error="#err_syn_add2_email" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_add2_email); ?><?php endif; ?>">
            <span id="err_syn_add2_email"></span>
            <span class="error"><?php echo e(($errors->has('syn_add2_email')) ? $errors->first('syn_add2_email') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Technical Contact</strong></div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Title</label>
             <select name="syn_tec_title" id="syn_tec_title" class="form-control valid" data-error="#err_c_title" aria-required="true" aria-invalid="false">
            <option value="Mr" <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_tec_title=='Mr'): ?> selected='selected' <?php endif; ?> <?php endif; ?>">Mr</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_tec_title=='Mrs'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Mrs</option>
            <option <?php if($Hotelsynxiscrs): ?> <?php if($Hotelsynxiscrs->syn_tec_title=='Ms'): ?> selected='selected' <?php endif; ?> <?php endif; ?>" >Ms</option>
            </select>

            <span id="err_syn_tec_title"></span>
            <span class="error"><?php echo e(($errors->has('syn_tec_title')) ? $errors->first('syn_tec_title') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Full Name</label>
            <input name="syn_tec_name" id="syn_tec_name" type="text" class="form-control" data-error="#err_syn_tec_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_tec_name); ?><?php endif; ?>">
            <span id="err_syn_tec_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_tec_name')) ? $errors->first('syn_tec_name') : ''); ?></span>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_tec_phone" id="syn_tec_phone" type="text" class="form-control" data-error="#err_syn_tec_phone" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_tec_phone); ?><?php endif; ?>">
            <span id="err_syn_tec_phone"></span>
            <span class="error"><?php echo e(($errors->has('syn_tec_phone')) ? $errors->first('syn_tec_phone') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_tec_email" id="syn_tec_email" type="text" class="form-control" data-error="#err_syn_tec_email" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_tec_email); ?><?php endif; ?>">
            <span id="err_syn_tec_email"></span>
            <span class="error"><?php echo e(($errors->has('syn_tec_email')) ? $errors->first('syn_tec_email') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>GDS Representation</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Are You Already Represented in the GDS? </label>
            <br><br>
            <input type="radio" name="syn_already_rep" value="Yes" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_already_rep=='Yes'): ?> checked="checked" <?php endif; ?> <?php endif; ?> > Yes &nbsp;&nbsp;
            <input type="radio" name="syn_already_rep" value="No" <?php if($Hotelsynxiscrs): ?><?php if($Hotelsynxiscrs->syn_already_rep=='No'): ?> checked="checked" <?php endif; ?> <?php endif; ?>> No
            
            <span id="err_syn_already_rep"></span>
            <span class="error"><?php echo e(($errors->has('syn_already_rep')) ? $errors->first('syn_already_rep') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Your current GDS Representation Company Name</label>
            <input name="syn_gds_comp_name" id="syn_gds_comp_name" type="text" class="form-control" data-error="#err_syn_gds_comp_name" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_gds_comp_name); ?><?php endif; ?>">
            <span id="err_syn_gds_comp_name"></span>
            <span class="error"><?php echo e(($errors->has('syn_gds_comp_name')) ? $errors->first('syn_gds_comp_name') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>- If You Know The Chain Code, Please Enter It Here</label>
            <input name="syn_chain_code" id="syn_chain_code" type="text" class="form-control" data-error="#err_syn_chain_code" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_chain_code); ?><?php endif; ?>"> (max 2 alpha characters. Example: UI)
            <span id="err_syn_chain_code"></span>
            <span class="error"><?php echo e(($errors->has('syn_chain_code')) ? $errors->first('syn_chain_code') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>- If you know them, your current GDS property codes:</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Sabre: </label>
            <input name="syn_property_code_sabre" id="syn_property_code_sabre" type="text" class="form-control" data-error="#err_syn_property_code_sabre" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_code_sabre); ?><?php endif; ?> ">
            <span id="err_syn_property_code_sabre"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_code_sabre')) ? $errors->first('syn_property_code_sabre') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Apollo/Galileo </label>
            <input name="syn_property_code_apollo" id="syn_property_code_apollo" type="text" class="form-control" data-error="#err_syn_property_code_apollo" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_code_apollo); ?><?php endif; ?>">
            <span id="err_syn_property_code_apollo"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_code_apollo')) ? $errors->first('syn_property_code_apollo') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Worldspan</label>
            <input name="syn_property_code_worldspan" id="syn_property_code_worldspan" type="text" class="form-control" data-error="#err_syn_property_code_worldspan" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_code_worldspan); ?><?php endif; ?>">
            <span id="err_syn_property_code_worldspan"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_code_worldspan')) ? $errors->first('syn_property_code_worldspan') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Amadeus </label>
            <input name="syn_property_code_amadeus" id="syn_property_code_amadeus" type="text" class="form-control" data-error="#err_syn_property_code_amadeus" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->syn_property_code_amadeus); ?><?php endif; ?>">
            <span id="err_syn_property_code_amadeus"></span>
            <span class="error"><?php echo e(($errors->has('syn_property_code_amadeus')) ? $errors->first('syn_property_code_amadeus') : ''); ?></span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">PMS </div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>What PMS are you using? </label>
            <input type="text" class="form-control" name="pms_type" value="<?php if($Hotelsynxiscrs): ?> <?php echo e($Hotelsynxiscrs->pms_type); ?> <?php endif; ?> ">
          
            <span id="err_pms_type"></span>
            <span class="error"><?php echo e(($errors->has('pms_type')) ? $errors->first('pms_type') : ''); ?></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>What is the current PMS version?</label>
            <input name="pms_version" id="pms_version" type="text" class="form-control" data-error="#err_pms_version" value="<?php if($Hotelsynxiscrs): ?><?php echo e($Hotelsynxiscrs->pms_version); ?><?php endif; ?>">
            <span id="err_pms_version"></span>
            <span class="error"><?php echo e(($errors->has('pms_version')) ? $errors->first('pms_version') : ''); ?></span>
        </div>
    </div>
</div>
</div>
</div>
<!-- <div class="col-lg-2 col-md-2 mx-auto" ><input type="submit"  name="savesyncis" value="Save SynXis CRS" class="btn-primary btn" id="SynXisBtn"></div> -->
</div>
</div>
<!-- SynXis CRS Initialization Questionnaire End -->
<!--//VENUE CAPACITY-->
<!--<ul class="pager wizard">
<li class="previous first" ><a href="javascript:;" style="display:none;">First</a></li>
<li class="previous"><a href="javascript:;">Previous</a></li>
<li class="next last"><a href="javascript:;" style="display:none;">Last</a></li>
<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right next-btn" style=""></li>

<?php /*
<li class="previous first" style="display:none;" ><a href="#">First</a></li>
<li class="previous"><a href="#" >Previous</a></li>
<li class="next last" style="display:none;"><a href="#" >Last</a></li>
<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right" style="width:12%"></li>
<li class="finish"><a href="javascript:;">Finish</a></li>*/?>
</ul>-->
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mb-10">&nbsp;</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<ul class="pager wizard row" style="width: 100%; list-style: none; padding: 0; margin:0">
<!--  <li class="previous first" ><a href="javascript:;" style="display:none;">First</a></li> -->
<li class="previous" style="padding: 0px !important; width: 50% "><a class="btn btn-outline-inverse-info btn-lg " href="javascript:;">Previous</a></li>
<!--  <li class="next last"><a href="javascript:;" style="display:none;">Last</a></li> -->
<li class="next" style="padding: 0px !important; width: 50% "><a class="btn btn-primary pull-right btn-lg  next-btn" href="javascript:;">Next</a>
</li>
<li class="finish text-right" style="padding: 0px !important; width: 50% ">
<input type="submit" value="Save" class="btn btn-primary btn-lg next-btn" style="width: auto;  margin-bottom: 0!important;">
</li>
<?php /*
<li class="previous first" style="display:none;" ><a href="#">First</a></li>
<li class="previous"><a href="#" >Previous</a></li>
<li class="next last" style="display:none;"><a href="#" >Last</a></li>
<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right" style="width:12%"></li>
<li class="finish"><a href="javascript:;">Finish</a></li>*/?>
</ul>
</div>
</div>
<!-- <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">HOTEL STRATEGY</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >HOTEL STRATEGY</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">AGENTS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >AGENTS</div>


<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">CORPORATES</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >CORPORATES</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">RFP</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >RFP</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">LEADS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >LEADS</div> -->
<!--Sales Activity Start-->
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">SALES ACTIVITY</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >
    

     <div class="col-lg-12 col-sm-12 col-md-12 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">

 



  <form id="" action="<?php echo e(url('hotelier/exportcharts1')); ?>/xlsx" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">

        <?php echo e(csrf_field()); ?>


  <div class="col-lg-12 col-sm-12 col-md-12">
  <div class="row">
  <div class="col-lg-2 col-sm-12 col-md-2" style="padding: 20px;">
      <h2>Refine</h2>
        <br>
  </div><br><br>

  <!-- <div class="col-lg-12 col-sm-12 col-md-12" style="padding: 10px;">
      <h4>Refine by:<span style="margin-left: 20px;color:red;" id="resError"></span></h4>
  </div><br><br> -->

<?php
 $date = date("Y-m-d", strtotime("-30 days")); 
?>

<div class="col-lg-10 col-sm-12 col-md-10" style="margin-top: 12px;">
<div class="row">
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <input type="text" name="from_date" id="from_date" value="<?= date('d-m-Y', strtotime('-30 days'))?>" class="form-control"  placeholder="Date From">
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <input type="text" name="to_date" id="to_date" value="<?= date('d-m-Y', strtotime('now'))?>" class="form-control"  placeholder="Date To">
  </div>
  <input type="hidden" name="hotelId" value="<?php echo e($hotelId); ?>">
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <select name="task_type" id="task_type" class="form-control  js-example-basic-single w-100" >
      <option value="0"> -- Select Activity --</option>
      <?php $__currentLoopData = $task_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($value->hl_mt_id); ?>"><?php echo e($value->task_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </select>
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">

  <select name="user_id" id="user_id" class="form-control  js-example-basic-single w-100" ">
      <option value="0"> -- Select Team --</option>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($value->id); ?>"><?php echo e($value->first_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </select>
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
   <select name="region_id" id="region_id" class="form-control  js-example-basic-single w-100" >
      <option value="0" id="regionId"> -- Select Region --</option>
      <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($value->hl_ms_r_id); ?>"><?php echo e($value->hl_regional_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <button type="submit" class="btn btn-outline-inverse-info btn-lg" >Export
</button>
  </div>
  <!--<div class="form-group col-lg-1 col-sm-1 col-md-1">
  <a class="btn btn-outline-inverse-info" onclick="dataRefresh()" ><i class="fa fa-refresh" aria-hidden="true" style="color:#425CC7"></i> </a>
</button>
  </div>-->
</div>
  </div>
</div><hr>
<h4><span style="margin-left: 20px;color:red;" id="resError"></span></h4>
  </div><br><br>
</form>






                  <!-- <h4 class="card-title">Pie chart</h4> -->
                  <div class="row">
                                    <div class="col-lg-6 col-sm-10 col-md-6">
                                    <canvas id="pieCharts"></canvas>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-12 col-md-6" >
                                      <div class="row" id="regChart"></div>
                                    
                                    </div>

                                  </div><br><br>









<div class="col-lg-12 col-sm-12 col-md-12" style="overflow-x:auto;">
<table class="table table-bordered">
  <thead>
    <tr bgcolor="#F6F3F3">
      <th>S.No</th>
      <th>Date</th>
      <th>Account Name</th>
        <th>Client Type</th>
        <th>Consortia</th>
      <th>Activity Type</th>
      <th>Region</th>
      <th>APLBC Sales Team</th>
      <th>Outcome</th>
      <th>Next Step</th>
        <th>Notes</th>
    </tr>
  </thead>
  <tbody id="DispCharts">
    
  </tbody>
</table>
</div>

                </div>
              </div>
            </div>

</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">BEKOE WEBSITE</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >
    

     <div class="col-lg-12 col-sm-12 col-md-12">
              
             


                    <div class="row">
                        <div class="alert alert-success col-md-12 col-lg-12 hidden" id="rateSuccess"></div>
                        
                        <div class="col-md-12 col-lg-12">
                            <div class="row">
                                <div class="form-group">
                                    <label>Room starting rate from <input type="text" name="starting_price" id="starting_price" value="<?php echo e($Hotels->price); ?>" class="form-control" placeholder="$ 00.00"></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 offset-10 mtb-15 ">
                        <input type="button" name="AddRate" class="btn btn-primary btn-lg AddRate" value="Add">
                        </div>
                        
                </div>
                    
                
            
        </div>
    </div>
</div>
<!-- Sales Activty End-->
<!-- <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">EVENTS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >EVENTS</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">FAM TRIPS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >FAM TRIPS</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">MARKETING</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >MARKETING</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">NOTES</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >NOTES</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">DOCUMENTS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" >DOCUMENTS</div> -->

</div>
</div>
</div>
</div>
<!-- Steps ends -->
</div>
</div>
</form>
<script src="<?php echo e(asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendors/select2/select2.min.js')); ?>"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('assets/js/typeahead.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>
<script>

    function emailExist(val){
var mail_val=val;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var host="<?php echo e(url('hotelier/emailExist')); ?>";  
    $.ajax({
        type: 'POST',
        data:{'mail_val':mail_val, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success: function(data){
            console.log(data);
            if(data>0){
                $("#email_error").html('Email ID already exist');
            }else{
                $("#email_error").html('');
            }
        }
});
}

</script>
<script type="text/javascript">
// Get Time Zone


$(document).on("click", "#portaluser", portaluser);
function portaluser(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var c_title=$("#c_title").val();

    var f_name=$("#f_name").val();
    var l_name=$("#l_name").val();    
    var job_title=$("#job_title").val();
    var email=$("#email_add").val();
    var c_number=$("#c_number").val();
    var m_number=$("#m_number").val();
    var cotact_purpose=$("#cotact_purpose").val();
    var hotel_id=$("#hotel_mid").val();

    var login_req = ($('#login_req').prop('checked') == true) ? 'Yes' : 'False';

    if(f_name==''){
         $("#err_f_name").html('First name is required');
         return false;
    }else{
         $("#err_f_name").html('');
    }

    if(l_name==''){
         $("#err_l_name").html('Last name is required');
         return false;
    }else{
         $("#err_l_name").html('');
       
    }

    if(job_title==''){
         $("#err_job_title").html('Job title is required');
         return false;
    }else{
         $("#err_job_title").html('');
       
    }

    if(email==''){
         $("#err_email_add").html('Email ID is required');
         return false;
    }else{
         $("#err_email_add").html('');
         
    }
    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email)) {
      $("#err_email_add").html('');     
    }else{
         $("#err_email_add").html('Enter valid email ID');
         return false;
    }
   


    var host="<?php echo e(url('hotelier/added-hotel-portal-contact')); ?>";   
    $.ajax({
        type: 'POST',
        data:{'c_title':c_title, 'f_name':f_name,'l_name':l_name,'job_title':job_title,'email':email,'c_number':c_number,'m_number':m_number, 'email':email, 'cotact_purpose':cotact_purpose,'login_req':login_req, 'hotel_id':hotel_id, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderPortalsuccess
        
    
    })
}
function renderPortalsuccess(res){
    if (res.details.status == 'success') {
    $("#c_title").val('');
    $("#f_name").val('');
    $("#l_name").val('');
    $("#job_title").val('');
    $("#c_number").val('');
    $("#m_number").val('');
    $("#email_add").val('');
    $("#cotact_purpose").val('');
    $("#login_req").val('');
    ($('#login_req').prop('checked') == false);

    $('.alert-add-user').removeClass('hidden');
    $('.alert-add-user').html('<p>User contact added successfully</p>')
}
}





$(document).on("click", ".portalupdateuser", portalupdateuser);
function portalupdateuser(){
    var id=$(this).attr('data-id');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var cont_id=$("#cont_id_"+id).val();
    var c_title=$("#c_title_"+id).val();
    var f_name=$("#f_name_"+id).val();
    var l_name=$("#l_name_"+id).val();    
    var job_title=$("#job_title_"+id).val();
    var email=$("#email_add_"+id).val();
    var c_number=$("#c_number_"+id).val();
    var m_number=$("#m_number_"+id).val();
    var cotact_purpose=$("#cotact_purpose_"+id).val();
    var hotel_id=$("#hotel_mid").val();

    var login_req = ($('#login_req_'+id).prop('checked') == true) ? 'Yes' : 'False';

    if(f_name==''){
         $("#err_f_name").html('First name is required');
         return false;
    }else{
         $("#err_f_name").html('');
    }

    if(l_name==''){
         $("#err_l_name").html('Last name is required');
         return false;
    }else{
         $("#err_l_name").html('');
       
    }

    if(job_title==''){
         $("#err_job_title").html('Job title is required');
         return false;
    }else{
         $("#err_job_title").html('');
       
    }

    if(email==''){
         $("#err_email_add").html('Email ID is required');
         return false;
    }else{
         $("#err_email_add").html('');
         
    }
    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email)) {
      $("#err_email_add").html('');     
    }else{
         $("#err_email_add").html('Enter valid email ID');
         return false;
    }
   


    var host="<?php echo e(url('hotelier/updated-hotel-portal-contact')); ?>";   
    $.ajax({
        type: 'POST',
        data:{'loop_id':id,'cont_id':cont_id,'c_title':c_title, 'f_name':f_name,'l_name':l_name,'job_title':job_title,'email':email,'c_number':c_number,'m_number':m_number, 'email':email, 'cotact_purpose':cotact_purpose,'login_req':login_req, 'hotel_id':hotel_id, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderPortalUpdatedsuccess
        
    
    })
}
function renderPortalUpdatedsuccess(res){
    if (res.details.status == 'success') {
        var id=res.details.id;        
        $(".alert-update-user-"+id).removeClass('hidden');
        $(".alert-update-user-"+id).html('<p>User contact updated successfully</p>')
        }
}




$(document).on("click", "#adduser", adduser);
function adduser(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var lastname=$("#lastname").val();
    var firstname=$("#firstname").val();
    var email=$("#emailId").val();
    var hotel_id=$("#hotel_bid").val();
    var password=$("#cpassword").val();
    if(email==''){
         $("#email_error").html('Email ID is required');
         return false;
    }else{
         $("#email_error").html('');
    }
    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email)) {
      $("#email_error").html('');
    }else{
         $("#email_error").html('Enter valid email ID');
         return false;
    }
    if(password==''){
         $("#cpassword_error").html('Password is required');
         return false;
    }else{
         $("#cpassword_error").html('');
    }


    var host="<?php echo e(url('hotelier/addedUser')); ?>";  
    $.ajax({
        type: 'POST',
        data:{'firstname':firstname, 'lastname':lastname, 'email':email, 'password':password, 'hotel_id':hotel_id, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:rendersuccess
        
    
    })
}
function rendersuccess(res){
    if (res.details.status == 'success') {
    $("#firstname").val('');
    $("#lastname").val('');
    $("#emailId").val('');
    $("#cpassword").val('');
}
}


$(document).on("click", ".send_password", send_password);
function send_password(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id=$(this).attr('id');
    var host="<?php echo e(url('hotelier/UserPasswordSend')); ?>";  
    $.ajax({
        type: 'POST',
        data:{'id':id, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderPwdsuccess
        
    
    })
}
function renderPwdsuccess(res){
    if (res.details.status == 'success') {
    $(".alert-success-users").removeClass('hidden');
    $(".alert-success-users").html('<p>Password send successfully</p>');   
}
}

$(document).on("click", ".send_welcome_letter", send_welcome_letter);
function send_welcome_letter(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id=$(this).attr('id');
    var host="<?php echo e(url('hotelier/UserWelcomeLetterSend')); ?>";  
    $.ajax({
        type: 'POST',
        data:{'id':id, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderWelsuccess
        
    
    })
}
function renderWelsuccess(res){
    if (res.details.status == 'success') {
    $(".alert-success-wel-letter").removeClass('hidden');
    $(".alert-success-wel-letter").html('<p>Welcome letter send successfully</p>');   
}
}



$(document).on("click", ".send_active", send_active);
function send_active(){
   
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id=$(this).attr('id');
    var atype=$(this).attr('data-id');
    var host="<?php echo e(url('hotelier/UserActive')); ?>";  
    $.ajax({
        type: 'POST',
        data:{'id':id,'atype':atype,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderInactivesuccess
        
    
    })
}

$(document).on("click", ".assign_portal", send_active);
function send_active(){
   
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id=$(this).attr('id');
    var hotel_id=$("#hotel_mid").val();
    var host="<?php echo e(url('hotelier/CrmUserAssignPortal')); ?>";  
    $.ajax({
        type: 'POST',
        data:{'id':id,'hotel_id':hotel_id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderAsssuccess
        
    
    })
}



function renderAsssuccess(res){
    if (res.details.status == 'success') {
        $(".alert-success-users").removeClass('hidden');
        $(".alert-success-users").html('<p>User assigned successfully</p>');  
       
    
}else{
    $(".alert-success-users").html('<p>This user allready assigned some other portal</p>');  
}
}

function load_model(val){
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id= val; 
    var edit_id=$('#edit_id').val();
    //alert(edit_id);
    var host="<?php echo e(url('hotelier/getuserdetail/')); ?>"; 
    $.ajax({
        type: 'POST',
        data:{'id': id,'edit_id':edit_id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderdetails
    
    });
}
    function renderdetails(res){
        //alert(res.view_details);
        //console.log('Data::::::::::::::'+res.view_details);
    //  $('#states').html('');
        var view=res.view_details;
        $('#first_name').val(view.first_name);
        $('#last_name').val(view.last_name);
        $('#email_id').val(view.email);
        $('#user_id').val(view.id);
        
      }  

//image_1:"Please choose atleast one image",image_1: {
//   required: true,             
//   },

$(document).ready(function() {
var $validator = $("#edit_user").validate({
    rules: {

        first_name: {
            required: true,
             minlength: 3
            
        },                
        last_name: {
            required: true,
            minlength: 3
        },

        email_id: {
            required: true                    
        },


},
   // messages: {
    //    title: "Choose a title",
    //    per_hour: "Please enter a price per hour",
    //    per_person: "Please enter a price per person",
    //    per_day: "Please enter a price per day",
    //   "category[]": "Please choose atleast one occasion",
        /*"capacity_value[]": "Please enter a capacity value",*/
    //    "features[]": "Please choose atleast one features",

  //  },
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
});

// $(document).on("click", "#updateuser", updateuser);
// function updateuser(){
// //salert('aa');
//     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//     var last_name=$("#last_name").val();
//     var first_name=$("#first_name").val();
//     var email_id=$("#email_id").val();
//     var user_id=$("#user_id").val();
//     //alert(hotel_id+firstname);
//     var password=$("#password").val();
//     var host="<?php echo e(url('hotelier/userpw_updated')); ?>";  
//     $.ajax({
//         type: 'POST',
//         data:{'first_name':first_name, 'last_name':last_name, 'email_id':email_id, 'password':password, 'user_id':user_id, '_token':CSRF_TOKEN},
//         url: host,
//         dataType: "json", // data type of response      
//         success:{
// //alert(res);
//         }
    
//     })
// }
$(document).on("change keydown mouseout", "#add_total_room", add_total_room);

function add_total_room() {
$("#add_rolling_invetry").val($(this).val());
}

$(document).on("change", "#t_zone_location", getzone);

function getzone() {

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $(this).val();
var host = "<?php echo e(url('hotelier/zoneOffset/')); ?>";
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
success: rendergetzone

})
return false;
}

function rendergetzone(res) {

$.each(res.details, function(index, data) {

$('#t_zone_offset').append('<option value="' + data.abbreviation + '">' + data.abbreviation + '</option>');

});
}

// Get States
$(document).on("change", "#country", getstates);

function getstates() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $(this).val();

var host = "<?php echo e(url('hotelier/getstates/')); ?>";
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

function rendergetstates(res) {
$('#state').html('');
$.each(res.view_details, function(index, data) {

if (index == 0) {
$('#state').append('<option value="' + data.id + '">' + data.name + '</option>');
} else {
$('#state').append('<option value="' + data.id + '">' + data.name + '</option>');
};
});
}

$(document).on("change", "#state", getcities1);

function getcities1() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $(this).val();

var host = "<?php echo e(url('hotelier/getcities')); ?>";
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
$('#city').html('');

$.each(res.view_details, function(index, data) {
if (index == 0) {
$('#city').append('<option value="' + data.id + '">' + data.name + '</option>');
} else {
$('#city').append('<option value="' + data.id + '">' + data.name + '</option>');
};
});
}
// Get Sub Cities

//SynXis

// Get States
$(document).on("change", "#syn_phy_country", getsynstates);

function getsynstates() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $(this).val();

var host = "<?php echo e(url('hotelier/getstates/')); ?>";
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
success: rendergetsynstates

})
return false;
}

function rendergetsynstates(res) {
$('#syn_phy_state').html('');
$.each(res.view_details, function(index, data) {

if (index == 0) {
$('#syn_phy_state').append('<option value="' + data.id + '">' + data.name + '</option>');
} else {
$('#syn_phy_state').append('<option value="' + data.id + '">' + data.name + '</option>');
};
});
}

$(document).on("change", "#syn_phy_state", getsyncities);

function getsyncities() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $(this).val();

var host = "<?php echo e(url('hotelier/getcities')); ?>";
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
success: rendergetsyncities

})
return false;
}

function rendergetsyncities(res) {
$('#syn_phy_city').html('');

$.each(res.view_details, function(index, data) {
if (index == 0) {
$('#syn_phy_city').append('<option value="' + data.id + '">' + data.name + '</option>');
} else {
$('#syn_phy_city').append('<option value="' + data.id + '">' + data.name + '</option>');
};
});
}
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

$(document).on("change", ".airport_list_btn", airportList);

function airportList() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $(this).val();
var aid = $(this).attr('id');
var data = aid.split('airportinfo_')
//alert(data[1]);

var host = "<?php echo e(url('hotelier/airportList')); ?>";
$.ajax({
type: 'POST',
data: {
'id': id,
'rid': data[1],
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
success: rendergetairportCode

})
return false;
}

function rendergetairportCode(res) {

//alert(res.details.rid)
//$.each(res.details, function(index, data) { 

$('#airport_code_' + res.details.rid).val(res.details.data.code)
//});
}

$(document).on("change", "#state", getcities);

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

$.each(res.view_details, function(index, data) {
if (index == 0) {
$('#city').append('<option value="' + data.id + '">' + data.name + '</option>');
} else {
$('#city').append('<option value="' + data.id + '">' + data.name + '</option>');
};
});
}
</script>
<script src="<?php echo e(asset('assets/js/jquery.validate.js')); ?>"></script>
<script>
//image_1:"Please choose atleast one image",image_1: {
//   required: true,         
//   },

$(document).ready(function() {
var $validator = $("#commentForm").validate({
rules: {
grp_name: {
required: true,
minlength: 5
},
hotel_id: {
required: true,

},
hotel_name: {
required: true,

},

hotel_code: {
required: true,
minlength: 2
},
pms_code: {
required: true,
minlength: 2
},
hotel_short_name: {
required: true,
minlength: 5
},
address_1: {
required: true,
minlength: 5
},

city: {
required: true,
},
state: {
required: true,
},
zip_code: {
required: true,
minlength: 3
},
country: {
required: true,

},
main_phone: {
required: true,
minlength: 5
},
// second_phone: {
//                     required: true,
//                     minlength: 5
//                 },
// fax: {
//                     required: true,
//                     minlength: 5
//                 },
email: {
required: true,
email:true,
minlength: 5
},
// url: {
//                     required: true,
//                     minlength: 5
//                 },
// r_d_email: {
//                     required: true,
//                     minlength: 5
//                 },
// reservation_email: {
//                     required: true,
//                     minlength: 5
//                 },
// cc_retrieval: {
//                     required: true,
//                     minlength: 5
//                 },
// inventory_notification: {
//                     required: true,
//                     minlength: 5
//                 },
c_title: {
required: true,

},
f_name: {
required: true,
minlength: 5
},
l_name: {
required: true,
minlength: 5
},
job_title: {
required: true,
minlength: 5
},
email_add: {
required: true,
minlength: 5
},
c_number: {
required: true,
minlength: 9
},
m_number: {
required: true,
minlength: 9
},
cotact_purpose: {
required: true
},
currency: {
required: true
},
t_zone_country: {
required: true
},
t_zone_location: {
required: true
},
t_zone_offset: {
required: true
},
// property_type: {
//                     required: true
//                 },
//                 room_code: {
//                     required: true
//                 },
//                 room_name: {
//                     required: true
//                 },
//                 total_room: {
//                     required: true
//                 },
//                 rolling_invetry: {
//                     required: true
//                 },
//                 room_category: {
//                     required: true
//                 },
//                 room_short_desc: {
//                     required: true
//                 },
//                 room_long_desc: {
//                     required: true
//                 },
//                 room_pms_code: {
//                     required: true
//                 },
//                 room_class: {
//                     required: true
//                 },
//                 bed_type: {
//                     required: true
//                 },
//                 bed_quantity: {
//                     required: true
//                 },
//                 total_guest_per_room_un: {
//                     required: true
//                 },
// adult_occupancy_un: {
//     required: true
// },
// child_occupancy: {
//     required: true
// },
// price_adjustment_type: {
//     required: true
// },
// default_adjustment: {
//     required: true
// },                
// tax_level: {
//     required: true
// },
// tax_frequency: {
//     required: true
// },
// tax_type: {
//     required: true
// },
// tax_code: {
//     required: true
// },
// tax_name: {
//     required: true
// },
// tax_desc: {
//     required: true
// },
// start_date: {
//     required: true
// },
// end_date: {
//     required: true
// },
// tax: {
//     required: true
// },
// charge_per: {
//     required: true
// },                

meet_event_desc: {
required: true,
minlength: 20
},
seasonal_rates: {
required: true
},

},
// messages: {
//    title: "Please enter a title",
//    per_hour: "Please enter a price per hour",
//    per_person: "Please enter a price per person",
//    per_day: "Please enter a price per day",
//   "category[]": "Please choose atleast one occasion",
/*"capacity_value[]": "Please enter a capacity value",*/
//    "features[]": "Please choose atleast one features",

//  },
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

$('#rootwizard').bootstrapWizard({
'tabClass': 'nav nav-pills',
'onNext': function(tab, navigation, index) {
var $valid = $("#commentForm").valid();
if (!$valid) {
$validator.focusInvalid();
return false;
} else {
var $total = navigation.find('li').length;
var $current = index + 1;
var $percent = ($current / $total) * 100;
$('.progress-bar').css({
width: $percent + '%'
});
}
}
});
window.prettyPrint && prettyPrint()
});
//$( "#commentForm" ).submit(function( event ) {
$('#saveform').click(function() {

var flag = 0;
var fonttype1_validate = "";
$('input[name="contact_status"]').each(function(i) {
if ($(this).prop("checked") == true) {
fonttype1_validate = fonttype1_validate + ",1";
flag = 1;
} else {
fonttype1_validate = fonttype1_validate + ",0";
}
});
var allv = fonttype1_validate.substr(1);
if (flag == 0) {
alert("Warning: Anyone contact should be a main contact");
return false;
} else {
$('#contact_status_hidden').val(allv);
}

});
//event.preventDefault();
//});

$("button#clone").click(function() {
var $div = $('div[id^="contact_add_form"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('div[id^="contact_add_form"]').length;
//alert(divlength);

// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
var $klon = $div.clone(true);
$klon.find('input,textarea').val('');
$klon.prop('id', 'contact_add_form' + divlength);

$klon.prepend('<div align="right" class="pull-right"><span id=rem' + divlength + ' onclick="removediv(' + divlength + ')" class="mdi mdi-window-close"></span></div>');

$("#contact_section").append($klon);
var input = document.querySelector("#contact_add_form" + divlength + " input#contact_number");

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
utilsScript: "../admin-assets/build/js/utils.js"
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

//utilsScript: baseUrl + "/admin-assets/build/js/utils.js",
</script>
<script type="text/javascript">
/*  $(function() {
var baseUrl = "<?php echo e(url('/')); ?>";
var token = "<?php echo e(Session::token()); ?>";
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#dropzoneFileUpload", {
url: baseUrl + "/crm/dropzone/uploadFiles",
params: {
_token: token
},
autoProcessQueue: true,
maxFilesize: 1000, // MB      
maxFiles: 6,
acceptedFiles: '.jpg, .jpeg',
addRemoveLinks: true,
dictRemoveFile: "Remove",
});
});*/
</script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
this.classList.toggle("active");
var panel = this.nextElementSibling;
if (panel.style.display === "block") {
panel.style.display = "none";
} else {
panel.style.display = "block";
}
});
}



$(document).ready(function() {
$(".add-rooms").click(function() {
$('.add_room').append($('.add_room_clone').html());
// $(".add_room").clone().appendTo(".add_room");
});
});

// Room Update Start

$(document).on("click", ".updateRoom", updateRoom);
    
function updateRoom() {
var roomId = $(this).attr('id');

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
if ($('#add_active' + roomId).prop('checked') == true) {
var add_active = "Enable";
} else {
var add_active = "Disable";
}

var add_room_code = $('#add_room_code' + roomId).val();
var add_room_name = $('#add_room_name' + roomId).val();
var add_total_room = $('#add_total_room' + roomId).val();
var add_rolling_invetry = $('#add_rolling_invetry' + roomId).val();
var add_room_category = $('#add_room_category' + roomId).val();
var add_room_short_desc = $('#add_room_short_desc' + roomId).val();
var add_room_long_desc = $('#add_room_long_desc' + roomId).val();
var add_room_pms_code = $('#add_room_pms_code' + roomId).val();
var add_room_class = $('#add_room_class' + roomId).val();

if ($('#add_room_size' + roomId).prop('checked') == true) {
var add_room_size = "Yes";
} else {
var add_room_size = "No";
}
if ($('#add_ada_compliant' + roomId).prop('checked') == true) {
var add_ada_compliant = "Yes";
} else {
var add_ada_compliant = "No";
}

var add_room_min_size = $('#add_room_min_size' + roomId).val();
var add_room_max_size = $('#add_room_max_size' + roomId).val();
var add_room_size_units = $('#add_room_size_units' + roomId).val();

if ($('#add_child_age_limit' + roomId).prop('checked') == true) {
var add_child_age_limit = "Yes";
} else {
var add_child_age_limit = "No";
}
if ($('#add_allow_extra_bed' + roomId).prop('checked') == true) {
var add_allow_extra_bed = "Yes";
} else {
var add_allow_extra_bed = "No";
}


var add_bed_type=[]; 
 $('select[name="add_bed_type'+ roomId+'[]"] option:selected').each(function() {
  add_bed_type.push($(this).val());
 });

 var add_bed_quantity = $('input[name="add_bed_quantity'+roomId+'[]"]').map(function () {
    return this.value; 
}).get();

var add_bed_primary = $('input[name="add_bed_primary'+roomId+'[]"]').map(function () {
    return this.value; 
}).get();

if ($('#add_total_guest_per_room_un' + roomId).prop('checked') == true) {
var add_total_guest_per_room_un = "Yes";
$('#add_total_guest_per_room' + roomId).val('');
} else {
var add_total_guest_per_room_un = "No";
}

if ($('#add_adult_occupancy_un' + roomId).prop('checked') == true) {
var add_adult_occupancy_un = "Yes";
$('#add_adult_occupancy' + roomId).val('');
} else {
var add_adult_occupancy_un = "No";
}

if ($('#add_child_occupancy_un' + roomId).prop('checked') == true) {
var add_child_occupancy_un = "Yes";
$('#add_child_occupancy' + roomId).val('');
} else {
var add_child_occupancy_un = "No";
}

var add_total_guest_per_room = $('#add_total_guest_per_room' + roomId).val();
var add_adult_occupancy = $('#add_adult_occupancy' + roomId).val();
var add_child_occupancy = $('#add_child_occupancy' + roomId).val();

var add_price_adjustment_type = $('#add_price_adjustment_type' + roomId).val();
var add_default_adjustment = $('#add_default_adjustment' + roomId).val();
var add_key_features = $('#add_key_features' + roomId).val();
var add_room_view = $('#add_room_view' + roomId).val();

$('#err_add_room_code' + roomId).html('');
$('#err_add_room_name' + roomId).html('');
$('#err_add_total_room' + roomId).html('');
$('#err_add_rolling_invetry' + roomId).html('');
$('#err_add_room_category' + roomId).html('');
$('#err_add_room_short_desc' + roomId).html('');
$('#err_add_room_long_desc' + roomId).html('');
$('#err_add_room_pms_code' + roomId).html('');
$('#err_add_room_class' + roomId).html('');
$('#err_add_bed_type' + roomId).html('');
$('#err_add_bed_quantity' + roomId).html('');
$('#err_add_default_adjustment' + roomId).html('');

if (add_room_code == '') {
$('#err_add_room_code' + roomId).html('Enter a code');
$('#add_room_code' + roomId).focus();
} else if (add_room_name == '') {
$('#err_add_room_name' + roomId).html('Enter a name');
$('#add_room_name' + roomId).focus();
} else if (add_total_room == '') {
$('#err_add_total_room' + roomId).html('Enter a total room');
$('#add_total_room' + roomId).focus();
} else if (add_rolling_invetry == '') {
$('#err_add_rolling_invetry' + roomId).html('Enter a rolling invetry');
$('#add_rolling_invetry' + roomId).focus();
} else if (add_room_category == '') {
$('#err_add_room_category' + roomId).html('Enter a room category');
$('#add_room_category' + roomId).focus();
} else if (add_room_short_desc == '') {
$('#err_add_room_short_desc' + roomId).html('Enter a room short desc');
$('#add_room_short_desc' + roomId).focus();
} else if (add_room_long_desc == '') {
$('#err_add_room_long_desc' + roomId).html('Enter a room long desc');
$('#add_room_long_desc' + roomId).focus();
} else if (add_room_pms_code == '') {
$('#err_add_room_pms_code' + roomId).html('Enter a room pms code');
$('#add_room_pms_code' + roomId).focus();
} else if (add_room_class == '') {
$('#err_add_room_class' + roomId).html('Choose a room class');
$('#add_room_class' + roomId).focus();
} else if (add_bed_type == '') {
$('#err_add_bed_type' + roomId).html('Choose a bed type');
$('#add_bed_type' + roomId).focus();
} else if (add_bed_quantity == '') {
$('#err_add_bed_quantity' + roomId).html('Enter a bed quantity');
$('#add_bed_quantity' + roomId).focus();
} else if (add_default_adjustment == '') {
$('#err_add_default_adjustment' + roomId).html('Enter a default adjustment');
$('#add_default_adjustment' + roomId).focus();
} else {

    var myFormData = new FormData();
    var files = $('#uploadFile'+roomId)[0].files[0];
    var files1 = $('#uploadFile1'+roomId)[0].files[0];
    var files2 = $('#uploadFile2'+roomId)[0].files[0];
    var files3 = $('#uploadFile3'+roomId)[0].files[0];
    myFormData.append('uploadFile', files);
    myFormData.append('uploadFile1', files1);
    myFormData.append('uploadFile2', files2);
    myFormData.append('uploadFile3', files3);
    myFormData.append('_token', CSRF_TOKEN);
    myFormData.append('id', id);
    myFormData.append('roomId', roomId);
    myFormData.append('active', add_active);
    myFormData.append('room_code', add_room_code);
    myFormData.append('room_name', add_room_name);
    myFormData.append('total_room', add_total_room);
    myFormData.append('rolling_invetry', add_rolling_invetry);
    myFormData.append('room_category', add_room_category);
    myFormData.append('room_short_desc', add_room_short_desc);
    myFormData.append('room_long_desc', add_room_long_desc);
    myFormData.append('room_pms_code', add_room_pms_code);
    myFormData.append('room_class', add_room_class);
    myFormData.append('room_size', add_room_size);
    myFormData.append('ada_compliant', add_ada_compliant);
    myFormData.append('bed_type', add_bed_type);
    myFormData.append('bed_quantity', add_bed_quantity);
    myFormData.append('bed_primary', add_bed_primary);
    myFormData.append('total_guest_per_room', add_total_guest_per_room);
    myFormData.append('total_guest_per_room_un', add_total_guest_per_room_un);
    myFormData.append('adult_occupancy', add_adult_occupancy);
    myFormData.append('adult_occupancy_un', add_adult_occupancy_un);
    myFormData.append('child_occupancy', add_child_occupancy);
    myFormData.append('child_occupancy_un', add_child_occupancy_un);
    myFormData.append('allow_extra_bed', add_allow_extra_bed);
    myFormData.append('price_adjustment_type', add_price_adjustment_type);
    myFormData.append('default_adjustment', add_default_adjustment);
    myFormData.append('room_min_size', add_room_min_size);
    myFormData.append('room_max_size', add_room_max_size);
    myFormData.append('room_size_units', add_room_size_units);
    myFormData.append('child_age_limit', add_child_age_limit);
    myFormData.append('add_key_features', add_key_features);
    myFormData.append('add_room_view', add_room_view);

//console.log(myFormData);

var host = "<?php echo e(url('hotelier/hotel/update-room')); ?>";

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})

$.ajax({
type: 'POST',
data: myFormData,
url: host,
processData: false, // important
contentType: false, // important
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: function(res) {
    console.log(res);
$("#roomSuccess" + roomId).html('Hotel room updated successfully').removeClass('hidden');
}
})
return false;
}
}

// Room Update End




// Add New Room Start
$(document).on("click", ".addRoom", addRoom);

function addRoom() {

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
var add_active = ($('#add_active').prop('checked') == true) ? 'Enable' : 'Disable';
var add_room_code = $('#add_room_code').val();
var add_room_name = $('#add_room_name').val();
var add_total_room = $('#add_total_room').val();
var add_rolling_invetry = $('#add_rolling_invetry').val();
var add_room_category = $('#add_room_category').val();
var add_room_short_desc = $('#add_room_short_desc').val();
var add_room_long_desc = $('#add_room_long_desc').val();
var add_room_pms_code = $('#add_room_pms_code').val();
var add_room_class = $('#add_room_class').val();
var add_room_size = ($('#add_room_size').prop('checked') == true) ? 'Yes' : 'No';
var add_ada_compliant = ($('#add_ada_compliant').prop('checked') == true) ? 'Yes' : 'No';
var add_room_min_size = $('#add_room_min_size').val();
var add_room_max_size = $('#add_room_max_size').val();
var add_room_size_units = $('#add_room_size_units').val();
var add_key_features = $('#add_key_features').val();
var add_room_view = $('#add_room_view').val();

 var add_bed_type=[]; 
 $('select[name="add_bed_type[]"] option:selected').each(function() {
  add_bed_type.push($(this).val());
 });

var add_bed_quantity = $('input[name="add_bed_quantity[]"]').map(function () {
    return this.value; 
}).get();

var add_bed_primary = $('input[name="add_bed_primary[]"]').map(function () {
    return this.value; 
}).get();

if ($('#add_total_guest_per_room_un').prop('checked') == true) {
var add_total_guest_per_room_un = "Yes";
$('#add_total_guest_per_room').val('');
} else {
var add_total_guest_per_room_un = "No";
}

var add_total_guest_per_room = $('#add_total_guest_per_room').val();

if ($('#add_adult_occupancy_un').prop('checked') == true) {
var add_adult_occupancy_un = "Yes";
$('#add_adult_occupancy').val('');
} else {
var add_adult_occupancy_un = "No";
}
var add_adult_occupancy = $('#add_adult_occupancy').val();

if ($('#add_child_occupancy_un').prop('checked') == true) {
var add_child_occupancy_un = "Yes";
$('#add_child_occupancy').val('');
} else {
var add_child_occupancy_un = "No";
}
var add_child_occupancy = $('#add_child_occupancy').val();

var add_child_age_limit = $('#add_child_age_limit').val();
var add_child_age_limit = ($('#add_child_age_limit').prop('checked') == true) ? 'Yes' : 'No';
var add_allow_extra_bed = ($('#add_allow_extra_bed').prop('checked') == true) ? 'Yes' : 'No';
var add_price_adjustment_type = $('#add_price_adjustment_type').val();
var add_default_adjustment = $('#add_default_adjustment').val();

$('#err_add_room_code').html('');
$('#err_add_room_name').html('');
$('#err_add_total_room').html('');
$('#err_add_rolling_invetry').html('');
$('#err_add_room_category').html('');
$('#err_add_room_short_desc').html('');
$('#err_add_room_long_desc').html('');
$('#err_add_room_pms_code').html('');
$('#err_add_room_class').html('');
$('#err_add_bed_type').html('');
$('#err_add_bed_quantity').html('');
$('#err_add_default_adjustment').html('');

if (add_room_code == '') {
$('#err_add_room_code').html('Enter a code');
$('#add_room_code').focus();
} else if (add_room_name == '') {
$('#err_add_room_name').html('Enter a name');
$('#add_room_name').focus();
} else if (add_total_room == '') {
$('#err_add_total_room').html('Enter a total room');
$('#add_total_room').focus();
} else if (add_rolling_invetry == '') {
$('#err_add_rolling_invetry').html('Enter a rolling invetry');
$('#add_rolling_invetry').focus();
} else if (add_room_category == '') {
$('#err_add_room_category').html('Enter a room category');
$('#add_room_category').focus();
} else if (add_room_short_desc == '') {
$('#err_add_room_short_desc').html('Enter a room short desc');
$('#add_room_short_desc').focus();
} else if (add_room_long_desc == '') {
$('#err_add_room_long_desc').html('Enter a room long desc');
$('#add_room_long_desc').focus();
} else if (add_room_pms_code == '') {
$('#err_add_room_pms_code').html('Enter a room pms code');
$('#add_room_pms_code').focus();
} else if (add_room_class == '') {
$('#err_add_room_class').html('Choose a room class');
$('#add_room_class').focus();
}else if (add_default_adjustment == '') {
$('#err_add_default_adjustment').html('Enter a default adjustment');
$('#add_default_adjustment').focus();
} else {


var myFormData = new FormData();
var files = $('#uploadFile')[0].files[0];
var files1 = $('#uploadFile1')[0].files[0];
var files2 = $('#uploadFile2')[0].files[0];
var files3 = $('#uploadFile3')[0].files[0];
myFormData.append('uploadFile', files);
myFormData.append('uploadFile1', files1);
myFormData.append('uploadFile2', files2);
myFormData.append('uploadFile3', files3);
myFormData.append('_token', CSRF_TOKEN);
myFormData.append('id', id);
myFormData.append('active', add_active);
myFormData.append('room_code', add_room_code);
myFormData.append('room_name', add_room_name);
myFormData.append('total_room', add_total_room);
myFormData.append('rolling_invetry', add_rolling_invetry);
myFormData.append('room_category', add_room_category);
myFormData.append('room_short_desc', add_room_short_desc);
myFormData.append('room_long_desc', add_room_long_desc);
myFormData.append('room_pms_code', add_room_pms_code);
myFormData.append('room_class', add_room_class);
myFormData.append('room_size', add_room_size);
myFormData.append('ada_compliant', add_ada_compliant);
myFormData.append('bed_type', add_bed_type);
myFormData.append('bed_quantity', add_bed_quantity);
myFormData.append('bed_primary', add_bed_primary);
myFormData.append('total_guest_per_room', add_total_guest_per_room);
myFormData.append('total_guest_per_room_un', add_total_guest_per_room_un);
myFormData.append('adult_occupancy', add_adult_occupancy);
myFormData.append('adult_occupancy_un', add_adult_occupancy_un);
myFormData.append('child_occupancy', add_child_occupancy);
myFormData.append('child_occupancy_un', add_child_occupancy_un);
myFormData.append('child_age_limit', add_child_age_limit);
myFormData.append('allow_extra_bed', add_allow_extra_bed);
myFormData.append('price_adjustment_type', add_price_adjustment_type);
myFormData.append('default_adjustment', add_default_adjustment);
myFormData.append('room_min_size', add_room_min_size);
myFormData.append('room_max_size', add_room_max_size);
myFormData.append('room_size_units', add_room_size_units);
myFormData.append('add_key_features', add_key_features);
myFormData.append('add_room_view', add_room_view);
console.log(myFormData);
//alert(myFormData)
var host = "<?php echo e(url('hotelier/hotel/add-room')); ?>";

$.ajax({
type: 'POST',
data: myFormData,
url: host,
processData: false, // important
contentType: false, // important
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: addStatus
})
return false;
}
}

// Add New Room End

function addStatus(res) {

if (res.details.status == 'success') {

$("input[name=add_active]").prop('checked', false);
$('#add_room_code').val('');
$('#add_room_name').val('');
$('#add_total_room').val('');
$('#add_rolling_invetry').val('');
$('#add_room_category').val('');
$('#add_room_short_desc').val('');
$('#add_room_long_desc').val('');
$('#add_room_pms_code').val('');
$('#add_room_class').val('');
$("input[name=add_room_size]").prop('checked', false);
$('#add_room_min_size').val('');
$('#add_room_max_size').val('');
$('#add_room_size_units').val('');
$("input[name=add_ada_compliant]").prop('checked', false);

$('#add_bed_type').val('');
$('#add_bed_quantity').val('');
$("input[name=add_bed_primary]").prop('checked', false);
$("input[name=add_total_guest_per_room]").prop('checked', false);
$("input[name=add_adult_occupancy]").prop('checked', false);
$("input[name=add_child_occupancy]").prop('checked', false);
$('#add_total_guest_per_room_un').val('');
$('#add_adult_occupancy_un').val('');
$('#add_child_occupancy_un').val('');
$("input[name=add_child_age_limit]").prop('checked', false);
$("input[name=add_allow_extra_bed]").prop('checked', false);

$('#add_price_adjustment_type').val('');
$('#add_default_adjustment').val('');
$(".room-success").html('Hotel room added successfully').removeClass('hidden');
}

}



// Add Tax Start

$(document).on("click", ".AddTax", addTax);

function addTax() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
var tax_level = $('#tax_level').val();
var tax_frequency= $('#tax_frequency').val();
var tax_type= $('#tax_type').val();
var tax_code= $('#tax_code').val();
var tax_name= $('#tax_name').val();
var tax_desc= $('#tax_desc').val();
var start_date= $('#start_date').val();
var end_date= $('#end_date').val();
var no_end_date = ($('#no_end_date').prop('checked') == true) ? 'Yes' : 'No';
var tax = $('#tax').val();
var tax_type_price = $('#tax_type_price').val();
var charge_per = $('#charge_per').val();
var cal_ext_rate = ($('#cal_ext_rate').prop('checked') == true) ? 'True' : 'False';
var tax_inclusive = ($('#tax_inclusive').prop('checked') == true) ? 'True' : 'False';
var cal_room_price = ($('#cal_room_price').prop('checked') == true) ? 'True' : 'False';
var cal_package_price = ($('#cal_package_price').prop('checked') == true) ? 'True' : 'False';
var apply_free_night = ($('#apply_free_night').prop('checked') == true) ? 'True' : 'False';
var tax_by_los = ($('#tax_by_los').prop('checked') == true) ? 'True' : 'False';


$('#err_tax_level').html('');
$('#err_tax_frequency').html('');
$('#err_tax_type').html('');
$('#err_tax_code').html('');
$('#err_tax_desc').html('');
$('#err_start_date').html('');
$('#err_tax').html('');
$('#err_charge_per').html('');


if (tax_level == '') {
$('#err_tax_level').html('Enter a tax level');
$('#add_tax_level').focus();
} else if (tax_frequency == '') {
$('#err_tax_frequency').html('Enter a tax frequency');
$('#add_tax_frequency').focus();
} else if (tax_type == '') {
$('#err_tax_type').html('Enter a tax type');
$('#tax_type').focus();
} else if (tax_desc == '') {
$('#err_tax_desc').html('Enter a tax desc');
$('#tax_desc').focus();
} else if (start_date == '') {
$('#err_start_date').html('Enter a start date');
$('#start_date').focus();
} else if (tax == '') {
$('#err_tax').html('Enter a tax');
$('#tax').focus();
} else if (add_room_long_desc == '') {
$('#err_add_room_long_desc').html('Enter a room long desc');
$('#add_room_long_desc').focus();
} else if (charge_per == '') {
$('#err_charge_per').html('Enter a charge per');
$('#charge_per').focus();
} else {

var myFormData = new FormData();
myFormData.append('_token', CSRF_TOKEN);
myFormData.append('id', id);
myFormData.append('tax_level', tax_level);
myFormData.append('tax_frequency', tax_frequency);
myFormData.append('tax_type', tax_type);
myFormData.append('tax_code', tax_code);
myFormData.append('tax_name', tax_name);
myFormData.append('tax_desc', tax_desc);
myFormData.append('start_date', start_date);
myFormData.append('end_date', end_date);
myFormData.append('no_end_date', no_end_date);
myFormData.append('tax', tax);
myFormData.append('tax_type_price', tax_type_price);
myFormData.append('charge_per', charge_per);
myFormData.append('cal_ext_rate', cal_ext_rate);
myFormData.append('tax_inclusive', tax_inclusive);
myFormData.append('cal_room_price', cal_room_price);
myFormData.append('cal_package_price', cal_package_price);
myFormData.append('apply_free_night', apply_free_night);
myFormData.append('tax_by_los', tax_by_los);

//alert(myFormData)
var host = "<?php echo e(url('hotelier/hotel/add-tax')); ?>";
$.ajax({
type: 'POST',
data: myFormData,
url: host,
processData: false, // important
contentType: false, // important
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: addTaxStatus
})
return false;
}
}

// Add New Tax End

function addTaxStatus(res) {
console.log(res);
if (res.details.status == 'success') {

    var id = $('#hotel_mid').val('');
var tax_level = $('#tax_level').val('');
var tax_frequency= $('#tax_frequency').val('');
var tax_type= $('#tax_type').val('');
var tax_code= $('#tax_code').val('');
var tax_name= $('#tax_name').val('');
var tax_desc= $('#tax_desc').val('');
var start_date= $('#start_date').val('');
var end_date= $('#end_date').val('');
var no_end_date = ($('#no_end_date').prop('checked')== false);
var tax = $('#tax').val('');
var tax_type_price = $('#tax_type_price').val('');
var charge_per = $('#charge_per').val('');
var cal_ext_rate = ($('#cal_ext_rate').prop('checked')== false);
var tax_inclusive = ($('#tax_inclusive').prop('checked')== false);
var cal_room_price = ($('#cal_room_price').prop('checked')== false);
var cal_package_price = ($('#cal_package_price').prop('checked')== false);
var apply_free_night = ($('#apply_free_night').prop('checked')== false);
var tax_by_los = ($('#tax_by_los').prop('checked') == false);

$(".room-tax").html('Hotel tax added successfully').removeClass('hidden');
}

}
// Add Tax End


// Tax Update Start
$(document).on("click", ".updateTax", updateTax);
    
function updateTax() {
var taxId = $(this).attr('id');


var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
var tax_level = $('#edit_tax_level_'+taxId).val();
var tax_frequency= $('#edit_tax_frequency_'+taxId).val();
var tax_type= $('#edit_tax_type_'+taxId).val();
var tax_code= $('#edit_tax_code_'+taxId).val();
var tax_name= $('#edit_tax_name_'+taxId).val();
var tax_desc= $('#edit_tax_desc_'+taxId).val();
var start_date= $('#edit_start_date_'+taxId).val();
var end_date= $('#edit_end_date_'+taxId).val();
var no_end_date = ($('#edit_no_end_date_'+taxId).prop('checked') == true) ? 'Yes' : 'No';
var tax = $('#edit_tax_'+taxId).val();
var tax_type_price = $('#edit_tax_type_price_'+taxId).val();
var charge_per = $('#edit_charge_per_'+taxId).val();
var cal_ext_rate = ($('#edit_cal_ext_rate_'+taxId).prop('checked') == true) ? 'True' : 'False';
var tax_inclusive = ($('#edit_tax_inclusive_'+taxId).prop('checked') == true) ? 'True' : 'False';
var cal_room_price = ($('#edit_cal_room_price_'+taxId).prop('checked') == true) ? 'True' : 'False';
var cal_package_price = ($('#edit_cal_package_price_'+taxId).prop('checked') == true) ? 'True' : 'False';
var apply_free_night = ($('#edit_apply_free_night_'+taxId).prop('checked') == true) ? 'True' : 'False';
var tax_by_los = ($('#edit_tax_by_los_'+taxId).prop('checked') == true) ? 'True' : 'False';

$('#err_tax_level'+taxId).html('');
$('#err_tax_frequency'+taxId).html('');
$('#err_tax_type'+taxId).html('');
$('#err_tax_code'+taxId).html('');
$('#err_tax_desc'+taxId).html('');
$('#err_start_date'+taxId).html('');
$('#err_tax'+taxId).html('');
$('#err_charge_per'+taxId).html('');

if (tax_level == '') {
$('#err_tax_level'+taxId).html('Enter a tax level').css('color','red');
$('#edit_tax_level_'+taxId).focus();
} else if (tax_frequency == '') {
$('#err_tax_frequency'+taxId).html('Enter a tax frequency').css('color','red');
$('#edit_tax_frequency_'+taxId).focus();
} else if (tax_type == '') {
$('#err_tax_type'+taxId).html('Enter a tax type').css('color','red');
$('#edit_tax_type_'+taxId).focus();
} else if (tax_desc == '') {
$('#err_tax_desc'+taxId).html('Enter a tax desc').css('color','red');
$('#edit_tax_desc_'+taxId).focus();
} else if (start_date == '') {
$('#err_start_date'+taxId).html('Enter a start date').css('color','red');
$('#edit_start_date_'+taxId).focus();
} else if (tax == '') {
$('#err_tax'+taxId).html('Enter a tax').css('color','red');
$('#edit_tax_'+taxId).focus();
} else if (add_room_long_desc == '') {
$('#err_add_room_long_desc'+taxId).html('Enter a room long desc').css('color','red');
$('#edit_room_long_desc_'+taxId).focus();
} else if (charge_per == '') {
$('#err_charge_per'+taxId).html('Enter a charge per').css('color','red');
$('#edit_charge_per_'+taxId).focus();
}else {

    var myFormData = new FormData();
    myFormData.append('_token', CSRF_TOKEN);
    myFormData.append('id', id);
    myFormData.append('taxId', taxId);
    myFormData.append('tax_level', tax_level);
    myFormData.append('tax_frequency', tax_frequency);
    myFormData.append('tax_type', tax_type);
    myFormData.append('tax_code', tax_code);
    myFormData.append('tax_name', tax_name);
    myFormData.append('tax_desc', tax_desc);
    myFormData.append('start_date', start_date);
    myFormData.append('end_date', end_date);
    myFormData.append('no_end_date', no_end_date);
    myFormData.append('tax', tax);
    myFormData.append('tax_type_price', tax_type_price);
    myFormData.append('charge_per', charge_per);
    myFormData.append('cal_ext_rate', cal_ext_rate);
    myFormData.append('tax_inclusive', tax_inclusive);
    myFormData.append('cal_room_price', cal_room_price);
    myFormData.append('cal_package_price', cal_package_price);
    myFormData.append('apply_free_night', apply_free_night);
    myFormData.append('tax_by_los', tax_by_los);

var host = "<?php echo e(url('hotelier/hotel/update-tax')); ?>";

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})

$.ajax({
type: 'POST',
data: myFormData,
url: host,
processData: false, // important
contentType: false, // important
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: function(res) {
    console.log(res);
$("#taxSuccess" + taxId).html('Tax updated successfully').removeClass('hidden');
}
})
return false;
}
}

// Tax Update End


/*

$(document).on("click", "#SynXisBtn", SaveSynXis);
function SaveSynXis(){  

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id= $('#hotel_mid').val();                 
var chain_name= $('#chain_name').val();
var chain_id= $('#chain_id').val(); 
var syn_property_name= $('#syn_property_name').val(); 
var syn_property_name_all= $('#syn_property_name_all').val(); 
var syn_property_code= $('#syn_property_code').val(); 
var syn_phy_address1= $('#syn_phy_address1').val(); 
var syn_phy_address2= $('#syn_phy_address2').val(); 
var syn_phy_city= $('#syn_phy_city').val(); 
var syn_phy_postcode= $('#syn_phy_postcode').val(); 
var syn_phy_country= $('#syn_phy_country').val(); 
var syn_invertry_amt= $('#syn_invertry_amt').val(); 
var syn_main_phone= $('#syn_main_phone').val(); 
var syn_main_fax= $('#syn_main_fax').val(); 
var syn_latitude= $('#syn_latitude').val(); 
var syn_longitude= $('#syn_longitude').val(); 
var syn_gen_enq_email= $('#syn_gen_enq_email').val(); 
var syn_web= $('#syn_web').val(); 
var syn_default_lang= $('#syn_default_lang').val(); 
var syn_op2_lang= $('#syn_op2_lang').val(); 
var syn_op3_lang= $('#syn_op3_lang').val(); 
var syn_op4_lang= $('#syn_op4_lang').val(); 
var syn_op5_lang= $('#syn_op5_lang').val(); 
var syn_op6_lang= $('#syn_op6_lang').val(); 
var syn_currency= $('#syn_currency').val(); 
var syn_time_zone= $('#syn_time_zone').val(); 
var syn_airport= $('#syn_airport').val(); 
var syn_via_email= $('#syn_via_email').val(); 
var syn_via_email_add= $('#syn_via_email_add').val(); 
var syn_via_fax= $('#syn_via_fax').val(); 
var syn_via_fax_no= $('#syn_via_fax_no').val(); 
var syn_channel_1= $('#syn_channel_1').val(); 
var syn_channel_desc_1= $('#syn_channel_desc_1').val(); 
var syn_channel_2= $('#syn_channel_2').val(); 
var syn_channel_desc_2= $('#syn_channel_desc_2').val(); 
var syn_channel_3= $('#syn_channel_3').val(); 
var syn_channel_desc_3= $('#syn_channel_desc_3').val(); 
var syn_channel_4= $('#syn_channel_4').val(); 
var syn_channel_desc_4= $('#syn_channel_desc_4').val(); 
var syn_channel_5= $('#syn_channel_5').val(); 
var syn_channel_desc_5= $('#syn_channel_desc_5').val(); 
var syn_channel_6= $('#syn_channel_6').val(); 
var syn_channel_desc_6= $('#syn_channel_desc_6').val(); 
var syn_pri_name= $('#syn_pri_name').val(); 
var syn_pri_title= $('#syn_pri_title').val(); 
var syn_pri_phone= $('#syn_pri_phone').val(); 
var syn_pri_email= $('#syn_pri_email').val(); 
var syn_add1_name= $('#syn_add1_name').val(); 
var syn_add1_title= $('#syn_add1_title').val(); 
var syn_add1_phone= $('#syn_add1_phone').val(); 
var syn_add1_email= $('#syn_add1_email').val(); 
var syn_add2_name= $('#syn_add2_name').val(); 
var syn_add2_title= $('#syn_add2_title').val(); 
var syn_add2_phone= $('#syn_add2_phone').val(); 
var syn_add2_email= $('#syn_add2_email').val(); 
var syn_tec_name= $('#syn_tec_name').val(); 
var syn_tec_title= $('#syn_tec_title').val(); 
var syn_tec_phone= $('#syn_tec_phone').val(); 
var syn_tec_email= $('#syn_tec_email').val(); 
var syn_already_rep= $('#syn_already_rep').val(); 
var syn_gds_comp_name= $('#syn_gds_comp_name').val(); 
var syn_chain_code= $('#syn_chain_code').val(); 
var syn_property_code_sabre= $('#syn_property_code_sabre').val(); 
var syn_property_code_apollo= $('#syn_property_code_apollo').val(); 
var syn_property_code_worldspan= $('#syn_property_code_worldspan').val(); 
var syn_property_code_amadeus = $('#syn_property_code_amadeus').val();

$('#err_bar_name').html('');                  
$('#err_bar_description').html('')

if(bar_name==''){
$('#err_bar_name').html('Enter a name')

} 
else if(bar_description==''){
$('#err_bar_description').html('Enter a description')

}                       
else{

var params={'_token':CSRF_TOKEN,'id': id,'chain_name':chain_name,'chain_id':chain_id,'syn_property_name':syn_property_name,'syn_property_name_all':syn_property_name_all,'syn_property_code':syn_property_code,'syn_phy_address1':syn_phy_address1,'syn_phy_address2':syn_phy_address2,'syn_phy_city':syn_phy_city,'syn_phy_postcode':syn_phy_postcode,'syn_phy_country':syn_phy_country,'syn_invertry_amt':syn_invertry_amt,'syn_main_phone':syn_main_phone,'syn_main_fax':syn_main_fax,'syn_latitude':syn_latitude,'syn_longitude':syn_longitude,'syn_gen_enq_email':syn_gen_enq_email,'syn_web':syn_web,'syn_default_lang':syn_default_lang,'syn_op2_lang':syn_op2_lang,'syn_op3_lang':syn_op3_lang,'syn_op4_lang':syn_op4_lang,'syn_op5_lang':syn_op5_lang,'syn_op6_lang':syn_op6_lang,'syn_currency':syn_currency,'syn_time_zone':syn_time_zone,'syn_airport':syn_airport,'syn_via_email':syn_via_email,'syn_via_email_add':syn_via_email_add,'syn_via_fax':syn_via_fax,'syn_via_fax_no':syn_via_fax_no,'syn_channel_1':syn_channel_1,'syn_channel_desc_1':syn_channel_desc_1,'syn_channel_2':syn_channel_2,'syn_channel_desc_2':syn_channel_desc_2,'syn_channel_3':syn_channel_3,'syn_channel_desc_3':syn_channel_desc_3,'syn_channel_4':syn_channel_4,'syn_channel_desc_4':syn_channel_desc_4,'syn_channel_5':syn_channel_5,'syn_channel_desc_5':syn_channel_desc_5,'syn_channel_6':syn_channel_6,'syn_channel_desc_6':syn_channel_desc_6,'syn_pri_name':syn_pri_name,'syn_pri_title':syn_pri_title,'syn_pri_phone':syn_pri_phone,'syn_pri_email':syn_pri_email,'syn_add1_name':syn_add1_name,'syn_add1_title':syn_add1_title,'syn_add1_phone':syn_add1_phone,'syn_add1_email':syn_add1_email,'syn_add2_name':syn_add2_name,'syn_add2_title':syn_add2_title,'syn_add2_phone':syn_add2_phone,'syn_add2_email':syn_add2_email,'syn_tec_name':syn_tec_name,'syn_tec_title':syn_tec_title,'syn_tec_phone':syn_tec_phone,'syn_tec_email':syn_tec_email,'syn_already_rep':syn_already_rep,'syn_gds_comp_name':syn_gds_comp_name,'syn_chain_code':syn_chain_code,'syn_property_code_sabre':syn_property_code_sabre,'syn_property_code_apollo':syn_property_code_apollo,'syn_property_code_worldspan':syn_property_code_worldspan,'syn_property_code_amadeus,':syn_property_code_amadeus}

var host="<?php echo e(url('hotelier/hotel/add-synxis')); ?>";
$.ajax({
type: 'POST',
data:params,
url: host,
dataType: "json",      
beforeSend: function(){
$('.image_loader').show();
},
complete: function(){
$('.image_loader').hide();
},success:addSynXisStatus
})
return false;
}
function addSynXisStatus(res){ 
console.log("Data::"+JSON.stringify(res));
if(res.success){

$('#chain_name').val('');
$('#chain_id').val('');
$('#syn_property_name').val('');
$('#syn_property_name_all').val('');
$('#syn_property_code').val('');
$('#syn_phy_address1').val('');
$('#syn_phy_address2').val('');
$('#syn_phy_city').val('');
$('#syn_phy_postcode').val('');
$('#syn_phy_country').val('');
$('#syn_invertry_amt').val('');
$('#syn_main_phone').val('');
$('#syn_main_fax').val('');
$('#syn_latitude').val('');
$('#syn_longitude').val('');
$('#syn_gen_enq_email').val('');
$('#syn_web').val('');
$('#syn_default_lang').val('');
$('#syn_op2_lang').val('');
$('#syn_op3_lang').val('');
$('#syn_op4_lang').val('');
$('#syn_op5_lang').val('');
$('#syn_op6_lang').val('');
$('#syn_currency').val('');
$('#syn_time_zone').val('');
$('#syn_airport').val('');
$('#syn_via_email').val('');
$('#syn_via_email_add').val('');
$('#syn_via_fax').val('');
$('#syn_via_fax_no').val('');
$('#syn_channel_1').val('');
$('#syn_channel_desc_1').val('');
$('#syn_channel_2').val('');
$('#syn_channel_desc_2').val('');
$('#syn_channel_3').val('');
$('#syn_channel_desc_3').val('');
$('#syn_channel_4').val('');
$('#syn_channel_desc_4').val('');
$('#syn_channel_5').val('');
$('#syn_channel_desc_5').val('');
$('#syn_channel_6').val('');
$('#syn_channel_desc_6').val('');
$('#syn_pri_name').val('');
$('#syn_pri_title').val('');
$('#syn_pri_phone').val('');
$('#syn_pri_email').val('');
$('#syn_add1_name').val('');
$('#syn_add1_title').val('');
$('#syn_add1_phone').val('');
$('#syn_add1_email').val('');
$('#syn_add2_name').val('');
$('#syn_add2_title').val('');
$('#syn_add2_phone').val('');
$('#syn_add2_email').val('');
$('#syn_tec_name').val('');
$('#syn_tec_title').val('');
$('#syn_tec_phone').val('');
$('#syn_tec_email').val('');
$('#syn_already_rep').val('');
$('#syn_gds_comp_name').val('');
$('#syn_chain_code').val('');
$('#syn_property_code_sabre').val('');
$('#syn_property_code_apollo').val('');
$('#syn_property_code_worldspan').val('');
$('#syn_property_code_amadeus;').val('');
$(".synxis-status").html('Hotel sYnXis added successfully').removeClass('hidden');
}else{
printErrorMsg(res.error);
//$(".synxis-error").html('Please fill the all fields'+res.error).removeClass('hidden');
} 

}

function printErrorMsg (msg) {
$(".print-error-msg").find("ul").html('');
$(".print-error-msg").css('display','block');
$.each( msg, function( key, value ) {
$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
});
}

}  */
$(document).on("click", ".AddRate", AddRate);

function AddRate() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
var starting_price = $('#starting_price').val();
var rparams = {
    'id' : id,
    '_token': CSRF_TOKEN,
    'starting_price': starting_price    
    }

var rhost = "<?php echo e(url('hotelier/hotel/update-rate')); ?>";

$.ajax({
type: 'POST',
data: rparams,
url: rhost,
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: function(res) {
$("#rateSuccess").removeClass('hidden')
$("#rateSuccess").html('Hotel starting rate updated successfully').removeClass('hidden');
}
})

}








$(document).on("click", ".updateRestaurant", updateRestaurant);
    
function updateRestaurant() {

var id = $('#hotel_mid').val();
var resId = $(this).attr('id');
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var dinning = $('#dinning'+resId).val();
var meal_plan = $('#meal_plan'+resId).val();
var res_description = $('#res_description'+resId).val();

if ($('#res_breakfast' + resId).prop('checked') == true) {
var res_breakfast = "true";
} else {
var res_breakfast = "false";
}

if ($('#res_lunch' + resId).prop('checked') == true) {
var res_lunch = "true";
} else {
var res_lunch = "false";
}

if ($('#res_dinner' + resId).prop('checked') == true) {
var res_dinner = "true";
} else {
var res_dinner = "false";
}

var res_open_monday = $("input[name='public_open_monday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_monday = $("input[name='public_close_monday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_tuesday = $("input[name='break_open_tuesday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_tuesday = $("input[name='break_close_tuesday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_wednesday = $("input[name='break_open_wednesday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_wednesday = $("input[name='break_close_wednesday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_thursday = $("input[name='break_open_thursday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_thursday = $("input[name='break_close_thursday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_friday = $("input[name='break_open_friday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_friday = $("input[name='break_close_friday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_saturday = $("input[name='break_open_saturday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_saturday = $("input[name='break_close_saturday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_sunday = $("input[name='break_open_sunday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_sunday = $("input[name='break_close_sunday"+resId+"[]']")
.map(function() {
return $(this).val();
}).get();


if (resId == '') {
    alert();
}else {
    var params = {
    'id' : id,
    '_token': CSRF_TOKEN,
    'resId': resId,
    'dinning': dinning,
    'meal_plan': meal_plan,
    'res_description': res_description,
    'res_breakfast': res_breakfast,
    'res_lunch': res_lunch,
    'res_dinner': res_dinner,
    'res_open_monday': res_open_monday,
    'res_close_monday': res_close_monday,
    'res_open_tuesday': res_open_tuesday,
    'res_close_tuesday': res_close_tuesday,
    'res_open_wednesday': res_open_wednesday,
    'res_close_wednesday': res_close_wednesday,
    'res_open_thursday': res_open_thursday,
    'res_close_thursday': res_close_thursday,
    'res_open_friday': res_open_friday,
    'res_close_friday': res_close_friday,
    'res_open_saturday': res_open_saturday,
    'res_close_saturday': res_close_saturday,
    'res_open_sunday': res_open_sunday,
    'res_close_sunday': res_close_sunday
    }
console.log(params);
var host = "<?php echo e(url('hotelier/hotel/update-restaurant')); ?>";

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})

$.ajax({
type: 'POST',
data: params,
url: host,
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: function(res) {
    console.log(res);
$("#restaurentSuccess").html('Hotel room updated successfully').removeClass('hidden');
}
})
return false;
}
}







$(document).on("click", "#Save-Restaurant", SaveRestaurant);

function SaveRestaurant() {

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
var dinning = $('#dinning').val();
var meal_plan = $('#meal_plan').val();
var res_description = $('#res_description').val();
var res_breakfast = $("input[name='res_breakfast']:checked").val();
var res_lunch = $("input[name='res_lunch']:checked").val();
var res_dinner = $("input[name='res_dinner']:checked").val();
//var res_open_monday= $('#res_open_monday[]').val();

var res_open_monday = $("input[name='res_open_monday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_monday = $("input[name='res_close_monday[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_tuesday = $("input[name='res_open_tuesday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_tuesday = $("input[name='res_close_tuesday[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_wednesday = $("input[name='res_open_wednesday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_wednesday = $("input[name='res_close_wednesday[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_thursday = $("input[name='res_open_thursday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_thursday = $("input[name='res_close_thursday[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_friday = $("input[name='res_open_friday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_friday = $("input[name='res_close_friday[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_saturday = $("input[name='res_open_saturday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_saturday = $("input[name='res_close_saturday[]']")
.map(function() {
return $(this).val();
}).get();
var res_open_sunday = $("input[name='res_open_sunday[]']")
.map(function() {
return $(this).val();
}).get();
var res_close_sunday = $("input[name='res_close_sunday[]']")
.map(function() {
return $(this).val();
}).get();

$('#err_dinning').html('');
$('#err_meal_plan').html('')
$('#err_res_description').html('')

if (dinning == '') {
$('#err_dinning').html('Enter a name')

} else if (meal_plan == '') {
$('#err_meal_plan').html('Enter a meal plan')

} else if (res_description == '') {
$('#err_res_description').html('Enter a description')

} else {

var params = {
'_token': CSRF_TOKEN,
'id': id,
'dinning': dinning,
'meal_plan': meal_plan,
'res_description': res_description,
'res_breakfast': res_breakfast,
'res_lunch': res_lunch,
'res_dinner': res_dinner,
'res_open_monday': res_open_monday,
'res_close_monday': res_close_monday,
'res_open_tuesday': res_open_tuesday,
'res_close_tuesday': res_close_tuesday,
'res_open_wednesday': res_open_wednesday,
'res_close_wednesday': res_close_wednesday,
'res_open_thursday': res_open_thursday,
'res_close_thursday': res_close_thursday,
'res_open_friday': res_open_friday,
'res_close_friday': res_close_friday,
'res_open_saturday': res_open_saturday,
'res_close_saturday': res_close_saturday,
'res_open_sunday': res_open_sunday,
'res_close_sunday': res_close_sunday
}

var host = "<?php echo e(url('hotelier/hotel/add-restaurant')); ?>";
$.ajax({
type: 'POST',
data: params,
url: host,
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: addResStatus
})
return false;
}

function addResStatus(res) {

if (res.details.status == 'success') {

$("input[name=res_breakfast]").prop('checked', false);
$("input[name=res_lunch]").prop('checked', false);
$("input[name=res_dinner]").prop('checked', false);
$('#dinning').val('');
$('#meal_plan').val('');
$('#res_description').val('');
$("input[name='res_open_monday[]']").val('');
$("input[name='res_close_monday[]']").val('');
$("input[name='res_open_tuesday[]']").val('');
$("input[name='res_close_tuesday[]']").val('');
$("input[name='res_open_wednesday[]']").val('');
$("input[name='res_close_wednesday[]']").val('');
$("input[name='res_open_thursday[]']").val('');
$("input[name='res_close_thursday[]']").val('');
$("input[name='res_open_friday[]']").val('');
$("input[name='res_close_friday[]']").val('');
$("input[name='res_open_saturday[]']").val('');
$("input[name='res_close_saturday[]']").val('');
$("input[name='res_open_sunday[]']").val('');
$("input[name='res_close_sunday[]']").val('');
$(".resturant-status").html('Hotel resturant added successfully').removeClass('hidden');
}

}
}

$(document).on("click", "#Save-Bar", SaveBar);

function SaveBar() {

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id = $('#hotel_mid').val();
var bar_name = $('#bar_name').val();
var bar_description = $('#bar_description').val();
var child_friendly = $("input[name='child_friendly']:checked").val();
var bar_public = $("input[name='bar_public']:checked").val();
var bar_guest = $("input[name='bar_guest']:checked").val();
//var res_open_monday= $('#res_open_monday[]').val();

var public_open_monday = $("input[name='public_open_monday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_monday = $("input[name='public_close_monday[]']")
.map(function() {
return $(this).val();
}).get();
var public_open_tuesday = $("input[name='public_open_tuesday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_tuesday = $("input[name='public_close_tuesday[]']")
.map(function() {
return $(this).val();
}).get();
var public_open_wednesday = $("input[name='public_open_wednesday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_wednesday = $("input[name='public_close_wednesday[]']")
.map(function() {
return $(this).val();
}).get();
var public_open_thursday = $("input[name='public_open_thursday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_thursday = $("input[name='public_close_thursday[]']")
.map(function() {
return $(this).val();
}).get();
var public_open_friday = $("input[name='public_open_friday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_friday = $("input[name='public_close_friday[]']")
.map(function() {
return $(this).val();
}).get();
var public_open_saturday = $("input[name='public_open_saturday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_saturday = $("input[name='public_close_saturday[]']")
.map(function() {
return $(this).val();
}).get();
var public_open_sunday = $("input[name='public_open_sunday[]']")
.map(function() {
return $(this).val();
}).get();
var public_close_sunday = $("input[name='public_close_sunday[]']")
.map(function() {
return $(this).val();
}).get();

$('#err_bar_name').html('');
$('#err_bar_description').html('')

if (bar_name == '') {
$('#err_bar_name').html('Enter a name')

} else if (bar_description == '') {
$('#err_bar_description').html('Enter a description')

} else {

var params = {
'_token': CSRF_TOKEN,
'id': id,
'bar_name': bar_name,
'child_friendly': child_friendly,
'bar_description': bar_description,
'bar_public': bar_public,
'bar_guest': bar_guest,
'res_open_monday': public_open_monday,
'res_close_monday': public_close_monday,
'res_open_tuesday': public_open_tuesday,
'res_close_tuesday': public_close_tuesday,
'res_open_wednesday': public_open_wednesday,
'res_close_wednesday': public_close_wednesday,
'res_open_thursday': public_open_thursday,
'res_close_thursday': public_close_thursday,
'res_open_friday': public_open_friday,
'res_close_friday': public_close_friday,
'res_open_saturday': public_open_saturday,
'res_close_saturday': public_close_saturday,
'res_open_sunday': public_open_sunday,
'res_close_sunday': public_close_sunday
}

var host = "<?php echo e(url('hotelier/hotel/add-bar')); ?>";
$.ajax({
type: 'POST',
data: params,
url: host,
dataType: "json", // data type of response      
beforeSend: function() {
$('.image_loader').show();
},
complete: function() {
$('.image_loader').hide();
},
success: addBarStatus
})
return false;
}

function addBarStatus(res) {

if (res.details.status == 'success') {

$("input[name=child_friendly]").prop('checked', false);
$("input[name=bar_public]").prop('checked', false);
$("input[name=bar_guest]").prop('checked', false);
$('#bar_name').val('');
$('#bar_description').val('');

$("input[name='public_open_monday[]']").val('');
$("input[name='public_close_monday[]']").val('');
$("input[name='public_open_tuesday[]']").val('');
$("input[name='public_close_tuesday[]']").val('');
$("input[name='public_open_wednesday[]']").val('');
$("input[name='public_close_wednesday[]']").val('');
$("input[name='public_open_thursday[]']").val('');
$("input[name='public_close_thursday[]']").val('');
$("input[name='public_open_friday[]']").val('');
$("input[name='public_close_friday[]']").val('');
$("input[name='public_open_saturday[]']").val('');
$("input[name='public_close_saturday[]']").val('');
$("input[name='public_open_sunday[]']").val('');
$("input[name='public_close_sunday[]']").val('');
$(".bar-status").html('Hotel bar added successfully').removeClass('hidden');
}

}
}

// $("button#cloneair").click(function() {
// var $div = $('tr[id^="airportinfo-form"]:first');
// var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
// var divlength = $('tr[id^="airportinfo-form"]').length;
// var $klon = $div.clone(true);
// $klon.find('input,textarea,select').val('');
// $klon.prop('id', 'airportinfo-form' + divlength);
// $("#airportinfo-form-list").append($klon);
// $('#airportinfo-form' + divlength).append('<td><button id=rem' + divlength + ' onclick="removediv(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button></td>');

// $("#airportinfo-form" + divlength + " select#airportinfo").prop('class', 'form-control select2-hidden-accessible airportinfo' + divlength);
// var $divnew = $('div[id^="airportinfo-form"]:last');

// $divnew.find('input[type=text]:first').focus();
// return false;
// });

function removediv(val) {
var $cnid = $('#airportinfo-form' + val);
$cnid.remove();
};

//Add Bed Type Clone

$("button#clonebed").click(function() {
var $div = $('tr[id^="bedtype"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="bedtype"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'bedtype' + divlength);
$("#bedtype_list").append($klon);
$('#bedtype' + divlength).append('<button id=rem' + divlength + ' onclick="removedivbedtype(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');
var $divnew = $('tr[id^="bedtype"]:last');
$divnew.find('input[type=text]:first').focus();
return false;
});


function clonebedUpdate1(id){

var cloneId = id;
var $div = $('tr[id^="bedtypeUpdate'+cloneId+'"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="bedtypeUpdate'+cloneId+'"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'bedtypeUpdate'+cloneId + divlength);
$("#bedtype_listUpdate"+cloneId).append($klon);

$('#bedtypeUpdate'+cloneId + divlength).append('<button id=rem' + divlength + ' onclick="removedivbedtypeUpdate(' + divlength +','+cloneId+ ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');
var $divnew = $('tr[id^="bedtypeUpdate"]:last');
$divnew.find('input[type=text]:first').focus();
return false;
};

function removedivbedtype(val) {
var $cnid = $('#bedtype' + val);
$cnid.remove();
};

function removedivbedtypeUpdate(val,cloneId) {
var $cnid = $('#bedtypeUpdate'+ cloneId + val);
$cnid.remove();
};


//Add GDS Codes

$("button#clonegds").click(function() {
var $div = $('div[id^="gds_code"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('div[id^="gds_code"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'gds_code' + divlength);
$("#gdscodelist").append($klon);
$('#gds_code' + divlength + ' .row').append('<div class="col-sm-2 col-md-2 col-lg-2" style="margin-top:5%"><button id=rem' + divlength + ' onclick="removedivgds_code(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button></div>');
var $divnew = $('div[id^="gds_code"]:last');
$divnew.find('input[type=text]:first').focus();
return false;
});

function removedivgds_code(val) {
var $cnid = $('#gds_code' + val);
$cnid.remove();
};

//Add Resturant Type Clone

$("button#clonemonhour").click(function() {
var $div = $('tr[id^="monhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="monhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'monhour' + divlength);
$("#monhourlist").append($klon);
$('#monhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivmonhour(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="monhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivmonhour(val) {
var $cnid = $('#monhour' + val);
$cnid.remove();
};

$("button#clonetuesdayhour").click(function() {
var $div = $('tr[id^="tuesdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="tuesdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'tuesdayhour' + divlength);
$("#tuesdayhourlist").append($klon);
$('#tuesdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivtuesday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="tuesdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivtuesday(val) {
var $cnid = $('#tuesdayhour' + val);
$cnid.remove();
};

$("button#clonewednesdayhour").click(function() {
var $div = $('tr[id^="wednesdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="wednesdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'wednesdayhour' + divlength);
$("#wednesdayhourlist").append($klon);
$('#wednesdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivwednesday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="wednesdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivwednesday(val) {
var $cnid = $('#wednesdayhour' + val);
$cnid.remove();
};

$("button#clonethursdayhour").click(function() {
var $div = $('tr[id^="thursdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="thursdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'thursdayhour' + divlength);
$("#thursdayhourlist").append($klon);
$('#thursdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivthursday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="thursdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivthursday(val) {
var $cnid = $('#thursdayhour' + val);
$cnid.remove();
};

$("button#clonefridayhour").click(function() {
var $div = $('tr[id^="fridayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="fridayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'fridayhour' + divlength);
$("#fridayhourlist").append($klon);
$('#fridayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivfriday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="fridayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivfriday(val) {
var $cnid = $('#fridayhour' + val);
$cnid.remove();
};

$("button#clonesaturdayhour").click(function() {
var $div = $('tr[id^="saturdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="saturdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'saturdayhour' + divlength);
$("#saturdayhourlist").append($klon);
$('#saturdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivsaturday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="saturdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivsaturday(val) {
var $cnid = $('#saturdayhour' + val);
$cnid.remove();
};

$("button#clonesundayhour").click(function() {
var $div = $('tr[id^="sundayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="sundayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'sundayhour' + divlength);
$("#sundayhourlist").append($klon);
$('#sundayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivsunday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="sundayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivsunday(val) {
var $cnid = $('#sundayhour' + val);
$cnid.remove();
};

//Add Bar Clone

$("button#clonepublicmonhour").click(function() {
var $div = $('tr[id^="publicmonhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publicmonhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publicmonhour' + divlength);
$("#publicmonhourlist").append($klon);
$('#publicmonhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublicmonhour(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publicmonhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublicmonhour(val) {
var $cnid = $('#publicmonhour' + val);
$cnid.remove();
};

$("button#clonepublictuesdayhour").click(function() {
var $div = $('tr[id^="publictuesdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publictuesdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publictuesdayhour' + divlength);
$("#publictuesdayhourlist").append($klon);
$('#publictuesdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublictuesday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publictuesdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublictuesday(val) {
var $cnid = $('#publictuesdayhour' + val);
$cnid.remove();
};

$("button#clonepublicwednesdayhour").click(function() {
var $div = $('tr[id^="publicwednesdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publicwednesdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publicwednesdayhour' + divlength);
$("#publicwednesdayhourlist").append($klon);
$('#publicwednesdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublicwednesday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publicwednesdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublicwednesday(val) {
var $cnid = $('#publicwednesdayhour' + val);
$cnid.remove();
};

$("button#clonepublicthursdayhour").click(function() {
var $div = $('tr[id^="publicthursdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publicthursdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publicthursdayhour' + divlength);
$("#publicthursdayhourlist").append($klon);
$('#publicthursdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublicthursday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publicthursdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublicthursday(val) {
var $cnid = $('#publicthursdayhour' + val);
$cnid.remove();
};

$("button#clonepublicfridayhour").click(function() {
var $div = $('tr[id^="publicfridayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publicfridayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publicfridayhour' + divlength);
$("#publicfridayhourlist").append($klon);
$('#publicfridayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublicfriday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publicfridayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublicfriday(val) {
var $cnid = $('#publicfridayhour' + val);
$cnid.remove();
};

$("button#clonepublicsaturdayhour").click(function() {
var $div = $('tr[id^="publicsaturdayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publicsaturdayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publicsaturdayhour' + divlength);
$("#publicsaturdayhourlist").append($klon);
$('#publicsaturdayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublicsaturday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publicsaturdayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublicsaturday(val) {
var $cnid = $('#publicsaturdayhour' + val);
$cnid.remove();
};

$("button#clonepublicsundayhour").click(function() {
var $div = $('tr[id^="publicsundayhour"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="publicsundayhour"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'publicsundayhour' + divlength);
$("#publicsundayhourlist").append($klon);
$('#publicsundayhour' + divlength).append('<button id=rem' + divlength + ' onclick="removedivpublicsunday(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button>');

var $divnew = $('tr[id^="publicsundayhour"]:last');

$divnew.find('input[type=text]:first').focus();
find('#contact_add_form:last');
return false;
});

function removedivpublicsunday(val) {
var $cnid = $('#publicsundayhour' + val);
$cnid.remove();
};
</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
window.onload = function() {
var mapOptions = {
center: new google.maps.LatLng(18.9300, 72.8200),
zoom: 1,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var infoWindow = new google.maps.InfoWindow();
var latlngbounds = new google.maps.LatLngBounds();
var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
google.maps.event.addListener(map, 'click', function(e) {
$('#latitude').val(e.latLng.lat());
$('#longitude').val(e.latLng.lat());
//alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
});
}

// $( document ).ready(function() {
// $("#airportinfo").select2({ placeholder: "Select a State",
//     allowClear: true});
// });

// $(function () {

//     var classval=$('#synxis').attr('class');
//    var da=classval.split('nav-item');

//    if(da[1]==' active'){ 
//     $('#SynXisBtn').removeClass('hidden') 
//     $('.pager').addClass('hidden')
//    }
//   $('.nav-link').click(function(){
//             var hrf=$(this).attr('href');
//             if(hrf=="#tab06"){
//             $('.pager').addClass('hidden')
//             $('#SynXisBtn').removeClass('hidden') 
//             }else{
//             $('#SynXisBtn').addClass('hidden')                
//             $('.pager').removeClass('hidden')
//             }
//   });

// });



$( function() {
    $( ".start_date" ).datepicker({
      dateFormat: 'dd-mm-yy',
      
    });
    $( ".end_date" ).datepicker({
      dateFormat: 'dd-mm-yy',
      
    });
});


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

<style type="text/css">
input[type=file] {
display: inline;
}

.image_preview {
border: 1px solid #e6e6e6;
padding: 10px;
min-height: 150px;
text-align: center;
}

.image_preview img {
width: 200px;
padding: 5px;
}
</style>
<script type="text/javascript">
$("#uploadFile").change(function() {

$('#image_preview').html("");

var total_file = document.getElementById("uploadFile").files.length;

for (var i = 0; i < total_file; i++)

{

$('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#uploadFile1").change(function() {

$('#image_preview1').html("");

var total_file = document.getElementById("uploadFile1").files.length;

for (var i = 0; i < total_file; i++)

{

$('#image_preview1').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#uploadFile2").change(function() {

$('#image_preview2').html("");

var total_file = document.getElementById("uploadFile2").files.length;

for (var i = 0; i < total_file; i++)

{

$('#image_preview2').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#uploadFile3").change(function() {

$('#image_preview3').html("");

var total_file = document.getElementById("uploadFile3").files.length;

for (var i = 0; i < total_file; i++)

{

$('#image_preview3').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#hotel_img_1").change(function() {

$('#h_image_preview1').html("");

var total_file = document.getElementById("hotel_img_1").files.length;

for (var i = 0; i < total_file; i++)

{

$('#h_image_preview1').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#hotel_img_2").change(function() {

$('#h_image_preview2').html("");

var total_file = document.getElementById("hotel_img_2").files.length;

for (var i = 0; i < total_file; i++)

{

$('#h_image_preview2').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#hotel_img_3").change(function() {

$('#h_image_preview3').html("");

var total_file = document.getElementById("hotel_img_3").files.length;

for (var i = 0; i < total_file; i++)

{

$('#h_image_preview3').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#hotel_img_4").change(function() {

$('#h_image_preview4').html("");

var total_file = document.getElementById("hotel_img_4").files.length;

for (var i = 0; i < total_file; i++)

{

$('#h_image_preview4').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#hotel_img_5").change(function() {

$('#h_image_preview5').html("");

var total_file = document.getElementById("hotel_img_5").files.length;

for (var i = 0; i < total_file; i++)

{

$('#h_image_preview5').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

$("#hotel_img_6").change(function() {

$('#h_image_preview6').html("");

var total_file = document.getElementById("hotel_img_6").files.length;

for (var i = 0; i < total_file; i++)

{

$('#h_image_preview6').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");

}

});

</script>

<script type="text/javascript">
    function roomImgUpdate(uploadId,previewId) {

        var uploadId = uploadId;
        var previewId = previewId;

        $('#'+previewId).html("");
        var total_file = document.getElementById(uploadId).files.length;

        for (var i = 0; i < total_file; i++){
            $('#'+previewId).append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
        }
    }
</script>

<!-- Sales Activity Jquery function Start -->
<script src="<?php echo e(asset('assets/vendors/chart.js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/chart.js')); ?>"></script>
  <script type="text/javascript">

    $(document).ready(function(){
        $("#from_date").change();
    
    });

    $("#from_date,#to_date,#task_type,#user_id,#region_id").change(function () {

       var hotel_mid = $('#hotel_mid').val();
       var from_date1 = $('#from_date').val();
       var from_date2 = from_date1.split("-");
       var from_date = from_date2[2] + '-' + from_date2[1] + '-' + from_date2[0];

       var to_date1 = $('#to_date').val();
       var to_date2 = to_date1.split("-");
       var to_date = to_date2[2] + '-' + to_date2[1] + '-' + to_date2[0];


        var task_type = $("#task_type option:selected").val();
        var user_id = $("#user_id option:selected").val();
        var region_id = $("#region_id option:selected").val();
        var CSRF_TOKEN = "<?php echo e(csrf_token()); ?>";
        var host="<?php echo e(url('hotelier/getchart/')); ?>"; 

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
        type: 'POST',
        data:{'hotel_mid':hotel_mid,'from_date': from_date,'to_date': to_date,'task_type': task_type,'user_id': user_id,'region_id': region_id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response    
        success:rendergetcharts,
        error:function(){
          $('#resError').html('Refine data not found...');
        }

        })
    });
var pieChart;
var pieChartReg;

    function rendergetcharts(res){
      console.log(res);
      $('#resError').html('');
      $("#regChart").empty();
        var dataarray = res.data;
        var colorsarray = res.task_color;
        var labelsarray = res.labels;
        var chart_data = res.chart_all_data;
        var colors = res.colors.task_color;
        var reg_data = res.reg_data;
        var reg_labels = res.reg_labels;
        var regionFullName = res.regionName; 
       
       color_code = [];
      $.each(colorsarray, function(i, colour) {
            if(colour=='info'){
              color_code.push('rgb(10, 215, 247)');
            }else if(colour=='danger'){
              color_code.push('rgb(245, 118, 118)');
            }else if(colour=='primary'){
              color_code.push('rgb(70, 77, 238)');
            }else if(colour=='success'){
              color_code.push('rgb(13, 219, 185)');
            }else if(colour=='warning'){
        color_code.push('rgb(252, 213, 59)');
      }else if(colour=='dark'){
        color_code.push('rgb(0, 23, 55)');
      }else if(colour=='pink'){
        color_code.push('rgb(255, 0, 128)');
      }else if(colour=='darkblue'){
        color_code.push('rgb(64, 64, 115)');
      }else if(colour=='orange'){
        color_code.push('rgb(255, 153, 0)');
      }else if(colour=='rose'){
        color_code.push('rgb(255, 128, 255)');
      }else if(colour=='gray'){
        color_code.push('rgb(92, 92, 61)');
      }else if(colour=='choco'){
        color_code.push('rgb(172, 96, 57)');
      }else if(colour=='violet'){
        color_code.push('rgb(102, 0, 53)');
      }else if(colour=='lightgreen'){
        color_code.push('rgb(128, 255, 170)');
      }else if(colour=='pair'){
        color_code.push('rgb(153, 153, 77)');
      }else if(colour=='agenta'){
        color_code.push('rgb(0, 77, 77)');
      }else if(colour=='red'){
        color_code.push('rgb(255, 0, 0)');
      }else if(colour=='lighty'){
        color_code.push('rgb(179, 179, 0)');
      }else if(colour=='sandal'){
        color_code.push('rgb(250, 243, 177)');
      }else if(colour=='light'){
        color_code.push('rgb(216, 216, 216)');
      }else if(colour=='darkagenta'){
        color_code.push('rgb(173, 14, 75)');
      }else if(colour=='lightvio'){
        color_code.push('rgb(164, 138, 230)');
      }else if(colour=='greenn'){
        color_code.push('rgb(43, 135, 80)');
      }else if(colour=='yellow'){
        color_code.push('rgb(235, 255, 10)');
      }else if(colour=='copy'){
        color_code.push('rgb(194, 162, 110)');
      }else if(colour=='greenq'){
        color_code.push('rgb(158, 255, 198)');
      }else if(colour=='grey'){
        color_code.push('rgb(125, 122, 123)');
      }else if(colour=='brinj'){
        color_code.push('rgb(130, 60, 105)');
      }else if(colour=='kili'){
        color_code.push('rgb(37, 250, 0)');
      }
           
          });
       
var res='';
            $.each (chart_data, function (key, value) {
              var sno = key+1;

if(typeof(value.accountName) != "undefined" && value.accountName !== null) {
  var accountName = value.accountName;
}else{
  var accountName = "";
}

var formDa = $('#mySecondDiv').html();
var urlData = "<?php echo e(url('hotelier/salesUpdated')); ?>";
var countData = value.notes.length;
var i;
var text = '';
for (i = 0; i < countData; i++) {
  text += "<input type='textarea' value='"+value.notes[i]+"' readonly><br>";
}

var formData = '<div id="mySecondDiv" class=""><div class="row"><div class="col-md-12 text-left"><a href="#notes_model'+value.hle_id+'" class="" data-toggle="modal" data-target="#notes_model'+value.hle_id+'"><i class="fa fa-edit fa-lg"></i></i></a></div></div><div id="notes_model'+value.hle_id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><form id="commentForm" action="'+urlData+'" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST"><input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><div class="modal-header" style="margin-top:30px;"><h4 class="modal-title">Notes History</h4><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><div class="row"><div class="alert alert-success alert-success-offer hidden" role="alert"></div><input type="hidden" id="hotel_id" name="hotel_id" value="'+value.hle_id+'"><div class="col-md-12"><div class="panel-collapse" id="collapseOne"><div class="panel-body"><ul class="chat"></ul></div>'+text+'<div class="panel-footer"><div class="input-group"><div class="col-lg-12"><br/><div  class="form-group"><span class="error erroroffer"></span></div><br/><div  class="form-group"><label>Notes</label><textarea name="lead_notes" id="lead_notes" value="" class="form-control tinymce" ></textarea></div> </div></div></div></div></div></div></div><div class="modal-footer"><input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></form></div></div></div></div>';
            res +=
            '<tr>'+
                '<td>'+sno+'</td>'+
                '<td>'+value.created_at+'</td>'+
                '<td>'+accountName+'</td>'+
                    '<td>'+value.clientName+'</td>'+
                    '<td>'+value.consortiaName+'</td>'+
                '<td>'+value.task_name+'</td>'+
                '<td>'+value.region+'</td>'+
                '<td>'+value.sales_team+'</td>'+
                '<td>'+value.out_come+'</td>'+
                '<td>'+value.next_steps+'</td>'+
                    '<td>'+formData+'</td>'+
           '</tr>';

   });
$('#DispCharts').html(res);

$.each(reg_data, function(key,valueObj){

  var regionNames = regionFullName[key];
  var regName = '<div class="col-lg-6"><h3 class="text-center">'+regionNames+'</h3><canvas style="float:left;padding:20px" id="pieChart'+key+'"></canvas></div>';
  $("#regChart").append(regName);
  var chaData = reg_data[key];
  var chaLables = reg_labels[key];

  var doughnutPieDataReg = {
    datasets: [{
      data: chaData,
      backgroundColor: color_code,
      borderColor: color_code,
      }],
      labels:chaLables ,
  };

  var doughnutPieOptionsReg = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true,
    }
  };

  if ($("#pieChart"+key).length) {
    // if(pieChart){
    //     pieChart.destroy();
    // }
      var pieChartCanvasReg = $("#pieChart"+key).get(0).getContext("2d");
      pieChartReg = new Chart(pieChartCanvasReg, {
        type: 'pie',
        data: doughnutPieDataReg,
        options: doughnutPieOptionsReg
      });
  }
});

        
        var doughnutPieData1 = {
            datasets: [{
              data: dataarray,
              backgroundColor: color_code,
              borderColor: color_code,
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labelsarray,
          };

          var doughnutPieOptions1 = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true,
            }
          };


          if ($("#pieCharts").length) {
            if(pieChart){
                pieChart.destroy();
            }
              var pieChartCanvas = $("#pieCharts").get(0).getContext("2d");
              pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: doughnutPieData1,
                options: doughnutPieOptions1
              });
          }
    }  


        $( function() {
            $( "#from_date" ).datepicker({
              dateFormat: 'dd-mm-yy',
              
            });
            $( "#to_date" ).datepicker({
              dateFormat: 'dd-mm-yy',
              
            });
        });

   
  </script>

<script type="text/javascript">

  $('.select-change').click(function(){
    var regionId =  $(this).val();
    $('#regionId').val(regionId).trigger('change');

})

    function dataRefresh(){
      $('#from_date').val('');
      $('#to_date').val('');
      $('#task_type option').prop('selected', function() {
        return this.defaultSelected;
      });
      $('#user_id option').prop('selected', function() {
        return this.defaultSelected;
      });
      $('#region_id option').prop('selected', function() {
        return this.defaultSelected;
      });
      $("#from_date").change();
    }
</script>
<!-- Sales Activity Jquery function End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.crm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>