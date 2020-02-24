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
use App\Models\UserVenueType;
use App\Models\VenueContact;


use App\Http\Controllers\Controller;
use Image;
use Session;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use Validator;
class MerchantController extends Controller
{

    public function getHome()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		/*$venue = DB::table('venue')
			 ->where('user_id', $user_id)	 
			 ->get();
			 */
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
	   $country= Country::all()->where('id',230);
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
      return view('panels.merchant.home',['venue'=>$venue,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	 public function getVenueType()
    {

      return view('panels.merchant.venue_type');

    }
	public function updatedVenueType(Request $request)
	{
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		DB::table('users')
		->where('id', $user_id)
		->update(['venue_type' => $request->type,]);
		
		return redirect('merchant');
	}
	 public function payment()
    {
        //return view('.paywithstripe');
		return view('panels.merchant.paywithstripe');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            'amount' => 'required',
        ]);
        
        $input = $request->all();
        if ($validator->passes()) {           
            $input = array_except($input,array('_token'));            
            $stripe = Stripe::make('set here your stripe secret key');
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year'  => $request->get('ccExpiryYear'),
                        'cvc'       => $request->get('cvvNumber'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    \Session::put('error','The Stripe Token was not generated correctly');
                    return redirect('merchant/payment');
					//return redirect()->route('addmoney.paywithstripe');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount'   => $request->get('amount'),
                    'description' => 'Add in wallet',
                ]);
                if($charge['status'] == 'succeeded') {
                    /**
                    * Write Here Your Database insert logic.
                    */
                    \Session::put('success','Money add successfully in wallet');
					 return redirect('merchant/payment');
                   // return redirect()->route('addmoney.paywithstripe');
                } else {
                    \Session::put('error','Money not add in wallet!!');
					 return redirect('merchant/payment');
                   // return redirect()->route('addmoney.paywithstripe');
                }
            } catch (Exception $e) {
                \Session::put('error',$e->getMessage());
				 return redirect('merchant/payment');
                //return redirect()->route('addmoney.paywithstripe');
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error',$e->getMessage());
				 return redirect('merchant/payment');
               // return redirect()->route('addmoney.paywithstripe');
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error',$e->getMessage());
				 return redirect('merchant/payment');
              //  return redirect()->route('addmoney.paywithstripe');
            }
        }
        \Session::put('error','All fields are required!!');
		 return redirect('merchant/payment');
       // return redirect()->route('addmoney.paywithstripe');
    } 
	
	
	 public function addVenue()
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
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
	
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.merchant.add_venue',['Category'=>$Category,'VenueContact'=>$VenueContact,'VenueType'=>$VenueType,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	
	
	
	
	public function index()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;
$listing= Listing::all()->where('user_id', '=', $user_id);
 

 //dd($listing);

	   //$listing= Listing::all()->where('user_id', '=', 3);
	   $language= MultiLanguage::all();
	   $country= Country::all();
	   //$category= Category::all();
	   $category = DB::table('category')
			 ->where('parent_id', '0')	 
			 ->get();
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
		$subcategory = DB::table('category')
			 ->where('parent_id','!=', '0')
			 ->get();
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
			 
       return view('panels.merchant.index',['listing'=>$listing,'users' => $users,'language' => $language,'country' => $country,'category' => $category,'editusers' => $users,'editlanguage' => $language,'editcountry' => $country,'editcategory' => $category,'editsubcategory' => $subcategory,'editstates' => $editstates,'editcities' => $editcities]);
    }
	
	public function edit()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
//$VenueContact= VenueContact::all()->where('user_id',$user_id);
$venue = DB::table('venue')
			 ->where('user_id', $user_id)	 
			 ->get();
			 
		$VenueType= VenueType::all();
        $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
	
	 
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
      return view('panels.merchant.edit',['Category'=>$Category,'VenueType'=>$VenueType,'venue'=>$venue,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
	
	public function addVenueContact()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$venue= Venue::all();
		$VenueContact= VenueContact::all()->where('user_id',$user_id);
	    $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
	  
	   $country= Country::all()->where('id',230);
	   //$category= Category::all();
	 //  $category = DB::table('category')
	//		 ->where('parent_id', '0')	 
	//		 ->get();
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.merchant.add_venue_contact',['VenueContact'=>$VenueContact,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);

    }
	public function editVenueContact()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

		//$venue= Venue::all();
$VenueContact= VenueContact::all()->where('user_id',$user_id);

	  // $language= MultiLanguage::all();
	   $country= Country::all()->where('id',230);
	
	
		$editstates = DB::table('states')
			->where('country_id', '=', 230)	
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.merchant.edit_venue_contact',['VenueContact'=>$VenueContact,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
    }
	public function getEnquiry($id=null)
    {
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		if($id != null)
		{
		
			$leads = DB::table('leads')
			->select('*', 'leads.status as enq_status')			
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')			
			->where('leads.venue_id', '=', $id)
			->get();
		}else{
			$leads = DB::table('leads')
			->select('*', 'leads.status as enq_status')	
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')
			->where('venue.user_id', '=', $user_id)
			->get();
			}
			//dd(DB::getQueryLog());
	
      return view('panels.merchant.enquiry',['leads'=>$leads,]);

    }
	
	public function getUserPaymentType()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$user_payment_type = DB::table('user_payment_type')
			->where('u_id', '=', $user_id)
			->first();		
      return view('panels.merchant.payment_type',['user_payment_type'=>$user_payment_type,]);

    }
	public function updatedUserPayment(Request $request)
	{
		$id=$request->id;  
		DB::table('user_payment_type')
		->where('user_id', $id)
		->update(['type' => $request->type,]);
		
		return redirect('merchant/payment-plan')->with('message','Payment model updated successfully');
	}
	
	public function edit_profile()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;
