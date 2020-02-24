<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use Image;


class TravelController extends Controller
{
    //
	public function index()
    {		
	   $Travel= Travel::all();
       return view('panels.admin.travel.index',['Travel'=>$Travel]);
    }
	
	public function getTravel(Request $request)
		{
			 $id=$request->id;  
			 $Travel = DB::table('club_bb_travel')
			 ->where('n_id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Travel) . '}';
	}
		
	public function added(Request $request)
	{
		 $this->validate($request,
			 [
                'n_title'          	=> 'required',                
                'photo'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'n_description' 	=> 'required',
				
               
            ],
            [
              
                'n_title.required'    		=> 'Travel Title is required',               
                'photo.required'        	=> 'Travel Image is required',
                'photo.image'           	=> 'Travel Image should be a jpeg,png,gif,svg',                
				'n_description.required'    => 'Travel Description is required',			
               
            ]);
		
				 $photo = $request->file('photo');
				 $imagename = time().'.'.$photo->getClientOriginalExtension();   
				 $destinationPath = public_path('../uploads/thumbnail');
				 $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				 $thumb_img->save($destinationPath.'/'.$imagename,80);                    
				 $destinationPath = public_path('/../uploads/original');
				 $photo->move($destinationPath, $imagename);
			    $imagename='';
				$Travel = new Travel;
				$Travel->n_title=$request->n_title;
				$Travel->n_title=$request->n_location;				
				$Travel->n_image=$imagename;
				$Travel->n_description=$request->n_description;			
				$Travel->save();
			return back()->with('message','Travel added successfully');
	}
	public function updated(Request $request)
	{	 $this->validate($request,
			 [
                'n_title'          	=> 'required',
                  
                'n_description' 	=> 'required',
				
               
            ],
            [
              
                'n_title.required'    		=> 'Title is required',              
                                   
				'n_description.required'    => 'Description is required',			
               
            ]);
					
			$photo = $request->file('photo');
			 if($photo){
					$imagename = time().'.'.$photo->getClientOriginalExtension();   
					$destinationPath = public_path('/../uploads/thumbnail');
					$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
					$thumb_img->save($destinationPath.'/'.$imagename,80);                    
					$destinationPath = public_path('/../uploads/original');
					$photo->move($destinationPath, $imagename);
						  DB::table('club_bb_travel')
						->where('n_id', $request->id)
						->update(['n_image' => $imagename,]);
			 }

			 $n_slug=strtolower(str_replace(' ','-',$request->n_title));
			
				DB::table('club_bb_travel')
				->where('n_id', $request->id)
				->update(['n_title' => $request->n_title,'n_location' => $request->n_location,'n_description' => $request->n_description,'n_meta_tag' => $request->n_meta_tag,'n_meta_description' => $request->n_meta_description,]);

	return back()->with('message','Travel updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $Travels = DB::table('club_bb_travel')
		 ->where('n_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Travel deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('club_bb_travel')->where('n_id', $id)->delete();			
				}			
			} 
	return back()->with('message','Seltected Travel are deleted successfully');			

	}
}