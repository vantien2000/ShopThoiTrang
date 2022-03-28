<?php
namespace App\Services\Admin;

use App\Contracts\Repositories\ProfileAdminRepository;

class ProfileService
{
    protected ProfileAdminRepository $profileRepository;

    public function __construct(ProfileAdminRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getProfileAdmin() {
        return $this->profileRepository->show(ADMIN_ID);
    }

    public function editProfile($email, $array) {
        return $this->profileRepository->editProfile($email, $array);
    }
}