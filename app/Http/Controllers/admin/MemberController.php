<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Support\Facades\File;
use Image;



class MemberController extends Controller
{
    //
    public function index(Request $request){
         $members= Member::latest();
         if(!empty($request->get('keyword'))){

            $members= $members->where('name','like','%'.$request->get('keyword').'%');
         }


        $members= $members->paginate(10);
        return view('admin.member.list',compact('members'));

    }
     public function create(){
        return view('admin.member.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'name' => 'required',
            'role' => 'required',

            
        ]);
        
        if($validator->passes()){
            $member=new Member();
            $member->name = $request->name;
            $member->role = $request->role;
            $member->description = $request->description;
            $member->save();

            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $member->id.'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/member/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/member/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $member->image = $newImageName;
                $member->save();
            }


            $request->session()->flash('success','Member Added Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Member Added Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($memberId, Request $request){

        $member=Member::find($memberId);

        if(empty($member)){
            return redirect()->route('members.index');
        }
        return view('admin.member.edit',compact('member'));


    }
     public function update($memberId, Request $request){
        $member=Member::find($memberId);

        if(empty($member)){
            $request->session()->flash('error','Member not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Member not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
            'name' => 'required',
            'role' => 'required',
            
        ]);
        
        if($validator->passes()){
            $member->name = $request->name;
            $member->role = $request->role;
            $member->description = $request->description;
            $member->save();

            $oldImage = $member->image ;
            // =$newImageName;
            // $category->save();


            //imageni

            if(!empty($request->image_id)){
                $tempImage = TempImage::find($request->image_id);
                $extArray =explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $member->id.'-'.time().'.'.$ext;
                $sPath= public_path().'/temp/'.$tempImage->name;
                $dPath= public_path().'/uploads/member/'.$newImageName;
                File::copy($sPath,$dPath);

                //thumb
                $dPath=public_path().'/uploads/member/thumb/'.$newImageName;
                $img = Image::make($sPath);
                // $img->resize(450,600);
                $img->fit(450, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($dPath);

                $member->image = $newImageName;
                $member->save();

                //delete sa old pic
                File::delete(public_path().'/uploads/member/thumb/'.$oldImage);
                File::delete(public_path().'/uploads/member/'.$oldImage);
            }


            $request->session()->flash('success','Member Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => 'Member Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($memberId, Request $request){
        $member=Member::find($memberId);

        if(empty($member)){
            $request->session()->flash('error','Member not found');
            return response()->json([
                'status' => true,
                'message' => 'Member not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


        File::delete(public_path().'/uploads/member/thumb/'.$member->image);
        File::delete(public_path().'/uploads/member/'.$member->image);

        $member->delete();
        $request->session()->flash('success','Member deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Member Deleted Successfully'
        ]);

    }

}
