<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Partnership;
use App\Http\Controllers\Controller;
use Image;


class PartnershipController extends Controller
{
    //
	public function index()
    {		
	   $Partnership= Partnership::all();
       return view('panels.admin.partnership.index',['Partnership'=>$Partnership]);
    }
	
	public function getPartnership(Request $request)
		{
			 $id=$request->id;  
			 $Partnership = DB::table('partnership')
			 ->where('n_id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Partnership) . '}';
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
              
                'n_title.required'    		=> 'Partnership Title is required',               
                'photo.required'        	=> 'Partnership Image is required',
                'photo.image'           	=> 'Partnership Image should be a jpeg,png,gif,svg',                
				'n_description.required'    => 'Partnership Description is required',			
               
            ]);
		
				 $photo = $request->file('photo');
				 $imagename = time().'.'.$photo->getClientOriginalExtension();   
				 $destinationPath = public_path('../uploads/thumbnail');
				 $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				 $thumb_img->save($destinationPath.'/'.$imagename,80);                    
				 $destinationPath = public_path('/../uploads/original');
				 $photo->move($destinationPath, $imagename);
			    $imagename='';
				$Partnership = new Partnership;
				$Partnership->n_title=$request->n_title;			
				$Partnership->n_image=$imagename;
				$Partnership->n_description=$request->n_description;			
				$Partnership->save();
			return back()->with('message','Partnership added successfully');
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
						  DB::table('partnership')
						->where('n_id', $request->id)
						->update(['n_image' => $imagename,]);
			 }
			
				DB::table('partnership')
				->where('n_id', $request->id)
				->update(['n_title' => $request->n_title,'n_description' => $request->n_description]);

	return back()->with('message','Partnership updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $Partnerships = DB::table('partnership')
		 ->where('n_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Partnership deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			echo $cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('partnership')->where('n_id', $id)->delete();			
				}			
			} 
	return back()->with('message','Seltected Partnership are deleted successfully');			

	}
}