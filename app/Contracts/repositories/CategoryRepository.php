<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Models\Categories;

class CategoryRepository extends AdminAbstract
{
    public function __construct(Categories $cate)
    {
        $this->modal = $cate;
    }

    public function showCateUser() {
        return $this->modal->where('status', STATUS_ON)->get();
    }
}