<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function logging(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ],[
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.', // Custom error message
            'g-recaptcha-response.captcha' => 'reCAPTCHA verification failed. Please try again.', // Custom error message
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors($validator);
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $hased = env('ADMIN_PASSWORD');

        if ($email == env('ADMIN_EMAIL') && Hash::check($password, $hased)) {
            session(['is_admin_authenticated' => true]);
            return redirect()->route('dashboard')->with('success', 'Welcome to Dashboard');
        }
        else
            return redirect()->back()->withInput($request->only('email'))->with('error', 'Wrong Email or Password!');
    }

    public function welcome()
    {
        return view('admin.index');
    }

    public function logout()
    {
        session()->forget('is_admin_authenticated');

        return redirect()->route('loginPage');
    }
}
