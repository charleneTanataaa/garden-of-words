<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('letter.create'); 
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showEmailorOtpForm()
    {
        return view('auth.email_otp');
    }

    public function handleEmailorOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        if($request->has('send_otp')){
            $otp = rand(100000, 999999);

            Session::put('register.email', $request->email);
            Session::put('register.otp', $otp);

            return back()
            ->withInput()
            ->with('error', "OTP Code: $otp");
        }

        if($request->has('verify_otp')){
            if($request->otp == Session::get('register.otp')){
                return redirect()->route('register.setup.form');
            }
            return back()->with('error', 'Invalid OTP code');
        }
    }

    public function showSignUpForm(){
        if(!Session::has('register.email')){
            return redirect()->route('register.email.form');
        }
        $flowers = Flower::all();
        return view('auth.signup', compact('flowers'));
    }

    public function handleSignup(Request $request){
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'selected_flower_id' => 'required|exists:flowers,id',
        ]);

        $user = User::create([
            'email' => Session::get('register.email'),
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'selected_flower_id' => $request->selected_flower_id,
            'flower_start_date' => now(),
            'role' => 'user'
        ]);

        Auth::login($user);
        Session::forget(['register.email', 'register.otp']);
        return redirect()->route('letter.create');
    }
    
}
