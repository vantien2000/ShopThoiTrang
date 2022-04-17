<?php
namespace App\Services;

use App\Contracts\Repositories\ProfileRepository;

class ProfileService
{
    protected ProfileRepository $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getProfileAdmin() {
        return $this->profileRepository->show(ADMIN_ID, 'user_id');
    }

    public function editProfile($email, $array) {
        return $this->profileRepository->editProfile($email, $array);
    }
}