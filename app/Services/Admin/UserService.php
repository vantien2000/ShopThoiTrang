<?php
namespace App\Services\Admin;

use App\Contracts\Repositories\UserAdminRepository;

class UserService
{
    protected UserAdminRepository $userRepository;

    public function __construct(UserAdminRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function filter($filter) {
        return $this->userRepository->filter($filter);
    }

    public function editActiveUser($user_id, $isActive) {
        $data = ['isActive' => $isActive];
        $isUpdate = $this->userRepository->edit($user_id, 'user_id', $data);
        $user = $isUpdate ? $this->userRepository->show($user_id, 'user_id') : [];
        return $user;
    }
}