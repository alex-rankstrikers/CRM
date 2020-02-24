@extends('layouts.crm') 
@section('head')
@section('content')
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
</style>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">    
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="{{ url('hotelier/import-synxis') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row">            

<input name="mhotel_id" id="mhotel_id" type="hidden"  value="{{$Hotels->id}}">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="synxis_file" class="form-control"></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="SynXis" value="Import SynXis" class="btn btn-outline-inverse-info"></div>

</div>
</form>
</div>
<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="{{ url('hotelier/import-hotel-configuration') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="{{$Hotels->id}}">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="hotel_file" class="form-control"></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Hotel" value="Import Hotel Configuration" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="{{ url('hotelier/import-property-info') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="{{$Hotels->id}}">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="property_file" class="form-control"></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Property" value="Import Property Info" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="{{ url('hotelier/import-room-configuration') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="{{$Hotels->id}}">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="room_file" class="form-control"></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Room Configuration" value="Import Room Configuration" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

<div class="col-sm-6 col-md-4 col-lg-4 mtb-15">
<form name="export" action="{{ url('hotelier/import-tax-configuration') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
<div class="row"> 
<input name="mhotel_id" id="mhotel_id" type="hidden"  value="{{$Hotels->id}}">
<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 5px;"><input type="file" name="tax_file" class="form-control"></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-sm-6 col-md-6 col-lg-6 "><input type="submit" name="Tax Configuration" value="Import Tax Configuration" class="btn btn-outline-inverse-info"></div>

</div>
</form>   
</div>

</div>
</div> 
<form id="commentForm" action="{{url('hotelier/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row mt-30 "></div>

<div class="">
<div class="ctrlable_div">
<div class="steps" id="rootwizard">
<div class="row">
<div class="col-lg-12" id="content_desc">

<div class="row mt-30 "></div>
@if(Session::get('message'))
<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success " role="alert">Dear {{ Auth::user()->first_name }}, {{ (Session::get('message')) }}</div>
</div>
<div class="col-lg-2"></div>

@endif

