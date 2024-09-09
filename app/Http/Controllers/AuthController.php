<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }


    public function register(RegisterRequest $request)
    {
        User::create($request->all());

        return to_route('auth.login-view');
    }


    public function loginView()
    {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        $user = User::firstWhere('email', $request->email);

        if (!$user || !Hash::check($request->password, $user->password))
            return back()->with('error', 'اطلاعات وارد شده معتبر نیست.')->withInput();

        Auth::login($user);

        return to_route('landing');
    }


    public function logout()
    {
        Auth::logout();

        return to_route('landing');
    }
}
