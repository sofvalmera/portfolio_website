<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Support\Facades\File;
use Image;



class BlogController extends Controller
{
    //
    public function index(Request $request){
         $blogs= Blog::latest();
         if(!empty($request->get('keyword'))){

            $blogs= $blogs->where('name','like','%'.$request->get('keyword').'%');
         }


        $blogs= $blogs->paginate(10);
        return view('admin.blog.list',compact('blogs'));

    }
     public function create(){
        return view('admin.blog.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'title' => 'required',
            'name' => 'required',
            'project' => 'required',
            'date' => 'required',
        ]);
        
        if($validator->passes()){
            $blog=new BLog();
            $blog->title = $request->title;
            $blog->name = $request->name;
            $blog->project = $request->project;
            $blog->date = $request->date;
            $blog->description = $request->description;
            $blog->save();

            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $blog->id.'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/blog/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/blog/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $blog->image = $newImageName;
                $blog->save();
            }


            $request->session()->flash('success','Blog Added Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Blog Added Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($blogId, Request $request){

        $blog=Blog::find($blogId);

        if(empty($blog)){
            return redirect()->route('blogs.index');
        }
        return view('admin.blog.edit',compact('blog'));


    }
     public function update($blogId, Request $request){
        $blog=Blog::find($blogId);

        if(empty($blog)){
            $request->session()->flash('error','Blog not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Blog not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'title' => 'required',
            'name' => 'required',
            'project' => 'required',
            'date' => 'required',
        ]);
        
        if($validator->passes()){
            $blog->title = $request->title;
            $blog->name = $request->name;
            $blog->project = $request->project;
            $blog->date = $request->date;
            $blog->description = $request->description;
            
            $blog->save();

            $oldImage = $blog->image ;
            // =$newImageName;
            // $category->save();


            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $blog->id.'-'.time().'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/blog/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/blog/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $blog->image = $newImageName;
                $blog->save();

                //delete sa old pic
                File::delete(public_path().'/uploads/blog/thumb/'.$oldImage);
                File::delete(public_path().'/uploads/blog/'.$oldImage);
            }


            $request->session()->flash('success','Blog Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Blog Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($blogId, Request $request){
        $blog=Blog::find($blogId);

        if(empty($blog)){
            $request->session()->flash('error','Blog not found');
            return response()->json([
                'status' => true,
                'message' => 'Blog not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


        File::delete(public_path().'/uploads/blog/thumb/'.$blog->image);
        File::delete(public_path().'/uploads/blog/'.$blog->image);

        $blog->delete();
        $request->session()->flash('success','Blog deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Blog Deleted Successfully'
        ]);

    }

}