<!--   @foreach ($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach {{$Hotels->id}}-->

</div>
</div>
<div class="card mb-3">

<div class="card-body">
<h4 class="card-title">Hotel</h4>
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
<!-- <li class="nav-item"><a class="nav-link" href="#tab08" data-toggle="tab">Create User</a></li>
<li class="nav-item"><a class="nav-link" href="#tab09" data-toggle="tab">View User</a></li>  --> 
</ul>
</div>
<!-- /.navbar-collapse -->
{{ csrf_field() }}

<input type="hidden" name="hotel_mid" id="hotel_mid" value="{{$Hotels->id}}">
<div class="tab-content" id="tab-contents" style="margin-top:0px;">

<div class="tab-pane active" id="tab1">

<div class="row">

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<h1>Basics</h1></div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 text-right">
<a href="{{ url('hotelier/export-hotel-info') }}/xlsx/{{$Hotels->id}}" class="btn btn-outline-inverse-info btn-lg">Export Hotel Information</a>
</div>

<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Address/Contact Information</div>

<div class="col-sm-12 col-md-12 col-lg-12 panel" style="display: block;">
<div class=" row">

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">

    <label>Hotel Group Name </label>
    <input name="grp_name" id="grp_name" type="text" class="form-control" data-error="#err_grp_name" value="{{$Hotels->grp_name}}">
    <span id="err_grp_name"></span>
    <span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>

</div>
</div>

<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">

    <label>Hotel Name </label>
    <input name="hotel_name" id="hotel_name" type="text" class="form-control" data-error="#err_hotel_name" value="{{$Hotels->hotel_name}}">
    <span id="err_hotel_name"></span>
    <span class="error">{{ ($errors->has('hotel_name')) ? $errors->first('hotel_name') : ''}}</span>

</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel ID </label>
    <input name="hotel_id" id="hotel_id" type="text" class="form-control" data-error="#err_hotel_id" value="{{$Hotels->hotel_id}}">
    <span id="err_hotel_id"></span>
    <span class="error">{{ ($errors->has('hotel_id')) ? $errors->first('hotel_id') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel Code </label>
    <input name="hotel_code" id="hotel_code" type="text" class="form-control" data-error="#err_hotel_code" value="{{$Hotels->hotel_code}}">
    <span id="err_hotel_code"></span>
    <span class="error">{{ ($errors->has('hotel_code')) ? $errors->first('hotel_code') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel PMS Code </label>
    <input name="pms_code" id="pms_code" type="text" class="form-control" data-error="#err_pms_code" value="{{$Hotels->pms_code}}">
    <span id="err_pms_code"></span>
    <span class="error">{{ ($errors->has('pms_code')) ? $errors->first('pms_code') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Hotel Short Name </label>
    <input name="hotel_short_name" id="hotel_short_name" type="text" class="form-control" data-error="#err_hotel_short_name" value="{{$Hotels->hotel_short_name}}">
    <span id="err_hotel_short_name"></span>
    <span class="error">{{ ($errors->has('hotel_short_name')) ? $errors->first('hotel_short_name') : ''}}</span>
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
    <input name="address_1" id="address_1" type="text" class="form-control" data-error="#err_address_1" value="@if($HodelAddress){{$HodelAddress->address_1}}@endif">
    <span id="err_address_1"></span>
    <span class="error">{{ ($errors->has('address_1')) ? $errors->first('address_1') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Address 2 </label>
    <input name="address_2" id="address_2" type="text" class="form-control" data-error="#err_address_2" value="@if($HodelAddress){{$HodelAddress->address_2}}@endif">
    <span id="err_address_2"></span>
    <span class="error">{{ ($errors->has('address_2')) ? $errors->first('address_2') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Address 3</label>
    <input name="address_3" id="address_3" type="text" class="form-control" data-error="#err_address_3" value="@if($HodelAddress){{$HodelAddress->address_3}}@endif">
    <span id="err_address_3"></span>
    <span class="error">{{ ($errors->has('address_3')) ? $errors->first('address_3') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Country </label>
    <br/>
    <select class="form-control airport_list10 required" name="country" id="country" data-error="#err_country">
        <option value="">Choose</option>
        @foreach($country as $cntry)
        <option value="{{$cntry->id}}" @if($HodelAddress) @if($cntry->id==$HodelAddress->country) selected="selected" @endif @endif>{{$cntry->name}}
        </option>
        @endforeach
    </select>
    <!-- <input name="country" id="country" type="text" class="form-control" data-error="#err_country" value="@if($HodelAddress){{$HodelAddress->country}}@endif"> -->
    <span id="err_country"></span>
    <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>State / Region </label>
    <select class="form-control airport_list11 required" name="state" id="state" data-error="#err_country">
        <option value="">Choose</option>
        @if($states) @foreach($states as $state)
        <option value="{{$state->id}}" @if($HodelAddress) @if($state->id==$HodelAddress->state) selected="selected" @endif @endif>{{$state->name}}
        </option>
        @endforeach @endif
    </select>
    <span id="err_state"></span>
    <span class="error">{{ ($errors->has('state')) ? $errors->first('state') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>City </label>
    <select class="form-control airport_list12 required" name="city" id="city" data-error="#err_city">
        <option value="">Choose</option>
        @if($cities) @foreach($cities as $city)
        <option value="{{$city->id}}" @if($HodelAddress) @if($city->id==$HodelAddress->city) selected="selected" @endif @endif>{{$city->name}}
        </option>
        @endforeach @endif
    </select>
    <span id="err_city"></span>
    <span class="error">{{ ($errors->has('city')) ? $errors->first('city') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Zip Code / Postal Code </label>
    <input name="zip_code" id="zip_code" type="text" class="form-control" data-error="#err_zip_code" value="@if($HodelAddress){{$HodelAddress->postcode}}@endif">
    <span id="err_zip_code"></span>
    <span class="error">{{ ($errors->has('zip_code')) ? $errors->first('zip_code') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Latitude </label>
    <input name="latitude" id="latitude" type="text" class="form-control" data-error="#err_latitude" value="@if($HodelAddress){{$HodelAddress->latitude}}@endif">
    <span id="err_latitude"></span>
    <span class="error">{{ ($errors->has('latitude')) ? $errors->first('latitude') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Longitude</label>
    <input name="longitude" id="longitude" type="text" class="form-control" data-error="#err_longitude" value="@if($HodelAddress){{$HodelAddress->longitude}}@endif">
    <span id=""></span>
    <span class="error">{{ ($errors->has('longitude')) ? $errors->first('longitude') : ''}}</span>
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
    <input name="main_phone" id="main_phone" type="text" class="form-control" data-error="#err_main_phone" value="@if($HotelMainContacts){{$HotelMainContacts->main_phone}}@endif">
    <span id="err_main_phone"></span>
    <span class="error">{{ ($errors->has('main_phone')) ? $errors->first('main_phone') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Second Phone </label>
    <input name="second_phone" id="second_phone" type="text" class="form-control" data-error="#err_second_phone" value="@if($HotelMainContacts){{$HotelMainContacts->second_phone}}@endif">
    <span id="err_second_phone"></span>
    <span class="error">{{ ($errors->has('second_phone')) ? $errors->first('second_phone') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Fax </label>
    <input name="fax" id="fax" type="text" class="form-control" data-error="#err_fax" value="@if($HotelMainContacts){{$HotelMainContacts->fax}}@endif">
    <span id="err_fax"></span>
    <span class="error">{{ ($errors->has('fax')) ? $errors->first('fax') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Email </label>
    <input name="email" id="email" type="text" class="form-control" data-error="#err_email" value="@if($HotelMainContacts){{$HotelMainContacts->email}}@endif">
    <span id="err_email"></span>
    <span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Website Url </label>
    <input name="url" id="url" type="text" class="form-control" data-error="#err_url" value="@if($HotelMainContacts){{$HotelMainContacts->url}}@endif">
    <span id="err_url"></span>
    <span class="error">{{ ($errors->has('url')) ? $errors->first('url') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Reservation Delivery Email Address</span></label>
    <input name="r_d_email" id="r_d_email" type="text" class="form-control" data-error="#err_r_d_email" value="@if($HotelMainContacts){{$HotelMainContacts->r_d_email}}@endif">
    <span iderr_r_d_email></span>
    <span class="error">{{ ($errors->has('r_d_email')) ? $errors->first('r_d_email') : ''}}</span>
</div>
</div>
<!-- <div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="col-sm-12" id="grp_sec"><label><span >Closest Airport</span></label><input name="grp_name" id="grp_name" type="text" class="form-control" data-error="#" >
<span id="" ></span>
<span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
</div>
</div>
</div> -->
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Reservation Delivery Email </label>
    <input name="reservation_email" id="reservation_email" type="text" class="form-control" data-error="#err_reservation_email" value="@if($HotelMainContacts){{$HotelMainContacts->reservation_email}}@endif">
    <span id="err_reservation_email"></span>
    <span class="error">{{ ($errors->has('reservation_email')) ? $errors->first('reservation_email') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Reservation Delivery CC Retrieval </label>
    <textarea name="cc_retrieval" id="cc_retrieval" type="text" class="form-control" data-error="#err_cc_retrieval">@if($HotelMainContacts){{$HotelMainContacts->cc_retrieval}}@endif</textarea>
    <span id="err_cc_retrieval"></span>
    <span class="error">{{ ($errors->has('cc_retrieval')) ? $errors->first('cc_retrieval') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Depleted Inventory Notification </label>
    <textarea name="inventory_notification" class="form-control" data-error="#err_inventory_notification">@if($HotelMainContacts){{$HotelMainContacts->inventory_notification}}@endif</textarea>
    <span id="err_inventory_notification"></span>
    <span class="error">{{ ($errors->has('inventory_notification')) ? $errors->first('inventory_notification') : ''}}</span>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Contact Person</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Title</label>
    <select name="c_title" id="c_title" class="form-control" data-error="#err_c_title">
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->c_title == 'Mr' ) selected="selected" @endif @endif>Mr</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->c_title == 'Mrs' ) selected="selected" @endif @endif>Mrs</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->c_title == 'Ms' ) selected="selected" @endif @endif>Ms</option>
    </select>
    <span id="err_c_title" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('c_title')) ? $errors->first('c_title') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>First Name</label>
    <input type="text" name="f_name" class="form-control" data-error="err_f_name" value="@if($HotelAdditionalContacts){{$HotelAdditionalContacts->f_name}}@endif">
    <span id="err_f_name" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('f_name')) ? $errors->first('f_name') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="l_name" id="l_name" class="form-control" data-error="err_l_name" value="@if($HotelAdditionalContacts){{$HotelAdditionalContacts->l_name}}@endif">
    <span id="err_l_name" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('l_name')) ? $errors->first('l_name') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Job Title</label>
    <input type="text" id="job_title" name="job_title" class="form-control" data-error="err_job_title" value="@if($HotelAdditionalContacts){{$HotelAdditionalContacts->job_title}}@endif">
    <span id="err_job_title" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('job_title')) ? $errors->first('job_title') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Email address</label>
    <input type="email" name="email_add" class="form-control" id="email_add" data-error="email_add" value="@if($HotelAdditionalContacts){{$HotelAdditionalContacts->email_add}}@endif">
    <span id="err_email_add" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('email_add')) ? $errors->first('email_add') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Contact Number</label>
    <input type="number" id="c_number" name="c_number" class="form-control" data-error="err_c_number" value="@if($HotelAdditionalContacts){{$HotelAdditionalContacts->c_number}}@endif" min="1">
    <span id="err_c_number" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('c_number')) ? $errors->first('c_number') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Mobile Number</label>
    <input type="number" name="m_number" class="form-control" id="m_number" data-error="err_m_number" value="@if($HotelAdditionalContacts){{$HotelAdditionalContacts->m_number}}@endif" min="1">
    <span id="err_m_number" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('m_number')) ? $errors->first('m_number') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Contact Purpose</label>
    <select class="form-control" data-error="err_cotact_purpose" name="cotact_purpose" id="cotact_purpose">
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->cotact_purpose == 'Main Contact' ) selected="selected" @endif @endif>Main Contact</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->cotact_purpose == 'Billing Contact' ) selected="selected" @endif @endif>Billing Contact</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->cotact_purpose == 'All Sales Contact' ) selected="selected" @endif @endif>All Sales Contact</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->cotact_purpose == 'MICE Contacts' ) selected="selected" @endif @endif>MICE Contacts</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->cotact_purpose == 'Corporate Contact' ) selected="selected" @endif @endif>Corporate Contact</option>
        <option @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->cotact_purpose == 'Leisure Contact' ) selected="selected" @endif @endif>Leisure Contact</option>
        <option></option>
    </select>
    <span id="err_cotact_purpose" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('cotact_purpose')) ? $errors->first('cotact_purpose') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label>Request for Portal Login Credentials</label>
    <input type="checkbox" name="login_req" class="form-control" value="Yes" id="login_req" data-error="err_login_req" @if($HotelAdditionalContacts) @if($HotelAdditionalContacts->login_req == 'Yes' ) checked="checked" @endif @endif>
    <span id="err_login_req" style="position: relative;
top: -2px;"></span>
    <span class="error">{{ ($errors->has('login_req')) ? $errors->first('login_req') : ''}}</span>
</div>
</div>
</div>
</div>
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
            @foreach($HotelAirportInfo as $HotelAirportInfos) @if($i
            <$total) <input type="hidden" value="{{$HotelAirportInfos->id}}" name="airport_id[]">
                <!-- <tr>
<td><input type="text" name="airport_name[]" class="form-control" value="{{$HotelAirportInfos->airport_code}}"></td>
<td><input type="text" name="airport_code[]" class="form-control"></td>
<td>                                                                
<table><tr><td><input type="text" name="airport_km[]" value="{{$HotelAirportInfos->airport_km}}" class="form-control"></td><td><input type="text" name="airport_miles[]" class="form-control" value="{{$HotelAirportInfos->airport_miles}}"></td></tr></table>
</td>
<td><a href="#"><i class="fa fa-remove"></i></a></td>
</tr> -->
                <tr id="airportinfo-form<?php echo $i;?>">
                    <td>
                        <select id="airportinfo_<?php echo $i;?>" name="airport_name[]" class="airport_list airport_list_btn form-control">
                            <option value="">Choose any one</option>
                            @foreach($Airports as $Airport)
                            <option value="{{$Airport->id}}" @if($HotelAirportInfos->airport_name == $Airport->id) selected="selected" @endif >{{$Airport->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" name="airport_code[]" id="airport_code_<?php echo $i;?>" class="form-control" value="{{$HotelAirportInfos->airport_code}}">
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="text" name="airport_km[]" class="form-control" value="{{$HotelAirportInfos->airport_km}}">
                                </td>
                                <td>
                                    <input type="text" name="airport_miles[]" class="form-control" value="{{$HotelAirportInfos->airport_miles}}">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <!-- <a href="#"><i class="fa fa-remove"></i></a> -->
                        <!-- <button id="cloneair" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button> -->
                    </td>
                </tr>
                @endif
                <?php $i++;?>
                    @endforeach @for($total;$total
                    <5;$total++) <tr id="airportinfo-form{{$total}}">
                        <td>
                            <select id="airportinfo_{{$total}}" name="airport_name[]" class="airport_list airport_list_btn form-control">
                                <option value="">Choose any one</option>
                                @foreach($Airports as $Airport)
                                <option value="{{$Airport->id}}">{{$Airport->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="airport_code[]" id="airport_code_{{$total}}" class="form-control">
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
                            <!-- <button id="cloneair" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button> -->
                        </td>
                        </tr>
                        @endfor
                        <!--  <tr id="airportinfo-form1">
<td>
<select id="airportinfo_1" name="airport_name[]" class="airport_list1 airport_list_btn form-control" >
<option value=" ">Choose any one</option>
@foreach($Airports as $Airport)     
<option value="{{$Airport->id}}">{{$Airport->name}}</option>
@endforeach
</select>
</td>
<td><input type="text" name="airport_code[]" id="airport_code_1" class="form-control"></td>
<td>                                                                
<table class="table"><tr><td><input type="text" name="airport_km[]" class="form-control"></td><td><input type="text" name="airport_miles[]" class="form-control"></td></tr></table>
</td>
<td>

</td>
</tr>

<tr id="airportinfo-form2">

<td>
<select id="airportinfo_2" name="airport_name[]" class="airport_list2 airport_list_btn form-control" >
<option value=" ">Choose any one</option>
@foreach($Airports as $Airport)     
<option value="{{$Airport->id}}">{{$Airport->name}}</option>
@endforeach
</select>
</td>
<td><input type="text" name="airport_code[]" id="airport_code_2" class="form-control"></td>
<td>                                                                
<table class="table"><tr><td><input type="text" name="airport_km[]" class="form-control"></td><td><input type="text" name="airport_miles[]" class="form-control"></td></tr></table>
</td>
<td>

</td>
</tr>

<tr id="airportinfo-form3">

<td>
<select id="airportinfo_3" name="airport_name[]" class="airport_list3 airport_list_btn form-control" >
<option value=" ">Choose any one</option>
@foreach($Airports as $Airport)     
<option value="{{$Airport->id}}">{{$Airport->name}}</option>
@endforeach
</select>
</td>
<td><input type="text" name="airport_code[]" id="airport_code_3" class="form-control"></td>
<td>                                                                
<table class="table"><tr><td><input type="text" name="airport_km[]" class="form-control"></td><td><input type="text" name="airport_miles[]" class="form-control"></td></tr></table>
</td>
<td>

</td>
</tr>

<tr id="airportinfo-form4">

<td>
<select id="airportinfo_4" name="airport_name[]" class="airport_list4 airport_list_btn form-control" >
<option value=" ">Choose any one</option>
@foreach($Airports as $Airport)     
<option value="{{$Airport->id}}">{{$Airport->name}}</option>
@endforeach
</select>
</td>
<td><input type="text" name="airport_code[]" id="airport_code_4" class="form-control"></td>
<td>                                                                
<table class="table"><tr><td><input type="text" name="airport_km[]" class="form-control"></td><td><input type="text" name="airport_miles[]" class="form-control"></td></tr></table>
</td>
<td>

</td>
</tr> -->
    </tbody>
</table>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Other details</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Default Currency</span> </label>
    <br/>
    <select class="form-control airport_list5" name="currency" id="currency" data-error="#err_currency">
        <option value="">Choose</option>
        @foreach($Currencylist as $Currency)
        <option value="{{$Currency->code}}" @if($HotelOtherInfo) @if($HotelOtherInfo->currency == $Currency->code ) selected="selected" @endif @endif>{{ $Currency->name }}</option>
        @endforeach
    </select>
    <span id="err_currency"></span>
    <span class="error">{{ ($errors->has('currency')) ? $errors->first('currency') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Time Zone Country</span></label>
    <br />
    <select class="form-control airport_list6" name="t_zone_country" id="t_zone_country" data-error="#err_t_zone_country">
        <option value="">Choose</option>
        @foreach($country as $cntry)
        <option value="{{$cntry->sortname}}" @if($HotelOtherInfo) @if($cntry->sortname==$HotelOtherInfo->t_zone_country) selected="selected" @endif @endif >{{$cntry->name}}
        </option>
        @endforeach
    </select>
    <span id="err_t_zone_country"></span>
    <span class="error">{{ ($errors->has('t_zone_country')) ? $errors->first('t_zone_country') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Time Zone Location</span></label>
    <?php /*<input name="t_zone_location" id="t_zone_location" type="text" class="form-control" data-error="#err_t_zone_location" value="@if($HotelOtherInfo){{$HotelOtherInfo->t_zone_location}}@endif">*/?>
        <br/>
        <select class="form-control airport_list7" name="t_zone_location" id="t_zone_location" data-error="#err_t_zone_location">
            <option value="">Choose</option>
            @foreach($Zone as $Timez)
            <option @if($HotelOtherInfo) @if($HotelOtherInfo->t_zone_location == $Timez->zone_id ) selected="selected" @endif @endif value="{{$Timez->zone_id}}">{{ $Timez->zone_name }}</option>
            @endforeach
        </select>
        <span id="err_t_zone_location"></span>
        <span class="error">{{ ($errors->has('t_zone_location')) ? $errors->first('t_zone_location') : ''}}</span>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
    <label><span>Time Zone Offset</span></label>
    <br />
    <select name="t_zone_offset" class="airport_list8 form-control" id="t_zone_offset" data-error="#err_t_zone_offset">
        <option value="">Choose</option>
        <?php if($HotelOtherInfo){?>
            <option value="{{$HotelOtherInfo->t_zone_offset}}">{{$HotelOtherInfo->t_zone_offset}}</option>
            <?php }?>
    </select>
    <span id="err_t_zone_offset"></span>
    <span class="error">{{ ($errors->has('t_zone_offset')) ? $errors->first('t_zone_offset') : ''}}</span>
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
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<h1>Property Info</h1>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 text-right">
<a href="{{ url('hotelier/export-property-info') }}/xlsx/{{$Hotels->id}}" class="btn-outline-inverse-info btn btn-lg">Export Property Info</a>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Property Attributes</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel" style="display: block;">
<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Type </label>
            <select class="form-control" name="property_type" id="property_type" data-error="#err_property_type">
                <option value="">-Select-</option>
                @foreach($CategoryPropertyType as $CategoryPropertyTypes)
                <option value="{{$CategoryPropertyTypes->short_name}}" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->property_type==$CategoryPropertyTypes->short_name) selected="selected" @endif @endif>{{$CategoryPropertyTypes->title}}</option>
                @endforeach
            </select>
            <span id="err_property_type"></span>
            <span class="error">{{ ($errors->has('property_type')) ? $errors->first('property_type') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Type2</label>
            <select class="form-control" name="property_type2" id="property_type2">
                <option value="">-Select-</option>
                @foreach($CategoryPropertyType as $CategoryPropertyTypes)
                <option value="{{$CategoryPropertyTypes->short_name}}" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->property_type2==$CategoryPropertyTypes->short_name) selected="selected" @endif @endif>{{$CategoryPropertyTypes->title}}</option>
                @endforeach
            </select>
            <span id=""></span>
            <span class="error">{{ ($errors->has('property_type2')) ? $errors->first('property_type2') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Type3</label>
            <select class="form-control" name="property_type3" id="property_type3">
                <option value="">-Select-</option>
                @foreach($CategoryPropertyType as $CategoryPropertyTypes)
                <option value="{{$CategoryPropertyTypes->short_name}}" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->property_type3==$CategoryPropertyTypes->short_name) selected="selected" @endif @endif>{{$CategoryPropertyTypes->title}}</option>
                @endforeach
            </select>
            <span id=""></span>
            <span class="error">{{ ($errors->has('property_type3')) ? $errors->first('property_type3') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Location Type </label>
            <select class="form-control" name="location_type" id="location_type" data-error="err_location_type">
                <option value="">
                    ---Choose---
                </option>
                <option value="Regional Office" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->location_type=="Regional Office") selected @endif @endif>Regional Office</option>
                <option value="Country Office" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->location_type=="Country Office") selected @endif @endif >Country Office</option>
                <option value="State Office" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->location_type=="State Office") selected @endif @endif >State Office</option>
                <!--  @foreach($CategoryLocationType as $CategoryLocationTypes)
<option value="{{$CategoryLocationTypes->short_name}}" @if($HotelPropertyAttributes)  @if($HotelPropertyAttributes->location_type==$CategoryLocationTypes->short_name) selected="selected" @endif @endif>{{$CategoryLocationTypes->title}}</option>
          @endforeach -->
            </select>
            <span id="err_location_type"></span>
            <span class="error">{{ ($errors->has('location_type')) ? $errors->first('location_type') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Alerts Email Address </label>
            <input name="alert_email" id="alert_email" type="text" class="form-control" data-error="#err_alert_email" value="@if($HotelPropertyAttributes) {{$HotelPropertyAttributes->alert_email}} @endif">
            <span id="err_alert_email"></span>
            <span class="error">{{ ($errors->has('alert_email')) ? $errors->first('alert_email') : ''}}</span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Property Email From Address</label>
            <input name="property_email" id="property_email" type="text" class="form-control" data-error="#err_property_email" value="@if($HotelPropertyAttributes) {{$HotelPropertyAttributes->property_email}} @endif">
            <span id="err_property_email"></span>
            <span class="error">{{ ($errors->has('property_email')) ? $errors->first('property_email') : ''}}</span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Guest Email From Address</label>
            <input name="guest_email" id="guest_email" type="text" class="form-control" data-error="#err_guest_email" value="@if($HotelPropertyAttributes) {{$HotelPropertyAttributes->guest_email}} @endif">
            <span id="err_guest_email"></span>
            <span class="error">{{ ($errors->has('guest_email')) ? $errors->first('guest_email') : ''}}</span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Res Delivery Email Address</label>
            <input name="res_del_email" id="res_del_email" type="text" class="form-control" data-error="#err_res_del_email" value="@if($HotelPropertyAttributes) {{$HotelPropertyAttributes->res_del_email}} @endif">
            <span id="err_res_del_email"></span>
            <span class="error">{{ ($errors->has('res_del_email')) ? $errors->first('res_del_email') : ''}}</span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Res Delivery Fax Number</label>
            <input name="res_del_fax" id="res_del_fax" type="text" class="form-control" data-error="#err_res_del_fax" value="@if($HotelPropertyAttributes) {{$HotelPropertyAttributes->res_del_fax}} @endif">
            <span id="err_res_del_fax"></span>
            <span class="error">{{ ($errors->has('res_del_fax')) ? $errors->first('res_del_fax') : ''}}</span>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">

            <label>Hotel Uses Promotional Pricing </label>
            <input name="price" id="price" type="checkbox" class="form-control" value="true" @if($HotelPropertyAttributes) @if($HotelPropertyAttributes->price=='true') selected @endif @endif">
            <!-- <span id="err_price" ></span> -->
            <span class="error">{{ ($errors->has('price')) ? $errors->first('price') : ''}}</span>

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
            <textarea name="area_attractions" id="area_attractions" data-error="#err_area_attractions" class="form-control">@if($HotelAreaInfo) {{$HotelAreaInfo->area_attractions}} @endif</textarea>
            <span id="err_area_attractions"></span>
            <span class="error">{{ ($errors->has('area_attractions')) ? $errors->first('area_attractions') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Corporate Locations</label>
            <textarea name="corporate_locations" id="corporate_locations" data-error="#err_corporate_locations" class="form-control">@if($HotelAreaInfo) {{$HotelAreaInfo->corporate_locations}} @endif</textarea>
            <span id="err_corporate_locations"></span>
            <span class="error">{{ ($errors->has('corporate_locations')) ? $errors->first('corporate_locations') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Hotel Location Description</label>
            <textarea name="h_loc_desc" id="h_loc_desc" class="form-control" data-error="#err_h_loc_desc">@if($HotelAreaInfo) {{$HotelAreaInfo->h_loc_desc}} @endif</textarea>
            <span id="err_h_loc_desc"></span>
            <span class="error">{{ ($errors->has('h_loc_desc')) ? $errors->first('h_loc_desc') : ''}}</span>
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
            <span class="error">{{ ($errors->has('dinning')) ? $errors->first('dinning') : ''}}</span>
        </div>
        <div class="form-group">
            <label>Meal Plan</label>
            <select name="meal_plan" id="meal_plan" class="form-control" data-error="#err_meal_plan">
                <option value="">Select</option>
                @foreach($CategoryMealPlan as $CategoryMealPlans)
                <option value="{{$CategoryMealPlans->title}}">{{$CategoryMealPlans->title}}</option>
                @endforeach
            </select>
            <span id="err_meal_plan" class="error"></span>
            <span class="error">{{ ($errors->has('meal_plan')) ? $errors->first('meal_plan') : ''}}</span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="res_description" id="res_description" data-error="#err_res_description" class="form-control"></textarea>
            <span id="err_res_description" class="error"></span>
            <span class="error">{{ ($errors->has('res_description')) ? $errors->first('res_description') : ''}}</span>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" value="true" name="res_breakfast">
            </label> Breakfast
            <label>
                <input type="checkbox" value="true" name="res_lunch">
            </label> Lunch
            <label>
                <input type="checkbox" value="true" name="res_dinner">
            </label> Dinner
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
                                                <span class="error">{{ ($errors->has('res_open_monday')) ? $errors->first('res_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_monday')) ? $errors->first('res_close_monday') : ''}}</span>
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
                                                <input type="text" name="res_open_tuesday[]" class="form-control timepicker" value="@if($HotelDiningEntertainmentResOpenTime) {{$HotelDiningEntertainmentResOpenTime->res_open_tuesday}} @endif">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_open_monday')) ? $errors->first('res_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_monday')) ? $errors->first('res_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_wednesday')) ? $errors->first('res_open_wednesday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_wednesday')) ? $errors->first('res_close_wednesday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_thursday')) ? $errors->first('res_open_thursday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_thursday')) ? $errors->first('res_close_thursday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_friday')) ? $errors->first('res_open_friday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_friday')) ? $errors->first('res_close_friday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_saturday')) ? $errors->first('res_open_saturday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_saturday')) ? $errors->first('res_close_saturday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_sunday')) ? $errors->first('res_open_sunday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="res_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('res_close_sunday')) ? $errors->first('res_close_sunday') : ''}}</span>
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
    @foreach($HotelDiningEntertainmentRestaurant as $HotelDERes)
    <!--Start Edit Restaurant Start-->
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 " style="background: #ccc; padding: 15px;">
        <h4>Edit Restaurant ( {{$HotelDERes->title}} )</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <div class="alert alert-success resturant-status hidden"></div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="dinning{{$HotelDERes->id}}" id="dinning{{$HotelDERes->id}}" data-error="#err_dinning" class="form-control" value="{{$HotelDERes->title}}">
            <span id="err_dinning" class="error"></span>
            <span class="error">{{ ($errors->has('dinning')) ? $errors->first('dinning') : ''}}</span>
        </div>
        <div class="form-group">
            <label>Meal Plan</label>
            <select name="meal_plan{{$HotelDERes->id}}" id="meal_plan{{$HotelDERes->id}}" class="form-control" data-error="#err_meal_plan">
                <option value="">Select</option>
                @foreach($CategoryMealPlan as $CategoryMealPlans)
                <option value="{{$CategoryMealPlans->title}}" @if($HotelDERes->meal_plan == $CategoryMealPlans->title) selected="selected" @endif >{{$CategoryMealPlans->title}}</option>
                @endforeach
            </select>
            <span id="err_meal_plan" class="error"></span>
            <span class="error">{{ ($errors->has('meal_plan')) ? $errors->first('meal_plan') : ''}}</span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="res_description{{$HotelDERes->id}}" id="res_description{{$HotelDERes->id}}" data-error="#err_res_description" class="form-control">{{$HotelDERes->res_description}}</textarea>
            <span id="err_res_description" class="error"></span>
            <span class="error">{{ ($errors->has('res_description')) ? $errors->first('res_description') : ''}}</span>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" value="true" name="res_breakfast{{$HotelDERes->id}}" id="res_breakfast{{$HotelDERes->id}}" @if($HotelDERes->res_breakfast=='true') checked="checked" @endif></label> Breakfast
            <label>
                <input type="checkbox" value="true" name="res_lunch{{$HotelDERes->id}}" id="res_lunch{{$HotelDERes->id}}" @if($HotelDERes->res_lunch=='true') checked="checked" @endif></label> Lunch
            <label>
                <input type="checkbox" value="true" name="res_dinner{{$HotelDERes->id}}" id="res_dinner{{$HotelDERes->id}}" @if($HotelDERes->res_dinner=='true') checked="checked" @endif></label> Dinner
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
                            @forelse($HotelDERes->getResTime() as $HotelDEResTime)
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicmonhourlist">
                                        <?php 
$break_close_monday=explode(',', $HotelDEResTime->break_close_monday);
$i = 0;?>
                                            @foreach(explode(',',$HotelDEResTime->break_open_monday) as $break_open_monday)
                                            <tr id="editpublicmonhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_monday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_monday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_monday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_monday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEResTime->break_open_tuesday) as $break_open_tuesday)
                                            <tr id="editpublictuesdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="break_open_tuesday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_tuesday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_tuesday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_tuesday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEResTime->break_open_wednesday) as $break_open_wednesday)
                                            <tr id="editpublicwednesdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="break_open_wednesday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_wednesday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_wednesday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_wednesday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEResTime->break_open_thursday) as $break_open_thursday)
                                            <tr id="ediypublicthursdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="break_open_thursday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_thursday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_thursday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_thursday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEResTime->break_open_friday) as $break_open_friday)
                                            <tr id="editpublicfridayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="break_open_friday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_friday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_friday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_friday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEResTime->break_open_saturday) as $break_open_saturday)
                                            <tr id="editpublicsaturdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="break_open_saturday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_saturday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_saturday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_saturday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEResTime->break_open_sunday) as $break_open_sunday)
                                            <tr id="editpublicsundayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="break_open_sunday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_open_sunday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="break_close_sunday{{$HotelDERes->id}}[]" class="form-control timepicker" value="{{$break_close_sunday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
                                    </table>
                                </div>
                            </div>
                            @empty
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
                                                <span class="error">{{ ($errors->has('break_open_monday')) ? $errors->first('break_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_monday')) ? $errors->first('break_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('break_open_tuesday')) ? $errors->first('break_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_tuesday')) ? $errors->first('public_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('break_open_wednesday')) ? $errors->first('public_open_wednesday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_wednesday')) ? $errors->first('break_close_wednesday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('break_open_thursday')) ? $errors->first('break_open_thursday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_thursday')) ? $errors->first('break_close_thursday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('break_open_friday')) ? $errors->first('break_open_friday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_friday')) ? $errors->first('break_close_friday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('break_open_saturday')) ? $errors->first('break_open_saturday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_saturday')) ? $errors->first('break_close_saturday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_sunday')) ? $errors->first('public_open_sunday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="break_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('break_close_sunday')) ? $errors->first('break_close_sunday') : ''}}</span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 offset-10 ">
       <!--  <a href="javascript:void(0);" id="updateRestaurant" class="btn btn-primary btn-lg">Update Restaurant</a> -->
       <input type="button" name="updateRestaurant" id="{{$HotelDERes->id}}" class="btn btn-primary btn-lg updateRestaurant" value="Update Restaurant" placeholder="Update Restaurant">
    </div>
    <!--End Edit Restaurant Start-->
    @endforeach
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
            <span class="error">{{ ($errors->has('bar_name')) ? $errors->first('bar_name') : ''}}</span>
        </div>
        <div class="form-group">
            <label>Tick if the bar child friendly</label>
            <input type="checkbox" value="true" name="child_friendly">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="bar_description" id="bar_description" class="form-control" data-error="#err_bar_description"></textarea>
            <span id="err_bar_description" class="error"></span>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="bar_public" value="true">
            </label>Public
            <label>
                <input type="checkbox" name="bar_guest" value="true">
            </label>In House Guest
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
                                                <span class="error">{{ ($errors->has('public_open_monday')) ? $errors->first('public_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_monday')) ? $errors->first('public_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_tuesday')) ? $errors->first('public_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_tuesday')) ? $errors->first('public_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_wednesday')) ? $errors->first('public_open_wednesday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_wednesday')) ? $errors->first('public_close_wednesday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_thursday')) ? $errors->first('public_open_thursday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_thursday')) ? $errors->first('public_close_thursday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_friday')) ? $errors->first('public_open_friday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_friday')) ? $errors->first('public_close_friday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_saturday')) ? $errors->first('public_open_saturday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_saturday')) ? $errors->first('public_close_saturday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_sunday')) ? $errors->first('public_open_sunday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_sunday')) ? $errors->first('public_close_sunday') : ''}}</span>
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
    @foreach($HotelDiningEntertainmentBar as $HotelDEBar)
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15" style="background: #ccc; padding: 15px;">
        <h4>Edit Bar {{ $HotelDEBar->bar_name }}</h4>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
        <div class="alert alert-success bar-status hidden"></div>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="form-group">
            <label>Name</label>
            <input name="bar_name" id="bar_name" data-error="#err_bar_name" class="form-control " value="{{ $HotelDEBar->bar_name }}">
        </div>
        <div class="form-group">
            <label>Tick if the bar child friendly</label>
            <input type="checkbox" value="true" name="child_friendly" @if($HotelDEBar->child_friendly=='true') checked="checked" @endif>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="bar_description" id="bar_description" class="form-control" data-error="#err_bar_description">{{ $HotelDEBar->bar_description }}</textarea>
            <span id="err_bar_description" class="error"></span>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="bar_public" value="true" @if($HotelDEBar->bar_public=='true') checked="checked" @endif></label>Public
            <label>
                <input type="checkbox" name="bar_guest" value="true" @if($HotelDEBar->bar_guest=='true') checked="checked" @endif></label>In House Guest
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
                            @forelse($HotelDEBar->getBarTime() as $HotelDEBarTime)
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                Monday
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <div class="form-group">
                                    <table class="table borderless" id="editpublicmonhourlist">
                                        <?php 
$public_close_monday=explode(',', $HotelDEBarTime->public_close_monday);
$i = 0;?>
                                            @foreach(explode(',',$HotelDEBarTime->public_open_monday) as $public_open_monday)
                                            <tr id="editpublicmonhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_monday[]" class="form-control timepicker" value="{{$public_open_monday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_monday[]" class="form-control timepicker" value="{{$public_close_monday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublicmonhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEBarTime->public_open_tuesday) as $public_open_tuesday)
                                            <tr id="editpublictuesdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_tuesday[]" class="form-control timepicker" value="{{$public_open_tuesday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_tuesday[]" class="form-control timepicker" value="{{$public_close_tuesday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="cloneeditpublictuesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEBarTime->public_open_wednesday) as $public_open_wednesday)
                                            <tr id="editpublicwednesdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_wednesday[]" class="form-control timepicker" value="{{$public_open_wednesday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_wednesday[]" class="form-control timepicker" value="{{$public_close_wednesday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonepublicwednesdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEBarTime->public_open_thursday) as $public_open_thursday)
                                            <tr id="ediypublicthursdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_thursday[]" class="form-control timepicker" value="{{$public_open_thursday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_thursday[]" class="form-control timepicker" value="{{$public_close_thursday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicthursdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEBarTime->public_open_friday) as $public_open_friday)
                                            <tr id="editpublicfridayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_friday[]" class="form-control timepicker" value="{{$public_open_friday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_friday[]" class="form-control timepicker" value="{{$public_close_friday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicfridayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEBarTime->public_open_saturday) as $public_open_saturday)
                                            <tr id="editpublicsaturdayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_saturday[]" class="form-control timepicker" value="{{$public_open_saturday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_saturday[]" class="form-control timepicker" value="{{$public_close_saturday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsaturdayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
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
                                            @foreach(explode(',',$HotelDEBarTime->public_open_sunday) as $public_open_sunday)
                                            <tr id="editpublicsundayhour{{$i}}">
                                                <td>
                                                    <input type="text" name="public_open_sunday[]" class="form-control timepicker" value="{{$public_open_sunday}}">
                                                </td>
                                                <td>
                                                    <input type="text" name="public_close_sunday[]" class="form-control timepicker" value="{{$public_close_sunday[$i]}}">
                                                </td>
                                                <td>
                                                    <button id="clonethursdaypublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                                @endforeach
                                    </table>
                                </div>
                            </div>
                            @empty
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
                                                <span class="error">{{ ($errors->has('public_open_monday')) ? $errors->first('public_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_monday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_monday')) ? $errors->first('public_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_tuesday')) ? $errors->first('public_open_monday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_tuesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_tuesday')) ? $errors->first('public_close_monday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_wednesday')) ? $errors->first('public_open_wednesday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_wednesday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_wednesday')) ? $errors->first('public_close_wednesday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_thursday')) ? $errors->first('public_open_thursday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_thursday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_thursday')) ? $errors->first('public_close_thursday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_friday')) ? $errors->first('public_open_friday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_friday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_friday')) ? $errors->first('public_close_friday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('public_open_saturday')) ? $errors->first('public_open_saturday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_saturday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_saturday')) ? $errors->first('public_close_saturday') : ''}}</span>
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
                                                <span class="error">{{ ($errors->has('res_open_sunday')) ? $errors->first('public_open_sunday') : ''}}</span>
                                            </td>
                                            <td>
                                                <input type="text" name="public_close_sunday[]" class="form-control timepicker">
                                                <span id="" style="position: relative;
  top: -2px;"></span>
                                                <span class="error">{{ ($errors->has('public_close_sunday')) ? $errors->first('public_close_sunday') : ''}}</span>
                                            </td>
                                            <td>
                                                <button id="clonepublicsundayhour" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mtb-15 text-right"><a href="javascript:void(0);" id="Update-Bar" class="btn-primary btn btn-lg">Update</a></div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Entertainment</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Off Site Entertainment</label>
            <textarea name="off_site_entertainment" id="off_site_entertainment" data-error="#err_off_site_entertainment" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->off_site_entertainment}} @endif</textarea>
            <span id="err_off_site_entertainment"></span>
            <span class="error">{{ ($errors->has('off_site_entertainment')) ? $errors->first('off_site_entertainment') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Off Site Restaurants</label>
            <textarea name="off_site_restaurants" id="off_site_restaurants" data-error="#err_off_site_restaurants" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->off_site_restaurants}} @endif</textarea>
            <span id="err_off_site_restaurants"></span>
            <span class="error">{{ ($errors->has('off_site_restaurants')) ? $errors->first('off_site_restaurants') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>On Site Entertainment</label>
            <textarea name="on_site_entertainment" id="on_site_entertainment" data-error="#err_on_site_entertainment" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->on_site_entertainment}} @endif</textarea>
            <span id="err_on_site_entertainment"></span>
            <span class="error">{{ ($errors->has('on_site_entertainment')) ? $errors->first('on_site_entertainment') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Special Events</label>
            <textarea name="special_events" id="special_events" data-error="#err_special_events" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->special_events}} @endif</textarea>
            <span id="err_special_events"></span>
            <span class="error">{{ ($errors->has('special_events')) ? $errors->first('special_events') : ''}}</span>
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
            <textarea name="weddings" id="weddings" data-error="#err_weddings" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->weddings}} @endif</textarea>
            <span id="err_weddings"></span>
            <span class="error">{{ ($errors->has('weddings')) ? $errors->first('weddings') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Alternate Hotels</label>
            <textarea name="alternate_hotels" id="alternate_hotels" data-error="#err_alternate_hotels" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->alternate_hotels}} @endif</textarea>
            <span id="err_alternate_hotels"></span>
            <span class="error">{{ ($errors->has('alternate_hotels')) ? $errors->first('alternate_hotels') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>AWARDS</label>
            <textarea name="awards" id="awards" data-error="#awards" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->awards}} @endif</textarea>
            <span id="err_awards"></span>
            <span class="error">{{ ($errors->has('awards')) ? $errors->first('awards') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Frequent Guest Information</label>
            <textarea name="frequent_guest_information" id="frequent_guest_information" data-error="#err_special_events" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->frequent_guest_information}} @endif</textarea>
            <span id="err_frequent_guest_information"></span>
            <span class="error">{{ ($errors->has('frequent_guest_information')) ? $errors->first('frequent_guest_information') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>GDS Data</label>
            <textarea name="gds_data" id="gds_data" data-error="#err_gds_data" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->gds_data}} @endif</textarea>
            <span id="err_gds_data"></span>
            <span class="error">{{ ($errors->has('gds_data')) ? $errors->first('gds_data') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Handicap Facilities</label>
            <textarea name="handicap_facilities" id="handicap_facilities" data-error="#err_handicap_facilities" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->handicap_facilities}} @endif</textarea>
            <span id="err_handicap_facilities"></span>
            <span class="error">{{ ($errors->has('handicap_facilities')) ? $errors->first('handicap_facilities') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Key Selling Points</label>
            <textarea name="key_selling_points" id="key_selling_points" data-error="#err_key_selling_points" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->key_selling_points}} @endif</textarea>
            <span id="err_key_selling_points"></span>
            <span class="error">{{ ($errors->has('key_selling_points')) ? $errors->first('key_selling_points') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Miscellaneous</label>
            <textarea name="miscellaneous" id="miscellaneous" data-error="#err_miscellaneous" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->miscellaneous}} @endif</textarea>
            <span id="err_miscellaneous"></span>
            <span class="error">{{ ($errors->has('miscellaneous')) ? $errors->first('miscellaneous') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Safety</label>
            <textarea name="safety" id="safety" data-error="#err_safety" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->safety}} @endif</textarea>
            <span id="err_safety"></span>
            <span class="error">{{ ($errors->has('safety')) ? $errors->first('safety') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tour Operators</label>
            <textarea name="tour_operators" id="tour_operators" data-error="#err_tour_operators" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->tour_operators}} @endif</textarea>
            <span id="err_tour_operators"></span>
            <span class="error">{{ ($errors->has('tour_operators')) ? $errors->first('tour_operators') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Travel Agent Commission</label>
            <textarea name="travel_agent_commission" id="travel_agent_commission" data-error="#err_travel_agent_commission" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->travel_agent_commission}} @endif</textarea>
            <span id="err_travel_agent_commission"></span>
            <span class="error">{{ ($errors->has('travel_agent_commission')) ? $errors->first('travel_agent_commission') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Chef</label>
            <textarea name="chef" id="chef" data-error="#err_chef" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->chef}} @endif</textarea>
            <span id="err_chef"></span>
            <span class="error">{{ ($errors->has('chef')) ? $errors->first('chef') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Director Of Sales and Management</label>
            <textarea name="director_of_sales_and_management" id="director_of_sales_and_management" data-error="#err_director_of_sales_and_management" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->director_of_sales_and_management}} @endif</textarea>
            <span id="err_director_of_sales_and_management"></span>
            <span class="error">{{ ($errors->has('director_of_sales_and_management')) ? $errors->first('director_of_sales_and_management') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>F&B Director</label>
            <textarea name="fb_director" id="fb_director" data-error="#err_fb_director" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->fb_director}} @endif</textarea>
            <span id="err_fb_director"></span>
            <span class="error">{{ ($errors->has('fb_director')) ? $errors->first('fb_director') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>General Manager</label>
            <textarea name="general_manager" id="general_manager" data-error="#err_general_manager" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->general_manager}} @endif</textarea>
            <span id="err_general_manager"></span>
            <span class="error">{{ ($errors->has('general_manager')) ? $errors->first('general_manager') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Managing Director</label>
            <textarea name="managing_director" id="managing_director" data-error="#err_managing_director" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->managing_director}} @endif</textarea>
            <span id="err_managing_director"></span>
            <span class="error">{{ ($errors->has('managing_director')) ? $errors->first('managing_director') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Reservations Manager</label>
            <textarea name="reservations_manager" id="reservations_manager" data-error="#err_reservations_manager" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->reservations_manager}} @endif</textarea>
            <span id="err_reservations_manager"></span>
            <span class="error">{{ ($errors->has('reservations_manager')) ? $errors->first('reservations_manager') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Rooms Division</label>
            <textarea name="rooms_division" id="rooms_division" data-error="#err_rooms_division" class="form-control">@if($HotelMealPlan) {{$HotelMealPlan->rooms_division}} @endif</textarea>
            <span id="err_rooms_division"></span>
            <span class="error">{{ ($errors->has('rooms_division')) ? $errors->first('rooms_division') : ''}}</span>
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
            <textarea name="cancellation_policy" id="cancellation_policy" data-error="#err_cancellation_policy" class="form-control">@if($HotelPolices) {{$HotelPolices->cancellation_policy}} @endif</textarea>
            <span id="err_cancellation_policy"></span>
            <span class="error">{{ ($errors->has('cancellation_policy')) ? $errors->first('cancellation_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extended Stay</label>
            <textarea name="extended_stay_policy" id="extended_stay_policy" data-error="#err_extended_stay_policy" class="form-control">@if($HotelPolices) {{$HotelPolices->extended_stay_policy}} @endif</textarea>
            <span id="err_extended_stay_policy"></span>
            <span class="error">{{ ($errors->has('extended_stay_policy')) ? $errors->first('extended_stay_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extra Charges</label>
            <textarea name="extra_charge_policy" id="extra_charge_policy" data-error="#err_extra_charge_policy" class="form-control">@if($HotelPolices) {{$HotelPolices->extra_charge_policy}} @endif</textarea>
            <span id="err_extra_charge_policy"></span>
            <span class="error">{{ ($errors->has('extra_charge_policy')) ? $errors->first('extra_charge_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Family Plan</label>
            <textarea name="family_plan_policy" id="family_plan_policy" class="form-control" data-error="#err_family_plan_policy">@if($HotelPolices) {{$HotelPolices->family_plan_policy}} @endif</textarea>
            <span id="err_family_plan_policy"></span>
            <span class="error">{{ ($errors->has('family_plan_policy')) ? $errors->first('family_plan_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>General Policies</label>
            <textarea name="general_policy" id="general_policy" data-error="#err_general_policy" class="form-control">@if($HotelPolices) {{$HotelPolices->general_policy}} @endif</textarea>
            <span id="err_general_policy"></span>
            <span class="error">{{ ($errors->has('general_policy')) ? $errors->first('general_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Group Policy</label>
            <textarea name="group_policy" id="group_policy" data-error="err_group_policy" class="form-control">@if($HotelPolices) {{$HotelPolices->group_policy}} @endif</textarea>
            <span id="err_group_policy"></span>
            <span class="error">{{ ($errors->has('group_policy')) ? $errors->first('group_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Guarantee/Deposit</label>
            <textarea name="guarantee_policy" id="guarantee_policy" class="form-control" data-error="#err_guarantee_policy">@if($HotelPolices) {{$HotelPolices->guarantee_policy}} @endif</textarea>
            <span id="err_guarantee_policy"></span>
            <span class="error">{{ ($errors->has('guarantee_policy')) ? $errors->first('guarantee_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pet Policy</label>
            <textarea name="pet_policy" id="pet_policy" class="form-control" data-error="#err_pet_policy">@if($HotelPolices) {{$HotelPolices->pet_policy}} @endif</textarea>
            <span id="err_pet_policy"></span>
            <span class="error">{{ ($errors->has('pet_policy')) ? $errors->first('pet_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Taxes</label>
            <textarea name="taxs_policy" id="taxs_policy" class="form-control" data-error="#err_taxs_policy">@if($HotelPolices) {{$HotelPolices->taxs_policy}} @endif</textarea>
            <span id="err_taxs_policy"></span>
            <span class="error">{{ ($errors->has('taxs_policy')) ? $errors->first('taxs_policy') : ''}}</span>
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
            <input type="text" name="check_in_hour" id="check_in_hour" value="@if($HotelLocalPolices) {{$HotelLocalPolices->check_in_hour}} @endif" class="form-control">
            <span id="err_check_in_hour" data-error="#err_check_in_hour"></span>
            <span class="error">{{ ($errors->has('check_in_hour')) ? $errors->first('check_in_hour') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check In Minute</label>
            <input type="text" name="check_in_minute" id="check_in_minute" value="@if($HotelLocalPolices) {{$HotelLocalPolices->check_in_minute}} @endif" class="form-control" data-error="#err_check_in_minute">
            <span id="err_check_in_minute"></span>
            <span class="error">{{ ($errors->has('check_in_minute')) ? $errors->first('check_in_minute') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check Out Hour</label>
            <input type="text" name="check_out_hour" id="check_out_hour" value="@if($HotelLocalPolices) {{$HotelLocalPolices->check_out_hour}} @endif" class="form-control" data-error="#err_check_out_hour">
            <span id="err_check_out_hour"></span>
            <span class="error">{{ ($errors->has('check_out_hour')) ? $errors->first('check_out_hour') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Check Out Minute</label>
            <input type="text" name="check_out_minute" id="check_out_minute" value="@if($HotelLocalPolices) {{$HotelLocalPolices->check_out_minute}} @endif" class="form-control" data-error="#err_check_out_minute">
            <span id="err_check_out_minute"></span>
            <span class="error">{{ ($errors->has('check_out_minute')) ? $errors->first('check_out_minute') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extra Person Fee</label>
            <input type="text" name="extra_person_fee" id="extra_person_fee" value="@if($HotelLocalPolices) {{$HotelLocalPolices->extra_person_fee}} @endif" class="form-control" data-error="#err_extra_person_fee">
            <span id="err_extra_person_fee"></span>
            <span class="error">{{ ($errors->has('extra_person_fee')) ? $errors->first('extra_person_fee') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Extra Child Fee</label>
            <input type="text" name="extra_child_fee" id="extra_child_fee" value="@if($HotelLocalPolices) {{$HotelLocalPolices->extra_child_fee}} @endif" class="form-control" data-error="#err_extra_child_fee">
            <span id="err_extra_child_fee"></span>
            <span class="error">{{ ($errors->has('extra_child_fee')) ? $errors->first('extra_child_fee') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Crib Charge</label>
            <input type="text" name="crib_charge" id="crib_charge" value="@if($HotelLocalPolices) {{$HotelLocalPolices->crib_charge}} @endif" class="form-control" data-error="#err_crib_charge">
            <span id="err_crib_charge"></span>
            <span class="error">{{ ($errors->has('crib_charge')) ? $errors->first('crib_charge') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Adults-only Hotel/No Kids Allowed</label>
            <input type="checkbox" value="true" name="adults_only_hotel_no_kids_allowed" @if($HotelLocalPolices) @if($HotelLocalPolices->adults_only_hotel_no_kids_allowed=='true') checked="checked" @endif @endif class="form-control">
            <span id="err_adults_only_hotel_no_kids_allowed"></span>
            <span class="error">{{ ($errors->has('adults_only_hotel_no_kids_allowed')) ? $errors->first('adults_only_hotel_no_kids_allowed') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Kids Stay Free</label>
            <input type="checkbox" value="true" name="kids_stay_free" @if($HotelLocalPolices) @if($HotelLocalPolices->kids_stay_free=='true') checked="checked" @endif @endif class="form-control">
            <span id="err_kids_stay_free"></span>
            <span class="error">{{ ($errors->has('kids_stay_free')) ? $errors->first('kids_stay_free') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Early Checkout</label>
            <textarea name="early_checkout" id="early_checkout" data-error="err_early_checkout" class="form-control">@if($HotelLocalPolices) {{$HotelLocalPolices->early_checkout}} @endif</textarea>
            <span id="err_early_checkout"></span>
            <span class="error">{{ ($errors->has('early_checkout')) ? $errors->first('early_checkout') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Late Checkout</label>
            <textarea name="late_checkout" id="late_checkout" data-error="err_late_checkout" class="form-control">@if($HotelLocalPolices) {{$HotelLocalPolices->late_checkout}} @endif</textarea>
            <span id="err_late_checkout"></span>
            <span class="error">{{ ($errors->has('late_checkout')) ? $errors->first('late_checkout') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pet Policy</label>
            <textarea name="pet_policy" id="pet_policy" data-error="err_pet_policy" class="form-control">@if($HotelLocalPolices) {{$HotelLocalPolices->pet_policy}} @endif</textarea>
            <span id="err_pet_policy"></span>
            <span class="error">{{ ($errors->has('pet_policy')) ? $errors->first('pet_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pets Allowed</label>
            <input type="checkbox" value="TRUE" name="pets_allowed" @if($HotelLocalPolices) @if($HotelLocalPolices->pets_allowed=='TRUE') checked="checked" @endif @endif class="form-control">
            <span id="err_pets_allowed"></span>
            <span class="error">{{ ($errors->has('pets_allowed')) ? $errors->first('pets_allowed') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pets Free</label>
            <input type="checkbox" value="TRUE" name="Pets_free" @if($HotelLocalPolices) @if($HotelLocalPolices->Pets_free=='TRUE') checked="checked" @endif @endif class="form-control">
            <span id="err_Pets_free"></span>
            <span class="error">{{ ($errors->has('Pets_free')) ? $errors->first('Pets_free') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Family Policy</label>
            <textarea name="family_policy" id="family_policy" data-error="err_family_policy" class="form-control">@if($HotelLocalPolices) {{$HotelLocalPolices->family_policy}} @endif</textarea>
            <span id="err_family_policy"></span>
            <span class="error">{{ ($errors->has('family_policy')) ? $errors->first('family_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Commission Policy</label>
            <textarea name="commission_policy" id="commission_policy" class="form-control" data-error="#err_commission_policy">@if($HotelLocalPolices) {{$HotelLocalPolices->commission_policy}} @endif</textarea>
            <span id="err_commission_policy"></span>
            <span class="error">{{ ($errors->has('commission_policy')) ? $errors->first('commission_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Commission Percentage</label>
            <input type="text" name="commission_percentage" id="commission_percentage" value="@if($HotelLocalPolices) {{$HotelLocalPolices->commission_percentage}} @endif" class="form-control" data-error="#err_commission_percentage">
            <span id="err_commission_percentage"></span>
            <span class="error">{{ ($errors->has('commission_percentage')) ? $errors->first('commission_percentage') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Deposit Policy</label>
            <textarea name="deposit_policy" id="deposit_policy" class="form-control" data-error="#err_deposit_policy">@if($HotelLocalPolices) {{$HotelLocalPolices->deposit_policy}} @endif</textarea>
            <span id="err_deposit_policy"></span>
            <span class="error">{{ ($errors->has('deposit_policy')) ? $errors->first('deposit_policy') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Cancellation Policy</label>
            <textarea name="cancellation_policy" id="cancellation_policy" class="form-control" data-error="#err_cancellation_policy">@if($HotelLocalPolices) {{$HotelLocalPolices->cancellation_policy}} @endif</textarea>
            <span id="err_taxs_policy"></span>
            <span class="error">{{ ($errors->has('cancellation_policy')) ? $errors->first('cancellation_policy') : ''}}</span>
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
            <textarea name="property_check_in_out_desc" id="property_check_in_out_desc" class="form-control" data-error="#err_property_check_in_out_desc">@if($HotelProperty) {{$HotelProperty->property_check_in_out_desc}} @endif</textarea>
            <span id="err_property_check_in_out_desc"></span>
            <span class="error">{{ ($errors->has('property_check_in_out_desc')) ? $errors->first('property_check_in_out_desc') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Description Long</label>
            <textarea name="property_description" id="property_description" data-error="err_property_description" class="form-control">@if($HotelProperty) {{$HotelProperty->property_description}} @endif</textarea>
            <span id="err_property_description"></span>
            <span class="error">{{ ($errors->has('property_description')) ? $errors->first('property_description') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Description Typical</label>
            <textarea name="property_description_typical" id="property_description_typical" data-error="err_property_description_typical" class="form-control">@if($HotelProperty) {{$HotelProperty->property_description_typical}} @endif</textarea>
            <span id="err_property_description_typical"></span>
            <span class="error">{{ ($errors->has('property_description_typical')) ? $errors->first('property_description_typical') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Detail</label>
            <textarea name="property_detail" id="property_detail" class="form-control" data-error="#err_property_detail">@if($HotelProperty) {{$HotelProperty->property_detail}} @endif</textarea>
            <span id="err_property_detail"></span>
            <span class="error">{{ ($errors->has('property_detail')) ? $errors->first('property_detail') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Seasonal Closure</label>
            <textarea name="seasonal_closure" id="seasonal_closure" class="form-control" data-error="#err_seasonal_closure">@if($HotelProperty) {{$HotelProperty->seasonal_closure}} @endif</textarea>
            <span id="err_seasonal_closure"></span>
            <span class="error">{{ ($errors->has('seasonal_closure')) ? $errors->first('seasonal_closure') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Selling Feature 1</label>
            <textarea name="selling_feature_1" id="selling_feature_1" data-error="#err_selling_feature_1" class="form-control">@if($HotelProperty) {{$HotelProperty->selling_feature_1}} @endif</textarea>
            <span id="err_selling_feature_1"></span>
            <span class="error">{{ ($errors->has('selling_feature_1')) ? $errors->first('selling_feature_1') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Selling Feature 2</label>
            <textarea name="selling_feature_2" id="selling_feature_2" data-error="#err_selling_feature_2" class="form-control">@if($HotelProperty) {{$HotelProperty->selling_feature_2}} @endif</textarea>
            <span id="err_selling_feature_2"></span>
            <span class="error">{{ ($errors->has('selling_feature_2')) ? $errors->first('selling_feature_2') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Selling Feature 3</label>
            <textarea name="selling_feature_3" id="selling_feature_3" data-error="#err_selling_feature_3" class="form-control">@if($HotelProperty) {{$HotelProperty->selling_feature_3}} @endif</textarea>
            <span id="err_selling_feature_3"></span>
            <span class="error">{{ ($errors->has('selling_feature_3')) ? $errors->first('selling_feature_3') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Arrival Room Service</label>
            <textarea name="arrival_room_service" id="arrival_room_service" data-error="#err_arrival_room_service" class="form-control">@if($HotelProperty) {{$HotelProperty->arrival_room_service}} @endif</textarea>
            <span id="err_arrival_room_service"></span>
            <span class="error">{{ ($errors->has('arrival_room_service')) ? $errors->first('arrival_room_service') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Business Service</label>
            <textarea name="business_service" id="business_service" data-error="#err_business_service" class="form-control">@if($HotelProperty) {{$HotelProperty->business_service}} @endif</textarea>
            <span id="err_business_service"></span>
            <span class="error">{{ ($errors->has('business_service')) ? $errors->first('business_service') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Facilities</label>
            <textarea name="facilities" id="facilities" data-error="#err_facilities" class="form-control">@if($HotelProperty) {{$HotelProperty->facilities}} @endif</textarea>
            <span id="err_facilities"></span>
            <span class="error">{{ ($errors->has('facilities')) ? $errors->first('facilities') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Health Club Or Fitness</label>
            <textarea name="health_club_or_fitness" id="health_club_or_fitness" data-error="#err_health_club_or_fitness" class="form-control">@if($HotelProperty) {{$HotelProperty->health_club_or_fitness}} @endif</textarea>
            <span id="err_health_club_or_fitness"></span>
            <span class="error">{{ ($errors->has('health_club_or_fitness')) ? $errors->first('health_club_or_fitness') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Local Information</label>
            <textarea name="local_information" id="local_information" data-error="#err_local_information" class="form-control">@if($HotelProperty) {{$HotelProperty->local_information}} @endif</textarea>
            <span id="err_local_information"></span>
            <span class="error">{{ ($errors->has('local_information')) ? $errors->first('local_information') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Meeting Facilities</label>
            <textarea name="meeting_facilities" id="meeting_facilities" data-error="#err_meeting_facilities" class="form-control">@if($HotelProperty) {{$HotelProperty->meeting_facilities}} @endif</textarea>
            <span id="err_meeting_facilities"></span>
            <span class="error">{{ ($errors->has('meeting_facilities')) ? $errors->first('meeting_facilities') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Recreation</label>
            <textarea name="recreation" id="recreation" data-error="#err_recreation" class="form-control">@if($HotelProperty) {{$HotelProperty->recreation}} @endif</textarea>
            <span id="err_recreation"></span>
            <span class="error">{{ ($errors->has('recreation')) ? $errors->first('recreation') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Room Amenities</label>
            <textarea name="room_amenities" id="room_amenities" data-error="#err_room_amenities" class="form-control">@if($HotelProperty) {{$HotelProperty->room_amenities}} @endif</textarea>
            <span id="err_room_amenities"></span>
            <span class="error">{{ ($errors->has('room_amenities')) ? $errors->first('room_amenities') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Services</label>
            <textarea name="services" id="services" data-error="#err_services" class="form-control">@if($HotelProperty) {{$HotelProperty->services}} @endif</textarea>
            <span id="err_services"></span>
            <span class="error">{{ ($errors->has('services')) ? $errors->first('services') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Shopping Local Attraction</label>
            <textarea name="shopping_local_attraction" id="shopping_local_attraction" data-error="#err_shopping_local_attraction" class="form-control">@if($HotelProperty) {{$HotelProperty->shopping_local_attraction}} @endif</textarea>
            <span id="err_shopping_local_attraction"></span>
            <span class="error">{{ ($errors->has('shopping_local_attraction')) ? $errors->first('shopping_local_attraction') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Spa</label>
            <textarea name="spa" id="spa" data-error="#err_spa" class="form-control">@if($HotelProperty) {{$HotelProperty->spa}} @endif</textarea>
            <span id="err_spa"></span>
            <span class="error">{{ ($errors->has('spa')) ? $errors->first('spa') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Directions</label>
            <textarea name="directions" id="directions" data-error="#err_directions" class="form-control">@if($HotelProperty) {{$HotelProperty->directions}} @endif</textarea>
            <span id="err_directions"></span>
            <span class="error">{{ ($errors->has('directions')) ? $errors->first('directions') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Parking</label>
            <textarea name="parking" id="parking" data-error="#err_parking" class="form-control">@if($HotelProperty) {{$HotelProperty->parking}} @endif</textarea>
            <span id="err_parking"></span>
            <span class="error">{{ ($errors->has('parking')) ? $errors->first('parking') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tourist Information</label>
            <textarea name="tourist_information" id="tourist_information" data-error="#err_tourist_information" class="form-control">@if($HotelProperty) {{$HotelProperty->tourist_information}} @endif</textarea>
            <span id="err_tourist_information"></span>
            <span class="error">{{ ($errors->has('tourist_information')) ? $errors->first('tourist_information') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Transfer Information</label>
            <textarea name="transfer_information" id="transfer_information" data-error="#err_transfer_information" class="form-control">@if($HotelProperty) {{$HotelProperty->transfer_information}} @endif</textarea>
            <span id="err_transfer_information"></span>
            <span class="error">{{ ($errors->has('transfer_information')) ? $errors->first('transfer_information') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Transportation</label>
            <textarea name="transportation" id="transportation" data-error="#err_transportation" class="form-control">@if($HotelProperty) {{$HotelProperty->transportation}} @endif</textarea>
            <span id="err_transportation"></span>
            <span class="error">{{ ($errors->has('transportation')) ? $errors->first('transportation') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Weather Information</label>
            <textarea name="weather_information" id="weather_information" data-error="#err_weather_information" class="form-control">@if($HotelProperty) {{$HotelProperty->weather_information}} @endif</textarea>
            <span id="err_weather_information"></span>
            <span class="error">{{ ($errors->has('weather_information')) ? $errors->first('weather_information') : ''}}</span>
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
<span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
</div>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Selling Feature 2</label>
<textarea name="" class="form-control"></textarea>
<span id="" ></span>
<span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
</div>
</div>
</div>
<div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Selling Feature 3</label>
<textarea name="" class="form-control"></textarea>
<span id="" ></span>
<span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
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
            <input type="text" name="amadues" id="amadues" class="form-control" data-error="#err_amadues" value="@if($HotelGdsCodes) {{$HotelGdsCodes->amadues}} @endif">
            <span id="err_amadues"></span>
            <span class="error">{{ ($errors->has('amadues')) ? $errors->first('amadues') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Galileo/ Apollo</label>
            <input type="text" name="galileo" id="galileo" data-error="#err_galileo" class="form-control" value="@if($HotelGdsCodes) {{$HotelGdsCodes->galileo}} @endif">
            <span id="err_galileo"></span>
            <span class="error">{{ ($errors->has('galileo')) ? $errors->first('galileo') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Sabre</label>
            <input type="text" name="sabre" id="sabre" data-error="#err_sabre" class="form-control" value="@if($HotelGdsCodes) {{$HotelGdsCodes->sabre}} @endif">
            <span id="err_sabre"></span>
            <span class="error">{{ ($errors->has('sabre')) ? $errors->first('sabre') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Worldspan</label>
            <input type="text" name="worldspan" id="worldspan" data-error="#err_worldspan" class="form-control" value="@if($HotelGdsCodes) {{$HotelGdsCodes->worldspan}} @endif">
            <span id="err_worldspan"></span>
            <span class="error">{{ ($errors->has('worldspan')) ? $errors->first('worldspan') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Lanyon</label>
            <input type="text" name="lanyon" id="lanyon" data-error="#err_lanyon" class="form-control" value="@if($HotelGdsCodes) {{$HotelGdsCodes->lanyon}} @endif">
            <span id="err_lanyon"></span>
            <span class="error">{{ ($errors->has('lanyon')) ? $errors->first('lanyon') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Pegasus</label>
            <input type="text" name="pegasus" id="pegasus" data-error="#err_pegasus" class="form-control" value="@if($HotelGdsCodes) {{$HotelGdsCodes->pegasus}} @endif">
            <span id="err_pegasus"></span>
            <span class="error">{{ ($errors->has('pegasus')) ? $errors->first('pegasus') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row" id="gdscodelist">
            @forelse($HotelGdsCodesOther as $HotelGCodesOther)
            <input type="hidden" name="gds_code_id[]" value="{{$HotelGCodesOther->id}}">
            <div class="col-sm-10 col-md-4 col-lg-4" id="gds_code0">
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label>Others</label>
                            <input type="text" name="gdsother" id="gdsother" data-error="#err_gdsother" class="form-control" value="{{$HotelGCodesOther->title}}">
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2" style="margin-top:5%">
                        <div class="form-group">
                            <button id="clonegds{{$HotelGCodesOther->id}}" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
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
            @endforelse
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
<div class="col-sm-8 col-md-8 col-lg-8 mtb-15">
<h1>Room Configuration </h1>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 text-right">
<a href="{{ url('hotelier/export-room-configuration') }}/xlsx/{{$Hotels->id}}" class="btn-outline-inverse-info btn btn-lg">Export Room Configuration</a>
</div>
<!-- <div class="col-sm-4 col-md-4 col-lg-4 text-right" style="margin-top: 30px;">
<a href="javascript:0" class="btn btn-primary add-rooms"> Add Room</a> </div> -->
<div class="add_room" style="width:100%">
<div class="add_room_clone">
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Add Details</div>
    <div class="col-sm-12 col-md-12 col-lg-12 panel">
        <div class="alert alert-success room-success hidden"></div>
        <div class=" row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Active</label>
                                <input type="checkbox" name="add_active" id="add_active" data-error="#err_active" class="form-control">
                                <span class="error" id="err_add_active"></span>
                                <span class="error">{{ ($errors->has('active')) ? $errors->first('active') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="add_room_code" id="add_room_code" data-error="#err_add_room_code" class="form-control" required>
                                <span class="error" id="err_add_room_code"></span>
                                <span class="error">{{ ($errors->has('add_room_code')) ? $errors->first('add_room_code') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="add_room_name" id="add_room_name" data-error="#err_add_room_name" class="form-control">
                                <span class="error" id="err_add_room_name"></span>
                                <span class="error">{{ ($errors->has('add_room_name')) ? $errors->first('add_room_name') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Total Rooms</label>
                                <input type="number" name="add_total_room" id="add_total_room" data-error="#err_add_total_room" class="form-control" min="1">
                                <span class="error" id="err_add_total_room"></span>
                                <span class="error">{{ ($errors->has('add_total_room')) ? $errors->first('add_total_room') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Rolling Inventry</label>
                                <input type="number" name="add_rolling_invetry" id="add_rolling_invetry" data-error="#err_add_rolling_invetry" min="1">
                                <span class="error" id="err_add_rolling_invetry"></span>
                                <span class="error">{{ ($errors->has('add_rolling_invetry')) ? $errors->first('add_rolling_invetry') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="add_room_category" id="add_room_category" data-error="#err_add_room_category">
                                    <option value="">select</option>
                                    @foreach($RoomsCategory as $RCategory)
                                    <option value="{{$RCategory->id}}">{{$RCategory->title}}</option>
                                    @endforeach
                                </select>
                                <span class="error" id="err_add_room_category"></span>
                                <span class="error">{{ ($errors->has('add_room_category')) ? $errors->first('add_room_category') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="add_room_short_desc" id="add_room_short_desc" data-error="#err_add_room_short_desc" class="form-control"></textarea>
                                <span class="error" id="err_add_room_short_desc"></span>
                                <span class="error">{{ ($errors->has('add_room_short_desc')) ? $errors->first('add_room_short_desc') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea name="add_room_long_desc" id="add_room_long_desc" data-error="#err_add_room_long_desc" class="form-control"></textarea>
                                <span class="error" id="err_add_room_long_desc"></span>
                                <span class="error">{{ ($errors->has('add_room_long_desc')) ? $errors->first('add_room_long_desc') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>PMS Code</label>
                                <input type="text" name="add_room_pms_code" id="add_room_pms_code" data-error="#err_add_room_pms_code" class="form-control">
                                <span class="error" id="err_add_room_pms_code"></span>
                                <span class="error">{{ ($errors->has('add_room_pms_code')) ? $errors->first('add_room_pms_code') : ''}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 ">
                            <h4>Attributes</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class=" row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Room Class</label>
                                        <select class="form-control" name="add_room_class" id="add_room_class" data-error="#err_add_room_class">
                                            <option value="">select</option>
                                            @foreach($RoomClass as $RClass)
                                            <option value="{{$RClass->id}}">{{$RClass->title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="error" id="err_add_room_class"></span>
                                        <span class="error">{{ ($errors->has('add_room_class')) ? $errors->first('add_room_class') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Use Room Size</label>
                                        <input type="checkbox" name="add_room_size" id="add_room_size" data-error="#err_add_room_size" class="form-control" value="Yes">
                                        <span class="error" id="err_add_room_size"></span>
                                        <span class="error">{{ ($errors->has('add_room_size')) ? $errors->first('add_room_size') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>ADA Compliant</label>
                                        <input type="checkbox" name="add_ada_compliant" id="add_ada_compliant" data-error="#err_add_ada_compliant" class="form-control" value="Yes">
                                        <span class="error" id="err_add_ada_compliant"></span>
                                        <span class="error">{{ ($errors->has('add_ada_compliant')) ? $errors->first('add_ada_compliant') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Room Min Size</label>
                                        <input type="text" name="add_room_min_size" id="add_room_min_size" data-error="#err_add_room_min_size" class="form-control">
                                        <span class="error" id="err_add_room_min_size"></span>
                                        <span class="error">{{ ($errors->has('add_room_min_size')) ? $errors->first('add_room_min_size') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Room Max Size</label>
                                        <input type="text" name="add_room_max_size" id="add_room_max_size" data-error="#err_add_room_max_size" class="form-control">
                                        <span class="error" id="err_add_room_max_size"></span>
                                        <span class="error">{{ ($errors->has('add_room_max_size')) ? $errors->first('add_room_max_size') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Size Units</label>
                                        <input type="text" name="add_room_size_units" id="add_room_size_units" data-error="#err_add_room_size_units" class="form-control">
                                        <span class="error" id="err_add_room_size_units"></span>
                                        <span class="error">{{ ($errors->has('add_room_size_units')) ? $errors->first('add_room_size_units') : ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
                            <h4>Bed Type Assignment</h4>
                        </div>
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
                                        <tbody id="bedtype_list">
                                            <tr id="bedtype0">
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control" name="add_bed_type[]" id="add_bed_type" data-error="#err_add_bed_type">
                                                            <option selected="selected" value="">-Select-</option>
                                                            @foreach($RoomBedType as $RBType)
                                                            <option value="{{$RBType->id}}">{{$RBType->title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="error" id="err_add_bed_type" style="position: relative;
      top: -2px;"></span>
                                                        <span class="error">{{ ($errors->has('add_bed_type')) ? $errors->first('add_bed_type') : ''}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="add_bed_quantity[]" id="add_bed_quantity" data-error="#err_add_bed_quantity" class="form-control" min="1">
                                                        <span class="error" id="err_add_bed_quantity" style="position: relative;
      top: -2px;"></span>
                                                        <span class="error">{{ ($errors->has('add_bed_quantity')) ? $errors->first('add_bed_quantity') : ''}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="radio" name="add_bed_primary[]" id="add_bed_primary" data-error="#err_add_bed_primary" class="form-control" value="true">
                                                        <span class="error" id="err_add_bed_primary" style="position: relative;
      top: -2px;"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <td>
                                                        <button id="clonebed" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
                            <h4>Occupancy</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                            <div class=" row">

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Total Guests Per Room</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_total_guest_per_room_un" id="add_total_guest_per_room_un" data-error="#err_add_total_guest_per_room_un" class="form-control" onclick="if($(this).prop('checked') == true){$('#add_total_guest_per_room').css('display','none');}else{$('#add_total_guest_per_room').css('display','block');}">
                                            </label>Unlimited
                                        </div>
                                        <input type="number" name="add_total_guest_per_room" id="add_total_guest_per_room" data-error="#err_add_total_guest_per_room" class="form-control" min="1">
                                        <span class="error" id="err_add_total_guest_per_room" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_total_guest_per_room')) ? $errors->first('add_total_guest_per_room') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Adult Occupancy</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_adult_occupancy_un" id="add_adult_occupancy_un" data-error="#err_add_adult_occupancy_un" class="form-control" onclick="if($(this).prop('checked') == true){$('#add_adult_occupancy').css('display','none');}else{$('#add_adult_occupancy').css('display','block');}">
                                            </label>Unlimited</div>
                                        <input type="number" name="add_adult_occupancy" id="add_adult_occupancy" data-error="#err_add_adult_occupancy" class="form-control" min="1">
                                        <span class="error" id="" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_adult_occupancy')) ? $errors->first('add_adult_occupancy') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Child Occupancy</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_child_occupancy_un" id="add_child_occupancy_un" data-error="#err_add_child_occupancy_un" class="form-control" onclick="if($(this).prop('checked') == true){$('#add_child_occupancy').css('display','none');}else{$('#add_child_occupancy').css('display','block');}">
                                            </label>Unlimited
                                        </div>
                                        <input type="number" name="add_child_occupancy" id="add_child_occupancy" data-error="#err_add_child_occupancy" class="form-control" min="1">
                                        <span class="error" id="err_add_child_occupancy" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_child_occupancy')) ? $errors->first('add_child_occupancy') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Child Limits by Age Range</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_child_age_limit" value="Yes" id="add_child_age_limit" data-error="#err_add_child_age_limit" class="form-control">
                                                <!-- Use Child Limits by Age Range -->
                                            </label>
                                        </div>
                                        <span class="error" id="err_add_child_age_limit" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_child_age_limit')) ? $errors->first('add_child_age_limit') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Allow Extra Bed</label>
                                        <input type="checkbox" name="add_allow_extra_bed" id="add_allow_extra_bed" data-error="#err_add_allow_extra_bed" value="Yes" class="form-control">
                                        <span class="error" id="err_add_allow_extra_bed" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_allow_extra_bed')) ? $errors->first('add_allow_extra_bed') : ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 ">
                            <h4>Default Price Adjustment</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class=" row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Price Adjustment Type</label>
                                        <select class="form-control" name="add_price_adjustment_type" id="add_price_adjustment_type" data-error="#err_add_price_adjustment_type">
                                            <option value="USD">USD</option>
                                            <option value="%">%</option>
                                        </select>
                                        <span class="error" id="err_add_price_adjustment_type" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_price_adjustment_type')) ? $errors->first('add_price_adjustment_type') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Default Adjustment</label>
                                        <input type="number" name="add_default_adjustment" id="add_default_adjustment" data-error="#err_add_default_adjustment" class="form-control" min="1">
                                        <span class="error" id="err_add_default_adjustment" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_default_adjustment')) ? $errors->first('add_default_adjustment') : ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





                                        



<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>Room Main Image</label>
<input type="file" name="uploadFile" id="uploadFile" class="file-upload-default">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview" class="image_preview">

</div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3">

<div class="form-group">
<label>Room Image 1</label>
<input type="file" name="uploadFile1" id="uploadFile1" class="file-upload-default">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview1" class="image_preview"></div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
<label>Room Image 2</label>
<input type="file" name="uploadFile2" id="uploadFile2" class="file-upload-default">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview2" class="image_preview"></div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
<label>Room Image 3</label>
<input type="file" name="uploadFile3" id="uploadFile3" class="file-upload-default">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

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
    @if(!$Rooms->isEmpty()) @foreach($Rooms as $Room)

    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Edit {{$Room->title}} Details</div>
    <div class="col-sm-12 col-md-12 col-lg-12 panel">
        <div class="alert alert-success room-success hidden" id="roomSuccess{{$Room->rid}}"></div>
        <div class=" row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Active</label>
                                <input type="checkbox" name="add_active{{$Room->rid}}" id="add_active{{$Room->rid}}" data-error="#err_active" class="form-control" value="Enable" <?=( $Room->status=='Enable')?'checked':''; ?> >
                                <span class="error" id="err_add_active"></span>
                                <span class="error">{{ ($errors->has('active')) ? $errors->first('active') : ''}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="add_room_code{{$Room->rid}}" id="add_room_code{{$Room->rid}}" class="form-control" value="{{$Room->room_code}}">
                                <span class="error" id="err_add_room_code{{$Room->rid}}"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="add_room_name{{$Room->rid}}" id="add_room_name{{$Room->rid}}" class="form-control" value="{{$Room->title}}">
                                <span class="error" id="err_add_room_name{{$Room->rid}}"></span>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Total Rooms</label>
                                <input type="number" name="add_total_room{{$Room->rid}}" id="add_total_room{{$Room->rid}}" class="form-control" min="1" value="{{$Room->total_room}}" onchange="$(add_rolling_invetry{{$Room->rid}}).val($(this).val());">
                                <span class="error" id="err_add_total_room{{$Room->rid}}"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Rolling Inventry</label>
                                <input type="number" name="add_rolling_invetry{{$Room->rid}}" id="add_rolling_invetry{{$Room->rid}}" min="1" value="{{$Room->rolling_invetry}}">
                                <span class="error" id="err_add_rolling_invetry{{$Room->rid}}"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="add_room_category{{$Room->rid}}" id="add_room_category{{$Room->rid}}">
                                    <option value="">select</option>
                                    @foreach($RoomsCategory as $RCategory)
                                    <option value="{{$RCategory->id}}" @if($Room->room_category==$RCategory->id) selected="selected" @endif >{{$RCategory->title}}</option>
                                    @endforeach
                                </select>
                                <span class="error" id="err_add_room_category{{$Room->rid}}"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="add_room_short_desc{{$Room->rid}}" id="add_room_short_desc{{$Room->rid}}" data-error="#err_add_room_short_desc{{$Room->rid}}" class="form-control">{{$Room->room_short_desc}}</textarea>
                                <span class="error" id="err_add_room_short_desc{{$Room->rid}}"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea name="add_room_long_desc{{$Room->rid}}" id="add_room_long_desc{{$Room->rid}}" data-error="#err_add_room_long_desc{{$Room->rid}}" class="form-control">{{$Room->description}}</textarea>
                                <span class="error" id="err_add_room_long_desc{{$Room->rid}}"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label>PMS Code</label>
                                <input type="text" name="add_room_pms_code{{$Room->rid}}" id="add_room_pms_code{{$Room->rid}}" data-error="#err_add_room_pms_code{{$Room->rid}}" class="form-control" value="{{$Room->room_pms_code}}">
                                <span class="error" id="err_add_room_pms_code{{$Room->rid}}"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 ">
                            <h4>Attributes</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class=" row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Room Class</label>
                                        <select class="form-control" name="add_room_class{{$Room->rid}}" id="add_room_class{{$Room->rid}}">
                                            <option value="">select</option>
                                            @foreach($RoomClass as $RClass)
                                            <option value="{{$RClass->id}}" @if($Room->getRoomAtt()) @if($Room->getRoomAtt()->room_class==$RClass->id) selected="selected" @endif @endif >{{$RClass->title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="error" id="err_add_room_class{{$Room->rid}}"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Use Room Size</label>
                                        <input type="checkbox" name="add_room_size{{$Room->rid}}" id="add_room_size{{$Room->rid}}" data-error="#err_add_room_size" class="form-control" <?=( $Room->room_size == 'Yes')?'checked':''; ?> >

                                        <span class="error" id="err_add_room_size"></span>
                                        <span class="error">{{ ($errors->has('add_room_size')) ? $errors->first('add_room_size') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>ADA Compliant</label>
                                        <input type="checkbox" name="add_ada_compliant{{$Room->rid}}" id="add_ada_compliant{{$Room->rid}}" data-error="#err_add_ada_compliant" class="form-control" <?=( $Room->ada_compliant == 'Yes')?'checked':''; ?>>
                                        <span class="error" id="err_add_ada_compliant"></span>
                                        <span class="error">{{ ($errors->has('add_ada_compliant')) ? $errors->first('add_ada_compliant') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Room Min Size</label>
                                        <input type="text" name="add_room_min_size{{$Room->rid}}" id="add_room_min_size{{$Room->rid}}" data-error="#err_add_room_min_size{{$Room->rid}}" class="form-control" value="{{$Room->room_min_size}}">
                                        <span class="error" id="err_add_room_min_size{{$Room->rid}}"></span>
                                        <span class="error">{{ ($errors->has('add_room_min_size')) ? $errors->first('add_room_min_size') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Room Max Size</label>
                                        <input type="text" name="add_room_max_size{{$Room->rid}}" id="add_room_max_size{{$Room->rid}}" data-error="#err_add_room_max_size{{$Room->rid}}" class="form-control" value="{{$Room->room_max_size}}">
                                        <span class="error" id="err_add_room_max_size{{$Room->rid}}"></span>
                                        <span class="error">{{ ($errors->has('add_room_max_size')) ? $errors->first('add_room_max_size') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Size Units</label>
                                        <input type="text" name="add_room_size_units{{$Room->rid}}" id="add_room_size_units{{$Room->rid}}" data-error="#err_add_room_size_units{{$Room->rid}}" class="form-control" value="{{$Room->room_size_units}}">
                                        <span class="error" id="err_add_room_size_units{{$Room->rid}}"></span>
                                        <span class="error">{{ ($errors->has('add_room_size_units')) ? $errors->first('add_room_size_units') : ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
                            <h4>Bed Type Assignment</h4>
                        </div>
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
                                        <tbody id="bedtype_list">
                                            @foreach($Room->getRoomBedType() as $RBedType)
                                            <tr id="bedtype0">
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control" name="add_bed_type{{$Room->rid}}[]" id="add_bed_type{{$Room->rid}}">
                                                            <option selected="selected" value="">-Select-</option>
                                                            @foreach($RoomBedType as $RBType)
                                                            <option value="{{$RBType->id}}" <?=( $RBType->id == $Room->bed_type)?'selected':''; ?> >{{$RBType->title}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="error" id="err_add_bed_type{{$Room->rid}}" style="position: relative;
      top: -2px;"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="add_bed_quantity{{$Room->rid}}[]" id="add_bed_quantity{{$Room->rid}}" class="form-control" value="{{$Room->bed_quantity}}" min="1">
                                                        <span class="error" id="err_add_bed_quantity{{$Room->rid}}" style="position: relative;
      top: -2px;"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="radio" name="add_bed_primary{{$Room->rid}}[]" id="add_bed_primary{{$Room->rid}}" data-error="#err_add_bed_primary" class="form-control" value="true" <?=( $Room->bed_primary)?'checked':'' ?> >
                                                        <span class="error" id="err_add_bed_primary" style="position: relative;
      top: -2px;"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <td>
                                                        <button id="clonebed" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
                            <h4>Occupancy</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                            <div class=" row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Total Guests Per Room</label>

                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_total_guest_per_room_un{{$Room->rid}}" id="add_total_guest_per_room_un{{$Room->rid}}" data-error="#err_add_total_guest_per_room_un" class="form-control" <?=( $Room->total_guest_per_room_un == "Yes")?'checked':''; ?> onclick="if($(this).prop('checked') == true){ $('#add_total_guest_per_room{{$Room->rid}}').hide();}else{$('#add_total_guest_per_room{{$Room->rid}}').show();}" >
                                            </label>Unlimited
                                        </div>

                                        <input type="number" name="add_total_guest_per_room{{$Room->rid}}" id="add_total_guest_per_room{{$Room->rid}}" data-error="#err_add_total_guest_per_room" class="form-control" min="1" value="{{ $Room->total_guest_per_room }}">

                                        <span class="error" id="err_add_total_guest_per_room_un" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_total_guest_per_room')) ? $errors->first('add_total_guest_per_room') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Adult Occupancy</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_adult_occupancy_un{{$Room->rid}}" id="add_adult_occupancy_un{{$Room->rid}}" data-error="#err_add_adult_occupancy_un" class="form-control" <?=( $Room->adult_occupancy_un == "Yes")?'checked':''; ?> onclick="if($(this).prop('checked') == true){ $('#add_adult_occupancy{{$Room->rid}}').hide();}else{$('#add_adult_occupancy{{$Room->rid}}').show();}"></label>Unlimited</div>
                                        <input type="number" name="add_adult_occupancy{{$Room->rid}}" id="add_adult_occupancy{{$Room->rid}}" data-error="#err_add_adult_occupancy" class="form-control" min="1" value="{{$Room->adult_occupancy}}">
                                        <span class="error" id="" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_adult_occupancy')) ? $errors->first('add_adult_occupancy') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Child Occupancy</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_child_occupancy_un{{$Room->rid}}" value="Yes" id="add_child_occupancy_un{{$Room->rid}}" data-error="#err_add_child_occupancy_un" class="form-control" <?=( $Room->child_occupancy_un == "Yes")?'checked':''; ?> onclick="if($(this).prop('checked') == true){ $('#add_child_occupancy{{$Room->rid}}').hide();}else{$('#add_child_occupancy{{$Room->rid}}').show();}"></label>Unlimited
                                        </div>
                                        <input type="number" name="add_child_occupancy{{$Room->rid}}" id="add_child_occupancy{{$Room->rid}}" data-error="#err_add_child_occupancy" class="form-control" min="1" value="{{ $Room->child_occupancy }}">
                                        <span class="error" id="err_add_child_occupancy" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_child_occupancy')) ? $errors->first('add_child_occupancy') : ''}}</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Child Limits by Age Range</label>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="add_child_age_limit{{$Room->rid}}" id="add_child_age_limit{{$Room->rid}}" data-error="#err_add_child_age_limit" class="form-control" <?=( $Room->child_age_limit == 'Yes')?'checked':''; ?> >
                                                <!-- Use Child Limits by Age Range -->
                                            </label>
                                        </div>
                                        <span class="error" id="err_add_child_age_limit" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_child_age_limit')) ? $errors->first('add_child_age_limit') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Allow Extra Bed</label>
                                        <input type="checkbox" name="add_allow_extra_bed{{$Room->rid}}" id="add_allow_extra_bed{{$Room->rid}}" data-error="#err_add_allow_extra_bed" class="form-control" <?=( $Room->allow_extra_bed == 'Yes')?'checked':''; ?> >
                                        <span class="error" id="err_add_allow_extra_bed" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_allow_extra_bed')) ? $errors->first('add_allow_extra_bed') : ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mtb-15 ">
                            <h4>Default Price Adjustment</h4>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class=" row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Price Adjustment Type</label>
                                        <select class="form-control" name="add_price_adjustment_type{{$Room->rid}}" id="add_price_adjustment_type{{$Room->rid}}" data-error="#err_add_price_adjustment_type">
                                            <option value="USD" <?=( $Room->price_adjustment_type == "USD")?'selected':';' ?> >USD</option>
                                            <option value="%" <?=( $Room->price_adjustment_type == "%")?'selected':';' ?> >%</option>
                                        </select>
                                        <span class="error" id="err_add_price_adjustment_type" style="position: relative;
top: -2px;"></span>
                                        <span class="error">{{ ($errors->has('add_price_adjustment_type')) ? $errors->first('add_price_adjustment_type') : ''}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Default Adjustment</label>
                                        <input type="number" name="add_default_adjustment{{$Room->rid}}" id="add_default_adjustment{{$Room->rid}}" class="form-control" min="1" value="{{$Room->default_adjustment}}">
                                        <span class="error" id="err_add_default_adjustment{{$Room->rid}}" style="position: relative;
top: -2px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






<div class="col-sm-12 col-md-3 col-lg-3">
<div class="form-group">
<label>Room Main Image</label>
<input type="file" name="uploadFile{{$Room->rid}}" id="uploadFile{{$Room->rid}}" class="file-upload-default" onchange="roomImgUpdate('uploadFile{{$Room->rid}}','image_preview{{$Room->rid}}')">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview{{$Room->rid}}" class="image_preview">
    @if($Room->image_1)
    <img src="{{ asset('uploads/venue/thumbnail/'.$Room->image_1) }}">
    @endif
</div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3">

<div class="form-group">
<label>Room Image 1</label>
<input type="file" name="uploadFile1{{$Room->rid}}" id="uploadFile1{{$Room->rid}}" class="file-upload-default" onchange="roomImgUpdate('uploadFile1{{$Room->rid}}','image_preview1{{$Room->rid}}')">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview1{{$Room->rid}}" class="image_preview">
    @if($Room->image_2)
        <img src="{{ asset('uploads/venue/thumbnail/'.$Room->image_2) }}">
    @endif
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
<label>Room Image 2</label>
<input type="file" name="uploadFile2{{$Room->rid}}" id="uploadFile2{{$Room->rid}}" class="file-upload-default" onchange="roomImgUpdate('uploadFile2{{$Room->rid}}','image_preview2{{$Room->rid}}')">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview2{{$Room->rid}}" class="image_preview">
    @if($Room->image_3)
        <img src="{{ asset('uploads/venue/thumbnail/'.$Room->image_3) }}">
    @endif
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
<label>Room Image 3</label>
<input type="file" name="uploadFile3{{$Room->rid}}" id="uploadFile3{{$Room->rid}}" class="file-upload-default" onchange="roomImgUpdate('uploadFile3{{$Room->rid}}','image_preview3{{$Room->rid}}')">
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
<span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
</div>
</div>

<div id="image_preview3{{$Room->rid}}" class="image_preview">
    @if($Room->image_4)
        <img src="{{ asset('uploads/venue/thumbnail/'.$Room->image_4) }}">
    @endif
</div>

</div>








            <div class="col-md-2 offset-10 ">
                <input type="button" name="updateRoom" id="{{$Room->rid}}" class="btn btn-primary btn-lg updateRoom" value="Update Room" placeholder="Update Room">
            </div>
        </div>
    </div>
    @endforeach @endif
</div>
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
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
<h1>TAX Configuration</h1>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 text-right">
<a href="{{ url('hotelier/export-tax-config') }}/csv/{{$Hotels->id}}" class="btn-outline-inverse-info btn btn-lg">Export TAX Configuration</a>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 text-right ">
<!-- <a href="{{url('hotelier/import-tax-configuration') }}">Import TAX Configuration</a> -->
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion active">Tax</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel " style="display: block;">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="tax_level" id="tax_level" data-error="#err_tax_level">
                <option value="Hotel" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_level == 'Hotel') selected="selected" @endif @endif>Hotel Taxes</option>
                <option value="Package" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_level == 'Package') selected="selected" @endif @endif>Package Taxes</option>
                <option value="Rate" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_level == 'Rate') selected="selected" @endif @endif>Rate Taxes</option>
                <option value="Room" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_level == 'Room') selected="selected" @endif @endif>Room Taxes</option>
            </select>
            </select>
            <span id="err_tax_level" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_level')) ? $errors->first('tax_level') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax Frequency</label>
            <select class="form-control" name="tax_frequency" id="tax_frequency" data-error="#err_tax_frequency">
                <option value="Per Night" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_frequency == 'Per Night') selected="selected" @endif @endif>Per Night</option>
                <option value="Per Stay" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_frequency == 'Per Stay') selected="selected" @endif @endif>Per Stay</option>
            </select>
            <span id="err_tax_frequency" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_frequency')) ? $errors->first('tax_frequency') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax Type</label>
            <select class="form-control" name="tax_type" id="tax_type" data-error="#err_tax_type">
                <option value="">Select Tax Type</option>
                @foreach($CategoryTaxType as $CategoryTaxTypes)
                <option value="{{$CategoryTaxTypes->id}}" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_type == $CategoryTaxTypes->id) selected="selected" @endif @endif>{{$CategoryTaxTypes->title}}</option>
                @endforeach
            </select>
            <span id="err_tax_type" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_type')) ? $errors->first('tax_type') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Code</label>
            <input type="text" name="tax_code" id="tax_code" data-error="#err_tax_code" class="form-control" value="@if($HotelTaxConfiguration){{$HotelTaxConfiguration->tax_code}}@endif">
            <span id="err_tax_code" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_code')) ? $errors->first('tax_code') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="tax_name" id="tax_name" data-error="#err_tax_name" class="form-control" value="@if($HotelTaxConfiguration){{$HotelTaxConfiguration->tax_name}}@endif">
            <span id="err_tax_name" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_name')) ? $errors->first('tax_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Default Description</label>
            <textarea class="form-control" name="tax_desc" id="tax_desc" data-error="#err_tax_desc">@if($HotelTaxConfiguration) {{$HotelTaxConfiguration->tax_desc}} @endif</textarea>
            <span id="err_tax_desc" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_desc')) ? $errors->first('tax_desc') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Start Date</label>
            <input type="text" name="start_date" id="start_date" data-error="#err_start_date" class="form-control datepicker" value="@if($HotelTaxConfiguration) {{ (date('d-m-Y',strtotime($HotelTaxConfiguration->start_date))) }} @endif">
            <span id="err_start_date" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('start_date')) ? $errors->first('start_date') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>End Date</label>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <input type="text" name="end_date" id="end_date" data-error="#err_end_date" class="form-control datepicker" value="@if($HotelTaxConfiguration) {{ (date('d-m-Y',strtotime($HotelTaxConfiguration->end_date))) }} @endif">
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <input type="checkbox" name="no_end_date" id="no_end_date" value="Yes" data-error="err_no_end_date" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->no_end_date=='Yes') checked="checked" @endif @endif class="form-control" >No End Date
                    </div>
                </div>
            </div>
            <span id="" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('end_date')) ? $errors->first('end_date') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax</label>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <input type="text" name="tax" id="tax" data-error="#err_tax" class="form-control" value="@if($HotelTaxConfiguration) {{$HotelTaxConfiguration->tax}} @endif">
                        <span id="err_tax" style="position: relative;
top: -2px;"></span>
                        <span class="error">{{ ($errors->has('tax')) ? $errors->first('tax') : ''}}</span>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <select class="form-control" name="tax_type_price" id="tax_type_price" data-error="err_tax_type_price">
                            <option selected="selected" value="Amount" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_type_price =='Amount') selected="selected" @endif @endif >Amount</option>
                            <option value="Percentage" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_type_price == 'Percentage') selected="selected" @endif @endif>Percentage</option>
                        </select>
                    </div>
                </div>
            </div>
            <span id="" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_type_price')) ? $errors->first('tax_type_price') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Charge Per</label>
            <select class="form-control" name="charge_per" id="charge_per" data-error="#err_charge_per">
                <option selected="selected" value="FlatCharge" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->charge_per == 'FlatCharge') selected="selected" @endif @endif>Flat Charge</option>
                <option value="PerAdult" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->charge_per == 'PerAdult') selected="selected" @endif @endif>Per Adult</option>
                <option value="PerChild" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->charge_per == 'PerChild') selected="selected" @endif @endif>Per Child</option>
                <option value="PerPerson" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->charge_per == 'PerPerson') selected="selected" @endif @endif>Per Person</option>
            </select>
            <span id="err_charge_per" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('charge_per')) ? $errors->first('charge_per') : ''}}</span>
        </div>
    </div>
   
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from External Rate</label>
            <input type="checkbox" name="cal_ext_rate" id="cal_ext_rate" data-error="#err_cal_ext_rate" class="form-control" value="True" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->cal_ext_rate=='True') checked="checked" @endif @endif>
            <span id="err_cal_ext_rate" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('cal_ext_rate')) ? $errors->first('cal_ext_rate') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Is Inclusive</label>
            <input type="checkbox" name="tax_inclusive" id="tax_inclusive" data-error="#err_tax_inclusive" class="form-control" value="True" data-error="err_no_end_date" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_inclusive=='True') checked="checked" @endif @endif>
            <span id="err_tax_inclusive" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_inclusive')) ? $errors->first('tax_inclusive') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from Room Price</label>
            <input type="checkbox" name="cal_room_price" id="cal_room_price" data-error="#err_cal_room_price" class="form-control" value="True" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->cal_room_price=='True') checked="checked" @endif @endif>
            <span id="err_cal_room_price" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('cal_room_price')) ? $errors->first('cal_room_price') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Calculate from Package Price</label>
            <input type="checkbox" name="cal_package_price" id="cal_package_price" data-error="#err_cal_package_price" class="form-control" value="True" data-error="err_cal_package_price" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->cal_package_price=='True') checked="checked" @endif @endif>
            <span id="err_elg_dis_exclusion" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('cal_package_price')) ? $errors->first('cal_package_price') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Apply to Free Nights</label>
            <input type="checkbox" name="apply_free_night" id="apply_free_night" data-error="#err_apply_free_night" class="form-control" value="True" data-error="err_no_end_date" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->apply_free_night=='True') checked="checked" @endif @endif>
            <span id="err_apply_free_night" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('apply_free_night')) ? $errors->first('apply_free_night') : ''}}</span>
        </div>
    </div>
    <!-- <div class="col-sm-12 col-md-4 col-lg-4">
<div class="form-group">
<div class="" id="grp_sec">
<label>Tax By Price Range</label>
<input type="checkbox" name="tax_by_price_range" id="tax_by_price_range" data-error="#err_tax_by_price_range"  class="form-control" value="Yes" data-error="err_no_end_date" @if($HotelTaxConfiguration) 
@if($HotelTaxConfiguration->tax_by_price_range=='Yes') checked="checked" @endif @endif>
<span id="err_tax_by_price_range" style="position: relative;
top: -2px;"></span>
<span class="error">{{ ($errors->has('tax_by_price_range')) ? $errors->first('tax_by_price_range') : ''}}</span>
</div>
</div>  
</div>  -->
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Tax By LOS:</label>
            <input type="checkbox" name="tax_by_los" id="tax_by_los" data-error="#err_tax_by_los" class="form-control" value="True" data-error="err_no_end_date" @if($HotelTaxConfiguration) @if($HotelTaxConfiguration->tax_by_los=='True') checked="checked" @endif @endif>
            <span id="err_tax_by_los" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('tax_by_los')) ? $errors->first('tax_by_los') : ''}}</span>
        </div>
    </div>
</div>
</div>
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
            <textarea name="meet_event_desc" id="meet_event_desc" data-error="#err_meet_event_desc" class="form-control">{{$Hotels->meeting_description}}</textarea>
            <span id="err_meet_event_desc" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('meet_event_desc')) ? $errors->first('meet_event_desc') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Seasonal Rates</label>
            <input type="text" name="seasonal_rates" id="seasonal_rates" data-error="#err_seasonal_rates" class="form-control" value="{{$Hotels->seasonal_rates}}">
            <span id="err_seasonal_rates" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('seasonal_rates')) ? $errors->first('seasonal_rates') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Upload Floor Plan</label>
            <input type="file" name="floor_plan" id="floor_plan" data-error="#err_floor_plan" class="form-control">
            <span id="err_floor_plan" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('floor_plan')) ? $errors->first('floor_plan') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Upload DDR Packages</label>
            <input type="file" name="ddr_packages" id="ddr_packages" data-error="#err_ddr_packages" class="form-control">
            <span id="err_ddr_packages" style="position: relative;
top: -2px;"></span>
            <span class="error">{{ ($errors->has('ddr_packages')) ? $errors->first('ddr_packages') : ''}}</span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Benefits</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    @foreach ($Benefits as $Benefit)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" name="benefits[]" value="{{ $Benefit->bid }}" data-error="#err_benefits" @if($Benefit->uvbid) checked="checked" @endif/></div>
                    <div class="col-md-11">
                        <label>{{ $Benefit->title }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Amenities</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    @foreach ($Amenities as $Amenitie)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="amenities[]" value="{{ $Amenitie->aid }}" class="form-control" data-error="#err_amenities" @if($Amenitie->uvaid) checked="checked" @endif/> </div>
                    <div class="col-md-11">
                        <label>{{ $Amenitie->title }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Business</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    @foreach ($Business as $Busines)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="business[]" value="{{ $Busines->bsid }}" class="form-control" data-error="#err_business" @if($Busines->uvbsid) checked="checked" @endif/> </div>
                    <div class="col-md-11">
                        <label>{{ $Busines->title }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Features</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    @foreach ($VenueFeatures as $VenueFeature)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="features[]" value="{{ $VenueFeature->fid }}" class="form-control" data-error="#err_features" @if($VenueFeature->uvfid) checked="checked" @endif/> </div>
                    <div class="col-md-11">
                        <label>{{ $VenueFeature->title }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Food and Drink</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    @foreach ($VenueFoodDrink as $VenueFoodDrink)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="fooddrink[]" value="{{ $VenueFoodDrink->fdid }}" class="form-control" data-error="#err_fooddrink" @if($VenueFoodDrink->uvfdid) checked="checked" @endif/> </div>
                    <div class="col-md-11">
                        <label>{{ $VenueFoodDrink->title }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Licensing</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    @foreach ($VenueLicensing as $VenueLicensing)
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <input type="checkbox" name="licensing[]" value="{{ $VenueLicensing->lid }}" class="form-control" data-error="#err_licensing" @if($VenueLicensing->uvlid) checked="checked" @endif/> </div>
                    <div class="col-md-11">
                        <label>{{ $VenueLicensing->title }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Capacity Chart</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="table-responsive">
        <table class="table ">
            <tr>
                <th>Capacity Chart</th>
                <th><img src="{{ asset('tbbc/img/1.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/2.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/3.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/4.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/5.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/6.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/7.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/8.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/9.png')}}"></th>
                <th><img src="{{ asset('tbbc/img/10.png')}}"></th>
            </tr>
            <tbody>
                <?php $i=0;?>
                    @foreach ($VenueCapacity as $VenueCapacit)
                    <tr>
                        <td>
                            <input type="hidden" name="capacity[]" value="{{ $VenueCapacit->vcid }}" />
                            <input type="hidden" name="capacity_mid[]" value="@if($VenueCapacit){{ $VenueCapacit->uvcid }}@endif" />
                            <input type="hidden" name="capacity_value[]" value="{{ $VenueCapacit->title }}" id="ca_<?php echo $i;?>" />
                            <label>{{ $VenueCapacit->title }}</label>
                        </td>
                        <td>
                            <input type="text" name="total_sq_fit[]" class="" id="tsf_<?php echo $i;?>" value="@if($VenueCapacit){{ $VenueCapacit->total_sq_fit }}@endif">
                        </td>
                        <td>
                            <input type="text" name="room_size[]" class="" id="rs_<?php echo $i;?>" value="@if($VenueCapacit){{ $VenueCapacit->room_size }}@endif">
                        </td>
                        <td>
                            <input type="text" name="celing_height[]" class="" id="ch_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->celing_height }}@endif">
                        </td>
                        <td>
                            <input type="text" name="class_room[]" class="" id="cr_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->class_room }}@endif">
                        </td>
                        <td>
                            <input type="text" name="theater_1[]" class="" id="tr1_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->theater_1 }}@endif">
                        </td>
                        <td>
                            <input type="text" name="theater_2[]" class="" id="tr2_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->theater_2 }}@endif">
                        </td>
                        <td>
                            <input type="text" name="reception[]" class="" id="rep_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->reception }}@endif">
                        </td>
                        <td>
                            <input type="text" name="conference[]" class="" id="conf_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->conference }}@endif">
                        </td>
                        <td>
                            <input type="text" name="u_shape[]" class="" id="us_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->u_shape }}@endif">
                        </td>
                        <td>
                            <input type="text" name="h_shape[]" class="" id="hs_<?php echo $i;?>" value="@if($VenueCapacit){{$VenueCapacit->h_shape }}@endif">
                        </td>
                    </tr>
                    <?php  $i++?>
                        @endforeach
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
    <input type="file" name="hotel_img_1" id="hotel_img_1" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div>
</div>

<div id="h_image_preview1" class="image_preview">
    @if($Hotels->image_1)
    <img src="{{url('')}}/uploads/venue/thumbnail/{{$Hotels->image_1}}"> @endif
</div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 1</label>
    <input type="file" name="hotel_img_2" id="hotel_img_2" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div>
</div>

<!--  <input type="file" id="hotel_img_2" name="hotel_img_2" />
<br/> -->

<div id="h_image_preview2" class="image_preview">
    @if($Hotels->image_2)
    <img src="{{url('')}}/uploads/venue/thumbnail/{{$Hotels->image_2}}"> @endif
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 2</label>
    <input type="file" name="hotel_img_3" id="hotel_img_3" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div>
</div>

<div id="h_image_preview3" class="image_preview">
    @if($Hotels->image_3)
    <img src="{{url('')}}/uploads/venue/thumbnail/{{$Hotels->image_3}}"> @endif
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 3</label>
    <input type="file" name="hotel_img_4" id="hotel_img_4" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div>
</div>

<div id="h_image_preview4" class="image_preview">
    @if($Hotels->image_4)
    <img src="{{url('')}}/uploads/venue/thumbnail/{{$Hotels->image_4}}"> @endif
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 4</label>
    <input type="file" name="hotel_img_5" id="hotel_img_5" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info" type="button">Upload</button>
</span>
    </div>
</div>

<div id="h_image_preview5" class="image_preview">
    @if($Hotels->image_5)
    <img src="{{url('')}}/uploads/venue/thumbnail/{{$Hotels->image_5}}"> @endif
</div>

</div>

<div class="col-sm-12 col-md-3 col-lg-3">

<div class="form-group">
    <label>Hotel Image 5</label>
    <input type="file" name="hotel_img_6" id="hotel_img_6" class="file-upload-default">
    <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
        <span class="input-group-append">
<button class="file-upload-browse btn btn-outline-inverse-info " type="button">Upload</button>
</span>
    </div>
</div>

<div id="h_image_preview6" class="image_preview">
    @if($Hotels->image_6)
    <img src="{{url('')}}/uploads/venue/thumbnail/{{$Hotels->image_6}}"> @endif
</div>

</div>

</div>
</div>
</div>
</div>

<div class="tab-pane" id="tab08">
    <!-- <form id="commentForm" action="{{url('hotelier/added-user')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST"> -->
    <div id="contact_section" class="">
    <div id="contact_add_form0" class="row">
        
         
    {{ csrf_field() }}

    <div class="col-lg-6 col-md-7 offset-3" style="margin-top: 5%;" > 
                                    
     <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">First Name</label>
      <div class="col-sm-6 col-md-8">
       <input class="form-control" type="text" value="" name="firstname" id="firstname" value="" autocomplete="off"/>
                    <span class="error">{{ ($errors->has('firstname')) ? $errors->first('firstname') : ''}}</span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">Last Name</label>
      <div class="col-sm-6 col-md-8">
        <input class="form-control" type="text" value="" name="lastname" id="lastname" value="" autocomplete="off"/>
                    <span class="error">{{ ($errors->has('lastname')) ? $errors->first('lastname') : ''}}</span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">Email</label>
      <div class="col-sm-6 col-md-8">
        <input class="form-control" type="text" value="" name="email" id="email" value="" autocomplete="off"/>
                    <span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-6 col-md-4 col-form-label">Passwordd</label>
      <div class="col-sm-6 col-md-8">
        <input class="form-control" type="password" autocomplete="off" value="" name="password" id="password" />
                    <span class="error">{{ ($errors->has('password')) ? $errors->first('password') : ''}}</span>
      </div>
    </div>

                    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" id="hotel_id" name="hotel_id" value="{{request()->route('id')}}">
            <div class="row mt-30 "></div>
            <div class="form-group">
            <div class="col-md-4 col-sm-4 col-xs-12 offset-4">                      
            <input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="adduser"
              value="Submit"/>
            </div>
            </div>
    </div>
    
    </div>
    </div>
    <!-- </form> -->
    </div>

    <!-- view start-->
     <div class="tab-pane" id="tab09">
    <form id="commentForm" action="" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
    <div class="table-responsive">
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
            <!--<th><input type="checkbox" id="selectall"/></th>-->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Edit</th>
          </tr>
        </thead>
         
        <tbody>
            @if($view_users)
            @foreach ($view_users as $view_user)
            <tr>
                <td>{{$view_user->first_name}}</td>
                <td>{{$view_user->last_name}}</td>
                <td>{{$view_user->email}}</td>
                <td><a href="#edit_model" class="" data-toggle="modal" data-target="#edit_model" onclick="load_model('{{$view_user->id}}')"><i class="fa fa-edit fa-lg"></i></a></td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
    </form>
    </div>
    <!-- view end-->
<!--edit modal open-->
<form  id="edit_user" action="{{url('hotelier/userpw-updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="edit_model" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            
                    <div class="row">
                        <div class="alert alert-success alert-success-offer hidden" role="alert">
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="">
                        <input type="hidden" id="edit_id" name="edit_id" value="{{$id}}">
                        
                        <div class="col-md-10 offset-2" >
                        <div class="panel-collapse" id="collapseOne">
                            <div class="panel-body">
                                <!-- <div class="row"> -->
                                <div class="col-sm-10 col-md-10 col-lg-10 form-group">
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
                                </div>  
                                <div class="col-sm-10 col-md-10 col-lg-10 form-group">
                                    <label>Password </label>
                                    <input type="password" name="password" id="password" value="" class="form-control " >
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
            <input name="chain_name" id="chain_name" type="text" class="form-control" data-error="#err_chain_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->chain_name}}@endif">
            <span id="err_chain_name"></span>
            <span class="error">{{ ($errors->has('chain_name')) ? $errors->first('chain_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Chain ID </label>
            <input name="chain_id" id="chain_id" type="text" class="form-control" data-error="#err_chain_id" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->chain_id}}@endif">
            <span id="err_chain_id"></span>
            <span class="error">{{ ($errors->has('chain_id')) ? $errors->first('chain_id') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Name Displayed in the GDSs,IDS and the SynXis CRS</label>
            <input name="syn_property_name" id="syn_property_name" type="text" class="form-control" data-error="#err_syn_property_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_name}}@endif">
            <span id="err_syn_property_name"></span>
            <span class="error">{{ ($errors->has('syn_property_name')) ? $errors->first('syn_property_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Name – Displayed in all other channels </label>
            <input name="syn_property_name_all" id="syn_property_name_all" type="text" class="form-control" data-error="#err_syn_property_name_all" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_name_all}}@endif">
            <span id="err_syn_property_name_all"></span>
            <span class="error">{{ ($errors->has('syn_property_name_all')) ? $errors->first('syn_property_name_all') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property Code </label>
            <input name="syn_property_code" id="syn_property_code" type="text" class="form-control" data-error="#err_syn_property_code" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_code}}@endif">
            <span id="err_syn_property_code"></span>
            <span class="error">{{ ($errors->has('syn_property_code')) ? $errors->first('syn_property_code') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Physical Address</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Street Address line 1 </label>
            <input name="syn_phy_address1" id="syn_phy_address1" type="text" class="form-control" data-error="#err_syn_phy_address1" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_phy_address1}}@endif">
            <span id="err_syn_phy_address1"></span>
            <span class="error">{{ ($errors->has('syn_phy_address1')) ? $errors->first('syn_phy_address1') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Street Address line 2 </label>
            <input name="syn_phy_address2" id="syn_phy_address2" type="text" class="form-control" data-error="#err_syn_phy_address1" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_phy_address2}}@endif">
            <span id="err_syn_phy_address2"></span>
            <span class="error">{{ ($errors->has('syn_phy_address2')) ? $errors->first('syn_phy_address2') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Country </label>
            <select class="form-control airport_list13 required" name="syn_phy_country" id="syn_phy_country" data-error="#err_syn_phy_country">
                <option value="">Choose</option>
                @foreach($country as $cntry)
                <option value="{{$cntry->id}}" @if($Hotelsynxiscrs) @if($cntry->id==$Hotelsynxiscrs->syn_phy_country) selected="selected" @endif @endif>{{$cntry->name}}
                </option>
                @endforeach
            </select>
            <span id="err_syn_phy_country"></span>
            <span class="error">{{ ($errors->has('syn_phy_country')) ? $errors->first('syn_phy_country') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>States </label>
            <select class="form-control airport_list14 required" name="syn_phy_state" id="syn_phy_state" data-error="#err_syn_phy_state">
                <option value="">Choose</option>
                @if($states) @foreach($states as $state)
                <option value="{{$state->id}}" @if($Hotelsynxiscrs) @if($state->id==$Hotelsynxiscrs->syn_phy_state) selected="selected" @endif @endif>{{$state->name}}
                </option>
                @endforeach @endif
            </select>
            <span id="err_syn_phy_country"></span>
            <span class="error">{{ ($errors->has('syn_phy_country')) ? $errors->first('syn_phy_country') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>City </label>
            <select class="form-control airport_list15 required" name="syn_phy_city" id="syn_phy_city" data-error="#err_syn_phy_city">
                <option value="">Choose</option>
                @if($cities) @foreach($cities as $city)
                <option value="{{$city->id}}" @if($Hotelsynxiscrs) @if($city->id==$Hotelsynxiscrs->syn_phy_city) selected="selected" @endif @endif>{{$city->name}}
                </option>
                @endforeach @endif
            </select>
            <span id="err_syn_phy_city"></span>
            <span class="error">{{ ($errors->has('syn_phy_city')) ? $errors->first('syn_phy_city') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Post code </label>
            <input name="syn_phy_postcode" id="syn_phy_postcode" type="text" class="form-control" data-error="#err_hotel_short_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_phy_postcode}}@endif">
            <span id="err_syn_phy_postcodee"></span>
            <span class="error">{{ ($errors->has('syn_phy_postcode')) ? $errors->first('syn_phy_postcode') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Rolling Inventory Amount </label>
            <input name="syn_invertry_amt" id="syn_invertry_amt" type="text" class="form-control" data-error="#err_syn_invertry_amt" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_invertry_amt}}@endif">
            <span id="err_syn_invertry_amt"></span>
            <span class="error">{{ ($errors->has('syn_invertry_amt')) ? $errors->first('syn_invertry_amt') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Phone and Fax</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Main Phone</label>
            <input name="syn_main_phone" id="syn_main_phone" type="text" class="form-control" data-error="#err_syn_main_phone" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_main_phone}}@endif">
            <span id="err_syn_main_phone"></span>
            <span class="error">{{ ($errors->has('syn_main_phone')) ? $errors->first('syn_main_phone') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Main Fax </label>
            <input name="syn_main_fax" id="syn_main_fax" type="text" class="form-control" data-error="#err_syn_main_fax" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_main_fax}}@endif">
            <span id="err_syn_main_fax"></span>
            <span class="error">{{ ($errors->has('syn_main_fax')) ? $errors->first('syn_main_fax') : ''}}</span>
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
            <input name="syn_latitude" id="syn_latitude" type="text" class="form-control" data-error="#err_syn_latitude" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_latitude}}@endif">
            <span id="err_syn_latitude"></span>
            <span class="error">{{ ($errors->has('syn_latitude')) ? $errors->first('syn_latitude') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Longitude</label>
            <input name="syn_longitude" id="syn_longitude" type="text" class="form-control" data-error="#err_syn_longitude" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_longitude}}@endif">
            <span id="err_syn_longitude"></span>
            <span class="error">{{ ($errors->has('syn_longitude')) ? $errors->first('syn_longitude') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property’s General Enquiry email address</label>
            <input name="syn_gen_enq_email" id="syn_gen_enq_email" type="text" class="form-control" data-error="#err_syn_gen_enq_email" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_gen_enq_email}}@endif">
            <span id="err_syn_gen_enq_email"></span>
            <span class="error">{{ ($errors->has('syn_gen_enq_email')) ? $errors->first('syn_gen_enq_email') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Property’s Website address</label>
            <input name="syn_web" id="syn_web" type="text" class="form-control" data-error="#err_syn_web" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_web}}@endif">
            <span id="err_syn_web"></span>
            <span class="error">{{ ($errors->has('syn_web')) ? $errors->first('syn_web') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Language Selection</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Default </label>
            <input name="syn_default_lang" id="syn_default_lang" type="text" class="form-control" data-error="#err_syn_default_lang" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_default_lang}}@endif">
            <span id="err_syn_default_lang"></span>
            <span class="error">{{ ($errors->has('syn_default_lang')) ? $errors->first('syn_default_lang') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 2 </label>
            <input name="syn_op2_lang" id="syn_op2_lang" type="text" class="form-control" data-error="#err_syn_op2_lang" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_op2_lang}}@endif">
            <span id="err_syn_op2_lang"></span>
            <span class="error">{{ ($errors->has('syn_op2_lang')) ? $errors->first('syn_op2_lang') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 3</label>
            <input name="syn_op3_lang" id="syn_op3_lang" type="text" class="form-control" data-error="#err_syn_op3_lang" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_op3_lang}}@endif">
            <span id="err_syn_op3_lang"></span>
            <span class="error">{{ ($errors->has('syn_op3_lang')) ? $errors->first('syn_op3_lang') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 4</label>
            <input name="syn_op4_lang" id="syn_op4_lang" type="text" class="form-control" data-error="#err_syn_op4_lang" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_op4_lang}}@endif">
            <span id="err_syn_op4_lang"></span>
            <span class="error">{{ ($errors->has('syn_op4_lang')) ? $errors->first('syn_op4_lang') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 5</label>
            <input name="syn_op5_lang" id="syn_op5_lang" type="text" class="form-control" data-error="#err_syn_op5_lang" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_op5_lang}}@endif">
            <span id="err_syn_op5_lang"></span>
            <span class="error">{{ ($errors->has('syn_op5_lang')) ? $errors->first('syn_op5_lang') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Option 6</label>
            <input name="syn_op6_lang" id="syn_op6_lang" type="text" class="form-control" data-error="#err_syn_op6_lang" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_op6_lang}}@endif">
            <span id="err_syn_op6_lang"></span>
            <span class="error">{{ ($errors->has('syn_op6_lang')) ? $errors->first('syn_op6_lang') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Currency</label>
            <input name="syn_currency" id="syn_currency" type="text" class="form-control" data-error="#err_syn_currency" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_currency}}@endif">
            <span id="err_hotel_short_name"></span>
            <span class="error">{{ ($errors->has('syn_currency')) ? $errors->first('syn_currency') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Time Zone</label>
            <input name="syn_time_zone" id="syn_time_zone" type="text" class="form-control" data-error="#err_syn_time_zone" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_time_zone}}@endif">
            <span id="err_syn_time_zone"></span>
            <span class="error">{{ ($errors->has('syn_time_zone')) ? $errors->first('syn_time_zone') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Main Airport</label>
            <input name="syn_airport" id="syn_airport" type="text" class="form-control" data-error="#err_syn_airport" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_airport}}@endif">
            <span id="err_syn_airport"></span>
            <span class="error">{{ ($errors->has('syn_airport')) ? $errors->first('syn_airport') : ''}}</span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Receiving Reservations from the SynXis CRS</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Via Email?</label>
            <select class="form-control" name="syn_via_email" id="syn_via_email">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_via_email=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_via_email=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_grp_name"></span>
            <span class="error">{{ ($errors->has('grp_name')) ? $errors->first('grp_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Email address</label>
            <input name="syn_via_email_add" id="syn_via_email_add" type="text" class="form-control" data-error="#err_syn_via_email_add" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_via_email_add}}@endif">
            <span id="err_syn_via_email_add"></span>
            <span class="error">{{ ($errors->has('syn_via_email_add')) ? $errors->first('syn_via_email_add') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Via Fax? </label>
            <select class="form-control" name="syn_via_fax" id="syn_via_fax">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_via_email=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_via_fax=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_hotel_id"></span>
            <span class="error">{{ ($errors->has('hotel_id')) ? $errors->first('hotel_id') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Phone Number </label>
            <input name="syn_via_fax_no" id="syn_via_fax_no" type="text" class="form-control" data-error="#err_syn_via_fax_no" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_via_fax_no}}@endif">
            <span id="err_syn_via_fax_no"></span>
            <span class="error">{{ ($errors->has('syn_via_fax_no')) ? $errors->first('syn_via_fax_no') : ''}}</span>
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
            <select class="form-control" name="syn_channel_1" id="syn_channel_1">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_1=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_1=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_syn_channel_1"></span>
            <span class="error">{{ ($errors->has('syn_channel_1')) ? $errors->first('syn_channel_1') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <textarea class="form-control" name="syn_channel_desc_1" id="syn_channel_desc_1">@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_channel_desc_1}}@endif</textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>IDS</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <select class="form-control" name="syn_channel_2" id="syn_channel_2">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_2=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_2=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_syn_channel_2"></span>
            <span class="error">{{ ($errors->has('syn_channel_2')) ? $errors->first('syn_channel_2') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <textarea class="form-control" name="syn_channel_desc_2" id="syn_channel_desc_2">@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_channel_desc_2}}@endif</textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Voice Agent</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <select class="form-control" name="syn_channel_3" id="syn_channel_3">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_3=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_3=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_syn_channel_3"></span>
            <span class="error">{{ ($errors->has('syn_channel_3')) ? $errors->first('syn_channel_3') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <textarea class="form-control" name="syn_channel_desc_3" id="syn_channel_desc_3">@if($Hotelsynxiscrs) {{$Hotelsynxiscrs->syn_channel_desc_3}}@endif</textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Booking Engine</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <select class="form-control" name="syn_channel_4" id="syn_channel_4">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_4=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_4=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_syn_channel_4"></span>
            <span class="error">{{ ($errors->has('hotel_short_name')) ? $errors->first('hotel_short_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <textarea class="form-control" name="syn_channel_desc_4" id="syn_channel_desc_4">@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_channel_desc_4}}@endif</textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Mobile Engine</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <select class="form-control" name="syn_channel_5" id="syn_channel_5">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_5=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_5=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_syn_channel_5"></span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <textarea class="form-control" name="syn_channel_desc_5" id="syn_channel_desc_5">@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_channel_desc_5}}@endif</textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Direct Connect</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <select class="form-control" name="syn_channel_6" id="syn_channel_6">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_6=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_channel_6=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_syn_channel_6"></span>
            <span class="error">{{ ($errors->has('syn_channel_6')) ? $errors->first('syn_channel_6') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <textarea class="form-control" name="syn_channel_desc_6" id="syn_channel_desc_6">@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_channel_desc_6}}@endif</textarea>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">Billing Contact</div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Primary Billing Contact</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input name="syn_pri_name" id="syn_pri_name" type="text" class="form-control" data-error="#err_syn_pri_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_pri_name}}@endif">
            <span id="err_syn_pri_name"></span>
            <span class="error">{{ ($errors->has('syn_pri_name')) ? $errors->first('syn_pri_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Title</label>
            <input name="syn_pri_title" id="syn_pri_title" type="text" class="form-control" data-error="#err_syn_pri_title" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_pri_title}}@endif">
            <span id="err_syn_pri_title"></span>
            <span class="error">{{ ($errors->has('syn_pri_title')) ? $errors->first('syn_pri_title') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_pri_phone" id="syn_pri_phone" type="text" class="form-control" data-error="#err_syn_pri_phone" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_pri_phone}}@endif">
            <span id="err_syn_pri_phone"></span>
            <span class="error">{{ ($errors->has('syn_pri_phone')) ? $errors->first('syn_pri_phone') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_pri_email" id="syn_pri_email" type="text" class="form-control" data-error="#err_syn_pri_email" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_pri_email}}@endif">
            <span id="err_syn_pri_email"></span>
            <span class="error">{{ ($errors->has('syn_pri_email')) ? $errors->first('syn_pri_email') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Additional Billing Contact</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input name="syn_add1_name" id="syn_add1_name" type="text" class="form-control" data-error="#err_syn_add1_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add1_name}}@endif">
            <span id="err_syn_add1_name"></span>
            <span class="error">{{ ($errors->has('syn_add1_name')) ? $errors->first('syn_add1_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Title</label>
            <input name="syn_add1_title" id="syn_add1_title" type="text" class="form-control" data-error="#err_syn_add1_title" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add1_title}}@endif">
            <span id="err_syn_add1_title"></span>
            <span class="error">{{ ($errors->has('syn_add1_title')) ? $errors->first('syn_add1_title') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_add1_phone" id="syn_add1_phone" type="text" class="form-control" data-error="#err_syn_add1_phone" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add1_phone}}@endif">
            <span id="err_syn_add1_phone"></span>
            <span class="error">{{ ($errors->has('syn_add1_phone')) ? $errors->first('syn_add1_phone') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_add1_email" id="syn_add1_email" type="text" class="form-control" data-error="#err_syn_add1_email" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add1_email}}@endif">
            <span id="err_syn_add1_email"></span>
            <span class="error">{{ ($errors->has('syn_add1_email')) ? $errors->first('syn_add1_email') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Additional Billing Contact</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input name="syn_add2_name" id="syn_add2_name" type="text" class="form-control" data-error="#err_syn_add2_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add2_name}}@endif">
            <span id="err_syn_add2_name"></span>
            <span class="error">{{ ($errors->has('syn_add2_name')) ? $errors->first('syn_add2_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Title</label>
            <input name="syn_add2_title" id="syn_add2_title" type="text" class="form-control" data-error="#err_syn_add2_title" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add2_title}}@endif">
            <span id="err_syn_add2_title"></span>
            <span class="error">{{ ($errors->has('syn_add2_title')) ? $errors->first('syn_add2_title') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_add2_phone" id="syn_add2_phone" type="text" class="form-control" data-error="#err_syn_add2_phone" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add2_phone}}@endif">
            <span id="err_syn_add2_phone"></span>
            <span class="error">{{ ($errors->has('syn_add2_phone')) ? $errors->first('syn_add2_phone') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_add2_email" id="syn_add2_email" type="text" class="form-control" data-error="#err_syn_add2_email" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_add2_email}}@endif">
            <span id="err_syn_add2_email"></span>
            <span class="error">{{ ($errors->has('syn_add2_email')) ? $errors->first('syn_add2_email') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>Technical Contact</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Name</label>
            <input name="syn_tec_name" id="syn_tec_name" type="text" class="form-control" data-error="#err_syn_tec_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_tec_name}}@endif">
            <span id="err_syn_tec_name"></span>
            <span class="error">{{ ($errors->has('syn_tec_name')) ? $errors->first('syn_tec_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Title</label>
            <input name="syn_tec_title" id="syn_tec_title" type="text" class="form-control" data-error="#err_syn_tec_title" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_tec_title}}@endif">
            <span id="err_syn_tec_title"></span>
            <span class="error">{{ ($errors->has('syn_tec_title')) ? $errors->first('syn_tec_title') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Phone </label>
            <input name="syn_tec_phone" id="syn_tec_phone" type="text" class="form-control" data-error="#err_syn_tec_phone" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_tec_phone}}@endif">
            <span id="err_syn_tec_phone"></span>
            <span class="error">{{ ($errors->has('syn_tec_phone')) ? $errors->first('syn_tec_phone') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Email </label>
            <input name="syn_tec_email" id="syn_tec_email" type="text" class="form-control" data-error="#err_syn_tec_email" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_tec_email}}@endif">
            <span id="err_syn_tec_email"></span>
            <span class="error">{{ ($errors->has('syn_tec_email')) ? $errors->first('syn_tec_email') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>GDS Representation</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Are you already represented in the GDS? </label>
            <select class="form-control" name="syn_already_rep">
                <option value="">Choose</option>
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_already_rep=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->syn_already_rep=='Yes') selected="selected" @endif @endif>Yes</option>
                <option value="I Don't Know" @if($Hotelsynxiscrs) @if($Hotelsynxiscrs->syn_already_rep=="I Don't Know") selected="selected" @endif @endif>I Don't Know</option>>
            </select>
            <span id="err_syn_already_rep"></span>
            <span class="error">{{ ($errors->has('syn_already_rep')) ? $errors->first('syn_already_rep') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Your current GDS Representation company name</label>
            <input name="syn_gds_comp_name" id="syn_gds_comp_name" type="text" class="form-control" data-error="#err_syn_gds_comp_name" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_gds_comp_name}}@endif">
            <span id="err_syn_gds_comp_name"></span>
            <span class="error">{{ ($errors->has('syn_gds_comp_name')) ? $errors->first('syn_gds_comp_name') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>- If you know the chain code, please enter it here</label>
            <input name="syn_chain_code" id="syn_chain_code" type="text" class="form-control" data-error="#err_syn_chain_code" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_chain_code}}@endif"> (max 2 alpha characters. Example: UI)
            <span id="err_syn_chain_code"></span>
            <span class="error">{{ ($errors->has('syn_chain_code')) ? $errors->first('syn_chain_code') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 mtb-15"><strong>- If you know them, your current GDS property codes:</strong></div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Sabre: </label>
            <input name="syn_property_code_sabre" id="syn_property_code_sabre" type="text" class="form-control" data-error="#err_syn_property_code_sabre" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_code_sabre}}@endif">
            <span id="err_syn_property_code_sabre"></span>
            <span class="error">{{ ($errors->has('syn_property_code_sabre')) ? $errors->first('syn_property_code_sabre') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Apollo/Galileo </label>
            <input name="syn_property_code_apollo" id="syn_property_code_apollo" type="text" class="form-control" data-error="#err_syn_property_code_apollo" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_code_apollo}}@endif">
            <span id="err_syn_property_code_apollo"></span>
            <span class="error">{{ ($errors->has('syn_property_code_apollo')) ? $errors->first('syn_property_code_apollo') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Worldspan</label>
            <input name="syn_property_code_worldspan" id="syn_property_code_worldspan" type="text" class="form-control" data-error="#err_syn_property_code_worldspan" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_code_worldspan}}@endif">
            <span id="err_syn_property_code_worldspan"></span>
            <span class="error">{{ ($errors->has('syn_property_code_worldspan')) ? $errors->first('syn_property_code_worldspan') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Amadeus </label>
            <input name="syn_property_code_amadeus" id="syn_property_code_amadeus" type="text" class="form-control" data-error="#err_syn_property_code_amadeus" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->syn_property_code_amadeus}}@endif">
            <span id="err_syn_property_code_amadeus"></span>
            <span class="error">{{ ($errors->has('syn_property_code_amadeus')) ? $errors->first('syn_property_code_amadeus') : ''}}</span>
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 mtb-15 accordion">PMS </div>
<div class="col-sm-12 col-md-12 col-lg-12 panel">
<div class=" row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>PMS Type</label>
            <select class="form-control" name="pms_type" id="pms_type" data-error="#err_pms_type">
                <option value="No" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->pms_type=='No') selected="selected" @endif @endif>No</option>
                <option value="Yes" @if($Hotelsynxiscrs)@if($Hotelsynxiscrs->pms_type=='Yes') selected="selected" @endif @endif>Yes</option>
            </select>
            <span id="err_pms_type"></span>
            <span class="error">{{ ($errors->has('pms_type')) ? $errors->first('pms_type') : ''}}</span>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>Version of PMS</label>
            <input name="pms_version" id="pms_version" type="text" class="form-control" data-error="#err_pms_version" value="@if($Hotelsynxiscrs){{$Hotelsynxiscrs->pms_version}}@endif">
            <span id="err_pms_version"></span>
            <span class="error">{{ ($errors->has('pms_version')) ? $errors->first('pms_version') : ''}}</span>
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
</div>
</div>
</div>
<!-- Steps ends -->
</div>
</div>
</form>
<script type="text/javascript">
// Get Time Zone
$(document).on("click", "#adduser", adduser);
function adduser(){
//salert('aa');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var lastname=$("#lastname").val();
    var firstname=$("#firstname").val();
    var email=$("#email").val();
    var hotel_id=$("#hotel_id").val();
    //alert(hotel_id+firstname);
    var password=$("#password").val();
    var host="{{ url('hotelier/addedUser') }}";  
    $.ajax({
        type: 'POST',
        data:{'firstname':firstname, 'lastname':lastname, 'email':email, 'password':password, 'hotel_id':hotel_id, '_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:{
//alert(res);
        }
    
    })
}
function load_model(val){
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id= val; 
    var edit_id=$('#edit_id').val();
    //alert(edit_id);
    var host="{{ url('hotelier/getuserdetail/') }}"; 
    $.ajax({
        type: 'POST',
        data:{'id': id,'edit_id':edit_id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response      
        success:renderdetails
    
    });
}
    function renderdetails(res){
        //console.log(res);
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
//     var host="{{ url('hotelier/userpw_updated') }}";  
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
var host = "{{ url('hotelier/zoneOffset/') }}";
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

var host = "{{ url('hotelier/getstates/') }}";
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

var host = "{{ url('hotelier/getcities') }}";
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

var host = "{{ url('hotelier/getstates/') }}";
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

var host = "{{ url('hotelier/getcities') }}";
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

var host = "{{ url('hotelier/airportList') }}";
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

var host = "{{ url('crm/getcities') }}";
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
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
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
var baseUrl = "{{ url('/') }}";
var token = "{{ Session::token() }}";
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

var add_bed_type = $('#add_bed_type' + roomId).val();
var add_bed_quantity = $('#add_bed_quantity' + roomId).val();
var add_bed_primary = ($('#add_bed_primary' + roomId).prop('checked') == true) ? "Yes" : "No";

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
    // var params = {
    // '_token': CSRF_TOKEN,'id': id,'roomId': roomId,'active': add_active,'room_code':add_room_code,'room_name': add_room_name,'total_room': add_total_room,'rolling_invetry': add_rolling_invetry,'room_category': add_room_category,'room_short_desc': add_room_short_desc,'room_long_desc': add_room_long_desc,'room_pms_code': add_room_pms_code,'room_class': add_room_class,'room_size': add_room_size,'ada_compliant': add_ada_compliant,'bed_type': add_bed_type,'bed_quantity': add_bed_quantity,'bed_primary': add_bed_primary,'total_guest_per_room': add_total_guest_per_room,'total_guest_per_room_un': add_total_guest_per_room_un,'adult_occupancy': add_adult_occupancy,'adult_occupancy_un': add_adult_occupancy_un,'child_occupancy': add_child_occupancy,'child_occupancy_un': add_child_occupancy_un,'child_age_limit': add_child_age_limit,'allow_extra_bed': add_allow_extra_bed,'price_adjustment_type': add_price_adjustment_type,'default_adjustment': add_default_adjustment,'room_min_size': add_room_min_size,'room_max_size': add_room_max_size,'room_size_units': add_room_size_units
    // }

// var filename1='uploadFile'+roomId;
// var filename2='uploadFile1'+roomId;
// var filename3='uploadFile2'+roomId;
// var filename4='uploadFile3'+roomId;

    var myFormData = new FormData();
    // myFormData.append('uploadFile', filename1.files);
    // myFormData.append('uploadFile1', filename2.files);
    // myFormData.append('uploadFile2', filename3.files);
    // myFormData.append('uploadFile3', filename4.files);
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

console.log(myFormData);

var host = "{{ url('hotelier/hotel/update-room') }}";

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

var add_bed_type = $('input[name="add_bed_type[]"]').map(function () {
    return this.value; 
}).get();

var add_bed_quantity = $('input[name="add_bed_quantity[]"]').map(function () {
    return this.value; 
}).get();

var add_bed_primary = $('input[name="add_bed_primary[]"]').map(function () {
    return this.value; 
}).get();

//var add_bed_primary = $("input[name='add_bed_primary']:checked").val();

//var add_bed_primary = $('#add_bed_primary').val();
//var add_bed_primary = ($('#add_bed_primary').prop('checked') == true) ? "Yes" : "No";

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


// else if (add_bed_type == '') {
// $('#err_add_bed_type').html('Choose a bed type');
// $('#add_bed_type').focus();
// } else if (add_bed_quantity == '') {
// $('#err_add_bed_quantity').html('Enter a bed quantity');
// $('#add_bed_quantity').focus();
// }
// var params={'_token':CSRF_TOKEN,'id': id,'active': add_active,'room_code': add_room_code,'room_name': add_room_name,'total_room': add_total_room,'rolling_invetry': add_rolling_invetry,'room_category': add_room_category,'room_short_desc': add_room_short_desc,'room_long_desc': add_room_long_desc,'room_pms_code': add_room_pms_code,'room_class': add_room_class,'room_size': add_room_size,'ada_compliant': add_ada_compliant,'bed_type': add_bed_type,'bed_quantity': add_bed_quantity,'bed_primary': add_bed_primary,'total_guest_per_room': add_total_guest_per_room,'total_guest_per_room_un': add_total_guest_per_room_un,'adult_occupancy': add_adult_occupancy,'adult_occupancy_un': add_adult_occupancy_un,'child_occupancy': add_child_occupancy,'child_occupancy_un': add_child_occupancy_un,'child_age_limit': add_child_age_limit,'allow_extra_bed': add_allow_extra_bed,'price_adjustment_type': add_price_adjustment_type,'default_adjustment': add_default_adjustment}

var myFormData = new FormData();
myFormData.append('uploadFile', uploadFile.files[0]);
myFormData.append('uploadFile1', uploadFile1.files[0]);
myFormData.append('uploadFile2', uploadFile2.files[0]);
myFormData.append('uploadFile3', uploadFile3.files[0]);
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
console.log(myFormData);
//alert(myFormData)
var host = "{{ url('hotelier/hotel/add-room') }}";
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

var host="{{ url('hotelier/hotel/add-synxis') }}";
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
var host = "{{ url('hotelier/hotel/update-restaurant') }}";

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

var host = "{{ url('hotelier/hotel/add-restaurant') }}";
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

var host = "{{ url('hotelier/hotel/add-bar') }}";
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

$("button#cloneair").click(function() {
var $div = $('tr[id^="airportinfo-form"]:first');
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
var divlength = $('tr[id^="airportinfo-form"]').length;
var $klon = $div.clone(true);
$klon.find('input,textarea,select').val('');
$klon.prop('id', 'airportinfo-form' + divlength);
$("#airportinfo-form-list").append($klon);
$('#airportinfo-form' + divlength).append('<td><button id=rem' + divlength + ' onclick="removediv(' + divlength + ')" type="button" class="btn btn-outline-secondary btn-rounded btn-icon"><i class="mdi mdi-close text-info"></i></button></td>');

$("#airportinfo-form" + divlength + " select#airportinfo").prop('class', 'form-control select2-hidden-accessible airportinfo' + divlength);
var $divnew = $('div[id^="airportinfo-form"]:last');

$divnew.find('input[type=text]:first').focus();
return false;
});

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

function removedivbedtype(val) {
var $cnid = $('#bedtype' + val);
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

@stop