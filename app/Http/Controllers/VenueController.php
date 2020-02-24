<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Venue;
use App\Models\User;
use App\Models\MultiLanguage;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Models\VenueBanner;
use App\Models\VenueCapacity;
use App\Models\VenueFeatures;
use App\Models\VenueFoodDrink;
use App\Models\VenueLicensing;
use App\Models\VenueRestrictions;
use App\Models\UserVenueCapacity;
use App\Models\UserVenueFeatures;
use App\Models\UserVenueFooddrink;
use App\Models\UserVenueLicensing;
use App\Models\UserVenueRestrictions;

use App\Models\Benefits;
use App\Models\Amenities;
use App\Models\VenueBusiness;

use App\Models\UserVenueBenefits;
use App\Models\UserVenueAmenities;
use App\Models\UserVenueBusiness;
use App\Models\Hotels;


use App\Http\Controllers\Controller;
use Image;
use Session;

class VenueController extends Controller
{
   public function index()
    {			
		$venue= Hotels::all();
	    $VenueCapacity= VenueCapacity::all();
		$VenueFeatures= VenueFeatures::all();
		$VenueFoodDrink= VenueFoodDrink::all();
		$VenueLicensing= VenueLicensing::all();
		$VenueRestrictions= VenueRestrictions::all();
		$VenueBenefits=  Benefits::all();
		$VenueAmenities= Amenities::all();
		$VenueBusiness= VenueBusiness::all();
		$Benefits= Benefits::all();
		$Amenities= Amenities::all();
		$Business= VenueBusiness::all();
	  // $language= MultiLanguage::all();
	   $country= Country::all()->where('id',230);
	   //$category= Category::all();
	 //  $category = DB::table('category')
	//		 ->where('parent_id', '0')	 
	//		 ->get();
	    $users = DB::table('users')
			->select('*', 'users.id as uid')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('role_user.role_id', '=', 3)
			->get();
		
	//	$subcategory = DB::table('category')
	//		 ->where('parent_id','!=', '0')
	//		 ->get();
	//'language' => $language,'editlanguage' => $language,
	//'category' => $category,'editcategory' => $category,'editsubcategory' => $subcategory,
		$editstates = DB::table('states')			 
			 ->get();
		$editcities = DB::table('cities')			 
			 ->get();
			 
       return view('panels.admin.merchants.edit_hotel',['Benefits'=>$Benefits,'Amenities'=>$Amenities,'Business'=>$Business,'venue'=>$venue,'VenueBenefits'=>$VenueBenefits,'VenueAmenities'=>$VenueAmenities,'VenueBusiness'=>$VenueBusiness,'VenueCapacity'=>$VenueCapacity,'VenueFeatures'=>$VenueFeatures,'VenueFoodDrink'=>$VenueFoodDrink,'VenueLicensing'=>$VenueLicensing,'VenueRestrictions'=>$VenueRestrictions,'Edit_VenueBenefits'=>$VenueBenefits,'Edit_VenueAmenities'=>$VenueAmenities,'Edit_VenueBusiness'=>$VenueBusiness,'Edit_VenueCapacity'=>$VenueCapacity,'Edit_VenueFeatures'=>$VenueFeatures,'Edit_VenueFoodDrink'=>$VenueFoodDrink,'Edit_VenueLicensing'=>$VenueLicensing,'Edit_VenueRestrictions'=>$VenueRestrictions,'users' => $users,'country' => $country,'editusers' => $users,'editcountry' => $country,'editstates' => $editstates,'editcities' => $editcities]); 

    }
	
	
	
