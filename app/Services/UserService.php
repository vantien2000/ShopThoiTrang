<?php
namespace App\Services;

use App\Contracts\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
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

    public function createUser($data) {
        return $this->userRepository->store($data);
    }
}