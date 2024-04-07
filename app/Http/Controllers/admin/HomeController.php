<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Member;
use App\Models\Spectator;
use App\Models\Portfolio;
use App\Models\Testimonial;

class HomeController extends Controller
{
     public function index()
    {
        $countm = Member::count();
        // $countm = Member::where('role_name', 'Spectator') ->count();
        $countp = Portfolio::count();
        $countb = Blog::count();
        // $countt = ::count();
        // Get the count of spectators
        // $spectatorCount = Spectator::count();

        // Get the count of users
        // $userCount = User::count();

        return view('admin.dashboard', [
            'countm' => $countm,
            'countp' => $countp,
            'countb' => $countb,
        ]);
    }
    public function logout(){
         Auth::guard('admin')->logout();
         return redirect()->route('admin.login');
    }
}
