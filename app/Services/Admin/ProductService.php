<?php
namespace App\Services\Admin;

use App\Contracts\Repositories\ProductAdminRepository;

class ProductService
{
    protected ProductAdminRepository $product;

    public function __construct(ProductAdminRepository $product)
    {
        $this->product = $product;
    }

    public function filterProduct($filter) {
        return $this->product->filter($filter);
    }

    public function storeProduct($array) {
        return $this->product->store($array);
    }

    public function showAllProducts() {
        return $this->product->all();
    }

    public function showProductById($product_id, $key = PRODUCT_ID_KEY) {
        return $this->product->show($product_id, $key);
    }

    public function editProduct($id, $array, $key = PRODUCT_ID_KEY) {
        return $this->product->edit($id, $key, $array);
    }

    public function deleteProduct($id, $key = PRODUCT_ID_KEY) {
        $product = $this->product->delete($id, $key);
        $result = $product ? 1: 0;
        return $result;
    }

    public function getProductById($product_id, $key = PRODUCT_ID_KEY) {
        return $this->product->detail($product_id, $key);
    }
}