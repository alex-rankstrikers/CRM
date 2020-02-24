<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
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
use App\Models\EventRegister;
use App\Models\Event;
use App\Models\Outcome;
use App\Models\Hlmasteroutcomes;
use App\Models\Hlmasternextstep;
use App\Models\Guests;
use App\Models\Hlmasterregional;
use App\Models\Hlmasteractivityfor;
use App\Models\Hlmastertask;
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
use App\Models\Hlmasterbusiness;
use App\Models\Role;
use App\Models\UserAccessModules;
use App\Traits\ActivationTrait;
use Excel;
use Calendar;
use Image;
use Session;
use PDF;
use Mail;
use Validator;
class CrmController extends Controller
{
public function index()
    {

    	
        $task_type = DB::table('hl_master_tasks')->get();
        $regions = DB::table('hl_master_regional')->get();

        $users = DB::table('users')->pluck('id')->toArray();
        $events = DB::table('hotel_leads_events')->pluck('uid')->toArray();
        $user_id = array_intersect($users, $events);
        $users = DB::table('users')->whereIn('id', $user_id)->get();

        return view('panels.crm.dashboard',compact('task_type','users','regions'));
    }
public function getDashboard()
    {
    	$user_id = (auth()->check()) ? auth()->user()->id : null;
		$hotels = DB::table('hotel_leads')
			 ->get(); 
		
	    $country= Country::all()->where('status',1);
	  
	   
			$contacts_list[0]['cnt']='';
			$contacts_list[0]['cnt'] = '' ;
			$contacts_list[0]['hl_id'] = '';
			$contacts_list[0]['hl_name'] = '' ;
			$contacts_list[0]['hl_grp_name'] = '' ;
			$contacts_list[0]['hl_address'] = '' ;
			
			$contacts_list[0]['hl_city'] = '';
			$contacts_list[0]['hl_country'] = '';
			$contacts_list[0]['hl_c_firstname'] = '';
			$contacts_list[0]['hl_c_no'] = '' ;
			$contacts_list[0]['hl_c_email'] = '' ;
			$contacts_list[0]['hl_c_status'] = '' ;
			$contacts_list[0]['user_name'] = '';

			$notes_list[0]['hl_n_notes'] = '';
			$notes_list[0]['updated_at'] = '';
			$notes_list[0]['hl_n_added_by'] = '';
			$notes_list[0]['hl_c_status'] = '';
			
			$notes_list[0]['hl_n_added_by_name'] = '';
			$contacts_list[0]['notes'] = ''; 
			

		$contacts = DB::table('hotel_leads_contacts')
			->select('*', 'hotel_leads_contacts.hl_id as hid')
			->leftJoin('hotel_leads', 'hotel_leads_contacts.hl_id', '=', 'hotel_leads.hl_id')
			->where('hotel_leads_contacts.hl_c_main_contact', '=', 1)
			//->where('hotel_leads_contacts.hl_c_created_by',$user_id)
			->get();
			
		//dd($contacts);
			
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
				->select('name')->where('id',$contacts[$i]->hl_city)->first();
				if($city){
				$contacts_list[$i]['hl_city'] = $city->name;
				}else{
					$contacts_list[$i]['hl_city'] ='';
				}
				$country= DB::table('countries')
				->select('name')->where('id',$contacts[$i]->hl_country)->first();
				if($country){
				$contacts_list[$i]['hl_country'] = $country->name;
				}else{
					$contacts_list[$i]['hl_country'] ='';
				}
				

				
				//$country = ($contacts[$i]->hl_country=='230'?'United Kingdom':'');
				//$contacts_list[$i]['hl_country'] = $country;
				$contacts_list[$i]['hl_c_firstname'] = $contacts[$i]->hl_c_firstname ;
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
	

//outlook controller

    private static $client;
    private static function generateRandomResourceId(){
        return md5(uniqid(mt_rand(), true));
    }

    public function testCreateCalendar($name = null){
        if(empty($name)) $name = self::generateRandomResourceId();
        $res = self::$client->createCalendar(new CalendarVO($name));
        $id = $res->getId();
        $this->assertTrue(!empty($id));
        echo printf("new calendar id %s", $id).PHP_EOL;
        return $id;
    }


    public function testAddNewEvent(){
        $id  = $this->testCreateCalendar();

        $res = self::$client->createEvent($id, new EventVO(
            "test event",
            "test event body",
            new DateTime('2019-11-15 09:00:00'),
            new DateTime('2019-11-15 10:30:00'),
            new DateTimeZone('Australia/Sydney'),
            new LocationVO(
                "Boston Marriott Copley Place",
                new AddressVO(
                    "110 Huntington Av",
                    "Boston",
                    "MA",
                    "USA",
                    "02116"
                ),
                "42.3471832",
                "-71.0778024"
            )
        ));

        $this->assertTrue($res instanceof \OutlookRestClient\Facade\Responses\EventResponse);
        $this->assertTrue(!empty($res->getId()));

        return $res->getId();
    }







public function mail()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $messageQueryParams = array (
    // Only return Subject, ReceivedDateTime, and From fields
    "\$select" => "subject,receivedDateTime,from",
    // Sort by ReceivedDateTime, newest first
    "\$orderby" => "receivedDateTime DESC",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getMessagesUrl = '/me/mailfolders/inbox/messages?'.http_build_query($messageQueryParams);
  $messages = $graph->createRequest('GET', $getMessagesUrl)
                    ->setReturnType(Model\Message::class)
                    ->execute();

  return view('panels.crm.mail', array(
    'username' => $user->getDisplayName(),
    'messages' => $messages
  ));
}

public function calendar()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $eventsQueryParams = array (
    // // Only return Subject, Start, and End fields
    "\$select" => "*",
    // Sort by Start, oldest first
    "\$orderby" => "Start/DateTime",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getEventsUrl = '/me/events?'.http_build_query($eventsQueryParams);
  $events = $graph->createRequest('GET', $getEventsUrl)
                  ->setReturnType(Model\Event::class)
                  ->execute();
// print_r($events);


foreach($events as $event) {

  $st_date= $event->getStart()->getDateTime();
  $crt_st_date=substr(str_replace('T', ' ', $st_date),0,19);
  $end_date= $event->getEnd()->getDateTime();
  $crt_end_date=substr(str_replace('T', ' ', $end_date),0,19);
  $title=$event->getSubject();
  $basic_id_val = DB::table('hotel_leads_events')->where(['hle_start_date' => $crt_st_date, 'hle_end_date' => $crt_end_date, 'hle_title' => $title])->get();
if(count($basic_id_val)==0){

  //dd($event->getLocation()->getDisplayName());
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        $Events1 = new Events;
        $Events1->hle_title=$title;
        $Events1->hle_description=$event->getBodyPreview();
        $Events1->hle_location=$event->getLocation()->getDisplayName();
    
        $Events1->hle_start_date = $crt_st_date;
        $Events1->hle_end_date = $crt_end_date;
        $Events1->hle_status=1;

    // $Events1->hle_recurr_status=$request->hle_recurr_status;
    // $Events1->hle_recurr_duration=$request->hle_recurr_duration;
       $Events1->hle_timezone=$event->getOriginalStartTimeZone();
    // $Events1->hle_allday_status=$request->hle_allday_status;
     $Events1->hle_assigned_to = $user_id;
    
     $Events1->uid= $user_id;
    
     $Events1->save();

}
}
    // $insertedId = $Events1->id;

    // $tot=count($request->searchbar_agents);
    // //dd($tot);

    // for ($i=0; $i < $tot; $i++) 
    // { 
    // $Guests=new Guests;
    // $Guests->uid= $user_id;   
    // $Guests->hle_id= $insertedId;
    // $Guests->searchbar_agents= $request->searchbar_agents[$i];
    // $Guests->hle_guests= $request->hle_guests[$i];
    // $Guests->hle_status= 1;
    // $Guests->save();
    // }

// print_r($events);
  return view('panels.crm.events', array(
    'username' => $user->getDisplayName(),
    'events' => $events
  ));
}

public function contacts()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $contactsQueryParams = array (
    // // Only return givenName, surname, and emailAddresses fields
    "\$select" => "givenName,surname,emailAddresses",
    // Sort by given name
    "\$orderby" => "givenName ASC",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getContactsUrl = '/me/contacts?'.http_build_query($contactsQueryParams);
  $contacts = $graph->createRequest('GET', $getContactsUrl)
                    ->setReturnType(Model\Contact::class)
                    ->execute();

  return view('panels.crm.contacts', array(
    'username' => $user->getDisplayName(),
    'contacts' => $contacts
  ));
}

//outlook controller
	 public function events()
	{

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Initialize the OAuth client
  $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => env('OAUTH_APP_ID'),
    'clientSecret'            => env('OAUTH_APP_PASSWORD'),
    'redirectUri'             => env('OAUTH_REDIRECT_URI'),
    'urlAuthorize'            => env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
    'urlAccessToken'          => env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
    'urlResourceOwnerDetails' => '',
    'scopes'                  => env('OAUTH_SCOPES')
  ]);

  // Generate the auth URL
  $authorizationUrl = $oauthClient->getAuthorizationUrl();

  // Save client state so we can validate in response
  $_SESSION['oauth_state'] = $oauthClient->getState();

  // Redirect to authorization endpoint
  // header('Location: '.$authorizationUrl);
  // exit();

  
  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  $eventsQueryParams = array (
    // // Only return Subject, Start, and End fields
    "\$select" => "*",
    // Sort by Start, oldest first
    "\$orderby" => "Start/DateTime",
    // Return at most 10 results
    "\$top" => "10"
  );

  $getEventsUrl = '/me/events?'.http_build_query($eventsQueryParams);
  $events = $graph->createRequest('GET', $getEventsUrl)
                  ->setReturnType(Model\Event::class)
                  ->execute();
 //print_r($events);


foreach($events as $event) {
  $outlook_id= $event->getId();
  $st_date= $event->getStart()->getDateTime();
  $crt_st_date=substr(str_replace('T', ' ', $st_date),0,19);
  $end_date= $event->getEnd()->getDateTime();
  $crt_end_date=substr(str_replace('T', ' ', $end_date),0,19);
  $title=$event->getSubject();
//    dd($event->getId());
  // DB::enableQueryLog();
  $basic_id_val = DB::table('hotel_leads_events')->where(['hle_start_date' => $crt_st_date, 'hle_end_date' => $crt_end_date, 'hle_title' => $title])->get();

// dd($basic_id_valhleidd);
if(count($basic_id_val)==0){

 // dd($event->getId());
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        $Events1 = new Events;
        $Events1->hle_title=$title;
        $Events1->outlook_id=$outlook_id;
        $Events1->hle_description=$event->getBodyPreview();
        $Events1->hle_location=$event->getLocation()->getDisplayName();
    
        $Events1->hle_start_date = $crt_st_date;
        $Events1->hle_end_date = $crt_end_date;
        $Events1->hle_status=1;

    // $Events1->hle_recurr_status=$request->hle_recurr_status;
    // $Events1->hle_recurr_duration=$request->hle_recurr_duration;
       $Events1->hle_timezone=$event->getOriginalStartTimeZone();
    // $Events1->hle_allday_status=$request->hle_allday_status;
     $Events1->hle_assigned_to = $user_id;
    
     $Events1->uid= $user_id;
    
     $Events1->save();

}else{
        $upr= DB::table('hotel_leads_events')
        ->where(['hle_start_date' => $crt_st_date, 'hle_end_date' => $crt_end_date, 'hle_title' => $title])
        ->update([      
        'outlook_id' =>$outlook_id                
        ]);
}


}

		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$tasks = Events::where('uid',$user_id)->where('hle_status', '<>', 3)->get();
    //$tasks = Guests::where('uid',$user_id)->groupBy('hle_id')->get();
//dd($tasks);
		// $tasks = DB::table('hotel_leads_events')
		// 	//->select('*', 'users.first_name as assignee')
		// 	->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
		// 	->leftJoin('hle_guests_invite', 'hle_guests_invite.hle_id', '=', 'hotel_leads_events.hle_id')
		// 	->where('hotel_leads_events.hle_status', '<>', 3)
		// 	->where('users.id', '=', $user_id)
  //     ->groupBy('hotel_leads_events.hle_id')
		// 	->get();
		// DB::enableQueryLog();	
		
