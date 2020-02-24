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
	</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW HOTELS</h4>
                          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mtb-15">
                  <form name="export" action="{{ url('crm/import-events') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST" >
                <div class="row">            

                <input name="mhotel_id" id="mhotel_id" type="hidden"  value="">
              
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                </div>
                 </form>
            </div>
					<div class="row mt-30 "></div>  
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
								<th>Hotel Code</th>
								<th>PMS Code</th>
								<th>Hotel Short Name</th>
								<th>Edit </th>
								</tr>
							</thead>
							<tbody>
								@if($hotels)
								@foreach($hotels as $hotel)
								<tr>
									<td>{{$hotel->hotel_name}}</td>
									<td>{{$hotel->hotel_code}}</td>
									<td>{{$hotel->pms_code}}</td>
									<td>{{$hotel->hotel_short_name}}</td>
									<td><a href="{{ url('hotelier/hotel-configuration')}}/{{ $hotel->id }}" class="" ><i class="fa fa-edit fa-lg"></i></a></td>
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


   @stop
