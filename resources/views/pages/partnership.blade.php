
@extends('layouts.main')
@section('head')
 <title>@if($title) {{$title}} @else Welcome to tbbc.com @endif</title> 
<meta name="description" content="@if($desc) {{$desc}} @else Welcome to tbbc.com @endif" />
<meta name="keywords" content="@if($keyword) {{$keyword}} @else Welcome to tbbc.com @endif" />
<style type="text/css">.container ul li{ text-align: left; }</style>
@section('content')
@include('layouts.othermenu')
@if($page)
<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>@if($page->title){{ $page->title }} @endif</h2>
		</div>
	</section>
	
	<!--  Page top end -->
<section class="page-section">

	<div class="container">
		
			<div class="row about-text">
				<div class="col-lg-12 col-md-12 col-xs-12 about-text  abt-txt-main">
				
					@if($page->description) {!! $page->description !!} @endif

				</div>
			
			</div>
		</div>



<div class="container">
		
			<div class="row about-text">			
		<div class="col-lg-4 col-md-4 col-xs-4  col-lg-offset-4 col-md-offset-4">
					<a href="{{ url('contact-us') }}" class="btn btn-primary custom-btn" style="padding-top: 20px!important; padding-bottom: 20px !important; font-size: 30px !important">Contact Us</a>

				</div>
				</div>
		</div>

<!-- Review section -->
		<section class="review-section set-bg inner-bg" data-setbg="{{ asset('tbbc/img/hotel/2.jpg') }}">
			<div class="container">
				<div class="col-lg-5 col-md-5 col-xs-5 offset-4 white-bg">
					<h2 class="text-center">Testimonial</h2>
					<p><span class="link">"</span> Lorem ipsum dolor sit amet, consectetur
adipiscing elit, sed do eiusmod
tempor incididunt ut labore et dolore
magna aliqua. Ut enim ad minim
veniam, quis nostrud exercitation ullam-<span class="link">"</span></p>
<div class="text-right">

<p class="link">Rejon</p>
<pclass="link">UK</p>
</div>
				</div>
			</div>
		</section>




				   <div class="container">
		
			<div class="row about-text">

<?php $i=1;?>
				 @foreach ($Partnership as $Partner)

				  @if($i % 2 == 0) 
			<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="col-lg-6 col-md-6 col-xs-6   text-pink">
			<h3>{{ $Partner->n_title }}</h3>
			<br />
			{!! str_limit($Partner->n_description, 200) !!}
			<!-- <p class="text-right"><a class="link">Find our more...</a></p> -->
			</div>
			<div class="col-lg-1 col-md-1 col-xs-1  text-justify text-pink"></div>
			<div class="col-lg-5 col-md-5 col-xs-5  text-justify text-pink">

			<img src="{{ asset('uploads/thumbnail/'.$Partner->n_image) }}">
			</div>
			</div>
			
			@else
					<div class="col-lg-12 col-md-12 col-xs-12">
					<div class="col-lg-5 col-md-5 col-xs-5 about-text text-justify text-pink">
					<img src="{{ asset('uploads/thumbnail/'.$Partner->n_image) }}">
					</div>
					<div class="col-lg-1 col-md-1 col-xs-1 about-text  text-justify text-pink"></div>
					<div class="col-lg-6 col-md-6 col-xs-6  about-text  text-pink">
					<h3>{{ $Partner->n_title }}</h3>
					<br />
					{!! str_limit($Partner->n_description, 200) !!}
					<!-- <p class="text-right"><a class="link">Find our more...</a></p> -->
					</div>
					</div>
			@endif

		<?php $i++;?>

				@endforeach

				
				

				
			
			</div>
		</div>

	



<!-- <div class="container">
		
			<div class="row about-text">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h3 class="text-center">How can we help you?</h3>
			</div>
		<div class="col-lg-4 col-md-4 col-xs-4  about-text col-lg-offset-4 col-md-offset-4">
					<button class="btn btn-primary custom-btn" style="padding-top: 20px!important; padding-bottom: 20px !important; font-size: 30px !important">GET IN TOUCH</button>

				</div>
				</div>
		</div>
 -->

</section>

 
 @else
	 
 
 <section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>Page Not Found</h2>
		</div>
	</section>
	
	<!--  Page top end -->
<section class="page-section">
<div class="container mt-30" style="min-height:500px">	
<h2 style="text-align:center" >Redirect To <a href="{{url('')}}" style="color:#DF1683" >Home Page</a></h2> 	
</div>
</section>
 @endif

 @stop