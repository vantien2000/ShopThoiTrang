<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Illuminate\Support\Facades\DB;
use Models\Products;

class ProductRepository extends AdminAbstract
{
    public function __construct(Products $product)
    {
        $this->modal = $product;
    }

    public function newProducts() {
        return $this->modal->orderByRaw('products.product_id desc')->limit(5)->get();
    }
}