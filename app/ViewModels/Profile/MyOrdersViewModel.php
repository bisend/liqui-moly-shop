<?php

namespace App\ViewModels\Profile;

use App\ViewModels\LayoutViewModel;

/**
 * Class MyOrdersViewModel
 * @package App\ViewModels\Profile
 */
class MyOrdersViewModel extends LayoutViewModel
{
    /**
     * @var
     */
    public $orders;

    /**
     * @var
     */
    public $deliveries;

    /**
     * @var
     */
    public $payments;

    /**
     * @var
     */
    public $countOrders;

    /**
     * @var int
     */
    public $ordersLimit = 7;

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var int
     */
    public $ordersOffset;

    /**
     * MyOrdersViewModel constructor.
     * @param int $page
     * @param string $language
     */
    public function __construct($page = 1, $language)
    {
        parent::__construct('my-orders', $language);

        $this->page = $page;
        
        $this->ordersOffset = ($this->page - 1) * $this->ordersLimit;
    }
}
