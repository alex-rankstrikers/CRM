<?php
namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueLicensing;
use App\Http\Controllers\Controller;

 

class VenueLicensingController extends Controller
{
    //
	public function index()
    {		
	   $VenueLicensing= VenueLicensing::all();
       return view('panels.admin.licensing.index',['VenueLicensing'=>$VenueLicensing]);
    }
	
	public function getlicensing(Request $request)
		{
			 $id=$request->id;  
			 $VenueLicensing = DB::table('venue_licensing')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueLicensing) . '}';
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
			
				$VenueLicensing = new VenueLicensing;				
				$VenueLicensing->title=$request->title;				
				$VenueLicensing->save();
			return redirect('admin/hotels/licensing')->with('message','Licensing added successfully');
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
			
				
				DB::table('venue_licensing')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/licensing')->with('message','Licensing updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('venue_licensing')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Licensing deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue_licensing')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/licensing')->with('message','Seltected Licensing are deleted successfully');			

	}
}