$users = DB::table('users')		
		->where('id', '=', $user_id)
		->first();
		
      return view('panels.merchant.edit_profile',['users'=>$users]);
    }
	public function update_password()
    {	

$user_id = (auth()->check()) ? auth()->user()->id : null;

      return view('panels.merchant.update_password');
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
	
	public function getvenue(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('venue')
			 ->where('v_id', $id)	 
			 ->first();   
			//$category_id['cid']=$venue->category_id;
			$user_venue_type = DB::table('user_venue_type')
			 ->where('venue_id', $id)	 
			 ->get();
			 
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
			 
		 return '{"view_details": ' . json_encode(array("venue"=>$venue,"user_venue_type"=>$user_venue_type,"user_venue_capacity"=>$user_venue_capacity,"user_venue_features"=>$user_venue_features,"user_venue_fooddrink"=>$user_venue_fooddrink,"user_venue_licensing"=>$user_venue_licensing,"user_venue_restrictions"=>$user_venue_restrictions)) . '}';
	}
	
	public function getVenuecontact(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('venue_contact')
			 ->where('v_c_id', $id)	 
			 ->first();   
			
			 
		 return '{"view_details": ' . json_encode($venue) . '}';
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
			'nearest_transport_link'	=> 'required',		
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',						
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
				$Venue->nearest_transport_link=$request->nearest_transport_link;
				$Venue->save();	   			
				//dd(DB::getQueryLog());
				
			return redirect('merchant/add-venue-contact')->with('message','Venue contact added successfully');
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
			'nearest_transport_link'	=> 'required',		
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',						
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
                 'nearest_transport_link' =>$request->nearest_transport_link,				
				]);
				  		
			
