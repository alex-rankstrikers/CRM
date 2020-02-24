<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Amenities;
use App\Http\Controllers\Controller;



class AmenitiesController extends Controller
{
    //
	public function index()
    {		
	   $Amenities= Amenities::all();
       return view('panels.admin.amenities.index',['Amenities'=>$Amenities]);
    }
	
	public function getcapacity(Request $request)
		{
			 $id=$request->id;  
			 $Amenities = DB::table('amenities')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Amenities) . '}';
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
			
			
				$Amenities = new Amenities;				
				$Amenities->title=$request->title;				
				$Amenities->save();
			return redirect('admin/hotels/amenities')->with('message','Amenities added successfully');
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
			
				
				DB::table('amenities')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/amenities')->with('message','Amenities updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('amenities')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Amenities deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('amenities')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/amenities')->with('message','Amenities are deleted successfully');			

	}
}