    //  $tasks1 = DB::table('hle_guests_invite')->where('hle_id',16)->pluck('searchbar_agents','hle_guests');
     // dd($tasks1);
    $tasks1 = DB::table('hle_guests_invite')
			->select('*')
			->leftJoin('hotel_leads_events', 'hotel_leads_events.hle_id', '=', 'hle_guests_invite.hle_id')
		//	->leftJoin('hle_guests_invite', 'hle_guests_invite.hle_id', '=', 'hotel_leads_events.hle_id')
			->where('hotel_leads_events.hle_status', '<>', 3)
			//->where('users.id', '=', $user_id)
			->get();
	//dd(DB::getQueryLog());
		$today_tasks = DB::table('hotel_leads_events')
			->select('*', 'users.first_name as assignee')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->leftJoin('hl_master_tasks', 'hl_master_tasks.hl_mt_id', '=', 'hotel_leads_events.hle_task_type')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.id', '=', $user_id)
			->where('hotel_leads_events.hle_start_date', 'like', date('Y-m-d').'%')
			->get();
		$hl_business_name = DB::table('hl_agents_contacts_basic')
       ->get(); 
        $hl_corporate_name = DB::table('hl_corporate_contact_basic')
       ->get(); 
    $outcomes = DB::table('hl_master_outcomes')->where('hl_status', '1')->get();  
    $nextstep = DB::table('hl_master_nextstep')->where('hl_status', '1')->get();
		$task_types = DB::table('hl_master_tasks')->where('task_status', '1')->get();	
		$task_types1 = DB::table('hl_master_tasks')->where('task_status', '1')->get();	
		$task_for = DB::table('hl_master_services')->get();	
		//$users = DB::table('users')->get();	
	    $users = DB::table('users')
		->select('*', 'users.id as uid')
		->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
		->where('role_user.role_id', '=', 4)
		->get();
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
		
			
		return view('panels.crm.events', ['tasks'=>$tasks,'tasks1'=>$tasks1,'hl_business_name'=>$hl_business_name,'hl_corporate_name'=>$hl_corporate_name, 'task_types'=>$task_types, 'task_types1'=>$task_types1, 'task_for'=>$task_for, 'users'=>$users, 'today_tasks'=>$today_tasks, 'activity'=>$activity, 'applicable_to'=>$applicable_to, 'applicable_to1'=>$applicable_to1, 'sleads'=>$sleads,'nextstep'=>$nextstep, 'outcomes'=>$outcomes]);
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
		//dd($request->value);
		//DB::enableQueryLog();
		$tasks = DB::table('hotel_leads_events')
			->select('*')
			//->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->whereIn('hotel_leads_events.uid', $request->value)
			->get();
		//dd(DB::getQueryLog());
		return response()->json($tasks);
	}

	public function postaddoutcome_ajax(Request $request)
	{
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//dd($user_id);
		$Hlmasteroc = new Hlmasteroutcomes;
		$Hlmasteroc->hl_out_title = $request->hl_out_title;
		$Hlmasteroc->hl_out_description = $request->hl_out_description;
		$Hlmasteroc->hl_user_id = $user_id;
		$Hlmasteroc->hl_status = 1;
		$Hlmasteroc->save();
		$Hlmasteroc_id = $Hlmasteroc->id;	
		return response()->json($Hlmasteroc_id);
		//return redirect('crm/settings')->with('message','Regional added successfully');
		
	}
	
	public function postupdateoutcome_ajax(Request $request)
	{
		
		$hl_out_id = $request->hl_out_id;
		$hl_out_title = $request->hl_out_title;
		$hl_out_description = $request->hl_out_description;
	
	$upr=	DB::table('hl_master_outcomes')
				->where('hl_out_id', $hl_out_id)
				->update([			
				'hl_out_title' =>$hl_out_title,'hl_out_description' =>$hl_out_description,
								
				]);
		return response()->json($upr);

		//return redirect('crm/settings')->with('message','Region updated successfully');
		
	}
	
	public function postdeleteoutcome_ajax(Request $request)
	{
		
		$hl_out_id = $request->hl_out_id;
	
		$del=DB::table('hl_master_outcomes')
				->where('hl_out_id', $hl_out_id)
				->update([			
				'hl_status' =>'2',
								
				]);
		return response()->json($del);
		//return redirect('crm/settings')->with('message','Region deleted successfully');
		
	}

	public function postaddnextstep_ajax(Request $request)
	{
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		//dd($user_id);
		$Hlmasterns = new Hlmasternextstep;
		$Hlmasterns->hl_ns_title = $request->hl_ns_title;
		$Hlmasterns->hl_ns_description = $request->hl_ns_description;
		$Hlmasterns->hl_user_id = $user_id;
		$Hlmasterns->hl_status = 1;
		$Hlmasterns->save();
		$Hlmasterns_id = $Hlmasterns->id;	
		return response()->json($Hlmasterns_id);
		//return redirect('crm/settings')->with('message','Regional added successfully');
		
	}
	
	public function postupdatenextstep_ajax(Request $request)
	{
		
		$hl_ns_id = $request->hl_ns_id;
		$hl_ns_title = $request->hl_ns_title;
		$hl_ns_description = $request->hl_ns_description;
	
	$uprd=	DB::table('hl_master_nextstep')
				->where('hl_ns_id', $hl_ns_id)
				->update([			
				'hl_ns_title' =>$hl_ns_title,'hl_ns_description' =>$hl_ns_description,
								
				]);
		return response()->json($uprd);

		//return redirect('crm/settings')->with('message','Region updated successfully');
		
	}
	
	public function postdeletenextstep_ajax(Request $request)
	{
		
		$hl_ns_id = $request->hl_ns_id;
	
		$del=DB::table('hl_master_nextstep')
				->where('hl_ns_id', $hl_ns_id)
				->update([			
				'hl_status' =>'2',
								
				]);
		return response()->json($del);
		//return redirect('crm/settings')->with('message','Region deleted successfully');
		
	}

	public function postaddregion_ajax(Request $request)
	{
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$add_region_name = $request->add_region_name;
		//dd($user_id);
		$Hlmasterreg = new Hlmasterregional;
		$Hlmasterreg->hl_regional_name = $request->add_region_name;
		$Hlmasterreg->hl_regional_status = 1;
		$Hlmasterreg->save();
		$Hlmasterreg_id = $Hlmasterreg->id;	
		return response()->json($Hlmasterreg_id);
		//return redirect('crm/settings')->with('message','Regional added successfully');
		
	}
	
	public function postupdateregion_ajax(Request $request)
	{
		
		$hl_ms_r_id = $request->hl_ms_r_id;
		$region_name = $request->region_name;
	
	$up=	DB::table('hl_master_regional')
				->where('hl_ms_r_id', $hl_ms_r_id)
				->update([			
				'hl_regional_name' =>$region_name,
								
				]);
		return response()->json($up);

		//return redirect('crm/settings')->with('message','Region updated successfully');
		
	}
	
	public function postdeleteregion_ajax(Request $request)
	{
		
		$hl_ms_r_id = $request->hl_ms_r_id;
		$region_name = $request->region_name;
	
		$del=DB::table('hl_master_regional')
				->where('hl_ms_r_id', $hl_ms_r_id)
				->update([			
				'hl_regional_status' =>'2',
								
				]);
		return response()->json($del);
		//return redirect('crm/settings')->with('message','Region deleted successfully');
		
	}


  public function postaddactfor_ajax(Request $request)
  {
    
    $user_id = (auth()->check()) ? auth()->user()->id : null;
    $hl_activity_for_name = $request->hl_activity_for_name;
    dd($user_id);
    $Hlmasteractfor = new Hlmasteractivityfor;
    $Hlmasteractfor->hl_activity_for_name = $request->hl_activity_for_name;
    $Hlmasteractfor->hl_activity_for_status = 1;
    $Hlmasteractfor->save();
    $Hlmasteractfor_id = $Hlmasteractfor->id; 
    return response()->json($Hlmasteractfor_id);
    //return redirect('crm/settings')->with('message','Regional added successfully');
    
  }
  
  public function postupdateActfor_ajax(Request $request)
  {
    
    $hl_ms_r_id = $request->hl_ms_r_id;
    $region_name = $request->region_name;
  
  $up=  DB::table('hl_master_regional')
        ->where('hl_ms_r_id', $hl_ms_r_id)
        ->update([      
        'hl_regional_name' =>$region_name,
                
        ]);
    return response()->json($up);

    //return redirect('crm/settings')->with('message','Region updated successfully');
    
  }
  
  public function postdeleteActfor_ajax(Request $request)
  {
    
    $hl_ms_r_id = $request->hl_ms_r_id;
    $region_name = $request->region_name;
  
    $del=DB::table('hl_master_regional')
        ->where('hl_ms_r_id', $hl_ms_r_id)
        ->update([      
        'hl_regional_status' =>'2',
                
        ]);
    return response()->json($del);
    //return redirect('crm/settings')->with('message','Region deleted successfully');
    
  }
	public function getcontacts(Request $request)
	{
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$hlid=$request->hlid;
	//	dd(print_r($hlid));
		// dd($request->hlid);
		// DB::enableQueryLog();
		$contacts = DB::table('hotel_leads_contacts')
			->select('*')
			//->leftJoin('hotel_leads', 'hotel_leads.hl_id', '=', 'hotel_leads_contacts.hl_id')
			->where('hotel_leads_contacts.hl_c_created_by', '=', $user_id)
			->whereIn('hotel_leads_contacts.hl_id', $hlid)
			->get();
// dd(DB::getQueryLog());
		return '{"view_details": ' . json_encode($contacts) . '}';
	}

	public function postaddtask_ajax(Request $request)
	{
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$add_task_name = $request->add_task_name;
		//dd($user_id);
		$Hlmastertask = new Hlmastertask;
		$Hlmastertask->task_name = $request->add_task_name;
		$Hlmastertask->task_status = 1;
		$Hlmastertask->save();
		$Hlmastertask_id = $Hlmastertask->id;	
		return response()->json($Hlmastertask_id);
		//return redirect('crm/settings')->with('message','Regional added successfully');
		
	}
	
	public function postupdatetask_ajax(Request $request)
	{
		

		$hl_mt_id = $request->hl_mt_id;
		$task_name = $request->task_name;
	
	$upd=	DB::table('hl_master_tasks')
				->where('hl_mt_id', $hl_mt_id)
				->update([			
				'task_name' =>$task_name,
								
				]);
		return response()->json($upd);
		//return redirect('crm/settings')->with('message','Region updated successfully');
		
	}
	
	public function postdeletetask_ajax(Request $request)
	{
		
		$hl_mt_id = $request->hl_mt_id;
		$region_name = $request->region_name;
	
		$del=DB::table('hl_master_tasks')
				->where('hl_mt_id', $hl_mt_id)
				->update([			
				'task_status' =>'2',
								
				]);
		return response()->json($del);
		//return redirect('crm/settings')->with('message','Region deleted successfully');
		
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
		//DB::enableQueryLog(); // Enable query log

// Your Eloquent query

		//echo $request->value;
		//print_r( explode(',', $request->value));
		//exit;
		//$tasks = Events::all()->where('hle_status','<>', 3);
		$user_id = $request->useridval;
		//dd($user_id);
		$tasks = DB::table('hotel_leads_events')
			->select('*')
			->leftJoin('users', 'users.id', '=', 'hotel_leads_events.uid')
			->where('hotel_leads_events.hle_status', '<>', 3)
			->where('users.id', '=', $user_id)
			->whereIn('hotel_leads_events.hle_task_type', explode(',', $request->value))->get();
//dd(DB::getQueryLog());
		return response()->json($tasks);
	}
	
	public function create()
	{
		$access_token = Session::get('_token');
		$hl_business_name = DB::table('hl_agents_contacts_basic')
       ->get(); 
        $hl_corporate_name = DB::table('hl_corporate_contact_basic')
       ->get(); 
		$task_types = DB::table('hl_master_tasks')->where('task_status', '1')->get();	
		$outcomes = DB::table('hl_master_outcomes')->where('hl_status', '1')->get();	
		$nextstep = DB::table('hl_master_nextstep')->where('hl_status', '1')->get();	
		$task_for = DB::table('hl_master_services')->get();	
		$applicable_to = DB::table('hl_master_applicable_to')->get();	
		$applicable_to1 = DB::table('hl_master_applicable_to')->get();	
		$activity = DB::table('hl_master_activity')->get();	
    $regional = DB::table('hl_master_regional')->get(); 
    $hotels = DB::table('hotels')->get(); 
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
		return view('panels.crm.createevents', ['task_types'=>$task_types,'hotels'=>$hotels, 'task_for'=>$task_for, 'applicable_to'=>$applicable_to, 'applicable_to1'=>$applicable_to1, 'leads'=>$leads, 'activity'=>$activity, 'regional'=>$regional, 'hl_business_name'=>$hl_business_name, 'hl_corporate_name'=>$hl_corporate_name, 'cnt_regional'=>$cnt_regional, 'sleads'=>$sleads, 'nextstep'=>$nextstep, 'outcomes'=>$outcomes]);
	}

	public function getoutcomes(Request $request)
		{
				 $id=$request->id; 
				 $hle_outcome = DB::table('hl_master_outcomes')
				 ->select('hl_out_description')	
				 ->where('hl_out_id', $id)	 
				 ->first(); 
		 return '{"view_details": ' . json_encode($hle_outcome) . '}';
		}

	public function getnextstep(Request $request)
		{
				 $id=$request->id; 
				 $hle_nextstep = DB::table('hl_master_nextstep')
				 //->select('hl_ns_description')	
				 ->where('hl_ns_id', $id)	 
				 ->first(); 
		 return '{"view_details": ' . json_encode($hle_nextstep) . '}';
		}

	public function settings()
	{
		$master_tasks = DB::table('hl_master_tasks')->where('task_status', '1')->get();	
		$master_outcomes = DB::table('hl_master_outcomes')->where('hl_status', '1')->get();	
		$master_nextstep = DB::table('hl_master_nextstep')->where('hl_status', '1')->get();	
		$users = DB::table('users')->where('activated', '1')->get();	
    $region = DB::table('hl_master_regional')->where('hl_master_regional.hl_regional_status', '1')->get();  
		$activity_for = DB::table('hl_master_activity_for')->where('hl_master_activity_for.hl_activity_for_status', '1')->get();	
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
		return view('panels.crm.settings', ['users'=>$users,'master_nextstep'=>$master_nextstep, 'master_outcomes'=>$master_outcomes,'master_tasks'=>$master_tasks, 'master_regional'=>$master_regional, 'sa_regional'=>$sa_regional, 'na_regional'=>$na_regional, 'eur_regional'=>$eur_regional , 'mea_regional'=>$mea_regional, 'apac_regional'=>$apac_regional, 'region'=>$region, 'master_leadtypes'=>$master_leadtypes, 'region1'=>$region1, 'task_for'=>$task_for, 'app_to'=>$app_to, 'activity_for'=>$activity_for]);
	}

	public function store(Request $request)
	{
		
		$user_id = (auth()->check()) ? auth()->user()->id : null;
		$Events = new Events;
		$Events->hle_title=$request->hle_title;
		$Events->hle_task_type=$request->hle_task_type;
		$a=$request->hle_description;
		$b=ltrim($a,'<p>');
		$c=rtrim($b,'</p>');

		$Events->hle_description=$c;
		//$Events->hd_hotels=$request->searchbar;
		$Events->hle_location=$request->glocation;
		$Events->hle_task_for=implode(',', $request->task_for);
		//print_r($request->activity);exit;
		$Events->hle_activity=implode(',', $request->activity);
		
		// $applicable_to_val = DB::table('hl_master_applicable_to')->get();	
		// foreach($applicable_to_val as $applicable_to_val)
		// {
		// 	$dd = "applicable_".str_replace(' ', '_', $applicable_to_val->hl_ap_name);
		// 	$column_dd = "hle_applicable_".str_replace(' ', '_', $applicable_to_val->hl_ap_name);
		// 	if($request->$dd[0] != '')
		// 		$Events->$column_dd = implode(',', $request->$dd);
		// 	else
		// 		$Events->$column_dd = '';
		// }
		if($request->hotels_name!=''){
		$Events->hle_applicable_All_Hotels=implode(',', $request->hotels_name);
		}
		if($request->hotel_contacts!=''){
		$Events->hle_applicable_contacts=implode(',', $request->hotel_contacts);
		}
		//$Events->hl_agent_id=$request->searchbar_agents;
		//$Events->hle_guest_id=$request->hle_guests;
		
		$Events->hle_start_date = date("Y-m-d",strtotime($request->hle_start_date)).' '.$request->hle_start_hour.':'.$request->hle_start_min.':00';
		
		$Events->hle_end_date = date("Y-m-d",strtotime($request->hle_end_date)).' '.$request->hle_end_hour.':'.$request->hle_end_min.':00';
		$Events->hle_status=$request->hle_status;
		$Events->hle_assigned_to=$request->hle_assigned_to;
		// $start  = strpos($request->searchbar, '[');
		// $end    = strpos($request->searchbar, ']', $start + 1);
		// $length = $end - $start;
		// $exactval = substr($request->searchbar, $start + 1, $length - 1);
		// $Events->hl_lead=$request->searchbar;
		// $Events->hl_id = $exactval;
		$Events->hle_recurr_status=$request->hle_recurr_status;
		$Events->hle_recurr_duration=$request->hle_recurr_duration;
		$Events->hle_timezone=$request->hle_timezone;
		$Events->show_location=$request->show_location;
		$Events->hle_allday_status=$request->hle_allday_status;
		$Events->hle_status=1;
    $Events->hle_assigned_to = $user_id;
    //$Events->outlook_id = setId();
		
		$Events->uid= $user_id;
		
		$Events->save();

		$insertedId = $Events->id;

		$tot=count($request->searchbar_agents);
		//dd($tot);

		for ($i=0; $i < $tot; $i++) 
		{ 

		$Guests=new Guests;
		$Guests->uid= $user_id;		
		$Guests->hle_id= $insertedId;
		$Guests->searchbar_agents= $request->searchbar_agents[$i];
		$Guests->hle_guests= $request->hle_guests[$i];
		$Guests->hle_status= 1;
		$Guests->save();
		}

		
		$hl_outcome_cnt = count($request->hle_outcome);
		//dd($request->std_outcomes);
		$applicable_to_val1 = DB::table('hl_master_applicable_to')->get();	
		
		for($rr = 0; $rr < $hl_outcome_cnt; $rr++)
		{
			// foreach($applicable_to_val1 as $applicable_to_val1)
			// {
			// 	$dd = "outcome_".str_replace(' ', '_', $applicable_to_val1->hl_ap_name);
			// 	$column_dd = "applicable_".str_replace(' ', '_', $applicable_to_val1->hl_ap_name);
				
				
			// 	if($request->$dd[0] != '')
			// 		$Outcome->$column_dd = implode(',', $request->$dd);
			// 	else
			// 		$Outcome->$column_dd = '';
				
			// }
		$Outcome = new Outcome;
		$Outcome->hle_id = $Events->id;
		if($request->applicable_to!=''){$Outcome->applicable_All_Hotels=implode(',',$request->applicable_to);}
		$Outcome->std_outcomes = $request->std_outcomes[$rr];
		$Outcome->std_nextsteps = $request->std_nextsteps[$rr];
		$Outcome->hl_outcome = $request->hle_outcome[$rr];
		$Outcome->hl_nextstep = $request->hle_next_step[$rr];
		$Outcome->created_by = $user_id;
		$Outcome->save();
		}
		
		return redirect('crm/events');
	}
	
	
	
  public function eventsadded(Request $request)
  {

    $user_id = (auth()->check()) ? auth()->user()->id : null;
    $Event = new Event;
    $Event->hl_region=$request->hl_region;
    $Event->dos_name=$request->dos_name;
    $Event->uid=$user_id;
    $Event->event_name=$request->event_name;
    $Event->event_location=$request->event_location;
    $Event->event_start_date=date("Y-m-d",strtotime($request->event_start_date));
    $Event->event_end_date=date("Y-m-d",strtotime($request->event_end_date));
    $Event->activity_type=$request->activity_type;
    $Event->target_segment=implode(',', $request->target_segment);
    $Event->hotel_participate=$request->hotel_participate;
    $Event->participation_fee=$request->participation_fee;
    $Event->if_limited=$request->if_limited;
    $Event->deadline=date("Y-m-d",strtotime($request->deadline));
    $a=$request->description;
    $b=ltrim($a,'<p>');
    $c=rtrim($b,'</p>');
    $Event->description=$c;
    $Event->hl_status=1;
    $Event->save();

	$partners = DB::table('hotel_additional_contacts')
       ->get();
       //dd($partners);
       //$cntt=count($partners);
 	
 	foreach($partners as $key => $partner){
 		//dd($partner->email_add);
  		 $data = ['event_name' => $request->event_name,'event_location' => $request->event_location,'event_start_date' => $request->event_start_date,'event_end_date' =>$request->event_end_date,'email_add'=>$partner->email_add];

                 
        Mail::send('emails.registerinfo', $data, function ($message) use ($data)
        {
        	//dd($data['email_add']);
        $message->from('info@ap-lbc.com', 'ap-lbc.com');
        $message->to($data['email_add']);
        //$message->cc('linda@ap-lbc.com');
       // $message->bcc('admin@ap-lbc.com');
        $message->subject("We are arranging an event ".$data['event_name']. " on ". $data['event_start_date'] ." at ". $data['event_location'] .". If you are interested in partcipating in this event you can acknowledge your presence by registering in this hotelier.hotelinsights.tech link.For further details, you can contact us at admin@ap-lbc.com");

        });
  		}

     return redirect('crm/view-events')->with('message','Event Created Successfully');;
  }
  
  public function viewevents()
    {
      $user_id = (auth()->check()) ? auth()->user()->id : null;

  

    $hotels = DB::table('hotel_leads')
       ->get(); 
    
    //dd($master_business );
      $country= Country::all()->where('status',1);
      $hlevents = Event::where('uid',$user_id)->get();
// dd($hlevents);
        // $hlevents = DB::table('hl_events')
        //           ->leftJoin('hl_master_regional','hl_master_regional.hl_ms_r_id','=','hl_events.hl_events_id')
        //           ->leftJoin('hl_master_tasks','hl_master_tasks.hl_mt_id','=','hl_events.activity_type')
        //           ->get();
                  //dd($hlevents);

        // $reg_hotel= DB::table('hl_event_register')
        // ->leftJoin('hl_events','hl_events.hl_events_id','=','hl_event_register.hl_events_id')
        // //->where('hl_events_id', 1)
        // ->get(); 

    $regionalLocations = DB::table('hl_regional_locations')
        ->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
        ->where('created_by',$user_id)
        ->get();
     
    return view('panels.crm.view_events',compact('hlevents'),['hotels'=>$hotels,'country' => $country]);
 

    }


  //     public function registered_hotel(Request $request)
  //   {
  //     //DB::enableQueryLog();
  //     dd($request->id);
  //       $reg_hotel= DB::table('hl_event_register')
  //       ->where('hl_reg_id', $request->id)
  //       ->get(); 
    
  //      return view('panels.crm.view_events',['reg_hotel'=>$reg_hotel]);

  // } 

    public function importevents(Request $request){



        if($request->hasFile('events_file')){

            $path = $request->file('events_file')->getRealPath();

            $data = Excel::load($path)->get();


            $uid=(auth()->check()) ? auth()->user()->id : null;
// $hl_id=$request->mhotel_id;


            if($data->count()){
                foreach ($data as $key => $value) {
                    $region= DB::table('hl_master_regional')
                    ->where('hl_regional_name', $value->hl_region)
                    ->first(); 
                    //dd($region[0]->hl_ms_r_id);
                    $user= DB::table('users')
                    ->where(['first_name'=>$value->dos_first_name,'last_name'=>$value->dos_last_name])
                    ->first();
                    if($user){
                    $dos_name=$user->id;
                    }else{
                      $dos_name=" ";
                    }
                  //  dd($user->id);
                    $activity= DB::table('hl_master_tasks')
                    ->where('task_name', $value->activity_type)
                    ->first();
                    if($activity){
                    $activity_type=$activity->hl_mt_id;
                    }else{
                      $activity_type=" ";
                    } 
                    $fee= DB::table('currency_list')
                    ->where('name', $value->participation_fee)
                    ->first();
                    if($fee){
                    $participation_fee=$fee->id;
                    }else{
                    $participation_fee=" ";
                    }       
                    if($value->hotel_participate == 'APLBC ONLY'){
                      $hotel_participate=1;
                    }else if($value->hotel_participate == 'Unlimited'){
                      $hotel_participate=2;
                    }  else if($value->hotel_participate == 'Limited'){
                      $hotel_participate=3;
                    }                                 
                    $arr[] = ['uid' => $uid,
                    'hl_region' => $region->hl_ms_r_id,
                    'dos_name' => $dos_name,
                    'event_name'=> $value->event_name,
                    'event_location'=> $value->event_location,
                    'event_start_date'=> date("Y-m-d",strtotime($value->event_start_date)),
                    'event_end_date'=> date("Y-m-d",strtotime($value->event_end_date)),
                    'activity_type'=> $activity_type,
                    'target_segment'=> $value->target_segment,
                    'participation_fee'=> $participation_fee,
                    'hotel_participate'=> $hotel_participate,
                    'if_limited'=> $value->if_limited,
                    'deadline'=> date("Y-m-d",strtotime($value->deadline)),
                    'description'=> $value->description,
                    'hl_status'=> 1];

                }

                if(!empty($arr)){

                    DB::table('hl_events')->insert($arr);

                    return back()->with('message','Insert Recorded successfully');

                   // dd('Insert Recorded successfully.');

                }

            }

        }
 return back()->with('message','Request data does not have any files to import.');
      //  dd('Request data does not have any files to import.');      

    } 

