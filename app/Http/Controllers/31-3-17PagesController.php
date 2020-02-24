<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\SearchVenue;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Leads;
use App\Http\Controllers\Controller;
use Image;

class PagesController extends Controller
{

    public function getHome()
    {
		$title = 'Welcome to Searchvenue';
        return view('pages.home',compact('title'));

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
				$content='<table width="400" border="0" cellspacing="2" cellpadding="2">
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
</table>';
			/*	Mail::send('emails.send', ['content' => $content], function ($message)
					{

						$message->from('info@searchvenue.co.uk', 'info');
						$message->to('alexander.mca08@gmail.com');
						$message->subject('New Searchvenue Enquiry');

					});*/
		$to_email = 'alexander.mca08@gmail.com';
        Mail::to($to_email)->send(new SearchVenue);
		return redirect('/')->with('message',$request->event_type);
	}
}