<?php
namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VenueCapacityChart;
use App\Http\Controllers\Controller;

 

class VenueCapacityChartController extends Controller
{
    //
	public function index()
    {		
	   $VenueCapacityChart= VenueCapacityChart::all();
       return view('panels.admin.capacitychart.index',['VenueCapacityChart'=>$VenueCapacityChart]);
    }
	
	public function getlicensing(Request $request)
		{
			 $id=$request->id;  
			 $VenueCapacityChart = DB::table('capacitychart')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueCapacityChart) . '}';
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
			
				$VenueCapacityChart = new VenueCapacityChart;				
				$VenueCapacityChart->title=$request->title;				
				$VenueCapacityChart->save();
			return redirect('admin/hotels/capacitychart')->with('message','Capacity chart added successfully');
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
			
				
				DB::table('capacitychart')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/capacitychart')->with('message','Capacity chart updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('capacitychart')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Capacity chart deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('capacitychart')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/capacitychart')->with('message','Seltected Capacity chart are deleted successfully');			

	}
}