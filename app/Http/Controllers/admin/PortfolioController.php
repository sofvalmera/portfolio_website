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



class PortfolioController extends Controller
{
    //
    public function index(Request $request){
        //  $categories= Category::latest();
        //  if(!empty($request->get('keyword'))){

        //     $categories= $categories->where('name','like','%'.$request->get('keyword').'%');
        //  }


        // $categories= $categories->paginate(10);
        // return view('admin.category.list',compact('categories'));
        return view('admin.portfolio.list');

    }
}