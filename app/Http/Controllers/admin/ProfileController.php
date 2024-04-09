<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Support\Facades\File;
use Image;



class ProfileController extends Controller
{
    //
    public function index(Request $request){
         $profiles= Profile::latest();
        //  if(!empty($request->get('keyword'))){

        //     $profiles= $profiles->where('name','like','%'.$request->get('keyword').'%');
        //  }


        $profiles= $profiles->paginate(10);
        return view('admin.profile.list',compact('profiles'));

    }
     public function create(){
        return view('admin.profile.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[

            'textlogo' => 'required|max:5|min:2',
            'role'  => 'required',
            'fullname' => 'required',
            'age' => 'required|numeric',
            'degree' => 'required',
            'birthday' => 'required',
           'phonenumber' => 'required|numeric',
            'email' => 'required',
            'barangay' => 'required',
            'province' => 'required',
            'zipcode' => 'required|numeric',
            'country' => 'required',
            'religion' => 'required',
            'municipality' => 'required',
        ]);
        
        if($validator->passes()){
            $profile=new Profile();
            $profile->textlogo = $request->textlogo;
            $profile->role = $request->role;
            $profile->description = $request->description;
            $profile->fullname = $request->fullname;
            $profile->age = $request->age;
            $profile->degree = $request->degree;
            $profile->birthday = $request->birthday;
            $profile->phonenumber = $request->phonenumber;
            $profile->email = $request->email;
            $profile->barangay = $request->barangay;
            $profile->province = $request->province;
            $profile->zipcode = $request->zipcode;
            $profile->country = $request->country;
            $profile->religion = $request->religion;
            $profile->municipality = $request->municipality;
            $profile->status = $request->status;
            $profile->gender = $request->gender;
            $profile->save();

            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $profile->id.'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/profile/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/profile/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 450, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $profile->image = $newImageName;
                $profile->save();
            }


            $request->session()->flash('success','Profile Created Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Profile Created Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($profileId, Request $request){

        $profile=Profile::find($profileId);

        if(empty($profile)){
            return redirect()->route('profiles.index');
        }
        return view('admin.profile.edit',compact('profile'));


    }
     public function update($profileId, Request $request){
        $profile=Profile::find($profileId);

        if(empty($profile)){
            $request->session()->flash('error','Profile not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Profile not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'textlogo' => 'required|max:5|min:2',
            'role'  => 'required',
            'fullname' => 'required',
            'age' => 'required|numeric',
            'degree' => 'required',
            'birthday' => 'required',
            'phonenumber' => 'required|numeric',
            'email' => 'required',
            'barangay' => 'required',
            'province' => 'required',
            'zipcode' => 'required|numeric',
            'country' => 'required',
            'religion' => 'required',
            'municipality' => 'required',
        ]);
        
        if($validator->passes()){
            $profile->role = $request->role;
            $profile->textlogo = $request->textlogo;
            $profile->description = $request->description;
            $profile->fullname = $request->fullname;
            $profile->age = $request->age;
            $profile->degree = $request->degree;
            $profile->birthday = $request->birthday;
            $profile->phonenumber = $request->phonenumber;
            $profile->email = $request->email;
            $profile->barangay = $request->barangay;
            $profile->province = $request->province;
            $profile->zipcode = $request->zipcode;
            $profile->country = $request->country;
            $profile->religion = $request->religion;
            $profile->municipality = $request->municipality;
            $profile->status = $request->status;
            $profile->gender = $request->gender;
            $profile->save();

            $oldImage = $profile->image ;
            // =$newImageName;
            // $category->save();


            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $profile->id.'-'.time().'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/profile/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/profile/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 450, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $profile->image = $newImageName;
                $profile->save();

                //delete sa old pic
                File::delete(public_path().'/uploads/profile/thumb/'.$oldImage);
                File::delete(public_path().'/uploads/profile/'.$oldImage);
            }


            $request->session()->flash('success','Profile Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Profile Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($profileId, Request $request){
        $profile=Profile::find($profileId);

        if(empty($profile)){
            $request->session()->flash('error','Profile not found');
            return response()->json([
                'status' => true,
                'message' => 'Profile not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


        File::delete(public_path().'/uploads/profile/thumb/'.$profile->image);
        File::delete(public_path().'/uploads/profile/'.$profile->image);

        $profile->delete();
        $request->session()->flash('success','Profile deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Profile Deleted Successfully'
        ]);

    }

}
