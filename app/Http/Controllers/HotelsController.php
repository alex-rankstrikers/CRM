<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Venue;
use App\Models\User;
use App\Models\MultiLanguage;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Models\VenueType;
use App\Models\VenueCapacity;
use App\Models\VenueFeatures;
use App\Models\VenueFoodDrink;
use App\Models\VenueLicensing;
use App\Models\VenueRestrictions;
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
use App\Models\UserVenueBenefits;
use App\Models\UserVenueAmenities;
use App\Models\UserVenueBusiness;
use App\Models\Rooms;




use App\Http\Controllers\Controller;
use Image;
use Session;
use PDF;

use Validator;
class HotelsController extends Controller
{

// Front End Controll

	// 


	public function getstates(Request $request)
		{
			 $id=$request->id;  
			 $states = DB::table('states')
			 ->where('country_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($states) . '}';
	}
	
	public function getcities(Request $request)
		{
			 $id=$request->id;  
			 $cities = DB::table('cities')
			 ->where('state_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($cities) . '}';
	}
	
		
	// Yes
	 public function addHotel()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$venue= Venue::all();
		

		$VenueContact= VenueContact::all()->where('user_id',$user_id);
		 $VenueType= VenueType::all();
	    $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
	  
		$country= Country::all()->where('status',1);
		$Category= Category::all();
		$Benefits= Benefits::all();
		$Amenities= Amenities::all();
		$Business= VenueBusiness::all();
	    
	    
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
	
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.admin.hotelier.add_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	// Yes
	public function editHotel()
    {	
$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
 $hotels = Hotels::all(); 
		//$venue= VenueContact::all()->where('user_id',$user_id); 
		$VenueType= VenueType::all();
        $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
		$Benefits= Benefits::all();
		$Amenities= Amenities::all();
		$Business= VenueBusiness::all();
	
	 
	   $country= Country::all()->where('status',1);
	   $Category= Category::all();
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
	
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.admin.hotelier.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueType'=>$VenueType,'hotels'=>$hotels,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
	//Yes
	public function getHotel(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('hotels')
			 ->where('id', $id)	 
			 ->first();


 			$countries = DB::table('countries')			 
			 	  ->get();
			 $states = DB::table('states')
				 ->where('country_id',$venue->country)			 
				 ->get();
			$cities = DB::table('cities')
				 ->where('state_id',$venue->state)			 
				 ->get();   
		
			 $Benefits= UserVenueBenefits::where('venue_id', $id)->get();
			 $Amenities= UserVenueAmenities::where('venue_id', $id)->get();
			 $Business= UserVenueBusiness::where('venue_id', $id)->get();

			 $user_venue_capacity = DB::table('user_venue_capacity')
			 ->where('venue_id', $id)	 
			 ->get();
			 
			  $user_venue_features = DB::table('user_venue_features')		
			 ->where('venue_id', $id)	 
			 ->get();

			 $user_venue_fooddrink = DB::table('user_venue_fooddrink')
			 ->where('venue_id', $id)	 
			 ->get();
			 
			 $user_venue_licensing = DB::table('user_venue_licensing')	
			 ->where('venue_id', $id)	 
			 ->get();
			 
			  $user_venue_restrictions = DB::table('user_venue_restrictions')	
			 ->where('venue_id', $id)	 
			 ->get();
			 
		 return '{"view_details": ' . json_encode(array("venue"=>$venue,"Benefits"=>$Benefits,"Amenities"=>$Amenities,"Business"=>$Business,"user_venue_capacity"=>$user_venue_capacity,"user_venue_features"=>$user_venue_features,"user_venue_fooddrink"=>$user_venue_fooddrink,"user_venue_licensing"=>$user_venue_licensing,"user_venue_restrictions"=>$user_venue_restrictions, "countries"=>$countries,"states"=>$states,"cities"=>$cities)) . '}';
	}


	// Venue Added Yes
	public function added(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'category'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'contact_no'			=> 'required',
			'price'			=> 'required',
			'web'			=> 'required',
			'description'			=> 'required'
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'category.required'			=> 'Category is required',	
			'address1.required'			=> 'Address is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'Cities is required',		
			'postcode.required'			=> 'Postcode is required',		
			'contact_no.required'			=> 'Contact no is required',		
			'price.required'			=> 'Price is required',		
			'web.required'			=> 'Web site url is required',		
			'description.required'			=> 'Description is required',					
                     ]);
					 
									 
					  $pdf_up4 = $request->file('pdf4');
					  if($pdf_up4){				
					 	$pdf_name4 = time().'-1.'.$pdf_up4->getClientOriginalExtension();
					 	$destinationPath = public_path().'/uploads/meeting';
					 	$pdf_up4->move($destinationPath, $pdf_name4);
					 }else{$pdf_name4='';}

