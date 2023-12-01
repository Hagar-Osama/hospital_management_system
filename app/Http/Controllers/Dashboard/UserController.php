<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    public function signupPage()
    {
        return view('dashboard.pages.signup');
    }

    public function signup(RegisterRequest $request) : RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect(route('user.index'));


    }

}
