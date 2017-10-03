<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 02.10.2017
 * Time: 11:27
 */

namespace App\Services;


use App\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function fillProductReviewsCount($model)
    {
        $model->productReviewsCount = $this->reviewRepository->getProductReviewsCount($model->product->id);
    }

    public function fillProductReviews($model)
    {
        $model->productReviews = $this->reviewRepository->getProductReviews($model->product->id, $model);
    }
    
    public function addReview($productId, $userId, $review, $userName, $email, $rating)
    {
        $this->reviewRepository->addReview($productId, $userId, $review, $userName, $email, $rating);
    }
}