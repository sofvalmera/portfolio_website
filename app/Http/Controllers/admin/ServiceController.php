<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
// use App\Models\TempImage;
// use App\Http\Controllers\admin\TempImageController;
// use Illuminate\Support\Facades\File;
// use Image;



class ServiceController extends Controller
{
    //
    public function index(Request $request){
         $services= Service::latest();
         if(!empty($request->get('keyword'))){

            $services= $services->where('servicename','like','%'.$request->get('keyword').'%');
         }


        $services= $services->paginate(10);
        return view('admin.service.list',compact('services'));

    }
     public function create(){
        return view('admin.service.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'servicename' => 'required',
            'icon' => 'required',

            
        ]);
        
        if($validator->passes()){
            $service=new Service();
            $service->servicename = $request->servicename;
            $service->icon = $request->icon;
            $service->description = $request->description;
            $service->save();


          

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
     public function edit($serviceId, Request $request){

        $service=Service::find($serviceId);

        if(empty($service)){
            return redirect()->route('services.index');
        }
        return view('admin.service.edit',compact('service'));


    }
     public function update($serviceId, Request $request){
        $service=Service::find($serviceId);

        if(empty($service)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'servicename' => 'required',
            'icon' => 'required',
            
        ]);
        
        if($validator->passes()){
            $service->servicename = $request->servicename;
            $service->icon = $request->icon;
            $service->description = $request->description;
            $service->save();



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
     public function destroy($serviceId, Request $request){
        $service=Service::find($serviceId);

        if(empty($service)){
            $request->session()->flash('error',' not found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


       
        $service->delete();
        $request->session()->flash('success',' deleted successfully');
        return response()->json([
            'status' => true,
            'message' => ' Deleted Successfully'
        ]);

    }

}
