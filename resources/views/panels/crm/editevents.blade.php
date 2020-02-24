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
  
</style>
<?php 
session_start();
?>
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<form accept-charset="UTF-8" action="{{ route('crm.store') }}"  method="post">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                                                       
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, task details has been successfully added.</div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
					<div class="card mb-3">
         
          <div class="card-body">
			<h4 class="card-title">Create New Task</h4>
			<div class="row mt-30 "></div>
			<div class="col-sm-12 col-md-12 col-lg-12">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="row">
				  <div class="form-group col-sm-6 col-md-6 col-lg-6">
				  <label> Task Title:</label>
				  
				  <input type="text" name="hle_title" id="hle_title" class="form-control" />
				  </div>
				  
				  <div class="form-group col-sm-6 col-md-6 col-lg-6">
				 <label>Task Type:</label>
				  
				  <select class="form-control  js-example-basic-single w-100" id="hle_task_type" name="hle_task_type" data-show-icon="true">
				  <option value="">Select</option>
				  @foreach ($task_types as $task_types)
				  <option value="{{ $task_types->hl_mt_id }}" >{{ $task_types->task_name }}</option>
				 @endforeach
				</select>
				  </div>
				  
				  <div class="form-group col-sm-10 col-md-10 col-lg-10 aligncheck">
				  <label> Task For:</label>
				  <?php $i=1; ?>
				  @foreach ($task_for as $task_for)
				  <span><input name="task_for[]" id="task_for_<?php echo $i;?>" type="checkbox" value="{{ $task_for->hl_ms_id }}" class="task_for" onclick="taskfor(this.value)">{{ $task_for->hl_service_name }}</input></span>		
				  <?php $i++; ?>
				  @endforeach
				  </div>


				  <div class="form-group col-sm-10 col-md-10 col-lg-10 aligncheck">
				  <label> Activity:</label>
				 @foreach ($activity as $activity)
				  <span><input name="activity[]" type="checkbox" value="{{ $activity->hl_act_id }}" >{{ $activity->hl_activity_name }}</input></span>
				 @endforeach
				
				  </div>
				  
				  <div class="form-group col-sm-2 col-md-2 col-lg-2">
				<!--  <a class="btn btn-lg btn-primary" href="{{ url('crm/signin') }}" role="button" id="connect-button">Connect to Outlook</a> -->
  
				  </div>


					<div class="form-group col-sm-6 col-md-6 col-lg-6" style="float: left;margin-top: 10px;" >
					<label>Select Hotels:</label>

					<select class="form-control js-example-basic-multiple w-100 hotels_name" multiple="multiple"  name="hotels_name[]" id="hotels_name" > 
						<optgroup label="ALL HOTELS">
 						@for ($ee=0;$ee<count($sleads);$ee++)
							<optgroup label="{{$sleads[$ee]['region']}}">
								@if(count($sleads[$ee]['dataval']) > 0)
									@foreach($sleads[$ee]['dataval'] as $datav)
										<option value="{{$datav->hl_id}}">{{$datav->hl_name}}</option>
									@endforeach
								@endif
						@endfor
					</optgroup>
					</select>  
					</div>
					<div class="form-group col-sm-6 col-md-6 col-lg-6" style="float: left; margin-top: 10px;">
					<label>Contacts:</label>
					<select class="form-control js-example-basic-multiple w-100 "  name="hotel_contacts[]" id="hotel_contacts" style="margin-left:30px;" multiple="multiple"> 
						<option>---Choose---</option>
					</select>				  
					</div>
				<div  class="col-sm-12 col-md-12 col-lg-12 "></div>


				<div id="invitenew_section" class="col-sm-12 col-md-12 col-lg-12 cform ">
					<div class="col-sm-12 col-md-12 col-lg-12 cform " id="ag_corporate_new_form0" style="margin-left: -30px;">
					<div class="col-sm-6 col-md-6 col-lg-6 copy-cls" style="float: left;    margin-top: 10px;" id="copy-cls">
					<label>Select Agents/corporates:</label>

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
				<div class="col-sm-5 col-md-5 col-lg-5" style="float: left; margin-left:30px;    width: 380px;   margin-top: 10px;">
					<label>Guests:</label>
					<select class="form-control js-example-basic-single w-100 hle_guests "  name="hle_guests[]" id="hle_guests_0" style="margin-left:30px;width: 110%;"> 
						<option>---Choose---</option>
					</select>				  
				</div>
								 <input type="hidden" name="attendee_mail[]" id="attendee_mail_0">


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
				  <input class="form-control" type="text" style="width:60%" autocomplete = "off" name="hle_start_date" id="hle_start_date" class="date" />
				  <select class="form-control"  style="width:20%;padding:0px;" name="hle_start_hour" id="hle_start_hour"  >
				  <option value="" >--</option>
				  @for($ff=1;$ff<13;$ff++)
				  <option value="{{ sprintf("%02d", $ff) }}" >{{ sprintf("%02d", $ff) }}</option>
				 @endfor
				 </select>
				  <select class="form-control" style="width:20%;padding:0px;" name="hle_start_min" id="hle_start_min">
				  <option value="" >--</option>
				   @for($ff=1;$ff<61;$ff++)
				  <option value="{{ sprintf("%02d", $ff) }}" >{{ sprintf("%02d", $ff) }}</option>
				 @endfor
				  </select>
				  </div>
				  </div>
				  </div>
				  <div class="form-group col-sm-3 col-md-3 col-lg-3">
				  <div class="form-group">
				  <label>End Date & Time:</label><br>
				  <div class="flex-items">
				  <input class="form-control" type="text" style="width:60%" autocomplete = "off" name="hle_end_date" id="hle_end_date" class="date" />
				   <select class="form-control"  style="width:20%;padding:0px;" name="hle_end_hour" id="hle_end_hour"  >
				    <option value="" >--</option>
				  @for($ff=1;$ff<13;$ff++)
					   <option value="{{ sprintf("%02d", $ff) }}" >{{ sprintf("%02d", $ff) }}</option>
				 
				 @endfor
				 </select>
				  <select class="form-control" style="width:20%;padding:0px;" name="hle_end_min" id="hle_end_min">
				  <option value="" >--</option>
				   @for($ff=01;$ff<61;$ff++)
				  <option value="{{ sprintf("%02d", $ff) }}" >{{ sprintf("%02d", $ff) }}</option>
				 @endfor
				  </select> </div>
				  </div>
				  </div>
				  <div class="col-sm-6 col-md-6 col-lg-6 flex-items">
				  
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
				   @for($ff=0;$ff<$cntv;$ff++)
				  <option value="{{ $tzlist[$ff] }}" >{{ $tzlist[$ff]  }}</option>
				  @endfor
				  </select>
				 
				  
				  </div>
				  
				  </div>
				  
				  
				  					
         <div class="row mt-30 "></div>	
				<div class="form-group col-sm-12 col-md-12 col-lg-12" >
				  
				  <input type="checkbox"  id="show_location" onclick="open_location()" name="show_location"> <span style="margin-bottom: 5px;">&nbsp;Guest/Agent Location</span>
				</div>

				<!-- <div class="form-group col-sm-6 col-md-6 col-lg-6" >
				  <label>Location:</label>
				  
				  <input type="text" class="form-control" id="search_input" onkeyup="show_map()" onblur="hide_map()" name="hle_location" autocomplete="on">
				  
				  </input>
						 
				  </div> -->
