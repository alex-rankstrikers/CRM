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
							
							<!-- <table id="mytable">
						<tr data-depth="0" class="collapse level0">
						<td><span class="toggle collapse"></span>Item 1</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse level1">
						<td><span class="toggle"></span>Item 2</td>
						<td>123</td>
						</tr>
						<tr data-depth="2" class="collapse level2">
						<td>Item 3</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse level1">
						<td>Item 4</td>
						<td>123</td>
						</tr>
						<tr data-depth="0" class="collapse collapsable level0">
						<td><span class="toggle collapse"></span>Item 5</td>
						<td>123</td>
						</tr>
						<tr data-depth="1" class="collapse collapsable level1">
						<td>Item 6</td>
						<td>123</td>
						</tr>
					</table> -->
                    
														  <table class="table table-hover table-expandable table table-bordered" id="hoteltable" width="100%" cellspacing="0">
						 
							<thead>
							  <tr>
								<!--<th><input type="checkbox" id="selectall"/></th>-->
								<th>Business</th>
								<th>Region</th>
								<th>Country</th>
								<th>City</th>
								<!-- <th>Agent</th> -->
								<th>Contact</th>
								<th>Designation</th>
								<th>Contact Number</th>
								<!-- <th>Implant/Outplant</th> -->
								<th>Email</th>
								<!-- <th>Sales Manager</th> -->
								<!-- <th>Linked Hotel Targets</th> -->
								<th><!-- Follow up --></th>
								<th>Notes</th>
								<!-- <th>Business Providers</th> -->
							  </tr>
							</thead>
							 <!-- <tfoot>
							  <tr>
							
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
								
							  </tr>
							</tfoot> -->
							</tbody>
							@if(count($hotelsCont))
							<?php $i=1;?>
							 @foreach ($hotelsCont as $cor_view)
								
								<tr>
									<!--<td><input type='checkbox' name='dataval[]' ></input></td>-->
									<td >{{ $cor_view->hl_business_name }}</td>
									<td>{{ $cor_view->hl_regional_name }}</td>
									<td>{{ $cor_view->countries }} </td>
									<td>{{ $cor_view->cities }}</td>
									 <!-- <td></td> --> 
									<td>{{ $cor_view->hl_first_name}}</td>
									<td>{{ $cor_view->hl_title}}</td>
									<td>{{ $cor_view->hl_mob_no }}</td>
									<!-- <td></td> -->
									<td>{{ $cor_view->cemail }}</td>
									<!-- <td>{{ $cor_view->hl_first_name }}</td>
									<td></td> -->
									
									<td align="center"><a href="{{url('crm/events')}}"><i class="fa fa-calendar" aria-hidden="true"></i></a></td>

									<td ><div align="center"><a href="#notes_model{{ $i }}" class="" data-toggle="modal" data-target="#notes_model{{ $i }}"><i class="fa fa-edit fa-lg"></i></i>

</a></div>
									<div id="notes_model{{ $i }}" class="modal fade" role="dialog">
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
								
									
								</tr>
								<tr>
						<td colspan="13">
							<br/><h4>Edit Business Information</h4><br/>

<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										<label>Business name *</label><input name="business_name" id="business_name" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_title" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('business_name')) ? $errors->first('business_name') : ''}}</span>
										
										
                                        </div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Agent Type *</label><select name="business_type" id="business_type" class="form-control required" data-error="#err_type" >
										<option value="">
										 ---Choose---
										 </option>
										
										
									   </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('business_type')) ? $errors->first('business_type') : ''}}</span>
										</div>
										

                                     <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Office Address *</label><input type="text" name="address1" id="address1" value="{{ old('address1') }}" class="form-control required" data-error="#err_address1" ><span id="err_address1" style="position:relative;top: -2px;"></span>
                                        
                                        <span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span> 
										                                       
                                    </div>
                                    
                                    
                                        <div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select name="h_country" id="h_country"  class="form-control country required" data-error="#err_country" >		
									<option value="">Choose Country</option>									
										@include ('panels.crm.countries')
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('country')) ? $errors->first('country') : ''}}</span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
											<label>States *</label><select name="states" id="states"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states')) ? $errors->first('states') : ''}}</span>
									</div>										
                                   
									 
							
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City *</label><select name="cities" id="cities"  class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities')) ? $errors->first('cities') : ''}}</span>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>

								
								<div class="form-group col-sm-12 col-md-6 col-lg-6">
                                        <label>Postcode *</label><input type="text" class="form-control required" name="postcode" id="postcode" value="{{ old('postcode') }}" data-error="#err_postcode">
										<span id="err_postcode" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode')) ? $errors->first('postcode') : ''}}</span>
										</div>
										
                                         
                                
									
								<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Website *</label><input type="text" class="form-control required" name="website" id="website" value="{{ old('postcode') }}" data-error="#website">
										<span id="website" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('website')) ? $errors->first('website') : ''}}</span>
										
										
                                         
                                    </div>
                                    	
                                    
