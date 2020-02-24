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
class MerchantController extends Controller
{

public function getDashboard()
    {
    	$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
 $hotels = DB::table('hotels')
			 ->where('user_id', $user_id)	 
			 ->get(); 
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
      return view('panels.hotelier.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueType'=>$VenueType,'hotels'=>$hotels,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
 //    	$user_id = (auth()->check()) ? auth()->user()->id : null;
 //    	$venue = DB::table('venue')
	// 		->select('*', DB::raw('count(leads.venue_id) as total'))
	// 		->selectRaw('sum(bph) as worth')			
	// 		->leftJoin('leads', 'leads.venue_id', '=', 'venue.v_id')
	// 		->where('venue.user_id', '=', $user_id)
	// 		->groupBy('v_id')
	// 		->get();
	// 	 $country= Country::all()->where('id',230);
	// 	$editstates = DB::table('states')			 
	// 		 ->get();
	// 	$editcities = DB::table('cities')			 
	// 		 ->get();
	// return view('panels.hotelier.home',['venue'=>$venue,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
    public function getHome()
    {
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		
		$venue_contact = DB::table('venue_contact')
			 ->where('user_id', $user_id)	 
			 ->first();
			 
		if(!$venue_contact){
		 return redirect('merchant/add-venue');	
		}
		/*$venue = DB::table('venue')
			 ->where('user_id', $user_id)	 
			 ->get();
			 */
			 $user_payment_type = DB::table('user_payment_type')
			 ->where('u_id', $user_id)	 
			 ->first();
			 if(!$user_payment_type)
			 {
				$upt = new UserPaymentType;				
				$upt->u_id=$user_id;
				$upt->type=1;				
				$upt->save();	
				
			 }
			 
		$venue = DB::table('venue')
			->select('*', DB::raw('count(leads.venue_id) as total'))
			->selectRaw('sum(bph) as worth')			
			->leftJoin('leads', 'leads.venue_id', '=', 'venue.v_id')
			->where('venue.user_id', '=', $user_id)
			->groupBy('v_id')
			->get();	 
			 
			 
	    $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
	  // $language= MultiLanguage::all();
	   $country= Country::all()->where('status',1);
	   //$category= Category::all();
	 //  $category = DB::table('category')
	//		 ->where('parent_id', '0')	 
	//		 ->get();
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
	//	$subcategory = DB::table('category')
	//		 ->where('parent_id','!=', '0')
	//		 ->get();
	//'language' => $language,'editlanguage' => $language,
	//'category' => $category,'editcategory' => $category,'editsubcategory' => $subcategory,
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.hotelier.home',['venue'=>$venue,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	 public function getVenueType()
    {

      return view('panels.hotelier.venue_type');

    }
	public function updatedVenueType(Request $request)
	{
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		DB::table('users')
		->where('id', $user_id)
		->update(['venue_type' => $request->type,]);
		
		return redirect('merchant');
	}
	
	 public function orders()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		
		$order = DB::table('payment_details')				
			->where('user_id', '=', $user_id)
			->get();		
		 return view('panels.hotelier.order',['order'=>$order,]);
	}
	
	// Venue Contact Start
	 public function addVenue()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$venue= Venue::all();
		
		 $user_payment_type = DB::table('user_payment_type')
					 ->where('u_id', $user_id)	 
					 ->first();
					 if(!$user_payment_type)
					 {
						$upt = new UserPaymentType;				
						$upt->u_id=$user_id;
						$upt->type=1;				
						$upt->save();	
						
					 }
		$VenueContact= VenueContact::all()->where('user_id',$user_id);
		 $VenueType= VenueType::all();	 
	  
	   $country= Country::all()->where('id',230);
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
      return view('panels.hotelier.add_venue',['Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	
	public function edit()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
/* $venue = DB::table('venue')
			 ->where('user_id', $user_id)	 
			 ->get(); */
		$venue= VenueContact::all()->where('user_id',$user_id)->first(); 
		$VenueType= VenueType::all();
    
	
	 
	   $country= Country::all()->where('id',230);
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
      return view('panels.hotelier.edit',['Category'=>$Category,'VenueType'=>$VenueType,'venue'=>$venue,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
		
	public function getvenue(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('venue_contact')
			 ->where('v_c_id', $id)	 
			 ->first();   
			//$category_id['cid']=$venue->category_id;
			$user_venue_type = DB::table('user_venue_type')
			 ->where('venue_id', $id)	 
			 ->get();			
			 
		 return '{"view_details": ' . json_encode(array("venue"=>$venue,"user_venue_type"=>$user_venue_type)) . '}';
	}
		
	public function addedVenueContact(Request $request)
	{
		
		
		  $this->validate($request,
			 [		 
		
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'contact_no'			=> 'required',			
			'nearest_transport_link'	=> 'required',		
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',
			'contact_no.required'			=> 'Contact no is required',			
			'nearest_transport_link.required'	=> 'Nearest transport link is required',
                     ]);
			
		
			
				$Venue = new VenueContact;				
				$Venue->user_id=auth()->user()->id;
				$Venue->title=$request->title;
				$Venue->c_id=$request->country;
				$Venue->state=$request->states;
				$Venue->city=$request->cities;
				$Venue->address1=$request->address1;
				$Venue->address2=$request->address2;
				$Venue->postcode=$request->postcode;
				$Venue->contact_no=$request->contact_no;
				$Venue->description=$request->description;
				$Venue->nearest_transport_link=$request->nearest_transport_link;
				$Venue->save();	
				$vid=$Venue->id;				
				//dd(DB::getQueryLog());
				$venuetype=implode(',',$request->venuetype);
				foreach(explode(',',$venuetype) as $val)
				{
					$venuetype = new UserVenueType;					
					$venuetype->venuetype_id=$val;
					$venuetype->venue_id=$vid;							
					$venuetype->save();				
				}
				
			return redirect('merchant/add-venue')->with('message','Venue contact added successfully');
	}
	public function updatedVenueContact(Request $request)
	{	 
  $this->validate($request,
			 [		 
		
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'contact_no'			=> 'required',			
			'nearest_transport_link'	=> 'required',		
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',
			'contact_no.required'			=> 'Contact number is required',
			
			'nearest_transport_link.required'	=> 'Nearest transport link is required',
                     ]);
			
			    $vid=$request->id;
				
				DB::table('venue_contact')
				->where('v_c_id', $request->id)
				->update([							
				'title' =>$request->title,
				'c_id' =>$request->country,
				'state' =>$request->states,
				'city' =>$request->cities,
				'address1' =>$request->address1,
				'address2' =>$request->address2,
				'postcode' =>$request->postcode,
				'contact_no' =>$request->contact_no,
				'description'=>$request->description,
                 'nearest_transport_link' =>$request->nearest_transport_link,				
				]);
				$vid=$request->id;
				 $affected = DB::table('user_venue_type')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
				
						$venuetype=implode(',',$request->venuetype);
						foreach(explode(',',$venuetype) as $val)
						{
							$venuetype = new UserVenueType;					
							$venuetype->venuetype_id=$val;
							$venuetype->venue_id=$vid;							
							$venuetype->save();				
						}
					} 		
			
return redirect('merchant/edit-venue')->with('message','Venue contact updated successfully');

	}
	
	// Venue Contact End
	
	

	
	public function getEnquiry($id=null)
    {
		
		
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)			
			->first();
			
		//	$payment_details = DB::table('payment_details')			
		//	->where('status', '=', 'Active')
		//	->where('user_id', '=', $user_id)			
		//	->first();			
			//$time = strtotime($payment_details->created_at);
			//$exp_date = date("Y-m-d H:i:s", strtotime("+1 month", $time));
			//'created_date'=>$created_date,'exp_date'=>$exp_date,


		if($id != null)
		{
		
			$leads = DB::table('leads')
			->select('*', 'leads.status as enq_status')			
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')
			//->where('leads.assign_status', '=', 2)			
			->where('leads.venue_id', '=', $id)
			->get();
		}else{
			$leads = DB::table('leads')
			->select('*', 'leads.status as enq_status')	
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')
			//->where('leads.assign_status', '=', 2)
			->where('venue.user_id', '=', $user_id)
			->get();
			}
	
			//dd(DB::getQueryLog());
	
      return view('panels.hotelier.enquiry',['leads'=>$leads,'user_payment_type'=>$user_payment_type,]);

    }
		public function getleadDetails($id=null)
    {
		
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)
			->where('type', '=', 2)
			->where('status', '=', 'Active')
			->first();
		$payment_details = DB::table('payment_details')			
			->where('subcription_status', 'Active')
			->where('user_id', $user_id)			
			->first();	
			
			//$time = strtotime($payment_details->created_at);
			//$exp_date = date("Y-m-d H:i:s", strtotime("+1 month", $time));
			//'created_date'=>$created_date,'exp_date'=>$exp_date,
	if(!$user_payment_type)
		{
				
		echo $leads='Invalid Payment Type';
		}else{
			
				if($id)
				{
				
					$leads = DB::table('leads')							
					->where('id', '=', $id)
					->first();
				}
		}
			
	
      return view('panels.hotelier.leaddetails',['leads'=>$leads,'payment_details'=>$payment_details,]);

    }
	
	public function getUserPaymentType()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;		
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)
			->first();		
      return view('panels.hotelier.payment_type',['user_payment_type'=>$user_payment_type,]);

    }
	public function updatedUserPayment(Request $request)
	{
		$id=$request->id;  
		DB::table('user_payment_type')
		->where('u_id', $id)
		->update(['type' => $request->type,]);
		
		$status='Your payment type update successfully';
		 return '{"status": ' . json_encode($status) . '}'; 
		 
		
	//	return redirect('merchant/payment-plan')->with('message','Payment model updated successfully');
	}
	
	public function edit_profile()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;
$users = DB::table('users')		
		->where('id', '=', $user_id)
		->first();
		
      return view('panels.hotelier.edit_profile',['users'=>$users]);
    }
	public function update_password()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

