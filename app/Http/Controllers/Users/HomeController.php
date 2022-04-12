<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Users\ListService;
use App\Services\Users\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $list, $products;
    public function __construct(ListService $list, ProductService $products)
    {
        $this->list = $list;
        $this->products = $products;
    }
    public function index() {
        $categories = $this->list->categoriesUser();
        $newProducts = $this->products->newProducts();
        return view('users.home.index',compact('categories', 
        'newProducts'));
    }
}
