<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueType;
use App\Http\Controllers\Controller;



class VenueTypeController extends Controller
{
    //
	public function index()
    {		
	   $VenueType= VenueType::all();
       return view('panels.admin.venue_type.index',['VenueType'=>$VenueType]);
    }
	
	public function getcapacity(Request $request)
		{
			 $id=$request->id;  
			 $VenueType = DB::table('venue_type')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueType) . '}';
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
			
			
				$VenueType = new VenueType;				
				$VenueType->title=$request->title;				
				$VenueType->save();
			return redirect('admin/venue/venue-type')->with('message','Venue Type added successfully');
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
			
				
				DB::table('venue_type')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/venue/venue-type')->with('message','Venue Type updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('venue_type')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Venue Type deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue_type')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/venue/venue-type')->with('message','Venue Type are deleted successfully');			

	}
}