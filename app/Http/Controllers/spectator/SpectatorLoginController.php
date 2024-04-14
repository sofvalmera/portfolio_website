<?php

namespace App\Http\Controllers\spectator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class SpectatorLoginController extends Controller
{
   
    public function spectatorindex(){
        return view('spectator.login');
    }
    public function spectatoradd(){
        return view('spectator.register');
    }
    public function processRegister1(Request $request){

        $validator =Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);
        if($validator->passes()){
            $user=new User();
            $user-> name= $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password =Hash::make($request->password); 
            $user->save();

          


           session()->flash('success',' You have been Registered Successfully');
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

       


        //  $request->session()->flash('success','You have been Registered Successfully');

     
    }
    public function spectatorauthenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('spectator.login')->withErrors($validator)->withInput($request->only('email'));
        }
    
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
    
        if (Auth::guard('spectator')->attempt($credentials, $remember)) {
            $admin = Auth::guard('spectator')->user();
    
            if ($admin->role === 'Spectator') {
                return redirect()->route('spectator.dashboard');
            }
    
            Auth::guard('spectator')->logout();
            // return redirect()->route('spectator.login')->with('error', 'You are not authorized to access the admin panel.');
            return redirect()->route('spectator.login')->with('error','Para sa Spectator ni nimo, Gamita lamang ilaha!');
        }
    
        return redirect()->route('spectator.login')->with('error', 'Invalid email or password');
    }
    
}