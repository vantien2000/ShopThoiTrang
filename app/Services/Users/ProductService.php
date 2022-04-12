<?php
namespace App\Services\Users;

use App\Contracts\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $products;

    public function __construct(
        ProductRepository $products
    ) {
        $this->products = $products;
    }

    public function newProducts() {
        return $this->products->newProducts();
    }

    public function productDetail($product_id, $key =  PRODUCT_ID_KEY) {
        return $this->products->show($product_id, $key);
    }
}