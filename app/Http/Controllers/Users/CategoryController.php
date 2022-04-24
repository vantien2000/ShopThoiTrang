<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\ListService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Models\Categories;

class CategoryController extends Controller
{
    protected $product, $list;
    public function __construct(ProductService $product, ListService $list)
    {
        $this->product = $product;
        $this->list = $list;
    }
    
    public function index(Request $request) {
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        $category_id = $request->id;
        $productsByCategoryId = $this->product->productsCategory($category_id);
        $category = $this->list->showCateById($category_id);
        return view('users.category_products.index', compact(
            'categories_male', 
            'categories_female',
            'productsByCategoryId',
            'category'
        ));
    }

    public function filterCategory(Request $request) {
        $filter = $request->all();
        unset($filter['_token']);
        $category_id = $request->id;
        $products = $this->product->filterProductUser($filter, $category_id);
        $html = $products->count() == 0 ? '<p class="f-bolder">Không có sản phẩm!!!</p>' : '';
        foreach ($products as $product) {
            $html .= $this->output($product);
        }
        return response()->json($html);
    }

    public function output($product) {
        $checkNewProduct = $product->sale > 0 ? '<span class="icon-new bg-sale">' . $product->sale . '%</span>' :
        '<span class="icon-new bg-new">New</span>';
        $oldPrice = $product->sale > 0 ? '<span class="old_price">' . number_format($product->price, 0, ',', '.') . '<sup>vnđ</sup></span>' : '';
        return '<div class="product"><a class="product_image" href="'. route('users.detail', ['id' => $product->product_id]) .'">'.
        '<img src="' . asset('userfiles/images/products/' . $product->image) . '" width="100%" height="300px" alt="">' . $checkNewProduct .
        '</a><div class="star-ratings"><div class="fill-ratings" style="width: ' . $product->rate * 100 / 5 . '%;">' . 
        '<span>★★★★★</span></div><div class="empty-ratings"><span>★★★★★</span></div></div>' .
        '<p>' . $product->product_name . '</p><div class="price"><span class="new_price">' . 
        number_format(price_sale($product->price, $product->sale), 0, ',', '.') .'<sup>vnđ</sup></span>'
        . $oldPrice . '</div><div class="btn-product">
        <a href="javascript:void(0)" data-product-id="' . $product->product_id . '" data-quantity="1" class="btn btn-add-cart col-sm-6 bg-info"><i class="fa fa-shopping-cart"></i>Đặt hàng</a>
        <a href="" class="btn col-sm-6 bg-warning"><i class="fa fa-eye"></i>Xem Nhanh</a>
        </div></div>';
    }
}
