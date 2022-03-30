<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Models\Products;

class CategoryAdminRepository extends AdminAbstract
{
    public function __construct(Products $product)
    {
        $this->modal = $product;
    }

    public function filter($array) {
        $product = $this->modal->query();
        // if (!empty($array['category_name'])) {
        //     $category->where('category_name', $array['category_name']);
        // }
        // if ($array['sort_num'] == STATUS_ON) {
        //     $category->orderByRaw('category_id desc');
        // }
        // if ($array['sort_alpha'] == STATUS_ON) {
        //     $category->orderByRaw('category_name desc');
        // }
        // if ($array['status']) {
        //     $category->where('status', $array['status']);
        // }
        //pagination
        return $product->paginate(5);
    }
}