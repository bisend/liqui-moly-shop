<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderViewModel
 * @package App\ViewModels
 */
class OrderViewModel extends LayoutViewModel
{
    public $inCartIds;
    
    public $orderProducts;

    public $totalOrderAmount = 0;

    public $totalProductsCount = 0;

    public $payments;

    public $deliveries;
    
    public $orderId;
    
    public $order;
    
    public $profile;

    public function __construct($language)
    {
        parent::__construct('order', $language);
    }
}
