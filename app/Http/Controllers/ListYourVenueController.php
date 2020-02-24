<?php



namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Leads;

use App\Models\AskVenueExpert;



use App\Http\Controllers\Controller;

use Image;

use Session;

use Mail;

use App\Mail\SearchVenue;


class ListYourVenueController extends Controller

{



    public function getHome($slug=null)

    {

    	//DB::enableQueryLog();

		if($slug){	

		$title = 'List Your Venue';

		$category = DB::table('category_slug')

		 ->leftJoin('category', 'category.c_slug_id', '=', 'category_slug.id')

			 ->where('slug', $slug)			 

			 ->first();

			

		}else{

		$slug=$_GET['search'];

		$category='';

		}

		 $cat = DB::table('category')

		->leftJoin('category_slug', 'category_slug.id','=','category.c_slug_id')

		->where('category.parent_id', 0)

		->get();

		//dd(DB::getQueryLog());

		//echo $_GET['search'].$slug;

		Session::put('slug', $slug);

		

        return view('pages.list_your_venue',compact('title'),['slug'=>$slug,'category'=>$category,'dmenu'=>$cat]);

     



    }

	 public function venue_details($id)

    {

		$title = 'Venue details';

		$venue = DB::table('venue')

		->select('*', 'venue_contact.title as venuetitle','venue.title as space','venue_contact.description as vc_description','venue.description as space_description')

		->leftJoin('venue_contact', 'venue_contact.user_id','=','venue.user_id')

			 ->where('v_id', $id)			 

			 ->first();

		

		//More spaces from the Host

		

		$venue_host_user = DB::table('venue')		

			 ->where('v_id', $id)			 

			 ->first();

		

			$venue_host = DB::table('venue')		

			 ->where('user_id', $venue_host_user->user_id)	

			 ->where('v_id', '!=' , $id)			 

			 ->get();

			  $venue_host = DB::table('venue')		

			 ->where('user_id', $venue_host_user->user_id)	

			 ->where('v_id', '!=' , $id)			 

			 ->get();

			 

			$slug=Session::get('slug');

			

			if($slug){

		$page=null;				

		$start = ($page - 1)*12;			

			//dd(DB::getQueryLog())

			$category = DB::table('category_slug')

			->leftJoin('category', 'category.c_slug_id', '=', 'category_slug.id')

			 ->where('category_slug.slug', $slug)			 

			 ->first();

			//$category->c_id;			

			 $venue_similar = DB::table('venue')

			 ->whereRaw('FIND_IN_SET('.$category->c_id.', category_id)')			

			 ->where('status', 'Disable')

			  ->where('v_id', '!=' , $id)

			 ->limit(12)->offset($start)			 

			 ->get();  

			}else{

				$venue_similar ='';

			}

			

			

			

		// User Payment type

		$payment_user = DB::table('user_payment_type')		

			 ->where('u_id', $venue_host_user->user_id)			 

			 ->first();	

	 if($payment_user->type==2){

		 $user_con = DB::table('venue_contact')		

			 ->where('user_id', $venue_host_user->user_id)			 

			 ->first();

		 $payment=2;

		 $contact_no=$user_con->contact_no;

	 }else{

		 $payment='';

	 };

	

		/*$venue_contact = DB::table('venue_contact')

			 ->where('v_c_id', $venue->venue_c_id)			 

			 ->first();

			 */

			 $venue_capacity = DB::table('user_venue_capacity')

			 ->leftJoin('venue_capacity', 'venue_capacity.id', '=', 'user_venue_capacity.capacity_id')

			 ->where('user_venue_capacity.venue_id', $id)			 

			 ->get();

			 

			 $venue_features = DB::table('user_venue_features')

			 ->leftJoin('venue_features', 'venue_features.id', '=', 'user_venue_features.features_id')

			 ->where('user_venue_features.venue_id', $id)			 

			 ->get();

			 

			 $venue_fooddrink = DB::table('user_venue_fooddrink')

			 ->leftJoin('venue_fooddrink', 'venue_fooddrink.id', '=', 'user_venue_fooddrink.fooddrink_id')

			 ->where('user_venue_fooddrink.venue_id', $id)			 

			 ->get();

			 

			 $venue_licensing = DB::table('user_venue_licensing')

			 ->leftJoin('venue_licensing', 'venue_licensing.id', '=', 'user_venue_licensing.licensing_id')

			 ->where('user_venue_licensing.venue_id', $id)			 

			 ->get();

			 

			 $venue_restrictions = DB::table('user_venue_restrictions')

			 ->leftJoin('venue_restrictions', 'venue_restrictions.id', '=', 'user_venue_restrictions.restrictions_id')

			 ->where('user_venue_restrictions.venue_id', $id)			 

			 ->get();

			 

			  $cat = DB::table('category')

		->leftJoin('category_slug', 'category_slug.id','=','category.c_slug_id')

		->where('category.parent_id', 0)

		->get();

		

			 //	title $venue_similar

        return view('pages.venue_details',compact('title'),['venue_host'=>$venue_host,'venue_similar'=>$venue_similar,'venue'=>$venue,'venue_capacity'=>$venue_capacity,'venue_features'=>$venue_features,'venue_fooddrink'=>$venue_fooddrink,'venue_licensing'=>$venue_licensing,'venue_restrictions'=>$venue_restrictions,'venue_id'=>$id,'dmenu'=>$cat,'payment'=>$payment,'contact_no'=>$contact_no]);

     



    }

