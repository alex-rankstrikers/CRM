@extends('layouts.main')

@section('content')
@include('partials.status-panel')
@include('layouts.othermenu')

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="{{ asset('tbbc/img/page-top-bg.jpg') }}">
		<div class="container text-pink">
			<h2>Blogs</h2>
		</div>
	</section>
	<!--  Page top end -->
<section class="contact-page">
<div class="container">
     <div class="row">
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"> 
	   <div class="row mt-30 mb-30">
	   <h3 class="text-center clr-blu">BLOG @if($cat_slug) / {{ $cat_slug }} @endif </h3>
	    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<?php /*<ul>
		  <li><a href = "{{ url('blog') }}">Home</a></li>
  @if($cat_slug)<li class = "active">{{ $cat_slug }}</li>@endif 
		 </ul> */?>
		
		@foreach ($blogs as $blogs)
		 <div class="blog row mt-30">
		  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 blog-img no_pr">
		   <img class="img-responsive" src="{{ asset('uploads/thumbnail/'.$blogs->b_image) }}" alt="Flower">
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 blog-cont">
		   <p><?php echo date('F d, Y h:mA', strtotime($blogs->created_at))?></p>
		   <h4 class="clr-blu"><b>{{ $blogs->b_title }}</b></h4>
           <div class="text-justify">{!! str_limit($blogs->b_description, 200) !!}</div>
           <p class="text-right"><a href="{{ url('blog/'.$blogs->slug.'/'.$blogs->b_slug) }}" class="link">Read more</a></p>
		  </div>
		 </div>
		 @endforeach	 
		
		 
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