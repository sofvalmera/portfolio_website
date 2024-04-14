<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminLogInController extends Controller
{
    //number 1 ni
    public function index(){
        return view('admin.login');
    }
    public function authenticate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
    }

    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember');

    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        $admin = Auth::guard('admin')->user();

        if ($admin->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        }

        Auth::guard('admin')->logout();
        // return redirect()->route('admin.login')->with('error', 'You are not authorized to access the admin panel.');
        return redirect()->route('admin.login')->with('error','Dili ka Pwede ngari! Pang Admin ra ni!');
    }

    return redirect()->route('admin.login')->with('error', 'Invalid email or password');
}




    // public function authenticate(Request $request){
    //     $validator= Validator::make($request->all(),[
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     if($validator->passes()){

    //         if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=> $request->password],$request->get('remember'))) {

    //             $admin=Auth::guard('admin')->user();

    //             if($admin->role=="Admin"){
    //             // if($admin->role){
    //                 return redirect()->route('admin.dashboard');

    //            }
    //             //  elseif($admin->role=="Spectator"){
    //             //     return redirect()->route('spectator.dashboard');
    //             else{
    //                 Auth::guard('admin')->logout();
    //                 // return redirect()->route('admin.login')->with('error','You are not authorized to access admin panel.');
    //                 return redirect()->route('admin.login')->with('error','Dili ka Pwede ngari! Pang Admin ra ni!');
    //             }

    //             // return redirect()->route('admin.dashboard');

    //         }
    //          else{
    //              return redirect()->route('admin.login')->with('error','Either Email/Password is incorrect');
    //         }

    //     }else{
    //         return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
    //     }
    // }
    public function spectatorindex(){
        return view('spectator.login');
    }
    public function spectatorauthenticate(Request $request){
        $validator= Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->passes()){

            if(Auth::guard('spectator')->attempt(['email'=> $request->email,'password'=> $request->password],$request->get('remember'))) {

                $spectator=Auth::guard('spectator')->user();

                if($spectator->role=="Spectator"){
                // if($admin->role){
                    return redirect()->route('spectator.dashboard');

               }
                //  elseif($admin->role=="Spectator"){
                //     return redirect()->route('spectator.dashboard');
                // else{
                //     Auth::guard('admin')->logout();
                  // return redirect()->route('admin.login')->with('error','You are not authorized to access admin panel.');
                //     return redirect()->route('admin.login')->with('error','Dili ka Pwede ngari! Pang Admin ra ni!');
                // }

                // return redirect()->route('admin.dashboard');

            }
             else{
                 return redirect()->route('spectator.login')->with('error','Either Email/Password is incorrect');
            }

        }else{
            return redirect()->route('spectator.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }

}
