@extends('layouts.hotelier')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')
 <form id="commentForm" action="{{url('merchant/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                            <h3 style="color:#08c;">EDIT PROFILE</h3>
                            <div class="row mt-30 "></div>
                           
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	
    <div class="form-group">
                                    <label class="col-sm-4 control-label">  First Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->first_name}}" name="firstname" id="edit_firstname" value="{{ old('firstname') }}"/>
										<span class="error">{{ ($errors->has('firstname')) ? $errors->first('firstname') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">  Last Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->last_name}}" name="lastname" id="edit_lastname" value="{{ old('lastname') }}"/>
										<span class="error">{{ ($errors->has('lastname')) ? $errors->first('lastname') : ''}}</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label ">Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" value="{{ $users->email}}" name="email" id="edit_email" value="{{ old('email') }}"/>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
                                    </div>
                                </div>
							
								
							<input type="hidden" name="id" value="{{ $users->id}}">								
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="row mt-30 "></div>
									  <div class="form-group">
										<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">						
										  <input class="btn btn-primary btn-center enqiry-button" type="submit" name="submit" id="submit" value="Submit"/>
										
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
	</form> 

	  <script>
	$(document).ready(function() {
		var $validator = $("#commentForm").validate({		
		  rules: {
		    title: {
		      required: true,		    
		      minlength: 5
		    },
		    address: {
		      required: true,
		      minlength: 3
		    },
		    country: {
		      required: true,		      
		    },
		    states: {
		      required: true,		     
		    },
		    cities: {
		      required: true,		     
		    },
		    postcode: {
		      required: true,		     
		    }
			,
		    description: {
		      required: true,		      
		    },
		    nearest_transport_link: {
		      required: true,
		      minlength: 3
		    },
			 "capacity_value[]": {
		      required: true,		     
		    },
			"features[]": {
		      required: true,		     
		    },
			"fooddrink[]": {
		      required: true,		     
		    },
			"licensing[]": {
		      required: true,		     
		    },
			"restrictions[]": {
		      required: true,		     
		    },
			image_1: {
		      required: true,		     
		    },
			
		   
		  }  ,
			messages: {
			title:"Please enter a title",
			address:"Please enter a address",
			country:"Please enter a country",
			states:"Please enter a state",
			cities:"Please enter a city",
			postcode:"Please enter a postcode",
			description:"Please enter a description",
			nearest_transport_link:"Please enter a nearest transport link",
			"capacity_value[]": "Please enter a capacity value",
			"features[]":"Please choose atleast one features",
			"fooddrink[]":"Please choose atleast one food and drink",
			"licensing[]":"Please choose atleast one licensing",
			"restrictions[]":"Please choose atleast one restrictions",
			image_1:"Please choose atleast one image",
			
            
        }, errorPlacement: function(error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
		return true;
      } else {
        error.insertAfter(element);
		return false;
      }
		}, submitHandler: function(form) {
                form.submit();
            }
		
		});

	  	$('#rootwizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  			var $valid = $("#commentForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}else{
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				$('.progress-bar').css({width:$percent+'%'});
				}
	  		}
	  	});		
		window.prettyPrint && prettyPrint()
	});	
	
	
	</script>

   @stop
