<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Image;


class FrontBlogController extends Controller
{
    //
	public function index($category = null)
    {	
	
	if ($category){
	 $blogs = DB::table('blogs')
			->select('*')
			->leftJoin('category', 'category.c_id', '=', 'blogs.c_id')
			->leftJoin('category_slug', 'category_slug.id', '=', 'category.c_slug_id')
			->where('category_slug.slug', '=', $category)
			->get();  

		$cat_slug=ucwords(str_replace("-", " ", $category));	
  	//'blogs.slug as bslug','category_slug.slug as cslug' ,'blogs.created_at as bcreated','blogs.c_id as cat_id'
	   //$blogs= Blog::all();
	}else{
	    $blogs = DB::table('blogs')
			->select('*')
			->leftJoin('category', 'category.c_id', '=', 'blogs.c_id')
			->leftJoin('category_slug', 'category_slug.id', '=', 'category.c_slug_id')	
			->get();
			$cat_slug='';
	}
	 //   ->toSql();
    //   dd($blogs);	
	
	 $category = DB::table('category')
			->select('*')			
			->leftJoin('category_slug', 'category_slug.id', '=', 'category.c_slug_id')	
			->get();
      // return view('panels.admin.blog.index',['blogs'=>$blogs]);
	   	$title = 'Blog';
        return view('pages.blogs',compact('title'),['blogs'=>$blogs,'category'=>$category,'cat_slug'=>$cat_slug]);    
    }
	
	public function getblog($category,$slug)
		{
			$cat_slug=$cat_slug=ucwords(str_replace("-", " ", $category));
			 $blogs = DB::table('blogs')
			 ->where('b_slug', $slug)	 
			 ->first();   
			$title = $blogs->b_title;
			$b_meta_tag = $blogs->b_meta_tag;
			$b_meta_description = $blogs->b_meta_description;
		
		
			$category = DB::table('category')
			->select('*')			
			->leftJoin('category_slug', 'category_slug.id', '=', 'category.c_slug_id')	
			->get();
			//echo $slug=ucwords(str_replace("-", " ", $slug));			
		 return view('pages.blog_view',compact('title','b_meta_tag','b_meta_description'),['blogs'=>$blogs,'category'=>$category,'cat_slug'=>$cat_slug]);
	}
		
	public function added(Request $request)
	{
		  $this->validate($request,
			 [
                'b_title'          	=> 'required',
                'b_slug'            => 'required|alpha_dash',
                'photo'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'b_description' 	=> 'required',
				
               
            ],
            [
              
                'b_title.required'    		=> 'Blog Title is required',
                'b_slug.required'        	=> 'Blog Url is required',
                'b_slug.alpha_dash'         => 'Blog Url must be used in hypen or underscore ',
                'photo.required'        	=> 'Blog Image is required',
                'photo.image'           	=> 'Blog Image should be a jpeg,png,gif,svg',                
				'b_description.required'    => 'Blog Description is required',			
               
            ]);
			
				$photo = $request->file('photo');
				$imagename = time().'.'.$photo->getClientOriginalExtension();   
				$destinationPath = public_path('/../uploads/thumbnail');
				$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
				$thumb_img->save($destinationPath.'/'.$imagename,80);                    
				$destinationPath = public_path('/../uploads/original');
				$photo->move($destinationPath, $imagename);
			
				$blog = new Blog;
				$blog->b_title=$request->b_title;
				$blog->b_slug=$request->b_slug;
				$blog->b_image=$imagename;
				$blog->b_description=$request->b_description;
				$blog->b_meta_tag=$request->b_meta_tag;
				$blog->b_meta_description=$request->b_meta_description;
				$blog->save();
			return redirect('admin/blog')->with('message','Blog added successfully');
	}
	public function updated(Request $request)
	{	 
 $this->validate($request,
			 [
                'b_title'          	=> 'required',
                'b_slug'            => 'required|alpha_dash',              
                'b_description' 	=> 'required',
				
               
            ],
            [
              
                'b_title.required'    		=> 'Blog Title is required',
                'b_slug.required'        	=> 'Blog Url is required',
                'b_slug.alpha_dash'         => 'Blog Url must be used in hypen or underscore ',                          
				'b_description.required'    => 'Blog Description is required',			
               
            ]);
			$photo = $request->file('photo');
			 if($photo){
					$imagename = time().'.'.$photo->getClientOriginalExtension();   
					$destinationPath = public_path('/../uploads/thumbnail');
					$thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
					$thumb_img->save($destinationPath.'/'.$imagename,80);                    
					$destinationPath = public_path('/../uploads/original');
					$photo->move($destinationPath, $imagename);
						  DB::table('blogs')
						->where('b_id', $request->id)
						->update(['b_image' => $imagename,]);
			 }
			
				DB::table('blogs')
				->where('b_id', $request->id)
				->update(['b_title' => $request->b_title,'b_slug' => $request->b_slug,'b_description' => $request->b_description,'b_meta_tag' => $request->b_meta_tag,'b_meta_description' => $request->b_meta_description,]);

	return redirect('admin/blog')->with('message','Blog updated successfully');
	}


	public function deleted(Request $request)
	{	 
	$id=$request->id;  
		 $blogs = DB::table('blogs')
		 ->where('b_id', $id)
		 ->delete();
		 $status['deletedid']=$id;
		 $status['deletedtatus']='Blog deleted successfully';
	 return '{"delete_details": ' . json_encode($status) . '}'; 
	
	}

	public function destroy(Request $request)
		{
			echo $cn=count($request->selected_id);
			if($cn>0)
			{
			$data = $request->selected_id;			
				foreach($data as $id) {
				DB::table('blogs')->where('b_id', $id)->delete();			
				}			
			} 
	return redirect('admin/blog')->with('message','Seltected Blogs are deleted successfully');			

	}
}