<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Listing;
use App\Models\User;
use App\Models\MultiLanguage;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Http\Controllers\Controller;
use Image;


class ListingController extends Controller
{
    //
	public function index()
    {		
	   $listing= Listing::all();
	   $language= MultiLanguage::all();
	   $country= Country::all();
	   //$category= Category::all();
	   $category = DB::table('category')
			 ->where('parent_id', '0')	 
			 ->get();
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
		$subcategory = DB::table('category')
			 ->where('parent_id','!=', '0')
			 ->get();
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
			 
       return view('panels.admin.merchants.index',['listing'=>$listing,'users' => $users,'language' => $language,'country' => $country,'category' => $category,'editusers' => $users,'editlanguage' => $language,'editcountry' => $country,'editcategory' => $category,'editsubcategory' => $subcategory,'editstates' => $editstates,'editcities' => $editcities]);
    }
	
	public function getlisting(Request $request)
		{
			 $id=$request->id;  
			 $listing = DB::table('listing')
			 ->where('id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($listing) . '}';
	}
	
	public function getsubcategory(Request $request)
		{
			 $id=$request->id;  
			 $category = DB::table('category')
			 ->where('parent_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($category) . '}';
	}
	
	public function getstates(Request $request)
		{
			 $id=$request->id;  
			 $states = DB::table('states')
			 ->where('country_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($states) . '}';
	}
	
	public function getcities(Request $request)
		{
			 $id=$request->id;  
			 $cities = DB::table('cities')
			 ->where('state_id', $id)	 
			 ->get();   
		 return '{"view_details": ' . json_encode($cities) . '}';
	}
		
	public function added(Request $request)
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
		'photo'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',	
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
			'photo.required'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
			'photo.image'           	=> 'Image should be a jpeg,png,gif,svg', 			
			'description.required'	=> 'required',
                     ]);
			
				$photo = $request->file('photo');
				$imagename = time().'.'.$photo->getClientOriginalExtension();   
				$destinationPath = public_path('/../uploads/listing/thumbnail');
				$thumb_img = Image::make($photo->getRealPath())->crop(100, 100);
				$thumb_img->save($destinationPath.'/'.$imagename,80);                    
				$destinationPath = public_path('/../uploads/listing/original');
				$photo->move($destinationPath, $imagename);
			
				$listing = new Listing;				
				$listing->user_id=$request->user_id;
				$listing->l_id=$request->language_id;
				$listing->m_c_id=$request->category;
				$listing->s_c_id=$request->scategory;
				$listing->title=$request->title;
				$listing->c_id=$request->country;
				$listing->state=$request->states;
				$listing->city=$request->cities;
				$listing->address1=$request->address1;
				$listing->address2=$request->address2;
				$listing->pincode=$request->postcode;
				$listing->phoneno=$request->phoneno;
				$listing->image=$imagename;
				$listing->meta_tag=$request->meta_tag;
				$listing->meta_description=$request->meta_description;
				$listing->description=$request->description;		
				$listing->save();
			return redirect('admin/merchants/listing')->with('message','Listing added successfully');
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
			$photo = $request->file('photo');
			 if($photo){
					$imagename = time().'.'.$photo->getClientOriginalExtension();   
					$destinationPath = public_path('/../uploads/listing/thumbnail');
					$thumb_img = Image::make($photo->getRealPath())->crop(100, 100);
					$thumb_img->save($destinationPath.'/'.$imagename,80);                    
					$destinationPath = public_path('/../uploads/listing/original');
					$photo->move($destinationPath, $imagename);
						  DB::table('listing')
						->where('id', $request->id)
						->update(['image' => $imagename,]);
			 }
			
				DB::table('listing')
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

	return redirect('admin/merchants/listing')->with('message','Listing updated successfully');
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
			 $blogs = DB::table('listing')
			 ->where('id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Listing deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}

	public function destroy(Request $request)
	{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('listing')->where('id', $id)->delete();			
				}			
			} 
		return redirect('admin/merchants/listing')->with('message','Seltected listing are deleted successfully');			

	}
}