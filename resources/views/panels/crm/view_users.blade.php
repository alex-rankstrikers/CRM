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

	</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW USERS</h4>
					<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										{{Session::get('message')}}. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
							<!-- <table id="mytable">
						<tr data-depth="0" class="collapse level0">
						<td><span class="toggle collapse"></span>Item 1</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse level1">
						<td><span class="toggle"></span>Item 2</td>
						<td>123</td>
						</tr>
						<tr data-depth="2" class="collapse level2">
						<td>Item 3</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse level1">
						<td>Item 4</td>
						<td>123</td>
						</tr>
						<tr data-depth="0" class="collapse collapsable level0">
						<td><span class="toggle collapse"></span>Item 5</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse collapsable level1">
						<td>Item 6</td>
						<td>123</td>
						</tr>
					</table> -->
                    
														  <table class="table  table-bordered" id="hoteltable" width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Business Name</th>
								<th>Active / Inactive</th>
								<!-- <th>Password</th> -->
								<th><!-- Follow up --></th>							
							  </tr>
							</thead>
							 
							</tbody>
							@if(count($users))
							<?php $i=1;?>
							 @foreach ($users as $user)
								
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td >{{ $user->first_name }}</td>
									<td>{{ $user->last_name }}</td>
									<td>{{ $user->email }} </td>
									<td>@if($user->business()){{ $user->business()->hl_business_name }} @endif </td>
									<td>@if($user->activated == 1) Active @else Inactive @endif</td>
									 <!-- <td></td> --> 
									<!-- <td>{{ $user->password}}</td> -->
									
									
									<td align="center"><a href="{{url('crm/view-user')}}/{{ $user->uid }}"><i class="fa fa-calendar" aria-hidden="true"></i></a> &nbsp;<a href="{{ url('crm/edit-user')}}/{{ $user->uid }}" class="" ><i class="fa fa-edit fa-lg"></i></a></td>

									
								
									
								</tr>
								
								<?php $i++;?>
							@endforeach
							@endif	
							</tbody>
							
						  </table>
							</div>
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
						text: 'Add User',
						action: function ( e, dt, node, config ) {
							 window.location.href = '{{url("crm/add-user")}}'; //using a named route

						}
					}
			]
		} );
	} );

	  </script>
   @stop
