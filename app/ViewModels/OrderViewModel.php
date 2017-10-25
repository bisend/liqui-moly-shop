<?php

namespace App\ViewModels;

/**
 * Class OrderViewModel
 * @package App\ViewModels
 */
class OrderViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $inCartIds;

    /**
     * @var
     */
    public $orderProducts;

    /**
     * @var int
     */
    public $totalOrderAmount = 0;

    /**
     * @var int
     */
    public $totalProductsCount = 0;

    /**
     * @var
     */
    public $payments;

    /**
     * @var
     */
    public $deliveries;

    /**
     * @var
     */
    public $orderId;

    /**
     * @var
     */
    public $order;

    /**
     * @var
     */
    public $profile;

    /**
     * OrderViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('order', $language);
    }
}
