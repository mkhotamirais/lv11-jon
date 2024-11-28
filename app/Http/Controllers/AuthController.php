<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:2', 'confirmed'],
        ]);
        // register
        $user = User::create($fields);
        // login
        Auth::login($user);
        // verify email
        event(new Registered($user));
        // subscribe
        if ($request->subscribe) {
            event(new UserSubscribed($user));
        }
        // redirect
        return redirect()->route('dashboard');
    }
    // login user
    public function login(Request $request)
    {
        // validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:2'],
        ]);

        // try to login the user
        if (Auth::attempt($fields, $request->remember)) {
            // return redirect()->route('index');
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'failed' => 'Invalid Credentials',
            ]);
        }
    }
    // logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return redirect()->route('login');
        return redirect('/');
    }
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard');
    }

    public function resendVerifyEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