	public function getvenue(Request $request)
		{
			 $id=$request->id; 
			 
			 $venue = DB::table('venue')
			 ->where('v_id', $id)	 
			 ->first();   
			 
			
			 $user_venue_capacity = DB::table('user_venue_capacity')
			 ->where('venue_id', $id)	 
			 ->get();
			 
			  $user_venue_features = DB::table('user_venue_features')		
			 ->where('venue_id', $id)	 
			 ->get();

			 $user_venue_fooddrink = DB::table('user_venue_fooddrink')
			 ->where('venue_id', $id)	 
			 ->get();
			 
			 $user_venue_licensing = DB::table('user_venue_licensing')	
			 ->where('venue_id', $id)	 
			 ->get();
			 
			  $user_venue_restrictions = DB::table('user_venue_restrictions')	
			 ->where('venue_id', $id)	 
			 ->get();
			 
		 return '{"view_details": ' . json_encode(array("venue"=>$venue,"user_venue_capacity"=>$user_venue_capacity,"user_venue_features"=>$user_venue_features,"user_venue_fooddrink"=>$user_venue_fooddrink,"user_venue_licensing"=>$user_venue_licensing,"user_venue_restrictions"=>$user_venue_restrictions)) . '}';
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
		'title'			=> 'required',
		'price'			=> 'required',		
		'country'		=> 'required',
		'states'		=> 'required',
		'cities'		=> 'required',
		'address1'		=> 'required',		
		'postcode'		=> 'required',		
		'description'	=> 'required',		
               
            ],
            [
			'user_id.required'		=> 'Username is required',
			'title.required'			=> 'Title is required',
			'price.required'			=> 'Price is required',
			'country.required'		=> 'Country is required',
			'states.required'		=> 'States is required',
			'cities.required'		=> 'Cities is required',
			'address1.required'		=> 'Address 1 is required',		
			'postcode.required'		=> 'Postcode is required',				
			'description.required'	=> 'required',
                     ]);
			
			/*	
			'photo'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',	
			
				'photo.required'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
			'photo.image'           	=> 'Image should be a jpeg,png,gif,svg', 	
			
			
			$photo = $request->file('photo');
				$imagename = time().'.'.$photo->getClientOriginalExtension();   
				$destinationPath = public_path('/uploads/venue/thumbnail');
				$thumb_img = Image::make($photo->getRealPath())->crop(100, 100);
				$thumb_img->save($destinationPath.'/'.$imagename,80);                    
				$destinationPath = public_path('/uploads/venue/original');
				$photo->move($destinationPath, $imagename);	$Venue->image=$imagename;	*/
			
				$Venue = new Venue;				
				$Venue->user_id=$request->user_id;						
				$Venue->title=$request->title;
				$Venue->price=$request->price;
				$Venue->per_head=$request->per_head;
				$Venue->c_id=$request->country;
				$Venue->state=$request->states;
				$Venue->city=$request->cities;
				$Venue->address1=$request->address1;
				$Venue->address2=$request->address2;
				$Venue->postcode=$request->postcode;
				$Venue->description=$request->description;
				$Venue->nearest_transport_link=$request->nearest_transport_link;				
				$Venue->save();				
			    $vid = $Venue->id;				
			
				$session_images = Session::get('session_images');
				
					foreach($session_images as $key=>$image) {
						DB::table('venue')
						->where('v_id', $vid)
						->update(['image_'.$key => $image,]);						
					}
					
					//Session::flush();
					Session::forget('session_images');
				
				
				
				/*$capacity=implode(',',$request->capacity);						
				foreach(explode(',',$capacity) as $val)
				{
				
				   $capacity = new UserVenueCapacity;					
					$capacity->capacity_id=$val;
					$capacity->venue_id=$vid;							
					$capacity->save();	
				
				}*/
