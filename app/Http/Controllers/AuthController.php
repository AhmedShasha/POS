<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class authController extends Controller
{
    public function login(Request $request){
        // dd($request);
        $data=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($data)){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->back()->withErrors('Data Not Validated');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
