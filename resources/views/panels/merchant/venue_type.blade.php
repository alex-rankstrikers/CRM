@extends('layouts.main')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')

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
                            <h3 style="color:#08c;">VENUE TYPE</h3>
                            <div class="row mt-30 "></div>						
							<p>How do you want to work with enquiries</p>
							<div class="row mt-30 "></div>
                           
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
				 <form id="commentForm" action="{{url('merchant/venue-type-updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
		 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	
   <div class="row mt-30 "></div>
   <div class="col-md-6 col-xs-12"><input type="radio" name="type" class="form-data" value="1" class="form-data" checked>Hotels</div>
    <div class="col-md-6 col-xs-12"><input type="radio" name="type" value="2" class="form-data">Venue</div>
    	 <div class="col-md-4 col-xs-12"></div>
		  <div class="col-md-4 col-xs-12">
		  <div class="row mt-30 "></div>
		  <div class="row mt-30 "></div>
												
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					
					<div class="form-group">

					<input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>

					</div>
			</div>
		   <div class="col-md-4 col-xs-12"></div>
							
</form> 				  

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
