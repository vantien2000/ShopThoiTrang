<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\ListService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    protected $product, $list, $orderService;
    public function __construct(ProductService $product, ListService $list, OrderService $orderService)
    {
        $this->product = $product;
        $this->list = $list;
        $this->orderService = $orderService;
    }

    public function index() {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        if (!Auth::check()) {
            abort(404);
        }
        $user = Auth::user();
        $orders = $this->orderService->getOrderByUser($user->user_id);
        return view('users.invoices.index', compact('categories_male', 'categories_female', 'orders'));
    }

    public function remove(Request $request) {
        $order_id = $request->id;
        $isDelete = $this->orderService->updateResultOrder($order_id, ORDER_ID_KEY, 0);
        return response()->json(['isDelete' => $isDelete]);
    }
}
