<?php

namespace App\ViewModels;

use App\Helpers\Languages;
use App\Helpers\ProductsSort;

/**
 * Class SearchViewModel
 * @package App\ViewModels
 */
class SearchViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $searchTopSalesProducts;

    /**
     * @var
     */
    public $searchNoveltyProducts;

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
    public $searchProductsLimit = 24;

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var int
     */
    public $searchProductsOffset;

    /**
     * @var
     */
    public $countSearchProducts;

    /**
     * @var
     */
    public $searchProducts;

    /**
     * @var null
     */
    public $series;

    /**
     * @var
     */
    public $seriesTitle;

    /**
     * SearchViewModel constructor.
     * @param null $series
     * @param string $sort
     * @param int $page
     * @param string $language
     */
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
