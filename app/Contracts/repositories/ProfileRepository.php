<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Models\UserData;

class ProfileRepository extends RepositoryAbstract
{
    public function __construct(UserData $userData)
    {
        $this->modal = $userData;
    }

    public function editProfile($email, $array) {
        return $this->modal->where('email', $email)->update($array);
    }
}