	public static function onload_venues($page=null,$slug=null)

		{

			

			$start = ($page - 1)*12;

			if($slug){				

			//dd(DB::getQueryLog())

			$category = DB::table('category_slug')

			->leftJoin('category', 'category.c_slug_id', '=', 'category_slug.id')

			 ->where('category_slug.slug', $slug)			 

			 ->first();

			$category->c_id;

			

			 $venue = DB::table('venue')

			 ->whereRaw('FIND_IN_SET('.$category->c_id.', category_id)')

			 //->where('category_id', $category->c_id)

			 ->where('status', 'Disable')

			 ->limit(12)->offset($start)			 

			 ->get();  

			}else

			{

				

			 $venue = DB::table('venue')

			 ->where('status', 'Disable')

			 ->limit(12)->offset($start)			 

			 ->get();  

				

			}

			

	//dd(DB::getQueryLog());



			 

		 echo '{"venues": ' . json_encode($venue) . '}';

	}

	public static function getOnloadVenuesMoreSpacesHost($page=null,$slug=null)

		{

			

			$start = ($page - 1)*12;

			if($slug){				

			//dd(DB::getQueryLog())

			$category = DB::table('category_slug')

			->leftJoin('category', 'category.c_slug_id', '=', 'category_slug.id')

			 ->where('category_slug.slug', $slug)			 

			 ->first();

			$category->c_id;

			

			 $venue = DB::table('venue')

			 ->whereRaw('FIND_IN_SET('.$category->c_id.', category_id)')

			 //->where('category_id', $category->c_id)

			 ->where('status', 'Disable')

			 ->limit(12)->offset($start)			 

			 ->get();  

			}else

			{

				

			 $venue = DB::table('venue')

			 ->where('status', 'Disable')

			 ->limit(12)->offset($start)			 

			 ->get();  

				

			}

			

	//dd(DB::getQueryLog());



			 

		 echo '{"venues": ' . json_encode($venue) . '}';

	}

	

	

	

	public static function onload_venues_search($page=null,$search=null,$location=null)

		{

			

			$start = ($page - 1)*12;

			if($search){				

			//dd(DB::getQueryLog())

			$category = DB::table('category_slug')

			->leftJoin('category', 'category.c_slug_id', '=', 'category_slug.id')

			 ->where('category_slug.slug', $search)			 

			 ->first();

		/*	 

			$category = DB::table('category_slug')

			->leftJoin('category', 'category.c_slug_id', '=', 'category_slug.id')

			 ->where('category_slug.slug', $slug)			 

			 ->first();

			$category->c_id;*/

			

			 $venue = DB::table('venue')

			 ->whereRaw('FIND_IN_SET('.$category->c_id.', category_id)')

			 //->where('category_id', $category->c_id)

			 ->where('status', 'Disable')

			 ->limit(12)->offset($start)			 

			 ->get();  

			}else

			{

				

			 $venue = DB::table('venue')

			 ->where('status', 'Disable')

			 ->limit(12)->offset($start)			 

			 ->get();  

				

			}

			

	//dd(DB::getQueryLog());



			 

		 echo '{"venues": ' . json_encode($venue) . '}';

	}

	

	

	

	

