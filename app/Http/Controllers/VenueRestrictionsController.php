<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueRestrictions;
use App\Http\Controllers\Controller;



class VenueRestrictionsController extends Controller
{
    // 
	public function index()
    {		
	   $VenueRestrictions= VenueRestrictions::all();
       return view('panels.admin.restrictions.index',['VenueRestrictions'=>$VenueRestrictions]);
    }
	
	public function getrestrictions(Request $request)
		{
			 $id=$request->id;  
			 $VenueRestrictions = DB::table('venue_restrictions')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueRestrictions) . '}';
	}
		
	public function added(Request $request)
	{
		
		$this->validate($request,
			 [
                'title'            	=> 'required',               
               
            ],
            [
                'title.required'   	=> 'Title is required',            
               
            ]);
			
		
			
				$VenueRestrictions = new VenueRestrictions;				
				$VenueRestrictions->title=$request->title;				
				$VenueRestrictions->save();
			return redirect('admin/venue/restrictions')->with('message','Venue Restrictions added successfully');
	}
	public function updated(Request $request)
	{	 
			
			$this->validate($request,
			 [
                'title'            	=> 'required',               
               
            ],
            [
                'title.required'   	=> 'Title is required',            
               
            ]);
			
				
				DB::table('venue_restrictions')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/venue/restrictions')->with('message','Venue Restrictions updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('venue_restrictions')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Venue Restrictions deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue_restrictions')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/venue/restrictions')->with('message','Seltected Venue Restrictions are deleted successfully');			

	}
}