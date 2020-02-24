@extends('layouts.main')

@section('content')

@include('partials.status-panel')  
@include('layouts.homemenu')
 <!-- Hero section -->
  <section class="hero-section set-bg" data-setbg="{{ asset('tbbc/img/bg.jpg') }}">
    <div class="container hero-text text-white">
      <h2>find your place with our local life style</h2>
      <p>Search real estate property records, houses, condos, land and more on tbbc.com®.<br>Find property info from the most comprehensive source data.</p>
      <a href="#" class="site-btn">VIEW DETAIL</a>
    </div>
  </section>
  <!-- Hero section end -->


  <!-- Filter form section -->
  <div class="filter-search">
    <div class="container">
      
       <form name="search" method="get" action="{{url('search')}}">
 <div class="col-lg-12 col-md-12 filter-form">
  <div class="col-lg-4 col-md-4 col-sm-2">
        <input type="text" class="form-control" name="keywords" placeholder="Destination or Hotel Name" required="required" autocomplete="off">
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3">
    <div class="row tab" >
    <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="right-inner-addon-top">
      <i class="fa fa-calendar"></i>
      <input type="text" class="form-control datepicker" name="check_in" placeholder="Check In" required="required" autocomplete="off"/>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">    
        <div class="right-inner-addon-top">
      <i class="fa fa-calendar"></i>
      <input type="text" class="form-control datepicker" name="check_out"  placeholder="Check Out" required="required" autocomplete="off" />
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
  @if(!$offer->isEmpty())
  <section class="feature-section spad">
    <div class="container">
      <div class="section-title text-center">
        <h3>LIMITED TIME OFFERS</h3>
        <p>Browse houses and flats for sale and to rent in your area</p>
      </div>
      <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">

              @foreach ($offer as $hotel)
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
                  <h3>{{$hotel->hotel_name}}</h3>
                  <p><i class="fa fa-map-marker"></i> Los Angeles, CA 90034</p>
                  </div>              
                  <a href="http://{{$hotel->website}}" target="_blank"  class="btn btn-primary custom-btn">Book Now</a> 
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
  </section>
  @endif
  <!-- feature section end -->


  <!-- Services section -->
  <section class="services-section spad set-bg" data-setbg="{{ asset('tbbc/img/service-bg.jpg') }}">
    <div class="container">
      <div class="row">       
        <div class="col-lg-12 col-md-12 pl-lg-0">
          <div class="section-title text-white text-center">
            <h3>WHY TRAVEL WITH TBBC COLLECTION</h3>            
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="service-item col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
              <i class="fa fa-handshake-o"></i>
              <div class="service-text">
                <h5>Handpicked Hotels</h5>
                <p>Each hotel in our collection is selected and rated by us to ensure an exceptional experience, with many offering exclusive perks for our guests.</p>
              </div>
            </div>
            <div class="service-item col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
              <i class="fa fa-home"></i>
              <div class="service-text">
                <h5>Personalized Service</h5>
                <p>Our in-house luxury hotel specialists are here to turn your dream getaway into a reality. Call on us for expert guidance and tailored support.</p>
              </div>
            </div>
            <div class="service-item col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
              <i class="fa fa-briefcase"></i>
              <div class="service-text">
                <h5>Price Guarantee</h5>
                <p>We offer competitive rates at over 2,200 of the world’s best luxury hotels. If you find your stay for less elsewhere, we’ll match the price.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-section spad">
    <div class="container">
      <div class="section-title text-center">
        <h3>Top-rated experiences</h3>
        <p>Book activities led by local hosts on your next trip</p>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 blog-item">
          <a href="#" class="link">
          <img src="{{ asset('tbbc/img/blog/1.jpg') }}" alt="">
          </a>
          <h5>GUIDED HIKE · JACO</h5>
          <h4>10 Hidden Waterfalls</h4>
          <p>$ 5,537 per person</p>
          <div class="blog-meta">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span><span>(65)</span>             
          </div>
          
          
        </div>
        <div class="col-lg-3 col-md-3 blog-item">
          <a href="#" class="link">
          <img src="{{ asset('tbbc/img/blog/2.jpg') }}" alt="">
          </a>
          <h5>GUIDED HIKE · JACO</a></h5>
          <h4>10 Hidden Waterfalls</h4>
          <p>$ 5,537 per person</p>
          <div class="blog-meta">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star "></span><span>(65)</span>              
          </div>
          
        </div>
        <div class="col-lg-3 col-md-3 blog-item">
          <a href="#" class="link">
          <img src="{{ asset('tbbc/img/blog/3.jpg') }}" alt="">
          </a>
          <h5>GUIDED HIKE · JACO</h5>
          <h4>10 Hidden Waterfalls</a></h4>
          <p>$ 5,537 per person</p>
          <div class="blog-meta">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span><span>(65)</span>             
          </div>
          
        </div>
        <div class="col-lg-3 col-md-3 blog-item">
          <a href="#" class="link">
            <img src="{{ asset('tbbc/img/blog/4.jpg') }}" alt="">
          </a>
          <h5>GUIDED HIKE · JACO</h5>
          <h4>10 Hidden Waterfalls </h4>
          <p>$ 5,537 per person</p>
          <div class="blog-meta">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span><span>(65)</span>             
          </div>
          
        </div>
      </div>
      <div class="text-center mt-10">
        <br>
        <a href="#" class="btn btn-primary">VIEW ALL TOP RATED EXPERIENCES</a>
      </div>
      
    </div>
  </section> 
  <!-- Blog section end -->

  <!-- Gallery section -->
  <section class="gallery-section spad">
    <div class="container">
      <div class="section-title text-center">
        <h3> EXPERIENCES</h3>
        <p>We understand the value and importance of place</p>
      </div>
      <div class="gallery">
        <div class="grid-sizer"></div>
