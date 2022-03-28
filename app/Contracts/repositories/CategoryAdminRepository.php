<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Models\Categories;

class CategoryAdminRepository extends AdminAbstract
{
    public function __construct(Categories $cate)
    {
        $this->modal = $cate;
    }
}