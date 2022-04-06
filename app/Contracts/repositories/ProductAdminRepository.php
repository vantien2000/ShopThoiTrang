<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Illuminate\Support\Facades\DB;
use Models\Products;

class ProductAdminRepository extends AdminAbstract
{
    public function __construct(Products $product)
    {
        $this->modal = $product;
    }

    public function filter($filter) {
        $keyword = empty($filter['keyword']) ? '' : $filter['keyword'];
        $product = $this->modal->where(function($query) use($keyword) {
            $query->orWhere('products.product_name','LIKE', '%' . $keyword . '%')
            ->orWhere('products.description', 'LIKE', '%' . $keyword . '%')
            ->orWhere('products.price', $keyword)
            ->orWhere('products.add_infor', 'LIKE', '%'. $keyword .'%');
        });
        if (isset($filter['status'])) {
            if ($filter['status'] == 0) { $product->where('products.status', STATUS_OFF); }
            else { $product->where('products.status', STATUS_ON); }
        }
        if (!empty($filter['size']) && in_array(config('setup.size'),array($filter['size']), true)) {
            $product->where('size', $filter['size']);
        }
        if (!empty($filter['type_id'])) {
            $product->where('type_id', $filter['type_id']);
        }
        return $product->paginate(5);
    }

    public function detail($product_id, $key) {
        return $this->modal->select(DB::raw('products.*, types.type_name'))
        ->leftJoin('types','types.type_id', '=', 'products.type_id')->where($key, $product_id)->first();
    }
}