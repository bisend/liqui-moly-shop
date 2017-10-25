<?php

namespace App\Repositories;

use App\DatabaseModels\Review;

/**
 * Class ReviewRepository
 * @package App\Repositories
 */
class ReviewRepository
{
    /**
     * get count of product reviews
     * @param $productId
     * @return int
     */
    public function getProductReviewsCount($productId)
    {
        return Review::whereProductId($productId)
            ->whereIsModerated(true)
            ->count();
    }

    /**
     * get product reviews
     * @param $productId
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
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

    /**
     * get ajax product reviews
     * @param $productId
     * @param $page
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
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

    /**
     * save new reviews in db
     * @param $productId
     * @param $userId
     * @param $review
     * @param $userName
     * @param $email
     * @param $rating
     */
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