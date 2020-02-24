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
use App\Models\Hotelleads;
use App\Models\Hotelleadscontacts;
use App\Models\Hotelleadsnotes;


use App\Http\Controllers\Controller;
use Image;
use Session;
use PDF;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use Validator;
class CrmController extends Controller
{

public function getDashboard()
    {
    	$user_id = (auth()->check()) ? auth()->user()->id : null;

		$hotels = DB::table('hotel_leads')
			 ->get(); 
		
	    $country= Country::all()->where('status',1);
	  
	   
		
		$contacts = DB::table('hotel_leads_contacts')
			->select('*', 'hotel_leads_contacts.hl_id as hid')
			->leftJoin('hotel_leads', 'hotel_leads_contacts.hl_id', '=', 'hotel_leads.hl_id')
			->where('hotel_leads_contacts.hl_c_main_contact', '=', 1)
			->get();
			
		
			
		if(count($contacts)>0)
		{
			for($i = 0; $i<count($contacts);$i++)
			{
				$contacts_list[$i]['cnt'] = count($contacts) ;
				$contacts_list[$i]['hl_id'] = $contacts[$i]->hl_id ;
				$contacts_list[$i]['hl_name'] = $contacts[$i]->hl_name ;
				$contacts_list[$i]['hl_grp_name'] = $contacts[$i]->hl_grp_name ;
				$contacts_list[$i]['hl_address'] = $contacts[$i]->hl_address ;
				$city= DB::table('cities')
				->select('name')->where('id',$contacts[$i]->hl_city)->get();
				
				$contacts_list[$i]['hl_city'] = $city[0]->name;
				$country = ($contacts[$i]->hl_country=='230'?'United Kingdom':'');
				$contacts_list[$i]['hl_country'] = $country;
				$contacts_list[$i]['hl_c_person'] = $contacts[$i]->hl_c_person ;
				$contacts_list[$i]['hl_c_no'] = $contacts[$i]->hl_c_no ;
				$contacts_list[$i]['hl_c_email'] = $contacts[$i]->hl_c_email ;
				$contacts_list[$i]['hl_c_status'] = $contacts[$i]->hl_c_status ;
				$user = DB::table('users')
						->select('*', 'users.id as uid')
						->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
						->where('users.id', '=', $contacts[$i]->hl_created_by)
						->get();
				$contacts_list[$i]['user_name'] = strtoupper($user[0]->first_name);
				
				$hotel_notes = DB::table('hotel_leads_notes')
				->select('*')
				->where('hl_id', '=', $contacts[$i]->hl_id)
				->orderBy('updated_at','DESC')
				->get();
				$hotel_notes_cnt = count($hotel_notes);
				$notes_list = array();
				if($hotel_notes_cnt>0)
				{
					for($ii = 0; $ii<$hotel_notes_cnt;$ii++)
					{
						$notes_list[$ii]['hl_n_notes'] = $hotel_notes[$ii]->hl_n_notes;
						$notes_list[$ii]['updated_at'] = $hotel_notes[$ii]->updated_at;
						$notes_list[$ii]['hl_n_added_by'] = $hotel_notes[$ii]->hl_n_added_by;
						$notes_list[$ii]['hl_c_status'] = $hotel_notes[$ii]->hl_c_status;
						$users = DB::table('users')
						->select('*', 'users.id as uid')
						->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
						->where('users.id', '=', $hotel_notes[$ii]->hl_n_added_by)
						->get();
						$notes_list[$ii]['hl_n_added_by_name'] = strtoupper($users[0]->first_name);
					}
					
					$contacts_list[$i]['notes'] = $notes_list;
				}
				
			}
			
		}
		else
		{
			$contacts_list[0]['cnt'] = count($contacts);
		}
		
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.crm.edit_hotel',['hotels'=>$hotels,'contacts'=>$contacts_list,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
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
	// return view('panels.crm.home',['venue'=>$venue,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

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
      return view('panels.crm.home',['venue'=>$venue,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	 public function getVenueType()
    {

      return view('panels.crm.venue_type');

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
		 return view('panels.crm.order',['order'=>$order,]);
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
      return view('panels.crm.add_venue',['Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

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
      return view('panels.crm.edit',['Category'=>$Category,'VenueType'=>$VenueType,'venue'=>$venue,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
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
	
      return view('panels.crm.enquiry',['leads'=>$leads,'user_payment_type'=>$user_payment_type,]);

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
			
	
      return view('panels.crm.leaddetails',['leads'=>$leads,'payment_details'=>$payment_details,]);

    }
	
	public function getUserPaymentType()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;		
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)
			->first();		
      return view('panels.crm.payment_type',['user_payment_type'=>$user_payment_type,]);

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
		
      return view('panels.crm.edit_profile',['users'=>$users]);
    }
	public function update_password()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

      return view('panels.crm.update_password');
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
      return view('panels.crm.add_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

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
      return view('panels.crm.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueType'=>$VenueType,'hotels'=>$hotels,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
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
		
			'hotel_type'			=> 'required',
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'website'			=> 'required',
			'contact_no'			=> 'required',
			'no_of_room'			=> 'required',
			'no_of_m_room'			=> 'required',
			'star_rate'			=> 'required',
			'lead_type'			=> 'required'
               
            ],
            [
			
			'hotel_type.required'			=> 'Hostel Type is required',
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'Cities is required',		
			'postcode.required'			=> 'Postcode is required',		
			'website.required'			=> 'Website is required',		
			'contact_no.required'			=> 'Contact No is required',		
			'no_of_room.required'			=> 'No of room is required',		
			'no_of_m_room.required'			=> 'No of meeting room is required',		
			'star_rate.required'			=> 'Star Rate is required',		
			'lead_type.required'			=> 'Lead Type is required',					
                     ]);
					 
									 
										  
					 
				$Hotell = new Hotelleads;				
				$Hotell->hl_created_by=auth()->user()->id;				
				$Hotell->hl_type=$request->hotel_type;
				$Hotell->hl_grp_name=$request->grp_name;					
				$Hotell->hl_name=$request->title;
				$Hotell->hl_address=$request->address1;
				$Hotell->hl_country=$request->country;
				$Hotell->hl_state=$request->states;
				$Hotell->hl_city=$request->cities;
				$Hotell->hl_postcode=$request->postcode;
				$Hotell->hl_website=$request->website;
				$Hotell->hl_contact_no=$request->contact_no;						
				$Hotell->hl_no_room=$request->no_of_room;						
				$Hotell->hl_no_m_room=$request->no_of_m_room;						
				$Hotell->hl_star_rate=$request->star_rate;						
				$Hotell->hl_lead_type=$request->lead_type;				
				$Hotell->save();				
			    $hlid = $Hotell->id;				
				
								
				$contact_person=$request->contact_person;
				$contact_status_hidden=$request->contact_status_hidden;
				
				$contact_status_hiddenval = explode(",",$contact_status_hidden);
				
				$tot=count($request->contact_person);

				for ($i=0; $i < $tot; $i++) { 

					    $hlcontacts = new Hotelleadscontacts;					
						$hlcontacts->hl_c_person=$request->contact_person[$i];
						$hlcontacts->hl_c_designation=$request->contact_designation[$i];
						$hlcontacts->hl_c_no=$request->contact_number[$i];
						$hlcontacts->hl_c_email=$request->contact_email[$i];
						$hlcontacts->hl_c_linked_contact=$request->linked_in[$i];
						$hlcontacts->hl_c_main_contact=$contact_status_hiddenval[$i];
						$hlcontacts->hl_c_status=0;
						$hlcontacts->hl_c_created_by=auth()->user()->id;
							
						$hlcontacts->hl_id=$hlid;							
						$hlcontacts->save();	

				} 
								
				$Hotelln = new Hotelleadsnotes;				
				$Hotelln->hl_n_added_by=auth()->user()->id;				
				$Hotelln->hl_id=$hlid;
				$Hotelln->hl_c_status=$request->action;					
				$Hotelln->hl_n_notes=$request->lead_notes;					
							
				$Hotelln->save();				
			    
			
				
			return back()->with('message','success');
				
	}
	
	public function profileupdated(Request $request)
	{
		 
		 $this->validate($request,
			 [		 
		
		'firstname'			=> 'required',
		'lastname'			=> 'required',
		'email'			=> 'required|email|unique:users'		
		       
            ],
            [
			
			'firstname.required'			=> 'FirstName is required',
			'lastname.required'			=> 'Lastname is required',
			'email.required'        => 'Email is required',

            'email.email'           => 'Email is invalid'		
			          ]);
			
				DB::table('users')
				->where('id', $request->id)
				->update([							
				'first_name' =>$request->firstname,
				'last_name' =>$request->lastname,				
				'email' =>$request->email,
				]);
				
				return redirect('/crm/edit-profile')->with('message','Profile Details updated successfully');

				
	}
	
	public function passupdated(Request $request)
	{
		 
		 $this->validate($request,
			 [		 
		
		 'password'              => 'required|min:6|max:20',

          'cpassword' 			=> 'required|same:password'
		       
            ],
            [
			
			'password.required'     => 'Password is required',

			'password.min'          => 'Password needs to have at least 6 characters',

			'password.max'          => 'Password maximum length is 20 characters',

			'cpassword.required'    => 'Confirm password is required'
			          ]);
				
				$password = bcrypt($request->password);
				
				DB::table('users')
				->where('id', $request->id)
				->update([							
				'password' =>$password
				]);
				
				return redirect('/crm/update-password')->with('message','Password updated successfully');

				
	}
	public function updated(Request $request)
	{	 
    		    $hid=$request->hotel_id;
				
				DB::table('hotel_leads_contacts')
				->where('hl_id', $hid)
				->update([							
				'hl_c_status'=>$request->action
				]);
				
				$Hotelln = new Hotelleadsnotes;				
				$Hotelln->hl_n_added_by=auth()->user()->id;				
				$Hotelln->hl_id=$hid;
				$Hotelln->hl_c_status=$request->action;					
				$Hotelln->hl_n_notes=$request->lead_notes;					
							
				$Hotelln->save();
					
				
				
		return redirect('/crm')->with('message','Hotel Lead updated successfully');

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
      return view('panels.crm.add_room',['users' => $users,'hid' => $hid]);

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
	return view('panels.crm.view_rooms',['Rooms'=>$Rooms,'users' => $users,'hid' => $hid]);
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
      
        return view('panels.crm.protected');

    }

}