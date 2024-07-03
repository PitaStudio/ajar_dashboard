<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginView()
    {
        return view('auth.login');
    }//end of showLoginView

    public function checkLogin(LoginRequest $request)
    {
        if(auth()->guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
        {
            return redirect()->route('banners.index');
        }//end if
        // toastr()->error('البريد الالكتروني او كلمه المرور خطأ','خطأ');
        return redirect()->back()->with(['error'=>'البريد الالكتروني او كلمه المرور خطأ']);
    }//end of showLoginView

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }//end of logout
}
