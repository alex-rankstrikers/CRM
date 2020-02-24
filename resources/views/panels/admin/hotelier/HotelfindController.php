<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\UserVenueCapacity;
use App\Models\UserVenueFeatures;
use App\Models\UserVenueFooddrink;
use App\Models\UserVenueLicensing;
use App\Models\UserVenueRestrictions;
use App\Models\UserPaymentType;
use App\Models\UserVenueType;
use App\Models\VenueContact;
use App\Models\Payment;
use App\Models\Benefits;
use App\Models\VenueBusiness;
use App\Models\Amenities;
use App\Models\Hotels;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Models\UserVenueBenefits;
use App\Models\UserVenueAmenities;
use App\Models\UserVenueBusiness;
use App\Models\Rooms;
use App\Models\Country;
use App\Models\Cities;
use App\Models\States;
use App\Models\VenueCapacity;
use App\Models\Blog;





use App\Http\Controllers\Controller;
use Image;
use Mail;




class HotelfindController extends Controller
{
	
	  public function findHotel($slug=null)
    {

 
$CategorySlug= CategorySlug::where('slug',$slug)->first();
//$Country= Country::where('name','like', '%'.$slug.'%')->first();
//$Cities= Cities::where('name','like', '%'.$slug.'%')->first(); 

$Country= Country::where('name',$slug)->first();
$Cities= Cities::where('name',$slug)->first();

if($CategorySlug)
{
    $Category= Category::where('c_slug_id',$CategorySlug->id)->first();
    $Hotels= Hotels::where('category_id',$Category->c_id)->orderby('id', 'desc')->get();

}elseif($Country)
{
     $Hotels= Hotels::where('country',$Country->id)->orderby('id', 'desc')->get();     

}elseif($Cities)
{
    $Hotels= Hotels::where('city',$Cities->id)->orderby('id', 'desc')->get();     

}else{
    $Hotels= Hotels::orderby('id', 'desc')->get(); 
}



 return view('pages.find_a_hotel',compact('Hotels'));
    }


     public function Search($slug=null)
    {

    $keywords=$_GET['keywords'];

    if($_GET['keywords']){
        $Country= Country::where('name','like',$keywords)->first();
        if($Country)
        {
          $Hotels= Hotels::where('country', $Country->id)->orderby('id', 'desc')->get(); 

        }else{
            //dd($keywords);

            $Hotels= Hotels::where('hotel_name', 'like', '%'.$keywords.'%')->orderby('id', 'desc')->get();

        }
       // $Hotels= Hotels:::where('name',$search)->orWhere('country',$Country->id)->get(); 
      
   
        }

     
        return view('pages.find_a_hotel',compact('Hotels'));
    }

	
	  public function viewHotel($slug=null)
    {    
        $Hotel= Hotels::where('slug',$slug)->first();

        $Benefits = DB::table('user_venue_benefits')
             ->leftJoin('benefits', 'benefits.id', '=', 'user_venue_benefits.benefits_id')
             ->where('user_venue_benefits.venue_id', $Hotel->id)           
             ->get();

        $Amenities = DB::table('user_venue_amenities')
             ->leftJoin('amenities', 'amenities.id', '=', 'user_venue_amenities.amenities_id')
             ->where('user_venue_amenities.venue_id', $Hotel->id)           
             ->get();

        $Business = DB::table('user_venue_business')
             ->leftJoin('business', 'business.id', '=', 'user_venue_business.business_id')
             ->where('user_venue_business.venue_id', $Hotel->id)           
             ->get();


        $Features = DB::table('user_venue_features')
             ->leftJoin('venue_features', 'venue_features.id', '=', 'user_venue_features.features_id')
             ->where('user_venue_features.venue_id', $Hotel->id)            
             ->get();
             
        $Fooddrinks = DB::table('user_venue_fooddrink')
             ->leftJoin('venue_fooddrink', 'venue_fooddrink.id', '=', 'user_venue_fooddrink.fooddrink_id')
             ->where('user_venue_fooddrink.venue_id', $Hotel->id)           
             ->get();
        $Licensing = DB::table('user_venue_licensing')
             ->leftJoin('venue_licensing', 'venue_licensing.id', '=', 'user_venue_licensing.licensing_id')
             ->where('user_venue_licensing.venue_id', $Hotel->id)           
             ->get();
        $VenueCapacity = DB::table('user_venue_capacity')
             ->where('venue_id', $Hotel->id)    
             ->get();
            

        $Rooms = Rooms::where('hotel_id', $Hotel->id)           
             ->get();

        $date = date("Y-m-d");
        $fdate = strtotime(date("Y-m-d", strtotime($date)) . "+2 months");
        $monthdate = date("Y-m-d",$fdate);
        $Offers = Hotels::whereBetween('offer_end_date', [$date, $monthdate])->get();
      //  $VenueCapacityList= VenueCapacity::all();

         $Country = Country::where('id', $Hotel->country)->first();
         $States = States::where('id', $Hotel->state)->first();
         $Cities = Cities::where('id', $Hotel->city)->first();
          $Blogs = Blog::orderby('b_id', 'desc')->take(3)->get();

         




        return view('pages.view_hotel',compact('Hotel','Country','States','Cities','Benefits','Amenities','Rooms','Business','Features','Fooddrinks','Licensing','Offers','VenueCapacity','Blogs'));
    }


     public function Offers()
    {

       
        $date = date("Y-m-d");
        $fdate = strtotime(date("Y-m-d", strtotime($date)) . "+2 months");
        $monthdate = date("Y-m-d",$fdate);
        $Hotels = Hotels::whereBetween('offer_end_date', [$date, $monthdate])->orderby('id', 'desc')->get();


      

        return view('pages.offers',compact('Hotels'));
    }

  
	
}