					 $pdf_up3 = $request->file('pdf5');
					  if($pdf_up3){				
					 	$pdf_name3 = time().'-1.'.$pdf_up3->getClientOriginalExtension();
					 	$destinationPath = public_path().'/uploads/pdf';
					 	$pdf_up3->move($destinationPath, $pdf_name3);
					  }else{$pdf_name3='';}
									  
					 
				$Venue = new Hotels;				
				$Venue->user_id=auth()->user()->id;				
				$Venue->hotel_name=$request->title;
				$Venue->category_id=$request->category;	
				$Venue->slug=strtolower(str_replace(' ','-',$request->title));					
				$Venue->price=$request->price;
				$Venue->meeting_check_out_policy=$request->checkout_policy;
				$Venue->meeting_description=$request->m_description;
				$Venue->meeting_fact_sheet=$pdf_name3;
				$Venue->meeting_image=$pdf_name4;
				$Venue->nature_day_light=$request->nature_day_light;			
				$Venue->country=$request->country;
				$Venue->state=$request->states;
				$Venue->city=$request->cities;
				$Venue->address1=$request->address1;				
				$Venue->address2=$request->address2;
				$Venue->postcode=$request->postcode;
				$Venue->website=$request->web;
				$Venue->contact=$request->contact_no;						
				$Venue->description=$request->description;				
				$Venue->save();				
			    $vid = $Venue->id;				
				$session_images = Session::get('session_images');
				if($session_images){
					$i=0;
					foreach($session_images as $key=>$image) {
						if($i<=5){
						DB::table('hotels')
						->where('id', $vid)
						->update(['image_'.$key => $image,]);
						}	
						$i++;					
					}
					
					//Session::flush();
					Session::forget('session_images');
				}
								
				$capacity=$request->capacity;
				$tot=count($request->capacity);

				for ($i=0; $i < $tot; $i++) { 

					    $capacity = new UserVenueCapacity;					
						$capacity->capacity_id=$request->capacity[$i];
						$capacity->capacity_value=$request->capacity_value[$i];
						$capacity->total_sq_fit=$request->total_sq_fit[$i];
						$capacity->room_size=$request->room_size[$i];
						$capacity->celing_height=$request->celing_height[$i];
						$capacity->class_room=$request->class_room[$i];
						$capacity->theater_1=$request->theater_1[$i];
						$capacity->theater_2=$request->theater_2[$i];
						$capacity->reception=$request->reception[$i];
						$capacity->conference=$request->conference[$i];
						$capacity->u_shape=$request->u_shape[$i];
						$capacity->h_shape=$request->h_shape[$i];					
						$capacity->venue_id=$vid;							
						$capacity->save();	

				}
								
			
				
			
			

				$befefit=$request->befefit;				
				if (!empty($befefit)) {
					
					$befefit=implode(',',$befefit);
					foreach(explode(',',$befefit) as $val)
					{
						$befefit = new UserVenueBenefits;					
						$befefit->benefits_id=$val;
						$befefit->venue_id=$vid;							
						$befefit->save();				
					}
				}

				$amenities=$request->amenities;				
				if (!empty($amenities)) {
					
					$amenities=implode(',',$amenities);
					foreach(explode(',',$amenities) as $val)
					{
						$amenities = new UserVenueAmenities;					
						$amenities->amenities_id=$val;
						$amenities->venue_id=$vid;							
						$amenities->save();				
					}
				}

