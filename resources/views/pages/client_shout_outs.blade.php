
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
				<div class="col-lg-12 col-md-12 col-xs-12 about-text text-justify abt-txt-main">
				
					@if($page->description){!! $page->description !!}@endif

				</div>
			
			</div>
		</div>
			<!-- Clients section -->

<div class="container">
		
			<div class="row">				
				

			

		 @foreach ($Clientshoutouts as $Clientshoutout)
					<div class="col-lg-4 col-md-4 col-xs-4">
						 <div class="feature-item">
							<div class="feature-pic set-bg" data-setbg="{{ asset('uploads/thumbnail/'.$Clientshoutout->n_image) }}">				
							</div>
							<div class="feature-text">
								<div class="partner-sec">
									<div class="partner-sec-tit" >
									<h5>{{ $Clientshoutout->n_title }}</h5>
									<p><i class="fa fa-map-marker"></i> {{ $Clientshoutout->n_location }}</p>
									</div>
									
								</div>							
								<a href="{{ url('case-study/'.$Clientshoutout->n_slug) }}"   class="btn btn-primary custom-btn">Case Study</a> 
							</div>
						</div>
				   </div>
	@endforeach

			


			
			</div>
		</div>
		
		

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