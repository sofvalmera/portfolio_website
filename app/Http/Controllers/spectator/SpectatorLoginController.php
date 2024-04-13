<?php

namespace App\Http\Controllers\spectator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class SpectatorLogInController extends Controller
{
   
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
                else{
                    Auth::guard('spectator')->logout();
                //   return redirect()->route('admin.login')->with('error','You are not authorized to access admin panel.');
                    return redirect()->route('spectator.login')->with('error','Para sa Spectator ni nimo  gamita lamang ilaha!');
                }

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