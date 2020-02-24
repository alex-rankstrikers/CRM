<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TBBC ADMIN!  </title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin-assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('admin-assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin-assets/build/css/custom.min.css') }}" rel="stylesheet">
	 <!-- Datatables -->
    <link href="{{ asset('admin-assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
	 <link href="{{ asset('admin-assets/css/croppic.css') }}" rel="stylesheet">
	  <!-- Select2 -->
	 <link href="{{ asset('admin-assets/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
	 <!-- Switchery -->
    <link href="{{ asset('admin-assets/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/jquery.simplefileinput.css') }}">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
	  <!-- jQuery -->
    <script src="{{ asset('admin-assets/vendors/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
		<script type="text/javascript">
			var asset_path = "";
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
				external_plugins: { "filemanager" : "{{ url('') }}/file_manager/filemanager/plugin.min.js"}
		  });
		</script>
	 @yield('head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="javascript:void(0);" class="site_title"><i class="fa fa-paw"></i> <span>TBBC ADMIN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
          

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('admin') }}"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a></li>
				   <li><a><i class="fa fa-desktop"></i>Admin  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="{{ url('admin/users') }}">Users</a></li>  
						<!--<li><a href="{{ url('admin/roles') }}">Roles</a></li>  		-->			  
                    </ul>
                  </li>
         <li><a><i class="fa fa-list"></i> Category  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="{{ url('admin/category/slug') }}">Category Slug</a></li>
                      <li><a href="{{ url('admin/category') }}">Categories </a></li>                    
                    </ul>
                  </li> 
                 
                 <?php  /*<li><a href="{{ url('admin/multilanguage') }}"><i class="fa fa-table"></i> MultiLanguage   <!--<span class="fa fa-chevron-right"></span>--></a>                  
                  </li>
                  <li><a href="{{ url('admin/currency') }}"><i class="fa fa-inr"></i> Currency <!--<span class="fa fa-chevron-down"></span>--></a>
                   </li> */?>
                 <!--  <li><a><i class="fa fa-clone"></i>Advertisement  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					 <li><a href="{{ url('admin/ads/position') }}">Position</a></li>
                      <li><a href="{{ url('admin/ads/modeads') }}">Mode of Advertisement</a></li>
                      <li><a href="{{ url('admin/ads/slotplacement') }}">Slot Placement</a></li>
					     <li><a href="{{ url('admin/ads/duration') }}">Duration </a></li>
                      <li><a href="{{ url('admin/ads/pricing') }}">Pricing </a></li>
                    </ul>
                  </li> -->
				  <li><a><i class="fa fa-area-chart"></i>Areas  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/country') }}">Country </a></li>
                      <li><a href="{{ url('admin/states') }}">States </a></li>
					  <!--<li><a href="{{ url('admin/cities') }}">Cities </a></li>-->				
                    </ul>
                  </li>
				  <!-- <li><a><i class="fa fa-th-large"></i>Subscription  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">				
					  <li><a href="{{ url('admin/subscription/plan') }}">Plan</a></li>
                      <li><a href="{{ url('admin/subscription/duration') }}">Duration</a></li>
					  <li><a href="{{ url('admin/subscription/features') }}">Features</a></li>
					  <li><a href="{{ url('admin/subscription/pricing') }}">Pricing</a></li>
                    </ul>
                  </li> -->
                   <li><a><i class="fa fa-building-o"></i>Hotel Details  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/hotels/benefits') }}">Benefits</a></li>
                      <li><a href="{{ url('admin/hotels/amenities') }}">Amenities</a></li>
                      <li><a href="{{ url('admin/hotels/features') }}">Features</a></li>
                      <li><a href="{{ url('admin/hotels/food-drink') }}">Food & Drink</a></li>
                      <li><a href="{{ url('admin/hotels/licensing') }}">Licensing</a></li>
                      <li><a href="{{ url('admin/hotels/business') }}">Business</a></li>
                      <li><a href="{{ url('admin/hotels/capacity') }}">Capacity Chart</a></li>                    			 
                    </ul>
                  </li>
				  <li><a><i class="fa fa-building-o"></i>Hotelier  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/merchants/users') }}">Users</a></li>
                      <li><a href="{{ url('admin/add-hotel') }}">Add Hotel</a></li>                   
                      <li><a href="{{ url('admin/hotels') }}">View Hotels</a></li>				 		 
                    </ul>
                  </li>
				<!--   <li><a><i class="fa fa-building-o"></i>Leads Management  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/leads') }}">Enqiry</a></li>
                      <li><a href="{{ url('admin/ask-venue-expert') }}">Ask Venue Expert</a></li>
                     <li><a href="{{ url('admin/merchants/listing') }}">Listing</a></li>
                    </ul>
                  </li> -->
				<?php /*  <li><a><i class="fa fa-clone"></i>Awards & Achievements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-reorder"></i>Orders  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-book"></i>Service & Booking <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>*/?>
				  <li><a><i class="fa fa fa-users"></i>General User  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('admin/general/users') }}">Users</a></li>
                      <?php /*<li><a href="fixed_footer.html">Fixed Footer</a></li> */?>
                    </ul>
                  </li>
				 <?php /* <li><a><i class="fa fa-bar-chart"></i>Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>*/?>
				 
				  

                </ul>
              </div>
              <div class="menu_section">
                <h3>CMS</h3>
                <ul class="nav side-menu">
                  
                   <li><a href="{{ url('admin/client-shout-outs') }}"><i class="fa fa-sitemap"></i> Client Shout Outs  <span class="fa fa-chevron-down"></span></a>
                   
                  </li> 
                  <li><a><i class="fa fa-windows"></i> Club BB  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php /*<li><a href="{{ url('admin/menutype') }}">Menu Type</a></li>*/?>
                      <li><a href="{{ url('admin/guest') }}">Guest</a></li>
                      <li><a href="{{ url('admin/travel') }}">Travel</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-windows"></i> Partner  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php /*<li><a href="{{ url('admin/menutype') }}">Menu Type</a></li>*/?>
                      <li><a href="{{ url('admin/partnership') }}">Partnership</a></li>
                      <li><a href="{{ url('admin/partners') }}">Partners Logo</a></li>
                    </ul>
                  </li>

                   
                  <li><a><i class="fa fa-windows"></i> CMS Pages  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php /*<li><a href="{{ url('admin/menutype') }}">Menu Type</a></li>*/?>
                      <li><a href="{{ url('admin/menu') }}">Menus</a></li>
                      <li><a href="{{ url('admin/page') }}">Dynamic Pages</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('admin/blog') }}"><i class="fa fa-sitemap"></i> Blogs  <span class="fa fa-chevron-down"></span></a>
                   
                  </li>     
					<li><a href="{{ url('admin/news') }}"><i class="fa fa-newspaper-o"></i> News  <span class="fa fa-chevron-down"></span></a>
                  
                  </li> 
				 <li><a href="{{ url('admin/testimonials') }}"><i class="fa fa-frown-o"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
                  
                <!--   </li> 
 <li><a href="{{ url('clear-cache') }}"><i class="fa fa-frown-o"></i> Clear Cache <span class="fa fa-chevron-down"></span></a>
                  
                  </li>  -->				  
                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="{{ url('') }}/uploads/thumbnail/{{ Auth::user()->image }}" alt="">		
					{{ Auth::user()->first_name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul> 
                </li>
               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 600px;">
		@include('partials.above-navbar-alert')
		@yield('content')
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="https://tbbc.com">tbbc.com</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
@yield('footer')
  
    <!-- Bootstrap -->
    <script src="{{ asset('admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin-assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('admin-assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('admin-assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('admin-assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('admin-assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('admin-assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('admin-assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('admin-assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
   <script src="{{ asset('admin-assets/build/js/custom.min.js') }}"></script>
    <!-- Datatables -->
	 <script src="{{ asset('admin-assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
	<script src="{{ asset('admin-assets/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
	
	<!-- Select2 -->
    <script src="{{ asset('admin-assets/vendors/select2/dist/js/select2.full.min.js') }}"></script>
	  <!-- Switchery -->
    <script src="{{ asset('admin-assets/vendors/switchery/dist/switchery.min.js') }}"></script>
	
	<script src="{{ asset('admin-assets/js/jquery.mousewheel.min.js') }}"></script>
   	<script src="{{ asset('admin-assets/js/croppic.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/datedropper.js') }}"></script>
    <script src="{{ asset('assets/js/timedropper.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
	<script>
	 var CSRF_TOKEN = '{{csrf_token()}}'; 
	
	// var url='{{ url('') }}';
		var croppicContaineroutputOptions = { 
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutput',			
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptions1 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutput1',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptions2 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutput2',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptions3 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutput3',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptions4 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutput4',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptions5 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutput5',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		
		
		
		var croppicContaineroutputOptionsedit = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutputedit',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptionsedit1 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutputedit1',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptionsedit2 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutputedit2',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		
		var croppicContaineroutputOptionsedit3 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutputedit3',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptionsedit4 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutputedit4',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var croppicContaineroutputOptionsedit5 = {
				uploadUrl:'venue/img_save_to_file?_token='+CSRF_TOKEN,
				cropUrl:'venue/img_crop_to_file?_token='+CSRF_TOKEN, 
				outputUrlId:'cropOutputedit5',
				modal:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		
		
		var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);
		var cropContaineroutput1 = new Croppic('cropContaineroutput1', croppicContaineroutputOptions1);
		var cropContaineroutput2 = new Croppic('cropContaineroutput2', croppicContaineroutputOptions2);
		var cropContaineroutput3 = new Croppic('cropContaineroutput3', croppicContaineroutputOptions3);
		var cropContaineroutput4 = new Croppic('cropContaineroutput4', croppicContaineroutputOptions4);
		var cropContaineroutput5 = new Croppic('cropContaineroutput5', croppicContaineroutputOptions5);
		
		var cropContaineroutputedit = new Croppic('cropContaineroutputedit', croppicContaineroutputOptionsedit);
		var cropContaineroutputedit1 = new Croppic('cropContaineroutputedit1', croppicContaineroutputOptionsedit1);
		var cropContaineroutputedit2 = new Croppic('cropContaineroutputedit2', croppicContaineroutputOptionsedit2);
		var cropContaineroutputedit3 = new Croppic('cropContaineroutputedit3', croppicContaineroutputOptionsedit3);
		var cropContaineroutputedit4 = new Croppic('cropContaineroutputedit4', croppicContaineroutputOptionsedit4);
		var cropContaineroutputedit5 = new Croppic('cropContaineroutputedit5', croppicContaineroutputOptionsedit5);
		
		</script>
     <script type="text/javascript">
                      $('.daterange').daterangepicker();
                    </script>
  </body>
</html>