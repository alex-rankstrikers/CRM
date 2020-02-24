<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APLBC</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/mdi/css/materialdesignicons.min.css') }} ">
    <!--<link rel="stylesheet" href="{{ asset('admin-assets/vendors/base/vendor.bundle.base.css')}}">-->
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/simple-calendar.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/dropdowntree.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/jquery.multiselect.css')}}">
	<link href="{{ asset('admin-assets/vendors/dataTables/buttons.dataTables.min.css') }}" rel="stylesheet">
	
	<link href="{{ asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin-assets/css/hummingbird-treeview.css') }}" rel="stylesheet">
	<link href="{{ asset('admin-assets/css/jquery.magicsearch.css') }}" rel="stylesheet">
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

	<link href="{{ asset('admin-assets/css/intlTelInput.css')}}" rel="stylesheet" type="text/css">
	
    <!-- endinject -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="images/favicon.png" />
	<script src="{{ asset('admin-assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin-assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('admin-assets/js/moment.min.js')}}"></script>
	
<!--
	<script src="{{ asset('admin-assets/vendors/jquery/jquery.min.js')}}"></script>-->
	
	<script src="{{ asset('admin-assets/js/jquery-ui.custom.min.js')}}"></script>
	<script src="{{ asset('admin-assets/js/fullcalendar.min.js')}}"></script>
	<script src="{{ asset('admin-assets/js/intlTelInput.js')}}"></script>
	<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.bootstrap.wizard.js')}}"></script>

	<script src="{{ asset('admin-assets/js/hummingbird-treeview.js')}}"></script>
	 <script src="{{ asset('admin-assets/js/jquery.simple-calendar.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{ asset('admin-assets/js/dropdowntree.js')}}"></script>
	<script src="{{ asset('admin-assets/js/bootstrap-multiselect.js')}}"></script>
	<script src="{{ asset('admin-assets/js/jquery.multiselect.js')}}"></script>
	<script src="{{ asset('admin-assets/js/jquery.magicsearch.js')}}"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
			
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


	<script src="{{ asset('admin-assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	
	<link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap-datetimepicker.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- INCLUDES -->
<link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap-table-expandable.css')}}">
<script src="{{ asset('admin-assets/js/bootstrap-table-expandable.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.js"> </script>
		<script type="text/javascript">
				  
				  
			
			
			/*$(function() {
			var input = document.querySelector("#contact_no");
			window.intlTelInput(input, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "{{ url('') }}/admin-assets/build/js/utils.js"
			});
			
			/*var input = document.querySelector("#contact_number");
			window.intlTelInput(input, {
			allowExtensions: true,
			autoFormat: false,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			numberType: "MOBILE",
			//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "{{ url('') }}/admin-assets/build/js/utils.js"
			});
			});*/
			

		</script>
<script src="{{ asset('admin-assets/js/jquery.userTimeout.js') }}"></script>
<script >
	$(document).userTimeout({
logouturl: "{{url('logout')}}",
session: 600000,
force:20000,
});
</script>
  </head>
 
  <body>
<?php 
// if (session_status() == PHP_SESSION_NONE) {
// session_start();
// }
// if($_SESSION['oauth_state']){
// $acc_token=$_SESSION['oauth_state'];//Session::get('acc_token');
// }else{
// $acc_token='';
// }
?>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    
		<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#"><img class="img-responsive " style="width:50%;display:initial;" src="{{ asset('aplbc/Insigthslogo-02.svg')}}"></img></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			 <!--  <li class="nav-item">
				<a class="nav-link" href="{{ url('crm/dashboard') }}">
				  
				  Dashboard
				  <span class="sr-only">(current)</span>
				  </a>
			  </li> -->
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 
					<!--<span class="badge badge-primary">11</span>-->
				
				  Hotel Leads
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('crm/add-hotel') }}">Add Leads</a>
				  <a class="dropdown-item" href="{{ url('crm') }}">View Leads</a>
				 <!-- <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Something else here</a>-->
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 
					<!--<span class="badge badge-primary">11</span>-->
				
				  Partner Hotels
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('hotelier/portal-add') }}">Add Partner Hotels</a>
				  <a class="dropdown-item" href="{{ url('hotelier/hotel-portal') }}">View Partner Hotels</a>
				 <!-- <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Something else here</a>-->
				</div>
			  </li>
			 
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 
					<!--<span class="badge badge-primary">11</span>-->
				
				  Corporate
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('crm/add-corporate') }}">Add Corporate Contacts</a>
				  <a class="dropdown-item" href="{{ url('crm/view-corporate') }}">View Corporate Contacts</a>
				 <!-- <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Something else here</a>-->
				</div>
			  </li>

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 
					<!--<span class="badge badge-primary">11</span>-->
				
				  Agents
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('crm/add-agent') }}">Add Agent Contacts</a>
				  <a class="dropdown-item" href="{{ url('crm/view-agent') }}">View Agents Contacts</a>
				 <!-- <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Something else here</a>-->
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 
					<!--<span class="badge badge-primary">11</span>-->
				
				  Events
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('crm/add-events') }}">Add Events</a>
				  <a class="dropdown-item" href="{{ url('crm/view-events') }}">View Events</a>
				</div>
			  </li>
			  <li class="nav-item">			  	
				<a class="nav-link" href="{{ url('crm/events') }}">Calendar</a>
			  </li>	
