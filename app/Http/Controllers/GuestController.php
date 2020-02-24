<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Guest;
use App\Http\Controllers\Controller;
use Image;


class GuestController extends Controller
{
    //
	public function index()
    {		
	   $Guest= Guest::all();
       return view('panels.admin.guest.index',['Guest'=>$Guest]);
    }
	
	public function getGuest(Request $request)
		{
			 $id=$request->id;  
			 $Guest = DB::table('club_bb_guest')
			 ->where('n_id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Guest) . '}';
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
              
                'n_title.required'    		=> 'Guest Title is required',               
                'photo.required'        	=> 'Guest Image is required',
                'photo.image'           	=> 'Guest Image should be a jpeg,png,gif,svg',                
				'n_description.required'    => 'Guest Description is required',			
               
            ]);
		
				 $photo = $request->file('photo');
				 $imagename = time().'.'.$photo->getClientOriginalExtension();   
				 $destinationPath = public_path('../uploads/thumbnail');
				 $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				 $thumb_img->save($destinationPath.'/'.$imagename,80);                    
				 $destinationPath = public_path('/../uploads/original');
				 $photo->move($destinationPath, $imagename);
			    $imagename='';
				$Guest = new Guest;
				$Guest->n_title=$request->n_title;
				$Guest->n_title=$request->n_location;				
				$Guest->n_image=$imagename;
				$Guest->n_description=$request->n_description;			
				$Guest->save();
			return back()->with('message','Guest added successfully');
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
						  DB::table('club_bb_guest')
						->where('n_id', $request->id)
						->update(['n_image' => $imagename,]);
			 }
			$n_slug=strtolower(str_replace(' ','-',$request->n_title));
				DB::table('club_bb_guest')
				->where('n_id', $request->id)
				->update(['n_title' => $request->n_title,'n_location' => $request->n_location,'n_description' => $request->n_description,'n_meta_tag' => $request->n_meta_tag,'n_meta_description' => $request->n_meta_description,]);

	return back()->with('message','Guest updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $Guests = DB::table('club_bb_guest')
		 ->where('n_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Guest deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			echo $cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('club_bb_guest')->where('n_id', $id)->delete();			
				}			
			} 
	return back()->with('message','Seltected Guest are deleted successfully');			

	}
}