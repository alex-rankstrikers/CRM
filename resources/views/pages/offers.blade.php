@extends('layouts.hotel')

@section('content')
@include('partials.status-panel')
@include('layouts.othermenu')

<style type="text/css">
	.nav>li>a{font-size: 18px;}
</style>

<!-- Hero section -->
	<section class="hero-section-inner set-bg" data-setbg="{{ asset('tbbc/img/bg.jpg') }}">
		<div class="container hero-text text-white">
			<h2>LUXURY HOTEL</h2>	
			
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
			
	<form name="search" method="get" action="{{url('search')}}">			
 <div class="col-lg-12 col-md-12 filter-form">
 	<div class="col-lg-4 col-md-4 col-sm-2">
				<input type="text" class="form-control"  name="keywords" placeholder="Destination or Hotel Name" required="required" autocomplete="off" >
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3">
		<div class="row tab" >
		<div class="col-lg-6 col-md-6 col-sm-6">

				<div class="right-inner-addon-top">
			<i class="fa fa-calendar"></i>
			<input type="text" class="form-control datepicker" placeholder="Check In" name="check_in" required="required" autocomplete="off"/>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">		
				<div class="right-inner-addon-top">
			<i class="fa fa-calendar"></i>
			<input type="text" class="form-control datepicker" placeholder="Check Out" name="check_out" required="required" autocomplete="off"/>
			</div>
		</div>
		</div>
	</div>
				
		<div class="col-lg-3 col-md-3 col-sm-4">	
		<div class="row tab1">
		<div class="col-lg-6 col-md-6 col-sm-6">	
				<select class="form-control" name="adults" required="required">
          <option value="">Adults</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10+</option>

        </select>
				</div>
		<div class="col-lg-6 col-md-6 col-sm-6">	
				<select class="form-control " name="child" required="required">
				<option value="">Children</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				</select>
			</div>
			</div>
				</div>
		<div class="col-lg-2 col-md-2 col-sm-3 tab-search">	
		<button class="site-btn fs-submit">SEARCH</button>
		</div>
</div>
			</form>
		</div>
	</div>
	

<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">		
			
			<div class="col-lg-12 col-md-12 col-sm-12 main-side-bar-bg mb-50">
			<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-4 ">
								<div class="row">
							<div class="side-bar">
							<h3>Refine your Search</h3>
							<a href="#" class="link">RESET</a>
							<div class="map">
								<a href="#"><img src="{{ asset('tbbc/img/map.png') }}" class="border-2-w"/></a>
							</div>
							<h3>Change Search</h3>
 <div class="col-lg-12 col-md-12 col-sm-12 mb-10 change-search">
<div class="row">						
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="row">	
			<div class="right-inner-addon">
			<i class="fa fa-calendar"></i>
			<input type="text" class="form-control datepicker" placeholder="Check In" />
			</div>

		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="row">	
		<div class="right-inner-addon">
			<i class="fa fa-calendar"></i>
			<input type="text" class="form-control datepicker" placeholder="Check Out" />
			</div>


			
		</div>
	</div>
</div>
</div> 
		<div class="col-lg-12 col-md-12 col-sm-12 mb-10 change-search">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="row">	
						<select class="form-control">
						<option value="City">Adults</option>
						</select>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="row">	
						<select class="form-control">
						<option value="City">Children</option>
						</select>
					</div>
				</div>
			</div>
		</div>
