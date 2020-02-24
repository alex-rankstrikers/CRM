
@extends('layouts.main')
@section('head')
 <title>@if($title) {{$title}} @else Welcome to tbbc.com @endif</title> 
<meta name="description" content="@if($desc) {{$desc}} @else Welcome to tbbc.com @endif" />
<meta name="keywords" content="@if($keyword) {{$keyword}} @else Welcome to tbbc.com @endif" />
<style type="text/css">.container ul li{ text-align: left; }</style>
@section('content')
@include('layouts.othermenu')
@if($Clientshoutout)
<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>@if($Clientshoutout->n_title){{ $Clientshoutout->n_title }} @endif</h2>
		</div>
	</section>
	
	<!--  Page top end -->
<section class="page-section">
@if($Clientshoutout->n_description){!! $Clientshoutout->n_description !!}@endif



<div class="container">
		
			<div class="row about-text">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h3 class="text-center">How can we help you?</h3>
			</div>
		<div class="col-lg-4 col-md-4 col-xs-4  about-text col-lg-offset-4 col-md-offset-4">
					<button class="btn btn-primary custom-btn" style="padding-top: 20px!important; padding-bottom: 20px !important; font-size: 30px !important">GET IN TOUCH</button>

				</div>
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