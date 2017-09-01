<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\OrderService;
use App\ViewModels\OrderViewModel;
use Illuminate\Support\Facades\Session;

class OrderController extends LayoutController
{
    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        if (!Session::has('cart'))
        {
            return redirect(url_home($language));
        }
        
        $model = new OrderViewModel($language);

        $this->orderService->fill($model);

//        dd($model);

        return view('pages.order.order', compact('model'));
    }
}
