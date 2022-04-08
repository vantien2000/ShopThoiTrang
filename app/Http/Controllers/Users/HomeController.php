<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Admin\ListService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $list;
    public function __construct(ListService $list)
    {
        $this->list = $list;
    }
    public function index() {
        $categories = $this->list->showCateUser();
        return view('users.home.index',compact('categories'));
    }
}
