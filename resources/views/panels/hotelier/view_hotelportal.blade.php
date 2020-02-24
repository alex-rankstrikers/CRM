@extends('layouts.crm')

@section('head')

@stop

@section('content')

	<style>
				.modal-dialog {
    max-width: 800px !important;}
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
	.text-color{
	color: #425CC7 !important;
	}
	.dataTables_wrapper{
		width: 100% !important;
	}
	</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW PARTNER HOTELS</h4>
                    <div class="row">
			                <input name="mhotel_id" id="mhotel_id" type="hidden"  value="">
			                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Events Inserted successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
							
                    
							<!--   <div class="table-responsive"> -->
								
							<table class="table table-bordered" id="hoteltable" width="100%" cellspacing="0">
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Hotel Name</th>
								<th>Hotel Group Name</th>
								<th>City</th>
								<th>Country</th>
								<th>Hotel Code</th>
								<th>PMS Code</th>
								<th>Hotel Short Name</th>
								<th>Person Name</th>
								<th>Email Address</th>
								<th>Phone Number</th>
								<th>Action </th>
								</tr>
							</thead>
							<tbody>
								@if($hotels)
								@foreach($hotels as $hotel)
								<tr>
									<td>{{$hotel->hotel_name}}</td>
									<td>{{$hotel->title}}</td>
									<td>@if($hotel->getCity()){{$hotel->getCity()->name}}@endif</td>
									<td>@if($hotel->getCountry()){{$hotel->getCountry()->name}}@endif</td>
									<td>{{$hotel->hotel_code}}</td>
									<td>{{$hotel->pms_code}}</td>
									<td>{{$hotel->hotel_short_name}}</td>
									<td>@if($hotel->getHotelContact()){{$hotel->getHotelContact()->f_name}} {{$hotel->getHotelContact()->l_name}}@endif</td>
									<td>@if($hotel->getHotelContact()){{$hotel->getHotelContact()->	email_add}}@endif</td>
									<td>@if($hotel->getHotelContact()){{$hotel->getHotelContact()->c_number}}@endif</td>
									<td><a  data-toggle="tooltip" data-placement="top" title="Edit Partner Hotel" href="{{ url('hotelier/hotel-configuration')}}/{{ $hotel->hid }}" class="" ><i class="fa fa-edit fa-lg" style="font-size: 20px;"></i></a></td>
								</tr>
								@endforeach
								@endif
							</tbody>
							
							
						  </table>
						<!-- 	</div> -->
							</div>
                </div>
              </div>
                </div><!-- Steps ends -->
                      
            </div>
            
        </div>

	<script type="text/javascript">
	
 $(document).ready( function () {
    $('#hoteltable').DataTable( {
		 // "columnDefs": [
		 //   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 // ],
		"bPaginate": false,
		 dom: 'Bfrtip',
				buttons: [
					{
						text: 'Add Partner Hotels',
						action: function ( e, dt, node, config ) {
							 window.location.href = '{{url("hotelier/portal-add")}}'; //using a named route

						}
					}
			]
		} );
	} );

	  </script>
   @stop
