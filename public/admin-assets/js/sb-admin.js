(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle").on('click', function(e) {
    e.preventDefault();
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

	
  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });

	/* $(document).ready(function() {
		$('#hoteltable').DataTable();
	}); */
	$(document).ready(function() {
	  $('#hoteltable tfoot th.searchth').each( function () {
        var title = $(this).text();
		//alert(title);
        $(this).html( '<input type="text" style="width:100%;border:1px solid rgba(0, 0, 0, 0.125);padding-left:5px;height:35px;" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    //var table = $('#hoteltable').DataTable();
	
 
    // Apply the search
    /*table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	*/
	} );
	$(document).ready(function() {
    // -----------------------------------------------------------------------
		$.each($('#navbarSupportedContent').find('li'), function() {
			$(this).toggleClass('active', 
				window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
		}); 
		// -----------------------------------------------------------------------
	});
	 $('ul.nav.nav-tabs.new > li a').click(function(){
		if($( this ).hasClass( "active" ))
		{
			//$('.nav-tabs > li a.active').parent().removeClass('active');
			// $('.nav-tabs > li a.active').parent().next('li').addClass('active');
		}
		else{
			$('.nav-tabs > li a.active').parent().removeClass('active');
			$('.nav-tabs > li a.active').parent().next('li').addClass('active');
			$('.nav-tabs > li a.active').parent().prev('li').addClass('active');
		}
	});
	$('a.btnNext').click(function(){
	  $('.nav-tabs > li a.active').parent().removeClass('active');
	  $('.nav-tabs > li a.active').parent().next('li').addClass('active');
	  $('.nav-tabs > li a.active').parent().next('li').find('a').trigger('click');
	});
	$('a.btnPrevious').click(function(){
	  $('.nav-tabs > li a.active').parent().removeClass('active');
	  $('.nav-tabs > li a.active').parent().prev('li').addClass('active');
	  $('.nav-tabs > li a.active').parent().prev('li').find('a').trigger('click');
	});
	
	$('.nav-tabs > li a.active').parent().addClass('active');
	
	$(function() {
		var input = document.querySelector("#contact_no");
		window.intlTelInput(input, {
		allowExtensions: true,
		autoFormat: false,
		autoHideDialCode: false,
		autoPlaceholder: false,
		defaultCountry: "auto",
		ipinfoToken: "yolo",
		nationalMode: false,
		//numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		preventInvalidNumbers: true,
		utilsScript: "../admin-assets/build/js/utils.js"
		});
	
		var input = document.querySelector("#contact_number");
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
		utilsScript: "../admin-assets/build/js/utils.js"
		});
		});
	
})(jQuery); // End of use strict
