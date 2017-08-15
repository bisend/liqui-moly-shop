<?php

namespace App\ViewModels;

use App\Helpers\Languages;
use App\Helpers\ProductsSort;

class CategoryViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $categoryProducts;
    
    public $currentCategory;
    
    public $countCategoryProducts;
    
    public $slug;
    
    public $categoryTopSalesProducts;
    
    public $categoryNoveltyProducts;
    
    public $sort;
    
    public $sortItems;


    //pagination fields
    public $categoryProductsLimit = 24;

    public $page = 1;

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