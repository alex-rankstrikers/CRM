@extends('layouts.crm')

@section('head')

@stop

@section('content')
<style>
 .gap10{
  display: block;
  height: 10px;
  clear: both;
	}
.btnC{
background-color:#5FD0DF !important;
border-color:#5FD0DF !important;
}

#map {
    height: 100%;
  }
/*  html, body {
    width:550px;
    height:550px;
  }*/
.select2{
width: 100% !important;
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
.ui-datepicker-trigger{
    border:none;
    background:none;
}
</style>

  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
 <form id="commentForm" action="{{url('crm/eventsupdate')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                                                       
                            <div class="row mt-30 "></div>  
                            <span id="del_success" style="display: none;" class="alert alert-success" role="alert"></span>
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, task details has been successfully updated.</div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
					<div class="card mb-3">
         
          <div class="card-body">
			<h4 class="card-title">Edit Task</h4>
			<div class="row mt-30 "></div>
			<div class="col-sm-12 col-md-12 col-lg-12">
							
				            <input type="hidden" name="hle_id" id="hle_id" value="{{ $tasksE->hle_id }}" />
				            <input type="hidden" name="outlook_id" id="outlook_id" value="{{ $tasksE->outlook_id }}" />
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="row">
				  <div class="form-group col-sm-6 col-md-6 col-lg-6">
				  <label> Task Title:</label>
				  
				  <input type="text" name="hle_title" id="hle_title" class="form-control" value="{{ $tasksE->hle_title }}"/>
				  </div>
				  
				  <div class="form-group col-sm-6 col-md-6 col-lg-6">
				 <label>Task Type:</label>
				  
				  <select class="form-control  js-example-basic-single w-100" id="hle_task_type" name="hle_task_type" data-show-icon="true">
				  <option value="">Select</option>
				  @foreach ($task_types as $task_types)
				  <option value="{{ $task_types->hl_mt_id }}"{{ ( $tasksE->hle_task_type == $task_types->hl_mt_id) ? 'selected' : '' }} >{{ $task_types->task_name }}</option>
				 @endforeach
				</select>
				  </div>
				  
				  <div class="form-group col-sm-10 col-md-10 col-lg-10 aligncheck" id="list">
				  <label> Task For:</label>
				  <?php $i=1; ?>
				  @foreach ($task_for as $task_for)
				  <span><input name="task_for[]" id="task_for_<?php echo $i;?>" type="checkbox" value="{{ $task_for->hl_ms_id }}" class="task_for" onclick="aplbc_contact('{{ $task_for->hl_ms_id }}','{{ $task_for->hl_type }}')" onchange="load_task()">{{ $task_for->hl_service_name }}</input></span>		
				  <?php $i++; ?>
				  @endforeach
				  </div>
				  <input type="hidden" name="taskfor" id="taskfor" value="{{ $tasksE->hle_task_for }}">

				  <div class="form-group col-sm-10 col-md-10 col-lg-10 aligncheck" id="listA" style="margin-bottom: 10px;">
				  <label> Activity:</label>
				 @foreach ($activity as $activity)
				  <span><input name="activity[]" type="checkbox" value="{{ $activity->hl_act_id }}" >{{ $activity->hl_activity_name }}</input></span>
				 @endforeach
				  </div>
				  <input type="hidden" name="activity_hid" id="activity_hid" value="{{ $tasksE->hle_activity }}">
				  
				  <div class="form-group col-sm-2 col-md-2 col-lg-2">
				<!--  <a class="btn btn-lg btn-primary" href="{{ url('crm/signin') }}" role="button" id="connect-button">Connect to Outlook</a> -->
  
				  </div>
<input type="hidden" name="repeat_task_id_hid" id="repeat_task_id_hid" value="{{ $tasksE->repeat_task_id }}">

				<div class="form-group col-sm-6 col-md-6 col-lg-6" id="select_aplbc_contact" style="display:none;float: left;" >
				<label>Select Contacts:</label>

				<select class="form-control js-example-basic-multiple w-100 " multiple="multiple"  name="hle_contacts[]" id="hle_contacts" > 
					@foreach($usersSet as $user)
					<option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
					@endforeach
				</select>  
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12"></div>
				<input type="hidden" name="hle_activity_hid" id="hle_activity_hid" value="{{ $tasksE->hle_contacts }}">

					<div class="form-group col-sm-6 col-md-6 col-lg-6" id="select_all_hotels" style="float: left;" >
					<label>Select Hotels:</label>

					<select class="form-control js-example-basic-multiple w-100 hotels_name" multiple="multiple"  name="hotels_name[]" id="hotels_name" > 
						
					</select>  
					</div>
					<input type="hidden" name="hotels_name_hid" id="hotels_name_hid" value="{{ $tasksE->hle_applicable_All_Hotels }}">
					<div class="form-group col-sm-6 col-md-6 col-lg-6" id="select_contact" style="float: left;">
					<label>Contacts:</label>
					<select class="form-control js-example-basic-multiple w-100 "  name="hotel_contacts[]" id="hotel_contacts" style="margin-left:30px;" multiple="multiple"> 
						<option>---Choose---</option>
					</select>				  
					</div>
					<input type="hidden" name="hotel_contacts_hid" id="hotel_contacts_hid" value="{{ $tasksE->hle_applicable_contacts }}">

				<div  class="col-sm-12 col-md-12 col-lg-12 "></div>


				<div id="invitenew_section" class="col-sm-12 col-md-12 col-lg-12 cform ">
					<div class="col-sm-12 col-md-12 col-lg-12 cform " id="ag_corporate_new_form0" style="margin-left: -30px;">
					
					<input type="hidden" name="hle_guest_id_hid" id="hle_guest_id_hid" 
					 value="@for($i=0;$i<count($guestE);$i++){{ $guestE[$i]['hle_guest_id'] }},@endfor" >
					<input type="hidden" name="searchbar_agents_hid" id="searchbar_agents_hid" 
					 value="@for($i=0;$i<count($guestE);$i++){{ $guestE[$i]['searchbar_agents'] }},@endfor" >
					 <input type="hidden" name="hle_guests_hid" id="hle_guests_hid" 
					 value="@for($i=0;$i<count($guestE);$i++){{ $guestE[$i]['hle_guests'] }},@endfor" >
					<div class="col-sm-6 col-md-6 col-lg-6 copy-cls" style="float: left; margin-top: 10px;" id="copy-cls">
					<label>Select Agents/Corporates:</label>

					<select class="form-control js-example-basic-single w-100 searchbar_agents"  name="searchbar_agents[]" id="searchbar_agents_0" style="width: 107%;"> 
						<option value="">Select</option>
 						<optgroup label="Agents">
						@foreach ($hl_business_name as $hl_business_name)
						<option value="a{{ $hl_business_name->hl_agentcont_id }}" >{{ $hl_business_name->hl_business_name }}</option>
						@endforeach	
						</optgroup>
						<optgroup label="Corporate ">
						@foreach ($hl_corporate_name as $hl_corporate_name)
						<option value="c{{ $hl_corporate_name->hl_ccb_id }}" >{{ $hl_corporate_name->hl_business_name }}</option>
						@endforeach
					</optgroup>
					</select>  
					</div>
					<input type="hidden" name="searchbar_agents_hid" id="searchbar_agents_hid" value="{{ $tasksE->hle_guest_id }}">
				<div class="col-sm-5 col-md-5 col-lg-5" style="float: left; margin-left:30px;margin-top: 10px;    width: 380px;  ">
					<label>Guests:</label>
					<select class="form-control js-example-basic-single w-100 hle_guests "  name="hle_guests[]" id="hle_guests_0" style="margin-left:30px;width: 110%;"> 
						<option>---Choose---</option>
					</select>				  
				</div>
				<input type="hidden" name="hl_hidden_value" id="hl_hidden_value">
				<input type="hidden" name="hle_guests_hid" id="hle_guests_hid" value="{{ $tasksE->hle_guest_id }}">
				<input type="hidden" name="attendee_mail[]" id="attendee_mail_0">
				<input type="hidden" name="hle_guest_id[]" id="hle_guest_id_0"/>
				
				<div  id="removeplus_0" class="col-sm-1 col-md-1 col-lg-1" style="float: left;margin-top: 38px;">
				<button style="margin-left:37px;" type="button" id="clone1" class="btn btn-inverse-info btn-icon">
				<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
				</div>
				</div>
				</div>
				<div class="form-group col-sm-12 col-md-12 col-lg-12">
				</div>

				  <div class="form-group col-sm-3 col-md-3 col-lg-3">
	
				  <div class="form-group">
				   <label>Start Date & Time:</label><br>
				  <div class="flex-items">

				  <input class="form-control" type="text" style="width:60%" autocomplete = "off" name="hle_start_date" id="hle_start_date" class="date" value="   {{ date('d/m/Y',strtotime($tasksE->hle_start_date)) }}"/>
				  <select class="form-control" style="width:40%;padding:0px;" name="hle_start_hour" id="hle_start_hour">
					 @foreach($time as $hm)
					 <?php $hour=date('H:i',strtotime($tasksE->hle_start_date)); ?>
					 <option value="{{$hm->time}}" @if($hm->time==$hour) selected @endif>&nbsp;&nbsp;&nbsp;{{$hm->time}}</option>
					 @endforeach
				 </select>
				  </div>
				  </div>
				  </div>
				  <div class="form-group col-sm-3 col-md-3 col-lg-3">
				  <div class="form-group">
				  <label>End Date & Time:</label><br>
				  <div class="flex-items">
				  <input class="form-control" type="text" style="width:60%" autocomplete = "off" name="hle_end_date" id="hle_end_date" class="date"  value="   {{ date('d/m/Y',strtotime($tasksE->hle_end_date)) }}"/>
					<select class="form-control"  style="width:40%;padding:0px;" name="hle_end_hour" id="hle_end_hour"  >
				     @foreach($time as $h_m)
					 <?php $endhour=date('H:i',strtotime($tasksE->hle_end_date)); ?>
					 <option value="{{$h_m->time}}"@if($h_m->time==$endhour) selected @endif>&nbsp;&nbsp;&nbsp;{{$h_m->time}}</option>
					 @endforeach
				 </select> </div>
				  </div>
				  </div>
				  <div class="col-sm-6 col-md-6 col-lg-6 flex-items">
				  
				  <div class="flex-items" style=" width:64%;" >
				  <div style="width:75%;margin-top: 35px;" >
				  
										<div style=""><input type="checkbox" name="hle_recurr_status" id="hle_recurr_status" value="1" onClick="openwin(this.checked);" >&nbsp;&nbsp;&nbsp;Repeat Task
										<input type="hidden" name="hle_recurr_status_hid" id="hle_recurr_status_hid" value="{{ $tasksE->hle_recurr_status }}">
										<input type="hidden" name="hle_recurr_dur_hid" id="hle_recurr_dur_hid" value="{{ $tasksE->hle_recurr_duration }}">
										<input type="hidden" name="hle_recurr_cnt_hid" id="hle_recurr_cnt_hid" value="{{ $tasksE->hle_recurr_cnt }}">
						</div>
					</div>
				 
				   
				   <select  style="margin-right: 15px;margin-top: 26px;" aria-label="Repeat frequency" name="hle_recurr_duration" id="hle_recurr_duration" class="form-control required">
				  	  <option value="">Select</option>
					  <option value="WEEKLY" id="ember228" class="native-single-select-option ember-view">Week(s)</option>
					  <option value="MONTHLY" id="ember229" class="native-single-select-option ember-view">Month(s)</option>
					  <option value="YEARLY" id="ember230" class="native-single-select-option ember-view">Year(s)</option>
					
				</select>
				 
				  </div>
				  
				   
				   <?php
				  $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
				  $cntv = count($tzlist);
				  ?>
				  <input type="hidden" name="hle_timezone_hid" id="hle_timezone_hid" value="{{ $tasksE->hle_timezone }}">
					<div class="form-group">
				   <label>Timezone:</label>
				   <select class="form-control js-example-basic-single w-100" name="hle_timezone" id="hle_timezone" >
				   @for($ff=0;$ff<$cntv;$ff++)
				  <option value="{{ $tzlist[$ff] }}" >{{ $tzlist[$ff]  }}</option>
				  @endfor
				  </select>
				 
				  
				  </div>
				  
				  </div>
				  
				  <div class="form-group col-sm-12 col-md-12 col-lg-12" id="changeto" style="display:none;">
				    <label>Change To: </label>
				  	<span><input type="radio" id="change_to"  name="change_to" value="1"> Only this event </span>
				  	<span><input type="radio" id="change_to1" name="change_to" value="2"> All event </span>
				  	<span style="color:red;" id="change_to_error"></span>
				  </div>
				  					
				  <input type="hidden" name="show_location_hid" id="show_location_hid" value="{{ $tasksE->show_location }}">
				  <input type="hidden" name="hle_location_hid" id="hle_location_hid" value="{{ $tasksE->hle_location }}">
				  <input type="hidden" name="repeat_task_id" id="repeat_task_id" value="<?php echo rand()?>">

				<!-- <div class="form-group col-sm-6 col-md-6 col-lg-6" >
				  <label>Location:</label>
				  
				  <input type="text" class="form-control" id="search_input" onkeyup="show_map()" onblur="hide_map()" name="hle_location" autocomplete="on">
				  
				  </input>
						 
				  </div> -->
<!-- -start-->
				  
					<div class="form-group col-sm-6 col-md-6 col-lg-6" style="width:400px;">
						<input type="checkbox"  id="show_location" onclick="open_location()" name="show_location" value="1"> <span style="margin-bottom: 5px;">&nbsp;Guest/Agent Location</span>
						<div  style="margin-top: 10px;"></div>	
						<div class="pac-card" id="pac-card" style="right: 20;left: 30px;">
							<div>
							<div id="label">
							Location Search
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
				  
				   <textarea name="hle_description" class="myTextEditor" id="hle_description">{{ $tasksE->hle_description }} </textarea>
				   </div>



					  <div class="form-group col-sm-6 col-md-6 col-lg-6">
				  <div class="form-group">
				  
				  
				  </div>
				  </div>
				
			<div class="container">	  
			  <div class="panel-group">
				<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title ">
						  <p><a class="accordion collapsed" data-toggle="collapse" onclick="show_add()" href="#collapse1">Outcome & Nextstep</a></p>
						</h4>
					  </div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<!-- <div class="col-sm-12 col-md-12 col-lg-12"> -->

							  <input type="hidden" name="_token" value="{{ csrf_token() }}">

							  <input type="hidden" name="my_api_token" id="my_api_token" value="<?php //echo $_SESSION['acc_token'];?>">
							  <?php //dd($outcomeE);?>

							  <div id="outcomediv">
							  <div id="outcome_section" class="row" >
							  	<div id="removelink" class="form-group col-sm-12 col-md-12 col-lg-12">
								   <!-- <a href="" style = "" id="clone" class="btn btn-outline-inverse-info btn-sm pull-right">Add</a> -->
								    </div>
								  <div class="form-group col-sm-6 col-md-12 col-lg-6 appto">
									  <label style="vertical-align:text-top;"> Applicable To:</label>
										<select class="form-control js-example-basic-multiple w-100 applicable_to" multiple="multiple"  name="applicable_to_0[]" id="applicable_to_0" style="width:90%;"> 
											
										</select> 
								  </div>
								  <div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="padding: 0px 10px 0px 0px;">Nextstep:</label>
									<select class="form-control std_nextsteps"  id="std_nextsteps_0" name="std_nextsteps[]" data-show-icon="true">
									<option value="">Select</option>
									@foreach ($task_types1 as $task_type)
									<option value="{{ $task_type->hl_mt_id }}" >{{ $task_type->task_name }}</option>
									@endforeach
									</select>
							  		</div>
							  		<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="padding: 0px 10px 0px 0px;">Outcome:</label>
									<select class="form-control std_outcomes" style="margin-right: 5px;" id="std_outcomes_0" name="std_outcomes[]" data-show-icon="true">
									<option value="">Select</option>
									@foreach ($outcomes as $outcomes2)
									<option value="{{ $outcomes2->hl_out_id }}" >{{ $outcomes2->hl_out_title }}</option>
									@endforeach
									</select>					
									</div>
									<div class="form-group col-sm-3 col-md-3 col-lg-3">
									  <div class="form-group">
									   <label>Start Date & Time:</label><br>
									  <div class="flex-items">
									  
									  <input class="form-control start_date" type="text" style="width:60%" autocomplete = "off" name="start_date[]" id="start_date_0" class="date" />

									  
										<!-- <i class="fa fa-clock-o" aria-hidden="true"></i> -->
									  <select class="form-control" style="width:40%;padding:0px;" name="start_hour[]" id="start_hour_0">
										 @foreach($time as $hm1)
										 <option value="{{$hm1->time}}">&nbsp;&nbsp;&nbsp;{{$hm1->time}}</option>
										 @endforeach
									 </select>
									  
									  </div>
									  </div>
									  </div>
									  <div class="form-group col-sm-3 col-md-3 col-lg-3">
									  <div class="form-group">
									  <label>End Date & Time:</label><br>
									  <div class="flex-items">
									  <input class="form-control end_date" type="text" style="width:60%" autocomplete = "off" name="end_date[]" id="end_date_0" class="date" />
									   <select class="form-control"  style="width:40%;padding:0px;" name="end_hour[]" id="end_hour_0"  >
									     @foreach($time as $h_m1)
										 <option value="{{$h_m1->time}}">&nbsp;&nbsp;&nbsp;{{$h_m1->time}}</option>
										 @endforeach
									 </select>
									  </div>
									  </div>
									  </div>
								 
								 <div class="form-group col-sm-6 col-md-6 col-lg-6">
								  <!-- <label>Outcome:</label> -->
								 <!--  <input type="text"  name="hle_outcome[]" id="hle_outcome_0" class="tinymce" value="" /> -->
								 <textarea name="hle_outcome[]" id="hle_outcome_0" class="myTextEditor"></textarea>
								  
								  </div>
								  <div class="col-sm-6 col-md-6 col-lg-6">
								<div class="col-sm-12 col-md-12 col-lg-12 flex-items" style="margin-top: -20px;">

								<div class="flex-items" style=" width:64%;" >
								<div style="width:100%;margin-left: -15px;margin-top: 35px;" >

								<div style=""><input type="checkbox" name="oc_recurr_status_0" id="oc_recurr_status_0" value="1" onClick="openwin(this.checked);" >&nbsp;&nbsp;&nbsp;Repeat Task


								</div>
								</div>


								<select  style="margin-right: 15px;margin-top: 26px;" aria-label="Repeat frequency" name="oc_recurr_duration[]" id="oc_recurr_duration_0" class="form-control required">
									<option value="">Select</option>
								<option value="WEEKLY" id="ember228" class="native-single-select-option ember-view">Week(s)</option>
								<option value="MONTHLY" id="ember229" class="native-single-select-option ember-view">Month(s)</option>
								<option value="YEARLY" id="ember230" class="native-single-select-option ember-view">Year(s)</option>

								</select>

								</div>
							
								<?php
								$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
								$cntv = count($tzlist);
								?>
								<div class="form-group" style="margin-right: -15px;">
								<label>Timezone:</label>
								<select class="form-control js-example-basic-single w-100 oc_timezone" name="oc_timezone[]" id="oc_timezone_0" >
								@for($ff=0;$ff<$cntv;$ff++)
								<option value="{{ $tzlist[$ff] }}" >{{ $tzlist[$ff]  }}</option>
								@endfor
								</select>


								</div>

								</div>
								<div class="form-group col-sm-12 col-md-12 col-lg-12" style="margin-left: -15px;">
								<!-- <label>Next Step:</label> -->
								<textarea name="hle_next_step[]" id="hle_nextstep_0" class="myeditable"></textarea>

								  <!-- <input type="textarea"  name="hle_next_step[]" id="hle_nextstep_0" class="form-control"  value="" style="height: 320px;" /> -->
								  </div>	
								</div>

									<input type="hidden" name="hl_ocns_id[]" id="hl_ocns_id_0" value="" />

								   
							  		<input type="hidden" name="hle_status" value="1" />
						
							 
							  </div>


							  @if($outcomeE)							 
							  <?php $i=1;?>
							  @foreach($outcomeE as $outcomeV)
							  <?php 
							    $app_hotel = $outcomeV['applicable_All_Hotels'];
								$appli_hotel = explode(',', $app_hotel);
								//$edit_app=count($array_dataA);
								?>
							 
							  
			  <div id="outcome_section{{$i}}" class="row" >		
			  			<div id="removelink{{$i}}" class="form-group col-sm-12 col-md-12 col-lg-12">
						 	<div align="right" class="pull-right"><span id=rem{{$i}} onclick="removediv('{{$i}}')" class="mdi mdi-window-close" style="border: 1px solid red;border-radius: 50%;padding: 3px 5px;background-color: #ffbfbf;"></span>
						 	</div>
						</div>			
				  <div class="form-group col-sm-6 col-md-12 col-lg-6 appto">
					  <label style="vertical-align:text-top;"> Applicable To:</label>
						<select class="form-control js-example-basic-multiple w-100 applicable_to" multiple="multiple"  name="applicable_to_{{$i}}[]" id="applicable_to_{{$i}}" style="width:90%;"> 
									
						<optgroup label="Europe">
							@if($sleadsA)
							@foreach($sleadsA as $sleads1)
							@if((!empty($sleads1->hl_name)) && ($sleads1->hl_regional_name=='Europe'))
							<option value="h{{$sleads1->hl_id}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='h'.$sleads1->hl_id;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads1->hl_name}}</option>
							@endif
							@endforeach
							@endif

							@if($sleadsB)
							@foreach($sleadsB as $sleads2)
							@if((!empty($sleads2->hotel_name)) && ($sleads2->hl_regional_name=='Europe'))
							<option value="p{{$sleads2->hlid}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='p'.$sleads2->hlid;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads2->hotel_name}}</option>
							@endif
							@endforeach
							@endif
						</optgroup>
						<optgroup label="Middle East & Africa">
							@if($sleadsA)
							@foreach($sleadsA as $sleads1)
							@if((!empty($sleads1->hl_name)) && ($sleads1->hl_regional_name=='Middle East & Africa'))
							<option value="h{{$sleads1->hl_id}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='h'.$sleads1->hl_id;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads1->hl_name}}</option>
							@endif
							@endforeach
							@endif

							@if($sleadsB)
							@foreach($sleadsB as $sleads2)
							@if((!empty($sleads2->hotel_name)) && ($sleads2->hl_regional_name=='Middle East & Africa'))
							<option value="p{{$sleads2->hlid}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='p'.$sleads2->hlid;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads2->hotel_name}}</option>
							@endif
							@endforeach
							@endif
						</optgroup>
						<optgroup label="APAC">
							@if($sleadsA)
							@foreach($sleadsA as $sleads1)
							@if((!empty($sleads1->hl_name)) && ($sleads1->hl_regional_name=='APAC'))
							<option value="h{{$sleads1->hl_id}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='h'.$sleads1->hl_id;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads1->hl_name}}</option>
							@endif
							@endforeach
							@endif

							@if($sleadsB)
							@foreach($sleadsB as $sleads2)
							@if((!empty($sleads2->hotel_name)) && ($sleads2->hl_regional_name=='APAC'))
							<option value="p{{$sleads2->hlid}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='p'.$sleads2->hlid;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads2->hotel_name}}</option>
							@endif
							@endforeach
							@endif
						</optgroup>
						<optgroup label="South America">
							@if($sleadsA)
							@foreach($sleadsA as $sleads1)
							@if((!empty($sleads1->hl_name)) && ($sleads1->hl_regional_name=='South America'))
							<option value="h{{$sleads1->hl_id}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='h'.$sleads1->hl_id;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads1->hl_name}}</option>
							@endif
							@endforeach
							@endif

							@if($sleadsB)
							@foreach($sleadsB as $sleads2)
							@if((!empty($sleads2->hotel_name)) && ($sleads2->hl_regional_name=='South America'))
							<option value="p{{$sleads2->hlid}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='p'.$sleads2->hlid;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads2->hotel_name}}</option>
							@endif
							@endforeach
							@endif
						</optgroup>
						<optgroup label="North America">
							@if($sleadsA)
							@foreach($sleadsA as $sleads1)
							@if((!empty($sleads1->hl_name)) && ($sleads1->hl_regional_name=='North America'))
							<option value="h{{$sleads1->hl_id}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='h'.$sleads1->hl_id;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads1->hl_name}}</option>
							@endif
							@endforeach
							@endif

							@if($sleadsB)
							@foreach($sleadsB as $sleads2)
							@if((!empty($sleads2->hotel_name)) && ($sleads2->hl_regional_name=='North America'))
							<option value="p{{$sleads2->hlid}}" @foreach ($appli_hotel as $key => $value)
								<?php $chek='p'.$sleads2->hlid;?>
							@if($chek == $value) selected="selected" @endif @endforeach>{{$sleads2->hotel_name}}</option>
							@endif
							@endforeach
							@endif
						</optgroup>			
											
					</select> 
			  </div>
								  <div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="padding: 0px 10px 0px 0px;">Nextstep:</label>
									<select class="form-control std_nextsteps"  id="std_nextsteps_{{$i}}" name="std_nextsteps[]" data-show-icon="true">
									<option value="0">Select</option>

									@foreach ($task_types1 as $task_type)
									<option value="{{ $task_type->hl_mt_id }}" {{ ( $outcomeV['std_nextsteps']==$task_type->hl_mt_id) ? 'selected' : '' }}>{{ $task_type->task_name }}</option>
									@endforeach
									</select>
							  		</div>
							  		<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="padding: 0px 10px 0px 0px;">Outcome:</label>
									<select class="form-control std_outcomes" style="margin-right: 5px;" id="std_outcomes_{{$i}}" name="std_outcomes[]" data-show-icon="true">
									<option value="0">Select</option>
									@foreach ($outcomes as $outcomes1)
									<option value="{{ $outcomes1->hl_out_id }}" {{ ( $outcomeV['std_outcomes']==$outcomes1->hl_out_id) ? 'selected' : '' }}>{{ $outcomes1->hl_out_title }}</option>
									@endforeach	
									</select>					
									</div>
									<div class="form-group col-sm-3 col-md-3 col-lg-3">
									  <div class="form-group">
									   <label>Start Date & Time:</label><br>
									  <div class="flex-items">
									  
									  <input class="form-control start_date" type="text" style="width:60%" autocomplete = "off" name="start_date[]" id="start_date_{{$i}}" value="   {{ date('d/m/Y',strtotime($outcomeV['start_date'])) }}" class="date" />

									  
										<!-- <i class="fa fa-clock-o" aria-hidden="true"></i> -->
									  <select class="form-control" style="width:40%;padding:0px;" name="start_hour[]" id="start_hour_{{$i}}">
										 @foreach($time as $hm1)
										  <?php $starthourr=$outcomeV['start_hour']; ?>
										 <option value="{{$hm1->time}}"@if($hm1->time==$starthourr) selected @endif>&nbsp;&nbsp;&nbsp;{{$hm1->time}}</option>
										 @endforeach
									 </select>
									  
									  </div>
									  </div>
									  </div>
									  <div class="form-group col-sm-3 col-md-3 col-lg-3">
									  <div class="form-group">
									  <label>End Date & Time:</label><br>
									  <div class="flex-items">
									  <input class="form-control end_date" type="text" style="width:60%" autocomplete = "off" name="end_date[]" id="end_date_{{$i}}" value="   {{ date('d/m/Y',strtotime($outcomeV['end_date'])) }}" class="date" />
									   <select class="form-control"  style="width:40%;padding:0px;" name="end_hour[]" id="end_hour_{{$i}}"  >
									     @foreach($time as $h_m1)
										<?php $endhourr=$outcomeV['end_hour']; ?>
										 <option value="{{$h_m1->time}}"@if($h_m1->time==$endhourr) selected @endif>&nbsp;&nbsp;&nbsp;{{$h_m1->time}}</option>
										 @endforeach
									 </select>
									  </div>
									  </div>
									  </div>
								  <div class="form-group col-sm-6 col-md-6 col-lg-6">
								  <!-- <label>Outcome:</label> -->
								 <!--  <input type="text"  name="hle_outcome[]" id="hle_outcome_0" class="tinymce" value="" /> -->
								  <textarea name="hle_outcome[]" id="hle_outcome_{{$i}}" class="myTextEditor">{{$outcomeV['hl_outcome']}}</textarea>
								  
								  </div>
							  	<input type="hidden" name="hle_status" value="1" />
								<div class="col-sm-6 col-md-6 col-lg-6 ">
								<div class="col-sm-12 col-md-12 col-lg-12 flex-items" style="margin-top: -20px;">

								<div class="flex-items" style=" width:64%;" >
								<div style="width:100%;margin-left: -15px;margin-top: 35px;" >

								<div style=""><input type="checkbox" name="oc_recurr_status_{{$i}}" id="oc_recurr_status_{{$i}}" value="1" @if($outcomeV['oc_recurr_status']==1) checked @endif onClick="openwin(this.checked);" >&nbsp;&nbsp;&nbsp;Repeat Task


								</div>
								</div>


								<select  style="margin-right: 15px;margin-top: 26px;" aria-label="Repeat frequency" name="oc_recurr_duration[]" id="oc_recurr_duration_{{$i}}" class="form-control required">
								<?php $frequency=$outcomeV['oc_recurr_duration'];?>
								<option value="">Select</option>
								<option value="WEEKLY" @if($frequency=='WEEKLY') selected @endif id="ember228" class="native-single-select-option ember-view">Week(s)</option>
								<option value="MONTHLY"@if($frequency=='MONTHLY') selected @endif id="ember229" class="native-single-select-option ember-view">Month(s)</option>
								<option value="YEARLY"@if($frequency=='YEARLY') selected @endif id="ember230" class="native-single-select-option ember-view">Year(s)</option>

								</select>

								</div>
							
								<?php
								$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
								$cntv = count($tzlist);
								?>
								<div class="form-group" style="margin-right: -15px;">
								<label>Timezone:</label>
								<select class="form-control js-example-basic-single w-100 oc_timezone" name="oc_timezone[]" id="oc_timezone_{{$i}}" >
								@for($ff=0;$ff<$cntv;$ff++)
								<?php $time_zone1=$outcomeV['oc_timezone'];?>
								<option value="{{ $tzlist[$ff] }}" @if($tzlist[$ff]==$time_zone1) selected @endif>{{ $tzlist[$ff]  }}</option>
								@endfor
								</select>


								</div>

								</div>
								<div class="form-group col-sm-12 col-md-12 col-lg-12" style="margin-left: -15px;">
								<!-- <label>Next Step:</label> -->
								<textarea name="hle_next_step[]" id="hle_nextstep_{{$i}}" class="myeditable" >{{$outcomeV['hl_nextstep']}}</textarea>

								  <!-- <input type="textarea"  name="hle_next_step[]" id="hle_nextstep_{{$i}}" class="form-control"  value="{{$outcomeV['hl_nextstep']}}" style="height: 320px;" /> -->
								  </div>	
								</div>


								   
							 		<input type="hidden" name="hl_ocns_id[]" id="hl_ocns_id_{{$i}}" value="{{$outcomeV['hl_ocns_id']}}" />

							  		<input type="hidden" name="hle_status" value="1" />
							  									  
								 
							 
							  </div>
							 
							  <?php $i++;?>
							  @endforeach
							  @endif
							  </div>

						<!-- </div>  --> 
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6">
										<!-- 	<input type="button" class="btn btn-crm" style="width:auto"  id="deletebut" value="Save"> -->
					<input type="hidden" name="event_id_hid" id="event_id_hid" value="{{ $tasksE->hle_id }}">
					<a id="deletebut" onclick="del_event('{{ $tasksE->hle_id }}')" href="javascript::void(0);" class="btn btn-outline-inverse-info btn-lg btn-crm" >Delete</a>&nbsp;&nbsp;&nbsp;
					<a id="completebut"  class="btn btn-outline-inverse-info btn-lg btn-crm" href="{{url('crm/completevent')}}/{{ $tasksE->hle_id }}">Complete Task</a>
					</div>
					
					
					<div class="col-sm-6 col-md-6 col-lg-6 pull-right">
						<a href="{{url('crm/events')}}" class="btn btn-outline-inverse-info btn-lg" >Cancel</a>
					<button type="submit" class="btn btn-primary btn-lg" style="width:auto;margin-right: -5px;"  id="event_update" value="Save"> Save</button>&nbsp;
					<a href="" style = "display: none;margin-left: 5px;" id="clone" class="btn btn-outline-inverse-info btn-lg pull-right">Add</a>
					
					</div>
					</div>
				
	  </div>
  
  </div>
  
  </div>
  </div>
  </div>
  </div>
</form>
    <script>
function show_add(){
	setTimeout(function(){
	$("#clone").toggle();
	},500);
}
function del_event(val){

	var hle_recurr_status=$("#hle_recurr_status_hid").val();
	var change_to=$("input[name=change_to]:checked").val();
	var repeat_task_id=$("#repeat_task_id_hid").val();
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var host="{{url('crm/deleteevent')}}";	
	var rhost="{{url('')}}";	
	if(hle_recurr_status==1){
		if(change_to===undefined){
			  $("#change_to_error").html('Please Choose Change Type');
		      return false;
			
		}else{
			$("#change_to_error").html('');
			$.ajax({
			type: 'POST',
			data:{'id': val,'change_to': change_to,'repeat_task_id': repeat_task_id,'_token':CSRF_TOKEN},
			url: host,
			dataType: "json", // data type of response		
			success: function(res) {
				//alert(res.status);
				$("#del_success").show();
				$("#del_success").html('Event successfully deleted.');
				setTimeout(function () {
				window.location = rhost+"/crm/events?status=1";
				} , 2000);
          		}
          	});
		
		}
	}
	else{
			$.ajax({
			type: 'POST',
			data:{'id': val,'change_to': change_to,'repeat_task_id': repeat_task_id,'_token':CSRF_TOKEN},
			url: host,
			dataType: "json", // data type of response	
			success: function(res) {
				$("#del_success").show();
				$("#del_success").html('Event successfully deleted.');
				setTimeout(function () {
				window.location = rhost+"/crm/events?status=1";

				} , 2000);
          		}	
			});
	}
}
function aplbc_contact(val,val1){
	var checkedVals = $('.task_for:checkbox:checked').map(function() {
				return this.value;
			}).get();
	//alert(checkedVals);
	if(checkedVals!=''){
			if(val1=='2'){
				if(val=='4'){
				$("#select_aplbc_contact").toggle();
				}
			}
			else if(val1=='1'){
				if(val=='1'){
					$("#select_contact").show();
					$("#select_all_hotels").show();
				}else if(val=='2'){
					$("#select_contact").show();
					$("#select_all_hotels").show();
				}
			}
		}else{
		$("#select_all_hotels").hide();
		$("#select_aplbc_contact").hide();
		$("#select_contact").hide();
	}
}
$(".task_for").change(function() {
	$("#hl_hidden_value").val('');
	var checkedVals = $('.task_for:checkbox:checked').map(function() {
	return this.value;
	}).get();
	if(checkedVals=='1'){
		$("#select_contact").show();
		$("#select_all_hotels").show();
	}else if(checkedVals=='2'){
		$("#select_contact").show();
		$("#select_all_hotels").show();
	}else if(checkedVals==''){
		$("#select_all_hotels").hide();
		$("#select_contact").hide();
	}
});

load_task();
function load_task(){
			
			var checkedVals = $('.task_for:checkbox:checked').map(function() {
				return this.value;
			}).get();
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			var host="{{ url('crm/gethotels/') }}";	
			$.ajax({
			type: 'POST',
			data:{'checkedVals': checkedVals,'_token':CSRF_TOKEN},
			url: host,
			dataType: "json", // data type of response		
			success:rendergethotels

			})
}


function rendergethotels(res){
	console.log(res.view_details.array_data);
	$('#hotels_name').html('');
	$('#applicable_to_0').html('');
	$('#hotels_name').append('<optgroup label="Europe" id="Europe"></optgroup>');
	$('#applicable_to_0').append('<optgroup label="Europe" id="Europe1"></optgroup>');
	$('#hotels_name').append('<optgroup label="Middle East & Africa" id="Middleeast"></optgroup>');
	$('#applicable_to_0').append('<optgroup label="Middle East & Africa" id="Middleeast1"></optgroup>');
	$('#applicable_to_0').append('<optgroup label="APAC" id="APAC1"></optgroup>');
	$('#hotels_name').append('<optgroup label="APAC" id="APAC"></optgroup>');
	$('#applicable_to_0').append('<optgroup label="South America" id="Southamerica1"></optgroup>');
	$('#hotels_name').append('<optgroup label="South America" id="Southamerica"></optgroup>');
	$('#hotels_name').append('<optgroup label="North America" id="Northamerica"></optgroup>');
	$('#applicable_to_0').append('<optgroup label="North America" id="Northamerica1"></optgroup>');
       
       $.each(res.view_details.array_data, function(index, data) {
   
     	 if(data.prefix=='p'){
     	 		if(data.region=="Europe"){
     	 		 $('#Europe').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Europe1').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="APAC"){
     	 		 $('#APAC').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#APAC1').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="Middle East & Africa"){
     	 		 $('#Middleeast').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Middleeast1').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="South America"){
     	 		 $('#Southamerica').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Southamerica1').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="North America"){
     	 		 $('#Northamerica').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Northamerica1').append('<option value="p'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}

        	}else if(data.prefix=='h'){
        		if(data.region=="Europe"){
     	 		 $('#Europe').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Europe1').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="APAC"){
     	 		 $('#APAC').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#APAC1').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="Middle East & Africa"){
     	 		 $('#Middleeast').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Middleeast1').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="South America"){
     	 		 $('#Southamerica').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Southamerica1').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
     	 		if(data.region=="North America"){
     	 		 $('#Northamerica').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		 $('#Northamerica1').append('<option value="h'+data.hotel_id+'">'+data.hotel_name+'</option>');
     	 		}
        	
        	 }
        	});
      }	 

		$("#hotels_name").change(function () {
    	var hlid = $(this).val();
    	var selectedValues = [];    
	    $("#hotels_name :selected").each(function(){
	    	var hl_hidden=$(this).val().slice(0,1);
	    	if(hl_hidden=='p'){
	    	var hl_hidden_val=$(this).val().slice(1,5);

	        selectedValues.push(hl_hidden_val); 
	    	}
	    });
	    //alert(selectedValues);
		$("#hl_hidden_value").val(selectedValues);
		//$('select#applicable_to_1').val(hlid).trigger('change');

		var element = document.getElementById('hotels_name');
		for (var i = 0; i < element.options.length; i++) {
		    element.options[i].selected = hlid.indexOf(element.options[i].value) >= 0;
		}
	//alert(hlid);
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var host="{{ url('crm/getcontacts/') }}";	
		$.ajax({
		type: 'POST',
		data:{'hlid': hlid,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:rendergetcontacts

		})

    	});

	function rendergetcontacts(res){
		console.log(res);
		  $('#hotel_contacts').html('');
       $.each(res.view_details.array_val, function(index, data) {
          if (index==0) {
          //	alert(data.hl_c_firstname);
         	 if(data.prefix=='p'){
             $('#hotel_contacts').append('<option value="p'+data.hl_id+'">'+data.f_name+' '+data.l_name+'</option>');
        	 }else if(data.prefix=='h'){
        	 	$('#hotel_contacts').append('<option value="h'+data.hl_id+'">'+data.f_name+' '+data.l_name+'</option>');
        	 }

          }else {
          	if(data.prefix=='p'){
            $('#hotel_contacts').append('<option value="p'+data.hl_id+'">'+data.f_name+' '+data.l_name+'</option>');
            }else if(data.prefix=='h'){
        	 	$('#hotel_contacts').append('<option value="h'+data.hl_id+'">'+data.f_name+' '+data.l_name+'</option>');
        	 }

          };
        }); 
      }	 

   $(document).ready(function(){
  // 	$('select#applicable_to_0').val('8').trigger('change');

	var valuesT=$("#taskfor").val();
	//alert(valuesT);
	$('#list :checkbox').filter(function () {
	    return $.inArray(this.value, valuesT) >= 0;
	}).prop('checked', true).trigger('change');
	$('checkbox.taskfor').val(valuesT).trigger('change');
//1st
	var event_id=$("#event_id_hid").val();
	var urlval = "{{url('crm/completevent')}}";
	urlval += "/"+event_id;
	
	var urlval_del = "{{url('crm/deleteevent')}}";
	urlval_del += "/"+event_id;
	//console.log(urlval);
	$('#completebut').html("<a href='"+urlval+"'>Complete Task</a>");
	//$('#deletebut').html("<a href='"+urlval_del+"'>Delete</a>");

//2nd
	var valuesA=$("#activity_hid").val();
	//alert(valuesA);
	$('#listA :checkbox').filter(function () {
	    return $.inArray(this.value, valuesA) >= 0;
	}).prop('checked', true);

//3rd
setTimeout(function () {
	var hlcid=$("#hle_activity_hid").val();
	var element = document.getElementById('hle_contacts');

	for (var i = 0; i < element.options.length; i++) {

	    element.options[i].selected = hlcid.indexOf(element.options[i].value) >= 0;
	}
	var hlcidValue = hlcid.split(',');

	var str=$("#taskfor").val();
	var split_str = str.split(",");
	if (split_str.indexOf("4") !== -1) {
	$("#select_aplbc_contact").toggle();
	    
	}
	$('select#hle_contacts').val(hlcidValue).trigger('change');
} , 500);
//
setTimeout(function () {
	var hlid=$("#hotels_name_hid").val();
	var element = document.getElementById('hotels_name');

	for (var i = 0; i < element.options.length; i++) {

	    element.options[i].selected = hlid.indexOf(element.options[i].value) >= 0;
	}
	var hlidValue = hlid.split(',');
	$('select#hotels_name').val(hlidValue).trigger('change');
} , 1000);
//4th
	setTimeout(function () {
	var contac=$("#hotel_contacts_hid").val();
	var element1 = document.getElementById('hotel_contacts');
	//alert(element1.options.length);
	for (var i = 0; i < element1.options.length; i++) {
	    element1.options[i].selected = contac.indexOf(element1.options[i].value) >= 0;

	}
	var contacValue = contac.split(',');
	//alert(contacValue);
	$('select#hotel_contacts').val(contacValue).trigger('change');
	} , 2000);

//5th
	var invite_id=$("#hle_guest_id_hid").val();
	//alert(invite_id);
	var invi_id = invite_id.split(',');	
	var a_id=$("#searchbar_agents_hid").val();
	var agentcorp_id = a_id.split(',');		
	var g_id=$("#hle_guests_hid").val();
	var guest_id = g_id.split(',');
	var ac_count=agentcorp_id.length-1;
	var loop_rotate=ac_count-1;
	//alert(guest_id);
	for(var j=0;j<ac_count;j++){
		$('select#searchbar_agents_'+j).val(agentcorp_id[j]).delay(1000).trigger('change');
		$('input#hle_guest_id_'+j).val(invi_id[j]).delay(1000);
	if(j<loop_rotate){
		$('#clone1').trigger('click');
		}	
	}
	
	setTimeout(function () {
	
	for(var j=0;j<ac_count;j++){		
	//alert(guest_id[j]);			
			$('select#hle_guests_'+j).val(guest_id[j]).trigger('change');
		}
	} , 1000);	

//6th 

//7th
	var recurr_st=$("#hle_recurr_status_hid").val();
	var recurr_count=$("#hle_recurr_cnt_hid").val();
	var recurr_duration=$("#hle_recurr_dur_hid").val();
	//alert(recurr_st);
	if(recurr_st == '' || recurr_st == null)
	{
		$('#repeatblock_a, #repeatblock_b').css('visibility', 'hidden');
		$('#hle_recurr_cnt').val('1');
		$('#hle_recurr_duration').val('');
	}
	else
	{
		$('#hle_recurr_status').prop('checked', true);

		$('#hle_recurr_cnt').val(recurr_count);
		$('#hle_recurr_duration').val(recurr_duration);
		$("#changeto").show();
	}
//8th
	var time_zone=$("#hle_timezone_hid").val();
	$('#hle_timezone').val(time_zone).trigger('change');

//9th
	var showLocation=$("#show_location_hid").val();
	if(showLocation == '1')
	{
		$('#show_location').trigger('click');
		$('#show_location').val(1);

	}
	var hleLocation=$("#hle_location_hid").val();
	$('#pac-input').val(hleLocation);


	});


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
<script>

// var myCenter = new google.maps.LatLng(37.422230, -122.084058);
// function initialize(){
//     var mapProp = {
//         center:myCenter,
//         zoom:12,
//         mapTypeId:google.maps.MapTypeId.ROADMAP
//     };

//     var map = new google.maps.Map(document.getElementById("map"),mapProp);

//     var marker = new google.maps.Marker({
//         position:myCenter,
//     });

//     marker.setMap(map);
// }
// google.maps.event.addDomListener(window, 'load', initialize);
 
$('body').ready(function(){
$("#con_ol").click(function () {
	 //alert('aaa');
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
		var host="https://graph.microsoft.com/v1.0/me/events";	
		$.ajax({
		type: 'POST',
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



function open_location()
{	
	
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var main=$('#searchbar_agents_0').val();
	var res = main.slice(0, 1);
	var res1 = main.slice(1, 5);
	//alert(res1);

	if(res=='a'){
	var id=res1;
		var host="{{ url('crm/getagent_loc/') }}";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:rendergetagent_loc

	})
	}else if(res=='c'){
		var id=res1;
		var host="{{ url('crm/getcorporate_loc/') }}";	
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
	var host="{{ url('crm/getoutcomes/') }}";	
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
	var host="{{ url('crm/getnextstep/') }}";	
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
       // $('#hle_nextstep_'+local2).val(res.view_details.task_description);	
	 
       $(tinymce.get('hle_nextstep_'+local2).getBody()).html(res.view_details.task_description);	
      }	 

function show_map(){
	// $('#map').show();
}
function hide_map(){
	//$('#map').hide();
}
</script>

<script>	

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

		var host="{{ url('crm/remove_guest/') }}";	
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
	//utilsScript: baseUrl + "/admin-assets/js/utils.js",			

// Get guests




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
	var host="{{ url('crm/getguests/') }}";	
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
		//console.log(res.view_details.hle_mainguests);
	  var local = res.view_details.global_val;
	   $('#hle_guests_'+local).html('');
       $.each(res.view_details.hle_mainguests, function(index, data) {
            $('#hle_guests_'+local).append('<option value="">---Choose---</option>');
            if(data.m_con_first_name!=null){
            if(data.hl_ccb_id){
            $('#hle_guests_'+local).append('<optgroup label="'+data.hl_regional_name+'"><option value="'+'m'+data. hl_ccb_id+'">'+data.m_con_first_name+' '+data.m_con_last_name+'</option></optgroup>');
       		}else{
       		$('#hle_guests_'+local).append('<optgroup label="'+data.hl_regional_name+'"><option value="'+'m'+data. hl_agentcont_id+'">'+data.m_con_first_name+' '+data.m_con_last_name+'</option></optgroup>');	
       		}
       		}
        }); 


       $.each(res.view_details.hle_guests, function(index, data) {
          if(data.hl_first_name!=null){
          	if (index==0) {
            $('#hle_guests_'+local).append('<optgroup label="'+data.hl_regional_name+'"><option value="'+data.hl_corcont_id+'">'+data.hl_first_name+' '+data.hl_last_name+'</option></optgroup>');

          }else {
            $('#hle_guests_'+local).append('<option value="'+data.hl_corcont_id+'">'+data.hl_first_name+' '+data.hl_last_name+'</option>');

          };
      	}
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
	var main_val=id.slice(0,1);
	var main_value=id.slice(1);
//alert(main_value);

		var host="{{ url('crm/getac_mail/') }}";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN,'res':res, 'main_val':main_val, 'main_value':main_value},
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


function load_hotels(val){
	//alert(val);
}
	$( function() {
$( "#hle_start_date" ).datepicker({
			dateFormat: '   '+'dd/mm/yy',
			changeMonth: true,
     		changeYear: true,
			showOn: "both", 
			buttonText: "<i class='fa fa-calendar' style='margin-left:-240px;'></i>"
			
		});
		$( "#hle_end_date" ).datepicker({
			dateFormat: '   '+'dd/mm/yy',
			changeMonth: true,
     		changeYear: true,
			showOn: "both", 
			buttonText: "<i class='fa fa-calendar' style='margin-left:-240px;'></i>"
		 });
		$( ".start_date" ).datepicker({
			dateFormat: '   '+'dd/mm/yy',
			changeMonth: true,
     		changeYear: true,
			showOn: "both", 
			buttonText: "<i class='fa fa-calendar' style='margin-left:-240px;'></i>"
			
		});
		$( ".end_date" ).datepicker({
			dateFormat: '   '+'dd/mm/yy',
			changeMonth: true,
     		changeYear: true,
			showOn: "both", 
			buttonText: "<i class='fa fa-calendar' style='margin-left:-240px;'></i>"
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
	
	//$("#searchbar").css('visibility', 'hidden');
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
            url: "{{url('crm/autocomplete')}}",
            data: {
                    search : request.searchbar,
                    type : request.hle_category
             },
            dataType: "json",
			complete: function(data) {
				//alert(data);
				//console.log(data);
			},
            success: function(data){
				
               var resp = $.map(data,function(obj){
                   // console.log(obj.hl_name);
                    return '['+obj.hl_id+'] - '+obj.hl_name+', '+obj.hl_address;
               }); 
 
               response(resp);
            }
			
        });
    },
    minLength: 1
 });
tinymce.init({
		selector: '.myTextEditor',
        mode : 'specific_textareas',
        editor_selector : 'myTextEditor',
        theme : 'modern',
        height: 250,
        toolbar: "bold italic hr underline | link unlink | bullist numlist | fullscreen",
        menubar:false, 
        theme_modern_toolbar_location : "bottom",
    });

tinymce.init({
	selector: '.myeditable',
    mode : 'specific_textareas',
    editor_selector : 'myTextEditor',
    theme : 'modern',
    height: 182,
	width:498,
    toolbar: "bold italic hr underline | link unlink | bullist numlist | fullscreen",
    menubar:false, 
    theme_modern_toolbar_location : "bottom",
});
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
			$(".oc_timezone").select2("destroy");
			$(".start_date").removeAttr('id').datepicker("destroy");
			$(".end_date").removeAttr('id').datepicker("destroy");
			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			$klon.find('a#clone').remove();
			$klon.prop('id', 'outcome_section'+divlength );
			
				var remove_link = '<div align="right" class="pull-right"><span id=rem'+divlength+' onclick="removediv('+divlength+')" class="mdi mdi-window-close" style="border: 1px solid red;border-radius: 50%;padding: 3px 5px;background-color: #ffbfbf;"></span></div>';
					
			$("#outcomediv").append($klon);
																		
			$("#outcome_section"+divlength+" select#applicable_to_0").prop({id:"applicable_to_"+divlength, name:"applicable_to_"+divlength+'[]'}).append();
			$(".applicable_to").select2();
			$(".oc_timezone").select2();
			$( ".start_date" ).datepicker({
			dateFormat: ' '+'dd/mm/yy',
			changeMonth: true,
     		changeYear: true,
			showOn: "both", 
			buttonText: "<i class='fa fa-calendar' style='margin-left:-240px;'></i>"
			
			});
			$( ".end_date" ).datepicker({
				dateFormat: ' '+'dd/mm/yy',
				changeMonth: true,
	     		changeYear: true,
				showOn: "both", 
				buttonText: "<i class='fa fa-calendar' style='margin-left:-240px;'></i>"
			});
			setTimeout(function() {
				 tinymce.init({
				selector: '.myTextEditor',
		        mode : 'specific_textareas',
		        editor_selector : 'myTextEditor',
		        theme : 'modern',
		        height: 250,
		        toolbar: "bold italic hr underline | link unlink | bullist numlist | fullscreen",
		        menubar:false, 
		        theme_modern_toolbar_location : "bottom",
			  });

				tinymce.init({
				selector: '.myeditable',
				mode : 'specific_textareas',
				editor_selector : 'myTextEditor',
				theme : 'modern',
				height: 182,
				width:498,
				toolbar: "bold italic hr underline | link unlink | bullist numlist | fullscreen",
				menubar:false, 
				theme_modern_toolbar_location : "bottom",
				});
				}, 50);
			$("#outcome_section"+divlength+" select#std_outcomes_0").prop('id', 'std_outcomes_'+divlength);
			$("#outcome_section"+divlength+" input#hl_ocns_id_0").prop('id', 'hl_ocns_id_'+divlength);
			$("#outcome_section"+divlength+" input#start_date_0").prop('id', 'start_date_'+divlength);
			$("#outcome_section"+divlength+" select#start_hour_0").prop('id', 'start_hour_'+divlength);
			$("#outcome_section"+divlength+" input#end_date_0").prop('id', 'end_date_'+divlength);
			$("#outcome_section"+divlength+" select#end_hour_0").prop('id', 'end_hour_'+divlength);
			$("#outcome_section"+divlength+" input#oc_recurr_status_0").prop({id:"oc_recurr_status_"+divlength, name:"oc_recurr_status_"+divlength}).val(1);
			$("#outcome_section"+divlength+" select#oc_recurr_duration_0").prop('id', 'oc_recurr_duration_'+divlength);
			$("#outcome_section"+divlength+" select#oc_timezone_0").prop('id', 'oc_timezone_'+divlength);
			
			$("#outcome_section"+divlength+" select#std_nextsteps_0").prop('id', 'std_nextsteps_'+divlength);
			$("#outcome_section"+divlength+" #hle_outcome_0_ifr").prop('id', 'hle_outcome_'+divlength+'_ifr');
			$("#outcome_section"+divlength+" textarea#hle_outcome_0").prop('id', 'hle_outcome_'+divlength);

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
		var confi=confirm('Are you sure want to delete?');
		if(confi){
		var $cnid = $('#outcome_section'+val);
		//alert($cnid);
		//console.log($cnid);
		$cnid.remove();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		var host="{{ url('crm/remove_ocns/') }}";	
		$.ajax({
		type: 'POST',
		data:{'id': id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		

	})

	}else{
	}

	};


$('body').ready(function(){
$("#event_update").click(function () {
	 
	 	var outlook_id= $("#outlook_id").val();
	 	//alert(outlook_id);
		var my_api_token = $("#my_api_token").val();
		var sub= $("#hle_title").val();
		var content= $("#hle_description").val().trim();
		var date1 = $("#hle_start_date").val().trim();
		var d=new Date(date1.split("/").reverse().join("-"));
		var dd=d.getDate();
		var mm=d.getMonth()+1;
		var yy=d.getFullYear();
		var startdate=yy+"-"+mm+"-"+dd;	
		var date2= $("#hle_end_date").val();
		var d1=new Date(date2.split("/").reverse().join("-"));
		var dd=d1.getDate();
		var mm=d1.getMonth()+1;
		var yy=d1.getFullYear();
		var enddate=yy+"-"+mm+"-"+dd;	
		var start_date= startdate+'T'+$("#hle_start_hour").val()+':00';
		var end_date= enddate+'T'+$("#hle_end_hour").val()+':00';
		// alert(start_date);
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

	 
	
	$(document).ready(function() 
	{
	$('li.optgroup span.label').click(function(e) 
	{ 
		if($(this).data('myval') == 0 || $(this).data('myval') == undefined)
		{
			var a = $(this).data('myval'); //getter

			$(this).data('myval',1);
			
			console.log($(this).parent().find('ul'));
			if($(this).parent().find('ul').length > 0){
				$(this).parent().find('ul li input:checkbox').prop('checked', true);
				$(this).parent().find('ul li input:checkbox').toggleClass( 'selected' );

			}
		}
		else
		{
			var a = $(this).data('myval'); //getter

			$(this).data('myval',0);
			
			console.log($(this).parent().find('ul'));
			if($(this).parent().find('ul').length > 0){
				$(this).parent().find('ul li input:checkbox').prop('checked', false);
				$(this).parent().find('ul li input:checkbox').toggleClass( 'selected' );

			}

		}
		
	});
	});

	</script>

 <!--  <script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
  endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js 
  <script src="{{ asset('assets/js/template.js') }}"></script>-->
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  
   @stop
