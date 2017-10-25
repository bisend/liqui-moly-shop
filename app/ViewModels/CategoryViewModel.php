<?php

namespace App\ViewModels;

use App\Helpers\Languages;
use App\Helpers\ProductsSort;

/**
 * Class CategoryViewModel
 * @package App\ViewModels
 */
class CategoryViewModel extends LayoutViewModel
{
    /**
     * @var 
     */
    public $categoryProducts;

    /**
     * @var
     */
    public $currentCategory;

    /**
     * @var
     */
    public $countCategoryProducts;

    /**
     * @var null
     */
    public $slug;

    /**
     * @var
     */
    public $categoryTopSalesProducts;

    /**
     * @var
     */
    public $categoryNoveltyProducts;

    /**
     * @var string
     */
    public $sort;

    /**
     * @var ProductsSort
     */
    public $sortItems;


    //pagination fields
    /**
     * @var int
     */
    public $categoryProductsLimit = 24;

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var int
     */
    public $categoryProductsOffset;


    /**
     * CategoryViewModel constructor.
     * @param null $slug
     * @param string $sort
     * @param int $page
     * @param string $language
     */
    function __construct($slug, $sort = 'default', $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        parent::__construct('category', $language);
        
        $this->slug = $slug;
        
        $this->sort = $sort;
        
        $this->page = $page;

        $this->sortItems = new ProductsSort($slug, $page, $language, $this->sort);

        $this->categoryProductsOffset = ($this->page - 1) * $this->categoryProductsLimit;
    }
}