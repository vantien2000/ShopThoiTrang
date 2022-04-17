<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ReviewsService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected ReviewsService $reviewService;
    public function __construct(ReviewsService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(Request $request) {
        $reviews = $this->reviewService->getReview();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function deleteReviews(Request $request) {
        $review_id = $request->id;
        $isDelete = $this->reviewService->deleteReview($review_id);
        $isUpdate = $this->reviewService->updateRateProduct();
        $isSuccess = $isDelete && $isUpdate;
        return response()->json($isSuccess);
    }
}
