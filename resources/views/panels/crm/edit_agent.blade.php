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
	.dataTables_length{display:none;}
	tfoot {display: table-header-group;}
	table td {word-break:break-all};

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

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW AGENTS CONTACTS</h4>
					<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Agent Contacts Updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
	
                    
							<!--   <div class="table-responsive"> -->
								
													  <table class="table  table-bordered" id="hoteltable" width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Business</th>
								<th>Region</th>
								<th>Country</th>
								<th>City</th>
								<!-- <th>Agent</th> -->
								<th>Contact</th>
								<th>Designation</th>
								<th>Contact Number</th>
								<!-- <th>Implant/Outplant</th> -->
								<th>Email</th>
								 <th>Sales Manager</th> 
								<!-- <th>Linked Hotel Targets</th> -->
								<th><!-- Follow up --></th>
								<!-- <th>Notes</th> -->
								<!-- <th>Business Providers</th> -->
							  </tr>
							</thead>
							
							</tbody>
							@if(count($hotelsCont))
							<?php $i=1;?>
							 @foreach ($hotelsCont as $cor_view)
								
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td style="background-color:#e1e1e1;" >{{ $cor_view->hl_business_name }}</td>
									<td>@if($cor_view->getRegion()){{ $cor_view->getRegion()->	hl_regional_name }} @endif</td>
									<td>@if($cor_view->getCountry()){{ $cor_view->getCountry()->name }} @endif</td>
									<td>@if($cor_view->getCity()){{ $cor_view->getCity()->name }}@endif</td>
									 <!-- <td></td> --> 
									<td>{{ $cor_view->m_con_first_name}} {{$cor_view->m_con_last_name}}</td>
									<td>@if(is_numeric($cor_view->m_con_contact_designation))
										@if($cor_view->getDes())
										{{ $cor_view->getDes()->hl_title}}
										@endif
										@else
										
										{{ $cor_view->m_con_contact_designation}}
										@endif

										</td>
									<td>{{ $cor_view->hl_mob_no }}</td>
									<!-- <td></td> -->
									<td>{{ $cor_view->m_con_email }}</td>
									<td>@if($cor_view->getSales()){{ $cor_view->getSales()->first_name }}@endif</td>
									<!-- <td></td> -->
									
									<td align="center">
										<a href="{{url('crm/events')}}"><i class="fa fa-calendar" aria-hidden="true"></i></a>

										 &nbsp; <a href="{{url('crm/edit-agent')}}/{{ $cor_view->hl_agentcont_id }}"><i class="fa fa-edit fa-lg"></i></a></td>

									
								
									
								</tr>
@if($cor_view->getHotelAgentRegional())

<?php $Reg=$cor_view->getHotelAgentRegional()?>


@foreach ($Reg as $reglocation)

<tr>
<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
<td >{{ $cor_view->hl_business_name }}</td>
<td>{{ $reglocation->hl_regional_name }}</td>
<td>{{ $reglocation->countries }} </td>
<td>{{ $reglocation->cities }}</td>
<!-- <td></td> --> 
<td>{{ $reglocation->hl_first_name}}</td>
<td>{{ $reglocation->hl_title}}</td>
<td>{{ $reglocation->hl_mob_no }}</td>
<!-- <td></td> -->
<td>{{ $reglocation->cemail }}</td>
<td>{{ $reglocation->first_name }}</td>
<!-- <td></td> -->

<td align="center">
<a href="{{url('crm/events')}}"><i class="fa fa-calendar" aria-hidden="true"></i></a>

&nbsp; <a href="{{url('crm/edit-agent')}}/{{ $cor_view->hl_agentcont_id }}"><i class="fa fa-edit fa-lg"></i></a></td>
</tr>



@endforeach

@endif						
								
						<?php $i++;?>		
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

	<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>	
	
	<script type="text/javascript">
	  
 $(document).ready( function () {
    $('#hoteltable').DataTable( {
    	language: { search: "" },
    	"bPaginate": false,
		 // "columnDefs": [
		 //   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 // ],
		 dom: 'Bfrtip',
				buttons: [
					{
						text: 'Add Agent',
						action: function ( e, dt, node, config ) {
							 window.location.href = '{{url("crm/add-agent")}}'; //using a named route

						}
					}
			]
		} );
	} );


	  </script>
   @stop
