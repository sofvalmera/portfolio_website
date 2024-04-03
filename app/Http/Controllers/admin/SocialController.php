<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\Validator;
// use App\Models\TempImage;
// use App\Http\Controllers\admin\TempImageController;
// use Illuminate\Support\Facades\File;
// use Image;



class SocialController extends Controller
{
    //
    public function index(Request $request){
         $socials= Social::latest();
        //  if(!empty($request->get('keyword'))){

        //     $socials= $socials->where('name','like','%'.$request->get('keyword').'%');
        //  }


        $socials= $socials->paginate(10);
        return view('admin.socialmedia.list',compact('socials'));

    }
     public function create(){
        return view('admin.socialmedia.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'fb' => 'required',
            'yt' => 'required',
            'li' => 'required',
            'ig' => 'required',
            
        ]);
        
        if($validator->passes()){
            $social=new Social();
            $social->fb = $request->fb;
            $social->yt = $request->yt;
            $social->li = $request->li;
            $social->ig = $request->ig;
          
            $social->save();

          

            $request->session()->flash('success',' Created Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Created Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($socialId, Request $request){

        $social=Social::find($socialId);

        if(empty($social)){
            return redirect()->route('socials.index');
        }
        return view('admin.socialmedia.edit',compact('social'));


    }
     public function update($socialId, Request $request){
        $social=Social::find($socialId);

        if(empty($social)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'fb' => 'required',
            'yt' => 'required',
            'li' => 'required',
            'ig' => 'required',
           
        ]);
        
        if($validator->passes()){
            $social->fb = $request->fb;
            $social->yt = $request->yt;
            $social->li = $request->li;
            $social->ig = $request->ig;
          
            $social->save();
          

            $request->session()->flash('success','Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($socialId, Request $request){
        $social=Social::find($socialId);

        if(empty($social)){
            $request->session()->flash('error','Pnot found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


      
        $social->delete();
        $request->session()->flash('success','deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully'
        ]);

    }

}
