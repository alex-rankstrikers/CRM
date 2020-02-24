<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Leads;
use App\Models\Enquiry;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Image;
use Mail;
use App\Mail\SearchVenue;

class ContactUsController extends Controller
{

    public function getHome()
    {

    	$page = DB::table('menu')
            //->select('*', 'pages.id as pid','pages.title as ptitle')
            ->leftJoin('pages', 'pages.menu_id', '=', 'menu.id')
            ->where('menu.slug', '=', 'contact-us')
            ->first();
        if($page){
            $page=$page;
            $title=$page->title;
            $keyword=$page->meta_tag;
            $desc=$page->meta_description;
        }else{$page='';$title='';$keyword='';$desc='';}
		$title = 'Contact Us';
		$country= Country::all()->where('status',1);
	
        return view('pages.contact_us',compact('menu','page','title','keyword','desc','country'));       

    }
	public function added(Request $request)
	{
		   $this->validate($request,
			 [
               
                'first_name'            => 'required',
                'last_name'            => 'required',
                'email' 	=> 'required|email',
                'phone'		=> 'required', 
                'country'            => 'required',
                'message'            => 'required',
                'ch_in_date'            => 'required',
                'ch_out_date'            => 'required',
                'adults' 	=> 'required',
                'children' 	=> 'required',
                'beds' 	=> 'required',				             
                'budget' 	=> 'required',
                'purpose' 	=> 'required',		
				
               
            ],
            [
              
                'inquiry_type.required'        	=> 'Inquiry type is required',
                'first_name.required'        	=> 'First name is required',
                'last_name.required'        	=> 'Last name is required',
                'email.required'    => 'Email is required',
                'phone.required'         => 'Contact number is required', 	
                'country.required'        	=> 'Country name is required',
                'message.required'    => 'Message is required',
                'ch_in_date.required'        	=> 'Check in date is required',
                'ch_out_date.required'        	=> 'Check out date is required',
                'adults.required'        	=> 'Adults is required',
                'children.required'        	=> 'Children is required',
                'beds.required'        	=> 'Beds is required',
                'budget.required'        	=> 'Budget is required',
                'purpose.required'        	=> 'Purpose is required',
							
               
            ]);

		   
			//dd(implode(',', $request->children));

			   if(count($request->adults) > 1){
			   		$adults=implode('-', $request->adults);
			   }else{
			   		$adults=$request->adults;			   		
			   }
			   if(count($request->children) > 1){
			   		$child=implode('-', $request->children);
			   }else{
			   		$child=$request->children;
			   }
			   if(count($request->beds) > 1){
			   		$beds=implode('-', $request->beds);
			   }else{
			   		$beds=$request->beds;
			   }

				$leads = new Enquiry;
				$leads->inquiry_type=$request->inquiry_type;
				$leads->first_name=$request->first_name;
				$leads->last_name=$request->last_name;			
				$leads->email=$request->email;
				$leads->phone=$request->phone;
				$leads->country=$request->country;
				$leads->message=$request->message;
				$leads->ch_in_date=$request->ch_in_date;
				$leads->ch_out_date=$request->ch_out_date;
				$leads->adults=$adults;
				$leads->children=$child;
				$leads->beds=$beds;
				$leads->budget=$request->budget;
				$leads->purpose=$request->purpose;
				$leads->spl_request=$request->spl_request;				
				$leads->save();

				Mail::send('emails.contact_us', ['inquiry_type' => $request->inquiry_type,'first_name' => $request->first_name,'last_name' => $request->last_name,'email' =>$request->email, 'phone' => $request->phone,'inquiry_type' => $request->inquiry_type, 'country' => $request->country,'message' => $request->message,'ch_in_date' => $request->ch_in_date,'ch_out_date' => $request->ch_out_date,'adults' => $adults,'children' => $child,'beds' => $beds,'budget' => $request->budget,'purpose' => $request->purpose,'spl_request' => $request->spl_request,], function ($message)
					{

						$message->from('info@tbbc.com', 'searchvenue.com');
						$message->to('enquiry@tbbc.com');
						//$message->cc('alexander.mca08@gmail.com');
						$message->bcc('alexander.mca08@gmail.com');
						$message->subject('New Enquiry from TBBC');

					});
			return back()->with('message','Successfully sent your enquiry');
	}
}