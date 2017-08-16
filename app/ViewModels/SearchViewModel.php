<?php

namespace App\ViewModels;

class SearchViewModel extends LayoutViewModel
{
    public $searchProducts;
    
    public $series;
    
    public function __construct($series, $language)
    {
        parent::__construct('search', $language);
        
        $this->series = $series;
    }
}
