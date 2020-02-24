<?php
 
namespace App\Http\Controllers; 
use DB;

use Illuminate\Http\Request; 

use App\Http\Requests;
use App\Models\VenueFoodDrink;
use App\Http\Controllers\Controller;



class VenueFoodDrinkController extends Controller
{
    //
	public function index()
    {		
	   $VenueFoodDrink= VenueFoodDrink::all();
       return view('panels.admin.food_drink.index',['VenueFoodDrink'=>$VenueFoodDrink]);
    }
	
	public function getfooddrink(Request $request)
		{
			 $id=$request->id;  
			 $VenueFoodDrink = DB::table('venue_fooddrink')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($VenueFoodDrink) . '}';
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
			
				$VenueFoodDrink = new VenueFoodDrink;				
				$VenueFoodDrink->title=$request->title;				
				$VenueFoodDrink->save();
			return redirect('admin/hotels/food-drink')->with('message','Food & Drink  added successfully');
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
			
				
				DB::table('venue_fooddrink')
				->where('id', $request->id)
				->update(['title' => $request->title,]);

	return redirect('admin/hotels/food-drink')->with('message','Food & Drink  updated successfully');
	}


	public function deleted(Request $request)
	{	 
	     $id=$request->id;  
		 $slug = DB::table('venue_fooddrink')
		 ->where('id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Food & Drink  deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue_fooddrink')->where('id', $id)->delete();			
				}			
			} 
	return redirect('admin/hotels/food-drink')->with('message','Seltected Food & Drink  are deleted successfully');			

	}
}