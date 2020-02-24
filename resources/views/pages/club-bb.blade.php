@extends('layouts.main')
@section('head')
 <title>@if($title) {{$title}} @else Welcome to tbbc.com @endif</title> 
<meta name="description" content="@if($desc) {{$desc}} @else Welcome to tbbc.com @endif" />
<meta name="keywords" content="@if($keyword) {{$keyword}} @else Welcome to tbbc.com @endif" />
<style type="text/css">.container ul li{ text-align: left; }</style>
@section('content')
@include('layouts.othermenu')

	<section class="hero-section-inner set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>@if($page->title){{ $page->title }} @endif</h2>
		</div>
	</section>
	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
			
				
			<div class="col-lg-12 col-md-12 bb">
				<div class="col-lg-6 col-md-6 col-sm-6 text-center  ">
					<a href="javascript:void(0);" class="btn btn-primary custom-btn guest active-bg">
					
						Guest 
					
					</a> 
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 text-center">
					<a href="javascript:void(0);" class="btn btn-primary travel custom-btn">
					
					Travel Agent
				
				</a>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- Filter form section end -->



	<!-- Properties section -->
	 <section class="properties-section spad" id="guest">
		<div class="container">
			<!-- <div class="section-intro text-center">
				<img src="{{ asset('tbbc/img/hotel/2.jpg') }}">
			</div> -->

            
             

			 <div class="tab-content">


			<div class="section-title text-center mt-50">
			<h3>THE BENEFITS OF JOINING INVITED</h3>
			<p>Join INVITED and enjoy a world of instant benefits available from your very first stay, from member exclusive rates to reward night vouchers. To qualify for the benefits, reservations must be made through either www.slh.com or the SLH Voice Reservations team.</p>
			</div>
			<div class="row">

			@foreach ($GuestHotels as $GuestHotel)
			<div class="col-md-4">
			<div class="propertie-item set-bg" data-setbg="{{ asset('uploads/thumbnail/'.$GuestHotel->n_image) }}">
			<div class="propertie-info text-white">
			<div class="info-warp">
			<h5>{{ $GuestHotel->n_title }}</h5>
			<p>{{ $GuestHotel->n_location }}</p>
			</div>
			</div>
			</div>
			</div>
			@endforeach

			</div>


                 
                   @if($guest->description) {!! $guest->description !!} @endif

                  <div class="section-title text-center mt-50">
				<h3>Guest From</h3>
				<p>It’s simple – when we say the more you stay with us, the better it gets, we really mean it. INVITED is a free to join membership programme with three tiers: Invited, Inspired and Indulged. INVITED rewards members for booking directly with SLH. Don’t miss out on exclusive privileges for the independently minded.</p>
			</div>
                   	<div class="col-md-8 col-md-offset-2 "> 
                   	<form class="contact-form from-design">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>Membership Type <span>*</span></label>
									<select id="register_travel_agent_travelAgentType" name="register_travel_agent[travelAgentType]" class="form-control" autocomplete="off">            <option value="1">                International Association of Travel Agents Network
            </option>            <option value="2">                Travel Industry Designator Services
            </option>            <option value="3">                Electronic Reservation Services Provider
            </option>            <option value="4">                Cargo Network Services
            </option>            <option value="5">                Cruise Lines, Tour Operators, Other Key Bodies
            </option></select>

								
								</div>
								<div class="col-md-12 form-group">
									<label>Membership Type Other<span>*</span></label>
									<input type="text" placeholder="Membership Type Other">
								</div>

								<div class="col-md-6 form-group">
									<label>Membership #</label>
									<input type="text" placeholder="First name">
								</div>
								<div class="col-md-6 form-group">
									<label>Travel Agency</label>
									<input type="text" placeholder="Last Name">
								</div>

								<div class="col-md-6 form-group">
									<label>First Name<span>*</span></label>
									<input type="text" placeholder="First name">
								</div>
								<div class="col-md-6 form-group">
									<label>Last Name<span>*</span></label>
									<input type="text" placeholder="Last Name">
								</div>
								<div class="col-md-6 form-group">
									<label>Company/ Professional Association<span>*</span></label>
									<input type="text" placeholder="Company/ Professional Association">
								</div>
								<div class="col-md-6 form-group">
									<label>How did you hear about us?<span>*</span></label>
									<select id="register_travel_agent_referredBy" name="register_travel_agent[referredBy]" class="form-control" autocomplete="off">            <option value="0">                Please select
            </option>            <option value="FRIEND">                Friend
            </option>            <option value="RELATIVE">                Relative
            </option>            <option value="TRAVEL_MANAGER">                Company Travel Manager
            </option>            <option value="ANOTHER_MEMBER">                Another Member
            </option></select>
									
								</div>
								
								<div class="col-md-12 form-group">
									<label>Email<span>*</span></label>
									<input type="text" placeholder="Email Address">
								</div>
								<div class="col-md-6 form-group">
									<label>Password<span>*</span></label>
									<input type="text" placeholder="Phone">
								</div>
								<div class="col-md-6 form-group">
									<label>Confirm Password<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>
								<div class="col-md-6 form-group">
									<label>Phone<span>*</span></label>
									<input type="text" placeholder="Phone">
								</div>
								<div class="col-md-6 form-group">
									<label>Language<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>
								<div class="col-md-6 form-group">
									<label>Currency<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>
								
								<div class="col-md-6 form-group">
									<label>Country<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>

								<div class="col-md-12 text-left mt-10">								
									<div class="form-group">
								<input type="checkbox" class="checkbox form-control"> I want to receive updates on the latest news and offers from the TBBC Collection
								</div>
								</div>
								
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<button class="site-btn">SUMMIT</button>
							</div>
						</div>
						</form>
						 </div>
                 
               </div><!--/.tab-content -->
                

			
		</div>
	</section> 
	<!-- Properties section end -->




