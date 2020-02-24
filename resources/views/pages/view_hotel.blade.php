@extends('layouts.hotel')

@section('content')
@include('partials.status-panel')
@include('layouts.hotel_detail_menu')

<style type="text/css">
	.nav>li>a{font-size: 18px;}
</style>


<!-- Filter form section -->
	<div class="filter-search" style="background: #1d1c1d">
		<div class="container">
			
	<form name="search" method="get" action="{{url('search')}}">			
 <div class="col-lg-12 col-md-12 filter-form">
 	<div class="col-lg-4 col-md-4 col-sm-2">
				<input type="text" class="form-control" name="keywords" placeholder="Destination or Hotel Name" required="required" autocomplete="off" >
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
			<select class="form-control" name="child" required="required">
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
	<!-- Filter form section end -->
	<div class="clear"></div>
<section class="hero-section-view-hotel mb-10 mt-10 sticky">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="col-lg-9 col-md-9 col-sm-9">
					<ul class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
					<li property="itemListElement" typeof="ListItem">
					<a href="#" typeof="WebPage" property="item" class="icon" aria-label="View hotels in North America">
					<span property="name">{{$Country->name}}</span>
					</a>
					<meta property="position" content="1">
					</li>
					<li property="itemListElement" typeof="ListItem">
					<a href="#" typeof="WebPage" property="item" class="icon" aria-label="View hotels in United States">
					<span property="name">{{$States->name}}</span>
					</a>
					<meta property="position" content="2">
					</li>
					<li property="itemListElement" typeof="ListItem">
					<a href="#" typeof="WebPage" property="item" class="icon" aria-label="View hotels in Florida">
					<span property="name">{{$Cities->name}}</span>
					</a>
					<meta property="position" content="3">
					</li>					
					</ul>
            <h2>{{$Hotel->hotel_name}}</h2>
				<ul class="feature-top">
				<li>Style:
				Modern
				Resort</li>

				<li>Rooms:
				154</li>

				<li>Setting:
				Coastal</li>
				</ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">

		<div class="hotel-desc-sec text-center ">	
		<div class="mb-30">			
		<h2><span>From</span> ${{$Hotel->price}} <span>SGD / NIGHT</span></h2>
		</div>	
		<button class="btn btn-primary custom-btn scroll" data-id="scroll-Rooms">Find a room</button>
		</div>

        </div>

			</div>
		</div>
	</div>
</section>

<section class="hero-section-view-hotel scrolltop hidden">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="col-lg-9 col-md-9 col-sm-9">
				
            <h2 style="margin-top:10px;">{{$Hotel->hotel_name}}</h2>
				<ul class="feature-top-scroll">
					<li><a href="javascript:void(0);" class="scroll" data-id="scroll-Photos">Photos</a></li>
					<li><a href="javascript:void(0);" class="scroll" data-id="scroll-Overview">Overview</a></li>
					<li><a href="javascript:void(0);" class="scroll" data-id="scroll-Location">Location</a></li>
					<li><a href="javascript:void(0);" class="scroll" data-id="scroll-Amenities">Amenities</a></li>
					<li><a href="javascript:void(0);" class="scroll" data-id="scroll-Offers">Offers</a></li>
					<li><a href="javascript:void(0);" class="scroll" data-id="scroll-Rooms">Rooms</a></li>				
				<li></li>
				</ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">

		<div class="hotel-desc-sec text-center ">	
		<div >

		<h2><span>From</span> ${{$Hotel->price}} <span>SGD / NIGHT</span></h2>
		</div>	
		<button class="btn btn-primary custom-btn scroll" data-id="scroll-Rooms">Find a room</button>
		</div>

        </div>

			</div>
		</div>
	</div>
</section>


	<!-- Hero section -->
	<section class="hero-section-view-hotel " id="scroll-Photos">


		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="height: 450px">

  		


		<?php if($Hotel->image_1 != ''){
		?>	
		<div class="item active">
			<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Hotel->image_1 }}" alt="">
		</div>
		<?php }?>
		<?php if($Hotel->image_2 != ''){
		?>	
		<div class="item active">
			<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Hotel->image_2 }}" alt="">
		</div>
		<?php }?>
		<?php if($Hotel->image_3 != ''){
		?>	
		<div class="item active">
			<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Hotel->image_3 }}" alt="">
		</div>
		<?php }?>
		<?php if($Hotel->image_4 != ''){
		?>	
		<div class="item ">
			<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Hotel->image_4 }}" alt="">
		</div>
		<?php }?>
		<?php if($Hotel->image_5 != ''){
		?>	
		<div class="item ">
			<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Hotel->image_5 }}" alt="">
		</div>
		<?php }?>
		<?php if($Hotel->image_6 != ''){
		?>	
		<div class="item ">
			<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Hotel->image_6 }}" alt="">
		</div>
		<?php }?>

   

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

	</section>
	<!-- Hero section end -->