<!-- -start-->
				  
					<div class="form-group col-sm-6 col-md-6 col-lg-6" style="height: 500px;width:400px;">
						<div class="pac-card" id="pac-card" style="right: 20;left: 30px;">
							<div>
							<div id="label">
							Location search
							</div>       
							</div>
							<div id="pac-container">
								<input id="pac-input" type="text"
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
				  
				   <input name="hle_description" class="tinymce" id="hle_description"> </input>
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
						  <p><a class="accordion collapsed" data-toggle="collapse" href="#collapse1">Outcome & Next Steps</a></p>
						</h4>
					  </div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row mt-30 "></div>
							<div class="col-sm-12 col-md-12 col-lg-12">

							  <input type="hidden" name="_token" value="{{ csrf_token() }}">

							  <input type="hidden" name="my_api_token" id="my_api_token" value="<?php echo $_SESSION['acc_token'];?>">

							  <div id="outcomediv">
							  <div id="outcome_section" class="row" style="margin-top: 30px;">
								  <div class="form-group col-sm-11 col-md-11 col-lg-11 appto">
									  <label style="vertical-align:text-top;"> Applicable to:</label>
										<select class="form-control js-example-basic-multiple w-100 applicable_to" multiple="multiple"  name="applicable_to[]" id="applicable_to_0" style="width:90%;"> 
											<optgroup label="ALL HOTELS">
					 						@for ($ee=0;$ee<count($sleads);$ee++)
											<optgroup label="{{$sleads[$ee]['region']}}">
												@if(count($sleads[$ee]['dataval']) > 0)
													@foreach($sleads[$ee]['dataval'] as $datav)
														<option value="{{$datav->hl_id}}">{{$datav->hl_name}}</option>
													@endforeach
												@endif
										@endfor
										</optgroup>
										</select> 
								  </div>

								   <div id="removelink" class="form-group col-sm-1 col-md-1 col-lg-1">
								   <a href="" style = "" id="clone" class="btn btn-outline-inverse-info btn-sm pull-right">Add</a>
								    </div>
							  		<input type="hidden" name="hle_status" value="1" />
							  		<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="margin-top: 15px;padding: 0px 10px 0px 0px;">Standard Outcomes:</label>
									<select class="form-control std_outcomes" style="margin-right: 5px;" id="std_outcomes_0" name="std_outcomes[]" data-show-icon="true">
									<option value="">Select</option>
									@foreach ($outcomes as $outcomes)
									<option value="{{ $outcomes->hl_out_id }}" >{{ $outcomes->hl_out_title }}</option>
									@endforeach
									</select>					
									</div>
									<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<label style="margin-top: 15px;padding: 0px 10px 0px 0px;">Standard Nextstep:</label>
									<select class="form-control std_nextstep"  id="std_nextstep_0" name="std_nextstep[]" data-show-icon="true">
									<option value="">Select</option>
									@foreach ($nextstep as $nextstep)
									<option value="{{ $nextstep->hl_ns_id }}" >{{ $nextstep->hl_ns_title }}</option>
									@endforeach
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
	  <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
		  <!--  <input type="button" class="btn btn-light" style="width:auto"  id="appointment_cancel" value="Cancel"> -->
		  </div>
	    <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-right">		
		<input class="btn btnC btn-primary btn-lg" style="width:auto" type="submit" id="con_ol" value="Save" /></div>
	  </div>
  
  </div>
  
  </div>
  </div>
  </div>
  </div>
