<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 02.10.2017
 * Time: 11:27
 */

namespace App\Services;

use App\Repositories\ReviewRepository;

/**
 * Class ReviewService
 * @package App\Services
 */
class ReviewService
{
    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    /**
     * ReviewService constructor.
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * fill count of reviews to product
     * @param $model
     */
    public function fillProductReviewsCount($model)
    {
        $model->productReviewsCount = $this->reviewRepository->getProductReviewsCount($model->product->id);
    }

    /**
     * fill product reviews
     * @param $model
     */
    public function fillProductReviews($model)
    {
        $model->productReviews = $this->reviewRepository->getProductReviews($model->product->id, $model);
    }

    /**
     * add review
     * @param $productId
     * @param $userId
     * @param $review
     * @param $userName
     * @param $email
     * @param $rating
     */
    public function addReview($productId, $userId, $review, $userName, $email, $rating)
    {
        $this->reviewRepository->addReview($productId, $userId, $review, $userName, $email, $rating);
    }
}