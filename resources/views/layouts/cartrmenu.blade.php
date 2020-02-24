<style>
 .dropdown-menu li {width:100% !important;padding-right: 0px !important;}
 
 </style>
<div class="container">
         <div class="row">
         <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
		 <div class="row mt-30 header-inner">
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-6 logo">
         <a href="{{ route('public.home')  }}"><img src="{{ asset('assets/images/logo.png') }}"></a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-6 menu">
        <ul class="pull-right ">            
          
		@if(!Auth::check())
			
@if(Cart::count()!=0)<?php $val='cnt_show';?> @else <?php $val='cnt_hide';?>@endif 
 <li class="dropdown cn_dis <?php echo $val?>"><a href="#" class="my_venues" >Venues Shortlisted&nbsp;<span class="badge" id="cont">{{Cart::count()}}</span></a>					
                                      
 </li>					
                  @endif
        </ul>
        </div>
       </div>
	   
	   
	   
	 <script>$(document).ready(function(){
    $(".my_venues").click(function(){
        $("#my_venues").fadeToggle("slow");
    });
});</script>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 my_venue pt-10 pb-10" id="my_venues" >
		
		 <div class="row">
		 
			 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
					 <h3 class="text-center">Venues Shortlisted</h3>
					 
					 <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 " >
					 <div class="row" id="min_cart">
					  <?php $cartData = Cart::content();?>
					@if(count($cartData)!=0)
															@foreach($cartData as $cartD)
					  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 rm{{$cartD->rowId}}" >
						<div class="btn-list">
						<img src="{{url('')}}/uploads/venue/thumbnail/{{$cartD->options->img}}" style="width:100%"/>
						<p style="margin:0px;">{{$cartD->name}} </p>
<span class="delBtn" data-role="delete" id="{{$cartD->rowId}}" data-id="{{$cartD->id}}"><span class="glyphicon glyphicon-minus-sign"></span></span>						
						</div>
					</div>
					@endforeach						
					
					 @endif
					 
					 <script>
$(document).ready(function(){	
	$('body').on('click', '.delBtn', function () {        
	var del_id = $(this).attr('id');
	var del_rid = $(this).attr('data-id');
		
      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/remove-cart');?>/'+ del_id,
        success:function(){
			
			$('#successMsg'+del_rid).css("display","none");
			$('#cartBtn'+del_rid).css("display","block");	
			var cnt=$('#cont').text();
			var data=cnt-1;
			$('.cn_dis').removeClass( "cnt_hide" ).addClass( "cnt_show" );
			$('#cont').text(data);
			 $('.rm'+del_id).hide();       
        }
      });

    });
});
</script>
					 </div>
					</div>
					 
			 </div>		 
			
			
		  </div>

		 </div>
		 
	
								
	   
	   
	   
		 </div>
        </div>
    	</div>
        
		<hr>
