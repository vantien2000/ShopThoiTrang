<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index(Request $request) {
        $filter = $request->all();
        $users = $this->userService->filter($filter);
        return view('admin.users.index', compact('users'));
    }

    public function editUser(Request $request) {
        $user_id = $request->id;
        $isActive = $request->isActive;
        $user = $this->userService->editActiveUser($user_id, $isActive);
        return response()->json($user);
    }
}
