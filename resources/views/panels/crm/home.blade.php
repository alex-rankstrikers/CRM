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
	.error{color:#a01d1c;    margin: 0 !important;}
	hr{display:none;}
	
					  </style>
<section class="hero-section-view-hotel mb-10 mt-10 sticky">
<div class="container">
<div class="row">
 <form id="commentForm" action="{{url('crm/added')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
         <div class="row mt-30 "></div>
	
    
   
                 <div class="steps" id="rootwizard">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3>MY VENUES</h3>
                            <div class="row mt-30 "></div>
                            <h4>Manage your venues here</h4>
                            <div class="row mt-30 "></div>
                            <p>Build a profile for your venue to display on Search Venue and target customer enquiries</p>
                            <div class="row mt-30 "></div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"></div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="{{ url('crm/add-hotel') }}" class="btn btn-primary btn-center enqiry-button">Add Hotel</a></div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"></div>
						<div class="row mt-30 "></div>							
                        </div>
                    </div>
                    
					@foreach ($venue as $venue)
					<div class="row">
					<div class="row mt-30 "></div>	
						<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							 <div class="row">
							<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $venue->image_1 }}" alt="">
							</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							
							<p>{{ $venue->title }}</p>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
								<div class="row ">
								<p>New Enquiries</p>
								
								<div class="bor-rad">{{ $venue->total }}</div>
								
								<p>Worth £{{ $venue->worth }}</p>

								</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
								<div class="row ">
										<p>Introduced</p>
											<div class="bor-rad">0</div>
										<p>Worth £0</p>
										</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
								<div class="row">
									<p>Confirmed</p>
										<div class="bor-rad">0</div>
									<p>Worth £0</p>
								</div>
								</div>
							
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<div class="row">
							<a href="{{ url('crm/enquiry') }}/{{ $venue->v_id }}" class="btn btn-primary btn-center enqiry-button">View Enquiries</a>
							<p>&nbsp;</p>
							
							<a href="{{ url('crm/edit-space') }}" class="btn btn-primary btn-center enqiry-button">Edit Venue Space Details</a>
							
							</div>
							</div>
						</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>					  
                    </div>
					@endforeach
					
					
                    
                </div>
                      
           
	</form> 
</div>
</div>
</section>	
	<script type="text/javascript">
// Get States
 $(document).on("change", ".country", getstates);
	function getstates(){ 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).val(); 

	var host="{{ url('crm/getstates/') }}";	
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

	var host="{{ url('crm/getcities') }}";	
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
	  
	

	
	  <script>
	  //image_1:"Please choose atleast one image",image_1: {
		   //   required: true,		     
		 //   },
	$(document).ready(function() {
		var $validator = $("#commentForm").validate({		
		  rules: {
		    title: {
		      required: true,		    
		      minlength: 5
		    },price: {
		      required: true,
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
			
			
		   
		  }  ,
			messages: {
			title:"Please enter a title",
			price:"Please enter a price",
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
	
	<script type="text/javascript">
$(function() {
	var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/crm/dropzone/uploadFiles",			
            params: {
                _token: token
            },
			autoProcessQueue: true,
			maxFilesize: 1000, // MB			
			maxFiles: 6,
			acceptedFiles: '.jpg, .jpeg',			
			addRemoveLinks: true,
			dictRemoveFile: "Remove",
        });
		
	</script>
	
	<hr style="display:block;">
   @stop