	public function added(Request $request)

	{

		  $this->validate($request,

			 [

                

                'event_date'            => 'required',

				'event_time'            => 'required',

				'name'		=> 'required',

				'phone'		=> 'required',

                'no_of_guest'             => 'required',

                'bph' 	=> 'required',

				'email' 	=> 'required|email',

				

               

            ],

            [

              

                'event_date.required'        	=> 'Date is required',

				'event_time.required'        	=> 'Time is required',

                'name.required'         => 'Full name is required',	

				'phone.required'         => 'Contact Number is required',				

                'no_of_guest.required'        	=> 'Number of Guests is required',

				'bph.required'    => 'Budget for head is required',	

				'email.required'    => 'Email is required',				

               

            ]);

			$time = date('H:i:s', strtotime($request->event_time));

				$leads = new Leads;				

				$leads->venue_id=$request->venue_id;

				$leads->name=$request->name;

				$leads->phone=$request->phone;

				$leads->email=$request->email;

				$leads->event_time=$time;				

				$leads->event_date=$request->event_date;

				$leads->no_of_guest=$request->no_of_guest;							

				$leads->bph=$request->bph;

				$leads->specific_req=$request->specific_req;

				$leads->promocode=$request->promocode;

				

				$leads->save();

				$venue = DB::table('venue')

					 ->where('v_id', $request->venue_id)

					 ->first();

					 

				$title=$venue->title;

				/*	

				Mail::send('emails.searchvenue', ['title' => $title,'name' => $request->name,'phone' => $request->phone,'email' =>$request->email,'event_type' => $request->event_type,'event_date' => $request->event_date,'event_time' => $request->event_time,'no_of_guest' => $request->no_of_guest,'bph' => $request->bph], function ($message)

					{



						$message->from('info@searchvenue.co.uk', 'searchvenue.co.uk');

						//$message->to('ravigneswaran@gmail.com ');

						//$message->cc('vuition@live.co.uk');

						$message->to('alexander.mca08@gmail.com');

						$message->subject('New Searchvenue Enquiry');



					});*/



		$data='Successfully send your venue enquiry';

		return redirect('/venue-details/'.$request->venue_id)->with('message',$data);

	}

	

	

	public function multiadded(Request $request)

	{

		  $this->validate($request,

			 [

                

                'event_date'            => 'required',

				'event_time'            => 'required',

				'name'		=> 'required',

				'phone'		=> 'required',

                'no_of_guest'             => 'required',

                'bph' 	=> 'required',

				'email' 	=> 'required|email',

				

               

            ],

            [

              

                'event_date.required'        	=> 'Date is required',

				'event_time.required'        	=> 'Time is required',

                'name.required'         => 'Full name is required',	

				'phone.required'         => 'Contact Number is required',				

                'no_of_guest.required'        	=> 'Number of Guests is required',

				'bph.required'    => 'Budget for head is required',	

				'email.required'    => 'Email is required',				

               

            ]);

			//$cartItems = Cart::content(); 

			//print_r(count($request->venue_id));

			//exit;

			$cartItems = Cart::content();

			foreach($cartItems as $venue_id)

			{

			$time = date('H:i:s', strtotime($request->event_time));

				$leads = new Leads;				

				$leads->venue_id=$venue_id->id;

				$leads->name=$request->name;

				$leads->phone=$request->phone;

				$leads->email=$request->email;

				$leads->event_time=$time;				

				$leads->event_date=$request->event_date;

				$leads->no_of_guest=$request->no_of_guest;							

				$leads->bph=$request->bph;

				$leads->specific_req=$request->specific_req;

				$leads->promocode=$request->promocode;

				

				$leads->save();

				$venue = DB::table('venue')

					 ->where('v_id', $venue_id->id)

					 ->first();

					 

				$title=$venue->title;

			}

				/*	

				Mail::send('emails.searchvenue', ['title' => $title,'name' => $request->name,'phone' => $request->phone,'email' =>$request->email,'event_type' => $request->event_type,'event_date' => $request->event_date,'event_time' => $request->event_time,'no_of_guest' => $request->no_of_guest,'bph' => $request->bph], function ($message)

					{



						$message->from('info@searchvenue.co.uk', 'searchvenue.co.uk');

						//$message->to('ravigneswaran@gmail.com ');

						//$message->cc('vuition@live.co.uk');

						$message->to('alexander.mca08@gmail.com');

						$message->subject('New Searchvenue Enquiry');



					});*/

		Cart::destroy();

		$data='Successfully send your venue enquiry';

		return redirect('/get-a-quotes')->with('message',$data);

	}

	

