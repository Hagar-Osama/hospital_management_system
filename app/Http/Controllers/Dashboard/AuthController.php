<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.index');
    }

    public function signinPage()
    {
        return view('dashboard.pages.signin');
    }

    public function signin(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        $user_type = $request->input('user_type');

        if ($user_type == 'admin') {
            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard/admin/index');
            }
        // } elseif ($user_type == 'doctor') {
        //     if (Auth::guard('doctor')->attempt($credentials)) {
        //         $request->session()->regenerate();
        //         return redirect()->intended('dashboard/doctor/index');
        //     }
        } else {
            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard/user/index');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signout()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        Session::flush();
        Session::regenerateToken();

        return redirect()->route('signinPage');
    }
}
