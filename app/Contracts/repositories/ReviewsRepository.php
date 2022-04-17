<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Illuminate\Support\Facades\DB;
use Models\Reviews;

class ReviewsRepository extends RepositoryAbstract
{
    public function __construct(Reviews $reviews)
    {
        $this->modal = $reviews;
    }

    public function getReviewUser() {
        return $this->modal->select(DB::raw('reviews.*, user_data.user_name, user_data.avatar'))
        ->leftJoin('user_data', 'user_data.user_id', '=', 'reviews.user_id')
        ->paginate(10);
    }

    public function getReviewByProductId($product_id) {
        return $this->modal->select(DB::raw('reviews.*, user_data.user_name, user_data.avatar'))
        ->leftJoin('user_data', 'user_data.user_id', '=', 'reviews.user_id')
        ->where('reviews.product_id', '=', $product_id)
        ->get();
    }

    public function storeReviewUser($data) {
        $review = $this->modal->create($data);
        return $this->modal->select(DB::raw('reviews.*, user_data.user_name, user_data.avatar'))
        ->leftJoin('user_data', 'user_data.user_id', '=', 'reviews.user_id')
        ->where('review_id', $review->review_id)
        ->first();
    }

    public function getRateAvgProducts() {
        return $this->modal->select(DB::raw('product_id, avg(rate) as rate'))->groupBy("reviews.product_id")->get()->toArray();
    }
}