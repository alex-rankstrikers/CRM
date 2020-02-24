$(document).ready(function(){
  
 $(document).on('click', ".add_to_cart", function() {
	
	//.css({"color": "red", "border": "2px solid red"}).parent().parent().parent().parent().parent()
		var productCard = $(this).parent().parent().parent().css({"color": "red", "border": "2px solid red"}); 
		var position = productCard.offset();
		//var productImage = $(productCard).find('img').get(0).src;
		//var productName = $(productCard).find('.venue_title').get(0).innerHTML;
		var productImage = $(productCard).find('.v_image').get(0).innerHTML;
		var productName = $(productCard).find('.v_title').get(0).innerHTML;
		var productid = $(productCard).find('.v_id').get(0).innerHTML;
		//alert(productImage);

		$("body").append('<div class="floating-cart"></div>');		
		var cart = $('div.floating-cart');		
		productCard.clone().appendTo(cart);
		$(cart).css({'top' : position.top + 'px', "left" : position.left + 'px'}).fadeIn("slow").addClass('moveToCart');		
		setTimeout(function(){$("body").addClass("MakeFloatingCart");}, 800);
		setTimeout(function(){
			$('div.floating-cart').remove();
			$("body").removeClass("MakeFloatingCart");

var cartItem = '<div class="col-sm-12 col-md-2 col-lg-2 cart-item"><section class="corp_hire_cart mt-30"><img class="img-responsive" src="'+productImage+'" alt=""><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class="row"><div class="col-sm-10 col-md-10 col-lg-10 border-bottom text-left"><h3><a href="javascript:void(0)" class="venue_title">'+productName+'</a></h3></div><div class="col-sm-2 col-md-2 col-lg-2 border-bottom text-right"><span class="text-right"><a href="javascript:void(0)" class="delete-item">x</a></span></div></div></div></section></div>';
/*
			var cartItem = "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'><div class='cart-item'><div class='img-wrap'><img src='"+productImage+"' alt='' /></div><span>"+productName+"</span><div class='cart-item-border'></div><div class='delete-item'></div></div></div>";	*/		

			$("#cart .empty").hide();			
			$("#cart").append(cartItem);
			$("#checkout").fadeIn(500);
			
			$("#cart .cart-item").last()
				.addClass("flash")
				.find(".delete-item").click(function(){
					$(this).parent().fadeOut(300, function(){
						$(this).remove();
						if($("#cart .cart-item").size() == 0){
							$("#cart .empty").fadeIn(500);
							$("#checkout").fadeOut(500);
						}
					})
				});
 		    setTimeout(function(){
				$("#cart .cart-item").last().removeClass("flash");
			}, 10 );
			
		}, 1000);
	});
});