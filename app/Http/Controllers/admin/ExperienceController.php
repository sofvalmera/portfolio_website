<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Support\Facades\Validator;
// use App\Models\TempImage;
// use App\Http\Controllers\admin\TempImageController;
// use Illuminate\Support\Facades\File;
// use Image;



class ExperienceController extends Controller
{
    //
    public function index(Request $request){
         $experiences= Experience::latest();
         if(!empty($request->get('keyword'))){

            $experiences= $experiences->where('id','like','%'.$request->get('keyword').'%');
         }


        $experiences= $experiences->paginate(10);
        return view('admin.experience.list',compact('experiences'));

    }
     public function create(){
        return view('admin.experience.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            // 'title' => 'required',
            // 'name' => 'required',
            // 'project' => 'required',
            // 'date' => 'required',
        ]);
        
        if($validator->passes()){
            $experience=new Experience();
            $experience->experiencename = $request->experiencename;
            $experience->experienceaddress = $request->experienceaddress;
            $experience->experienceyear = $request->experienceyear;
            $experience->experiencedescription = $request->experiencedescription;
            $experience->save();

          


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
     public function edit($educationId, Request $request){

        $education=Education::find($educationId);

        if(empty($education)){
            return redirect()->route('educations.index');
        }
        return view('admin.education.edit',compact('education'));


    }
     public function update($educationId, Request $request){
        $education=Education::find($educationId);

        if(empty($education)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            // 'title' => 'required',
            // 'name' => 'required',
            // 'project' => 'required',
            // 'date' => 'required',
        ]);
        
        if($validator->passes()){
            $experience->experiencename = $request->experiencename;
            $experience->experienceaddress = $request->experienceaddress;
            $experience->experienceyear = $request->experienceyear;
            $experience->experiencedescription = $request->experiencedescription;
            $experience->save();
         

            $request->session()->flash('success',' Updated Successfully');
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
     public function destroy($educationId, Request $request){
        $education=Education::find($educationId);

        if(empty($education)){
            $education->session()->flash('error',' not found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }



        $education->delete();
        $request->session()->flash('success',' deleted successfully');
        return response()->json([
            'status' => true,
            'message' => ' Deleted Successfully'
        ]);

    }

}
