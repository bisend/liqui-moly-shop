<?php

namespace App\ViewModels;

use App\Helpers\Languages;
use App\Helpers\ProductsSort;

class SearchViewModel extends LayoutViewModel
{
    public $searchTopSalesProducts;
    
    public $searchNoveltyProducts;

    public $sort;

    public $sortItems;


    //pagination fields
    public $searchProductsLimit = 24;

    public $page = 1;

    public $searchProductsOffset;



    public $countSearchProducts;

    public $searchProducts;
    
    public $series;
    
    public $seriesTitle;


    public function __construct($series, $sort = 'default', $page = 1, $language = Languages::DEFAULT_LANGUAGE)
    {
        parent::__construct('search', $language);
        
        $this->series = $series;
        
        $this->seriesTitle = str_replace('+', ' ', $series);

        $this->sort = $sort;

        $this->page = $page;

        $this->sortItems = new ProductsSort($series, $page, $language, $this->sort);

        $this->searchProductsOffset = ($this->page - 1) * $this->searchProductsLimit;
    }
}
