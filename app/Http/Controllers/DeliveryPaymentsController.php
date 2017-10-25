<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\DeliveryPaymentsService;
use App\ViewModels\DeliveryPaymentsViewModel;

/**
 * Class DeliveryPaymentsController
 * @package App\Http\Controllers
 */
class DeliveryPaymentsController extends LayoutController
{
    /**
     * @var DeliveryPaymentsService
     */
    protected $deliveryPaymentsService;

    /**
     * DeliveryPaymentsController constructor.
     * @param DeliveryPaymentsService $deliveryPaymentsService
     */
    public function __construct(DeliveryPaymentsService $deliveryPaymentsService)
    {
        $this->deliveryPaymentsService = $deliveryPaymentsService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new DeliveryPaymentsViewModel($language);

        $this->deliveryPaymentsService->fill($model);
        
        return view('pages.delivery-payments.delivery-payments', compact('model'));
    }
}
