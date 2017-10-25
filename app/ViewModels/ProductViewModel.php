<?php

namespace App\ViewModels;

/**
 * Class ProductViewModel
 * @package App\ViewModels
 */
class ProductViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $product;

    /**
     * @var null
     */
    public $productSlug;

    /**
     * @var
     */
    public $currentCategory;

    /**
     * @var
     */
    public $properties;

    /**
     * @var
     */
    public $visitedProducts;

    /**
     * @var int
     */
    public $productReviewsOffset;

    /**
     * @var int
     */
    public $productReviewsLimit = 5;

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var
     */
    public $productReviewsCount;

    /**
     * @var
     */
    public $productReviews;

    /**
     * ProductViewModel constructor.
     * @param null $productSlug
     * @param int $page
     * @param $language
     */
    public function __construct($productSlug, $page = 1, $language)
    {
        parent::__construct('product', $language);
        
        $this->productSlug = $productSlug;
        
        $this->page = $page;

        $this->productReviewsOffset = ($this->page - 1) * $this->productReviewsLimit;
    }
}