				$business=$request->business;				
				if (!empty($business)) {
					
					$business=implode(',',$business);
					foreach(explode(',',$business) as $val)
					{
						$business = new UserVenueBusiness;					
						$business->business_id=$val;
						$business->venue_id=$vid;							
						$business->save();				
					}
				}

				
				
				
				$features=$request->features;				
				if (!empty($features)) {
					
					$features=implode(',',$features);
					foreach(explode(',',$features) as $val)
					{
						$features = new UserVenueFeatures;					
						$features->features_id=$val;
						$features->venue_id=$vid;							
						$features->save();				
					}
				}
				$fooddrink=$request->fooddrink;				
				if (!empty($fooddrink)) {
					$fooddrink=implode(',',$fooddrink);
					foreach(explode(',',$fooddrink) as $val)
					{
						$fooddrink = new UserVenueFooddrink;
						$fooddrink->fooddrink_id=$val;
						$fooddrink->venue_id=$vid;							
						$fooddrink->save();				
					}					
				}
				$licensing=$request->licensing;				
				if (!empty($licensing)) {
						$licensing=implode(',',$licensing);
						foreach(explode(',',$licensing) as $val)
						{	
							$licensing = new UserVenueLicensing;						
							$licensing->licensing_id=$val;
							$licensing->venue_id=$vid;							
							$licensing->save();				
						}
				}
				/* $restrictions=$request->restrictions;				
				if (!empty($restrictions)) {
					
					$restrictions=implode(',',$request->restrictions);
					foreach(explode(',',$restrictions) as $val)
					{	
						$restrictions = new UserVenueRestrictions;						
						$restrictions->restrictions_id=$val;
						$restrictions->venue_id=$vid;							
						$restrictions->save();				
					}
				}
			*/
				
			return back()->with('message','success');
				
	}
	
	public function updated(Request $request)
	{	 
    $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'category'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'contact_no'			=> 'required',
			'price'			=> 'required',
			'web'			=> 'required',
			'description'			=> 'required'
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'category.required'			=> 'Category is required',	
			'address1.required'			=> 'Address is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'Cities is required',		
			'postcode.required'			=> 'Postcode is required',		
			'contact_no.required'			=> 'Contact no is required',		
			'price.required'			=> 'Price is required',		
			'web.required'			=> 'Web site url is required',		
			'description.required'			=> 'Description is required',					
                     ]);
			
			    $vid=$request->id;
				if(Session::get('session_images'))
				{
				$session_images = Session::get('session_images');
				
					foreach($session_images as $image) {
						$venue = DB::table('hotels')
						 ->where('id', $vid)	 
						 ->first(); 					
												
						if($venue->image_1=== NULL){
							
					 DB::table('hotels')
						->where('id', $vid)
						->update(['image_1' => $image,]);
						}elseif($venue->image_2=== NULL){
					 DB::table('hotels')
						->where('id', $vid)
						->update(['image_2' => $image,]);
						}
						elseif($venue->image_3=== NULL){
					 DB::table('hotels')
						->where('id', $vid)
						->update(['image_3' => $image,]);
						}elseif($venue->image_4=== NULL){
							
					 DB::table('hotels')
						->where('id', $vid)
						->update(['image_4' => $image,]);
						}elseif($venue->image_5=== NULL){
					 DB::table('hotels')
						->where('id', $vid)
						->update(['image_5' => $image,]);
						}
						elseif($venue->image_6=== NULL){
					 DB::table('hotels')
						->where('id', $vid)
						->update(['image_6' => $image,]);
					//	dd(DB::getQueryLog());
						}else{
							
						}
										
					}
					
					//Session::flush();
					Session::forget('session_images');
				}
				
				
					 
					 $fd_menu_pdf_4 = $request->file('pdf4');
					 if($fd_menu_pdf_4){				
						$fd_menu_pdf_name4 = time().'-1.'.$fd_menu_pdf_4->getClientOriginalExtension();
						$destinationPath = public_path().'/uploads/meeting';
						$fd_menu_pdf_4->move($destinationPath, $fd_menu_pdf_name4);
						DB::table('hotels')
						->where('id', $vid)
						->update(['meeting_image' => $fd_menu_pdf_name4,]);
					 }


					 $fd_menu_pdf_3 = $request->file('pdf5');
				 	 if($fd_menu_pdf_3){				
				 		$fd_menu_pdf_name3 = time().'-1.'.$fd_menu_pdf_3->getClientOriginalExtension();
				 		$destinationPath = public_path().'/uploads/pdf';
				 		$fd_menu_pdf_3->move($destinationPath, $fd_menu_pdf_name3);
				 		DB::table('hotels')
				 		->where('id', $vid)
				 		->update(['meeting_fact_sheet' => $fd_menu_pdf_name3,]);
				 	 }
				 
					
				DB::table('hotels')
				->where('id', $vid)
				->update([							
				'hotel_name' =>$request->title,	
				'category_id' =>$request->category,							
				'price' =>$request->price,
				'meeting_check_out_policy' =>$request->checkout_policy,
				'meeting_description' =>$request->m_description,
				'description' =>$request->description,
				'nature_day_light'=>$request->nature_day_light,
				'country'=>$request->country,
				'state'=>$request->states,
				'city'=>$request->cities,
				'address1'=>$request->address1,
				'address2'=>$request->address2,
				'postcode'=>$request->postcode,
				'website'=>$request->web,
				'contact'=>$request->contact_no										
				]);
				
			// $capacity=$request->capacity;
			// $capacity_value=$request->capacity_value;				
			// 	if (!empty($capacity) && !empty($capacity_value)) {
					
			// 	   $affected = DB::table('user_venue_capacity')->where('venue_id', $vid)->delete();
			// 		if($affected==0 || $affected > 0)
			// 		{
			// 			$c = array_combine($request->capacity, $request->capacity_value);
				
			// 				foreach($c as $key => $val)
			// 				{
							
			// 				   $capacity = new UserVenueCapacity;					
			// 					$capacity->capacity_id=$key;
			// 					$capacity->capacity_value=$val;					
			// 					$capacity->venue_id=$vid;							
			// 					$capacity->save();	
							
			// 				}				
										
			// 		}	
			// 	}
				
	$features=$request->features;				
	if (!empty($features)) {	
				
			$affected = DB::table('user_venue_features')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
				
						$features=implode(',',$request->features);
						foreach(explode(',',$features) as $val)
						{
							$features = new UserVenueFeatures;					
							$features->features_id=$val;
							$features->venue_id=$vid;							
							$features->save();				
						}
					}
	}
	
				$fooddrink=$request->fooddrink;				
				if (!empty($fooddrink)) {
					
				$affected = DB::table('user_venue_fooddrink')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
						$fooddrink=implode(',',$request->fooddrink);
						foreach(explode(',',$fooddrink) as $val)
						{
							$fooddrink = new UserVenueFooddrink;
							$fooddrink->fooddrink_id=$val;
							$fooddrink->venue_id=$vid;							
							$fooddrink->save();				
						}
					}
				}
				
				$licensing=$request->licensing;				
				if (!empty($licensing)) {
					
					$affected = DB::table('user_venue_licensing')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
						$licensing=implode(',',$request->licensing);
						foreach(explode(',',$licensing) as $val)
						{	
							$licensing = new UserVenueLicensing;						
							$licensing->licensing_id=$val;
							$licensing->venue_id=$vid;							
							$licensing->save();				
						}
					}
				}
				
				
