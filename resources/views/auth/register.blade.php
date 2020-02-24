@extends('layouts.main')

@section('head')
    {!! HTML::style('/assets/css/register.css') !!}
    {!! HTML::style('/assets/css/parsley.css') !!}
@stop
@section('content')
@include('layouts.othermenu')


    <!-- Page top section -->
    <section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
        <div class="container text-pink">
            <h2>Hotelier Registration</h2>
        </div>
    </section>
    <!--  Page top end -->


    <section class="page-section contact-page">
        <div class="container">
            
            <!-- <div class="contact-info-warp">
                <p><i class="fa fa-map-marker"></i>3475411-564 Nudf dfSt, dfgMo, Sippi</p>
                <p><i class="fa fa-envelope"></i>info@tbbc.com</p>
                <p><i class="fa fa-phone"></i>(+00) 000 000 0000</p>
            </div> -->
            <div class="row">
                
                <div class="col-lg-6">
                            <div class="section-title">
                                        <h3 class="main-link">Submitting Your Hotel
            for a TBBC Review</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco
            laborest laborum.</p>   

                                    </div>
                                    <div class="section-title">
                                        <h3 class="main-link">Why TBBC?</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco
            laborest laborum.</p>   

                                    </div>
                                    <div class="section-title">
                                        
                                        <p><span class="main-link quat">"</span>Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco
            laborest laborum.<span class="main-link quat">"</span></p>  
            <p>&nbsp;</p>
            <p>Client Name | Title</p>
            <p>Hotel Name</p>

                                    </div>

                
                <div style="clear: both;"></div>                
                
                </div>


