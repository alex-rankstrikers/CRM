@extends('layouts.adminmain')

@section('head')

@stop

@section('content')
<div class="container">
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
		</style>
 <form id="commentForm" action="{{url('admin/rooms')}}/{{$hid}}/updated" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<meta name="csrf-token" content="{{ csrf_token() }}" />
 
    

        
				<div class="ctrlable_div">
				<div class="steps" id="rootwizard">
				<div class="row">
				<div class="col-lg-12" id="">
				<h3>VIEW ROOMS</h3>                            
				<div class="row mt-30 "></div>  
				@if(Session::get('message')) 
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
				<div class="alert alert-success" role="alert">
				Dear {{ Auth::user()->first_name }}, Room updated successfully. 
				</div>
				</div>
				<div class="col-lg-2"></div>
				@endif 							
				</div>
				</div>


				@foreach ($Rooms as $Room)
				<div class="row mb-10 mt-30  rm{{ $Room->id }}" >

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="row">
				<?php if($Room->image_1 != ''){
				?>
				<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_1 }}" alt="">

				<?php }else{
				if($Room->image_2 !=''){									?>

				<img class="img-responsive 2" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_2 }}" alt="">
				<?php 
				}else{
				if($Room->image_3 !=''){ 
				?>
				<img class="img-responsive 3" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_3 }}" alt="">					
				<?php 
				}

				}
				} 
				?>
				</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left ">

				<h5>{{ $Room->title }}</h5>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="row mt-10">
				<?php /*	{{ url('venue-details') }}/{{ $Room->id }} */ ?>

				<a href="javascript:void(0);" class="edit_blog btn-info btn-xs border-radius-none custom-btn-inner" id="{{ $Room->id }}" > Edit </a> &nbsp;
				<a href="javascript:void(0);" class="btn-danger btn-xs delete_blog border-radius-none custom-btn-inner" id="{{ $Room->id }}"> Delete </a>	                           

				</div>
				</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>					  
				</div>
				@endforeach

				<div class="tab-bar" style="display: none;">
				<div class="row mt-30 " >
				<nav class="navbar navbar-default" role="navigation">
				<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>                      
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

				<ul class="nav navbar-nav" style="display: inline-block; margin-top: 10px;">                    
				<li><a href="#tab1" data-toggle="tab">Overview</a></li>	
				<!-- <li><a href="#tab01" data-toggle="tab">Befefits </a></li>
				<li><a href="#tab2" data-toggle="tab">Amenities</a></li>
				<li><a href="#tab02" data-toggle="tab">Meeting & Events</a></li>
				<li><a href="#tab03" data-toggle="tab">Business</a></li>
				<li><a href="#tab3" data-toggle="tab">Features</a></li>
				<li><a href="#tab4" data-toggle="tab">Food & Drink</a></li>
				<li><a href="#tab5" data-toggle="tab">Licensing</a></li>
				<li><a href="#tab6" data-toggle="tab">Nature Day Light</a></li>
				<li><a href="#tab7" data-toggle="tab">Capacity Chart</a></li> -->
				<li><a href="#tab8" data-toggle="tab">Photos</a></li>




				</ul>
				</div><!-- /.navbar-collapse -->
				</div>
				</div>
				</nav>
				</div>
				<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8" id="venue_form">

				<div >


				<div class="tab-content">
				<style type="text/css">
				.tab-pane{ min-height: 300px; }
				.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{padding: 3px;}
				</style>
				<!--//VENUE Venue Type-->

				<!--//VENUE Contact Type-->
				<!--//VENUE Contact Type-->
				<div class="tab-pane" id="tab1">
				{{ csrf_field() }}
				<input type="hidden" value="" name="id" id="edit_id" />
				<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
				<div class="col-sm-12"><label>Title *</label><input name="title" id="title" type="text" class="form-control required" data-error="#err_title" >
				<span id="err_title" style="position: relative;
				top: -2px;"></span>
				<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
				</div>

				<!-- <div class="col-sm-6"><label>U-Shape</label><input type="text" class="form-control"></div> -->
				</div>

				<div class="form-group">
				<div class="col-sm-12">
				<label>Number guest *</label>

				<input type="text" class="form-control required" name="guest" id="guest" value="{{ old('guest') }}" data-error="#err_guest">
				<span class="error" id="err_guest" style="position:relative;top: -10px;">{{ ($errors->has('guest')) ? $errors->first('guest') : ''}}</span>

				</div>										
				</div>


				<div class="form-group">
				<div class="col-sm-12">
				<label>Number beds *</label>

				<input type="text" class="form-control required" name="bed" id="bed" value="{{ old('bed') }}" data-error="#err_bed">
				<span class="error" id="err_bed" style="position:relative;top: -10px;">{{ ($errors->has('bed')) ? $errors->first('bed') : ''}}</span>

				</div>										
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				<label>Room feet *</label>

				<input type="text" class="form-control required" name="feet" id="feet" value="{{ old('feet') }}" data-error="#err_feet">
				<span class="error" id="err_feet" style="position:relative;top: -10px;">{{ ($errors->has('feet')) ? $errors->first('feet') : ''}}</span>

				</div>										
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				<label>Deposit *</label>

				<input type="text" class="form-control required" name="deposit" id="deposit" value="{{ old('deposit') }}" data-error="#err_deposit">
				<span class="error" id="err_deposit" style="position:relative;top: -10px;">{{ ($errors->has('deposit')) ? $errors->first('deposit') : ''}}</span>

				</div>										
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				<label>Cancellation  *</label>

				<input type="text" class="form-control required" name="cancellation" id="cancellation" value="{{ old('cancellation') }}" data-error="#err_cancellation">
				<span class="error" id="err_cancellation" style="position:relative;top: -10px;">{{ ($errors->has('cancellation')) ? $errors->first('cancellation') : ''}}</span>

				</div>										
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				<label>Breakfast *</label>

				<input type="text" class="form-control required" name="breakfast" id="breakfast" value="{{ old('breakfast') }}" data-error="#err_breakfast">
				<span class="error" id="err_breakfast" style="position:relative;top: -10px;">{{ ($errors->has('breakfast')) ? $errors->first('breakfast') : ''}}</span>

				</div>										
				</div>
				</div> 
				<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
				<div class="col-sm-12"><label>Price *</label><input name="price" id="price" type="text" class="form-control required" data-error="#err_price" >
				<span id="err_price" style="position: relative;
				top: -2px;"></span>
				<span class="error">{{ ($errors->has('price')) ? $errors->first('price') : ''}}</span>
				</div>										

				</div>
				<div class="form-group">
				<div class="col-sm-12"><label>Booking Link *</label><input name="web_link" id="web_link" type="text" class="form-control required" data-error="#err_web_link" >
				<span id="err_web_link" style="position: relative;
				top: -2px;"></span>
				<span class="error">{{ ($errors->has('web_link')) ? $errors->first('web_link') : ''}}</span>
				</div>										

				</div>

				<div class="form-group mb-20">                                        
				<div class="col-sm-12 mb-8"><label>Room Description (600 characters left) *</label>
				<textarea rows="18" cols="5" class="form-control required" id="description" name="description" data-error="#err_description"> </textarea>
				<span id="err_description" style="position:relative;top: -2px;"></span>
				<span class="error">{{ ($errors->has('description')) ? $errors->first('description') : ''}}</span>
				</div> 
				</div>


				<div class="form-group">
				<div class="col-sm-12">&nbsp;</div>                                      
				</div>

				</div>

				</div>




				<!--//VENUE CAPACITY-->





				<div class="tab-pane" id="tab8">				
				<div class="dropzone" id="dropzoneEditFileUpload">

				<span id="image_1"></span>
				<span id="image_2"></span>
				<span id="image_3"></span>
				<span id="image_4"></span>
				<span id="image_5"></span>
				<span id="image_6"></span>	
				<div class="dz-message" data-dz-message><span>Drog and Drop Images Here</span></div>
				<div class="dz-message" data-dz-message><span>Maximum 6 images only allowed, minimum width:1024px </span></div>

				</div>


				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mb-10">&nbsp;</div> 
				<ul class="pager wizard">
				<li class="previous first" ><a href="javascript:;" style="display:none;">First</a></li>
				<li class="previous"><a href="javascript:;">Previous</a></li>
				<li class="next last"><a href="javascript:;" style="display:none;">Last</a></li>
				<li class="next"><input type="button" value="Next" class="btn btn-primary pull-right next-btn" style=""></li>
				<li class="finish"><input type="submit" value="Finish" class="btn btn-primary pull-right next-btn" style=""></li>							
				</ul>
				</div>
				</div>



				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>


				</div>
				<div class="col-lg-2"></div>
				</div>


				</div>   <!-- End of tab-bar -->

				</div><!-- Steps ends -->

				</div>
            
   

	</form> 
     </div>	
	  
	

	
	  <script>
	$(document).ready(function() {
		var $validator = $("#commentForm").validate({		
		  rules: {
			  "venuetype[]": {
		      required: true,		     
		    },
		    title: {
		      required: true,		    
		      minlength: 5
		    },
			price: {
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
			"category[]": {
		      required: true,		     
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
			"venuetype[]": "Please choose atleast one venue type",
			title:"Please enter a title",
			price:"Please enter a price",
			address:"Please enter a address",
			country:"Please enter a country",
			states:"Please enter a state",
			cities:"Please enter a city",
			postcode:"Please enter a postcode",
			description:"Please enter a description",
			nearest_transport_link:"Please enter a nearest transport link",
			"category[]":"Please choose atleast one occasion",
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
	
	
	
	
	
	// EDit Blog
 $(document).on("click", ".edit_blog", edit_venue);
	function edit_venue(){	
	
	$('.tab-bar').show();

$('input:checkbox').removeAttr('checked');
$('input:text').val('');
$('#upload-file-info1').html('');
$('#upload-file-info2').html('');
$('#upload-file-info').html('');
$('#upload-file-info4').html('');
$('#fd_menu_pdf_1').html('');
$('#fd_menu_pdf_2').html('');
$('#fd_menu_pdf_3').html('');
$('#fd_menu_pdf_4').html('');
$('#image_1').html('');
$('#image_2').html('');
$('#image_3').html('');
$('#image_4').html('');
$('#image_5').html('');
$('#image_6').html('');

	$('.edit_section').fadeIn('slow');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 

	var host="{{ url('admin/getroom') }}";
	$('#add_div').hide();
	$('#edit_div').fadeIn("slow");
	
	$(".editpro .alert-danger").addClass('hidden') ;
	$(".editpro .alert-success").addClass('hidden') ;
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
        },success:renderListform
	
	})
	return false;
}
function renderListform(res){ 
var url="{{ url('') }}";

//alert(result[0].view_details.image);
//var image_path=res.view_details.rooms.image;

$('#edit_id').val(res.view_details.rooms.id);	
$('#title').val(res.view_details.rooms.title);
$('#guest').val(res.view_details.rooms.guest);			
$('#bed').val(res.view_details.rooms.bed);
$('#feet').val(res.view_details.rooms.feet);
$('#breakfast').val(res.view_details.rooms.breakfast);
$('#deposit').val(res.view_details.rooms.deposit);
$('#cancellation').val(res.view_details.rooms.cancellation);
$('#web_link').val(res.view_details.rooms.web_link);
$('#price').val(res.view_details.rooms.price);
$('#description').val(res.view_details.rooms.description);	

$('html, body').animate({
        scrollTop: $(".navbar-default").offset().top
    }, 2000);


var image_path1=res.view_details.rooms.image_1;
var image_path2=res.view_details.rooms.image_2;
var image_path3=res.view_details.rooms.image_3;
var image_path4=res.view_details.rooms.image_4;
var image_path5=res.view_details.rooms.image_5;
var image_path6=res.view_details.rooms.image_6;
var v_id=res.view_details.rooms.id;
if(image_path1 != null){
	
$('#image_1').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path1+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path1+',1" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

if(image_path2 != null){
	
$('#image_2').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path2+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path2+',2" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}

if(image_path3 != null){

$('#image_3').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path3+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path3+',3" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path4 != null){

$('#image_4').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path4+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path4+',4" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path5 != null){
	
$('#image_5').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path5+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path5+',5" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
if(image_path6 != null){

$('#image_6').append('<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"><div class="dz-image"><img data-dz-thumbnail=""  src="'+url+'/uploads/venue/thumbnail/'+image_path6+'"></div><div class="dz-success-mark"></div><a class="dz-remove remove_image" id="'+v_id+','+image_path6+',6" href="javascript:void(0);" data-dz-remove="">Remove</a></div>');
}
  		
}

 $(document).on("click", ".delete_blog", deleteblog);
	function deleteblog(){ 
	
	 if (confirm("Are you sure delete hotel?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/deleted/') }}";
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
        },success:deleteStatus
	
	})
	return false;
	  return false;
    }
}
function deleteStatus(res){ 

			var id=res.delete_details.deletedid;
			 $('.rm'+id).hide();
			$(".alert-success").html(res.delete_details.deletedtatus).removeClass('hidden');

			}
$(document).on("click", ".remove_image", remove_image);
	function remove_image(){ 
	
	 if (confirm("Are you sure delete remove image?")) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var id= $(this).attr('id'); 
	var host="{{ url('admin/hotels/remove/') }}";
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
        },success:removeStatus
	
	})
	return false;
	  return false;
    }
}
function removeStatus(res){ 

			var id=res.delete_details.deletedid;
			 $('#image_'+id).hide();
			$(".alert-success").html(res.delete_details.deletedtatus).removeClass('hidden');

			}
		
	</script>
	<script type="text/javascript">
$(function() {
	var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;      
		
		 var myDropzone1 = new Dropzone("div#dropzoneEditFileUpload", {
            url: baseUrl + "/admin/dropzone/uploadFiles",			
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
		});
	</script>
	
   @stop
