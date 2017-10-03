<?php

namespace App\ViewModels;

/**
 * Class ProductViewModel
 * @package App\ViewModels
 */
class ProductViewModel extends LayoutViewModel
{
    public $product;
    
    public $productSlug;
    
    public $currentCategory;
    
    public $properties;
    
    public $visitedProducts;

    public $productReviewsOffset;

    public $productReviewsLimit = 5;

    public $page = 1;
    
    public $productReviewsCount;
    
    public $productReviews;
    
    public function __construct($productSlug, $page = 1, $language)
    {
        parent::__construct('product', $language);
        
        $this->productSlug = $productSlug;
        
        $this->page = $page;

        $this->productReviewsOffset = ($this->page - 1) * $this->productReviewsLimit;
    }
}
