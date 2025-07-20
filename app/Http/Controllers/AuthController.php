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

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('letter.show'); 
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showEmail()
    {
        return view('auth.register');
    }

    public function handleEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

            if(User::where('email', $request->email)->exists()) {
                return back()->withInput()->with('error', 'Email already signed up.');
            }

            Session::put('register.email', $request->email);
            return redirect()->route('register.setup.form');
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
        return redirect()->route('letter.show');
    }
    
}
