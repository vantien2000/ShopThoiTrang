<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Http\Requests\Users\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login() {
        return view('users.accounts.login');
    }

    public function postLogin(LoginRequest $request) {
        $email = $request->email;
        $password = $request->password;
        $isLogin = Auth::attempt(['email' => $email, 'password' => $password]);
        if ($isLogin) {
            return redirect()->route('users.home');
        }
        return redirect()->route('users.login')->withErrors(['mgs' => 'Email hoặc password không chính xác!']);
    }

    public function register() {
        return view('users.accounts.register');
    }

    public function postRegister(RegisterRequest $request) {
        $data = $request->all();
        $data['type'] = STATUS_OFF;
        if ($request->confirm != $request->password) {
            return redirect()->route('users.register')->withErrors(['mgs' => 'Mật khẩu không khớp']);
        } else {
            $data['password'] = bcrypt($request->password);
        }
        if (!$this->userService->createUser($data)) {
            abort(404);
        }
        return redirect()->route('users.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('users.home');
    }
}
