<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;
use Illuminate\Database\Eloquent\Model;

class MyOrdersViewModel extends LayoutViewModel
{
    public $orders;

    public $deliveries;

    public $payments;

    public $countOrders;

    public $ordersLimit = 7;

    public $page = 1;
    
    public $ordersOffset;
    
    public function __construct($page = 1, $language)
    {
        parent::__construct('my-orders', $language);

        $this->page = $page;
        
        $this->ordersOffset = ($this->page - 1) * $this->ordersLimit;
    }
}
