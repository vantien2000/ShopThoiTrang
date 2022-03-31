<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ListService;
use Illuminate\Http\Request;
use Models\Products;

class ProductController extends Controller
{
    protected Products $products;
    protected ListService $list;
    public function __construct(Products $products, ListService $list)
    {
        $this->list = $list;
        $this->products = $products;
    }

    public function index() {
        $products = $this->products->all();
        return view('admin.products.index');
    }

    public function addProduct(Request $request) {
        $data= [];
        $types = $this->list->showAllType();
        return view('admin.products.create', compact('types'));
    }
}
