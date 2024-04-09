<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
// use App\Models\TempImage;
// use App\Http\Controllers\admin\TempImageController;
// use Illuminate\Support\Facades\File;
// use Image;



class UserController extends Controller
{
    //
    public function index(Request $request){
         $users= User::latest();
         if(!empty($request->get('keyword'))){

            $users= $users->where('name','like','%'.$request->get('keyword').'%');
         }


        $users= $users->paginate(10);
        return view('admin.user.list',compact('users'));

    }
     public function create(){
        return view('admin.user.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4',
           

            
        ]);
        
        if($validator->passes()){
            $user=new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;
           
            $user->role = $request->role;
            
            $user->save();


          

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
     public function edit($userId, Request $request){

        $user=User::find($userId);

        if(empty($user)){
            return redirect()->route('users.index');
        }
        return view('admin.user.edit',compact('user'));


    }
     public function update($userId, Request $request){
        $user=User::find($userId);

        if(empty($user)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:4',
            
        ]);
        
        if($validator->passes()){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
         
            $user->role = $request->role;
            $user->password = $request->password;
            $user->save();



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
     public function destroy($userId, Request $request){
        $user=User::find($userId);

        if(empty($user)){
            $request->session()->flash('error',' not found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


       
        $user->delete();
        $request->session()->flash('success',' deleted successfully');
        return response()->json([
            'status' => true,
            'message' => ' Deleted Successfully'
        ]);

    }

}
