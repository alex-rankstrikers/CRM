var catId1 = localStorage.getItem('mylocationid');
var catId2 = localStorage.getItem('myserviceid');

var sort = 0;
var pageIndex = 1;
var pageCount;
$(document).ready(function() {
	
   $('.foodmenu').addClass("active");
      $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            getscrollProduct();
        }
    });
	var search_value = getParameterByName('search');
	
	//console.log(searchvalue);
	var people = getParameterByName('people'); 	
	var location = getParameterByName('location'); 
	if(search_value != null){ 
	var searchvalue_lower=search_value.toLowerCase();
	searchvalue = searchvalue_lower.replace(' ','-');
	keywordSearchFilter(searchvalue);}
	else{
	getProduct();
	}
 // getCategories();
  $(document).on("click",".fliterBtn", rangeSearch);
  //$(document).on("click","#keywordSearch", keywordSearchFilter);
 // $(document).on("change","#sortBy", sortBysearch);
  //$(document).on("click",".qtyplus", incrementByone);
 // $(document).on("click",".qtyminus", decrementByone);
});
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
function getscrollProduct() {
	if(slug != ''){var slval='/'+slug;} else {var slval='';}
  var productlist = localStorage.getItem('productlistempty');
  if (productlist==1) {
      //url: service_url+'onload_products?one_id='+catId1+'&two_id='+catId2+'&page='+pageIndex+'&sort='+sort,
    pageIndex++;
        if (pageIndex || pageIndex <= pageCount) {
            $.ajax({
                type: 'GET',              
				url: site_url+'/onload-venues/'+pageIndex+slval,
                data: '',
                dataType: "json",
                success: function(res){
                var i=13;
				//<div class="row"><div class="col-sm-3 col-md-3 col-lg-3"></div><div class="col-sm-6 col-md-6 col-lg-6"><a href="'+site_url+'/venue-details/'+data.v_id+'" class="btn btn-primary pull-right enqiry-button"> MORE INFORMATION</a></div><div class="col-sm-3 col-md-3 col-lg-3"></div></div>
				
                    //$('.productlist').empty();
                    $.each(res.venues, function(index, data){ 
                      if(data.v_id != ""){
                      
                         $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12" style="border-right:1px solid#ccc;border-left:1px solid#ccc;border-bottom:1px solid#ccc;"><div class="col-sm-12 col-md-9 col-lg-9"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div><div class="col-sm-12 col-md-3 col-lg-3"><h3><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" >Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">'+data.per_hour+'£</p></div></div><div class="col-sm-12 col-md-4 col-lg-4"><p class="text-center">Price per person</p><p class="text-center">'+data.per_person+'£</p></div><div class="col-sm-12 col-md-4 col-lg-4"><div class="row"><p class="text-center">Price per day</p><p class="text-center">'+data.per_day+'£</p></div></div></div></section></div>');       
              
                      }else{
                        //alert(data.product_name);
                        $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12" style="border-right:1px solid#ccc;border-left:1px solid#ccc;border-bottom:1px solid#ccc;"><div class="col-sm-12 col-md-9 col-lg-9"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div><div class="col-sm-12 col-md-3 col-lg-3"><h3><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" >Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">'+data.per_hour+'£</p></div></div><div class="col-sm-12 col-md-4 col-lg-4"><p class="text-center">Price per person</p><p class="text-center">'+data.per_person+'£</p></div><div class="col-sm-12 col-md-4 col-lg-4"><div class="row"><p class="text-center">Price per day</p><p class="text-center">'+data.per_day+'£</p></div></div></div></section></div>');
                      }
                     
                     }); 
 i++;					 
                },
                error: function (response) {
                    //alert(response.d);
                }
                });
            }
      }else{
        
      }
    }
