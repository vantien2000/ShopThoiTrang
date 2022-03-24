<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.pages.profile.index');
    }

    public function editProfile(Request $request) {
        $username = $request->username;
        $email = $request->email;
        $phone_number = $request->phone_number;

        if($request->hasFile('avatar')) {
            //check lỗi image
            if ($request->file('avatar')->isValid()) {
                try {
                    
                }
                catch (FileNotFoundException $ex) {
                    return redirect()->back()->withErrors(['err', 'ảnh không được tìm thấy']);
                }
            }
        }
    }
}
