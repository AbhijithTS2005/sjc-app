<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Redirect based on user role and login source
            $user = Auth::user();
            $loginFrom = $request->input('login_from', 'faculty');
            
            // Store login source in session for header navigation
            $request->session()->put('login_from', $loginFrom);
            
            // Admin users: redirect based on login source
            if ($user->is_admin) {
                if ($loginFrom === 'events') {
                    return redirect()->intended('/admin/events');
                } else {
                    return redirect()->intended('/admin/faculty-dashboard');
                }
            }
            
            // Faculty users: redirect based on login source
            if ($user->department) {
                if ($loginFrom === 'events') {
                    // Redirect to department event management
                    return redirect()->intended(route('dept.events.index', $user->department));
                } else {
                    // Redirect to department faculty management
                    return redirect()->intended(route('dept.faculty.manage', $user->department));
                }
            }
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
