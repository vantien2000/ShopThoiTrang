<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Models\Products;

class ProductController extends Controller
{
    protected Products $products;
    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function index() {
        $products = $this->products->all();
        return view('admin.products.index');
    }

    public function addProduct(Request $request) {
        return view('admin.products.create');
    }
}
