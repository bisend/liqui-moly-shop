<?php

namespace App\ViewModels;

class CartViewModel
{
    public $cartProducts;

    public $totalProductsAmount = 0;

    public $totalProductsCount = 0;
    
    public $inCartIds;
    
    public $language;
    
    public function __construct($language)
    {
        $this->language = $language;
    }
}
