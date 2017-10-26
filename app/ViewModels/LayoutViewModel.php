<?php

namespace App\ViewModels;

use App\Helpers\Languages;

/**
 * Class LayoutViewModel
 * @package App\ViewModels
 */
abstract class LayoutViewModel extends ViewModel
{
    /**
     * @var
     */
    public $allCategories;

    /**
     * @var
     */
    public $visitedProducts;

    /**
     * @var
     */
    public $recommendedProducts;

    /**
     * @var
     */
    public $bestDiscountsProducts;

    /**
     * @var
     */
    public $popularProducts;

    /**
     * @var
     */
    public $title;
    
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
