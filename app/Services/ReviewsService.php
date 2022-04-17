<?php
namespace App\Services;

use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\ReviewsRepository;

class ReviewsService
{
    protected ReviewsRepository $review;
    protected ProductRepository $product;

    public function __construct(ReviewsRepository $review, ProductRepository $product)
    {
        $this->review = $review;
        $this->product = $product;
    }

    public function getReview() {
        return $this->review->getReviewUser();
    }

    public function getReviewByProductId($product_id) {
        return $this->review->getReviewByProductId($product_id);
    }
 
    public function createReviews($data) {
        return $this->review->storeReviewUser($data);
    }

    public function updateRateProduct() {
        $rateDetails = $this->review->getRateAvgProducts();
        return $this->product->updateRate($rateDetails);
    }

    public function deleteReview($review_id, $key = REVIEW_ID_KEY) {
        return $this->review->delete($review_id, $key);
    }
}