      return view('panels.hotelier.update_password');
    }

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
	
		
	// Venue Space Start
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
	  
		$country= Country::all()->where('id',230);
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
      return view('panels.hotelier.add_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	
	public function editHotel()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
 $hotels = DB::table('hotels')
			 ->where('user_id', $user_id)	 
			 ->get(); 
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
	
	 
	   $country= Country::all()->where('id',230);
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
      return view('panels.hotelier.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueType'=>$VenueType,'hotels'=>$hotels,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
	
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


	// Venue Added
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
					foreach($session_images as $key=>$image) {
						DB::table('hotels')
						->where('id', $vid)
						->update(['image_'.$key => $image,]);						
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
				
				
return redirect('merchant')->with('message','Hotel updated successfully');

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
		public function deletedVenueContact(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('venue_contact')
			 ->where('v_c_id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Venue contact deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}












	// Rooms Details

	 public function addRoom($hid=null)
    {
    	Session::forget('session_images');
		$user_id = (auth()->check()) ? auth()->user()->id : null;	
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();		
      return view('panels.hotelier.add_room',['users' => $users,'hid' => $hid]);

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
	return view('panels.hotelier.view_rooms',['Rooms'=>$Rooms,'users' => $users,'hid' => $hid]);
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
					foreach($session_images as $key=>$image) {
						DB::table('rooms')
						->where('id', $id)
						->update(['image_'.$key => $image,]);						
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



    public function getProtected()
    {
      
        return view('panels.hotelier.protected');

    }

}