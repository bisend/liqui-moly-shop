<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Repositories\ReviewRepository;
use App\Services\HistoryService;
use App\Services\ProductService;
use App\Services\ReviewService;
use App\ViewModels\ProductViewModel;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends LayoutController
{
    /**
     * @var ProductService
     */
    public $productService;

    /**
     * @var HistoryService
     */
    public $historyService;

    /**
     * @var ReviewService
     */
    public $reviewService;

    /**
     * @var ReviewRepository
     */
    public $reviewRepository;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param HistoryService $historyService
     * @param ReviewService $reviewService
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ProductService $productService, 
                                HistoryService $historyService,
                                ReviewService $reviewService,
                                ReviewRepository $reviewRepository)
    {
        $this->productService = $productService;
        $this->historyService = $historyService;
        $this->reviewService = $reviewService;
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * @param null $slug
     * @param string $language
     * @return mixed
     */
    public function index($slug = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ProductViewModel($slug, 1, $language);
        
        $this->productService->fill($model);

        $this->historyService->storeProduct($model->product->id);
        
        $this->historyService->fillVisitedProducts($model);
        
        $this->productService->incrementProductNumberOfViews($model);
        
        $this->reviewService->fillProductReviewsCount($model);
        
        $this->reviewService->fillProductReviews($model);

        return view('pages.product.product', compact('model'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function initReviewsView()
    {
        $productId = request('productId');

        $mPage = request('page');

        $productReviewsLimit = 5;

        $productReviewsCount = $this->reviewRepository->getProductReviewsCount($productId);

        $reviews = $this->reviewRepository->getAjaxProductReviews($productId, $mPage);
        
        $view = view('partial.product-page.ajax-reviews', 
            compact('reviews', 'productReviewsCount', 'mPage', 'productReviewsLimit'))
            ->render();

        return response()->json([
            'status' => 'success',
            'view' => $view
        ]);
    }
}