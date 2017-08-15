<?php

namespace App\ViewModels;

use App\Helpers\Languages;

class HomeViewModel extends LayoutViewModel
{
    public $mainSlider;
    
    public $topBanner;
    
    public $bottomBanner;

    public $topSales;

    public $novelty;

    public $seasonalGoods;
    
    public $promotionalProduct;
    
    public $visitedProducts;
    
    /**
     * HomeViewModel constructor.
     * @param null|string $language
     */
    function __construct($language = Languages::DEFAULT_LANGUAGE)
    {
        parent::__construct('home', $language);
    }
}