<!-- feature section -->
	<section class="feature-section spad" id="scroll-Overview">
		<div class="container">
		
			<!-- <div class="section-title ">
				<h3>LIMITED TIME OFFERS</h3>
				<p>Browse houses and flats for sale and to rent in your area</p>
			</div> -->
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50">
					<h2>About This Hotel</h2>

	<div class="row">				
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="row">	
<div class="col-lg-4 col-md-4 col-sm-4 ">
	<div class="border-1px">
	<h4>Benefits</h4>	
		<p class="">Book the Visa Premium Card Rate at this hotel and receive seven benefits:</p>
		@foreach ($Benefits as $Benefit)
		<p><i class="fa fa-check"></i> {{$Benefit->title}}</p>
		@endforeach
		
	</div>		
</div>
<div class="col-lg-8 col-md-8 col-sm-8 text-justify">

	{!! $Hotel->description !!}
	
<!--<p class="text-right"><a href="" class="" style="color:#DF1683">Read More</a></p>-->
</div>
</div>
</div>



</div>


						
				</div>

			
			</div>
		</div>
	</section>
	<!-- feature section end -->




@if($Amenities)

	<!-- feature section -->
		<section class="feature-section spad" id="scroll-Amenities">
		<div class="container">
		<!-- <div class="section-title ">
		<h3>LIMITED TIME OFFERS</h3>
		<p>Browse houses and flats for sale and to rent in your area</p>
		</div> -->
		<div class="row">

		<div class="col-lg-12 col-md-12 col-sm-12 mb-50">
		<h2>Hotel Amenities</h2>
		<div class="row">				
		<div class="col-lg-12 col-md-12 col-sm-12">
		

		@foreach ($Amenities as $Amenitie)
		<div class="col-lg-4 col-md-4 col-sm-4">
		<p><i class="fa fa-check"></i> {{$Amenitie->title}}</p>
		</div>
		@endforeach

		</div>
		</div>
		</div>

		</div>
		</div>
		</section>
	<!-- feature section end -->

@endif


@if($Rooms)	
	<!-- feature section -->
	<section class="feature-section spad" id="scroll-Rooms">
		<div class="container">
		<!-- <div class="section-title ">
		<h3>LIMITED TIME OFFERS</h3>
		<p>Browse houses and flats for sale and to rent in your area</p>
		</div> -->
			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 mb-50" id="room-option">
				<h2>Room Options</h2>
						<!-- Room Start -->	


		@foreach ($Rooms as $Room)	
						<div class="col-lg-12 col-md-12 col-sm-12 mb-30 room-border ">
							<div class="row">	
								<div class="col-lg-3 col-md-3 col-sm-3">								
										<?php if($Room->image_1 != ''){
										?>	

										<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_1 }}" alt="">

										<?php }elseif($Room->image_2 != ''){
										?>	

										<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_2 }}" alt="">

										<?php }elseif($Room->image_3 != ''){
										?>	

										<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_3 }}" alt="">

										<?php }elseif($Room->image_4 != ''){
										?>	

										<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_4 }}" alt="">

										<?php }elseif($Room->image_5 != ''){
										?>	

										<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_5 }}" alt="">

										<?php }else{
										?>	

										<img class="img-responsive" src="{{ url('') }}/uploads/venue/thumbnail/{{ $Room->image_6 }}" alt="">

										<?php }?>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">	
										<h4>{{ $Room->title }}</h4>								
											<p><i class="fa fa-user-o"></i><i class="fa fa-user-o"></i> Max 2 guests</p>
											<p><i class="fa fa-bed"></i> 1 King bed</p>
											<p><i class="fa fa-building-o "></i> 28 m<sup>2</sup></p>
											<a href="#" data-toggle="modal" data-target="#myModal_{{ $Room->id }}" class="link" style="text-decoration: underline;">More details</a>
										</div> 

										<div class="col-lg-4 col-md-4 col-sm-4">
											<h4>Best Available Rate</h4>
											<p><i class="fa fa-credit-card"></i>
														<span class="tooltipped" data-position="top" data-delay="50" data-html="true" data-tooltip="Card details required as guarantee only." data-tooltip-id="4d2c171d-bd6e-d15d-26f1-892defc51ab1">
														No deposit required 
														<i class="fa fa-info-circle"></i>
														</span></p>

														<p><i class="fa fa-calendar"></i>
													<span class="tooltipped" data-position="top" data-delay="50" data-html="true" data-tooltip="If booking cancelled on or after 20-Feb-2019 you will be charged $1,063.41" data-tooltip-id="8af78176-0bf9-494b-1656-0c1b74bef739">
													Free Cancellation until 19-Feb-2019 
													<!-- <i class="fa fa-info-circle"></i> -->
													</span></p>
													<p><i class="fa fa-spoon"></i><i class="fa fa-coffee"></i>
													<span>
													Breakfast 
													</span></p>
											</div> 
										<div class="col-lg-4 col-md-4 col-sm-4 rates text-center">
											<h2>${{ $Room->price }} <span>SGD / NIGHT</span></h2>
											<button class="btn btn-primary custom-btn">Book Now</button>
											
										</div>										
										</div>
									</div>
									
								</div>

								
							</div>

					</div>


					<!-- Modal -->
