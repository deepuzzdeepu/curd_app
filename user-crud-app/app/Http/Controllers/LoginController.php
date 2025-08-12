<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        log::info('Hi');

        // Get user from DB
        $user = DB::table('users')->where('email', $request->email)->first();

        // Check credentials
        if ($user && Hash::check($request->password, $user->password)) {
            // Store session
            Session::put('user_id', $user->id);
            Session::put('user_email', $user->email);
            Session::put('user_name', $user->name);
            log::info('Hloo');

            return redirect('/dashboard')->with('success', 'Login successful');
            log::info('session storage set');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }

    public function showRegisterForm()
    {
        return view('login')->with('openTab', 'register');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}