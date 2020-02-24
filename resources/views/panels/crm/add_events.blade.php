@extends('layouts.crm')

@section('head')

			
	
@stop

@section('content')
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
			padding:10px;
			//border:1px solid rgba(0, 0, 0, 0.125);
			margin:5px;
		}
		.firstrow{
			flex-direction: row;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		
		$unchecked-star: '\2606';
$unchecked-color: #888;
$checked-star: '\2605';
$checked-color: #e52;

.star-cb-group {
  /* remove inline-block whitespace */
  font-size: 0;
  * {
    font-size: 1rem;
  }
  /* flip the order so we can use the + and ~ combinators */
  unicode-bidi: bidi-override;
  direction: rtl;
  & > input {
    display: none;
    & + label {
      /* only enough room for the star */
      display: inline-block;
      overflow: hidden;
      text-indent: 9999px;
      width: 1em;
      white-space: nowrap;
      cursor: pointer;
      &:before {
        display: inline-block;
        text-indent: -9999px;
        content: $unchecked-star;
        color: $unchecked-color;
      }
    }
    &:checked ~ label:before,
      & + label:hover ~ label:before,
      & + label:hover:before {
      content: $checked-star;
      color: #e52;
      text-shadow: 0 0 1px #333;
    }
  }
  
  /* the hidden clearer */
  & > .star-cb-clear + label {
    text-indent: -9999px;
    width: .5em;
    margin-left: -.5em;
  }
  & > .star-cb-clear + label:before {
    width: .5em;
  }

  &:hover > input + label:before {
    content: $unchecked-star;
    color: $unchecked-color;
    text-shadow: none;
  }
  &:hover > input + label:hover ~ label:before,
  &:hover > input + label:hover:before {
    content: $checked-star;
    color: $checked-color;
    text-shadow: 0 0 1px #333;
  }
}

 .select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #dfcbac 1px !important;
    outline: 0;
}
.select2-container--default .select2-selection--multiple{border:1px solid #dfcbac !important;
	border-radius:0px !important;cursor:text;
}
					  </style>
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
 <form action="{{url('crm/eventsadded')}}" accept-charset="UTF-8" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>	
    

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                                                       
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) 
	<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-success" role="alert">Dear {{ Auth::user()->first_name }}, events details has been successfully added.</div>
</div>
<div class="col-lg-2"></div>