public function downloadEventDetails($type)
     {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      $data = DB::table('hl_events')
      //->select('*','hl_events.id as hl_eventsid')
      ->where('uid', $user_id)
      ->get();

return Excel::create('Event-Details', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Regions');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('APLBC DOS Name');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Event/ Activity Name');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Event location');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Event Start Date');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Event End Date');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Activity Type');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Target Segment');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Participation Fee');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Number of hotels can participate');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('If Limited');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Deadline');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Descriptions');   });
                if (!empty($data)) {
                  foreach ($data as $key => $value) {
                  $i=$key+2;
                  $user= DB::table('users')
                    ->where('id',$value->dos_name)
                    ->first();
                    if($user){
                    $dos_name=$user->first_name.' '.$user->last_name ;
                    }else{
                      $dos_name=" ";
                    }
                    $region= DB::table('hl_master_regional')
                    ->where('hl_ms_r_id', $value->hl_region)
                    ->first(); 
                    $activity= DB::table('hl_master_tasks')
                    ->where('hl_mt_id', $value->activity_type)
                    ->first();
                    if($activity){
                    $activity_type=$activity->task_name;
                    }else{
                      $activity_type=" ";
                    } 
                    $fee= DB::table('currency_list')
                    ->where('id', $value->participation_fee)
                    ->first();
                     if($fee){
                    $participation_fee=$fee->name;
                    }else{
                    $participation_fee=" ";
                    }   
                        $sheet->cell('A'.$i, $region->hl_regional_name); 
                        $sheet->cell('B'.$i, $dos_name); 
                        $sheet->cell('C'.$i, $value->event_name); 
                        $sheet->cell('D'.$i, $value->event_location);
                        $sheet->cell('E'.$i, date("d-m-Y",strtotime($value->event_start_date)));
                        $sheet->cell('F'.$i, date("d-m-Y",strtotime($value->event_end_date)));
                        $sheet->cell('G'.$i, $activity_type);
                        $sheet->cell('H'.$i, $value->target_segment);
                        $sheet->cell('I'.$i, $participation_fee);
                        $sheet->cell('J'.$i, $value->hotel_participate);
                        $sheet->cell('K'.$i, $value->if_limited);
                        $sheet->cell('L'.$i, date("d-m-Y",strtotime($value->deadline)));
                        $sheet->cell('M'.$i, $value->description);

                    //foreach ($data as $key => $value) {
                        //$i= $key+2;
                        // $sheet->cell('A2', $data->hotel_id); 
                        // $sheet->cell('B2', $data->hotel_name); 
                        // $sheet->cell('C2', $data->pms_code); 
                    //}
                }
              }
            });
        })->download($type);
    }


       public function viewregister(Request $request)
    {

      $user_id = (auth()->check()) ? auth()->user()->id : null;
   //   dd($request->id);
        $reg_hotel= DB::table('hl_event_register')
        ->where('hl_events_id', $request->id)
        ->get(); 
    
       return view('panels.crm.view_register',['reg_hotel'=>$reg_hotel]);     

    } 

    public function updatepayment(Request $request)
  {

    $user_id = (auth()->check()) ? auth()->user()->id : null;
    $pay=implode(',',$request->checkedVals);
    $payment= explode(',', $pay);
   //dd($payment);
        foreach($payment as $val)
        {
        $result=DB::table('hl_event_register')
        ->where('hl_reg_id', $val)
        ->update([              
        'payment_status' =>$request->value,              
        ]);
       }
  
        return response()->json($result);
  }
	     public function editEvents($id=null)
    {

    $user_id = (auth()->check()) ? auth()->user()->id : null;
    //$venue= Venue::all();
    $country= DB::table('countries')->get();
    $users = DB::table('users')->orderBy('first_name', 'asc')->get();
    $regional =  DB::table('hl_master_regional')->where('hl_regional_status',1)
    ->orderBy('hl_regional_name', 'asc')
    ->get();
    $task_types = DB::table('hl_master_tasks')->where('task_status', '1')->get(); 
    $currency = DB::table('currency_list')->get(); 

    $master_business =  DB::table('hl_master_business')->get();
    $travel_desk =  DB::table('hl_master_travel_desk_type')->get();
    $cities =  DB::table('cities')->get();    
    $hlevents = DB::table('hl_events')
                  // ->leftJoin('hl_master_regional','hl_master_regional.hl_ms_r_id','=','hl_events.hl_events_id')
                  // ->leftJoin('hl_master_tasks','hl_master_tasks.hl_mt_id','=','hl_events.activity_type')
                  ->where('hl_events_id',$id)
                  ->first();

                  $data = explode(',',$hlevents->target_segment);
                  $hlevents->target_segments =  $data;
           // dd($hlevents);  
     return view('panels.crm.edit_events',['hlevents'=>$hlevents,'data'=>$data,'regional'=>$regional,'users'=>$users,'task_types'=>$task_types,'currency'=>$currency]);   
     

    }
