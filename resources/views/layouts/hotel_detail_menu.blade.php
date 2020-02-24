<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section-view-hotel">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 header-top-left">
						<div class="top-social">
							<a href="{{ url('') }}" >HOME</a>
							<a href="{{ url('our-story') }}">OUR STORY</a>
							<a href="{{ url('what-we-do') }}">WHAT WE DO</a>
							<a href="{{ url('client-shout-outs') }}" >CLIENT SHOUT OUTS </a>
							<a href="{{ url('partner-ship') }}">PARTNERSHIP </a>
							<a href="{{ url('contact-us') }}">CONTACT</a>						
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 text-lg-right header-top-right">
						<div class="row">
						
					<div class="col-lg-12 col-md-12 col-sm-12 text-right">
						<div class="user-panel">
							 @if(!Auth::check())
							<a href="{{ url('register') }}"><i class="fa fa-user-circle-o"></i> Hotelier Registration</a>
							<a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a>
							 @else
							 <a href="{{ Auth::user()->homeUrl() }}"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->first_name }}</a>
							<a href="{{ url('logout') }}"><i class="fa fa-sign-in"></i> Logout</a>
							  @endif
						</div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="{{ url('') }}" class="site-logo"><img src="{{ asset('tbbc/img/Main-Logo.svg') }}" style="height: 80px" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							
							<li><a href="{{ url('find-a-hotel') }}">FIND A HOTEL</a></li>
							<li><a href="{{ url('offers') }}">LIMITED TIME OFFERS</a></li>
							<li><a href="{{ url('club-bb') }}">CLUB BB</a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

<div style="clear: both"></div>
<style>
 .dropdown-menu li {width:100% !important;padding-right: 0px !important;}
 
 </style>

