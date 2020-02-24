<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Benefits;
use App\Http\Controllers\Controller;



class BenefitsController extends Controller
{
    //
	public function index()
    {		
	   $Benefits= Benefits::all();
       return view('panels.admin.benefits.index',['Benefits'=>$Benefits]);
    }
	
	public function getcapacity(Request $request)
		{
			 $id=$request->id;  
			 $Benefits = DB::table('benefits')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Benefits) . '}';
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
			
			
				$Benefits = new Benefits;				
				$Benefits->title=$request->title;				
				$Benefits->save();
			return redirect('admin/hotels/benefits')->with('message','Benefits added successfully');
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
			
				
				DB::table('benefits')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/benefits')->with('message','Benefits updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('benefits')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Benefits deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('benefits')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/benefits')->with('message','Benefits are deleted successfully');			

	}
}