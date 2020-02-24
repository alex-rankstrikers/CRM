<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Clientshoutouts;
use App\Http\Controllers\Controller;
use Image;


class ClientshoutoutsController extends Controller
{
    //
	public function index()
    {		
	   $Clientshoutouts= Clientshoutouts::all();
       return view('panels.admin.clientshoutouts.index',['Clientshoutouts'=>$Clientshoutouts]);
    }
	
	public function getClientshoutouts(Request $request)
		{
			 $id=$request->id;  
			 $Clientshoutouts = DB::table('clients_shout_out')
			 ->where('n_id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($Clientshoutouts) . '}';
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
              
                'n_title.required'    		=> 'Clientshoutouts Title is required',               
                'photo.required'        	=> 'Clientshoutouts Image is required',
                'photo.image'           	=> 'Clientshoutouts Image should be a jpeg,png,gif,svg',                
				'n_description.required'    => 'Clientshoutouts Description is required',			
               
            ]);
		
				 $photo = $request->file('photo');
				 $imagename = time().'.'.$photo->getClientOriginalExtension();   
				 $destinationPath = public_path('../uploads/thumbnail');
				 $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				 $thumb_img->save($destinationPath.'/'.$imagename,80);                    
				 $destinationPath = public_path('/../uploads/original');
				 $photo->move($destinationPath, $imagename);
			    $imagename=''; 
				$Clientshoutouts = new Clientshoutouts;
				$Clientshoutouts->n_title=$request->n_title;
				$Clientshoutouts->n_title=$request->n_location;
				$Clientshoutouts->n_slug=strtolower(str_replace(' ','-',$request->n_title));
				$Clientshoutouts->n_image=$imagename;
				$Clientshoutouts->n_description=$request->n_description;			
				$Clientshoutouts->save();
			return back()->with('message','Client shout outs added successfully');
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
						  DB::table('clients_shout_out')
						->where('n_id', $request->id)
						->update(['n_image' => $imagename,]);
			 }

			 $n_slug=strtolower(str_replace(' ','-',$request->n_title));
			
				DB::table('clients_shout_out')
				->where('n_id', $request->id)
				->update(['n_title' => $request->n_title,'n_location' => $request->n_location,'n_slug' => $n_slug,'n_description' => $request->n_description,'n_meta_tag' => $request->n_meta_tag,'n_meta_description' => $request->n_meta_description,]);

	return back()->with('message','Client shout outs updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $Clientshoutoutss = DB::table('clients_shout_out')
		 ->where('n_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Client shout outs deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			echo $cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('clients_shout_out')->where('n_id', $id)->delete();			
				}			
			} 
	return back()->with('message','Seltected Client shout outs are deleted successfully');			

	}
}