$am = array_merge($request->capacity, $request->total_sq_fit, $request->room_size, $request->celing_height);
				
				

				$benefits=implode(',',$request->benefits);
				foreach(explode(',',$benefits) as $val)
				{
					$benefits = new UserVenueBenefits;					
					$benefits->benefits_id=$val;
					$benefits->venue_id=$vid;							
					$benefits->save();				
				}

				$amenities=implode(',',$request->amenities);
				foreach(explode(',',$amenities) as $val)
				{
					$amenities = new UserVenueAmenities;					
					$amenities->amenities_id=$val;
					$amenities->venue_id=$vid;							
					$amenities->save();				
				}

				$business=implode(',',$request->business);
				foreach(explode(',',$business) as $val)
				{
					$business = new UserVenueBusiness;					
					$business->business_id=$val;
					$business->venue_id=$vid;							
					$business->save();				
				}
		
				$features=implode(',',$request->features);
				foreach(explode(',',$features) as $val)
				{
					$features = new UserVenueFeatures;					
					$features->features_id=$val;
					$features->venue_id=$vid;							
					$features->save();				
				}
				$fooddrink=implode(',',$request->fooddrink);
				foreach(explode(',',$fooddrink) as $val)
				{
					$fooddrink = new UserVenueFooddrink;
					$fooddrink->fooddrink_id=$val;
					$fooddrink->venue_id=$vid;							
					$fooddrink->save();				
				}
				$licensing=implode(',',$request->licensing);
				foreach(explode(',',$licensing) as $val)
				{	
                    $licensing = new UserVenueLicensing;						
					$licensing->licensing_id=$val;
					$licensing->venue_id=$vid;							
					$licensing->save();				
				}
				$restrictions=implode(',',$request->restrictions);
				foreach(explode(',',$restrictions) as $val)
				{	
                    $restrictions = new UserVenueRestrictions;								
					$restrictions->restrictions_id=$val;
					$restrictions->venue_id=$vid;							
					$restrictions->save();				
				}
				
			
				$c = array_combine($request->capacity, $request->total_sq_fit);
				
				foreach($c as $key => $val)
				{
				
				   $capacity = new UserVenueCapacity;					
					$capacity->capacity_id=$key;
					$capacity->capacity_value=$val;					
					$capacity->venue_id=$vid;							
					$capacity->save();	
				
				}
				
			return redirect('admin/merchants/hotels')->with('message','Hotel added successfully');
	}
	public function updated(Request $request)
	{	 
  $this->validate($request,
			 [
			 
		'user_id'		=> 'required',
		'title'			=> 'required',
		'price'			=> 'required',			
		'country'		=> 'required',
		'states'		=> 'required',
		'cities'		=> 'required',
		'address1'		=> 'required',		
		'postcode'		=> 'required',		
		'description'	=> 'required',		
               
            ],
            [
			'user_id.required'		=> 'Username is required',
			'title.required'			=> 'Title is required',
			'price.required'=> 'Price is required',	
			'country.required'		=> 'Country is required',
			'states.required'		=> 'States is required',
			'cities.required'		=> 'Cities is required',
			'address1.required'		=> 'Address 1 is required',		
			'postcode.required'		=> 'Postcode is required',				
			'description.required'	=> 'required',
                     ]);
			
			    $vid=$request->id;
				
				$session_images = Session::get('session_images');
				
					foreach($session_images as $image) {
						$venue = DB::table('venue')
						 ->where('v_id', $vid)	 
						 ->first(); 					
												
						if($venue->image_1=== NULL){
							
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_1' => $image,]);
						}elseif($venue->image_2=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_2' => $image,]);
						}
						elseif($venue->image_3=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_3' => $image,]);
						}elseif($venue->image_4=== NULL){
							
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_4' => $image,]);
						}elseif($venue->image_5=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_5' => $image,]);
						}
						elseif($venue->image_6=== NULL){
					 DB::table('venue')
						->where('v_id', $vid)
						->update(['image_6' => $image,]);
						}else{
							
						}
										
					}
					
					//Session::flush();
					Session::forget('session_images');
				
				
				
				
				
				DB::table('venue')
				->where('v_id', $request->id)
				->update([
				'user_id' =>$request->user_id,				
				'title' =>$request->title,
				'price' =>$request->price,
				'per_head' =>$request->per_head,
				'c_id' =>$request->country,
				'state' =>$request->states,
				'city' =>$request->cities,
				'address1' =>$request->address1,
				'address2' =>$request->address2,
				'postcode' =>$request->postcode,
				'description' =>$request->description,
                 'nearest_transport_link' =>$request->nearest_transport_link,				
				]);
				
			
				   $affected = DB::table('user_venue_capacity')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
						$c = array_combine($request->capacity, $request->capacity_value);
				
							foreach($c as $key => $val)
							{
							
							   $capacity = new UserVenueCapacity;					
								$capacity->capacity_id=$key;
								$capacity->capacity_value=$val;					
								$capacity->venue_id=$vid;							
								$capacity->save();	
							
							}
					/*				$capacity=implode(',',$request->capacity);
									foreach(explode(',',$capacity) as $val)
										{
										
										   $capacity = new UserVenueCapacity;					
											$capacity->capacity_id=$val;
											$capacity->venue_id=$vid;							
											$capacity->save();	
										
										}*/
										
					}	
								
				
				
			$affected = DB::table('user_venue_fooddrink')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
				
						$features=implode(',',$request->features);
						foreach(explode(',',$features) as $val)
						{
							$features = new UserVenueFeatures;					
							$features->features_id=$val;
							$features->venue_id=$vid;							
							$features->save();				
						}
					}

				$affected = DB::table('user_venue_fooddrink')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
						$fooddrink=implode(',',$request->fooddrink);
						foreach(explode(',',$fooddrink) as $val)
						{
							$fooddrink = new UserVenueFooddrink;
							$fooddrink->fooddrink_id=$val;
							$fooddrink->venue_id=$vid;							
							$fooddrink->save();				
						}
					}
					$affected = DB::table('user_venue_licensing')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
					{
						$licensing=implode(',',$request->licensing);
						foreach(explode(',',$licensing) as $val)
						{	
							$licensing = new UserVenueLicensing;						
							$licensing->licensing_id=$val;
							$licensing->venue_id=$vid;							
							$licensing->save();				
						}
					}
					$affected = DB::table('user_venue_restrictions')->where('venue_id', $vid)->delete();
					if($affected==0 || $affected > 0)
							{
								$restrictions=implode(',',$request->restrictions);
								foreach(explode(',',$restrictions) as $val)
								{	
									$restrictions = new UserVenueRestrictions;								
									$restrictions->restrictions_id=$val;
									$restrictions->venue_id=$vid;							
									$restrictions->save();				
								}
							}

	return redirect('admin/merchants/hotels')->with('message','Hotels updated successfully');
	}
	public function remove(Request $request)
		{	
		
		$id=$request->id;
		$val=explode(',',$request->id);
		$vid=$val[0];
		$img=$val[1];
		$field=$val[2];
		
		DB::table('hotels')
		->where('id', $vid)
		->update(['image_'.$field => null,]);
		 $status['deletedid']=$field;
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
	public function enable(Request $request)
		{	 
		$id=$request->id;
		DB::table('venue')
		->where('v_id', $request->id)
		->update(['status' => 'Disable',]);
		$status['deletedtatus']='Venue status updated successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}
	public function disable(Request $request)
		{	 
		$id=$request->id;
		DB::table('venue')
		->where('v_id', $request->id)
		->update(['status' => 'Enable',]);
		$status['deletedtatus']='Venue status updated successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}

	public function deleted(Request $request)
		{	 
		$id=$request->id;  
			 $blogs = DB::table('venue')
			 ->where('v_id', $id)
			 ->delete();
			 $status['deletedid']=$id;
			 $status['deletedtatus']='Venue deleted successfully';
		 return '{"delete_details": ' . json_encode($status) . '}'; 
		
		}

	public function destroy(Request $request)
	{
			$cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('venue')->where('v_id', $id)->delete();			
				}			
			} 
		return redirect('admin/merchants/hotels')->with('message','Seltected Hotels are deleted successfully');			

	}
	
	
	
		public function img_save_to_file(Request $request)
		{
			// $id=$request->id;  
			 //$products = DB::table('products')
			// ->where('id', $id)	 
			// ->first();   
		// return '{"view_details": ' . json_encode($products) . '}';
				//	$photo = $request->file('img');
				//	$imagename = time().'.'.$photo->getClientOriginalExtension();   
				//$destinationPath = public_path('/uploads/products/thumbnail');
				//$thumb_img = Image::make($photo->getRealPath())->crop(100, 100);
				//	$thumb_img->save($destinationPath.'/'.$imagename,80);                    
				//	$destinationPath = public_path('/uploads/products/original');
				//	$photo->move($destinationPath, $imagename);
				
				 //$imagePath = "temp/";
	$imagePath = public_path('uploads/venue/original/');

	$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);
	
	//Check write Access to Directory

	if(!is_writable($imagePath)){
		$response = Array(
			"status" => 'error',
			"message" => 'Can`t upload File; no write Access'
		);
		print json_encode($response);
		return;
	}
	
	if ( in_array($extension, $allowedExts))
	  {
	  if ($_FILES["img"]["error"] > 0)
		{
			 $response = array(
				"status" => 'error',
				"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
			);			
		}
	  else
		{
			
	      $filename = $_FILES["img"]["tmp_name"];
		  list($width, $height) = getimagesize( $filename );

		  move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);
//$imagePath 
		  $response = array(
			"status" => 'success',
			"url" => url('/').'/uploads/venue/original/'.$_FILES["img"]["name"],
			"width" => $width,
			"height" => $height
		  );
		  
		}
	  }
	else
	  {
	   $response = array(
			"status" => 'error',
			"message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
		);
	  }
	  
	  print json_encode($response);
	  
	
	}
	
	public function img_crop_to_file(Request $request)
		{
	$imgUrl = $_POST['imgUrl'];
// original sizes
$imgInitW = $_POST['imgInitW'];
$imgInitH = $_POST['imgInitH'];
// resized sizes
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
// offsets
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];
// crop box
$cropW = $_POST['cropW'];
$cropH = $_POST['cropH'];
// rotation angle
$angle = $_POST['rotation'];

