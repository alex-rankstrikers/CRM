<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use App\Models\CategorySlug;
use App\Models\MultiLanguage;
use App\Http\Controllers\Controller;
use Image;


class CategoryController extends Controller
{
    //
	public function index()
    {		
	  // $category= Category::all();
	   $categoryslug= CategorySlug::all();
	   $multilanguage= MultiLanguage::all();
	    $category = DB::table('category')
			 ->where('parent_id', '0')	 
			 ->get(); 
       return view('panels.admin.category.index',['category'=>$category,'categoryslug'=>$categoryslug,'multilanguage'=>$multilanguage,'edit_categoryslug'=>$categoryslug,'edit_multilanguage'=>$multilanguage,'editpcategory'=>$category,'pcategory'=>$category]);
    }
	
	public function getcategory(Request $request)
		{
			 $id=$request->id;  
			 $category = DB::table('category')
			 ->where('c_id', $id)	 
			 ->first();   
		 return '{"view_details": ' . json_encode($category) . '}';
	}
	public static function get_child_category($id)
	{			
			 $category = DB::table('category')
			 ->where('parent_id', $id)	 
			 ->get(); 
			 
			$tit='';			 
				 foreach($category as $category)
				 {			 
						$tit .= '<hr style="margin-top: 10px;margin-bottom: 10px;"><table style="width:100%"><tr class="rm'.$category->c_id.'"><td><input type="checkbox" name="selected_id[]" class="checkbox" value="'.$category->c_id.'"/></td><td>'.$category->c_title.'</td><td ><a href="javascript:void(0);" class="edit_blog btn btn-info btn-xs" id="'.$category->c_id.'" ><i class="fa fa-pencil"></i> Edit </a><a href="javascript:void(0);" class="btn btn-danger btn-xs delete_blog" id="'.$category->c_id.'"><i class="fa fa-trash-o"></i> Delete </a></td></tr></table>'; 	 
				 }
			echo $tit;
	}	
	public function added(Request $request)
	{
		 
			$this->validate($request,
			 [
                'c_title'            	=> 'required',
                'photo'             	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',               
               
            ],
            [
                'c_title.required'   	=> 'Title is required',
                'photo.required'        => 'Category image is required',
                'photo.image'           => 'Category image should be a jpeg,png,gif,svg',              
               
            ]);
			
			
			$this->validate($request,
			['c_title'=>'required',			
			'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',			
			]);
				$photo = $request->file('photo');
				$imagename = time().'.'.$photo->getClientOriginalExtension();   
				$destinationPath = public_path().'/uploads/thumbnail';
				$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				$thumb_img->save($destinationPath.'/'.$imagename,80);                    
				$destinationPath = public_path().'/uploads/original';
				$photo->move($destinationPath, $imagename);
			
				$category = new Category;
				$category->c_title=$request->c_title;
				$category->c_l_id=$request->language;
				$category->parent_id=$request->parent_id;				
				$category->c_slug_id=$request->slug;
				$category->c_image=$imagename;
				$category->c_meta_tag=$request->c_meta_tag;
				$category->c_meta_description=$request->c_meta_description;
				$category->c_description=$request->c_description;				
				$category->save();
			return redirect('admin/category')->with('message','Category added successfully');
	}
	public function updated(Request $request)
	{	 
			$this->validate($request,
			 [
                'c_title'            	=> 'required',                           
               
            ],
            [
                'c_title.required'   	=> 'Title is required',
                    
               
            ]);
			
			$photo = $request->file('photo');
			 if($photo){
					$imagename = time().'.'.$photo->getClientOriginalExtension();   
					$destinationPath = public_path().'/uploads/thumbnail';
					$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
					$thumb_img->save($destinationPath.'/'.$imagename,80);                    
					$destinationPath = public_path().'/uploads/original';
					$photo->move($destinationPath, $imagename);
						  DB::table('category')
						->where('c_id', $request->id)
						->update(['c_image' => $imagename,]);
			 }
			
				DB::table('category')
				->where('c_id', $request->id)
				->update(['c_title' => $request->c_title,'c_slug_id' => $request->slug,'parent_id' => $request->parent_id,'c_l_id' => $request->language,'c_meta_tag' => $request->c_meta_tag,'c_meta_description' => $request->c_meta_description,'c_description' => $request->c_description,]);

	return redirect('admin/category')->with('message','Category updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $category = DB::table('category')
		 ->where('c_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='category deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			echo $cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('category')->where('c_id', $id)->delete();			
				}			
			} 
	return redirect('admin/category')->with('message','Seltected category are deleted successfully');			

	}

	public function enable(Request $request)
	{	 
	$id=$request->id;
	DB::table('category')
	->where('c_id', $request->id)
	->update(['home_page' => '1',]);
	$status['deletedtatus']='Updated successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}
	public function disable(Request $request)
	{	 
	$id=$request->id;
	DB::table('category')
	->where('c_id', $request->id)
	->update(['home_page' => '0',]);
	$status['deletedtatus']='Updated successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}
}