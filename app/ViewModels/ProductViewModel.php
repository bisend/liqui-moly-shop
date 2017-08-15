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
    
    public function __construct($productSlug, $language)
    {
        parent::__construct('product', $language);
        
        $this->productSlug = $productSlug;
    }
}
