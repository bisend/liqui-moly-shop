<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 25.10.2017
 * Time: 11:23
 */

namespace App\ViewModels;

/**
 * Class DeliveryPaymentsViewModel
 * @package App\ViewModels
 */
class DeliveryPaymentsViewModel extends LayoutViewModel
{
    /**
     * DeliveryPaymentsViewModel constructor.
     * @param null $language
     */
    public function __construct($language)
    {
        parent::__construct('delivery-payments', $language);
    }
}