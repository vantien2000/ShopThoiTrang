<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Admin\ListService;
use App\Services\Users\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $list, $productService;
    public function __construct(ListService $list, ProductService $productService)
    {
        $this->list = $list;
        $this->productService = $productService;
    }
    public function index(Request $request) {
        $product_id = $request->id;
        $product = $this->productService->productDetail($product_id);
        $categories = $this->list->showCateUser();
        return view('users.details.index',compact('categories', 'product'));
    }
}