public function eventsedited(Request $request)
  {

    $user_id = (auth()->check()) ? auth()->user()->id : null;
    $a=$request->description;
    $b=ltrim($a,'<p>');
    $c=rtrim($b,'</p>');
    DB::table('hl_events')
        ->where('hl_events_id', $request->hl_events_id)
        ->update([              
        'hl_region' =>$request->hl_region,
        'dos_name' =>$request->dos_name,
        'event_name' =>$request->event_name,
        'event_location' =>$request->event_location,
        'description' =>$c,
        'event_start_date' =>date("Y-m-d",strtotime($request->event_start_date)),
        'event_end_date' =>date("Y-m-d",strtotime($request->event_end_date)),
        'activity_type' =>$request->activity_type,
        'target_segment' =>implode(',', $request->target_segment),
        'hotel_participate' =>$request->hotel_participate,
        'participation_fee' =>$request->participation_fee,
        'if_limited' =>$request->if_limited,
        'deadline' =>date("Y-m-d",strtotime($request->deadline)),              
        ]);
  
        //dd($request->show_location);
        return redirect('crm/view-events');
  }
  
	public function eventsupdate(Request $request)
	{
    $user_id = (auth()->check()) ? auth()->user()->id : null;
		$a=$request->hle_description;
		$b=ltrim($a,'<p>');
		$c=rtrim($b,'</p>');
		DB::table('hotel_leads_events')
				->where('hle_id', $request->hle_id)
				->update([							
				'hle_title' =>$request->hle_title,
				'hle_description' =>$c,
				'hle_start_date' =>date("Y-m-d",strtotime($request->hle_start_date)).' '.$request->hle_start_hour.':'.$request->hle_start_min.':00',
				'hle_end_date' =>date("Y-m-d",strtotime($request->hle_end_date)).' '.$request->hle_end_hour.':'.$request->hle_end_min.':00',
				'hle_recurr_status' =>$request->hle_recurr_status,
				'hle_recurr_cnt' =>$request->hle_recurr_cnt,
        'hle_task_type' =>$request->hle_task_type,
        'hle_task_for' =>implode(',', $request->task_for),
        'hle_activity' =>implode(',', $request->activity),
        'hle_applicable_All_Hotels' =>implode(',', $request->hotels_name),
        'hle_applicable_contacts' =>implode(',', $request->hotel_contacts),
        'hle_recurr_duration' =>$request->hle_recurr_duration,
        'show_location' =>$request->show_location,
				'hle_category' =>$request->hle_category,
				'hle_assigned_to' =>$request->hle_assigned_to,
				'hle_timezone' =>$request->hle_timezone,
				'hle_allday_status' =>$request->hle_allday_status,
				'hle_location' =>$request->hle_location,
				//'hle_outcome' =>$request->hle_outcome,
				//'hle_next_step' =>$request->hle_next_step,
				'hl_lead' =>$request->searchbar ,
								
				]);



    $tot=count($request->searchbar_agents);
    for ($i=0; $i < $tot; $i++) 
    { 
      $cnt = DB::table('hle_guests_invite')->where('hle_guest_id',$request->hle_guest_id[$i])->get(); 
       //dd(count($cnt));
        if(count($cnt)>0){
        DB::table('hle_guests_invite')
        ->where('hle_guest_id', $request->hle_guest_id[$i])
        ->update([              
        'searchbar_agents' =>$request->searchbar_agents[$i],
        'hle_guests' =>$request->hle_guests[$i],
        ]);
      }else{
          $Guests=new Guests;
          $Guests->uid= $user_id;   
          $Guests->hle_id= $request->hle_id;
          $Guests->searchbar_agents= $request->searchbar_agents[$i];
          $Guests->hle_guests= $request->hle_guests[$i];
          $Guests->hle_status= 1;
          $Guests->save();
      }
    }
    
    $hl_outcome_cnt = count($request->hle_outcome);

    for($rr = 0; $rr < $hl_outcome_cnt; $rr++)
    {

    $oc=$request->hle_outcome[$rr];
    $oc1=ltrim($oc,'<p>');
    $oc2=rtrim($oc1,'</p>');
    $ns=$request->hle_next_step[$rr];
    $ns1=ltrim($ns,'<p>');
    $ns2=rtrim($ns1,'</p>');
      $dat="applicable_to_".$rr;
         // dd($request->$dat);
      $cnt1 = DB::table('hle_outcome_nextstep')->where('hl_ocns_id',$request->hl_ocns_id[$rr])->get(); 
     //  dd(count($cnt1));
        if(count($cnt1)>0){
        DB::table('hle_outcome_nextstep')
        ->where('hl_ocns_id', $request->hl_ocns_id[$rr])
        ->update([              
        'applicable_All_Hotels' =>implode(',', $request->$dat),
        'std_outcomes' =>$request->std_outcomes[$rr],
        'std_nextsteps' =>$request->std_nextsteps[$rr],
        'hl_outcome' =>$oc2,
        'hl_nextstep' =>$ns2,
        ]);
      }else{
      $Outcome = new Outcome;
      $Outcome->hle_id = $request->hle_id;
      $Outcome->applicable_All_Hotels=implode(',',$request->$dat);
      $Outcome->std_outcomes = $request->std_outcomes[$rr];
      $Outcome->std_nextsteps = $request->std_nextsteps[$rr];
      $Outcome->hl_outcome = $oc2;
      $Outcome->hl_nextstep = $ns2;
      $Outcome->created_by = $user_id;
      $Outcome->save();
    }
    }
				//dd($request->show_location);
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
	public function getguests(Request $request)
		{
       $id=$request->id; 
       $global_val=$request->global_val; 
       $data['global_val'] =$global_val;
			 if($id[0]=='a'){
				 $ag_cnt= ltrim ($id,'a');
				 //DB::enableQueryLog();
				  $data['hle_guests'] =DB::table('hl_agents_contacts')
				 ->select('*', 'hl_agents_contacts.hl_email as ag_mail')
				 ->leftJoin('hl_agent_regional_locations','hl_agent_regional_locations.hl_regl_id', 'hl_agents_contacts.hl_agentcont_id')				
				  ->where('hl_agent_regional_locations.hl_agent_basic_id', $ag_cnt)	 
				 ->get(); 
				// dd(DB::getQueryLog());


			 } else if($id[0]=='c'){
				 $ag_cnt= ltrim ($id,'c');

				 $data['hle_guests'] = DB::table('hl_corporate_contacts')
				 ->select('*', 'hl_corporate_contacts.hl_email as ag_mail')
				 ->leftJoin('hl_regional_locations','hl_regional_locations.hl_regl_id', 'hl_corporate_contacts.hl_cor_basic_id')				
				  ->where('hl_regional_locations.hl_cor_basic_id', $ag_cnt)	 
				 ->get();

			 }
			 

		 return '{"view_details": ' . json_encode($data) . '}';
	}
	public function getac_mail(Request $request)
		{
			//DB::enableQueryLog();
			 $id=$request->id;
			 $res=$request->res; 
			 if($res=='a'){
			 $hle_agent_mail = DB::table('hl_agents_contacts')
			 ->select('hl_email')
			 ->where('hl_corcont_id', $id)	 
			 ->first(); 
			 //dd(DB::getQueryLog());
			}elseif($res=='c'){
			 $hle_agent_mail = DB::table('hl_corporate_contacts')
			 ->select('hl_email')
			 ->where('hl_corcont_id', $id)	 
			 ->first(); 
			}
		 	 return '{"view_details": ' . json_encode($hle_agent_mail) . '}';
	}	

  public function remove_guest(Request $request)
    {
      //DB::enableQueryLog();
      
        DB::table('hle_guests_invite')
        ->where('hle_guest_id', $request->id)
        ->update([              
        'hle_status' =>2
        ]); 
      $remove='Guest Removed Successfully';
       return '{"view_details": ' . json_encode($remove) . '}';
  } 
  public function remove_ocns(Request $request)
    {
      //DB::enableQueryLog();
      
        DB::table('hle_outcome_nextstep')
        ->where('hl_ocns_id', $request->id)
        ->update([              
        'hl_ocns_status' =>2
        ]); 
      $remove1='Outcome Removed Successfully';
       return '{"view_details": ' . json_encode($remove1) . '}';
  } 


	public function getagent_loc(Request $request)
		{
			//DB::enableQueryLog();
			 $id=$request->id; 
			 $hle_agent_loc = DB::table('hl_agent_regional_locations')
			 ->select('*', 'states.name as states','cities.name as cities', 'countries.name as country')
			 ->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
			 ->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
			 ->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
			 ->where('hl_agent_basic_id', $id)	 
			 ->first(); 
			//dd(DB::getQueryLog());
		 return '{"view_details": ' . json_encode($hle_agent_loc) . '}';
	}	
	public function getcorporate_loc(Request $request)
		{
			//DB::enableQueryLog();
			 $id=$request->id; 
			 $hle_cor_loc = DB::table('hl_regional_locations')
			 ->select('*', 'states.name as states','cities.name as cities', 'countries.name as country')
			 ->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
			 ->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
			 ->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
			 ->where('hl_cor_basic_id', $id)	 
			 ->first(); 
//dd(DB::getQueryLog());
		 return '{"view_details": ' . json_encode($hle_cor_loc) . '}';
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
	
		
	 public function addBusiness()
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
		//->where('created_by',$user_id)		
		->first();
		//dd($Hotellccontact);

		$Hotelagentcontactbasic=DB::table('hl_agents_contacts_basic')->select('*','states.name as states','cities.name as cities','countries.name as country')
		->leftJoin('countries', 'countries.id', '=', 'hl_agents_contacts_basic.hl_country')
		->leftJoin('states', 'states.id', '=', 'hl_agents_contacts_basic.hl_state')
		->leftJoin('cities', 'cities.id', '=', 'hl_agents_contacts_basic.hl_city')
		//->where('created_by',$user_id)
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
				//->where('created_by',$user_id)
				->get(); 
				
				$regionalLocationsDirectAdd = DB::table('hl_regional_locations')
				->select('*')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->where('sel_add_type','Direct Address')
				->get();

				
				$Implant = DB::table('hl_regional_locations')
				->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')

				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_regional_locations.hl_subsid_of')

				->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_agent_m_id', '=', 'hl_agents_contacts_basic.hl_agentcont_id')

				->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')

				->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_consortia_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Implant")
				//->where('hl_consortia_office_address.created_by',$user_id)				
				->get();



				$Outplant = DB::table('hl_regional_locations')
				->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')
				->leftJoin('hl_outplant', 'hl_outplant.hl_regl_m_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_regl_id', '=', 'hl_outplant.hl_agent_cor_id')
				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_agent_basic_id')
				->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Outplant")
				//->where('hl_regional_locations.created_by',$user_id)				
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
				->select('*','hl_regional_locations.hl_email as remail','hl_corporate_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')
				->leftJoin('hl_corporate_contacts', 'hl_corporate_contacts.hl_reg_loc_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_corporate_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')
				//->where('hl_regional_locations.created_by',$user_id)
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

     public function editBusiness($id=null)
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

		$HotellMainccontact = Hotelcorporatecontactbasic ::where('hl_ccb_id',$id)
		->first();
		// $HotellMainccontact = DB::table('hl_corporate_contact_basic')->select('*','states.name as states','cities.name as cities','countries.name as country')
		// ->leftJoin('hl_subsidy', 'hl_subsidy.h_main_id', '=', 'hl_corporate_contact_basic.hl_ccb_id')
		// ->leftJoin('countries', 'countries.id', '=', 'hl_corporate_contact_basic.hl_country')
		// ->leftJoin('states', 'states.id', '=', 'hl_corporate_contact_basic.hl_state')
		// ->leftJoin('cities', 'cities.id', '=', 'hl_corporate_contact_basic.hl_city')
		// ->where('created_by',$user_id)		
		// ->first();

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
				->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')

				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_regional_locations.hl_subsid_of')

				->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_agent_m_id', '=', 'hl_agents_contacts_basic.hl_agentcont_id')

				->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')

				->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_consortia_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')	
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Implant")
				->where('hl_regional_locations.hl_cor_basic_id',$id)
				//->where('hl_consortia_office_address.created_by',$user_id)				
				->get();



				$Outplant = DB::table('hl_regional_locations')
				->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')
				->leftJoin('hl_outplant', 'hl_outplant.hl_regl_m_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_regl_id', '=', 'hl_outplant.hl_agent_cor_id')
				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_agent_basic_id')
				->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')	
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Outplant")
				->where('hl_regional_locations.hl_cor_basic_id',$id)
				//->where('hl_regional_locations.created_by',$user_id)				
				->get();
	
			    $CorporateContact = DB::table('hl_regional_locations')
				->select('*','hl_regional_locations.hl_email as remail','hl_corporate_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')
				->leftJoin('hl_corporate_contacts', 'hl_corporate_contacts.hl_reg_loc_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_corporate_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')
				->where('hl_regional_locations.hl_cor_basic_id',$id)
				//->where('hl_regional_locations.created_by',$user_id)
				->where('hl_regional_locations.sel_add_type','Direct Address')				
			    ->get();

			
				//DB::enableQueryLog();
			   // dd(DB::getQueryLog());
//dd($CorporateContact);

			    $Contactdesignation=Contactdesignation::get();
			 

			$hl_corporate_contact_basic=DB::table('hl_corporate_contact_basic')->get();
			$hl_agents_contacts_basic=DB::table('hl_agents_contacts_basic')->get();

			$editsubsidyType1=DB::table('hl_subsidy')->where('h_main_id',$id)->where('h_m_type',1)->where('type',1)->get();
			$editsubsidyType2=DB::table('hl_subsidy')->where('h_main_id',$id)->where('h_m_type',1)->where('type',2)->get();
		  //dd($editsubsidyType2);
			 
      return view('panels.crm.edit_business',compact('editsubsidyType1','editsubsidyType2','HotellMainccontact','master_lead_type','hl_corporate_contact_basic','hl_agents_contacts_basic','country','editstates','editcities','Contactdesignation','Outplant','Hotellccontact'),['CorporateContact'=>$CorporateContact,'Hotelagentcontactbasic'=>$Hotelagentcontactbasic,'Implant'=>$Implant,'regionalLocationsDirectAdd'=>$regionalLocationsDirectAdd,'regionalLocations'=>$regionalLocations,'users' => $users,'editusers' => $users,'editstates' => $editstates,'editcities' => $editcities,'master_business' => $master_business,'cities' => $cities,'travel_desk' => $travel_desk,'hdcorporatecont' => $hdcorporatecont,'hdcontact_type' => $hdcontact_type]);

    }



     public function editAgent($id=null)
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
		
		//$hlagentscontacts = DB::table('hl_agents_contacts')					
		//			->where('hl_agentcont_id',$id)
		//			->get();

		//$hlagentscontacts = Hotelagentregional::where('hl_agentcont_id',$id)->get();

		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();

		$hl_corporate_contact_basic=DB::table('hl_corporate_contact_basic')->get();
		$hl_agents_contacts_basic=DB::table('hl_agents_contacts_basic')->get();

//DB::enableQueryLog();
		$hlagentscontacts = DB::table('hl_agent_regional_locations')
				->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
				->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id','=','hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')			
				->where('hl_agent_regional_locations.hl_agent_basic_id',$id)				
				->get();

//dd(DB::getQueryLog());
		$Implant = DB::table('hl_regional_locations')
				->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')

				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_regional_locations.hl_subsid_of')

				->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_agent_m_id', '=', 'hl_agents_contacts_basic.hl_agentcont_id')

				->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')

				->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_consortia_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Implant")
				->where('hl_agents_contacts_basic.hl_agentcont_id',$id)				
				->get();

		$Outplant = DB::table('hl_regional_locations')
				->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')
				->leftJoin('hl_outplant', 'hl_outplant.hl_regl_m_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_regl_id', '=', 'hl_outplant.hl_agent_cor_id')
				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_agent_basic_id')
				->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Outplant")
				->where('hl_agents_contacts_basic.hl_agentcont_id',$id)
				//->where('hl_regional_locations.created_by',$user_id)				
				->get();

				$Hotelagentcontactbasic=Hotelagentcontactbasic::where('hl_agentcont_id',$id)->first();
		  
		 return view('panels.crm.edit_agent_business',compact('Implant','Hotelagentcontactbasic','Outplant','hlagentscontacts','Contactdesignation','hl_corporate_contact_basic','hl_agents_contacts_basic'),['Hotelagentcontactbasic'=>$Hotelagentcontactbasic,'master_lead_type'=>$master_lead_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'master_business' => $master_business,'cities' => $cities,'travel_desk' => $travel_desk]);	 
     

    }

