<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueCapacity;
use App\Http\Controllers\Controller;



class VenueCapacityController extends Controller
{
    //
	public function index()
    {		
	   $VenueCapacity= VenueCapacity::all();
       return view('panels.admin.capacity.index',['VenueCapacity'=>$VenueCapacity]);
    }
	
	public function getcapacity(Request $request)
		{
			 $id=$request->id;  
			 $VenueCapacity = DB::table('venue_capacity')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueCapacity) . '}';
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
			
			
				$VenueCapacity = new VenueCapacity;				
				$VenueCapacity->title=$request->title;				
				$VenueCapacity->save();
			return redirect('admin/hotels/capacity')->with('message','Capacity added successfully');
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
			
				
				DB::table('venue_capacity')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/capacity')->with('message','Capacity updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('venue_capacity')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Capacity deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue_capacity')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/capacity')->with('message','Capacity are deleted successfully');			

	}
}