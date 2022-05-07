<?php
namespace App\Services;

use App\Contracts\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $product;

    public function __construct(ProductRepository $product)
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

    public function newProducts() {
        return $this->product->newProducts();
    }

    public function saleProducts() {
        return $this->product->saleProducts();
    }

    public function rateProducts() {
        return $this->product->rateProducts();
    }

    public function productDetail($product_id, $key = PRODUCT_ID_KEY) {
        return $this->product->show($product_id, $key);
    }

    public function quantityProductID($product_id, $key = PRODUCT_ID_KEY) {
        return $this->product->getQuantityProduct($product_id, $key);
    }

    public function changeQuantityProduct($product_id, $key = PRODUCT_ID_KEY, $newQuantity) {
        return $this->product->changeQuantityProduct($product_id, $key, $newQuantity);
    }

    public function productCategoryType($category_type) {
        return $this->product->getProductsByCategoryType($category_type);
    }

    public function productsCategory($category_id) {
        return $this->product->getProductsByCategoryId($category_id);
    }

    public function productsTypes($type_id) {
        return $this->product->getProductsByTypeId($type_id);
    }

    public function filterProductUser($filter, $id) {
        return $this->product->filterProductUser($filter, $id);
    }

    public function filterProductSearch($filter) {
        return $this->product->filterProductSearch($filter);
    }

    public function search($keyword) {
        return $this->product->search($keyword);
    }
}