<div class="col-lg-12 col-md-12 col-sm-12 tab-search mb-30 text-center">
<div class="row">		
<button class="btn btn-primary custom-btn">SEARCH</button>
</div>
</div>
<div class="clear"></div>



							<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav side-nav">
							<li>
							<a href="#" data-toggle="collapse" data-target="#submenu-1">Location<i class="fa fa-fw fa-angle-down pull-right"></i></a>
							<ul id="submenu-1" class="collapse">
							<li><a href="{{url('find-a-hotel')}}/Africa"> Africa</a></li>
							<li><a href="{{url('find-a-hotel')}}/Asia"> Asia</a></li>
							<li><a href="{{url('find-a-hotel')}}/Caribbean"> Caribbean</a></li>
							<li><a href="{{url('find-a-hotel')}}/Central America"> Central America</a></li>
							<li><a href="{{url('find-a-hotel')}}/Europe"> Europe</a></li>
							<li><a href="{{url('find-a-hotel')}}/Middle East"> Middle East</a></li>
							<li><a href="{{url('find-a-hotel')}}/North America"> North America</a></li>
							<li><a href="{{url('find-a-hotel')}}/South America"> South America</a></li>
							<li><a href="{{url('find-a-hotel')}}/South Pacific"> South Pacific</a></li>
							</ul>
							</li>
							<li>
							<a href="#" data-toggle="collapse" data-target="#submenu-2">Limited Time Offers <i class="fa fa-fw fa-angle-down pull-right"></i></a>
							<ul id="submenu-2" class="collapse">
							<li><a href="{{ url('offers') }}"> Limited Time Offers</a></li>                       
							</ul>
							</li>
							<!-- <li>
							<a href="#" data-toggle="collapse" data-target="#submenu-3">Interests <i class="fa fa-fw fa-angle-down pull-right"></i></a>
							<ul id="submenu-3" class="collapse">
								<li><a href="#"> Adult Only ( 7 )</a></li>
								<li><a href="#"> Adventure ( 144 )</a></li>
								<li><a href="#"> All Inclusive ( 8 )</a></li>
								<li><a href="#"> Art/Culture ( 202 )</a></li>
								<li><a href="#"> Bird Watching ( 25 )</a></li>
								<li><a href="#"> Business ( 330 )</a></li>							
                       
							</ul>
							</li>


							<li>
							<a href="#" data-toggle="collapse" data-target="#submenu-4">Facilities <i class="fa fa-fw fa-angle-down pull-right"></i></a>
							<ul id="submenu-4" class="collapse">
								<li><a href="#"> Adult-only areas ( 2 )</a></li>
								<li><a href="#"> Bicycle rental ( 6 )</a></li>
								<li><a href="#"> Boutique Shopping ( 135 )</a></li>
								<li><a href="#"> Business Center ( 373 )</a></li>
								<li><a href="#"> Café ( 49 )</a></li>
								<li><a href="#"> Car rental on site ( 1 )</a></li>
								<li><a href="#"> Car service available ( 11 )</a></li>
								<li><a href="#"> Casino ( 10 )</a></li>
								<li><a href="#"> Cinema/Movie nights ( 4 )</a></li>
								<li><a href="#"> City tours ( 3 )</a></li>
								
							</ul>
							</li> -->
							</ul>
							</div>
							</div>
							</div>
							</div>

				<div class="col-lg-9 col-md-9 col-sm-8 main-content-bg">


 @foreach ($Hotels as $hotel)
						<div class="col-lg-12 col-md-12 col-sm-12 hotel-desc">
						<div class="row " >
							<div class="col-lg-5 col-md-5 col-sm-5 hotel-img-sec">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="heart">&nbsp;</div>
										<?php if($hotel->image_1 != ''){
							 		?>
							<a href="{{url('find-a-hotel')}}/{{$hotel->slug}}"><img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_1 }}" alt=""></a>

							<?php }else{
								if($hotel->image_2 !=''){									?>
								
								<a href="{{url('find-a-hotel')}}/{{$hotel->slug}}"><img class="img-responsive 2" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_2 }}" alt=""></a>
								<?php 
									}else{
									if($hotel->image_3 !=''){ 
									?>
									<a href="{{url('find-a-hotel')}}/{{$hotel->slug}}"><img class="img-responsive 3" src="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_3 }}" alt="">	</a>				
								<?php 
									}

									}
									} 
							?>
							<br />
								<div class="sale-notic custom-btn text-center">{{$hotel->offer}} % Offer</div>	
								</div>
								<!--<div class="col-lg-12 col-md-12 col-sm-12">
								<p>Rating</p>
								<h3>7.9</h3>
								</div>-->

							</div>
							<div class="col-lg-7 col-md-7 col-sm-7 hotel-desc-sec">
								<h3>{{ $hotel->hotel_name }}</h3>
								<h5>Los Angeles, CA 90034</h5>

								<p>Rooms & Suites: 98</p>
								<p>Breakfast included:</p>
								<p>Wi-Fi included:</p>
								<p class="mt-7">{!! str_limit($hotel->description, 50) !!}<a href="{{url('find-a-hotel')}}/{{$hotel->slug}}" style="float: right;" class="link">View Hotel</a></p>
									<div class="col-lg-12 col-md-12 col-sm-12 mt-7">
										<div class="row " >
											
											<div class="col-lg-6 col-md-6 col-sm-6">									<div class="row " >		
												<p>Rates from</p>
												<h2>${{ $hotel->price }} <span>SGD / NIGHT</span></h2>	
												</div>					
											</div>
											
												<div class="col-lg-6 col-md-6 col-sm-6 mt-10 text-center">
													<div class="row " >
													<button class="btn btn-primary custom-btn">Book Now</button>
													</div>
												</div>
												
											
										</div>
									</div>
							</div>

						</div>							

						</div>

@endforeach




						

					


						</div>
					
				
			</div>
			</div>
			</div>
		</div>
	</section>
	<!-- feature section end -->





@stop