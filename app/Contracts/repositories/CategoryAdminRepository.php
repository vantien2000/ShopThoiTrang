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

    public function filter($array) {
        $category = $this->modal->query();
        if (!empty($array['category_name'])) {
            $category->where('categories.category_name', 'LIKE', '%'. $array['category_name'] .'%');
        }
        if (!empty($array['sort_num'])) {
            $category->orderByRaw('category_id desc');
        }
        if (!empty($array['sort_num'])) {
            $category->orderByRaw('category_name desc');
        }
        if (isset($array['status'])) {
            if (empty($array['status'])) {
                $category->where('status', STATUS_OFF);
            }
            else {
                $category->where('status', STATUS_ON);
            }
        }
        //pagination
        return $category->paginate(5);
    }

    public function showCateUser() {
        return $this->modal->where('status', STATUS_ON)->get();
    }
}