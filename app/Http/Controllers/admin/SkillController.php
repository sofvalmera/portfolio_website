<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;
// use App\Models\TempImage;
// use App\Http\Controllers\admin\TempImageController;
// use Illuminate\Support\Facades\File;
// use Image;



class SkillController extends Controller
{
    //
    public function index(Request $request){
         $skills= Skill::latest();
         if(!empty($request->get('keyword'))){

            $skills= $skills->where('skillname','like','%'.$request->get('keyword').'%');
         }


        $skills= $skills->paginate(10);
        return view('admin.skill.list',compact('skills'));

    }
     public function create(){
        return view('admin.skill.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'skillname' => 'required',
            'rate' => 'required|numeric|max:100|min:1',

            
        ]);
        
        if($validator->passes()){
            $skill=new Skill();
            $skill->skillname = $request->skillname;
            $skill->rate = $request->rate;
            $skill->save();


          

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
     public function edit($skillId, Request $request){

        $skill=SKill::find($skillId);

        if(empty($skill)){
            return redirect()->route('skills.index');
        }
        return view('admin.skill.edit',compact('skill'));


    }
     public function update($skillId, Request $request){
        $skill=Skill::find($skillId);

        if(empty($skill)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'skillname' => 'required',
            'rate' => 'required|numeric|max:100|min:1',
            
        ]);
        
        if($validator->passes()){
            $skill->skillname = $request->skillname;
            $skill->rate = $request->rate;
            $skill->save();


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
     public function destroy($skillId, Request $request){
        $skill=Skill::find($skillId);

        if(empty($skill)){
            $request->session()->flash('error',' not found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


       
        $skill->delete();
        $request->session()->flash('success',' deleted successfully');
        return response()->json([
            'status' => true,
            'message' => ' Deleted Successfully'
        ]);

    }

}
