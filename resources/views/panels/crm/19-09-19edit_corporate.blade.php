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
                  <h4 class="card-title">VIEW CORPORATE CONTACTS</h4>
					<div class="row mt-30 "></div>  
							@if(Session::get('message')) 
							<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="alert alert-success" role="alert">
										Dear {{ Auth::user()->first_name }}, Hotel Lead updated successfully. 
									</div>
								</div>
							<div class="col-lg-2"></div>
							@endif
							
							
                    
							 <div class="table-responsive">
								
													  <table class="table table-bordered" id="hoteltable" width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Business</th>
								<th>Region</th>
								<th>Country</th>
								<th>City</th>
								<th>Agent</th>
								<th>Contact</th>
								<th>Designation</th>
								<th>Contact Number</th>
								<th>Implant/Outplant</th>
								<th>Email</th>
								<th>Sales Manager</th>
								<th>Linked Hotel Targets</th>
								<th></th>
								<th>Notes</th>
								<th>Edit</th>
								<th>Business Providers</th>
							  </tr>
							</thead>
							 <tfoot>
							  <tr>
								<!--<th></th>-->
								<th class="searchth">Business</th>
								<th class="searchth">Region</th>
								<th class="searchth">Country</th>
								<th class="searchth">City</th>
								<th class="searchth">Agent</th>
								<th class="searchth">Contact</th>
								<th class="searchth">Designation</th>
								<th class="searchth">Contact Number</th>
								<th class="searchth">Implant/Outplant</th>
								<th class="searchth">Email</th>
								<th class="searchth">Sales Manager</th>
								<th class=""></th>
								<th class=""></th>
								<th class=""></th>
								<th class=""></th>
								<th class=""></th>
								
							  </tr>
							</tfoot>
							</tbody>
							@if($cor_view)
							 @foreach ($cor_view as $cor_view)
								@if($cor_view['cnt'] > 0) 
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td >{{$cor_view['business_name'] }}</td>
									<td>{{$cor_view['region'] }}</td>
									<td>{{$cor_view['country']}} </td>
									<td>{{$cor_view['city']}}</td>
									<td>Agent</td>
									<td>{{$cor_view['cont_name']}}</td>
									<td>{{$cor_view['cont_design']}}</td>
									<td>{{$cor_view['cont_no'] }}</td>
									<td>travel Desk type</td>
									<td>{{$cor_view['cont_email'] }}</td>
									<td>{{$cor_view['username'] }}</td>
									<td>view</td>
									
									<td align="center"><a href="{{url('crm/events')}}"><i class="fa fa-calendar" aria-hidden="true"></i></a></td>
									<td ><div align="center"><a href="#notes_model{{$cor_view['hl_ccb_id']}}" class="" data-toggle="modal" data-target="#notes_model{{$cor_view['hl_ccb_id']}}"><i class="fa fa-edit fa-lg"></i></i>

</a></div>
									<div id="notes_model{{$cor_view['hl_ccb_id']}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
									
									<div class="modal-content">
									<form id="commentForm" action="{{url('crm/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-header">
									<h4 class="modal-title">Notes History</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<div class="modal-footer">
									<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div>
									</td>
									
									<td><div align="center"><a href="#edit_model{{$cor_view['hl_ccb_id']}}" class="" data-toggle="modal" data-target="#edit_model{{$cor_view['hl_ccb_id']}}"><i class="fa fa-edit fa-lg"></i></i>

</a></div>
<div id="edit_model{{$cor_view['hl_ccb_id']}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
									<!-- Modal content-->
									
									<div class="modal-content">
									<form id="commentForm" action="{{url('crm/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-header">
									<h4 class="modal-title">Edit Contact Details</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<div class="modal-footer">
									<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
									</form>
									</div>

									</div>
									</div>
</td><td></td>
									
								</tr>
								@endif
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
		 "columnDefs": [
		   { "width": "9%", "targets": 0 },{ "width": "8%", "targets": 1 },{ "width": "10%", "targets": 2 },{ "width": "6%", "targets": 3 },{ "width": "8%", "targets": 4 },{ "width": "10%", "targets": 5 },{ "width": "10%", "targets": 6 },{ "width": "17%", "targets": 7 },{ "width": "10%", "targets": 8 },{ "width": "4%", "targets": 9 },{ "width": "4%", "targets": 10 },{ "width": "4%", "targets": 11 }
		 ],
		 dom: 'Bfrtip',
				buttons: [
					{
						text: 'Add Corporate',
						action: function ( e, dt, node, config ) {
							 window.location.href = '{{url("crm/add-corporate")}}'; //using a named route

						}
					}
			]
		} );
	} );

// Get States
 $(document).on("change", ".country", getstates);
	function getstates(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('merchant/getstates/') }}";	
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
        },success:rendergetstates
	
	})
	return false;
}
function rendergetstates(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#states').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	  



// Get Sub Cities
 $(document).on("change", ".states", getcities);
	function getcities(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('merchant/getcities') }}";	
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
        },success:rendergetcities
	
	})
	return false;
}
function rendergetcities(res){

       $.each(res.view_details, function(index, data) {
          if (index==0) {
            $('#cities').append('<option value="'+data.id+'">'+data.name+'</option>');
          }else {
            $('#cities').append('<option value="'+data.id+'">'+data.name+'</option>');
          };
        });   
      }	
	  </script>
   @stop
