@extends('layouts.main')

@section('head')

@stop

@section('content')
@include('layouts.othermenu')
<meta name="csrf-token" content="{{ csrf_token() }}" />
   

   <div class="row mt-30 "></div>
   <form id="commentForm" method="get" action="" class="form-horizontal">
   
        <!--<div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:14.28%"> </div>
                </div>-->
    
    <section id="rootwizard">
	<div id="bar" class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
        <div class="container-fluid">
            <div class="ctrlable_div">
							<section id="wizard">
			
				
			
				</section>
				
				
				
				
                 <div class="steps">
                    <div class="row">
                        <div class="col-lg-12" id="content_desc">
                            <h3 style="color:#08c;">MY VENUES</h3>
                            <div class="row mt-30 "></div>
                            <h4>Add a new venue here</h4>
                            <div class="row mt-30 "></div>
                            <p>Build a profile for your venue to display on Search Venue and target customer enquiries</p>
                            <div class="row mt-30 "></div>
                            <h3 style="color:#08c;">VENUE OVERVIEW</h3>
                            <div class="row mt-30 "></div>
                        </div>
                    </div>
                    
                    <div class="row">
                       <div class="col-lg-3"></div>
					   
					   
                       <div class="col-lg-6" id="venue_form">
					   
					   
					   <div id="rootwizard">
					<ul>
					  	<li><a href="#tab1" data-toggle="tab">First</a></li>
						<li><a href="#tab2" data-toggle="tab">Second</a></li>
						<li><a href="#tab3" data-toggle="tab">Third</a></li>
						<li><a href="#tab4" data-toggle="tab">Fourth</a></li>
						<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
					</ul>
					
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
					    	{{ csrf_field() }}
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Venue name *</label><input name="title" type="text" class="form-control" >
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
										
                                        <!-- <div class="col-sm-6"><label>U-Shape</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Address *</label><input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control" >
                                        <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" >
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
										</div>
                                        <!-- <div class="col-sm-6"><label>Hollow</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Country *</label>
										<select name="country" id="country"  class="form-control country">		
									<option value="">Choose Country</option>									
										 @foreach ($country as $country)
										 <option value="{{ $country->id }}">
										 {{ $country->name }}
										 </option>
										 @endforeach
									 </select>
									 <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										</div>
                                        <!-- <div class="col-sm-6"><label>Cabaret</label><input type="text" class="form-control"></div> -->
                                    </div>
									 <div class="form-group">
                                        <div class="col-sm-12"><label>States *</label><select name="states" id="states"  class="form-control states">
									    <option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span></div>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>City *</label><select name="cities" id="cities"  class="form-control">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span></div>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Postcode *</label><input type="text" class="form-control" name="postcode" id="postcode" value="{{ old('postcode') }}">
										<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										</div>
                                         <!-- <div class="col-sm-6"><label>Dinner/Dance</label><input type="text" class="form-control"></div>  -->
                                    </div>
                                </div> 
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                     <div class="form-group">                                        
                                        <div class="col-sm-12"><label>Venue Description (600 characters left) *</label>
                                            <textarea rows="19" cols="5" class="form-control" id="description" name="description"> </textarea>
											<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12"><label>Nearest Transport Link *</label><input type="text" class="form-control" name="nearest_transport_link" id="nearest_transport_link" value="{{ old('nearest_transport_link') }}">
										 <span class="error">{{ ($errors->has('nearest_transport_link')) ? $errors->first('nearest_transport_link') : ''}}</span>
										</div>
                                         <!-- <div class="col-sm-6"><label>Dinner/Dance</label><input type="text" class="form-control"></div>  -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">&nbsp;</div>                                      
                                    </div>
                                     
                                </div>
					    </div>
					    <div class="tab-pane" id="tab2">
					      <div class="control-group">
							    <label class="control-label" for="url">URL</label>
							    <div class="controls">
							      <input type="text" id="urlfield" name="urlfield" class="required url">
							    </div>
							  </div>
					    </div>
						<div class="tab-pane" id="tab3">
							3
					    </div>
						<div class="tab-pane" id="tab4">
							4
					    </div>
						<div class="tab-pane" id="tab5">
							5
					    </div>
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">Previous</a></li>
							<li class="next last" style="display:none;"><a href="#" >Last</a></li>
						  	<li class="next"><a href="#" class="">Next</a></li>
						</ul>
					</div>
				</div>
                           <?php /* <form role="form" class="form-horizontal" action="{{url('merchant/added')}}" method="post">*/?>
							                                
                                                     
                       </div>
                       <div class="col-lg-3"></div>
                    </div>
                </div><!-- Steps ends -->
      
            </div><!-- ctrlable_div ends-->
            
        </div>
    </section>
	</form> 
	<script type="text/javascript">
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
	  
	

	
	  <script>
	$(document).ready(function() { 
		var $validator = $("#commentForm").validate({
		  rules: {
		    emailfield: {
		      required: true,
		      email: true,
		      minlength: 3
		    },
		    namefield: {
		      required: true,
		      minlength: 3
		    },
		    urlfield: {
		      required: true,
		      minlength: 3,
		      url: true
		    }
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
				$('#rootwizard .progress-bar').css({width:$percent+'%'});
				}
	  		}
	  	});
		window.prettyPrint && prettyPrint()
	});
	</script>
@stop