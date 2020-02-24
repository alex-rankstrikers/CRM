<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome to</title>

    <meta name="description" content="">
    <meta name="author" content="Ivan Radunovic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/css/mdb.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head')
<style>
 .dropdown-menu li {width:100% !important;padding-right: 0px !important;}
 .navbar-nav>li>a{padding-top:0px !important;padding-bottom:0px !important;line-height:0px !important;
 
 }
 .nav>li>a{padding:0px !important;}
 .nav .open>a, .nav .open>a:hover, .nav .open>a:focus{background:none !important;}
 .navbar-nav>li{float:none;}
 </style>
</head>

<body>

<!--Navigation-->
<header>

@include('partials.above-navbar-alert')

<!--Navbar-->
    <nav class="navbar navbar-dark scrolling-navbar mdb-gradient">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i></button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">

                <!--Links-->
                <ul class="nav navbar-nav">                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.home')  }}"><i class="fa fa-home"></i> Home</a>
                    </li>
                   
                </ul>

                <!--Navbar icons-->
                <ul class="nav navbar-nav nav-flex-icons">
				@if(!Auth::check())
			 <li><a href="{{ url('ask-a-venue-expert') }}">Ask a Venue Expert</a></li>	
                    <li >
                        <a  href="{{ url('login') }}">List Your Venue</a>
                    </li>                   
                    @else
                   <?php /*
						{{ Auth::user()->first_name }} */?>
						 <li  class="dropdown" >
                        <a  href="" class="dropdown-toggle" data-toggle="dropdown">Venues<span class="glyphicon caret"></span></a>
						<ul class="dropdown-menu">
						<li >
                        <a  href="{{ Auth::user()->homeUrl() }}"> My Venue</a>
                    </li>
						<li><a  href="{{ url('merchant/add-venue') }}">Add Venue </a></li>
						<li><a  href="{{ url('merchant/edit-venue') }}">Edit Venue </a></li>
						<li><a  href="{{ url('merchant/add-venue-contact') }}">Add Venue Contact </a></li>
						<li><a  href="{{ url('merchant/edit-venue-contact') }}">Edit Venue Contact </a></li>
						</ul>
						
                    </li>
						 <li >
                        <a  href="{{ url('merchant/enquiry') }}"> Enquiries</a>
                    </li>
					 <li  class="dropdown" >
                        <a  href="" class="dropdown-toggle" data-toggle="dropdown"> Settings <span class="glyphicon caret"></span></a>
						<ul class="dropdown-menu">
						<li><a  href="{{ url('merchant/payment-plan') }}">Payment Plan </a></li>	
                        <li><a  href="{{ url('merchant/orders') }}">My Orders</a></li>					
						<li><a  href="{{ url('merchant/edit-profile') }}">Edit Profile </a></li>
						<li><a  href="{{ url('merchant/update-password') }}">Update Password </a></li>
						<li >
                        <a  href="{{ url('logout') }}"> Logout</a>
                    </li>
						</ul>
						
                    </li>
					 
                   
                    
                    @endif
                  
                </ul>

            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->


</header>
<!--/Navigation-->

<main>
<div class="container">

    <div style="height: 90px;"></div>
	  <ul><li><a><i class="fa fa-building-o"></i>Merchants  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('merchant/users') }}">Users</a></li>
                      <li><a href="{{ url('merchant/listing') }}">Listing</a></li>
					  <li><a href="{{ url('merchant/campaigns') }}">Campaigns</a></li>					 
                    </ul>
                  </li>
	</ul>
    @yield('content')

</div> <!-- /container -->
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('admin-assets/vendors/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/js/mdb.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('assets/js/ie10-viewport-bug-workaround.js') }}"></script>

@yield('footer')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60551246-3', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
