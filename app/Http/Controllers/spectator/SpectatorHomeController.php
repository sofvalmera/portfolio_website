<?php

namespace App\Http\Controllers\spectator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Member;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\Testimonial;

class SpectatorHomeController extends Controller
{
    
    public function spectatorindex()
    {
        // $countm = Member::count();
        // $countm = Member::where('role_name', 'Spectator') ->count();
        // $countp = Portfolio::count();
        // $countb = Blog::count();
        $countt = Testimonial::count();
        // $countu = User::count();
        // $countt = ::count();
        // Get the count of spectators
        // $spectatorCount = Spectator::count();

        // Get the count of users
        // $userCount = User::count();

        return view('spectator.dashboard', [
          
            'countt' => $countt,
           
        ]);
    }
   
  
    public function spectatorlogout(){
        Auth::guard('spectator')->logout();
        return redirect()->route('spectator.login');
   }
}
