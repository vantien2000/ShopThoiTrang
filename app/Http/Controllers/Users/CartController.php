<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\ListService;
use App\Services\ProductService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $product, $list;
    public function __construct(ProductService $product, ListService $list)
    {
        $this->product = $product;
        $this->list = $list;
    }
    public function index() {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        $carts = session('carts');
        return view('users.carts.index',compact('categories_male', 'categories_female', 'carts'));
    }
    public function addCart(Request $request) {
        $carts = session('carts');
        //Nếu giỏ hàng chưa có
        $this->validateQuantity($request->quantity, $request->product_id);
        $size = isset($request->size) ? $request->size : config('setup.sizes')[0];
        if (empty(session('carts'))) {
            $carts[$request->product_id . '-' .$size] = $this->getCart($request->all());
            session()->put('carts', $carts);
        }
        else {
            $carts = session('carts');
            if (isset($carts[$request->product_id . '-' .$size])) {
                $carts[$request->product_id . '-' .$size]['quantity'] += $request->quantity;
                $this->validateQuantity($carts[$request->product_id . '-' .$size]['quantity'], $request->product_id);
            } else {
                $carts[$request->product_id . '-' .$size] = $this->getCart($request->all());
            }
            session()->put('carts', $carts);
        }
        return ['cart_count' => count(session('carts'))];
    }

    public function updateCart(Request $request) {
        $carts = session('carts');
        $size = isset($request->size) ? $request->size : config('setup.sizes')[0];
        if(isset($carts[$request->product_id . '-' .$size])) {
            $carts[$request->product_id . '-' . $size]['quantity'] = $request->quantity;
            $this->validateQuantity($request->product_id, $carts[$request->product_id . '-' .$size]['quantity']);
            session()->put('carts', $carts);
        }
        return session('carts');
    }

    public function deleteCart(Request $request) {
        $carts = session('carts');
        if(isset($carts[$request->key])) {
            unset($carts[$request->key]);
            session()->put('carts', $carts);
        }
        return session('carts');
    }

    public function getCart($array) {
        $size = isset($array['size']) ? $array['size'] : config('setup.sizes')[0];
        $cart = $array;
        unset($cart['_token']);
        $cart['size'] = $size;
        $cart['products'] = $this->product->productDetail($array['product_id']);
        return $cart;
    }

    public function validateQuantity($quantityInput, $product_id) {
        $quantity = $this->product->quantityProductID($product_id);
        $mgs = '';
        if ($quantity == 0 || $quantityInput > $quantity) {
            $mgs = 'Không đủ hàng!!!';
        }
        return response()->json(['err' => $mgs]);
    }
}
