<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected ProfileService $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index() {
        if(Auth::check()) {
            $admin = $this->profileService->getProfileAdmin();
        }
        return view('admin.pages.profile.index', compact('admin'));
    }

    public function editProfile(ProfileRequest $request) {
        $data = $request->all();
        unset($data['_token']);
        if($request->hasFile('avatar')) {
            //check lỗi image
            if ($request->file('avatar')->isValid()) {
                $image_str = $request->file('avatar')->getClientOriginalName();
                $new_image = preg_replace('/\.(gif|jpeg|jpg|png|svg)$/i', '.webp', $image_str);
                $data['avatar'] = $new_image;
                $admin = $this->profileService->editProfile($request->email, $data);
                convert_image_webp($request->file('avatar'), 80, 80)->save(public_path() . '/admins/images/' . $new_image);
            }
        }
        return redirect()->route('admin.profile');
    }
}
