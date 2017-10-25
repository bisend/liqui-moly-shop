<?php

namespace App\ViewModels;

use App\Helpers\Languages;

/**
 * Class HomeViewModel
 * @package App\ViewModels
 */
class HomeViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $mainSlider;

    /**
     * @var
     */
    public $topBanner;

    /**
     * @var
     */
    public $bottomBanner;

    /**
     * @var
     */
    public $topSales;

    /**
     * @var
     */
    public $novelty;

    /**
     * @var
     */
    public $seasonalGoods;

    /**
     * @var
     */
    public $promotionalProduct;
    
    /**
     * HomeViewModel constructor.
     * @param null|string $language
     */
    function __construct($language = Languages::DEFAULT_LANGUAGE)
    {
        parent::__construct('home', $language);
    }
}
