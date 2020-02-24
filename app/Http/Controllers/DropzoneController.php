<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Request;
use Response;
use Image;
use Session;
class DropzoneController extends Controller {
 
    public function index() {
        return view('dropzone_demo');
    }
 
    public function uploadFiles() {
 
        $input = Input::all();
 
        $rules = array(
            'file' => 'image',
        );
 
        $validation = Validator::make($input, $rules);
 
        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }
 
      //  $destinationPath = 'uploads/original'; // upload path
      //  $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
     //   $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
     //   $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
 
    
						
		      
				$extension = Input::file('file')->getClientOriginalExtension();
				$imagename = rand(11111, 99999) . '.' . $extension;				
				$destinationPath = public_path('/uploads/venue/thumbnail');
				$session_images=Session::get('session_images');				
				$thumb_img = Image::make(Input::file('file')->getRealPath())->fit(458, 250, function ($constraint) 
				{
						$constraint->upsize();
						});
				$thumb_img->save($destinationPath.'/'.$imagename,80);				
				
				$destinationPathbig = public_path('/uploads/venue/original');			
				$thumb_medium_img = Image::make(Input::file('file')->getRealPath())->fit(1020, 500, function ($constraint) 
				{
						$constraint->upsize();
						});
						
				$upload_success=$thumb_medium_img->save($destinationPathbig.'/'.$imagename,80);
				
				
			    $image_id = count($session_images)+1;
				$session_images[$image_id] = $imagename;
				Session::set('session_images', $session_images);
				
        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }
 
}
