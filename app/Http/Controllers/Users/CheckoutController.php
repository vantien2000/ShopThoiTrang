<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\ListService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $list;
    public function __construct(ListService $list)
    {
        $this->list = $list;
    }
    public function index() {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        return view('users.checkout.index', compact('categories_male', 'categories_female'));
    }
}
