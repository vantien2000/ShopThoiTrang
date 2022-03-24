<?php
namespace App\Contrats\Repositories;

use App\Contrats\AdminAbstract;
use Models\UserData;

class ProfileAdminRepository extends AdminAbstract
{
    protected UserData $userData;

    public function __construct($userData)
    {
        $this->modal = $userData;
    }
}