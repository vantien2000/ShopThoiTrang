<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Http\Requests\Users\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('users.accounts.login');
    }

    public function postLogin(LoginRequest $request) {
        $email = $request->email;
        $password = $request->password;
        $isLogin = Auth::attempt(['email' => $email, 'password' => $password, 'type' => STATUS_OFF]);
        if ($isLogin) {
            return redirect()->route('users.home');
        }
        return redirect()->route('users.login')->withErrors(['mgs' => 'Email hoặc password không chính xác!']);
    }

    public function register() {
        return view('users.accounts.register');
    }

    public function postRegister(RegisterRequest $request) {
        dd($request->all());
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('users.home');
    }
}
