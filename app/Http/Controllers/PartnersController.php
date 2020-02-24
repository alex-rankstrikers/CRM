<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Partners;
use App\Http\Controllers\Controller;
use Image;


class PartnersController extends Controller
{
    //
	public function index()
    {		
	   $Partners= Partners::all();
       return view('panels.admin.partners.index',['Partners'=>$Partners]);
    }
	
	public function getPartners(Request $request)
		{
			 $id=$request->id;  
			 $Partners = DB::table('partners')
			 ->where('n_id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Partners) . '}';
	}
		
	public function added(Request $request)
	{
		 $this->validate($request,
			 [
                'n_title'          	=> 'required',               
                
               
            ],
            [
              
                'n_title.required'    		=> 'Partners Title is required',               
               		
               
            ]);
		
				 $photo = $request->file('photo');
				 $imagename = time().'.'.$photo->getClientOriginalExtension();   
				 $destinationPath = public_path('../uploads/thumbnail');
				 $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				 $thumb_img->save($destinationPath.'/'.$imagename,80);                    
				 $destinationPath = public_path('/../uploads/original');
				 $photo->move($destinationPath, $imagename);
			   
				$Partners = new Partners;
				$Partners->n_title=$request->n_title;
				$Partners->n_image=$imagename;				
				$Partners->save();
			return back()->with('message','Partners added successfully');
	}
	public function updated(Request $request)
	{	 $this->validate($request,
			 [
                'n_title'          	=> 'required',
                  
               
				
               
            ],
            [
              
                'n_title.required'    		=> 'Title is required',             
                                   
			
               
            ]);
					
			$photo = $request->file('photo');
			 if($photo){
					$imagename = time().'.'.$photo->getClientOriginalExtension();   
					$destinationPath = public_path('/../uploads/thumbnail');
					$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
					$thumb_img->save($destinationPath.'/'.$imagename,80);                    
					$destinationPath = public_path('/../uploads/original');
					$photo->move($destinationPath, $imagename);
						  DB::table('Partners')
						->where('n_id', $request->id)
						->update(['n_image' => $imagename,]);
			 }
			
				DB::table('partners')
				->where('n_id', $request->id)
				->update(['n_title' => $request->n_title]);

	return back()->with('message','Partners updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $Partnerss = DB::table('partners')
		 ->where('n_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Partners deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			echo $cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('partners')->where('n_id', $id)->delete();			
				}			
			} 
	return back()->with('message','Seltected Partners are deleted successfully');			

	}
}