	public function addedAjax(Request $request)

	{

		  $this->validate($request,

			 [

                

                'event_date'            => 'required',

				'event_time'            => 'required',

				'name'		=> 'required',

				'phone'		=> 'required',

                'no_of_guest'             => 'required',

                'bph' 	=> 'required',

				'email' 	=> 'required|email',

				

               

            ],

            [

              

                'event_date.required'        	=> 'Date is required',

				'event_time.required'        	=> 'Time is required',

                'name.required'         => 'Full name is required',	

				'phone.required'         => 'Contact Number is required',				

                'no_of_guest.required'        	=> 'Number of Guests is required',

				'bph.required'    => 'Budget for head is required',	

				'email.required'    => 'Email is required',				

               

            ]);

			$time = date('H:i:s', strtotime($request->event_time));

				$leads = new Leads;				

				$leads->venue_id=$request->venue_id;

				$leads->name=$request->name;

				$leads->phone=$request->phone;

				$leads->email=$request->email;

				$leads->event_time=$time;				

				$leads->event_date=$request->event_date;

				$leads->no_of_guest=$request->no_of_guest;							

				$leads->bph=$request->bph;

				$leads->specific_req=$request->specific_req;

				$leads->promocode=$request->promocode;				

				$leads->save();

				$venue = DB::table('venue')

					 ->where('v_id', $request->venue_id)

					 ->first();

					 

				$title=$venue->title;

				$user_id=$venue->user_id;

				

				$user = DB::table('users')

					 ->where('id', $user_id)

					 ->first();

				

				Mail::send('emails.searchvenue', ['title' => $title,'name' => $request->name,'phone' => $request->phone,'email' =>$request->email,'event_type' => $request->event_type,'event_date' => $request->event_date,'event_time' => $request->event_time,'no_of_guest' => $request->no_of_guest,'bph' => $request->bph], function ($message) use ($user)

					{



						$message->from('info@searchvenue.co.uk', 'searchvenue.co.uk');

						//$message->to('ravigneswaran@gmail.com ');

						//$message->cc('vuition@live.co.uk');

						$message->to($user->email);

						$message->subject('New Searchvenue Enquiry');



					});



	

		//$data['status']='Successfully send your venue enquiry';

		 return json_encode(array('msg' => 'Successfully send your venue enquiry')); 

		//return redirect('/venue-details/'.$request->venue_id)->with('message',$data);

	}

	

	 public function ask_a_venue_expert()

    {

		

		$title = 'Ask a Venue Expert';

        return view('pages.ask_a_venue_expert',compact('title'));

     



    }

	public function ask_a_venue_added(Request $request)