<div id="myModal_{{ $Room->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">_{{ $Room->title }}</h4>
      </div>
      <div class="modal-body">
       _{{ $Room->descriptin }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
					







					



				</div>

			</div>
		</div>
	</section>
	<!-- feature section end -->

@endif


	<section class="feature-section spad">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>MEETINGS AND EVENTS</h2>
						<h3>Check-in/check-out policy</h3>
						<p>{!! $Hotel->meeting_check_out_policy !!}</p>			
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 ">
					<img src="{{ url('') }}/uploads/meeting/{{ $Hotel->meeting_image }}">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 ">
<h3 class="mt-0">DESCRIPTION</h3>
<p>{!! $Hotel->meeting_description  !!}</p>


					

					<div class="avli-meeting-room-con">
                <div class="meeting-avli-title">
                    <span>SEASON RATES</span>
                </div>
                <div class="meeting-avli-type">
                    <div class="meeting-range">
                        <div class="meeting-range-sec">
                            <div class="ranget low-time"></div><div class="text-range">Low</div>
                        </div>
                         <div class="meeting-range-sec">
                            <div class="ranget high-time"></div><div class="text-range">High</div>
                        </div>
                         <div class="meeting-range-sec">
                            <div class="ranget medium-time"></div><div class="text-range">Shoulder</div>
                        </div>
                    </div>
                    <div class="meeting-count">
                        <span>10 MEETING ROOMS AVALIABLE</span>
                    </div>
                </div>
                <div class="month-con">
                    <div class="month-sec medium-time">
                        <span>JAN</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>FEB</span>
                    </div>
                    <div class="month-sec high-time">
                        <span>MAR</span>
                    </div>
                    <div class="month-sec high-time">
                        <span>APR</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>MAY</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>JUN</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>JUL</span>
                    </div>
                    <div class="month-sec low-time">
                        <span>AUG</span>
                    </div>
                    <div class="month-sec low-time">
                        <span>SEP</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>OCT</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>NOV</span>
                    </div>
                    <div class="month-sec medium-time">
                        <span>DEC</span>
                    </div>
                </div>
            </div>

            <div class="btn-wrap mt-10">
            	<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
<div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                	
                    <a href="{{ url('') }}/uploads/pdf/{{ $Hotel->meeting_fact_sheet }}" target="_blank" class="btn btn-primary custom-btn btn-lg shadow faa-parent animated-hover rm-bk-btn">
                        DOWNLOAD FACT SHEET
                    </a>
                   
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6">
                 	
                    <a href="#" class="btn btn-primary custom-btn btn-lg shadow faa-parent animated-hover rm-bk-btn">
                        FOR ENQUERY
                    </a>
                  
                </div>
                 </div>
                </div>
                </div>
            </div>
				</div>
			</div>
		</div>
	</section>


@if($Business)
	<section class="feature-section spad gray-bg">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>BUSSINESS</h2>
					
						@foreach ($Business as $Busines)
						<div class="col-lg-4 col-md-4 col-sm-4">
						<p><i class="fa fa-check"></i> {{$Busines->title}} </p>
						</div>
						@endforeach

								
				</div>
				
			</div>
		</div>
	</section>
@endif

@if($Features)
	<section class="feature-section spad ">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>FEATUERS</h2>					
						@foreach ($Features as $Feature)
						<div class="col-lg-4 col-md-4 col-sm-4">
						<p><i class="fa fa-check"></i> {{$Feature->title}} </p>
						</div>
						@endforeach			
				</div>
				
			</div>
		</div>
	</section>
	@endif

@if($Fooddrinks)
	<section class="feature-section spad gray-bg">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>FOOS & DRINK</h2>					
						<@foreach ($Fooddrinks as $Fooddrink)
						<div class="col-lg-4 col-md-4 col-sm-4">
						<p><i class="fa fa-check"></i> {{$Fooddrink->title}} </p>
						</div>
						@endforeach				
				</div>
				
			</div>
		</div>
	</section>
	@endif

	@if($Hotel->nature_day_light=='Yes')
	<section class="feature-section spad ">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>NATURE DAY LIGHT</h2>
					{{ $Hotel->nature_day_light }}			
						
				</div>
				
			</div>
		</div>
	</section>
	@endif
	@if($Licensing)
	<section class="feature-section spad gray-bg">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>LICENCING</h2>					
						@foreach ($Licensing as $License)
						<div class="col-lg-4 col-md-4 col-sm-4">
						<p><i class="fa fa-check"></i> {{$License->title}} </p>
						</div>
						@endforeach		
				</div>
				
			</div>
		</div>
	</section>
	@endif
@if($VenueCapacity)
	<section class="feature-section spad ">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<div class="table-responsive">         
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Capacity Chart</th>
        <th><img src="{{ asset('tbbc/img/1.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/2.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/3.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/4.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/5.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/6.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/7.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/8.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/9.png') }}"/></th>
        <th><img src="{{ asset('tbbc/img/10.png') }}"/></th>
    
      </tr>
    </thead>
    <tbody>
@foreach ($VenueCapacity as $VenueCapa)
    	
      <tr>
        <td>@if($VenueCapa->capacity_value) {{ $VenueCapa->capacity_value }} @else N/A @endif</td>
        <td>@if($VenueCapa->total_sq_fit) {{ $VenueCapa->total_sq_fit }} @else N/A @endif</td>
        <td>@if($VenueCapa->room_size) {{ $VenueCapa->room_size }} @else N/A @endif</td>
        <td>@if($VenueCapa->celing_height) {{ $VenueCapa->celing_height }} @else N/A @endif</td>
        <td>@if($VenueCapa->class_room) {{ $VenueCapa->class_room }} @else N/A @endif</td>
        <td>@if($VenueCapa->theater_1) {{ $VenueCapa->theater_1 }} @else N/A @endif</td>
        <td>@if($VenueCapa->theater_2) {{ $VenueCapa->theater_2 }} @else N/A @endif</td>
        <td>@if($VenueCapa->reception) {{ $VenueCapa->reception }} @else N/A @endif</td>
        <td>@if($VenueCapa->conference) {{ $VenueCapa->conference }} @else N/A @endif</td>
        <td>@if($VenueCapa->u_shape) {{ $VenueCapa->u_shape }} @else N/A @endif</td>
        <td>@if($VenueCapa->h_shape) {{ $VenueCapa->h_shape }} @else N/A @endif</td>
      </tr>
      @endforeach	
      
    </tbody>
  </table>
</div>
				</div>
				
			</div>
		</div>
	</section>

@endif

<!-- feature section -->
@if(!$Offers->isEmpty())
	<section class="feature-section spad gray-bg" id="scroll-Offers">
		<div class="container">	
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">
					<h2>Offers</h2>
					<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">

            	 @foreach ($Offers as $hotel)
                <div class="item">
                    <div class="feature-item">
						<?php if($hotel->image_1 != ''){
                    ?>
                    <div class="feature-pic set-bg" data-setbg="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_1 }}">

                    <?php }else{
                    if($hotel->image_2 !=''){                 ?>

                    <div class="feature-pic set-bg" data-setbg="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_2 }}">
                    <?php 
                    }else{
                    if($hotel->image_3 !=''){ 
                    ?>
                    <div class="feature-pic set-bg" data-setbg="{{ url('') }}/uploads/venue/thumbnail/{{ $hotel->image_3 }}">

                    <?php 
                    }

                    }
                    } 
                    ?>
							<div class="sale-notic">{{$hotel->offer}} % Offer</div>
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<h5>{{$hotel->hotel_name}}</h5>
								<p><i class="fa fa-map-marker"></i> Los Angeles, CA 90034</p>
							</div>							
							<a href="http://{{ $hotel->website }}" target="_blank" class="btn btn-primary custom-btn">Book Now</a> 
						</div>
					</div>
                </div>
                @endforeach        
              
               
            </div>
            <button class="btn btn-primary leftLst"> < </button>
            <button class="btn btn-primary rightLst" style="margin-left: 10px;"> > </button>
        </div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- feature section end -->
	@endif



	
	

<!-- feature section -->
<!-- 	<section class="feature-section spad " id="scroll-Location">
	<div id="map-canvas" style="height: 350px"></div>
	</section> -->
	<!-- feature section end -->

<!-- 	<section class="feature-section spad gray-bg">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>Conditions</h2>
						<h3>Check-in/check-out policy</h3>
						<p>Check-in to the rooms is guarateed by 3pm and check-out is at 12 noon.</p>
						
					
				</div>
			</div>
		</div>
	</section>
	 -->

		<section class="feature-section spad">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>Why book with us?</h2>
						<div class="col-lg-3 col-md-3 col-sm-3 text-center ">
							<h4>ONLY THE MOST CHIC</h4>
							<p>Each hotel selected for its unique charm by Lulu the founder.</p>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 text-center ">
							<h4>CHIC TREATS</h4>
							<p>Special benefits only guests booking through Chic Retreats obtain.</p>
						</div>	
						<div class="col-lg-3 col-md-3 col-sm-3 text-center ">
							<h4>PRICE MATCH PROMISE</h4>
							<p>If you find your stay cheaper elsewhere we will give you £50 towards your next stay with us.</p>
						</div>	
						<div class="col-lg-3 col-md-3 col-sm-3 text-center ">
							<h4>TRANSFER SERVICE</h4>
							<p>Please ask for details about our airport transfer service</p>
						</div>		
						
					
				</div>
			</div>
		</div>
	</section>
	<!-- feature section end -->


@if($Blogs)
<section class="feature-section spad">
		<div class="container">	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-50 ">					
					<h2>Passport Magazine</h2>
						<!-- blog post -->

						@foreach ($Blogs as $Blog)
				<div class="col-lg-4 col-md-4 col-sm-4  blog-item">
					<!-- <img src="{{ asset('tbbc/img/blog/1.jpg') }}" alt=""> -->

					<img class="img-responsive" src="{{ url('') }}/uploads/thumbnail/{{ $Blog->b_image }}" alt="">


					<h5><a href="{{url('blog')}}">{{$Blog->b_title}}</a></h5>
					<div class="blog-meta">
						<!-- <span><i class="fa fa-user"></i>Amanda Seyfried</span> -->
						<span><i class="fa fa-clock-o"></i>{{ date('d-m-Y',strtotime($Blog->created_at)) }}</span>
					</div>
					<p>{!! str_limit($Blog->b_description, 150) !!}</p>
				</div>
				@endforeach
				
			<!-- 	<div class="col-lg-4 col-md-4 col-sm-4 blog-item">
					<img src="{{ asset('tbbc/img/blog/2.jpg') }}" alt="">
					<h5><a href="single-blog.html">Taylor Swift is selling her $2.95 million Beverly Hills mansion</a></h5>
					<div class="blog-meta">
						<span><i class="fa fa-user"></i>Amanda Seyfried</span>
						<span><i class="fa fa-clock-o"></i>25 Jun 201</span>
					</div>
					<p>Integer luctus diam ac scerisque consectetur. Vimus dotnetact euismod lacus sit amet. Aenean interdus mid vitae maximus...</p>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 blog-item">
					<img src="{{ asset('tbbc/img/blog/3.jpg') }}" alt="">
					<h5><a href="single-blog.html">NYC luxury housing market saturated with inventory, says celebrity realtor</a></h5>
					<div class="blog-meta">
						<span><i class="fa fa-user"></i>Amanda Seyfried</span>
						<span><i class="fa fa-clock-o"></i>25 Jun 201</span>
					</div>
					<p>Integer luctus diam ac scerisque consectetur. Vimus dotnetact euismod lacus sit amet. Aenean interdus mid vitae maximus...</p>
				</div>	 -->		
				
						
					
				</div>
			</div>
		</div>
	</section>
	<!-- feature section end -->
@endif
<script>
			/*$("#scroll-button").click(function() {
			$('html, body').animate({
			scrollTop: $("#room-option").offset().top-70}, 2000);
			});*/

			$(".scroll").click(function() {
				var gtId=$(this).attr('data-id');
			$('html, body').animate({
			scrollTop: $("#"+gtId).offset().top-70}, 2000);
			});

			$( "#clickme" ).click(function() {
			$( "#book" ).slideUp( "slow", function() {
			// Animation complete.
			});
			});

	$(window).scroll(function(){
	var sticky = $('.sticky');
	var scrolltop = $('.scrolltop');	
	scroll = $(window).scrollTop();
	if (scroll >= 100){
		sticky.addClass('hidden');scrolltop.removeClass('hidden');
}else{
	scrolltop.addClass('hidden');sticky.removeClass('hidden'); }
	});
	</script>
	<style type="text/css">
.scrolltop {
position: fixed;
top:0; left:0;
width: 100%; z-index: 999; background: #fff; 
}
	</style>

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

@stop