<!-- 			   <li class="nav-item">
				<a class="nav-link" href="{{ url('crm/calendar') }}">
				 Outlook Calendar
				</a>
			  </li> -->
			 

			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">				
				  Reports
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('crm/sales-activity') }}">Sales Activity</a>				
				</div>
			  </li>
			  <li class="nav-item ">
				<a class="nav-link " href="{{ url('crm/settings') }}" >
				Settings
				</a>
				<!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{ url('crm/settings') }}">HD Automation</a>
				 </div>-->
			  </li>

			  <!-- <li class="nav-item">
				<a class="nav-link" href="{{ url('crm/signin') }}">
				 Inbox
				</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{ url('crm/contacts') }}">
				 Contacts
				</a>
			  </li> -->
            <!-- <li class="<?php echo ($_SERVER['REQUEST_URI'] == '/mail' ? 'active' : '');?>"><a href="{{ url('crm/mail') }}"></a></li> -->
          
		<!-- 	  <li class="nav-item">
				<a class="nav-link" href="#">
				  
					<span class="badge badge-warning">11</span>
				 
				  Support
				</a>
			  </li> -->
			 
			</ul>
			<ul class="navbar-nav ">
			  <!--<li class="nav-item">
				<a class="nav-link" href="#">
				  <i class="fa fa-bell">
					<span class="badge badge-info">11</span>
				  </i>
				 
				</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">
				  <i class="fa fa-envelope">
					<span class="badge badge-success">11</span>
				  </i>
				  
				</a>
			  </li>-->
			  <li class="nav-item dropdown right">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 
					<span class="badge badge-primary"><i class="fa fa-user" aria-hidden="true"></i></span>
				
			<!-- 	  <i class="fa fa-user" aria-hidden="true"></i> -->

				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a href="{{ url('crm/edit-profile') }}" class="dropdown-item">
                        <i class="fa fa-edit"></i>

						Edit Profile
                      </a>
				  <a href="{{ url('crm/update-password') }}" class="dropdown-item">
                         <i class="fa fa-edit"></i>
                        Update Password
                      </a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fa fa-sign-out" aria-hidden="true"></i>
Logout</a>
				 <!-- <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Something else here</a>-->
				</div>
			  </li>
			</ul>
			<!--<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>-->
		  </div>
		</nav>
    <!-- partial -->
		<div class="container-fluid">
			<div class="main-panel">
				<div class="content-wrapper">
					@include('partials.above-navbar-alert')
					@yield('content')
					
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          @yield('footer')
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
	
	
	<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
    <!-- container-scroller -->
    <!-- base:js 
    <script src="{{ asset('admin-assets/vendors/base/vendor.bundle.base.js')}}"></script>-->
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin-assets/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="{{ asset('admin-assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin-assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
		 <script src="{{ asset('admin-assets/vendors/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('admin-assets/vendors/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('admin-assets/vendors/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



		<script src="{{ asset('admin-assets/vendors/justgage/raphael-2.1.4.min.js')}}"></script>
		<script src="{{ asset('admin-assets/vendors/justgage/justgage.js')}}"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('admin-assets/js/dashboard.js')}}"></script>
	<!-- Custom scripts for all pages-->
 <script src="{{ asset('admin-assets/js/sb-admin.js')}}"></script>
 <script src="{{ asset('assets/js/jquery.validate.js')}}"></script>
 
 <script>

 	
/*	var asset_path = "";
	tinymce.init({
		selector: ".tinymce",theme: "modern",height: 200,
		 plugins: [
			  "advlist autolink link image lists charmap print preview hr anchor pagebreak",
			  "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
			  "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
		],
		relative_urls : false,
		menubar: false,
		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		image_advtab: false ,
		external_filemanager_path:"{{ url('') }}/file_manager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "{{ url('') }}/file_manager/filemanager/plugin.min.js"},
		theme_advanced_toolbar_location : "bottom"
  });*/
  
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})	
 </script>


    <!-- End custom js for this page-->
	
  </body>
</html>