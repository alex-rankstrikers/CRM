<?php
namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueBusiness;
use App\Http\Controllers\Controller;

 

class VenueBusinessController extends Controller
{
    //
	public function index()
    {		
	   $VenueBusiness= VenueBusiness::all();
       return view('panels.admin.business.index',['VenueBusiness'=>$VenueBusiness]);
    }
	
	public function getlicensing(Request $request)
		{
			 $id=$request->id;  
			 $VenueBusiness = DB::table('business')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueBusiness) . '}';
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
			
				$VenueBusiness = new VenueBusiness;				
				$VenueBusiness->title=$request->title;				
				$VenueBusiness->save();
			return redirect('admin/hotels/business')->with('message','Business added successfully');
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
			
				
				DB::table('business')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/business')->with('message','Business updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('business')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Business deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('business')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/business')->with('message','Seltected Business are deleted successfully');			

	}
}