<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Support\Facades\File;
use Image;



class TestimonialController extends Controller
{
    //
    public function index(Request $request){
         $testimonials= Testimonial::latest();
         if(!empty($request->get('keyword'))){

            $testimonials= $testimonials->where('name','like','%'.$request->get('keyword').'%');
         }


        $testimonials= $testimonials->paginate(10);
        return view('admin.testimonial.list',compact('testimonials'));

    }
     public function create(){
        return view('admin.testimonial.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
           
            'description' => 'required',
            // 'date' => 'required',
        ]);
        
        if($validator->passes()){
            $testimonial=new Testimonial();
          
            $testimonial->name = $request->name;
            $testimonial->status = $request->status;
            $testimonial->profession = $request->profession;
            $testimonial->description = $request->description;
            $testimonial->save();

            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $testimonial->id.'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/testimonial/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/testimonial/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(490, 490, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $testimonial->image = $newImageName;
                $testimonial->save();
            }


            $request->session()->flash('success',' Added Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Added Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($testimonialId, Request $request){

        $testimonial=Testimonial::find($testimonialId);

        if(empty($testimonial)){
            return redirect()->route('testimonials.index');
        }
        return view('admin.testimonial.edit',compact('testimonial'));


    }
     public function update($testimonialId, Request $request){
        $testimonial=Testimonial::find($testimonialId);

        if(empty($testimonial)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
          
            'description' => 'required',
        ]);
        
        if($validator->passes()){
            $testimonial->name = $request->name;
            $testimonial->profession = $request->profession;
            $testimonial->description = $request->description;
            $testimonial->status = $request->status;
            $testimonial->save();


            $oldImage = $testimonial->image ;
            // =$newImageName;
            // $category->save();


            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $testimonial->id.'-'.time().'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/testimonial/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/testimonial/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(490, 490, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $testimonial->image = $newImageName;
                $testimonial->save();

                //delete sa old pic
                File::delete(public_path().'/uploads/testimonial/thumb/'.$oldImage);
                File::delete(public_path().'/uploads/testimonial/'.$oldImage);
            }


            $request->session()->flash('success','testimonial Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'testimonial Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($testimonialId, Request $request){
        $testimonial=Testimonial::find($testimonialId);

        if(empty($testimonial)){
            $request->session()->flash('error','testimonial not found');
            return response()->json([
                'status' => true,
                'message' => 'testimonial not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


        File::delete(public_path().'/uploads/testimonial/thumb/'.$testimonial->image);
        File::delete(public_path().'/uploads/testimonial/'.$testimonial->image);

        $testimonial->delete();
        $request->session()->flash('success','testimonial deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'testimonial Deleted Successfully'
        ]);

    }

}
