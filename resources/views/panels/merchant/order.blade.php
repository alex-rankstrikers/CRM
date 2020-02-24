@extends('layouts.main')

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
         <div class="row mt-30 "></div>
	
					<!--
        <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:42.84%"> </div>
                </div>-->
    
    <section>
        <div class="container-fluid">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3 style="color:#08c;">Order Details</h3>
                            <div class="row mt-30 "></div>
							                         
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
				 


    <div class="row">
        <div class="col-md-12  col-xs-12">
            <div class="panel panel-default">
            @foreach ($order as $order)
            <table id="datatable" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>
                        
                        <th style="text-align:center">Date</th>
						  <!--<th style="text-align:center">Expire Date</th>-->
                        <th style="text-align:center">Amount</th>                        
						  <th style="text-align:center">Status</th>						
						  <th>&nbsp;</th> 						  
                        </tr>
                      </thead>
                      <tbody>
					  
					  					                        <tr>
                                                              
                         
						 <td><?php 
	$date = new DateTime($order->created_at);
	echo $date->format('d-M-Y');?>
	<?php //$exp_date = date("Y-m-d H:i:s", strtotime("+1 month", $order->created_at));
	//$exp_dates = new DateTime(date("Y-m-d H:i:s", strtotime("+1 month", $order->created_at)));
	//echo $exp_dates->format('d-M-Y');
	//echo date_format($py->created, 'd-m-Y');//echo $py->created;//echo $Today=date('d-m-Y');?></td>
	<td>{{ $order->amount }}</td>
                          <td>{{ $order->amount }}</td>
						 <td>{{ $order->subcription_status }}</td>				 
						                   
                         <td>
						
						                          <a href="{{url('merchant/htmltopdfview')}}/{{ $order->p_id }}">Download Invoice</a>
                        							</td>
                        </tr> 
											                      
																	 								
                      </tbody>
                    </table>
              
             	@endforeach
        </div>
    </div>

				 

								</div>
							</div>
					
					
					 <div class="col-md-3 col-xs-12"></div>
					
					
                           
                            <div class="row mt-30 "></div>  
						
                        </div>
                    </div>
					   
            </div>
            
        </div>
    </section>
	 <div class="row mt-30 "></div>
	  <div class="row mt-30 "></div> 


	  

   @stop
