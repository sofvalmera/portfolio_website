<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class FrontController extends Controller
{
    //
    public function index(){
  
        return view('front.home');
      
    }
}
