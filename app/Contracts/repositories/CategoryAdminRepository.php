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
            $category->where('category_name', $array['category_name']);
        }
        if ($array['sort_num'] == STATUS_ON) {
            $category->orderByRaw('category_id desc');
        }
        if ($array['sort_alpha'] == STATUS_ON) {
            $category->orderByRaw('category_name desc');
        }
        if ($array['status']) {
            $category->where('status', $array['status']);
        }
        //pagination
        return $category->paginate(5);
    }
}