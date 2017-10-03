<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;

class ReviewController extends LayoutController
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function addReview()
    {
        $productId = request('productId');
        $userId = auth()->check() ? auth()->user()->id : null;
        $review = request('review');
        $userName = request('userName');
        $email = request('email');
        $rating = request('rating');
        
        try
        {
            $this->reviewService->addReview($productId, $userId, $review, $userName, $email, $rating);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error'
            ]);
        }
        
        return response()->json([
            'status' => 'success'
        ]);
    }
}
