<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('admin.login.loginForm');
    }

    public function postLogin(LoginRequest $request) 
    {
        $email = $request->email;
        $password = $request->password;
        $isLogin = Auth::attempt(['email' => $email, 'password' => $password]);
        if ($isLogin) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->withErrors(['mgs' => 'Email hoặc password không chính xác!']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