<?php 
  $numItems = count($category);
  $i = 0;
  ?>
@if($category)
@foreach($category as $key=>$cat)

 @if( $key == 0)   
        <a href="{{url('find-a-hotel')}}/{{$cat->slug}}" class="gallery-item grid-long set-bg" data-setbg="{{ url('') }}/uploads/original/{{ $cat->c_image }}">
          <div class="gi-info">
            <h3>{{$cat->c_title}}</h3>            
          </div>
        </a>
        @elseif ( $i === $numItems-1)
        <a href="{{url('find-a-hotel')}}/{{$cat->slug}}" class="gallery-item grid-long set-bg" data-setbg="{{ url('') }}/uploads/original/{{ $cat->c_image }}">
        <div class="gi-info">
        <h3>{{$cat->c_title}}</h3>            
        </div>
        </a>

        @else
        <a href="{{url('find-a-hotel')}}/{{$cat->slug}}" class="gallery-item  set-bg" data-setbg="{{ url('') }}/uploads/original/{{ $cat->c_image }}">
          <div class="gi-info">
            <h3>{{$cat->c_title}}</h3>            
          </div>
        </a>
        @endif 
        <?php $i++;?> 
@endforeach
@endif

       <!--  <a href="#" class="gallery-item grid-wide set-bg" data-setbg="{{ asset('tbbc/img/gallery/2.jpg') }}">
          <div class="gi-info">
            <h3>Florida</h3>
            <p>112 Properties</p>
          </div>
        </a>
        <a href="#" class="gallery-item set-bg" data-setbg="{{ asset('tbbc/img/gallery/3.jpg') }}">
          <div class="gi-info">
            <h3>San Jose</h3>
            <p>72 Properties</p>
          </div>
        </a>
        <a href="#" class="gallery-item set-bg" data-setbg="{{ asset('tbbc/img/gallery/4.jpg') }}">
          <div class="gi-info">
            <h3>St Louis</h3>
            <p>50 Properties</p>
          </div>
        </a> -->
        
      </div>
     <!--  <div class=" text-center mt-10">
        <br>
        <a href="#" class="btn btn-primary">VIEW ALL EXPERIENCES</a>
      </div> -->
    </div>
  </section>
  <section class="gallery-section spad">
    <div class="container">
      <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-3 text-center">
        <h3>NEWSLETTER</h3>
        <p>Receive travel inspiration, exclusive hotel offers and more</p>
        <div class="newslatter-widget">     
        <form class="footer-newslatter-form">
              <input type="text" placeholder="Email address">
              <button><i class="fa fa-send"></i></button>
            </form>
        </div>
      </div>
      
    </div>
  </section>

@stop