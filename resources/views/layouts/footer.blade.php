
	

	<!-- Clients section -->

	 @inject('menus', 'App\Http\Controllers\PagesController') 

	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				{{ $menus->getPartner() }}
				
			</div>
		</div>
	</div>
	<!-- Clients section end -->



	<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="{{ asset('tbbc/img/footer-bg.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 footer-widget">
					<img src="{{ asset('tbbc/img/logo-footer.svg') }}" alt="" style="height: 50px">
					<p>Lorem ipsum dolo sit azmet, consecter dipise consult  elit. Maecenas mamus antesme non anean a dolor sample tempor nuncest erat.</p>
					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 footer-widget">
					<div class="contact-widget">
						<h5 class="fw-title">CONTACT US</h5>
						<p><i class="fa fa-map-marker"></i>0000-00 Lorem Ipsum is simply </p>
						<p><i class="fa fa-phone"></i>(+00) 00 000 0000</p>
						<p><i class="fa fa-envelope"></i>info@tbbc.com</p>
						<p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 footer-widget">
					<div class="double-menu-widget">
						<h5 class="fw-title">POPULAR PLACES</h5>
						<ul>
							<li><a href="{{url('find-a-hotel')}}/Florida">Florida</a></li>
							<li><a href="{{url('find-a-hotel')}}/New York">New York</a></li>
							<li><a href="{{url('find-a-hotel')}}/Washington">Washington</a></li>
							<li><a href="{{url('find-a-hotel')}}/Los Angeles">Los Angeles</a></li>
							<li><a href="{{url('find-a-hotel')}}/Chicago">Chicago</a></li>
						</ul>
						<ul>
							<li><a href="{{url('find-a-hotel')}}/St Louis">St Louis</a></li>
							<li><a href="{{url('find-a-hotel')}}/Jacksonville">Jacksonville</a></li>
							<li><a href="{{url('find-a-hotel')}}/San Jose">San Jose</a></li>
							<li><a href="{{url('find-a-hotel')}}/San Diego">San Diego</a></li>
							<li><a href="{{url('find-a-hotel')}}/Houston">Houston</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6  footer-widget">
					<div class="newslatter-widget">
						<h5 class="fw-title">NEWSLETTER</h5>
						<p>Subscribe your email to get the latest news and new offer also discount</p>
						<form class="footer-newslatter-form">
							<input type="text" placeholder="Email address">
							<button><i class="fa fa-send"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-nav">
					<ul>
						<li><a href="{{ url('') }}">Home</a></li>
						<li><a href="{{ url('find-a-hotel') }}">Find a Hotel</a></li>
						<li><a href="{{ url('our-story') }}">Our Story</a></li>
						<li><a href="{{ url('offers') }}">Offers</a></li>
						<li><a href="{{ url('blog') }}">Blog</a></li>
						<li><a href="{{ url('contact-us') }}">Contact</a></li>
					</ul>
				</div>
				<div class="copyright">
					<p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <a href="https://tbbc.com</a>" target="_blank">tbbc.com</a>
</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->
                                        
	<!--====== Javascripts & Jquery ======-->
	
	<script src="{{ asset('tbbc/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('tbbc/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('tbbc/js/masonry.pkgd.min.js') }}"></script>
	<script src="{{ asset('tbbc/js/magnific-popup.min.js') }}"></script>
	<script src="{{ asset('tbbc/js/main.js') }}"></script>
	<script src="{{ asset('tbbc/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script type="text/javascript">
    $(".datepicker").datetimepicker({pickTime: false,
        minView: 2,
        format: 'dd/mm/yyyy',
        autoclose: true, });


</script>  
	
	<script>
		$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;           
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
	</script>
</body>
</html>

