<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check())
        {
            dd('complite');
            //return redirect('/admin/topic/all');
        }
        //return redirect()->route('sign_in');   
    }

    public function login(Request $request){        
        if(Auth::attempt(['login'=>$request->login,'password'=>$request->password]))
        {
            return redirect('/admin/topic');
        }
        return back()->withInput()->withErrors("User wasn`t found");
    }

    public function signout ()
    {
        Auth::logout();
        //return redirect()->route('sign_in');
    }
}