@endif 							
                        </div>
                    </div>
					<div class="card mb-3">
         
          <div class="card-body">
			<h4 class="card-title">ADD EVENTS</h4>
			<div class="row mt-30 "></div>  					
					<div class="tab-content" id="tab-contents" style="margin-top:0px;">
				
						<!--//VENUE OCCASION-->
						<div id="contact_section" class="">
						 <div id="contact_add_form0" class="row">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
		<div class="col-sm-6 col-md-6 col-lg-6 form-group ">
		<label>Regions </label>
		<select name="hl_region" id="hl_region" class="form-control js-example-basic-multiple w-100" style="width: 100%">
			<option value="">Select</option>
			 @foreach ($regional as $region)
			  <option value="{{ $region->hl_ms_r_id }}" >{{ $region->hl_regional_name }}</option>
			 @endforeach
		</select>
		
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 form-group">
			<label>APLBC DOS Name </label>
		<select  class="form-control js-example-basic-multiple w-100" style="width: 100%" id="dos_name" name="dos_name" >
			  @foreach ($users as $users)
			  @if( Auth::user()->first_name  ==  $users->first_name )
			  <option selected value="{{ $users->id }}" >{{ $users->first_name }}</option>
			  @else
			  <option  value="{{ $users->id }}" >{{ $users->first_name }}</option>
		      @endif
			 @endforeach
		</select>
			<span id="err_contact" style="position: relative; top: -2px;"></span>
		<span class="error">{{ ($errors->has('contact_status')) ? $errors->first('contact_status') : ''}}</span>
		
		</div>

		<div class="col-sm-6 col-md-6 col-lg-6 form-group">

		<label>Event/ Activity Name </label>
		<input name="event_name" id="event_name" type="text" class="form-control required" data-error="#err_firstname" >
		<span id="err_firstname" style="position: relative; top: -2px;"></span>
		<span class="error">{{ ($errors->has('firstname')) ? $errors->first('firstname') : ''}}</span>

		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 form-group">

		<label>Event location </label>
		<input name="event_location" id="event_location" type="text" class="form-control required" data-error="#err_lastname" >
		<span id="err_lastname" style="position: relative; top: -2px;"></span>
		<span class="error">{{ ($errors->has('lastname')) ? $errors->first('lastname') : ''}}</span>

		</div>
										
		<div class="col-sm-6 col-md-6 col-lg-6 form-group">
			<label>Event Start Date </label>
			<input class="form-control" type="text"  autocomplete = "off" name="event_start_date" id="event_start_date" class="date" />
				
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 form-group">
			<label>Event End Date  </label>
			<input class="form-control" type="text" autocomplete = "off" name="event_end_date" id="event_end_date" class="date" />
		
		</div>

		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Activity Type </label>
		  <select class="form-control  js-example-basic-single w-100" id="activity_type" name="activity_type" data-show-icon="true">
			<option value="">Select</option>
			@foreach ($task_types as $task_types)
			<option value="{{ $task_types->hl_mt_id }}" >{{ $task_types->task_name }}</option>
			@endforeach
		</select>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Target Segment </label>
			<select multiple="multiple" tabindex="2" name="target_segment[]" id="" class="form-control js-example-basic-multiple w-100" style="width: 100%" data-error="#err_type" >
			<option value="1">Corporate </option>
			<option value="2">Leisure  </option>
			<option value="3">High End Leisure</option>
			<option value="4">MICE  </option>
			<option value="5">Entertainment </option>
		</select>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Participation Fee </label>
	  		<input type="text" name="participation_fee" id="participation_fee" class="form-control">
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Currency Type </label>
	  		<select class="form-control  js-example-basic-single w-100" id="currency_type" name="currency_type" data-show-icon="true">
			<option value="">Select</option>
			@foreach ($currency as $currency)
			<option value="{{ $currency->id }}" >{{ $currency->name }} ({{ $currency->symbol }})</option>
			@endforeach
		</select>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Number Of Hotels Can Participate </label><br>
			<input name="hotel_participate" type="radio" onclick="show_limitbox('1')" id="hotel_participate" value="1" >APLBC ONLY</input>&nbsp;
			<input name="hotel_participate" type="radio" onclick="show_limitbox('2')" id="hotel_participate1" value="2" >Unlimited</input>&nbsp;
			<input name="hotel_participate" type="radio" onclick="show_limitbox('3')" id="hotel_participate2" value="3" >Limited</input>&nbsp;
			<input type="text" name="if_limited" id="if_limited" placeholder="If Limited" style="width: 100px;border-color:#dfcbac;display: none;">
		</div>		
		<div class="col-sm-12 col-md-6 col-lg-6 form-group">
			<label>Deadline </label>
			<input class="form-control" type="text"  autocomplete = "off" name="deadline" id="deadline" class="date" />
				
		</div>
	<div class="col-sm-12 col-md-12 col-lg-12">
	  <label><b>Descriptions</b> </label>
	  <input name="description" class="tinymce" id="description"> </input>
	</div>
		
</div>	
								
       </div>	
						
						<div style="height:30px;"></div>
						<div class="form-row text-right" style="clear:both">
						<div class="mt-lg-4"></div>
						<div class="mt-lg-4"></div>
						

							<div class="form-group col-sm-6 col-md-6 col-lg-6 pull-left">
		  <!--  <input type="button" class="btn btn-light" style="width:auto"  id="appointment_cancel" value="Cancel"> -->
		  </div>
	    <div class="form-group col-sm-6 col-md-6 col-lg-6 pull-right">		
		<input class="btn btnC btn-primary btn-lg" style="width:auto" type="submit" id="saveform" value="Save" /></div>
		
					 </div>
					    </div>

</div>                                         
</div>
</div>
</div>
</div><!-- Steps ends -->

</div>

</div>

	</form> 
	<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
<script>
	function show_limitbox(val){
		if(val=='3'){
		$("#if_limited").show();
		}else{
		$("#if_limited").hide();
		}

	}
	$( function() {
		$( "#event_start_date" ).datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
     		changeYear: true
		});
		$( "#event_end_date" ).datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
     		changeYear: true
		});
		$( "#deadline" ).datepicker({
			dateFormat: 'dd-mm-yy',
			changeMonth: true,
     		changeYear: true
		});	
	} );

 $(function () {
 $('select#target_segment').multiselect({
								columns:2,
								placeholder: 'Target Segment',
								search: true,
								searchOptions: {
									'default': 'Search Segment'
								},
								selectAll: true
							});
 });
</script>

	


   @stop
