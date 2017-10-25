<?php

namespace App\ViewModels;

/**
 * Class CartViewModel
 * @package App\ViewModels
 */
class CartViewModel
{
    /**
     * @var
     */
    public $cartProducts;

    /**
     * @var int
     */
    public $totalProductsAmount = 0;

    /**
     * @var int
     */
    public $totalProductsCount = 0;

    /**
     * @var
     */
    public $inCartIds;

    /**
     * @var string
     */
    public $language;

    /**
     * CartViewModel constructor.
     * @param $language
     */
    public function __construct($language)
    {
        $this->language = $language;
    }
}