<div class="col-lg-1"></div>
                <div class="col-lg-5">                  
                        
                       
                             {!! Form::open(['url' => url('register'), 'class' => 'contact-form', 'data-parsley-validate' ] ) !!}
                            <div class="row">
                               
                                @include('includes.errors')
                                <div class="col-md-12 form-group">
                                    <label>Hotel Name *<span>*</span></label>
                                    <input type="text" name="hotel_name" placeholder="Hotel Name" id = 'inputHotelName'data-parsley-required-message='Hotel Name is required' data-parsley-trigger  = 'change focusout'  data-parsley-pattern ='/^[a-zA-Z]*$/'   data-parsley-minlength='2'data-parsley-maxlength='50' required value="{{ old('hotel_name') }}">
                                </div>                                

                                <div class="col-md-12 form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="first_name" placeholder="First name" id = 'inputFirstName'data-parsley-required-message='First Name is required' data-parsley-trigger  = 'change focusout'  data-parsley-pattern ='/^[a-zA-Z]*$/'   data-parsley-minlength='2'data-parsley-maxlength='32' required value="{{ old('first_name') }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Last Name<span>*</span></label>
                                   <input type="text" name="last_name" placeholder="Last name" id = 'inputLastName'data-parsley-required-message='Last Name is required' data-parsley-trigger  = 'change focusout'  data-parsley-pattern ='/^[a-zA-Z]*$/'   data-parsley-minlength='2'data-parsley-maxlength='32' required value="{{ old('last_name') }}">
                                </div>
                                
                                
                                <div class="col-md-12 form-group">
                                    <label>Email<span>*</span></label>
                                   <input type="email" name="email" placeholder="Email Address" id = 'inputEmail'data-parsley-required-message='Email Address is required' data-parsley-trigger  = 'change focusout' data-parsley-type='email' required value="{{ old('email') }}">
                                </div>
                                  <div class="col-md-12 form-group">
                                    <label>Password<span>*</span></label>
                                   <input type="password" name="password" placeholder="Password" id = 'inputPassword'data-parsley-required-message='Password is required' data-parsley-trigger  = 'change focusout' data-parsley-minlength='6' data-parsley-maxlength='20' required value="{{ old('password') }}">
                                </div>
                                  <div class="col-md-12 form-group">
                                    <label>Confirm Password<span>*</span></label>
                                   <input type="password" name="password_confirmation" placeholder="Confirm Password" id = 'inputPasswordConfirm'data-parsley-required-message='Confirm Password is required' data-parsley-equalto='#inputPassword' data-parsley-equalto-message='Not same as Password' data-parsley-trigger  = 'change focusout'  required value="{{ old('password_confirmation') }}">
                                </div>                             

                                
                                <div class="col-md-12 form-group">
                                    <label>Phone<span>*</span></label>
                                    <input type="phone" name="phone" placeholder="Phone" id = 'inputPhone'data-parsley-required-message='Phone Number is required' data-parsley-trigger  = 'change focusout' data-parsley-minlength='10' data-parsley-maxlength='15' required value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Hotel Website<span>*</span></label>
                                    <input type="text" name="website" placeholder="Website" id = 'inputWebsite'data-parsley-required-message='Web site is required' data-parsley-trigger  = 'change focusout' required value="{{ old('website') }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Any comments?</label>
                                    <input type="text" name="comments" placeholder="Comments?" value="{{ old('comments') }}">
                                </div>                              
                                
                                
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <button class="site-btn" type="submit">SUMMIT</button>
                            </div>
                        </div>
                         {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </section>




	   <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"><a type="button" class="close text-right" data-dismiss="modal" aria-hidden="true">&times;</a>
           <div class="modal-header">       
                
				<h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
				
            </div>
			
            <div class="modal-body">            
			   
			   <section class="about_cont tems-cont" style="margin-top:0px;">
           
			<h4>Important</h4>
		   <p class="text-justify">By being a member of the website or by accessing the website, you agree to the terms and conditions mentioned. If you do not agree with the declared terms and conditions then you are unauthorized to use or access this site.</p>
 <div class="row mt-30"></div>
<h4>Definitions</h4>
		 <ul>

<li>'We', "Us" and "Our" refers to Paravigs Ltd.  and all its subsidiary and associated companies.</li>
<li>"You" refers to the user of this Site.</li>
<li>"Site" refers to this website on the World Wide Web, which is located at www.searchvenue.co.uk.</li>
<li>"Content" refers to the information and all other material which is available on the Site.</li>
<li>"User" refers to a visitor to the Site, who has signed up for information online.
<li>"Supplier” refers to an individual or company who has agreed to display their company information on the Site.</li>
<li>"Listing" refers to a page displaying contact information on a given Supplier.</li>
</ul>
 <div class="row mt-30"></div>
<h4>Data Protection</h4>
 <p class="text-justify">As your privacy is very important to us, Paravigs Ltd operates on the underlined principles:</p>
  <ul>
<li>We will explicitly ask for information that personally identifies you (‘Personal Information’) when needed. You will for example be asked to provide your name and email address when registering with www.searchvenue.co.uk.</li>
<li>Your Personal Information may be shared with necessary third party merchants when you purchase services through www.searchvenue.co.uk.</li>
<li>Personal Information may also be used by Paravigs Ltd to send you information that may be of interest to you and keep you informed on new services, products and features from time to time.</li>
</ul>
<div class="row mt-30"></div>
<p class="text-justify">You may choose to opt out of receiving any promotional material directly from www.searchvenue.co.uk or our associated suppliers by writing to <a href="#">hello@searchvenue.co.uk</a>
</p>

<p class="text-justify">Personal Information can be edited or modified on the user dashboard at any time you wish, to keep your details current and correct.</p>
 <div class="row mt-30"></div>
<h4>Rights reserved</h4>
 <p class="text-justify">Site Content is for your personal use only and you may download the Content onto only one computer hard drive. You agree not to (and agree not to assist or facilitate any third party to) copy, distribute, transmit, reproduce, publish, commercially exploit or create derivative works from the Content.</p>
 <div class="row mt-30"></div>
 <h4>Liability</h4>
 <p class="text-justify">The Site and Paravigs Ltd shall not be liable for any damage or loss whatsoever arising directly or indirectly from, or in any way connected with, the Site, or for your use of/reliance upon the Content or any information you obtain by means of the Site whether based on contract, tort, negligence or statutory duty; even if we or any of our suppliers has been advised of the possibility of such loss or damage. Your statutory rights in relation to any goods or services purchased through the Site are not affected.</p>
 <div class="row mt-30"></div>
  <h4>Availability of the website</h4>
 <p class="text-justify">You accept that technically it is not possible to provide the website free of faults and that we do not undertake to do so; such faults may lead to the temporary unavailability of the Site. The operation of the Site at this time may be adversely affected by performances and conditions outside of our control. This includes transmission and telecommunications links between you and us, and other networks and systems. Improvements and/or changes to the Site and its Content may be made by us at any time.</p>
 <div class="row mt-30"></div>
 
 <h4>Payment</h4>
 <ul>
 <li>All Payments will be taken by cheque, debit or credit card.</li>
 <li>All Credit card payments can be made either by Visa/Visa Debit or by Master Card.</li>
 <li>You can call from Monday to Friday during normal office hours and you may also order by telephone. </li>
 <li>Please have to hand the details of the products that you want to purchase and the method of payment.</li>
 <li>Agreed payment to www.searchvenue.co.uk will directly be debited from your account before confirming the bookings. You must confirm that the debit or credit card being used is yours by phone, post or by e-mail.</li>
 <li>Payments are accepted also by cheque – but please note that bookings will not be confirmed and cannot be sent or initiated until the cheque has been cleared. Please send your cheque (with your address and cheque guarantee card number on the back) to Paravigs Ltd, 25 Brock Road, London, E13 8NA.</li>
 <li>We will take all reasonable care, in so far as it is in our power to do so, to keep the details of your order and payment secure. However in the absence of negligence on our part we cannot be held liable for any loss you may suffer if a third party procures unauthorised access to any data you provide when accessing or ordering from the Site.</li>
 <li>Party and Event bookings: Holding deposits are payable for all functions or events organized through www.searchvenue.co.uk, at the time of booking. The outstanding total must then be paid directly to the venue on the day of your event.</li>
 </ul>
 <div class="row mt-30"></div> 
 <h4>Cancellation</h4>
 <p class="text-justify">If a booking needs to be cancelled for any reason we must be advised immediately by you or appropriate members of your party.</p>
  <p class="text-justify">Cancellations can be made by telephone or e-mail to hello@searchvenue.co.uk – any cancellations that are made directly with the venue will not be valid.</p>
   <p class="text-justify">Cancellation charges are applicable to all bookings made through us. In certain cases cancellation charges will appear as a percentage of the final booking cost, and are calculated on the basis of the total cost payable by the booker - excluding amendment charges and insurance premiums. These charges are not refundable in the event of a cancellation.</p>
    <p class="text-justify">www.searchvenue.co.uk will not be held responsible for the non-completion or postponement of any event occurring as a result of:</p>
	<ul>
	<li>Lockouts, riots or strikes affecting the trade.</li>
	<li>Cancellation due to loss or damage or fire, flood or any other natural cause which is beyond control.</li>
	<li>Adverse weather conditions.</li>

	</ul>
  <p class="text-justify">All the above mentioned terms and conditions are ruled by the English Law and in case of any dispute, the parties shall present to the exclusive authorities of the English courts. In respect to any violation of these Terms and Conditions, including functional Terms, the liability of Paravigs Ltd. shall not widen any significant loss whatsoever suffered by the guests or by the client.</p>
 
 <div class="row mt-30"></div>
  <h4>Copyright and Trademark Notices</h4>
  <p class="text-justify">All content on this website are: Copyright @ 2007 Paravigs Ltd. and/or its suppliers. All rights reserved.</p>
   <p class="text-justify">Paravigs Ltd. is a company registered in England, No. 9097923 registered office:</p>
     <p class="text-justify">25 Brock Road, London, E13 8NA.</p>
	   <p class="text-justify">You can contact Paravigs Ltd by:</p>
  <p class="text-justify">Email: hello@searchvenue.co.uk</p>
 
 <div class="row mt-30"></div>

          </section>	
		
        </div>
    </div>
</div>
</div>
<script >
    $(document).ready(function(){
    var token = 'bbd3d49534c743899cff6a378550b84d',//'YOUR ACCSESS TOKEN', 
        userid = '78503f3cf43f4680a82cc43b038657df',//YOUR UserID,
        num_photos = 10; // how much photos do you want to get

    $.ajax({
        url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent',
        dataType: 'jsonp',
        type: 'GET',
        data: {access_token: token, count: num_photos},
        success: function(data){
            console.log(data);
            for( n in data.data ){

                $('body').append('<div><img src="'+data.data[n].images.standard_resolution.url+'"></div>');

            }
        },
        error: function(data){
            console.log(data);
        }
    });
        })
</script>
<script>
$(document).on("click", ".onclk", function () {
     var venue_id = $(this).data('id'); 
     $(".modal-body #venue_id").val( venue_id );    
     // it is superfluous to have to manually call the modal.
    $('#myModal').modal('show');
});

</script>
      <!--  @include('partials.socials')-->



@stop

@section('footer')

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>

   <!--  {!! HTML::script('/assets/plugins/parsley.min.js') !!} -->

    <script src='https://www.google.com/recaptcha/api.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js'></script>

@stop