<!-- Travel Section -->
<!-- Properties section -->
	 <section class="properties-section spad" id="travel" style="display:none">
		<div class="container">
			<!-- <div class="section-intro text-center">
				<img src="{{ asset('tbbc/img/hotel/1.jpg') }}">
			</div> -->

            
			 <div class="tab-content">

			 	<div class="section-title text-center mt-50">
			<h3>THE BENEFITS OF JOINING INVITED</h3>
			<p>Join INVITED and enjoy a world of instant benefits available from your very first stay, from member exclusive rates to reward night vouchers. To qualify for the benefits, reservations must be made through either www.slh.com or the SLH Voice Reservations team.</p>
			</div>
			<div class="row">

			@foreach ($TravelHotels as $TravelHotel)
			<div class="col-md-4">
			<div class="propertie-item set-bg" data-setbg="{{ asset('uploads/thumbnail/'.$TravelHotel->n_image) }}">
			<div class="propertie-info text-white">
			<div class="info-warp">
			<h5>{{ $TravelHotel->n_title }}</h5>
			<p>{{ $TravelHotel->n_location }}</p>
			</div>
			</div>
			</div>
			</div>
			@endforeach

			</div>

                 
                    @if($travel->description) {!! $travel->description !!} @endif
              

                  <div class="section-title text-center mt-50">
				<h3>Travel From</h3>
				<p>It’s simple – when we say the more you stay with us, the better it gets, we really mean it. INVITED is a free to join membership programme with three tiers: Invited, Inspired and Indulged. INVITED rewards members for booking directly with SLH. Don’t miss out on exclusive privileges for the independently minded.</p>
			</div>
                   	<div class="col-md-8 col-md-offset-2 "> 
                   	<form class="contact-form from-design">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>Membership Type <span>*</span></label>
									<select id="register_travel_agent_travelAgentType" name="register_travel_agent[travelAgentType]" class="form-control" autocomplete="off">            <option value="1">                International Association of Travel Agents Network
            </option>            <option value="2">                Travel Industry Designator Services
            </option>            <option value="3">                Electronic Reservation Services Provider
            </option>            <option value="4">                Cargo Network Services
            </option>            <option value="5">                Cruise Lines, Tour Operators, Other Key Bodies
            </option></select>

								
								</div>
								<div class="col-md-12 form-group">
									<label>Membership Type Other<span>*</span></label>
									<input type="text" placeholder="Membership Type Other">
								</div>

								<div class="col-md-6 form-group">
									<label>Membership #</label>
									<input type="text" placeholder="First name">
								</div>
								<div class="col-md-6 form-group">
									<label>Travel Agency</label>
									<input type="text" placeholder="Last Name">
								</div>

								<div class="col-md-6 form-group">
									<label>First Name<span>*</span></label>
									<input type="text" placeholder="First name">
								</div>
								<div class="col-md-6 form-group">
									<label>Last Name<span>*</span></label>
									<input type="text" placeholder="Last Name">
								</div>
								<div class="col-md-6 form-group">
									<label>Company/ Professional Association<span>*</span></label>
									<input type="text" placeholder="Company/ Professional Association">
								</div>
								<div class="col-md-6 form-group">
									<label>How did you hear about us?<span>*</span></label>
									<select id="register_travel_agent_referredBy" name="register_travel_agent[referredBy]" class="form-control" autocomplete="off">            <option value="0">                Please select
            </option>            <option value="FRIEND">                Friend
            </option>            <option value="RELATIVE">                Relative
            </option>            <option value="TRAVEL_MANAGER">                Company Travel Manager
            </option>            <option value="ANOTHER_MEMBER">                Another Member
            </option></select>
									
								</div>
								
								<div class="col-md-12 form-group">
									<label>Email<span>*</span></label>
									<input type="text" placeholder="Email Address">
								</div>
								<div class="col-md-6 form-group">
									<label>Password<span>*</span></label>
									<input type="text" placeholder="Phone">
								</div>
								<div class="col-md-6 form-group">
									<label>Confirm Password<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>
								<div class="col-md-6 form-group">
									<label>Phone<span>*</span></label>
									<input type="text" placeholder="Phone">
								</div>
								<div class="col-md-6 form-group">
									<label>Language<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>
								<div class="col-md-6 form-group">
									<label>Currency<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>
								
								<div class="col-md-6 form-group">
									<label>Country<span>*</span></label>
									<select class="form-control"><option>Please Select</option></select>
								</div>

								<div class="col-md-12 text-left mt-10">								
									<div class="form-group">
								<input type="checkbox" class="checkbox form-control"> I want to receive updates on the latest news and offers from the TBBC Collection
								</div>
								</div>
								
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							<button class="site-btn">SUMMIT</button>
							</div>
						</div>
						</form>
						 </div>
                 
               </div><!--/.tab-content -->
                

			
		</div>
	</section> 
	<!-- Properties section end -->


