<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Models\UserData;

class ProfileAdminRepository extends AdminAbstract
{
    public function __construct(UserData $userData)
    {
        $this->modal = $userData;
    }

    public function editProfile($email, $array) {
        return $this->modal->where('email', $email)->update($array);
    }
}