<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\ListService;
use App\Services\ProductService;
use App\Services\ReviewsService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $list, $productService, $reviewsService;
    public function __construct(
        ListService $list, 
        ProductService $productService,
        ReviewsService $reviewsService)
    {
        $this->list = $list;
        $this->reviewsService = $reviewsService;
        $this->productService = $productService;
    }
    public function index(Request $request) {
        $product_id = $request->id;
        $product = $this->productService->productDetail($product_id);
        $reviews = $this->reviewsService->getReviewByProductId($product_id);
        $newProducts = $this->productService->newProducts();
        $categories_male = $this->list->showCateUsers(STATUS_ON);
        $categories_female = $this->list->showCateUsers(STATUS_OFF);
        return view('users.details.index',compact(
            'categories_male',
            'product', 
            'categories_female',
            'reviews',
            'newProducts'
        ));
    }

    public function postReviews(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        $review = $this->reviewsService->createReviews($data);
        $this->reviewsService->updateRateProduct();
        return response()->json($review);
    }
}
