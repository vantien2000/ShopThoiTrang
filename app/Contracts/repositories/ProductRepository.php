<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Illuminate\Support\Facades\DB;
use Models\Products;
use PhpParser\Node\Expr\Cast\Double;

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

    public function saleProducts() {
        return $this->modal->where('status', '=', STATUS_ON)->where('quantity', '>', STATUS_OFF)->orderByRaw('products.sale asc')->limit(5)->get();
    }

    public function rateProducts() {
        return $this->modal->where('status', '=', STATUS_ON)->where('quantity', '>', STATUS_OFF)->orderByRaw('products.rate asc')->limit(5)->get();
    }

    public function newProducts() {
        return $this->modal->where('products.status', '=', STATUS_ON)->where('products.quantity', '>', STATUS_OFF)->orderByRaw('products.product_id desc')->limit(5)->get();
    }

    public function getProduct($product_id, $key) {
        return $this->modal->where($key, $product_id)->first();
    }

    public function changeQuantityProduct($product_id, $key, $newQuantity) {
        return $this->modal->where($key, $product_id)->update(['quantity' => DB::raw('quantity - ' . $newQuantity)]);
    }

    public function getProductsByCategoryType($category_type) {
        return $this->modal->leftJoin('types', 'types.type_id', '=', 'products.type_id')
        ->leftJoin('categories', 'categories.category_id', '=', 'types.category_id')
        ->where('categories.category_type', $category_type)
        ->limit(5)->get();
    }

    public function getProductsByCategoryId($category_id) {
        return $this->productsByCategoryId($category_id)->paginate(12);
    }

    public function getProductsByTypeId($type_id) {
        return $this->productsByTypeId($type_id)->paginate(12);
    }

    public function filterProductUser($filter, $id) {
        $products = $this->productsByCategoryId($id);
        if ($filter == 'all') { $products = $products; }
        if (isset($filter['type_category'])) {
            if ($filter['type_category'] == 'category') {$products = $this->productsByCategoryId($id);}
            if ($filter['type_category'] == 'type') {$products = $this->productsByTypeId($id);}
        }
        if (isset($filter['sort_category'])) {
            if ($filter['sort_category'] == 'all') {
                $products = $products;
            }
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
        if (isset($filter['price_filter'])) {
            $price_filter = explode('-', config('setup.price_filter')[$filter['price_filter']]);
            $price_min = (double)$price_filter[0];
            $price_max = (double)$price_filter[1];
            $products->whereRaw('products.price * (1 - products.sale/100) >=  '.$price_min . ' and ' . 
            'products.price * (1 - products.sale/100) <= '. $price_max); 
        }
        if (isset($filter['type_id'])) {
            $products->where('types.type_id', $filter['type_id']);
        }
        return $products->paginate(12);
    }

    public function productsByCategoryId($category_id) {
        $products = $this->modal->leftJoin('types', 'types.type_id', '=', 'products.type_id')
        ->leftJoin('categories', 'categories.category_id', '=', 'types.category_id')
        ->where('categories.category_id', $category_id);
        return $products;
    }

    public function productsByTypeId($type_id) {
        $products = $this->modal->leftJoin('types', 'types.type_id', '=', 'products.type_id')
        ->where('types.type_id', $type_id);
        return $products;
    }

    public function search($keyword) {
        return $this->modal->where(function($query) use($keyword) {
            $query->orWhere('products.product_name','LIKE', '%' . $keyword . '%')
            ->orWhere('products.description', 'LIKE', '%' . $keyword . '%')
            ->orWhere('products.price', $keyword)
            ->orWhere('products.add_infor', 'LIKE', '%'. $keyword .'%');
        })->paginate(12);
    }

    public function filterProductSearch($filter) {
        $products = $this->modal->query();
        if ($filter == 'all') { $products = $products; }
        if (isset($filter['sort_category'])) {
            if ($filter['sort_category'] == 'all') {
                $products = $products;
            }
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
        if (isset($filter['price_filter'])) {
            $price_filter = explode('-', config('setup.price_filter')[$filter['price_filter']]);
            $price_min = (double)$price_filter[0];
            $price_max = (double)$price_filter[1];
            $products->whereRaw('products.price * (1 - products.sale/100) >=  '.$price_min . ' and ' . 
            'products.price * (1 - products.sale/100) <= '. $price_max); 
        }
        if (isset($filter['type_id'])) {
            $products->where('types.type_id', $filter['type_id']);
        }
        return $products->paginate(12);
    }
}