    {

		

		$this->validate($request,

			 [

			     'event_type' => 'required',

				'location' => 'required',

				'venue_style' => 'required',

				'budget_type' => 'required',

				'budget' => 'required|integer',

				'layout' => 'required',

				'no_of_people' => 'required',

				'event_date' => 'required',

				'event_time' => 'required',

				'equipment' => 'required',

				'accommodation' => 'required',

				'full_name' => 'required',

				'phone' => 'required',

				'email' => 'required|email',	

               

            ],

            [

				'event_type' => 'Event type required',

			    'location.required' => 'Location is required',

				'venue_style.required' => 'Venue style is required',

				'budget_type.required' => 'Budget type required',

				'budget.required' => 'Budget is required',

				'layout.required' => 'Layout is required',

				'no_of_people.required' => 'This field is required',

				'event_date.required' => 'Event date is required',

				'event_time.required' => 'Event time is required',

				'equipment.required' => 'Equipment is required',

				'accommodation.required' => 'accommodation isrequired',

				'full_name.required' => 'Full name is required',

				'phone.required' => 'Phone number is required',

				'email.required' => 'Email is required',		

               

            ]);

			$time = date('H:i:s', strtotime($request->event_time));

			

				$askvenueexpert = new AskVenueExpert;				

				$askvenueexpert->event_type=$request->event_type;

				$askvenueexpert->location=$request->location;

				$askvenueexpert->venue_style=$request->venue_style;

				$askvenueexpert->budget_type=$request->budget_type;

				$askvenueexpert->budget=$request->budget;

				$askvenueexpert->layout=$request->layout;

				$askvenueexpert->no_of_people=$request->no_of_people;

				$askvenueexpert->event_date=$request->event_date;

				$askvenueexpert->event_time=$time;

				$askvenueexpert->equipment=$request->equipment;				

				$askvenueexpert->accommodation=$request->accommodation;

				$askvenueexpert->full_name=$request->full_name;

				$askvenueexpert->phone=$request->phone;

				$askvenueexpert->email=$request->email;

				$askvenueexpert->specific_req=$request->specific_req;

				$askvenueexpert->save();

				

				

				

				

				Mail::send('emails.askvenueexpert', ['location' => $request->location,'venue_style' => $request->venue_style,'budget_type' => $request->budget_type,'budget' => $request->budget,'layout' => $request->layout,'no_of_people' => $request->no_of_people,'event_date' => $request->event_date,'event_time' => $request->event_time,'equipment' => $request->equipment,'accommodation' => $request->accommodation,'full_name' => $request->full_name,'phone' => $request->phone,'email' => $request->email,], function ($message)

					{



						$message->from('info@searchvenue.co.uk', 'searchvenue.co.uk');

						//$message->to('ravigneswaran@gmail.com ');

						//$message->cc('vuition@live.co.uk');

						$message->to('alexander.mca08@gmail.com');

						$message->subject('New Ask a Venue Expert Enquiry');



					}); 

$data="Thank you for your enquiry. A venue expert will be in touch with you shortly.";

		

		return redirect('/ask-a-venue-expert')->with('message',$data);

     



    }

	/*

	public function added(Request $request)

	{

		  $this->validate($request,

			 [

                'venue_name'          	=> 'required',

                'name'            => 'required',

				'phone'		=> 'required',

                'postcode'     => 'required',

                'message' 	=> 'required',

				'email' 	=> 'required|email',

				

               

            ],

            [

              

                'venue_name.required'    		=> 'Venue name is required',

                'name.required'        	=> 'Full name is required',

                'phone.required'         => 'Contact number is required',				

                'postcode.required'        	=> 'Postcode is required',                 

				'message.required'    => 'Message is required',	

				'email.required'    => 'Email is required',				

               

            ]);

			

				$leads = new Leads;

				$leads->name=$request->name;

				$leads->email=$request->email;

				$leads->event_type=$request->event_type;			

				$leads->event_date=$request->event_date;

				$leads->no_of_guest=$request->no_of_guest;

				$leads->bph=$request->bph;

				$leads->save();

				



Mail::send('emails.listvenue', ['venue_name' => $request->venue_name,'name' => $request->name,'email' =>$request->email,'phone' => $request->phone,'postcode' => $request->postcode,'mes' => $request->message], function ($message)

					{



						$message->from('info@searchvenue.co.uk', 'searchvenue.co.uk');

					    $message->to('ravigneswaran@gmail.com ');

						$message->cc('vuition@live.co.uk');

						$message->bcc('alexander.mca08@gmail.com');

						$message->subject('New List Your Venue Enquiry');



					});

				

			return redirect('/list-your-venue')->with('message',$request->name);

	}

	*/

}