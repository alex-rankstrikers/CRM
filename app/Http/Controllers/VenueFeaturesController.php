<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueFeatures;
use App\Http\Controllers\Controller;



class VenueFeaturesController extends Controller
{
    //
	public function index()
    {		
	   $VenueFeatures= VenueFeatures::all();
       return view('panels.admin.features.index',['VenueFeatures'=>$VenueFeatures]);
    }
	
	public function getfeatures(Request $request)
		{
			 $id=$request->id;  
			 $VenueFeatures = DB::table('venue_features')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueFeatures) . '}';
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
			
			
			
				$VenueFeatures = new VenueFeatures;				
				$VenueFeatures->title=$request->title;				
				$VenueFeatures->save();
			return redirect('admin/hotels/features')->with('message','Features title added successfully');
	}
	public function updated(Request $request)
	{	 
			
			$this->validate($request,
			 [
                'title'            	=> 'required',            
               
            ],
            [
                'title.required'   	=> 'title is required',
              
               
            ]);
			
				
				DB::table('venue_features')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/features')->with('message','Features title updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $title = DB::table('venue_features')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Features title deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue_features')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/features')->with('message','Seltected features title are deleted successfully');			

	}
}