</div>




<br/>
							<h4>Edit Agent Regional office location</h4>
<br/>

                                 <div class="row">
                                 		<div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Select Head Office *</label>
                                   		<select name="head_off1[]" id="head_off1" class="form-control">
                                   			<option value="">Select Heade office</option>
                                   			
                                   		</select>
                                   		
										<span id="err_address1" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>
										
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>IATA/ARC/TIDS/CLIA/TRUE Number *</label>
										
										<input name="iata_number[]" id="iata_number1" type="text" class="form-control required" data-error="#err_iata_number1" >
										
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('location_type')) ? $errors->first('location_type') : ''}}</span>
										</div>
										
                                  
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Office Address *</label><input name="off_address1[]" id="off_address1" type="text" class="form-control required" data-error="#err_title" >
										<span id="err_address1" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>
										
										</div>
										
										
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Country *</label>
										<select name="country1" id="country1"  class="form-control country required" data-error="#err_country1" >		
									<option value="">Choose Country</option>									
										@include ('panels.crm.countries')
									 </select>
									 <span id="err_country" style="position:relative;top: -2px;"></span>
									 <span class="error">{{ ($errors->has('country1')) ? $errors->first('country1') : ''}}</span>
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>States *</label><select name="states1[]" id="states1" class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
									 <span id="err_states" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('states1')) ? $errors->first('states1') : ''}}</span>
									</div>
									
                                    <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>City *</label><select name="cities1[]" id="cities1"  class="form-control required" data-error="#err_cities">		
										<option value="">
										 ---Choose---
										 </option>
									 </select>									 
                                     <span id="err_cities" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('cities1')) ? $errors->first('cities1') : ''}}</span>
                                        <!-- <div class="col-sm-6"><label>Buffet</label><input type="text" class="form-control"></div> -->
                                    </div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label>Postcode *</label><input type="text" class="form-control required" name="postcode1[]" id="postcode1" value="{{ old('postcode') }}" data-error="#err_postcode1">
										<span id="err_postcode1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('postcode1')) ? $errors->first('postcode1') : ''}}</span>
										</div>
										
										
							
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group">
										
										<label>Location Type *</label>
										<select name="location_type[]" id="location_type"  class="form-control states required" data-error="#err_states">
										<option value="">
										 ---Choose---
										 </option>
										 
										 <option value="Regional Office">Regional Office</option>
										 <option value="Country Office">Country Office</option>
										</select>
										
										
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('location_type')) ? $errors->first('location_type') : ''}}</span>
										</div>
										
									
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Office Number*</label><input name="contact_number1[]" id="contact_number1" type="text" class="form-control required" data-error="#err_linked_in" >
										<span id="err_linked_in" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_number')) ? $errors->first('contact_number') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="email1[]" id="email1" type="text" class="form-control required" data-error="#err_email1" >
										<span id="err_email1" style="position: relative;
    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_email')) ? $errors->first('contact_email') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Lead Type *</label><select name="lead_type1" id="lead_type1" class="form-control required" data-error="#err_type" >
										<option value="">
										 ---Choose---
										 </option>
									
										 </select>
										<span id="err_type" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('lead_type1')) ? $errors->first('lead_type1') : ''}}</span>
										</div>
										
										 <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                                       <label>Subsidiary of</label>

									
                                        	 <input type="text" class="form-control required" name="subs_of1" id="subs_of1" value="{{ old('postcode') }}" data-error="#subs_of1"> 
										<span id="subs_of1" style="position:relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('subs_of1')) ? $errors->first('subs_of1') : ''}}</span>
										
										
                                         
                                    </div>
                                 </div>
								<br/>
                                <br/><h4>Edit Agent Contact</h4>
                                <br>

                                 <div class="col-lg-12  row">
						 	
							 <div class="col-sm-12 col-md-6 col-lg-6  form-group"><label>Select Office  *</label>
                                   		<select name="head_off2[]" id="head_off2" class="form-control">
                                   			<option value="">Select Office Location</option>
                                   			
                                   		</select>
                                   		
										<span id="err_address1" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('address1')) ? $errors->first('address1') : ''}}</span>
										
										</div>

										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Contact Designation *</label>
										<select name="contact_designation[]" id="contact_designation" type="text" class="form-control required" data-error="#err_contact_designation">
										<option value="">Choose</option>
										
										</select>
										<span id="err_contact_designation" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('contact_designation')) ? $errors->first('contact_designation') : ''}}</span>
										</div>
                                     
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><div style=""><label>Title *</label>
<select name="title[]" id="title" type="text" class="form-control required" data-error="#err_title"><option value="">Choose Title</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option></select>
											
										<span id="err_contact_person" style="position: relative; top: -2px;"></span>
										<span class="error">{{ ($errors->has('title')) ? $errors->first('title') : ''}}</span>
										</div>
										</div>
										
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>First Name *</label><input name="first_name[]" id="first_name" type="text" class="form-control required" data-error="#err_first_name" >
										<span id="err_first_name" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('first_name')) ? $errors->first('first_name') : ''}}</span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Last Name *</label><input name="last_name[]" id="last_name" type="text" class="form-control required" data-error="#err_last_name" >
										<span id="err_last_name" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('last_name')) ? $errors->first('last_name') : ''}}</span>
										</div>
										
										
										
								
										
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Mobile Number</label><input name="mobile_no[]" id="mobile_no" type="text" class="form-control required" data-error="#err_mobile_no" >
										<span id="err_mobile_no" style="position: relative;
										top: -2px;"></span>
										<span class="error">{{ ($errors->has('mobile_no')) ? $errors->first('mobile_no') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Email *</label><input name="email[]" id="email" type="text" class="form-control required" data-error="#err_email" >
										<span id="err_email" style="position: relative;    top: -2px;"></span>
										<span class="error">{{ ($errors->has('email')) ? $errors->first('email') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>LinkedIn Contact </label><input name="linkedin_contact[]" id="linkedin_contact" type="text" class="form-control required" data-error="#err_linkedin_contact" >
										<span id="err_linkedin_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('linkedin_contact')) ? $errors->first('linkedin_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Skype Contact </label><input name="skype_contact[]" id="skype_contact" type="text" class="form-control required" data-error="#err_skype_contact" >
										<span id="err_skype_contact" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('skype_contact')) ? $errors->first('skype_contact') : ''}}</span>
										</div>
										
										<div class="col-sm-12 col-md-6 col-lg-6 form-group"><label>Date of Birth </label><input name="dob[]" id="dob" type="date" class="form-control required" data-error="#dob" >
										<span id="err_dob" style="position: relative;top: -2px;"></span>
										<span class="error">{{ ($errors->has('dob')) ? $errors->first('dob') : ''}}</span>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 form-group aligncheck"><span><input type="checkbox" id="event_invite" class="" >Not Eligible for event invite </input></span>
										
										</div>

											<div align="right" class="form-group col-sm-12 col-md-12 col-lg-12 pull-right">
						<input style="width:auto;" type="submit" id="saveform" value="Update" class="btn btn-primary  next-btn" style="">
						</div>
                                        </div>



						</td>
					</tr>
								<?php $i++;?>
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

	<style type="text/css">
	/*	table td {
		border: 1px solid #eee;
		}
		.level1 td:first-child {
		padding-left: 15px;
		}
		.level2 td:first-child {
		padding-left: 30px;
		}

		.collapse .toggle {
		background: url("http://mleibman.github.com/SlickGrid/images/collapse.gif");
		}
		.expand .toggle {
		background: url("http://mleibman.github.com/SlickGrid/images/expand.gif");
		}
		.toggle {
		height: 9px;
		width: 9px;
		display: inline-block;   
		} */
	</style>
	
	<script type="text/javascript">
	  $(function() {
  /*  $('#mytable').on('click', '.toggle', function () {
        //Gets all <tr>'s  of greater depth
        //below element in the table
        var findChildren = function (tr) {
            var depth = tr.data('depth');
            return tr.nextUntil($('tr').filter(function () {
                return $(this).data('depth') <= depth;
            }));
        };

        var el = $(this);
        var tr = el.closest('tr'); //Get <tr> parent of toggle button
        var children = findChildren(tr);

        //Remove already collapsed nodes from children so that we don't
        //make them visible. 
        //(Confused? Remove this code and close Item 2, close Item 1 
        //then open Item 1 again, then you will understand)
        var subnodes = children.filter('.expand');
        subnodes.each(function () {
            var subnode = $(this);
            var subnodeChildren = findChildren(subnode);
            children = children.not(subnodeChildren);
        });

        //Change icon and hide/show children
        if (tr.hasClass('collapse')) {
            tr.removeClass('collapse').addClass('expand');
            children.hide();
        } else {
            tr.removeClass('expand').addClass('collapse');
            children.show();
        }
        return children;
    });
});
*/
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