</form>
    <script>
	$(".task_for").change(function() {
			
			var checkedVals = $('.task_for:checkbox:checked').map(function() {
				return this.value;
			}).get();
		
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			// var host="{{ url('crm/gethotels/') }}";	
			// $.ajax({
			// type: 'POST',
			// data:{'id': checkedVals,'_token':CSRF_TOKEN},
			// url: host,
			// dataType: "json", // data type of response		
			// success:rendergethotels

			// })
		});

		$("#hotels_name").change(function () {
    	var hlid = $(this).val();
		var element = document.getElementById('applicable_to_0');
		for (var i = 0; i < element.options.length; i++) {
		    element.options[i].selected = hlid.indexOf(element.options[i].value) >= 0;
		}
	
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

$(document).on("change", ".std_nextstep", getnextstep);
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
	 
       $(tinymce.get('hle_nextstep_'+local2).getBody()).html(res.view_details.hl_ns_description);	
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
			

if(divlength>0){
	$("#ag_corporate_new_form"+divlength+" div#removeplus_0").prop('id', 'removeplus_'+divlength);	
}
		$('#removeplus_'+divlength).remove();
		$('#ag_corporate_new_form'+divlength).append(add_close);

			$divnew.find('input[type=text]:first').focus();
			return false;
	});
	
	function removediv1(val){
		var $cnid = $('#ag_corporate_new_form'+val);
		$cnid.remove();
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
		data:{'id': id,'_token':CSRF_TOKEN},
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
	  var local = globalVariable;
	   $('#hle_guests_'+local).html('');
       $.each(res.view_details, function(index, data) {
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

		var host="{{ url('crm/getac_mail/') }}";	
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


function load_hotels(val){
	//alert(val);
}
	$( function() {
		$( "#hle_start_date" ).datepicker({
			dateFormat: 'yy-mm-dd',
			
		});
		$( "#hle_end_date" ).datepicker({
			dateFormat: 'yy-mm-dd',
			
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
 
 function initTinyMCE() {
    tinymce.init({
        mode: "textareas",
        theme: "simple"
    });
}

	$("a#clone").click(function () {
			var $div = $('div[id^="outcome_section"]:first');
			var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
			var divlength = $('div[id^="outcome_section"]').length;
			//alert(divlength);
			var editor_id='hle_outcome_'+divlength;
			//alert(editor_id);
			// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			//tinymce.EditorManager.execCommand('mceRemoveControl',true, editor_id);
			//tinymce.EditorManager.execCommand('mceAddControl',false, 'editor_id');
			// tinymce.remove();

			var $klon = $div.clone(true);
			$klon.find('input,textarea').val('');
			//tinymce.remove();
			$klon.find('a#clone').remove();
			$klon.prop('id', 'outcome_section'+divlength );
			
				var remove_link = '<div align="right" class="pull-right"><span id=rem'+divlength+' onclick="removediv('+divlength+')" class="mdi mdi-window-close"></span></div>';
					
			$("#outcomediv").append($klon);
			// if(tinyMCE.execCommand('mceRemoveEditor', false, 'editor_id')) {
			// tinymce.init();
			// }
			$("#outcome_section"+divlength+" select#applicable_to_0").prop('id', 'applicable_to_'+divlength);
			$("#outcome_section"+divlength+" select#std_outcomes_0").prop('id', 'std_outcomes_'+divlength);
			$("#outcome_section"+divlength+" select#std_nextstep_0").prop('id', 'std_nextstep_'+divlength);
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

	function removediv(val){
		var $cnid = $('#outcome_section'+val);
		$cnid.remove();
	};

	
	 
	
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
