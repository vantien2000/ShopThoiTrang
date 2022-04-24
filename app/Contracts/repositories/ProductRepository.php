<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Illuminate\Support\Facades\DB;
use Models\Products;

class ProductRepository extends RepositoryAbstract
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

    public function updateRate($array) {
        foreach ($array as $value) {
            $this->modal->where('product_id', $value['product_id'])->update(['rate' => round($value['rate'], ROUND_NUMBER_RATE)]);
        }
    }

    public function detail($product_id, $key) {
        return $this->modal->select(DB::raw('products.*, types.type_name'))
        ->leftJoin('types','types.type_id', '=', 'products.type_id')->where($key, $product_id)->first();
    }

    public function newProducts() {
        return $this->modal->orderByRaw('products.product_id desc')->limit(5)->get();
    }

    public function getQuantityProduct($product_id, $key) {
        return $this->modal->where($key, $product_id)->pluck('quantity')->toArray();
    }

    public function getProductsByCategoryId($category_id) {
        return $this->productsByCategoryId($category_id)->paginate(12);
    }

    public function filterProductUser($filter, $category_id) {
        $products = $this->productsByCategoryId($category_id);
        if (isset($filter['sort_category'])) {
            if ($filter['sort_category'] == 'a_z') {
                $products->orderByRaw('products.product_name asc');
            }
            if ($filter['sort_category'] == 'z_a') {
                $products->orderByRaw('products.product_name desc');
            }
            if ($filter['sort_category'] == 't_c') {
                $products->orderByRaw('products.price asc');
            }
            if ($filter['sort_category'] == 'c_t') {
                $products->orderByRaw('products.price desc');
            }
        }
        if (isset($filter['size'])) {
            $products->where('products.size', $filter['size']);
        }
        return $products->paginate(12);
    }

    public function productsByCategoryId($category_id) {
        $products = $this->modal->leftJoin('types', 'types.type_id', '=', 'products.type_id')
        ->leftJoin('categories', 'categories.category_id', '=', 'types.category_id')
        ->where('categories.category_id', $category_id);
        return $products;
    }
}