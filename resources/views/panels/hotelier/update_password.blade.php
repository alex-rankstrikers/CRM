@extends('layouts.hotelier')

@section('head')

@stop

@section('content')

 <form id="commentForm" action="{{url('merchant/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />

        <div class="container">
            <div class="ctrlable_div">
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>UPDATE PASSWORD</h3>
                            <div class="row mt-30 "></div>
                           
						    <div class="col-md-3 col-xs-12"></div>
						   
                           <div class="col-md-6 col-xs-12">
								<div class="x_panel">
								
								 
								
   @if(Session::get('message')) <div class="alert alert-success" role="alert">{{Session::get('message')}} </div>@endif 	
    <div class="form-group">
                                    <label class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="password" id="edit_password" value="{{ old('password') }}"/>
										<span class="error">{{ ($errors->has('password')) ? $errors->first('password') : ''}}</span>
                                    </div>
                                </div><div class="row mt-30 "></div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">Confirm Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="cpassword" id="edit_cpassword" value="{{ old('cpassword') }}"/>
										<span class="error">{{ ($errors->has('cpassword')) ? $errors->first('cpassword') : ''}}</span>
                                    </div>
                                </div>
								
								  							
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
</div>
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