public function getImplant(Request $request)
		{
			 $id=$request->id;  
			 

			$data['hlagentscontacts'] = DB::table('hl_consortia_contacts')
				->select('*','hl_consortia_contacts.hl_email as cemail')
				->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_con_off_add_id','=','hl_consortia_contacts.hl_cons_m_id')
				->where('hl_consortia_contacts.hl_cons_cont_id',$id)		
				->first();
			
			$data['states'] = DB::table('states')
			->where('country_id',$data['hlagentscontacts']->hl_country)			 
			->get();

			$data['cities'] = DB::table('cities')
			->where('state_id',$data['hlagentscontacts']->hl_state)			 
			->get();
			

		 return '{"view_details": ' . json_encode($data) . '}';
	}

 public function getagentlist()
    {
       $hl_business_name = DB::table('hl_agents_contacts_basic')
       ->get(); 
       $hl_business_name1 = DB::table('hl_corporate_contact_basic')
       ->get();   
     return '{"view_details": ' . json_encode($hl_business_name1) . '}';
  }

    public function getAgents(Request $request)
		{
			 $id=$request->id;  
			 

			$data['hlagentscontacts'] = DB::table('hl_agents_contacts')
				->select('*','hl_agents_contacts.hl_email as cemail')
				->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_regl_id','=','hl_agents_contacts.hl_agentcont_id')		
				->where('hl_agents_contacts.hl_corcont_id',$id)		
				->first();
			
			$data['states'] = DB::table('states')
			->where('country_id',$data['hlagentscontacts']->hl_country)			 
			->get();

			$data['cities'] = DB::table('cities')
			->where('state_id',$data['hlagentscontacts']->hl_state)			 
			->get();
			

		 return '{"view_details": ' . json_encode($data) . '}';
	}

	 public function getCorp(Request $request)
		{
			 $id=$request->id;  
			 

			$data['hlagentscontacts'] = DB::table('hl_corporate_contacts')
				->select('*','hl_corporate_contacts.hl_email as cemail')
				->leftJoin('hl_regional_locations', 'hl_regional_locations.hl_regl_id','=','hl_corporate_contacts.hl_reg_loc_id')		
				->where('hl_corporate_contacts.hl_corcont_id',$id)		
				->first();
			
			$data['states'] = DB::table('states')
			->where('country_id',$data['hlagentscontacts']->hl_country)			 
			->get();

			$data['cities'] = DB::table('cities')
			->where('state_id',$data['hlagentscontacts']->hl_state)			 
			->get();
			

		 return '{"view_details": ' . json_encode($data) . '}';
	}

    public function corporateUpdated(Request $request)
	{
		 


				 $this->validate($request,
			 [			 
		
		  'business_name'			=> 'required',
			'business_type'			=> 'required',			
			'address1'			=> 'required',			
			'h_country'			=> 'required',
			'states'			=> 'required',
			//'cities'			=> 'required',
			//'postcode'			=> 'required',
			'website'			=> 'required',
			'lead_type'			=> 'required'
               
            ],
            [
			'business_name.required'			=> 'Business name is required',
			'business_type.required'			=> 'Business Type is required',			
			'address1.required'			=> 'Address is required',			
			'h_country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			//'cities.required'			=> 'Cities is required',		
			//'postcode.required'			=> 'Postcode is required',		
			'website.required'			=> 'Website is required',
			'lead_type.required'			=> 'Lead Type is required',					
                     ]);
					 
							 

					 
				$Hotellccontact = Hotelcorporatecontactbasic::where('hl_ccb_id', $request->hl_ccb_id)
				->update([							
				'hl_business_name' =>$request->business_name,
				'hl_business_type' =>$request->business_type,				
				'hl_head_office_address' =>$request->address1,
				'hl_country' =>$request->h_country,
				'hl_state' =>$request->states,
				'hl_city' =>$request->cities,
				'hl_pincode' =>$request->postcode,
				'hl_website' =>$request->website,
				'hl_lead_type' =>$request->lead_type,
				'hl_subsidiary_of' =>$request->subs_of,
				'hl_travel_desk_type' =>1,
				'hl_landline'=>$request->landline,
				'm_con_contact_designation'=>$request->m_con_contact_designation,
				'm_con_title'=>$request->m_con_title,
				'm_con_first_name'=>$request->m_con_first_name,
				'm_con_last_name'=>$request->m_con_last_name,
				'm_con_mobile_no'=>$request->m_con_mobile_no,
				'm_con_landline_no'=>$request->m_con_landline_no,
				'm_con_email'=>$request->m_con_email,
				'm_con_linkedin_contact'=>$request->m_con_linkedin_contact,
				'm_con_skype_contact'=>$request->m_con_skype_contact,
				'm_con_dob'=>$request->m_con_dob
				]);				
							
			  	$hlccid = $request->hl_ccb_id;

			  	$Del=Hotelsubsidy::where('h_main_id',$hlccid)->where('h_m_type',1)->delete();

					if(!empty($request->subsidy_m_off))
					{
					$sub=implode(',', $request->subsidy_m_off);

					foreach (explode(',', $sub) as $value) {


					$val=explode('_', $value);

								
							$Hotelsubsidy = new Hotelsubsidy;
							$Hotelsubsidy->h_main_id=$hlccid;
							$Hotelsubsidy->h_subsidy_id=$val[0];
							$Hotelsubsidy->h_m_type=1;
							$Hotelsubsidy->type=$val[1];
							$Hotelsubsidy->save();
					
					


					}
					}
				
				return back()->with('message','Business Information Details updated successfully');

				
	}

  public function addevents()
    {
    $user_id = (auth()->check()) ? auth()->user()->id : null;
    //$venue= Venue::all();
    $country= DB::table('countries')->get();
    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 4)
		    ->orderBy('first_name', 'asc')->get();
    $regional =  DB::table('hl_master_regional')->where('hl_regional_status',1)
    ->orderBy('hl_regional_name', 'asc')
    ->get();
    $task_types = DB::table('hl_master_tasks')->where('task_status', '1')->get(); 
    $currency = DB::table('currency_list')->get(); 

    $master_business =  DB::table('hl_master_business')->get();
    $travel_desk =  DB::table('hl_master_travel_desk_type')->get();
    $cities =  DB::table('cities')->get();    
 

      return view('panels.crm.add_events',['regional'=>$regional,'users'=>$users,'task_types'=>$task_types,'currency'=>$currency]);

    }
	public function agentUpdated(Request $request)
	{
		 


				 $this->validate($request,
			 [			 
		
		  	'business_name'			=> 'required',					
			'address1'			=> 'required',			
			'h_country'			=> 'required',
			'states'			=> 'required',
			//'cities'			=> 'required',
			//'postcode'			=> 'required',
			'website'			=> 'required',
			'lead_type'			=> 'required'
               
            ],
            [
			'business_name.required'			=> 'Business name is required',			
			'address1.required'			=> 'Address is required',			
			'h_country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			//'cities.required'			=> 'Cities is required',		
			//'postcode.required'			=> 'Postcode is required',		
			'website.required'			=> 'Website is required',
			'lead_type.required'			=> 'Lead Type is required',					
                     ]);
					 
							// dd($request->h_country);

					 
				$Hotellccontact = Hotelagentcontactbasic::where('hl_agentcont_id', $request->hl_ccb_id)
				->update([

				'hl_business_name'=>$request->business_name,			
				'hl_ofz_address'=>$request->address1,
				'hl_country'=>$request->h_country,
				'hl_state'=>$request->states,
				'hl_city'=>$request->cities,
				'hl_pincode'=>$request->postcode,
				'hl_website'=>$request->website,
				'hl_lead_type'=>$request->lead_type,				
				'm_con_contact_designation'=>$request->m_con_contact_designation,
				'm_con_title'=>$request->m_con_title,
				'm_con_first_name'=>$request->m_con_first_name,
				'm_con_last_name'=>$request->m_con_last_name,
				'm_con_mobile_no'=>$request->m_con_mobile_no,
				'm_con_landline_no'=>$request->m_con_landline_no,
				'm_con_email'=>$request->m_con_email,
				'm_con_linkedin_contact'=>$request->m_con_linkedin_contact,
				'm_con_skype_contact'=>$request->m_con_skype_contact,
				'm_con_dob'=>$request->m_con_dob
				]);				
							
			  	$hlccid = $request->hl_ccb_id;

			  	

					if(!empty($request->business_type))
					{
					//$Del=Hotelbusinessagenttype::where('h_main_id',$hlccid)->delete();
					$sub=implode(',', $request->business_type);

					foreach (explode(',', $sub) as $value) {
						$data=Hotelbusinessagenttype::where('h_main_id',$hlccid)
						->where('h_agent_type_id',$value)						
						->first();
						if($data)
						{
							$data=Hotelbusinessagenttype::where('h_main_id',$hlccid)
							->where('h_agent_type_id',$value)
							->update([
							'h_main_id'=>$hlccid,
							'h_agent_type_id'=>$value,				
							]);

						}else{
							$Hotelbusinessagenttype = new Hotelbusinessagenttype;
							$Hotelbusinessagenttype->h_main_id=$hlccid;
							$Hotelbusinessagenttype->h_agent_type_id=$value;				
							$Hotelbusinessagenttype->save();

						}

					

					}
					}
				
				return back()->with('message','Business Information Details updated successfully');

				
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
		
		$hlagentscontacts = DB::table('hl_agents_contacts')					
					->where('created_by',$user_id)
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

		$Implant = DB::table('hl_regional_locations')
				->select('*','hl_consortia_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')

				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_regional_locations.hl_subsid_of')

				->leftJoin('hl_consortia_office_address', 'hl_consortia_office_address.hl_agent_m_id', '=', 'hl_agents_contacts_basic.hl_agentcont_id')

				->leftJoin('hl_consortia_contacts', 'hl_consortia_contacts.hl_cons_m_id', '=', 'hl_consortia_office_address.hl_con_off_add_id')

				->leftJoin('countries', 'countries.id', '=', 'hl_consortia_office_address.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_consortia_office_address.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_consortia_office_address.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_consortia_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Implant")
				//->where('hl_consortia_office_address.created_by',$user_id)				
				->get();

		$Outplant = DB::table('hl_regional_locations')
				->select('*','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','users.first_name as fname')
				->leftJoin('hl_outplant', 'hl_outplant.hl_regl_m_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_regl_id', '=', 'hl_outplant.hl_agent_cor_id')
				->leftJoin('hl_agents_contacts_basic', 'hl_agents_contacts_basic.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_agent_basic_id')
				->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_regional_locations.created_by')		
				->where('hl_regional_locations.sel_add_type',"Consortia")
				->where('hl_regional_locations.ofz_type',"Outplant")
				//->where('hl_regional_locations.created_by',$user_id)				
				->get();

      return view('panels.crm.add_agent',compact('Implant','Outplant','hlagentscontacts','Contactdesignation','hl_corporate_contact_basic','hl_agents_contacts_basic'),['regionalLocations'=>$regionalLocations,'Hotelagentcontactbasic'=>$Hotelagentcontactbasic,'master_lead_type'=>$master_lead_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'master_business' => $master_business,'cities' => $cities,'travel_desk' => $travel_desk]);

    }
	
	public function viewcorporate($id=null)
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

		/*
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
		*/

		$hotelsCont = DB::table('hl_corporate_contact_basic')
			->select('*','hl_regional_locations.hl_email as remail','hl_corporate_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities')
			->leftJoin('hl_regional_locations', 'hl_regional_locations.hl_cor_basic_id', '=', 'hl_corporate_contact_basic.hl_ccb_id')
			->leftJoin('hl_corporate_contacts', 'hl_corporate_contacts.hl_reg_loc_id', '=', 'hl_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_corporate_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_corporate_contact_basic.created_by')
			//->where('hl_corporate_contact_basic.created_by', '=', $user_id)
			->orderBy('hl_corporate_contact_basic.hl_business_name', 'asc')
			->get();
		
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
      return view('panels.crm.edit_corporate',['hotels'=>$hotels,'hotelsCont'=>$hotelsCont,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
 

    }
	
	public function viewagent()
    {
    	$user_id = (auth()->check()) ? auth()->user()->id : null;

	

		$hotels = DB::table('hotel_leads')
			 ->get(); 
		
		//dd($master_business );
	    $country= Country::all()->where('status',1);


	    	$hotelsCont = DB::table('hl_agents_contacts_basic')
			->select('*','hl_agent_regional_locations.hl_email as remail','hl_agents_contacts.hl_email as cemail','countries.name as countries','states.name as states','cities.name as cities','hl_agents_contacts_basic.hl_agentcont_id as hlagentcontid')
			->leftJoin('hl_agent_regional_locations', 'hl_agent_regional_locations.hl_agent_basic_id', '=', 'hl_agents_contacts_basic.hl_agentcont_id')
			->leftJoin('hl_agents_contacts', 'hl_agents_contacts.hl_agentcont_id', '=', 'hl_agent_regional_locations.hl_regl_id')
				->leftJoin('countries', 'countries.id', '=', 'hl_agent_regional_locations.hl_country')
				->leftJoin('states', 'states.id', '=', 'hl_agent_regional_locations.hl_state')
				->leftJoin('cities', 'cities.id', '=', 'hl_agent_regional_locations.hl_city')
				->leftJoin('hl_master_regional', 'hl_master_regional.hl_ms_r_id', '=', 'countries.region_id')
				->leftJoin('hl_contact_designation', 'hl_contact_designation.hl_cd_id', '=', 'hl_agents_contacts.hl_cont_design')
				->leftJoin('users', 'users.id', '=', 'hl_agents_contacts_basic.created_by')
			//->where('hl_agents_contacts_basic.created_by', '=', $user_id)
			->orderBy('hl_agents_contacts_basic.hl_business_name', 'asc')
			->get();
	  // //dd($hotelsCont);
	   
		/*
		$cor_view = array();
		$contacts_list = DB::table('hl_agents_contacts')
					->where('created_by',$user_id)
					->get();
		
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
		*/
		
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
		 //'cor_view'=>$cor_view,'
		 $master_business =  Hlmasterbusiness::get();
		return view('panels.crm.edit_agent',compact('Contactdesignation','master_business','master_lead_type','Hotelagentcontactbasic','regionalLocations','hotelsCont'),['hotels'=>$hotels,'country' => $country,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
 

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
		$hdproperty_type = DB::table('hl_master_property_type')->where('hl_property_status',2)
			  ->get(); 
		$hdlead_type = DB::table('hl_master_lead_type')
			  ->get();

		$Contactdesignation=Contactdesignation::get();

		$applicable_to = DB::table('hl_master_applicable_to')->get();
		//dd($applicable_to);
      return view('panels.crm.add_hotel',compact('applicable_to','Contactdesignation'),['Category'=>$Category, 'hdproperty_type'=>$hdproperty_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'hdlead_type' => $hdlead_type]);

    }
	public function editHotel($id)
  	{

    $hl_leads = Hotelleads::where('hl_id',$id)->get()->toArray();
    $hl_leads_contacts = Hotelleadscontacts::where('hl_id',$id)->get();
    $hl_leads_notes = Hotelleadsnotes::where('hl_id',$id)->get();
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
    $hdproperty_type = DB::table('hl_master_property_type')->where('hl_property_status',2)
        ->get(); 
    $hdlead_type = DB::table('hl_master_lead_type')
        ->get();

    $Contactdesignation=Contactdesignation::get();

    $applicable_to = DB::table('hl_master_applicable_to')->get();

      return view('panels.crm.update_hotel',compact('applicable_to','Contactdesignation','hl_leads',
'hl_leads_contacts','hl_leads_notes'),['Category'=>$Category, 'hdproperty_type'=>$hdproperty_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'hdlead_type' => $hdlead_type]);

    }
// 	public function editHotel()
//     {	

// $user_id = (auth()->check()) ? auth()->user()->id : null;

// 		//$venue= Venue::all();
// //$VenueContact= VenueContact::all()->where('user_id',$user_id);
//  $hotels = DB::table('hotels')
// 			 ->where('user_id', $user_id)	 
// 			 ->get(); 
// 		//$venue= VenueContact::all()->where('user_id',$user_id); 
// 		$VenueType= VenueType::all();
//         $VenueCapacity= VenueCapacity::all();
// 		$VenueFeatures= VenueFeatures::all();
// 		$VenueFoodDrink= VenueFoodDrink::all();
// 		$VenueLicensing= VenueLicensing::all();
// 		$VenueRestrictions= VenueRestrictions::all();
// 		$Benefits= Benefits::all();
// 		$Amenities= Amenities::all();
// 		$Business= VenueBusiness::all();
	
	 
// 	   $country= DB::table('countries')->get();
// 	   $Category= Category::all();
	
// 	    $users = DB::table('users')
// 			->select('*', 'users.id as uid')
// 			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
// 			->where('role_user.role_id', '=', 3)
// 			->get();
	
// 		$editstates = DB::table('states')			 
// 			 ->get();
// 		$editcities = DB::table('cities')			 
// 			 ->get();
//       return view('panels.crm.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'Category'=>$Category,'VenueType'=>$VenueType,'hotels'=>$hotels,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]);
//     }
	
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
			// 'cities'			=> 'required',
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
			// 'cities.required'			=> 'Cities is required',		
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
				$Hotell->hl_property_type=implode(',', $request->property_type);
				$Hotell->solution_type = implode(',', $request->solution_type);				
				$Hotell->notes = $request->hotel_description;				
				$Hotell->save();				
			    $hlid = $Hotell->id;				
				
								
				$firstname=$request->firstname;
				$contact_status_hidden=$request->contact_status_hidden;
				
				$contact_status_hiddenval = explode(",",$contact_status_hidden);
				
				$tot=count($request->firstname);
				//dd($firstname);
//DB::enableQueryLog(); // Enable query log

				for ($i=0; $i < $tot; $i++) { 

					    $hlcontacts = new Hotelleadscontacts;
					    $hlcontacts->hl_c_title=$request->c_title[$i];
					    $hlcontacts->hl_c_firstname=$request->firstname[$i];
					    $hlcontacts->hl_c_lastname=$request->lastname[$i];
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
		//'landline.required'			=> 'Landline number is required',
		
		  $this->validate($request,
			 [			 
		
		  'business_name'			=> 'required',
			'business_type'			=> 'required',			
			'address1'			=> 'required',			
			'h_country'			=> 'required',
			'states'			=> 'required',
			//'cities'			=> 'required',
			//'postcode'			=> 'required',
			'website'			=> 'required',
			'lead_type'			=> 'required'
               
            ],
            [
			'business_name.required'			=> 'Business name is required',
			'business_type.required'			=> 'Business Type is required',			
			'address1.required'			=> 'Address is required',			
			'h_country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			//'cities.required'			=> 'Cities is required',		
			//'postcode.required'			=> 'Postcode is required',		
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
				$Hotellccontact->hl_travel_desk_type='1';
				$Hotellccontact->m_con_contact_designation=$request->m_con_contact_designation;
				$Hotellccontact->m_con_title=$request->m_con_title;
				$Hotellccontact->m_con_first_name=$request->m_con_first_name;
				$Hotellccontact->m_con_last_name=$request->m_con_last_name;
				$Hotellccontact->m_con_mobile_no=$request->m_con_mobile_no;
				$Hotellccontact->m_con_landline_no=$request->m_con_landline_no;
				$Hotellccontact->m_con_email=$request->m_con_email;
				$Hotellccontact->m_con_linkedin_contact=$request->m_con_linkedin_contact;
				$Hotellccontact->m_con_skype_contact=$request->m_con_skype_contact;
				$Hotellccontact->m_con_dob=$request->m_con_dob;
				$Hotellccontact->save();

			  	$hlccid = $Hotellccontact->id;
					if(!empty($request->subsidy_m_off))
					{
					$sub=implode(',', $request->subsidy_m_off);

					foreach (explode(',', $sub) as $value) {
					$val=explode('_', $value);						
					$Hotelsubsidy = new Hotelsubsidy;
					$Hotelsubsidy->h_main_id=$hlccid;
					$Hotelsubsidy->h_subsidy_id=$val[0];
					$Hotelsubsidy->h_m_type=1;
					$Hotelsubsidy->type=$val[1];
					$Hotelsubsidy->save();
					}
					}
			  	
					//dd($subsidyId);
				/*	if(array_count_values($request->subsidy_m_off)>0)
					{
					$subsidyId=count($request->subsidy_m_off);
					
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
					} */
			  	


				
								
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


	public function corregional_updated(Request $request)
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
					
				$hl_ccb_id = $request->hl_ccb_id;

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
							 ->orderBy('hl_ccb_id', 'desc')
							 ->first();							
				//$hl_ccb_id = $hl_corporate_contact_basic_first[0]->hl_ccb_id;

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
		
		
		  $this->validate($request,
			 [			 
		
			'business_name'			=> 'required',
			'address1'			=> 'required',
			'h_country'			=> 'required',
			'states'			=> 'required',
			'website'			=> 'required'              
            ],
            [
			
			'business_name.required'			=> 'Business name is required',
			'address1.required'			=> 'Office address is required',
			'h_country.required'			=> 'Country is required',
			'country.required'			=> 'Country is required',
			'states.required'			=> 'State is required',
			'website.required'			=> 'Website is required'		
			]);
					 
									 
										  
					 
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
				$Hotellccontact->m_con_contact_designation=$request->m_con_contact_designation;
				$Hotellccontact->m_con_title=$request->m_con_title;
				$Hotellccontact->m_con_first_name=$request->m_con_first_name;
				$Hotellccontact->m_con_last_name=$request->m_con_last_name;
				$Hotellccontact->m_con_mobile_no=$request->m_con_mobile_no;
				$Hotellccontact->m_con_landline_no=$request->m_con_landline_no;
				$Hotellccontact->m_con_email=$request->m_con_email;
				$Hotellccontact->m_con_linkedin_contact=$request->m_con_linkedin_contact;
				$Hotellccontact->m_con_skype_contact=$request->m_con_skype_contact;
				$Hotellccontact->m_con_dob=$request->m_con_dob;
				$Hotellccontact->save();				
			    $hlccid = $Hotellccontact->id;	


			  //   $businesstypeCnt=count($request->business_type);
					// //dd($subsidyId);
					// if($businesstypeCnt>0)
					// {

					
					// for ($i=0; $i < $businesstypeCnt ; $i++) {						
					// 		$Hotelbusinessagenttype = new Hotelbusinessagenttype;
					// 		$Hotelbusinessagenttype->h_main_id=$hlccid;
					// 		$Hotelbusinessagenttype->h_agent_type_id=$request->business_type[$i];							
					// 		$Hotelbusinessagenttype->save();
					// }
					// }	

					if(!empty($request->business_type))
					{
					$sub=implode(',', $request->business_type);

					foreach (explode(',', $sub) as $value) {

					$Hotelbusinessagenttype = new Hotelbusinessagenttype;
					$Hotelbusinessagenttype->h_main_id=$hlccid;
					$Hotelbusinessagenttype->h_agent_type_id=$value;							
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
		
		
		  $this->validate($request,
			 [			 
		
			'off_address1'			=> 'required',			
			'country1'			=> 'required',
			'states1'			=> 'required',			
			'postcode1'			=> 'required',
			'email1'			=> 'required',
			'lead_type1'			=> 'required',			
               
            ],
            [
			
			'off_address1.required'			=> 'Office address is required',			
			'country1.required'			=> 'Country is required',
			'states1.required'			=> 'State is required',		
			'postcode1.required'			=> 'Postcode is required',		
			'email1.required'			=> 'Email is required',		
			'lead_type1.required'			=> 'Lead type is required'		
							
                     ]);
					 
						DB::enableQueryLog();			 
					$userid = auth()->user()->id;			
					$Hotellccontact_r = new Hotelagentregional;				
					$Hotellccontact_r->created_by=auth()->user()->id;
					$Hotellccontact_r->hl_ofz_address=$request->off_address1;
					$Hotellccontact_r->iata_number=$request->iata_number;										
					$Hotellccontact_r->hl_country=$request->country1;					
					$Hotellccontact_r->hl_state=$request->states1;
					$Hotellccontact_r->hl_city=$request->cities1;
					$Hotellccontact_r->hl_postcode=$request->postcode1;
					$Hotellccontact_r->hl_ofz_no=$request->contact_number1;
					$Hotellccontact_r->hl_loc_type=$request->location_type;
					$Hotellccontact_r->hl_email=$request->email1;
					$Hotellccontact_r->hl_lead_type=$request->lead_type1;
					$Hotellccontact_r->hl_subsid_of='';
					$Hotellccontact_r->hl_agent_basic_id=$request->hl_agentcont_id;
					$Hotellccontact_r->save();
					$hlccid = $Hotellccontact_r->id;	
					//dd($request->hl_agentcont_id);

					// if($request->hl_agentcont_id != '')
					// {
					// 	$hlccid = $request->hl_agentcont_id;
					// }else{
					// 	$hl_corporate_contact_basic_first = DB::table('hl_agents_contacts_basic')	
					// 	->where('created_by', $userid)	 
					// 	->orderBy('hl_agentcont_id', 'desc')
					// 	->take(1)->get();						
					// 	$Hotellccontact_r->hl_agent_basic_id = $hl_corporate_contact_basic_first[0]->hl_agentcont_id;
					// 	$Hotellccontact_r->save();				
					// 	$hlccid = $Hotellccontact_r->id;
					// }
					//dd(DB::getQueryLog());

					if(!empty($request->subsidy_m_off))
					{
					$sub=implode(',', $request->subsidy_m_off);

					foreach (explode(',', $sub) as $value) {
					$val=explode('_', $value);						
					$Hotelsubsidy = new Hotelsubsidy;
					$Hotelsubsidy->h_main_id=$hlccid;
					$Hotelsubsidy->h_subsidy_id=$val[0];
					$Hotelsubsidy->h_m_type=1;
					$Hotelsubsidy->type=$val[1];
					$Hotelsubsidy->save();
					}
					}

						
					$cnt = count($request->first_name);
					for($gg = 0; $gg < $cnt; $gg++)
					{	
						$Hotellccontact_c = new Hlagentcontact;				
						$Hotellccontact_c->created_by=auth()->user()->id;			
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
						$Hotellccontact_c->hl_agentcont_id=$hlccid;
						$Hotellccontact_c->save();				
						
					}	
				
				
			return back()->with('message','success');
				
	}


	public function updateAgentContact(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'off_address1'			=> 'required',			
			'country1'			=> 'required',
			'states1'			=> 'required',			
			'postcode1'			=> 'required',
			'email1'			=> 'required',
			'lead_type1'			=> 'required',			
               
            ],
            [
			
			'off_address1.required'			=> 'Office address is required',			
			'country1.required'			=> 'Country is required',
			'states1.required'			=> 'State is required',		
			'postcode1.required'			=> 'Postcode is required',		
			'email1.required'			=> 'Email is required',		
			'lead_type1.required'			=> 'Lead type is required'		
							
                     ]);
$hlccid=$request->agtcont_mid;
					//$userid = auth()->user()->id;			
					$Hotellccontact_r = Hotelagentregional::where('hl_regl_id',$hlccid)
					->update([				
					'hl_ofz_address'=>$request->off_address1,
					'iata_number'=>$request->iata_number,					
					'hl_country'=>$request->country1,					
					'hl_state'=>$request->states1,
					'hl_city'=>$request->cities1,
					'hl_postcode'=>$request->postcode1,
					'hl_ofz_no'=>$request->contact_number1,
					'hl_loc_type'=>$request->location_type,
					'hl_email'=>$request->email1,
					'hl_lead_type'=>$request->lead_type1					
					]);


					if(!empty($request->subsidy_m_off))
					{
					$sub=implode(',', $request->subsidy_m_off);

					foreach (explode(',', $sub) as $value) {
					$val=explode('_', $value);
					$data=Hotelsubsidy::
						where('h_main_id',$hlccid)
						->where('h_subsidy_id',$val[0])
						->where('type',$val[1])						
						->where('h_m_type',1)						
						->first();
					if($data)
						{
							$data=Hotelsubsidy::where('h_main_id',$hlccid)
							->where('h_subsidy_id',$val[0])
							->where('type',$val[1])						
							->where('h_m_type',1)
							->update([
									'h_main_id'=>$hlccid,
									'h_subsidy_id'=>$val[0],
									'h_m_type'=>1,
									'type'=>$val[1]
							]);
						}else{
							$Hotelsubsidy = new Hotelsubsidy;
							$Hotelsubsidy->h_main_id=$hlccid;
							$Hotelsubsidy->h_subsidy_id=$val[0];
							$Hotelsubsidy->h_m_type=1;
							$Hotelsubsidy->type=$val[1];
							$Hotelsubsidy->save();
						}							
					
					}
					}
						
					$cnt = count($request->first_name);
					for($gg = 0; $gg < $cnt; $gg++)
					{
					
					if($request->agtcont_cid[$gg]!='')
					{

						$Hotellccontact_c = Hlagentcontact::where('hl_corcont_id',$request->agtcont_cid[$gg])
						->where('hl_agentcont_id',$hlccid)
						->update([
						'hl_title'=>$request->title[$gg],
						'hl_first_name'=>$request->first_name[$gg],	
						'hl_last_name'=>$request->last_name[$gg],
						'hl_cont_design'=>$request->contact_designation[$gg],
						'hl_type_of_cont'=>$request->contact_type[$gg],
						'hl_mob_no'=>$request->mobile_no[$gg],
						'hl_email'=>$request->email[$gg],
						'hl_linked_in'=>$request->linkedin_contact[$gg],
						'hl_skype'=>$request->skype_contact[$gg],
						'hl_dob'=>date('Y-m-d',strtotime($request->dob[$gg])),
						'hl_event_invite'=>$request->invite[$gg]
						]);	

					}else{	
						$Hotellccontact_c = new Hlagentcontact;				
						$Hotellccontact_c->created_by=auth()->user()->id;			
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
						$Hotellccontact_c->hl_agentcont_id=$hlccid;
						$Hotellccontact_c->save();
					}				
						
					}	
				
				
			return back()->with('message','success');
				
	}

	public function updateImplantContact(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
		'impledit_subsidy1'			=> 'required',
			'impledit_ic_off_address1'			=> 'required',			
			'impledit_ic_country1'			=> 'required',
			'impledit_ic_states1'			=> 'required',			
			'impledit_ic_postcode1'			=> 'required',
			'impledit_ic_email1'			=> 'required',		
               
            ],
            [
			'impledit_subsidy1.required'			=> 'Agent is required',
			'impledit_ic_off_address1.required'			=> 'Office address is required',			
			'impledit_ic_country1.required'			=> 'Country is required',
			'impledit_ic_states1.required'			=> 'State is required',		
			'impledit_ic_postcode1.required'			=> 'Postcode is required',		
			'impledit_ic_email1.required'			=> 'Email is required',		
			
							
                     ]);
$hlccid=$request->implcont_mid;
					//$userid = auth()->user()->id;	

					//dd($request->ecorp_location_type1);

					$Hotellccontact_r = Hlconsortiaofficeaddress::where('hl_con_off_add_id',$hlccid)
					->update([				
					'hl_agent_m_id'=>"$request->impledit_subsidy1",
					'hl_ofz_address'=>"$request->impledit_ic_off_address1",	
					'hl_country'=>"$request->impledit_ic_country1",					
					'hl_state'=>"$request->impledit_ic_states1",
					'hl_city'=>"$request->impledit_ic_cities1",
					'hl_postcode'=>"$request->impledit_ic_postcode1",
					'hl_ofz_no'=>"$request->impledit_ic_landline_no1",
					'hl_email'=>"$request->impledit_ic_email1",				
					]);


				
					if($request->implcont_cid !='')
					{

						$Hotellccontact_c = Hlconsortiacontacts::where('hl_cons_cont_id',$request->implcont_cid)
						->where('hl_cons_m_id',$hlccid)
						->update([
						'hl_title'=>$request->impledit_ic_title,
						'hl_first_name'=>$request->impledit_ic_first_name,	
						'hl_last_name'=>$request->impledit_ic_last_name,
						'hl_cont_design'=>$request->impledit_ic_contact_designation,
						'hl_mob_no'=>$request->impledit_ic_mobile_no,
						'hl_email'=>$request->impledit_ic_cemail,
						'hl_linked_in'=>$request->impledit_ic_linkedin_contact,
						'hl_clandline_no'=>$request->impledit_ic_clandline_no,
						'hl_skype'=>$request->impledit_ic_skype_contact,
						'hl_dob'=>date('Y-m-d',strtotime($request->impledit_ic_dob))
						]);	

					}
					
				
				
			return back()->with('message','success');
				
	}


	public function updateCorpContact(Request $request)
	{
		
		
		  $this->validate($request,
			 [			 
		
			'ecorp_off_address1'			=> 'required',			
			'ecorp_country1'			=> 'required',
			'ecorp_states1'			=> 'required',			
			'ecorp_postcode1'			=> 'required',
			'ecorp_email1'			=> 'required',
			'ecorp_lead_type1'			=> 'required',			
               
            ],
            [
			
			'ecorp_off_address1.required'			=> 'Office address is required',			
			'ecorp_country1.required'			=> 'Country is required',
			'ecorp_states1.required'			=> 'State is required',		
			'ecorp_postcode1.required'			=> 'Postcode is required',		
			'ecorp_email1.required'			=> 'Email is required',		
			'ecorp_lead_type1.required'			=> 'Lead type is required'		
							
                     ]);
$hlccid=$request->corpcont_mid;
					//$userid = auth()->user()->id;	

					//dd($request->ecorp_location_type1);

					$Hotellccontact_r = Hotelregional::where('hl_regl_id',$hlccid)
					->update([				
					'hl_ofz_address'=>"$request->ecorp_off_address1",					
					'hl_country'=>"$request->ecorp_country1",					
					'hl_state'=>"$request->ecorp_states1",
					'hl_city'=>"$request->ecorp_cities1",
					'hl_postcode'=>"$request->ecorp_postcode1",
					'hl_ofz_no'=>"$request->ecorp_landline_no1",
					'hl_loc_type'=>"$request->ecorp_location_type1",
					'hl_email'=>"$request->ecorp_email1",
					'hl_lead_type'=>"$request->ecorp_lead_type1"					
					]);


				
						
					$cnt = count($request->ecorp_first_name);
					//dd($request->corpcont_cid);
					for($gg = 0; $gg < $cnt; $gg++)
					{
					
					if($request->corpcont_cid[$gg] !='')
					{

						$Hotellccontact_c = Hlcorporatecontact::where('hl_corcont_id',$request->corpcont_cid[$gg])
						->where('hl_reg_loc_id',$hlccid)
						->update([
						'hl_title'=>$request->ecorp_title[$gg],
						'hl_first_name'=>$request->ecorp_first_name[$gg],	
						'hl_last_name'=>$request->ecorp_last_name[$gg],
						'hl_cont_design'=>$request->ecorp_contact_designation[$gg],
						'hl_type_of_cont'=>$request->ecorp_contact_type[$gg],
						'hl_mob_no'=>$request->ecorp_mobile_no[$gg],
						'hl_email'=>$request->ecorp_email[$gg],
						'hl_linked_in'=>$request->ecorp_linkedin_contact[$gg],
						'hl_clandline_no'=>$request->ecorp_landline_no[$gg],
						'hl_skype'=>$request->ecorp_skype_contact[$gg],
						'hl_dob'=>date('Y-m-d',strtotime($request->ecorp_dob[$gg])),
						'hl_event_invite'=>$request->ecorp_invite[$gg]
						]);	

					}else{	
						$Hotellccontact_c = new Hlagentcontact;				
						$Hotellccontact_c->created_by=auth()->user()->id;			
						$Hotellccontact_c->hl_title=$request->ecorp_title[$gg];
						$Hotellccontact_c->hl_first_name=$request->ecorp_first_name[$gg];	
						$Hotellccontact_c->hl_last_name=$request->ecorp_last_name[$gg];
						$Hotellccontact_c->hl_cont_design=$request->ecorp_contact_designation[$gg];
						$Hotellccontact_c->hl_type_of_cont=$request->ecorp_contact_type[$gg];
						$Hotellccontact_c->hl_mob_no=$request->ecorp_mobile_no[$gg];
						$Hotellccontact_c->hl_email=$request->ecorp_email[$gg];
						$Hotellccontact_c->hl_clandline_no=$request->ecorp_landline_no[$gg];
						$Hotellccontact_c->hl_linked_in=$request->ecorp_linkedin_contact[$gg];
						$Hotellccontact_c->hl_skype=$request->ecorp_skype_contact[$gg];
						$Hotellccontact_c->hl_dob=date('Y-m-d',strtotime($request->ecorp_dob[$gg]));
						$Hotellccontact_c->hl_event_invite=$request->ecorp_invite[$gg];
						$Hotellccontact_c->hl_reg_loc_id=$hlccid;
						$Hotellccontact_c->save();
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
					 
								 
									
				// $Hotellccontact_c = new Hlagentcontact;				
				// $Hotellccontact_c->created_by=auth()->user()->id;	
				// $cnt = count($request->first_name);
				// for($gg = 0; $gg < $cnt; $gg++)
				// {				
				// 	$Hotellccontact_c->hl_title=$request->title[$gg];
				// 	$Hotellccontact_c->hl_first_name=$request->first_name[$gg];					
				// 	$Hotellccontact_c->hl_last_name=$request->last_name[$gg];
				// 	$Hotellccontact_c->hl_cont_design=$request->contact_designation[$gg];
				// 	$Hotellccontact_c->hl_type_of_cont=$request->contact_type[$gg];
				// 	$Hotellccontact_c->hl_mob_no=$request->mobile_no[$gg];
				// 	$Hotellccontact_c->hl_email=$request->email[$gg];
				// 	$Hotellccontact_c->hl_linked_in=$request->linkedin_contact[$gg];
				// 	$Hotellccontact_c->hl_skype=$request->skype_contact[$gg];
				// 	$Hotellccontact_c->hl_dob=date('Y-m-d',strtotime($request->dob[$gg]));
				// 	$Hotellccontact_c->hl_event_invite=$request->invite[$gg];
				// 	$Hotellccontact_c->hl_agentcont_id=$request->head_off2[$gg];
				// 	$Hotellccontact_c->save();				
				// 	$hlccid = $Hotellccontact_c->id;	
				// }				
				
								
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
				
		//	return back()->with('message','success');
				
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

     public function viewUsers()

    {		

	//Get Users Details
//DB::enableQueryLog();
	    $users = User::select('*', 'users.id as uid')

		->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')

		->where('role_user.role_id', '=', 4)

		->get();

//dd(DB::getQueryLog());

        return view('panels.crm.view_users', compact('users'));
 }
 public function viewUser($id)

    {		

	//Get Users Details
 $Hotelcorporatecontactbasic=Hotelcorporatecontactbasic::get();	
	    $users = User::where('id', $id)
		->first();

        return view('panels.crm.view_user', compact('users','Hotelcorporatecontactbasic'));

    }

     public function editUser($id)

    {		

	//Get Users Details
 $Hotelcorporatecontactbasic=Hotelcorporatecontactbasic::get();	
	    $users = User::where('id', $id)
		->first();

        return view('panels.crm.edit_user', compact('users','Hotelcorporatecontactbasic'));

    }

   public function addUser()

    {	

    $Hotelcorporatecontactbasic=Hotelcorporatecontactbasic::get();	

	  return view('panels.crm.add_user', compact('Hotelcorporatecontactbasic'));

    }




    public function addedUser(Request $request)

	{

		 

			$this->validate($request,

			 [

                'firstname'            	=> 'required',

                'lastname'             	=> 'required',

                'email'                 => 'required|email|unique:users',

                'password'              => 'required|min:6|max:20',

                'hotel'             	=> 'required',

               

            ],

            [

                'firstname.required'   	=> 'First Name is required',

                'lastname.required'    	=> 'Last Name is required',

                'email.required'        => 'Email is required',

                'email.email'           => 'Email is invalid',

                'password.required'     => 'Password is required',

                'password.min'          => 'Password needs to have at least 6 characters',

                'password.max'          => 'Password maximum length is 20 characters',

                'hotel.required'        => 'Choose business name',


               

            ]);

			
$business=User::where('business_id',$request->hotel)->count();
if($business >= 3){
	return back()->with('message','3 Users only allowed this Business name');
}else{



			

			$photo = $request->file('photo');

			 if($photo){

				$photo = $request->file('photo');

				$imagename = time().'.'.$photo->getClientOriginalExtension();   

				$destinationPath = public_path('/../uploads/thumbnail');

				$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);

				$thumb_img->save($destinationPath.'/'.$imagename,80);                    

				$destinationPath = public_path('/../uploads/original');

				$photo->move($destinationPath, $imagename);

			 }else{

				$imagename="";				 

			 }

				$user = new User;

				$user->first_name=$request->firstname;

				$user->last_name=$request->lastname;

				$user->email=$request->email;

				$user->business_id=$request->hotel;					

				$user->image=$imagename;

                $user->password=bcrypt($request->password);

                $user->token=str_random(64);

                $user->activated=!config('settings.activation');				

				$user->save();	

				

				$role = Role::whereName('crm')->first();				

				$user->assignRole($role);	

								 

				$user_access_modules = new UserAccessModules;

				$user_access_modules->user_id=$user->id;

				$user_access_modules->modules='';			

				$user_access_modules->save();

				

               // $user_access_modules = DB::table('user_access_modules')

				

               // $user_access_modules->save();				

				//$this->initiateEmailActivation($user);



			return back()->with('message','Users added successfully');
			}

	}

		
	public function Userupdated(Request $request)

	{	 

	

	$this->validate($request,

			 [

                'firstname'            	=> 'required',

                'lastname'             	=> 'required',

                'email'                 => 'required|email',               

               

            ],

            [

                'firstname.required'   	=> 'First Name is required',

                'lastname.required'    	=> 'Last Name is required',

                'email.required'        => 'Email is required',

                'email.email'           => 'Email is invalid',              

               

            ]);

			

			// $photo = $request->file('photo');

			//  if($photo){

			// 		$imagename = time().'.'.$photo->getClientOriginalExtension();   

			// 		$destinationPath = public_path('/../uploads/thumbnail');

			// 		$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);

			// 		$thumb_img->save($destinationPath.'/'.$imagename,80);                    

			// 		$destinationPath = public_path('/../uploads/original');

			// 		$photo->move($destinationPath, $imagename);

			// 			 DB::table('users')

			// 			->where('id', $request->id)

			// 			->update(['image' => $imagename,]);

			//  }

			

			if($request->password)

			{

				 DB::table('users')

					->where('id', $request->id)

					->update(['password' => bcrypt($request->password),]);				

			}



				DB::table('users')

				->where('id', $request->id)	

				->update(['first_name' => $request->firstname,'business_id' => $request->hotel,'last_name' => $request->lastname,'email' => $request->email,]);



	return back()->with('message','User updated successfully');

	}





	public function Userdeleted(Request $request)

	{	 

	$id=$request->id;  

		 $blogs = DB::table('users')

		 ->where('id', $id)

		 ->delete();

		 $status['deletedid']=$id;

		 $status['deletedtatus']='User deleted successfully';

	 return '{"delete_details": ' . json_encode($status) . '}'; 

	

	}

public function exportcharts($type)
    {


      $chart_all_data = DB::table('hotel_leads_events')
                  ->join('hl_master_tasks', 'hl_master_tasks.hl_mt_id', '=', 'hotel_leads_events.hle_task_type')
                  ->select('hl_master_tasks.*','hotel_leads_events.*')->get();  

        foreach($chart_all_data as $key => $value){
          $hleId[] =  $value->hle_id;  
          
        }

        foreach ($hleId as $key => $value) {
            $guestFullId[] = DB::table('hle_guests_invite')->where('hle_id',$value)->pluck('searchbar_agents');
        }

        foreach($guestFullId as $key => $value){
          $indCounts = count($value);  //  First array count value = 2

          for($i=0;$i<$indCounts;$i++){
              $guestType[$key][] = $value[$i][0];
              $guestId[$key][] = substr($value[$i], 1);
          }
        }

        $guestTypeCount = count($guestType);

        for($i=0;$i<$guestTypeCount;$i++){
            $arrayId[] = array_combine($guestType[$i], $guestId[$i]);
        }

        foreach($arrayId as $key => $value){

          foreach ($value as $key1 => $data) {
            if($key1 == "c"){
                $accountName[$key][] = DB::table('hl_corporate_contact_basic')->where('hl_ccb_id',$data)->value('hl_business_name');
              }
              if($key1 == "a"){
                  $accountName[$key][] = DB::table('hl_agents_contacts_basic')->where('hl_agentcont_id',$data)->value('hl_business_name');
              }
          }
        }

        foreach($accountName as $key => $value){

          $business_name = implode(",",$value);
            
          $chart_all_data[$key]->accountName = $business_name;
        } 
      //  Testing End 

      foreach($chart_all_data as $key => $value){
          $first_name = DB::table('users')->where('id',$value->uid)->value('first_name');
          $last_name = DB::table('users')->where('id',$value->uid)->value('last_name');
          $out_come = DB::table('hle_outcome_nextstep')->where('hle_id',$value->hle_id)->value('hl_outcome');
          $next_steps = DB::table('hle_outcome_nextstep')->where('hle_id',$value->hle_id)->value('hl_nextstep');
          $region_id = DB::table('users')->where('id',$value->uid)->value('region');
          $region = DB::table('hl_master_regional')->where('hl_ms_r_id',$region_id)->value('hl_regional_name');

          $chart_all_data[$key]->sales_team = $first_name." ".$last_name;
          $chart_all_data[$key]->out_come = $out_come;
          $chart_all_data[$key]->next_steps = $next_steps;
          $chart_all_data[$key]->region = $region;
      }

    $data = $chart_all_data;

    return Excel::create('Sales-Activity-Details', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data)
      {
        $sheet->cell('A1', function($cell) {$cell->setValue('S.NO');   });
        $sheet->cell('B1', function($cell) {$cell->setValue('Date');   });
        $sheet->cell('C1', function($cell) {$cell->setValue('Account Name');   });
        $sheet->cell('D1', function($cell) {$cell->setValue('Activity Type');   });
        $sheet->cell('E1', function($cell) {$cell->setValue('Region');   });
        $sheet->cell('F1', function($cell) {$cell->setValue('APLBC Sales Team');   });
        $sheet->cell('G1', function($cell) {$cell->setValue('Out Come');   });
        $sheet->cell('H1', function($cell) {$cell->setValue('Next Steps');   });

        if (!empty($data)) {
          foreach ($data as $key => $value) {
            $i=$key+2;
            $sNo = $key+1;
         
                  $sheet->cell('A'.$i, $sNo);
                  $sheet->cell('B'.$i, $value->created_at);
                  $sheet->cell('C'.$i, $value->accountName);
                  $sheet->cell('D'.$i, $value->task_name);
                  $sheet->cell('E'.$i, $value->region);
                  $sheet->cell('F'.$i, $value->sales_team);
                  $sheet->cell('G'.$i, $value->out_come);
                  $sheet->cell('H'.$i, $value->next_steps);
            }
          }
        });
            })->download($type);
        }

public function getcharts(Request $request)
{
  $from_date = $request->from_date;
  $to_date = $request->to_date;
  $task_type = $request->task_type;
  $user_id = $request->user_id;
  $region_id = $request->region_id;

  $chart_data = DB::table('hotel_leads_events')
            ->join('hl_master_tasks', 'hl_master_tasks.hl_mt_id', '=', 'hotel_leads_events.hle_task_type')
            ->select('hl_master_tasks.hl_mt_id','hl_master_tasks.task_name', DB::raw('count(*) as total'))->groupBy('hotel_leads_events.hle_task_type');

  $chart_all_data = DB::table('hotel_leads_events')
            ->join('hl_master_tasks', 'hl_master_tasks.hl_mt_id', '=', 'hotel_leads_events.hle_task_type')
            ->select('hl_master_tasks.*','hotel_leads_events.*');

  if($from_date != NULL){
    $chart_data = $chart_data->where('hotel_leads_events.hle_start_date','>=',$from_date);
    $chart_all_data = $chart_all_data->where('hotel_leads_events.hle_start_date','>=',$from_date);
  }
  
  if($to_date != Null){
    $chart_data = $chart_data->where('hotel_leads_events.hle_start_date','<=',$to_date);
    $chart_all_data = $chart_all_data->where('hotel_leads_events.hle_start_date','<=',$to_date);
  }

  if($task_type != 0){
    $chart_data = $chart_data->where('hotel_leads_events.hle_task_type','=',$task_type);
    $chart_all_data = $chart_all_data->where('hotel_leads_events.hle_task_type','=',$task_type);
  }

  if($user_id != 0){
    $chart_data = $chart_data->where('hotel_leads_events.uid','=',$user_id);
    $chart_all_data = $chart_all_data->where('hotel_leads_events.uid','=',$user_id);
  }


  if($region_id != 0){
    $users = DB::table('users')->where('region','=',$region_id)->pluck('id')->toArray();
    $chart_data = $chart_data->whereIn('hotel_leads_events.uid',$users);
    $chart_all_data = $chart_all_data->whereIn('hotel_leads_events.uid',$users);
  }

  $chart_data = $chart_data->get(); 
  $chart_all_data = $chart_all_data->get();   


// Testing Start

  foreach($chart_all_data as $key => $value){
    $hleId[] =  $value->hle_id;  
    
  }

  foreach ($hleId as $key => $value) {
      $guestFullId[] = DB::table('hle_guests_invite')->where('hle_id',$value)->pluck('searchbar_agents');
  }
// $guestFullId = [   [a10,c10],[a20,b20]   ]  Array of arrays

  foreach($guestFullId as $key => $value){
// first array flow [a10,c10]
    $indCounts = count($value);  //  First array count value = 2

    for($i=0;$i<$indCounts;$i++){
        $guestType[$key][] = $value[$i][0];
        $guestId[$key][] = substr($value[$i], 1);
    }
  }

  $guestTypeCount = count($guestType);

  for($i=0;$i<$guestTypeCount;$i++){
      $arrayId[] = array_combine($guestType[$i], $guestId[$i]);
  }


  foreach($arrayId as $key => $value){

    foreach ($value as $key1 => $data) {
      if($key1 == "c"){
          $accountName[$key][] = DB::table('hl_corporate_contact_basic')->where('hl_ccb_id',$data)->value('hl_business_name');
        }
        if($key1 == "a"){
            $accountName[$key][] = DB::table('hl_agents_contacts_basic')->where('hl_agentcont_id',$data)->value('hl_business_name');
        }
    }
  }

  foreach($accountName as $key => $value){

    $business_name = implode(",",$value);
      
    $chart_all_data[$key]->accountName = $business_name;
  }
  
//  Testing End 
 
        foreach($chart_data as $key => $value){
            $data1[] = $value->total;
            $labels[] = $value->task_name." - ".$value->total;
        }

        foreach($chart_all_data as $key => $value){
            $first_name = DB::table('users')->where('id',$value->uid)->value('first_name');
            $last_name = DB::table('users')->where('id',$value->uid)->value('last_name');
            $out_come = DB::table('hle_outcome_nextstep')->where('hle_id',$value->hle_id)->value('hl_outcome');
            $next_steps = DB::table('hle_outcome_nextstep')->where('hle_id',$value->hle_id)->value('hl_nextstep');
            $region_id = DB::table('users')->where('id',$value->uid)->value('region');
            $region = DB::table('hl_master_regional')->where('hl_ms_r_id',$region_id)->value('hl_regional_name');

            $chart_all_data[$key]->sales_team = $first_name." ".$last_name;
            $chart_all_data[$key]->out_come = $out_come;
            $chart_all_data[$key]->next_steps = $next_steps;
            $chart_all_data[$key]->region = $region;
        }

        return ["data" => $data1,"labels" => $labels,"chart_all_data" => $chart_all_data];
    }

    //11-12-19 
public function updateHotelShow($id)
  	{

    $hl_leads = Hotelleads::where('hl_id',$id)->get()->toArray();
    $hl_leads_contacts = Hotelleadscontacts::where('hl_id',$id)->get()->toArray();
    $hl_leads_notes = Hotelleadsnotes::where('hl_id',$id)->get();
    $user_id = (auth()->check()) ? auth()->user()->id : null;
    //dd($hl_leads_contacts);
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
    $hdproperty_type = DB::table('hl_master_property_type')->where('hl_property_status',2)
        ->get(); 
    $hdlead_type = DB::table('hl_master_lead_type')
        ->get();

    $Contactdesignation=Contactdesignation::get();

    $applicable_to = DB::table('hl_master_applicable_to')->get();

      return view('panels.crm.update_hotel',compact('applicable_to','Contactdesignation','hl_leads',
'hl_leads_contacts','hl_leads_notes'),['Category'=>$Category, 'hdproperty_type'=>$hdproperty_type,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities,'hdlead_type' => $hdlead_type]);

    }


    public function hotelUpdated(Request $request)
  {
    
    //dd($request->all());
      $this->validate($request,
       [       
    
      'hotel_type'      => 'required',
      'title'     => 'required',
      'address1'      => 'required',
      'country'     => 'required',
      'states'      => 'required',
      // 'cities'     => 'required',
      'postcode'      => 'required',
      'website'     => 'required',
      'contact_no'      => 'required',
      'no_of_room'      => 'required',
      'no_of_m_room'      => 'required',
      'star_rate'     => 'required',
      'lead_type'     => 'required',
      'property_type'     => 'required'
               
            ],
            [
      
      'hotel_type.required'     => 'Hostel Type is required',
      'title.required'      => 'Title is required',
      'address1.required'     => 'Address is required',
      'country.required'      => 'Country is required',
      'states.required'     => 'State is required',
      // 'cities.required'      => 'Cities is required',    
      'postcode.required'     => 'Postcode is required',    
      'website.required'      => 'Website is required',   
      'contact_no.required'     => 'Contact No is required',    
      'no_of_room.required'     => 'No of room is required',    
      'no_of_m_room.required'     => 'No of meeting room is required',    
      'star_rate.required'      => 'Star Rate is required',   
      'lead_type.required'      => 'Lead Type is required',         
      'property_type.required'      => 'Property Type is required',         
                     ]);
           
                   
        $Hotell = Hotelleads::where('hl_id',$request->id)   
          ->update([        
            'hl_created_by'=>auth()->user()->id,        
            'hl_type'=>$request->hotel_type,
            'hl_grp_name'=>$request->grp_name,          
            'hl_name'=>$request->title,
            'hl_address'=>$request->address1,
            'hl_country'=>$request->country,
            'hl_state'=>$request->states,
            'hl_city'=>$request->cities,
            'hl_postcode'=>$request->postcode,
            'hl_website'=>$request->website,
            'hl_contact_no'=>$request->contact_no,            
            'hl_no_room'=>$request->no_of_room,           
            'hl_no_m_room'=>$request->no_of_m_room,           
            'hl_star_rate'=>$request->star_rate,            
            'hl_lead_type'=>$request->lead_type,        
            'hl_property_type'=>implode(',', $request->property_type),
            'solution_type' => implode(',', $request->solution_type),       
            'notes' => $request->hotel_description,   
          ]);         
                          

          $hlid = $request->id;       
        
        $firstname=$request->firstname;
        $contact_status_hidden=$request->contact_status_hidden;
        
        $contact_status_hiddenval = explode(",",$contact_status_hidden);
        
        $tot=count($request->firstname);
        //dd($firstname);
//DB::enableQueryLog(); // Enable query log

        for ($i=0; $i < $tot; $i++) { 

              $hlcontacts = new Hotelleadscontacts;
              $hlcontacts->hl_c_title=$request->c_title[$i];
              $hlcontacts->hl_c_firstname=$request->firstname[$i];
              $hlcontacts->hl_c_lastname=$request->lastname[$i];
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
}