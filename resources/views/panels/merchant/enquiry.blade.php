@extends('layouts.merchant_main')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')
<script>
$(document).ready(function() {
    var table = $('#datatable').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

</script>
<style>
.dataTables_length{display:none;}
.dataTables_info{display:none;}
</style>
 <form id="commentForm" action="{{url('merchant/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>

    
    <section>
        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="content_desc">
                            <h3 >ENQUIRIES</h3>
                            <div class="row mt-30 "></div>
                           
						    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
						   
                           <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<div class="x_panel">
								
								 <div class="x_title">
								  </div>
								
   
    
								  <table id="datatable" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>					 
                          <th >S.No</th>
						  <th >Occasion</th>
						  <th >No of People</th>
						  <th >Date</th>
						  <th >Time</th>
						  <th >Budget</th>
                          <th>Status</th>  
						  <th>&nbsp;</th> 						  
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php $i=1;?>
					@foreach ($leads as $leads)
                        <tr >
                         
						 <td><?php echo $i;?></td>
						 <td>{{ $leads->title }}</td>
						 <td>{{ $leads->no_of_guest }}</td>
						 <td>{{ $leads->event_date }}</td>
						 <td>{{ $leads->event_time }}</td>
						 <td>{{ $leads->bph }}</td>
						 <td>@if($user_payment_type->type==2)
						  New Enquiry 
						 @else  
							{{ $leads->enq_status }}
						 @endif	</td>                        
                         <td>
						
						@if($user_payment_type->type==2)
                            <a href="{{url('')}}/merchant/lead-details/{{ $leads->id }}" class="btn btn-primary btn-center enqiry-button" id="{{ $leads->id }}" style="padding-left:8px; padding-right:8px;">View Enquiry </a>
                        @else  
							 Exicutive Contact Soon
						 @endif
							</td>
                        </tr> 
						<?php $i++;?>
					@endforeach
						 								
                      </tbody>
                    </table>

								</div>
					</div>
					
					
					 <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
@if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 							
                        </div>
                    </div>
					
               
            </div>
            </div>  
        </div>
    </section>
	 <div class="row mt-30 "></div>
	  <div class="row mt-30 "></div> 
	</form> 
	

   @stop