return redirect('merchant/edit-venue-contact')->with('message','Venue contact updated successfully');

	}
	
	// Venue Added
	public function added(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',				
			'price'			=> 'required',				
			'description'	=> 'required',
			'nearest_transport_link'	=> 'required',			
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',						
			'nearest_transport_link.required'	=> 'Nearest transport link is required',
			'price.required'			=> 'Price is required',							
			'description.required'	=> 'required',
                     ]);
			
	
			
				$Venue = new Venue;				
				$Venue->user_id=auth()->user()->id;				
				$Venue->title=$request->title;
				$Venue->category_id=implode(',',$request->category);				
				$Venue->price=$request->price;
				$Venue->per_head=$request->per_head;				
				$Venue->description=$request->description;
				$Venue->c_id=$request->country;
				$Venue->state=$request->states;
				$Venue->city=$request->cities;
				$Venue->address1=$request->address1;
				$Venue->address2=$request->address2;
				$Venue->postcode=$request->postcode;
				$Venue->nearest_transport_link=$request->nearest_transport_link;
				$Venue->save();				
			    $vid = $Venue->id;				
				$session_images = Session::get('session_images');
				
					foreach($session_images as $key=>$image) {
						DB::table('venue')
						->where('v_id', $vid)
						->update(['image_'.$key => $image,]);						
					}
					
					//Session::flush();
					Session::forget('session_images');
				
				$c = array_combine($request->capacity, $request->capacity_value);
				
				foreach($c as $key => $val)
				{
				
				   $capacity = new UserVenueCapacity;					
					$capacity->capacity_id=$key;
					$capacity->capacity_value=$val;					
					$capacity->venue_id=$vid;							
					$capacity->save();	
				
				}
				$venuetype=implode(',',$request->venuetype);
				foreach(explode(',',$venuetype) as $val)
				{
					$venuetype = new UserVenueType;					
					$venuetype->venuetype_id=$val;
					$venuetype->venue_id=$vid;							
					$venuetype->save();				
				}
		
				$features=implode(',',$request->features);
				foreach(explode(',',$features) as $val)
				{
					$features = new UserVenueFeatures;					
					$features->features_id=$val;
					$features->venue_id=$vid;							
					$features->save();				
				}
				$fooddrink=implode(',',$request->fooddrink);
				foreach(explode(',',$fooddrink) as $val)
				{
					$fooddrink = new UserVenueFooddrink;
					$fooddrink->fooddrink_id=$val;
					$fooddrink->venue_id=$vid;							
					$fooddrink->save();				
				}
				$licensing=implode(',',$request->licensing);
				foreach(explode(',',$licensing) as $val)
				{	
                    $licensing = new UserVenueLicensing;						
					$licensing->licensing_id=$val;
					$licensing->venue_id=$vid;							
					$licensing->save();				
				}
				$restrictions=implode(',',$request->restrictions);
				foreach(explode(',',$restrictions) as $val)
				{	
                    $restrictions = new UserVenueRestrictions;								
					$restrictions->restrictions_id=$val;
					$restrictions->venue_id=$vid;							
					$restrictions->save();				
				}
				
			return redirect('merchant/add-venue')->with('message','success');
	}
	
	public function updated(Request $request)
	{	 
  $this->validate($request,
			 [			 
		
			'title'			=> 'required',
			'address1'			=> 'required',
			'country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',				
			'price'			=> 'required',				
			'description'	=> 'required',
			'nearest_transport_link'	=> 'required',			
               
            ],
            [
			
			'title.required'			=> 'Title is required',
			'address1.required'			=> 'Address1 is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'City is required',
			'postcode.required'			=> 'Postcode is required',						
			'nearest_transport_link.required'	=> 'Nearest transport link is required',
			'price.required'			=> 'Price is required',							
			'description.required'	=> 'required',
                     ]);
			
			    $vid=$request->id;
				if(Session::get('session_images'))
				{
				$session_images = Session::get('session_images');
				
					foreach($session_images as $image) {
						$venue = DB::table('venue')
						 ->where('v_id', $vid)	 
						 ->first(); 					
												
						if($venue->image_1=== NULL){
							
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_1' => $image,]);
						}elseif($venue->image_2=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_2' => $image,]);
						}
						elseif($venue->image_3=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_3' => $image,]);
						}elseif($venue->image_4=== NULL){
							
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_4' => $image,]);
						}elseif($venue->image_5=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_5' => $image,]);
						}
						elseif($venue->image_6=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_6' => $image,]);
					//	dd(DB::getQueryLog());
						}else{
							
						}
										
					}
					
					//Session::flush();
					Session::forget('session_images');
				}
				
				DB::table('venue')
				->where('v_id', $request->id)
				->update([							
				'title' =>$request->title,
				'category_id' =>implode(',',$request->category),				
				'price' =>$request->price,
				'per_head' =>$request->per_head,
				'description' =>$request->description,
                'c_id' =>$request->country,
				'state' =>$request->states,
				'city' =>$request->cities,
				'address1' =>$request->address1,
				'address2' =>$request->address2,
				'postcode' =>$request->postcode,
                 'nearest_transport_link' =>$request->nearest_transport_link,				
				]);
				
			
				   $affected = DB::table('user_venue_capacity')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
						$c = array_combine($request->capacity, $request->capacity_value);
				
							foreach($c as $key => $val)
							{
							
							   $capacity = new UserVenueCapacity;					
								$capacity->capacity_id=$key;
								$capacity->capacity_value=$val;					
								$capacity->venue_id=$vid;							
								$capacity->save();	
							
							}
					/*				$capacity=implode(',',$request->capacity);
									foreach(explode(',',$capacity) as $val)
										{
										
										   $capacity = new UserVenueCapacity;					
											$capacity->capacity_id=$val;
											$capacity->venue_id=$vid;							
											$capacity->save();	
										
										}*/
										
					}	
				
				
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
					$affected = DB::table('user_venue_restrictions')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
							{
								$restrictions=implode(',',$request->restrictions);
								foreach(explode(',',$restrictions) as $val)
								{	
									$restrictions = new UserVenueRestrictions;								
									$restrictions->restrictions_id=$val;
									$restrictions->venue_id=$vid;							
									$restrictions->save();				
								}
							}
return redirect('merchant/edit-venue')->with('message','Venue updated successfully');

	}
	public function remove(Request $request)
		{	
		
		$id=$request->id;
		$val=explode(',',$request->id);
		$vid=$val[0];
		$img=$val[1];
		$field=$val[2];
		
		DB::table('venue')
		->where('v_id', $vid)
		->update(['image_'.$field => null,]);
		$status['deletedid']=$field;
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
		public function deleted(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('venue')
			 ->where('v_id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Venue deleted successfully';
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
	
    public function getProtected()
    {
      
        return view('panels.merchant.protected');

    }

}