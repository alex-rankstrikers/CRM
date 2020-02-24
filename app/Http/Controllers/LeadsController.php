<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Leads;
use App\Models\User;
use App\Models\MultiLanguage;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Http\Controllers\Controller;
use Image;


class LeadsController extends Controller
{
    //
	public function index()
    {		
	   
	    $leads = DB::table('leads')			
			->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')			
			->get();
		
		
       return view('panels.admin.leads.leads',['leads'=>$leads]);
    }
	
	public function getleads(Request $request)
		{
			 $id=$request->id;  
			 $listing = DB::table('leads')
			 ->leftJoin('venue', 'venue.v_id', '=', 'leads.venue_id')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($listing) . '}';
	}


	public function updated(Request $request)
	{	 
 $this->validate($request,
			 [
			 
		'user_id'		=> 'required',
		'language_id'	=> 'required',
		'category'		=> 'required',
		'scategory'		=> 'required',
		'title'			=> 'required',
		'country'		=> 'required',
		'states'		=> 'required',
		'cities'		=> 'required',
		'address1'		=> 'required',		
		'postcode'		=> 'required',
		'phoneno'		=> 'required',		
		'description'	=> 'required',		
               
            ],
            [
			'user_id.required'		=> 'Username is required',
			'language_id.required'	=> 'Language is required',
			'category.required'		=> 'Category is required',
			'scategory.required'		=> 'Subcategory is required',
			'title.required'			=> 'Title is required',
			'country.required'		=> 'Country is required',
			'states.required'		=> 'States is required',
			'cities.required'		=> 'Cities is required',
			'address1.required'		=> 'Address 1 is required',		
			'postcode.required'		=> 'Postcode is required',
			'phoneno.required'		=> 'Phoneno is required',						
			'description.required'	=> 'required',
                     ]);
			
			
				DB::table('leads')
				->where('id', $request->id)
				->update([
				'user_id' =>$request->user_id,
				'l_id' =>$request->language_id,
				'm_c_id' =>$request->category,
				's_c_id' =>$request->scategory,
				'title' =>$request->title,
				'c_id' =>$request->country,
				'state' =>$request->states,
				'city' =>$request->cities,
				'address1' =>$request->address1,
				'address2' =>$request->address2,
				'pincode' =>$request->postcode,
				'phoneno' =>$request->phoneno,
				'meta_tag' =>$request->meta_tag,
				'meta_description' =>$request->meta_description,
				'description' =>$request->description,				
				]);

	return redirect('admin/leads')->with('message','Leads updated successfully');
	}
	public function enable(Request $request)
		{	 
		$id=$request->id;
		DB::table('listing')
		->where('id', $request->id)
		->update(['status' => 'Disable',]);
		$status['deletedtatus']='Listing status updated successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
	public function disable(Request $request)
		{	 
		$id=$request->id;
		DB::table('listing')
		->where('id', $request->id)
		->update(['status' => 'Enable',]);
		$status['deletedtatus']='Listing status updated successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}

	public function deleted(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('leads')
			 ->where('id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Leads deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}

	public function destroy(Request $request)
	{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('leads')->where('id', $id)->delete();			
				}			
			} 
		return redirect('admin/leads')->with('message','Seltected leads are deleted successfully');			

	}
}