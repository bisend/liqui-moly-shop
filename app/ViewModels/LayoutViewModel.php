<?php

namespace App\ViewModels;

use App\Helpers\Languages;

abstract class LayoutViewModel extends ViewModel
{
    public $allCategories;
    
    public $visitedProducts;
    
    public $recommendedProducts;
    
    public $bestDiscountsProducts;
    
    public $popularProducts;
    
    /**
     * LayoutViewModel constructor.
     * @param null $view
     * @param string $language
     */
    function __construct($view = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        parent::__construct($view, $language);
    }
}