return back()->with('message','Hotel updated successfully');

	}
	public function remove(Request $request)
		{	
		
		$id=$request->id;
		$val=explode(',',$request->id);
		$vid=$val[0];
		$img=$val[1];
		$field=$val[2];
		
		DB::table('hotels')
		->where('id', $vid)
		->update(['image_'.$field => null,]);
		$status['deletedid']=$field;
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
		public function deleted(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('hotels')
			 ->where('id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Hotel deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
		











	// Rooms Details
//Yess
	 public function addRoom($hid=null)
    {
    	Session::forget('session_images');
		$user_id = (auth()->check()) ? auth()->user()->id : null;	
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();		
      return view('panels.admin.hotelier.add_room',['users' => $users,'hid' => $hid]);

    }
	
	public function ViewRooms($hid=null)
	{	

		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$Rooms= Rooms::where('hotel_id',$hid)->get();
		$users = DB::table('users')
		->select('*', 'users.id as uid')
		->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
		->where('role_user.role_id', '=', 3)
		->get();
	return view('panels.admin.hotelier.view_rooms',['Rooms'=>$Rooms,'users' => $users,'hid' => $hid]);
	}



	// Room Added
	public function addedRoom(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'guest'			=> 'required',
			'bed'			=> 'required',
			'feet'			=> 'required',
			'deposit'			=> 'required',
			'breakfast'			=> 'required',
			'cancellation'			=> 'required',			
			'web_link'			=> 'required',
			'price'			=> 'required',
			'description'			=> 'required'
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'guest.required'			=> 'Number of guest is required',
			'bed.required'			=> 'Number of bed is required',
			'feet.required'			=> 'Room feet is required',
			'deposit.required'			=> 'Deposit is required',		
			'breakfast.required'			=> 'Breakfast is required',		
			'cancellation.required'			=> 'Cancellation no is required',
			'web_link.required'			=> 'Web link no is required',					
			'price.required'			=> 'Price is required',				
			'description.required'			=> 'Description is required',					
                     ]);
					 
					
									  
					 
				$Rooms = new Rooms;				
				$Rooms->user_id=auth()->user()->id;				
				$Rooms->hotel_id=$request->hotel_id;					
				$Rooms->title=$request->title;
				$Rooms->guest=$request->guest;
				$Rooms->bed=$request->bed;
				$Rooms->feet=$request->feet;
				$Rooms->price=$request->price;
				$Rooms->description=$request->description;
				$Rooms->deposit=$request->deposit;
				$Rooms->breakfast=$request->breakfast;
				$Rooms->cancellation=$request->cancellation;				
				$Rooms->web_link=$request->web_link;							
				$Rooms->save();				
			    $id = $Rooms->id;
		    


				$session_images = Session::get('session_images');
				
				if($session_images){
					$i=0;
					foreach($session_images as $key=>$image) {
						if($i<=5)
							{
						DB::table('rooms')
						->where('id', $id)
						->update(['image_'.$key => $image,]);
						}						

					$i++;	
					}
					
					//Session::flush();
					Session::forget('session_images');
				}							
				
				
			return back()->with('message','success');
				
	}
	
	public function updatedRoom(Request $request)
	{	 
     $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'guest'			=> 'required',
			'bed'			=> 'required',
			'feet'			=> 'required',
			'deposit'			=> 'required',
			'breakfast'			=> 'required',
			'cancellation'			=> 'required',			
			'web_link'			=> 'required',
			'price'			=> 'required',
			'description'			=> 'required'
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'guest.required'			=> 'Number of guest is required',
			'bed.required'			=> 'Number of bed is required',
			'feet.required'			=> 'Room feet is required',
			'deposit.required'			=> 'Deposit is required',		
			'breakfast.required'			=> 'Breakfast is required',		
			'cancellation.required'			=> 'Cancellation no is required',
			'web_link.required'			=> 'Web link no is required',					
			'price.required'			=> 'Price is required',				
			'description.required'			=> 'Description is required',					
                     ]);
			
			    $vid=$request->id;
				if(Session::get('session_images'))
				{
				$session_images = Session::get('session_images');
				
					foreach($session_images as $image) {
						$venue = DB::table('rooms')
						 ->where('id', $vid)	 
						 ->first(); 					
												
						if($venue->image_1=== NULL){
							
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_1' => $image,]);
						}elseif($venue->image_2=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_2' => $image,]);
						}
						elseif($venue->image_3=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_3' => $image,]);
						}elseif($venue->image_4=== NULL){
							
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_4' => $image,]);
						}elseif($venue->image_5=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_5' => $image,]);
						}
						elseif($venue->image_6=== NULL){
					 DB::table('rooms')
						->where('id', $vid)
						->update(['image_6' => $image,]);
					//	dd(DB::getQueryLog());
						}else{
							
						}
										
					}
					
					//Session::flush();
					Session::forget('session_images');
				}
				
					
				DB::table('rooms')
				->where('id', $vid)
				->update([							
				'title' =>$request->title,								
				'guest' =>$request->guest,
				'bed' =>$request->bed,
				'feet' =>$request->feet,
				'price' =>$request->price,
				'description'=>$request->description,
				'deposit'=>$request->deposit,
				'breakfast'=>$request->breakfast,
				'cancellation'=>$request->cancellation,
				'web_link'=>$request->web_link														
				]);
				
