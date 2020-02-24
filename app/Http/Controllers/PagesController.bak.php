<?php
namespace App\Http\Controllers;
use Mail;
use App\Http\Requests;
use App\Models\Leads;
use App\Models\Hotels;
use App\Models\Country;

use App\Http\Controllers\Controller;
use App\Mail\SearchVenue;
use App\Models\Category;
use App\Models\Clientshoutouts;
use App\Models\Partnership;
use App\Models\Partners;
use App\Models\Guest;
use App\Models\Travel;



use Illuminate\Http\Request;
use Image;
use DB;
class PagesController extends Controller
{


    public function getHome()
    {
      //  DB::enableQueryLog();
		// $category= Category::all();
		 $category = DB::table('category')->where('home_page',1)
		->leftJoin('category_slug', 'category_slug.id','=','category.c_slug_id')
		->where('category.parent_id', 0)
		->get();

        $date = date("Y-m-d");
        $fdate = strtotime(date("Y-m-d", strtotime($date)) . "+2 months");
        $monthdate = date("Y-m-d",$fdate);
        $offer = Hotels::whereBetween('offer_end_date', [$date, $monthdate])->get();        
		//	dd(DB::getQueryLog());
		$title = 'Welcome to TBBC';
        //return view('pages.home',compact('title','offer'),['category'=>$category,'dmenu'=>$category]);
        return view('auth.login');

    }

    public static function getPartner()
  {     
      $menu = DB::table('partners')         
         ->orderby('n_id', 'desc')    
         ->get();
       // dd($menu);
        $tit=''; 
        foreach($menu as $menu)
         {  
           $url = url('').'/uploads/thumbnail/'.$menu->n_image;
           $tit .= '<a href="#"><img src="'.$url.'" alt=""></a>'; 
        }
      
      echo $tit;
    
  }
     
	 public static function getallcategory()
    {
	 $category=Category::all();
      $responsecode = 200;        
      $header = array (
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            ); 
			$value=array();
foreach($category as $category)	{
	$value[]=$category->c_title;
}		
    return response()->json($value , $responsecode, $header, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); 		
			 
		

    }
 
   

public function caseStudy($slug = null)
    {  

        $Clientshoutout= Clientshoutouts::where('n_slug',$slug)->first();
        $title='Case Study';
        $page='';    
        $keyword='';
        $desc='';
        return view('pages.case-study',compact('menu','page','title','keyword','desc','Clientshoutout'));
       
   }

 

    public function DynamicPages($slug = null)
    {

         $page = DB::table('menu')
            //->select('*', 'pages.id as pid','pages.title as ptitle')
            ->leftJoin('pages', 'pages.menu_id', '=', 'menu.id')
            ->where('menu.slug', '=', $slug)
            ->first();
        if($page){
            $page=$page;
            $title=$page->title;
            $keyword=$page->meta_tag;
            $desc=$page->meta_description;
        }else{$page='';$title='';$keyword='';$desc='';}
        
        $menu = DB::table('menu')
                 ->where('parent_id', 0)
                 ->orderby('order_by', 'asc')        
                 ->get();
      $country= Country::all()->where('status',1);


        if($slug=='what-we-do'){
            $Partners= Partners::all();

            return view('pages.what_we_do',compact('menu','page','title','keyword','desc','Partners','country'));
        }elseif($slug=='client-shout-outs'){

          
            $Clientshoutouts= Clientshoutouts::all();
            
            return view('pages.client_shout_outs',compact('menu','page','title','keyword','desc','Clientshoutouts','country'));
        }elseif($slug=='partner-ship'){


            $Partnership= Partnership::all();
            
            return view('pages.partnership',compact('menu','page','title','keyword','desc','Partnership','country'));
        }elseif($slug=='club-bb'){


            $GuestHotels= Guest::all();
            $TravelHotels= Travel::all();
            $guest = DB::table('pages')
                 ->where('id', 7)                  
                 ->first();
            $travel = DB::table('pages')
                 ->where('id', 8)                  
                 ->first();
            
            return view('pages.club-bb',compact('menu','page','title','keyword','desc','GuestHotels','TravelHotels','guest','travel','country'));
        }

        else{
            return view('pages.dynamicpage',compact('menu','page','title','keyword','desc','country')); 
        }
             
        

    }


    
    
	
	public function added(Request $request)
	{
		  $this->validate($request,
			 [
                'event_type'          	=> 'required',
                'event_date'            => 'required',
				'name'		=> 'required',
                'no_of_guest'             => 'required|integer',
                'bph' 	=> 'required',
				'email' 	=> 'required|email',
				
               
            ],
            [
              
                'event_type.required'    		=> 'Enter a type of event is required',
                'event_date.required'        	=> 'Date is required',
                'name.required'         => 'Full name is required',				
                'no_of_guest.required'        	=> 'Number of Guests is required',                 
				'bph.required'    => 'Budget for head is required',	
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
			/*	$content='<table width="400" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><strong>Name:</strong></td>
    <td>'.$request->name.'</td>
  </tr>
  <tr>
    <td><strong>Email:</strong></td>
    <td>'.$request->email.'</td>
  </tr>
  <tr>
    <td><strong>Type of event</strong></td>
    <td>'.$request->event_type.'</td>
  </tr>
  <tr>
    <td><strong>Date:</strong></td>
    <td>'.$request->event_date.'</td>
  </tr>
  <tr>
    <td><strong>No of Guests:</strong></td>
    <td>'.$request->no_of_guest.'</td>
  </tr>
  <tr>
    <td><strong>Budget for head:</strong></td>
    <td>'.$request->bph.'</td>
  </tr>
</table>';*/
				Mail::send('emails.searchvenue', ['name' => $request->name,'email' =>$request->email,'event_type' => $request->event_type,'event_date' => $request->event_date,'no_of_guest' => $request->no_of_guest,'bph' => $request->bph], function ($message)
					{

						$message->from('info@searchvenue.co.uk', 'searchvenue.co.uk');
						//$message->to('ravigneswaran@gmail.com ');
						//$message->cc('vuition@live.co.uk');
						$message->to('alexander.mca08@gmail.com');
						$message->subject('New Searchvenue Enquiry');

					});

		
		return redirect('/')->with('message',$request->event_type);
	}
}