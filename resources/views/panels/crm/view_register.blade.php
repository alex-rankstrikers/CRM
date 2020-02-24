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

	</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
		<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">VIEW REGISTERED LIST</h4>
					<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Agent contacts updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
							
                    
							<!--   <div class="table-responsive"> -->
								
							<table class="table  table-bordered" id="" width="100%" cellspacing="0">
							<thead>
							  <tr>
							  	<th>S.No</th>
								<th>Hotel name</th>
								<th>First name</th>
								<th>Last name </th>
								<th>Email</th>
								<th>Contact number</th>
								<th>Registration date</th> 
								<th>Payment Status</th>
							  </tr>
							</thead>
							</tbody>
							<tbody>
							@if(count($reg_hotel))
							<?php $i=1;?>
							@foreach ($reg_hotel as $cor_view)
							
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td >{{ $i }}</td>
									<td >{{ $cor_view->first_name }}</td>
									<td>{{ $cor_view->first_name }}</td>
									<td>{{ $cor_view->last_name}}</td>
									<td>{{ $cor_view->email }}</td>
									<td>{{ $cor_view->contact_num }}</td>
									<td>{{(date('d/m/Y', strtotime($cor_view->created_at)))}} </td>
									<td>Not Paid</td>								
								</tr>
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

	<script>
$(document).ready(function() {

  $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
    }
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//alert(CSRF_TOKEN);
		var host="{{ url('crm/view-events/registered_hotel/') }}";	
		$.ajax({
		type: 'POST',
		data:{'id': data_id,'_token':CSRF_TOKEN},
		url: host,
		dataType: "json", // data type of response		
		success:function load_details(res){
			//alert(res);
		}
	})
   
  })
});
</script>

   @stop