return back()->with('message','Room updated successfully');

	}

	public function getRoom(Request $request)
		{
			 $id=$request->id;			 
			 $rooms = DB::table('rooms')
			 ->where('id', $id)	 
			 ->first();
 			
		 return '{"view_details": ' . json_encode(array("rooms"=>$rooms)) . '}';
	}

	public function updateOffer(Request $request)
		{
			 $id=$request->id;	
			 $myString=$request->daterange;
			 $date=explode('-', $myString);		 
			 DB::table('hotels')
				->where('id', $id)
				->update([							
				'offer' =>$request->offer,								
				'offer_start_date' =>date('Y-m-d', strtotime($date[0])),
				'offer_end_date' =>date('Y-m-d', strtotime($date[1])),																
				]);

				$status='Offer updated successfully';
 			
		 return '{"view_details": ' . json_encode(array("status"=>$status)) . '}';
	}

	public function enable(Request $request)
	{	 
	$id=$request->id;
	DB::table('hotels')
	->where('id', $request->id)
	->update(['status' => 'Disable',]);
	$status['deletedtatus']='Updated successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}
	public function disable(Request $request)
	{	 
	$id=$request->id;
	DB::table('hotels')
	->where('id', $request->id)
	->update(['status' => 'Enable',]);
	$status['deletedtatus']='Updated successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	







}