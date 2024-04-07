<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Support\Facades\File;
use Image;



class UserController extends Controller
{
    //
    public function index(Request $request){
        //  $blogs= Blog::latest();
        //  if(!empty($request->get('keyword'))){

        //     $blogs= $blogs->where('name','like','%'.$request->get('keyword').'%');
        //  }


        // $blogs= $blogs->paginate(10);
        return view('admin.user.list');

    }
}