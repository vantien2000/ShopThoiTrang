<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\ListService;
use App\Services\ProductService;
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
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        $newProducts = $this->products->newProducts();
        return view('users.home.index',compact('categories_male', 'categories_female', 
        'newProducts'));
    }
}