$jpeg_quality = 100;
$imgname="venuesearch_".rand();
 $output_filename = public_path('uploads/venue/original/')."/".$imgname;
 $output_filename = public_path('uploads/venue/original/')."/".$imgname;
//$output_filename = "temp/croppedImg_".rand();

// uncomment line below to save the cropped image in the same location as the original image.
//$output_filename = dirname($imgUrl). "/croppedImg_".rand();

$what = getimagesize($imgUrl);

switch(strtolower($what['mime']))
{
    case 'image/png':
        $img_r = imagecreatefrompng($imgUrl);
		$source_image = imagecreatefrompng($imgUrl);
		$type = '.png';
        break;
    case 'image/jpeg':
        $img_r = imagecreatefromjpeg($imgUrl);
		$source_image = imagecreatefromjpeg($imgUrl);
		error_log("jpg");
		$type = '.jpeg';
        break;
    case 'image/gif':
        $img_r = imagecreatefromgif($imgUrl);
		$source_image = imagecreatefromgif($imgUrl);
		$type = '.gif';
        break;
    default: die('image type not supported');
}


//Check write Access to Directory

if(!is_writable(dirname($output_filename))){
	$response = Array(
	    "status" => 'error',
	    "message" => 'Can`t write cropped File'
    );	
}else{

    // resize the original image to size of editor
    $resizedImage = imagecreatetruecolor($imgW, $imgH);
	imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
    // rotate the rezized image
    $rotated_image = imagerotate($resizedImage, -$angle, 0);
    // find new width & height of rotated image
    $rotated_width = imagesx($rotated_image);
    $rotated_height = imagesy($rotated_image);
    // diff between rotated & original sizes
    $dx = $rotated_width - $imgW;
    $dy = $rotated_height - $imgH;
    // crop rotated image to fit into original rezized rectangle
	$cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
	imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
	imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
	// crop image into selected area
	$final_image = imagecreatetruecolor($cropW, $cropH);
	imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
	imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
	// finally output png image
	//imagepng($final_image, $output_filename.$type, $png_quality);
	imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
	$response = Array(
	    "status" => 'success',
		"image_name" => $imgname.$type,
	    "url" => url('/').'/uploads/venue/original/'.$imgname.$type
    );
}
print json_encode($response);
	}
	
}
