@extends('layouts.main')

@section('content')
@include('partials.status-panel')
@include('layouts.othermenu')
	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>{{ $blogs->b_title }}</h2>
		</div>
	</section>
	<!--  Page top end -->
<section class="contact-page">

<div class="container">
     <div class="row">
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
	   <div class="row mt-30 mb-30">
	 
	    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		 <div class="blog-inner row mt-30">
		 <ul class="breadcrumb">
		  <li><a href = "{{ url('blog') }}">Home</a></li>
  @if($cat_slug)<li ><a href = "{{ url('blog') }}/{{ $cat_slug }}">{{ $cat_slug }}</a></li>@endif
   <li class = "active">{{ $blogs->b_title }}</li>
		 </ul>
		 <img src="{{ asset('uploads/original/'.$blogs->b_image) }}" class="img-responsive"/> 
		
		  <h3 class="clr-blu mt-30">{{ $blogs->b_title }}</h3>
		  <div class="text-justify">{!! $blogs->b_description !!}</div>
<div class="row mt-30 mb-30">
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">
	   <a href="{{ url('') }}" class="btn btn-primary btn-center enqiry-button">SEND ENQUIRY</a>
	   </div>
	   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         
        </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
	   </div>

<h3 class="mt-30">Share this venue:</h3>
		 </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 blog_categories mt-30">
		 <h3 class=" padding-left-5p">Blog Categories</h3>
		 <ul class=" padding-left-5p left-cat">
		  @foreach ($category as $category)
                    
                     <li><a href="{{ url('blog/'.$category->slug) }}">{{ $category->c_title }}</a></li>
                    
                     @endforeach   
		 </ul>
		</div>
	   </div>
     </div>
    </div>
	</div>	
	</section>
	<style type="text/css">
		.left-cat{ margin: 0; padding: 0; }
		.left-cat li{ list-style:circle;  margin-left: 20px;}
		.left-cat li a{color: #DF1683}

	</style>
@stop