<style type="text/css">
                	
.nav>li>a{ color:  #df1683 !important }
.nav.nav-tabs ul{ background: #ccc; }
.nav.nav-tabs li{padding-left: 0 !important; padding-right: 0px !important}
.nav.nav-tabs li a:hover, .nav.nav-tabs li a.active{ background: #df1683 !important; color: #fff !important; border-radius: 0px 0px 0px;   }
.panel-heading {
    padding: 0
}
.panel-heading a {
    display: block;
    padding: 20px 10px;
}
.panel-heading a.collapsed {
    background: #fff
}
.panel-heading a {
    background: #f7f7f7;
    border-radius: 5px;
}
.panel-heading a:after {
    content: '-'
}
.panel-heading a.collapsed:after {
    content: '+'
}
.nav.nav-tabs li a,
.nav.nav-tabs li.active > a:hover,
.nav.nav-tabs li.active > a:active,
.nav.nav-tabs li.active > a:focus {
    border-bottom-width: 0px;
    outline: none;
}
.nav.nav-tabs li a {
    padding-top: 20px;
    padding-bottom: 20px;
}
.tab-pane {
    background: #fff;
    padding: 10px; 
    margin-top: -1px;
}



/* used for sidebar tab/collapse*/
@media (max-width: 991px) {
  .visible-tabs {
    display: none;
  }
}

@media (min-width: 992px) {
  .visible-tabs {
    display: block !important;
  }
}

@media (min-width: 992px) {
  .hidden-tabs {
    display: none !important;
  }
}

                </style>
                <script type="text/javascript">
                	$(document).ready(function() {


    $('.guest').click(function(){ 
    	$(this).addClass('active-bg');
    	$('.travel').removeClass('active-bg');
		$('#travel').fadeOut()
		$('#guest').fadeIn()
		});
		$('.travel').click(function(){
		$(this).addClass('active-bg');
    	$('.guest').removeClass('active-bg');
		$('#guest').fadeOut()
		$('#travel').fadeIn()
		});
		});
                </script>
 @stop