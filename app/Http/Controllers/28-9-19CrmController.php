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
use App\Models\Events;
use App\Models\Outcome;
use App\Models\Hlmasterregional;
use App\Models\Hlcorporatecontact;
use App\Models\Hotelcorporatecontactbasic;
use App\Models\Hotelregional;
use App\Models\Hlagentcontact;
use App\Models\Hotelagentcontactbasic;
use App\Models\Hotelagentregional;
use App\Models\Hlmasterlead;
use App\Models\Hlconsortiacontacts;
use App\Models\Hlconsortiaofficeaddress;
use App\Models\Contactdesignation;
use App\Models\Hloutplant;
use App\Models\Hotelsubsidy;
use App\Models\Hotelbusinessagenttype;


use Calendar;
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
			->where('hotel_leads_contacts.hl_c_created_by',$user_id)
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
	
	 public function events()
	{
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$tasks = Events::all()->where('hle_status','<>', 3);
		$tasks = DB::table('hotel_leads_events')
			->select('*', 'users.first_name as assignee')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.id', '=', $user_id)
			->get();
		
		$today_tasks = DB::table('hotel_leads_events')
			->select('*', 'users.first_name as assignee')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.id', '=', $user_id)
			->where('hotel_leads_events.hle_start_date', 'like', date('Y-m-d').'%')
			->get();
			
		$task_types = DB::table('hl_master_tasks')->get();	
		$task_types1 = DB::table('hl_master_tasks')->get();	
		$task_for = DB::table('hl_master_services')->get();	
		$users = DB::table('users')->get();	
		$activity = DB::table('hl_master_activity')->get();
		$applicable_to = DB::table('hl_master_applicable_to')->get();	
		$applicable_to1 = DB::table('hl_master_applicable_to')->get();
	$cnt_regional =  DB::table('hl_master_regional')->get();
		$i = 0;
		foreach($cnt_regional as $cnt_regional)
		{
			$sleads[$i]['region'] = $cnt_regional->hl_regional_name;
			$sleads[$i]['dataval'] = DB::table('hotel_leads')
				->select('*')
				->leftJoin('countries', 'countries.id', '=', 'hotel_leads.hl_country')
				->leftJoin('hl_master_regional', 'countries.region_id', '=', 'hl_master_regional.hl_ms_r_id')
				->where('hl_master_regional.hl_ms_r_id', $cnt_regional->hl_ms_r_id)
				->get();
			$i++;
		
		}		
		
			
		return view('panels.crm.events', ['tasks'=>$tasks, 'task_types'=>$task_types, 'task_types1'=>$task_types1, 'task_for'=>$task_for, 'users'=>$users, 'today_tasks'=>$today_tasks, 'activity'=>$activity, 'applicable_to'=>$applicable_to, 'applicable_to1'=>$applicable_to1, 'sleads'=>$sleads]);
	}
	
	 public function postregionalajax(Request $request)
	{
		//$tasks = Events::all()->where('hle_status','<>', 3);
		$regional_users = DB::table('users')
			->select('*')
			//->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			//->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.region', '=', $request->value)
			->get();
		
		return response()->json($regional_users);
	}
	
	public function postusersajax(Request $request)
	{
		//$tasks = Events::all()->where('hle_status','<>', 3);
		$tasks = DB::table('hotel_leads_events')
			->select('*')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.id', '=', $request->value)
			->get();
		
		return response()->json($tasks);
	}
	public function postaddregion_ajax(Request $request)
	{
		
		$user_id = $request->useridval;
		$add_region_name = $request->add_region_name;
		
		$Hlmasterreg = new Hlmasterregional;
		$Hlmasterreg->hl_regional_name = $request->add_region_name;
		$Hlmasterreg->hl_regional_status = 1;
		$Hlmasterreg->save();
		$Hlmasterreg_id = $Hlmasterreg->id;	
		//return response()->json($Hlmasterreg_id);
		return redirect('crm/settings')->with('message','Regional added successfully');
		
	}
	
	public function postupdateregion_ajax(Request $request)
	{
		
		$hl_ms_r_id = $request->hl_ms_r_id;
		$region_name = $request->region_name;
	
		DB::table('hl_master_regional')
				->where('hl_ms_r_id', $hl_ms_r_id)
				->update([			
				'hl_regional_name' =>$region_name,
								
				]);
		return redirect('crm/settings')->with('message','Region updated successfully');
		
	}
	
	public function postdeleteregion_ajax(Request $request)
	{
		
		$hl_ms_r_id = $request->hl_ms_r_id;
		$region_name = $request->region_name;
	
		DB::table('hl_master_regional')
				->where('hl_ms_r_id', $hl_ms_r_id)
				->update([			
				'hl_regional_status' =>'2',
								
				]);
		return redirect('crm/settings')->with('message','Region deleted successfully');
		
	}

	public function postaddlead_ajax(Request $request)
	{
		
		$user_id = $request->useridval;
		$add_lead_name = $request->add_lead_name;
		
		$Hlmasterlead = new Hlmasterlead;
		$Hlmasterlead->hl_lead_type_name = $request->add_lead_name;
		$Hlmasterlead->hl_leadd_type_status = 1;
		$Hlmasterlead->save();
		$Hlmasterlead_id = $Hlmasterlead->id;	
		//return response()->json($Hlmasterreg_id);
		return redirect('crm/settings')->with('message','Lead Type added successfully');
		
	}
	
	public function postupdatelead_ajax(Request $request)
	{
		
		$hl_mt_lt_id = $request->hl_mt_lt_id;
		$lead_name = $request->lead_name;
	
		DB::table('hl_master_lead_type')
				->where('hl_mt_lt_id', $hl_mt_lt_id)
				->update([			
				'hl_lead_type_name' =>$lead_name,
								
				]);
		return redirect('crm/settings')->with('message','Lead Type updated successfully');
		
	}
	
	public function postdeletelead_ajax(Request $request)
	{
		
		$hl_mt_lt_id = $request->hl_mt_lt_id;
		$lead_name = $request->lead_name;
	
		DB::table('hl_master_lead_type')
				->where('hl_mt_lt_id', $hl_mt_lt_id)
				->update([			
				'hl_leadd_type_status' =>'2',
								
				]);
		return redirect('crm/settings')->with('message','Lead Type deleted successfully');
		
	}

	public function postviewsajax(Request $request)
	{
		
		//echo $request->value;
		//print_r( explode(',', $request->value));
		//exit;
		//$tasks = Events::all()->where('hle_status','<>', 3);
		$user_id = $request->useridval;
		$tasks = DB::table('hotel_leads_events')
			->select('*')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.id', '=', $user_id)
			->whereIn('hotel_leads_events.hle_task_type', explode(',', $request->value))->get();
		
		return response()->json($tasks);
	}
	
	public function create()
	{
		$task_types = DB::table('hl_master_tasks')->get();	
		$task_for = DB::table('hl_master_services')->get();	
		$applicable_to = DB::table('hl_master_applicable_to')->get();	
		$applicable_to1 = DB::table('hl_master_applicable_to')->get();	
		$activity = DB::table('hl_master_activity')->get();	
		$regional = DB::table('hl_master_regional')->get();	
		$leads = DB::table('hotel_leads')
				->select('*')
				->leftJoin('countries', 'countries.id', '=', 'hotel_leads.hl_country')
				->leftJoin('hl_master_regional', 'countries.region_id', '=', 'hl_master_regional.hl_ms_r_id')
				->get();
		$cnt_regional =  DB::table('hl_master_regional')->get();
		$i = 0;
		foreach($cnt_regional as $cnt_regional)
		{
			$sleads[$i]['region'] = $cnt_regional->hl_regional_name;
			$sleads[$i]['dataval'] = DB::table('hotel_leads')
				->select('*')
				->leftJoin('countries', 'countries.id', '=', 'hotel_leads.hl_country')
				->leftJoin('hl_master_regional', 'countries.region_id', '=', 'hl_master_regional.hl_ms_r_id')
				->where('hl_master_regional.hl_ms_r_id', $cnt_regional->hl_ms_r_id)
				->get();
			$i++;
		
		} 
		return view('panels.crm.createevents', ['task_types'=>$task_types, 'task_for'=>$task_for, 'applicable_to'=>$applicable_to, 'applicable_to1'=>$applicable_to1, 'leads'=>$leads, 'activity'=>$activity, 'regional'=>$regional, 'cnt_regional'=>$cnt_regional, 'sleads'=>$sleads]);
	}

	public function settings()
	{
		$master_tasks = DB::table('hl_master_tasks')->where('task_status', '1')->get();	
		$users = DB::table('users')->where('activated', '1')->get();	
		$region = DB::table('hl_master_regional')->where('hl_master_regional.hl_regional_status', '1')->get();	
		$region1 = DB::table('hl_master_regional')->where('hl_master_regional.hl_regional_status', '1')->get();	
		$sa_regional =  DB::table('hl_master_regional')
			->select('*')
			->leftJoin('users', 'users.region', '=', 'hl_master_regional.hl_ms_r_id')
			->where('activated', '1')
			->where('hl_master_regional.hl_ms_r_id', '1')
			->get();
			
		$na_regional = DB::table('hl_master_regional')->select('*')
			->leftJoin('users', 'users.region', '=', 'hl_master_regional.hl_ms_r_id')
			->where('activated', '1')
			->where('hl_master_regional.hl_ms_r_id', '2')
			->get();
		
		$eur_regional = DB::table('hl_master_regional')->select('*')
			->leftJoin('users', 'users.region', '=', 'hl_master_regional.hl_ms_r_id')
			->where('activated', '1')
			->where('hl_master_regional.hl_ms_r_id', '3')
			->get();
		$mea_regional = DB::table('hl_master_regional')->select('*')
			->leftJoin('users', 'users.region', '=', 'hl_master_regional.hl_ms_r_id')
			->where('activated', '1')
			->where('hl_master_regional.hl_ms_r_id', '4')
			->get();
			
		$apac_regional = DB::table('hl_master_regional')->select('*')
			->leftJoin('users', 'users.region', '=', 'hl_master_regional.hl_ms_r_id')
			->where('activated', '1')
			->where('hl_master_regional.hl_ms_r_id', '5')
			->get();
		$task_for = DB::table('hl_master_services')->get();	
		$app_to = DB::table('hl_master_applicable_to')->get();	
		
				
		$master_regional = DB::table('hl_master_regional')->where('hl_regional_status', '1')->get();	
		$master_leadtypes = DB::table('hl_master_lead_type')->where('hl_leadd_type_status', '1')->get();	
		return view('panels.crm.settings', ['users'=>$users, 'master_tasks'=>$master_tasks, 'master_regional'=>$master_regional, 'sa_regional'=>$sa_regional, 'na_regional'=>$na_regional, 'eur_regional'=>$eur_regional , 'mea_regional'=>$mea_regional, 'apac_regional'=>$apac_regional, 'region'=>$region, 'master_leadtypes'=>$master_leadtypes, 'region1'=>$region1, 'task_for'=>$task_for, 'app_to'=>$app_to]);
	}

	public function store(Request $request)
	{
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$Events = new Events;
		$Events->hle_title=$request->hle_title;
		$Events->hle_task_type=$request->hle_task_type;
		$Events->hle_description=$request->hle_description;
		//$Events->hd_hotels=$request->searchbar;
		$Events->hle_location=$request->glocation;
		$Events->hle_task_for=implode(',', $request->task_for);
		//print_r($request->activity);exit;
		$Events->hle_activity=implode(',', $request->activity);
		
		$applicable_to_val = DB::table('hl_master_applicable_to')->get();	
		foreach($applicable_to_val as $applicable_to_val)
		{
			$dd = "applicable_".str_replace(' ', '_', $applicable_to_val->hl_ap_name);
			$column_dd = "hle_applicable_".str_replace(' ', '_', $applicable_to_val->hl_ap_name);
			if($request->$dd[0] != '')
				$Events->$column_dd = implode(',', $request->$dd);
			else
				$Events->$column_dd = '';
		}
		
		$Events->hl_agent_id=$request->searchbar_agents;
		$Events->hle_guest_id=$request->hle_guests;
		
		$Events->hle_start_date = date("Y-m-d",strtotime($request->hle_start_date)).' '.$request->hle_start_hour.':'.$request->hle_start_min.':00';
		
		$Events->hle_end_date = date("Y-m-d",strtotime($request->hle_end_date)).' '.$request->hle_end_hour.':'.$request->hle_end_min.':00';
		$Events->hle_status=$request->hle_status;
		$Events->hle_assigned_to=$request->hle_assigned_to;
		$start  = strpos($request->searchbar, '[');
		$end    = strpos($request->searchbar, ']', $start + 1);
		$length = $end - $start;
		$exactval = substr($request->searchbar, $start + 1, $length - 1);
		$Events->hl_lead=$request->searchbar;
		$Events->hl_id = $exactval;
		$Events->hle_recurr_status=$request->hle_recurr_status;
		$Events->hle_recurr_duration=$request->hle_recurr_duration;
		$Events->hle_timezone=$request->hle_timezone;
		$Events->hle_allday_status=$request->hle_allday_status;
		//$Events->hle_location=$request->hle_location;
		$Events->hle_assigned_to = $user_id;
		
		$Events->uid= $user_id;
		
		$Events->save();
		
		$Outcome = new Outcome;
		$Outcome->hle_id = $Events->id;
		$hl_outcome_cnt = count($request->hle_outcome);
		
		$applicable_to_val1 = DB::table('hl_master_applicable_to')->get();	
		
		for($rr = 0; $rr < $hl_outcome_cnt; $rr++)
		{
			foreach($applicable_to_val1 as $applicable_to_val1)
			{
				$dd = "outcome_".str_replace(' ', '_', $applicable_to_val1->hl_ap_name);
				$column_dd = "applicable_".str_replace(' ', '_', $applicable_to_val1->hl_ap_name);
				
				
				if($request->$dd[0] != '')
					$Outcome->$column_dd = implode(',', $request->$dd);
				else
					$Outcome->$column_dd = '';
				
			}
			$Outcome->hl_outcome = $request->hle_outcome[$rr];
			$Outcome->hl_nextstep = $request->hle_next_step[$rr];
			$Outcome->created_by = $user_id;
			$Outcome->save();
		}
		
		return redirect('crm/events');
	}
	
	
	
	
	public function eventsupdate(Request $request)
	{
		DB::table('hotel_leads_events')
				->where('hle_id', $request->hle_id)
				->update([							
				'hle_title' =>$request->hle_title,
				'hle_description' =>$request->hle_description,
				'hle_start_date' =>date("Y-m-d",strtotime($request->hle_start_date)).' '.$request->hle_start_hour.':'.$request->hle_start_min.':00',
				'hle_end_date' =>date("Y-m-d",strtotime($request->hle_end_date)).' '.$request->hle_end_hour.':'.$request->hle_end_min.':00',
				'hle_recurr_status' =>$request->hle_recurr_status,
				'hle_recurr_cnt' =>$request->hle_recurr_cnt,
				'hle_task_type' =>$request->hle_task_type,
				'hle_category' =>$request->hle_category,
				'hle_assigned_to' =>$request->hle_assigned_to,
				'hle_timezone' =>$request->hle_timezone,
				'hle_allday_status' =>$request->hle_allday_status,
				'hle_location' =>$request->hle_location,
				'hle_outcome' =>$request->hle_outcome,
				'hle_next_step' =>$request->hle_next_step,
				'hl_lead' =>$request->searchbar ,
								
				]);
				return redirect('crm/events');
	}
	
	public function completevent($hle_id=null)
	{
		DB::table('hotel_leads_events')
				->where('hle_id', $hle_id)
				->update([			
				'hle_status' =>'2',
								
				]);
				return redirect('crm/events');
	}
	
	public function deletevent($hle_id=null)
	{
		DB::table('hotel_leads_events')
				->where('hle_id', $hle_id)
				->update([			
				'hle_status' =>'3',
								
				]);
				return redirect('crm/events');
	}
	
	public function ajaxcomplete(Request $request)
    {
          $search = $request->get('search');
		  $type = $request->get('type');
		  
		 // if($type == 'Hotel Development')
			$result = Hotelleads::where('hl_name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 
	
	public function citiesajaxcomplete(Request $request)
    {
          $city = $request->cities;
		  
		 // if($type == 'Hotel Development')
			$result = Cities::where('name', 'LIKE', '%'. $city. '%')->take(10)->get();
 
          return response()->json($result);
            
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
    
	
	 
	   $country= DB::table('countries')->get();
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

	public function getsubsidyAddress(Request $request)
		{
			 $id=$request->id;  
			 $Hlcorporatecontact = Hotelagentregional::where('hl_agent_basic_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($Hlcorporatecontact) . '}';
	}
	
	public function gethdleads(Request $request)
		{
			$hdleads = DB::table('hotel_leads')
			 ->select('hl_id', 'hl_name')	 
			 ->get();   
		 return '{"view_details": ' . json_encode($hdleads) . '}';
	}
	
		
	 public function addcorporate()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$venue= Venue::all();
		$country= DB::table('countries')->get();
		
		$master_lead_type =  DB::table('hl_master_lead_type')->get();
		$master_business =  DB::table('hl_master_business')->get();
		$travel_desk =  DB::table('hl_master_travel_desk_type')->get();
		$cities =  DB::table('cities')->get();
		//head_office
		
		//$Hotellccontact = Hotelcorporatecontactbasic :: get();				
		//		$Hotellccontact->created_by=auth()->user()->id;	

		//		VenueCapacity::all()

		$Hotellccontact = DB::table('hl_corporate_contact_basic')->select('*','states.name as states','cities.name as cities','countries.name as country')
		->leftJoin('hl_subsidy', 'hl_subsidy.h_main_id', '=', 'hl_corporate_contact_basic.hl_ccb_id')
		->leftJoin('countries', 'countries.id', '=', 'hl_corporate_contact_basic.hl_country')
		->leftJoin('states', 'states.id', '=', 'hl_corporate_contact_basic.hl_state')
		->leftJoin('cities', 'cities.id', '=', 'hl_corporate_contact_basic.hl_city')
		->where('created_by',$user_id)		
		->first();
		//dd($Hotellccontact);

		$Hotelagentcontactbasic=DB::table('hl_agents_contacts_basic')->select('*','states.name as states','cities.name as cities','countries.name as country')
		->leftJoin('countries', 'countries.id', '=', 'hl_agents_contacts_basic.hl_country')
		->leftJoin('states', 'states.id', '=', 'hl_agents_contacts_basic.hl_state')
		->leftJoin('cities', 'cities.id', '=', 'hl_agents_contacts_basic.hl_city')
		->where('created_by',$user_id)
		->get();
		
	//	dd($Hotellccontact);


	    
	
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
	
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
			 
		$hdcorporatecont = DB::table('hl_corporate_contact_basic')
			  ->get(); 
		
		$hdcontact_type = DB::table('hl_master_contact_type')
				->get(); 

		$regionalLocations = DB::table('hl_regional_locations')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->where('created_by',$user_id)
				->get(); 
				
				$regionalLocationsDirectAdd = DB::table('hl_regional_locations')
				->select('*')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->where('sel_add_type','Direct Address')
				->get();

				
				$Implant = DB::table('hl_regional_locations')
				->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')

				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_regional_locations.hl_subsid_of')

				->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_agent_m_id', '=', 'hl_agents_contacts_basic.hl_agentcont_id')

				->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')

				->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_consortia_contacts.hl_cont_design')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Implant")
				->where('hl_consortia_office_address.created_by',$user_id)				
				->get();



				$Outplant = DB::table('hl_regional_locations')
				->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
				->leftJoin('hl_outplant', 'hl_outplant.hl_regl_m_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_regl_id', '=', 'hl_outplant.hl_agent_cor_id')
				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_agent_basic_id')
				->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Outplant")
				->where('hl_regional_locations.created_by',$user_id)				
				->get();

			   // dd($Outplant);
				
				// hl_regional_locations   (hl_regional_locations.sel_add_type="Consortia"  hl_regional_locations.ofz_type="Implant"   hl_regional_locations.hl_subsid_of==hl_agents_contacts_basic.hl_agentcont_id)
				// hl_agents_contacts_basic-----hl_business_name

				// hl_agents_contacts_basic.hl_agentcont_id=hl_consortia_office_address.hl_agent_m_id

				// hl_consortia_office_address.hl_con_off_add_id=hl_consortia_contacts.hl_cons_m_id




				// $regionalLocationsSubsidy = DB::table('hl_consortia_office_address')
				// ->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
				// ->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')
				// ->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				// ->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				// ->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')
				// ->where('hl_consortia_office_address.created_by',$user_id)				
			 //    ->get();

			   // dd($regionalLocationsSubsidy);

			 //    $Outplant = DB::table('hl_regional_locations')							
				// ->where('ofz_type','Outplant')
				// ->where('created_by',$user_id)				
			 //    ->get();

// 				$OutplantData = array();
// 			    $OutplantData[0]['regional_location']='';
// //DB::enableQueryLog();
			   
// 			    foreach ($Outplant as $value) { 
// 				$variable = explode(',', $value->hl_subsidy_ofz_location);

// if(count($variable)>0)
// {
//  					for ($i=0; $i <count($variable) ; $i++) {			

// 							//$OutplantData['add'][$i]=$value;
// 					$OutplantData[$i]['regional_location'] = DB::table('hl_agent_regional_locations')
// 					->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
// 					->leftJoin('hl_agents_contacts','hl_agents_contacts.hl_agentcont_id', '=','hl_agent_regional_locations.hl_regl_id')
// 					->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
// 					->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
// 					->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
// 					->where('hl_agent_regional_locations.hl_regl_id',$variable[$i])
// 					->where('hl_agent_regional_locations.created_by',$user_id)				
// 					->get();
// 					//dd(DB::getQueryLog());
// 							# code...
// 						}
// 			}
// 			    	# code...
// 			    }

			   // $OutplantData[0]['regional_location'];

				// $regionalLocationsSubsidy = DB::table('hl_regional_locations')
				// ->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
				// ->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_agent_m_id', '=', 'hl_regional_locations.hl_subsid_of')
				// ->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')
				// ->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				// ->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				// ->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')				
				// ->where('hl_regional_locations.ofz_type','Implant')
				// ->where('hl_regional_locations.created_by',$user_id)				
			 //    ->get();
			  //  dd($regionalLocationsSubsidy);

			    $CorporateContact = DB::table('hl_regional_locations')
				->select('*','hl_regional_locations.hl_email as remail','hl_corporate_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
				->leftJoin('hl_corporate_contacts', 'hl_corporate_contacts.hl_reg_loc_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_corporate_contacts.hl_cont_design')
				->where('hl_regional_locations.created_by',$user_id)
				->where('hl_regional_locations.sel_add_type','Direct Address')				
			    ->get();


			    $Contactdesignation=Contactdesignation::get();

			    //dd($regionalLocationsSubsidy);
				
				// $regionalLocationsSubsidy = DB::table('hl_regional_locations')
				// ->select('*')
				// ->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				// ->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
				// ->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
				// ->where('sel_add_type','Consortia')
				// ->where('ofz_type','Implant')
			 //  ->get();

			$hl_corporate_contact_basic=DB::table('hl_corporate_contact_basic')->get();
			$hl_agents_contacts_basic=DB::table('hl_agents_contacts_basic')->get();
		 // dd($master_lead_type);
			 
      return view('panels.crm.add_corporate',compact('master_lead_type','hl_corporate_contact_basic','hl_agents_contacts_basic','country','editstates','editcities','Contactdesignation','Outplant','Hotellccontact'),['CorporateContact'=>$CorporateContact,'Hotelagentcontactbasic'=>$Hotelagentcontactbasic,'Implant'=>$Implant,'regionalLocationsDirectAdd'=>$regionalLocationsDirectAdd,'regionalLocations'=>$regionalLocations,'users' => $users,'editusers' => $users,'editstates' => $editstates,'editcities' => $editcities,'master_business' => $master_business,'cities' => $cities,'travel_desk' => $travel_desk,'hdcorporatecont' => $hdcorporatecont,'hdcontact_type' => $hdcontact_type]);

    }

	public function addagent()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//$venue= Venue::all();
		$country= DB::table('countries')->get();
		
		$master_lead_type =  DB::table('hl_master_lead_type')->get();
		$master_business =  DB::table('hl_master_business')->get();
		$travel_desk =  DB::table('hl_master_travel_desk_type')->get();
		$cities =  DB::table('cities')->get();
	    
	    $Hotelagentcontactbasic=Hotelagentcontactbasic::where('created_by',$user_id)->get();
	    $Contactdesignation=Contactdesignation::get();
	//dd($Hotelagentcontactbasic);
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
		$regionalLocations = DB::table('hl_agent_regional_locations')
					->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
					->where('created_by',$user_id)
					->get();

		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();

		$hl_corporate_contact_basic=DB::table('hl_corporate_contact_basic')->get();
		$hl_agents_contacts_basic=DB::table('hl_agents_contacts_basic')->get();

      return view('panels.crm.add_agent',compact('Contactdesignation','hl_corporate_contact_basic','hl_agents_contacts_basic'),['regionalLocations'=>$regionalLocations,'Hotelagentcontactbasic'=>$Hotelagentcontactbasic,'master_lead_type'=>$master_lead_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'master_business' => $master_business,'cities' => $cities,'travel_desk' => $travel_desk]);

    }
	
	public function viewcorporate()
    {
    	$user_id = (auth()->check()) ? auth()->user()->id : null;
	

			$hotels = DB::table('hotel_leads')
			->get(); 
		
	    $country= Country::all()->where('status',1);
	  
	   
		
		/*$contacts = DB::table('hotel_leads_contacts')
			->select('*', 'hotel_leads_contacts.hl_id as hid')
			->leftJoin('hotel_leads', 'hotel_leads_contacts.hl_id', '=', 'hotel_leads.hl_id')
			->where('hotel_leads_contacts.hl_c_main_contact', '=', 1)
			->get();
		*/	

		
		$cor_view = array();
		$contacts_list = DB::table('hl_corporate_contacts')
					->where('created_by',$user_id)->get();
		//dd($contacts_list);
		$contacts_list_cnt = count($contacts_list);
		if($contacts_list_cnt > 0)
		{
			$yy = 0;
			foreach($contacts_list as $contacts_list)
			{
				$cor_basic_id_arr = explode(',', $contacts_list->hl_cor_basic_id);
				$cor_basic_id_arr_cnt = count($cor_basic_id_arr);
				    $cor_view[0]['business_name']='';
					$cor_view[0]['hl_ccb_id']='';
					$cor_view[0]['region']='';
					$cor_view[0]['country']='';
					$cor_view[0]['city']='';
					$cor_view[0]['cont_name']='';
					$cor_view[0]['cont_design']='';
					$cor_view[0]['cont_no']='';
					$cor_view[0]['cont_email']='';
					$cor_view[0]['username']='';
					if($cor_basic_id_arr_cnt>0)
					{
				for($ii=0; $ii< $cor_basic_id_arr_cnt; $ii++)
				{
					$cor_view[$yy]['cnt'] = $contacts_list_cnt;
				
					$basic_id_val = DB::table('hl_corporate_contact_basic')->where('hl_ccb_id', '=', $cor_basic_id_arr[$ii])->get();
					
					$cor_view[$yy]['business_name'] = $basic_id_val[0]->hl_business_name;
					$cor_view[$yy]['hl_ccb_id'] = $cor_basic_id_arr[$ii];
					
					$region_id_val = DB::table('countries')
					->select('*')
					->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
					->where('id', '=', $basic_id_val[0]->hl_country)
					->first();
					
					$city_id_val = DB::table('cities')
					->select('*')
					->where('id', '=', $basic_id_val[0]->hl_city)
					->first();
					
					if($region_id_val!=null){
					$cor_view[$yy]['region'] = $region_id_val->hl_regional_name;
					$cor_view[$yy]['country'] = $region_id_val->name;
				}
				if($city_id_val!=null){
					$cor_view[$yy]['city'] = $city_id_val->name;
				}
					$cor_view[$yy]['cont_name'] = $contacts_list->hl_first_name;
					$cor_view[$yy]['cont_design'] = $contacts_list->hl_cont_design;
					$cor_view[$yy]['cont_no'] = $contacts_list->hl_mob_no;
					$cor_view[$yy]['cont_email'] = $contacts_list->hl_email;
					$users = DB::table('users')		
							->where('id', '=', $contacts_list->created_by)
							->first();
					$cor_view[$yy]['username'] = $users->first_name;
					
				}
				}
				$yy++;
			}
		}
		else
		{
			$cor_view[0]['cnt'] = 0;
		}
		
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.crm.edit_corporate',['hotels'=>$hotels,'cor_view'=>$cor_view,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
 

    }
	
	public function viewagent()
    {
    	$user_id = (auth()->check()) ? auth()->user()->id : null;

	

		$hotels = DB::table('hotel_leads')
			 ->get(); 
		$master_business =  DB::table('hl_master_business')->get();
		//dd($master_business );
	    $country= Country::all()->where('status',1);
	  
	   
		
		$cor_view = array();
		$contacts_list = DB::table('hl_agents_contacts')
					->where('created_by',$user_id)
					->get();
		//dd($contacts_list);
		$contacts_list_cnt = count($contacts_list);

		if($contacts_list_cnt > 0)
		{
			$yy = 0;
			foreach($contacts_list as $contacts_list)
			{
				$cor_basic_id_arr = explode(',', $contacts_list->hl_agentcont_id);
				$cor_basic_id_arr_cnt = count($cor_basic_id_arr);

				if($cor_basic_id_arr_cnt>0){
					$cor_view[0]['business_name']='';
					$cor_view[0]['hl_agentcont_id']='';
					$cor_view[0]['region']='';
					$cor_view[0]['country']='';
					$cor_view[0]['city']='';
					$cor_view[0]['cont_name']='';
					$cor_view[0]['cont_design']='';
					$cor_view[0]['cont_no']='';
					$cor_view[0]['cont_email']='';
					$cor_view[0]['username']='';
				for($ii=0; $ii< $cor_basic_id_arr_cnt; $ii++)
				{
					$cor_view[$yy]['cnt'] = $contacts_list_cnt;
				
					$basic_id_val = DB::table('hl_agents_contacts_basic')->where('hl_agentcont_id', '=', $cor_basic_id_arr[$ii])->get();
					if(count($basic_id_val)>0){
					$cor_view[$yy]['business_name'] = $basic_id_val[0]->hl_business_name;
					$cor_view[$yy]['hl_agentcont_id'] = $cor_basic_id_arr[$ii];
					
					$region_id_val = DB::table('countries')
					->select('*')
					->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
					->where('id', '=', $basic_id_val[0]->hl_country)
					->get();
					
					$city_id_val = DB::table('cities')
					->select('*')
					->where('id', '=', $basic_id_val[0]->hl_city)
					->get();
					
					$cor_view[$yy]['region'] = $region_id_val[0]->hl_regional_name;
					$cor_view[$yy]['country'] = $region_id_val[0]->name;
					$cor_view[$yy]['city'] = $city_id_val[0]->name;
					$cor_view[$yy]['cont_name'] = $contacts_list->hl_first_name;
					$cor_view[$yy]['cont_design'] = $contacts_list->hl_cont_design;
					$cor_view[$yy]['cont_no'] = $contacts_list->hl_mob_no;
					$cor_view[$yy]['cont_email'] = $contacts_list->hl_email;
					$users = DB::table('users')		
							->where('id', '=', $contacts_list->created_by)
							->first();
					$cor_view[$yy]['username'] = $users->first_name;
					}
					
				}
				}

				$yy++;

			}
		}
		else
		{
			$cor_view[0]['cnt'] = 0;
		}
		
		
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
			 $master_lead_type =  DB::table('hl_master_lead_type')->get();
			 $Hotelagentcontactbasic=DB::table('hl_agents_contacts_basic')->select('*','states.name as states','cities.name as cities','countries.name as country')
		->leftJoin('countries', 'countries.id', '=', 'hl_agents_contacts_basic.hl_country')
		->leftJoin('states', 'states.id', '=', 'hl_agents_contacts_basic.hl_state')
		->leftJoin('cities', 'cities.id', '=', 'hl_agents_contacts_basic.hl_city')
		->where('created_by',$user_id)
		->get();
		//dd($master_lead_type);
		$regionalLocations = DB::table('hl_regional_locations')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->where('created_by',$user_id)
				->get();
		 $Contactdesignation=Contactdesignation::get();

		return view('panels.crm.edit_agent',compact('Contactdesignation','master_business','master_lead_type','Hotelagentcontactbasic','regionalLocations'),['hotels'=>$hotels,'cor_view'=>$cor_view,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
 

    }
	public function addHotel()
    {
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		

		
		$country= DB::table('countries')->get();
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
		$hdproperty_type = DB::table('hl_master_property_type')
			  ->get(); 
		$hdlead_type = DB::table('hl_master_lead_type')
			  ->get();

		$Contactdesignation=Contactdesignation::get();

		//$applicable_to = DB::table('hl_master_applicable_to')->get();
		//dd($applicable_to);
      return view('panels.crm.add_hotel',compact('applicable_to','Contactdesignation'),['Category'=>$Category, 'hdproperty_type'=>$hdproperty_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'hdlead_type' => $hdlead_type]);

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
	
	 
	   $country= DB::table('countries')->get();
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
			'lead_type'			=> 'required',
			'property_type'			=> 'required'
               
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
			'property_type.required'			=> 'Property Type is required',					
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
				$Hotell->hl_property_type=$request->property_type;				
				$Hotell->notes = $request->hotel_description;				
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
						$hlcontacts->hl_c_notes = $request->contact_hotel_description[$i];
							
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
	
	// Corporateadded Added
	public function corporateadded(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
		  'business_name'			=> 'required',
			'business_type'			=> 'required',			
			'address1'			=> 'required',
			'landline'			=> 'required',
			'h_country'			=> 'required',
			'states'			=> 'required',
			'cities'			=> 'required',
			'postcode'			=> 'required',
			'website'			=> 'required',
			'lead_type'			=> 'required'
               
            ],
            [
			'business_name.required'			=> 'Business name is required',
			'business_type.required'			=> 'Business Type is required',			
			'address1.required'			=> 'Address is required',
			'landline.required'			=> 'Landline number is required',
			'h_country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'cities.required'			=> 'Cities is required',		
			'postcode.required'			=> 'Postcode is required',		
			'website.required'			=> 'Website is required',
			'lead_type.required'			=> 'Lead Type is required',					
                     ]);
					 
							 

					 
				$Hotellccontact = new Hotelcorporatecontactbasic;				
				$Hotellccontact->created_by=auth()->user()->id;				
				$Hotellccontact->hl_business_name=$request->business_name;
				$Hotellccontact->hl_business_type=$request->business_type;					
				$Hotellccontact->hl_head_office_address=$request->address1;
				$Hotellccontact->hl_country=$request->h_country;
				$Hotellccontact->hl_state=$request->states;
				$Hotellccontact->hl_city=$request->cities;
				$Hotellccontact->hl_pincode=$request->postcode;
				$Hotellccontact->hl_website=$request->website;
				$Hotellccontact->hl_lead_type=$request->lead_type;
				$Hotellccontact->hl_subsidiary_of=$request->subs_of;
				$Hotellccontact->hl_travel_desk_type=$request->h_desk_type;
				$Hotellccontact->save();				
			  	$hlccid = $Hotellccontact->id;

			  	$subsidyId=count($request->subsidy_m_off);
					//dd($subsidyId);
					if($subsidyId>0)
					{

					
					for ($i=0; $i < $subsidyId ; $i++) { 

						$val=explode('_', $request->subsidy_m_off[$i]);

						//if($request->subsidy_m_off[$i])
						//dd($request->subsidy_m_off[$i]);
							$Hotelsubsidy = new Hotelsubsidy;
							$Hotelsubsidy->h_main_id=$hlccid;
							$Hotelsubsidy->h_subsidy_id=$val[0];
							$Hotelsubsidy->h_m_type=1;
							$Hotelsubsidy->type=$val[1];
							$Hotelsubsidy->save();
					}
					}
			  	


				
								
				/*$contact_person=$request->contact_person;
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
			    
			*/
				
			return back()->with('message','success');
				
	}
	
	public function corregional_added(Request $request)
	{
		
		/*
		  $this->validate($request,
			 [			 
		
			'sel_add_type'			=> 'required',
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
			
			'sel_add_type.required'			=> 'Hostel Type is required',
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
                     ]); */
					 
							 
				$userid = auth()->user()->id;

				$hl_corporate_contact_basic_first = DB::table('hl_corporate_contact_basic')	
							 ->where('created_by', $userid)	 
							 ->orderBy('hl_ccb_id', 'desc')
							 ->take(1)->get();
							
							$hl_ccb_id = $hl_corporate_contact_basic_first[0]->hl_ccb_id;


				if($request->sel_add_type=='Direct Address')
				{			
				$Hotellccontact_r = new Hotelregional;				
				$Hotellccontact_r->created_by=auth()->user()->id;
				$Hotellccontact_r->sel_add_type=$request->sel_add_type;
				$Hotellccontact_r->hl_ofz_address=$request->off_address1;					
				$Hotellccontact_r->hl_country=$request->country1;					
				$Hotellccontact_r->hl_state=$request->states1;
				$Hotellccontact_r->hl_city=$request->cities1;
				$Hotellccontact_r->hl_postcode=$request->postcode1;
				$Hotellccontact_r->hl_ofz_no=$request->contact_number1;
				$Hotellccontact_r->hl_loc_type=$request->location_type1;
				$Hotellccontact_r->hl_email=$request->email1;
				$Hotellccontact_r->hl_lead_type=$request->lead_type1;
				$Hotellccontact_r->hl_subsid_of='';
				$Hotellccontact_r->hl_subsidy_ofz_location='';				
				$Hotellccontact_r->ofz_type='';					
				$Hotellccontact_r->hl_cor_basic_id = $hl_ccb_id;				
				$Hotellccontact_r->save();				
				$hlccid = $Hotellccontact_r->id;


				$Hotellccontact_c = new Hlcorporatecontact;				
				$Hotellccontact_c->created_by=$userid;	
				$cnt = count($request->first_name);
				for($gg = 0; $gg < $cnt; $gg++)
				{				
					$Hotellccontact_c->hl_title=$request->title[$gg];
					$Hotellccontact_c->hl_first_name=$request->first_name[$gg];					
					$Hotellccontact_c->hl_last_name=$request->last_name[$gg];
					$Hotellccontact_c->hl_cont_design=$request->contact_designation[$gg];
					$Hotellccontact_c->hl_type_of_cont=$request->contact_type[$gg];
					$Hotellccontact_c->hl_mob_no=$request->mobile_no[$gg];
					$Hotellccontact_c->hl_email=$request->email[$gg];
					$Hotellccontact_c->hl_linked_in=$request->linkedin_contact[$gg];
					$Hotellccontact_c->hl_skype=$request->skype_contact[$gg];
					$Hotellccontact_c->hl_dob=date('Y-m-d',strtotime($request->dob[$gg]));
					$Hotellccontact_c->hl_event_invite=$request->invite[$gg];
					$Hotellccontact_c->hl_cor_basic_id=$hl_ccb_id;
					$Hotellccontact_c->hl_reg_loc_id=$hlccid;
					
					$Hotellccontact_c->save();				
					$hlccid = $Hotellccontact_c->id;	
				}	
			
			}else{

				if($request->ofz_type == 'Implant'){

					$Hotellccontact_r = new Hotelregional;				
					$Hotellccontact_r->created_by=auth()->user()->id;
					$Hotellccontact_r->sel_add_type=$request->sel_add_type;
					$Hotellccontact_r->hl_lead_type=$request->ic_lead_type1;
					$Hotellccontact_r->hl_subsid_of=$request->subsidy1;
					$Hotellccontact_r->hl_subsidy_ofz_location='';					
					$Hotellccontact_r->ofz_type=$request->ofz_type;
					$Hotellccontact_r->hl_cor_basic_id = $hl_ccb_id;
					$Hotellccontact_r->save();				
					//$hlccid = $Hotellccontact_r->hl_regl_id;

					$Hlconsortiaofficeaddress = new Hlconsortiaofficeaddress;				
					$Hlconsortiaofficeaddress->created_by=auth()->user()->id;
					$Hlconsortiaofficeaddress->hl_agent_m_id=$request->subsidy1;
					$Hlconsortiaofficeaddress->hl_ofz_address=$request->ic_off_address1;					
					$Hlconsortiaofficeaddress->hl_country=$request->ic_country1;					
					$Hlconsortiaofficeaddress->hl_state=$request->ic_states1;
					$Hlconsortiaofficeaddress->hl_city=$request->ic_cities1;
					$Hlconsortiaofficeaddress->hl_postcode=$request->ic_postcode1;
					$Hlconsortiaofficeaddress->hl_ofz_no=$request->ic_contact_number1;
					$Hlconsortiaofficeaddress->hl_loc_type=$request->ic_location_type1;
					$Hlconsortiaofficeaddress->hl_email=$request->ic_email1;					
					$Hlconsortiaofficeaddress->save();				
					$hlccid = $Hlconsortiaofficeaddress->id;	

					$Hlconsortiacontacts = new Hlconsortiacontacts;				
					$Hlconsortiacontacts->created_by=auth()->user()->id;
					$Hlconsortiacontacts->hl_cons_m_id=$hlccid;					
					$Hlconsortiacontacts->hl_title=$request->ic_title;					
					$Hlconsortiacontacts->hl_first_name=$request->ic_first_name;					
					$Hlconsortiacontacts->hl_last_name=$request->ic_last_name;
					$Hlconsortiacontacts->hl_cont_design=$request->ic_contact_designation;
					$Hlconsortiacontacts->hl_mob_no=$request->ic_mobile_no;
					$Hlconsortiacontacts->hl_clandline_no=$request->ic_clandline_no;
					$Hlconsortiacontacts->hl_email=$request->ic_cemail;
					$Hlconsortiacontacts->hl_linked_in=$request->ic_linked_in;
					$Hlconsortiacontacts->hl_skype=$request->ic_skype;
					$Hlconsortiacontacts->hl_dob=$request->ic_dob;					
					$Hlconsortiacontacts->save();				
					

				}else{

					$Hotellccontact_r = new Hotelregional;				
					$Hotellccontact_r->created_by=auth()->user()->id;
					$Hotellccontact_r->sel_add_type=$request->sel_add_type;	
					$Hotellccontact_r->hl_subsid_of=$request->subsidy2;									
					$Hotellccontact_r->ofz_type=$request->ofz_type;
					$Hotellccontact_r->hl_cor_basic_id = $hl_ccb_id;
					$Hotellccontact_r->save();
					$id=$Hotellccontact_r->id;

					$subsidy=implode(',',$request->subsidy_ofz2);
					$da=count($request->subsidy_ofz2);

					for($i=0;$i<$da; $i++)
					{
					$Hloutplant = new Hloutplant;				
					$Hloutplant->hl_regl_m_id=$id;
					$Hloutplant->hl_agent_cor_id=$request->subsidy_ofz2[$i];				
					$Hloutplant->save();			
						
					}

					//$Hotellccontact_r->hl_subsidy_ofz_location=implode(',',$request->subsidy_ofz2);	

				}

			}
							
				
								
				
				
			return back()->with('message','success');
				
	}
	
	public function corcontact_added(Request $request)
	{
		
		/*
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
					 
			*/						 
			$userid=auth()->user()->id;
			$hl_corporate_contact_basic_first = DB::table('hl_corporate_contact_basic')	
			->where('created_by', $userid)	 
			->first();
		 $hid=$hl_corporate_contact_basic_first->hl_ccb_id;	
				$Hotellccontact_c = new Hlcorporatecontact;				
				$Hotellccontact_c->created_by=$userid;	
				$cnt = count($request->first_name);
				for($gg = 0; $gg < $cnt; $gg++)
				{				
					$Hotellccontact_c->hl_title=$request->title[$gg];
					$Hotellccontact_c->hl_first_name=$request->first_name[$gg];					
					$Hotellccontact_c->hl_last_name=$request->last_name[$gg];
					$Hotellccontact_c->hl_cont_design=$request->contact_designation[$gg];
					$Hotellccontact_c->hl_type_of_cont=$request->contact_type[$gg];
					$Hotellccontact_c->hl_mob_no=$request->mobile_no[$gg];
					$Hotellccontact_c->hl_email=$request->email[$gg];
					$Hotellccontact_c->hl_linked_in=$request->linkedin_contact[$gg];
					$Hotellccontact_c->hl_skype=$request->skype_contact[$gg];
					$Hotellccontact_c->hl_dob=date('Y-m-d',strtotime($request->dob[$gg]));
					$Hotellccontact_c->hl_event_invite=$request->invite[$gg];
					$Hotellccontact_c->hl_cor_basic_id=$hid;
					$Hotellccontact_c->hl_reg_loc_id=$request->head_off2[$gg];
					
					$Hotellccontact_c->save();				
					$hlccid = $Hotellccontact_c->id;	
				}				
				
								
				/*$contact_person=$request->contact_person;
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
			    
			*/
				
			return back()->with('message','success');
				
	}
	
	// agentadded Added
	public function agentadded(Request $request)
	{
		
		/*
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
					 
			*/						 
										  
					 
				$Hotellccontact = new Hotelagentcontactbasic;				
				$Hotellccontact->created_by=auth()->user()->id;				
				$Hotellccontact->hl_business_name=$request->business_name;
				$Hotellccontact->hl_agent_type='';					
				$Hotellccontact->hl_ofz_address=$request->address1;
				$Hotellccontact->hl_country=$request->h_country;
				$Hotellccontact->hl_state=$request->states;
				$Hotellccontact->hl_city=$request->cities;
				$Hotellccontact->hl_pincode=$request->postcode;
				$Hotellccontact->hl_website=$request->website;
				$Hotellccontact->hl_lead_type=$request->lead_type;
				//$Hotellccontact->hl_subsidiary_of=$request->subs_of;
				//$Hotellccontact->hl_travel_desk_type=$request->h_desk_type;
				$Hotellccontact->save();				
			    $hlccid = $Hotellccontact->id;	


			    $businesstypeCnt=count($request->business_type);
					//dd($subsidyId);
					if($businesstypeCnt>0)
					{

					
					for ($i=0; $i < $businesstypeCnt ; $i++) {						
							$Hotelbusinessagenttype = new Hotelbusinessagenttype;
							$Hotelbusinessagenttype->h_main_id=$hlccid;
							$Hotelbusinessagenttype->h_agent_type_id=$request->business_type[$i];							
							$Hotelbusinessagenttype->save();
					}
					}			
				
								
				/*$contact_person=$request->contact_person;
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
			    
			*/
				
			return back()->with('message','success');
				
	}
	
	public function ageregional_added(Request $request)
	{
		
		/*
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
					 
			*/						 
				$userid = auth()->user()->id;			
				$Hotellccontact_r = new Hotelagentregional;				
				$Hotellccontact_r->created_by=auth()->user()->id;				
				$cnt = count($request->off_address1);
				for($gg = 0; $gg < $cnt; $gg++)
				{
					$Hotellccontact_r->hl_ofz_address=$request->off_address1[$gg];
					$Hotellccontact_r->iata_number=$request->iata_number[$gg];										
					$Hotellccontact_r->hl_country=$request->country1[$gg];					
					$Hotellccontact_r->hl_state=$request->states1[$gg];
					$Hotellccontact_r->hl_city=$request->cities1[$gg];
					$Hotellccontact_r->hl_postcode=$request->postcode1[$gg];
					$Hotellccontact_r->hl_ofz_no=$request->contact_number1[$gg];
					$Hotellccontact_r->hl_loc_type=$request->location_type[$gg];
					$Hotellccontact_r->hl_email=$request->email1[$gg];
					$Hotellccontact_r->hl_lead_type=$request->lead_type1[$gg];
					$Hotellccontact_r->hl_subsid_of='';					    
					if($request->ofz_type[$gg] == 'Implant')
					{
						$Hotellccontact_r->hl_subsid_of=$request->subsidy1[$gg];
					}else if($request->ofz_type[$gg] == 'Outplant')
					{
						$Hotellccontact_r->hl_subsid_of=$request->subsidy2[$gg];
						$Hotellccontact_r->hl_subsidy_ofz_location=$request->subsidy_ofz2[$gg];
					}
					else
					{
						$Hotellccontact_r->hl_subsid_of='';
						$Hotellccontact_r->hl_subsidy_ofz_location='';	
					}
					$Hotellccontact_r->hl_travel_desk_type=$request->ofz_type[$gg];
					//$Hotellccontact_r->hl_agent_basic_id =$request->head_off1[$gg];
					if($request->head_off1[$gg] == '')
					{
						 $hl_corporate_contact_basic_first = DB::table('hl_agents_contacts_basic')	
						 ->where('created_by', $userid)	 
						 ->orderBy('hl_agentcont_id', 'desc')
						 ->take(1)->get();
						
						$Hotellccontact_r->hl_agent_basic_id = $hl_corporate_contact_basic_first[0]->hl_agentcont_id;
					}
					$Hotellccontact_r->save();				
					$hlccid = $Hotellccontact_r->id;

					$subsidyId=count($request->subsidy_m_off);
					//dd($subsidyId);
					if($subsidyId>0)
					{

					
					for ($i=0; $i < $subsidyId ; $i++) { 

						$val=explode('_', $request->subsidy_m_off[$i]);
							$Hotelsubsidy = new Hotelsubsidy;
							$Hotelsubsidy->h_main_id=$hlccid;
							$Hotelsubsidy->h_subsidy_id=$val[0];
							$Hotelsubsidy->h_m_type=2;
							$Hotelsubsidy->type=$val[1];
							$Hotelsubsidy->save();
					}
					}
			  		
				}
							
				
								
				
				
			return back()->with('message','success');
				
	}
	
	public function agecontact_added(Request $request)
	{
		
		
		 //  $this->validate($request,
			//  [			 
		
			// 'head_off2[]'			=> 'required',
			// 'title'			=> 'required',
			// 'address1'			=> 'required',
			// 'country'			=> 'required',
			// 'states'			=> 'required',
			// 'cities'			=> 'required',
			// 'postcode'			=> 'required',
			// 'website'			=> 'required',
			// 'contact_no'			=> 'required',
			// 'no_of_room'			=> 'required',
			// 'no_of_m_room'			=> 'required',
			// 'star_rate'			=> 'required',
			// 'lead_type'			=> 'required'
               
   //          ],
   //          [
			
			// 'head_off2[].required'			=> 'Office is required',
			// 'title.required'			=> 'Title is required',
			// 'address1.required'			=> 'Address is required',
			// 'country.required'			=> 'Country is required',
			// 'states.required'			=> 'State is required',
			// 'cities.required'			=> 'Cities is required',		
			// 'postcode.required'			=> 'Postcode is required',		
			// 'website.required'			=> 'Website is required',		
			// 'contact_no.required'			=> 'Contact No is required',		
			// 'no_of_room.required'			=> 'No of room is required',		
			// 'no_of_m_room.required'			=> 'No of meeting room is required',		
			// 'star_rate.required'			=> 'Star Rate is required',		
			// 'lead_type.required'			=> 'Lead Type is required',					
   //                   ]);
					 
								 
									
				$Hotellccontact_c = new Hlagentcontact;				
				$Hotellccontact_c->created_by=auth()->user()->id;	
				$cnt = count($request->first_name);
				for($gg = 0; $gg < $cnt; $gg++)
				{				
					$Hotellccontact_c->hl_title=$request->title[$gg];
					$Hotellccontact_c->hl_first_name=$request->first_name[$gg];					
					$Hotellccontact_c->hl_last_name=$request->last_name[$gg];
					$Hotellccontact_c->hl_cont_design=$request->contact_designation[$gg];
					$Hotellccontact_c->hl_type_of_cont=$request->contact_type[$gg];
					$Hotellccontact_c->hl_mob_no=$request->mobile_no[$gg];
					$Hotellccontact_c->hl_email=$request->email[$gg];
					$Hotellccontact_c->hl_linked_in=$request->linkedin_contact[$gg];
					$Hotellccontact_c->hl_skype=$request->skype_contact[$gg];
					$Hotellccontact_c->hl_dob=date('Y-m-d',strtotime($request->dob[$gg]));
					$Hotellccontact_c->hl_event_invite=$request->invite[$gg];
					$Hotellccontact_c->hl_agentcont_id=$request->head_off2[$gg];
					$Hotellccontact_c->save();				
					$hlccid = $Hotellccontact_c->id;	
				}				
				
								
				/*$contact_person=$request->contact_person;
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
			    
			*/
				
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


						public function updateConsordiaImplant(Request $request)
		{
			// $id=$request->id;	
				$Hlconsortiaofficeaddress = Hlconsortiaofficeaddress::where('hl_con_off_add_id', $request->hl_con_off_add_id)
				->update([				
					'hl_agent_m_id'=>$request->hl_agent_m_id,
					'hl_ofz_address'=>$request->hl_ofz_address,					
					'hl_country'=>$request->hl_country,					
					'hl_state'=>$request->hl_state,
					'hl_city'=>$request->hl_city,
					'hl_postcode'=>$request->hl_postcode,
					'hl_ofz_no'=>$request->hl_ofz_no,
					'hl_loc_type'=>$request->hl_loc_type,
					'hl_email'=>$request->hl_email,					
					]);	

					$Hlconsortiacontacts = Hlconsortiacontacts::where('hl_cons_m_id', $request->hl_cons_m_id)
					->update([
					'hl_title'=>$request->hl_title,					
					'hl_first_name'=>$request->hl_first_name,					
					'hl_last_name'=>$request->hl_last_name,
					'hl_cont_design'=>$request->hl_cont_design,
					'hl_mob_no'=>$request->hl_mob_no,
					'hl_clandline_no'=>$request->hl_clandline_no,
					'hl_email'=>$request->hl_email,
					'hl_linked_in'=>$request->hl_linked_in,
					'hl_skype'=>$request->hl_skype,
					'hl_dob'=>date('Y-m-d', strtotime($request->hl_dob)),					
					]);	

				
		   		$status['id']=$request->idvalue;
			 	$status['status']='Updated successfully';
		 return '{"view_details": ' . json_encode($status) . '}';

		}


    public function getProtected()
    {
      
        return view('panels.crm.protected');

    }

}