<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Models\Types;

class TypeAdminRepository extends AdminAbstract
{
    public function __construct(Types $type)
    {
        $this->modal = $type;
    }
}