<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'g-recaptcha-response' => 'recaptcha',
        ],[
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'reCAPTCHA verification failed. Please try again.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors($validator);
        }
        User::create([
            'name'=>$request->input('username'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);

        User_Info::create([
            'email'=>$request->input('email'),
        ]);

        return redirect()->route('login')->with('success','Registration Successfull');
    }

    public function loggin(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required|min:8',
            'g-recaptcha-response' => 'recaptcha',
        ],[
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'reCAPTCHA verification failed. Please try again.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors($validator);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->route('home')->with('success','Login Successfull');
        }
        else
            return redirect()->back()->with('error','Failed')->withInput();
    }
}
