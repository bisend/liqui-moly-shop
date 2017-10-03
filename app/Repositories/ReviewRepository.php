<?php

namespace App\Repositories;

use App\DatabaseModels\Review;

class ReviewRepository
{
    public function getProductReviewsCount($productId)
    {
        return Review::whereProductId($productId)
            ->whereIsModerated(true)
            ->count();
    }
    
    public function getProductReviews($productId, $model)
    {
        $model->productReviewsOffset = ($model->page - 1) * $model->productReviewsLimit;
        return Review::whereProductId($productId)
            ->whereIsModerated(true)
            ->orderByRaw('created_at desc')
            ->offset($model->productReviewsOffset)
            ->limit($model->productReviewsLimit)
            ->get();
    }
    
    public function getAjaxProductReviews($productId, $page)
    {
        $productReviewsOffset = ($page - 1) * 5;
        return Review::whereProductId($productId)
            ->whereIsModerated(true)
            ->offset($productReviewsOffset)
            ->orderByRaw('created_at desc')
            ->limit(5)
            ->get();
    }
    
    public function addReview($productId, $userId, $review, $userName, $email, $rating)
    {
        $model = new Review();
        $model->product_id = $productId;
        $model->user_id = $userId;
        $model->review = $review;
        $model->username = $userName;
        $model->email = $email;
        $model->rating = $rating;
        $model->save();
    }
}