function getProduct(){ 
	if(slug != ''){var slval='/'+slug;} else {var slval='';}
  var page = 1;
  var userLocation = localStorage.getItem('opening_flag');
  if (catId1=="" || catId2=="" || userLocation==0) {
    //alert(catId2);
    $('.locationMessage').append('<span>Please select category</span>');
    /*$(".modal").css("z-index", "1000");*/
    $('.productModal').modal('show');

     $( ".tabletest" ).hide();
    $('.productbgcolor').addClass('productModal');
    $('.product_bg').addClass('productModal');
    $('#footer').addClass('productModal');
  }else{


  $.ajax({
    type: 'GET',
      url: site_url+'/onload-venues/'+page+slval,
      data: '',
      dataType: 'json',
      success: function(res){
          var responseCheck = jQuery.isEmptyObject(res.venues);
          if (responseCheck==true) {
            $('.productlist').html('');

            //$('.productlist').append('<div class="carousel_img"><h3 class="text-center">No Products Available</h3></div>');
            localStorage.setItem('productlistempty', "0");
          }else{
            $('.productlist').empty();
			var i=1; 
            $.each(res.venues, function(index, data){
				
              if(data.v_id != ""){
               
                  //alert(data.remaining);
       
                 $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view make3D"><section class="corp_hire mt-30 product-front"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'" >'+data.title+'</a></h3><span class="v_id" style="display:none;">'+data.v_id+'</span><span class="v_image" style="display:none;">'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'</span><span class="v_title" style="display:none;">'+data.title+'</span></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><div id="successMsg'+i+'" class="venue_msg"></div><h3><a href="javascript:void(0)" id="cartBtn'+i+'">Get a Quote</a></h3><input type="hidden" id="pro_id'+i+'" value="'+data.v_id+'"/></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');   
			
				
              }else{
               
                $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><div id="successMsg'+i+'" class="venue_msg"></div><h3><a href="'+site_url+'/venue-details/'+data.v_id+'" id="cartBtn'+i+'">Get a Quote</a></h3><input type="hidden" id="pro_id'+i+'" value="'+data.v_id+'"/></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');
              }
             i++;
             });
          localStorage.setItem('productlistempty', "1");
          };
          var cart_view = localStorage.getItem('cart_flag');
         
          if(catId2==null || cart_view==0){
            $( ".cart_view" ).hide();
            $( ".tabletest" ).show();
            $( ".count" ).hide(); 
            $( ".addtocart" ).hide()
          }else if(cart_view==1){
            $( ".cart_view" ).show();
            $( ".count" ).show();
            $( ".addtocart" ).show();
            $( ".tabletest" ).hide();
          }else{
          }


      },
      error: function() {         
        //  alert("error");
        },
  });
 }
}
function getCategories(){
  $.ajax({
    type: 'GET',
      url: site_url+'getcatthree_web?id='+catId2,
      data: '',
      dataType: 'json',
      success: function(res){ 
      $('#catagreyThree').append('<option value="">Select Food</option>'); 
        $.each(res.catthree, function(index, data) {
          if (index==0) {
            $('#catagreyThree').append('<option value="'+data.three_id+'">'+data.three_name+'</option>');
          }else {
            $('#catagreyThree').append('<option value="'+data.three_id+'">'+data.three_name+'</option>');
          };
        });   
      },
      error: function() {         
         // alert("error");
        },
  });
}
function rangeSearch(){
  var rangevalue = $('#ex2').val();
  var splitval = rangevalue.split(',');
  var pricerangeLow = splitval[0];
  var pricerangeHigh = splitval[1];
  var catId3 = $('#catagreyThree').val();
 // alert(service_url+'mobizee_filter?cat_one_id='+catId1+'&cat_two_id='+catId2+'&cat_three_id='+catId3+'&price_max='+pricerangeHigh+'&price_min='+pricerangeLow+'&sort='+sort);  
  $.ajax({
    type: 'GET',
      url: service_url+'mobizee_filter?cat_one_id='+catId1+'&cat_two_id='+catId2+'&cat_three_id='+catId3+'&price_max='+pricerangeHigh+'&price_min='+pricerangeLow+'&sort='+sort,
      data: '',
      dataType: 'json',
      success: function(res){
          var responseCheck = jQuery.isEmptyObject(res.products);
          if (responseCheck==true) {
            $('.productlist').html('');
            //$('.productlist').append('<div class="carousel_img"><h3 class="text-center">No Products Available</h3></div>');
            localStorage.setItem('productlistempty', "0");
          }else{
            $('.productlist').empty();
            $.each(res.products, function(index, data){
              if(data.in_flag=="1"){
                if(data.remaining != 0){
                 $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">Get a Quote</a></h3></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');       
                }
              }else{
                //alert(data.product_name);
                $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">Get a Quote</a></h3></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');
              }
             
             });
          localStorage.setItem('productlistempty', "1");
          };
          var cart_view = localStorage.getItem('cart_flag');

                if(catId2==null || cart_view==0){
                    $( ".cart_view" ).hide();
                    $( ".tabletest" ).show();
                    $( ".count" ).hide(); 
                    $( ".addtocart" ).hide()
                  }else if(cart_view==1){
                    $( ".cart_view" ).show();
                    $( ".count" ).show();
                    $( ".addtocart" ).show();
                    $( ".tabletest" ).hide();
                  }else{
                }

      },
      error: function() {         
          //alert("error");
        },
  });  
}
function keywordSearchFilter(searchvalue,locat){
 // var keywordsearchValue = $('#searchvalue').val();
   var page = 1;
  if (searchvalue=="") {

  }else{
 // alert(service_url+'search_products?key='+keywordsearchValue+'one_id'+catId1+'&two_id='+catId2); url: service_url+'search_products?key='+searchvalue+'&location='+location+'&page='+page, 
  $.ajax({
    type: 'GET',
	url: site_url+'/onload-venues-search/'+page+'/'+searchvalue+'/'+locat,      
      data: '',
      dataType: 'json',
      success: function(res){
           var responseCheck = jQuery.isEmptyObject(res.venues);
          if (responseCheck==true) {
            $('.productlist').html('');

            //$('.productlist').append('<div class="carousel_img"><h3 class="text-center">No Products Available</h3></div>');
            localStorage.setItem('productlistempty', "0");
          }else{
            $('.productlist').empty();
			var i=1; 
            $.each(res.venues, function(index, data){
				
              if(data.v_id != ""){
               
                  //alert(data.remaining);
       
                 $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view make3D"><section class="corp_hire mt-30 product-front"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'" >'+data.title+'</a></h3><span class="v_id" style="display:none;">'+data.v_id+'</span><span class="v_image" style="display:none;">'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'</span><span class="v_title" style="display:none;">'+data.title+'</span></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><div id="successMsg'+i+'" class="venue_msg"></div><h3><a href="javascript:void(0)" id="cartBtn'+i+'">Get a Quote</a></h3><input type="hidden" id="pro_id'+i+'" value="'+data.v_id+'"/></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');   
				 //<button type="button" class="btn btn-primary enqiry-button">SEND ENQUIRY</button>
				
              }else{
                //alert(data.product_name);
                $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view make3D"><section class="corp_hire mt-30 product-front"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'" >'+data.title+'</a></h3><span class="v_id" style="display:none;">'+data.v_id+'</span><span class="v_image" style="display:none;">'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'</span><span class="v_title" style="display:none;">'+data.title+'</span></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><div id="successMsg'+i+'" class="venue_msg"></div><h3><a href="javascript:void(0)" id="cartBtn'+i+'">Get a Quote</a></h3><input type="hidden" id="pro_id'+i+'" value="'+data.v_id+'"/></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');
              }
               i++;
             });
          localStorage.setItem('productlistempty', "1");
          };
          var cart_view = localStorage.getItem('cart_flag');

                  if(catId2==null || cart_view==0){
                    $( ".cart_view" ).hide();
                    $( ".tabletest" ).show();
                    $( ".count" ).hide(); 
                    $( ".addtocart" ).hide()
                  }else if(cart_view==1){
                    $( ".cart_view" ).show();
                    $( ".count" ).show();
                    $( ".addtocart" ).show();
                    $( ".tabletest" ).hide();
                  }else{
                  }

      },
      error: function() {         
          //alert("error");
        },
    });
  }
}
function sortBysearch(){
  var sortByValue = $('#sortBy').val();
  var rangevalue = $('#ex2').val();
  var splitval = rangevalue.split(',');
  var pricerangeLow = splitval[0];
  var pricerangeHigh = splitval[1];
  var catId3 = $('#catagreyThree').val();
 //alert(service_url+'mobizee_filter?cat_one_id='+catId1+'&cat_two_id='+catId2+'&cat_three_id='+catId3+'&price_max='+pricerangeHigh+'&price_min='+pricerangeLow+'&sort='+sortByValue);  
  $.ajax({
    type: 'GET',
      url: service_url+'mobizee_filter?cat_one_id='+catId1+'&cat_two_id='+catId2+'&cat_three_id='+catId3+'&price_max='+pricerangeHigh+'&price_min='+pricerangeLow+'&sort='+sortByValue,
      data: '',
      dataType: 'json',
      success: function(res){
          var responseCheck = jQuery.isEmptyObject(res.products);
          if (responseCheck==true) {
            $('.productlist').html('');
            //$('.productlist').append('<div class="carousel_img"><h3 class="text-center">No Products Available</h3></div>');
            localStorage.setItem('productlistempty', "0");
          }else{
            $('.productlist').empty();
            $.each(res.products, function(index, data){
              if(data.in_flag=="1"){
                if(data.remaining != 0){
                 $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">Get a Quote</a></h3></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');       
                }
              }else{
                //alert(data.product_name);
                $('.productlist').append('<div class="col-sm-12 col-md-6 col-lg-6 list-view"><section class="corp_hire mt-30"><div id="myCarousel'+i+'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel'+i+'" data-slide-to="0" class=""></li><li data-target="#myCarousel'+i+'" data-slide-to="1" class=""></li></ol><a href="'+site_url+'/venue-details/'+data.v_id+'"><div class="carousel-inner corp_slider" role="listbox"><div class="item"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_1+'" alt=""></div><div class="item active left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_2+'"></div><div class="item next left"><img class="img-responsive" src="'+site_url+'/uploads/venue/thumbnail/'+data.image_3+'"></div></div></a><a class="left carousel-control" href="#myCarousel'+i+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel'+i+'" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div><div class="col-sm-12 col-md-12 col-lg-12 border-right-left-bottom"><div class=""><div class="col-sm-12 col-md-12 col-lg-12 border-bottom text-center"><div class="row"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">'+data.title+'</a></h3></div></div><div class="col-sm-12 col-md-6 col-lg-6 border-right text-center"><h3><a href="'+site_url+'/venue-details/'+data.v_id+'">Get a Quote</a></h3></div><div class="col-sm-12 col-md-6 col-lg-6 text-center"><h3><a href="javascript:void(0)" class="onclk" data-id= "'+data.v_id+'">Enquiry</a></h3></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><div class="row"><p class="text-center">Price per hour</p><p class="text-center">£'+data.per_hour+'</p></div></div><div class="col-sm-12 col-md-4 col-lg-4 border-right-top"><p class="text-center">Price per person</p><p class="text-center">£'+data.per_person+'</p></div><div class="col-sm-12 col-md-4 col-lg-4 border-top"><div class="row"><p class="text-center">Price per day</p><p class="text-center">£'+data.per_day+'</p></div></div></div></div></section></div>');
              }
             
             });
          localStorage.setItem('productlistempty', "1");
          };
          var cart_view = localStorage.getItem('cart_flag');

                if(catId2==null || cart_view==0){
                    $( ".cart_view" ).hide();
                    $( ".tabletest" ).show();
                    $( ".count" ).hide(); 
                    $( ".addtocart" ).hide()
                  }else if(cart_view==1){
                    $( ".cart_view" ).show();
                    $( ".count" ).show();
                    $( ".addtocart" ).show();
                    $( ".tabletest" ).hide();
                  }else{
                }

      },
      error: function() {         
         // alert("error");
        },
  });
}
function incrementByone(e){
  e.preventDefault();  
  var sid = $(this).attr('quantityinc');
  var incrmentCheck = "qty"+sid;
 
  //var test = $('.incrmentCheck').attr("max");

  fieldName = $(this).attr('id');
  var currentVal = parseInt($('input[name='+fieldName+']').val());
  if(!isNaN(currentVal)) {
    $('input[name='+fieldName+']').val(currentVal + 1);
    var quantitycount = $('input[name='+fieldName+']').val();
    $('#stack'+sid+'').attr("usercount",quantitycount);
  } else {
    $('input[name='+fieldName+']').val(0);
  }
}
function decrementByone(e){
  e.preventDefault();
  var sid = $(this).attr('quantitydec');
  fieldName = $(this).attr('id');
  var currentVal = parseInt($('input[name1='+fieldName+']').val());

  if (!isNaN(currentVal) && currentVal > 0) {
    $('input[name1='+fieldName+']').val(currentVal - 1);
    var quantitycount = $('input[name1='+fieldName+']').val();
    $('#stack'+sid+'').attr("usercount",quantitycount);
  } else {
    $('input[name1='+fieldName+']').val(0);
  }
}
